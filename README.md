# Trendz Eventz — Official Corporate Website

> **Meaningful experiences. Measurable momentum.**  
> Official corporate website for Trendz Eventz, an experiential marketing and corporate event agency in Mumbai, Maharashtra, India.  
> Founded and led by **Bharat Jadhav** (Founder & Managing Director).

---

## 1. Project Overview & Architecture

This repository contains the complete implementation of the official **Trendz Eventz** website, refactored according to corporate web standards:
- **Light Corporate Theme:** Crisp white background (`bg-white`), neutral slate accents (`bg-slate-50`), and Trendz royal purple brand highlights (`bg-purple-700`, `text-purple-700`). Zero dark mode.
- **Tailwind CSS & DaisyUI:** Complete replacement of custom CSS and inline styles with utility classes and DaisyUI components (`navbar`, `card`, `badge`, `btn`, `input`, `select`, `textarea`).
- **Static-First with Minimal PHP:** Direct, transparent HTML markup on every page with minimal PHP includes (`include 'includes/header.php'` and `include 'includes/footer.php'`).
- **Zero Heavy Framework Overhead:** Runs standalone on standard LAMP/cPanel hosting or PHP CLI without node build chains.

---

## 2. Directory Structure

```
trendz_v13_work/
├── index.php                     # Homepage (Hero, Marquee, Services, Work, Scale, Founder)
├── about.php                     # Corporate profile, Bharat Jadhav leadership & 15+ years
├── services.php                  # Six specialized experiential capability pillars
├── work.php                      # Filterable case study explorer
├── case-study.php                # Individual case study detail view (12 verified projects)
├── clients.php                   # 13 verified enterprise client brand partners
├── contact.php                   # Direct coordinates & RFP submission form
├── robots.txt                    # Search crawler index directives
├── sitemap.xml                   # XML sitemap covering all 20 canonical endpoints
├── QA_REPORT.md                  # Defect tracking & multi-role audit sign-off
├── GO_LIVE_STATUS.md             # Quality gate verification (Status: GO)
├── includes/
│   ├── header.php                # Semantic HTML5 header, navigation & Tailwind/DaisyUI setup
│   └── footer.php                # Pre-footer CTA, corporate footer, scripts
├── assets/
│   ├── css/
│   │   └── daisyui.min.css       # Local DaisyUI CSS bundle
│   ├── js/
│   │   └── vendor/
│   │       └── tailwindcss.js    # Local Tailwind CSS engine
│   └── img/
│       ├── brand/                # Official logos, animated icons, founder signature
│       ├── clients/              # 13 verified client partner logos (PNG)
│       └── work/                 # 39 authentic on-ground event photos
└── storage/
    ├── .htaccess                 # Deny all direct web access
    ├── index.php                 # 403 Forbidden exit trap
    └── inquiries.json            # Quarantined flat-file JSON inquiry database
```

---

## 3. Strict Content Truth Protocol

Every statistic, project, and claim on this site is derived from verified physical credentials (`CLIENTDOCS/`):
- **15+** Years Experience
- **500+** Productions & Activations Delivered
- **50+** Maruti Driving School Centres Activated
- **10** Cities Covered in a Single TVS Launch Tour
- **100** Samsung Stores Launched Thematically Across 3 Cities
- **500** Philips Dealers Hosted in Goa Celebrating ₹100 Crore Sales
- **600** Bombay Dyeing Sales Staff Felicitated
- **200** Stores Activated for Lipton MTO Sampling

---

## 4. Local Quickstart

### Running Locally via PHP Built-in Server
1. Open terminal in the project root:
   ```bash
   cd c:\Dev\CLIENTS\trendz-mvp-2\trendz_v13_work
   ```
2. Start the local server:
   ```bash
   php -S 127.0.0.1:8088
   ```
3. Open your browser and navigate to:
   ```
   http://127.0.0.1:8088
   ```

### Running the Automated QA Suite
```bash
python scratch/qa_suite.py
```

---

## 5. Credits & Leadership
- **Company:** Trendz Eventz
- **Founder & Managing Director:** Bharat Jadhav
- **Headquarters:** Mumbai, Maharashtra, India
- **Contact:** info@trendzeventz.com | +91 99873 99997
"# TESTCLIENT" 
