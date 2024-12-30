<?php
function get_enrollments($conn)
{
  $sql = "SELECT * FROM enrollments ORDER BY id DESC";

  if ($result = $conn->query($sql)) {
    $courses = [];

    // Fetch all rows as an associative array
    while ($row = $result->fetch_assoc()) {
      $courses[] = $row;
    }

    $result->close();
    return $courses;
  } else {
    echo "Error: " . $conn->error;
    return [];
  }
}
