<?php
// Include database connection
include_once 'db.php';

header('Content-Type: application/json');

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'] ?? null;

if ($user_id) {
    // Fetch the current profile photo path
    $query = "SELECT avatar FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $user['avatar']) {
        $photo_path = "../uploads/img/users/" . $user['avatar'];

        // Delete the file from the server
        if (file_exists($photo_path)) {
            unlink($photo_path);
        }

        // Update the database to remove the avatar
        $update_query = "UPDATE users SET avatar = NULL WHERE id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("i", $user_id);

        if ($update_stmt->execute()) {
            echo json_encode(['success' => true]);
            exit;
        }
    }
}

echo json_encode(['success' => false]);
exit;
?>
