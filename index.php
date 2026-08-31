<?php
$page_title       = 'Rely Service';
$page_description = 'Rely Service partners with colleges and universities in Mumbai and across India on campus technology, student employability programmes and incubation support.';
$active           = '';
require __DIR__ . '/includes/header.php';

/* ---------------------------------------------------------------------------
   PLACEHOLDER CLIENT LIST. Replace each entry with a real institution.
   Drop logo files into /assets/img/clients/ and set the 'logo' key to the
   filename; leave 'logo' empty and the cell falls back to the name in text.
   --------------------------------------------------------------------------- */
$clients = [
    ['name' => 'Client Institute One',   'logo' => ''],
    ['name' => 'Client Institute Two',   'logo' => ''],
    ['name' => 'Client Institute Three', 'logo' => ''],
    ['name' => 'Client Institute Four',  'logo' => ''],
    ['name' => 'Client Institute Five',  'logo' => ''],
    ['name' => 'Client Institute Six',   'logo' => ''],
];
?>

<!-- 1. HERO ============================================================== -->
<section class="hero">
  <div class="container hero-grid">
    <div>
      <span class="eyebrow">Mumbai · Serving institutions across India</span>
      <h1>One partner for campus technology, student readiness and enterprise.</h1>
      <p class="lead">
        <!-- TODO: replace with your positioning sentence -->
        Rely Service works alongside graduate and post-graduate institutions to modernise
        their systems, prepare students for the corporate world, and turn campus ideas
        into working ventures.
      </p>
      <div class="btn-row">
        <a class="btn btn-primary" href="/contact">Talk to our team</a>
        <a class="btn btn-outline" href="#what-we-do">See what we do</a>
      </div>
    </div>

    <!-- TODO: replace with real, verifiable numbers. Delete this block if you
         don't have numbers yet — an empty claim is worse than no claim. -->
    <div class="hero-stats">
      <div class="stat"><span class="stat-num">00+</span><span class="stat-label">Institutions partnered</span></div>
      <div class="stat"><span class="stat-num">0,000</span><span class="stat-label">Students trained</span></div>
      <div class="stat"><span class="stat-num">00+</span><span class="stat-label">Platforms delivered</span></div>
      <div class="stat"><span class="stat-num">00</span><span class="stat-label">Years in education</span></div>
    </div>
  </div>
</section>

<!-- 2. WHAT WE DO ======================================================== -->
<section class="section" id="what-we-do">
  <div class="container">
    <div class="section-head center">
      <span class="eyebrow">What we do</span>
      <h2>Three practices, built around the same institution</h2>
      <p class="lead">Engage any one of them on its own, or all three as a single roadmap.</p>
    </div>

    <div class="grid grid-3">
      <article class="card">
        <span class="card-icon" aria-hidden="true">01</span>
        <h3>Technology Solutions</h3>
        <p>Digital platforms, academic and campus systems, AI-assisted workflows, and
           custom software built for how an institution actually runs.</p>
        <a class="link-arrow" href="/technology-solutions">Explore technology</a>
      </article>

      <article class="card">
        <span class="card-icon" aria-hidden="true">02</span>
        <h3>Student Success</h3>
        <p>Our campus-to-corporate programme: the skills, employability training and
           industry exposure that move students from classroom to offer letter.</p>
        <a class="link-arrow" href="/student-success">Explore student success</a>
      </article>

      <article class="card">
        <span class="card-icon" aria-hidden="true">03</span>
        <h3>Incubation &amp; Entrepreneurship</h3>
        <p>Setting up and running campus incubation — from first prototype to a
           launched venture with mentors, funding routes and industry contacts.</p>
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

    <ul class="logo-wall">
      <?php foreach ($clients as $client): ?>
        <li>
          <div class="logo-cell">
            <?php if ($client['logo']): ?>
              <img src="/assets/img/clients/<?= e($client['logo']) ?>" alt="<?= e($client['name']) ?>" loading="lazy">
            <?php else: ?>
              <span><?= e($client['name']) ?></span>
            <?php endif; ?>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- 4. TECHNOLOGY SOLUTIONS ============================================== -->
<section class="section">
  <div class="container pillar-grid">
    <div>
      <span class="eyebrow">Technology Solutions</span>
      <h2>Systems that hold up on the busiest week of the academic year</h2>
      <p class="lead">
        Admissions, attendance, examinations, placements, accreditation reporting —
        the work an institution runs on. We build and integrate the platforms behind it.
      </p>
      <div class="btn-row">
        <a class="btn btn-dark" href="/technology-solutions">See technology solutions</a>
      </div>
    </div>
    <div class="panel">
      <h4>Where we typically start</h4>
      <ul class="feature-list">
        <li><strong>Digital Platforms</strong> — websites, portals and student-facing apps</li>
        <li><strong>Campus &amp; Academic Systems</strong> — ERP, LMS, examination and records</li>
        <li><strong>AI &amp; Automation</strong> — reporting, support and repetitive admin work</li>
        <li><strong>Custom Technology</strong> — built when nothing off-the-shelf fits</li>
      </ul>
    </div>
  </div>
</section>

<!-- 5. STUDENT SUCCESS =================================================== -->
<section class="section section--tint">
  <div class="container pillar-grid">
    <div class="panel" style="background:#fff">
      <h4>The campus-to-corporate arc</h4>
      <ol class="numbered">
        <li><strong>Skills</strong><br>Communication, aptitude and the technical basics employers screen on.</li>
        <li><strong>Employability</strong><br>Resumes, group discussions, interviews, assessment practice.</li>
        <li><strong>Industry Readiness</strong><br>Workplace behaviour, tools and expectations from day one.</li>
        <li><strong>Career Exposure</strong><br>Industry sessions, live projects and real recruiter contact.</li>
      </ol>
    </div>
    <div>
      <span class="eyebrow">Student Success</span>
      <h2>Students who arrive at placement week already prepared</h2>
      <p class="lead">
        A structured programme delivered on campus across the academic year — not a
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
      <h2>From a campus idea to a company that can stand on its own</h2>
      <p class="lead">
        We help institutions set up incubation that works — structure, mentors,
        industry access and the discipline to take a venture past the pitch deck.
      </p>
      <div class="btn-row">
        <a class="btn btn-dark" href="/incubation">See incubation</a>
      </div>
    </div>
    <div class="panel">
      <h4>Four stages we support</h4>
      <ul class="feature-list">
        <li><strong>Build</strong> — idea validation, prototyping, first users</li>
        <li><strong>Launch</strong> — incorporation, go-to-market, early revenue</li>
        <li><strong>Connect</strong> — mentors, industry partners, investor readiness</li>
        <li><strong>Grow</strong> — scaling, funding routes, long-term support</li>
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
        <h3>Measured on outcomes</h3>
        <p>Placement numbers, system uptime, ventures launched. We report on what the
           management committee actually asks about.</p>
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
