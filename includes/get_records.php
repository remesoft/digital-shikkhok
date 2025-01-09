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


function get_records_by_conditions_with_pagination($conn, $table_name, $conditions, $limit, $offset)
{
  $sql = "SELECT * FROM $table_name WHERE $conditions ORDER BY id DESC LIMIT $limit OFFSET $offset";

  $results = [];

  if ($result = $conn->query($sql)) {
    // Fetch all rows as an associative array
    while ($row = $result->fetch_assoc()) {
      $results[] = $row;
    }
    $result->close();
  } else {
    $_SESSION['error_message'] = "Error: " . $conn->error;
  }

  // Fetch total records for pagination
  $count_sql = "SELECT COUNT(*) AS total FROM $table_name WHERE $conditions";
  $total_records = 0;

  if ($count_result = $conn->query($count_sql)) {
    $total_row = $count_result->fetch_assoc();
    $total_records = $total_row['total'];
    $count_result->close();
  }

  return ['data' => $results, 'total' => $total_records];
}
