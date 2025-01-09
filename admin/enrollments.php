<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/helpers.php');
include('../includes/get_course_by_id.php');
include('../includes/get_records.php');
include('../includes/get_record.php');


// Pagination variables
$limit = 10; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Conditions
$conditions = "1" . (isset($_GET['phone']) ? " AND phone LIKE '%" . $_GET['phone'] . "%'" : '');
$result = get_records_by_conditions_with_pagination($conn, 'enrollments', $conditions, $limit, $offset);

$enrollments = $result['data'];
$total_records = $result['total'];
$total_pages = ceil($total_records / $limit);
$start_record = ($page - 1) * $limit + 1;
$end_record = min($start_record + $limit - 1, $total_records);
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
          <form class="position-relative" action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <input class="form-control pe-5 bg-secondary bg-opacity-10 border-0" name="phone" type="search" placeholder="Mobile number..." aria-label="Search">
            <button class="bg-transparent px-2 py-0 border-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 text-primary"></i></button>
          </form>
        </div>
      </div>
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
            <th scope="col" class="py-3 border-0 px-3 rounded-start" style="width: 30%;">Course Name</th>
            <th scope="col" class="py-3 border-0 text-center">Student</th>
            <th scope="col" class="py-3 border-0">Price</th>
            <th scope="col" class="py-3 border-0 text-center">Status</th>
            <th scope="col" class="py-3 border-0">Mobile Number</th>
            <th scope="col" class="py-3 border-0 px-3 text-center">Transaction Id</th>
            <th scope="col" class="py-3 border-0 px-3 text-end rounded-end">Action</th>
          </tr>
        </thead>

        <!-- Table body START -->
        <tbody>
          <?php
          foreach ($enrollments as $enroll):
            $user = get_record($conn, 'users', $enroll['user_id']);
            $course = get_course($conn, $enroll['course_id']); ?>
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
                    <a href="../course_details.php?id=<?= $course['id'] ?>" class="stretched-link d-inline-block text-truncate" style="max-width: 250px;">
                      <?= $course['title'] ?>
                    </a>
                  </h6>
                </div>
              </td>


              <!-- Table data -->
              <td class="text-center">
                <a href="all_students.php?phone=<?= $user['phone'] ?>">
                  <img
                    class="custom-avatar custom-avatar-sm img-thumbnail scale-hover"
                    src="../uploads/img/users/<?= $user['avatar'] ? $user['avatar'] : 'blank.png' ?>"
                    alt="">
                </a>
              </td>
              <td>৳ <?= $course['price'] ?></td>
              <td class="text-center">
                <div class="badge <?= get_status_classes($enroll['status']) ?> bg-opacity-10">
                  <?= $enroll['status'] ?>
                </div>
              </td>
              <td><?= $enroll['phone'] ?></td>
              <td class="text-center"><mark><?= $enroll['tnx_id'] ?></mark></td>
              <td class="d-flex justify-content-end gap-2">
                <form method="post" action="../includes/process_enroll_update_status.php">
                  <input type="hidden" name="id" value="<?= $enroll['id'] ?>">

                  <button class="btn btn-sm btn-danger-soft btn-round me-1 mb-1 mb-md-0" name="action" value="delete">
                    <i class="fas fa-fw fa-times"></i>
                  </button>
                  <button class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0" name="action" value="approve"">
                    <!-- <i class=" far fa-fw fa-check"></i> -->
                    <i class="fas fa-check"></i>
                  </button>
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
  <?php include('../components/pagination.php') ?>
</div>
<!-- Page main content END -->



<?php
$content = ob_get_clean();
include('../layouts/admin.php');
?>