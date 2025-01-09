<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/get_courses.php');
include('../includes/get_totals.php');
include('../includes/get_records.php');

// Pagination variables
$limit = 2; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Phone condition
$result = get_records_by_conditions_with_pagination($conn, 'courses', '1', $limit, $offset);

$courses = $result['data'];
$total_records = $result['total'];
$total_pages = ceil($total_records / $limit);
$start_record = ($page - 1) * $limit + 1;
$end_record = min($start_record + $limit - 1, $total_records);
$page_title = "All Courses | Admin Panel | Digital Shikkhok";
ob_start();
?>


<!-- Page main content START -->
<div class="page-content-wrapper border">

  <!-- Title -->
  <div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
      <h4 class=" mb-2 mb-sm-0">All Courses</h4>
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
            <th scope="col" class="border-0 ">Instructor</th>
            <th scope="col" class="border-0 text-center">Price</th>
            <th scope="col" class="border-0 text-center">Enrolled</th>
            <th scope="col" class="border-0 px-3 text-end">Action</th>
          </tr>
        </thead>

        <!-- Table body START -->
        <tbody>
          <?php foreach ($courses as $course): ?>
            <tr>
              <!-- Table data -->
              <td>
                <div class="d-flex align-items-center position-relative">
                  <!-- Image -->
                  <div class="w-60px">
                    <img src="../uploads/img/thumbnails/<?= $course['thumbnail'] ?>" class="rounded" alt="">
                  </div>
                  <!-- Title -->
                  <h6 class="table-responsive-title mb-0 ms-2">
                    <a href="../course_details.php?id=<?= $course['id'] ?>"
                      class="stretched-link d-inline-block text-truncate"
                      style="max-width: 250px;"><?= $course['title'] ?>
                    </a>
                  </h6>
                </div>
              </td>

              <!-- Table data -->
              <td>
                <div class="d-flex align-items-center">
                  <!-- Avatar -->
                  <div class="avatar avatar-xs flex-shrink-0">
                    <img class="avatar-img rounded-circle" src="../uploads/img/instructors/instructor-02.png" alt="avatar">
                  </div>
                  <!-- Info -->
                  <div class="ms-2">
                    <h6 class="mb-0 fw-light">Md. Sharif Ahmed</h6>
                  </div>
                </div>
              </td>

              <!-- Table data -->
              <td class="text-center">৳ <?= htmlspecialchars($course['price']) ?></td>
              <td class="text-center"> <?= total_enrolled($conn, $course['id']) ?></td>
              <td class="d-flex justify-content-end">
                <a href="edit_course.php?id=<?= $course['id'] ?>" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0"><i class="far fa-fw fa-edit"></i></a>
                <button class="btn btn-sm btn-danger-soft btn-round mb-0" type="button" data-bs-toggle="modal" data-bs-target="#deleteLecture">
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

  <div class="card-footer bg-transparent pt-0">
    <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
      <p class="mb-0 text-center text-sm-start">
        Showing <?= $start_record ?> to
        <?= $end_record ?> of
        <?= $total_records ?>
        entries
      </p>
      <!-- Pagination -->
      <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
        <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
          <!-- Previous Button -->
          <li class="page-item mb-0 <?= ($page <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?= max(1, $page - 1); ?>" tabindex="-1">
              <i class="fas fa-angle-left"></i>
            </a>
          </li>

          <!-- First Page -->
          <?php if ($page > 3) : ?>
            <li class="page-item mb-0"><a class="page-link" href="?page=1">1</a></li>
            <?php if ($page > 4) : ?>
              <li class="page-item mb-0 disabled"><span class="page-link">...</span></li>
            <?php endif; ?>
          <?php endif; ?>

          <!-- Centered Pages -->
          <?php for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) : ?>
            <li class="page-item mb-0 <?= ($i == $page) ? 'active' : ''; ?>">
              <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
            </li>
          <?php endfor; ?>

          <!-- Last Page -->
          <?php if ($page < $total_pages - 2) : ?>
            <?php if ($page < $total_pages - 3) : ?>
              <li class="page-item mb-0 disabled"><span class="page-link">...</span></li>
            <?php endif; ?>
            <li class="page-item mb-0"><a class="page-link" href="?page=<?= $total_pages; ?>"><?= $total_pages; ?></a></li>
          <?php endif; ?>

          <!-- Next Button -->
          <li class="page-item mb-0 <?= ($page >= $total_pages) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?= min($total_pages, $page + 1); ?>">
              <i class="fas fa-angle-right"></i>
            </a>
          </li>
        </ul>
      </nav>

    </div>
  </div>
</div>
<!-- Page main content END -->

<!-- ------------------------------->
<!--      Delete Course Modal     -->
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
          <button type="button" class="btn btn-secondary-soft my-0" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-danger my-0" data-bs-dismiss="modal">Delete Course</button>
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