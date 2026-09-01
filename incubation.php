<?php
$page_title       = 'Incubation & Entrepreneurship';
$page_description = 'Rely Service supports campus entrepreneurship: on-campus training, venture mentoring, incubation cell setup, and access to industry, mentors and funding.';
$active           = 'incubation';
require __DIR__ . '/includes/header.php';

/* Sections reframed around what Rely Service actually delivers. The
   entrepreneurship curriculum below is taken from the Management training
   catalogue in the T&P deck; the rest is written as capability, without
   invented case studies, venture names or figures. */
$sections = [
    [
        'id'    => 'entrepreneurship-training',
        'title' => 'Entrepreneurship Training',
        'lead'  => 'A working founder\'s curriculum, delivered on campus alongside the degree.',
        'body'  => [
            'Most students who want to start something have never been taught the mechanics of it. We run structured training on campus that covers the actual craft: validating an idea before building it, mapping a business model, defining a minimum viable product, pricing, and understanding the metrics that tell you whether any of it is working.',
            'It is taught the same way our technical training is — by people who have built and run businesses, not from a syllabus. Students who go on to start nothing still leave with commercial literacy that serves them in any role.',
        ],
        'panel' => [
            'heading' => 'What we teach',
            'items'   => [
                'Idea validation and customer discovery',
                'Business Model Canvas and business metrics',
                'Minimum viable product and product design',
                'Value pricing and business models',
                'Intellectual property — protect and profit',
                'Seed fundraising fundamentals',
                'Personal branding and product consulting',
            ],
        ],
    ],
    [
        'id'    => 'venture-mentoring',
        'title' => 'Venture Mentoring',
        'lead'  => 'Hands-on guidance for the student teams actually building something.',
        'body'  => [
            'Training gets a cohort to the starting line; a venture needs someone in the room as decisions get made. We mentor individual student teams through the awkward middle — the pivot after the first ten customer conversations, the co-founder disagreement, the decision to stop building a feature nobody asked for.',
            'Mentoring runs to a schedule with checkpoints rather than an open door, because founders make faster progress against a deadline than against goodwill. Teams that aren\'t working get told so early, which is kinder than letting them drift for a year.',
        ],
        'panel' => [
            'heading' => 'How mentoring runs',
            'items'   => [
                'Regular sessions with defined checkpoints',
                'Mentors drawn from industry and practising founders',
                'Support through prototyping and first customers',
                'Honest assessment — including when to stop',
                'Preparation for pitches, demo days and competitions',
            ],
        ],
    ],
    [
        'id'    => 'incubation-cell',
        'title' => 'Incubation Cell Setup',
        'lead'  => 'Helping institutions build incubation that keeps running after the launch event.',
        'body'  => [
            'A great many campus incubation cells are inaugurated with enthusiasm and quiet within two years. What is usually missing is not funding or space but structure: how ventures are selected, what support they are actually entitled to, who is accountable, and how any of it is measured.',
            'We help institutions design and stand that up — the process, the selection criteria, the mentor network, the reporting — and we work alongside existing centres too. We are a delivery partner to WISE, the incubation centre at SNDT Women\'s University.',
            /* TODO: CONFIRM the exact wording describing the WISE partnership,
               and whether SNDTWU is happy to be named in this way. */
        ],
        'panel' => [
            'heading' => 'What we help set up',
            'items'   => [
                'Incubation structure, policy and governance',
                'Venture selection and intake process',
                'Mentor network recruitment and management',
                'Programme calendar and cohort design',
                'Performance tracking and reporting',
                'Support for existing centres that have stalled',
            ],
        ],
    ],
    [
        'id'    => 'industry-funding',
        'title' => 'Industry & Funding Access',
        'lead'  => 'The connections a campus venture cannot make on its own.',
        'body'  => [
            'A student venture\'s hardest constraint is usually reach: no route to a first corporate customer, no introduction to a mentor who has solved this exact problem, no idea which grant or scheme it qualifies for.',
            'We open our corporate and institutional network to campus ventures — the same relationships that place students into internships and jobs — and prepare founders for the conversations that follow. Investor readiness is treated as a skill to be taught, not a pitch day to be survived.',
        ],
        'panel' => [
            'heading' => 'What this opens up',
            'items'   => [
                'Introductions to industry and corporate partners',
                'Mentor and practising-founder network',
                'Guidance on grants, seed schemes and funding routes',
                'Investor readiness and pitch preparation',
                'Alumni founder connections',
            ],
        ],
    ],
];
?>

<section class="page-hero">
  <div class="container">
    <p class="breadcrumb"><a href="/">Home</a> <span aria-hidden="true">/</span> Incubation &amp; Entrepreneurship</p>
    <span class="eyebrow">Incubation &amp; Entrepreneurship</span>
    <h1>Campus entrepreneurship that produces companies, not just competitions</h1>
    <p class="lead">
      We train student founders, mentor the ventures worth backing, help institutions
      build incubation that lasts, and open the industry and funding doors a campus
      team cannot open alone.
    </p>
  </div>
</section>

<?php require __DIR__ . '/includes/pillar-sections.php'; ?>

<section class="section section--ink">
  <div class="container">
    <div class="section-head center">
      <span class="eyebrow">For the institution</span>
      <h2>What a working incubation centre gives you</h2>
    </div>
    <div class="grid grid-3">
      <div>
        <h3>Accreditation and rankings</h3>
        <p>Documented entrepreneurship activity and outcomes that stand up in NAAC,
           NBA and NIRF submissions — where innovation and entrepreneurship carry
           explicit weight.</p>
      </div>
      <div>
        <h3>Industry relationships</h3>
        <p>Corporate partners engage far more readily with an active incubation centre
           than with a placement cell alone.</p>
      </div>
      <div>
        <h3>Student pull</h3>
        <p>Prospective students and their families increasingly ask what happens
           beyond placements. A visible venture pipeline is a real answer.</p>
      </div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container">
    <h2>Starting or restarting your incubation centre?</h2>
    <p>Whether it's a new cell, one that has gone quiet, or a cohort that needs mentoring, we can help you get it running properly.</p>
    <div class="btn-row">
      <a class="btn btn-primary" href="/contact">Talk to us about incubation</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
