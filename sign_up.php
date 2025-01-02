<?php
session_start();
$pageTitle = "Home";
ob_start();
?>

<section class="p-0 d-flex align-items-center position-relative overflow-hidden">

	<div class="container-fluid">
		<div class="row">
			<!-- left -->
			<div class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10">
				<div class="p-3 p-lg-5">
					<!-- Title -->
					<div class="text-center">
						<h2 class="fw-bold">আমাদের বৃহত্তম কমিউনিটিতে আপনাকে স্বাগতম।</h2>
						<p class="mb-0 h6 fw-light">চলুন আজ কিছু নতুন শিখি!</p>
					</div>
					<!-- SVG Image -->
					<img src="assets/images/element/02.svg" class="mt-5" alt="">
					<!-- Info -->
					<div class="d-sm-flex mt-5 align-items-center justify-content-center">
						<!-- Avatar group -->
						<ul class="avatar-group mb-2 mb-sm-0">
							<li class="avatar avatar-sm">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-sm">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-sm">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-sm">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
							</li>
						</ul>
						<!-- Content -->
						<p class="mb-0 h6 fw-light ms-0 ms-sm-3">৪,০০০+ শিক্ষার্থী যুক্ত হয়েছে, এখন আপনার পালা।</p>
					</div>
				</div>
			</div>

			<!-- Right -->
			<div class="col-12 col-lg-6 m-auto">
				<!-- ----------------------------------- -->
				<!--         Alert Dialog                -->
				<!-- ----------------------------------- -->
				<?php
				if (isset($_SESSION['error_message']) || isset($_SESSION['success_message'])) {
					$alert_type = isset($_SESSION['error_message']) ? 'warning' : 'success';
					$message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : $_SESSION['success_message'];
				?>
					<div class="alert alert-<?= $alert_type ?> alert-dismissible fade show" role="alert">
						<strong><?= $alert_type === 'warning' ? 'Error:' : 'Success:' ?></strong> <?= htmlspecialchars($message) ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php
					if ($alert_type === 'warning') {
						unset($_SESSION['error_message']);
					} else {
						unset($_SESSION['success_message']);
					}
				}
				?>
				<div class="row my-5">
					<div class="col-sm-10 col-xl-8 m-auto">
						<!-- Title -->
						<h2>নিবন্ধন করুন।</h2>
						<p class="lead mb-4">আপনার ব্যক্তিগত তথ্য দিয়ে অ্যাকাউন্ট নিবন্ধন করুন।</p>

						<!-- Form START -->
						<form action="./includes/process_student_register.php" method="POST">
							<!-- Full Name -->
							<div class="mb-4">
								<div class="row">
									<div class="col">
										<label for="inputFirstName" class="form-label">প্রথম নাম *</label>
										<div class="input-group input-group-lg">
											<input type="text" class="form-control border-0 bg-light rounded-end" placeholder="First name" aria-label="First name" name="fname" id="fname" required>
										</div>
									</div>
									<div class="col">
										<label for="inputLastName" class="form-label">শেষ নাম *</label>
										<div class="input-group input-group-lg">
											<input type="text" class="form-control border-0 bg-light rounded-end" placeholder="Last name" aria-label="Last name" name="lname" id="lname" required>
										</div>
									</div>
								</div>
							</div>

							<!-- Email -->
							<div class="mb-4">
								<label for="exampleInputEmail1" class="form-label">
									আপনার ইমেইল অ্যাড্রেস দিন। *</label>
								<div class="input-group input-group-lg">
									<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
									<input type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" name="email" id="email" required>
								</div>
							</div>
							<!-- Phone -->
							<div class="mb-4">
								<label for="exampleInputEmail1" class="form-label">আপনার ফোন নম্বর দিন। *</label>
								<div class="input-group input-group-lg">
									<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-phone"></i></span>
									<input type="number" class="form-control border-0 bg-light rounded-end ps-1" placeholder="Phone" name="phone" id="phone" required>
								</div>
							</div>
							<!-- Password -->
							<div class="mb-4">
								<label for="inputPassword5" class="form-label">আপনার পাসওয়ার্ড দিন। *</label>
								<div class="input-group input-group-lg">
									<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
									<input type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="*********" id="inputPassword5" name="pass" id="pass" required>
								</div>
								<div id="passwordHelpBlock" class="form-text">
									আপনার পাসওয়ার্ড কমপক্ষে ৮টি অক্ষর হতে হবে।
								</div>
							</div>
							<!-- Confirm Password -->
							<div class="mb-4">
								<label for="inputPassword6" class="form-label">পাসওয়ার্ড নিশ্চিত করুন *</label>
								<div class="input-group input-group-lg">
									<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
									<input type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="*********" id="inputPassword6" name="cpass" id="cpass" required>
								</div>
							</div>
							<!-- Check box -->
							<div class="mb-4">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="checkbox-1">
									<label class="form-check-label" for="checkbox-1">সাইন আপ করে,<a href="#"> আপনি শর্তাবলীতে সম্মত হচ্ছেন।</a></label>
								</div>
							</div>
							<!-- Button -->
							<div class="align-items-center mt-0">
								<div class="d-grid">
									<button class="btn btn-primary mb-0" type="submit">Sign Up</button>
								</div>
							</div>
						</form>

						<!-- Sign up link -->
						<div class="mt-4 text-center">
							<span>আগে থেকেই অ্যাকাউন্ট আছে?<a href="sign_in.php"> এখানে সাইন ইন করুন।?</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
$content = ob_get_clean();
include('layouts/website.php');
?>