<?php
$page_title       = 'Incubation & Entrepreneurship';
$page_description = 'Rely Service helps educational institutions establish and run their own incubation centres: setup, legal and governance, funding, mentor networks and day-to-day operations.';
$active           = 'incubation';
require __DIR__ . '/includes/header.php';

/* The client here is the INSTITUTION, not the student venture. Rely Service
   sets up and supports the running of incubation centres that the institution
   owns outright: no co-ownership, no equity. Keep that framing throughout.

   The entrepreneurship curriculum under 'mentors-operations' is real, taken
   from the Management stream of the T&P deck. Nothing else is invented as a
   case study or figure. */
$sections = [
    [
        'id'    => 'setting-up',
        'title' => 'Setting Up the Centre',
        'lead'  => 'From a decision at management level to a centre that is open, staffed and taking its first cohort.',
        'body'  => [
            'Establishing an incubation centre involves a great deal more than allocating a room and announcing it. It needs a defined purpose, an intake process, a support model that ventures are genuinely entitled to, and someone accountable for outcomes. Institutions rarely have that expertise in-house, and it is not the kind of thing that is easily learnt on a first attempt.',
            'We bring it. We work with your management to design the centre around what your institution can realistically sustain (its streams, its student profile, its regional industry) and then set it up: structure, policy, process, infrastructure and the recognitions worth pursuing.',
        ],
        'ai'    => 'We benchmark your proposed centre against how comparable institutions have structured theirs, using AI to work through published incubation policies and annual reports far faster than a manual review would allow.',
        'panel' => [
            'heading' => 'What setup covers',
            'items'   => [
                'Feasibility and scoping with management',
                'Centre structure, charter and policy framework',
                'Venture intake and selection process',
                'Physical and digital infrastructure planning',
                'Staffing model and role definitions',
                'Recognition and empanelment routes worth pursuing',
            ],
        ],
    ],
    [
        'id'    => 'legal-governance',
        'title' => 'Legal & Governance',
        'lead'  => 'The framework that decides who owns what, settled properly at the start, not argued about later.',
        'body'  => [
            'The questions that damage campus incubation are almost always legal ones left unanswered: who owns the intellectual property a student developed using institutional resources, what the institution is entitled to if a venture succeeds, what happens when a founder graduates or leaves, and what the centre is liable for.',
            'We help you put that framework in place: the entity structure, the agreements, the IP and equity policy, and the governance that keeps the centre accountable to your management committee. Institutions that settle this early avoid the disputes that quietly close incubation centres down.',
        ],
        'ai'    => 'AI-assisted document review checks your IP, equity and incubatee agreements for the gaps that cause disputes later, and keeps the policy set current as regulation changes.',
        'panel' => [
            'heading' => 'What this covers',
            'items'   => [
                'Entity structure and registration guidance',
                'Intellectual property policy',
                'Equity and revenue-sharing frameworks',
                'Founder, incubatee and mentor agreements',
                'Statutory and regulatory compliance',
                'Governance, reporting lines and oversight',
            ],
        ],
    ],
    [
        'id'    => 'funding-finance',
        'title' => 'Funding & Finance',
        'lead'  => 'Money into the centre, and money into the ventures it backs: two different problems.',
        'body'  => [
            'An incubation centre has its own financial life: a budget, sustainability targets, and often grant or scheme funding it is eligible for and unaware of. Separately, the ventures inside it need access to seed capital, and student founders are rarely equipped to raise it.',
            'We work on both. For the centre, that means financial structure, budgeting and identifying the government schemes and institutional funding routes it can access. For the ventures, it means readiness: knowing what an investor will ask, and being able to answer.',
        ],
        'ai'    => 'Grant and scheme matching is automated: ventures are screened against central and state schemes they qualify for, so opportunities are not missed simply because nobody had time to read the eligibility criteria.',
        'panel' => [
            'heading' => 'What this covers',
            'items'   => [
                'Financial structure and budgeting for the centre',
                'Government grant and scheme identification',
                'Seed and early-stage funding routes for ventures',
                'Investor readiness and pitch preparation',
                'Financial controls and reporting',
                'Long-term sustainability planning',
            ],
        ],
    ],
    [
        'id'    => 'mentors-operations',
        'title' => 'Mentors & Operations',
        'lead'  => 'Everything involved in the centre actually running, week to week, after the inauguration.',
        'body'  => [
            'A great many campus incubation cells are opened with enthusiasm and are quiet within two years, not because the idea was wrong, but because nobody owned the running of it. Operations are where incubation succeeds or fails.',
            'We build and manage the mentor network, run the entrepreneurship programmes that feed the pipeline, structure the cohort calendar, connect ventures to our industry network, and keep the reporting your management committee needs. Where a centre already exists and has stalled, this is usually the part that needs rebuilding.',
        ],
        'ai'    => 'Mentor matching is data-driven rather than whoever is free, pairing ventures to expertise by sector and stage, and progress across the cohort is tracked so a team that has stopped moving is visible early.',
        'panel' => [
            'heading' => 'What this covers',
            'items'   => [
                'Mentor network recruitment and management',
                'Entrepreneurship training: validation, business models, MVP, pricing, IP',
                'Cohort programme design and calendar',
                'Ongoing mentoring for incubated ventures',
                'Industry and corporate introductions',
                'Demo days, showcases and competitions',
                'Performance tracking and management reporting',
            ],
        ],
    ],
];
?>

<section class="page-hero">
  <div class="container">
    <p class="breadcrumb"><a href="/">Home</a> <span aria-hidden="true">/</span> Incubation &amp; Entrepreneurship</p>
    <span class="eyebrow">Incubation &amp; Entrepreneurship</span>
    <h1>We help you build your incubation centre, and keep it running</h1>
    <p class="lead">
      Rely Service sets up incubation centres for educational institutions and supports
      every part of their working: legal, financial, funding, mentors and day-to-day
      operations. The centre is yours. We bring the expertise to run it well.
    </p>
  </div>
</section>

<div class="section section--ink section--tight">
  <div class="container">
    <div class="section-head center">
      <span class="eyebrow">Incubation support</span>
      <h2>What we bring to a centre</h2>
    </div>
    <?php
      /* TODO: REPLACE the rows marked 'pending' with verified figures. */
      $stats = [
        ['value' => '4',   'suffix' => '',  'caption' => 'Areas covered: setup, legal, funding, operations'],
        ['value' => '300', 'suffix' => '+', 'caption' => 'MSME, startup and global partners', 'pending' => true],
        ['value' => '45',  'suffix' => '',  'caption' => 'Corporate tie-ups',                 'pending' => true],
        ['value' => '0',   'suffix' => '%', 'caption' => 'Equity we take in your ventures'],
      ];
      require __DIR__ . '/includes/stats-band.php';
    ?>
  </div>
</div>

<?php require __DIR__ . '/includes/pillar-sections.php'; ?>

<section class="section section--tint">
  <div class="container pillar-grid">
    <div>
      <span class="eyebrow">How we engage</span>
      <h2>Your centre, your name, your ownership</h2>
      <p class="lead">
        We are a service partner, not a stakeholder. We take no ownership in the
        incubation centres we help establish and no equity in the ventures they
        support.
      </p>
      <p>
        That matters more than it might sound. An incubation centre is part of an
        institution's identity and its accreditation record, and its relationships
        with founders depend on there being no ambiguity about who is entitled to
        what. We are engaged to build the capability and support its operation. The
        centre belongs to you throughout.
      </p>
      <div class="btn-row">
        <a class="btn btn-dark" href="/contact">Discuss an engagement</a>
      </div>
    </div>
    <div class="panel" style="background:#fff">
      <h4>Where institutions bring us in</h4>
      <ul class="feature-list">
        <li><strong>From scratch</strong>: no centre yet, starting with the decision to build one</li>
        <li><strong>Newly established</strong>: a centre exists on paper and needs to become operational</li>
        <li><strong>Stalled</strong>: inaugurated, then quiet; usually an operations and mentor problem</li>
        <li><strong>Running, needs depth</strong>: an active centre wanting stronger legal, funding or industry footing</li>
      </ul>
      <!-- TODO: CONFIRM wording, and that SNDTWU is content to be named here.
           Described as a delivery partner supporting the centre, not running it. -->
      <p style="margin-top:1.25rem;font-size:var(--step--1);color:var(--muted)">
        We work as a delivery partner supporting WISE, the incubation centre at
        SNDT Women's University.
      </p>
    </div>
  </div>
</section>

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
           NBA and NIRF submissions, where innovation and entrepreneurship carry
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
    <h2>Building or reviving an incubation centre?</h2>
    <p>Whether you're starting from a blank page or restarting a cell that has gone quiet, we can help you get it running properly.</p>
    <div class="btn-row">
      <a class="btn btn-primary" href="/contact">Talk to us about incubation</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
