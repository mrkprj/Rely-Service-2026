</main>

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">

      <div class="footer-brand">
        <a class="brand" href="/" aria-label="<?= e(SITE_NAME) ?> home">
          <img class="footer-logo" src="/assets/img/logo/logo-light.png"
               alt="<?= e(SITE_NAME) ?>" width="2792" height="483" loading="lazy">
        </a>
        <p class="footer-blurb">
          <!-- TODO: one-sentence positioning statement -->
          We partner with educational institutions across India to build technology,
          prepare students for industry, and grow campus entrepreneurship.
        </p>
        <?php if (SOCIAL_LINKEDIN || SOCIAL_INSTAGRAM || SOCIAL_TWITTER): ?>
        <ul class="social-list">
          <?php if (SOCIAL_LINKEDIN): ?>
            <li><a href="<?= e(SOCIAL_LINKEDIN) ?>" rel="noopener" target="_blank">LinkedIn</a></li>
          <?php endif; ?>
          <?php if (SOCIAL_INSTAGRAM): ?>
            <li><a href="<?= e(SOCIAL_INSTAGRAM) ?>" rel="noopener" target="_blank">Instagram</a></li>
          <?php endif; ?>
          <?php if (SOCIAL_TWITTER): ?>
            <li><a href="<?= e(SOCIAL_TWITTER) ?>" rel="noopener" target="_blank">X</a></li>
          <?php endif; ?>
        </ul>
        <?php endif; ?>
      </div>

      <?php foreach ($NAV as $item): ?>
        <?php if (!$item['children']) continue; ?>
        <nav class="footer-col" aria-label="<?= e($item['label']) ?>">
          <h2 class="footer-heading"><a href="<?= e($item['url']) ?>"><?= e($item['label']) ?></a></h2>
          <ul>
            <?php foreach ($item['children'] as [$label, $url]): ?>
              <li><a href="<?= e($url) ?>"><?= e($label) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </nav>
      <?php endforeach; ?>

      <div class="footer-col footer-contact">
        <h2 class="footer-heading">Get in touch</h2>
        <address>
          <?= e(COMPANY_ADDRESS_LINE1) ?><br>
          <?= e(COMPANY_ADDRESS_LINE2) ?><br>
          <?= e(COMPANY_CITY) ?> <?= e(COMPANY_PIN) ?>, <?= e(COMPANY_STATE) ?><br><br>
          <a href="tel:<?= e(company_phone_href()) ?>"><?= e(COMPANY_PHONE) ?></a><br>
          <a href="mailto:<?= e(COMPANY_EMAIL) ?>"><?= e(COMPANY_EMAIL) ?></a>
        </address>
        <a class="btn btn-outline btn-sm" href="/contact">Start a conversation</a>
      </div>

    </div>

    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</p>
      <ul class="footer-legal">
        <li><a href="/privacy">Privacy Policy</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </div>
  </div>
</footer>

<script src="/assets/js/main.js?v=3" defer></script>
</body>
</html>
