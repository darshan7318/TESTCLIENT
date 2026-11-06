<?php
/**
 * Trendz Eventz — Client Partners & Ecosystem
 * Premium Editorial Client Portfolio
 * Minimal PHP + Tailwind CSS + DaisyUI
 */

$current_page = 'clients';

$page_title = 'Client Partners & Ecosystem | Trendz Eventz — Trusted by India\'s Leading Brands';

$page_desc = 'Brands that trust Trendz Eventz: Philips, TVS Tyres, Samsung, Cadbury, Lipton, Maruti Driving School, Bombay Dyeing, Vitra, Yamaha, and more.';

include __DIR__ . '/includes/header.php';

$CLIENTS = [
    [
        'name' => 'Samsung',
        'logo' => 'assets/img/clients/samsung.png',
        'industry' => 'Consumer Electronics',
        'highlight' => '100-Store Thematic Retail Launch in 3 Cities'
    ],
    [
        'name' => 'Philips',
        'logo' => 'assets/img/clients/philips.png',
        'industry' => 'Lighting & Healthtech',
        'highlight' => '500-Dealer Meet in Goa Celebrating ₹100 Cr'
    ],
    [
        'name' => 'TVS Tyres',
        'logo' => 'assets/img/clients/tvs-tyres.png',
        'industry' => 'Automotive & Tyres',
        'highlight' => 'National 10-City Dealer Launch Tour'
    ],
    [
        'name' => 'Lipton',
        'logo' => 'assets/img/clients/lipton.png',
        'industry' => 'Beverages / FMCG',
        'highlight' => '200-Store Sampling & High-Footfall Mall Activations'
    ],
    [
        'name' => 'Cadbury',
        'logo' => 'assets/img/clients/cadbury.png',
        'industry' => 'Confectionery / FMCG',
        'highlight' => 'Shubh Aarambh 10-Mall Festive Tour'
    ],
    [
        'name' => 'Maruti Driving School',
        'logo' => 'assets/img/clients/maruti-driving-school.png',
        'industry' => 'Automotive & Driver Education',
        'highlight' => '~50 Centres Driver Recruitment Drive'
    ],
    [
        'name' => 'Bombay Dyeing',
        'logo' => 'assets/img/clients/bombay-dyeing.png',
        'industry' => 'Textiles & Retail',
        'highlight' => '600 Sales Staff National Sales Felicitations'
    ],
    [
        'name' => 'Vitra',
        'logo' => 'assets/img/clients/vitra.png',
        'industry' => 'Bathware & Architecture',
        'highlight' => 'Corporate Annual General Meeting'
    ],
    [
        'name' => 'Yamaha',
        'logo' => 'assets/img/clients/yamaha.png',
        'industry' => 'Two-Wheelers & Motors',
        'highlight' => 'Experiential Brand Activations'
    ],
    [
        'name' => 'Force Motors',
        'logo' => 'assets/img/clients/force-motors.png',
        'industry' => 'Commercial Vehicles',
        'highlight' => 'Commercial Vehicle Brand Activations'
    ],
    [
        'name' => 'MAN Truck',
        'logo' => 'assets/img/clients/man-truck.png',
        'industry' => 'Heavy Automotive',
        'highlight' => 'Heavy Vehicle Corporate Showcase'
    ],
    [
        'name' => 'BIG FM',
        'logo' => 'assets/img/clients/big-fm.png',
        'industry' => 'Broadcast & Entertainment',
        'highlight' => 'On-Ground Radio Campaign Activations'
    ],
    [
        'name' => 'Radio City',
        'logo' => 'assets/img/clients/radio-city.png',
        'industry' => 'Media & Broadcast',
        'highlight' => 'City-Wide Broadcast Event Partnerships'
    ]
];

$CLIENT_COUNT = count($CLIENTS);
?>

<style>

/* =========================================================
   TRENDZ CLIENTS — PREMIUM ECOSYSTEM
========================================================= */

:root {
    --tz-client-violet: #5b21b6;
    --tz-client-deep: #24113f;
    --tz-client-ink: #19131f;
    --tz-client-muted: #746d78;
    --tz-client-line: rgba(31, 20, 42, .10);
}

/* =========================================================
   PAGE
========================================================= */

.tz-clients {
    position: relative;
    overflow: hidden;
    background:
        linear-gradient(
            180deg,
            #fbf9ff 0%,
            #ffffff 30%,
            #ffffff 70%,
            #faf8fc 100%
        );
    color: var(--tz-client-ink);
}

.tz-clients ::selection {
    background: #ddd0f8;
    color: #28143e;
}

/* =========================================================
   AMBIENT ART
========================================================= */

.tz-client-ambient {
    position: absolute;
    inset: 0;
    pointer-events: none;
    overflow: hidden;
    z-index: 0;
}

.tz-client-grid {
    position: absolute;
    inset: 0;
    opacity: .22;

    background-image:
        radial-gradient(
            rgba(91, 33, 182, .22) 1px,
            transparent 1px
        );

    background-size: 28px 28px;

    mask-image:
        linear-gradient(
            to bottom,
            black 0%,
            transparent 40%,
            transparent 72%,
            black 100%
        );
}

.tz-client-orb {
    position: absolute;
    border-radius: 999px;
    filter: blur(12px);
    opacity: .48;
    animation: tzClientFloat 13s ease-in-out infinite alternate;
}

.tz-client-orb-1 {
    width: 470px;
    height: 470px;
    top: -220px;
    right: -130px;

    background:
        radial-gradient(
            circle,
            rgba(168, 85, 247, .24),
            transparent 70%
        );
}

.tz-client-orb-2 {
    width: 390px;
    height: 390px;
    top: 700px;
    left: -210px;

    background:
        radial-gradient(
            circle,
            rgba(59, 130, 246, .12),
            transparent 70%
        );

    animation-delay: -4s;
}

.tz-client-orb-3 {
    width: 430px;
    height: 430px;
    bottom: 400px;
    right: -220px;

    background:
        radial-gradient(
            circle,
            rgba(236, 72, 153, .10),
            transparent 70%
        );

    animation-delay: -8s;
}

@keyframes tzClientFloat {
    from {
        transform: translate3d(0, 0, 0) scale(1);
    }

    to {
        transform: translate3d(0, 28px, 0) scale(1.04);
    }
}

/* =========================================================
   HERO
========================================================= */

.tz-client-hero {
    position: relative;
    z-index: 1;

    padding:
        clamp(52px, 8vw, 110px)
        0
        clamp(45px, 7vw, 90px);
}

.tz-client-hero-inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
}

@media (min-width: 640px) {
    .tz-client-hero-inner {
        padding-left: 28px;
        padding-right: 28px;
    }
}

@media (min-width: 1024px) {
    .tz-client-hero-inner {
        padding-left: 40px;
        padding-right: 40px;
    }
}

.tz-client-breadcrumb {
    display: flex;
    align-items: center;
    gap: 9px;

    margin-bottom: 32px;

    font-size: 10px;
    font-weight: 800;
    letter-spacing: .15em;
    text-transform: uppercase;
}

.tz-client-breadcrumb a {
    color: #8b848f;
    transition: color .25s ease;
}

.tz-client-breadcrumb a:hover {
    color: var(--tz-client-violet);
}

.tz-client-breadcrumb span {
    color: #c9c2ce;
}

.tz-client-breadcrumb strong {
    color: var(--tz-client-violet);
}

.tz-client-hero-grid {
    display: grid;
    grid-template-columns:
        minmax(0, 1.3fr)
        minmax(280px, .7fr);

    gap: clamp(40px, 8vw, 100px);

    align-items: end;
}

@media (max-width: 900px) {
    .tz-client-hero-grid {
        grid-template-columns: 1fr;
    }
}

.tz-client-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;

    color: var(--tz-client-violet);

    font-size: 10px;
    font-weight: 900;
    letter-spacing: .19em;
    text-transform: uppercase;

    margin-bottom: 22px;
}

.tz-client-eyebrow::before {
    content: "";

    width: 34px;
    height: 1px;

    background: currentColor;
}

.tz-client-title {
    max-width: 900px;

    margin: 0;

    font-size:
        clamp(48px, 8vw, 100px);

    line-height: .91;

    letter-spacing: -.065em;

    font-weight: 900;

    color: #17121c;
}

.tz-client-title em {
    color: var(--tz-client-violet);
    font-style: italic;
    font-weight: 500;
}

.tz-client-hero-copy {
    max-width: 450px;

    margin: 0 0 6px auto;

    color: #716a76;

    font-size: 16px;
    line-height: 1.8;
}

@media (max-width: 900px) {
    .tz-client-hero-copy {
        margin-left: 0;
        max-width: 680px;
    }
}

/* =========================================================
   HERO NETWORK VISUAL
========================================================= */

.tz-client-network {
    max-width: 1280px;
    margin: 0 auto;

    padding:
        0 20px
        clamp(40px, 7vw, 78px);
}

@media (min-width: 640px) {
    .tz-client-network {
        padding-left: 28px;
        padding-right: 28px;
    }
}

@media (min-width: 1024px) {
    .tz-client-network {
        padding-left: 40px;
        padding-right: 40px;
    }
}

.tz-client-network-inner {
    position: relative;

    min-height: 210px;

    border-top: 1px solid var(--tz-client-line);
    border-bottom: 1px solid var(--tz-client-line);

    display: flex;
    align-items: center;

    overflow: hidden;
}

.tz-client-network-inner::before {
    content: "";

    position: absolute;

    left: 0;
    right: 0;
    top: 50%;

    height: 1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(91, 33, 182, .18),
            transparent
        );
}

.tz-network-center {
    position: absolute;

    left: 50%;
    top: 50%;

    transform:
        translate(-50%, -50%);

    width: 112px;
    height: 112px;

    border-radius: 50%;

    display: grid;
    place-items: center;

    background:
        radial-gradient(
            circle at 35% 30%,
            #7c3aed,
            #35115f 70%
        );

    color: white;

    box-shadow:
        0 20px 55px rgba(91,33,182,.22);

    z-index: 3;
}

.tz-network-center::before {
    content: "";

    position: absolute;

    inset: -14px;

    border:
        1px solid rgba(91,33,182,.22);

    border-radius: 50%;

    animation: tzNetworkPulse 3.4s ease-in-out infinite;
}

.tz-network-center span {
    position: relative;

    font-size: 10px;
    line-height: 1.2;

    text-align: center;

    font-weight: 900;

    letter-spacing: .12em;
    text-transform: uppercase;
}

.tz-network-node {
    position: absolute;

    width: 88px;
    height: 88px;

    border-radius: 50%;

    background: white;

    border: 1px solid #e8e1ed;

    box-shadow:
        0 14px 35px rgba(37,20,51,.07);

    display: grid;
    place-items: center;

    transition:
        transform .35s ease,
        border-color .35s ease,
        box-shadow .35s ease;
}

.tz-network-node:hover {
    transform: translateY(-6px);

    border-color:
        rgba(91,33,182,.35);

    box-shadow:
        0 20px 45px rgba(91,33,182,.12);
}

.tz-network-node img {
    max-width: 62px;
    max-height: 30px;

    object-fit: contain;

    filter: grayscale(1);
    opacity: .65;

    transition:
        filter .35s ease,
        opacity .35s ease;
}

.tz-network-node:hover img {
    filter: grayscale(0);
    opacity: 1;
}

.tz-network-node-1 {
    left: 7%;
    top: 25%;
}

.tz-network-node-2 {
    left: 22%;
    top: 8%;
}

.tz-network-node-3 {
    left: 34%;
    top: 57%;
}

.tz-network-node-4 {
    right: 34%;
    top: 10%;
}

.tz-network-node-5 {
    right: 22%;
    top: 56%;
}

.tz-network-node-6 {
    right: 7%;
    top: 25%;
}

@keyframes tzNetworkPulse {
    0%,
    100% {
        transform: scale(.96);
        opacity: .55;
    }

    50% {
        transform: scale(1.05);
        opacity: 1;
    }
}

@media (max-width: 700px) {

    .tz-client-network-inner {
        min-height: 180px;
    }

    .tz-network-center {
        width: 86px;
        height: 86px;
    }

    .tz-network-node {
        width: 60px;
        height: 60px;
    }

    .tz-network-node img {
        max-width: 42px;
        max-height: 22px;
    }

    .tz-network-node-1 {
        left: 3%;
    }

    .tz-network-node-2 {
        left: 17%;
        top: 4%;
    }

    .tz-network-node-3 {
        left: 25%;
        top: 63%;
    }

    .tz-network-node-4 {
        right: 25%;
        top: 4%;
    }

    .tz-network-node-5 {
        right: 17%;
        top: 63%;
    }

    .tz-network-node-6 {
        right: 3%;
    }
}

/* =========================================================
   CLIENT PORTFOLIO
========================================================= */

.tz-client-portfolio {
    position: relative;
    z-index: 1;

    padding:
        50px 0
        clamp(90px, 10vw, 140px);
}

.tz-client-container {
    max-width: 1280px;
    margin: 0 auto;

    padding: 0 20px;
}

@media (min-width: 640px) {
    .tz-client-container {
        padding-left: 28px;
        padding-right: 28px;
    }
}

@media (min-width: 1024px) {
    .tz-client-container {
        padding-left: 40px;
        padding-right: 40px;
    }
}

.tz-client-section-heading {
    display: grid;

    grid-template-columns:
        minmax(0, 1fr)
        minmax(250px, .5fr);

    gap: 40px;

    align-items: end;

    margin-bottom: 48px;
}

@media (max-width: 800px) {
    .tz-client-section-heading {
        grid-template-columns: 1fr;
    }
}

.tz-client-kicker {
    display: block;

    color: #948c98;

    font-size: 10px;
    font-weight: 900;
    letter-spacing: .2em;
    text-transform: uppercase;

    margin-bottom: 10px;
}

.tz-client-section-title {
    margin: 0;

    font-size:
        clamp(34px, 5vw, 60px);

    line-height: .95;

    letter-spacing: -.055em;

    font-weight: 900;
}

.tz-client-section-description {
    margin: 0;

    color: #776f7b;

    font-size: 13px;
    line-height: 1.75;
}

/* =========================================================
   CLIENT GRID
========================================================= */

.tz-client-grid {
    display: grid;

    grid-template-columns:
        repeat(12, minmax(0, 1fr));

    gap: 18px;
}

.tz-client-card {
    position: relative;

    min-height: 310px;

    grid-column: span 4;

    padding: 30px;

    border:
        1px solid #e8e1eb;

    border-radius: 28px;

    background:
        rgba(255,255,255,.78);

    overflow: hidden;

    display: flex;
    flex-direction: column;

    transition:
        transform .45s cubic-bezier(.2,.7,.2,1),
        border-color .35s ease,
        box-shadow .45s ease;

    backdrop-filter: blur(12px);
}

.tz-client-card:nth-child(2),
.tz-client-card:nth-child(5),
.tz-client-card:nth-child(8),
.tz-client-card:nth-child(11) {
    transform: translateY(24px);
}

.tz-client-card:hover {
    transform:
        translateY(-8px) !important;

    border-color:
        rgba(91,33,182,.30);

    box-shadow:
        0 30px 70px rgba(47,25,67,.10);
}

@media (max-width: 1000px) {

    .tz-client-card {
        grid-column: span 6;
    }

    .tz-client-card:nth-child(2),
    .tz-client-card:nth-child(5),
    .tz-client-card:nth-child(8),
    .tz-client-card:nth-child(11) {
        transform: none;
    }
}

@media (max-width: 620px) {

    .tz-client-grid {
        grid-template-columns: 1fr;
    }

    .tz-client-card {
        grid-column: span 1;
        min-height: 285px;
        padding: 26px;
    }
}

/* ---------- Decorative number ---------- */

.tz-client-card-number {
    position: absolute;

    top: 18px;
    right: 23px;

    color: #eee8f2;

    font-size: 55px;
    line-height: 1;

    font-weight: 900;

    letter-spacing: -.08em;

    pointer-events: none;
}

/* ---------- Logo ---------- */

.tz-client-logo-wrap {
    position: relative;

    width: 100%;
    height: 82px;

    display: flex;
    align-items: center;
}

.tz-client-logo {
    max-width: 150px;
    max-height: 55px;

    object-fit: contain;

    filter: grayscale(1);
    opacity: .66;

    transition:
        filter .45s ease,
        opacity .45s ease,
        transform .45s ease;
}

.tz-client-card:hover .tz-client-logo {
    filter: grayscale(0);
    opacity: 1;
    transform: scale(1.04);
}

/* ---------- Industry ---------- */

.tz-client-industry {
    align-self: flex-start;

    display: inline-flex;

    padding: 7px 10px;

    border:
        1px solid #e9e1f1;

    border-radius: 999px;

    background: #f8f5fc;

    color: #6c5485;

    font-size: 8px;
    line-height: 1;

    font-weight: 900;

    letter-spacing: .12em;

    text-transform: uppercase;

    margin-bottom: 18px;
}

/* ---------- Content ---------- */

.tz-client-name {
    margin: 0 0 8px;

    font-size: 25px;
    line-height: 1;

    letter-spacing: -.04em;

    font-weight: 900;

    color: #1c1621;
}

.tz-client-highlight {
    margin: 0;

    max-width: 340px;

    color: #756d79;

    font-size: 12px;
    line-height: 1.7;
}

.tz-client-card-footer {
    margin-top: auto;

    padding-top: 22px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    border-top:
        1px solid rgba(31,20,42,.08);
}

.tz-client-card-footer span {
    color: #9a929d;

    font-size: 8px;
    font-weight: 900;

    letter-spacing: .15em;

    text-transform: uppercase;
}

.tz-client-card-footer i {
    color: var(--tz-client-violet);

    width: 15px;
}

/* =========================================================
   PROOF SECTION
========================================================= */

.tz-client-proof {
    position: relative;

    z-index: 1;

    padding:
        0 20px
        100px;
}

.tz-client-proof-inner {
    max-width: 1280px;

    margin: 0 auto;

    padding:
        clamp(45px, 7vw, 75px);

    border-radius: 34px;

    background:
        radial-gradient(
            circle at 90% 10%,
            rgba(192,132,252,.23),
            transparent 30%
        ),
        linear-gradient(
            135deg,
            #24113f 0%,
            #421666 100%
        );

    color: #fff;

    position: relative;

    overflow: hidden;
}

.tz-client-proof-inner::before {
    content: "";

    position: absolute;

    width: 430px;
    height: 200px;

    right: -130px;
    bottom: -100px;

    border:
        1px solid rgba(255,255,255,.14);

    border-radius: 50%;

    transform: rotate(-15deg);
}

.tz-client-proof-header {
    position: relative;
    z-index: 2;

    max-width: 750px;

    margin-bottom: 45px;
}

.tz-client-proof-kicker {
    display: block;

    color: #d9bdfd;

    font-size: 9px;
    font-weight: 900;

    letter-spacing: .2em;

    text-transform: uppercase;

    margin-bottom: 14px;
}

.tz-client-proof-title {
    margin: 0;

    font-size:
        clamp(35px, 6vw, 70px);

    line-height: .95;

    letter-spacing: -.055em;

    font-weight: 900;
}

.tz-client-proof-copy {
    max-width: 650px;

    margin: 18px 0 0;

    color: rgba(255,255,255,.67);

    font-size: 14px;
    line-height: 1.75;
}

.tz-client-proof-grid {
    position: relative;
    z-index: 2;

    display: grid;

    grid-template-columns:
        repeat(4, minmax(0,1fr));

    border-top:
        1px solid rgba(255,255,255,.14);

    border-bottom:
        1px solid rgba(255,255,255,.14);
}

@media (max-width: 700px) {
    .tz-client-proof-grid {
        grid-template-columns:
            repeat(2, minmax(0,1fr));
    }
}

.tz-client-proof-stat {
    min-height: 145px;

    padding: 28px 20px;

    border-right:
        1px solid rgba(255,255,255,.14);
}

.tz-client-proof-stat:last-child {
    border-right: 0;
}

@media (max-width: 700px) {

    .tz-client-proof-stat:nth-child(2) {
        border-right: 0;
    }

    .tz-client-proof-stat:nth-child(-n+2) {
        border-bottom:
            1px solid rgba(255,255,255,.14);
    }
}

.tz-client-proof-number {
    display: block;

    font-size: 39px;
    line-height: 1;

    font-weight: 900;

    letter-spacing: -.05em;

    color: #fff;
}

.tz-client-proof-label {
    display: block;

    margin-top: 10px;

    color: rgba(255,255,255,.72);

    font-size: 10px;
    font-weight: 800;

    line-height: 1.4;
}

.tz-client-proof-sub {
    display: block;

    margin-top: 6px;

    color: rgba(255,255,255,.42);

    font-size: 8px;

    line-height: 1.5;

    letter-spacing: .08em;

    text-transform: uppercase;
}

/* =========================================================
   CLOSING CTA
========================================================= */

.tz-client-cta {
    position: relative;

    z-index: 1;

    padding:
        0 20px
        100px;
}

.tz-client-cta-inner {
    max-width: 1280px;

    margin: 0 auto;

    display: flex;

    align-items: flex-end;

    justify-content: space-between;

    gap: 40px;

    padding-bottom: 80px;

    border-bottom:
        1px solid var(--tz-client-line);
}

@media (max-width: 800px) {
    .tz-client-cta-inner {
        flex-direction: column;
        align-items: flex-start;
    }
}

.tz-client-cta-kicker {
    display: block;

    color: var(--tz-client-violet);

    font-size: 10px;
    font-weight: 900;

    letter-spacing: .2em;

    text-transform: uppercase;

    margin-bottom: 13px;
}

.tz-client-cta-title {
    max-width: 700px;

    margin: 0;

    font-size:
        clamp(38px, 6vw, 70px);

    line-height: .94;

    letter-spacing: -.055em;

    font-weight: 900;
}

.tz-client-cta-title em {
    color: var(--tz-client-violet);

    font-style: italic;

    font-weight: 500;
}

.tz-client-cta-copy {
    max-width: 470px;

    margin: 18px 0 0;

    color: #766e7a;

    font-size: 14px;

    line-height: 1.75;
}

.tz-client-cta-action {
    flex: 0 0 auto;

    display: inline-flex;

    align-items: center;

    gap: 10px;

    min-height: 52px;

    padding: 0 23px;

    border-radius: 999px;

    background:
        var(--tz-client-violet);

    color: #fff;

    font-size: 10px;

    font-weight: 900;

    letter-spacing: .1em;

    text-transform: uppercase;

    box-shadow:
        0 15px 35px rgba(91,33,182,.20);

    transition:
        transform .3s ease,
        box-shadow .3s ease;
}

.tz-client-cta-action:hover {
    color: #fff;

    transform: translateY(-3px);

    box-shadow:
        0 20px 45px rgba(91,33,182,.28);
}

.tz-client-cta-action i {
    width: 16px;
}

/* =========================================================
   REVEAL
========================================================= */

.tz-client-reveal {
    opacity: 0;
    transform: translateY(30px);
}

.tz-client-reveal.is-visible {
    opacity: 1;
    transform: translateY(0);

    transition:
        opacity .8s cubic-bezier(.2,.7,.2,1),
        transform .8s cubic-bezier(.2,.7,.2,1);
}

/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 600px) {

    .tz-client-title {
        font-size:
            clamp(44px, 15vw, 70px);
    }

    .tz-client-network {
        padding-bottom: 55px;
    }

    .tz-client-network-inner {
        min-height: 160px;
    }

    .tz-client-section-heading {
        margin-bottom: 32px;
    }

    .tz-client-card {
        border-radius: 24px;
    }

    .tz-client-proof-inner {
        border-radius: 27px;
        padding: 36px 25px;
    }

    .tz-client-proof-number {
        font-size: 31px;
    }

    .tz-client-proof-stat {
        min-height: 125px;
        padding: 22px 14px;
    }

    .tz-client-cta {
        padding-bottom: 70px;
    }
}

/* =========================================================
   REDUCED MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .tz-client-orb,
    .tz-network-center::before {
        animation: none !important;
    }

    .tz-client-card,
    .tz-client-logo,
    .tz-client-cta-action {
        transition: none !important;
    }

    .tz-client-reveal {
        opacity: 1 !important;
        transform: none !important;
    }
}

</style>


<main class="tz-clients">

    <!-- =====================================================
         AMBIENT BACKGROUND
    ====================================================== -->

    <div
        class="tz-client-ambient"
        aria-hidden="true"
    >
        <div class="tz-client-grid"></div>

        <div class="tz-client-orb tz-client-orb-1"></div>
        <div class="tz-client-orb tz-client-orb-2"></div>
        <div class="tz-client-orb tz-client-orb-3"></div>
    </div>


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="tz-client-hero">

        <div class="tz-client-hero-inner">

            <nav
                class="tz-client-breadcrumb tz-client-reveal"
                aria-label="Breadcrumb"
            >
                <a href="index.php">Home</a>

                <span>/</span>

                <strong>Client Partners</strong>
            </nav>


            <div class="tz-client-hero-grid">

                <div class="tz-client-reveal">

                    <span class="tz-client-eyebrow">
                        Trusted Partnerships
                    </span>

                    <h1 class="tz-client-title">
                        Brands that trust
                        <em>our execution.</em>
                    </h1>

                </div>


                <p class="tz-client-hero-copy tz-client-reveal">

                    From Fortune 500 multinationals to iconic Indian
                    enterprises, we serve brands who require flawless
                    execution across hundreds of retail doors and
                    high-capacity dealer conventions.

                </p>

            </div>

        </div>

    </section>


    <!-- =====================================================
         CLIENT NETWORK
    ====================================================== -->

    <section
        class="tz-client-network"
        aria-label="Client ecosystem"
    >

        <div
            class="tz-client-network-inner tz-client-reveal"
        >

            <div class="tz-network-center">
                <span>
                    Trendz<br>
                    Ecosystem
                </span>
            </div>


            <?php
            $networkClients = array_slice($CLIENTS, 0, 6);
            ?>

            <?php foreach ($networkClients as $index => $client): ?>

                <div
                    class="tz-network-node tz-network-node-<?= $index + 1 ?>"
                >

                    <img
                        src="<?= htmlspecialchars(
                            $client['logo'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>"
                        alt="<?= htmlspecialchars(
                            $client['name'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>"
                    >

                </div>

            <?php endforeach; ?>

        </div>

    </section>


    <!-- =====================================================
         CLIENT PORTFOLIO
    ====================================================== -->

    <section class="tz-client-portfolio">

        <div class="tz-client-container">

            <div class="tz-client-section-heading tz-client-reveal">

                <div>

                    <span class="tz-client-kicker">
                        Client Portfolio
                    </span>

                    <h2 class="tz-client-section-title">
                        A network built
                        through delivery.
                    </h2>

                </div>

                <p class="tz-client-section-description">

                    Across automotive, FMCG, consumer electronics,
                    retail, media and corporate environments, our
                    client relationships are grounded in execution.

                </p>

            </div>


            <!-- =================================================
                 CLIENT GRID
            ================================================== -->

            <div class="tz-client-grid">

                <?php foreach ($CLIENTS as $index => $client): ?>

                    <article
                        class="tz-client-card tz-client-reveal"
                    >

                        <span
                            class="tz-client-card-number"
                            aria-hidden="true"
                        >
                            <?= str_pad(
                                $index + 1,
                                2,
                                '0',
                                STR_PAD_LEFT
                            ) ?>
                        </span>


                        <div class="tz-client-logo-wrap">

                            <img
                                src="<?= htmlspecialchars(
                                    $client['logo'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>"
                                alt="<?= htmlspecialchars(
                                    $client['name'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>"
                                class="tz-client-logo"
                                loading="lazy"
                            >

                        </div>


                        <span class="tz-client-industry">

                            <?= htmlspecialchars(
                                $client['industry'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>

                        </span>


                        <h3 class="tz-client-name">

                            <?= htmlspecialchars(
                                $client['name'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>

                        </h3>


                        <p class="tz-client-highlight">

                            <?= htmlspecialchars(
                                $client['highlight'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>

                        </p>


                        <div class="tz-client-card-footer">

                            <span>
                                Partnership Snapshot
                            </span>

                            <i
                                data-lucide="arrow-up-right"
                                aria-hidden="true"
                            ></i>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>


    <!-- =====================================================
         SCALE / PROOF
    ====================================================== -->

    <section class="tz-client-proof">

        <div class="tz-client-proof-inner">

            <div class="tz-client-proof-header tz-client-reveal">

                <span class="tz-client-proof-kicker">
                    Production Proof
                </span>

                <h2 class="tz-client-proof-title">
                    Nationwide reach.
                    Local execution.
                </h2>

                <p class="tz-client-proof-copy">

                    The portfolio reflects the operating scale behind
                    Trendz Eventz — from corporate productions and
                    dealer meets to multi-city activations and retail
                    rollouts.

                </p>

            </div>


            <div class="tz-client-proof-grid tz-client-reveal">

                <div class="tz-client-proof-stat">

                    <span class="tz-client-proof-number">
                        15+
                    </span>

                    <span class="tz-client-proof-label">
                        Years Experience
                    </span>

                    <span class="tz-client-proof-sub">
                        Corporate event & experiential mastery
                    </span>

                </div>


                <div class="tz-client-proof-stat">

                    <span class="tz-client-proof-number">
                        500+
                    </span>

                    <span class="tz-client-proof-label">
                        Productions & Meets
                    </span>

                    <span class="tz-client-proof-sub">
                        High-attendance executions nationwide
                    </span>

                </div>


                <div class="tz-client-proof-stat">

                    <span class="tz-client-proof-number">
                        50+
                    </span>

                    <span class="tz-client-proof-label">
                        MDS Centres Activated
                    </span>

                    <span class="tz-client-proof-sub">
                        Metro-wide recruitment drive
                    </span>

                </div>


                <div class="tz-client-proof-stat">

                    <span class="tz-client-proof-number">
                        10
                    </span>

                    <span class="tz-client-proof-label">
                        Cities in One Tour
                    </span>

                    <span class="tz-client-proof-sub">
                        Synchronized TVS tyres national rollout
                    </span>

                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         CTA
    ====================================================== -->

    <section class="tz-client-cta">

        <div class="tz-client-cta-inner">

            <div>

                <span class="tz-client-cta-kicker">
                    Build the next partnership
                </span>

                <h2 class="tz-client-cta-title">
                    Your brand.
                    <em>Our execution.</em>
                </h2>

                <p class="tz-client-cta-copy">

                    Tell us what needs to happen on ground.
                    We bring the creative thinking, operating
                    discipline and execution muscle to deliver it.

                </p>

            </div>


            <a
                href="contact.php"
                class="tz-client-cta-action"
            >

                Request an Event Proposal

                <i
                    data-lucide="arrow-up-right"
                    aria-hidden="true"
                ></i>

            </a>

        </div>

    </section>

</main>


<!-- =========================================================
     GSAP
========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        /* =====================================================
           LUCIDE
        ====================================================== */

        if (window.lucide) {
            lucide.createIcons();
        }


        /* =====================================================
           MOTION SETTINGS
        ====================================================== */

        const reduceMotion =
            window.matchMedia(
                '(prefers-reduced-motion: reduce)'
            ).matches;


        /* =====================================================
           GSAP REVEALS
        ====================================================== */

        const revealElements =
            document.querySelectorAll(
                '.tz-client-reveal'
            );


        if (
            !reduceMotion &&
            window.gsap &&
            window.ScrollTrigger
        ) {

            gsap.registerPlugin(
                ScrollTrigger
            );


            revealElements.forEach(
                function (element) {

                    gsap.fromTo(
                        element,
                        {
                            opacity: 0,
                            y: 32
                        },
                        {
                            opacity: 1,
                            y: 0,

                            duration: .8,

                            ease:
                                'power3.out',

                            scrollTrigger: {

                                trigger:
                                    element,

                                start:
                                    'top 88%',

                                once:
                                    true

                            }
                        }
                    );

                }
            );


            /* ---------------------------------------------
               Stagger client cards
            --------------------------------------------- */

            const clientCards =
                document.querySelectorAll(
                    '.tz-client-card'
                );


            clientCards.forEach(
                function (card, index) {

                    gsap.fromTo(
                        card,
                        {
                            opacity: 0,
                            y: 30
                        },
                        {
                            opacity: 1,
                            y: 0,

                            duration: .7,

                            delay:
                                (index % 3) * .08,

                            ease:
                                'power3.out',

                            scrollTrigger: {

                                trigger:
                                    card,

                                start:
                                    'top 91%',

                                once:
                                    true

                            }
                        }
                    );

                }
            );

        } else {

            revealElements.forEach(
                function (element) {

                    element.classList.add(
                        'is-visible'
                    );

                }
            );

        }


        /* =====================================================
           NETWORK NODE MICRO-MOTION
        ====================================================== */

        if (
            !reduceMotion &&
            window.gsap
        ) {

            gsap.to(
                '.tz-network-node',
                {
                    y: -5,

                    duration: 2.6,

                    ease:
                        'sine.inOut',

                    stagger: {
                        each: .25,
                        repeat: -1,
                        yoyo: true
                    }
                }
            );

        }


        /* =====================================================
           LOGO HOVER — DESKTOP
        ====================================================== */

        const finePointer =
            window.matchMedia(
                '(hover: hover) and (pointer: fine)'
            ).matches;


        if (
            finePointer &&
            !reduceMotion
        ) {

            document
                .querySelectorAll(
                    '.tz-client-card'
                )
                .forEach(
                    function (card) {

                        card.addEventListener(
                            'mousemove',
                            function (event) {

                                const rect =
                                    card.getBoundingClientRect();

                                const x =
                                    (
                                        event.clientX -
                                        rect.left
                                    ) /
                                    rect.width -
                                    .5;

                                const y =
                                    (
                                        event.clientY -
                                        rect.top
                                    ) /
                                    rect.height -
                                    .5;

                                card.style.transform =
                                    `
                                    translateY(-8px)
                                    perspective(900px)
                                    rotateX(${y * -2}deg)
                                    rotateY(${x * 2}deg)
                                    `;

                            }
                        );


                        card.addEventListener(
                            'mouseleave',
                            function () {

                                card.style.transform =
                                    '';

                            }
                        );

                    }
                );

        }

    }
);

</script>


<?php include __DIR__ . '/includes/footer.php'; ?>