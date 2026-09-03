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
        'lead'  => 'One hosted platform for admissions, records, examinations and placements, instead of six systems that do not talk to each other.',
        'body'  => [
            'Most institutions run admissions in one tool, attendance in another and examinations on a spreadsheet, then re-key the same student data between them. Our ERP replaces that with a single platform where the data is entered once and used everywhere.',
            'It is delivered as software as a service. We host it, run it, secure it and keep it updated, so there is no server for your team to maintain and no upgrade project every few years. Your institution subscribes, your staff are trained on it, and the platform improves for everyone as we develop it.',
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
                'Hosting, security, updates and support included',
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
        'lead'  => 'Complete digital marketing for the institution, including running your social media platforms end to end.',
        'body'  => [
            'Admissions are competitive and increasingly decided online, well before a prospectus is ever opened. We run the institution\'s complete digital marketing: search, paid campaigns, brand communications and the admission funnel, instrumented end to end so you can see which channels produce enquiries that actually convert to enrolments.',
            'We also handle your social media in full. That means the content calendar, design and copy, scheduling and posting, community management and replies, campaign creative, and monthly reporting across every platform your institution is on. Your team stops chasing posts between teaching commitments, and the channels get run to a plan instead of in bursts around admission season.',
            'The same infrastructure keeps alumni reachable. They are the group most institutions under-use, and the one most likely to send the next cohort of students and recruiters.',
        ],
        'ai'    => 'Campaign spend is optimised against enrolment, not clicks: models score which enquiry sources actually convert, and creative and bidding follow. Chat assistants qualify enquiries before they reach your counselling team.',
        'panel' => [
            'heading' => 'What this covers',
            'items'   => [
                'End-to-end social media management for every platform',
                'Content calendar, creative, copy and scheduling',
                'Community management and response handling',
                'Search engine optimisation',
                'Qualified lead generation and paid campaigns',
                'Brand communications strategy',
                'Admission campaign funnel management',
                'Alumni engagement and management',
                'Monthly performance reporting',
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
      <h2>Delivered as a service, not a handover</h2>
    </div>
    <div class="grid grid-3">
      <div>
        <h3>We start with the people using it</h3>
        <p>Discovery happens on campus, with the staff who run the process today,
           not from a requirements document written elsewhere.</p>
      </div>
      <div>
        <h3>We run it, so you don't have to</h3>
        <p>Hosting, security patching, backups and updates are ours. There is no
           server in a cupboard on campus and no upgrade project every few years.</p>
      </div>
      <div>
        <h3>Your data stays yours</h3>
        <p>Everything your institution puts into the platform can be exported in
           full, at any time. Subscribing to a service should not mean losing
           control of your records.</p>
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
