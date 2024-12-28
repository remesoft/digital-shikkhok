<?php 
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_email'] && $_SESSION['user_role'] = true) {

    session_unset();
    session_destroy();
    header("location: ../index.php");
}

?>