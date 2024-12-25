<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Directory where uploaded files will be saved
  $uploadDir = 'uploads/';

  // Ensure the upload directory exists
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
  }

  // File information
  $uploadFile = $uploadDir . basename($_FILES['file']['name']);
  $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
  $allowedTypes = ['jpg', 'png', 'gif', 'pdf', 'docx']; // Add allowed file extensions here

  // Check if file type is allowed
  if (!in_array($fileType, $allowedTypes)) {
    echo "Error: File type not allowed.";
  } elseif ($_FILES['file']['size'] > 5000000) { // 5MB limit
    echo "Error: File size exceeds the limit.";
  } elseif (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
    echo "The file " . htmlspecialchars(basename($_FILES['file']['name'])) . " has been uploaded.";
  } else {
    echo "Error: There was an error uploading your file.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>File Upload</title>
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    <label for="file">Choose file to upload:</label>
    <input type="file" name="file" id="file" required>
    <button type="submit">Upload File</button>
  </form>
</body>

</html>