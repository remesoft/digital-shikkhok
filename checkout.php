<?php
session_start();
include('includes/db.php');
include('includes/get_course_by_id.php');
$course = get_course($conn, $_GET['id']);

// include('includes/get_user_by_email.php');
// $user = get_user($conn, $_SESSION['user_email']);
// if (isset($_GET['id'])) {
// 	$course_id = $_GET['id'];
// } else {
// 	// Handle the error (e.g., redirect or show an error message)
// 	$course_id = null;
// }
$pageTitle = "Checkout | Digital Shikkhok";
ob_start();
?>



<!-- Page Banner START -->
<section class="py-0">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bg-light p-4 text-center rounded-3">
					<h1 class="m-0">Checkout</h1>
					<!-- Breadcrumb -->
					<div class="d-flex justify-content-center">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-dots mb-0">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item"><a href="our_courses.php">Courses</a></li>
								<li class="breadcrumb-item active" aria-current="page">Checkout</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="pt-5">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8">
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

				<!-- -----------------------------------------
				 					BILLING INFORMATION START 
				--------------------------------------------->
				<div class="card card-body shadow border p-4">
					<h5 class="mb-0 mt-3">Billing Details</h5>
					<form action="includes/process_payment.php" method="POST" class="row g-3 mt-0">
						<input type="hidden" name="course_id" value="<?= htmlspecialchars($course['id']) ?>">
						<div class="col-md-6 bg-light-input">
							<label for="mobileNumber" class="form-label">Your bKash Account Number *</label>
							<input type="text" class="form-control" name="phone" id="mobileNumber" placeholder="01700000000" require>
						</div>
						<!-- Tranxacton code -->
						<div class="col-md-6 bg-light-input">
							<label for="postalCode" class="form-label">bKash Transaction ID *</label>
							<input type="text" class="form-control" name="tnx_id" id="trnx_id" placeholder="BL08CEOGWU" require>
						</div>
						<!-- Button -->
						<div class="col-12 text-end">
							<button type="submit" class="btn btn-primary mb-0"> Confirm Payment</button>
						</div>
					</form>
				</div>
				<!-- -----------------------------------------
				 					HOW TO PAY INFORMATION
				--------------------------------------------->
				<div class="card card-body shadow border p-4 mt-3">
					<h5 class="mb-3">How to pay</h5>
					<ul class="list-group list-group-borderless pt-3">
						<li class="list-group-item h6 fw-light d-flex mb-0">
							<i class="fas fa-info-circle text-primary me-2"></i>
							<strong style="color: #E2136E;">Bkash Number : 01752684239</strong>
						</li>
						<li class="list-group-item h6 fw-light d-flex mb-0">
							<i class="fas fa-info-circle text-primary me-2"></i>
							bKash অ্যাপ বা *247# ডায়াল করে উপরের Personal Number-এ নির্ধারিত টাকা পাঠান।
						</li>
						<li class="list-group-item h6 fw-light d-flex mb-0">
							<i class="fas fa-info-circle text-primary me-2"></i>
							Billing Details এ সঠিক ভাবে Phone Number, Transaction ID প্রদান করুন।
						</li>


						<li class="list-group-item h6 fw-light d-flex mb-0">
							<i class="fas fa-info-circle text-primary me-2"></i>
							আপনি যে bKash নম্বর থেকে টাকা পাঠিয়েছেন, তা "Your bKash Account Number" বক্সে লিখুন।
						</li>
						<li class="list-group-item h6 fw-light d-flex mb-0">
							<i class="fas fa-info-circle text-primary me-2"></i>
							টাকা পাঠানোর পর bKash থেকে পাওয়া SMS-এর TrxID "bKash Transaction ID" বক্সে লিখুন।
						</li>
						<li class="list-group-item h6 fw-light d-flex mb-0">
							<i class="fas fa-info-circle text-primary me-2"></i>
							উপর এর 01 থেকে 04 সম্পূর্ণ করে থাকলে Complete Payment এ Click করুন। [NB: 1.85% bKash "Send Money" fee will be added to the net price.]
						</li>
					</ul>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<!-- -----------------------------------------
				 					Order Summery
				--------------------------------------------->
				<div class="card card-body shadow border p-4">
					<h5 class="mb-2">Order Summary</h5>
					<hr>

					<div class="row g-3">
						<!-- Image -->
						<div class="col-sm-4">
							<img class="rounded" src="./uploads/img/thumbnails/<?= $course['thumbnail'] ?>" alt="">
						</div>
						<!-- Info -->
						<div class="col-sm-8">
							<h6 class="mb-0"><a href="#"><?= $course['title'] ?></a></h6>
							<!-- Info -->
							<div class="d-flex justify-content-between align-items-center mt-2">
								<!-- Price -->
								<span class="text-success">৳ <?= $course['price'] ?></span>

							</div>
						</div>
					</div>
					<!-- Course item END -->


					<hr> <!-- Divider -->

					<!-- Price and detail -->
					<ul class="list-group list-group-borderless mb-2" style="border: 0;">
						<li class="list-group-item px-0 d-flex justify-content-between">
							<span class="h6 fw-light mb-0">Original Price</span>
							<span class="h6 fw-light mb-0 fw-bold">৳ <?= $course['price'] ?></span>
						</li>
						<li class="list-group-item px-0 d-flex justify-content-between">
							<span class="h6 fw-light mb-0">Coupon Discount</span>
							<span class="text-danger">-৳ 0</span>
						</li>
						<li class="list-group-item px-0 d-flex justify-content-between">
							<span class="h5 mb-0">Total</span>
							<span class="h5 mb-0">৳ <?= $course['price'] ?></span>
						</li>
					</ul>

					<!-- Content -->
					<p class="small mb-0 mt-2 text-center">By completing your purchase, you agree to these <a href="#"><strong>Terms of Service</strong></a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
$content = ob_get_clean();
include('layouts/website.php');
?>