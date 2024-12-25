<?php
session_start(); // Start the session
include '../includes/db.php';
include '../includes/auth.php';
include '../includes/helpers.php';

error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1); // Display errors on the page
ini_set('display_startup_errors', 1); // Display errors during PHP's startup sequence

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $title = $_POST['title'] ?? '';
    $short_desc = $_POST['short_desc'] ?? '';
    $description = $_POST['description'] ?? '';
    $thumbnail = upload_image("../uploads/img/thumbnails/", "thumbnail");
    $duration = $_POST['duration'] ?? '';
    $instructor = 1; // TODO: Make this dynamic
    $price = $_POST['price'] ?? '';

    // Insert the main course
    $course_sql = "INSERT INTO `courses` (`title`, `short_desc`, `description`, `thumbnail`, `duration`, `instructor`, `price`) 
                   VALUES (?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($course_sql)) {
      $stmt->bind_param("sssssis", $title, $short_desc, $description, $thumbnail, $duration, $instructor, $price);

      if ($stmt->execute()) {
        $course_id = $stmt->insert_id; // Get the inserted course ID

        // Process lectures
        $lectures = $_POST['lectures'] ?? [];
        foreach ($lectures as $lecture) {
          $lecture_title = $lecture['name'] ?? '';
          $lecture_sql = "INSERT INTO `lectures` (`course_id`, `title`) VALUES (?, ?)";

          if ($lectureStmt = $conn->prepare($lecture_sql)) {
            $lectureStmt->bind_param("is", $course_id, $lecture_title);

            if ($lectureStmt->execute()) {
              $lecture_db_id = $lectureStmt->insert_id; // Get the inserted lecture ID

              // Process topics
              if (isset($lecture['topics'])) {
                foreach ($lecture['topics'] as $topic) {
                  $topic_title = $topic['name'] ?? '';
                  $video_url = $topic['url'] ?? '';

                  // Insert topic
                  $topic_sql = "INSERT INTO `topics` (`lecture_id`, `title`, `video`) VALUES (?, ?, ?)";
                  if ($topicStmt = $conn->prepare($topic_sql)) {
                    $topicStmt->bind_param("iss", $lecture_db_id, $topic_title, $video_url);

                    if (!$topicStmt->execute()) {
                      throw new Exception("Error inserting topic: " . $topicStmt->error);
                    }
                    $topicStmt->close();
                  } else {
                    throw new Exception("Error preparing topic statement: " . $conn->error);
                  }
                }
              }
            } else {
              throw new Exception("Error inserting lecture: " . $lectureStmt->error);
            }
            $lectureStmt->close();
          } else {
            throw new Exception("Error preparing lecture statement: " . $conn->error);
          }
        }

        $_SESSION['success_message'] = "Course and associated lectures/topics added successfully!";
      } else {
        throw new Exception("Error inserting course: " . $stmt->error);
      }
      $stmt->close();
    } else {
      throw new Exception("Error preparing course statement: " . $conn->error);
    }
  } catch (Exception $e) {
    $_SESSION['error_message'] = $e->getMessage();
  }
}

// Redirect to another page or reload the current page to display the alert
header("Location: " . "../admin/create_course.php");
exit;
