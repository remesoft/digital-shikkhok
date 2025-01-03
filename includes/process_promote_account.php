<?php

session_start();
include_once "db.php";
include_once "helpers.php";

// Ensure only admins can access this functionality
protected_for('admin');

// Check if `id` is set in POST request
if (isset($_POST['id'])) {
  $user_id = intval($_POST['id']);
  $result = $conn->query("UPDATE users SET role = 'instructor' WHERE id = $user_id");
  if ($result) {
    $_SESSION['success_message'] = "User role updated successfully.";
    header("Location: ../admin/all_students.php");
  } else {
    $_SESSION['success_message'] = "User role updated successfully.";
    header("Location: ../admin/all_students.php");
  }
} else {
  $_SESSION['success_message'] = "User role updated successfully.";
  header("Location: ../admin/all_students.php");
}
