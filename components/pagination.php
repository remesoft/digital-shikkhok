  <!-- Card footer START -->
  <div class="card-footer bg-transparent pt-0">
    <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
      <p class="mb-0 text-center text-sm-start">
        Showing <?= $start_record ?> to
        <?= $end_record ?> of
        <?= $total_records ?>
        entries
      </p>
      <!-- Pagination -->
      <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
        <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
          <!-- Previous Button -->
          <li class="page-item mb-0 <?= ($page <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?= max(1, $page - 1); ?>&phone=<?= isset($_GET['phone']) ? $_GET['phone'] : ''; ?>" tabindex="-1">
              <i class="fas fa-angle-left"></i>
            </a>
          </li>

          <!-- First Page -->
          <?php if ($page > 3) : ?>
            <li class="page-item mb-0"><a class="page-link" href="?page=1&phone=<?= isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">1</a></li>
            <?php if ($page > 4) : ?>
              <li class="page-item mb-0 disabled"><span class="page-link">...</span></li>
            <?php endif; ?>
          <?php endif; ?>

          <!-- Centered Pages -->
          <?php for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) : ?>
            <li class="page-item mb-0 <?= ($i == $page) ? 'active' : ''; ?>">
              <a class="page-link" href="?page=<?= $i; ?>&phone=<?= isset($_GET['phone']) ? $_GET['phone'] : ''; ?>"><?= $i; ?></a>
            </li>
          <?php endfor; ?>

          <!-- Last Page -->
          <?php if ($page < $total_pages - 2) : ?>
            <?php if ($page < $total_pages - 3) : ?>
              <li class="page-item mb-0 disabled"><span class="page-link">...</span></li>
            <?php endif; ?>
            <li class="page-item mb-0"><a class="page-link" href="?page=<?= $total_pages; ?>&phone=<?= isset($_GET['phone']) ? $_GET['phone'] : ''; ?>"><?= $total_pages; ?></a></li>
          <?php endif; ?>

          <!-- Next Button -->
          <li class="page-item mb-0 <?= ($page >= $total_pages) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?= min($total_pages, $page + 1); ?>&phone=<?= isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">
              <i class="fas fa-angle-right"></i>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>