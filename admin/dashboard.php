<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != '2') {
    header('Location: ../sign_in.php');
    exit();
}
$pageTitle = "Admin Panel";
ob_start();
?>


<h1>Admin Dashboard</h1>
<p>Welcome to the admin panel. Manage your site here.</p>



<?php
$content = ob_get_clean();
include('../layouts/admin.php');
?>
