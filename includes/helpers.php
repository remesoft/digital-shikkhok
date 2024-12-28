<?php

function upload_image($path, $field)
{
  // Ensure the upload directory exists
  if (!is_dir($path)) {
    mkdir($path, 0755, true);
  }

  // Generate a unique name for the file using current timestamp and file extension
  $timestamp = time();
  $file_extension = strtolower(pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION));
  $new_file_name = $timestamp . '_' . uniqid() . '.' . $file_extension;

  // File path with the new name
  $upload_file = $path . $new_file_name;

  // Allowed file types
  $allowed_types = ['jpg', 'png', 'gif', 'pdf', 'docx'];

  // Check if file type is allowed
  if (!in_array($file_extension, $allowed_types)) {
    echo "Error: File type not allowed.";
  } elseif ($_FILES[$field]['size'] > 5000000) { // 5MB limit
    echo "Error: File size exceeds the limit.";
  } elseif (move_uploaded_file($_FILES[$field]['tmp_name'], $upload_file)) {
    return $new_file_name;
  } else {
    echo "Error: There was an error uploading your file.";
  }
}

function get_checkout_link($course_id)
{
  if (isset($_SESSION['user_email'])) {
    return "./checkout.php?id=$course_id";
  } else {
    $message = "Please log in or sign up to checkout this course.";
    $_SESSION['error_message'] = $message;
    return "./sign_up.php";
  }
}

// Get payment History of a user
function get_payment_records($user_id, $conn)
{
  $sql = "SELECT * FROM enrollments WHERE user_id = $user_id";
  $result = $conn->query($sql);
  $records = [];
  if ($result->num_rows > 0) {

    $records = $result->fetch_all(MYSQLI_ASSOC);
  } else {
    $records = [];
  }

  return $records;
}


// Get the erolled courses
function get_enrolled_course($conn, $user_id)
{
  $sql = "SELECT courses.* FROM enrollments JOIN courses ON enrollments.course_id = courses.id WHERE enrollments.user_id = $user_id AND enrollments.confirm = '1'";
  $result = $conn->query($sql);

  $courses = [];

  if ($result->num_rows > 0) {
    $courses = $result->fetch_all(MYSQLI_ASSOC);
  } else {
    $courses = [];
  }

  return $courses;
}
// include('includes/get_user_by_email.php');
// $user = get_user($conn, $_SESSION['user_email']);
// if (isset($_GET['id'])) {
// 	$course_id = $_GET['id'];
// } else {
// 	// Handle the error (e.g., redirect or show an error message)
// 	$course_id = null;
// }

function get_status_classes($status)
{
  $classes = [
    'success' => 'bg-success text-success',
    'pending' => 'bg-orange text-orange',
    'cancel'  => 'bg-danger text-danger'
  ];

  return $classes[$status] ?? 'bg-gray';
}

function is_active_page($page)
{
  $current_page = basename($_SERVER['PHP_SELF']);
  return  $current_page == $page ? 'active' : '';
}
