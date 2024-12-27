<?php
include('../includes/db.php');
include('../includes/get_courses.php');
$pageTitle = "Manage Courses";
ob_start();
?>


<!-- Page main content START -->
<div class="page-content-wrapper border">

  <!-- Title -->
  <div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
      <h1 class="h3 mb-2 mb-sm-0">Total Courses <span class="badge bg-orange bg-opacity-10 text-orange">15</span></h1>
      <a href="create_course.php" class="btn btn-sm btn-primary mb-0">Create a Course</a>
    </div>
  </div>

  <!-- Card body START -->
  <div class="card-body">
    <!-- Course table START -->
    <div class="table-responsive border-0 rounded-3">
      <!-- Table START -->
      <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
        <!-- Table head -->
        <thead>
          <tr>
            <th scope="col" class="border-0 px-3 rounded-start" style="width: 30%;">Course Name</th>
            <th scope="col" class="border-0 px-3" style="width: 20%;">Instructor</th>
            <th scope="col" class="border-0 px-3" style="width: 10%;">Price</th>
            <th scope="col" class="border-0 px-3" style="width: 10%;">Enrolled</th>
            <th scope="col" class="border-0 px-3 rounded-end text-end">Action</th>
          </tr>
        </thead>

        <!-- Table body START -->
        <tbody>
          <?php
          $courses = get_courses($conn);
          foreach ($courses as $course): ?>
            <tr>
              <!-- Table data -->
              <td>
                <div class="d-flex align-items-center position-relative">
                  <!-- Image -->
                  <div class="w-60px">
                    <img src="../uploads/img/thumbnails/<?= htmlspecialchars($course['thumbnail']) ?>" class="rounded" alt="">
                  </div>
                  <!-- Title -->
                  <h6 class="table-responsive-title mb-0 ms-2">
                    <a href="#" class="stretched-link d-inline-block text-truncate" style="max-width: 250px;"><?= htmlspecialchars($course['title']) ?></a>
                  </h6>
                </div>
              </td>

              <!-- Table data -->
              <td>
                <div class="d-flex align-items-center">
                  <!-- Avatar -->
                  <div class="avatar avatar-xs flex-shrink-0">
                    <img class="avatar-img rounded-circle" src="../assets/images/avatar/08.jpg" alt="avatar">
                  </div>
                  <!-- Info -->
                  <div class="ms-2">
                    <h6 class="mb-0 fw-light">Dwip Sarker</h6>
                  </div>
                </div>
              </td>

              <!-- Table data -->
              <td><?= htmlspecialchars($course['price']) ?></td>
              <td> 15,567</td>
              <td class="d-flex justify-content-end">
                <a href="#" class="btn btn-sm btn-success me-1 mb-1 mb-md-0">Edit</a>
                <button class="btn btn-sm btn-danger mb-0">Delete</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <!-- Table body END -->
      </table>
      <!-- Table END -->
    </div>
    <!-- Course table END -->
  </div>
  <!-- Card body END -->

  <!-- Card footer START -->
  <div class="card-footer bg-transparent pt-0">
    <!-- Pagination START -->
    <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
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
  <!-- Card END -->
</div>
<!-- Page main content END -->



<?php
$content = ob_get_clean();
include('../layouts/admin.php');
?>