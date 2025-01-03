<?php


function get_record($conn, $table_name, $id)
{
  $sql = "SELECT * FROM $table_name WHERE id = $id";

  if ($result = $conn->query($sql)) {
    $row = $result->fetch_assoc();
    $result->close();
    return $row;
  } else {
    $_SESSION['error_message'] = "Error: " . $conn->error;
    return null;
  }
}
