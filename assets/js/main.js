/* Rely Service — the only JavaScript on the site.
   Handles the mobile menu and its submenus. The site works without it:
   every nav link is a real link, and dropdowns open on hover/focus on desktop. */
(function () {
  'use strict';

  var toggle = document.querySelector('.nav-toggle');
  var nav    = document.getElementById('primary-nav');
  if (!toggle || !nav) return;

  function setMenu(open) {
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    nav.classList.toggle('is-open', open);
  }

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

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
      setMenu(false);
      toggle.focus();
    }
  });

  // Reset state when resizing back up to desktop.
  var desktop = window.matchMedia('(min-width: 961px)');
  desktop.addEventListener('change', function (e) {
    if (e.matches) setMenu(false);
  });
})();
