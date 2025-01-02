<?php
$pageTitle = "Admin Panel";
ob_start();
?>

<h1>Hello Bangladesh</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, sunt?</p>



<?php
$content = ob_get_clean();
include('layout.php');
?>