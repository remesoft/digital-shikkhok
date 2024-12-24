<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Course</title>
  <style>
    .lecture {
      margin-bottom: 20px;
    }

    .topic {
      margin-left: 20px;
    }
  </style>
</head>

<body>
  <h1>Add Course</h1>
  <form id="courseForm" action="process.php" method="POST">
    <label for="courseTitle">Course Title:</label>
    <input type="text" id="courseTitle" name="courseTitle" required><br><br>

    <div id="lecturesContainer">
      <h3>Lectures</h3>
    </div>
    <button type="button" id="addLectureButton">Add Lecture</button><br><br>

    <button type="submit">Submit Course</button>
  </form>

  <script>
    const lecturesContainer = document.getElementById('lecturesContainer');
    const addLectureButton = document.getElementById('addLectureButton');

    let lectureCount = 0;

    addLectureButton.addEventListener('click', () => {
      lectureCount++;

      // Create a lecture section
      const lectureDiv = document.createElement('div');
      lectureDiv.classList.add('lecture');
      lectureDiv.dataset.lectureId = lectureCount;

      lectureDiv.innerHTML = `
                <h4>Lecture ${lectureCount}</h4>
                <label for="lectureTitle${lectureCount}">Title:</label>
                <input type="text" id="lectureTitle${lectureCount}" name="lectures[${lectureCount}][title]" required>
                <button type="button" class="addTopicButton">Add Topic</button>
                <div class="topicsContainer"></div>
                <button type="button" class="removeLectureButton">Remove Lecture</button>
                <br><br>
            `;

      lecturesContainer.appendChild(lectureDiv);

      const addTopicButton = lectureDiv.querySelector('.addTopicButton');
      const topicsContainer = lectureDiv.querySelector('.topicsContainer');

      let topicCount = 0;

      addTopicButton.addEventListener('click', () => {
        topicCount++;

        // Create a topic input
        const topicDiv = document.createElement('div');
        topicDiv.classList.add('topic');
        topicDiv.innerHTML = `
                    <label for="topic${lectureCount}_${topicCount}">Topic ${topicCount}:</label>
                    <input type="text" id="topic${lectureCount}_${topicCount}" name="lectures[${lectureCount}][topics][]" required>
                    <button type="button" class="removeTopicButton">Remove Topic</button>
                `;

        topicsContainer.appendChild(topicDiv);

        const removeTopicButton = topicDiv.querySelector('.removeTopicButton');
        removeTopicButton.addEventListener('click', () => {
          topicsContainer.removeChild(topicDiv);
        });
      });

      const removeLectureButton = lectureDiv.querySelector('.removeLectureButton');
      removeLectureButton.addEventListener('click', () => {
        lecturesContainer.removeChild(lectureDiv);
      });
    });
  </script>
</body>

</html>