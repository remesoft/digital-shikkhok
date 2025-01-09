<?php
// include essentials files
include_once('../includes/db.php');
include_once('../includes/session.php');
include_once('../includes/helpers.php');
include_once('../includes/get_user_by_id.php');

// functionality
protected_for('student');
$user_id = $_SESSION['user_id'];
$user = get_user($conn, $user_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Eduport - LMS, Education and Course Theme</title>

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
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/choices/css/choices.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/aos/aos.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
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

</head>

<body>

    <!-- ----------------------------------- -->
    <!--         Header Start                -->
    <!-- ----------------------------------- -->
    <header class="navbar-light navbar-sticky header-static py-2 mb-2">
        <div class="container">
            <nav class="navbar navbar-expand-xl">
                <div class="container-fluid" style="padding: 0;">
                    <!-- logo start -->
                    <a href="/digital-shikkhok"><img class="navbar-logo" src="../assets/images/logo.png" alt="logo"></a>

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
                                <a class="nav-link" href="../index.php">
                                    হোম
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../our_courses.php?type=free">
                                    ফ্রি কোর্স
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../our_courses.php?type=paid">
                                    পেইড কোর্স
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../about_us.php">
                                    আমাদের সম্পর্কে
                                </a>
                            </li>

                            <!-- <li class="nav-item">
                                <a class="nav-link" href="../our_courses.php">
                                    শিক্ষকগণ
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="../contact_us.php">
                                    যোগাযোগ
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Sign up Button -->
                    <!-- Profile START -->
                    <div class="dropdown ms-1 ms-lg-0">
                        <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="avatar-img rounded-circle" src="../uploads/img/users/<?= $user['avatar'] ?: 'blank.png'; ?>" alt="avatar">
                        </a>

                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                            <!-- Profile info -->
                            <li class="px-3 mb-3">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <img class="avatar-img rounded-circle" src="../uploads/img/users/<?= $user['avatar'] ?: 'blank.png'; ?>" alt="avatar">
                                    </div>
                                    <div>
                                        <a class="h6" href="#"><?= $user['first_name'] ?> <?= $user['last_name'] ?></a>
                                        <p class="small m-0"><?= $user['email'] ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- Links -->
                            <li><a class="dropdown-item" href="../student/student_edit_profile.php"><i class="bi bi-person fa-fw me-2"></i>এডিট প্রোফাইল</a></li>
                            <!-- <li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>অ্যাকাউন্ট সেটিংস</a></li> -->
                            <li><a class="dropdown-item" href="../coming_soon.php"><i class="bi bi-info-circle fa-fw me-2"></i>সাহায্য</a></li>
                            <li><a class="dropdown-item bg-danger-soft-hover" href="../includes/logout.php"><i class="bi bi-power fa-fw me-2"></i>সাইন আউট</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- Dark mode options START -->
                            <li>
                                <div class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
                                    <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="light">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
                                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                                            <use href="#"></use>
                                        </svg> Light
                                    </button>
                                    <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
                                            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                                            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                                            <use href="#"></use>
                                        </svg> Dark
                                    </button>
                                    <button type="button" class="btn btn-sm mb-0 active" data-bs-theme-value="auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
                                            <use href="#"></use>
                                        </svg> Auto
                                    </button>
                                </div>
                            </li>
                            <!-- Dark mode options END-->
                        </ul>
                    </div>
                    <!-- Profile START -->
                </div>
            </nav>
        </div>
    </header>
    <!-- Header END -->
    <!-- =======================
    Page Banner START -->
    <section class="pt-0">
        <div class="container-fluid px-0">
            <div class="card bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
            </div>
        </div>
        <div class="container mt-n4">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-transparent card-body pb-0 px-0 mt-2 mt-sm-0">
                        <div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
                            <!-- Avatar -->
                            <div class="col-auto">
                                <div class="avatar avatar-xxl position-relative mt-n3">
                                    <img class="avatar-img rounded-circle" src="../uploads/img/users/<?= $user['avatar'] ?: 'blank.png'; ?>" alt="avatar">
                                    <span class="badge text-bg-success rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">অনলাইন</span>
                                </div>
                            </div>
                            <!-- Profile info -->
                            <div class="col d-sm-flex justify-content-between align-items-center">
                                <div>
                                    <h1 class="my-1 fs-4"><?= $user['first_name'] ?> <?= $user['last_name'] ?></h1>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                            <i class="fas fa-phone me-1 text-info"></i>
                                            <span class="text-body fw-light"><?= $user['phone'] ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Button -->
                                <div class="mt-2 mt-sm-0">
                                    <a href="my_courses.php" class="btn btn-outline-primary mb-0">আমার কোর্সগুলো</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Advanced filter responsive toggler START -->
                    <!-- Divider -->
                    <hr class="d-xl-none">
                    <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                        <a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
                        <button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                            <i class="fas fa-sliders-h"></i>
                        </button>
                    </div>
                    <!-- Advanced filter responsive toggler END -->
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Page Banner END -->
    <!-- Main Content -->
    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <!-- =======================
    Page content START -->
        <section class="pt-0">
            <div class="container">
                <div class="row">

                    <!-- Left sidebar START -->
                    <div class="col-xl-3">
                        <!-- Responsive offcanvas body START -->
                        <div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
                            <!-- Offcanvas header -->
                            <div class="offcanvas-header bg-light">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
                            </div>
                            <!-- Offcanvas body -->
                            <div class="offcanvas-body p-3 p-xl-0">
                                <div class="bg-dark border rounded-3 p-3 w-100">
                                    <!-- Dashboard menu -->
                                    <div class="list-group list-group-dark list-group-borderless collapse-list">
                                        <a class="list-group-item <?= is_active_page('student_dashboard.php') ?>" href="../student/student_dashboard.php"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>ড্যাশবোর্ড</a>
                                        <a class="list-group-item <?= is_active_page('my_courses.php') ?>" href="../student/my_courses.php"><i class="bi bi-basket fa-fw me-2"></i>আমার কোর্সসমূহ</a>
                                        <!-- <a class="list-group-item" href="student-quiz.html"><i class="bi bi-question-diamond fa-fw me-2"></i>Quiz</a> -->
                                        <a class="list-group-item <?= is_active_page('student_payment_info.php') ?>" href="../student/student_payment_info.php"><i class="bi bi-credit-card-2-front fa-fw me-2"></i>পেমেন্ট তথ্য</a>
                                        <!-- <a class="list-group-item" href="../student/student_wishlist.php"><i class="bi bi-cart-check fa-fw me-2"></i>Wishlist</a> -->
                                        <a class="list-group-item <?= is_active_page('student_edit_profile.php') ?>" href="../student/student_edit_profile.php"><i class="bi bi-pencil-square fa-fw me-2"></i>এডিট প্রোফাইল</a>
                                        <!-- <a class="list-group-item" href="instructor-setting.html"><i class="bi bi-gear fa-fw me-2"></i>Settings</a> -->
                                        <!-- <a class="list-group-item" href="instructor-delete-account.html"><i class="bi bi-trash fa-fw me-2"></i>Delete Profile</a> -->
                                        <a class="list-group-item text-danger bg-danger-soft-hover" href="../includes/logout.php"><i class="fas fa-sign-out-alt fa-fw me-2"></i>সাইন আউট</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Responsive offcanvas body END -->
                    </div>
                    <!-- Left sidebar END -->
                    <?php echo $content; ?>
                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
    Page content END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->
    <!-- Student Footer -->
    <!-- =======================
    Footer START -->
    <footer class="bg-dark p-3">
        <div class="container">
            <div class="row align-items-center">
                <!-- Widget -->
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <!-- Logo START -->
                    <a href="../index.php"> <img class="h-50px" src="../assets/images/logo.png" alt="logo"> </a>
                </div>

                <!-- Widget -->
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="text-center text-white text-primary-hover">
                        Copyrights ©2024 Digital-Shikkhok.com . Build by <a href="https://www.github.com/anikdey13" target="_blank" ">Anik Dey</a> and <a href=" https://www.github.com/remesoft" target="_blank">Dwip Sarker</a>
                    </div>
                </div>
                <!-- Widget -->
                <div class="col-md-4">
                    <!-- Rating -->
                    <ul class="list-inline mb-0 text-center text-md-end">
                        <li class="list-inline-item ms-2"><a target="_blank" href="http://facebook.com/digitalshikkhok"><i class="text-white fab fa-facebook"></i></a></li>
                        <li class="list-inline-item ms-2"><a target="_blank" href="https://www.instagram.com/digitalshikkhok"><i class="text-white fab fa-instagram"></i></a></li>
                        <li class="list-inline-item ms-2"><a target="_blank" href="http://youtube.com/@DigitalShikkhok"><i class="text-white fab fa-linkedin-in"></i></a></li>
                        <li class="list-inline-item ms-2"><a target="_blank" href="http://twitter.com/digitalshikkhok"><i class="text-white fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- =======================
    Footer END -->

    <!-- Back to top -->
    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    <!-- Bootstrap JS -->
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="../assets/vendor/choices/js/choices.min.js"></script>
    <script src="../assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/js/student_video_player.js"></script>
    <script src="../assets/js/remove_student_profile.js"></script>
    <script src="../assets/js/pass_show_hide.js"></script>

    <!-- Template Functions -->
    <script src="../assets/js/functions.js"></script>

</body>

<!-- Mirrored from eduport.webestica.com/student-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Dec 2024 08:14:43 GMT -->

</html>