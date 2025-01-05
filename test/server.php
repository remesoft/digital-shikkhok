<?php
// Check if the request is an AJAX POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
  if ($_POST['action'] === 'fetch_data') {
    // Simulate data fetching (e.g., from a database)
    echo "Hello, this is data from the server!";
  } else {
    echo "Invalid action.";
  }
} else {
  echo "Invalid request.";
}
