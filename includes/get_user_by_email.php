<?php
function get_user($conn, $email)
{
  $sql = "SELECT * FROM users WHERE email = '$email'";

  if ($result = $conn->query($sql)) {
    $user = null;

    // Fetch all rows as an associative array
    while ($row = $result->fetch_assoc()) {
      $user = $row;
    }

    $result->close();
    return $user;
  } else {
    echo "Error: " . $conn->error;
    return [];
  }
}
