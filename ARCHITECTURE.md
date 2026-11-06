# ARCHITECTURE.md
## Trendz Eventz — Comprehensive Technical Architecture Specification
**Agent / Role:** Agent 01 (Principal Architect) & Agent 08 (PHP Engineer)  
**Budget Constraint:** ~₹12,000 Implementation Target (Zero Expensive SaaS / Maximum Engineering Reliability)  
**Target Runtime:** PHP 8.0+ / Native Web Standard Assets  

---

### 1. Architectural Philosophy & Principles

The architectural design for the Trendz Eventz website is grounded in three core principles:
1. **Zero Runtime Fragility:** No heavy node builds, no fragile bundler configs, no npm dependency tree vulnerabilities, and no paid SaaS third-party gateways for form handling. The entire platform runs natively on standard PHP hosting (LAMP/LEMP or PHP CLI).
2. **Strict Separation of Concerns:**
   - **Data Layer:** Clean declarative data definitions (`includes/data.php`).
   - **Configuration:** Global environmental parameters, site metadata, and navigation structures (`includes/config.php`).
   - **Logic & Security:** Pure utility and security functions (`includes/helpers.php`).
   - **Presentation Layer:** Reusable component rendering functions with strict escaping (`includes/components.php`, `includes/header.php`, `includes/footer.php`).
   - **Pages:** Ultra-thin controller scripts orchestrating components (`index.php`, `about.php`, `services.php`, `work.php`, `case-study.php`, `clients.php`, `contact.php`).
3. **Defense in Depth Security:** Native session-based CSRF protection, cryptographic token validation, honeypot spam traps, input sanitization, contextual output escaping (`htmlspecialchars`), and access-quarantined flat-file storage.

---

### 2. Physical Directory Structure

```
trendz_v13_work/
├── index.php                 # Homepage (Narrative Sequence)
├── about.php                 # Corporate Story, Philosophy, Leadership, Scale
├── services.php              # 6-Pillar Detailed Capabilities & Offerings
├── work.php                  # Case Studies Explorer & Interactive Filter
├── case-study.php            # Detailed Case Study Template (Dynamic by slug)
├── clients.php               # Comprehensive Client Ecosystem & Partnerships
├── contact.php               # RFP Inquiry Experience & Form Processor
├── robots.txt                # Search Engine Crawler Directives
├── sitemap.xml               # Semantic XML Sitemap for Search & Answer Engines
├── includes/
│   ├── bootstrap.php         # Runtime initialization, security headers, sessions
│   ├── config.php            # Site configuration, brand metadata, navigation
│   ├── data.php              # Verified business content (services, projects, stats)
│   ├── helpers.php           # Security, sanitization, CSRF, URL & asset utilities
│   ├── components.php        # Modular PHP UI components
│   ├── header.php            # Semantic HTML5 <header>, meta tags, global nav
│   └── footer.php            # Semantic HTML5 <footer>, legal, sitemap, scripts
├── assets/
│   ├── css/
│   │   ├── tokens.css        # Color palette, spacing, typography, z-index, radii
│   │   ├── base.css          # CSS Reset, modern defaults, smooth scrolling
│   │   ├── layout.css        # Container system, grid system, responsive sections
│   │   ├── components.css    # Cards, buttons, pills, forms, modals, marquees
│   │   ├── pages.css         # Page-specific editorial compositions
│   │   ├── responsive.css    # Breakpoint-specific layout adjustments (320px–1440px+)
│   │   ├── motion.css        # Micro-animations, keyframes, transitions
│   │   └── accessibility.css # Focus outlines, screen-reader text, reduced-motion
│   ├── js/
│   │   ├── app.js            # Core application initializer & lifecycle
│   │   ├── navigation.js     # Accessible mobile drawer, header scroll states
│   │   ├── motion.js         # Scroll reveals, counter animations, marquee controller
│   │   ├── portfolio.js      # Filterable work explorer, tag switching, modal details
│   │   ├── forms.js          # Client-side validation, async submission, state handling
│   │   └── vendor/           # Approved lightweight libraries (e.g. anime.min.js)
│   └── img/
│       ├── brand/            # Official vector & raster logos, favicons, animated icons
│       ├── clients/          # 13 verified client partner logos (optimized WebP/PNG)
│       ├── work/             # High-res verified project photography by client
│       └── editorial/        # Background textures, subtle grid patterns
└── storage/
    ├── .htaccess             # Deny all direct web access
    ├── index.php             # PHP exit trap: <?php http_response_code(403); exit; ?>
    └── inquiries.json        # Protected local JSON repository for contact submissions
```

---

### 3. Core PHP Architecture & Subsystems

#### A. Bootstrap & Security Pipeline (`includes/bootstrap.php`)
Every page begins with `require_once __DIR__ . '/includes/bootstrap.php';`. This file executes:
1. Strict type enforcement: `declare(strict_types=1);`.
2. Safe session initialization with hardened cookie parameters (`httponly`, `samesite=Strict`, `secure` if HTTPS).
3. HTTP Security Headers:
   - `X-Content-Type-Options: nosniff`
   - `X-Frame-Options: SAMEORIGIN`
   - `X-XSS-Protection: 1; mode=block`
   - `Referrer-Policy: strict-origin-when-cross-origin`
   - `Content-Security-Policy: default-src 'self'; img-src 'self' data:; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; script-src 'self' 'unsafe-inline'; frame-ancestors 'self';`
4. Global error handler suppressing raw PHP stack traces in production.
5. Ingestion of `config.php`, `data.php`, `helpers.php`, and `components.php`.

#### B. Verified Data Registry (`includes/data.php`)
All business facts are centralized in typed, immutable PHP arrays:
- `$SITE_STATS`: 4 verified metrics (15+ years, 500+ productions, 50+ MDS centres, 10 cities in TVS launch).
- `$SERVICES_DATA`: 6 core services (Corporate Events, BTL & Experiential, Retail Branding, Digital Marketing, Mobile & Tele Marketing, Broadcast & Outdoor) with distinct descriptions, capability lists, and imagery.
- `$PROJECTS_DATA`: 12 verified case studies (Maruti Driving School, Samsung, TVS Tyres, Philips, Lipton MTO, Lipton In-Mall, Lipton Flash Mob, Yokohama, Cadbury, Bombay Dyeing, Vitra, Hypercity, Neutrogena) with exact briefs, scopes, metrics, and photo sets.
- `$CLIENTS_DATA`: 13 client partners with verified logos, industries, and project linkages.
- `$APPROACH_DATA`: 5-step operational workflow (Understand, Ideate, Plan, Execute, Report).

#### C. Component Architecture (`includes/components.php`)
Reusable render functions accepting structured arguments and returning clean HTML:
- `render_section_header(string $eyebrow, string $title, string $description = '', bool $light = false)`
- `render_cta_button(string $label, string $url, string $variant = 'primary', array $attrs = [])`
- `render_stat_item(string $number, string $suffix, string $label, string $context = '')`
- `render_service_card(array $service, int $index)`
- `render_project_card(array $project, string $layout = 'standard')`
- `render_client_logo(array $client, bool $lazy = true)`
- `render_process_step(int $number, string $title, string $desc, array $highlights = [])`
- `render_founder_card(array $founder)`
- `render_contact_form(string $csrf_token, array $errors = [], array $old = [])`
- `render_marquee(array $items, string $speed = 'normal')`
- `render_breadcrumbs(array $crumbs)`

#### D. Form Handling & Secure Storage Architecture
Inquiries submitted through `/contact.php` follow a rigorous verification pipeline:
1. **Method Check:** Enforces `POST`.
2. **CSRF Validation:** Compares `$_POST['csrf_token']` against cryptographically secure `$_SESSION['csrf_token']` via `hash_equals()`.
3. **Honeypot Trap:** Checks hidden field `website_url_check`. If populated, execution terminates silently (bot trap).
4. **Input Sanitization & Server-Side Validation:**
   - Name: Required, sanitized, min 2 chars.
   - Company: Required, sanitized.
   - Email: Required, validated via `filter_var(..., FILTER_VALIDATE_EMAIL)`.
   - Phone: Required, sanitized, validated with regex `/^[0-9\+\-\s\(\)]{8,20}$/`.
   - Requirement: Validated against approved service enum.
   - Message: Required, minimum 15 characters, escaped.
5. **Storage Engine:** Appends an encrypted or sanitized JSON object to `storage/inquiries.json`.
6. **Directory Protection:** `storage/` contains an Apache `.htaccess` (`Deny from all`) and `index.php` (403 Forbidden exit) preventing direct HTTP access.

---

### 4. Technical SEO, AEO & Structured Data Engine

Every page dynamically computes:
1. **Metadata:** Canonical URL, unique title tag (`<Page Title> | Trendz Eventz — Mumbai`), high-converting description, OpenGraph tags, Twitter Card tags.
2. **Schema.org JSON-LD:**
   - Global: `Organization` & `LocalBusiness` (Corporate Event Agency, Mumbai, contact points, founder Bharat Jadhav).
   - Work / Case Studies: `CreativeWork` & `Event` schemas documenting actual brand activations.
   - Services: `Service` schema defining B2B event management capabilities.
   - Breadcrumbs: `BreadcrumbList` schema on all secondary pages.
3. **Answer Engine Optimization (AEO):** Semantic FAQ and natural language answers embedded in semantic `<dl>`, `<article>`, and `<section>` elements answering key query intents (e.g., "Who handles Pan-India dealer meets?", "Who executes mall activations in Mumbai?").

---

### 5. Architectural Quality Gate Checklist
- [x] Zero paid SaaS requirements.
- [x] Zero compilation/build steps needed for deployment.
- [x] Full operational compatibility with PHP 8.0+.
- [x] Secure flat-file lead capture with honeypot and CSRF.
- [x] Comprehensive WCAG 2.2 AA accessibility architecture.
- [x] Optimized asset loading with native WebP/responsive images and asynchronous JavaScript.

