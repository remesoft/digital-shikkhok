<?php

function upload_image()
{
  // Directory where uploaded files will be saved
  $uploadDir = '../uploads/img/courses/';

  // Ensure the upload directory exists
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
  }

  // Generate a unique name for the file using current timestamp and file extension
  $timestamp = time();
  $fileExtension = strtolower(pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION));
  $newFileName = $timestamp . '_' . uniqid() . '.' . $fileExtension;

  // File path with the new name
  $uploadFile = $uploadDir . $newFileName;

  // Allowed file types
  $allowedTypes = ['jpg', 'png', 'gif', 'pdf', 'docx'];

  // Check if file type is allowed
  if (!in_array($fileExtension, $allowedTypes)) {
    echo "Error: File type not allowed.";
  } elseif ($_FILES['thumbnail']['size'] > 5000000) { // 5MB limit
    echo "Error: File size exceeds the limit.";
  } elseif (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadFile)) {
    return $newFileName;
  } else {
    echo "Error: There was an error uploading your file.";
  }
}
