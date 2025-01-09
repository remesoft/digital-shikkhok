<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/helpers.php');
include('../includes/get_records.php');
include('../includes/get_totals.php');


// Pagination variables
$limit = 10; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Conditions
$conditions = "role = 'student'" . (isset($_GET['phone']) ? " AND phone LIKE '%" . $_GET['phone'] . "%'" : '');
$result = get_records_by_conditions_with_pagination($conn, 'users', $conditions, $limit, $offset);

$users = $result['data'];
$total_records = $result['total'];
$total_pages = ceil($total_records / $limit);
$start_record = ($page - 1) * $limit + 1;
$end_record = min($start_record + $limit - 1, $total_records);
$page_title = "All Students | Admin Panel | Digital Shikkhok";
ob_start();
?>


<!-- Page main content START -->
<div class="page-content-wrapper border">

  <!-- Title -->
  <div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
      <h4 class="mb-2 mb-sm-0">Students Table</h4>
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
            <th scope="col" class="border-0 rounded-start">Student name</th>
            <th scope="col" class="border-0">Join date</th>
            <th scope="col" class="border-0">Email</th>
            <th scope="col" class="border-0 text-center">Enrolled</th>
            <th scope="col" class="border-0 text-center">Payments</th>
            <th scope="col" class="border-0 rounded-end text-end">Actions</th>
          </tr>
        </thead>

        <!-- Table body START -->
        <tbody>
          <?php foreach ($users as $user) : ?>
            <tr>
              <!-- Table data -->
              <td>
                <div class="d-flex align-items-center position-relative">
                  <!-- Image -->
                  <div class="custom-avatar">
                    <img src="../uploads/img/users/<?= $user['avatar'] ? $user['avatar'] : 'blank.png' ?>" class="custom-avatar" alt="">
                  </div>
                  <div class="mb-0 ms-3">
                    <!-- Title -->
                    <h6 class="mb-0">
                      <a href="#" class="stretched-link">
                        <?= $user['first_name'] ?>
                        <?= $user['last_name'] ?>
                      </a>
                    </h6>
                    <span class="text-body small">
                      <i class="fas fa-phone text-info me-1 mt-1"></i>
                      <?= $user['phone'] ?>
                    </span>
                  </div>
                </div>
              </td>

              <!-- Table data -->
              <td><?= format_date($user['created_at']) ?></td>

              <!-- Table data -->
              <td><?= $user['email'] ?></td>

              <!-- Table data -->
              <td class="text-center"><?= total_course_enrolled($conn, $user['id']) ?></td>

              <!-- Table data -->
              <td class="text-center">৳ <?= total_payment($conn, $user['id']) ?></td>

              <!-- Table data -->
              <td class="text-end">
                <span class="dropdown text-end">
                  <a
                    href="#"
                    class="btn btn-light btn-round me-1 mb-1 mb-md-0"
                    role="button"
                    id="dropdownShare2"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-three-dots fa-fw"></i>
                  </a>
                  <!-- dropdown button -->
                  <ul
                    class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                    aria-labelledby="dropdownShare2">
                    <li>
                      <form method="POST" action="../includes/process_update_role.php">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <input type="hidden" name="role" value="instructor">
                        <button class="dropdown-item" type="submit">
                          <i class="fab fa-ups fa-fw me-2"></i>
                          Promote to Instructor</a>
                        </button>
                      </form>
                    </li>
                    <li>
                      <form method="POST" action="../includes/process_delete_user.php">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <input type="hidden" name="table" value="users">
                        <input type="hidden" name="page" value="students">
                        <button class="dropdown-item" type="submit">
                          <i class="bi bi-trash fa-fw me-2"></i>
                          Delete this account</a>
                        </button>
                      </form>
                    </li>
                  </ul>
                </span>
                <a href="mailto:<?= $user['email'] ?>" class="btn btn-light btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Message">
                  <i class="bi bi-envelope"></i>
                </a>
                <a href="#" class="btn btn-light btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                  <i class="bi bi-eye"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <!-- Table body END -->
      </table>
    </div>
    <!-- Course table END -->
  </div>
  <!-- Card body END -->

  <?php include('../components/pagination.php'); ?>
</div>
<!-- Page main content END -->



<?php
$content = ob_get_clean();
include('../layouts/admin.php');
?>