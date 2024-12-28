<?php 
session_start();
include '../includes/db.php';
if (isset($_POST['update_password'])) {
    $user_id = $_SESSION['user_id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password != $confirm_password) {
        $_SESSION['error_message'] = "Passwords do not match.";
        $_SESSION['error_type'] = "alert-success";
        header("location: ../student/student_edit_profile.php");
        exit();
    }

    $sql = "SELECT password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($current_password, $hashed_password)) {
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $hashed_new_password, $user_id);

            if ($stmt->execute()) {
                $_SESSION['error_message'] = "Password updated successfully!";
                $_SESSION['error_type'] = "alert-success";
                header("location: ../student/student_edit_profile.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Error updating password.";
                $_SESSION['error_type'] = "alert-danger";
                header("location: ../student/student_edit_profile.php");
                exit();
            }

            $stmt->close();
            $conn->close();
        } else {
            $_SESSION['error_message'] = "Incorrect current password.";
            $_SESSION['error_type'] = "alert-danger";
            header("location: ../student/student_edit_profile.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "User not found.";
        $_SESSION['error_type'] = "alert-danger";
        header("location: ../student/student_edit_profile.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}else{
    $_SESSION['error_message'] = "Invalid request.";
    $_SESSION['error_type'] = "alert-danger";
    header("location: ../student/student_edit_profile.php");
    exit();
}
?>