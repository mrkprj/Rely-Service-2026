<?php
/**
 * Stats band.
 *
 * Expects $stats: an array of rows, each
 *   [
 *     'value'   => '250',        // the number itself, digits only where possible
 *     'prefix'  => '',           // e.g. '₹'
 *     'suffix'  => '+',          // e.g. '+', ' LPA', '%'
 *     'caption' => 'Trainers on our panel',
 *     'pending' => true,         // OPTIONAL: figure not yet verified
 *   ]
 * Optional $stats_light = true renders the light variant for white sections.
 *
 * Counting animation: JS reads data-count-to and animates from zero when the
 * band scrolls into view. The final value is already in the HTML, so the band
 * is correct with JavaScript disabled and under prefers-reduced-motion.
 *
 * PENDING FIGURES
 * Rows marked 'pending' render dimmed with a dashed outline, and a warning is
 * emitted in the HTML source. This is deliberate: unverified numbers on a
 * credibility site are worse than no numbers, so they are made impossible to
 * ship unnoticed. Remove the flag once a figure is confirmed.
 */

if (empty($stats)) {
    return;
}
$stats_light = $stats_light ?? false;
$has_pending = false;
?>
<div class="stats-band<?= $stats_light ? ' stats-band--light' : '' ?>">
  <?php foreach ($stats as $stat):
      $pending = !empty($stat['pending']);
      $has_pending = $has_pending || $pending;
      // Digits only, so the counter can animate it. Anything else renders as-is.
      $numeric = preg_replace('/[^0-9]/', '', (string) $stat['value']);
      $countable = $numeric !== '' && $numeric === str_replace(',', '', (string) $stat['value']);
  ?>
    <div class="stat-cell"<?= $pending ? ' data-pending="1"' : '' ?>>
      <p class="stat-value"<?= $pending ? ' data-pending="1"' : '' ?>>
        <?php if (!empty($stat['prefix'])): ?><span><?= e($stat['prefix']) ?></span><?php endif; ?>
        <span<?= $countable ? ' data-count-to="' . e($numeric) . '"' : '' ?>><?= e((string) $stat['value']) ?></span>
        <?php if (!empty($stat['suffix'])): ?><span><?= e($stat['suffix']) ?></span><?php endif; ?>
      </p>
      <p class="stat-caption"><?= e($stat['caption']) ?></p>
    </div>
  <?php endforeach; ?>
</div>
<?php if ($has_pending): ?>
<!-- ===========================================================================
     WARNING: this band contains PLACEHOLDER figures marked 'pending'.
     They render dimmed with a dashed outline. Replace them with verified
     numbers and remove the 'pending' flag before this page goes live.
     =========================================================================== -->
<?php endif; ?>
<?php
// Reset so a second band on the same page starts clean.
$stats = null;
$stats_light = null;
