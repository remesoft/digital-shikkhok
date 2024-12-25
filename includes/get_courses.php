<?php
function get_courses($conn)
{
  // Query to fetch course data
  $sql = "SELECT * FROM courses";

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
