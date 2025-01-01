<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/helpers.php');
include('../includes/get_courses.php');

// variables
$page_title = "Student Profile | Student Panel | Digital Shikkhok";
ob_start();
?>


<h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_email']); ?>!</h1>
<p>Here are your enrolled courses:</p>


<?php
$content = ob_get_clean();
include('../layouts/student.php');
?>