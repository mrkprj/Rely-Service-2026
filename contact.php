<?php
// Must come first. It may redirect, so no output before this.
require __DIR__ . '/includes/enquiry-handler.php';

$page_title       = 'Contact';
$page_description = 'Talk to Rely Service in Mumbai about campus technology, student employability programmes or incubation support for your institution.';
$active           = 'contact';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <p class="breadcrumb"><a href="/">Home</a> <span aria-hidden="true">/</span> Contact</p>
    <span class="eyebrow">Contact</span>
    <h1>Tell us what you're trying to solve</h1>
    <p class="lead">
      Send us a short note about your institution and what you need. We reply to every
      enquiry, usually within two working days.
    </p>
  </div>
</section>

<div class="section">
  <div class="container contact-grid">

    <div>
      <?php if ($sent): ?>
        <div class="alert alert-success" role="status">
          <strong>Thank you. Your enquiry has reached us.</strong>
          <p>A member of the team will get back to you within two working days. If it's
             urgent, call <a href="tel:<?= e(company_phone_href()) ?>"><?= e(COMPANY_PHONE) ?></a>.</p>
        </div>
      <?php endif; ?>

      <?php if ($errors): ?>
        <div class="alert alert-error" role="alert">
          <strong><?= e($errors['form'] ?? 'Please check the highlighted fields and try again.') ?></strong>
          <?php
            $field_errors = array_diff_key($errors, ['form' => '']);
            if ($field_errors):
          ?>
            <ul>
              <?php foreach ($field_errors as $msg): ?>
                <li><?= e($msg) ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <h2>Send an enquiry</h2>

      <form class="form-grid" method="post" action="/contact" novalidate>
        <input type="hidden" name="csrf_token"  value="<?= e($_SESSION['csrf_token']) ?>">
        <input type="hidden" name="rendered_at" value="<?= time() ?>">

        <!-- Honeypot: hidden from people, irresistible to bots. Do not remove. -->
        <div class="hp-field" aria-hidden="true">
          <label for="website">Website</label>
          <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="form-row">
          <div class="field">
            <label for="name">Your name <span class="req" aria-hidden="true">*</span></label>
            <input type="text" id="name" name="name" required autocomplete="name"
                   value="<?= e($old['name']) ?>"
                   <?= isset($errors['name']) ? 'aria-invalid="true" aria-describedby="err-name"' : '' ?>>
            <?php if (isset($errors['name'])): ?>
              <p class="field-error" id="err-name"><?= e($errors['name']) ?></p>
            <?php endif; ?>
          </div>

          <div class="field">
            <label for="institution">Institution / organisation <span class="req" aria-hidden="true">*</span></label>
            <input type="text" id="institution" name="institution" required autocomplete="organization"
                   value="<?= e($old['institution']) ?>"
                   <?= isset($errors['institution']) ? 'aria-invalid="true" aria-describedby="err-institution"' : '' ?>>
            <?php if (isset($errors['institution'])): ?>
              <p class="field-error" id="err-institution"><?= e($errors['institution']) ?></p>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-row">
          <div class="field">
            <label for="email">Email <span class="req" aria-hidden="true">*</span></label>
            <input type="email" id="email" name="email" required autocomplete="email"
                   value="<?= e($old['email']) ?>"
                   <?= isset($errors['email']) ? 'aria-invalid="true" aria-describedby="err-email"' : '' ?>>
            <?php if (isset($errors['email'])): ?>
              <p class="field-error" id="err-email"><?= e($errors['email']) ?></p>
            <?php endif; ?>
          </div>

          <div class="field">
            <label for="phone">Phone <span class="hint">(optional)</span></label>
            <input type="tel" id="phone" name="phone" autocomplete="tel"
                   value="<?= e($old['phone']) ?>"
                   <?= isset($errors['phone']) ? 'aria-invalid="true" aria-describedby="err-phone"' : '' ?>>
            <?php if (isset($errors['phone'])): ?>
              <p class="field-error" id="err-phone"><?= e($errors['phone']) ?></p>
            <?php endif; ?>
          </div>
        </div>

        <div class="field">
          <label for="interest">What is this about?</label>
          <select id="interest" name="interest">
            <option value="">Select one</option>
            <?php foreach ($INTERESTS as $value => $label): ?>
              <option value="<?= e($value) ?>" <?= $old['interest'] === $value ? 'selected' : '' ?>>
                <?= e($label) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="field">
          <label for="message">How can we help? <span class="req" aria-hidden="true">*</span></label>
          <textarea id="message" name="message" required
                    <?= isset($errors['message']) ? 'aria-invalid="true" aria-describedby="err-message"' : '' ?>
          ><?= e($old['message']) ?></textarea>
          <?php if (isset($errors['message'])): ?>
            <p class="field-error" id="err-message"><?= e($errors['message']) ?></p>
          <?php else: ?>
            <p class="hint">A few lines about your institution and what you're trying to achieve.</p>
          <?php endif; ?>
        </div>

        <div>
          <button class="btn btn-primary" type="submit">Send enquiry</button>
        </div>

        <p class="hint">
          We use your details only to respond to this enquiry. See our
          <a href="/privacy">privacy policy</a>.
        </p>
      </form>
    </div>

    <aside class="contact-aside">
      <div class="panel">
        <h4>Rely Service</h4>
        <address>
          <?= e(COMPANY_ADDRESS_LINE1) ?><br>
          <?= e(COMPANY_ADDRESS_LINE2) ?><br>
          <?= e(COMPANY_CITY) ?> <?= e(COMPANY_PIN) ?><br>
          <?= e(COMPANY_STATE) ?>, India
        </address>
      </div>

      <div class="panel">
        <h4>Direct</h4>
        <p>
          <a href="tel:<?= e(company_phone_href()) ?>"><?= e(COMPANY_PHONE) ?></a><br>
          <a href="mailto:<?= e(COMPANY_EMAIL) ?>"><?= e(COMPANY_EMAIL) ?></a>
        </p>
        <p class="hint">Monday to Friday, 10:00 to 18:30 IST</p>
      </div>

      <div class="panel">
        <h4>Visiting us</h4>
        <!-- TODO: replace the src with your own Google Maps embed URL
             (Google Maps → Share → Embed a map → copy the src). -->
        <p class="hint">Map embed goes here once the office address is confirmed.</p>
      </div>
    </aside>

  </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
