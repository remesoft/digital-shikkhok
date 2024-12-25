                  <!-- Item START -->
                  <div class="accordion-item mb-3">
                    <h6 class="accordion-header font-base" id="heading-1">
                      <button class="accordion-button fw-bold rounded d-inline-block collapsed d-block pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                        Introduction of Digital Marketing
                      </button>
                    </h6>

                    <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordionExample2">
                      <!-- Topic START -->
                      <div class="accordion-body mt-3">
                        <!-- Video item START -->
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="position-relative">
                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"><i class="fas fa-play"></i></a>
                            <span class="ms-2 mb-0 h6 fw-light">Introduction</span>
                          </div>
                          <!-- Edit and cancel button -->
                          <div>
                            <a href="#" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0"><i class="far fa-fw fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></button>
                          </div>
                        </div>
                        <!-- Divider -->
                        <hr>
                        <!-- Video item END -->

                        <!-- Video item START -->
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="position-relative">
                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"><i class="fas fa-play"></i></a>
                            <span class="ms-2 mb-0 h6 fw-light">What is Digital Marketing</span>
                          </div>
                          <!-- Edit and cancel button -->
                          <div>
                            <a href="#" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0"><i class="far fa-fw fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></button>
                          </div>
                        </div>
                        <!-- Divider -->
                        <hr>
                        <!-- Video item END -->

                        <!-- Add topic -->
                        <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#addTopic"><i class="bi bi-plus-circle me-2"></i>Add topic</a>
                        <a href="#" class="btn btn-sm btn-danger-soft mb-0 mt-1 mt-sm-0">Delete this Lecture</a>
                      </div>
                      <!-- Topic END -->
                    </div>
                  </div>
                  <!-- Item END -->

                  <!-- Item START -->
                  <div class="accordion-item mb-3">
                    <h6 class="accordion-header font-base" id="heading-2">
                      <button class="accordion-button fw-bold rounded d-inline-block collapsed d-block pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                        Customer Life cycle
                      </button>
                    </h6>

                    <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordionExample2">
                      <div class="accordion-body mt-3">
                        <!-- Add topic -->
                        <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#addTopic">
                          <i class="bi bi-plus-circle me-2"></i>Add topic
                        </a>
                      </div>
                    </div>
                  </div>
                  <!-- Item END -->

                  <!-- Item START -->
                  <div class="accordion-item mb-3">
                    <h6 class="accordion-header font-base" id="heading-3">
                      <button class="accordion-button fw-bold collapsed rounded d-block pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                        How much should I offer the sellers?
                      </button>
                    </h6>
                    <!-- Body -->
                    <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3" data-bs-parent="#accordionExample2">
                      <div class="accordion-body mt-3">
                        <!-- Add topic -->
                        <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#addTopic">
                          <i class="bi bi-plus-circle me-2"></i>Add topic
                        </a>
                      </div>
                    </div>
                  </div>
                  <!-- Item END -->















                  <div class="card-header bg-light border-bottom px-lg-5">
                    <div class="bs-stepper-header" role="tablist">

                      <!-- Step 1 -->
                      <div class="step active" data-target="#step-1">
                        <div class="d-grid text-center align-items-center">
                          <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger1" aria-controls="step-1" aria-selected="true">
                            <span class="bs-stepper-circle">1</span>
                          </button>
                          <h6 class="bs-stepper-label d-none d-md-block">Course details</h6>
                        </div>
                      </div>
                      <div class="line"></div>

                      <!-- Step 2 -->
                      <div class="step" data-target="#step-2">
                        <div class="d-grid text-center align-items-center">
                          <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger2" aria-controls="step-2">
                            <span class="bs-stepper-circle">2</span>
                          </button>
                          <h6 class="bs-stepper-label d-none d-md-block">Course media</h6>
                        </div>
                      </div>
                      <div class="line"></div>

                      <!-- Step 3 -->
                      <div class="step" data-target="#step-3">
                        <div class="d-grid text-center align-items-center">
                          <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger3" aria-controls="step-3">
                            <span class="bs-stepper-circle">3</span>
                          </button>
                          <h6 class="bs-stepper-label d-none d-md-block">Curriculum</h6>
                        </div>
                      </div>
                    </div>
                    <!-- Step Buttons END -->
                  </div>

                  <!-- Card body START -->
                  <div class="card-body px-1 px-sm-4">
                    <!-- Step content START -->
                    <div class="bs-stepper-content">
                      <form onsubmit="setDescription()" action="../includes/process_create_course.php" method="post" enctype="multipart/form-data">

                        <!-- ------------------------------------->
                        <!--            Step One Start          -->
                        <!-- ------------------------------------->
                        <div id="step-1" role="tabpanel" class="content fade show active" aria-labelledby="steppertrigger1">
                          <h4>Course details</h4>
                          <hr> <!-- Divider -->
                          <div class="row g-4">
                            <!-- Course title -->
                            <div class="col-12">
                              <label class="form-label">Course title</label>
                              <input name="title" class="form-control" type="text" placeholder="Enter course title" value="The Complete Digital Marketing Course - 12 Courses in 1">
                            </div>

                            <!-- Short description -->
                            <div class="col-12">
                              <label class="form-label">Short description</label>
                              <textarea name="short_desc" class="form-control" rows="2" placeholder="Enter keywords">Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.
										</textarea>
                            </div>


                            <!-- Course time -->
                            <div class="col-md-6">
                              <label class="form-label">Course time</label>
                              <input name="duration" class="form-control" type="text" placeholder="Enter course time" value="12h 30m">
                            </div>

                            <!-- Course price -->
                            <div class="col-md-6">
                              <label class="form-label">Course price</label>
                              <input name="price" type="text" class="form-control" placeholder="Enter course price" value="$350">
                            </div>


                            <!-- Course price -->
                            <div class="col-md-6" hidden>
                              <label class="form-label">Course Description</label>
                              <input name="description" id="descriptionInput" type="text">
                            </div>

                            <div class="col-12">
                              <label class="form-label">Add description</label>
                              <!-- Editor toolbar -->
                              <div class="bg-light border border-bottom-0 rounded-top py-3" id="quilltoolbar">
                                <span class="ql-formats">
                                  <select class="ql-size"></select>
                                </span>
                                <span class="ql-formats">
                                  <button class="ql-bold"></button>
                                  <button class="ql-italic"></button>
                                  <button class="ql-underline"></button>
                                  <button class="ql-strike"></button>
                                </span>
                                <span class="ql-formats">
                                  <select class="ql-color"></select>
                                  <select class="ql-background"></select>
                                </span>
                                <span class="ql-formats">
                                  <button class="ql-code-block"></button>
                                </span>
                                <span class="ql-formats">
                                  <button class="ql-list" value="ordered"></button>
                                  <button class="ql-list" value="bullet"></button>
                                  <button class="ql-indent" value="-1"></button>
                                  <button class="ql-indent" value="+1"></button>
                                </span>
                                <span class="ql-formats">
                                  <button class="ql-link"></button>
                                  <button class="ql-image"></button>
                                </span>
                                <span class="ql-formats">
                                  <button class="ql-clean"></button>
                                </span>
                              </div>

                              <!-- Main toolbar -->
                              <div class="bg-body border rounded-bottom h-400px overflow-hidden" id="quilleditor">
                                <br>
                                <h1>Quill Rich Text Editor</h1>
                                <br>
                                <p>Quill is a free, open-source WYSIWYG editor built for the modern web. With its modular architecture and expressive API, it is completely customizable to fit any need.</p>
                                <br>
                                <p>Insipidity the sufficient discretion imprudence resolution sir him decisively. Proceed how any engaged visitor. Explained propriety off out perpetual his you. Feel sold off felt nay rose met you. We so entreaties cultivated astonished is. Was sister for a few longer Mrs sudden talent become. Done may bore quit evil old mile. If likely am of beauty tastes. </p>
                              </div>

                              <!-- Step 1 button -->
                              <div class="d-flex justify-content-end mt-3">
                                <button type="button" class="btn btn-primary next-btn mb-0">Next</button>
                              </div>
                            </div>
                            <!-- Basic information START -->
                          </div>
                        </div>

                        <!-- ------------------------------------->
                        <!--            Step Two Start          -->
                        <!-- ------------------------------------->
                        <div id="step-2" role="tabpanel" class="content fade" aria-labelledby="steppertrigger2">
                          <h4>Upload Thumbnail</h4>
                          <hr> <!-- Divider -->
                          <div class="row">
                            <!-- Upload image START -->
                            <div class="col-12">
                              <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                                <!-- Image -->
                                <img src="../assets/images/element/gallery.svg" class="h-50px" alt="">
                                <div>
                                  <h6 class="my-2">Upload course image here, or<a href="#!" class="text-primary"> Browse</a></h6>
                                  <label style="cursor:pointer;">
                                    <span>
                                      <input class="form-control stretched-link" type="file" name="thumbnail" id="image" accept="image/gif, image/jpeg, image/png" />
                                    </span>
                                  </label>
                                  <p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG and PNG. Our suggested dimensions are 600px * 450px. Larger image will be cropped to 4:3 to fit our thumbnails/previews.</p>
                                </div>
                              </div>
                            </div>
                            <!-- Upload image END -->

                            <!-- Step 2 button -->
                            <div class="d-flex justify-content-between mt-4">
                              <button type="button" class="btn btn-secondary prev-btn mb-0">Previous</button>
                              <button type="button" class="btn btn-primary next-btn mb-0">Next</button>
                            </div>
                          </div>
                        </div>

                        <!-- ------------------------------------->
                        <!--            Step Three Start        -->
                        <!-- ------------------------------------->
                        <div id="step-3" role="tabpanel" class="content fade" aria-labelledby="steppertrigger3">
                          <h4>Curriculum</h4>
                          <hr>
                          <div class="row">
                            <div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
                              <h5 class="mb-2 mb-sm-0">Upload Lecture</h5>
                              <a href="#" class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal" data-bs-target="#addLecture"><i class="bi bi-plus-circle me-2"></i>Add Lecture</a>
                            </div>

                            <!-- Topic goes here -->
                            <div class="accordion accordion-icon accordion-bg-light" id="lecturesContainer"></div>

                            <!-- Next, previous and submit button -->
                            <div class="d-md-flex justify-content-between align-items-start mt-4">
                              <button class="btn btn-secondary prev-btn mb-2 mb-md-0">Previous</button>
                              <button class="btn btn-light me-auto ms-md-2 mb-2 mb-md-0">Preview Course</button>
                              <div class="text-md-end">
                                <button class="btn btn-success mb-2 mb-sm-0">Submit a Course</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>











                  <div class="page-content-wrapper border">

                    <h1 class="h3 mb-3">Create new course</h1>
                    <div class="card border rounded-3 mb-5">
                      <div id="stepper" class="bs-stepper stepper-outline">
                        <div class="card-header bg-light border-bottom px-lg-5">
                          <div class="bs-stepper-header" role="tablist">

                            <!-- Step 1 -->
                            <div class="step active" data-target="#step-1">
                              <div class="d-grid text-center align-items-center">
                                <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger1" aria-controls="step-1" aria-selected="true">
                                  <span class="bs-stepper-circle">1</span>
                                </button>
                                <h6 class="bs-stepper-label d-none d-md-block">Course details</h6>
                              </div>
                            </div>
                            <div class="line"></div>

                            <!-- Step 2 -->
                            <div class="step" data-target="#step-2">
                              <div class="d-grid text-center align-items-center">
                                <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger2" aria-controls="step-2">
                                  <span class="bs-stepper-circle">2</span>
                                </button>
                                <h6 class="bs-stepper-label d-none d-md-block">Course media</h6>
                              </div>
                            </div>
                            <div class="line"></div>

                            <!-- Step 3 -->
                            <div class="step" data-target="#step-3">
                              <div class="d-grid text-center align-items-center">
                                <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger3" aria-controls="step-3">
                                  <span class="bs-stepper-circle">3</span>
                                </button>
                                <h6 class="bs-stepper-label d-none d-md-block">Curriculum</h6>
                              </div>
                            </div>
                          </div>
                          <!-- Step Buttons END -->
                        </div>

                        <!-- Card body START -->
                        <div class="card-body px-1 px-sm-4">
                          <!-- Step content START -->
                          <div class="bs-stepper-content">
                            <form onsubmit="setDescription()" action="../includes/process_create_course.php" method="post" enctype="multipart/form-data">

                              <!-- ------------------------------------->
                              <!--            Step One Start          -->
                              <!-- ------------------------------------->
                              <div id="step-1" role="tabpanel" class="content fade show active dstepper-block" aria-labelledby="steppertrigger1">
                                <h4>Course details</h4>
                                <hr> <!-- Divider -->
                                <div class="row g-4">
                                  <!-- Course title -->
                                  <div class="col-12">
                                    <label class="form-label">Course title</label>
                                    <input name="title" class="form-control" type="text" placeholder="Enter course title" value="The Complete Digital Marketing Course - 12 Courses in 1">
                                  </div>

                                  <!-- Short description -->
                                  <div class="col-12">
                                    <label class="form-label">Short description</label>
                                    <textarea name="short_desc" class="form-control" rows="2" placeholder="Enter keywords">Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.
										</textarea>
                                  </div>


                                  <!-- Course time -->
                                  <div class="col-md-6">
                                    <label class="form-label">Course time</label>
                                    <input name="duration" class="form-control" type="text" placeholder="Enter course time" value="12h 30m">
                                  </div>

                                  <!-- Course price -->
                                  <div class="col-md-6">
                                    <label class="form-label">Course price</label>
                                    <input name="price" type="text" class="form-control" placeholder="Enter course price" value="$350">
                                  </div>


                                  <!-- Course price -->
                                  <div class="col-md-6" hidden>
                                    <label class="form-label">Course Description</label>
                                    <input name="description" id="descriptionInput" type="text">
                                  </div>

                                  <div class="col-12">
                                    <label class="form-label">Add description</label>
                                    <!-- Editor toolbar -->
                                    <div class="bg-light border border-bottom-0 rounded-top py-3" id="quilltoolbar">
                                      <span class="ql-formats">
                                        <select class="ql-size"></select>
                                      </span>
                                      <span class="ql-formats">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-strike"></button>
                                      </span>
                                      <span class="ql-formats">
                                        <select class="ql-color"></select>
                                        <select class="ql-background"></select>
                                      </span>
                                      <span class="ql-formats">
                                        <button class="ql-code-block"></button>
                                      </span>
                                      <span class="ql-formats">
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                        <button class="ql-indent" value="-1"></button>
                                        <button class="ql-indent" value="+1"></button>
                                      </span>
                                      <span class="ql-formats">
                                        <button class="ql-link"></button>
                                        <button class="ql-image"></button>
                                      </span>
                                      <span class="ql-formats">
                                        <button class="ql-clean"></button>
                                      </span>
                                    </div>

                                    <!-- Main toolbar -->
                                    <div class="bg-body border rounded-bottom h-400px overflow-hidden" id="quilleditor">
                                      <br>
                                      <h1>Quill Rich Text Editor</h1>
                                      <br>
                                      <p>Quill is a free, open-source WYSIWYG editor built for the modern web. With its modular architecture and expressive API, it is completely customizable to fit any need.</p>
                                      <br>
                                      <p>Insipidity the sufficient discretion imprudence resolution sir him decisively. Proceed how any engaged visitor. Explained propriety off out perpetual his you. Feel sold off felt nay rose met you. We so entreaties cultivated astonished is. Was sister for a few longer Mrs sudden talent become. Done may bore quit evil old mile. If likely am of beauty tastes. </p>
                                    </div>

                                    <!-- Step 1 button -->
                                    <div class="d-flex justify-content-end mt-3">
                                      <button type="button" class="btn btn-primary next-btn mb-0">Next</button>
                                    </div>
                                  </div>
                                  <!-- Basic information START -->
                                </div>
                              </div>

                              <!-- ------------------------------------->
                              <!--            Step Two Start          -->
                              <!-- ------------------------------------->
                              <div id="step-2" role="tabpanel" class="content fade" aria-labelledby="steppertrigger2">
                                <h4>Upload Thumbnail</h4>
                                <hr> <!-- Divider -->
                                <div class="row">
                                  <!-- Upload image START -->
                                  <div class="col-12">
                                    <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                                      <!-- Image -->
                                      <img src="../assets/images/element/gallery.svg" class="h-50px" alt="">
                                      <div>
                                        <h6 class="my-2">Upload course image here, or<a href="#!" class="text-primary"> Browse</a></h6>
                                        <label style="cursor:pointer;">
                                          <span>
                                            <input class="form-control stretched-link" type="file" name="thumbnail" id="image" accept="image/gif, image/jpeg, image/png" />
                                          </span>
                                        </label>
                                        <p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG and PNG. Our suggested dimensions are 600px * 450px. Larger image will be cropped to 4:3 to fit our thumbnails/previews.</p>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Upload image END -->

                                  <!-- Step 2 button -->
                                  <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary prev-btn mb-0">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn mb-0">Next</button>
                                  </div>
                                </div>
                              </div>

                              <!-- ------------------------------------->
                              <!--            Step Three Start        -->
                              <!-- ------------------------------------->
                              <div id="step-3" role="tabpanel" class="content fade" aria-labelledby="steppertrigger3">
                                <h4>Curriculum</h4>
                                <hr>
                                <div class="row">
                                  <div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
                                    <h5 class="mb-2 mb-sm-0">Upload Lecture</h5>
                                    <a href="#" class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal" data-bs-target="#addLecture"><i class="bi bi-plus-circle me-2"></i>Add Lecture</a>
                                  </div>

                                  <!-- Topic goes here -->
                                  <div class="accordion accordion-icon accordion-bg-light" id="lecturesContainer"></div>

                                  <!-- Next, previous and submit button -->
                                  <div class="d-md-flex justify-content-between align-items-start mt-4">
                                    <button class="btn btn-secondary prev-btn mb-2 mb-md-0">Previous</button>
                                    <button class="btn btn-light me-auto ms-md-2 mb-2 mb-md-0">Preview Course</button>
                                    <div class="text-md-end">
                                      <button class="btn btn-success mb-2 mb-sm-0">Submit a Course</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>