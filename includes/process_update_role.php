<?php

session_start();
include_once "db.php";
include_once "helpers.php";

// Ensure only admins can access this functionality
protected_for('admin');

// Check if `id` and `role` are set in POST request
if (isset($_POST['id']) && isset($_POST['role'])) {
  $user_id = intval($_POST['id']);
  $new_role = $_POST['role'] === 'student' ? 'student' : 'instructor';

  // Update the user's role
  $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
  $stmt->bind_param('si', $new_role, $user_id);
  if ($stmt->execute()) {
    $_SESSION['success_message'] = "User role updated successfully to $new_role.";
  } else {
    $_SESSION['error_message'] = "User role update failed!";
  }
  $stmt->close();
} else {
  $_SESSION['error_message'] = "Invalid input! Role and ID are required.";
}

// Redirect to the students list page
$location = $_POST['role'] === 'student' ?
  '../admin/all_instructors.php' :
  '../admin/all_students.php';
header("Location: $location");
exit;
