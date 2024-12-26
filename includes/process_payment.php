<?php
session_start();
include('db.php');
include('get_user_by_email.php');
// Initialize variables for feedback messages
$showAlert = false;
$showErr = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = htmlspecialchars(trim($_POST['phone']));
    $trx_id = htmlspecialchars(trim($_POST['trx_id']));
    $course_id = htmlspecialchars(trim($_POST['course_id']));
    $user = get_user($conn, $_SESSION['user_email']);
    if (!empty($phone) && !empty($trx_id)) {
        $sql = "INSERT INTO enrollments (course_id, user_id, phone, txn_id) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $course_id, $user['id'], $phone, $trx_id);

        if ($stmt->execute()) {
            $_SESSION['showAlert'] = "Payment successful";
            header('Location: ../checkout.php');
            exit();
        } else {
            $_SESSION['showErr'] = "Error: " . $conn->error;
            header('Location: ../checkout.php');
            exit();
        }
    }else{
        $_SESSION['showAlert'] = "Please fill all fields";
        header('Location: ../checkout.php');
        exit();
    }
}
else{
    $_SESSION['showErr'] = "Not a POST request";
    header('Location: ../checkout.php');
    exit();
}
