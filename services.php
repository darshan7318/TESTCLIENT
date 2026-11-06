<?php
/**
 * Trendz Eventz — Services & Capabilities
 * Premium Editorial Experiential Agency Layout
 * Tailwind CSS + DaisyUI + GSAP + ScrollTrigger + Lucide
 */

$current_page = 'services';
$page_title = 'Services & Capabilities | Trendz Eventz — Corporate, BTL & Retail Branding';
$page_desc = 'Explore Trendz Eventz capabilities: Corporate Events, BTL & Experiential, Retail Branding, Digital Marketing, Field Force Outreach, and Outdoor Branding.';

include __DIR__ . '/includes/header.php';
?>

<style>
/* =========================================================
   TRENDZ EVENTZ — SERVICES EXPERIENCE SYSTEM
========================================================= */

:root {
    --tz-purple: #6d28d9;
    --tz-purple-dark: #3b176d;
    --tz-ink: #17131f;
    --tz-muted: #6b6475;
    --tz-border: rgba(109, 40, 217, 0.12);
    --tz-soft: #faf8ff;
}

/* ---------- Base ---------- */

.tz-services {
    position: relative;
    overflow: clip;
    background:
        radial-gradient(circle at 8% 10%, rgba(124, 58, 237, .07), transparent 28rem),
        radial-gradient(circle at 92% 32%, rgba(236, 72, 153, .055), transparent 28rem),
        #fff;
}

.tz-services *,
.tz-services *::before,
.tz-services *::after {
    box-sizing: border-box;
}

.tz-services img {
    display: block;
}

/* ---------- Ambient background ---------- */

.tz-ambient {
    position: absolute;
    inset: 0;
    pointer-events: none;
    overflow: hidden;
}

.tz-orb {
    position: absolute;
    border-radius: 999px;
    filter: blur(50px);
    opacity: .34;
    animation: tzFloat 12s ease-in-out infinite alternate;
}

.tz-orb-1 {
    width: 300px;
    height: 300px;
    top: 5rem;
    left: -10rem;
    background: rgba(139, 92, 246, .14);
}

.tz-orb-2 {
    width: 260px;
    height: 260px;
    top: 48rem;
    right: -9rem;
    background: rgba(236, 72, 153, .11);
    animation-delay: -4s;
}

.tz-orb-3 {
    width: 220px;
    height: 220px;
    top: 105rem;
    left: 8%;
    background: rgba(59, 130, 246, .08);
    animation-delay: -7s;
}

@keyframes tzFloat {
    from {
        transform: translate3d(0, 0, 0) scale(1);
    }
    to {
        transform: translate3d(25px, -30px, 0) scale(1.08);
    }
}

/* ---------- Fine grid ---------- */

.tz-grid {
    position: absolute;
    inset: 0;
    opacity: .28;
    background-image:
        linear-gradient(rgba(109, 40, 217, .035) 1px, transparent 1px),
        linear-gradient(90deg, rgba(109, 40, 217, .035) 1px, transparent 1px);
    background-size: 42px 42px;
    mask-image: linear-gradient(to bottom, black, transparent 80%);
    pointer-events: none;
}

/* =========================================================
   HERO
========================================================= */

.tz-services-hero {
    position: relative;
    min-height: min(760px, 88vh);
    display: flex;
    align-items: center;
    overflow: hidden;
    background:
        linear-gradient(
            135deg,
            #fbf9ff 0%,
            #ffffff 48%,
            #f8f5ff 100%
        );
    border-bottom: 1px solid rgba(109, 40, 217, .08);
}

.tz-hero-inner {
    position: relative;
    z-index: 3;
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    padding: 6rem 1.25rem 7rem;
}

.tz-breadcrumb {
    margin-bottom: 2rem;
}

.tz-breadcrumb a {
    transition: color .25s ease;
}

.tz-breadcrumb a:hover {
    color: var(--tz-purple);
}

.tz-hero-layout {
    display: grid;
    grid-template-columns: minmax(0, 1.15fr) minmax(300px, .85fr);
    gap: 4rem;
    align-items: center;
}

.tz-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: .65rem;
    color: #6d28d9;
    font-size: .68rem;
    line-height: 1;
    font-weight: 800;
    letter-spacing: .18em;
    text-transform: uppercase;
}

.tz-eyebrow-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #8b5cf6;
    box-shadow: 0 0 0 5px rgba(139, 92, 246, .10);
    animation: tzPulse 2s ease-in-out infinite;
}

@keyframes tzPulse {
    0%, 100% {
        transform: scale(1);
        opacity: .7;
    }
    50% {
        transform: scale(1.5);
        opacity: 1;
    }
}

.tz-hero-title {
    margin-top: 1.5rem;
    max-width: 900px;
    font-family: inherit;
    font-size: clamp(3rem, 7vw, 7.4rem);
    line-height: .88;
    letter-spacing: -.065em;
    font-weight: 900;
    color: #17131f;
}

.tz-hero-title .accent {
    display: inline-block;
    color: transparent;
    background:
        linear-gradient(
            100deg,
            #4c1d95 0%,
            #7c3aed 42%,
            #c026d3 72%,
            #db2777 100%
        );
    -webkit-background-clip: text;
    background-clip: text;
}

.tz-hero-copy {
    max-width: 680px;
    margin-top: 2rem;
    color: #625b6d;
    font-size: clamp(1rem, 1.5vw, 1.18rem);
    line-height: 1.8;
}

.tz-hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: .8rem;
    margin-top: 2.2rem;
}

.tz-primary-btn,
.tz-secondary-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: .65rem;
    min-height: 48px;
    padding: .8rem 1.25rem;
    border-radius: 999px;
    font-size: .82rem;
    font-weight: 800;
    text-decoration: none;
    transition:
        transform .3s ease,
        box-shadow .3s ease,
        background .3s ease;
}

.tz-primary-btn {
    color: #fff;
    background: #5b21b6;
    box-shadow: 0 14px 35px rgba(91, 33, 182, .20);
}

.tz-primary-btn:hover {
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 20px 42px rgba(91, 33, 182, .28);
}

.tz-secondary-btn {
    color: #3f3749;
    background: rgba(255,255,255,.75);
    border: 1px solid rgba(109,40,217,.16);
}

.tz-secondary-btn:hover {
    color: #5b21b6;
    border-color: rgba(109,40,217,.35);
    transform: translateY(-3px);
}

/* Hero visual */

.tz-hero-art {
    position: relative;
    min-height: 470px;
}

.tz-hero-ring {
    position: absolute;
    width: 390px;
    height: 390px;
    top: 50%;
    left: 50%;
    border: 1px solid rgba(109,40,217,.16);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    animation: tzRotate 22s linear infinite;
}

.tz-hero-ring::before,
.tz-hero-ring::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    border: 1px dashed rgba(168,85,247,.22);
}

.tz-hero-ring::before {
    inset: 35px;
}

.tz-hero-ring::after {
    inset: 78px;
}

@keyframes tzRotate {
    to {
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

.tz-hero-orbit {
    position: absolute;
    inset: 0;
    animation: tzOrbit 18s ease-in-out infinite alternate;
}

@keyframes tzOrbit {
    from {
        transform: translate3d(-6px, 0, 0) rotate(-1deg);
    }
    to {
        transform: translate3d(8px, -12px, 0) rotate(2deg);
    }
}

.tz-hero-orbit svg {
    width: 100%;
    height: 100%;
    overflow: visible;
}

.tz-hero-core {
    position: absolute;
    width: 190px;
    height: 190px;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border-radius: 42% 58% 55% 45% / 48% 43% 57% 52%;
    background:
        linear-gradient(
            135deg,
            #4c1d95 0%,
            #7c3aed 45%,
            #c026d3 100%
        );
    box-shadow:
        0 35px 90px rgba(109,40,217,.27),
        inset -18px -18px 50px rgba(255,255,255,.08);
    animation: tzMorph 9s ease-in-out infinite;
}

@keyframes tzMorph {
    0%, 100% {
        border-radius: 42% 58% 55% 45% / 48% 43% 57% 52%;
        transform: translate(-50%, -50%) rotate(0deg);
    }
    50% {
        border-radius: 58% 42% 45% 55% / 55% 58% 42% 45%;
        transform: translate(-50%, -50%) rotate(8deg);
    }
}

.tz-core-label {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #fff;
    font-size: .72rem;
    font-weight: 900;
    line-height: 1.35;
    letter-spacing: .14em;
    text-transform: uppercase;
}

.tz-floating-label {
    position: absolute;
    padding: .75rem .9rem;
    border: 1px solid rgba(109,40,217,.13);
    border-radius: 18px;
    background: rgba(255,255,255,.78);
    backdrop-filter: blur(16px);
    box-shadow: 0 18px 50px rgba(55,35,85,.08);
    color: #30283a;
    font-size: .66rem;
    font-weight: 800;
    letter-spacing: .08em;
    text-transform: uppercase;
}

.tz-floating-label span {
    display: block;
    margin-top: .25rem;
    color: #8a8194;
    font-size: .58rem;
    font-weight: 600;
    letter-spacing: .03em;
    text-transform: none;
}

.tz-label-1 {
    top: 12%;
    right: 0;
}

.tz-label-2 {
    left: 2%;
    bottom: 18%;
}

.tz-label-3 {
    right: 9%;
    bottom: 4%;
}

/* =========================================================
   CAPABILITY INDEX
========================================================= */

.tz-index-section {
    position: relative;
    padding: 1.2rem 0;
    background: #fff;
    border-bottom: 1px solid rgba(109,40,217,.08);
    z-index: 10;
}

.tz-index-inner {
    max-width: 1280px;
    margin: auto;
    padding: 0 1.25rem;
}

.tz-index-nav {
    display: flex;
    align-items: center;
    gap: .5rem;
    overflow-x: auto;
    scrollbar-width: none;
}

.tz-index-nav::-webkit-scrollbar {
    display: none;
}

.tz-index-link {
    flex: 0 0 auto;
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    padding: .7rem .85rem;
    color: #756d7c;
    font-size: .67rem;
    font-weight: 800;
    letter-spacing: .08em;
    text-transform: uppercase;
    text-decoration: none;
    border-radius: 999px;
    transition:
        color .25s ease,
        background .25s ease;
}

.tz-index-link span {
    color: #b2aab8;
    font-size: .58rem;
}

.tz-index-link:hover,
.tz-index-link.active {
    color: #5b21b6;
    background: #f7f3ff;
}

@media (min-width: 1024px) {
    .tz-index-section {
        position: sticky;
        top: 0;
    }
}

/* =========================================================
   INTRO
========================================================= */

.tz-intro {
    position: relative;
    max-width: 1280px;
    margin: auto;
    padding: 7rem 1.25rem 4rem;
}

.tz-intro-grid {
    display: grid;
    grid-template-columns: minmax(180px, .3fr) minmax(0, 1fr);
    gap: 3rem;
}

.tz-section-kicker {
    color: #7c3aed;
    font-size: .68rem;
    font-weight: 900;
    letter-spacing: .18em;
    text-transform: uppercase;
}

.tz-intro-title {
    max-width: 950px;
    margin-top: .8rem;
    color: #17131f;
    font-size: clamp(2.4rem, 5vw, 5.6rem);
    line-height: .93;
    letter-spacing: -.055em;
    font-weight: 900;
}

.tz-intro-title em {
    color: #7c3aed;
    font-style: normal;
}

/* =========================================================
   SERVICE ARTICLES
========================================================= */

.tz-capabilities {
    position: relative;
    max-width: 1280px;
    margin: auto;
    padding: 2rem 1.25rem 8rem;
}

.tz-service {
    position: relative;
    min-height: 720px;
    padding: 7rem 0;
    scroll-margin-top: 5rem;
}

.tz-service::after {
    content: "";
    position: absolute;
    left: 8%;
    right: 8%;
    bottom: 0;
    height: 1px;
    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(109,40,217,.14),
            transparent
        );
}

.tz-service:last-child::after {
    display: none;
}

.tz-service-grid {
    display: grid;
    grid-template-columns: repeat(12, minmax(0, 1fr));
    gap: 4rem;
    align-items: center;
}

.tz-service-copy {
    grid-column: span 7;
    position: relative;
    z-index: 3;
}

.tz-service-media {
    grid-column: span 5;
    position: relative;
}

.tz-service.reverse .tz-service-copy {
    grid-column: 6 / span 7;
    grid-row: 1;
}

.tz-service.reverse .tz-service-media {
    grid-column: 1 / span 5;
    grid-row: 1;
}

/* Large editorial index */

.tz-service-index {
    position: absolute;
    top: -3.2rem;
    left: -1rem;
    z-index: -1;
    color: rgba(109,40,217,.055);
    font-size: clamp(7rem, 14vw, 13rem);
    line-height: .8;
    font-weight: 900;
    letter-spacing: -.1em;
    user-select: none;
}

.tz-service-meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: .75rem;
    margin-bottom: 1.4rem;
}

.tz-service-number {
    color: #7c3aed;
    font-size: .66rem;
    font-weight: 900;
    letter-spacing: .16em;
}

.tz-service-category {
    padding: .42rem .7rem;
    border: 1px solid rgba(109,40,217,.14);
    border-radius: 999px;
    color: #5b21b6;
    background: #faf8ff;
    font-size: .62rem;
    font-weight: 800;
    letter-spacing: .09em;
    text-transform: uppercase;
}

.tz-service-title {
    max-width: 760px;
    color: #17131f;
    font-size: clamp(2.5rem, 5vw, 5.3rem);
    line-height: .92;
    letter-spacing: -.055em;
    font-weight: 900;
}

.tz-service-lead {
    max-width: 720px;
    margin-top: 1.5rem;
    color: #4f4758;
    font-size: clamp(1rem, 1.45vw, 1.2rem);
    line-height: 1.7;
    font-weight: 700;
}

.tz-service-description {
    max-width: 680px;
    margin-top: 1rem;
    color: #756d7c;
    font-size: .96rem;
    line-height: 1.85;
}

/* Capability list */

.tz-capability-list {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: .55rem 1.5rem;
    max-width: 700px;
    margin-top: 2rem;
}

.tz-capability-item {
    display: flex;
    align-items: flex-start;
    gap: .65rem;
    color: #514957;
    font-size: .72rem;
    line-height: 1.45;
    font-weight: 700;
}

.tz-capability-item svg {
    flex: 0 0 auto;
    width: 15px;
    height: 15px;
    margin-top: 1px;
    color: #7c3aed;
}

/* CTA */

.tz-service-actions {
    display: flex;
    flex-wrap: wrap;
    gap: .75rem;
    margin-top: 2rem;
}

/* Image */

.tz-media-shell {
    position: relative;
    min-height: 590px;
}

.tz-media-frame {
    position: absolute;
    inset: 0;
    overflow: hidden;
    border-radius:
        5rem 1.4rem 5rem 1.4rem;
    background: #ede9f4;
    box-shadow:
        0 35px 90px rgba(48, 27, 75, .13);
    transform: rotate(1.2deg);
    transition:
        transform .7s cubic-bezier(.16,1,.3,1),
        box-shadow .7s ease;
}

.tz-service.reverse .tz-media-frame {
    border-radius:
        1.4rem 5rem 1.4rem 5rem;
    transform: rotate(-1.2deg);
}

.tz-media-frame::after {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 2;
    background:
        linear-gradient(
            145deg,
            rgba(38, 17, 64, .02),
            rgba(38, 17, 64, .35)
        );
    pointer-events: none;
}

.tz-media-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: scale(1.04);
    transition:
        transform 1.1s cubic-bezier(.16,1,.3,1),
        filter .7s ease;
}

.tz-service:hover .tz-media-frame {
    transform:
        rotate(0deg)
        translateY(-8px);
    box-shadow:
        0 45px 110px rgba(48, 27, 75, .18);
}

.tz-service.reverse:hover .tz-media-frame {
    transform:
        rotate(0deg)
        translateY(-8px);
}

.tz-service:hover .tz-media-frame img {
    transform: scale(1.11);
    filter: saturate(1.04) contrast(1.02);
}

/* Image metadata */

.tz-media-caption {
    position: absolute;
    z-index: 5;
    left: 1.2rem;
    right: 1.2rem;
    bottom: 1.2rem;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 1rem;
    color: #fff;
}

.tz-media-caption-main {
    min-width: 0;
}

.tz-media-caption-label {
    display: inline-block;
    margin-bottom: .4rem;
    padding: .38rem .6rem;
    border-radius: 999px;
    color: #fff;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.22);
    backdrop-filter: blur(12px);
    font-size: .58rem;
    font-weight: 900;
    letter-spacing: .1em;
    text-transform: uppercase;
}

.tz-media-caption h3 {
    color: #fff;
    font-size: 1rem;
    line-height: 1.15;
    font-weight: 900;
}

.tz-media-caption p {
    margin-top: .2rem;
    color: rgba(255,255,255,.72);
    font-size: .65rem;
}

.tz-media-arrow {
    width: 46px;
    height: 46px;
    flex: 0 0 auto;
    display: grid;
    place-items: center;
    border-radius: 50%;
    color: #fff;
    border: 1px solid rgba(255,255,255,.3);
    background: rgba(255,255,255,.12);
    backdrop-filter: blur(12px);
    transition:
        transform .35s ease,
        background .35s ease;
}

.tz-service:hover .tz-media-arrow {
    transform: rotate(-45deg);
    background: rgba(255,255,255,.22);
}

/* Floating visual tag */

.tz-media-tag {
    position: absolute;
    z-index: 8;
    top: 1.4rem;
    right: -1rem;
    padding: .75rem .9rem;
    border-radius: 16px;
    color: #3f334c;
    background: rgba(255,255,255,.88);
    border: 1px solid rgba(109,40,217,.13);
    box-shadow: 0 20px 55px rgba(48,27,75,.12);
    backdrop-filter: blur(16px);
    font-size: .6rem;
    font-weight: 900;
    letter-spacing: .08em;
    text-transform: uppercase;
}

.tz-service.reverse .tz-media-tag {
    right: auto;
    left: -1rem;
}

/* Organic accent */

.tz-media-blob {
    position: absolute;
    z-index: -1;
    width: 180px;
    height: 180px;
    right: -65px;
    bottom: -65px;
    border-radius: 43% 57% 62% 38% / 45% 38% 62% 55%;
    background:
        linear-gradient(
            135deg,
            rgba(124,58,237,.18),
            rgba(236,72,153,.12)
        );
    animation: tzBlob 8s ease-in-out infinite alternate;
}

.tz-service.reverse .tz-media-blob {
    right: auto;
    left: -65px;
}

@keyframes tzBlob {
    from {
        transform: rotate(0deg) scale(1);
    }
    to {
        transform: rotate(15deg) scale(1.08);
    }
}

/* =========================================================
   CLOSING CAPABILITY STATEMENT
========================================================= */

.tz-services-close {
    position: relative;
    max-width: 1280px;
    margin: auto;
    padding: 4rem 1.25rem 8rem;
}

.tz-close-panel {
    position: relative;
    overflow: hidden;
    min-height: 420px;
    display: flex;
    align-items: center;
    padding: clamp(2rem, 6vw, 5rem);
    border-radius:
        5rem 1.5rem 5rem 1.5rem;
    background:
        linear-gradient(
            125deg,
            #29113f 0%,
            #4c1d69 48%,
            #6d28d9 100%
        );
    box-shadow: 0 35px 100px rgba(76,29,105,.2);
}

.tz-close-panel::before {
    content: "";
    position: absolute;
    width: 500px;
    height: 500px;
    right: -180px;
    top: -240px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.13);
    box-shadow:
        0 0 0 70px rgba(255,255,255,.025),
        0 0 0 140px rgba(255,255,255,.018);
}

.tz-close-panel::after {
    content: "";
    position: absolute;
    width: 300px;
    height: 180px;
    left: -80px;
    bottom: -90px;
    border-radius: 50%;
    background: rgba(236,72,153,.16);
    filter: blur(30px);
}

.tz-close-content {
    position: relative;
    z-index: 3;
    max-width: 760px;
}

.tz-close-kicker {
    color: rgba(255,255,255,.68);
    font-size: .65rem;
    font-weight: 900;
    letter-spacing: .18em;
    text-transform: uppercase;
}

.tz-close-title {
    margin-top: 1rem;
    color: #fff;
    font-size: clamp(2.5rem, 6vw, 6.5rem);
    line-height: .9;
    letter-spacing: -.06em;
    font-weight: 900;
}

.tz-close-title span {
    color: #d8b4fe;
}

.tz-close-copy {
    max-width: 620px;
    margin-top: 1.3rem;
    color: rgba(255,255,255,.72);
    font-size: 1rem;
    line-height: 1.75;
}

.tz-close-actions {
    display: flex;
    flex-wrap: wrap;
    gap: .8rem;
    margin-top: 2rem;
}

.tz-close-btn-light {
    display: inline-flex;
    align-items: center;
    gap: .6rem;
    padding: .85rem 1.25rem;
    border-radius: 999px;
    color: #4c1d69;
    background: #fff;
    font-size: .75rem;
    font-weight: 900;
    text-decoration: none;
    transition:
        transform .3s ease,
        box-shadow .3s ease;
}

.tz-close-btn-light:hover {
    color: #4c1d69;
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(0,0,0,.18);
}

.tz-close-btn-outline {
    display: inline-flex;
    align-items: center;
    gap: .6rem;
    padding: .85rem 1.25rem;
    border-radius: 999px;
    color: #fff;
    border: 1px solid rgba(255,255,255,.28);
    background: rgba(255,255,255,.06);
    font-size: .75rem;
    font-weight: 900;
    text-decoration: none;
    transition:
        transform .3s ease,
        background .3s ease;
}

.tz-close-btn-outline:hover {
    color: #fff;
    transform: translateY(-3px);
    background: rgba(255,255,255,.12);
}

/* =========================================================
   REVEAL SYSTEM
========================================================= */

.tz-reveal {
    opacity: 0;
    transform: translateY(35px);
}

.tz-reveal-left {
    opacity: 0;
    transform: translateX(-45px);
}

.tz-reveal-right {
    opacity: 0;
    transform: translateX(45px);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1023px) {

    .tz-services-hero {
        min-height: auto;
    }

    .tz-hero-inner {
        padding-top: 4rem;
        padding-bottom: 4rem;
    }

    .tz-hero-layout {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .tz-hero-art {
        min-height: 390px;
        max-width: 560px;
        margin: 0 auto;
        width: 100%;
    }

    .tz-intro {
        padding-top: 5rem;
    }

    .tz-intro-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .tz-service {
        min-height: auto;
        padding: 5rem 0;
    }

    .tz-service-grid {
        grid-template-columns: 1fr;
        gap: 2.5rem;
    }

    .tz-service-copy,
    .tz-service.reverse .tz-service-copy {
        grid-column: auto;
        grid-row: auto;
    }

    .tz-service-media,
    .tz-service.reverse .tz-service-media {
        grid-column: auto;
        grid-row: auto;
    }

    .tz-media-shell {
        min-height: 500px;
    }

    .tz-service-index {
        top: -2rem;
        left: 0;
        font-size: 9rem;
    }
}

@media (max-width: 767px) {

    .tz-hero-inner {
        padding: 3rem 1rem 3.5rem;
    }

    .tz-hero-title {
        font-size: clamp(3rem, 16vw, 5.2rem);
    }

    .tz-hero-copy {
        font-size: .98rem;
        line-height: 1.7;
    }

    .tz-hero-art {
        min-height: 320px;
    }

    .tz-hero-ring {
        width: 280px;
        height: 280px;
    }

    .tz-hero-core {
        width: 135px;
        height: 135px;
    }

    .tz-floating-label {
        padding: .6rem .7rem;
        font-size: .53rem;
    }

    .tz-label-1 {
        right: 0;
        top: 8%;
    }

    .tz-label-2 {
        left: 0;
        bottom: 15%;
    }

    .tz-label-3 {
        right: 2%;
        bottom: 0;
    }

    .tz-intro,
    .tz-capabilities,
    .tz-services-close {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .tz-intro {
        padding-top: 4rem;
    }

    .tz-intro-title {
        font-size: clamp(2.6rem, 13vw, 4.2rem);
    }

    .tz-service {
        padding: 4rem 0;
    }

    .tz-service-title {
        font-size: clamp(2.5rem, 13vw, 4.4rem);
    }

    .tz-service-lead {
        font-size: 1rem;
    }

    .tz-capability-list {
        grid-template-columns: 1fr;
        gap: .7rem;
    }

    .tz-media-shell {
        min-height: 390px;
    }

    .tz-media-frame,
    .tz-service.reverse .tz-media-frame {
        border-radius: 3.2rem 1rem 3.2rem 1rem;
    }

    .tz-media-tag,
    .tz-service.reverse .tz-media-tag {
        right: .5rem;
        left: auto;
        top: .7rem;
    }

    .tz-media-blob,
    .tz-service.reverse .tz-media-blob {
        display: none;
    }

    .tz-service-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .tz-primary-btn,
    .tz-secondary-btn {
        width: 100%;
    }

    .tz-close-panel {
        min-height: 500px;
        border-radius: 3rem 1rem 3rem 1rem;
        padding: 2rem 1.4rem;
    }

    .tz-close-title {
        font-size: clamp(2.8rem, 14vw, 4.5rem);
    }

    .tz-close-actions {
        flex-direction: column;
    }

    .tz-close-btn-light,
    .tz-close-btn-outline {
        justify-content: center;
        width: 100%;
    }
}

/* =========================================================
   ACCESSIBILITY / REDUCED MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .tz-orb,
    .tz-hero-ring,
    .tz-hero-orbit,
    .tz-hero-core,
    .tz-eyebrow-dot,
    .tz-media-blob {
        animation: none !important;
    }

    .tz-reveal,
    .tz-reveal-left,
    .tz-reveal-right {
        opacity: 1 !important;
        transform: none !important;
    }

    .tz-primary-btn,
    .tz-secondary-btn,
    .tz-media-frame,
    .tz-media-frame img,
    .tz-media-arrow {
        transition: none !important;
    }
}

/* Touch devices should not depend on hover */
@media (hover: none) {

    .tz-service:hover .tz-media-frame,
    .tz-service.reverse:hover .tz-media-frame {
        transform: rotate(0deg);
    }

    .tz-service:hover .tz-media-frame img {
        transform: scale(1.04);
    }
}
</style>


<!-- =========================================================
     SERVICES EXPERIENCE
========================================================= -->

<main class="tz-services">

    <!-- Ambient system -->
    <div class="tz-ambient" aria-hidden="true">
        <div class="tz-grid"></div>
        <div class="tz-orb tz-orb-1"></div>
        <div class="tz-orb tz-orb-2"></div>
        <div class="tz-orb tz-orb-3"></div>
    </div>


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="tz-services-hero">

        <div class="tz-grid" aria-hidden="true"></div>

        <div class="tz-hero-inner">

            <div class="tz-breadcrumb">
                <div class="text-xs breadcrumbs text-slate-500">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="text-purple-700 font-semibold">
                            Services
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tz-hero-layout">

                <div class="tz-hero-copy-wrap">

                    <div class="tz-eyebrow tz-reveal">
                        <span class="tz-eyebrow-dot"></span>
                        What We Do
                    </div>

                    <h1 class="tz-hero-title">
                        <span class="hero-line">Six Specialized</span>
                        <br>
                        <span class="hero-line accent">Pillars.</span>
                        <br>
                        <span class="hero-line">One Execution</span>
                        <br>
                        <span class="hero-line">Mindset.</span>
                    </h1>

                    <p class="tz-hero-copy tz-reveal">
                        We provide enterprise brands with end-to-end execution
                        across high-stakes corporate conventions, pan-India
                        retail branding rollouts, and experiential consumer
                        activations.
                    </p>

                    <div class="tz-hero-actions tz-reveal">

                        <a href="#corporate-events"
                           class="tz-primary-btn magnetic">
                            Explore Capabilities
                            <i data-lucide="arrow-down-right"
                               class="w-4 h-4"></i>
                        </a>

                        <a href="contact.php"
                           class="tz-secondary-btn magnetic">
                            Start a Conversation
                            <i data-lucide="arrow-up-right"
                               class="w-4 h-4"></i>
                        </a>

                    </div>

                </div>


                <!-- Hero Art -->
                <div class="tz-hero-art tz-reveal-right"
                     aria-hidden="true">

                    <div class="tz-hero-ring"></div>

                    <div class="tz-hero-orbit">

                        <svg viewBox="0 0 600 600"
                             fill="none"
                             xmlns="http://www.w3.org/2000/svg">

                            <path
                                d="M91 321C108 181 236 91 358 110C477 129 538 242 496 355C455 465 329 526 211 479C104 436 72 381 91 321Z"
                                stroke="url(#heroGradient)"
                                stroke-width="1.5"
                                stroke-dasharray="7 10"/>

                            <path
                                d="M155 344C153 245 237 165 332 165C427 165 477 238 454 324C430 414 333 455 242 426C185 408 157 383 155 344Z"
                                stroke="url(#heroGradient2)"
                                stroke-width="1"
                                opacity=".65"/>

                            <circle cx="100"
                                    cy="321"
                                    r="5"
                                    fill="#7C3AED"/>

                            <circle cx="496"
                                    cy="355"
                                    r="5"
                                    fill="#DB2777"/>

                            <circle cx="358"
                                    cy="110"
                                    r="4"
                                    fill="#A855F7"/>

                            <defs>
                                <linearGradient id="heroGradient"
                                                x1="80"
                                                y1="100"
                                                x2="520"
                                                y2="500">
                                    <stop stop-color="#7C3AED"/>
                                    <stop offset=".5"
                                          stop-color="#C026D3"/>
                                    <stop offset="1"
                                          stop-color="#DB2777"/>
                                </linearGradient>

                                <linearGradient id="heroGradient2"
                                                x1="100"
                                                y1="100"
                                                x2="500"
                                                y2="500">
                                    <stop stop-color="#A78BFA"/>
                                    <stop offset="1"
                                          stop-color="#F0ABFC"/>
                                </linearGradient>
                            </defs>

                        </svg>

                    </div>

                    <div class="tz-hero-core">
                        <div class="tz-core-label">
                            Experience<br>
                            Architecture
                        </div>
                    </div>

                    <div class="tz-floating-label tz-label-1">
                        Corporate
                        <span>Events & Conventions</span>
                    </div>

                    <div class="tz-floating-label tz-label-2">
                        Experiential
                        <span>BTL & Activations</span>
                    </div>

                    <div class="tz-floating-label tz-label-3">
                        Pan-India
                        <span>Execution Capability</span>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         CAPABILITY INDEX
    ====================================================== -->

    <section class="tz-index-section"
             aria-label="Service navigation">

        <div class="tz-index-inner">

            <nav class="tz-index-nav">

                <a href="#corporate-events"
                   class="tz-index-link active">
                    <span>01</span>
                    Corporate
                </a>

                <a href="#btl-experiential"
                   class="tz-index-link">
                    <span>02</span>
                    BTL
                </a>

                <a href="#retail-branding"
                   class="tz-index-link">
                    <span>03</span>
                    Retail
                </a>

                <a href="#digital-marketing"
                   class="tz-index-link">
                    <span>04</span>
                    Digital
                </a>

                <a href="#mobile-tele-marketing"
                   class="tz-index-link">
                    <span>05</span>
                    Outreach
                </a>

                <a href="#broadcast-print-outdoor"
                   class="tz-index-link">
                    <span>06</span>
                    Outdoor
                </a>

            </nav>

        </div>

    </section>


    <!-- =====================================================
         INTRO
    ====================================================== -->

    <section class="tz-intro">

        <div class="tz-intro-grid">

            <div>
                <div class="tz-section-kicker">
                    The Capability System
                </div>
            </div>

            <div>

                <h2 class="tz-intro-title tz-reveal">
                    From <em>brief</em> to
                    <br>
                    real-world impact.
                </h2>

                <p class="max-w-3xl mt-6 text-slate-500 leading-relaxed text-base sm:text-lg tz-reveal">
                    Six specialized disciplines. One operating rhythm.
                    Every capability is designed to connect strategy,
                    creative thinking and controlled execution on the ground.
                </p>

            </div>

        </div>

    </section>


    <!-- =====================================================
         SIX CAPABILITIES
    ====================================================== -->

    <section class="tz-capabilities">


        <!-- =================================================
             01 CORPORATE EVENTS
        ================================================== -->

        <article class="tz-service"
                 id="corporate-events">

            <div class="tz-service-grid">

                <div class="tz-service-copy tz-reveal-left">

                    <div class="tz-service-index">
                        01
                    </div>

                    <div class="tz-service-meta">

                        <span class="tz-service-number">
                            PILLAR 01
                        </span>

                        <span class="tz-service-category">
                            Corporate Events
                        </span>

                    </div>

                    <h2 class="tz-service-title">
                        Corporate Events
                        <br>
                        & Conventions
                    </h2>

                    <p class="tz-service-lead">
                        High-stakes corporate gatherings, dealer conferences,
                        and executive milestones executed with uncompromising
                        precision.
                    </p>

                    <p class="tz-service-description">
                        From 500-dealer national conventions in Goa to
                        600-strong employee sales meets, we build corporate
                        environments that celebrate achievement, align
                        stakeholders, and reinforce enterprise leadership.
                    </p>

                    <div class="tz-capability-list">

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Dealer meets
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Annual general meets
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Employee engagement summits
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            National conferences
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Product & brand launches
                        </div>

                    </div>

                    <div class="tz-service-actions">

                        <a href="case-study.php?slug=philips-dealers-meet"
                           class="tz-primary-btn magnetic">
                            View Case Study Proof
                            <i data-lucide="arrow-up-right"
                               class="w-4 h-4"></i>
                        </a>

                        <a href="contact.php?service=Corporate%20Events"
                           class="tz-secondary-btn magnetic">
                            Inquire for this Pillar
                        </a>

                    </div>

                </div>


                <div class="tz-service-media tz-reveal-right">

                    <div class="tz-media-shell">

                        <div class="tz-media-blob"></div>

                        <div class="tz-media-frame">

                            <img
                                src="assets/img/work/philips-dealers-meet-1.jpg"
                                alt="Corporate Events and Philips Dealers Meet"
                                loading="lazy">

                            <div class="tz-media-caption">

                                <div class="tz-media-caption-main">

                                    <span class="tz-media-caption-label">
                                        Corporate Stature
                                    </span>

                                    <h3>
                                        Dealer Meet Production
                                    </h3>

                                    <p>
                                        High-stakes corporate experience
                                    </p>

                                </div>

                                <div class="tz-media-arrow">
                                    <i data-lucide="arrow-up-right"
                                       class="w-5 h-5"></i>
                                </div>

                            </div>

                        </div>

                        <div class="tz-media-tag">
                            01 / Corporate
                        </div>

                    </div>

                </div>

            </div>

        </article>


        <!-- =================================================
             02 BTL
        ================================================== -->

        <article class="tz-service reverse"
                 id="btl-experiential">

            <div class="tz-service-grid">

                <div class="tz-service-copy tz-reveal-right">

                    <div class="tz-service-index">
                        02
                    </div>

                    <div class="tz-service-meta">

                        <span class="tz-service-number">
                            PILLAR 02
                        </span>

                        <span class="tz-service-category">
                            BTL & Experiential
                        </span>

                    </div>

                    <h2 class="tz-service-title">
                        BTL Activations
                        <br>
                        & Mall Takeovers
                    </h2>

                    <p class="tz-service-lead">
                        High-touch consumer activations, immersive mall
                        setups, and sampling programs that bridge brands
                        with everyday people.
                    </p>

                    <p class="tz-service-description">
                        We create multi-city on-ground touchpoints that
                        convert casual footfall into loyal brand advocates
                        through interactive games, product sampling, and
                        live experiential engagement.
                    </p>

                    <div class="tz-capability-list">

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Roadshows nationwide
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            On-ground brand activations
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Mall experiences & games
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            High-volume sampling programmes
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Promotional campaigns
                        </div>

                    </div>

                    <div class="tz-service-actions">

                        <a href="case-study.php?slug=lipton-mall-engagement"
                           class="tz-primary-btn magnetic">
                            View Case Study Proof
                            <i data-lucide="arrow-up-right"
                               class="w-4 h-4"></i>
                        </a>

                        <a href="contact.php?service=BTL%20Experiential"
                           class="tz-secondary-btn magnetic">
                            Inquire for this Pillar
                        </a>

                    </div>

                </div>


                <div class="tz-service-media tz-reveal-left">

                    <div class="tz-media-shell">

                        <div class="tz-media-blob"></div>

                        <div class="tz-media-frame">

                            <img
                                src="assets/img/work/lipton-mall-engagement-1.jpg"
                                alt="Lipton Mall Engagement BTL Activation"
                                loading="lazy">

                            <div class="tz-media-caption">

                                <div class="tz-media-caption-main">

                                    <span class="tz-media-caption-label">
                                        Experiential
                                    </span>

                                    <h3>
                                        Mall Brand Engagement
                                    </h3>

                                    <p>
                                        Consumer activation in real-world spaces
                                    </p>

                                </div>

                                <div class="tz-media-arrow">
                                    <i data-lucide="arrow-up-right"
                                       class="w-5 h-5"></i>
                                </div>

                            </div>

                        </div>

                        <div class="tz-media-tag">
                            02 / Experiential
                        </div>

                    </div>

                </div>

            </div>

        </article>


        <!-- =================================================
             03 RETAIL
        ================================================== -->

        <article class="tz-service"
                 id="retail-branding">

            <div class="tz-service-grid">

                <div class="tz-service-copy tz-reveal-left">

                    <div class="tz-service-index">
                        03
                    </div>

                    <div class="tz-service-meta">

                        <span class="tz-service-number">
                            PILLAR 03
                        </span>

                        <span class="tz-service-category">
                            Retail Branding
                        </span>

                    </div>

                    <h2 class="tz-service-title">
                        Retail Branding
                        <br>
                        & Store Rollouts
                    </h2>

                    <p class="tz-service-lead">
                        Pan-India visual merchandising, store thematic launches,
                        and high-standard retail audits across hundreds of doors.
                    </p>

                    <p class="tz-service-description">
                        Delivering consistent brand theater at retail across
                        100+ stores simultaneously. We oversee fabrication,
                        visual audits, display units, and store launches
                        with flawless consistency.
                    </p>

                    <div class="tz-capability-list">

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Retail audits & checks
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Visual merchandising units
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Store thematic branding
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Pan-India store rollouts
                        </div>

                    </div>

                    <div class="tz-service-actions">

                        <a href="case-study.php?slug=samsung-store-launch"
                           class="tz-primary-btn magnetic">
                            View Case Study Proof
                            <i data-lucide="arrow-up-right"
                               class="w-4 h-4"></i>
                        </a>

                        <a href="contact.php?service=Retail%20Branding"
                           class="tz-secondary-btn magnetic">
                            Inquire for this Pillar
                        </a>

                    </div>

                </div>


                <div class="tz-service-media tz-reveal-right">

                    <div class="tz-media-shell">

                        <div class="tz-media-blob"></div>

                        <div class="tz-media-frame">

                            <img
                                src="assets/img/work/samsung-store-launch-1.jpg"
                                alt="Samsung Store Launch Retail Branding"
                                loading="lazy">

                            <div class="tz-media-caption">

                                <div class="tz-media-caption-main">

                                    <span class="tz-media-caption-label">
                                        Retail
                                    </span>

                                    <h3>
                                        Thematic Store Launch
                                    </h3>

                                    <p>
                                        Consistent retail brand experience
                                    </p>

                                </div>

                                <div class="tz-media-arrow">
                                    <i data-lucide="arrow-up-right"
                                       class="w-5 h-5"></i>
                                </div>

                            </div>

                        </div>

                        <div class="tz-media-tag">
                            03 / Retail
                        </div>

                    </div>

                </div>

            </div>

        </article>


        <!-- =================================================
             04 DIGITAL
        ================================================== -->

        <article class="tz-service reverse"
                 id="digital-marketing">

            <div class="tz-service-grid">

                <div class="tz-service-copy tz-reveal-right">

                    <div class="tz-service-index">
                        04
                    </div>

                    <div class="tz-service-meta">

                        <span class="tz-service-number">
                            PILLAR 04
                        </span>

                        <span class="tz-service-category">
                            Digital Marketing
                        </span>

                    </div>

                    <h2 class="tz-service-title">
                        Digital & Social-First
                        <br>
                        Amplification
                    </h2>

                    <p class="tz-service-lead">
                        Campaign concepts, social-first activation, and digital
                        amplification that expand on-ground events into viral reach.
                    </p>

                    <p class="tz-service-description">
                        Bridging physical spectacle and digital conversation.
                        We develop integrated communication frameworks and
                        digital content amplification that capture on-ground
                        excitement and extend it across online channels.
                    </p>

                    <div class="tz-capability-list">

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Campaign concepts
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Content amplification
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Social-first activation
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Integrated communication
                        </div>

                    </div>

                    <div class="tz-service-actions">

                        <a href="case-study.php?slug=lipton-flash-mob"
                           class="tz-primary-btn magnetic">
                            View Case Study Proof
                            <i data-lucide="arrow-up-right"
                               class="w-4 h-4"></i>
                        </a>

                        <a href="contact.php?service=Digital%20Marketing"
                           class="tz-secondary-btn magnetic">
                            Inquire for this Pillar
                        </a>

                    </div>

                </div>


                <div class="tz-service-media tz-reveal-left">

                    <div class="tz-media-shell">

                        <div class="tz-media-blob"></div>

                        <div class="tz-media-frame">

                            <img
                                src="assets/img/work/lipton-flash-mob-1.jpg"
                                alt="Lipton Flash Mob Digital Marketing Activation"
                                loading="lazy">

                            <div class="tz-media-caption">

                                <div class="tz-media-caption-main">

                                    <span class="tz-media-caption-label">
                                        Digital Amplification
                                    </span>

                                    <h3>
                                        Flash Mob Activation
                                    </h3>

                                    <p>
                                        Physical spectacle extended into conversation
                                    </p>

                                </div>

                                <div class="tz-media-arrow">
                                    <i data-lucide="arrow-up-right"
                                       class="w-5 h-5"></i>
                                </div>

                            </div>

                        </div>

                        <div class="tz-media-tag">
                            04 / Digital
                        </div>

                    </div>

                </div>

            </div>

        </article>


        <!-- =================================================
             05 FIELD FORCE
        ================================================== -->

        <article class="tz-service"
                 id="mobile-tele-marketing">

            <div class="tz-service-grid">

                <div class="tz-service-copy tz-reveal-left">

                    <div class="tz-service-index">
                        05
                    </div>

                    <div class="tz-service-meta">

                        <span class="tz-service-number">
                            PILLAR 05
                        </span>

                        <span class="tz-service-category">
                            Outreach
                        </span>

                    </div>

                    <h2 class="tz-service-title">
                        Field Force &
                        <br>
                        Direct Outreach
                    </h2>

                    <p class="tz-service-lead">
                        Trained on-ground field forces and direct outreach
                        programs that convert prospect curiosity into
                        qualified participation.
                    </p>

                    <p class="tz-service-description">
                        Mobilizing dedicated field teams and tele-marketing
                        units to drive high-conversion candidate recruitment,
                        customer registrations, and pre-event invitation
                        follow-ups across metro cities.
                    </p>

                    <div class="tz-capability-list">

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Dedicated on-ground field forces
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Tele-marketing outreach
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Direct lead outreach
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Activation registration support
                        </div>

                    </div>

                    <div class="tz-service-actions">

                        <a href="case-study.php?slug=maruti-driving-school"
                           class="tz-primary-btn magnetic">
                            View Case Study Proof
                            <i data-lucide="arrow-up-right"
                               class="w-4 h-4"></i>
                        </a>

                        <a href="contact.php?service=Field%20Force"
                           class="tz-secondary-btn magnetic">
                            Inquire for this Pillar
                        </a>

                    </div>

                </div>


                <div class="tz-service-media tz-reveal-right">

                    <div class="tz-media-shell">

                        <div class="tz-media-blob"></div>

                        <div class="tz-media-frame">

                            <img
                                src="assets/img/work/maruti-driving-school-1.jpg"
                                alt="Maruti Driving School Field Force Activation"
                                loading="lazy">

                            <div class="tz-media-caption">

                                <div class="tz-media-caption-main">

                                    <span class="tz-media-caption-label">
                                        Field Execution
                                    </span>

                                    <h3>
                                        Direct Outreach Programme
                                    </h3>

                                    <p>
                                        Structured teams operating on ground
                                    </p>

                                </div>

                                <div class="tz-media-arrow">
                                    <i data-lucide="arrow-up-right"
                                       class="w-5 h-5"></i>
                                </div>

                            </div>

                        </div>

                        <div class="tz-media-tag">
                            05 / Outreach
                        </div>

                    </div>

                </div>

            </div>

        </article>


        <!-- =================================================
             06 OUTDOOR
        ================================================== -->

        <article class="tz-service reverse"
                 id="broadcast-print-outdoor">

            <div class="tz-service-grid">

                <div class="tz-service-copy tz-reveal-right">

                    <div class="tz-service-index">
                        06
                    </div>

                    <div class="tz-service-meta">

                        <span class="tz-service-number">
                            PILLAR 06
                        </span>

                        <span class="tz-service-category">
                            Outdoor
                        </span>

                    </div>

                    <h2 class="tz-service-title">
                        Broadcast, Print
                        <br>
                        & Highway Outdoor
                    </h2>

                    <p class="tz-service-lead">
                        Strategic highway takeovers, toll-naka distribution,
                        print collateral, and guerrilla PR stunts in
                        high-visibility corridors.
                    </p>

                    <p class="tz-service-description">
                        High-impact outdoor branding campaigns, highway tag
                        distributions run in collaboration with public
                        authorities, print collateral production, and
                        disruptive ambient public stunts.
                    </p>

                    <div class="tz-capability-list">

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Highway toll-naka distributions
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Outdoor branding
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            Broadcast marketing support
                        </div>

                        <div class="tz-capability-item">
                            <i data-lucide="check-circle-2"></i>
                            PR & guerrilla stunts
                        </div>

                    </div>

                    <div class="tz-service-actions">

                        <a href="case-study.php?slug=yokohama-road-safety"
                           class="tz-primary-btn magnetic">
                            View Case Study Proof
                            <i data-lucide="arrow-up-right"
                               class="w-4 h-4"></i>
                        </a>

                        <a href="contact.php?service=Outdoor%20Branding"
                           class="tz-secondary-btn magnetic">
                            Inquire for this Pillar
                        </a>

                    </div>

                </div>


                <div class="tz-service-media tz-reveal-left">

                    <div class="tz-media-shell">

                        <div class="tz-media-blob"></div>

                        <div class="tz-media-frame">

                            <img
                                src="assets/img/work/yokohama-road-safety-1.jpg"
                                alt="Yokohama Highway Road Safety Outdoor Campaign"
                                loading="lazy">

                            <div class="tz-media-caption">

                                <div class="tz-media-caption-main">

                                    <span class="tz-media-caption-label">
                                        Outdoor
                                    </span>

                                    <h3>
                                        Highway Brand Visibility
                                    </h3>

                                    <p>
                                        High-visibility public corridor activation
                                    </p>

                                </div>

                                <div class="tz-media-arrow">
                                    <i data-lucide="arrow-up-right"
                                       class="w-5 h-5"></i>
                                </div>

                            </div>

                        </div>

                        <div class="tz-media-tag">
                            06 / Outdoor
                        </div>

                    </div>

                </div>

            </div>

        </article>

    </section>


    <!-- =====================================================
         CLOSING CTA
    ====================================================== -->

    <section class="tz-services-close">

        <div class="tz-close-panel">

            <div class="tz-close-content">

                <div class="tz-close-kicker tz-reveal">
                    One Experiential Partner
                </div>

                <h2 class="tz-close-title tz-reveal">
                    Your brief deserves
                    <br>
                    <span>real execution.</span>
                </h2>

                <p class="tz-close-copy tz-reveal">
                    Bring us the business objective, the audience and
                    the ambition. We will build the experience architecture
                    and execution plan around it.
                </p>

                <div class="tz-close-actions tz-reveal">

                    <a href="contact.php"
                       class="tz-close-btn-light magnetic">
                        Request an Event Proposal
                        <i data-lucide="arrow-up-right"
                           class="w-4 h-4"></i>
                    </a>

                    <a href="work.php"
                       class="tz-close-btn-outline magnetic">
                        Explore Case Studies
                        <i data-lucide="layers-3"
                           class="w-4 h-4"></i>
                    </a>

                </div>

            </div>

        </div>

    </section>

</main>


<!-- =========================================================
     GSAP + SCROLLTRIGGER
========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ---------------------------------------------
       Lucide
    --------------------------------------------- */

    if (window.lucide) {
        lucide.createIcons();
    }


    /* ---------------------------------------------
       Reduced motion
    --------------------------------------------- */

    const reduceMotion =
        window.matchMedia &&
        window.matchMedia('(prefers-reduced-motion: reduce)').matches;


    /* ---------------------------------------------
       GSAP reveal system
    --------------------------------------------- */

    if (
        !reduceMotion &&
        window.gsap &&
        window.ScrollTrigger
    ) {

        gsap.registerPlugin(ScrollTrigger);


        /* Hero */
        gsap.from('.hero-line', {
            yPercent: 110,
            opacity: 0,
            duration: 1.1,
            stagger: .11,
            ease: 'power4.out',
            delay: .15
        });


        /* General reveal */
        gsap.utils.toArray('.tz-reveal').forEach(function (element) {

            gsap.to(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 88%',
                    once: true
                },
                opacity: 1,
                y: 0,
                duration: .85,
                ease: 'power3.out'
            });

        });


        gsap.utils.toArray('.tz-reveal-left').forEach(function (element) {

            gsap.to(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 84%',
                    once: true
                },
                opacity: 1,
                x: 0,
                duration: 1,
                ease: 'power3.out'
            });

        });


        gsap.utils.toArray('.tz-reveal-right').forEach(function (element) {

            gsap.to(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 84%',
                    once: true
                },
                opacity: 1,
                x: 0,
                duration: 1,
                ease: 'power3.out'
            });

        });


        /* Service media parallax */
        gsap.utils.toArray('.tz-media-frame img').forEach(function (image) {

            gsap.to(image, {
                yPercent: -7,
                ease: 'none',
                scrollTrigger: {
                    trigger: image.closest('.tz-service'),
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1
                }
            });

        });


        /* Service index drift */
        gsap.utils.toArray('.tz-service-index').forEach(function (index) {

            gsap.to(index, {
                y: -45,
                ease: 'none',
                scrollTrigger: {
                    trigger: index.closest('.tz-service'),
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1.3
                }
            });

        });


        /* Closing panel entrance */
        gsap.from('.tz-close-panel', {
            scrollTrigger: {
                trigger: '.tz-close-panel',
                start: 'top 85%',
                once: true
            },
            y: 60,
            opacity: 0,
            duration: 1.1,
            ease: 'power3.out'
        });


        /* Capability navigation highlighting */
        const services = gsap.utils.toArray('.tz-service');
        const navLinks = gsap.utils.toArray('.tz-index-link');

        services.forEach(function (service, index) {

            ScrollTrigger.create({
                trigger: service,
                start: 'top 48%',
                end: 'bottom 48%',

                onEnter: function () {
                    navLinks.forEach(link =>
                        link.classList.remove('active')
                    );

                    if (navLinks[index]) {
                        navLinks[index].classList.add('active');
                    }
                },

                onEnterBack: function () {
                    navLinks.forEach(link =>
                        link.classList.remove('active')
                    );

                    if (navLinks[index]) {
                        navLinks[index].classList.add('active');
                    }
                }
            });

        });

    } else {

        /* Reduced motion fallback */
        document
            .querySelectorAll('.tz-reveal, .tz-reveal-left, .tz-reveal-right')
            .forEach(function (element) {
                element.style.opacity = '1';
                element.style.transform = 'none';
            });

    }


    /* ---------------------------------------------
       Magnetic buttons
       Desktop / fine pointer only
    --------------------------------------------- */

    if (
        !reduceMotion &&
        window.matchMedia('(hover: hover) and (pointer: fine)').matches
    ) {

        document.querySelectorAll('.magnetic').forEach(function (button) {

            button.addEventListener('mousemove', function (event) {

                const rect = button.getBoundingClientRect();

                const x =
                    event.clientX -
                    (rect.left + rect.width / 2);

                const y =
                    event.clientY -
                    (rect.top + rect.height / 2);

                gsap.to(button, {
                    x: x * .12,
                    y: y * .12,
                    duration: .3,
                    ease: 'power2.out'
                });

            });

            button.addEventListener('mouseleave', function () {

                gsap.to(button, {
                    x: 0,
                    y: 0,
                    duration: .5,
                    ease: 'elastic.out(1, .4)'
                });

            });

        });

    }


    /* ---------------------------------------------
       Smooth anchor navigation
    --------------------------------------------- */

    document
        .querySelectorAll('.tz-index-link, a[href^="#"]')
        .forEach(function (link) {

            link.addEventListener('click', function (event) {

                const targetId =
                    link.getAttribute('href');

                if (
                    !targetId ||
                    targetId === '#' ||
                    !targetId.startsWith('#')
                ) {
                    return;
                }

                const target =
                    document.querySelector(targetId);

                if (!target) {
                    return;
                }

                event.preventDefault();

                target.scrollIntoView({
                    behavior: reduceMotion ? 'auto' : 'smooth',
                    block: 'start'
                });

            });

        });

});
</script>


<?php include __DIR__ . '/includes/footer.php'; ?>