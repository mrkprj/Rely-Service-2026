# Rely Service — website

Static site in plain HTML, CSS and PHP. No build step, no framework, no database.
Upload the files to any shared host running PHP 8 and it works.

---

## 1. Before you go live — the checklist

Everything marked `TODO` in the code is placeholder content. Search for it:

```bash
grep -rn "TODO" --include="*.php" --include="*.css" --include="*.xml" .
```

**Must be done:**

1. **`includes/config.php`** — company name, address, phone, email, domain, social links.
   Nearly every placeholder on the site comes from this one file.
2. **`ENQUIRY_FROM`** must be an address *on your own domain* (e.g. `website@relyservice.in`).
   Shared hosts silently drop mail claiming to be from Gmail or another domain.
3. **Brand colours** — the six `--brand-*` values at the top of `assets/css/style.css`.
4. **Logo** — replace the `.brand-mark` placeholder in `includes/header.php` and
   `includes/footer.php` with `<img src="/assets/img/logo.svg" alt="Rely Service">`.
5. **Client logos** — drop files into `assets/img/clients/`, then fill in the
   `$clients` array at the top of `index.php`. Cells fall back to the name in text
   until you do.
6. **Copy** — every page's placeholder text, especially the hero stats on the
   homepage. *Delete the stats block rather than shipping `00+`.*
7. **`sitemap.xml` and `robots.txt`** — replace `relyservice.in` with your domain.
8. **`privacy.php`** — a reasonable draft, but have it reviewed. It is not legal advice.
9. **Favicon and social image** — add `assets/img/favicon.png` (32×32) and
   `assets/img/og-image.jpg` (1200×630).

---

## 2. Running it locally

You need PHP 8 installed (`sudo dnf install php-cli` on Fedora), then:

```bash
cd "/home/mark/Fromdrive/2026 website/Rely Service 2026"
php -S 127.0.0.1:8000 router.php
```

Open <http://127.0.0.1:8000>.

> **The `cd` matters.** `router.php` and the page files are resolved relative to
> the directory you launch from. Start the server anywhere else and PHP still
> binds the port but can't find the router — every request then returns a 500,
> which looks like a broken site rather than a wrong working directory.
>
> Use `127.0.0.1` rather than `localhost`: on some systems `localhost` binds only
> the IPv6 loopback, and `http://127.0.0.1:8000` is then refused.

`router.php` reproduces the clean URLs that
`.htaccess` provides on the real server — it is a **development file only**, and
does not need to be uploaded.

No PHP locally? A container works too:

```bash
podman run --rm -v "$PWD":/app:z -w /app -p 8000:8000 docker.io/library/php:8.3-cli \
  php -S 0.0.0.0:8000 router.php
```

---

## 3. Deploying to cPanel hosting

1. In cPanel, set the PHP version to **8.1 or newer** (MultiPHP Manager).
2. Upload everything **except** `router.php`, `README.md` and `.git/` into
   `public_html/`. File Manager's "Upload a zip and extract" is fastest.
3. Confirm `.htaccess` uploaded — File Manager hides dotfiles until you enable
   *Settings → Show Hidden Files*.
4. Create the `storage/` directory if it didn't upload, and set it to `750`.
5. Install the free Let's Encrypt SSL certificate (cPanel → SSL/TLS Status).
6. **After SSL is active**, uncomment the HTTPS and `www` redirect blocks at the
   top of `.htaccess`.
7. Create the mailbox for `ENQUIRY_FROM` in cPanel → Email Accounts.
8. Send yourself a test enquiry and confirm it arrives — including in spam.

### File permissions

| Path            | Mode |
| --------------- | ---- |
| directories     | 755  |
| `.php`, `.css`  | 644  |
| `storage/`      | 750  |

---

## 4. How the site is put together

```
index.php                 Homepage (8 sections)
technology-solutions.php  ─┐
student-success.php        ├ Pillar pages: each defines a $sections array
incubation.php            ─┘ and renders it via includes/pillar-sections.php
about.php                 About / how we work
contact.php               Enquiry form
privacy.php               Privacy policy
404.php                   Not-found page

includes/
  config.php              ALL company details + the navigation menu
  header.php              <head>, meta tags, schema.org, site header + nav
  footer.php              Footer (menus generated from config.php)
  pillar-sections.php     Renders a pillar page's four anchored sections
  enquiry-handler.php     Form validation, spam traps, mail, CSV fallback

assets/css/style.css      The entire stylesheet, sectioned and commented
assets/js/main.js         Mobile menu only — the site works without JavaScript
storage/enquiries.csv     Backup copy of every enquiry (created on first submit)
```

**Adding a page:** copy `about.php`, change `$page_title`, `$page_description`
and `$active`, write the content between the two `require` lines. Add it to
`$NAV` in `config.php` if it belongs in the menu, and to `sitemap.xml`.

**Changing the menu:** edit `$NAV` in `includes/config.php`. The header, the
footer columns and the 404 page all read from it.

**Editing CSS:** after changing `style.css` or `main.js`, bump the `?v=1` in
`includes/header.php` to `?v=2`. Browsers cache those files for a year otherwise.

### Sub-pages are anchors, not pages

The four items under each pillar (Skills, Employability, …) are sections within
one page, linked as `/student-success#employability`. Four thin pages each would
rank worse in search and be harder to keep current. If a section grows past
roughly 800 words of real content, that's the point to split it into its own page.

---

## 5. The enquiry form

`includes/enquiry-handler.php` runs before any HTML output so it can redirect.

- **Validation** is server-side. Client-side `required` attributes are a
  convenience; never the defence.
- **Spam** is handled by three layers, no CAPTCHA: a honeypot field, a
  three-second time trap, and a CSRF token. Bots get a fake success redirect so
  they don't learn what tripped them. Add Cloudflare Turnstile only if spam
  actually starts arriving.
- **Every submission is also written to `storage/enquiries.csv`.** `mail()` fails
  silently on shared hosting more often than you'd expect; this is what saves the
  lead when it does. Check it occasionally.

### If enquiry emails don't arrive

Shared-host `mail()` is unreliable and often lands in spam. The fix is SMTP:

1. Download PHPMailer and upload it to `includes/PHPMailer/`.
2. Replace the `@mail(...)` call in `enquiry-handler.php` with a PHPMailer SMTP
   send, authenticating against the mailbox you created in cPanel.
3. Add SPF and DKIM records for your domain (cPanel → Email Deliverability does
   this in one click). Without them, mail from your domain gets filtered.

---

## 6. After launch

- Verify the domain in **Google Search Console** and submit `sitemap.xml`.
- Create a **Google Business Profile** for the Mumbai office. For a credibility
  site aimed at local institutions this is worth more than any on-page SEO work.
- Add analytics if you want it — Plausible needs no cookie banner; GA4 does. One
  script tag in `includes/header.php` covers the whole site either way.
- Run the site through PageSpeed Insights and WAVE (accessibility) once real
  images are in. Uncompressed logo files are the usual culprit for a slow score.
