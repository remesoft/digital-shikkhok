<?php
session_start();
include('includes/db.php');
include('includes/helpers.php');
include('includes/get_courses.php');
include('includes/get_course_by_id.php');
include('includes/fetch.php');

// Pagination variables
$limit = 6; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Course price
$conditions = match ($_GET['type'] ?? '') {
  'free' => "price = 0",
  'paid' => "price > 0",
  default => '1'
};

// Phone condition
$result = fetch_records($conn, 'courses', [
  'conditions' => $conditions,
  'limit' => $limit,
  'offset' => $offset
]);

// impotent data
$courses = $result['data'];
$total_records = $result['total'];
$total_pages = ceil($total_records / $limit);
$start_record = ($page - 1) * $limit + 1;
$end_record = min($start_record + $limit - 1, $total_records);
$page_title = "Our Course | Digital Shikkhok";
ob_start();
?>

<!--Page Banner START -->
<?php if (!empty($courses)) { ?>
  <section class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="bg-light p-4 text-center rounded-3">
            <h1 class="m-0">কোর্সগুলো এক্সপ্লোর করুন</h1>
            <!-- Breadcrumb -->
            <div class="d-flex justify-content-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-dots mb-0">
                  <li class="breadcrumb-item"><a href="index.php">হোম</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <?php
                    $type = $_GET['type'] ?? null;
                    $type_labels = [
                      'free' => 'ফ্রি কোর্স',
                      'paid' => 'পেইড কোর্স',
                    ];
                    echo $type_labels[$type] ?? 'আমাদের কোর্সসমূহ';
                    ?>
                  </li>
                </ol>
              </nav>
            </div>
          </div
            </div>
        </div>
  </section>
<?php } ?>


<!-- Page content START -->
<section class="pt-0">
  <div class="container">
    <div class="row mt-3">
      <!-- Main content START -->
      <div class="col-12">
        <div class="row g-4">
          <?php
          if (!empty($courses)) {
            foreach ($courses as $course):
              $instructor = fetch_record($conn, 'users', $course['instructor_id']);
              $instructor_name = $instructor['first_name'] . " " . $instructor['last_name'];
              $instructor_avatar = $instructor['avatar'];
              include './components/course_card_v2.php';
            endforeach;

            // pagination
            include './components/pagination_v2.php';
          } else { ?>
            <div class="col-12 text-center">
              <h1 class="display-5 text-danger mb-0">এখনও</h1>
              <h2>কোর্স আপলোড হয়নি।</h2>
              <p class="mb-4">কোর্স আপলোড হলেই পেয়ে যাবেন।</p>
              <a href="index.php" class="btn btn-primary mb-0">আমাকে হোমপেজে নিয়ে চলো</a>
            <?php } ?>
            </div>
        </div>
      </div>
      <!-- Main content END -->
    </div><!-- Row END -->
  </div>
</section>

<!-- Newsletter START -->
<section class="pt-0">
  <div class="container position-relative overflow-hidden">
    <!-- SVG decoration -->
    <figure class="position-absolute top-50 start-50 translate-middle ms-3">
      <svg>
        <path class="fill-white opacity-2" d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z" />
        <path class="fill-white opacity-2" d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z" />
        <path class="fill-white opacity-2" d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z" />
        <path class="fill-white opacity-2" d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z" />
      </svg>
    </figure>
    <!-- Svg decoration -->
    <figure class="position-absolute bottom-0 end-0 mb-5 d-none d-sm-block">
      <svg class="rotate-130" width="258.7px" height="86.9px" viewBox="0 0 258.7 86.9">
        <path stroke="white" fill="none" stroke-width="2" d="M0,7.2c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5 c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5s16-25.5,31.9-25.5" />
        <path stroke="white" fill="none" stroke-width="2" d="M0,57c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5 c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5s16-25.5,31.9-25.5" />
      </svg>
    </figure>

    <div class="bg-grad-blue p-3 p-sm-5 rounded-3">
      <div class="row justify-content-center position-relative">
        <!-- SVG decoration -->
        <figure class="position-absolute top-50 start-0 translate-middle-y">
          <svg width="141px" height="141px">
            <path class="fill-white opacity-1" d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z" />
          </svg>
        </figure>
        <!-- Newsletter -->
        <div class="col-12 position-relative my-2 my-sm-3">
          <div class="row align-items-center">
            <!-- Title -->
            <div class="col-lg-6">
              <h3 class="text-white mb-3 mb-lg-0">আপনি কি আমাদের নতুন কোর্সের আপডেট পেতে চান?</h3>
            </div>
            <!-- Input item -->
            <div class="col-lg-6 text-lg-end">
              <form class="bg-body rounded p-2">
                <div class="input-group">
                  <input class="form-control border-0 me-1" type="email" placeholder="Type your email here">
                  <button type="button" class="btn btn-dark mb-0 rounded">সাবস্ক্রাইব করুন</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div> <!-- Row END -->
    </div>
  </div>
</section>



<?php
$content = ob_get_clean();
include('layouts/website.php');
?>