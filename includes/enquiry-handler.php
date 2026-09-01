<?php
/**
 * Enquiry form handler.
 *
 * Included at the TOP of contact.php, before any HTML is output, so it can
 * redirect. On success it sets a session flash and redirects (POST/Redirect/GET,
 * so a browser refresh doesn't resend the enquiry).
 *
 * Anti-spam, in order of usefulness:
 *   1. Honeypot field  : a field people never see and bots usually fill.
 *   2. Time trap       : forms submitted in under 3 seconds are bots.
 *   3. CSRF token      : also stops naive cross-site posting.
 * No CAPTCHA. Add reCAPTCHA/Turnstile only if spam actually gets through.
 */
require_once __DIR__ . '/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fresh CSRF token + render timestamp for the form below.
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors  = [];
$old     = ['name' => '', 'phone' => '', 'email' => '', 'interest' => '', 'message' => ''];
$sent    = isset($_GET['sent']);

// Required field. Keep in step with the three practice pages.
$INTERESTS = [
    'technology' => 'Technology Solutions',
    'student'    => 'Student Success / Campus to Corporate',
    'incubation' => 'Incubation & Entrepreneurship',
    'other'      => 'Something else',
];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {

    foreach ($old as $k => $_) {
        $old[$k] = trim((string) ($_POST[$k] ?? ''));
    }

    // --- 1. Honeypot: real people leave this empty ---------------------------
    if (trim((string) ($_POST['website'] ?? '')) !== '') {
        // Pretend it worked. Don't tell a bot why it failed.
        header('Location: /contact?sent=1');
        exit;
    }

    // --- 2. Time trap --------------------------------------------------------
    $rendered = (int) ($_POST['rendered_at'] ?? 0);
    if ($rendered > 0 && (time() - $rendered) < 3) {
        header('Location: /contact?sent=1');
        exit;
    }

    // --- 3. CSRF -------------------------------------------------------------
    if (!hash_equals($_SESSION['csrf_token'] ?? '', (string) ($_POST['csrf_token'] ?? ''))) {
        $errors['form'] = 'Your session expired. Please review the details and send again.';
    }

    // --- Validation ----------------------------------------------------------
    // Required: name, phone, service. Optional: email, message.
    if ($old['name'] === '') {
        $errors['name'] = 'Please tell us your name.';
    } elseif (str_length($old['name']) > 100) {
        $errors['name'] = 'That name looks too long.';
    }

    if ($old['phone'] === '') {
        $errors['phone'] = 'Please give us a number we can reach you on.';
    } else {
        $digits = preg_replace('/\D/', '', $old['phone']);
        if (strlen($digits) < 8 || strlen($digits) > 15) {
            $errors['phone'] = 'Please enter a valid phone number.';
        }
    }

    // Optional, but must be valid if given, or a reply will bounce.
    if ($old['email'] !== '' && !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'That email address doesn\'t look right.';
    }

    if ($old['interest'] === '') {
        $errors['interest'] = 'Please tell us which service you are asking about.';
    } elseif (!isset($INTERESTS[$old['interest']])) {
        $errors['interest'] = 'Please choose one of the listed options.';
    }

    if ($old['message'] !== '' && str_length($old['message']) > 4000) {
        $errors['message'] = 'Please keep this under 4000 characters.';
    }

    // Header-injection guard: newlines have no business in these fields.
    foreach (['name', 'email', 'phone'] as $k) {
        if (preg_match('/[\r\n]/', $old[$k])) {
            $errors[$k] = 'That value contains invalid characters.';
        }
    }

    // --- Send ----------------------------------------------------------------
    if (!$errors) {
        $interest = $INTERESTS[$old['interest']] ?? 'Not specified';

        $subject = 'Website enquiry: ' . $interest . ' (' . $old['name'] . ')';
        $body    = "New enquiry from the Rely Service website\n"
                 . str_repeat('-', 52) . "\n\n"
                 . "Name:    {$old['name']}\n"
                 . "Phone:   {$old['phone']}\n"
                 . "Email:   " . ($old['email'] !== '' ? $old['email'] : 'Not provided') . "\n"
                 . "Service: {$interest}\n\n"
                 . "Message:\n" . ($old['message'] !== '' ? $old['message'] : '(none given)') . "\n\n"
                 . str_repeat('-', 52) . "\n"
                 . 'Received: ' . date('d M Y, H:i') . " IST\n"
                 . 'IP:       ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n";

        // From must be on your own domain or shared hosts silently drop the mail.
        // Reply-To is what makes "Reply" in your mail client go to the enquirer.
        $headers = [
            'From: ' . SITE_NAME . ' Website <' . ENQUIRY_FROM . '>',
            'Content-Type: text/plain; charset=UTF-8',
            'X-Mailer: PHP/' . phpversion(),
        ];
        // Only set Reply-To when an address was actually given, otherwise the
        // header is malformed and some hosts reject the whole message.
        if ($old['email'] !== '') {
            array_splice($headers, 1, 0, 'Reply-To: ' . $old['name'] . ' <' . $old['email'] . '>');
        }

        $ok = @mail(ENQUIRY_TO, $subject, $body, implode("\r\n", $headers), '-f' . ENQUIRY_FROM);

        // Always keep a local copy. mail() fails silently more often than you'd like.
        enquiry_log($old, $interest, $ok);

        if ($ok) {
            unset($_SESSION['csrf_token']);           // one-time token
            header('Location: /contact?sent=1');
            exit;
        }

        $errors['form'] = 'Something went wrong sending your message. Please email us directly at '
                        . COMPANY_EMAIL . ' or call ' . COMPANY_PHONE . '.';
    }
}

/**
 * Append the enquiry to a CSV outside the web root if possible.
 * If mail() ever breaks, this is the record that saves the lead.
 */
function enquiry_log(array $data, string $interest, bool $mailed): void
{
    $dir = __DIR__ . '/../storage';
    if (!is_dir($dir) && !@mkdir($dir, 0750, true) && !is_dir($dir)) {
        return;
    }

    $file = $dir . '/enquiries.csv';
    $new  = !file_exists($file);

    $fh = @fopen($file, 'a');
    if (!$fh) {
        return;
    }
    if (flock($fh, LOCK_EX)) {
        if ($new) {
            fputcsv($fh, ['timestamp', 'name', 'phone', 'email', 'service', 'message', 'mail_sent']);
        }
        fputcsv($fh, [
            date('c'), $data['name'], $data['phone'], $data['email'],
            $interest, $data['message'], $mailed ? 'yes' : 'no',
        ]);
        flock($fh, LOCK_UN);
    }
    fclose($fh);
}
