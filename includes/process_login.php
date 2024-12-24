<?php
session_start();
include_once "db.php";

// Initialize variables for feedback messages
$showAlert = false;
$showErr = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and trim user inputs
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['pass']);

    if (empty($email) || empty($password)) {
        $_SESSION['showErr'] = "Email and password are required.";
        header("Location: ../signIn.php");
        exit();
    } else {
        // Check the database for the user
        $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email); // Bind the email parameter
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            // Successful login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['showAlert'] = "Login successful!";
            header("Location: ../index.php");
            exit();
        } else {
            // Invalid credentials
            $_SESSION['showErr'] = "Invalid email or password.";
            header("Location: ../signIn.php");
            exit();
        }
    }
}
