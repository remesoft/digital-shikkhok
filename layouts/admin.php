<?php
// include essentials files
include_once('../includes/db.php');
include_once('../includes/session.php');
include_once('../includes/helpers.php');
include_once('../includes/get_user_by_id.php');

// protection
protected_for('admin');

// variables
$user_id = $_SESSION['user_id'];
$user = get_user($conn, $user_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $page_title ?></title>

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

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/choices/css/choices.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/glightbox/css/glightbox.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/quill/css/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/overlay-scrollbar/css/overlayscrollbars.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head>

<body>
    <main>
        <!-- ----------------------------------- -->
        <!--            Sidebar Start            -->
        <!-- ----------------------------------- -->
        <nav class="navbar sidebar navbar-expand-xl navbar-dark bg-dark">

            <!-- Navbar brand for xl START -->
            <div class="d-flex align-items-center">
                <a class="navbar-brand d-flex align-items-center gap-2" href="../admin/dashboard.php">
                    <img class="navbar-brand-item" src="../assets/images/logo.png" alt="">
                    <h5 class="text-white mb-0"><span style="color:rgb(250, 70, 82)">Digital</span> Shikkhok</h5>
                </a>
            </div>
            <!-- Navbar brand for xl END -->

            <div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar">
                <div class="offcanvas-body sidebar-content d-flex flex-column bg-dark">

                    <!-- Sidebar menu START -->
                    <ul class="navbar-nav flex-column" id="navbar-sidebar">

                        <!-- Dashboard menu item -->
                        <li class="nav-item"><a href="dashboard.php" class="nav-link"><i class="bi bi-house fa-fw me-2"></i>Dashboard</a></li>

                        <!-- Title -->
                        <li class="nav-item ms-2 my-2">Pages</li>
                        <li class="nav-item">
                            <a class="nav-link <?= is_active_page('inbox.php') ?>" href="inbox.php">
                                <i class="fas fa-inbox fa-fw me-2"></i>
                                Inbox
                            </a>
                        </li>

                        <!-- Course menu item -->
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#collapsepage" role="button" aria-expanded="true" aria-controls="collapsepage">
                                <i class="bi bi-basket fa-fw me-2"></i>Courses
                            </a>
                            <!-- Submenu -->
                            <ul class="nav collapse flex-column show" id="collapsepage" data-bs-parent="#navbar-sidebar">
                                <li class="nav-item"> <a class="nav-link <?= is_active_page('all_courses.php') ?>" href="../admin/all_courses.php">All Courses</a></li>
                                <li class="nav-item"> <a class="nav-link <?= is_active_page('create_course.php') ?>" href="../admin/create_course.php">Create Course</a></li>
                                <li class="nav-item"> <a class="nav-link <?= is_active_page('enrollments.php') ?>" href="../admin/enrollments.php">Enrollments</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="all_students.php" class="nav-link <?= is_active_page('all_students.php') ?>">
                                <i class="fas fa-user-tie fa-fw me-2"></i>
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="all_instructors.php" class="nav-link <?= is_active_page('all_instructors.php') ?>">
                                <i class="fas fa-chalkboard-teacher fa-fw me-2"></i>
                                Instructor
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= is_active_page('enrollments.php') ?>" href="enrollments.php">
                                <i class="far fa-chart-bar fa-fw me-2"></i>
                                Enrollments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/profile.php">
                                <i class="fas fa-user-cog fa-fw me-2"></i>
                                Admin Settings
                            </a>
                        </li>

                        <!-- Title -->
                        <li class="nav-item ms-2 my-2">Documentation</li>

                        <li class="nav-item"> <a class="nav-link" href="docs/index.html"><i class="far fa-clipboard fa-fw me-2"></i>Documentation</a></li>
                        <li class="nav-item"> <a class="nav-link" href="docs/changelog.html"><i class="fas fa-sitemap fa-fw me-2"></i>Changelog</a></li>
                    </ul>
                    <!-- Sidebar menu end -->

                    <!-- Sidebar footer START -->
                    <div class="px-3 mt-auto pt-3">
                        <div class="d-flex align-items-center justify-content-between text-primary-hover">
                            <a class="h5 mb-0 text-body" href="profile.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings">
                                <i class="bi bi-gear-fill"></i>
                            </a>
                            <a class="h5 mb-0 text-body" href="index-2.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Home">
                                <i class="bi bi-globe"></i>
                            </a>
                            <a class="h5 mb-0 text-body" href="../includes/logout.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign out">
                                <i class="bi bi-power"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Sidebar footer END -->

                </div>
            </div>
        </nav>

        <!-- ----------------------------------- -->
        <!--         Page Content Start          -->
        <!-- ----------------------------------- -->
        <div class="page-content">

            <!-- ----------------------------------- -->
            <!--         Top Navbar Start            -->
            <!-- ----------------------------------- -->
            <nav class="navbar top-bar navbar-light border-bottom py-0 py-xl-3">
                <div class="container-fluid p-0">
                    <div class="d-flex align-items-center w-100">

                        <!-- Logo START -->
                        <div class="d-flex align-items-center d-xl-none">
                            <a class="navbar-brand" href="index-2.html">
                                <img class="light-mode-item navbar-brand-item h-30px" src="../assets/images/logo-mobile.svg" alt="">
                                <img class="dark-mode-item navbar-brand-item h-30px" src="../assets/images/logo-mobile-light.svg" alt="">
                            </a>
                        </div>
                        <!-- Logo END -->

                        <!-- Toggler for sidebar START -->
                        <div class="navbar-expand-xl sidebar-offcanvas-menu">
                            <button class="navbar-toggler me-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="outside">
                                <i class="bi bi-text-right fa-fw h2 lh-0 mb-0 rtl-flip" data-bs-target="#offcanvasMenu"> </i>
                            </button>
                        </div>
                        <!-- Toggler for sidebar END -->

                        <!-- Top bar left -->
                        <div class="navbar-expand-lg ms-auto ms-xl-0">

                            <!-- Toggler for menubar START -->
                            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopContent" aria-controls="navbarTopContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-animation">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </button>
                            <!-- Toggler for menubar END -->

                            <!-- Topbar menu START -->
                            <div class="collapse navbar-collapse w-100" id="navbarTopContent">

                                <!-- Top search START -->
                                <div class="nav my-3 my-xl-0 flex-nowrap align-items-center">
                                    <div class="nav-item w-100">
                                        <form class="position-relative">
                                            <input class="form-control pe-5 bg-secondary bg-opacity-10 border-0" type="search" placeholder="Search" aria-label="Search">
                                            <button class="bg-transparent px-2 py-0 border-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 text-primary"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <!-- Top search END -->
                            </div>
                            <!-- Topbar menu END -->
                        </div>
                        <!-- Top bar left END -->

                        <!-- Top bar right START -->
                        <div class="ms-xl-auto">
                            <ul class="navbar-nav flex-row align-items-center">

                                <!-- Notification dropdown START -->
                                <li class="nav-item ms-2 ms-md-3 dropdown">
                                    <!-- Notification button -->
                                    <a class="btn btn-light btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                        <i class="bi bi-bell fa-fw"></i>
                                    </a>
                                    <!-- Notification dote -->
                                    <span class="notif-badge animation-blink"></span>

                                    <!-- Notification dropdown menu START -->
                                    <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
                                        <div class="card bg-transparent">
                                            <div class="card-header bg-transparent border-bottom py-4 d-flex justify-content-between align-items-center">
                                                <h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">2 new</span></h6>
                                                <a class="small" href="#">Clear all</a>
                                            </div>
                                            <div class="card-body p-0">
                                                <ul class="list-group list-unstyled list-group-flush">
                                                    <!-- Notif item -->
                                                    <li>
                                                        <a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
                                                            <div class="me-3">
                                                                <div class="avatar avatar-md">
                                                                    <img class="avatar-img rounded-circle" src="../assets/images/avatar/08.jpg" alt="avatar">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="text-body small m-0">Congratulate <b>Joan Wallace</b> for graduating from <b>Microverse university</b></p>
                                                                <u class="small">Say congrats</u>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <!-- Notif item -->
                                                    <li>
                                                        <a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
                                                            <div class="me-3">
                                                                <div class="avatar avatar-md">
                                                                    <img class="avatar-img rounded-circle" src="../assets/images/avatar/02.jpg" alt="avatar">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1">Larry Lawson Added a new course</h6>
                                                                <p class="small text-body m-0">What's new! Find out about new features</p>
                                                                <u class="small">View detail</u>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <!-- Notif item -->
                                                    <li>
                                                        <a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
                                                            <div class="me-3">
                                                                <div class="avatar avatar-md">
                                                                    <img class="avatar-img rounded-circle" src="../assets/images/avatar/05.jpg" alt="avatar">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1">New request to apply for Instructor</h6>
                                                                <u class="small">View detail</u>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <!-- Notif item -->
                                                    <li>
                                                        <a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
                                                            <div class="me-3">
                                                                <div class="avatar avatar-md">
                                                                    <img class="avatar-img rounded-circle" src="../assets/images/avatar/03.jpg" alt="avatar">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1">Update v2.3 completed successfully</h6>
                                                                <p class="small text-body m-0">What's new! Find out about new features</p>
                                                                <small class="text-body">5 min ago</small>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Button -->
                                            <div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
                                                <a href="#" class="stretched-link">See all incoming activity</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Notification dropdown menu END -->
                                </li>
                                <!-- Notification dropdown END -->

                                <!-- Profile dropdown START -->
                                <li class="nav-item ms-2 ms-md-3 dropdown">
                                    <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php if ($user['avatar']) { ?>
                                            <img class="avatar-img rounded-circle" src="../uploads/img/users/<?php echo $user['avatar']; ?>" alt="avatar">
                                        <?php } else { ?>
                                            <img class="avatar-img rounded-circle" src="../assets/images/avatar/empty-profile.png" alt="avatar">
                                        <?php } ?>
                                    </a>

                                    <!-- Profile dropdown START -->
                                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                                        <!-- Profile info -->
                                        <li class="px-3">
                                            <div class="d-flex align-items-center">
                                                <!-- Avatar -->
                                                <div class="avatar me-3">
                                                    <?php if ($user['avatar']) { ?>
                                                        <img class="avatar-img rounded-circle" src="../uploads/img/users/<?php echo $user['avatar']; ?>" alt="avatar">
                                                    <?php } else { ?>
                                                        <img class="avatar-img rounded-circle" src="../assets/images/avatar/empty-profile.png" alt="avatar">
                                                    <?php } ?>
                                                </div>
                                                <div>
                                                    <a class="h6 mt-2 mt-sm-0" href="#"><?= $user['first_name'] ?> <?= $user['last_name'] ?></a>
                                                    <p class="small m-0"><?= $user['email'] ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                        <!-- Links -->
                                        <li><a class="dropdown-item" href="../admin/profile.php"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
                                        <li><a class="dropdown-item bg-danger-soft-hover" href="../includes/logout.php"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <!-- Dark mode options START -->
                                        <li>
                                            <div class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
                                                <!-- <span>Mode:</span> -->
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
                                    <!-- Profile dropdown END -->
                                </li>
                                <!-- Profile dropdown END -->
                            </ul>
                        </div>
                        <!-- Top bar right END -->
                    </div>
                </div>
            </nav>

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




            <!-- ----------------------------------- -->
            <!--        Main Content Start           -->
            <!-- ----------------------------------- -->
            <div>
                <?php echo $content; ?>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="../assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/choices/js/choices.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.js"></script>
    <script src="../https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script src="../assets/vendor/stepper/js/bs-stepper.min.js"></script>
    <script src="../assets/vendor/overlay-scrollbar/js/overlayscrollbars.min.js"></script>

    <!-- Template Functions -->
    <script src="../assets/js/functions.js"></script>

</body>

</html>