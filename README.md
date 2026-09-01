# Rely Service website

Static site in plain HTML, CSS and PHP. No build step, no framework, no database.
Upload the files to any shared host running PHP 8 and it works.

---

## 1. Before you go live: the checklist

Everything marked `TODO` in the code is placeholder content. Search for it:

```bash
grep -rn "TODO" --include="*.php" --include="*.css" --include="*.xml" .
```

**Must be done:**

1. **`includes/config.php`**: company name, address, phone, email, domain, social links.
   Nearly every placeholder on the site comes from this one file.
2. **`ENQUIRY_FROM`** must be an address *on your own domain*
   (`website@relyservice.com`). Shared hosts silently drop mail claiming to be
   from Gmail or another domain. Create this mailbox in cPanel before launch.
   Enquiries are delivered to **both** `digital-squad@fromdrive.com` and
   `tnp@relyservice.com` (`ENQUIRY_TO`, comma-separated).
   Because one recipient is on an external domain, set up **SPF and DKIM**
   (cPanel, Email Deliverability) or these will land in spam.
3. **Brand colours**: the six `--brand-*` values at the top of `assets/css/style.css`.
   These are now sampled from the real logo, so they should not need changing.
4. **Logo**: done. `assets/img/logo/` holds the trimmed lockup, a light variant
   for dark backgrounds, the isolated mark and the favicons. If you find the
   vector original (SVG/AI/EPS), send it and I'll regenerate them sharper.
5. **Client logos**: done, 14 in place. See "Adding or removing a client logo"
   below for how to add more. Written permission is still needed for each.
6. **Copy**: written from the documents in `Content/`. Search for `TODO: CONFIRM`
   for the specific claims still needing sign-off, including the WISE partnership
   wording and the About page founding story.
7. **`sitemap.xml` and `robots.txt`**: replace `relyservice.in` with the real
   domain. Note `config.php` now says `.com` while these still say `.in`.
8. **`privacy.php`**: a reasonable draft, but have it reviewed. It is not legal advice.
9. **Social image**: add `assets/img/og-image.jpg` (1200 by 630) for link
   previews. Favicons are already generated from the logo mark.
10. **Placeholder statistics.** Every figure still showing as `XX` or `XX,XXX`
   needs a real number. They are deliberately visible so an unfilled slot reads
   as unfilled rather than as an invented figure. Find them all with:

    ```bash
    grep -rn "'value' => 'X" --include="*.php" .
    ```

    Replace the X's with the number and the cell starts counting up on scroll
    automatically. Nothing else needs changing.

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
> binds the port but can't find the router, so every request returns a 500,
> which looks like a broken site rather than a wrong working directory.
>
> Use `127.0.0.1` rather than `localhost`: on some systems `localhost` binds only
> the IPv6 loopback, and `http://127.0.0.1:8000` is then refused.

`router.php` reproduces the clean URLs that
`.htaccess` provides on the real server. It is a **development file only**, and
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
3. Confirm `.htaccess` uploaded. File Manager hides dotfiles until you enable
   *Settings → Show Hidden Files*.
4. Create the `storage/` directory if it didn't upload, and set it to `750`.
5. Install the free Let's Encrypt SSL certificate (cPanel → SSL/TLS Status).
6. **After SSL is active**, uncomment the HTTPS and `www` redirect blocks at the
   top of `.htaccess`.
7. Create the mailbox for `ENQUIRY_FROM` in cPanel → Email Accounts.
8. Send yourself a test enquiry and confirm it arrives, including in spam.

### File permissions

| Path            | Mode |
| --------------- | ---- |
| directories     | 755  |
| `.php`, `.css`  | 644  |
| `storage/`      | 750  |

---

## 4. House style

**No long dashes in any website text.** Use a comma, colon, bracket or full stop
instead. This applies to every rendered string on the site, and to this file.

---

## 5. How the site is put together

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
assets/js/main.js         Menu, reveals, marquee pause. Works without JS.
storage/enquiries.csv     Backup copy of every enquiry (created on first submit)
```

**Adding a page:** copy `about.php`, change `$page_title`, `$page_description`
and `$active`, write the content between the two `require` lines. Add it to
`$NAV` in `config.php` if it belongs in the menu, and to `sitemap.xml`.

**Changing the menu:** edit `$NAV` in `includes/config.php`. The header, the
footer columns and the 404 page all read from it.

**Adding or removing a client logo:** edit the `$clients` array at the top of
`index.php` and drop the file into `assets/img/clients/`. Nothing else needs to
change. `includes/client-marquee.php` adapts on its own:

| Clients | What renders |
| --- | --- |
| 0 | nothing at all |
| 1 to 3 | a centred static row |
| 4+ | a continuous marquee |

The marquee repeats the set until it comfortably exceeds the screen width (so
there is never a visible gap after the last logo), and derives the scroll
duration from the tile count, so it moves at the same speed with six clients or
thirty. It pauses on hover, on keyboard focus, and via its own pause button, and
collapses to a static wall for visitors who ask for reduced motion.

Logo files should be **transparent PNG or SVG**. Tiles cap them at 2.75rem tall
and 100% wide, but files still look best supplied at roughly consistent optical
weight. Logos are normalised by aspect ratio into banded display heights and
exported at 2x; the `w`/`h` values in the `$clients` array are the 1x display
size. A tall square badge next to a long wordmark looks mismatched at equal
height, which is why the banding exists.

**Editing CSS:** after changing `style.css` or `main.js`, bump the `?v=1` in
`includes/header.php` to `?v=2`. Browsers cache those files for a year otherwise.

### Sub-pages are anchors, not pages

The four items under each pillar (Skills, Employability, …) are sections within
one page, linked as `/student-success#employability`. Four thin pages each would
rank worse in search and be harder to keep current. If a section grows past
roughly 800 words of real content, that's the point to split it into its own page.

---

## 6. The enquiry form

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

## 7. After launch

- Verify the domain in **Google Search Console** and submit `sitemap.xml`.
- Create a **Google Business Profile** for the Mumbai office. For a credibility
  site aimed at local institutions this is worth more than any on-page SEO work.
- Add analytics if you want it. Plausible needs no cookie banner; GA4 does. One
  script tag in `includes/header.php` covers the whole site either way.
- Run the site through PageSpeed Insights and WAVE (accessibility) once real
  images are in. Uncompressed logo files are the usual culprit for a slow score.
