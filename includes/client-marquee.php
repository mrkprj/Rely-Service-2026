<?php
/**
 * Client logo strip.
 *
 * Expects $clients: [['name' => 'Institute', 'logo' => 'file.png'], ...]
 * where 'logo' is a filename in /assets/img/clients/, or '' to fall back to
 * the name rendered as text.
 *
 * Add or remove entries freely. The layout adapts on its own:
 *
 *   under MARQUEE_MIN entries  a centred static row (too few to loop convincingly)
 *   MARQUEE_MIN or more        a continuous marquee
 *
 * The marquee works by rendering the same set twice and sliding the track
 * exactly -50%, so the loop is seamless. When there are few logos the base set
 * is repeated until it comfortably exceeds the viewport width, otherwise you
 * would see a gap after the last logo on a wide screen.
 *
 * Scroll speed is derived from the number of tiles, so the strip moves at the
 * same pixels-per-second whether you have six clients or thirty.
 */

/* Guarded so the partial can be included more than once per page (or on
   several pages) without redeclaring these. */
if (!function_exists('client_tile')) {

    define('MARQUEE_MIN',           4);   // fewer than this renders as a static row
    define('MARQUEE_MIN_TILES',     8);   // repeat the set until it holds at least this many
    define('MARQUEE_SECS_PER_TILE', 3.4); // constant scroll speed, whatever the count

    /** One logo tile. */
    function client_tile(array $client): void
    { ?>
  <li class="logo-cell">
    <?php if (!empty($client['logo'])): ?>
      <?php /* Files are pre-normalised so every logo carries equal optical
               weight; w/h are the intended display size and the file itself is
               2x that for retina. Emitting both also prevents layout shift. */ ?>
      <img src="/assets/img/clients/<?= e($client['logo']) ?>"
           alt="<?= e($client['name']) ?>"
           width="<?= (int) ($client['w'] ?? 0) ?>" height="<?= (int) ($client['h'] ?? 0) ?>"
           loading="lazy" decoding="async">
    <?php else: ?>
      <span><?= e($client['name']) ?></span>
    <?php endif; ?>
  </li>
<?php }
}

$count = count($clients);

if ($count === 0) {
    return;
}

if ($count < MARQUEE_MIN): ?>

  <ul class="logo-row">
    <?php foreach ($clients as $client) client_tile($client); ?>
  </ul>

<?php else:
    $repeat   = (int) ceil(MARQUEE_MIN_TILES / $count);
    $set      = [];
    for ($i = 0; $i < $repeat; $i++) {
        $set = array_merge($set, $clients);
    }
    $duration = round(count($set) * MARQUEE_SECS_PER_TILE, 1);
?>

  <div class="marquee" style="--marquee-duration: <?= e((string) $duration) ?>s">
    <div class="marquee-track">
      <ul class="marquee-set">
        <?php foreach ($set as $client) client_tile($client); ?>
      </ul>
      <?php /* Visual duplicate that makes the loop seamless, hidden from
               assistive tech so the client list isn't announced twice. */ ?>
      <ul class="marquee-set" aria-hidden="true">
        <?php foreach ($set as $client) client_tile($client); ?>
      </ul>
    </div>

    <?php /* WCAG 2.2.2 wants an explicit control for motion that runs past five
             seconds. Hover and keyboard focus pause it too, but a real button is
             the reliable mechanism. */ ?>
    <button class="marquee-pause" type="button" aria-pressed="false">
      <span class="marquee-pause-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Pause the scrolling client logos</span>
    </button>
  </div>

<?php endif; ?>
