<?php
session_start();
include('includes/helpers.php');
$page_title = "Sign In | Digital Shikkhok";
ob_start();
?>


<section class="p-0 d-flex align-items-center position-relative overflow-hidden">

    <div class="container-fluid">
        <div class="row">
            <!-- left -->
            <div class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10">
                <div class="p-3 p-lg-5">
                    <!-- Title -->
                    <div class="text-center">
                        <h2 class="fw-bold">আমাদের বৃহত্তম কমিউনিটিতে আপনাকে স্বাগতম।</h2>
                        <p class="mb-0 h6 fw-light">চলুন আজ কিছু নতুন শিখি!</p>
                    </div>
                    <!-- SVG Image -->
                    <img src="assets/images/element/02.svg" class="mt-5" alt="">
                    <!-- Info -->
                    <div class="d-sm-flex mt-5 align-items-center justify-content-center">
                        <!-- Avatar group -->
                        <ul class="avatar-group mb-2 mb-sm-0">
                            <li class="avatar avatar-sm">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-sm">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-sm">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-sm">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
                            </li>
                        </ul>
                        <!-- Content -->
                        <p class="mb-0 h6 fw-light ms-0 ms-sm-3">৪,০০০+ শিক্ষার্থী যুক্ত হয়েছে, এখন আপনার পালা।</p>
                    </div>
                </div>
            </div>

            <!-- Right -->
            <div class="col-12 col-lg-6 m-auto">
                <!-- ----------------------------------- -->
                <!--         Alert Dialog                -->
                <!-- ----------------------------------- -->
                <?php
                if (isset($_SESSION['error_message']) || isset($_SESSION['success_message'])) {
                    $alert_type = isset($_SESSION['error_message']) ? 'warning' : 'success';
                    $message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : $_SESSION['success_message'];
                ?>
                    <div class="alert alert-<?= $alert_type ?> alert-dismissible fade show" role="alert">
                        <strong><?= $alert_type === 'warning' ? 'Error:' : 'Success:' ?></strong> <?= htmlspecialchars($message) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    if ($alert_type === 'warning') {
                        unset($_SESSION['error_message']);
                    } else {
                        unset($_SESSION['success_message']);
                    }
                }
                ?>
                <div class="row my-5">
                    <div class="col-sm-10 col-xl-8 m-auto">
                        <span class="mb-0 fs-1">👋</span>
                        <h1 class="fs-2">লগইন করুন।</h1>
                        <p class="lead mb-4">আপনার ইমেইল এবং পাসওয়ার্ড দিয়ে লগইন করুন।</p>
                        <!-- Form START -->
                        <form action="./includes/process_login.php" method="POST">
                            <!-- Email -->
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">আপনার ইমেইল অ্যাড্রেস দিন। *</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="name@domain.com" id="email" name="email" required>
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="mb-4">
                                <label for="inputPassword5" class="form-label">আপনার পাসওয়ার্ড দিন। *</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="●●●●●●●●●" id="pass" name="pass" required>
                                    <span class="input-group-text p-0 border-0" id="password-view-login" style="cursor: pointer;" onclick="togglePassword('pass')">
									    <i class="far fa-eye cursor-pointer p-2 w-40px"></i>
								    </span>
                                </div>
                                <div id="passwordHelpBlock" class="form-text">
                                    আপনার পাসওয়ার্ড কমপক্ষে ৮টি অক্ষর হতে হবে।
                                </div>
                            </div>
                            <!-- Check box -->
                            <div class="mb-4 d-flex justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">আমাকে মনে রাখুন</label>
                                </div>
                                <div class="text-primary-hover">
                                    <a href="forgot-password.html" class="text-secondary">
                                        <u>পাসওয়ার্ড ভুলে গেছেন?</u>
                                    </a>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="align-items-center mt-0">
                                <div class="d-grid">
                                    <button class="btn btn-primary mb-0" type="submit">লগইন করুন।</button>
                                </div>
                            </div>
                        </form>
                        <!-- Form END -->

                        <!-- Social buttons and divider -->
                        <div class="row">
                            <!-- Divider with text -->
                            <div class="position-relative my-4">
                                <hr>
                                <p class="small position-absolute top-50 start-50 translate-middle bg-body px-5">Or</p>
                            </div>

                            <!-- Social btn -->
                            <div class="col-xxl-6 d-grid">
                                <a href="coming_soon.php" class="btn bg-google mb-2 mb-xxl-0"><i class="fab fa-fw fa-google text-white me-2"></i>গুগল দিয়ে লগইন করুন।</a>
                            </div>
                            <!-- Social btn -->
                            <div class="col-xxl-6 d-grid">
                                <a href="coming_soon.php" class="btn bg-facebook mb-0"><i class="fab fa-fw fa-facebook-f me-2"></i>
                                    ফেসবুক দিয়ে লগইন করুন।</a>
                            </div>
                        </div>

                        <!-- Sign up link -->
                        <div class="mt-4 text-center">
                            <span>আপনার অ্যাকাউন্ট নেই? <a href="sign_up.php">সাইন আপ করুন।</a></span>
                        </div>
                    </div>
                </div> <!-- Row END -->
            </div>
        </div> <!-- Row END -->
    </div>
</section>

<?php
$content = ob_get_clean();
include('layouts/website.php');
?>