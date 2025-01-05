<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/helpers.php');
include('../includes/get_course_by_id.php');
include('../includes/get_records.php');

// variables
$enrollments = get_records($conn, 'enrollments');
$page_title = "Enrollments | Admin Panel | Digital Shikkhok";
ob_start();
?>


<!-- Page main content START -->
<div class="page-content-wrapper border">

  <!-- Title -->
  <div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
      <h4 class="mb-2 mb-sm-0">Enrollments</h4>
      <div class="nav my-3 my-xl-0 flex-nowrap align-items-center">
        <div class="nav-item w-100">
          <form class="position-relative">
            <input class="form-control pe-5 bg-secondary bg-opacity-10 border-0" type="search" placeholder="Mobile number..." aria-label="Search">
            <button class="bg-transparent px-2 py-0 border-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 text-primary"></i></button>
          </form>
        </div>
      </div>
      <!-- <a href="create_course.php" class="btn btn-sm btn-primary mb-0">Create a Course</a> -->
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
            <th scope="col" class="border-0">Price</th>
            <th scope="col" class="border-0 text-center">Status</th>
            <th scope="col" class="border-0">Mobile Number</th>
            <th scope="col" class="border-0 px-3 text-center">TNX Number</th>
            <th scope="col" class="border-0 px-3 rounded-end text-end">Action</th>
          </tr>
        </thead>

        <!-- Table body START -->
        <tbody>
          <?php
          foreach ($enrollments as $enroll):
            $course = get_course($conn, $enroll['course_id']) ?>
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
              <td><?= $course['price'] ?></td>
              <td class="text-center">
                <div class="badge <?= get_status_classes($enroll['status']) ?> bg-opacity-10">
                  <?= $enroll['status'] ?>
                </div>
              </td>
              <td><?= $enroll['phone'] ?></td>
              <td class="text-center"><?= $enroll['tnx_id'] ?></td>
              <td class="d-flex justify-content-end gap-2">
                <form method="post" action="../includes/process_enroll_update_status.php">
                  <input type="hidden" name="id" value="<?= $enroll['id'] ?>">
                  <button class="btn btn-sm btn-danger mb-0" name="action" value="delete">Cancel</button>
                  <button class="btn btn-sm btn-success me-1 mb-1 mb-md-0" name="action" value="approve">Approve</button>
                </form>
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