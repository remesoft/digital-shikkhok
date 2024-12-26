<?php
session_start();
$pageTitle = "Home";
ob_start();
?>


<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Page Banner START -->
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
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item"><a href="#">Courses</a></li>
									<li class="breadcrumb-item"><a href="#">Cart</a></li>
									<li class="breadcrumb-item active" aria-current="page">Checkout</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Page Banner END -->

	<!-- =======================
Page content START -->
	<section class="pt-5">
		<div class="container">

			<div class="row g-4 g-sm-5">
				<!-- Main content START -->
				<div class="col-xl-8 mb-4 mb-sm-0">
					<!-- Alert -->
					<div class="alert alert-danger alert-dismissible d-flex justify-content-between align-items-center fade show py-2 pe-2" role="alert">
						<div>
							<i class="bi bi-exclamation-octagon-fill me-2"></i>
							Already have an account? <a href="#" class="text-reset btn-link mb-0 fw-bold">Log in</a>
						</div>
						<button type="button" class="btn btn-link mb-0 text-primary-hover text-end" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-lg"></i></button>
					</div>

					<!-- Personal info START -->
					<div class="card card-body shadow p-4">
						<!-- Title -->
						<h5 class="mb-0">Personal Details</h5>

						<!-- Form START -->
						<form action="includes/process_payment.php" method="POST" class="row g-3 mt-0">
							<!-- Name -->
							<div class="col-md-6 bg-light-input">
								<label for="yourName" class="form-label">Your name *</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Name">
							</div>
							<!-- Email -->
							<div class="col-md-6 bg-light-input">
								<label for="emailInput" class="form-label">Email address *</label>
								<input type="email" class="form-control" email id="email" placeholder="Email">
							</div>
							<!-- Number -->
							<div class="col-md-6 bg-light-input">
								<label for="mobileNumber" class="form-label">Mobile number *</label>
								<input type="text" class="form-control" name="phone" id="mobileNumber" placeholder="Mobile number">
							</div>
							<!-- Tranxacton code -->
							<div class="col-md-6 bg-light-input">
								<label for="postalCode" class="form-label">Transaction ID *</label>
								<input type="text" class="form-control" name="trnx_id" id="postalCode" placeholder="Transaction ID">
							</div>

							<!-- Button -->
							<div class="col-12 text-end">
								<button type="submit" class="btn btn-primary mb-0" disabled>Confirm Payment</button>
							</div>
						</form>
						<!-- Form END -->
					</div>
					<!-- Personal info END -->
				</div>
				<!-- Main content END -->

				<!-- Right sidebar START -->
				<div class="col-xl-4">

					<div class="row mb-0">
						<div class="col-md-6 col-xl-12">
							<!-- Order summary START -->
							<div class="card card-body shadow p-4 mb-4">
								<!-- Title -->
								<h4 class="mb-2">Order Summary</h4>

								<!-- Coupon START -->
								<div class="mb-3">
									<div class="input-group mt-2">
										<input class="form-control form-control" placeholder="COUPON CODE">
										<button type="button" class="btn btn-primary">Apply</button>
									</div>

								</div>
								<hr>
								<!-- Coupon END -->

								<!-- Course item START -->
								<div class="row g-3">
									<!-- Image -->
									<div class="col-sm-4">
										<img class="rounded" src="assets/images/courses/4by3/08.jpg" alt="">
									</div>
									<!-- Info -->
									<div class="col-sm-8">
										<h6 class="mb-0"><a href="#">Sketch from A to Z: for an app designer</a></h6>
										<!-- Info -->
										<div class="d-flex justify-content-between align-items-center mt-3">
											<!-- Price -->
											<span class="text-success">$150</span>

											<!-- Remove and edit button -->
											<div class="text-primary-hover">
												<a href="#" class="text-body me-2"><i class="bi bi-trash me-1"></i>Remove</a>
												<a href="#" class="text-body me-2"><i class="bi bi-pencil-square me-1"></i>Edit</a>
											</div>
										</div>
									</div>
								</div>
								<!-- Course item END -->


								<hr> <!-- Divider -->

								<!-- Price and detail -->
								<ul class="list-group list-group-borderless mb-2">
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="h6 fw-light mb-0">Original Price</span>
										<span class="h6 fw-light mb-0 fw-bold">$500</span>
									</li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="h6 fw-light mb-0">Coupon Discount</span>
										<span class="text-danger">-$20</span>
									</li>
									<li class="list-group-item px-0 d-flex justify-content-between">
										<span class="h5 mb-0">Total</span>
										<span class="h5 mb-0">$480</span>
									</li>
								</ul>

								<!-- Button -->
								<div class="d-grid">
									<a href="#" class="btn btn-lg btn-success">Place Order</a>
								</div>

								<!-- Content -->
								<p class="small mb-0 mt-2 text-center">By completing your purchase, you agree to these <a href="#"><strong>Terms of Service</strong></a></p>

							</div>
							<!-- Order summary END -->
						</div>

					</div>
					<!-- Row End -->
					<!-- Payment Process -->
					<div class="row">
						<div class="col-xl-12">
							<div class="row mb-0">
								<div class="col-md-6 col-xl-12">
									<!-- Order summary START -->
									<div class="card card-body shadow p-4 mb-4">
										<ol class="list-group list-group-borderless mb-2">
											<h4>How to pay</h4>
											<li class="list-group-item px-0 d-flex justify-content-between"> Billing Details এ সঠিক ভাবে First name, Last name, Phone Number, Email address প্রদান করুন।</li>
											<li class="list-group-item px-0 d-flex justify-content-between"> bKash App থেকে অথবা *247# Dial করে নিচে দেয়া Personal Number এ নির্দিষ্ট পরিমান টাকা Send Money করুন।</li>
											<li class="list-group-item px-0 d-flex justify-content-between">Bkash: 01752684239 করুন।</li>
											<li class="list-group-item px-0 d-flex justify-content-between">আপনি যে bKash Number থেকে টাকা দিয়েছেন সেটি “Your bKash Account Number” এর BOX এ লিখুন।</li>
											<li class="list-group-item px-0 d-flex justify-content-between"> টাকা পাঠানোর পরে bKash থেকে যে Successful SMS এ TrxID পেয়েছেন সেটি “bKash Transaction ID” এর BOX এ লিখুন।</li>
											<li class="list-group-item px-0 d-flex justify-content-between">উপর এর 01 থেকে 04 সম্পূর্ণ করে থাকলে Complete Payment এ Click করুন। [NB: 1.85% bKash "Send Money" fee will be added to the net price.]</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
				<!-- Right sidebar END -->


			</div><!-- Row END -->
		</div>
	</section>
	<!-- =======================
Page content END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<?php
$content = ob_get_clean();
include('layouts/website.php');
?>