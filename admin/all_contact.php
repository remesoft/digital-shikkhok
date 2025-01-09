<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/get_records.php');
include('../includes/helpers.php');

// Pagination variables
$limit = 10; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Conditions
$conditions = "1" . (isset($_GET['phone']) ? " AND phone LIKE '%" . $_GET['phone'] . "%'" : '');
$result = get_records_by_conditions_with_pagination($conn, 'contacts', $conditions, $limit, $offset);

$contacts = $result['data'];
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
              <td class="py-2"><?= format_date($contact['created_at']) ?></td>
              <td class="py-2"><?= $contact['name'] ?></td>
              <td class="py-2"><?= $contact['phone'] ?></td>
              <td class="py-2"><?= $contact['message'] ?></td>
              <td class="py-2 d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-secondary-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Contact">
                  <i class="fas fa-copy fa-fw"></i>
                </button>
                <form action="../includes/process_delete_contacts.php" method="post" id="deleteContactForm">
                  <input type=" hidden" name="id" value="<?= $contact['id'] ?>" hidden>
                  <button
                    type="button"
                    class="btn btn-sm btn-danger-soft btn-round mb-0"
                    data-bs-placement="top"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteContactModal">
                    <i class="fas fa-trash-alt"></i>
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
  <!-- Card END -->
</div>
<!-- Page main content END -->

<!-- ------------------------------->
<!--      Delete Course Modal     -->
<!-- ------------------------------->
<div class="modal fade" id="deleteContactModal" tabindex="-1" aria-labelledby="addLectureLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="addLectureLabel">Are you sure?</h5>
      </div>
      <div class="modal-body">
        <div class="row text-start g-3">
          <div class="col-12">
            <p>If your delete this contact you will lost all the data related to this contact. Make sure before deleting.</p>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="border: none;">
        <button type="button" class="btn btn-secondary-soft my-0" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-danger my-0" data-bs-dismiss="modal" form="deleteContactForm">Delete Course</button>
      </div>
    </div>
  </div>
</div>



<?php
$content = ob_get_clean();
include('../layouts/admin.php');
?>