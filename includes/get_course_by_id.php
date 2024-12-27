<?php
function get_course($conn, $course_id)
{
  // Sanitize the course ID to prevent SQL injection
  $course_id = mysqli_real_escape_string($conn, $course_id);
  $sql = "SELECT * FROM courses WHERE id = '$course_id'";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Check for query errors
  if (!$result) {
    $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
    if (isset($_SERVER['HTTP_REFERER'])) {
      header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
      header("Location: ../our_courses.php");
    }
    exit;
  }

  // Fetch the course
  $course = mysqli_fetch_assoc($result);

  // If no course is found, redirect to 404
  if (!$course) {
    http_response_code(404);
    header("Location: ../404.php");
    exit;
  }

  // Return the course if found
  return $course;
}



function get_detailed_course($conn, $course_id)
{
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
            c.total_lectures AS course_total_lectures,
            c.language AS course_language,
            c.updated_at AS course_updated_at,
            l.id AS lecture_id, 
            l.title AS lecture_title, 
            t.id AS topic_id, 
            t.title AS topic_title, 
            t.video AS topic_video,
            t.duration AS topic_duration,
            t.price AS topic_price
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
          'total_lectures' => $row['course_total_lectures'],
          'language' => $row['course_language'],
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
            'duration' => $row['topic_duration'],
            'price' => $row['topic_price'],
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

function count_topics($conn, $course_id)
{
  $total_topics = 0;
  $sql = "SELECT COUNT(*) AS total_topics FROM topics WHERE course_id = ?";
  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $stmt->bind_result($total_topics);
    $stmt->fetch();

    // Close the statement
    $stmt->close();

    // Return the total topic count
    return $total_topics;
  } else {
    // Handle errors and return 0 if the query fails
    echo "Error: " . $conn->error;
    return 0;
  }
}
