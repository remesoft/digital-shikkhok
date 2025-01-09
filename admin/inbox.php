<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/get_records.php');
include('../includes/helpers.php');

// variables
$conditions = "1" . (isset($_GET['phone']) ? " AND phone LIKE '%" . $_GET['phone'] . "%'" : '');
$contacts = get_records_by_conditions($conn, 'contacts', $conditions);
$page_title = "All Courses | Admin Panel | Digital Shikkhok";
ob_start();
?>


<!-- Page main content START -->
<div class="page-content-wrapper border">

  <!-- Title -->
  <div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
      <h4 class="mb-2 mb-sm-0">Inbox</h4>
      <div class="nav my-3 my-xl-0 flex-nowrap align-items-center">
        <div class="nav-item w-100">
          <form class="position-relative" action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <input class="form-control pe-5 bg-secondary bg-opacity-10 border-0" name="phone" type="search" placeholder="Mobile number..." aria-label="Search">
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
            <th scope="col" class="border-0 px-3 py-2">Date & Time</th>
            <th scope="col" class="border-0 py-2">Name</th>
            <th scope="col" class="border-0 py-2">Phone</th>
            <th scope="col" class="border-0 py-2">Message</th>
            <th scope="col" class="border-0 py-2 text-end">Action</th>
          </tr>
        </thead>

        <!-- Table body START -->
        <tbody>
          <?php foreach ($contacts as $contact) : ?>
            <tr>
              <td><?= format_date($contact['created_at']) ?></td>
              <td><?= $contact['name'] ?></td>
              <td><?= $contact['phone'] ?></td>
              <td><?= $contact['message'] ?></td>
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0">
                  <i class="far fa-fw fa-edit"></i>
                </a>
                <button type="button" class="btn btn-sm btn-danger-soft btn-round mb-0">
                  <i class="fas fa-fw fa-times"></i>
                </button>
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

<!-- ------------------------------->
<!--      Delete Lecture Modal    -->
<!-- ------------------------------->
<div class="modal fade" id="deleteLecture" tabindex="-1" aria-labelledby="addLectureLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="addLectureLabel">Are you sure?</h5>
      </div>
      <form id="lectureForm" method="post" action="../includes/process_delete_course.php">
        <div class="modal-body">
          <div class="row text-start g-3">
            <div class="col-12">
              <p>If your delete your course you will lost all the data related to this course. Make sure before deleting.</p>
            </div>
          </div>
        </div>
        <div class="modal-footer" style="border: none;">
          <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-success my-0" data-bs-dismiss="modal">Delete Course</button>
          <input type="text" name="id" value="<?= $course['id'] ?>" hidden>
        </div>
      </form>
    </div>
  </div>
</div>



<?php
$content = ob_get_clean();
include('../layouts/admin.php');
?>