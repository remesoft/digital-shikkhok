<?php 
function get_course_topics($conn, $lecture_id) {
    $topics = [];
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM topics WHERE lecture_id = ?");
    $stmt->bind_param("i", $lecture_id); // Bind course_id as an integer
    $stmt->execute();
    
    $result = $stmt->get_result();
    if ($result) {
        $topics = $result->fetch_all(MYSQLI_ASSOC);
    }
    
    // Close statement and return topics
    $stmt->close();
    return $topics;
}
?>
