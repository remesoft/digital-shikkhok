<?php
session_start();
include_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and trim user inputs
    $first_name = htmlspecialchars(trim($_POST['fname']));
    $last_name = htmlspecialchars(trim($_POST['lname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $password = trim($_POST['pass']);
    $confirm_password = trim($_POST['cpass']);

    // Validate required fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error_message'] = "All fields are required!";
        header("Location: ../sign_up.php");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Invalid email format!";
        header("Location: ../sign_up.php");
        exit();
    }

    // Validate password match
    if ($password !== $confirm_password) {
        $_SESSION['error_message'] = "Passwords do not match!";
        header("Location: ../sign_up.php");
        exit();
    }

    // Validate password strength
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
        $_SESSION['error_message'] = "Password must be at least 8 characters long and include at least one letter and one number.";
        header("Location: ../sign_up.php");
        exit();
    }

    // Check if user already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error_message'] = "User already exists with this email!";
        $stmt->close();
        header("Location: ../sign_up.php");
        exit();
    }
    $stmt->close();

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user into the database
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Registration successful! Welcome, $first_name.";
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_role'] = 'student';
        $stmt->close();
        $conn->close();
        header("Location: ../student/student_dashboard.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Registration failed. Please try again.";
        $stmt->close();
        $conn->close();
        header("Location: ../sign_up.php");
        exit();
    }
}
