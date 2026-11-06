# Trendz Eventz — Official Corporate Website (Netlify Static Edition)

> **Meaningful experiences. Measurable momentum.**  
> Official corporate website for Trendz Eventz, an experiential marketing and corporate event agency in Mumbai, Maharashtra, India.  
> Founded and led by **Bharat Jadhav** (Founder & Managing Director).

---

## 1. Project Overview & Architecture

This repository contains the official **Trendz Eventz** website, customized for **high-performance static deployment on Netlify without PHP**:
- **Pure Jamstack / Zero PHP:** Fully decoupled static HTML5, CSS3, and modern JavaScript. Requires no PHP interpreter, Node compiler, or dynamic backend.
- **Netlify Forms Integration:** Contact RFP submissions are captured natively using Netlify Forms (`data-netlify="true"`, spam bot honeypot, and instant AJAX feedback).
- **SEO & Canonical Routing:** 100% pre-rendered pages, comprehensive XML sitemap (`sitemap.xml`), and Netlify edge redirects (`_redirects` & `netlify.toml`) preserving legacy `.php` paths.
- **Dynamic & Static Case Studies:** Interactive query-param explorer (`case-study.html?slug=...`) paired with dedicated static case study pages (`case-studies/*.html`).
- **Edge Security Headers:** Pre-configured `_headers` and `netlify.toml` deploying HTTP security headers (`nosniff`, `SAMEORIGIN`, `strict-origin-when-cross-origin`, CSP).

---

## 2. Directory Structure

```
TESTCLIENT/
├── index.html                    # Homepage (Hero, Marquee, Services, Work, Scale)
├── about.html                    # Corporate profile, Bharat Jadhav leadership & 15+ years
├── services.html                 # Six specialized experiential capability pillars
├── work.html                     # Filterable case study explorer
├── case-study.html               # Dynamic case study explorer (?slug= routing)
├── case-studies/                 # 12 pre-rendered static case study detail pages
├── clients.html                  # 13 verified enterprise client brand partners
├── contact.html                  # Netlify Forms RFP submission experience
├── netlify.toml                  # Netlify build, redirects, and edge security headers
├── _redirects                    # Netlify redirect rules (legacy .php -> .html)
├── _headers                      # Netlify HTTP security and caching headers
├── robots.txt                    # Search crawler directives
├── sitemap.xml                   # XML sitemap covering all canonical endpoints
├── generate_static.py            # Automated static site generator
├── test_static_build.py          # Quality assurance and verification test suite
├── assets/
│   ├── css/                      # Tokens, base, components, motion
│   ├── js/                       # Core lifecycle & interactions
│   └── img/
│       ├── brand/                # Logos, icons, founder signature
│       ├── clients/              # 13 verified client partner logos (PNG)
│       └── work/                 # 39 authentic on-ground event photos
└── legacy_php/                   # Quarantined legacy PHP templates & includes
```

---

## 3. Netlify Deployment Guide

### Option A: Connect via Git (GitHub / GitLab / Bitbucket)
1. Push this repository to GitHub/GitLab.
2. In Netlify Dashboard, click **Add new site** > **Import an existing project**.
3. Select your repository.
4. Deployment settings are auto-detected from `netlify.toml`:
   - **Base directory:** (leave empty)
   - **Build command:** (leave empty, or `python generate_static.py`)
   - **Publish directory:** `.`
5. Click **Deploy site**.

### Option B: Netlify CLI
```bash
npm install -g netlify-cli
netlify deploy --prod --dir=.
```

### Option C: Drag & Drop
Drag the project folder directly into the Netlify Drop web interface: [https://app.netlify.com/drop](https://app.netlify.com/drop).

---

## 4. Local Quickstart (Zero PHP Required)

Run locally using Python's built-in static HTTP server or Node `serve`:

### Using Python:
```bash
python -m http.server 8080
```
Open your browser at `http://localhost:8080`.

### Running the QA & Integrity Suite:
```bash
python test_static_build.py
```

---

## 5. Form Handling via Netlify Forms

The RFP form on `contact.html` is built natively for Netlify Forms:
- **Netlify attributes:** `<form name="contact" method="POST" data-netlify="true" netlify-honeypot="bot-field">`
- **Dashboard submissions:** Inquiries appear immediately in your Netlify site dashboard under **Forms**.
- **Email Notifications:** Configurable in Netlify Dashboard under *Site Settings > Forms > Form notifications* to alert `info@trendzeventz.com`.

---

## 6. Credits & Leadership
- **Company:** Trendz Eventz
- **Founder & Managing Director:** Bharat Jadhav
- **Headquarters:** Mumbai, Maharashtra, India
- **Contact:** info@trendzeventz.com | +91 99873 99997
