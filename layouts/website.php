<?php
// Start session
if (!isset($_SESSION)) {
    session_start();
}
include_once('./includes/db.php');
include_once('./includes/get_user_by_id.php');
include_once('./includes/helpers.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $page_title ?? 'Digital Shikkhok' ?></title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Md. Sharif Ahmed">
    <meta name="description" content="Digital Shikkhok - Online Learning Platform">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
        }

        const setTheme = function(theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if (el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })
    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/glightbox/css/glightbox.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        body {
            font-family: 'Hind Siliguri', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        span,
        p {
            font-family: 'Hind Siliguri', sans-serif;
        }
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7N7LGGGWT1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-7N7LGGGWT1');
    </script>
</head>

<body>

    <!-- ----------------------------------- -->
    <!--         Header Start                -->
    <!-- ----------------------------------- -->
    <header class="navbar-light navbar-sticky header-static py-3 mb-2">
        <div class="container">
            <nav class="navbar navbar-expand-xl">
                <div class="container-fluid" style="padding: 0;">
                    <!-- logo start -->
                    <a href="/digital-shikkhok"><img class="navbar-logo" src="assets/images/logo.png" alt="logo"></a>

                    <!-- Responsive navbar toggler -->
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-animation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>

                    <!-- Main navbar START -->
                    <div class="navbar-collapse w-100 collapse" id="navbarCollapse">
                        <ul class="navbar-nav navbar-nav-scroll me-auto"></ul>
                        <ul class="navbar-nav navbar-nav-scroll me-auto" style="font-size: 17px;">
                            <li class="nav-item">
                                <a class="nav-link <?= is_active_page('index.php') ?>" href="index.php">
                                    হোম
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($_SERVER['PHP_SELF']) == '/digital-shikkhok/our_courses.php' && $_GET['type'] == 'free' ? 'active' : '' ?>" href="our_courses.php?type=free">
                                    ফ্রি কোর্স
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($_SERVER['PHP_SELF']) == '/digital-shikkhok/our_courses.php' && $_GET['type'] == 'paid' ? 'active' : '' ?>" href="our_courses.php?type=paid">
                                    পেইড কোর্স
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= is_active_page('about_us.php') ?>" href="about_us.php">
                                    আমাদের সম্পর্কে
                                </a>
                            </li>

                            <!-- <li class="nav-item">
                                <a class="nav-link" href="our_courses.php?type=paid">
                                    শিক্ষকগণ
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link <?= is_active_page('contact_us.php') ?>" href="contact_us.php">
                                    যোগাযোগ
                                </a>
                            </li>
                        </ul>
                    </div>

                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'student') {
                        // include    'includes/get_user_by_id.php';
                        include    'includes/db.php';
                        $user_id = $_SESSION['user_id'];
                        $user = get_user($conn, $user_id);
                    ?>
                        <div class="dropdown ms-1 ms-lg-0">
                            <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php if ($user['avatar']) { ?>
                                    <img class="avatar-img rounded-circle" src="uploads/img/users/<?php echo $user['avatar']; ?>" alt="avatar">
                                <?php } else { ?>
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/empty-profile.png" alt="avatar">
                                <?php } ?>
                            </a>

                            <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                                <!-- Profile info -->
                                <li class="px-3 mb-3">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar -->
                                        <div class="avatar me-3">
                                            <?php if ($user['avatar']) { ?>
                                                <img class="avatar-img rounded-circle" src="uploads/img/users/<?php echo $user['avatar']; ?>" alt="avatar">
                                            <?php } else { ?>
                                                <img class="avatar-img rounded-circle" src="assets/images/avatar/empty-profile.png" alt="avatar">
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <a class="h6" href="student/student_dashboard.php"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></a>
                                            <p class="small m-0"><?php echo $user['email']; ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <!-- Links -->
                                <li><a class="dropdown-item" href="student/student_edit_profile.php"><i class="bi bi-person fa-fw me-2"></i>এডিট প্রোফাইল</a></li>
                                <!-- <li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li> -->
                                <li><a class="dropdown-item" href="coming_soon.php"><i class="bi bi-info-circle fa-fw me-2"></i>সাহায্য</a></li>
                                <li><a class="dropdown-item bg-danger-soft-hover" href="includes/logout.php"><i class="bi bi-power fa-fw me-2"></i>সাইন আউট</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <!-- Dark mode options START -->
                                <li>
                                    <div class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
                                        <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
                                                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                                            </svg> Light
                                        </button>
                                        <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
                                                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                                                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                                            </svg> Dark
                                        </button>
                                        <button type="button" class="btn btn-sm mb-0 active" data-bs-theme-value="auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
                                            </svg> Auto
                                        </button>
                                    </div>
                                </li>
                                <!-- Dark mode options END-->
                            </ul>
                        </div>
                    <?php } else { ?>
                        <!-- Sign up Button -->
                        <a href="sign_in.php" class="px-4 py-2 bg-success d-inline-block rounded-5 shadow-lg text-white"
                            style="
                background: url(assets/images/pattern/01.png) no-repeat center center;
                background-size: cover;
                z-index: 20;
                white-space: nowrap;">লগিন/সাইনআপ</a>
                    <?php } ?>
            </nav>
        </div>
    </header>



    <!-- ----------------------------------- -->
    <!--       Main content goes here        -->
    <!-- ----------------------------------- -->
    <main><?php echo $content; ?></main>


    <!-- ----------------------------------- -->
    <!--       Footer start here             -->
    <!-- ----------------------------------- -->
    <footer class="pt-5">
        <div class="container">
            <!-- Row START -->
            <div class="row g-4">

                <!-- Widget 1 START -->
                <div class="col-lg-3">
                    <!-- logo -->
                    <a class="me-0" href="index-2.html">
                        <img class="light-mode-item h-60px" src="assets/images/logo.png" alt="logo">
                        <img class="dark-mode-item h-40px" src="assets/images/logo-light.svg" alt="logo">
                    </a>
                    <p class="my-3">
                        ডিজিটাল শিক্ষক এমন একটি প্ল্যাটফর্ম যেখানে শিক্ষার্থীরা ডিপ্লোমা ইন ইঞ্জিনিয়ারিং কোর্স সহজে ও দক্ষতার সাথে শিখতে পারে।।</p>
                    <!-- Social media icon -->
                    <ul class="list-inline mb-0 mt-3">
                        <li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
                        <li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-instagram" href="#"><i class="fab fa-fw fa-instagram"></i></a> </li>
                        <li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a> </li>
                        <li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a> </li>
                    </ul>
                </div>
                <!-- Widget 1 END -->

                <!-- Widget 2 START -->
                <div class="col-lg-6">
                    <div class="row g-4">
                        <!-- Link block -->
                        <div class="col-6 col-md-4">
                            <h5 class="mb-2 mb-md-4">কোম্পানি</h5>
                            <ul class="nav flex-column ">
                                <li class="nav-item"><a class="nav-link" href="about_us.php">আমাদের সম্পর্কে</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact_us.php">যোগাযোগ করুন</a></li>
                                <li class="nav-item"><a class="nav-link" href="coming_soon.php">সংবাদ এবং ব্লগ</a></li>
                                <li class="nav-item"><a class="nav-link" href="coming_soon.php">লাইব্রেরি</a></li>
                                <li class="nav-item"><a class="nav-link" href="">ক্যারিয়ার</a></li>
                            </ul>
                        </div>

                        <!-- Link block -->
                        <div class="col-6 col-md-4">
                            <h5 class="mb-2 mb-md-4">কমিউনিটি</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="nav-link" href="http://facebook.com/">ফেসবুক</a></li>
                                <li class="nav-item"><a class="nav-link" href="https://web.whatsapp.com/">ওয়াটসঅ্যাপ</a></li>
                                <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/">ইনস্টাগ্রাম</a></li>
                                <li class="nav-item"><a class="nav-link" href="http://youtube.com/">ইউটিউব</a></li>
                            </ul>
                        </div>

                        <!-- Link block -->
                        <div class="col-6 col-md-4">
                            <h5 class="mb-2 mb-md-4">শিক্ষাদান</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="nav-link" href="coming_soon.php">শিক্ষক হন</a></li>
                                <li class="nav-item"><a class="nav-link" href="coming_soon.php">গাইড করার পদ্ধতি</a></li>
                                <li class="nav-item"><a class="nav-link" href="coming_soon.php">শর্তাবলি &amp; প্রাইভেসি পলিসি</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Widget 2 END -->

                <!-- Widget 3 START -->
                <div class="col-lg-3">
                    <h5 class="mb-2 mb-md-4">যোগাযোগ করুন</h5>
                    <!-- Time -->
                    <p class="mb-2">
                        ফোন নম্বর :<span class="h6 fw-light ms-2">+880 1771868382</span>
                        <span class="d-block small">(9:30 AM to 8:30 BST)</span>
                    </p>

                    <p class="mb-0">ইমেইল :<span class="h6 fw-light ms-2">email.dwip@gmail.com</span></p>

                    <div class="row g-2 mt-2">
                        <!-- Google play store button -->
                        <div class="col-6 col-sm-4 col-md-3 col-lg-6">
                            <a href="coming_soon.php"> <img src="assets/images/client/google-play.svg" alt=""> </a>
                        </div>
                        <!-- App store button -->
                        <div class="col-6 col-sm-4 col-md-3 col-lg-6">
                            <a href="coming_soon.php"> <img src="assets/images/client/app-store.svg" alt="app-store"> </a>
                        </div>
                    </div> <!-- Row END -->
                </div>
                <!-- Widget 3 END -->
            </div><!-- Row END -->

            <!-- Divider -->
            <hr class="mt-4 mb-0">

            <!-- Bottom footer -->
            <div class="py-3">
                <div class="container px-0">
                    <div class="d-lg-flex justify-content-between align-items-center py-3 text-center text-md-left">
                        <!-- copyright text -->
                        <div class="text-body text-primary-hover">কপিরাইট ©2024 ডিজিটাল শিক্ষক, সর্বস্বত্ব সংরক্ষিত।. Developed by <a href="https://www.github.com/remesoft/" target="_blank" class="text-body">Dwip Sarker</a> and <a href="https://github.com/anikdey13" class="text-body">Anik Dey.</a></div>
                        <!-- copyright links-->
                        <div class="justify-content-center mt-3 mt-lg-0">
                            <ul class="nav list-inline justify-content-center mb-0">
                                <li class="list-inline-item">
                                    <!-- Language selector -->
                                    <div class="dropup mt-0 text-center text-sm-end">
                                        <a class="dropdown-toggle nav-link" href="#" role="button" id="languageSwitcher" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-globe me-2"></i>ভাষা
                                        </a>
                                        <ul class="dropdown-menu min-w-auto" aria-labelledby="languageSwitcher">
                                            <li><a class="dropdown-item me-4" href="coming_soon.php"><img class="fa-fw me-2" src="assets/images/flags/uk.svg" alt="">English</a></li>
                                            <li><a class="dropdown-item me-4" href="coming_soon.php"><img class="fa-fw me-2" src="assets/images/flags/gr.svg" alt="">German </a></li>
                                            <li><a class="dropdown-item me-4" href="coming_soon.php"><img class="fa-fw me-2" src="assets/images/flags/sp.svg" alt="">French</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-inline-item"><a class="nav-link" href="coming_soon.php">ব্যবহারের শর্তাবলী</a></li>
                                <li class="list-inline-item"><a class="nav-link pe-0" href="coming_soon.php">গোপনীয়তা নীতি</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Back to top -->
    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    <!-- Bootstrap JS -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="assets/vendor/tiny-slider/tiny-slider.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.js"></script>
    <script src="assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>

    <!-- Template Functions -->
    <script src="assets/js/functions.js"></script>

</body>

</html>