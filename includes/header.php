<?php
/**
 * Shared page head + site header.
 *
 * Set these before including this file:
 *   $page_title       : string, without the site name suffix
 *   $page_description : string, ~155 characters, for search results
 *   $active           : nav key to highlight technology|student|incubation|about|contact
 */
require_once __DIR__ . '/config.php';

$page_title       = $page_title       ?? SITE_NAME;
$page_description = $page_description ?? SITE_TAGLINE;
$active           = $active           ?? '';
$full_title       = ($page_title === SITE_NAME)
    ? SITE_NAME . ': ' . SITE_TAGLINE
    : $page_title . ' | ' . SITE_NAME;
$canonical        = SITE_URL . strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
?>
<!DOCTYPE html>
<html lang="en-IN">
<head>
<script>document.documentElement.className += ' js';</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($full_title) ?></title>
<meta name="description" content="<?= e($page_description) ?>">
<link rel="canonical" href="<?= e($canonical) ?>">

<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
<meta property="og:title" content="<?= e($full_title) ?>">
<meta property="og:description" content="<?= e($page_description) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:image" content="<?= e(SITE_URL) ?>/assets/img/og-image.jpg">
<meta name="twitter:card" content="summary_large_image">

<link rel="icon" href="/assets/img/favicon-32.png" type="image/png" sizes="32x32">
<link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">
<meta name="theme-color" content="#00a0e3">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap">
<link rel="stylesheet" href="/assets/css/style.css?v=9">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ProfessionalService",
  "name": "<?= e(SITE_NAME) ?>",
  "description": "<?= e(SITE_TAGLINE) ?>",
  "url": "<?= e(SITE_URL) ?>",
  "telephone": "<?= e(COMPANY_PHONE) ?>",
  "email": "<?= e(COMPANY_EMAIL) ?>",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "<?= e(COMPANY_CITY) ?>",
    "addressRegion": "<?= e(COMPANY_STATE) ?>",
    "addressCountry": "IN"
  },
  "areaServed": "IN"
}
</script>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header" id="site-header">
  <div class="container header-inner">
    <a class="brand" href="/" aria-label="<?= e(SITE_NAME) ?> home">
      <img class="brand-logo" src="/assets/img/logo/logo.png"
           alt="<?= e(SITE_NAME) ?>" width="2792" height="483">
    </a>

    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" aria-label="Open menu">
      <span class="nav-toggle-bar"></span>
      <span class="nav-toggle-bar"></span>
      <span class="nav-toggle-bar"></span>
    </button>

    <nav class="primary-nav" id="primary-nav" aria-label="Primary">
      <ul class="nav-list">
        <?php foreach ($NAV as $key => $item): ?>
          <li class="nav-item<?= $item['children'] ? ' has-children' : '' ?>">
            <a class="nav-link<?= $active === $key ? ' is-active' : '' ?>"
               href="<?= e($item['url']) ?>"
               <?= $active === $key ? 'aria-current="page"' : '' ?>><?= e($item['label']) ?></a>

            <?php if ($item['children']): ?>
              <button class="submenu-toggle" type="button" aria-expanded="false"
                      aria-label="Show <?= e($item['label']) ?> sections"></button>
              <ul class="submenu">
                <?php foreach ($item['children'] as [$label, $url]): ?>
                  <li><a href="<?= e($url) ?>"><?= e($label) ?></a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
        <li class="nav-item nav-cta-item">
          <a class="btn btn-primary btn-sm" href="/contact">Talk to us</a>
        </li>
      </ul>
    </nav>
  </div>
</header>

<main id="main">
