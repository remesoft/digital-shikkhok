<?php
// include essential files
include '../includes/db.php';
include '../includes/session.php';
include '../includes/helpers.php';
include '../includes/get_totals.php';
include '../includes/get_record.php';
include '../includes/get_records.php';

// variables
$total_students = get_total_students($conn);
$total_courses = get_total_courses($conn);
$total_instructors = get_total_instructors($conn);
$total_earnings = get_total_earnings($conn);
$page_title = "Dashboard | Admin Panel | Digital Shikkhok";
ob_start();
?>


<div class="page-content-wrapper border">

	<!-- Title -->
	<div class="row">
		<div class="col-12 mb-3">
			<h1 class="h3 mb-2 mb-sm-0">Dashboard</h1>
		</div>
	</div>

	<!-- Counter boxes START -->
	<div class="row g-4 mb-4">
		<!-- Counter item -->
		<div class="col-md-6 col-xxl-3">
			<div class="card card-body bg-warning bg-opacity-15 p-4 h-100">
				<div class="d-flex justify-content-between align-items-center">
					<!-- Digit -->
					<div>
						<h2 class="purecounter mb-0 fw-bold" data-purecounter-delay="200" data-purecounter-start="0" data-purecounter-end="<?= $total_courses ?>">0</h2>
						<span class="mb-0 h6 fw-light">Total Courses</span>
					</div>
					<!-- Icon -->
					<div class="icon-lg rounded-circle bg-warning text-white mb-0"><i class="fas fa-tv fa-fw"></i></div>
				</div>
			</div>
		</div>

		<!-- Counter item -->
		<!-- Counter item -->
		<div class="col-md-6 col-xxl-3">
			<div class="card card-body bg-success bg-opacity-10 p-4 h-100">
				<div class="d-flex justify-content-between align-items-center">
					<!-- Digit -->
					<div>
						<div class="d-flex">
							<span class="mb-0 h2 me-1">৳</span>
							<h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?= $total_earnings ?>" data-purecounter-delay="200">0</h2>
						</div>
						<span class="mb-0 h6 fw-light">Total Earnings</span>
					</div>
					<!-- Icon -->
					<div class="icon-lg rounded-circle bg-success text-white mb-0"><i class="fas fa-money-bill-wave fa-fw"></i></i></div>
				</div>
			</div>
		</div>

		<!-- Counter item -->
		<div class="col-md-6 col-xxl-3">
			<div class="card card-body bg-primary bg-opacity-10 p-4 h-100">
				<div class="d-flex justify-content-between align-items-center">
					<!-- Digit -->
					<div>
						<h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?= $total_students ?>">0</h2>
						<span class="mb-0 h6 fw-light">Total Students</span>
					</div>
					<!-- Icon -->
					<div class="icon-lg rounded-circle bg-primary text-white mb-0"><i class="fas fa-user-graduate fa-fw"></i></div>
				</div>
			</div>
		</div>

		<!-- Counter item -->
		<div class="col-md-6 col-xxl-3">
			<div class="card card-body bg-purple bg-opacity-10 p-4 h-100">
				<div class="d-flex justify-content-between align-items-center">
					<!-- Digit -->
					<div>
						<div class="d-flex">
							<h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?= $total_instructors ?>" data-purecounter-delay="200">0</h2>
						</div>
						<span class="mb-0 h6 fw-light">Total Instructor</span>
					</div>
					<!-- Icon -->
					<div class="icon-lg rounded-circle bg-purple text-white mb-0">
						<i class="fas fa-chalkboard-teacher fa-fw"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Counter boxes END -->


	<!-- Top listed Cards START -->
	<div class="row g-4">

		<!-- Top instructors START -->
		<div class="col-lg-6 col-xxl-4">
			<div class="card shadow h-100">

				<!-- Card header -->
				<div class="card-header border-bottom d-flex justify-content-between align-items-center p-4">
					<h5 class="card-header-title">Recent Enrollments</h5>
					<a href="enrollments.php" class="btn btn-link p-0 mb-0">View all</a>
				</div>

				<!-- Card body START -->
				<div class="card-body p-4">

					<?php
					$enrollments = get_records($conn, 'enrollments');
					foreach ($enrollments as $enroll) :
						$course = get_record($conn, 'courses', $enroll['course_id']);
						$user = get_record($conn, 'users', $enroll['user_id']);
						$name = $user['first_name'] . ' ' . $user['last_name'];

					?>
						<!-- Instructor item START -->
						<div class="d-sm-flex justify-content-between align-items-center">
							<!-- Avatar and info -->
							<div class="d-sm-flex align-items-top mb-1 mb-sm-0">
								<!-- Avatar -->
								<div class="avatar avatar-md flex-shrink-0">
									<img class="avatar-img rounded-circle" src="../uploads/img/users/<?= $user['avatar'] ? $user['avatar'] : 'blank.png' ?>" alt="avatar">
								</div>
								<!-- Info -->
								<div class="ms-0 ms-sm-2 mt-2 mt-sm-0">
									<h6 class="mb-1"><?= $name ?><i class="bi bi-patch-check-fill text-info small ms-1"></i></h6>
									<ul class="list-inline mb-0 small">
										<li class="list-inline fw-light me-2 mb-1 mb-sm-0">
											<i style="color: #e2136e;" class="fas fa-phone me-1"></i>
											01771868382
										</li>
										<li class="list-inline fw-light me-2 mb-1 mb-sm-0">
											<i class="fas fa-money-bill text-success me-1"></i>
											<?= $enroll['tnx_id'] ?>
										</li>
									</ul>
								</div>
							</div>
							<!-- Button -->
							<div class="badge <?= get_status_classes($enroll['status']) ?> bg-opacity-10">
								<?= $enroll['status'] ?>
							</div>
						</div>
						<!-- Instructor item END -->

						<hr><!-- Divider -->

					<?php endforeach; ?>
				</div>
				<!-- Card body END -->
			</div>
		</div>

		<!-- Top instructors START -->
		<div class="col-lg-6 col-xxl-4">
			<div class="card shadow h-100">

				<!-- Card header -->
				<div class="card-header border-bottom d-flex justify-content-between align-items-center p-4">
					<h5 class="card-header-title">Our Instructors</h5>
					<!-- <a href="enrollments.php" class="btn btn-link p-0 mb-0">View all</a> -->
				</div>

				<!-- Card body START -->
				<div class="card-body p-4">

					<?php
					$instructors = get_records_by_conditions($conn, 'users', 'role = "instructor"');
					foreach ($instructors as $instructor) :
						$name = $instructor['first_name'] . ' ' . $instructor['last_name']; ?>
						<!-- Instructor item START -->
						<div class="d-sm-flex justify-content-between align-items-center">
							<!-- Avatar and info -->
							<div class="d-sm-flex align-items-top mb-1 mb-sm-0">
								<!-- Avatar -->
								<div class="avatar avatar-md flex-shrink-0">
									<img class="avatar-img rounded-circle" src="../uploads/img/users/<?= $instructor['avatar'] ? $instructor['avatar'] : 'blank.png' ?>" alt="avatar">
								</div>
								<!-- Info -->
								<div class="ms-0 ms-sm-2 mt-2 mt-sm-0">
									<h6 class="mb-1"><?= $name ?></h6>
									<ul class="list-inline mb-0 small">
										<li class="list-inline fw-light me-2 mb-1 mb-sm-0">
											<i class="fas fa-phone text-info me-1"></i>
											<?= $instructor['phone'] ?>
										</li>
									</ul>
								</div>
							</div>
							<!-- Button -->
							<!-- <a href="#" class="btn btn-sm btn-light mb-0">View</a> -->
						</div>
						<!-- Instructor item END -->

						<hr><!-- Divider -->

					<?php endforeach; ?>
				</div>
				<!-- Card body END -->
			</div>
		</div>
	</div>
	<!-- Top listed Cards END -->

</div>
<!-- Page main content END -->
</div>
<!-- Page content END -->



<?php
$content = ob_get_clean();
include('../layouts/admin.php');
?>