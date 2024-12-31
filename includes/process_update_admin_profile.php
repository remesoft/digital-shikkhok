<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  session_start();
  include '../includes/db.php';

  // Initialize variables from the form
  $user_id = $_SESSION['user_id'];
  $first_name = $_POST['fname'];
  $last_name = $_POST['lname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $profile = $_FILES['profile'];

  // Start building the SQL query
  $update_query = "UPDATE users SET first_name = ?, last_name = ?, phone = ?, email = ?";

  // Dynamic placeholders and variables for bind_param
  $types = "ssss"; // Type string for the base query
  $params = [$first_name, $last_name, $phone, $email];

  // Check if the password was provided
  if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $update_query .= ", password = ?";
    $types .= "s"; // Add type for password
    $params[] = $hashed_password; // Add hashed password to parameters
  }

  // Check if the profile image was uploaded
  if (!empty($profile['name'])) {
    $file_extension = pathinfo($profile['name'], PATHINFO_EXTENSION);
    $unique_name = time() . '_' . uniqid() . '.' . $file_extension;
    $profile_path = '../uploads/img/users/' . $unique_name;

    if (move_uploaded_file($profile['tmp_name'], $profile_path)) {
      $update_query .= ", avatar = ?";
      $types .= "s"; // Add type for profile image
      $params[] = $unique_name; // Add unique name to parameters
    } else {
      echo "Failed to upload the profile image.";
      exit();
    }
  }

  $update_query .= " WHERE id = ?";
  $types .= "s"; // Add type for user_id
  $params[] = $user_id; // Add user_id to parameters

  // Prepare the statement
  if ($stmt = $conn->prepare($update_query)) {
    // Use dynamic binding of parameters
    $stmt->bind_param($types, ...$params);

    // Execute the statement
    if ($stmt->execute()) {
      $_SESSION['success_message'] = "Profile updated successfully.";
      header("Location: ../admin/profile.php");
    } else {
      $_SESSION['error_message'] = "Error updating profile: " . $stmt->error;
      header("Location: ../admin/profile.php");
    }

    $stmt->close();
  } else {
    $_SESSION['error_message'] = "Failed to prepare the update query: " . $conn->error;
    header("Location: ../admin/profile.php");
  }
} else {
  header("Location: ../admin/profile.php");
  exit();
}
