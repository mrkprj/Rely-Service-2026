<?php
$page_title       = 'Student Success';
$page_description = 'Rely Service\'s campus-to-corporate programme: soft skills, quantitative aptitude, stream-specific technical training, interview preparation and internships for graduate and post-graduate institutes.';
$active           = 'student';
require __DIR__ . '/includes/header.php';

/* Content drawn from Content/About Rely Service.pdf and the Master Training &
   Placement deck. Specific figures are deliberately omitted until verified. */
$sections = [
    [
        'id'    => 'skills',
        'title' => 'Skills',
        'lead'  => 'Communication and aptitude first: the two things students are screened on before anyone reads their marksheet.',
        'body'  => [
            'Soft skills are usually taught on campus at a level that is fine for college and insufficient for a workplace. We start by rebuilding them properly: spoken and written communication, email etiquette, listening, and the confidence to hold a room.',
            'Quantitative aptitude runs alongside it, because most large recruiters gate the entire process behind an aptitude test. Students practise on the kinds of assessments they will actually sit.',
        ],
        'ai'    => 'Aptitude practice adapts to the individual: the system tracks which question types a student keeps losing marks on and weights their next set towards those, so weak areas get the repetitions instead of the whole cohort repeating the same paper.',
        'panel' => [
            'heading' => 'Covered in this module',
            'items'   => [
                'Communication skills, written and spoken',
                'Quantitative aptitude and reasoning',
                'Email and professional correspondence',
                'Public speaking and overcoming stage fear',
                'Personality development and work ethics',
                'Time, stress and interpersonal management',
            ],
        ],
    ],
    [
        'id'    => 'employability',
        'title' => 'Employability',
        'lead'  => 'Turning capable students into candidates who convert in the room.',
        'body'  => [
            'Plenty of students who can do the job still lose the offer at the interview. This module works on that gap: how they present on paper, how they hold up in a group discussion, and how they handle a panel that has forty other candidates to see that day.',
            'Mock group discussions and interviews are run to the standard of the recruiters who actually visit your campus, with individual feedback rather than a single group debrief.',
        ],
        'ai'    => 'AI reviews a CV against the roles a student is actually targeting and returns specific rewrites, and recorded mock interviews are analysed for pace, filler words and structure so feedback is concrete rather than impressionistic.',
        'panel' => [
            'heading' => 'Covered in this module',
            'items'   => [
                'CV writing and LinkedIn profile creation',
                'Group discussion practice and feedback',
                'Mock interviews: HR, technical and panel',
                'Interview technique and recruitment counselling',
                'Negotiation and professional etiquette',
            ],
        ],
    ],
    [
        'id'    => 'industry-readiness',
        'title' => 'Industry Readiness',
        'lead'  => 'Stream-specific technical training, taught by people who work in the field.',
        'body'  => [
            'Syllabi update slowly; industry does not. This module closes the distance with hands-on training in the tools and technologies each stream is actually hiring for, taught by practising professionals rather than from a textbook.',
            'The catalogue is deep and stream-specific: Data Science, IoT, Robotics, AI and ML, cloud, cyber security and full-stack for engineering and polytechnic; AutoCAD, SolidWorks, CATIA and CNC for mechanical; VLSI, PLC/SCADA, embedded systems and PCB design for electrical; STAAD Pro, Revit and Primavera for civil; digital marketing, business analytics and ERP for management; clinical research, GMP and pharmaceutical data for pharma; SEO, design and digital content for mass media.',
        ],
        'ai'    => 'AI and Machine Learning are taught as part of the technical catalogue across streams, alongside data science, cloud and cyber security, so students enter the market fluent in the tools employers are hiring for now.',
        'panel' => [
            'heading' => 'Streams we train',
            'items'   => [
                'Engineering and Polytechnic: IT, mechanical, electrical, civil',
                'Management: marketing, analytics, operations',
                'Microbiology and Pharmacy',
                'Mass Media',
                'Nursing and Hospitality',
                'Faculty development programmes to upskill teaching staff',
            ],
        ],
    ],
    [
        'id'    => 'career-exposure',
        'title' => 'Career Exposure',
        'lead'  => 'Internships, on-the-job training and mentors who have done the job.',
        'body'  => [
            'Training only goes so far without exposure. Students are placed into internships in their own domain, running from four weeks to six months depending on the course, with partners spanning startups, MSMEs and multinationals.',
            'On-the-job training bridges what remains between theory and practice, and mentorship comes from professionals working in industry, including at the global technology firms most students only read about.',
        ],
        'ai'    => 'Predictive career guidance maps a student\'s academic record, skills and interests against real hiring patterns to surface roles and sectors they had not considered, before internship placement rather than after.',
        'panel' => [
            'heading' => 'What students get',
            'items'   => [
                'Domain internships, 4 to 24 weeks',
                'On-the-job training with partner organisations',
                'Industry mentorship from practising professionals',
                'End-to-end placement support',
                'Placements in India and internationally',
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
      A structured programme delivered on your campus across the academic year:
      communication and aptitude, stream-specific technical training by industry
      professionals, interview preparation, and internships that lead somewhere.
    </p>
  </div>
</section>

<div class="section section--ink section--tight">
  <div class="container">
    <div class="section-head center">
      <span class="eyebrow">Campus to Corporate</span>
      <h2>The programme in numbers</h2>
    </div>
    <?php
      /* TODO: REPLACE the rows marked 'pending' with verified figures.
         Sources disagreed (25,000 vs 15,000 trained; 24,500 vs 14,500 placed;
         8.5 vs 5.5 LPA average), so nothing contested is presented as fact. */
      $stats = [
        ['value' => '25000', 'suffix' => '+', 'caption' => 'Students trained',    'pending' => true],
        ['value' => '24500', 'suffix' => '+', 'caption' => 'Students placed',     'pending' => true],
        ['value' => '250',   'suffix' => '+', 'caption' => 'Trainers on our panel'],
        ['value' => '24',    'prefix' => '₹', 'suffix' => ' LPA', 'caption' => 'Highest package offered'],
      ];
      require __DIR__ . '/includes/stats-band.php';
    ?>
  </div>
</div>

<?php require __DIR__ . '/includes/pillar-sections.php'; ?>

<section class="section section--tint">
  <div class="container">
    <div class="section-head center">
      <span class="eyebrow">Our method</span>
      <h2>Four steps, in this order, for a reason</h2>
      <p class="lead">
        Technical training lands only once a student can communicate and clear an
        aptitude round. We build in the sequence that placement actually rewards.
      </p>
    </div>
    <div class="grid grid-4">
      <div class="card">
        <span class="card-icon" aria-hidden="true">01</span>
        <h3>Master communication</h3>
        <p>The skill every subsequent step depends on, and the one most commonly
           under-taught on campus.</p>
      </div>
      <div class="card">
        <span class="card-icon" aria-hidden="true">02</span>
        <h3>Aptitude preparation</h3>
        <p>Because most large recruiters gate the entire process behind a test
           before a human reads anything.</p>
      </div>
      <div class="card">
        <span class="card-icon" aria-hidden="true">03</span>
        <h3>Technical training</h3>
        <p>Industry-level, in the student's own domain, taught by people currently
           working in it.</p>
      </div>
      <div class="card">
        <span class="card-icon" aria-hidden="true">04</span>
        <h3>Interview preparation</h3>
        <p>Mock rounds with industry experts, then mentorship from professionals at
           leading global technology firms.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container pillar-grid">
    <div>
      <span class="eyebrow">How it runs</span>
      <h2>Built around your academic calendar</h2>
      <p class="lead">
        Sessions run on campus so students don't have to travel, and are scheduled
        around teaching and examinations rather than competing with them.
      </p>
      <div class="btn-row">
        <a class="btn btn-dark" href="/contact">Request a programme outline</a>
      </div>
    </div>
    <div class="panel">
      <h4>Programme shape</h4>
      <ul class="feature-list">
        <li><strong>Training</strong>: typically weekends, 2 to 4 hours per session</li>
        <li><strong>Duration</strong>: 5 to 18 weeks per skill set</li>
        <li><strong>Internships</strong>: 4 to 24 weeks, full-time, in domain</li>
        <li><strong>Location</strong>: delivered at your campus</li>
        <li><strong>Faculty</strong>: practising industry professionals</li>
      </ul>
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
