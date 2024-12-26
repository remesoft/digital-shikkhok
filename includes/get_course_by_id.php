<?php
function get_course_by_id($conn, $course_id)
{
  // Query to fetch course, lectures, and topics with proper aliases
  $sql = "
        SELECT 
            c.id AS course_id, 
            c.title AS course_title,
            c.short_desc AS course_short_desc,
            c.thumbnail AS course_thumbnail,
            c.video AS course_video,
            c.description AS course_description, 
            c.duration AS course_duration, 
            c.price AS course_price,
            c.updated_at As course_updated_at,
            l.id AS lecture_id, 
            l.title AS lecture_title, 
            t.id AS topic_id, 
            t.title AS topic_title, 
            t.video AS topic_video
        FROM 
            courses c
        LEFT JOIN 
            lectures l ON l.course_id = c.id
        LEFT JOIN 
            topics t ON t.lecture_id = l.id
        WHERE 
            c.id = ?
    ";

  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $course = null;

    // Process the result
    while ($row = $result->fetch_assoc()) {
      // Initialize course details
      if ($course === null) {
        $course = [
          'id' => $row['course_id'],
          'title' => $row['course_title'],
          'short_desc' => $row['course_short_desc'],
          'thumbnail' => $row['course_thumbnail'],
          'video' => $row['course_video'],
          'description' => $row['course_description'],
          'duration' => $row['course_duration'],
          'price' => $row['course_price'],
          'updated_at' => $row['course_updated_at'],
          'lectures' => [],
        ];
      }

      // Add lecture details if present
      if (!empty($row['lecture_id'])) {
        $lecture_id = $row['lecture_id'];

        if (!isset($course['lectures'][$lecture_id])) {
          $course['lectures'][$lecture_id] = [
            'id' => $lecture_id,
            'title' => $row['lecture_title'],
            'topics' => [],
          ];
        }

        // Add topic details if present
        if (!empty($row['topic_id'])) {
          $course['lectures'][$lecture_id]['topics'][] = [
            'id' => $row['topic_id'],
            'title' => $row['topic_title'],
            'video' => $row['topic_video'],
          ];
        }
      }
    }

    $stmt->close();
    return $course; // Return the course with lectures and topics
  } else {
    echo "Error: " . $conn->error;
    return null;
  }
}

function get_total_lectures($course)
{
  $total_topics = 0;

  if (!empty($course['lectures'])) {
    foreach ($course['lectures'] as $lecture) {
      if (!empty($lecture['topics'])) {
        $total_topics += count($lecture['topics']);
      }
    }
  }

  return $total_topics;
}
