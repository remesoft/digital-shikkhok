<?php
session_start();
include '../includes/db.php';
include '../includes/auth.php';
include '../includes/helpers.php';
include '../includes/file_manager.php';


// Update course
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $course_id = $_POST['course_id'];

    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
      $thumbnail = upload_image("../uploads/img/thumbnails/", "thumbnail");
      delete_file("../uploads/img/thumbnails/", $_POST['old_thumbnail']);
    } else {
      $thumbnail = $_POST['old_thumbnail'];
    }

    // others data
    $title = $_POST['title'];
    $short_desc = $_POST['short_desc'];
    $description = $_POST['description'];
    $video = $_POST['video'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $total_lectures = $_POST['total_lectures'];
    $language = $_POST['language'];

    // update course
    $query = "UPDATE `courses` SET `title` = '$title', `short_desc` = '$short_desc', `description` = '$description', `thumbnail` = '$thumbnail', `video` = '$video', `duration` = '$duration', `price` = '$price', `total_lectures` = '$total_lectures', `language` = '$language' WHERE `id` = $course_id";
    $result = mysqli_query($conn, $query);
    if (!$result) throw new Exception("Error updating course: " . mysqli_error($conn));


    // delete old lecture
    $query = "DELETE FROM `lectures` WHERE `course_id` = $course_id";
    $result = mysqli_query($conn, $query);
    if (!$result) throw new Exception("Error deleting lectures: " . mysqli_error($conn));

    // create new lectures again
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

    $_SESSION['success_message'] = "Course Updated Successfully!";
  } catch (Exception $e) {
  }

  // back to update course
  header("Location: ../admin/edit_course.php?id=" . $course_id);
  exit;
}
