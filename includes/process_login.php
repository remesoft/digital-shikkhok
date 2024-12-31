<?php
session_start();
include_once "db.php";


// Initialize variables for feedback messages
$show_err = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and trim user inputs
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['pass']);

    if (empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Email and password are required.";
        header("Location: ../sign_in.php");
        exit();
    }

    // Check the database for the user
    $stmt = $conn->prepare("SELECT id, role, email, password, first_name FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Successful login based on role
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['success_message'] = "Welcome " . $user['first_name'] . ". Your login was successful!";

        echo "User id: " . $user['id'];
        // Redirect based on role
        $redirect_page = ($user['role'] == 'student') ? '../student/student_dashboard.php' : '../admin/dashboard.php';
        header("Location: $redirect_page");
        exit();
    }

    // Invalid credentials
    $_SESSION['error_message'] = "Invalid email or password.";
    header("Location: ../sign_in.php");
    exit();
}
