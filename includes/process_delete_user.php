<?php

session_start();
include_once "db.php";
include_once "helpers.php";

// Ensure only admins can access this functionality
protected_for('admin');

// Check if `id` is set in the POST request
if (isset($_POST['id'])) {
  $record_id = intval($_POST['id']);
  $record_table = $_POST['table'];
  $page = $_POST['page'];

  // Prepare the delete query
  $stmt = $conn->prepare("DELETE FROM $record_table WHERE id = ?");
  $stmt->bind_param('i', $record_id);

  // Execute the query and check if successful
  if ($stmt->execute()) {
    $_SESSION['success_message'] = "Record deleted successfully.";
  } else {
    $_SESSION['error_message'] = "Failed to delete the record.";
  }

  $stmt->close();
} else {
  $_SESSION['error_message'] = "No record ID provided.";
}

// Redirect to the appropriate page
switch ($page) {
  case 'students':
    $location = "../admin/all_students.php";
    header("Location:  $location");
    break;
  case 'instructors':
    $location = '../admin/all_instructors.php';
    header("Location: $location");
    break;
}
exit;
