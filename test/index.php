<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AJAX Example with JavaScript</title>
</head>

<body>
  <h1>AJAX with JavaScript Example</h1>

  <!-- Button to trigger AJAX -->
  <button id="loadData">Load Data</button>

  <!-- Area to display the result -->
  <div id="result"></div>

  <script>
    document.getElementById('loadData').addEventListener('click', function() {
      const xhr = new XMLHttpRequest();

      // Configure the request
      xhr.open('POST', 'server.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      // Handle the response
      xhr.onload = function() {
        if (xhr.status === 200) {
          // Update the result area with the response
          document.getElementById('result').innerHTML = xhr.responseText;
        } else {
          // Handle errors
          alert('An error occurred while processing the request.');
        }
      };

      // Send the request with data
      xhr.send('action=fetch_data');
    });
  </script>
</body>

</html>