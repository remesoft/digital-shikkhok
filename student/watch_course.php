<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/helpers.php');
include('../includes/get_courses.php');

// variables
$page_title = "Student Profile | Student Panel | Digital Shikkhok";
ob_start();
?>


<!-- Main content START -->
<div class="col-xl-9">

    <!-- Course item START -->
    <div class="border">
        <div class="border-bottom" style="padding: 20px; ">
            <!-- Card START -->
            <div>
                <div class="row g-0" style="height: 300px;">
                    <iframe src="https://player.vimeo.com/video/479010700" frameborder="0"></iframe>
                </div>
            </div>
            <!-- Card END -->
        </div>

        <div class="p-4">

            <!-- Title -->
            <h5>Course Curriculum</h5>

            <!-- Accordion START -->
            <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                <!-- Item -->
                <div class="accordion-item mb-3">
                    <h6 class="accordion-header font-base" id="heading-1">
                        <a class="accordion-button fw-bold rounded collapsed d-block pe-4" href="#collapse-1" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                            <span class="mb-0">Introduction of Digital Marketing</span>
                            <span class="small d-block mt-1">(3 Lectures)</span>
                        </a>
                    </h6>
                    <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordionExample2">
                        <div class="accordion-body mt-3">
                            <div class="vstack gap-3">

                                <!-- Progress bar -->
                                <div class="overflow-hidden">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-1 h6">1/2 Completed</p>
                                        <h6 class="mb-1 text-end">80%</h6>
                                    </div>
                                    <div class="progress progress-sm bg-primary bg-opacity-10">
                                        <div class="progress-bar bg-primary aos" role="progressbar" data-aos="slide-right" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>

                                <!-- Course lecture -->
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="position-relative d-flex align-items-center">
                                            <a href="#" class="btn btn-success btn-round btn-sm mb-0 stretched-link position-static">
                                                <i class="fas fa-play me-0"></i>
                                            </a>
                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-200px">Introduction</span>
                                        </div>
                                        <p class="mb-0 text-truncate">2m 10s</p>
                                    </div>

                                    <!-- Add note button -->
                                    <a class="btn btn-xs btn-warning mb-0" data-bs-toggle="collapse" href="#addnote-1" role="button" aria-expanded="false" aria-controls="addnote-1">
                                        <i class="bi fa-fw bi-pencil-square me-2"></i>Note
                                    </a>
                                    <a href="#" class="btn btn-xs btn-dark mb-0">Play again</a>

                                    <!-- Notes START -->
                                    <div class="collapse" id="addnote-1">
                                        <div class="card card-body p-0 mt-2">

                                            <!-- Note item -->
                                            <div class="d-flex justify-content-between bg-light rounded-2 p-2 mb-2">
                                                <!-- Content -->
                                                <div class="d-flex align-items-center">
                                                    <span class="badge bg-dark me-2">5:20</span>
                                                    <h6 class="d-inline-block text-truncate w-100px w-sm-200px mb-0 fw-light">Describe SEO Engine</h6>
                                                </div>
                                                <!-- Button -->
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-sm btn-light btn-round me-2 mb-0"><i class="bi fa-fw bi-play-fill"></i></a>
                                                    <a href="#" class="btn btn-sm btn-light btn-round mb-0"><i class="bi fa-fw bi-trash-fill"></i></a>
                                                </div>
                                            </div>

                                            <!-- Note item -->
                                            <div class="d-flex justify-content-between bg-light rounded-2 p-2 mb-2">
                                                <!-- Content -->
                                                <div class="d-flex align-items-center">
                                                    <span class="badge bg-dark me-2">10:20</span>
                                                    <h6 class="d-inline-block text-truncate w-100px w-sm-200px mb-0 fw-light">Know about all marketing</h6>
                                                </div>
                                                <!-- Button -->
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-sm btn-light btn-round me-2 mb-0"><i class="bi fa-fw bi-play-fill"></i></a>
                                                    <a href="#" class="btn btn-sm btn-light btn-round mb-0"><i class="bi fa-fw bi-trash-fill"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Notes END -->

                                    <hr class="mb-0">
                                </div>

                                <!-- Course lecture -->
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="position-relative d-flex align-items-center">
                                            <a href="#" class="btn btn-success btn-round btn-sm mb-0 stretched-link position-static">
                                                <i class="fas fa-play me-0"></i>
                                            </a>
                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px"> What is Digital Marketing What is Digital Marketing</span>
                                        </div>
                                        <p class="mb-0 text-truncate">15m 10s</p>
                                    </div>

                                    <!-- Add note button -->
                                    <a class="btn btn-xs btn-warning mb-0" data-bs-toggle="collapse" href="#addnote-2" role="button" aria-expanded="false" aria-controls="addnote-2">
                                        <i class="bi fa-fw bi-pencil-square me-2"></i>Note
                                    </a>
                                    <a href="#" class="btn btn-xs btn-dark mb-0">Play again</a>

                                    <!-- Notes START -->
                                    <div class="collapse" id="addnote-2">
                                        <div class="card card-body p-0 mt-2">

                                            <!-- Note item -->
                                            <div class="d-flex justify-content-between bg-light rounded-2 p-2 mb-2">
                                                <!-- Content -->
                                                <div class="d-flex align-items-center">
                                                    <span class="badge bg-dark me-2">5:20</span>
                                                    <h6 class="d-inline-block text-truncate w-100px w-sm-200px mb-0 fw-light">Describe SEO Engine</h6>
                                                </div>
                                                <!-- Button -->
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-sm btn-light btn-round me-2 mb-0"><i class="bi fa-fw bi-play-fill"></i></a>
                                                    <a href="#" class="btn btn-sm btn-light btn-round mb-0"><i class="bi fa-fw bi-trash-fill"></i></a>
                                                </div>
                                            </div>

                                            <!-- Note item -->
                                            <div class="d-flex justify-content-between bg-light rounded-2 p-2 mb-2">
                                                <!-- Content -->
                                                <div class="d-flex align-items-center">
                                                    <span class="badge bg-dark me-2">10:20</span>
                                                    <h6 class="d-inline-block text-truncate w-100px w-sm-200px mb-0 fw-light">Know about all marketing</h6>
                                                </div>
                                                <!-- Button -->
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-sm btn-light btn-round me-2 mb-0"><i class="bi fa-fw bi-play-fill"></i></a>
                                                    <a href="#" class="btn btn-sm btn-light btn-round mb-0"><i class="bi fa-fw bi-trash-fill"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Notes END -->

                                    <hr class="mb-0">
                                </div>

                                <!-- Course lecture -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="position-relative d-flex align-items-center">
                                        <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                            <i class="fas fa-play me-0"></i>
                                        </a>
                                        <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px">Type of Digital Marketing</span>
                                    </div>
                                    <p class="mb-0 text-truncate">18m 10s</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="accordion-item mb-3">
                    <h6 class="accordion-header font-base" id="heading-2">
                        <a class="accordion-button fw-bold collapsed rounded d-block pe-4" href="#collapse-2" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                            <span class="mb-0">Customer Life cycle</span>
                            <span class="small d-block mt-1">(3 Lectures)</span>
                        </a>
                    </h6>
                    <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordionExample2">
                        <!-- Accordion body START -->
                        <div class="accordion-body mt-3">
                            <div class="vstack gap-3">
                                <!-- Progress bar -->
                                <div class="overflow-hidden">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-1 h6">0/3 Completed</p>
                                        <h6 class="mb-1 text-end">0%</h6>
                                    </div>
                                    <div class="progress progress-sm bg-primary bg-opacity-10">
                                        <div class="progress-bar bg-primary aos" role="progressbar" data-aos="slide-right" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                                <!-- Course lecture -->
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="position-relative d-flex align-items-center">
                                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                <i class="fas fa-play me-0"></i>
                                            </a>
                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-sm-400px">Introduction</span>
                                        </div>
                                        <p class="mb-0 text-truncate">2m 10s</p>
                                    </div>
                                    <hr class="mb-0">
                                </div>

                                <!-- Course lecture -->
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="position-relative d-flex align-items-center">
                                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                                <i class="fas fa-play me-0"></i>
                                            </a>
                                            <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px"> What is Digital Marketing What is Digital Marketing</span>
                                        </div>
                                        <p class="mb-0 text-truncate">15m 10s</p>
                                    </div>
                                    <hr class="mb-0">
                                </div>

                                <!-- Course lecture -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="position-relative d-flex align-items-center">
                                        <a href="#" class="btn btn-light btn-round btn-sm mb-0 stretched-link position-static" data-bs-toggle="modal" data-bs-target="#coursePremium">
                                            <i class="bi bi-lock-fill"></i>
                                        </a>
                                        <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-150px w-sm-400px">Type of Digital Marketing</span>
                                    </div>
                                    <p class="mb-0 text-truncate">18m 10s</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion body END -->
                    </div>
                </div>

            </div>
            <!-- Accordion END -->
        </div>
    </div>
    <!-- Course item END -->
</div>
<!-- Main content END -->


<?php
$content = ob_get_clean();
include('../layouts/student.php');
?>