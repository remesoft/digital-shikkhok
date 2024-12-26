<?php
session_start();
include('includes/db.php');
include('includes/get_course_by_id.php');
$pageTitle = "Course Details";
$course = get_course_by_id($conn, $_GET['id']);
ob_start();
?>




<!--Page content START -->
<section class="pt-3 pt-xl-5">
  <div class="container" data-sticky-container>
    <div class="row g-4">
      <!-- Main content START -->
      <div class="col-xl-8">

        <div class="row g-4">
          <!-- Title START -->
          <div class="col-12">

            <!-- Title -->
            <h2><?= $course['title'] ?></h2>
            <p><?= $course['short_desc'] ?></p>
            <!-- Content -->
            <ul class="list-inline mb-0">
              <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i class="fas fa-star me-2"></i>4.5/5.0</li>
              <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate me-2"></i>12k Enrolled</li>
              <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i class="fas fa-signal me-2"></i>All levels</li>
              <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i class="bi bi-patch-exclamation-fill me-2"></i>Last updated 09/2021</li>
              <li class="list-inline-item fw-light h6"><i class="fas fa-globe me-2"></i>English</li>
            </ul>
          </div>
          <!-- Title END -->

          <!-- Image and video -->
          <div class="col-12 position-relative">
            <div class="video-player rounded-3">
              <video controls crossorigin="anonymous" playsinline poster="assets/images/videos/poster.jpg">
                <source src="assets/images/videos/360p.mp4" type="video/mp4" size="360">
                <source src="assets/images/videos/720p.mp4" type="video/mp4" size="720">
                <source src="assets/images/videos/1080p.mp4" type="video/mp4" size="1080">
                <!-- Caption files -->
                <track kind="captions" label="English" srclang="en" src="assets/images/videos/en.vtt" default>
                <track kind="captions" label="French" srclang="fr" src="assets/images/videos/fr.vtt">
              </video>
            </div>
          </div>

          <!-- About course START -->
          <div class="col-12">
            <div class="card border">
              <!-- Card header START -->
              <div class="card-header border-bottom">
                <h3 class="mb-0">Course description</h3>
              </div>
              <!-- Card header END -->

              <!-- Card body START -->
              <div class="card-body">
                <p class="mb-3">Welcome to the <strong> Digital Marketing Ultimate Course Bundle - 12 Courses in 1 (Over 36 hours of content)</strong></p>
                <p class="mb-3">In this practical hands-on training, you’re going to learn to become a digital marketing expert with this <strong> ultimate course bundle that includes 12 digital marketing courses in 1!</strong></p>
                <p class="mb-0">If you wish to find out the skills that should be covered in a basic digital marketing course syllabus in India or anywhere around the world, then reading this blog will help. Before we delve into the advanced <strong><a href="#" class="text-reset text-decoration-underline">digital marketing course</a></strong> syllabus, let’s look at the scope of digital marketing and what the future holds.</p>
                <!-- Collapse body -->
                <div class="collapse" id="collapseContent">
                  <p class="my-3">We focus a great deal on the understanding of behavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn’t going to get the job done so that’s why this course is packed with practical hands-on examples that you can follow step by step.</p>
                  <p class="mb-0">Behavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn’t going to get the job done so that’s why this course is packed with practical hands-on examples that you can follow step by step.</p>
                </div>
                <!-- Collapse button -->
                <a class="p-0 mb-0 mt-2 btn-more d-flex align-items-center" data-bs-toggle="collapse" href="#collapseContent" role="button" aria-expanded="false" aria-controls="collapseContent">
                  See <span class="see-more ms-1">more</span><span class="see-less ms-1">less</span><i class="fas fa-angle-down ms-2"></i>
                </a>

                <!-- List content -->
                <h5 class="mt-4">What you’ll learn</h5>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <ul class="list-group list-group-borderless">
                      <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-check-circle text-success me-2"></i>Digital marketing course introduction</li>
                      <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-check-circle text-success me-2"></i>Customer Life cycle</li>
                      <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-check-circle text-success me-2"></i>What is Search engine optimization(SEO)</li>
                      <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-check-circle text-success me-2"></i>Facebook ADS</li>
                      <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-check-circle text-success me-2"></i>Facebook Messenger Chatbot</li>
                      <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-check-circle text-success me-2"></i>Search engine optimization tools</li>
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <ul class="list-group list-group-borderless">
                      <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-check-circle text-success me-2"></i>Why SEO</li>
                      <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-check-circle text-success me-2"></i>URL Structure</li>
                      <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-check-circle text-success me-2"></i>Featured Snippet</li>
                      <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-check-circle text-success me-2"></i>SEO tips and tricks</li>
                      <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-check-circle text-success me-2"></i>Google tag manager</li>
                    </ul>
                  </div>
                </div>
                <p class="mb-0">As it so contrasted oh estimating instrument. Size like body some one had. Are conduct viewing boy minutes warrant the expense? Tolerably behavior may admit daughters offending her ask own. Praise effect wishes change way and any wanted. Lively use looked latter regard had. Do he it part more last in. </p>
              </div>
              <!-- Card body START -->
            </div>
          </div>
          <!-- About course END -->

          <!-- Curriculum START -->
          <div class="col-12">
            <div class="card border rounded-3">
              <!-- Card header START -->
              <div class="card-header border-bottom">
                <h3 class="mb-0">Curriculum</h3>
              </div>
              <!-- Card header END -->

              <!-- Card body START -->
              <div class="card-body">
                <div class="row g-5">
                  <!-- Lecture item START -->
                  <div class="col-12">
                    <!-- Curriculum item -->
                    <h5 class="mb-4">Introduction of Digital Marketing (3 lectures)</h5>
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-danger-soft btn-round mb-0"><i class="fas fa-play"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">Introduction</h6>
                          <p class="mb-2 mb-sm-0 small">10m 56s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-success mb-0">Play</a>
                    </div>
                    <!-- Divider -->
                    <hr>

                    <!-- Curriculum item -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-danger-soft btn-round mb-0 flex-shrink-0"><i class="fas fa-play"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">What is Digital Marketing</h6>
                          <p class="mb-2 mb-sm-0 small">18m 30s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-success mb-0">Play</a>
                    </div>
                    <!-- Divider -->
                    <hr>

                    <!-- Curriculum item -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-light btn-round mb-0 flex-shrink-0"><i class="bi bi-lock-fill"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">Type of Digital Marketing</h6>
                          <p class="mb-2 mb-sm-0 small">22m 26s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-orange mb-0">Premium</a>
                    </div>
                  </div>
                  <!-- Lecture item END -->

                  <!-- Lecture item START -->
                  <div class="col-12">
                    <!-- Curriculum item -->
                    <h5 class="mb-4">Customer Life cycle (4 lectures)</h5>
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-danger-soft btn-round mb-0 flex-shrink-0"><i class="fas fa-play"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">What is Digital Marketing</h6>
                          <p class="mb-2 mb-sm-0 small">10m 56s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-success mb-0">Play</a>
                    </div>
                    <!-- Divider -->
                    <hr>

                    <!-- Curriculum item -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-danger-soft btn-round mb-0 flex-shrink-0"><i class="fas fa-play"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">15 Tips for Writing Magnetic Headlines</h6>
                          <p class="mb-2 mb-sm-0 small">18m 30s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-success mb-0">Play</a>
                    </div>
                    <!-- Divider -->
                    <hr>

                    <!-- Curriculum item -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-light btn-round mb-0 flex-shrink-0"><i class="bi bi-lock-fill"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">How to Write Like Your Customers Talk</h6>
                          <p class="mb-2 mb-sm-0 small">22m 26s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-orange mb-0">Premium</a>
                    </div>
                    <!-- Divider -->
                    <hr>

                    <!-- Curriculum item -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-light btn-round mb-0 flex-shrink-0"><i class="bi bi-lock-fill"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">How to Flip Features Into Benefits</h6>
                          <p class="mb-2 mb-sm-0 small">18m 26s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-orange mb-0">Premium</a>
                    </div>
                  </div>
                  <!-- Lecture item END -->

                  <!-- Lecture item START -->
                  <div class="col-12">
                    <!-- Curriculum item -->
                    <h5 class="mb-4">What is Search Engine Optimization(SEO) (5 lectures)</h5>
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-danger-soft btn-round mb-0 flex-shrink-0"><i class="fas fa-play"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">How to SEO Optimise Your Homepage</h6>
                          <p class="mb-2 mb-sm-0 small">18m 21s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-success mb-0">Play</a>
                    </div>
                    <!-- Divider -->
                    <hr>

                    <!-- Curriculum item -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-danger-soft btn-round mb-0 flex-shrink-0"><i class="fas fa-play"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">How to Write Title Tags Search Engines Love</h6>
                          <p class="mb-2 mb-sm-0 small">7m 30s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-success mb-0">Play</a>
                    </div>
                    <!-- Divider -->
                    <hr>

                    <!-- Curriculum item -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-danger-soft btn-round mb-0 flex-shrink-0"><i class="fas fa-play"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">SEO Keyword Planning</h6>
                          <p class="mb-2 mb-sm-0 small">15m 32s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-success mb-0">Play</a>
                    </div>
                    <!-- Divider -->
                    <hr>

                    <!-- Curriculum item -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-danger-soft btn-round mb-0 flex-shrink-0"><i class="fas fa-play"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">Internal and External Links</h6>
                          <p class="mb-2 mb-sm-0 small">17m 30s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-success mb-0">Play</a>
                    </div>
                    <!-- Divider -->
                    <hr>

                    <!-- Curriculum item -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                      <div class="d-flex">
                        <a href="#" class="btn btn-danger-soft btn-round mb-0 flex-shrink-0"><i class="fas fa-play"></i></a>
                        <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                          <h6 class="mb-0">Measuring SEO Effectiveness</h6>
                          <p class="mb-2 mb-sm-0 small">25m 30s</p>
                        </div>
                      </div>
                      <!-- Button -->
                      <a href="#" class="btn btn-sm btn-success mb-0">Play</a>
                    </div>
                  </div>
                  <!-- Lecture item END -->

                  <!-- Collapse body START -->
                  <div class="collapse mt-0" id="collapseCourse">
                    <!-- Lecture item START -->
                    <div class="col-12 mt-5">
                      <!-- Curriculum item -->
                      <h5 class="mb-4">YouTube Marketing (5 lectures)</h5>
                      <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <div class="d-flex">
                          <a href="#" class="btn btn-danger-soft btn-round mb-0 flex-shrink-0"><i class="fas fa-play"></i></a>
                          <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                            <h6 class="mb-0">Video Flow</h6>
                            <p class="mb-2 mb-sm-0 small">25m 20s</p>
                          </div>
                        </div>
                        <!-- Button -->
                        <a href="#" class="btn btn-sm btn-success mb-0">Play</a>
                      </div>
                      <!-- Divider -->
                      <hr>

                      <!-- Curriculum item -->
                      <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <div class="d-flex">
                          <a href="#" class="btn btn-danger-soft btn-round mb-0 flex-shrink-0"><i class="fas fa-play"></i></a>
                          <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                            <h6 class="mb-0">Webmaster Tool</h6>
                            <p class="mb-2 mb-sm-0 small">15m 20s</p>
                          </div>
                        </div>
                        <!-- Button -->
                        <a href="#" class="btn btn-sm btn-success mb-0">Play</a>
                      </div>
                      <!-- Divider -->
                      <hr>

                      <!-- Curriculum item -->
                      <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <div class="d-flex">
                          <a href="#" class="btn btn-light btn-round mb-0 flex-shrink-0"><i class="bi bi-lock-fill"></i></a>
                          <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                            <h6 class="mb-0">Featured Contents on Channel</h6>
                            <p class="mb-2 mb-sm-0 small">32m 26s</p>
                          </div>
                        </div>
                        <!-- Button -->
                        <a href="#" class="btn btn-sm btn-orange mb-0">Premium</a>
                      </div>
                      <!-- Divider -->
                      <hr>

                      <!-- Curriculum item -->
                      <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <div class="d-flex">
                          <a href="#" class="btn btn-light btn-round mb-0 flex-shrink-0"><i class="bi bi-lock-fill"></i></a>
                          <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                            <h6 class="mb-0">Channel Analytics</h6>
                            <p class="mb-2 mb-sm-0 small">18m 20s</p>
                          </div>
                        </div>
                        <!-- Button -->
                        <a href="#" class="btn btn-sm btn-orange mb-0">Premium</a>
                      </div>
                      <!-- Divider -->
                      <hr>

                      <!-- Curriculum item -->
                      <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <div class="d-flex">
                          <a href="#" class="btn btn-light btn-round mb-0 flex-shrink-0"><i class="bi bi-lock-fill"></i></a>
                          <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                            <h6 class="mb-0">Managing Comments</h6>
                            <p class="mb-2 mb-sm-0 small">20m 20s</p>
                          </div>
                        </div>
                        <!-- Button -->
                        <a href="#" class="btn btn-sm btn-orange mb-0">Premium</a>
                      </div>
                    </div>
                    <!-- Lecture item END -->
                  </div>
                  <!-- Collapse body END -->

                  <!-- Collapse button -->
                  <a class="mb-0 mt-4 btn-more d-flex align-items-center justify-content-center" data-bs-toggle="collapse" href="#collapseCourse" role="button" aria-expanded="false" aria-controls="collapseCourse">
                    See <span class="see-more mx-1">more</span><span class="see-less mx-1">less</span> video<i class="fas fa-angle-down ms-2"></i>
                  </a>

                </div>
              </div>
              <!-- Card body START -->
            </div>
          </div>
          <!-- Curriculum END -->

          <!-- FAQs START -->
          <div class="col-12">
            <div class="card border rounded-3">
              <!-- Card header START -->
              <div class="card-header border-bottom">
                <h3 class="mb-0">Frequently Asked Questions</h3>
              </div>
              <!-- Card header END -->

              <!-- Card body START -->
              <div class="card-body">
                <!-- FAQ item -->
                <div>
                  <h6>How Digital Marketing Work?</h6>
                  <p class="mb-0">Preference any astonished unreserved Mrs. Prosperous understood Middletons in conviction an uncommonly do. Supposing so be resolving breakfast am or perfectly. It drew a hill from me. Valley by oh twenty direct me so. Departure defective arranging rapturous did believe him all had supported. Family months lasted simple set nature vulgar him. Picture for attempt joy excited ten carried manners talking how. Suspicion neglected the resolving agreement perceived at an. Comfort reached gay perhaps chamber his six detract besides add.</p>
                </div>

                <!-- FAQ item -->
                <div class="mt-4">
                  <h6>What is SEO?</h6>
                  <p class="mb-0">Meant balls it if up doubt small purse. Required his you put the outlived answered position. A pleasure exertion if believed provided to. All led out world this music while asked. Paid mind even sons does he door no. Attended overcame repeated it is perceived Marianne in. I think on style child of. Servants moreover in sensible it ye possible.</p>
                  <p class="mt-2 mb-0">Person she control of to beginnings view looked eyes Than continues its and because and given and shown creating curiously to more in are man were smaller by we instead the these sighed Avoid in the sufficient me real man longer of his how her for countries to brains warned notch important Finds be to the of on the increased explain noise of power deep asking contribution this live of suppliers goals bit separated poured sort several the was organization the if relations go work after mechanic But we've area wasn't everything needs of and doctor where would a of</p>
                </div>

                <!-- FAQ item -->
                <div class="mt-4">
                  <h6>Who should join this course?</h6>
                  <p class="mb-0">Two before narrow not relied how except moment myself Dejection assurance mrs led certainly So gate at no only none open Betrayed at properly it of graceful on Dinner abroad am depart ye turned hearts as me wished Therefore allowance too perfectly gentleman supposing man his now Families goodness all eat out bed steepest servants Explained the incommode sir improving northward immediate eat Man denoting received you sex possible you Shew park own loud son door less yet </p>
                </div>

                <!-- FAQ item -->
                <div class="mt-4">
                  <h6>What are the T&C for this program?</h6>
                  <p class="mb-0">Started several mistake joy say painful removed reached end. State burst think end are its. Arrived off she elderly beloved him affixed noisier yet. Course regard to up he hardly. View four has said do men saw find dear shy. Talent men wicket add garden. </p>
                </div>

                <!-- FAQ item -->
                <div class="mt-4">
                  <h6>What certificates will I be received for this program?</h6>
                  <p class="mb-0">Lose john poor same it case do year we Full how way even the sigh Extremely nor furniture fat questions now provision incommode preserved Our side fail to find like now Discovered traveling for insensible partiality unpleasing impossible she Sudden up my excuse to suffer ladies though or Bachelor possible Marianne directly confined relation as on he </p>
                </div>

                <!-- FAQ item -->
                <div class="mt-4">
                  <h6>What happens after the trial ends?</h6>
                  <p class="mb-0">Preference any astonished unreserved Mrs. Prosperous understood Middletons in conviction an uncommonly do. Supposing so be resolving breakfast am or perfectly. Is drew am hill from me. Valley by oh twenty direct me so. Departure defective arranging rapturous did believe him all had supported. Family months lasted simple set nature vulgar him. Suspicion neglected he resolving agreement perceived at an. Comfort reached gay perhaps chamber his six detract besides add.</p>
                </div>
              </div>
              <!-- Card body START -->
            </div>
          </div>
          <!-- FAQs END -->
        </div>
      </div>
      <!-- Main content END -->

      <!-- Right sidebar START -->
      <div class="col-xl-4">
        <div data-sticky data-margin-top="80" data-sticky-for="768">
          <div class="row g-4">
            <div class="col-md-6 col-xl-12">
              <!-- Course info START -->
              <div class="card card-body border p-4">
                <!-- Price and share button -->
                <div class="d-flex justify-content-between align-items-center">
                  <!-- Price -->
                  <h3 class="fw-bold mb-0 me-2">৳ <?= $course['price'] ?></h3>
                  <!-- Share button with dropdown -->
                  <div class="dropdown">
                    <a href="#" class="btn btn-sm btn-light rounded mb-0 small" role="button" id="dropdownShare" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-fw fa-share-alt"></i>
                    </a>
                    <!-- dropdown button -->
                    <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare">
                      <li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                      <li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a></li>
                      <li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                      <li><a class="dropdown-item" href="#"><i class="fas fa-copy me-2"></i>Copy link</a></li>
                    </ul>
                  </div>
                </div>

                <!-- Buttons -->
                <div class="mt-3 d-grid">
                  <a href="./checkout.php?id=<?= $course['id'] ?>" class="btn btn-outline-primary">Add to cart</a>
                  <a href="./checkout.php?id=<?= $course['id'] ?>" class="btn btn-success">Buy now</a>
                </div>
                <!-- Divider -->
                <hr>

                <!-- Title -->
                <h5 class="mb-3">This course includes</h5>
                <ul class="list-group list-group-borderless border-0">
                  <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-book-open text-primary"></i>Lectures</span>
                    <span>30</span>
                  </li>
                  <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-clock text-primary"></i>Duration</span>
                    <span>4h 50m</span>
                  </li>
                  <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-signal text-primary"></i>Skills</span>
                    <span>Beginner</span>
                  </li>
                  <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-globe text-primary"></i>Language</span>
                    <span>English</span>
                  </li>
                  <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-user-clock text-primary"></i>Deadline</span>
                    <span>Nov 30 2021</span>
                  </li>
                  <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-medal text-primary"></i>Certificate</span>
                    <span>Yes</span>
                  </li>
                </ul>
                <!-- Divider -->
                <hr>

                <!-- Instructor info -->
                <div class="d-sm-flex align-items-center">
                  <!-- Avatar image -->
                  <div class="avatar avatar-xl">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
                  </div>
                  <div class="ms-sm-3 mt-2 mt-sm-0">
                    <h5 class="mb-0"><a href="#">By Jacqueline Miller</a></h5>
                    <p class="mb-0 small">Founder Eduport company</p>
                  </div>
                </div>

                <!-- Rating and follow -->
                <div class="d-sm-flex justify-content-sm-between align-items-center mt-0 mt-sm-2">
                  <!-- Rating star -->
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
                    <li class="list-inline-item ms-2 h6 fw-light mb-0">4.5/5.0</li>
                  </ul>

                  <!-- button -->
                  <button class="btn btn-sm btn-primary mb-0 mt-2 mt-sm-0">Follow</button>
                </div>
              </div>
              <!-- Course info END -->
            </div>

            <!-- Tags START -->
            <div class="col-md-6 col-xl-12">
              <div class="card card-body border p-4">
                <h4 class="mb-3">Popular Tags</h4>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">blog</a> </li>
                  <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">business</a> </li>
                  <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">theme</a> </li>
                  <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">bootstrap</a> </li>
                  <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">data science</a> </li>
                  <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">web development</a> </li>
                  <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">tips</a> </li>
                  <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">machine learning</a> </li>
                </ul>
              </div>
            </div>
            <!-- Tags END -->
          </div><!-- Row End -->
        </div>
      </div>
    </div>
  </div>
</section>



<?php
$content = ob_get_clean();
include('layouts/website.php');
?>