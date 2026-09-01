/* Rely Service — the only JavaScript on the site.
   Mobile menu, header state, scroll reveals, jump-nav highlighting.
   Everything here is progressive enhancement: with JS disabled the site is
   fully readable and navigable, and nothing is hidden. */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* --- Mobile menu ------------------------------------------------------- */
  var toggle = document.querySelector('.nav-toggle');
  var nav    = document.getElementById('primary-nav');

  if (toggle && nav) {
    var setMenu = function (open) {
      toggle.setAttribute('aria-expanded', String(open));
      toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
      nav.classList.toggle('is-open', open);
    };

    toggle.addEventListener('click', function () {
      setMenu(toggle.getAttribute('aria-expanded') !== 'true');
    });

    // Submenu accordions (mobile only — the button is display:none on desktop).
    nav.querySelectorAll('.submenu-toggle').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var open    = btn.getAttribute('aria-expanded') === 'true';
        var submenu = btn.parentElement.querySelector('.submenu');
        btn.setAttribute('aria-expanded', String(!open));
        if (submenu) submenu.classList.toggle('is-open', !open);
      });
    });

    // Tapping a link closes the menu, including in-page anchors.
    nav.addEventListener('click', function (e) {
      if (e.target.closest('a')) setMenu(false);
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
        setMenu(false);
        toggle.focus();
      }
    });

    window.matchMedia('(min-width: 1001px)').addEventListener('change', function (e) {
      if (e.matches) setMenu(false);
    });
  }

  /* --- Header shadow once the page scrolls ------------------------------- */
  var header = document.getElementById('site-header');
  if (header) {
    var onScroll = function () {
      header.classList.toggle('is-stuck', window.scrollY > 8);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* --- Reveal on scroll --------------------------------------------------- */
  var revealables = document.querySelectorAll(
    '.section-head, .card, .stat, .panel, .pillar, .logo-wall li, .hero-copy, .footer-col'
  );

  if (!reduceMotion && 'IntersectionObserver' in window && revealables.length) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        io.unobserve(entry.target);
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.06 });

    revealables.forEach(function (el, i) {
      el.classList.add('reveal');
      // Stagger items inside the same grid so rows cascade rather than pop.
      var siblingIndex = Array.prototype.indexOf.call(el.parentElement.children, el);
      if (siblingIndex > 0 && siblingIndex < 4) {
        el.classList.add('reveal-delay-' + siblingIndex);
      }
      io.observe(el);
    });
  }

  /* --- Jump-nav: highlight the section you're reading --------------------- */
  var jumpLinks = document.querySelectorAll('.jump-nav a[href^="#"]');
  if (jumpLinks.length && 'IntersectionObserver' in window) {
    var byId = {};
    var targets = [];

    jumpLinks.forEach(function (link) {
      var el = document.getElementById(decodeURIComponent(link.hash.slice(1)));
      if (el) { byId[el.id] = link; targets.push(el); }
    });

    var spy = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        jumpLinks.forEach(function (l) { l.classList.remove('is-current'); });
        var current = byId[entry.target.id];
        if (current) current.classList.add('is-current');
      });
    }, { rootMargin: '-25% 0px -65% 0px' });

    targets.forEach(function (t) { spy.observe(t); });
  }
})();
