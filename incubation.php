<?php
$page_title       = 'Incubation & Entrepreneurship';
$page_description = 'Rely Service helps educational institutions build and run campus incubation — from prototype to launched venture, with mentors, industry access and funding routes.';
$active           = 'incubation';
require __DIR__ . '/includes/header.php';

/* TODO: replace all placeholder copy below with your real incubation offering. */
$sections = [
    [
        'id'    => 'build',
        'title' => 'Build',
        'lead'  => 'Getting an idea to the point where it survives contact with a real user.',
        'body'  => [
            'Most campus ideas die somewhere between the pitch competition and the first prototype. This stage is about narrowing the idea, validating it with people who would actually pay, and building something small enough to test this term.',
            'Student founders work to short cycles with checkpoints, so weak ideas fail quickly and the promising ones get the attention.',
        ],
        'panel' => [
            'heading' => 'What we set up',
            'items'   => [
                'Idea validation and customer discovery workshops',
                'Prototyping and MVP support',
                'Structured build sprints with review checkpoints',
                'Access to tools, workspace and technical guidance',
            ],
        ],
    ],
    [
        'id'    => 'launch',
        'title' => 'Launch',
        'lead'  => 'The unglamorous work of turning a working prototype into a company.',
        'body'  => [
            'Incorporation, compliance, pricing, a first go-to-market plan and the first paying customers. This is where student founders most often need practical help rather than mentorship in the abstract.',
            'We bring in the legal, financial and operational guidance the campus usually cannot provide in-house.',
        ],
        'panel' => [
            'heading' => 'What we set up',
            'items'   => [
                'Incorporation, compliance and IP basics',
                'Business model and pricing support',
                'Go-to-market planning and first customers',
                'Branding, digital presence and launch assets',
            ],
        ],
    ],
    [
        'id'    => 'connect',
        'title' => 'Connect',
        'lead'  => 'A venture is only as strong as the network around it.',
        'body'  => [
            'We open the institution\'s incubation to practising founders, industry mentors, domain experts and early-stage investors — and put structure around those relationships so they outlast a single event.',
            'Investor readiness is treated as a skill to be taught, not a pitch day to be survived.',
        ],
        'panel' => [
            'heading' => 'What we set up',
            'items'   => [
                'Mentor network and structured mentoring cycles',
                'Industry and corporate partnerships',
                'Investor readiness and pitch preparation',
                'Demo days, cohort showcases and alumni founder links',
            ],
        ],
    ],
    [
        'id'    => 'grow',
        'title' => 'Grow',
        'lead'  => 'Support that continues after the founder graduates.',
        'body'  => [
            'The ventures worth counting are the ones still operating three years later. We help institutions build the ongoing support, funding pathways and alumni relationships that get them there.',
            'For the institution, this compounds: successful ventures become mentors, funders and recruiters for the next cohort.',
        ],
        'panel' => [
            'heading' => 'What we set up',
            'items'   => [
                'Scaling and operations guidance',
                'Grant, seed and funding pathway support',
                'Long-term alumni founder network',
                'Incubation performance tracking and reporting',
            ],
        ],
    ],
];
?>

<section class="page-hero">
  <div class="container">
    <p class="breadcrumb"><a href="/">Home</a> <span aria-hidden="true">/</span> Incubation &amp; Entrepreneurship</p>
    <span class="eyebrow">Incubation &amp; Entrepreneurship</span>
    <h1>Campus incubation that produces companies, not just competitions</h1>
    <p class="lead">
      We help institutions design, launch and run an incubation ecosystem — with the
      structure, mentors and industry access that carry a venture past the pitch deck.
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
        <p>Documented entrepreneurship activity and outcomes that stand up in NAAC, NBA and ranking submissions.</p>
      </div>
      <div>
        <h3>Industry relationships</h3>
        <p>Corporate partners engage far more readily with an active incubation centre than with a placement cell alone.</p>
      </div>
      <div>
        <h3>Student pull</h3>
        <p>Prospective students and their families increasingly ask what happens beyond placements.</p>
      </div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container">
    <h2>Starting or restarting your incubation centre?</h2>
    <p>Whether it's a new cell or one that has gone quiet, we can help you get it running properly.</p>
    <div class="btn-row">
      <a class="btn btn-primary" href="/contact">Talk to us about incubation</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
