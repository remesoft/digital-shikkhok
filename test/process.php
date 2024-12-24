<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $courseTitle = $_POST['courseTitle'];
  $lectures = $_POST['lectures'];

  // Process course details
  echo "<h1>Course Title: $courseTitle</h1>";

  if (!empty($lectures)) {
    foreach ($lectures as $lectureId => $lecture) {
      echo "<h2>Lecture $lectureId: " . htmlspecialchars($lecture['title']) . "</h2>";

      if (!empty($lecture['topics'])) {
        echo "<ul>";
        foreach ($lecture['topics'] as $topic) {
          echo "<li>" . htmlspecialchars($topic) . "</li>";
        }
        echo "</ul>";
      }
    }
  }
}
