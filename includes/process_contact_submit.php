<?php
include '../includes/db.php';
include '../includes/session.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve form data
  $name = trim($_POST['name']);
  $phone = trim($_POST['phone']);
  $message = trim($_POST['message']);

  // Basic validation
  if (empty($name) || empty($phone) || empty($message)) {
    $_SESSION['status'] = "warning";
    $_SESSION['error_message'] = "সবগুলো ঘর পূরণ করা আবশ্যক।";
    header("Location: ../contact_us.php#contact");
    exit;
  }
  // bangladeshi mobile number check 
  if (!preg_match('/^01[0-9]{9}$/', $phone)) {
    $_SESSION['status'] = "warning";
    $_SESSION['error_message'] = "বাংলাদেশী মোবাইল নম্বর আবশ্যক।";
    header("Location: ../contact_us.php#contact");
    exit;
  }

  $query = "INSERT INTO `contacts` (`name`, `phone`, `message`) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("sss", $name, $phone, $message);
  if ($stmt->execute()) {
    $_SESSION['status'] = "success";
    $_SESSION['success_message'] = "বার্তা সফলভাবে পাঠানো হয়েছে!";
  } else {
    $_SESSION['error_message'] = "বার্তা পাঠানো ব্যর্থ হয়েছে।";
  }

  header("Location: ../contact_us.php#contact");
  exit;
}
