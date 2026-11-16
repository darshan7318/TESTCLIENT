# Trendz Eventz — Official Corporate Website (Gulp & Compiled Tailwind CSS Edition)

> **Meaningful experiences. Measurable momentum.**  
> Official corporate website for Trendz Eventz, an experiential marketing and corporate event agency in Mumbai, Maharashtra, India.  
> Founded and led by **Bharat Jadhav** (Founder & Managing Director).

---

## 1. Project Overview & Architecture

This repository contains the official **Trendz Eventz** website, built with a **Component-Driven Gulp + Tailwind CSS PostCSS pipeline** that compiles clean, production-minified CSS and outputs a standalone, directly deployable client build:
- **Shared Component Architecture (`src/components/`):** Reusable UI elements (`header.html`, `footer.html`, `meta-head.html`, `scripts.html`) are isolated into single sources of truth. Pages in `src/pages/` compose these shared components cleanly via `gulp-file-include`. Any updates to the navigation, footer, brand, or metadata propagate instantly across all 20 pages upon build!
- **Compiled Tailwind CSS (Zero CDN Runtime):** Tailwind utilities are pre-compiled and tree-shaken with PostCSS, Autoprefixer, and CSSNano into a single, lightning-fast 54 KB minified stylesheet (`assets/css/trendz.min.css`). Zero runtime script overhead, zero FOUC, and full CSP compliance.
- **Automated Gulp 5 Pipeline:** One-command development and production workflows (`npm run dev`, `npm run build`) with BrowserSync live-reloading.
- **Directly Deployable Client Build (`dist/`):** Running `npm run build` generates a standalone, self-contained `dist/` directory ready for instant deployment to Netlify, Vercel, cPanel, Apache, Nginx, or GitHub Pages.
- **Netlify Forms Integration:** Contact RFP submissions are captured natively using Netlify Forms (`data-netlify="true"`, spam bot honeypot, and instant AJAX feedback).
- **SEO & Canonical Routing:** 100% pre-rendered pages, comprehensive XML sitemap (`sitemap.xml`), and Netlify edge redirects (`_redirects` & `netlify.toml`) preserving legacy `.php` paths.
- **Edge Security Headers:** Pre-configured `_headers` and `netlify.toml` deploying HTTP security headers (`nosniff`, `SAMEORIGIN`, `strict-origin-when-cross-origin`, CSP).

---

## 2. Directory Structure

```
TESTCLIENT/
├── gulpfile.js                   # Gulp 5 build pipeline (Components, CSS, Assets, Watchers)
├── tailwind.config.js            # Tailwind theme, custom Trendz palette & typography
├── postcss.config.js             # PostCSS plugins (Tailwind, Autoprefixer, CSSNano)
├── package.json                  # NPM scripts & dev dependencies
├── src/
│   ├── components/               # 🧩 Reusable Shared Components
│   │   ├── meta-head.html        # Shared <head> metadata, fonts, compiled CSS
│   │   ├── header.html           # Shared navbar, branding, CTA & mobile drawer
│   │   ├── footer.html           # Shared corporate footer, pre-footer & credentials
│   │   └── scripts.html          # Shared core scripts, Lucide icons, controllers
│   ├── pages/                    # 📄 Modular Source Pages
│   │   ├── index.html            # Homepage source
│   │   ├── about.html            # About page source
│   │   ├── services.html         # Services page source
│   │   ├── work.html             # Portfolio explorer source
│   │   ├── case-study.html       # Dynamic case study explorer source
│   │   ├── case-studies/         # 12 static case study sources
│   │   ├── clients.html          # Clients page source
│   │   └── contact.html          # Contact RFP page source
│   └── css/
│       ├── header.css            # Header component styles
│       └── main.css              # Tailwind entrypoint & utility extensions
├── dist/                         # 🚀 Production-ready deployable client build
│   ├── index.html                # Compiled homepage
│   ├── about.html                # Compiled about page
│   ├── services.html             # Compiled services page
│   ├── work.html                 # Compiled work page
│   ├── case-study.html           # Compiled case study page
│   ├── case-studies/             # 12 compiled static case studies
│   ├── clients.html              # Compiled clients page
│   ├── contact.html              # Compiled contact page
│   └── assets/
│       ├── css/trendz.min.css    # Pre-compiled, minified Tailwind stylesheet
│       ├── js/                   # Core lifecycle & interactions
│       └── img/                  # Brand, client logos, authentic event photography
├── index.html                    # Root homepage
├── about.html                    # Root about page
├── services.html                 # Root services page
├── work.html                     # Root work page
├── case-study.html               # Root dynamic case study page
├── case-studies/                 # 12 root static case study pages
├── clients.html                  # Root clients page
├── contact.html                  # Root contact page
├── netlify.toml                  # Netlify build (npm run build -> dist) & headers
├── _redirects                    # Netlify redirect rules (legacy .php -> .html)
├── _headers                      # Netlify HTTP security and caching headers
├── robots.txt                    # Search crawler directives
├── sitemap.xml                   # XML sitemap covering all canonical endpoints
└── test_static_build.py          # Quality assurance and verification test suite
```

---

## 3. Quickstart & Developer Workflow

### Installation:
```bash
npm install
```

### Development with Live Reload (BrowserSync):
```bash
npm run dev
# or: gulp dev
```
Spins up a local development server at `http://localhost:3000` with automated watchers on CSS, HTML, and JS. Any style or markup changes recompile Tailwind and hot-reload the browser automatically.

### Production Build:
```bash
npm run build
# or: gulp build
```
Compiles and minifies Tailwind CSS via PostCSS, processes all HTML files, syncs all images, scripts, and deployment configurations into the self-contained `dist/` directory.

### Run Verification & QA Test Suite:
```bash
npm test
# or: python test_static_build.py && python test_static_build.py dist
```

---

## 4. Client Deployment Guide

### Option A: Direct Client Handoff (Zip & Send)
Run `npm run build`. The generated `dist/` directory is 100% self-contained and ready to be zipped and sent directly to the client or uploaded to any cPanel/Apache/Nginx/FTP host.

### Option B: Netlify (Git Integration)
Push this repository to GitHub/GitLab. In Netlify, settings are auto-detected from `netlify.toml`:
- **Build command:** `npm run build`
- **Publish directory:** `dist`

### Option C: Netlify Drag & Drop
Drag the `dist/` folder directly into [https://app.netlify.com/drop](https://app.netlify.com/drop).

### Option D: Netlify CLI
```bash
npx netlify-cli deploy --prod --dir=dist
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
