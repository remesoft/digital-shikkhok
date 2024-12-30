<?php
$pageTitle = "Admin Panel";
ob_start();
?>


<h1>Admin Dashboard</h1>
<p>Welcome to the admin panel. Manage your site here.</p>



<?php
$content = ob_get_clean();
include('../layouts/admin.php');
?>