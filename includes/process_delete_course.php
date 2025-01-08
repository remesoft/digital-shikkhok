<?php

session_start();
require_once "db.php";
require_once "helpers.php";

// Restrict access
protected_for('admin');

// Check if `id` is set in the POST request
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
  $_SESSION['error_message'] = "Invalid or missing record ID.";
  header("Location: ../admin/all_courses.php");
  exit;
}

$record_id = intval($_POST['id']);

try {
  // Prepare the DELETE query
  $query = "DELETE FROM courses WHERE id = ?";
  $stmt = $conn->prepare($query);

  if (!$stmt) {
    throw new Exception("Failed to prepare the SQL statement: " . $conn->error);
  }

  // Bind the parameters and execute
  $stmt->bind_param('i', $record_id);
  $execution_result = $stmt->execute();

  if ($execution_result) {
    $_SESSION['success_message'] = "Record deleted successfully.";
  } else {
    throw new Exception("Failed to execute the SQL query: " . $stmt->error);
  }

  // Redirect after processing
  $stmt->close();
  header("Location: ../admin/all_courses.php");
  exit;
} catch (Exception $e) {
  // Log the error for debugging purposes
  error_log($e->getMessage());

  // Notify the user of the error
  $_SESSION['error_message'] = "An error occurred while deleting the record.";
  header("Location: ../admin/all_courses.php");
  exit;
}
