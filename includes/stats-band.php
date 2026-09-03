<?php
/**
 * Stats band.
 *
 * Expects $stats: an array of rows, each
 *   [
 *     'value'   => '250',   // digits, or a placeholder such as 'XX' / 'XX,XXX'
 *     'prefix'  => '₹',     // optional
 *     'suffix'  => '+',     // optional, e.g. '+', '%', ' LPA'
 *     'caption' => 'Trainers on our panel',
 *   ]
 * Optional $stats_light = true renders the light variant for white sections.
 *
 * PLACEHOLDERS
 * Figures we do not yet have are written literally as 'XX', 'XX,XXX' or similar.
 * They render in exactly the same style as real figures, so the band looks
 * uniform, but no invented number ever reaches a visitor: an unfilled slot
 * reads as obviously unfilled. Replace the X's with the real figure and it
 * starts animating automatically, with no other change needed.
 *
 * Counting animation applies only to rows whose value is purely numeric, so
 * placeholders are simply skipped. The final value is present in the HTML
 * either way, which keeps the band correct with JavaScript disabled and under
 * prefers-reduced-motion.
 */

if (empty($stats)) {
    return;
}
$stats_light  = $stats_light ?? false;
$placeholders = [];
?>
<div class="stats-band<?= $stats_light ? ' stats-band--light' : '' ?>">
  <?php foreach ($stats as $stat):
      $value       = (string) $stat['value'];
      $is_number   = (bool) preg_match('/^[0-9][0-9,]*$/', $value);
      $is_pending  = stripos($value, 'X') !== false;
      if ($is_pending) {
          $placeholders[] = $stat['caption'];
      }
  ?>
    <div class="stat-cell">
      <p class="stat-value">
        <?php if (!empty($stat['prefix'])): ?><span><?= e($stat['prefix']) ?></span><?php endif; ?>
        <span class="<?= $is_pending ? 'is-placeholder' : '' ?>"
              <?= $is_number ? 'data-count-to="' . e(str_replace(',', '', $value)) . '"' : '' ?>><?= e($value) ?></span>
        <?php if (!empty($stat['suffix'])): ?><span><?= e($stat['suffix']) ?></span><?php endif; ?>
      </p>
      <p class="stat-caption"><?= e($stat['caption']) ?></p>
    </div>
  <?php endforeach; ?>
</div>
<?php if ($placeholders): ?>
<!-- PLACEHOLDER FIGURES STILL TO BE SUPPLIED ON THIS PAGE:
<?php foreach ($placeholders as $caption): ?>
     - <?= str_replace(['--', '>'], ' ', (string) $caption) ?>

<?php endforeach; ?>
     Replace the X's in the $stats array on this page with the real numbers. -->
<?php endif; ?>
<?php
// Reset so a second band on the same page starts clean.
$stats = null;
$stats_light = null;
