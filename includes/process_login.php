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
        header("Location: ../sign_in.php");
        exit();
    } else {
        // Check the database for the user
        $stmt = $conn->prepare("SELECT id, role, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email); // Bind the email parameter
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password']) && $user['role'] == '1') {
            // Successful student login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['showAlert'] = "Login successful!";
            header("Location: ../student/profile.php");
            exit();
        }else if($user && password_verify($password, $user['password']) && $user['role'] == '2'){
            // Successful admin login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['showAlert'] = "Login successful!";
            header("Location: ../admin/dashboard.php");
            exit();
        } else {
            // Invalid credentials
            $_SESSION['showErr'] = "Invalid email or password.";
            header("Location: ../sign_in.php");
            exit();
        }
    }
}
?>
