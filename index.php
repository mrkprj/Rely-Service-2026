<?php
$page_title       = 'Rely Service';
$page_description = 'Rely Service partners with colleges and universities in Mumbai and across India on campus technology, student employability programmes and incubation support.';
$active           = '';
require __DIR__ . '/includes/header.php';

/* ---------------------------------------------------------------------------
   CLIENT LIST.
   'name' is used as the image alt text, so it must be the institution's real
   name. 'w'/'h' are the display size in CSS pixels; the file in
   assets/img/clients/ is twice that for retina screens.

   To add a client: put the logo through the same normalisation (see README),
   then add a row here. Order is the order they appear in the marquee.

   Originals are kept untouched in assets/img/clients-src/.
   --------------------------------------------------------------------------- */
$clients = [
    ['name' => "SNDT Women's University",                'logo' => 'sndt-womens-university.png',      'w' => 53,  'h' => 38],
    ['name' => 'WISE, SNDTWU Incubation Centre',        'logo' => 'wise-sndtwu-incubation.png',      'w' => 46,  'h' => 46],
    ['name' => 'The Kandivali Education Society',        'logo' => 'kandivali-education-society.png', 'w' => 61,  'h' => 30],
    ['name' => "KES' Shri J. H. Patel Law College",      'logo' => 'jh-patel-law-college.png',        'w' => 52,  'h' => 46],
    ['name' => 'Thakur Trusts',                          'logo' => 'thakur-trusts.png',               'w' => 46,  'h' => 46],
    ['name' => 'Xaviers Institute of Business Management Studies', 'logo' => 'xibms.png',             'w' => 121, 'h' => 30],
    ['name' => 'Indian Institutes of Executive Learning','logo' => 'iiel.png',                        'w' => 46,  'h' => 46],
    ['name' => 'Aditya School of Business Management',   'logo' => 'asbm.png',                        'w' => 46,  'h' => 46],
    ['name' => 'Alard',                                  'logo' => 'alard.png',                       'w' => 40,  'h' => 52],
    ['name' => 'Montfort Junior College, Dadar',         'logo' => 'montfort-junior-college.png',     'w' => 46,  'h' => 46],
    ['name' => 'US Institute of 3D Technology',          'logo' => 'us-institute-3d-technology.png',  'w' => 41,  'h' => 52],
    ['name' => 'Aerodynamiks Academy',                   'logo' => 'aerodynamiks-academy.png',        'w' => 46,  'h' => 46],
    ['name' => 'Study Hour',                             'logo' => 'study-hour.png',                  'w' => 46,  'h' => 46],
    ['name' => 'Luxuria',                                'logo' => 'luxuria.png',                     'w' => 90,  'h' => 30],
];
?>

<!-- 1. HERO ============================================================== -->
<section class="hero">
  <div class="container hero-grid">
    <div class="hero-copy">
      <div class="wave" aria-hidden="true">
        <span></span><span></span><span></span><span></span><span></span>
      </div>
      <span class="eyebrow">Mumbai · Serving institutions across India</span>
      <h1>One partner for campus <span class="gradient-text">technology</span>,
          student readiness and enterprise.</h1>
      <p class="lead">
        Rely Service works alongside graduate and post-graduate institutions to modernise
        the systems they run on, prepare students for the corporate world, and turn
        campus ideas into working ventures.
      </p>
      <div class="btn-row">
        <a class="btn btn-primary" href="/contact">Talk to our team</a>
        <a class="btn btn-outline" href="#what-we-do">See what we do</a>
      </div>
      <p class="hero-note">Delivered on campus, across the academic year</p>
    </div>

    <?php /* The impact-numbers block that sat here has been removed until the
             figures are verified. The source documents disagreed with each
             other. Verified figures now belong in a stats band: see
             includes/stats-band.php and the service pages. */ ?>
    <div class="hero-panel">
      <div class="wave" aria-hidden="true">
        <span></span><span></span><span></span><span></span><span></span>
      </div>
      <h2 class="hero-panel-title">What we're asked for most</h2>
      <ul class="feature-list">
        <li><strong>Campus to Corporate</strong>: soft skills, aptitude, technical training and placement support</li>
        <li><strong>Educational ERP</strong>: a hosted platform for admissions, records, examinations and the placement cell</li>
        <li><strong>Accreditation &amp; Compliance</strong>: NAAC, NBA, NIRF and AICTE readiness</li>
        <li><strong>Incubation</strong>: establishing and running institutional incubation centres</li>
      </ul>
    </div>
  </div>
</section>

<!-- 2. WHAT WE DO ======================================================== -->
<section class="section" id="what-we-do">
  <div class="container">
    <div class="section-head center">
      <div class="wave wave--center" aria-hidden="true">
        <span></span><span></span><span></span><span></span><span></span>
      </div>
      <span class="eyebrow">What we do</span>
      <h2>Three practices, built around the same institution</h2>
      <p class="lead">Engage any one of them on its own, or all three as a single roadmap.</p>
    </div>

    <div class="grid grid-3">
      <article class="card">
        <span class="card-icon" aria-hidden="true">01</span>
        <h3>Technology Solutions</h3>
        <p>A hosted ERP platform, admission and student portals, accreditation
           evidence systems, and complete digital marketing including social media.</p>
        <a class="link-arrow" href="/technology-solutions">Explore technology</a>
      </article>

      <article class="card">
        <span class="card-icon" aria-hidden="true">02</span>
        <h3>Student Success</h3>
        <p>Our campus-to-corporate programme: communication and aptitude, technical
           training by industry professionals, interviews, internships and placement.</p>
        <a class="link-arrow" href="/student-success">Explore student success</a>
      </article>

      <article class="card">
        <span class="card-icon" aria-hidden="true">03</span>
        <h3>Incubation &amp; Entrepreneurship</h3>
        <p>We help institutions establish their own incubation centres, and support
           every part of running one: legal, financial, funding and mentors.</p>
        <a class="link-arrow" href="/incubation">Explore incubation</a>
      </article>
    </div>
  </div>
</section>

<!-- 3. OUR CLIENTS ======================================================= -->
<section class="section section--tint section--tight">
  <div class="container">
    <div class="section-head center">
      <span class="eyebrow">Our clients</span>
      <h2>Trusted by institutions that take outcomes seriously</h2>
    </div>

    <?php require __DIR__ . '/includes/client-marquee.php'; ?>
  </div>
</section>

<!-- 4. TECHNOLOGY SOLUTIONS ============================================== -->
<section class="section">
  <div class="container pillar-grid">
    <div>
      <span class="eyebrow">Technology Solutions</span>
      <h2>Systems that hold up on the busiest week of the academic year</h2>
      <p class="lead">
        Admissions, attendance, examinations, placements, accreditation reporting:
        the work an institution runs on. We build and integrate the platforms behind it.
      </p>
      <div class="btn-row">
        <a class="btn btn-dark" href="/technology-solutions">See technology solutions</a>
      </div>
    </div>
    <div class="panel">
      <h3>Where we typically start</h3>
      <ul class="feature-list">
        <li><strong>Educational ERP</strong>: hosted SaaS for admissions, records, examinations, placement cell</li>
        <li><strong>IT &amp; Digital Transformation</strong>: portals, apps, LMS, AI assistants</li>
        <li><strong>Accreditation &amp; Compliance</strong>: NAAC, NBA, NIRF, AICTE readiness</li>
        <li><strong>Digital Growth</strong>: complete digital marketing, including running your social media</li>
      </ul>
    </div>
  </div>
</section>

<!-- 5. STUDENT SUCCESS =================================================== -->
<section class="section section--tint">
  <div class="container pillar-grid">
    <div class="panel" style="background:#fff">
      <h3>The campus-to-corporate arc</h3>
      <ol class="numbered">
        <li><strong>Skills</strong><br>Communication and quantitative aptitude: what students are screened on first.</li>
        <li><strong>Employability</strong><br>CVs, group discussions, mock interviews and recruitment counselling.</li>
        <li><strong>Industry Readiness</strong><br>Stream-specific technical training from practising professionals.</li>
        <li><strong>Career Exposure</strong><br>Domain internships from 4 to 24 weeks, and end-to-end placement support.</li>
      </ol>
    </div>
    <div>
      <span class="eyebrow">Student Success</span>
      <h2>Students who arrive at placement week already prepared</h2>
      <p class="lead">
        A structured programme delivered on campus across the academic year, not a
        two-day workshop before the drives begin.
      </p>
      <div class="btn-row">
        <a class="btn btn-dark" href="/student-success">See student success</a>
      </div>
    </div>
  </div>
</section>

<!-- 6. INCUBATION ======================================================== -->
<section class="section">
  <div class="container pillar-grid">
    <div>
      <span class="eyebrow">Incubation &amp; Entrepreneurship</span>
      <h2>Your incubation centre, built properly and kept running</h2>
      <p class="lead">
        We set up incubation centres for institutions and support every aspect of
        their working: legal, financial, funding, mentors and operations. You own
        the centre; we bring the expertise to run it well.
      </p>
      <div class="btn-row">
        <a class="btn btn-dark" href="/incubation">See incubation</a>
      </div>
    </div>
    <div class="panel">
      <h3>How we support your incubation centre</h3>
      <ul class="feature-list">
        <li><strong>Setting Up the Centre</strong>: structure, policy, intake process, infrastructure</li>
        <li><strong>Legal &amp; Governance</strong>: IP policy, agreements, compliance, oversight</li>
        <li><strong>Funding &amp; Finance</strong>: grants, seed routes, budgeting, investor readiness</li>
        <li><strong>Mentors &amp; Operations</strong>: mentor network, programmes, day-to-day running</li>
      </ul>
    </div>
  </div>
</section>

<!-- 7. WHY RELY SERVICE ================================================== -->
<section class="section section--ink">
  <div class="container">
    <div class="section-head center">
      <span class="eyebrow">Why Rely Service</span>
      <h2>Why institutions keep us on</h2>
    </div>

    <div class="grid grid-4">
      <div>
        <h3>Education is all we do</h3>
        <p>We aren't a generalist IT vendor with an education brochure. Campuses are
           the only environment we work in.</p>
      </div>
      <div>
        <h3>Technology and training together</h3>
        <p>The same partner that builds your placement portal also runs the programme
           that fills it. Nothing falls between vendors.</p>
      </div>
      <div>
        <h3>Delivered on campus</h3>
        <p>Our team works on site through the academic calendar, not over email from
           a distance.</p>
      </div>
      <div>
        <h3>Trainers who work in industry</h3>
        <p>Technical training is delivered by practising professionals, so what
           students learn is what employers are currently hiring for.</p>
      </div>
    </div>
  </div>
</section>

<!-- 8. FINAL CTA ========================================================= -->
<section class="cta-band">
  <div class="container">
    <h2>Let's talk about your institution</h2>
    <p>Tell us what you're trying to fix this academic year. We'll tell you honestly
       whether we're the right partner for it.</p>
    <div class="btn-row">
      <a class="btn btn-primary" href="/contact">Send an enquiry</a>
      <a class="btn btn-outline" href="tel:<?= e(company_phone_href()) ?>">Call <?= e(COMPANY_PHONE) ?></a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
