<?php
session_start();
include '../includes/db.php';

if (isset($_POST['update_profile'])) {
    $user_id = $_SESSION['user_id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $phone = $_POST['phone'];

    // Validate and process the avatar upload
    $target_dir = "../uploads/img/users/"; // Directory for uploaded files
    $uploadOk = 1;

    // Check if a file was uploaded
    if (!empty($_FILES["avatar"]["name"])) {
        // Get file extension and validate
        $imageFileType = strtolower(pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Check file type
        if (!in_array($imageFileType, $allowed_extensions)) {
            $uploadOk = 0;
            $_SESSION['error_message'] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
            $_SESSION['error_type'] = "alert-danger";
            header("location: ../student/student_edit_profile.php");
            exit();
        }

        // Check file size (limit to 5 MB)
        if ($_FILES["avatar"]["size"] > 5000000) {
            $uploadOk = 0;
            $_SESSION['error_message'] = "Your file is too large (limit: 5 MB).";
            $_SESSION['error_type'] = "alert-danger";
            header("location: ../student/student_edit_profile.php");
            exit();
        }

        // Generate a unique file name to avoid conflicts
        $new_file_name = uniqid("avatar_", true) . '.' . $imageFileType;
        $target_file = $target_dir . $new_file_name;

        // Attempt to move the uploaded file
        if ($uploadOk && move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $profile_image = $new_file_name; // Save only the file name
        } else {
            $_SESSION['error_message'] = "There was an error uploading your file.";
            $_SESSION['error_type'] = "danger";
            header("location: ../student/student_edit_profile.php");
            exit();
        }
    } else {
        // If no file is uploaded, keep the existing avatar
        $profile_image = $_SESSION['user_image'];
    }

    // Update user profile in the database
    $sql = "UPDATE users SET first_name = ?, last_name = ?, phone = ?, avatar = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $first_name, $last_name, $phone, $profile_image, $user_id);

    if ($stmt->execute()) {
        $_SESSION['error_message'] = "Profile updated successfully!";
        $_SESSION['error_type'] = "alert-success";
        $_SESSION['user_image'] = $profile_image; // Update session with the new file name
        header("location: ../student/student_edit_profile.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Profile update failed. Please try again.";
        $_SESSION['error_type'] = "alert-success";
        header("location: ../student/student_edit_profile.php");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("location: ../student/student_edit_profile.php");
    exit();
}
?>
