<?php
include '../includes/db.php';
include '../includes/auth.php';
include '../includes/helpers.php';


error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1); // Display errors on the page
ini_set('display_startup_errors', 1); // Display errors during PHP's startup sequence


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $thumbnail = upload_image();






  // Check if file upload was successful
  // if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
  //   $targetDirectory = "/uploads/";
  //   $targetFile = $targetDirectory . basename($_FILES['thumbnail']['name']);
  //   $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  //   $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];


  //   // Create directory if not exist
  //   if (!is_dir($targetDirectory)) {
  //     if (!mkdir($targetDirectory, 0755, true)) {
  //       die("Failed to create directory: $targetDirectory");
  //     }
  //   }

  //   // Validate image file
  //   $check = getimagesize($_FILES['thumbnail']['tmp_name']);
  //   if ($check === false) {
  //     die("File is not an image.");
  //   }

  //   // File size limit: 5MB
  //   if ($_FILES['thumbnail']['size'] > 5 * 1024 * 1024) {
  //     die("Sorry, your file is too large. Maximum size is 5MB.");
  //   }

  //   // Allowed file types
  //   if (!in_array($imageFileType, $allowedTypes)) {
  //     die("Sorry, only JPG, JPEG, PNG, & GIF files are allowed.");
  //   }

  //   // File must not already exist
  //   if (file_exists($targetFile)) {
  //     die("Sorry, file already exists.");
  //   }

  //   // Attempt to move the uploaded file
  //   if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetFile)) {
  //     echo "File uploaded successfully: $targetFile";
  //   } else {
  //     die("Sorry, there was an error uploading your file.");
  //   }
  // } else {
  //   die("File upload error: " . $_FILES['thumbnail']['error']);
  // }








  // $lectures = $_POST['lectures'];

  // print_r($lectures);
  // // print_r($_POST);

  // if (!empty($lectures)) {
  //   foreach ($lectures as $lectureId => $lecture) {
  //     echo "<h2>Lecture $lectureId: " . htmlspecialchars($lecture['title']) . "</h2>";

  //     if (!empty($lecture['topic_name'])) {
  //       echo "<ul>";
  //       foreach ($lecture['topic_name'] as $topic) {
  //         echo "<li>" . htmlspecialchars($topic) . "</li>";
  //       }
  //       echo "</ul>";
  //     }
  //   }
  // }

  // $title = trim($_POST['title']);
  // $short_desc = trim($_POST['short_desc']);
  // $description = trim($_POST['description']);
  // $thumbnail = trim($_POST['thumbnail']);
  // $intro = trim($_POST['intro']);
  // $duration = trim($_POST['duration']);
  // $instructor = trim($_POST['instructor']);





  // if (empty($username) || empty($password)) {
  //   $error = "Username and password are required.";
  // } else {
  //   // Check the database for user
  //   $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = :username");
  //   $stmt->execute(['username' => $username]);
  //   $user = $stmt->fetch(PDO::FETCH_ASSOC);

  //   if ($user && password_verify($password, $user['password'])) {
  //     // Successful login
  //     $_SESSION['user_id'] = $user['id'];
  //     $_SESSION['username'] = $username;
  //     header("Location: dashboard.php");
  //     exit();
  //   } else {
  //     $error = "Invalid username or password.";
  //   }
  // }
}
