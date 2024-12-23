<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'student') {
    header('Location: login.php');
    exit();
}
$pageTitle = "Student Dashboard";
ob_start();
?>


<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<p>Here are your enrolled courses:</p>


<?php
$content = ob_get_clean();
include('layouts/student.php');
?>
