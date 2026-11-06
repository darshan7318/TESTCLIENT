<?php
/**
 * Trendz Eventz — Work & Case Studies Explorer
 * Premium Editorial Portfolio Experience
 * Minimal PHP + Tailwind CSS + DaisyUI
 */

$current_page = 'work';

$page_title = 'Our Work & Case Studies | Trendz Eventz — 500+ National Productions';

$page_desc = 'Explore verified case studies: Samsung 100-store launch, Philips 500-dealer meet, TVS Tyres 10-city tour, Lipton modern trade, and Cadbury mall activations.';

include __DIR__ . '/includes/header.php';
?>

<style>
/* =========================================================
   TRENDZ WORK — PREMIUM EDITORIAL PORTFOLIO
========================================================= */

:root {
    --tz-violet: #5b21b6;
    --tz-violet-dark: #35115f;
    --tz-violet-soft: #f5f0ff;
    --tz-ink: #18131f;
    --tz-muted: #716a78;
    --tz-line: rgba(31, 20, 42, .10);
    --tz-paper: #fcfbfd;
}

/* ---------- Base ---------- */

.tz-work {
    position: relative;
    overflow: hidden;
    background:
        linear-gradient(
            180deg,
            #fbf9ff 0%,
            #ffffff 24%,
            #ffffff 72%,
            #faf8fc 100%
        );
    color: var(--tz-ink);
}

.tz-work a {
    text-decoration: none;
}

.tz-work ::selection {
    background: #ddd0f8;
    color: #24113f;
}

/* ---------- Ambient background ---------- */

.tz-work-ambient {
    position: absolute;
    inset: 0;
    pointer-events: none;
    overflow: hidden;
    z-index: 0;
}

.tz-work-orb {
    position: absolute;
    border-radius: 999px;
    filter: blur(10px);
    opacity: .42;
    animation: tzFloat 12s ease-in-out infinite alternate;
}

.tz-work-orb-1 {
    width: 420px;
    height: 420px;
    top: -180px;
    right: -100px;
    background:
        radial-gradient(
            circle,
            rgba(168, 85, 247, .25) 0%,
            rgba(168, 85, 247, 0) 70%
        );
}

.tz-work-orb-2 {
    width: 360px;
    height: 360px;
    top: 700px;
    left: -180px;
    background:
        radial-gradient(
            circle,
            rgba(59, 130, 246, .13) 0%,
            rgba(59, 130, 246, 0) 70%
        );
    animation-delay: -4s;
}

.tz-work-orb-3 {
    width: 460px;
    height: 460px;
    bottom: 400px;
    right: -240px;
    background:
        radial-gradient(
            circle,
            rgba(236, 72, 153, .11) 0%,
            rgba(236, 72, 153, 0) 70%
        );
    animation-delay: -7s;
}

.tz-work-grid {
    position: absolute;
    inset: 0;
    opacity: .22;
    background-image:
        radial-gradient(
            rgba(91, 33, 182, .22) 1px,
            transparent 1px
        );
    background-size: 28px 28px;
    mask-image: linear-gradient(
        to bottom,
        black 0%,
        transparent 38%,
        transparent 68%,
        black 100%
    );
}

/* ---------- Hero ---------- */

.tz-work-hero {
    position: relative;
    z-index: 1;
    padding:
        clamp(52px, 8vw, 112px)
        0
        clamp(52px, 8vw, 100px);
}

.tz-work-hero-inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
}

@media (min-width: 640px) {
    .tz-work-hero-inner {
        padding: 0 28px;
    }
}

@media (min-width: 1024px) {
    .tz-work-hero-inner {
        padding: 0 40px;
    }
}

.tz-work-breadcrumb {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 30px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
}

.tz-work-breadcrumb a {
    color: #8a8390;
    transition: color .25s ease;
}

.tz-work-breadcrumb a:hover {
    color: var(--tz-violet);
}

.tz-work-breadcrumb span {
    color: #c8c2cc;
}

.tz-work-breadcrumb strong {
    color: var(--tz-violet);
}

.tz-work-hero-layout {
    display: grid;
    grid-template-columns: minmax(0, 1.3fr) minmax(280px, .7fr);
    gap: clamp(40px, 7vw, 100px);
    align-items: end;
}

@media (max-width: 900px) {
    .tz-work-hero-layout {
        grid-template-columns: 1fr;
        gap: 30px;
    }
}

.tz-work-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: var(--tz-violet);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .18em;
    text-transform: uppercase;
    margin-bottom: 22px;
}

.tz-work-eyebrow::before {
    content: "";
    width: 34px;
    height: 1px;
    background: currentColor;
}

.tz-work-title {
    max-width: 920px;
    margin: 0;
    font-family:
        var(--font-heading, Inter, system-ui, sans-serif);
    font-size: clamp(48px, 8vw, 104px);
    line-height: .91;
    letter-spacing: -.065em;
    font-weight: 900;
    color: #17121c;
}

.tz-work-title .accent {
    color: var(--tz-violet);
    font-style: italic;
    font-weight: 500;
}

.tz-work-intro {
    max-width: 440px;
    margin: 0 0 6px auto;
    color: #6d6672;
    font-size: 16px;
    line-height: 1.8;
}

@media (max-width: 900px) {
    .tz-work-intro {
        margin-left: 0;
        max-width: 680px;
    }
}

/* ---------- Hero proof line ---------- */

.tz-work-proof {
    position: relative;
    z-index: 1;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px 48px;
}

@media (min-width: 640px) {
    .tz-work-proof {
        padding-left: 28px;
        padding-right: 28px;
    }
}

@media (min-width: 1024px) {
    .tz-work-proof {
        padding-left: 40px;
        padding-right: 40px;
    }
}

.tz-work-proof-inner {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    border-top: 1px solid var(--tz-line);
    border-bottom: 1px solid var(--tz-line);
}

@media (max-width: 700px) {
    .tz-work-proof-inner {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

.tz-work-proof-item {
    min-height: 112px;
    padding: 25px 18px;
    border-right: 1px solid var(--tz-line);
}

.tz-work-proof-item:last-child {
    border-right: 0;
}

@media (max-width: 700px) {
    .tz-work-proof-item:nth-child(2) {
        border-right: 0;
    }

    .tz-work-proof-item:nth-child(-n+2) {
        border-bottom: 1px solid var(--tz-line);
    }
}

.tz-work-proof-number {
    display: block;
    color: var(--tz-violet);
    font-size: 28px;
    line-height: 1;
    font-weight: 900;
    letter-spacing: -.04em;
}

.tz-work-proof-label {
    display: block;
    margin-top: 9px;
    color: #8b848f;
    font-size: 9px;
    line-height: 1.4;
    letter-spacing: .16em;
    text-transform: uppercase;
    font-weight: 800;
}

/* ---------- Portfolio section ---------- */

.tz-portfolio {
    position: relative;
    z-index: 1;
    padding:
        36px 0
        clamp(90px, 10vw, 140px);
}

.tz-portfolio-inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
}

@media (min-width: 640px) {
    .tz-portfolio-inner {
        padding-left: 28px;
        padding-right: 28px;
    }
}

@media (min-width: 1024px) {
    .tz-portfolio-inner {
        padding-left: 40px;
        padding-right: 40px;
    }
}

/* ---------- Filter ---------- */

.tz-work-toolbar {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 30px;
    margin-bottom: 54px;
}

@media (max-width: 850px) {
    .tz-work-toolbar {
        flex-direction: column;
        align-items: flex-start;
    }
}

.tz-work-section-label {
    color: #938b98;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .2em;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.tz-work-section-title {
    margin: 0;
    font-size: clamp(30px, 5vw, 54px);
    line-height: 1;
    letter-spacing: -.045em;
    font-weight: 900;
    color: #1a151e;
}

.tz-work-filters {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    gap: 7px;
}

@media (max-width: 850px) {
    .tz-work-filters {
        justify-content: flex-start;
    }
}

.tz-filter {
    appearance: none;
    border: 1px solid #e7e1eb;
    background: rgba(255,255,255,.72);
    color: #6d6672;
    padding: 10px 15px;
    border-radius: 999px;
    font-size: 10px;
    line-height: 1;
    font-weight: 800;
    letter-spacing: .07em;
    text-transform: uppercase;
    cursor: pointer;
    transition:
        color .25s ease,
        background .25s ease,
        border-color .25s ease,
        transform .25s ease;
}

.tz-filter:hover {
    color: var(--tz-violet);
    border-color: #cbb8e8;
    transform: translateY(-1px);
}

.tz-filter.is-active {
    color: #fff;
    background: var(--tz-violet);
    border-color: var(--tz-violet);
    box-shadow: 0 10px 25px rgba(91,33,182,.18);
}

/* ---------- Featured project ---------- */

.tz-featured {
    position: relative;
    margin-bottom: 26px;
}

.tz-featured-link {
    display: grid;
    grid-template-columns: minmax(0, 1.45fr) minmax(320px, .55fr);
    min-height: 570px;
    border-radius: 34px;
    overflow: hidden;
    background: #24113f;
    position: relative;
    isolation: isolate;
}

@media (max-width: 900px) {
    .tz-featured-link {
        grid-template-columns: 1fr;
        min-height: auto;
    }
}

.tz-featured-media {
    position: relative;
    min-height: 570px;
    overflow: hidden;
}

@media (max-width: 900px) {
    .tz-featured-media {
        min-height: 420px;
    }
}

@media (max-width: 600px) {
    .tz-featured-media {
        min-height: 330px;
    }
}

.tz-featured-media img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    transition:
        transform 1.2s cubic-bezier(.2,.7,.2,1),
        filter .8s ease;
}

.tz-featured-link:hover .tz-featured-media img {
    transform: scale(1.055);
    filter: saturate(1.08);
}

.tz-featured-media::after {
    content: "";
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            90deg,
            rgba(0,0,0,0) 45%,
            rgba(20,8,34,.34) 100%
        );
    pointer-events: none;
}

.tz-featured-index {
    position: absolute;
    top: 24px;
    left: 24px;
    z-index: 2;
    width: 48px;
    height: 48px;
    display: grid;
    place-items: center;
    border: 1px solid rgba(255,255,255,.35);
    border-radius: 50%;
    color: #fff;
    background: rgba(31,12,49,.26);
    backdrop-filter: blur(12px);
    font-size: 11px;
    font-weight: 900;
}

.tz-featured-tag {
    position: absolute;
    left: 24px;
    bottom: 24px;
    z-index: 2;
    color: #fff;
    background: rgba(24,13,37,.62);
    border: 1px solid rgba(255,255,255,.22);
    border-radius: 999px;
    padding: 9px 13px;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: .14em;
    text-transform: uppercase;
    backdrop-filter: blur(14px);
}

.tz-featured-copy {
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: clamp(34px, 5vw, 64px);
    color: #fff;
    background:
        radial-gradient(
            circle at 90% 10%,
            rgba(192,132,252,.22),
            transparent 35%
        ),
        linear-gradient(
            145deg,
            #281340 0%,
            #3a1760 100%
        );
}

.tz-featured-copy::before {
    content: "";
    position: absolute;
    width: 240px;
    height: 240px;
    right: -110px;
    bottom: -100px;
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 48% 52% 62% 38%;
    transform: rotate(-22deg);
    pointer-events: none;
}

.tz-featured-client {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    color: rgba(255,255,255,.65);
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .15em;
    text-transform: uppercase;
}

.tz-featured-client span:last-child {
    color: #d9bdfd;
}

.tz-featured-title {
    position: relative;
    margin: 34px 0 18px;
    max-width: 560px;
    font-size: clamp(38px, 5vw, 64px);
    line-height: .94;
    letter-spacing: -.055em;
    font-weight: 900;
}

.tz-featured-description {
    position: relative;
    max-width: 520px;
    color: rgba(255,255,255,.72);
    font-size: 14px;
    line-height: 1.75;
}

.tz-featured-bottom {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding-top: 30px;
    margin-top: 35px;
    border-top: 1px solid rgba(255,255,255,.15);
}

.tz-featured-meta {
    color: rgba(255,255,255,.48);
    font-size: 9px;
    line-height: 1.6;
    letter-spacing: .14em;
    text-transform: uppercase;
    font-weight: 800;
}

.tz-featured-arrow {
    width: 50px;
    height: 50px;
    display: grid;
    place-items: center;
    border: 1px solid rgba(255,255,255,.28);
    border-radius: 50%;
    color: #fff;
    transition:
        transform .35s ease,
        background .35s ease,
        border-color .35s ease;
}

.tz-featured-link:hover .tz-featured-arrow {
    transform: translate(5px, -5px);
    background: rgba(255,255,255,.1);
    border-color: rgba(255,255,255,.55);
}

/* ---------- Project grid ---------- */

.tz-project-grid {
    display: grid;
    grid-template-columns: repeat(12, minmax(0, 1fr));
    gap: 26px;
}

@media (max-width: 900px) {
    .tz-project-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 620px) {
    .tz-project-grid {
        grid-template-columns: 1fr;
    }
}

/* ---------- Project item ---------- */

.tz-project {
    position: relative;
    min-width: 0;
}

.tz-project:nth-child(1) {
    grid-column: span 7;
}

.tz-project:nth-child(2) {
    grid-column: span 5;
}

.tz-project:nth-child(3) {
    grid-column: span 5;
}

.tz-project:nth-child(4) {
    grid-column: span 7;
}

.tz-project:nth-child(5) {
    grid-column: span 4;
}

.tz-project:nth-child(6) {
    grid-column: span 8;
}

.tz-project:nth-child(7) {
    grid-column: span 8;
}

.tz-project:nth-child(8) {
    grid-column: span 4;
}

.tz-project:nth-child(9) {
    grid-column: span 5;
}

.tz-project:nth-child(10) {
    grid-column: span 7;
}

.tz-project:nth-child(11) {
    grid-column: span 7;
}

.tz-project:nth-child(12) {
    grid-column: span 5;
}

@media (max-width: 900px) {
    .tz-project {
        grid-column: span 1 !important;
    }
}

.tz-project.is-hidden {
    display: none;
}

.tz-project-link {
    display: block;
    color: inherit;
}

.tz-project-media {
    position: relative;
    aspect-ratio: 1.38 / 1;
    overflow: hidden;
    border-radius: 26px;
    background: #eeeaf0;
}

.tz-project:nth-child(2n) .tz-project-media {
    aspect-ratio: 1 / 1.03;
}

.tz-project:nth-child(3n) .tz-project-media {
    aspect-ratio: 1.55 / 1;
}

.tz-project-media img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    transition:
        transform 1s cubic-bezier(.2,.7,.2,1),
        filter .8s ease;
}

.tz-project-link:hover .tz-project-media img {
    transform: scale(1.065);
    filter: saturate(1.06);
}

.tz-project-overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            to top,
            rgba(24,13,34,.72) 0%,
            rgba(24,13,34,.08) 48%,
            transparent 70%
        );
    opacity: .72;
    transition: opacity .45s ease;
}

.tz-project-link:hover .tz-project-overlay {
    opacity: .9;
}

.tz-project-top {
    position: absolute;
    top: 17px;
    left: 17px;
    right: 17px;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 12px;
    z-index: 2;
}

.tz-project-client {
    display: inline-flex;
    align-items: center;
    min-height: 28px;
    padding: 0 11px;
    border-radius: 999px;
    background: rgba(255,255,255,.91);
    color: #211b25;
    font-size: 9px;
    line-height: 1;
    font-weight: 900;
    letter-spacing: .1em;
    text-transform: uppercase;
    backdrop-filter: blur(12px);
}

.tz-project-scale {
    display: inline-flex;
    align-items: center;
    min-height: 28px;
    padding: 0 11px;
    border-radius: 999px;
    background: rgba(91,33,182,.92);
    color: #fff;
    font-size: 9px;
    line-height: 1;
    font-weight: 900;
    letter-spacing: .07em;
    text-transform: uppercase;
    box-shadow: 0 8px 20px rgba(44,15,82,.18);
}

.tz-project-content {
    position: absolute;
    left: 22px;
    right: 22px;
    bottom: 20px;
    z-index: 3;
    color: #fff;
}

.tz-project-category {
    display: block;
    margin-bottom: 7px;
    color: rgba(255,255,255,.65);
    font-size: 9px;
    line-height: 1.3;
    font-weight: 900;
    letter-spacing: .16em;
    text-transform: uppercase;
}

.tz-project-title {
    margin: 0;
    font-size: clamp(23px, 3vw, 35px);
    line-height: .98;
    letter-spacing: -.045em;
    font-weight: 900;
}

.tz-project-arrow {
    position: absolute;
    right: 21px;
    bottom: 21px;
    width: 39px;
    height: 39px;
    display: grid;
    place-items: center;
    border: 1px solid rgba(255,255,255,.4);
    border-radius: 50%;
    color: #fff;
    background: rgba(20,10,29,.18);
    backdrop-filter: blur(10px);
    opacity: 0;
    transform: translate(-6px, 6px);
    transition:
        opacity .35s ease,
        transform .35s ease;
}

.tz-project-link:hover .tz-project-arrow {
    opacity: 1;
    transform: translate(0, 0);
}

.tz-project-description {
    max-width: 540px;
    margin: 15px 0 0;
    color: #6d6672;
    font-size: 13px;
    line-height: 1.65;
}

/* ---------- Empty state ---------- */

.tz-work-empty {
    display: none;
    padding: 70px 20px;
    text-align: center;
    border: 1px dashed #dcd5e2;
    border-radius: 28px;
    background: #fcfbfd;
}

.tz-work-empty.is-visible {
    display: block;
}

.tz-work-empty-icon {
    width: 50px;
    height: 50px;
    margin: 0 auto 15px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: #f1eafd;
    color: var(--tz-violet);
}

.tz-work-empty h3 {
    margin: 0 0 7px;
    font-size: 22px;
    font-weight: 900;
}

.tz-work-empty p {
    margin: 0;
    color: #817985;
    font-size: 13px;
}

/* ---------- Bottom CTA ---------- */

.tz-work-cta {
    position: relative;
    z-index: 1;
    padding: 0 20px 100px;
}

.tz-work-cta-inner {
    max-width: 1280px;
    margin: 0 auto;
    position: relative;
    overflow: hidden;
    border-radius: 36px;
    padding: clamp(42px, 7vw, 80px);
    background:
        radial-gradient(
            circle at 85% 20%,
            rgba(192,132,252,.26),
            transparent 30%
        ),
        radial-gradient(
            circle at 10% 100%,
            rgba(236,72,153,.15),
            transparent 28%
        ),
        linear-gradient(
            135deg,
            #24113f 0%,
            #431766 100%
        );
    color: #fff;
}

.tz-work-cta-inner::before {
    content: "";
    position: absolute;
    width: 390px;
    height: 180px;
    right: -90px;
    bottom: -90px;
    border: 1px solid rgba(255,255,255,.14);
    border-radius: 50%;
    transform: rotate(-12deg);
}

.tz-work-cta-inner::after {
    content: "";
    position: absolute;
    width: 220px;
    height: 220px;
    left: -120px;
    top: -130px;
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 44% 56% 52% 48%;
    transform: rotate(28deg);
}

.tz-work-cta-content {
    position: relative;
    z-index: 2;
    max-width: 820px;
}

.tz-work-cta-kicker {
    display: block;
    margin-bottom: 17px;
    color: #d9bdfd;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .2em;
    text-transform: uppercase;
}

.tz-work-cta-title {
    margin: 0;
    font-size: clamp(38px, 6vw, 72px);
    line-height: .94;
    letter-spacing: -.055em;
    font-weight: 900;
}

.tz-work-cta-copy {
    max-width: 650px;
    margin: 22px 0 30px;
    color: rgba(255,255,255,.68);
    font-size: 15px;
    line-height: 1.75;
}

.tz-work-cta-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.tz-work-cta-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    min-height: 48px;
    padding: 0 20px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .1em;
    text-transform: uppercase;
    transition:
        transform .25s ease,
        box-shadow .25s ease,
        background .25s ease;
}

.tz-work-cta-btn-primary {
    background: #fff;
    color: #2c1742;
}

.tz-work-cta-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 35px rgba(0,0,0,.18);
}

.tz-work-cta-btn-outline {
    color: #fff;
    border: 1px solid rgba(255,255,255,.28);
    background: rgba(255,255,255,.06);
}

.tz-work-cta-btn-outline:hover {
    transform: translateY(-2px);
    background: rgba(255,255,255,.1);
}

/* ---------- Reveal ---------- */

.tz-work-reveal {
    opacity: 0;
    transform: translateY(30px);
}

.tz-work-reveal.is-visible {
    opacity: 1;
    transform: translateY(0);
    transition:
        opacity .85s cubic-bezier(.2,.7,.2,1),
        transform .85s cubic-bezier(.2,.7,.2,1);
}

/* ---------- Responsive ---------- */

@media (max-width: 600px) {
    .tz-work-hero {
        padding-top: 42px;
    }

    .tz-work-title {
        font-size: clamp(43px, 15vw, 70px);
    }

    .tz-work-proof-item {
        min-height: 92px;
        padding: 19px 14px;
    }

    .tz-work-proof-number {
        font-size: 24px;
    }

    .tz-work-toolbar {
        margin-bottom: 35px;
    }

    .tz-work-filters {
        width: 100%;
    }

    .tz-filter {
        font-size: 9px;
        padding: 9px 12px;
    }

    .tz-featured-link {
        border-radius: 24px;
    }

    .tz-featured-copy {
        padding: 30px 25px 34px;
    }

    .tz-featured-title {
        font-size: 40px;
    }

    .tz-project-media,
    .tz-project:nth-child(2n) .tz-project-media,
    .tz-project:nth-child(3n) .tz-project-media {
        aspect-ratio: 1.18 / 1;
    }

    .tz-project-arrow {
        opacity: 1;
        transform: none;
    }

    .tz-work-cta {
        padding-bottom: 70px;
    }

    .tz-work-cta-inner {
        border-radius: 27px;
    }
}

/* ---------- Reduced motion ---------- */

@media (prefers-reduced-motion: reduce) {
    .tz-work-orb {
        animation: none !important;
    }

    .tz-project-media img,
    .tz-featured-media img,
    .tz-featured-arrow,
    .tz-project-arrow,
    .tz-filter {
        transition: none !important;
    }

    .tz-work-reveal {
        opacity: 1 !important;
        transform: none !important;
    }
}

@keyframes tzFloat {
    from {
        transform: translate3d(0, 0, 0) scale(1);
    }

    to {
        transform: translate3d(0, 24px, 0) scale(1.04);
    }
}
</style>

<main class="tz-work">

    <!-- =====================================================
         AMBIENT ART DIRECTION
    ====================================================== -->

    <div class="tz-work-ambient" aria-hidden="true">
        <div class="tz-work-grid"></div>
        <div class="tz-work-orb tz-work-orb-1"></div>
        <div class="tz-work-orb tz-work-orb-2"></div>
        <div class="tz-work-orb tz-work-orb-3"></div>
    </div>

    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="tz-work-hero">
        <div class="tz-work-hero-inner">

            <nav
                class="tz-work-breadcrumb tz-work-reveal"
                aria-label="Breadcrumb"
            >
                <a href="index.php">Home</a>
                <span>/</span>
                <strong>Work & Case Studies</strong>
            </nav>

            <div class="tz-work-hero-layout">

                <div class="tz-work-reveal">

                    <span class="tz-work-eyebrow">
                        Proven Track Record
                    </span>

                    <h1 class="tz-work-title">
                        Work that moved
                        <span class="accent">people, brands & markets.</span>
                    </h1>

                </div>

                <p class="tz-work-intro tz-work-reveal">
                    Every project detailed here was delivered by Trendz Eventz
                    on ground. From 500-dealer conventions to synchronized
                    100-store retail launches, explore our verified scale.
                </p>

            </div>

        </div>
    </section>

    <!-- =====================================================
         PROOF STRIP
    ====================================================== -->

    <section
        class="tz-work-proof"
        aria-label="Portfolio statistics"
    >
        <div class="tz-work-proof-inner tz-work-reveal">

            <div class="tz-work-proof-item">
                <span class="tz-work-proof-number">500+</span>
                <span class="tz-work-proof-label">
                    Productions & Meets
                </span>
            </div>

            <div class="tz-work-proof-item">
                <span class="tz-work-proof-number">15+</span>
                <span class="tz-work-proof-label">
                    Years Experience
                </span>
            </div>

            <div class="tz-work-proof-item">
                <span class="tz-work-proof-number">10</span>
                <span class="tz-work-proof-label">
                    Cities in One Tour
                </span>
            </div>

            <div class="tz-work-proof-item">
                <span class="tz-work-proof-number">50+</span>
                <span class="tz-work-proof-label">
                    MDS Centres Activated
                </span>
            </div>

        </div>
    </section>

    <!-- =====================================================
         PORTFOLIO
    ====================================================== -->

    <section class="tz-portfolio">

        <div class="tz-portfolio-inner">

            <!-- Toolbar -->

            <div class="tz-work-toolbar tz-work-reveal">

                <div>
                    <span class="tz-work-section-label">
                        Selected Work
                    </span>

                    <h2 class="tz-work-section-title">
                        Built on ground.
                    </h2>
                </div>

                <div
                    class="tz-work-filters"
                    id="portfolio-filters"
                    role="group"
                    aria-label="Filter case studies"
                >

                    <button
                        type="button"
                        class="tz-filter is-active"
                        data-filter="all"
                        aria-pressed="true"
                    >
                        All Work
                    </button>

                    <button
                        type="button"
                        class="tz-filter"
                        data-filter="Corporate"
                        aria-pressed="false"
                    >
                        Corporate
                    </button>

                    <button
                        type="button"
                        class="tz-filter"
                        data-filter="Experiential"
                        aria-pressed="false"
                    >
                        Experiential
                    </button>

                    <button
                        type="button"
                        class="tz-filter"
                        data-filter="Retail"
                        aria-pressed="false"
                    >
                        Retail
                    </button>

                    <button
                        type="button"
                        class="tz-filter"
                        data-filter="Launches"
                        aria-pressed="false"
                    >
                        Launches
                    </button>

                    <button
                        type="button"
                        class="tz-filter"
                        data-filter="Activations"
                        aria-pressed="false"
                    >
                        Activations
                    </button>

                </div>

            </div>

            <!-- =================================================
                 FEATURED PROJECT — SAMSUNG
            ================================================== -->

            <article
                class="tz-featured tz-work-reveal"
                data-category="Retail"
            >

                <a
                    href="case-study.php?slug=samsung-store-launch"
                    class="tz-featured-link"
                    aria-label="Read Samsung 100-Store Thematic Retail Launch case study"
                >

                    <div class="tz-featured-media">

                        <img
                            src="assets/img/work/samsung-store-launch-1.jpg"
                            alt="Samsung Store Launch"
                            loading="eager"
                        >

                        <span class="tz-featured-index">
                            01
                        </span>

                        <span class="tz-featured-tag">
                            Featured Case Study
                        </span>

                    </div>

                    <div class="tz-featured-copy">

                        <div>

                            <div class="tz-featured-client">
                                <span>Samsung</span>
                                <span>100 Stores</span>
                            </div>

                            <h2 class="tz-featured-title">
                                100-Store
                                Thematic
                                Retail Launch.
                            </h2>

                            <p class="tz-featured-description">
                                Give a larger-than-life experience to the
                                consumer target group while creating a high
                                feel-good factor and pride for store owners
                                across Mumbai, Pune and Bangalore.
                            </p>

                        </div>

                        <div class="tz-featured-bottom">

                            <div class="tz-featured-meta">
                                Retail Launch<br>
                                3 Cities
                            </div>

                            <span class="tz-featured-arrow" aria-hidden="true">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                    </div>

                </a>

            </article>

            <!-- =================================================
                 PROJECT GRID
            ================================================== -->

            <div
                class="tz-project-grid"
                id="portfolio-items"
            >

                <!-- 02 Philips -->

                <article
                    class="tz-project tz-work-reveal"
                    data-category="Corporate"
                >
                    <a
                        href="case-study.php?slug=philips-dealers-meet"
                        class="tz-project-link"
                    >

                        <div class="tz-project-media">

                            <img
                                src="assets/img/work/philips-dealers-meet-1.jpg"
                                alt="Philips Dealers Meet"
                                loading="lazy"
                            >

                            <div class="tz-project-overlay"></div>

                            <div class="tz-project-top">
                                <span class="tz-project-client">
                                    Philips
                                </span>

                                <span class="tz-project-scale">
                                    ~500 Dealers
                                </span>
                            </div>

                            <div class="tz-project-content">

                                <span class="tz-project-category">
                                    Dealer Meet · Goa
                                </span>

                                <h3 class="tz-project-title">
                                    National Dealers Meet in Goa
                                </h3>

                            </div>

                            <span class="tz-project-arrow">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                        <p class="tz-project-description">
                            Celebrating the ₹100 crore sales milestone with
                            an invitation gala in Goa hosting approximately
                            500 dealers nationwide.
                        </p>

                    </a>
                </article>


                <!-- 03 TVS Tyres -->

                <article
                    class="tz-project tz-work-reveal"
                    data-category="Launches"
                >
                    <a
                        href="case-study.php?slug=tvs-tyres-launch"
                        class="tz-project-link"
                    >

                        <div class="tz-project-media">

                            <img
                                src="assets/img/work/tvs-tyres-launch-1.jpg"
                                alt="TVS Tyres Product Launch"
                                loading="lazy"
                            >

                            <div class="tz-project-overlay"></div>

                            <div class="tz-project-top">

                                <span class="tz-project-client">
                                    TVS Tyres
                                </span>

                                <span class="tz-project-scale">
                                    10 Cities
                                </span>

                            </div>

                            <div class="tz-project-content">

                                <span class="tz-project-category">
                                    Dealer Launch · Pan-India
                                </span>

                                <h3 class="tz-project-title">
                                    National 10-City Launch Tour
                                </h3>

                            </div>

                            <span class="tz-project-arrow">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                        <p class="tz-project-description">
                            Launch a new range of tyres amongst regional
                            dealer networks and internal sales teams across
                            10 major commercial hub cities.
                        </p>

                    </a>
                </article>


                <!-- 04 Maruti -->

                <article
                    class="tz-project tz-work-reveal"
                    data-category="Activations"
                >
                    <a
                        href="case-study.php?slug=maruti-driving-school"
                        class="tz-project-link"
                    >

                        <div class="tz-project-media">

                            <img
                                src="assets/img/work/maruti-driving-school-1.jpg"
                                alt="Maruti Driving School Recruitment Drive"
                                loading="lazy"
                            >

                            <div class="tz-project-overlay"></div>

                            <div class="tz-project-top">

                                <span class="tz-project-client">
                                    Maruti MDS
                                </span>

                                <span class="tz-project-scale">
                                    ~50 Centres
                                </span>

                            </div>

                            <div class="tz-project-content">

                                <span class="tz-project-category">
                                    Recruitment · Metro Cities
                                </span>

                                <h3 class="tz-project-title">
                                    MDS Recruitment Drive
                                </h3>

                            </div>

                            <span class="tz-project-arrow">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                        <p class="tz-project-description">
                            Create awareness of MDS amongst the target group,
                            then recruit, onboard and register them across
                            around 50 driving school centres in metro cities.
                        </p>

                    </a>
                </article>


                <!-- 05 Lipton MTO -->

                <article
                    class="tz-project tz-work-reveal"
                    data-category="Experiential"
                >
                    <a
                        href="case-study.php?slug=lipton-mto-activation"
                        class="tz-project-link"
                    >

                        <div class="tz-project-media">

                            <img
                                src="assets/img/work/lipton-mto-activation-1.jpg"
                                alt="Lipton Modern Trade Sampling"
                                loading="lazy"
                            >

                            <div class="tz-project-overlay"></div>

                            <div class="tz-project-top">

                                <span class="tz-project-client">
                                    Lipton
                                </span>

                                <span class="tz-project-scale">
                                    200 Stores
                                </span>

                            </div>

                            <div class="tz-project-content">

                                <span class="tz-project-category">
                                    Sampling · Modern Trade
                                </span>

                                <h3 class="tz-project-title">
                                    Modern Trade 200-Store Sampling
                                </h3>

                            </div>

                            <span class="tz-project-arrow">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                        <p class="tz-project-description">
                            Sample Lipton Ice Tea amongst the target group
                            across 200 Hypercity and Big Bazaar stores
                            nationwide.
                        </p>

                    </a>
                </article>


                <!-- 06 Lipton Mall -->

                <article
                    class="tz-project tz-work-reveal"
                    data-category="Experiential"
                >
                    <a
                        href="case-study.php?slug=lipton-mall-engagement"
                        class="tz-project-link"
                    >

                        <div class="tz-project-media">

                            <img
                                src="assets/img/work/lipton-mall-engagement-1.jpg"
                                alt="Lipton Mall Activation"
                                loading="lazy"
                            >

                            <div class="tz-project-overlay"></div>

                            <div class="tz-project-top">

                                <span class="tz-project-client">
                                    Lipton
                                </span>

                                <span class="tz-project-scale">
                                    Mall Tour
                                </span>

                            </div>

                            <div class="tz-project-content">

                                <span class="tz-project-category">
                                    Mall Activation
                                </span>

                                <h3 class="tz-project-title">
                                    In-Mall Interactive Games Zone
                                </h3>

                            </div>

                            <span class="tz-project-arrow">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                        <p class="tz-project-description">
                            Live interactive games and branded zones bringing
                            Lipton Ice Tea directly to mall shoppers.
                        </p>

                    </a>
                </article>


                <!-- 07 Lipton Flash Mob -->

                <article
                    class="tz-project tz-work-reveal"
                    data-category="Activations"
                >
                    <a
                        href="case-study.php?slug=lipton-flash-mob"
                        class="tz-project-link"
                    >

                        <div class="tz-project-media">

                            <img
                                src="assets/img/work/lipton-flash-mob-1.jpg"
                                alt="Lipton Flash Mob PR Stunt"
                                loading="lazy"
                            >

                            <div class="tz-project-overlay"></div>

                            <div class="tz-project-top">

                                <span class="tz-project-client">
                                    Lipton
                                </span>

                                <span class="tz-project-scale">
                                    PR Stunt
                                </span>

                            </div>

                            <div class="tz-project-content">

                                <span class="tz-project-category">
                                    Guerrilla · PR
                                </span>

                                <h3 class="tz-project-title">
                                    Mall Atrium Flash Mob PR Stunt
                                </h3>

                            </div>

                            <span class="tz-project-arrow">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                        <p class="tz-project-description">
                            A surprise choreographed flash mob in the central
                            mall atrium that drew massive crowds around the brand.
                        </p>

                    </a>
                </article>


                <!-- 08 Yokohama -->

                <article
                    class="tz-project tz-work-reveal"
                    data-category="Activations"
                >
                    <a
                        href="case-study.php?slug=yokohama-road-safety"
                        class="tz-project-link"
                    >

                        <div class="tz-project-media">

                            <img
                                src="assets/img/work/yokohama-road-safety-1.jpg"
                                alt="Yokohama Road Safety Week"
                                loading="lazy"
                            >

                            <div class="tz-project-overlay"></div>

                            <div class="tz-project-top">

                                <span class="tz-project-client">
                                    Yokohama
                                </span>

                                <span class="tz-project-scale">
                                    Expressway
                                </span>

                            </div>

                            <div class="tz-project-content">

                                <span class="tz-project-category">
                                    Public Safety · Expressway
                                </span>

                                <h3 class="tz-project-title">
                                    Expressway Road Safety Week
                                </h3>

                            </div>

                            <span class="tz-project-arrow">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                        <p class="tz-project-description">
                            Tyre tag distribution at toll nakas on the
                            Mumbai-Pune Expressway for Road Safety Week in
                            collaboration with the Traffic Police.
                        </p>

                    </a>
                </article>


                <!-- 09 Cadbury -->

                <article
                    class="tz-project tz-work-reveal"
                    data-category="Experiential"
                >
                    <a
                        href="case-study.php?slug=cadbury-shubh-aarambh"
                        class="tz-project-link"
                    >

                        <div class="tz-project-media">

                            <img
                                src="assets/img/work/cadbury-shubh-aarambh-1.jpg"
                                alt="Cadbury Shubh Aarambh Diwali Activity"
                                loading="lazy"
                            >

                            <div class="tz-project-overlay"></div>

                            <div class="tz-project-top">

                                <span class="tz-project-client">
                                    Cadbury
                                </span>

                                <span class="tz-project-scale">
                                    10 Malls
                                </span>

                            </div>

                            <div class="tz-project-content">

                                <span class="tz-project-category">
                                    Festive Activation · Diwali
                                </span>

                                <h3 class="tz-project-title">
                                    Shubh Aarambh Diwali Activity
                                </h3>

                            </div>

                            <span class="tz-project-arrow">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                        <p class="tz-project-description">
                            Celebrate the Diwali festival with Cadbury through
                            thematic setups and festive gifting moments across
                            10 premier malls in Mumbai and Delhi.
                        </p>

                    </a>
                </article>


                <!-- 10 Bombay Dyeing -->

                <article
                    class="tz-project tz-work-reveal"
                    data-category="Corporate"
                >
                    <a
                        href="case-study.php?slug=bombay-dyeing-sales-meet"
                        class="tz-project-link"
                    >

                        <div class="tz-project-media">

                            <img
                                src="assets/img/work/bombay-dyeing-sales-meet-1.jpg"
                                alt="Bombay Dyeing Sales Meet"
                                loading="lazy"
                            >

                            <div class="tz-project-overlay"></div>

                            <div class="tz-project-top">

                                <span class="tz-project-client">
                                    Bombay Dyeing
                                </span>

                                <span class="tz-project-scale">
                                    ~600 Staff
                                </span>

                            </div>

                            <div class="tz-project-content">

                                <span class="tz-project-category">
                                    Sales Meet · Pan-India
                                </span>

                                <h3 class="tz-project-title">
                                    National Sales Meet & Awards
                                </h3>

                            </div>

                            <span class="tz-project-arrow">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                        <p class="tz-project-description">
                            Felicitate the top commercial employees nationwide
                            with a convention inviting around 600 sales staff
                            across India.
                        </p>

                    </a>
                </article>


                <!-- 11 Vitra -->

                <article
                    class="tz-project tz-work-reveal"
                    data-category="Corporate"
                >
                    <a
                        href="case-study.php?slug=vitra-annual-meet"
                        class="tz-project-link"
                    >

                        <div class="tz-project-media">

                            <img
                                src="assets/img/work/vitra-annual-meet-1.jpg"
                                alt="Vitra Annual Meet"
                                loading="lazy"
                            >

                            <div class="tz-project-overlay"></div>

                            <div class="tz-project-top">

                                <span class="tz-project-client">
                                    Vitra
                                </span>

                                <span class="tz-project-scale">
                                    Annual Meet
                                </span>

                            </div>

                            <div class="tz-project-content">

                                <span class="tz-project-category">
                                    Corporate AGM
                                </span>

                                <h3 class="tz-project-title">
                                    Corporate AGM & Agenda Strategy
                                </h3>

                            </div>

                            <span class="tz-project-arrow">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                        <p class="tz-project-description">
                            Annual General Meeting convention delivering
                            keynote staging and setting the strategic agenda
                            for the upcoming fiscal year.
                        </p>

                    </a>
                </article>


                <!-- 12 Hypercity -->

                <article
                    class="tz-project tz-work-reveal"
                    data-category="Retail"
                >
                    <a
                        href="case-study.php?slug=hypercity-branding-relaunch"
                        class="tz-project-link"
                    >

                        <div class="tz-project-media">

                            <img
                                src="assets/img/work/hypercity-branding-relaunch-1.jpg"
                                alt="Hypercity Branding Relaunch"
                                loading="lazy"
                            >

                            <div class="tz-project-overlay"></div>

                            <div class="tz-project-top">

                                <span class="tz-project-client">
                                    Hypercity
                                </span>

                                <span class="tz-project-scale">
                                    Pan-India
                                </span>

                            </div>

                            <div class="tz-project-content">

                                <span class="tz-project-category">
                                    Retail Branding · Relaunch
                                </span>

                                <h3 class="tz-project-title">
                                    Store Branding & Re-Launch Tour
                                </h3>

                            </div>

                            <span class="tz-project-arrow">
                                <i data-lucide="arrow-up-right"></i>
                            </span>

                        </div>

                        <p class="tz-project-description">
                            Store branding, customer re-engagement and relaunch
                            activities rolled out across Hypercity
                            hypermarkets throughout India.
                        </p>

                    </a>
                </article>

            </div>

            <!-- Empty filter state -->

            <div
                class="tz-work-empty"
                id="portfolio-empty"
                aria-live="polite"
            >
                <div class="tz-work-empty-icon">
                    <i data-lucide="search-x"></i>
                </div>

                <h3>
                    No projects in this category.
                </h3>

                <p>
                    Try another capability filter.
                </p>
            </div>

        </div>

    </section>

    <!-- =====================================================
         CTA
    ====================================================== -->

    <section class="tz-work-cta">

        <div class="tz-work-cta-inner">

            <div class="tz-work-cta-content">

                <span class="tz-work-cta-kicker">
                    Have a brief?
                </span>

                <h2 class="tz-work-cta-title">
                    Your next project
                    belongs here.
                </h2>

                <p class="tz-work-cta-copy">
                    Tell us what needs to happen on ground.
                    We will bring the creative thinking,
                    operating discipline and execution muscle
                    required to make it happen.
                </p>

                <div class="tz-work-cta-actions">

                    <a
                        href="contact.php"
                        class="tz-work-cta-btn tz-work-cta-btn-primary"
                    >
                        Request an Event Proposal
                        <i data-lucide="arrow-up-right"></i>
                    </a>

                    <a
                        href="services.php"
                        class="tz-work-cta-btn tz-work-cta-btn-outline"
                    >
                        Explore Capabilities
                        <i data-lucide="arrow-right"></i>
                    </a>

                </div>

            </div>

        </div>

    </section>

</main>

<!-- =========================================================
     GSAP
========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
     * -------------------------------------------------------
     * LUCIDE
     * -------------------------------------------------------
     */

    if (window.lucide) {
        lucide.createIcons();
    }


    /*
     * -------------------------------------------------------
     * FILTER SYSTEM
     * -------------------------------------------------------
     */

    const filterButtons = document.querySelectorAll('.tz-filter');
    const projects = document.querySelectorAll('.tz-project');
    const featured = document.querySelector('.tz-featured');
    const emptyState = document.getElementById('portfolio-empty');

    function applyFilter(filter) {

        let visibleCount = 0;

        projects.forEach(function (project) {

            const category =
                project.getAttribute('data-category');

            const shouldShow =
                filter === 'all' ||
                category === filter;

            if (shouldShow) {

                project.classList.remove('is-hidden');

                visibleCount++;

                if (window.gsap) {

                    gsap.fromTo(
                        project,
                        {
                            opacity: 0,
                            y: 24
                        },
                        {
                            opacity: 1,
                            y: 0,
                            duration: .55,
                            ease: 'power3.out',
                            overwrite: true
                        }
                    );

                }

            } else {

                project.classList.add('is-hidden');

            }

        });

        /*
         * Featured Samsung project remains visible
         * because it is the primary portfolio anchor.
         */

        if (featured) {
            featured.style.display = 'block';
        }

        if (emptyState) {
            emptyState.classList.toggle(
                'is-visible',
                visibleCount === 0
            );
        }
    }


    filterButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            const filter =
                this.getAttribute('data-filter');

            filterButtons.forEach(function (btn) {

                btn.classList.remove('is-active');

                btn.setAttribute(
                    'aria-pressed',
                    'false'
                );

            });

            this.classList.add('is-active');

            this.setAttribute(
                'aria-pressed',
                'true'
            );

            applyFilter(filter);

        });

    });


    /*
     * -------------------------------------------------------
     * SCROLL REVEALS
     * -------------------------------------------------------
     */

    const revealElements =
        document.querySelectorAll('.tz-work-reveal');

    const reduceMotion =
        window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;


    if (
        !reduceMotion &&
        window.gsap &&
        window.ScrollTrigger
    ) {

        gsap.registerPlugin(ScrollTrigger);

        revealElements.forEach(function (element) {

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
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 88%',
                        once: true
                    }
                }
            );

        });


        /*
         * Subtle featured media parallax.
         */

        const featuredImage =
            document.querySelector(
                '.tz-featured-media img'
            );

        if (featuredImage) {

            gsap.to(
                featuredImage,
                {
                    yPercent: 5,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: '.tz-featured',
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 1
                    }
                }
            );

        }

    } else {

        revealElements.forEach(function (element) {

            element.classList.add('is-visible');

        });

    }


    /*
     * -------------------------------------------------------
     * POINTER-BASED IMAGE MOVEMENT
     * -------------------------------------------------------
     *
     * Only active for fine pointer devices.
     */

    const finePointer =
        window.matchMedia(
            '(hover: hover) and (pointer: fine)'
        ).matches;

    if (
        finePointer &&
        !reduceMotion
    ) {

        document
            .querySelectorAll('.tz-project-link')
            .forEach(function (card) {

                const image =
                    card.querySelector('img');

                if (!image) {
                    return;
                }

                card.addEventListener(
                    'mousemove',
                    function (event) {

                        const rect =
                            card.getBoundingClientRect();

                        const x =
                            (event.clientX - rect.left)
                            / rect.width
                            - .5;

                        const y =
                            (event.clientY - rect.top)
                            / rect.height
                            - .5;

                        image.style.transform =
                            `scale(1.045)
                             translate(${x * 5}px, ${y * 5}px)`;

                    }
                );

                card.addEventListener(
                    'mouseleave',
                    function () {

                        image.style.transform =
                            '';

                    }
                );

            });

    }


    /*
     * -------------------------------------------------------
     * FEATURED CARD POINTER LIGHT
     * -------------------------------------------------------
     */

    if (
        finePointer &&
        !reduceMotion
    ) {

        const featuredCard =
            document.querySelector(
                '.tz-featured-link'
            );

        if (featuredCard) {

            featuredCard.addEventListener(
                'mousemove',
                function (event) {

                    const rect =
                        featuredCard.getBoundingClientRect();

                    const x =
                        event.clientX - rect.left;

                    const y =
                        event.clientY - rect.top;

                    featuredCard.style.background =
                        `
                        radial-gradient(
                            450px circle at ${x}px ${y}px,
                            rgba(192,132,252,.13),
                            transparent 60%
                        ),
                        linear-gradient(
                            145deg,
                            #281340 0%,
                            #3a1760 100%
                        )
                        `;

                }
            );

            featuredCard.addEventListener(
                'mouseleave',
                function () {

                    featuredCard.style.background = '';

                }
            );

        }

    }


    /*
     * -------------------------------------------------------
     * SMOOTH FILTER SCROLL POSITION
     * -------------------------------------------------------
     */

    const filterContainer =
        document.getElementById(
            'portfolio-filters'
        );

    if (filterContainer) {

        filterContainer
            .addEventListener(
                'wheel',
                function (event) {

                    if (
                        window.innerWidth < 850 &&
                        Math.abs(event.deltaY)
                    ) {

                        event.preventDefault();

                        filterContainer.scrollLeft +=
                            event.deltaY;

                    }

                },
                {
                    passive: false
                }
            );

    }

});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>