<?php
// include essential files
include('../includes/db.php');
include('../includes/session.php');
include('../includes/helpers.php');
include('../includes/get_courses.php');
include('../includes/get_course_topics.php');
include('../includes/get_course_lectures.php');

// get course lectures
$course_id = $_GET['course_id'];
$course_lectures = get_course_lectures($conn, $course_id);


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
                    <iframe id="videoPlayer" src="https://www.youtube.com/embed/" frameborder="0" width="100%" height="100%" allow="autoplay; encrypted-media" 
                        allowfullscreen></iframe>
                </div>

            </div>
            <!-- Card END -->
        </div>

        <div class="p-4">

            <!-- Title -->
            <h5>Course Curriculum</h5>

            <!-- Accordion START -->
            <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">

                <?php if (!empty($course_lectures)) {
                    foreach ($course_lectures as $index => $lecture) {
                        $accordionId = "accordion-" . ($index + 1);
                        $collapseId = "collapse-" . ($index + 1);
                ?>
                        <!-- Item -->
                        <div class="accordion-item mb-3">
                            <h6 class="accordion-header font-base" id="heading-<?php echo $accordionId; ?>">
                                <a class="accordion-button fw-bold rounded collapsed d-block pe-4" href="#<?php echo $collapseId; ?>" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapseId; ?>" aria-expanded="false" aria-controls="<?php echo $collapseId; ?>">
                                    <span class="mb-0"><?php echo htmlspecialchars($lecture['title']); ?></span>
                                    <!-- <span class="small d-block mt-1"> </span> -->
                                </a>
                            </h6>
                            <div id="<?php echo $collapseId; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $accordionId; ?>" data-bs-parent="#accordionExample2">
                                <div class="accordion-body mt-3">
                                    <div class="vstack gap-3">
                                        <?php
                                        // get course topics
                                        $topics = get_course_topics($conn, $lecture['id']);
                                        if (!empty($topics)) {
                                            foreach ($topics as $lesson) { ?>
                                                <!-- Course lecture -->
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="position-relative d-flex align-items-center">
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-success btn-round btn-sm mb-0 stretched-link position-static play-video"
                                                            data-video-url="https://www.youtube.com/embed/<?php echo htmlspecialchars($lesson['video']); ?>">
                                                            <i class="fas fa-play me-0"></i>
                                                        </a>

                                                        <span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light"><?php echo htmlspecialchars($lesson['title']); ?></span>
                                                    </div>
                                                    <p class="mb-0 text-truncate"><?php echo htmlspecialchars($lesson['duration']); ?></p>
                                                </div>
                                                <hr class="mb-0">
                                            <?php }
                                        } else { ?>
                                            <p>No topics available for this lecture.</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else { ?>
                    <p>No lectures available for this course.</p>
                <?php } ?>

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