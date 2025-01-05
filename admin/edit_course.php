<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/get_course_by_id.php');

// variables
$page_title = "Create Course | Admin Panel | Digital Shikkhok";
$course = get_detailed_course($conn, $_GET['id']);
ob_start();
?>


<!-- ----------------------------------- -->
<!--        Page Content Start           -->
<!-- ----------------------------------- -->

<div class="page-content-wrapper border">
  <h1 class="h4 mb-3">Update Course</h1>

  <!-- Card START -->
  <div class="card border rounded-3 mb-5">
    <div id="stepper" class="bs-stepper stepper-outline">
      <!-- Card header -->
      <div class="card-header bg-light border-bottom px-lg-5">
        <!-- Step Buttons START -->
        <div class="bs-stepper-header" role="tablist">
          <!-- Step 1 -->
          <div class="step" data-target="#step-1">
            <div class="d-grid text-center align-items-center">
              <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger1" aria-controls="step-1">
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
      </div>

      <!-- Card body START -->
      <div class="card-body px-1 px-sm-4">
        <!-- Step content START -->
        <div class="bs-stepper-content">
          <form action="../includes/process_update_course.php" method="post" enctype="multipart/form-data">
            <input type="text" name="course_id" value="<?= $course['id'] ?>" hidden>

            <!-- Step 1 content START -->
            <div id="step-1" role="tabpanel" class="content fade" aria-labelledby="steppertrigger1">
              <!-- Title -->
              <h4>Course details</h4>

              <hr> <!-- Divider -->

              <!-- Basic information START -->
              <div class="row g-4">
                <!-- Course title -->
                <div class="col-12">
                  <label class="form-label">Course title</label>
                  <input name="title" class="form-control" type="text" placeholder="Enter course title" value="<?= $course['title'] ?>" require>
                </div>

                <!-- Short description -->
                <div class="col-12">
                  <label class="form-label">Short description</label>
                  <textarea name="short_desc" class="form-control" rows="4" placeholder="Enter keywords" require><?= $course['short_desc'] ?></textarea>
                </div>

                <!-- Course time -->
                <div class="col-md-6">
                  <label class="form-label">Course time</label>
                  <input name="duration" class="form-control" type="text" placeholder="Enter course time" value="<?= $course['duration'] ?>" require>
                </div>

                <!-- Course price -->
                <div class="col-md-6">
                  <label class="form-label">Course price</label>
                  <input name="price" type="text" class="form-control" placeholder="Enter course price" value="<?= $course['price'] ?>" require>
                </div>
                <!-- Course price -->
                <div class="col-md-6">
                  <label class="form-label">Total Lectures</label>
                  <input name="total_lectures" type="text" class="form-control" placeholder="Enter total lectures" value="<?= $course['total_lectures'] ?>" require>
                </div>

                <!-- Course price -->
                <div class="col-md-6">
                  <label class="form-label">Course Language</label>
                  <input name="language" type="text" class="form-control" placeholder="Enter course language" value="<?= $course['language'] ?>" require>
                </div>

                <!-- Course description -->
                <div class="col-md-12">
                  <label class="form-label">Add description</label>
                  <textarea name="description" class="form-control" rows="5" placeholder="Enter course description..." require><?= $course['description'] ?></textarea>
                </div>

                <!-- Step 1 button -->
                <div class="d-flex justify-content-end mt-3 col-md-12">
                  <button type="button" class="btn btn-primary next-btn mb-0">Next</button>
                </div>
              </div>
              <!-- Basic information START -->
            </div>

            <!-- Step 2 content START -->
            <div id="step-2" role="tabpanel" class="content fade" aria-labelledby="steppertrigger2">
              <h4>Course Media</h4>
              <hr>
              <div class="row">
                <!-- Upload image START -->
                <div class="col-12">
                  <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                    <!-- Image -->
                    <img src="../assets/images/element/gallery.svg" class="h-50px" alt="">
                    <div>
                      <h6 class="my-2">Upload course thumbnail here, or<a href="#!" class="text-primary"> Browse</a></h6>
                      <label style="cursor:pointer;">
                        <span>
                          <input name="thumbnail" class="form-control stretched-link" type="file" id="image" accept="image/gif, image/jpeg, image/png" require />
                          <input name="old_thumbnail" value="<?= $course['thumbnail'] ?>" hidden>
                        </span>
                      </label>
                      <p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG and PNG. Our suggested dimensions are 600px * 450px. Larger image will be cropped to 4:3 to fit our thumbnails/previews.</p>
                    </div>
                  </div>
                </div>
                <!-- Upload image END -->


                <!-- Upload video START -->
                <div class="col-12 mt-4">
                  <h5>Introduction video URL</h5>
                  <div class="col-12 mt-3">
                    <input class="form-control" name="video" type="text" placeholder="Enter video url" value="<?= $course['video'] ?>">
                  </div>
                </div>


                <!-- Step 2 button -->
                <div class="d-flex justify-content-between mt-3">
                  <button type="button" class="btn btn-secondary prev-btn mb-0">Previous</button>
                  <button type="button" class="btn btn-primary next-btn mb-0">Next</button>
                </div>
              </div>
            </div>

            <!-- Step 3 content START -->
            <div id="step-3" role="tabpanel" class="content fade" aria-labelledby="steppertrigger3">
              <h4>Curriculum</h4>
              <hr>
              <div class="row">
                <!-- Add lecture Modal button -->
                <div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
                  <h5 class="mb-2 mb-sm-0">Upload Lecture</h5>
                  <a href="#" class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal" data-bs-target="#addLecture"><i class="bi bi-plus-circle me-2"></i>Add Lecture</a>
                </div>

                <!-- Edit lecture START -->
                <div class="accordion accordion-icon accordion-bg-light" id="lectureHolder">
                  <?php foreach ($course['lectures'] as $lecture) : ?>
                    <div class="accordion-item mb-3">
                      <!-- Lecture Title Start -->
                      <h6 class="accordion-header font-base">
                        <button class="accordion-button fw-bold rounded d-inline-block collapsed d-block pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#lecture-<?= $lecture['id'] ?>" aria-expanded="false" aria-controls="lecture-<?= $lecture['id'] ?>">
                          <?= $lecture['title'] ?>
                        </button>
                      </h6>

                      <!-- Lecture Topics Start -->
                      <div id="lecture-<?= $lecture['id'] ?>" class="accordion-collapse collapse show" data-bs-parent="#accordionExample2">
                        <div class="accordion-body mt-3">
                          <div id="topic-lecture-<?= $lecture['id'] ?>">
                            <?php foreach ($lecture['topics'] as $topic) : ?>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="position-relative">
                                  <a href="<?= $topic['video'] ?>" target="_blank" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
                                    <i class="fas fa-play"></i>
                                  </a>
                                  <span class="ms-2 mb-0 h6 fw-light">
                                    <?= $topic['title'] ?>
                                  </span>
                                </div>
                                <div>
                                  <input type="hidden" name="lectures[lecture-<?= $lecture['id'] ?>][topics][${topicId}][name]" value="<?= $topic['title'] ?>}">
                                  <input type="hidden" name="lectures[lecture-<?= $lecture['id'] ?>][topics][${topicId}][duration]" value="<?= $topic['duration'] ?>">
                                  <input type="hidden" name="lectures[lecture-<?= $lecture['id'] ?>][topics][${topicId}][url]" value="<?= $topic['video'] ?>">
                                  <input type="hidden" name="lectures[lecture-<?= $lecture['id'] ?>][topics][${topicId}][price]" value="<?= $topic['price'] ?>">
                                  <a href="#" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0"><i class="far fa-fw fa-edit"></i></a>
                                  <button onclick="removeTopic(this)" class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></button>
                                </div>
                              </div>
                              <hr>
                            <?php endforeach; ?>
                          </div>
                          <input type="hidden" name="lectures[lecture-<?= $lecture['id'] ?>][name]" value="<?= $lecture['title'] ?>">
                          <a href="#" onclick="setLectureId('lecture-<?= $lecture['id'] ?>')" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#addTopic"><i class="bi bi-plus-circle me-2"></i>Add topic</a>
                          <button type="button" onclick="removeLecture('lecture-<?= $lecture['id'] ?>')" class="btn btn-sm btn-danger-soft mb-0 mt-1 mt-sm-0">Delete this Lecture</button>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="d-md-flex justify-content-between align-items-start mt-4">
                  <button type="button" class="btn btn-secondary prev-btn mb-2 mb-md-0">Previous</button>
                  <button type="button" class="btn btn-light me-auto ms-md-2 mb-2 mb-md-0">Preview Course</button>
                  <div class="text-md-end">
                    <button class="btn btn-success mb-2 mb-sm-0">Submit a Course</button>
                    <p class="mb-0 small mt-1">Once you click "Submit a Course", your course will be uploaded and marked as pending for review.</p>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- Card body END -->
    </div>
  </div>
  <!-- Card END -->
</div>


<!-- ----------------------------------- -->
<!--        Add Lecture Popup            -->
<!-- ----------------------------------- -->
<div class="modal fade" id="addLecture" tabindex="-1" aria-labelledby="addLectureLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="addLectureLabel">Add Lecture</h5>
        <button type="button" class="btn btn-sm btn-light mb-0 ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
      </div>
      <form id="lectureForm">
        <div class="modal-body">
          <div class="row text-start g-3">
            <div class="col-12">
              <label class="form-label">Lecture name <span class="text-danger">*</span></label>
              <input name="name" type="text" class="form-control" placeholder="Enter lecture name">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-success my-0" data-bs-dismiss="modal">Add Lecture</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- ----------------------------------- -->
<!--        Add Topic Popup              -->
<!-- ----------------------------------- -->
<div class="modal fade" id="addTopic" tabindex="-1" aria-labelledby="addTopicLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="addTopicLabel">Add topic</h5>
        <button type="button" class="btn btn-sm btn-light mb-0 ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
      </div>
      <div class="modal-body">
        <form id="topicForm" class="row text-start g-3">
          <div class="col-md-6">
            <label class="form-label">Topic name</label>
            <input class="form-control" name="name" type="text" placeholder="Enter topic name">
          </div>
          <div class="col-md-6">
            <label class="form-label">Video Duration</label>
            <input class="form-control" name="duration" type="text" placeholder="12m 30s">
          </div>
          <div class="col-md-12">
            <label class="form-label">Video link</label>
            <input class="form-control" name="url" type="text" placeholder="Enter Video link">
          </div>
          <div class="col-6 mt-3">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
              <input type="radio" class="btn-check" name="price" value="free" id="option1" checked="">
              <label class="btn btn-sm btn-light btn-primary-soft-check border-0 m-0" for="option1">Free</label>
              <input type="radio" class="btn-check" name="price" value="premium" id="option2">
              <label class="btn btn-sm btn-light btn-primary-soft-check border-0 m-0" for="option2">Premium</label>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success my-0" form="topicForm" data-bs-dismiss="modal">Save topic</button>
      </div>
    </div>
  </div>
</div>



<!-- ----------------------------------- -->
<!--        Add Question Popup           -->
<!-- ----------------------------------- -->
<div class="modal fade" id="addQuestion" tabindex="-1" aria-labelledby="addQuestionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="addQuestionLabel">Add FAQ</h5>
        <button type="button" class="btn btn-sm btn-light mb-0 ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
      </div>
      <div class="modal-body">
        <form class="row text-start g-3">
          <!-- Question -->
          <div class="col-12">
            <label class="form-label">Question</label>
            <input class="form-control" type="text" placeholder="Write a question">
          </div>
          <!-- Answer -->
          <div class="col-12 mt-3">
            <label class="form-label">Answer</label>
            <textarea class="form-control" rows="4" placeholder="Write a answer" spellcheck="false"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success my-0">Save topic</button>
      </div>
    </div>
  </div>
</div>

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>


<script>
  document.getElementById("lectureForm").addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission behavior
    createLecture(this); // Call `createTopic` and pass the form element
  });

  document.getElementById("topicForm").addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission behavior
    createTopic(this); // Call `createTopic` and pass the form element
  });
</script>

<?php
$content = ob_get_clean();
include('../layouts/admin.php');
?>