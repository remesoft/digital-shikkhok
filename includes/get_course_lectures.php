<?php 
function get_course_lectures($conn, $course_id) {
    $lectures = [];
    $stmt = $conn->prepare("SELECT * FROM lectures WHERE course_id = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        $lectures = $result->fetch_all(MYSQLI_ASSOC);
    }
    $stmt->close();
    return $lectures;
}

?>