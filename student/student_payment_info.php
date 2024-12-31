<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'student') {
	header('Location: ../sign_in.php');
	exit();
}
include '../includes/db.php';
include	'../includes/helpers.php';
include '../includes/get_course_by_id.php';
$user_id = $_SESSION['user_id'];
$records = get_payment_records($user_id, $conn);
$pageTitle = "Student Dashboard";
ob_start();
?>


<!-- Main content START -->
<div class="col-xl-9">

	<!-- Billing history START -->
	<div class="card bg-transparent border rounded-3">
		<!-- Card header START -->
		<div class="card-header bg-transparent border-bottom">
			<h3 class="mb-0">Billing history</h3>
		</div>
		<!-- Card header END -->

		<!-- Card body START -->
		<div class="card-body">

			<!-- Title and select START -->
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
							<option>Newest</option>
							<option>Oldest</option>
						</select>
					</form>
				</div>
			</div>
			<!-- Title and select END -->

			<!-- Student list table START -->
			<div class="table-responsive border-0">
				<table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
					<!-- Table head -->
					<thead>
						<tr>
							<th scope="col" class="border-0 rounded-start">Date</th>
							<th scope="col" class="border-0">Course name</th>
							<th scope="col" class="border-0">Payment Number</th>
							<th scope="col" class="border-0">Status</th>
							<th scope="col" class="border-0">Total</th>
							<th scope="col" class="border-0 rounded-end">Action</th>
						</tr>
					</thead>
					<!-- Table body -->
					<tbody>
						<!-- Table item -->
						<?php if (empty($records)) { ?>
							<tr>
								<td colspan="6" class="text-center">No records found</td>
							</tr>
						<?php }else{?>
						<?php foreach ($records as $info) { ?>
							<tr>
								<!-- Date item -->
								<td><?php echo $info['created_at']; ?></td>

								<!-- Title item -->
								<td>
									<?php $course = get_course($conn, $info['course_id']); ?>
									<h6 class="mt-2 mt-lg-0 mb-0"><a href="#"><?php echo $course['title']; ?></a></h6>
								</td>

								<!-- Payment method item -->
								<td class="h-40px" alt=""><span class="ms-2"><?php echo $info['phone']; ?></span></td>

								<!-- Status item -->
								<td>
									<span class="badge bg-gray bg-opacity-10 text-black"><?php if ($info['confirm'] == 1) echo "Paid"; else echo "Pending"; ?></span>
								</td>
								<!-- Total item -->
								<td><?php echo $course['price'];?> BDT</td>
								<!-- Action item -->
								<td>
									<a href="#" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0"><i class="bi bi-printer me-1"></i>Receipt</a>
								</td>
							</tr>
						<?php } }?>
					</tbody>
				</table>
			</div>
			<!-- Student list table END -->

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
	<!-- Billing history END -->

	<!-- Main content END -->
</div>


<?php
$content = ob_get_clean();
include('../layouts/student.php');
?>