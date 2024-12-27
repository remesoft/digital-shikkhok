<?php
session_start();
include('includes/db.php');
include('includes/helpers.php');
include('includes/get_course_by_id.php');
$pageTitle = "Course Details";
$course = get_detailed_course($conn, $_GET['id']);
ob_start();
?>

<!--Page content START -->
<section class="pt-3 pt-xl-5">
  <div class="container" data-sticky-container>
    <div class="row g-4">
      <!-- Main content START -->
      <div class="col-xl-8">

        <div class="row g-4">
          <div class="col-12">
            <h2><?= $course['title'] ?></h2>
            <p><?= $course['short_desc'] ?></p>
            <ul class="list-inline mb-0">
              <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i class="fas fa-star me-2"></i>4.5/5.0</li>
              <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate me-2"></i>12k Enrolled</li>
              <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i class="fas fa-signal me-2"></i>All levels</li>
              <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i class="bi bi-patch-exclamation-fill me-2"></i>Last updated <?= date('m/Y', strtotime($course['updated_at'])) ?></li>
              <li class="list-inline-item fw-light h6"><i class="fas fa-globe me-2"></i><?= $course['language'] ?></li>
            </ul>
          </div>
          <!-- Title END -->

          <!-- Image and video -->

          <div class="col-12 position-relative">
            <div style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; overflow: hidden;">
              <iframe
                class="rounded-3"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                src="<?= $course['video'] ?>"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen>
              </iframe>
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
                <?= $course['description'] ?>
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
                  <?php foreach ($course['lectures'] as $lecture): ?>
                    <div class="col-12">
                      <h5 class="mb-4"><?= $lecture['title'] ?> (<?= count($lecture['topics']) ?> lectures)</h5>
                      <?php foreach ($lecture['topics'] as $index => $topic): ?>
                        <div class="d-sm-flex justify-content-sm-between align-items-center">
                          <div class="d-flex">
                            <a href="#" class="btn btn-danger-soft btn-round mb-0"><i class="fas fa-play"></i></a>
                            <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                              <h6 class="mb-0"><?= $topic['title'] ?></h6>
                              <p class="mb-2 mb-sm-0 small">10m 56s</p>
                            </div>
                          </div>
                          <!-- <a href="#" class="btn btn-sm btn-success mb-0">Play</a> -->
                        </div>
                        <?php if ($index !== array_key_last($lecture['topics'])): ?>
                          <hr>
                        <?php endif; ?>
                      <?php endforeach ?>
                    </div>
                  <?php endforeach ?>
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
                  <?php


                  ?>

                  <a href="./checkout.php?id=<?= $course['id'] ?>" class="btn btn-outline-primary">Add to cart</a>
                  <a href="<?= get_checkout_link($course['id']) ?>" class="btn btn-success">Buy now</a>
                </div>
                <!-- Divider -->
                <hr>

                <!-- Title -->
                <h5 class="mb-3">This course includes</h5>
                <ul class="list-group list-group-borderless border-0">
                  <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-book-open text-primary"></i>Lectures</span>
                    <span><?= get_total_lectures($course) ?></span>
                  </li>
                  <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-clock text-primary"></i>Duration</span>
                    <span><?= $course['duration'] ?></span>
                  </li>
                  <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-signal text-primary"></i>Skills</span>
                    <span>Beginner</span>
                  </li>
                  <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-globe text-primary"></i>Language</span>
                    <span><?= $course['language'] ?></span>
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
                  <div class="avatar avatar">
                    <img class="avatar-img rounded-circle" src="./uploads/img/instructors/instructor-02.png" alt="avatar">
                  </div>
                  <div class="ms-sm-3 mt-2 mt-sm-0">
                    <h5 class="mb-0"><a href="#">By Md. Sharif Ahmed </a></h5>
                    <p class="mb-0 small">Founder & Instructor</p>
                  </div>
                </div>
              </div>
              <!-- Course info END -->
            </div>

            <!-- Requirements START -->
            <div class="col-md-6 col-xl-12">
              <div class="card card-body border p-4">
                <h4 class="mb-3">Requirements</h4>
                <ul class="list-group list-group-borderless pt-3">
                  <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Need a Computer/Laptop/Mobile</li>
                  <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Good Internet Connection</li>
                  <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Concept in RC Building Design</li>
                  <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Concept in Structural Analysis</li>
                </ul>
              </div>
            </div>

            <!-- Audience START -->
            <div class="col-md-6 col-xl-12">
              <div class="card card-body border p-4">
                <h4 class="mb-3">Audience</h4>
                <ul class="list-group list-group-borderless pt-3">
                  <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-info-circle text-primary me-2"></i>B.Sc. In Civil Engineering Student</li>
                  <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Diploma In Engineering (Civil) Student</li>
                  <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Civil Engineering Job Holder</li>
                  <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Who want to learn Structural Design</li>
                  <li class="list-group-item h6 fw-light d-flex mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Who want to learn Complete Etabs</li>
                </ul>
              </div>
            </div>

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