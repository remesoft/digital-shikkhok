<?php
session_start(); // Start the session
include '../includes/db.php';
include '../includes/auth.php';
include '../includes/helpers.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $course_id = $_POST['course_id'];

    // Map form fields to database columns
    $fields = [
      'title' => $_POST['title'] ?? '',
      'short_desc' => $_POST['short_desc'] ?? '',
      'description' => $_POST['description'] ?? '',
      'thumbnail' => upload_image("../uploads/img/thumbnails/", "thumbnail"),
      'video' => $_POST['video'] ?? '',
      'duration' => $_POST['duration'] ?? '',
      'instructor' => 1,
      'price' => $_POST['price'] ?? '',
      'total_lectures' => $_POST['total_lectures'] ?? '',
      'language' => $_POST['language'] ?? '',
    ];

    // Start building the query
    $update_query = "UPDATE `courses` SET ";
    $update_parts = [];
    foreach ($fields as $column => $value) {
      // Basic sanitization 
      $sanitized_value = addslashes($value);
      $update_parts[] = "`$column` = '$sanitized_value'";
    }

    // Join the parts and add a WHERE clause
    $update_query .= implode(", ", $update_parts);
    $update_query .= " WHERE `id` = " . intval($course_id);


    if ($conn->query($update_query) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error: " . $mysqli->error;
    }




    // // Generate dynamic SQL for updating fields
    // $update_pairs = [];
    // foreach ($fields as $column => $value) {
    //   $update_pairs[] = "`$column` = ?";
    // }
    // $update_clause = implode(', ', $update_pairs);
    // $values = array_values($fields);

    // // Prepare SQL for updating the course
    // $course_sql = "UPDATE `courses` SET $update_clause WHERE `id` = ?";
    // $values[] = $course_id; // Add course ID to the end for the WHERE clause

    // if ($stmt = $conn->prepare($course_sql)) {
    //   $types = str_repeat('s', count($fields)) . 'i'; // Add 'i' for the course_id
    //   $stmt->bind_param($types, ...$values);

    //   if (!$stmt->execute()) {
    //     throw new Exception("Error updating course: " . $stmt->error);
    //   }
    //   $stmt->close();

    //   // Update or Insert lectures and topics
    //   $lectures = $_POST['lectures'] ?? [];
    //   foreach ($lectures as $lecture) {
    //     $lecture_id = $lecture['id'] ?? null;
    //     $lecture_title = $lecture['name'] ?? '';

    //     if ($lecture_id) {
    //       // Update existing lecture
    //       $lecture_sql = "UPDATE `lectures` SET `title` = ? WHERE `id` = ?";
    //       if ($lectureStmt = $conn->prepare($lecture_sql)) {
    //         $lectureStmt->bind_param("si", $lecture_title, $lecture_id);
    //         if (!$lectureStmt->execute()) {
    //           throw new Exception("Error updating lecture: " . $lectureStmt->error);
    //         }
    //         $lectureStmt->close();
    //       } else {
    //         throw new Exception("Error preparing lecture update statement: " . $conn->error);
    //       }
    //     } else {
    //       // Insert new lecture
    //       $lecture_sql = "INSERT INTO `lectures` (`course_id`, `title`) VALUES (?, ?)";
    //       if ($lectureStmt = $conn->prepare($lecture_sql)) {
    //         $lectureStmt->bind_param("is", $course_id, $lecture_title);
    //         if (!$lectureStmt->execute()) {
    //           throw new Exception("Error inserting lecture: " . $lectureStmt->error);
    //         }
    //         $lecture_id = $lectureStmt->insert_id; // Get the new lecture ID
    //         $lectureStmt->close();
    //       } else {
    //         throw new Exception("Error preparing lecture insert statement: " . $conn->error);
    //       }
    //     }

    //     // Update or Insert topics for the lecture
    //     if (isset($lecture['topics'])) {
    //       foreach ($lecture['topics'] as $topic) {
    //         $topic_id = $topic['id'] ?? null;
    //         $topic_title = $topic['name'] ?? '';
    //         $video_url = $topic['url'] ?? '';
    //         $topic_duration = $topic['duration'] ?? '';
    //         $topic_price = $topic['price'] ?? '';

    //         if ($topic_id) {
    //           // Update existing topic
    //           $topic_sql = "UPDATE `topics` SET `title` = ?, `video` = ?, `duration` = ?, `price` = ? WHERE `id` = ?";
    //           if ($topicStmt = $conn->prepare($topic_sql)) {
    //             $topicStmt->bind_param("ssssi", $topic_title, $video_url, $topic_duration, $topic_price, $topic_id);
    //             if (!$topicStmt->execute()) {
    //               throw new Exception("Error updating topic: " . $topicStmt->error);
    //             }
    //             $topicStmt->close();
    //           } else {
    //             throw new Exception("Error preparing topic update statement: " . $conn->error);
    //           }
    //         } else {
    //           // Insert new topic
    //           $topic_sql = "INSERT INTO `topics` (`lecture_id`, `title`, `video`, `duration`, `price`) VALUES (?, ?, ?, ?, ?)";
    //           if ($topicStmt = $conn->prepare($topic_sql)) {
    //             $topicStmt->bind_param("issss", $lecture_id, $topic_title, $video_url, $topic_duration, $topic_price);
    //             if (!$topicStmt->execute()) {
    //               throw new Exception("Error inserting topic: " . $topicStmt->error);
    //             }
    //             $topicStmt->close();
    //           } else {
    //             throw new Exception("Error preparing topic insert statement: " . $conn->error);
    //           }
    //         }
    //       }
    //     }
    //   }

    //   $_SESSION['success_message'] = "Course and associated lectures/topics updated successfully!";
    // } else {
    //   throw new Exception("Error preparing course update statement: " . $conn->error);
    // }
  } catch (Exception $e) {
    $_SESSION['error_message'] = $e->getMessage();
  }
}

// header("Location: ../admin/edit_course.php?id=" . ($course_id ?? ''));
// exit;
