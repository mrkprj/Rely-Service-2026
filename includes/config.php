<?php
/**
 * Site-wide configuration.
 * ---------------------------------------------------------------------------
 * EDIT THIS FILE FIRST. Everything below is placeholder data. Replace the
 * values with Rely Service's real details and the whole site updates.
 */

// --- Error handling -------------------------------------------------------
/* Never print PHP errors to a visitor. A stack trace leaks absolute paths and
   sometimes configuration values. Shared hosts vary in their default, so set it
   here rather than trusting php.ini. Set SITE_DEBUG to true only while
   troubleshooting locally. */
define('SITE_DEBUG', in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1'], true));

ini_set('display_errors', SITE_DEBUG ? '1' : '0');
ini_set('display_startup_errors', SITE_DEBUG ? '1' : '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);

// --- Company details ------------------------------------------------------
define('SITE_NAME',    'Rely Service');
define('SITE_TAGLINE', 'Technology, talent and enterprise for education');
// TODO: CONFIRM. The presentation uses relyservice.com, this was set up as .in.
define('SITE_URL',     'https://www.relyservice.com');  // real domain, no trailing slash

// Offices are shown as locations only, not a full postal address.
define('COMPANY_CITY',          'Mumbai');
define('COMPANY_STATE',         'Maharashtra');
$COMPANY_LOCATIONS = ['Malad', 'Worli'];
define('COMPANY_PHONE',         '+91 98190 32403');       // from the T&P deck
define('COMPANY_EMAIL',         'tnp@relyservice.com');   // from the T&P deck

// Where enquiry form submissions are delivered. Use a shared inbox, not a
// personal one, so nothing is lost when someone is on leave.
// Comma-separated list. Both inboxes receive every enquiry, so nothing depends
// on forwarding rules staying in place.
define('ENQUIRY_TO',   'digital-squad@fromdrive.com, tnp@relyservice.com');
// Must be an address on YOUR domain or shared hosts will drop the mail.
define('ENQUIRY_FROM', 'website@relyservice.com');       // TODO: create this mailbox

// --- Limits ---------------------------------------------------------------
// Field caps, applied to the raw submitted value before any other check.
define('MAX_NAME_LEN',    100);
define('MAX_PHONE_LEN',    30);
define('MAX_EMAIL_LEN',   254);   // the practical maximum for an address
define('MAX_MESSAGE_LEN', 4000);

// Enquiries allowed from one address per window.
define('RATE_LIMIT_MAX',    5);
define('RATE_LIMIT_WINDOW', 3600);

// Stop the enquiry log growing without bound (bytes).
define('MAX_LOG_BYTES', 5 * 1024 * 1024);

// --- Social (leave empty string to hide the icon) -------------------------
define('SOCIAL_LINKEDIN', 'https://www.linkedin.com/company/relyservice');
define('SOCIAL_INSTAGRAM', '');
define('SOCIAL_TWITTER',  '');

// --- Navigation -----------------------------------------------------------
// key => [label, url, [children]]
$NAV = [
    'technology' => [
        'label' => 'Technology Solutions',
        'url'   => '/technology-solutions',
        'children' => [
            ['Educational ERP',            '/technology-solutions#educational-erp'],
            ['IT & Digital Transformation','/technology-solutions#digital-transformation'],
            ['Accreditation & Compliance', '/technology-solutions#accreditation'],
            ['Digital Growth',             '/technology-solutions#digital-growth'],
        ],
    ],
    'student' => [
        'label' => 'Student Success',
        'url'   => '/student-success',
        'children' => [
            ['Skills',            '/student-success#skills'],
            ['Employability',     '/student-success#employability'],
            ['Industry Readiness','/student-success#industry-readiness'],
            ['Career Exposure',   '/student-success#career-exposure'],
        ],
    ],
    'incubation' => [
        'label' => 'Incubation & Entrepreneurship',
        'url'   => '/incubation',
        'children' => [
            ['Setting Up the Centre',   '/incubation#setting-up'],
            ['Legal & Governance',      '/incubation#legal-governance'],
            ['Funding & Finance',       '/incubation#funding-finance'],
            ['Mentors & Operations',    '/incubation#mentors-operations'],
        ],
    ],
    'about' => [
        'label' => 'About',
        'url'   => '/about',
        'children' => [],
    ],
];

// --- Security -------------------------------------------------------------

/**
 * Runtime hardening. Called once, at the top of every page, from header.php.
 *
 * These are set in PHP as well as .htaccess because shared hosts sometimes
 * disable mod_headers, and a security header that silently fails to apply is
 * worse than one you know is there.
 */
function security_headers(): void
{
    if (headers_sent()) {
        return;
    }

    // Do not advertise the PHP version. It tells an attacker which CVEs to try.
    header_remove('X-Powered-By');

    // The one inline script on the site is allowlisted by hash rather than by
    // 'unsafe-inline'. If that script is ever edited, recompute the hash or it
    // stops running; the failure is graceful (no scroll animations, all content
    // still visible), but it will be silent, so it is noted in the README.
    $csp = "default-src 'self'; "
         . "script-src 'self' 'sha256-DamCoPgB/VkDCPsu0R6X4sJsz1c66vGlUGBXLu04Yxg='; "
         // Inline styles are used for a handful of layout one-offs and the
         // marquee's duration custom property, so they must be permitted.
         . "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; "
         . "font-src 'self' https://fonts.gstatic.com; "
         . "img-src 'self' data:; "
         . "form-action 'self'; "
         . "frame-ancestors 'self'; "
         . "base-uri 'self'; "
         . "object-src 'none'";
    header('Content-Security-Policy: ' . $csp);
    header('X-Content-Type-Options: nosniff');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('X-Frame-Options: SAMEORIGIN');
}

/**
 * Start the session with cookie flags set.
 *
 * PHP's defaults leave the session cookie readable by JavaScript and attached
 * to cross-site requests. There is no login here, but the cookie carries the
 * CSRF token, so it is worth locking down.
 */
function secure_session_start(): void
{
    if (session_status() !== PHP_SESSION_NONE) {
        return;
    }
    $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
          || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https');

    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'secure'   => $https,   // true once the site is on HTTPS
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

/**
 * Simple file-backed rate limit, keyed by a hash of the client address.
 *
 * Without this, the enquiry form will accept submissions as fast as they can be
 * sent: measured at 12 in a tenth of a second, each of which would despatch an
 * email to two inboxes in production. That is a way to get the sending domain
 * marked as a spam source, and to fill the disk on shared hosting.
 *
 * The address is hashed, not stored, so the rate-limit files hold no personal
 * data. Returns true when the request should be allowed.
 */
function rate_limit_ok(int $max = RATE_LIMIT_MAX, int $window = RATE_LIMIT_WINDOW): bool
{
    $dir = __DIR__ . '/../storage/ratelimit';
    if (!is_dir($dir) && !@mkdir($dir, 0750, true) && !is_dir($dir)) {
        return true;   // cannot track, so do not lock legitimate users out
    }

    $ip   = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $file = $dir . '/' . hash('sha256', $ip . '|' . SITE_NAME) . '.txt';
    $now  = time();

    $fh = @fopen($file, 'c+');
    if (!$fh) {
        return true;
    }
    $allowed = true;
    if (flock($fh, LOCK_EX)) {
        $raw   = stream_get_contents($fh) ?: '';
        $times = array_filter(array_map('intval', explode(',', $raw)));
        // Drop anything outside the window.
        $times = array_values(array_filter($times, fn($t) => $t > $now - $window));

        if (count($times) >= $max) {
            $allowed = false;
        } else {
            $times[] = $now;
            ftruncate($fh, 0);
            rewind($fh);
            fwrite($fh, implode(',', $times));
        }
        fflush($fh);
        flock($fh, LOCK_UN);
    }
    fclose($fh);

    // Opportunistic cleanup so the directory does not grow without bound.
    if (random_int(1, 50) === 1) {
        foreach (glob($dir . '/*.txt') ?: [] as $old) {
            if (@filemtime($old) < $now - ($window * 4)) {
                @unlink($old);
            }
        }
    }
    return $allowed;
}

// --- Helpers --------------------------------------------------------------

/** Escape for HTML output. Use on every dynamic string. */
function e(?string $s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Offices as one readable line, e.g. "Malad and Worli, Mumbai". */
function company_locations_inline(): string
{
    global $COMPANY_LOCATIONS;
    $n = count($COMPANY_LOCATIONS);
    if ($n === 0) {
        return COMPANY_CITY;
    }
    $joined = $n === 1
        ? $COMPANY_LOCATIONS[0]
        : implode(', ', array_slice($COMPANY_LOCATIONS, 0, -1)) . ' and ' . end($COMPANY_LOCATIONS);

    return $joined . ', ' . COMPANY_CITY;
}

/**
 * Character count that does not require the mbstring extension.
 *
 * mbstring is not guaranteed on shared hosting, and mb_strlen() being missing
 * is a fatal error rather than a warning, so a form submission would take the
 * whole page down. PCRE with the /u modifier is compiled into PHP by default,
 * which makes it the safer dependency.
 */
function str_length(string $s): int
{
    if (function_exists('mb_strlen')) {
        return mb_strlen($s, 'UTF-8');
    }
    $count = preg_match_all('/./us', $s);
    // preg_* returns false on malformed UTF-8; byte length is a safe upper bound.
    return $count === false ? strlen($s) : $count;
}

/** Phone stripped to digits for tel: links. */
function company_phone_href(): string
{
    return preg_replace('/[^0-9+]/', '', COMPANY_PHONE);
}
