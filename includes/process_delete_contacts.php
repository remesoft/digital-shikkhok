<?php

include_once "db.php";
include_once "session.php";
include_once "helpers.php";

// Only admins can access
protected_for('admin');
if (isset($_POST['id'])) {
  $record_id = intval($_POST['id']);
  $sql = "DELETE FROM contacts WHERE id = $record_id";

  if ($conn->query($sql)) {
    $_SESSION['success_message'] = "Record deleted successfully.";
  } else {
    $_SESSION['error_message'] = "Failed to delete the record: " . $conn->error;
  }
} else {
  $_SESSION['error_message'] = "No record ID provided.";
}

$location = "../admin/all_contact.php";
header("Location: $location");
