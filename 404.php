<?php
session_start();
include('includes/helpers.php');
$page_title = "404 | Page Not Found";
ob_start();
?>



<section class="pt-5">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <!-- Image -->
        <img src="assets/images/element/error404-01.svg" class="h-200px h-md-400px mb-4" alt="">
        <!-- Title -->
        <h1 class="display-1 text-danger mb-0">404</h1>
        <!-- Subtitle -->
        <h2>অহ না, কিছু ভুল হয়েছে!</h2>
        <!-- info -->
        <p class="mb-4">যা ঘটেছে তা হয়তো ভুল, অথবা এই পৃষ্ঠাটি আর নেই।</p>
        <!-- Button -->
        <a href="index.php" class="btn btn-primary mb-0">আমাকে হোমপেজে নিয়ে চলো</a>
      </div>
    </div>
  </div>
</section>



<?php
$content = ob_get_clean();
include('layouts/website.php');
?>