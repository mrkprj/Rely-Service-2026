<?php
$page_title       = 'Privacy Policy';
$page_description = 'How Rely Service collects, uses and protects the information you submit through this website.';
$active           = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <p class="breadcrumb"><a href="/">Home</a> <span aria-hidden="true">/</span> Privacy Policy</p>
    <h1>Privacy Policy</h1>
    <p class="lead">Last updated: <?= date('F Y') ?></p>
  </div>
</section>

<div class="section">
  <div class="container" style="max-width:48rem">

    <!-- ---------------------------------------------------------------------
         IMPORTANT: this is a reasonable starting draft, NOT legal advice.
         Have it reviewed before launch, especially if you later collect
         student data. India's DPDP Act 2023 applies to personal data you
         process, and student data raises additional obligations.
         --------------------------------------------------------------------- -->

    <h2>What this covers</h2>
    <p>
      This policy explains what <?= e(SITE_NAME) ?> (&ldquo;we&rdquo;, &ldquo;us&rdquo;) does with
      information collected through <?= e(SITE_URL) ?>. It does not cover information handled
      under a separate contract with an institution, which is governed by that agreement.
    </p>

    <h2>Information we collect</h2>
    <p>When you submit the enquiry form, we collect the details you enter:</p>
    <ul>
      <li>Your name</li>
      <li>The institution or organisation you represent</li>
      <li>Your email address, and phone number if you provide one</li>
      <li>The area of interest you select and the message you write</li>
    </ul>
    <p>
      Our server also records the IP address and time of the submission, which we keep
      as a basic anti-abuse measure.
    </p>

    <h2>How we use it</h2>
    <p>
      We use these details solely to respond to your enquiry and to follow up on the
      conversation it starts. We do not sell your information, and we do not add you to
      a marketing list without your consent.
    </p>

    <h2>How long we keep it</h2>
    <p>
      Enquiries are retained for as long as needed to serve the relationship, and reviewed
      periodically. You can ask us to delete your enquiry at any time.
    </p>

    <h2>Who else sees it</h2>
    <p>
      Your enquiry is delivered to our team inbox and stored on our web hosting provider's
      servers. We share it with third parties only where required by law.
    </p>

    <h2>Cookies and analytics</h2>
    <p>
      <!-- TODO: update this if you add analytics. If you add Google Analytics you
           will likely need a consent banner; privacy-first tools such as Plausible
           avoid that. -->
      This website sets a single session cookie, used only to protect the enquiry form
      against cross-site request forgery. We do not use advertising or tracking cookies.
    </p>

    <h2>Your rights</h2>
    <p>
      You can ask us what information we hold about you, ask for it to be corrected, or
      ask for it to be deleted. Write to
      <a href="mailto:<?= e(COMPANY_EMAIL) ?>"><?= e(COMPANY_EMAIL) ?></a> and we will respond
      within a reasonable period.
    </p>

    <h2>Contact</h2>
    <address style="font-style:normal">
      <?= e(SITE_NAME) ?><br>
      <?= e(company_locations_inline()) ?><br>
      <a href="mailto:<?= e(COMPANY_EMAIL) ?>"><?= e(COMPANY_EMAIL) ?></a><br>
      <a href="tel:<?= e(company_phone_href()) ?>"><?= e(COMPANY_PHONE) ?></a>
    </address>

  </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
