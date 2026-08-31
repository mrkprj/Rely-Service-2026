<?php
$page_title       = 'Student Success';
$page_description = 'Rely Service\'s campus-to-corporate programme for graduate and post-graduate institutes: skills, employability, industry readiness and career exposure.';
$active           = 'student';
require __DIR__ . '/includes/header.php';

/* TODO: replace all placeholder copy below with your real programme details. */
$sections = [
    [
        'id'    => 'skills',
        'title' => 'Skills',
        'lead'  => 'The foundation employers screen on before they ever look at a degree.',
        'body'  => [
            'Communication, aptitude, reasoning and the technical fundamentals relevant to each stream — delivered as a structured programme across the academic year rather than a crash course before placement season.',
            'Students are assessed at entry so the cohort is taught at the right level, and progress is measured against that baseline instead of attendance alone.',
        ],
        'panel' => [
            'heading' => 'Covered in this module',
            'items'   => [
                'Spoken and written business communication',
                'Quantitative aptitude and logical reasoning',
                'Stream-relevant technical fundamentals',
                'Digital and workplace software literacy',
                'Entry and exit assessments with reporting',
            ],
        ],
    ],
    [
        'id'    => 'employability',
        'title' => 'Employability',
        'lead'  => 'Turning capable students into candidates who convert in the room.',
        'body'  => [
            'Plenty of students who can do the job still lose the offer at the interview. This module works on the gap: how they present themselves on paper, in a group discussion, and across a panel that has forty other candidates that day.',
            'Mock rounds are run to the standard of the recruiters who actually visit your campus, with individual feedback rather than a single group debrief.',
        ],
        'panel' => [
            'heading' => 'Covered in this module',
            'items'   => [
                'Resume and profile building, including LinkedIn',
                'Group discussion practice and feedback',
                'Mock interviews — HR, technical and panel',
                'Aptitude and assessment-platform practice',
                'Offer negotiation and professional etiquette',
            ],
        ],
    ],
    [
        'id'    => 'industry-readiness',
        'title' => 'Industry Readiness',
        'lead'  => 'What nobody teaches in the syllabus, and every employer expects on day one.',
        'body'  => [
            'The first ninety days of a job fail more graduates than the interview does. This module covers how work actually happens: teams, deadlines, escalation, feedback, documentation, and the tools a new joiner is assumed to already know.',
            'Delivered through simulations and live case work rather than lectures, so students practise the behaviour instead of hearing about it.',
        ],
        'panel' => [
            'heading' => 'Covered in this module',
            'items'   => [
                'Workplace behaviour, ethics and professionalism',
                'Working in teams and managing deadlines',
                'Industry tools and collaboration platforms',
                'Live case studies and simulations',
                'Domain orientation by sector',
            ],
        ],
    ],
    [
        'id'    => 'career-exposure',
        'title' => 'Career Exposure',
        'lead'  => 'Real contact with the industry students are about to enter.',
        'body'  => [
            'Training only goes so far without exposure. We bring practitioners onto campus, place students into live projects and internships, and open up the career paths most students have never heard of.',
            'For the institution, this also strengthens the recruiter relationships that placement outcomes ultimately depend on.',
        ],
        'panel' => [
            'heading' => 'Covered in this module',
            'items'   => [
                'Industry expert sessions and guest lectures',
                'Live projects with partner organisations',
                'Internship facilitation and tracking',
                'Career-path and role awareness workshops',
                'Recruiter engagement support for the placement cell',
            ],
        ],
    ],
];
?>

<section class="page-hero">
  <div class="container">
    <p class="breadcrumb"><a href="/">Home</a> <span aria-hidden="true">/</span> Student Success</p>
    <span class="eyebrow">Campus to Corporate</span>
    <h1>From classroom to offer letter, without the last-minute scramble</h1>
    <p class="lead">
      A year-long, on-campus programme for graduate and post-graduate institutes that
      builds skills, employability and industry readiness in the right order.
    </p>
  </div>
</section>

<?php require __DIR__ . '/includes/pillar-sections.php'; ?>

<section class="section section--tint">
  <div class="container">
    <div class="section-head center">
      <span class="eyebrow">How we run it</span>
      <h2>Built into the academic calendar</h2>
    </div>
    <div class="grid grid-4">
      <div class="card">
        <span class="card-icon" aria-hidden="true">01</span>
        <h3>Assess</h3>
        <p>Baseline the cohort so the programme is pitched at the students you have, not a generic batch.</p>
      </div>
      <div class="card">
        <span class="card-icon" aria-hidden="true">02</span>
        <h3>Plan</h3>
        <p>Agree a calendar with your placement cell that fits around academics and exams.</p>
      </div>
      <div class="card">
        <span class="card-icon" aria-hidden="true">03</span>
        <h3>Deliver</h3>
        <p>Trainers on campus through the year, with make-up sessions for students who fall behind.</p>
      </div>
      <div class="card">
        <span class="card-icon" aria-hidden="true">04</span>
        <h3>Report</h3>
        <p>Progress and placement-readiness reporting your management committee can act on.</p>
      </div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container">
    <h2>Planning next year's placement season?</h2>
    <p>The programmes that work are the ones that start early. Let's map yours to the academic calendar.</p>
    <div class="btn-row">
      <a class="btn btn-primary" href="/contact">Request a programme outline</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
