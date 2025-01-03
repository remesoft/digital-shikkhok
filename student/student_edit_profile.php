<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/helpers.php');
include('../includes/get_courses.php');
include	'../includes/get_user_by_id.php';

// variables
$user_id = $_SESSION['user_id'];
$user = get_user($conn, $user_id);
$page_title = "Edit Profile | Student Panel | Digital Shikkhok";
ob_start();
?>


<!-- Main content START -->
<div class="col-xl-9">
	<?php if (isset($_SESSION['error_message'])) { ?>
		<div class="alert <?= $_SESSION['error_type'] ?? 'alert-danger' ?> alert-dismissible fade show" role="alert">
			<?= $_SESSION['error_message'] ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php
		// Unset the session variables
		unset($_SESSION['error_message']);
		unset($_SESSION['error_type']);
	} ?>
	<!-- Edit profile START -->
	<div class="card bg-transparent border rounded-3">
		<!-- Card header -->
		<div class="card-header bg-transparent border-bottom">
			<h3 class="card-header-title mb-0">Edit Profile</h3>
		</div>
		<!-- Card body START -->
		<div class="card-body">
			<!-- Form -->
			<form action="../includes/process_student_update_profile.php" method="POST" enctype="multipart/form-data" class="row g-4">

				<!-- Profile picture -->
				<div class="col-12 justify-content-center align-items-center">
					<label class="form-label">Profile picture</label>
					<div class="d-flex align-items-center">
						<label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
							<!-- Avatar place holder -->
							<span class="avatar avatar-xl">
								<img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="../uploads/img/users/<?php echo $user['avatar']; ?>" alt="">
							</span>
							<!-- Remove btn -->
							<button type="button" class="uploadremove"><i class="bi bi-x text-white"></i></button>
						</label>
						<!-- Upload button -->
						<label class="btn btn-primary-soft mb-0 d-block" for="uploadfile-1">
							Change profile
							<input id="uploadfile-1" type="file" name="avatar" class="d-none">
						</label>




					</div>
				</div>

				<!-- Full name -->
				<div class="col-12">
					<div class="input-group d-flex justify-content-between">
						<div class=" me-2" style="width: 48%;">
							<label class="form-label d-block">First name</label>
							<input type="text" name="fname" id="fname" class="form-control" value="<?php echo $user['first_name']; ?>" placeholder="First name">
						</div>
						<div class="w-50">
							<label class="form-label d-block">Last name</label>
							<input type="text" name="lname" id="lname" class="form-control" value="<?php echo $user['last_name']; ?>" placeholder="Last name">
						</div>
					</div>
				</div>

				<!-- Email id -->
				<div class="col-md-6">
					<label class="form-label">Email id</label>
					<input class="form-control" type="email" value="<?php echo $user['email']; ?>" placeholder="Email" disabled>
				</div>

				<!-- Phone number -->
				<div class="col-md-6">
					<label class="form-label">Phone number</label>
					<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $user['phone']; ?>" placeholder="Phone number">
				</div>

				<!-- Save button -->
				<div class="d-sm-flex justify-content-end">
					<button type="submit" name="update_profile" class="btn btn-primary mb-0">Save changes</button>
				</div>
			</form>
		</div>
		<!-- Card body END -->
	</div>
	<!-- Edit profile END -->

	<div class="row g-4 mt-3">
		<!-- Password change START -->
		<div class="col-lg-6">
			<div class="card border bg-transparent rounded-3">
				<!-- Card header -->
				<div class="card-header bg-transparent border-bottom">
					<h5 class="card-header-title mb-0">Update password</h5>
				</div>
				<!-- Card body START -->
				<div class="card-body">
					<form action="../includes/process_student_update_password.php" method="POST">
						<!-- Current password -->
						<div class="mb-3">
							<label class="form-label">Current password</label>
							<input class="form-control" type="password" name="current_password" id="current_password" placeholder="Enter current password">
						</div>
						<!-- New password -->
						<div class="mb-3">
							<label class="form-label"> Enter new password</label>
							<div class="input-group">
								<input class="form-control" type="password" name="new_password" id="new_password" placeholder="Enter new password">
								<span class="input-group-text p-0 bg-transparent">
									<i class="far fa-eye cursor-pointer p-2 w-40px"></i>
								</span>
							</div>
							<div class="rounded mt-1" id="psw-strength"></div>
						</div>
						<!-- Confirm password -->
						<div>
							<label class="form-label">Confirm new password</label>
							<input class="form-control" type="password" name="confirm_password"
								id="confirm_password" placeholder="Enter new password">
						</div>
						<!-- Button -->
						<div class="d-flex justify-content-end mt-4">
							<button type="submit" name="update_password" class="btn btn-primary mb-0">Change password</button>
						</div>
					</form>
				</div>
				<!-- Card body END -->
			</div>
		</div>
		<!-- Password change end -->
	</div>
</div>


<?php
$content = ob_get_clean();
include('../layouts/student.php');
?>