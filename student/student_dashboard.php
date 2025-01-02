<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/helpers.php');
include('../includes/get_courses.php');


// variables
$user_id = $_SESSION['user_id'];
$courses = get_enrolled_course($conn, $user_id);
$page_title = "Student Dashboard | Student Panel | Digital Shikkhok";
ob_start();
?>


<!-- Main content START -->
<div class="col-xl-9">

    <!-- Counter boxes START -->
    <div class="row mb-4">
        <!-- Counter item -->
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
            <div class="d-flex justify-content-center align-items-center p-4 bg-orange bg-opacity-15 rounded-3">
                <span class="display-6 lh-1 text-orange mb-0"><i class="fas fa-tv fa-fw"></i></span>
                <div class="ms-4">
                    <div class="d-flex">
                        <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?php echo count($courses); ?>" data-purecounter-delay="200"><?php echo count($courses); ?></h5>
                    </div>
                    <p class="mb-0 h6 fw-light">Total Courses</p>
                </div>
            </div>
        </div>
        <!-- Counter item -->
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
            <div class="d-flex justify-content-center align-items-center p-4 bg-purple bg-opacity-15 rounded-3">
                <span class="display-6 lh-1 text-purple mb-0"><i class="fas fa-clipboard-check fa-fw"></i></span>
                <div class="ms-4">
                    <div class="d-flex">
                        <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="52" data-purecounter-delay="200">0</h5>
                    </div>
                    <p class="mb-0 h6 fw-light">Complete lessons</p>
                </div>
            </div>
        </div>
        <!-- Counter item -->
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
            <div class="d-flex justify-content-center align-items-center p-4 bg-success bg-opacity-10 rounded-3">
                <span class="display-6 lh-1 text-success mb-0"><i class="fas fa-medal fa-fw"></i></span>
                <div class="ms-4">
                    <div class="d-flex">
                        <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="8" data-purecounter-delay="300">0</h5>
                    </div>
                    <p class="mb-0 h6 fw-light">Achieved Certificates</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter boxes END -->

    <div class="card bg-transparent border rounded-3">
        <!-- Card header START -->
        <div class="card-header bg-transparent border-bottom">
            <h3 class="mb-0">My Courses List</h3>
        </div>
        <!-- Card header END -->

        <!-- Card body START -->
        <div class="card-body">

            <!-- Search and select START -->
            <div class="row g-3 align-items-center justify-content-between mb-4">
                <!-- Content -->
                <div class="col-md-8">
                    <form class="rounded position-relative">
                        <input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">
                        <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                            <i class="fas fa-search fs-6 "></i>
                        </button>
                    </form>
                </div>

                <!-- Select option -->
                <div class="col-md-3">
                    <!-- Short by filter -->
                    <form>
                        <select class="form-select js-choice border-0 z-index-9 bg-transparent" aria-label=".form-select-sm">
                            <option value="">Sort by</option>
                            <option>Free</option>
                            <option>Newest</option>
                            <option>Most popular</option>
                            <option>Most Viewed</option>
                        </select>
                    </form>
                </div>
            </div>
            <!-- Search and select END -->

            <!-- Course list table START -->
            <div class="table-responsive border-0">
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <!-- Table head -->
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 rounded-start">Course Title</th>
                            <th scope="col" class="border-0">Total Lectures</th>
                            <th scope="col" class="border-0">Completed Lecture</th>
                            <th scope="col" class="border-0 rounded-end">Action</th>
                        </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>
                        <?php if (empty($courses)) { ?>
                            <tr>
                                <td colspan="4" class="text-center">No courses found</td>
                            </tr>
                        <?php } else { ?>
                            <?php foreach ($courses as $course): ?>
                                <tr>
                                    <!-- Table data -->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!-- Image -->
                                            <div class="w-100px">
                                                <img src="../uploads/img/thumbnails/<?= $course['thumbnail'] ?>" class="rounded" alt="">
                                            </div>
                                            <div class="mb-0 ms-2">
                                                <!-- Title -->
                                                <h6 class="table-responsive-title"><a href="#"><?= htmlspecialchars($course['title']) ?></a></h6>
                                                <!-- Info -->
                                                <div class="overflow-hidden">
                                                    <h6 class="mb-0 text-end">100%</h6>
                                                    <div class="progress progress-sm bg-primary bg-opacity-10">
                                                        <div class="progress-bar bg-primary aos" role="progressbar" data-aos="slide-right" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>10</td>
                                    <td>10</td>
                                    <!-- Table data -->
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0"><i class="bi bi-play-circle me-1"></i>Continue</a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>



                    </tbody>
                    <!-- Table body END -->
                </table>
            </div>
            <!-- Course list table END -->

            <!-- Pagination START -->
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
                <!-- Content -->
                <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
                <!-- Pagination -->
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                        <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                        <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                    </ul>
                </nav>
            </div>
            <!-- Pagination END -->
        </div>
        <!-- Card body START -->
    </div>
    <!-- Main content END -->
</div>


<?php
$content = ob_get_clean();
include('../layouts/student.php');
?>