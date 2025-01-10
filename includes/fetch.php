<?php

// fetch record
function fetch_record($conn, $table, $id)
{ // preparing sql query
  $sql = "SELECT * FROM $table WHERE id = $id";

  // return the result
  if ($result = $conn->query($sql)) {
    $row = $result->fetch_assoc();
    $result->close();
    return $row;
  } else {
    $_SESSION['error_message'] = "Error: " . $conn->error;
    return null;
  }
}

function fetch_records($conn, $table, $options = [])
{
  // Default values
  $conditions = $options['conditions'] ?? null;
  $limit = $options['limit'] ?? null;
  $offset = $options['offset'] ?? 0;

  // preparing sql query
  $sql = "SELECT * FROM $table";
  if (!empty($conditions)) $sql .= " WHERE $conditions";
  $sql .= " ORDER BY id DESC";
  if (!is_null($limit)) $sql .= " LIMIT $limit OFFSET $offset";

  // initial result
  $results = [];
  $total_records = 0;

  // fetching data form database
  if ($result = $conn->query($sql)) {
    $results = $result->fetch_all(MYSQLI_ASSOC);
    $result->close();
  }

  // Fetch total records for pagination
  $count_sql = "SELECT COUNT(*) AS total FROM $table";
  if (!empty($conditions)) {
    $count_sql .= " WHERE $conditions";
  }

  // getting total
  if ($count_result = $conn->query($count_sql)) {
    $total_row = $count_result->fetch_assoc();
    $total_records = $total_row['total'];
    $count_result->close();
  }

  // return result
  return [
    'data' => $results,
    'total' => $total_records
  ];
}
