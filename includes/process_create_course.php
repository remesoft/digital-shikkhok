<?php
session_start(); // Start the session
include '../includes/db.php';
include '../includes/auth.php';
include_once '../includes/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    // Map form fields to database columns
    $fields = [
      'title' => $_POST['title'] ?? '',
      'short_desc' => $_POST['short_desc'] ?? '',
      'description' => $_POST['description'] ?? '',
      'thumbnail' => upload_image("../uploads/img/thumbnails/", "thumbnail"),
      'video' => $_POST['video'] ?? '',
      'duration' => $_POST['duration'] ?? '',
      'instructor' => 1, // TODO: Replace with dynamic instructor value
      'price' => $_POST['price'] ?? '',
      'total_lectures' => $_POST['total_lectures'] ?? '',
      'language' => $_POST['language'] ?? '',
    ];

    // Generate the placeholders and values dynamically
    $columns = implode(', ', array_keys($fields));
    $placeholders = implode(', ', array_fill(0, count($fields), '?'));
    $values = array_values($fields);

    // Prepare SQL for inserting the course
    $course_sql = "INSERT INTO `courses` ($columns) VALUES ($placeholders)";
    if ($stmt = $conn->prepare($course_sql)) {
      // Generate parameter types string
      // Assuming all fields are strings
      $types = str_repeat('s', count($fields));
      $stmt->bind_param($types, ...$values);

      if ($stmt->execute()) {
        $course_id = $stmt->insert_id;

        // Process lectures
        $lectures = $_POST['lectures'] ?? [];
        foreach ($lectures as $lecture) {
          $lecture_title = $lecture['name'] ?? '';
          $lecture_sql = "INSERT INTO `lectures` (`course_id`, `title`) VALUES (?, ?)";

          if ($lectureStmt = $conn->prepare($lecture_sql)) {
            $lectureStmt->bind_param("is", $course_id, $lecture_title);

            if ($lectureStmt->execute()) {
              $lecture_db_id = $lectureStmt->insert_id;

              // Process topics
              if (isset($lecture['topics'])) {
                foreach ($lecture['topics'] as $topic) {
                  $topic_title = $topic['name'] ?? '';
                  $video_url = $topic['url'] ?? '';
                  $topic_duration = $topic['duration'] ?? '';
                  $topic_price = $topic['price'] ?? '';

                  // Insert topic
                  $topic_sql = "INSERT INTO `topics` (`lecture_id`,`course_id`, `title`, `video`, `duration`, `price`) VALUES (?, ?, ?, ?, ?, ?)";
                  if ($topicStmt = $conn->prepare($topic_sql)) {
                    $topicStmt->bind_param("isssss", $lecture_db_id, $course_id, $topic_title, $video_url, $topic_duration, $topic_price);

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

header("Location: ../admin/create_course.php");
exit;
