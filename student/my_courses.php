<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != '1') {
    header('Location: ../sign_in.php');
    exit();
}

$user_id = $_SESSION['user_id'];
include '../includes/db.php';
$sql = "SELECT courses.* FROM enrollments JOIN courses ON enrollments.course_id = courses.id WHERE enrollments.user_id = $user_id AND enrollments.confirm = '1'";
$result = $conn->query($sql);

$courses = [];

if ($result->num_rows > 0) {
    $courses = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $courses = [];
}



$pageTitle = "Student Dashboard";
ob_start();
?>


<!-- Main content START -->
<div class="col-xl-9">
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
                        <?php endforeach; ?>



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
</div>


<?php
$content = ob_get_clean();
include('../layouts/student.php');
?>