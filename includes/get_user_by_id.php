<?php

function get_user($conn, $user_id)
{
    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    if (!$stmt) {
        // If the statement preparation fails, return an error
        echo "Error preparing statement: " . $conn->error;
        return null;
    }

    // Bind the user_id parameter to the prepared statement
    $stmt->bind_param("s", $user_id);

    // Execute the query
    if (!$stmt->execute()) {
        echo "Error executing query: " . $stmt->error;
        return null;
    }

    // Get the result
    $result = $stmt->get_result();

    // Check if any row is returned
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    } else {
        echo "No user found with the given email.";
        $stmt->close();
        return null;
    }
}
?>