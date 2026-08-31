<?php
/**
 * Renders the jump nav + the four anchored sections of a pillar page.
 *
 * Expects $sections: an ordered array of
 *   [
 *     'id'    => 'skills',                 // becomes the #anchor (must match config.php)
 *     'title' => 'Skills',
 *     'lead'  => 'One-sentence summary.',
 *     'body'  => ['Paragraph one.', 'Paragraph two.'],
 *     'panel' => ['heading' => 'What this includes', 'items' => ['...', '...']],
 *   ]
 */
?>
<nav class="jump-nav" aria-label="Sections on this page">
  <div class="container">
    <ul>
      <?php foreach ($sections as $s): ?>
        <li><a href="#<?= e($s['id']) ?>"><?= e($s['title']) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>

<div class="section">
  <div class="container">
    <?php foreach ($sections as $i => $s): ?>
      <section class="pillar" id="<?= e($s['id']) ?>" aria-labelledby="<?= e($s['id']) ?>-title">
        <div class="pillar-grid">
          <div>
            <p class="pillar-index" aria-hidden="true"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
            <h2 id="<?= e($s['id']) ?>-title"><?= e($s['title']) ?></h2>
            <p class="lead"><?= e($s['lead']) ?></p>
          </div>

          <div>
            <?php foreach ($s['body'] as $para): ?>
              <p><?= e($para) ?></p>
            <?php endforeach; ?>

            <?php if (!empty($s['panel'])): ?>
              <div class="panel" style="margin-top:var(--space-md)">
                <h4><?= e($s['panel']['heading']) ?></h4>
                <ul class="feature-list">
                  <?php foreach ($s['panel']['items'] as $item): ?>
                    <li><?= e($item) ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </section>
    <?php endforeach; ?>
  </div>
</div>
