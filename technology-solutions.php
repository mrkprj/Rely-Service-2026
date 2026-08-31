<?php
$page_title       = 'Technology Solutions';
$page_description = 'Digital platforms, campus and academic systems, AI automation and custom software built for educational institutions by Rely Service, Mumbai.';
$active           = 'technology';
require __DIR__ . '/includes/header.php';

/* TODO: replace all placeholder copy below with real service descriptions. */
$sections = [
    [
        'id'    => 'digital-platforms',
        'title' => 'Digital Platforms',
        'lead'  => 'The public and student-facing face of the institution — built to be fast, accessible and easy for your team to maintain.',
        'body'  => [
            'Most institutional websites are inherited from a vendor who has since moved on. We rebuild them as platforms your own staff can run: clear structure, working search, admissions journeys that don\'t lose applicants halfway through.',
            'Everything is built mobile-first, because that is how students, parents and recruiters will actually open it.',
        ],
        'panel' => [
            'heading' => 'Typically includes',
            'items'   => [
                'Institutional website and department microsites',
                'Admissions and enquiry journeys',
                'Student, faculty and alumni portals',
                'Placement and recruiter-facing portals',
                'Event, conference and accreditation microsites',
            ],
        ],
    ],
    [
        'id'    => 'campus-systems',
        'title' => 'Campus & Academic Systems',
        'lead'  => 'The operational backbone: admissions to attendance to examinations to reporting.',
        'body'  => [
            'We implement, integrate and support the systems an institution runs on day to day — and just as often, we make existing systems talk to each other so data stops being re-keyed between departments.',
            'Accreditation and compliance reporting is designed in from the start, not assembled by hand the week before a visit.',
        ],
        'panel' => [
            'heading' => 'Typically includes',
            'items'   => [
                'Academic ERP implementation and integration',
                'Learning management systems',
                'Examination, results and records management',
                'Attendance and timetabling',
                'NAAC / NBA / AICTE reporting support',
            ],
        ],
    ],
    [
        'id'    => 'ai-automation',
        'title' => 'AI & Automation',
        'lead'  => 'Applied where it removes real administrative load — not bolted on for the brochure.',
        'body'  => [
            'The highest-value AI work on a campus is unglamorous: answering the same admissions questions a thousand times, drafting reports from data that already exists, sorting documents, flagging students who are drifting before the term ends.',
            'We start from a specific bottleneck your staff can name, and we are candid when a simpler automation would do the job better than a model.',
        ],
        'panel' => [
            'heading' => 'Typically includes',
            'items'   => [
                'Admissions and student support assistants',
                'Document processing and verification workflows',
                'Automated academic and compliance reporting',
                'Early-warning analytics for at-risk students',
                'Staff training on responsible AI use',
            ],
        ],
    ],
    [
        'id'    => 'custom-technology',
        'title' => 'Custom Technology',
        'lead'  => 'For the processes that are genuinely yours, where off-the-shelf software has never quite fit.',
        'body'  => [
            'Every institution has two or three workflows that no product on the market matches — a scholarship process, an industry-partnership tracker, a research-grant pipeline. Those are worth building properly.',
            'We build them as maintainable systems with documentation and handover, so you are not permanently dependent on us to change a form field.',
        ],
        'panel' => [
            'heading' => 'How we work',
            'items'   => [
                'Discovery on campus with the people who use the process',
                'Prototype reviewed before full build begins',
                'Built on mainstream, well-supported technology',
                'Documentation and staff handover included',
                'Support and enhancement after go-live',
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
      Platforms, academic systems, automation and custom software — delivered by a team
      that works inside educational institutions all year, not just at procurement time.
    </p>
  </div>
</section>

<?php require __DIR__ . '/includes/pillar-sections.php'; ?>

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
