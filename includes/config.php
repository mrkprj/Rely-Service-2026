<?php
/**
 * Site-wide configuration.
 * ---------------------------------------------------------------------------
 * EDIT THIS FILE FIRST. Everything below is placeholder data — replace the
 * values with Rely Service's real details and the whole site updates.
 */

// --- Company details ------------------------------------------------------
define('SITE_NAME',    'Rely Service');
define('SITE_TAGLINE', 'Technology, talent and enterprise for education');
// TODO: CONFIRM — the presentation uses relyservice.com, this was set up as .in.
define('SITE_URL',     'https://www.relyservice.com');  // real domain, no trailing slash

define('COMPANY_ADDRESS_LINE1', '[Office address line 1]');
define('COMPANY_ADDRESS_LINE2', '[Area, Landmark]');
define('COMPANY_CITY',          'Mumbai');
define('COMPANY_STATE',         'Maharashtra');
define('COMPANY_PIN',           '400001');
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
            ['Entrepreneurship Training', '/incubation#entrepreneurship-training'],
            ['Venture Mentoring',         '/incubation#venture-mentoring'],
            ['Incubation Cell Setup',     '/incubation#incubation-cell'],
            ['Industry & Funding Access', '/incubation#industry-funding'],
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

/** Full postal address on one line. */
function company_address_inline(): string
{
    return implode(', ', array_filter([
        COMPANY_ADDRESS_LINE1,
        COMPANY_ADDRESS_LINE2,
        COMPANY_CITY . ' ' . COMPANY_PIN,
    ]));
}

/** Phone stripped to digits for tel: links. */
function company_phone_href(): string
{
    return preg_replace('/[^0-9+]/', '', COMPANY_PHONE);
}
