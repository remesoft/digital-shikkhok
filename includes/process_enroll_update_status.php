<?php
// Include your database connection
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = intval($_POST['id']);
  $action = $_POST['action'];

  // Determine the status based on action
  $status = ($action === 'approve') ? 'success' : 'cancel';

  // Update the database
  $sql = "UPDATE enrollments SET status = ? WHERE id = ?";
  $stmt = $conn->prepare($sql);

  // Bind the parameters (use "si" for string and integer)
  $stmt->bind_param("si", $status, $id);

  if ($stmt->execute()) {
    header("Location: ../admin/enrollments.php");
    exit();
  } else {
    // Handle errors
    echo "Error updating record: " . $conn->error;
  }
}
