<?php
function get_records($conn, $table_name)
{
  $sql = "SELECT * FROM $table_name ORDER BY id DESC";

  if ($result = $conn->query($sql)) {
    $results = [];

    // Fetch all rows as an associative array
    while ($row = $result->fetch_assoc()) {
      $results[] = $row;
    }

    $result->close();
    return $results;
  } else {
    $_SESSION['error_message'] = "Error: " . $conn->error;
    return [];
  }
}

function get_records_by_conditions($conn, $table_name, $conditions)
{
  $sql = "SELECT * FROM $table_name WHERE $conditions ORDER BY id DESC";

  if ($result = $conn->query($sql)) {
    $results = [];

    // Fetch all rows as an associative array
    while ($row = $result->fetch_assoc()) {
      $results[] = $row;
    }

    $result->close();
    return $results;
  } else {
    $_SESSION['error_message'] = "Error: " . $conn->error;
    return [];
  }
}
