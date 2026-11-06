# DESIGN_SYSTEM.md
## Trendz Eventz — Comprehensive Design System & Component Library
**Document Status:** Production Reference  
**Brand Identity:** Corporate Experiential Mastery  
**Primary Color System:** Obsidian Black, Charcoal, Royal Purple, Deep Violet, Lavender, Crisp White  
**Budget Execution Constraint:** Maximize Perceived Quality, Zero Heavy Framework Overhead  

---

### 1. Design Principles & Anti-Slop Law

1. **Corporate Stature First:** Trendz represents enterprise-tier activations for Fortune 500 and national giants. The interface communicates operational capability and financial security, never student or freelance experimentalism.
2. **Organic UI Architecture:** Fluid geometric transitions, subtle curved surfaces (`14px`, `20px`, `28px`), and asymmetric grid balance without childish blobs or excessive glassmorphism.
3. **Disciplined Purple Signalling:** Purple is the signature brand color of Trendz Eventz. It is applied selectively to guide the eye toward conversion moments, active tabs, metric callouts, and primary actions. It never overwhelms the viewport.
4. **Cinematic Stagecraft:** Deep obsidian surfaces (`#0B0B0F`) punctuated by subtle ambient violet spotlights simulate the dramatic lighting of physical corporate events and stage unveilings.
5. **Radical Authenticity:** Every project image, logo, and statistic is 100% verified. No stock photos of smiling actors in conference rooms, no fake client quotes, and no fabricated ROI metrics.

---

### 2. Design Tokens Matrix (`assets/css/tokens.css`)

#### A. Color Tokens
| Token | Value | Role & Usage |
| :--- | :--- | :--- |
| `--color-bg-base` | `#0B0B0F` | Obsidian Black canvas background. Provides maximum stagecraft depth. |
| `--color-bg-surface` | `#121218` | Elevated dark surface for alternate sections, subpage headers, and footers. |
| `--color-bg-card` | `#16161F` | Elevated card container background with fine structural contrast. |
| `--color-bg-card-hover` | `#1E1E2B` | Hover state for interactive cards and client logo tiles. |
| `--color-border` | `#262636` | Primary structural divider border. |
| `--color-border-light` | `rgba(255, 255, 255, 0.08)` | Delicate interior card separation line. |
| `--color-border-glow` | `rgba(121, 40, 202, 0.35)` | Violet focus and active hover outline glow. |
| `--color-purple-primary` | `#7928CA` | Official Trendz brand signal; primary CTA button gradient and active indicators. |
| `--color-purple-hover` | `#8B3EE0` | Elevated hover tone for primary actions. |
| `--color-purple-deep` | `#5A189A` | Deep violet gradient anchor and scrollbar accents. |
| `--color-lavender` | `#D8B4FE` | Editorial eyebrows, category tags, and stat highlights. |
| `--color-lavender-subtle`| `rgba(216, 180, 254, 0.12)` | Tinted background for eyebrows and process highlights. |
| `--color-text-primary` | `#F8F9FA` | High-contrast white for headings and high-priority copy (18.2:1 contrast). |
| `--color-text-secondary` | `#9E9EAF` | Slate grey for readable paragraph copy (meeting WCAG AAA standards). |
| `--color-text-muted` | `#6C6C7D` | Secondary metadata, dates, and breadcrumb separators. |

#### B. Typographic Tokens
- **Display Typeface:** `Syne` (700/800) — High-personality sculpted geometric display for numeric stats and marquee highlights.
- **Heading Typeface:** `Plus Jakarta Sans` (500/600/700/800) — Precision European grotesque with crisp geometric curves and tight letter-spacing.
- **Body & Interface:** `Inter` (400/500/600) — Ultra-legible neutral grotesque engineered for multi-device readability.

#### C. Fluid Typographic Hierarchy
- **Hero Title (`--text-hero`):** `clamp(2.6rem, 2.0rem + 3.2vw, 4.6rem)` / `line-height: 1.06`
- **Section Title (`--text-3xl`):** `clamp(1.9rem, 1.6rem + 1.3vw, 2.6rem)` / `line-height: 1.15`
- **Card Title (`--text-xl`):** `clamp(1.3rem, 1.2rem + 0.5vw, 1.5rem)` / `line-height: 1.25`
- **Body Large (`--text-lg`):** `clamp(1.1rem, 1.05rem + 0.3vw, 1.25rem)` / `line-height: 1.6`
- **Body Base (`--text-base`):** `clamp(0.95rem, 0.92rem + 0.2vw, 1.05rem)` / `line-height: 1.65`
- **Eyebrow / Badges (`--text-xs`):** `clamp(0.72rem, 0.7rem + 0.1vw, 0.8rem)` / `letter-spacing: 0.16em` / Uppercase

---

### 3. Component Architecture & Specifications

#### A. Button Engine (`.btn`)
- **Primary Action (`.btn--primary`):** Linear gradient from `#7928CA` to `#5A189A`, white text, 1px subtle white border, violet box shadow (`0 8px 32px rgba(121, 40, 202, 0.28)`), pill radius (`9999px`).
- **Secondary Action (`.btn--secondary`):** Translucent backdrop blur (`rgba(255, 255, 255, 0.05)`), 1px solid `#262636`, pill radius.
- **Large Action (`.btn--large`):** Padding `1.05rem 2.25rem`, font size `var(--text-base)`.
- **Keyboard Focus:** 2px solid `#7928CA`, 2px offset.

#### B. Service Pillar Component (`.service-card` / `.service-detail-block`)
- **Visual Differentiation:** Avoids repetitive template cards by utilizing alternating zig-zag editorial layouts on `services.php` and categorized capability cards with custom tag badges on `index.php`.
- **Content Elements:** Pillar number (`01`–`06`), service tag, authentic project photography, capabilities checklist, direct case study linkage, and RFP button.

#### C. Project Card (`.project-card`)
- **Card Geometry:** `border-radius: 28px`, `border: 1px solid #262636`, background `#16161F`.
- **Media Presentation:** `240px` cover image with smooth 1.05x hover zoom, overlaid dual badges (Client pill in dark glass, Scope pill in brand purple).
- **Metadata:** Category tag in lavender uppercase, physical location, objective excerpt, and "Read Case Study" interactive trigger.

#### D. Verified Client Ecosystem (`.client-logo-item` & `.marquee`)
- **Grayscale-to-Color Interaction:** Client logos render at 75% opacity grayscale by default; on hover, they transition to 100% full-color saturation and subtle 1.05x scale.
- **Infinite Marquee:** Seamless CSS keyframe ticker with linear movement, masked on left and right edges with linear opacity gradients to eliminate hard edges.

#### E. Founder Leadership Block (`.founder-card`)
- **Executive Profile:** Large italicized leadership statement by Bharat Jadhav with purple accent border.
- **Personal Stature:** Official digitized signature image (`founder-signature.png`), corporate credentials, and 3 high-impact verified proof badges.

#### F. RFP Contact Experience (`.contact-form`)
- **Fields:** Full Name, Corporate Company, Email, Phone/WhatsApp, Core Requirement (Select dropdown), and Project Scope (Textarea).
- **Anti-Spam Security:** Hidden honeypot field (`website_url_check`) and server-side CSRF validation.
- **Client & Server Feedback:** Explicit accessible error labels (`role="alert"`) and confirmation modal state.

---

### 4. Accessibility & Responsive Standards

1. **WCAG 2.2 AA Compliance:** High contrast text ratios (18.2:1 body, 11.5:1 accents), visible focus-visible rings on all interactive elements, screen-reader text (`.sr-only`), and semantic HTML5 landmark tags (`<header>`, `<nav>`, `<main>`, `<article>`, `<aside>`, `<footer>`).
2. **Prefers-Reduced-Motion:** Fully integrated in `assets/css/motion.css`. Disables ticker animation, scroll reveals, scale transitions, and instant counter values for users with motion sensitivities.
3. **Responsive Breakpoints:** Explicitly engineered for 320px, 360px, 390px, 430px, 768px, 1024px, 1280px, and 1440px+. Minimum 48px hit areas for all handheld touch targets.

