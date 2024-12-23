<?php
session_start();
$pageTitle = "Home";
ob_start();
?>


<h1>Welcome to My Courses Website</h1>
<p>This is the public homepage.</p>


<?php
$content = ob_get_clean();
include('layouts/website.php');
?>