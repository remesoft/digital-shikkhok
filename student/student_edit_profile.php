<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != '1') {
    header('Location: ../sign_in.php');
    exit();
}
$pageTitle = "Student Dashboard";
ob_start();
?>


			<!-- Main content START -->
			<div class="col-xl-9">
				<!-- Edit profile START -->
				<div class="card bg-transparent border rounded-3">
					<!-- Card header -->
					<div class="card-header bg-transparent border-bottom">
						<h3 class="card-header-title mb-0">Edit Profile</h3>
					</div>
					<!-- Card body START -->
					<div class="card-body">
						<!-- Form -->
						<form class="row g-4">

							<!-- Profile picture -->
							<div class="col-12 justify-content-center align-items-center">
								<label class="form-label">Profile picture</label>
								<div class="d-flex align-items-center">
									<label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
										<!-- Avatar place holder -->
										<span class="avatar avatar-xl">
											<img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/avatar/07.jpg" alt="">
										</span>
										<!-- Remove btn -->
										<button type="button" class="uploadremove"><i class="bi bi-x text-white"></i></button>
									</label>
									<!-- Upload button -->
									<label class="btn btn-primary-soft mb-0" for="uploadfile-1">Change</label>
									<input id="uploadfile-1" class="form-control d-none" type="file">
								</div>
							</div>

							<!-- Full name -->
							<div class="col-12">
								<label class="form-label">Full name</label>
								<div class="input-group">
									<input type="text" class="form-control" value="Lori" placeholder="First name">
									<input type="text" class="form-control" value="Stevens" placeholder="Last name">
								</div>
							</div>

							<!-- Username -->
							<div class="col-md-6">
								<label class="form-label">Username</label>
								<div class="input-group">
									<span class="input-group-text">Eduport.com</span>
									<input type="text" class="form-control" value="loristev">
								</div>
							</div>

							<!-- Email id -->
							<div class="col-md-6">
								<label class="form-label">Email id</label>
								<input class="form-control" type="email" value="example@gmail.com"  placeholder="Email">
							</div>

							<!-- Phone number -->
							<div class="col-md-6">
								<label class="form-label">Phone number</label>
								<input type="text" class="form-control" value="1234567890" placeholder="Phone number">
							</div>

							<!-- Location -->
							<div class="col-md-6">
								<label class="form-label">Location</label>
								<input class="form-control" type="text" value="California">
							</div>
							
							<!-- About me -->
							<div class="col-12">
								<label class="form-label">About me</label>
								<textarea class="form-control" rows="3">I’ve found a way to get paid for my favorite hobby, and do so while following my dream of traveling the world.</textarea>
								<div class="form-text">Brief description for your profile.</div> 
							</div>

							<!-- Education -->
							<div class="col-12">
								<label class="form-label">Education</label>
								<input class="form-control mb-2" type="text" value="Bachelor in Computer Graphics">
								<input class="form-control mb-2" type="text" value="Masters in Computer Graphics">
								<button class="btn btn-sm btn-light mb-0"><i class="bi bi-plus me-1"></i>Add more</button>
							</div>

							<!-- Save button -->
							<div class="d-sm-flex justify-content-end">
								<button type="button" class="btn btn-primary mb-0">Save changes</button>
							</div>
						</form>
					</div>
					<!-- Card body END -->
				</div>
				<!-- Edit profile END -->
				
				<div class="row g-4 mt-3">
					<!-- Linked account START -->
					<div class="col-lg-6">
						<div class="card bg-transparent border rounded-3">
							<!-- Card header -->
							<div class="card-header bg-transparent border-bottom">
								<h5 class="card-header-title mb-0">Linked account</h5>
							</div>
							<!-- Card body START -->
							<div class="card-body pb-0">
								<!-- Google -->
								<div class="position-relative mb-4 d-sm-flex bg-success bg-opacity-10 border border-success p-3 rounded">
									<!-- Title and content -->
									<h2 class="fs-1 mb-0 me-3"><i class="fab fa-google text-google-icon"></i></h2>
									<div>
										<div class="position-absolute top-0 start-100 translate-middle bg-white rounded-circle lh-1 h-20px">
											<i class="bi bi-check-circle-fill text-success fs-5"></i>
										</div>
											<h6 class="mb-1">Google</h6>
											<p class="mb-1 small">You are successfully connected to your Google account</p>
											<!-- Button -->
											<button type="button" class="btn btn-sm btn-danger mb-0">Invoke</button>
											<a href="#" class="btn btn-sm btn-link text-body mb-0">Learn more</a>
									</div>
								</div>

								<!-- Linkedin -->
								<div class="mb-4 d-sm-flex border p-3 rounded">
									<!-- Title and content -->
									<h2 class="fs-1 mb-0 me-3"><i class="fab fa-linkedin-in text-linkedin"></i></h2>
									<div>
										<h6 class="mb-1">Linkedin</h6>
										<p class="mb-1 small">Connect with Linkedin account for a personalized experience</p>
										<!-- Button -->
										<button type="button" class="btn btn-sm btn-primary mb-0">Connect Linkedin</button>
										<a href="#" class="btn btn-sm btn-link text-body mb-0">Learn more</a>
									</div>
								</div>

								<!-- Facebook -->
								<div class="mb-4 d-sm-flex border p-3 rounded">
									<!-- Title and content -->
									<h2 class="fs-1 mb-0 me-3"><i class="fab fa-facebook text-facebook"></i></h2>
									<div>
										<h6 class="mb-1">Facebook</h6>
										<p class="mb-1 small">Connect with Facebook account for a personalized experience</p>
										<!-- Button -->
										<button type="button" class="btn btn-sm btn-primary mb-0">Connect Facebook</button>
										<a href="#" class="btn btn-sm btn-link text-body mb-0">Learn more</a>
									</div>
								</div>
							</div>
							<!-- Card body END -->
						</div>
					</div>
					<!-- Linked account end -->

					<!-- Social media profile START -->
					<div class="col-lg-6">
						<div class="card bg-transparent border rounded-3">
							<!-- Card header -->
							<div class="card-header bg-transparent border-bottom">
								<h5 class="card-header-title mb-0">Social media profile</h5>
							</div>
							<!-- Card body START -->
							<div class="card-body">
								<!-- Facebook username -->
								<div class="mb-3">
									<label class="form-label"><i class="fab fa-facebook text-facebook me-2"></i>Enter facebook username</label>
									<input class="form-control" type="text" value="loristev" placeholder="Enter username">
								</div>
								
								<!-- Twitter username -->
								<div class="mb-3">
									<label class="form-label"><i class="bi bi-twitter text-twitter me-2"></i>Enter twitter username</label>
									<input class="form-control" type="text" value="loristev" placeholder="Enter username">
								</div>

								<!-- Instagram username -->
								<div class="mb-3">
									<label class="form-label"><i class="fab fa-instagram text-instagram-gradient me-2"></i>Enter instagram username</label>
									<input class="form-control" type="text" value="loristev" placeholder="Enter username">
								</div>

								<!-- Youtube -->
								<div class="mb-3">
									<label class="form-label"><i class="fab fa-youtube text-youtube me-2"></i>Add your youtube profile URL</label>
									<input class="form-control" type="text" value="https://www.youtube.com/in/Eduport-05620abc" placeholder="Enter username">
								</div>

								<!-- Button -->
								<div class="d-flex justify-content-end mt-4">
									<button type="button" class="btn btn-primary mb-0">Save changes</button>
								</div>
							</div>
							<!-- Card body END -->
						</div>
					</div>
					<!-- Social media profile END -->

					<!-- EMail change START -->
					<div class="col-lg-6">
						<div class="card bg-transparent border rounded-3">
							<!-- Card header -->
							<div class="card-header bg-transparent border-bottom">
								<h5 class="card-header-title mb-0">Update email</h5>
							</div>
							<!-- Card body -->
							<div class="card-body">
								<p>Your current email address is <span class="text-primary">example@gmail.com</span></p>
								<!-- Email -->
								<form>
									<label class="form-label">Enter your new email id</label>
									<input class="form-control" type="email" placeholder="Enter new email">
									<div class="d-flex justify-content-end mt-4">
										<button type="button" class="btn btn-primary mb-0">Update email</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- EMail change end -->

					<!-- Password change START -->
					<div class="col-lg-6">
						<div class="card border bg-transparent rounded-3">
							<!-- Card header -->
							<div class="card-header bg-transparent border-bottom">
								<h5 class="card-header-title mb-0">Update password</h5>
							</div>
							<!-- Card body START -->
							<div class="card-body">
								<!-- Current password -->
								<div class="mb-3">
									<label class="form-label">Current password</label>
									<input class="form-control" type="password" placeholder="Enter current password">
								</div>
								<!-- New password -->
								<div class="mb-3">
									<label class="form-label"> Enter new password</label>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Enter new password">
										<span class="input-group-text p-0 bg-transparent">
											<i class="far fa-eye cursor-pointer p-2 w-40px"></i>
										</span>
									</div>
									<div class="rounded mt-1" id="psw-strength"></div>
								</div>
								<!-- Confirm password -->
								<div>
									<label class="form-label">Confirm new password</label>
									<input class="form-control" type="password" placeholder="Enter new password">
								</div>
								<!-- Button -->
								<div class="d-flex justify-content-end mt-4">
									<button type="button" class="btn btn-primary mb-0">Change password</button>
								</div>
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
