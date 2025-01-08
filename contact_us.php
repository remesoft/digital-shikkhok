<?php
session_start();
include('includes/helpers.php');
$page_title = "Contact Us | Digital Shikkhok";
ob_start();
?>


<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Page Banner START -->
	<section class="pt-5 pb-0" style="background-image:url(assets/images/element/map.svg); background-position: center left; background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-xl-6 text-center mx-auto">
					<!-- Title -->
					<h6 class="text-primary">যোগাযোগ করুন</h6>
					<h1 class="mb-4">আমরা সাহায্য করার জন্য এখানে আছি!</h1>
				</div>
			</div>

			<!-- Contact info box -->
			<div class="row g-4 g-md-5 mt-0 mt-lg-3">
				<!-- Box item -->
				<div class="col-lg-4 mt-lg-0">
					<div class="card card-body bg-primary shadow py-5 text-center h-100">
						<!-- Title -->
						<h5 class="text-white mb-3">গ্রাহক সহায়তা</h5>
						<ul class="list-inline mb-0">
							<!-- Address -->
							<li class="list-item mb-3">
								<a href="#" class="text-white"> <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>সিলেট পলিটেকনিক প্রধান গেট, টেকনিক্যাল রোড, সিলেট। </a>
							</li>
							<!-- Phone number -->
							<li class="list-item mb-3">
								<a href="#" class="text-white"> <i class="fas fa-fw fa-phone-alt me-2"></i>+8801719979817 </a>
							</li>
							<!-- Email id -->
							<li class="list-item mb-0">
								<a href="#" class="text-white"> <i class="far fa-fw fa-envelope me-2"></i>email.dwip@gmail.com</a>
							</li>
						</ul>
					</div>
				</div>

				<!-- Box item -->
				<div class="col-lg-4 mt-lg-0">
					<div class="card card-body shadow py-5 text-center h-100">
						<!-- Title -->
						<h5 class="mb-3">যোগাযোগের ঠিকানা</h5>
						<ul class="list-inline mb-0">
							<!-- Address -->
							<li class="list-item mb-3">
								<a href="#" class="text-dark"> <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>সিলেট পলিটেকনিক প্রধান গেট, টেকনিক্যাল রোড, সিলেট। </a>
							</li>
							<!-- Phone number -->
							<li class="list-item mb-3">
								<a href="#" class="text-dark"> <i class="fas fa-fw fa-phone-alt me-2"></i>+8801719979817 </a>
							</li>
							<!-- Email id -->
							<li class="list-item mb-0">
								<a href="#" class="text-dark"> <i class="far fa-fw fa-envelope me-2"></i>email.dwip@gmail.com</a>
							</li>
						</ul>
					</div>
				</div>

				<!-- Box item -->
				<div class="col-lg-4 mt-lg-0">
					<div class="card card-body shadow py-5 text-center h-100">
						<!-- Title -->
						<h5 class="text-dark mb-3">যোগাযোগের ঠিকানা</h5>
						<ul class="list-inline mb-0">
							<!-- Address -->
							<li class="list-item mb-3">
								<a href="#" class="text-dark"> <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>সিলেট পলিটেকনিক প্রধান গেট, টেকনিক্যাল রোড, সিলেট। </a>
							</li>
							<!-- Phone number -->
							<li class="list-item mb-3">
								<a href="#" class="text-dark"> <i class="fas fa-fw fa-phone-alt me-2"></i>+8801719979817 </a>
							</li>
							<!-- Email id -->
							<li class="list-item mb-0">
								<a href="#" class="text-dark"> <i class="far fa-fw fa-envelope me-2"></i>email.dwip@gmail.com</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Page Banner END -->

	<!-- =======================
Image and contact form START -->
	<section>
		<div class="container">
			<div class="row g-4 g-lg-0 align-items-center">

				<div class="col-md-6 align-items-center text-center">
					<!-- Image -->
					<img src="assets/images/element/contact.svg" class="h-400px" alt="">

					<!-- Social media button -->
					<div class="d-sm-flex align-items-center justify-content-center mt-2 mt-sm-4">
						<h5 class="mb-0">Follow us on:</h5>
						<ul class="list-inline mb-0 ms-sm-2">
							<li class="list-inline-item"> <a class="fs-5 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-square"></i></a> </li>
							<li class="list-inline-item"> <a class="fs-5 me-1 text-instagram" href="#"><i class="fab fa-fw fa-instagram"></i></a> </li>
							<li class="list-inline-item"> <a class="fs-5 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a> </li>
							<li class="list-inline-item"> <a class="fs-5 me-1 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a> </li>
							<li class="list-inline-item"> <a class="fs-5 me-1 text-dribbble" href="#"><i class="fas fa-fw fa-basketball-ball"></i></a> </li>
							<li class="list-inline-item"> <a class="fs-5 me-1 text-pinterest" href="#"><i class="fab fa-fw fa-pinterest"></i></a> </li>
						</ul>
					</div>
				</div>

				<!-- Contact form START -->
				<div class="col-md-6" id="contact">
					<!-- Title -->
					<h2 class="mt-4 mt-md-0">আসুন কথা বলি</h2>

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

					<p>একটি প্রস্তাবের জন্য অনুরোধ করতে বা চায়ের আড্ডায় মিলিত হতে চান? সরাসরি আমাদের সাথে যোগাযোগ করুন বা ফর্মটি পূরণ করুন, আমরা দ্রুত আপনার কাছে ফিরে আসব।</p>

					<form action="includes/process_contact_submit.php" method="post">
						<!-- Name -->
						<div class="mb-4 bg-light-input">
							<label for="yourName" class="form-label">আপনার নাম *</label>
							<input type="text" name="name" class="form-control form-control-lg" id="yourName">
						</div>
						<!-- Email -->
						<div class="mb-4 bg-light-input">
							<label for="phoneInput" class="form-label">মোবাইল নম্বর *</label>
							<input type="text" name="phone" class="form-control form-control-lg" id="phoneInput">
						</div>
						<!-- Message -->
						<div class="mb-4 bg-light-input">
							<label for="textareaBox" class="form-label">বার্তা *</label>
							<textarea class="form-control" name="message" id="textareaBox" rows="4"></textarea>
						</div>
						<!-- Button -->
						<div class="d-grid">
							<button class="btn btn-lg btn-primary mb-0" type="submit">বার্তা পাঠান</button>
						</div>
					</form>
				</div>
				<!-- Contact form END -->
			</div>
		</div>
	</section>
	<!-- Image and contact form END -->

	<!-- Map START -->
	<section class="pt-0">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<iframe class="w-100 h-400px grayscale rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d452.4193980403397!2d91.85860695680273!3d24.885863482892074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3751ab007f980cf5%3A0xce2a16b9b4857ea7!2sSylhet%20Polytechnic%20Institute%20Gate!5e0!3m2!1sen!2sbd!4v1736239091335!5m2!1sen!2sbd" height="500" style="border:0;" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Map END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->



<?php
$content = ob_get_clean();
include('layouts/website.php');
?>