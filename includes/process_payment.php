<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate user input
    $phone = htmlspecialchars(trim($_POST['phone']));
    $tnx_id = htmlspecialchars(trim($_POST['tnx_id']));
    $course_id = htmlspecialchars(trim($_POST['course_id']));
    $user_id = $_SESSION['user_id'];

    // Check if required fields are provided
    if (empty($phone) || empty($tnx_id) || empty($course_id) || empty($user_id)) {
        $_SESSION['error_message'] = "All fields are required.";
        $_SESSION['error_type'] = "alert-danger";
        header("Location: ../checkout.php?id=$course_id");
        exit;
    }

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO enrollments (user_id, course_id, phone, tnx_id) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error_message'] = "Error preparing query: " . $conn->error;
        $_SESSION['error_type'] = "alert-danger";
        header("Location: ../checkout.php?id=$course_id");
        exit;
    }

    // Bind the parameters to the query
    $stmt->bind_param("iiss", $user_id, $course_id, $phone, $tnx_id);

    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Congratulations 🎉🎉. Your enrollment is successful!";
        $_SESSION['success_type'] = "alert-success";
        header("Location: ../student/profile.php");
        exit;
    } else {
        $_SESSION['error_message'] = "Error enrolling: " . $stmt->error;
        $_SESSION['error_type'] = "alert-danger";
        header("Location: ../checkout.php?id=$course_id");
        exit;
    }

    // Connection X
    $stmt->close();
    $conn->close();
}
