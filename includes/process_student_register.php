<?php
session_start();
include_once "db.php";

// Initialize variables for feedback messages
$showAlert = false;
$showErr = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = htmlspecialchars(trim($_POST['fname']));
    $lname = htmlspecialchars(trim($_POST['lname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $pass = trim($_POST['pass']);
    $cpass = trim($_POST['cpass']);

    // Check if all required fields are filled
    if (empty($fname) || empty($lname) || empty($email) || empty($pass) || empty($cpass)) {
        $_SESSION['showErr'] = "All input fields are required!";
        header("location: ../sign_up.php");
        exit();
    }

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['showErr'] = "Invalid email format!";
        header("location: ../sign_up.php");
        exit();
    }

    // Check if passwords match
    if ($pass !== $cpass) {
        $_SESSION['showErr'] = "Passwords do not match!";
        header("location: ../sign_up.php");
        exit();
    }

    // Check password strength (example: minimum 8 characters, at least one letter and one number)
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $pass)) {
        $_SESSION['showErr'] = "Password must be at least 8 characters long and include at least one letter and one number.";
        header("location: ../sign_up.php");
        exit();
    }

    // Check if the user already exists
    $existSql = "SELECT id FROM `users` WHERE email = ?";
    $stmt = $conn->prepare($existSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['showErr'] = "User already exists with this email!";
        $stmt->close();
        header("location: ../sign_up.php");
        exit();
    }
    $stmt->close();

    // Hash the password
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // Insert user into the database
    $sql = "INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fname, $lname, $email, $phone, $hashed_pass);

    if ($stmt->execute()) {
        $_SESSION['showAlert'] = "Registration successful! Please log in.";
        $_SESSION['showErr'] = null;
        $stmt->close();
        $conn->close();
        header("location: ../sign_up.php");
        exit();
    } else {
        $_SESSION['showErr'] = "Registration failed. Please try again.";
        $stmt->close();
        $conn->close();
        header("location: ../sign_up.php");
        exit();
    }
}
?>

