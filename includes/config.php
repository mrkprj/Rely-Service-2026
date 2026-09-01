<?php
/**
 * Site-wide configuration.
 * ---------------------------------------------------------------------------
 * EDIT THIS FILE FIRST. Everything below is placeholder data. Replace the
 * values with Rely Service's real details and the whole site updates.
 */

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
define('ENQUIRY_TO',   'tnp@relyservice.com');
// Must be an address on YOUR domain or shared hosts will drop the mail.
define('ENQUIRY_FROM', 'website@relyservice.com');       // TODO: create this mailbox

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
