<?php
/**
 * Trendz Eventz — Individual Case Study Detail View
 * Premium Editorial / Organic Case Study System
 *
 * Preserves:
 * - Existing project dataset
 * - Dynamic ?slug= routing
 * - Existing images
 * - Existing project facts
 * - Existing case-study content
 * - Existing contact/work navigation
 */

$slug = trim($_GET['slug'] ?? 'samsung-store-launch');

$PROJECTS = [
    'samsung-store-launch' => [
        'client' => 'Samsung',
        'title' => '100-Store Thematic Retail Launch',
        'category' => 'Retail Launch',
        'scope_badge' => '100 Stores',
        'location' => 'Mumbai, Pune & Bangalore',
        'objective' => 'Give a larger-than-life launch experience to the consumer target group while creating a high feel-good factor and pride for store owners.',
        'scope' => 'Simultaneous thematic retail décor and launch coordination across 100 premium stores in Mumbai, Pune, and Bangalore.',
        'execution' => 'Synchronized store transformations featuring custom branded entrance arches, window display dressing, interactive demo zones, and launch day hospitality for dealer partners.',
        'verified_metric' => '100 stores launched with thematic décor',
        'hero_image' => 'assets/img/work/samsung-store-launch-1.jpg',
        'gallery' => [
            'assets/img/work/samsung-store-launch-1.jpg',
            'assets/img/work/samsung-store-launch-2.jpg',
            'assets/img/work/samsung-store-launch-3.jpg'
        ]
    ],

    'philips-dealers-meet' => [
        'client' => 'Philips',
        'title' => 'National Dealers Meet in Goa',
        'category' => 'Dealer Meet & Celebration',
        'scope_badge' => '~500 Dealers',
        'location' => 'Goa',
        'objective' => 'Celebrate the historic ₹100 Crore sales milestone and host national dealer partners for an executive gala.',
        'scope' => 'Full-scale celebratory convention and hospitality experience in Goa hosting approximately 500 top dealers.',
        'execution' => 'Complete event architecture: thematic stage production, executive keynote presentations, awards gala, entertainment choreography, and luxury delegate management.',
        'verified_metric' => '500 dealers hosted in Goa celebrating ₹100 crore sales',
        'hero_image' => 'assets/img/work/philips-dealers-meet-1.jpg',
        'gallery' => [
            'assets/img/work/philips-dealers-meet-1.jpg',
            'assets/img/work/philips-dealers-meet-2.jpg',
            'assets/img/work/philips-dealers-meet-3.jpg'
        ]
    ],

    'tvs-tyres-launch' => [
        'client' => 'TVS Tyres',
        'title' => 'National 10-City Product Launch Tour',
        'category' => 'Dealer Launch Tour',
        'scope_badge' => '10 Cities',
        'location' => 'Pan-India',
        'objective' => 'Launch an innovative new tyre range to regional dealer networks and internal sales leadership nationwide.',
        'scope' => 'High-production launch events staged in 10 major commercial hub cities across India on a synchronized tour schedule.',
        'execution' => 'Bespoke stage design, dramatic product unveiling mechanisms, audio-visual technical production, and structured dealer interactive sessions executed across all 10 cities.',
        'verified_metric' => '10 cities in the launch tour',
        'hero_image' => 'assets/img/work/tvs-tyres-launch-1.jpg',
        'gallery' => [
            'assets/img/work/tvs-tyres-launch-1.jpg',
            'assets/img/work/tvs-tyres-launch-2.jpg',
            'assets/img/work/tvs-tyres-launch-3.jpg'
        ]
    ],

    'maruti-driving-school' => [
        'client' => 'Maruti Driving School',
        'title' => 'Pan-Metro Driver Recruitment Drive',
        'category' => 'Recruitment & Activation',
        'scope_badge' => '~50 MDS Centres',
        'location' => 'Metro Cities',
        'objective' => 'Create widespread awareness of MDS amongst the target demographic, then recruit, onboard, and register candidate drivers.',
        'scope' => 'Deployed dedicated recruitment teams across approximately 50 Maruti Driving School centres in key metro cities across India.',
        'execution' => 'End-to-end recruitment drives coordinating localized registration setups, branded information kiosks, candidate evaluation workflows, and real-time onboarding reporting.',
        'verified_metric' => '~50 driving school centres covered',
        'hero_image' => 'assets/img/work/maruti-driving-school-1.jpg',
        'gallery' => [
            'assets/img/work/maruti-driving-school-1.jpg',
            'assets/img/work/maruti-driving-school-2.jpg',
            'assets/img/work/maruti-driving-school-3.jpg'
        ]
    ],

    'lipton-mto-activation' => [
        'client' => 'Lipton',
        'title' => 'Modern Trade 200-Store Sampling Program',
        'category' => 'Sampling & Modern Trade',
        'scope_badge' => '200 Stores',
        'location' => 'Metro Cities (Hypercity & Big Bazaar)',
        'objective' => 'Sample Lipton Ice Tea directly to shoppers at point of sale to drive trial and immediate basket conversion.',
        'scope' => 'Trained sampling brand ambassadors deployed across 200 Hypercity and Big Bazaar retail hypermarkets.',
        'execution' => 'High-standard cold-chain sampling kiosks, branded apparel, product freshness protocols, and live consumer feedback collection across 200 large-format stores.',
        'verified_metric' => '200 stores with sampling teams',
        'hero_image' => 'assets/img/work/lipton-mto-activation-1.jpg',
        'gallery' => [
            'assets/img/work/lipton-mto-activation-1.jpg',
            'assets/img/work/lipton-mto-activation-2.jpg',
            'assets/img/work/lipton-mto-activation-3.jpg'
        ]
    ],

    'lipton-mall-engagement' => [
        'client' => 'Lipton',
        'title' => 'In-Mall Experiential Engagement & Games',
        'category' => 'Mall Activation',
        'scope_badge' => 'Multi-Mall Tour',
        'location' => 'Leading Shopping Malls',
        'objective' => 'Engage family and youth demographics in high-traffic shopping atriums through playful interactive branded zones.',
        'scope' => 'Interactive live game arenas and refreshing chilled zones bringing Lipton Ice Tea to life for shoppers.',
        'execution' => 'Custom-built experiential pavilions with digital reaction games, instant photo zones, and chilled sampling bars generating active dwell time.',
        'verified_metric' => 'High-dwell interactive mall installations',
        'hero_image' => 'assets/img/work/lipton-mall-engagement-1.jpg',
        'gallery' => [
            'assets/img/work/lipton-mall-engagement-1.jpg',
            'assets/img/work/lipton-mall-engagement-2.jpg',
            'assets/img/work/lipton-mall-engagement-3.jpg'
        ]
    ],

    'lipton-flash-mob' => [
        'client' => 'Lipton',
        'title' => 'Mall Atrium Flash Mob PR Stunt',
        'category' => 'Guerrilla & PR Stunt',
        'scope_badge' => 'High-Footfall Atrium',
        'location' => 'Premier Metro Mall Atrium',
        'objective' => 'Create a surprise high-energy spectacle that draws immediate crowds and sparks organic social conversation around Lipton.',
        'scope' => 'Surprise choreographed guerrilla dance flash mob in a bustling central mall atrium.',
        'execution' => 'Disguised performers synchronizing to high-beat music, drawing thousands of spectators to the central atrium, followed by immediate chilled sampling distribution.',
        'verified_metric' => 'High-energy crowd spectacle and viral momentum',
        'hero_image' => 'assets/img/work/lipton-flash-mob-1.jpg',
        'gallery' => [
            'assets/img/work/lipton-flash-mob-1.jpg',
            'assets/img/work/lipton-flash-mob-2.jpg',
            'assets/img/work/lipton-flash-mob-3.jpg'
        ]
    ],

    'yokohama-road-safety' => [
        'client' => 'Yokohama',
        'title' => 'Expressway Road Safety Week Activation',
        'category' => 'Public Safety & OOH',
        'scope_badge' => 'Expressway Toll Nakas',
        'location' => 'Mumbai–Pune Expressway',
        'objective' => 'Educate motorists on tyre safety and tyre USPs while supporting state road safety awareness.',
        'scope' => 'On-ground tyre tag and safety inspection distribution at toll nakas on the Mumbai-Pune Expressway in official association with the Traffic Police.',
        'execution' => 'Collaborated with expressway traffic authorities, deployed safety marshals at toll barriers, distributed safety inspection tags to drivers, and conducted visual tyre audits.',
        'verified_metric' => 'Run with the Traffic Police during Road Safety Week',
        'hero_image' => 'assets/img/work/yokohama-road-safety-1.jpg',
        'gallery' => [
            'assets/img/work/yokohama-road-safety-1.jpg',
            'assets/img/work/yokohama-road-safety-2.jpg',
            'assets/img/work/yokohama-road-safety-3.jpg'
        ]
    ],

    'cadbury-shubh-aarambh' => [
        'client' => 'Cadbury',
        'title' => 'Shubh Aarambh Diwali Mall Activation',
        'category' => 'Festive Mall Activation',
        'scope_badge' => '10 Malls',
        'location' => 'Mumbai & Delhi',
        'objective' => 'Celebrate the Diwali festival with Cadbury by creating joyous sweet-sharing moments across premier retail centers.',
        'scope' => 'Elaborate festive thematic installations and interactive engagement zones across 10 top-tier malls in Mumbai and Delhi.',
        'execution' => 'Rich festive gold-and-purple décor, interactive greeting generation, photo moments for families, and festive product gifting touchpoints.',
        'verified_metric' => '10 malls in Mumbai and Delhi',
        'hero_image' => 'assets/img/work/cadbury-shubh-aarambh-1.jpg',
        'gallery' => [
            'assets/img/work/cadbury-shubh-aarambh-1.jpg',
            'assets/img/work/cadbury-shubh-aarambh-2.jpg'
        ]
    ],

    'bombay-dyeing-sales-meet' => [
        'client' => 'Bombay Dyeing',
        'title' => 'National Sales Meet & Awards Gala',
        'category' => 'Sales Meet & Felicitations',
        'scope_badge' => '~600 Sales Staff',
        'location' => 'Pan-India Delegates',
        'objective' => 'Felicitate top-performing national sales staff and unveil commercial strategic targets.',
        'scope' => 'Large-scale national corporate sales convention inviting approximately 600 sales staff from all Indian zones.',
        'execution' => 'Full production staging, bespoke award trophies, dynamic lighting and audio engineering, executive presentations, and motivational stage experiences.',
        'verified_metric' => '600 sales staff felicitated',
        'hero_image' => 'assets/img/work/bombay-dyeing-sales-meet-1.jpg',
        'gallery' => [
            'assets/img/work/bombay-dyeing-sales-meet-1.jpg',
            'assets/img/work/bombay-dyeing-sales-meet-2.jpg',
            'assets/img/work/bombay-dyeing-sales-meet-3.jpg'
        ]
    ],

    'vitra-annual-meet' => [
        'client' => 'Vitra',
        'title' => 'Annual General Meeting & Strategy Assembly',
        'category' => 'Corporate AGM',
        'scope_badge' => 'Annual Meet',
        'location' => 'Corporate Convention Center',
        'objective' => 'Conduct the official Annual General Meeting and establish the commercial agenda for the upcoming fiscal year.',
        'scope' => 'Formal corporate gathering delivering high-clarity keynote staging, executive hospitality, and corporate agenda alignment.',
        'execution' => 'Sophisticated corporate boardroom-grade AV, synchronized presentation systems, seamless executive delegate registration, and protocol management.',
        'verified_metric' => 'AGM annual meet with agenda for the year ahead',
        'hero_image' => 'assets/img/work/vitra-annual-meet-1.jpg',
        'gallery' => [
            'assets/img/work/vitra-annual-meet-1.jpg',
            'assets/img/work/vitra-annual-meet-2.jpg',
            'assets/img/work/vitra-annual-meet-3.jpg'
        ]
    ],

    'hypercity-branding-relaunch' => [
        'client' => 'Hypercity',
        'title' => 'Pan-India Hypermarket Re-Launch & Branding',
        'category' => 'Retail Branding & Relaunch',
        'scope_badge' => 'Pan-India',
        'location' => 'National Store Network',
        'objective' => 'Execute comprehensive store branding and customer re-engagement across Hypercity hypermarkets nationwide.',
        'scope' => 'Overhaul of in-store navigation signage, entrance branding, promotional aisle overheads, and grand re-opening customer activations.',
        'execution' => 'Simultaneous fabrication and overnight installation across all stores, high-visibility promotional exterior graphics, and re-launch engagement activities.',
        'verified_metric' => 'Store branding rolled out across India',
        'hero_image' => 'assets/img/work/hypercity-branding-relaunch-1.jpg',
        'gallery' => [
            'assets/img/work/hypercity-branding-relaunch-1.jpg',
            'assets/img/work/hypercity-branding-relaunch-2.jpg',
            'assets/img/work/hypercity-branding-relaunch-3.jpg'
        ]
    ]
];

$project = $PROJECTS[$slug] ?? $PROJECTS['samsung-store-launch'];

$current_page = 'case-study';

$page_title =
    $project['client'] . ' ' .
    $project['title'] .
    ' | Case Study | Trendz Eventz';

$page_desc =
    'Case study: ' .
    $project['objective'] .
    ' Delivered across ' .
    $project['location'] .
    ' by Trendz Eventz.';

include __DIR__ . '/includes/header.php';

/*
 * Build previous / next navigation without changing
 * the existing dataset.
 */
$projectKeys = array_keys($PROJECTS);
$currentIndex = array_search($slug, $projectKeys, true);

if ($currentIndex === false) {
    $currentIndex = 0;
    $slug = $projectKeys[0];
}

$previousKey = $projectKeys[
    ($currentIndex - 1 + count($projectKeys)) % count($projectKeys)
];

$nextKey = $projectKeys[
    ($currentIndex + 1) % count($projectKeys)
];

$previousProject = $PROJECTS[$previousKey];
$nextProject = $PROJECTS[$nextKey];

$escape = static function ($value) {
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );
};
?>

<style>
/* ==========================================================
   TRENDZ CASE STUDY — EDITORIAL SYSTEM
========================================================== */

:root {
    --cs-ink: #17131f;
    --cs-muted: #716978;
    --cs-purple: #5b21b6;
    --cs-purple-dark: #35145f;
    --cs-purple-deep: #24113f;
    --cs-lilac: #f5f1fa;
    --cs-line: rgba(57, 36, 78, .12);
    --cs-white: #fff;
}

/* ----------------------------------------------------------
   BASE
---------------------------------------------------------- */

.tz-case {
    position: relative;
    overflow: clip;
    color: var(--cs-ink);
    background:
        radial-gradient(
            circle at 7% 5%,
            rgba(124, 58, 237, .07),
            transparent 30rem
        ),
        radial-gradient(
            circle at 94% 24%,
            rgba(14, 165, 233, .055),
            transparent 28rem
        ),
        #fff;
}

.tz-case *,
.tz-case *::before,
.tz-case *::after {
    box-sizing: border-box;
}

.tz-case img {
    display: block;
    max-width: 100%;
}

.tz-case a {
    text-decoration: none;
}

/* ----------------------------------------------------------
   AMBIENT GRID
---------------------------------------------------------- */

.cs-ambient {
    position: absolute;
    inset: 0;
    pointer-events: none;
    overflow: hidden;
    z-index: 0;
}

.cs-grid {
    position: absolute;
    inset: 0;

    background-image:
        linear-gradient(
            rgba(91, 33, 182, .038) 1px,
            transparent 1px
        ),
        linear-gradient(
            90deg,
            rgba(91, 33, 182, .038) 1px,
            transparent 1px
        );

    background-size: 48px 48px;

    mask-image:
        linear-gradient(
            to bottom,
            black 0%,
            black 38%,
            transparent 82%
        );
}

.cs-orb {
    position: absolute;
    border-radius: 999px;
    pointer-events: none;
}

.cs-orb-1 {
    width: 380px;
    height: 380px;
    top: 3rem;
    right: -13rem;
    background: rgba(139, 92, 246, .11);
    filter: blur(5px);
    animation: csFloatOne 12s ease-in-out infinite;
}

.cs-orb-2 {
    width: 240px;
    height: 240px;
    top: 72rem;
    left: -10rem;
    background: rgba(34, 211, 238, .07);
    filter: blur(4px);
    animation: csFloatTwo 15s ease-in-out infinite;
}

.cs-orb-3 {
    width: 300px;
    height: 300px;
    top: 150rem;
    right: -12rem;
    background: rgba(236, 72, 153, .06);
    filter: blur(5px);
    animation: csFloatOne 18s ease-in-out infinite reverse;
}

@keyframes csFloatOne {
    0%,100% {
        transform: translate3d(0,0,0);
    }

    50% {
        transform: translate3d(-24px,28px,0);
    }
}

@keyframes csFloatTwo {
    0%,100% {
        transform: translate3d(0,0,0);
    }

    50% {
        transform: translate3d(22px,-20px,0);
    }
}

/* ----------------------------------------------------------
   HERO
---------------------------------------------------------- */

.cs-hero {
    position: relative;
    z-index: 1;
    padding:
        5.5rem
        1.25rem
        5rem;
}

.cs-hero-inner {
    width: min(1240px, 100%);
    margin-inline: auto;
}

.cs-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: .55rem;
    margin-bottom: 2.5rem;

    font-size: .67rem;
    font-weight: 800;
    letter-spacing: .1em;
    text-transform: uppercase;

    color: #8d8594;
}

.cs-breadcrumb a {
    color: #8d8594;
    transition: color .25s ease;
}

.cs-breadcrumb a:hover {
    color: var(--cs-purple);
}

.cs-breadcrumb-current {
    color: var(--cs-purple);
}

.cs-hero-grid {
    display: grid;
    grid-template-columns:
        minmax(0, 1.08fr)
        minmax(340px, .92fr);

    gap: clamp(3rem, 7vw, 7rem);
    align-items: center;
}

.cs-kicker {
    display: inline-flex;
    align-items: center;
    gap: .7rem;

    padding: .55rem .8rem;

    border: 1px solid rgba(91, 33, 182, .15);
    border-radius: 999px;

    background: rgba(255,255,255,.78);

    color: var(--cs-purple);

    font-size: .64rem;
    font-weight: 900;
    letter-spacing: .14em;
    text-transform: uppercase;

    backdrop-filter: blur(14px);
}

.cs-kicker-dot {
    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: var(--cs-purple);

    box-shadow:
        0 0 0 6px rgba(91,33,182,.07);
}

.cs-client {
    margin-top: 1.35rem;

    color: var(--cs-purple);

    font-size: clamp(1.1rem, 2vw, 1.45rem);

    font-weight: 900;

    letter-spacing: -.02em;
}

.cs-title {
    max-width: 900px;

    margin: .35rem 0 1.4rem;

    font-size:
        clamp(
            3rem,
            7vw,
            6.5rem
        );

    line-height: .88;

    letter-spacing: -.065em;

    font-weight: 900;

    color: var(--cs-ink);
}

.cs-title span {
    display: block;
    color: var(--cs-purple);
}

.cs-objective {
    max-width: 700px;

    margin: 0;

    color: var(--cs-muted);

    font-size:
        clamp(
            1rem,
            1.5vw,
            1.18rem
        );

    line-height: 1.8;
}

.cs-meta {
    display: flex;
    flex-wrap: wrap;
    gap: .65rem;

    margin-top: 1.8rem;
}

.cs-meta-item {
    display: inline-flex;
    align-items: center;
    gap: .45rem;

    min-height: 38px;

    padding: .55rem .75rem;

    border:
        1px solid
        rgba(55, 36, 78, .1);

    border-radius: 999px;

    background: rgba(255,255,255,.72);

    color: #5d5664;

    font-size: .66rem;

    font-weight: 800;

    backdrop-filter: blur(10px);
}

.cs-meta-item svg {
    width: 14px;
    height: 14px;
    color: var(--cs-purple);
}

/* ----------------------------------------------------------
   HERO VISUAL
---------------------------------------------------------- */

.cs-hero-visual {
    position: relative;

    min-height: 520px;

    display: flex;

    align-items: center;

    justify-content: center;
}

.cs-hero-image-wrap {
    position: relative;

    width: min(560px, 100%);

    aspect-ratio: .88;

    z-index: 2;
}

.cs-hero-image {
    position: relative;

    width: 100%;
    height: 100%;

    overflow: hidden;

    border-radius:
        46% 54% 42% 58% /
        48% 42% 58% 52%;

    background: #eeeaf1;

    box-shadow:
        0 45px 100px
        rgba(44, 24, 66, .16);

    transform: rotate(-2deg);

    transition:
        transform 1s
        cubic-bezier(.16,1,.3,1);
}

.cs-hero-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transform: scale(1.035);

    transition:
        transform 1.2s
        cubic-bezier(.16,1,.3,1);
}

.cs-hero-image-wrap:hover .cs-hero-image {
    transform: rotate(0deg) scale(1.01);
}

.cs-hero-image-wrap:hover .cs-hero-image img {
    transform: scale(1.075);
}

.cs-image-overlay {
    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(23, 13, 35, .46),
            transparent 50%
        );

    pointer-events: none;
}

.cs-hero-caption {
    position: absolute;

    left: 1.4rem;
    right: 1.4rem;
    bottom: 1.4rem;

    z-index: 2;

    display: flex;
    justify-content: space-between;
    align-items: end;

    gap: 1rem;

    color: white;
}

.cs-hero-caption small {
    display: block;

    margin-bottom: .25rem;

    opacity: .72;

    font-size: .58rem;
    font-weight: 900;
    letter-spacing: .14em;
    text-transform: uppercase;
}

.cs-hero-caption strong {
    font-size: .92rem;
    font-weight: 850;
}

.cs-hero-arrow {
    width: 48px;
    height: 48px;

    display: grid;
    place-items: center;

    border:
        1px solid
        rgba(255,255,255,.3);

    border-radius: 50%;

    background:
        rgba(255,255,255,.12);

    backdrop-filter: blur(12px);
}

.cs-hero-arrow svg {
    width: 17px;
}

.cs-ring {
    position: absolute;

    width: 440px;
    height: 440px;

    border:
        1px solid
        rgba(91,33,182,.13);

    border-radius: 50%;

    animation:
        csSpin 28s linear infinite;
}

.cs-ring::before,
.cs-ring::after {
    content: "";

    position: absolute;

    border-radius: 50%;

    border:
        1px dashed
        rgba(91,33,182,.12);
}

.cs-ring::before {
    inset: 42px;
}

.cs-ring::after {
    inset: 105px;
}

@keyframes csSpin {
    to {
        transform: rotate(360deg);
    }
}

.cs-orbit-label {
    position: absolute;

    z-index: 4;

    padding: .65rem .8rem;

    border:
        1px solid
        rgba(91,33,182,.12);

    border-radius: 999px;

    background:
        rgba(255,255,255,.9);

    box-shadow:
        0 18px 50px
        rgba(45,24,70,.08);

    backdrop-filter: blur(14px);

    color: #625a69;

    font-size: .59rem;
    font-weight: 900;
    letter-spacing: .1em;
    text-transform: uppercase;
}

.cs-orbit-label-1 {
    top: 8%;
    right: 0;
}

.cs-orbit-label-2 {
    left: -2%;
    bottom: 13%;
}

.cs-orbit-label-3 {
    right: 8%;
    bottom: 0;
}

/* ----------------------------------------------------------
   STICKY CASE NAV
---------------------------------------------------------- */

.cs-sticky-nav {
    position: sticky;
    top: 1rem;

    z-index: 30;

    width:
        min(
            1180px,
            calc(100% - 2.5rem)
        );

    margin:
        0 auto
        2rem;

    display: flex;
    align-items: center;

    gap: .3rem;

    padding: .42rem;

    border:
        1px solid
        rgba(55,36,78,.1);

    border-radius: 999px;

    background:
        rgba(255,255,255,.88);

    box-shadow:
        0 20px 60px
        rgba(45,24,70,.08);

    backdrop-filter: blur(20px);

    overflow-x: auto;

    scrollbar-width: none;
}

.cs-sticky-nav::-webkit-scrollbar {
    display: none;
}

.cs-nav-link {
    flex: 0 0 auto;

    display: inline-flex;
    align-items: center;
    gap: .45rem;

    padding: .68rem .82rem;

    border-radius: 999px;

    color: #746c7b;

    font-size: .64rem;
    font-weight: 850;

    white-space: nowrap;

    transition:
        color .25s ease,
        background .25s ease;
}

.cs-nav-link span {
    color: #a29aa8;
    font-size: .56rem;
}

.cs-nav-link:hover,
.cs-nav-link.active {
    color: white;
    background: var(--cs-purple);
}

.cs-nav-link:hover span,
.cs-nav-link.active span {
    color: rgba(255,255,255,.7);
}

/* ----------------------------------------------------------
   OVERVIEW
---------------------------------------------------------- */

.cs-overview {
    position: relative;
    z-index: 1;

    width:
        min(
            1180px,
            calc(100% - 2.5rem)
        );

    margin:
        5rem auto
        7rem;
}

.cs-overview-grid {
    display: grid;

    grid-template-columns:
        minmax(0, 1.35fr)
        minmax(300px, .65fr);

    gap: 5rem;

    align-items: start;
}

.cs-section-kicker {
    display: inline-flex;
    align-items: center;
    gap: .6rem;

    color: var(--cs-purple);

    font-size: .65rem;
    font-weight: 900;

    letter-spacing: .15em;

    text-transform: uppercase;
}

.cs-section-kicker::before {
    content: "";

    width: 26px;
    height: 1px;

    background: var(--cs-purple);
}

.cs-section-title {
    max-width: 800px;

    margin:
        .75rem 0
        1.25rem;

    font-size:
        clamp(
            2rem,
            4.5vw,
            4rem
        );

    line-height: .96;

    letter-spacing: -.055em;

    font-weight: 900;
}

.cs-section-copy {
    max-width: 760px;

    color: var(--cs-muted);

    font-size:
        clamp(
            .98rem,
            1.3vw,
            1.08rem
        );

    line-height: 1.85;
}

.cs-fact-panel {
    position: relative;

    padding: 1.6rem;

    border:
        1px solid
        rgba(91,33,182,.1);

    border-radius: 28px;

    background:
        linear-gradient(
            145deg,
            #faf8fc,
            #f5f1fa
        );

    overflow: hidden;
}

.cs-fact-panel::after {
    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    right: -100px;
    bottom: -100px;

    border:
        1px solid
        rgba(91,33,182,.1);

    border-radius: 50%;
}

.cs-fact-title {
    position: relative;
    z-index: 1;

    padding-bottom: .9rem;

    border-bottom:
        1px solid
        var(--cs-line);

    color: var(--cs-ink);

    font-size: .8rem;

    font-weight: 900;

    letter-spacing: .1em;

    text-transform: uppercase;
}

.cs-fact {
    position: relative;
    z-index: 1;

    padding: 1rem 0;

    border-bottom:
        1px solid
        rgba(55,36,78,.08);
}

.cs-fact:last-child {
    border-bottom: 0;
}

.cs-fact-label {
    display: block;

    margin-bottom: .25rem;

    color: #9a929f;

    font-size: .58rem;

    font-weight: 900;

    letter-spacing: .12em;

    text-transform: uppercase;
}

.cs-fact-value {
    color: #41394a;

    font-size: .78rem;

    line-height: 1.55;

    font-weight: 750;
}

.cs-fact-highlight {
    color: var(--cs-purple-dark);
}

/* ----------------------------------------------------------
   HERO CASE VISUAL
---------------------------------------------------------- */

.cs-showcase {
    position: relative;

    z-index: 1;

    width:
        min(
            1240px,
            calc(100% - 2.5rem)
        );

    margin:
        0 auto
        8rem;
}

.cs-showcase-frame {
    position: relative;

    height:
        clamp(
            460px,
            62vw,
            760px
        );

    overflow: hidden;

    border-radius:
        44px
        44px
        44px
        12px;

    background: #eeeaf1;

    box-shadow:
        0 45px 110px
        rgba(43,23,65,.14);
}

.cs-showcase-frame img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transform:
        scale(1.035);

    transition:
        transform 1.2s
        cubic-bezier(.16,1,.3,1);
}

.cs-showcase-frame:hover img {
    transform: scale(1.065);
}

.cs-showcase-overlay {
    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(23,13,35,.7),
            transparent 58%
        );
}

.cs-showcase-content {
    position: absolute;

    left: clamp(1.3rem, 4vw, 3.5rem);
    right: clamp(1.3rem, 4vw, 3.5rem);
    bottom: clamp(1.3rem, 4vw, 3.5rem);

    display: flex;
    align-items: end;
    justify-content: space-between;

    gap: 2rem;

    color: white;
}

.cs-showcase-kicker {
    display: block;

    margin-bottom: .45rem;

    color: rgba(255,255,255,.68);

    font-size: .62rem;
    font-weight: 900;

    letter-spacing: .15em;

    text-transform: uppercase;
}

.cs-showcase-title {
    max-width: 800px;

    font-size:
        clamp(
            1.7rem,
            4vw,
            4rem
        );

    line-height: .98;

    letter-spacing: -.04em;

    font-weight: 900;
}

.cs-showcase-badge {
    flex: 0 0 auto;

    display: flex;
    align-items: center;
    justify-content: center;

    min-width: 150px;
    min-height: 74px;

    padding: 1rem;

    border:
        1px solid
        rgba(255,255,255,.25);

    border-radius: 22px;

    background:
        rgba(255,255,255,.1);

    backdrop-filter: blur(14px);

    text-align: center;
}

.cs-showcase-badge strong {
    display: block;

    font-size: .75rem;

    font-weight: 900;
}

/* ----------------------------------------------------------
   PROCESS STORY
---------------------------------------------------------- */

.cs-story {
    position: relative;

    z-index: 1;

    width:
        min(
            1180px,
            calc(100% - 2.5rem)
        );

    margin:
        0 auto
        8rem;
}

.cs-story-header {
    max-width: 760px;

    margin-bottom: 4rem;
}

.cs-story-grid {
    position: relative;

    display: grid;

    grid-template-columns:
        repeat(3, minmax(0,1fr));

    gap: 1rem;
}

.cs-story-card {
    position: relative;

    min-height: 360px;

    padding: 2rem;

    border:
        1px solid
        rgba(55,36,78,.1);

    border-radius:
        30px
        30px
        12px
        30px;

    background: white;

    box-shadow:
        0 20px 60px
        rgba(45,24,70,.055);

    transition:
        transform .4s
        cubic-bezier(.16,1,.3,1),
        box-shadow .4s ease,
        border-color .4s ease;

    overflow: hidden;
}

.cs-story-card:nth-child(2) {
    margin-top: 3rem;

    border-radius:
        30px
        12px
        30px
        30px;
}

.cs-story-card:nth-child(3) {
    margin-top: 6rem;

    border-radius:
        12px
        30px
        30px
        30px;
}

.cs-story-card:hover {
    transform: translateY(-9px);

    border-color:
        rgba(91,33,182,.2);

    box-shadow:
        0 30px 80px
        rgba(45,24,70,.11);
}

.cs-story-number {
    position: absolute;

    top: 1.4rem;
    right: 1.5rem;

    color:
        rgba(91,33,182,.08);

    font-size: 5rem;

    line-height: 1;

    font-weight: 950;

    letter-spacing: -.08em;
}

.cs-story-icon {
    width: 50px;
    height: 50px;

    display: grid;
    place-items: center;

    margin-bottom: 2rem;

    border-radius:
        18px
        18px
        8px
        18px;

    color: var(--cs-purple);

    background:
        rgba(91,33,182,.08);
}

.cs-story-icon svg {
    width: 21px;
}

.cs-story-label {
    display: block;

    margin-bottom: .65rem;

    color: var(--cs-purple);

    font-size: .62rem;

    font-weight: 900;

    letter-spacing: .14em;

    text-transform: uppercase;
}

.cs-story-title {
    margin: 0 0 1rem;

    font-size:
        clamp(
            1.45rem,
            2.2vw,
            2rem
        );

    line-height: 1;

    letter-spacing: -.035em;

    font-weight: 900;
}

.cs-story-copy {
    color: var(--cs-muted);

    font-size: .9rem;

    line-height: 1.8;
}

/* ----------------------------------------------------------
   VERIFIED SCALE
---------------------------------------------------------- */

.cs-proof {
    position: relative;

    z-index: 1;

    width:
        min(
            1180px,
            calc(100% - 2.5rem)
        );

    margin:
        0 auto
        8rem;
}

.cs-proof-panel {
    position: relative;

    padding:
        clamp(2rem, 5vw, 4.5rem);

    overflow: hidden;

    border-radius: 42px;

    color: white;

    background:
        radial-gradient(
            circle at 90% 15%,
            rgba(168,85,247,.28),
            transparent 28rem
        ),
        linear-gradient(
            135deg,
            #291141,
            #4c1d95 58%,
            #35145f
        );

    box-shadow:
        0 40px 100px
        rgba(55,18,94,.2);
}

.cs-proof-panel::before,
.cs-proof-panel::after {
    content: "";

    position: absolute;

    border:
        1px solid
        rgba(255,255,255,.1);

    border-radius: 50%;
}

.cs-proof-panel::before {
    width: 500px;
    height: 500px;

    right: -230px;
    top: -290px;
}

.cs-proof-panel::after {
    width: 330px;
    height: 330px;

    right: -140px;
    top: -200px;

    border-style: dashed;
}

.cs-proof-header {
    position: relative;

    z-index: 1;

    max-width: 700px;

    margin-bottom: 3rem;
}

.cs-proof-kicker {
    color: #d8b4fe;

    font-size: .64rem;

    font-weight: 900;

    letter-spacing: .15em;

    text-transform: uppercase;
}

.cs-proof-title {
    margin-top: .65rem;

    font-size:
        clamp(
            2rem,
            4vw,
            3.8rem
        );

    line-height: .95;

    letter-spacing: -.05em;

    font-weight: 900;
}

.cs-proof-copy {
    max-width: 620px;

    margin-top: .9rem;

    color:
        rgba(255,255,255,.68);

    line-height: 1.75;

    font-size: .92rem;
}

.cs-proof-stat-grid {
    position: relative;

    z-index: 1;

    display: grid;

    grid-template-columns:
        repeat(2, minmax(0,1fr));

    gap: 1px;

    background:
        rgba(255,255,255,.13);
}

.cs-proof-stat {
    min-height: 150px;

    padding: 1.5rem;

    background:
        rgba(255,255,255,.055);

    backdrop-filter: blur(8px);
}

.cs-proof-stat-label {
    display: block;

    margin-bottom: .55rem;

    color:
        rgba(255,255,255,.48);

    font-size: .58rem;

    font-weight: 900;

    letter-spacing: .13em;

    text-transform: uppercase;
}

.cs-proof-stat-value {
    display: block;

    color: white;

    font-size:
        clamp(
            1.25rem,
            2.5vw,
            2rem
        );

    line-height: 1.1;

    font-weight: 900;
}

/* ----------------------------------------------------------
   GALLERY
---------------------------------------------------------- */

.cs-gallery {
    position: relative;

    z-index: 1;

    width:
        min(
            1180px,
            calc(100% - 2.5rem)
        );

    margin:
        0 auto
        8rem;
}

.cs-gallery-header {
    display: flex;

    justify-content: space-between;

    align-items: end;

    gap: 2rem;

    margin-bottom: 2.5rem;
}

.cs-gallery-title {
    margin-top: .7rem;

    font-size:
        clamp(
            2rem,
            4vw,
            3.8rem
        );

    line-height: .95;

    letter-spacing: -.05em;

    font-weight: 900;
}

.cs-gallery-subtitle {
    max-width: 430px;

    color: var(--cs-muted);

    font-size: .88rem;

    line-height: 1.7;
}

.cs-gallery-grid {
    display: grid;

    grid-template-columns:
        repeat(12, minmax(0,1fr));

    gap: 1rem;
}

.cs-gallery-item {
    position: relative;

    overflow: hidden;

    min-height: 330px;

    border-radius: 30px;

    background: #eeeaf1;

    box-shadow:
        0 20px 60px
        rgba(45,24,70,.07);
}

.cs-gallery-item:nth-child(1) {
    grid-column: span 7;
}

.cs-gallery-item:nth-child(2) {
    grid-column: span 5;

    min-height: 430px;
}

.cs-gallery-item:nth-child(3) {
    grid-column: span 5;

    min-height: 430px;
}

.cs-gallery-item:nth-child(4) {
    grid-column: span 7;
}

.cs-gallery-item img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition:
        transform 1s
        cubic-bezier(.16,1,.3,1);
}

.cs-gallery-item:hover img {
    transform: scale(1.06);
}

.cs-gallery-shade {
    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(23,13,35,.4),
            transparent 55%
        );

    pointer-events: none;
}

.cs-gallery-index {
    position: absolute;

    left: 1rem;
    bottom: 1rem;

    width: 38px;
    height: 38px;

    display: grid;
    place-items: center;

    border:
        1px solid
        rgba(255,255,255,.24);

    border-radius: 50%;

    color: white;

    background:
        rgba(255,255,255,.1);

    backdrop-filter: blur(12px);

    font-size: .62rem;

    font-weight: 900;
}

/* ----------------------------------------------------------
   CTA
---------------------------------------------------------- */

.cs-cta {
    position: relative;

    z-index: 1;

    width:
        min(
            1180px,
            calc(100% - 2.5rem)
        );

    margin:
        0 auto
        7rem;
}

.cs-cta-panel {
    position: relative;

    padding:
        clamp(2.5rem, 7vw, 6rem);

    overflow: hidden;

    border:
        1px solid
        rgba(91,33,182,.1);

    border-radius: 44px;

    background:
        radial-gradient(
            circle at 10% 20%,
            rgba(236,72,153,.13),
            transparent 25rem
        ),
        radial-gradient(
            circle at 85% 70%,
            rgba(34,211,238,.09),
            transparent 25rem
        ),
        linear-gradient(
            135deg,
            #f8f4fb,
            #fff
        );
}

.cs-cta-panel::before,
.cs-cta-panel::after {
    content: "";

    position: absolute;

    border:
        1px solid
        rgba(91,33,182,.09);

    border-radius: 50%;
}

.cs-cta-panel::before {
    width: 520px;
    height: 520px;

    right: -240px;
    top: -300px;
}

.cs-cta-panel::after {
    width: 340px;
    height: 340px;

    right: -145px;
    top: -210px;

    border-style: dashed;
}

.cs-cta-content {
    position: relative;

    z-index: 2;

    max-width: 780px;
}

.cs-cta-kicker {
    color: var(--cs-purple);

    font-size: .65rem;

    font-weight: 900;

    letter-spacing: .15em;

    text-transform: uppercase;
}

.cs-cta-title {
    margin:
        .7rem 0
        1rem;

    font-size:
        clamp(
            2.4rem,
            5vw,
            5rem
        );

    line-height: .92;

    letter-spacing: -.06em;

    font-weight: 900;
}

.cs-cta-copy {
    max-width: 640px;

    color: var(--cs-muted);

    line-height: 1.8;

    font-size: .95rem;
}

.cs-cta-actions {
    display: flex;

    flex-wrap: wrap;

    gap: .75rem;

    margin-top: 2rem;
}

.cs-btn-primary,
.cs-btn-secondary {
    min-height: 50px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: .55rem;

    padding:
        .8rem 1.2rem;

    border-radius: 999px;

    font-size: .73rem;

    font-weight: 900;

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;
}

.cs-btn-primary {
    color: white;

    background:
        var(--cs-purple);

    box-shadow:
        0 16px 40px
        rgba(91,33,182,.2);
}

.cs-btn-primary:hover {
    transform: translateY(-3px);

    box-shadow:
        0 22px 52px
        rgba(91,33,182,.3);

    background:
        #4c1d95;
}

.cs-btn-secondary {
    color: var(--cs-ink);

    border:
        1px solid
        var(--cs-line);

    background:
        rgba(255,255,255,.72);
}

.cs-btn-secondary:hover {
    transform: translateY(-3px);

    border-color:
        rgba(91,33,182,.28);

    color:
        var(--cs-purple);
}

/* ----------------------------------------------------------
   PREVIOUS / NEXT
---------------------------------------------------------- */

.cs-next-project {
    position: relative;

    z-index: 1;

    width:
        min(
            1180px,
            calc(100% - 2.5rem)
        );

    margin:
        0 auto
        7rem;
}

.cs-next-grid {
    display: grid;

    grid-template-columns:
        repeat(2, minmax(0,1fr));

    gap: 1rem;
}

.cs-project-nav {
    position: relative;

    min-height: 260px;

    display: flex;

    flex-direction: column;

    justify-content: end;

    padding: 2rem;

    overflow: hidden;

    border-radius: 30px;

    color: white;

    background:
        var(--cs-purple-deep);

    isolation: isolate;
}

.cs-project-nav::before {
    content: "";

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(15,8,24,.8),
            rgba(15,8,24,.05)
        );

    z-index: 1;
}

.cs-project-nav img {
    position: absolute;

    inset: 0;

    width: 100%;
    height: 100%;

    object-fit: cover;

    opacity: .58;

    z-index: 0;

    transition:
        transform 1s
        cubic-bezier(.16,1,.3,1);
}

.cs-project-nav:hover img {
    transform: scale(1.06);
}

.cs-project-content {
    position: relative;

    z-index: 2;
}

.cs-project-direction {
    display: block;

    margin-bottom: .65rem;

    color:
        rgba(255,255,255,.62);

    font-size: .58rem;

    font-weight: 900;

    letter-spacing: .15em;

    text-transform: uppercase;
}

.cs-project-client {
    display: block;

    color:
        #d8b4fe;

    font-size: .7rem;

    font-weight: 900;

    letter-spacing: .1em;

    text-transform: uppercase;
}

.cs-project-title {
    display: block;

    max-width: 480px;

    margin-top: .25rem;

    color: white;

    font-size:
        clamp(
            1.35rem,
            2.5vw,
            2.2rem
        );

    line-height: .98;

    letter-spacing: -.035em;

    font-weight: 900;
}

/* ----------------------------------------------------------
   REVEALS
---------------------------------------------------------- */

.cs-reveal,
.cs-reveal-left,
.cs-reveal-right {
    opacity: 0;

    transition:
        opacity .9s
        cubic-bezier(.16,1,.3,1),
        transform 1s
        cubic-bezier(.16,1,.3,1);
}

.cs-reveal {
    transform: translateY(40px);
}

.cs-reveal-left {
    transform: translateX(-45px);
}

.cs-reveal-right {
    transform: translateX(45px);
}

.cs-reveal.is-visible,
.cs-reveal-left.is-visible,
.cs-reveal-right.is-visible {
    opacity: 1;
    transform: none;
}

/* ----------------------------------------------------------
   RESPONSIVE
---------------------------------------------------------- */

@media (max-width: 950px) {

    .cs-hero-grid,
    .cs-overview-grid {
        grid-template-columns: 1fr;
    }

    .cs-hero-grid {
        gap: 3rem;
    }

    .cs-hero-visual {
        min-height: 460px;
    }

    .cs-overview-grid {
        gap: 2rem;
    }

    .cs-story-grid {
        grid-template-columns: 1fr;
    }

    .cs-story-card,
    .cs-story-card:nth-child(2),
    .cs-story-card:nth-child(3) {
        margin-top: 0;
        min-height: auto;
    }

    .cs-story-card {
        min-height: 300px;
    }

    .cs-gallery-item:nth-child(1),
    .cs-gallery-item:nth-child(2),
    .cs-gallery-item:nth-child(3),
    .cs-gallery-item:nth-child(4) {
        grid-column: span 6;
    }

    .cs-gallery-item:nth-child(2),
    .cs-gallery-item:nth-child(3) {
        min-height: 350px;
    }
}

@media (max-width: 700px) {

    .cs-hero {
        padding:
            4.5rem
            1rem
            4rem;
    }

    .cs-title {
        font-size:
            clamp(
                3rem,
                15vw,
                5rem
            );
    }

    .cs-hero-visual {
        min-height: 350px;
    }

    .cs-ring {
        width: 290px;
        height: 290px;
    }

    .cs-hero-image-wrap {
        width: min(430px, 88vw);
    }

    .cs-orbit-label {
        font-size: .52rem;
        padding: .5rem .6rem;
    }

    .cs-orbit-label-2 {
        left: 0;
    }

    .cs-sticky-nav {
        width:
            calc(100% - 2rem);

        border-radius: 18px;
    }

    .cs-overview,
    .cs-showcase,
    .cs-story,
    .cs-proof,
    .cs-gallery,
    .cs-cta,
    .cs-next-project {
        width:
            calc(100% - 2rem);
    }

    .cs-overview {
        margin-top: 4rem;
        margin-bottom: 5rem;
    }

    .cs-showcase {
        margin-bottom: 5rem;
    }

    .cs-showcase-frame {
        height: 430px;
        border-radius: 28px;
    }

    .cs-showcase-content {
        flex-direction: column;
        align-items: flex-start;
    }

    .cs-showcase-badge {
        min-width: auto;
        min-height: 54px;
        padding: .7rem 1rem;
    }

    .cs-story,
    .cs-proof,
    .cs-gallery {
        margin-bottom: 5rem;
    }

    .cs-proof-panel {
        border-radius: 28px;
        padding: 2rem 1.2rem;
    }

    .cs-proof-stat-grid {
        grid-template-columns: 1fr;
    }

    .cs-gallery-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .cs-gallery-grid {
        grid-template-columns: 1fr;
    }

    .cs-gallery-item:nth-child(1),
    .cs-gallery-item:nth-child(2),
    .cs-gallery-item:nth-child(3),
    .cs-gallery-item:nth-child(4) {
        grid-column: auto;
        min-height: 330px;
    }

    .cs-cta-panel {
        padding: 2.2rem 1.3rem;
        border-radius: 28px;
    }

    .cs-cta-actions {
        flex-direction: column;
    }

    .cs-btn-primary,
    .cs-btn-secondary {
        width: 100%;
    }

    .cs-next-grid {
        grid-template-columns: 1fr;
    }

    .cs-project-nav {
        min-height: 230px;
    }
}

/* ----------------------------------------------------------
   REDUCED MOTION
---------------------------------------------------------- */

@media (prefers-reduced-motion: reduce) {

    .tz-case *,
    .tz-case *::before,
    .tz-case *::after {
        animation-duration: .01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: .01ms !important;
        scroll-behavior: auto !important;
    }

    .cs-reveal,
    .cs-reveal-left,
    .cs-reveal-right {
        opacity: 1;
        transform: none;
    }
}
</style>

<main class="tz-case">

    <!-- Ambient background -->
    <div class="cs-ambient" aria-hidden="true">
        <div class="cs-grid"></div>
        <div class="cs-orb cs-orb-1"></div>
        <div class="cs-orb cs-orb-2"></div>
        <div class="cs-orb cs-orb-3"></div>
    </div>

    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="cs-hero">

        <div class="cs-hero-inner">

            <nav class="cs-breadcrumb" aria-label="Breadcrumb">

                <a href="index.php">
                    Home
                </a>

                <span>/</span>

                <a href="work.php">
                    Work
                </a>

                <span>/</span>

                <span class="cs-breadcrumb-current">
                    <?= $escape($project['client']) ?>
                </span>

            </nav>

            <div class="cs-hero-grid">

                <!-- Hero Copy -->

                <div class="cs-reveal-left">

                    <div class="cs-kicker">
                        <span class="cs-kicker-dot"></span>
                        Verified Case Study
                    </div>

                    <div class="cs-client">
                        <?= $escape($project['client']) ?>
                    </div>

                    <h1 class="cs-title">
                        <?= $escape($project['title']) ?>
                        <span>
                            <?= $escape($project['scope_badge']) ?>
                        </span>
                    </h1>

                    <p class="cs-objective">
                        <?= $escape($project['objective']) ?>
                    </p>

                    <div class="cs-meta">

                        <div class="cs-meta-item">
                            <i data-lucide="layers-3"></i>
                            <?= $escape($project['category']) ?>
                        </div>

                        <div class="cs-meta-item">
                            <i data-lucide="map-pin"></i>
                            <?= $escape($project['location']) ?>
                        </div>

                        <div class="cs-meta-item">
                            <i data-lucide="badge-check"></i>
                            <?= $escape($project['verified_metric']) ?>
                        </div>

                    </div>

                </div>

                <!-- Hero Visual -->

                <div class="cs-hero-visual cs-reveal-right">

                    <div class="cs-ring" aria-hidden="true"></div>

                    <div class="cs-hero-image-wrap">

                        <figure class="cs-hero-image">

                            <img
                                src="<?= $escape($project['hero_image']) ?>"
                                alt="<?= $escape($project['client'] . ' — ' . $project['title']) ?>"
                            >

                            <div
                                class="cs-image-overlay"
                                aria-hidden="true"
                            ></div>

                            <figcaption class="cs-hero-caption">

                                <div>
                                    <small>
                                        Production documentation
                                    </small>

                                    <strong>
                                        <?= $escape($project['client']) ?>
                                        ·
                                        <?= $escape($project['scope_badge']) ?>
                                    </strong>
                                </div>

                                <span class="cs-hero-arrow">
                                    <i data-lucide="arrow-up-right"></i>
                                </span>

                            </figcaption>

                        </figure>

                    </div>

                    <span class="cs-orbit-label cs-orbit-label-1">
                        <?= $escape($project['category']) ?>
                    </span>

                    <span class="cs-orbit-label cs-orbit-label-2">
                        On Ground
                    </span>

                    <span class="cs-orbit-label cs-orbit-label-3">
                        Trendz Eventz
                    </span>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
         STICKY CASE NAV
    ====================================================== -->

    <nav class="cs-sticky-nav" aria-label="Case study sections">

        <a
            href="#overview"
            class="cs-nav-link active"
        >
            <span>01</span>
            Overview
        </a>

        <a
            href="#execution"
            class="cs-nav-link"
        >
            <span>02</span>
            Execution
        </a>

        <a
            href="#proof"
            class="cs-nav-link"
        >
            <span>03</span>
            Verified Scale
        </a>

        <a
            href="#gallery"
            class="cs-nav-link"
        >
            <span>04</span>
            Visual Proof
        </a>

        <a
            href="#next-project"
            class="cs-nav-link"
        >
            <span>05</span>
            More Work
        </a>

    </nav>

    <!-- =====================================================
         OVERVIEW
    ====================================================== -->

    <section
        class="cs-overview cs-reveal"
        id="overview"
    >

        <div class="cs-overview-grid">

            <div>

                <span class="cs-section-kicker">
                    The Brief
                </span>

                <h2 class="cs-section-title">
                    The objective behind the experience.
                </h2>

                <p class="cs-section-copy">
                    <?= $escape($project['objective']) ?>
                </p>

            </div>

            <aside class="cs-fact-panel">

                <div class="cs-fact-title">
                    Project Intelligence
                </div>

                <div class="cs-fact">

                    <span class="cs-fact-label">
                        Client Partner
                    </span>

                    <span class="cs-fact-value">
                        <?= $escape($project['client']) ?>
                    </span>

                </div>

                <div class="cs-fact">

                    <span class="cs-fact-label">
                        Category
                    </span>

                    <span class="cs-fact-value">
                        <?= $escape($project['category']) ?>
                    </span>

                </div>

                <div class="cs-fact">

                    <span class="cs-fact-label">
                        Deployment
                    </span>

                    <span class="cs-fact-value">
                        <?= $escape($project['location']) ?>
                    </span>

                </div>

                <div class="cs-fact">

                    <span class="cs-fact-label">
                        Verified Scale
                    </span>

                    <span class="cs-fact-value cs-fact-highlight">
                        <?= $escape($project['verified_metric']) ?>
                    </span>

                </div>

            </aside>

        </div>

    </section>

    <!-- =====================================================
         IMMERSIVE SHOWCASE
    ====================================================== -->

    <section class="cs-showcase cs-reveal">

        <figure class="cs-showcase-frame">

            <img
                src="<?= $escape($project['hero_image']) ?>"
                alt="<?= $escape($project['client'] . ' ' . $project['title']) ?>"
                loading="eager"
            >

            <div
                class="cs-showcase-overlay"
                aria-hidden="true"
            ></div>

            <div class="cs-showcase-content">

                <div>

                    <span class="cs-showcase-kicker">
                        Case Study / <?= $escape($project['category']) ?>
                    </span>

                    <div class="cs-showcase-title">
                        <?= $escape($project['client']) ?>.
                        <?= $escape($project['title']) ?>
                    </div>

                </div>

                <div class="cs-showcase-badge">

                    <strong>
                        <?= $escape($project['verified_metric']) ?>
                    </strong>

                </div>

            </div>

        </figure>

    </section>

    <!-- =====================================================
         EXECUTION STORY
    ====================================================== -->

    <section
        class="cs-story"
        id="execution"
    >

        <div class="cs-story-header cs-reveal">

            <span class="cs-section-kicker">
                Execution Architecture
            </span>

            <h2 class="cs-section-title">
                From brief to on-ground reality.
            </h2>

            <p class="cs-section-copy">
                The project was structured around the requirements,
                deployment footprint, and execution discipline documented
                for this engagement.
            </p>

        </div>

        <div class="cs-story-grid">

            <!-- Objective -->

            <article class="cs-story-card cs-reveal">

                <span class="cs-story-number">
                    01
                </span>

                <div class="cs-story-icon">
                    <i data-lucide="target"></i>
                </div>

                <span class="cs-story-label">
                    Objective
                </span>

                <h3 class="cs-story-title">
                    Define the outcome.
                </h3>

                <p class="cs-story-copy">
                    <?= $escape($project['objective']) ?>
                </p>

            </article>

            <!-- Scope -->

            <article class="cs-story-card cs-reveal">

                <span class="cs-story-number">
                    02
                </span>

                <div class="cs-story-icon">
                    <i data-lucide="route"></i>
                </div>

                <span class="cs-story-label">
                    Scope
                </span>

                <h3 class="cs-story-title">
                    Architect the deployment.
                </h3>

                <p class="cs-story-copy">
                    <?= $escape($project['scope']) ?>
                </p>

            </article>

            <!-- Execution -->

            <article class="cs-story-card cs-reveal">

                <span class="cs-story-number">
                    03
                </span>

                <div class="cs-story-icon">
                    <i data-lucide="zap"></i>
                </div>

                <span class="cs-story-label">
                    Execution
                </span>

                <h3 class="cs-story-title">
                    Make it happen.
                </h3>

                <p class="cs-story-copy">
                    <?= $escape($project['execution']) ?>
                </p>

            </article>

        </div>

    </section>

    <!-- =====================================================
         VERIFIED PROOF
    ====================================================== -->

    <section
        class="cs-proof cs-reveal"
        id="proof"
    >

        <div class="cs-proof-panel">

            <div class="cs-proof-header">

                <span class="cs-proof-kicker">
                    Verified Project Proof
                </span>

                <h2 class="cs-proof-title">
                    Scale that can be attached to the work.
                </h2>

                <p class="cs-proof-copy">
                    The project evidence below is taken directly from
                    the case-study record rather than reconstructed
                    from generic agency claims.
                </p>

            </div>

            <div class="cs-proof-stat-grid">

                <div class="cs-proof-stat">

                    <span class="cs-proof-stat-label">
                        Client
                    </span>

                    <span class="cs-proof-stat-value">
                        <?= $escape($project['client']) ?>
                    </span>

                </div>

                <div class="cs-proof-stat">

                    <span class="cs-proof-stat-label">
                        Category
                    </span>

                    <span class="cs-proof-stat-value">
                        <?= $escape($project['category']) ?>
                    </span>

                </div>

                <div class="cs-proof-stat">

                    <span class="cs-proof-stat-label">
                        Deployment
                    </span>

                    <span class="cs-proof-stat-value">
                        <?= $escape($project['location']) ?>
                    </span>

                </div>

                <div class="cs-proof-stat">

                    <span class="cs-proof-stat-label">
                        Verified Metric
                    </span>

                    <span class="cs-proof-stat-value">
                        <?= $escape($project['verified_metric']) ?>
                    </span>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
         VISUAL DOCUMENTATION
    ====================================================== -->

    <?php if (!empty($project['gallery'])): ?>

        <section
            class="cs-gallery"
            id="gallery"
        >

            <div class="cs-gallery-header cs-reveal">

                <div>

                    <span class="cs-section-kicker">
                        Visual Documentation
                    </span>

                    <h2 class="cs-gallery-title">
                        The work, on ground.
                    </h2>

                </div>

                <p class="cs-gallery-subtitle">
                    Selected project imagery from the supplied
                    case-study documentation.
                </p>

            </div>

            <div class="cs-gallery-grid">

                <?php foreach ($project['gallery'] as $index => $photo): ?>

                    <figure
                        class="cs-gallery-item cs-reveal"
                    >

                        <img
                            src="<?= $escape($photo) ?>"
                            alt="<?= $escape(
                                $project['client'] .
                                ' ' .
                                $project['title'] .
                                ' — project image ' .
                                ($index + 1)
                            ) ?>"
                            loading="lazy"
                        >

                        <div
                            class="cs-gallery-shade"
                            aria-hidden="true"
                        ></div>

                        <span
                            class="cs-gallery-index"
                            aria-hidden="true"
                        >
                            <?= str_pad(
                                (string) ($index + 1),
                                2,
                                '0',
                                STR_PAD_LEFT
                            ) ?>
                        </span>

                    </figure>

                <?php endforeach; ?>

            </div>

        </section>

    <?php endif; ?>

    <!-- =====================================================
         CTA
    ====================================================== -->

    <section class="cs-cta cs-reveal">

        <div class="cs-cta-panel">

            <div class="cs-cta-content">

                <span class="cs-cta-kicker">
                    Build something at this scale
                </span>

                <h2 class="cs-cta-title">
                    Your next brief
                    deserves the same discipline.
                </h2>

                <p class="cs-cta-copy">
                    Tell us what you are planning, where it needs to happen,
                    and what the experience needs to achieve.
                </p>

                <div class="cs-cta-actions">

                    <a
                        href="contact.php?requirement=<?= urlencode($project['category']) ?>"
                        class="cs-btn-primary"
                    >
                        Plan a Similar Event
                        <i data-lucide="arrow-up-right"></i>
                    </a>

                    <a
                        href="work.php"
                        class="cs-btn-secondary"
                    >
                        Explore More Work
                        <i data-lucide="images"></i>
                    </a>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
         PREVIOUS / NEXT PROJECT
    ====================================================== -->

    <section
        class="cs-next-project"
        id="next-project"
    >

        <div class="cs-next-grid">

            <a
                href="case-study.php?slug=<?= urlencode($previousKey) ?>"
                class="cs-project-nav cs-reveal"
                aria-label="Previous case study"
            >

                <img
                    src="<?= $escape($previousProject['hero_image']) ?>"
                    alt=""
                    loading="lazy"
                >

                <div class="cs-project-content">

                    <span class="cs-project-direction">
                        ← Previous Case Study
                    </span>

                    <span class="cs-project-client">
                        <?= $escape($previousProject['client']) ?>
                    </span>

                    <span class="cs-project-title">
                        <?= $escape($previousProject['title']) ?>
                    </span>

                </div>

            </a>

            <a
                href="case-study.php?slug=<?= urlencode($nextKey) ?>"
                class="cs-project-nav cs-reveal"
                aria-label="Next case study"
            >

                <img
                    src="<?= $escape($nextProject['hero_image']) ?>"
                    alt=""
                    loading="lazy"
                >

                <div class="cs-project-content">

                    <span class="cs-project-direction">
                        Next Case Study →
                    </span>

                    <span class="cs-project-client">
                        <?= $escape($nextProject['client']) ?>
                    </span>

                    <span class="cs-project-title">
                        <?= $escape($nextProject['title']) ?>
                    </span>

                </div>

            </a>

        </div>

    </section>

</main>

<!-- ==========================================================
     GSAP
========================================================== -->

<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* -------------------------------------------------------
       Lucide
    ------------------------------------------------------- */

    if (window.lucide) {
        lucide.createIcons();
    }

    /* -------------------------------------------------------
       Reduced motion
    ------------------------------------------------------- */

    const reduceMotion =
        window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;

    /* -------------------------------------------------------
       Intersection Observer
    ------------------------------------------------------- */

    const reveals =
        document.querySelectorAll(
            '.cs-reveal, .cs-reveal-left, .cs-reveal-right'
        );

    if (
        !reduceMotion &&
        'IntersectionObserver' in window
    ) {

        const observer =
            new IntersectionObserver(
                function (entries, obs) {

                    entries.forEach(function (entry) {

                        if (!entry.isIntersecting) {
                            return;
                        }

                        entry.target.classList.add(
                            'is-visible'
                        );

                        obs.unobserve(
                            entry.target
                        );

                    });

                },
                {
                    threshold: .12,
                    rootMargin:
                        '0px 0px -70px 0px'
                }
            );

        reveals.forEach(function (element) {
            observer.observe(element);
        });

    } else {

        reveals.forEach(function (element) {
            element.classList.add('is-visible');
        });

    }

    /* -------------------------------------------------------
       GSAP / ScrollTrigger
    ------------------------------------------------------- */

    if (
        !reduceMotion &&
        window.gsap &&
        window.ScrollTrigger
    ) {

        gsap.registerPlugin(
            ScrollTrigger
        );

        /* Hero image parallax */

        const heroImage =
            document.querySelector(
                '.cs-hero-image img'
            );

        if (heroImage) {

            gsap.to(heroImage, {

                yPercent: 6,

                ease: 'none',

                scrollTrigger: {
                    trigger: '.cs-hero',
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 1.2
                }

            });

        }

        /* Main showcase parallax */

        const showcaseImage =
            document.querySelector(
                '.cs-showcase-frame img'
            );

        if (showcaseImage) {

            gsap.fromTo(
                showcaseImage,
                {
                    yPercent: -4,
                    scale: 1.08
                },
                {
                    yPercent: 5,
                    scale: 1.02,
                    ease: 'none',

                    scrollTrigger: {
                        trigger:
                            '.cs-showcase',
                        start:
                            'top bottom',
                        end:
                            'bottom top',
                        scrub: 1.1
                    }
                }
            );

        }

        /* Gallery subtle parallax */

        document
            .querySelectorAll(
                '.cs-gallery-item img'
            )
            .forEach(function (image) {

                gsap.fromTo(
                    image,
                    {
                        yPercent: -3
                    },
                    {
                        yPercent: 3,
                        ease: 'none',

                        scrollTrigger: {
                            trigger:
                                image.closest(
                                    '.cs-gallery-item'
                                ),
                            start:
                                'top bottom',
                            end:
                                'bottom top',
                            scrub: 1
                        }
                    }
                );

            });

    }

    /* -------------------------------------------------------
       Sticky navigation active section
    ------------------------------------------------------- */

    const navLinks =
        document.querySelectorAll(
            '.cs-nav-link'
        );

    const sections = [
        'overview',
        'execution',
        'proof',
        'gallery',
        'next-project'
    ]
        .map(function (id) {
            return document.getElementById(id);
        })
        .filter(Boolean);

    if (
        'IntersectionObserver' in window &&
        sections.length
    ) {

        const sectionObserver =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(function (entry) {

                        if (!entry.isIntersecting) {
                            return;
                        }

                        navLinks.forEach(
                            function (link) {

                                const target =
                                    link.getAttribute(
                                        'href'
                                    );

                                link.classList.toggle(
                                    'active',
                                    target ===
                                        '#' +
                                        entry.target.id
                                );

                            }
                        );

                    });

                },
                {
                    threshold: .35,
                    rootMargin:
                        '-15% 0px -55% 0px'
                }
            );

        sections.forEach(function (section) {
            sectionObserver.observe(section);
        });

    }

    /* -------------------------------------------------------
       Smooth section navigation
    ------------------------------------------------------- */

    document
        .querySelectorAll(
            '.cs-nav-link'
        )
        .forEach(function (link) {

            link.addEventListener(
                'click',
                function (event) {

                    const targetId =
                        this.getAttribute(
                            'href'
                        );

                    if (
                        !targetId ||
                        targetId === '#'
                    ) {
                        return;
                    }

                    const target =
                        document.querySelector(
                            targetId
                        );

                    if (!target) {
                        return;
                    }

                    event.preventDefault();

                    target.scrollIntoView({
                        behavior:
                            reduceMotion
                                ? 'auto'
                                : 'smooth',
                        block: 'start'
                    });

                }
            );

        });

    /* -------------------------------------------------------
       Cursor-reactive hero lighting
    ------------------------------------------------------- */

    if (
        !reduceMotion &&
        window.matchMedia(
            '(pointer: fine)'
        ).matches
    ) {

        const hero =
            document.querySelector(
                '.cs-hero'
            );

        if (hero) {

            hero.addEventListener(
                'pointermove',
                function (event) {

                    const rect =
                        hero.getBoundingClientRect();

                    const x =
                        ((event.clientX -
                            rect.left) /
                            rect.width) *
                        100;

                    const y =
                        ((event.clientY -
                            rect.top) /
                            rect.height) *
                        100;

                    hero.style.background =
                        `
                        radial-gradient(
                            circle at ${x}% ${y}%,
                            rgba(124,58,237,.075),
                            transparent 28rem
                        ),
                        #fff
                        `;

                },
                {
                    passive: true
                }
            );

        }

    }

});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>