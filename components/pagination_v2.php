<!-- Pagination START -->
<div class="col-12">
  <nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
    <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">

      <!-- First Page Button -->
      <li class="page-item mb-0 <?= ($page <= 1) ? 'disabled' : ''; ?>">
        <a class="page-link" href="?page=1" tabindex="-1">
          <i class="fas fa-angle-double-left"></i>
        </a>
      </li>

      <!-- Previous Page Button -->
      <li class="page-item mb-0 <?= ($page <= 1) ? 'disabled' : ''; ?>">
        <a class="page-link" href="?page=<?= max(1, $page - 1); ?>">
          <i class="fas fa-angle-left"></i>
        </a>
      </li>

      <!-- Ellipsis and First Pages -->
      <?php if ($page > 3) : ?>
        <li class="page-item mb-0"><a class="page-link" href="?page=1">1</a></li>
        <?php if ($page > 4) : ?>
          <li class="page-item mb-0 disabled"><span class="page-link">..</span></li>
        <?php endif; ?>
      <?php endif; ?>

      <!-- Centered Pages -->
      <?php for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) : ?>
        <li class="page-item mb-0 <?= ($i == $page) ? 'active' : ''; ?>">
          <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
        </li>
      <?php endfor; ?>

      <!-- Ellipsis and Last Pages -->
      <?php if ($page < $total_pages - 2) : ?>
        <?php if ($page < $total_pages - 3) : ?>
          <li class="page-item mb-0 disabled"><span class="page-link">..</span></li>
        <?php endif; ?>
        <li class="page-item mb-0"><a class="page-link" href="?page=<?= $total_pages; ?>"><?= $total_pages; ?></a></li>
      <?php endif; ?>

      <!-- Next Page Button -->
      <li class="page-item mb-0 <?= ($page >= $total_pages) ? 'disabled' : ''; ?>">
        <a class="page-link" href="?page=<?= min($total_pages, $page + 1); ?>">
          <i class="fas fa-angle-right"></i>
        </a>
      </li>

      <!-- Last Page Button -->
      <li class="page-item mb-0 <?= ($page >= $total_pages) ? 'disabled' : ''; ?>">
        <a class="page-link" href="?page=<?= $total_pages; ?>">
          <i class="fas fa-angle-double-right"></i>
        </a>
      </li>
    </ul>
  </nav>
</div>
<!-- Pagination END -->