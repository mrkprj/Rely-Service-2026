<?php
$page_title       = 'Technology Solutions';
$page_description = 'Educational ERP, digital transformation, NAAC and NBA accreditation systems and admission growth campaigns for colleges and universities, from Rely Service, Mumbai.';
$active           = 'technology';
require __DIR__ . '/includes/header.php';

/* Content drawn from Content/Rely-Service.txt. Anything not evidenced in the
   source documents is written as capability rather than claim. */
$sections = [
    [
        'id'    => 'educational-erp',
        'title' => 'Educational ERP',
        'lead'  => 'One system for admissions, records, examinations and placements, instead of six that don\'t talk to each other.',
        'body'  => [
            'Most institutions run admissions in one tool, attendance in another and examinations on a spreadsheet, then re-key the same student data between them. We implement and integrate the systems a campus runs on day to day so the data is entered once and used everywhere.',
            'The placement cell suite matters particularly here: it is where student records, recruiter relationships and outcome reporting meet, and it is usually the weakest link in an otherwise functional stack.',
        ],
        'ai'    => 'Our ERP work includes an AI layer over your own data: natural-language queries against student records, automatic anomaly flagging on attendance and fee defaults, and drafted reports that a registrar edits rather than assembles.',
        'panel' => [
            'heading' => 'What this covers',
            'items'   => [
                'Admission and fee management',
                'Student Information System (SIS)',
                'Academic examination and results',
                'Placement cell portal suite',
                'Institutional alumni network',
                'Operational HR, library and payroll',
            ],
        ],
    ],
    [
        'id'    => 'digital-transformation',
        'title' => 'IT & Digital Transformation',
        'lead'  => 'The student-facing layer: portals, apps and the automation behind them.',
        'body'  => [
            'This is the work students, parents and recruiters actually see: admission portals that don\'t lose applicants halfway through, apps that work on the phone a student really owns, and learning platforms built around how your faculty teach rather than how a vendor assumed they would.',
            'Where AI genuinely removes load, we apply it: answering the same admissions questions a thousand times, drafting reports from data that already exists, guiding students through career options. Where a simpler automation would do the job better, we say so.',
        ],
        'ai'    => 'Admission assistants that answer applicant questions around the clock in English, Hindi and Marathi; AI document assistants that read and classify uploaded certificates; and predictive career guidance that suggests routes from a student\'s own academic record.',
        'panel' => [
            'heading' => 'What this covers',
            'items'   => [
                'Custom college pages and admission portals',
                'Responsive student and faculty native apps',
                'Tailor-made custom SaaS and LMS suites',
                'AI chatbots and intelligent automation',
                'Academic AI document assistants',
                'Predictive AI-based career guidance',
            ],
        ],
    ],
    [
        'id'    => 'accreditation',
        'title' => 'Accreditation & Compliance',
        'lead'  => 'Evidence assembled continuously through the year, not reconstructed the week before a visit.',
        'body'  => [
            'NAAC, NBA, NIRF and AICTE submissions fail on documentation far more often than on substance. The data almost always exists somewhere on campus; what is missing is a system that captures it as it happens and formats it the way the framework expects.',
            'We build that layer over your existing systems, so a submission becomes an export rather than a scramble, and so internal audits surface gaps while there is still time to close them.',
        ],
        'ai'    => 'AI reads your existing documents and maps them to NAAC, NBA and NIRF criteria automatically, flagging which criteria are thin while there is still time to act, and drafting the narrative sections from evidence already on file.',
        'panel' => [
            'heading' => 'What this covers',
            'items'   => [
                'NAAC document assembly systems',
                'NBA academic compliance controls',
                'ISO framework data registers',
                'NIRF metric calculators',
                'AICTE verification readiness tools',
                'Internal institutional audit engines',
            ],
        ],
    ],
    [
        'id'    => 'digital-growth',
        'title' => 'Digital Growth',
        'lead'  => 'Filling seats: search, social and admission campaigns run as a measured funnel.',
        'body'  => [
            'Admissions are competitive and increasingly decided online, well before a prospectus is ever opened. We run search, social and paid campaigns for institutions with the funnel instrumented end to end, so you can see which channels produce enquiries that actually convert to enrolments.',
            'The same infrastructure keeps alumni reachable. They are the group most institutions under-use, and the one most likely to send the next cohort of students and recruiters.',
        ],
        'ai'    => 'Campaign spend is optimised against enrolment, not clicks: models score which enquiry sources actually convert, and creative and bidding follow. Chat assistants qualify enquiries before they reach your counselling team.',
        'panel' => [
            'heading' => 'What this covers',
            'items'   => [
                'Search engine optimisation',
                'Social media audience growth',
                'Qualified lead generation campaigns',
                'Brand communications strategy',
                'Admission campaign funnel management',
                'Alumni management',
            ],
        ],
    ],
];
?>

<section class="page-hero">
  <div class="container">
    <p class="breadcrumb"><a href="/">Home</a> <span aria-hidden="true">/</span> Technology Solutions</p>
    <span class="eyebrow">Technology Solutions</span>
    <h1>Technology built for how a campus actually runs</h1>
    <p class="lead">
      Educational ERP, the student-facing digital layer, accreditation evidence and
      admission growth, delivered by a team that works inside educational
      institutions all year, not just at procurement time.
    </p>
  </div>
</section>

<div class="section section--ink section--tight">
  <div class="container">
    <div class="section-head center">
      <span class="eyebrow">Technology at Rely Service</span>
      <h2>What we have built, and what it runs on</h2>
    </div>
    <?php
      /* Figures written as X's are placeholders: replace the X's with the real
         number and the cell starts counting up automatically. */
      $stats = [
        ['value' => 'XX',     'suffix' => '+', 'caption' => 'Institutions running our systems'],
        ['value' => 'XX,XXX', 'suffix' => '',  'caption' => 'Student records managed daily'],
        ['value' => 'XX',     'suffix' => ' hrs', 'caption' => 'Admin hours saved per month, per institution'],
        ['value' => '5',      'suffix' => '',  'caption' => 'Accreditation frameworks covered: NAAC, NBA, NIRF, AICTE, ISO'],
      ];
      require __DIR__ . '/includes/stats-band.php';
    ?>
  </div>
</div>

<?php require __DIR__ . '/includes/pillar-sections.php'; ?>

<section class="section section--ink">
  <div class="container">
    <div class="section-head center">
      <span class="eyebrow">How we work</span>
      <h2>Built to be handed over</h2>
    </div>
    <div class="grid grid-3">
      <div>
        <h3>We start with the people using it</h3>
        <p>Discovery happens on campus, with the staff who run the process today,
           not from a requirements document written elsewhere.</p>
      </div>
      <div>
        <h3>Mainstream technology only</h3>
        <p>We build on well-supported platforms so another developer can pick the
           system up. No proprietary lock-in.</p>
      </div>
      <div>
        <h3>Documentation and training included</h3>
        <p>You should never need to call us to change a form field. Handover is part
           of delivery, not an upsell.</p>
      </div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container">
    <h2>Have a system that isn't serving you?</h2>
    <p>Tell us what's breaking down. We'll give you an honest read on whether it needs replacing, integrating or simply fixing.</p>
    <div class="btn-row">
      <a class="btn btn-primary" href="/contact">Start a conversation</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
