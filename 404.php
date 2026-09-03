<?php
http_response_code(404);
$page_title       = 'Page not found';
$page_description = 'The page you were looking for could not be found.';
$active           = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <span class="eyebrow">Error 404</span>
    <h1>We couldn't find that page</h1>
    <p class="lead">
      It may have moved, or the link may be out of date. Here's where most people are heading.
    </p>
  </div>
</section>

<div class="section">
  <div class="container">
    <div class="grid grid--center">
      <?php foreach ($NAV as $item): ?>
        <a class="card" href="<?= e($item['url']) ?>" style="text-decoration:none">
          <h3><?= e($item['label']) ?></h3>
          <span class="link-arrow">Go to page</span>
        </a>
      <?php endforeach; ?>
      <a class="card" href="/contact" style="text-decoration:none">
        <h3>Contact</h3>
        <span class="link-arrow">Get in touch</span>
      </a>
    </div>
  </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
