<?php
/**
 * Trendz Eventz — About Us
 * Editorial Experiential Agency Experience
 * Tailwind CSS + DaisyUI + GSAP + ScrollTrigger + Lucide
 */

$current_page = 'about';
$page_title = 'About Us | Trendz Eventz — 15+ Years Experiential Agency Mumbai';
$page_desc = 'Discover Trendz Eventz: Founded by Bharat Jadhav, we combine audacious creative with relentless execution discipline across 500+ corporate productions.';

include __DIR__ . '/includes/header.php';
?>

<style>
/* =========================================================
   TRENDZ ABOUT — ART-DIRECTED MOTION SYSTEM
========================================================= */

:root {
    --tz-violet: #5b21b6;
    --tz-violet-deep: #32135f;
    --tz-orchid: #a855f7;
    --tz-pink: #ec4899;
    --tz-ink: #17121f;
    --tz-muted: #6f6878;
    --tz-paper: #faf9f7;
    --tz-line: rgba(91, 33, 182, .12);
}

/* ---------- BASE ---------- */

.tz-about {
    position: relative;
    overflow: hidden;
    background:
        linear-gradient(
            180deg,
            #ffffff 0%,
            #fbfafc 42%,
            #ffffff 100%
        );
    color: var(--tz-ink);
}

.tz-about *,
.tz-about *::before,
.tz-about *::after {
    box-sizing: border-box;
}

.tz-about img {
    display: block;
    max-width: 100%;
}

.tz-about a {
    text-decoration: none;
}

/* ---------- GLOBAL AMBIENT ---------- */

.tz-ambient {
    position: absolute;
    inset: 0;
    pointer-events: none;
    overflow: hidden;
    z-index: 0;
}

.tz-blob {
    position: absolute;
    width: 34rem;
    height: 34rem;
    border-radius: 42% 58% 63% 37% / 43% 39% 61% 57%;
    filter: blur(70px);
    opacity: .14;
    will-change: transform;
}

.tz-blob-1 {
    top: -12rem;
    right: -12rem;
    background: #c084fc;
    animation: organicBlobOne 14s ease-in-out infinite alternate;
}

.tz-blob-2 {
    top: 34%;
    left: -18rem;
    background: #f0abfc;
    animation: organicBlobTwo 18s ease-in-out infinite alternate;
}

.tz-blob-3 {
    bottom: 4%;
    right: -15rem;
    background: #93c5fd;
    animation: organicBlobThree 16s ease-in-out infinite alternate;
}

@keyframes organicBlobOne {
    0% {
        transform: translate3d(0,0,0) rotate(0deg) scale(1);
        border-radius: 42% 58% 63% 37% / 43% 39% 61% 57%;
    }
    100% {
        transform: translate3d(-5rem,4rem,0) rotate(25deg) scale(1.12);
        border-radius: 64% 36% 42% 58% / 56% 62% 38% 44%;
    }
}

@keyframes organicBlobTwo {
    0% {
        transform: translate3d(0,0,0) rotate(0deg);
    }
    100% {
        transform: translate3d(4rem,-3rem,0) rotate(-20deg);
    }
}

@keyframes organicBlobThree {
    0% {
        transform: translate3d(0,0,0) rotate(0deg);
    }
    100% {
        transform: translate3d(-4rem,-2rem,0) rotate(18deg);
    }
}

/* ---------- GRID ---------- */

.tz-grid {
    position: absolute;
    inset: 0;
    opacity: .28;
    background-image:
        linear-gradient(rgba(91,33,182,.045) 1px, transparent 1px),
        linear-gradient(90deg, rgba(91,33,182,.045) 1px, transparent 1px);
    background-size: 48px 48px;
    mask-image: linear-gradient(
        to bottom,
        black 0%,
        transparent 72%
    );
}

/* ---------- CONTOURS ---------- */

.tz-contours {
    position: absolute;
    inset: 0;
    pointer-events: none;
}

.tz-contours svg {
    width: 100%;
    height: 100%;
}

.tz-contour-path {
    fill: none;
    stroke: rgba(124,58,237,.13);
    stroke-width: 1;
    stroke-dasharray: 12 20;
    animation: contourMove 20s linear infinite;
}

.tz-contour-path:nth-child(2) {
    stroke: rgba(236,72,153,.09);
    animation-duration: 28s;
}

.tz-contour-path:nth-child(3) {
    stroke: rgba(59,130,246,.08);
    animation-duration: 35s;
}

@keyframes contourMove {
    to {
        stroke-dashoffset: -500;
    }
}

/* =========================================================
   HERO
========================================================= */

.tz-hero {
    position: relative;
    min-height: min(850px, calc(100svh - 70px));
    display: flex;
    align-items: center;
    isolation: isolate;
}

.tz-hero-inner {
    position: relative;
    z-index: 3;
    width: 100%;
    max-width: 1280px;
    margin: auto;
    padding:
        7rem 1.25rem
        6rem;
}

.tz-breadcrumb {
    display: inline-flex;
    align-items: center;
    gap: .65rem;
    margin-bottom: 2.5rem;
    font-size: .72rem;
    font-weight: 800;
    letter-spacing: .16em;
    text-transform: uppercase;
    color: #6d28d9;
}

.tz-breadcrumb-line {
    width: 3rem;
    height: 1px;
    background: linear-gradient(
        90deg,
        #7c3aed,
        transparent
    );
}

.tz-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: .6rem;
    padding: .55rem .8rem;
    border: 1px solid rgba(124,58,237,.18);
    background: rgba(255,255,255,.7);
    backdrop-filter: blur(16px);
    border-radius: 999px;
    color: #6d28d9;
    font-size: .68rem;
    font-weight: 900;
    letter-spacing: .16em;
    text-transform: uppercase;
    box-shadow: 0 10px 35px rgba(91,33,182,.06);
}

.tz-eyebrow-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #a855f7;
    box-shadow: 0 0 0 5px rgba(168,85,247,.10);
    animation: pulseDot 2s ease-in-out infinite;
}

@keyframes pulseDot {
    0%,100% {
        transform: scale(1);
        opacity: .75;
    }
    50% {
        transform: scale(1.4);
        opacity: 1;
    }
}

.tz-hero-title {
    max-width: 1000px;
    margin: 1.5rem 0 1.75rem;
    font-size: clamp(3.5rem, 8.5vw, 8rem);
    line-height: .9;
    letter-spacing: -.065em;
    font-weight: 900;
    color: #21172a;
}

.tz-hero-title .line {
    display: block;
    overflow: hidden;
}

.tz-hero-title .word {
    display: inline-block;
    transform: translateY(110%);
    opacity: 0;
}

.tz-hero-title .accent {
    color: #6d28d9;
    position: relative;
}

.tz-hero-title .accent::after {
    content: "";
    position: absolute;
    left: 3%;
    right: -2%;
    bottom: .05em;
    height: .08em;
    border-radius: 999px;
    background: linear-gradient(
        90deg,
        #7c3aed,
        #ec4899,
        #c084fc
    );
    transform: scaleX(0);
    transform-origin: left;
}

.tz-hero-copy {
    max-width: 720px;
    color: #6b6472;
    font-size: clamp(1rem, 1.6vw, 1.2rem);
    line-height: 1.85;
    opacity: 0;
    transform: translateY(30px);
}

.tz-hero-meta {
    display: grid;
    grid-template-columns: repeat(3, auto);
    gap: 2.5rem;
    margin-top: 3rem;
    opacity: 0;
    transform: translateY(30px);
}

.tz-meta-item {
    position: relative;
}

.tz-meta-item:not(:last-child)::after {
    content: "";
    position: absolute;
    top: 0;
    right: -1.25rem;
    width: 1px;
    height: 100%;
    background: rgba(91,33,182,.14);
}

.tz-meta-number {
    font-size: 2rem;
    line-height: 1;
    font-weight: 900;
    color: #3b1a5d;
}

.tz-meta-label {
    margin-top: .45rem;
    font-size: .65rem;
    font-weight: 800;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: #8a8290;
}

/* ---------- HERO ORBIT ---------- */

.tz-hero-orbit {
    position: absolute;
    width: 560px;
    height: 560px;
    right: -130px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
}

.tz-orbit {
    position: absolute;
    inset: 0;
    border: 1px solid rgba(124,58,237,.13);
    border-radius: 50%;
    animation: orbitRotate 28s linear infinite;
}

.tz-orbit:nth-child(2) {
    inset: 70px;
    border-color: rgba(236,72,153,.12);
    animation-duration: 20s;
    animation-direction: reverse;
}

.tz-orbit:nth-child(3) {
    inset: 145px;
    border-color: rgba(59,130,246,.10);
    animation-duration: 15s;
}

.tz-orbit-core {
    position: absolute;
    width: 145px;
    height: 145px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 47% 53% 58% 42% / 48% 41% 59% 52%;
    background:
        radial-gradient(
            circle at 35% 30%,
            rgba(255,255,255,.95),
            rgba(196,181,253,.5) 45%,
            rgba(168,85,247,.18)
        );
    filter: blur(.2px);
    box-shadow:
        0 30px 100px rgba(124,58,237,.15);
    animation: coreMorph 8s ease-in-out infinite alternate;
}

@keyframes orbitRotate {
    to {
        transform: rotate(360deg);
    }
}

@keyframes coreMorph {
    from {
        border-radius: 47% 53% 58% 42% / 48% 41% 59% 52%;
    }
    to {
        border-radius: 63% 37% 45% 55% / 58% 51% 49% 42%;
    }
}

/* =========================================================
   SECTION SYSTEM
========================================================= */

.tz-section {
    position: relative;
    padding: 8rem 1.25rem;
    overflow: hidden;
}

.tz-container {
    position: relative;
    z-index: 2;
    max-width: 1280px;
    margin: auto;
}

.tz-section-header {
    max-width: 800px;
    margin-bottom: 4rem;
}

.tz-kicker {
    display: inline-flex;
    align-items: center;
    gap: .55rem;
    margin-bottom: 1rem;
    color: #7c3aed;
    font-size: .68rem;
    font-weight: 900;
    letter-spacing: .16em;
    text-transform: uppercase;
}

.tz-kicker::before {
    content: "";
    width: 2.2rem;
    height: 2px;
    background: linear-gradient(
        90deg,
        #7c3aed,
        #ec4899
    );
}

.tz-section-title {
    margin: 0;
    color: #21172a;
    font-size: clamp(2.7rem, 5vw, 5rem);
    line-height: .98;
    letter-spacing: -.055em;
    font-weight: 900;
}

.tz-section-copy {
    margin-top: 1.25rem;
    max-width: 700px;
    color: #716a76;
    font-size: 1.05rem;
    line-height: 1.8;
}

/* =========================================================
   STORY
========================================================= */

.tz-story {
    background: #fff;
}

.tz-story-layout {
    display: grid;
    grid-template-columns: minmax(0, .9fr) minmax(0, 1.1fr);
    gap: clamp(3rem, 7vw, 8rem);
    align-items: center;
}

.tz-chapter {
    font-size: clamp(6rem, 14vw, 12rem);
    line-height: .7;
    font-weight: 900;
    letter-spacing: -.1em;
    color: rgba(91,33,182,.055);
    margin-bottom: -1rem;
}

.tz-story-title {
    max-width: 650px;
    font-size: clamp(2.4rem, 5vw, 5rem);
    line-height: .98;
    letter-spacing: -.055em;
    font-weight: 900;
    color: #24182d;
}

.tz-story-text {
    margin-top: 1.5rem;
    color: #716a76;
    line-height: 1.9;
}

.tz-story-actions {
    display: flex;
    flex-wrap: wrap;
    gap: .8rem;
    margin-top: 2rem;
}

.tz-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: .65rem;
    min-height: 48px;
    padding: .8rem 1.2rem;
    border-radius: 999px;
    font-size: .8rem;
    font-weight: 800;
    transition:
        transform .35s ease,
        box-shadow .35s ease,
        background .35s ease;
    overflow: hidden;
}

.tz-btn-primary {
    color: white;
    background: #5b21b6;
    box-shadow: 0 15px 35px rgba(91,33,182,.2);
}

.tz-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 45px rgba(91,33,182,.3);
}

.tz-btn-secondary {
    color: #5b21b6;
    border: 1px solid rgba(91,33,182,.18);
    background: rgba(255,255,255,.8);
}

.tz-btn-secondary:hover {
    transform: translateY(-3px);
    border-color: rgba(91,33,182,.4);
}

.tz-story-visual {
    position: relative;
}

.tz-story-image-wrap {
    position: relative;
    overflow: hidden;
    border-radius: 3rem 1rem 3rem 1rem;
    box-shadow:
        0 40px 100px rgba(44,23,62,.14);
}

.tz-story-image {
    width: 100%;
    aspect-ratio: 4 / 4.6;
    object-fit: cover;
    transform: scale(1.08);
    transition: transform 1.4s cubic-bezier(.16,1,.3,1);
}

.tz-story-image-wrap:hover .tz-story-image {
    transform: scale(1.15);
}

.tz-story-image-overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            180deg,
            transparent 45%,
            rgba(35,18,50,.6) 100%
        );
}

.tz-story-caption {
    position: absolute;
    left: 1.5rem;
    right: 1.5rem;
    bottom: 1.5rem;
    color: white;
}

.tz-story-caption small {
    display: block;
    margin-bottom: .4rem;
    font-size: .62rem;
    font-weight: 900;
    letter-spacing: .15em;
    text-transform: uppercase;
    opacity: .7;
}

.tz-story-caption strong {
    font-size: 1.2rem;
}

.tz-story-float {
    position: absolute;
    left: -2rem;
    bottom: -2rem;
    width: 170px;
    padding: 1.2rem;
    border-radius: 1.5rem 1.5rem .4rem 1.5rem;
    background: rgba(255,255,255,.9);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,.9);
    box-shadow: 0 25px 70px rgba(42,20,58,.15);
}

.tz-story-float-number {
    font-size: 2.4rem;
    line-height: 1;
    font-weight: 900;
    color: #5b21b6;
}

.tz-story-float-label {
    margin-top: .4rem;
    color: #817986;
    font-size: .65rem;
    line-height: 1.4;
    font-weight: 800;
    letter-spacing: .08em;
    text-transform: uppercase;
}

/* =========================================================
   SCALE
========================================================= */

.tz-scale {
    background:
        linear-gradient(
            135deg,
            #f7f3fb 0%,
            #fff 45%,
            #faf6fb 100%
        );
}

.tz-scale-layout {
    display: grid;
    grid-template-columns: .7fr 1.3fr;
    gap: 5rem;
    align-items: end;
}

.tz-scale-intro {
    position: sticky;
    top: 120px;
}

.tz-scale-statement {
    margin-top: 1.5rem;
    color: #6f6875;
    line-height: 1.8;
}

.tz-scale-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

.tz-stat {
    position: relative;
    min-height: 240px;
    padding: 1.7rem;
    overflow: hidden;
    border: 1px solid rgba(91,33,182,.1);
    background: rgba(255,255,255,.76);
    border-radius: 2rem 1rem 2rem 1rem;
    box-shadow: 0 15px 50px rgba(49,28,61,.05);
    transition:
        transform .5s cubic-bezier(.16,1,.3,1),
        box-shadow .5s ease;
}

.tz-stat:hover {
    transform: translateY(-8px);
    box-shadow: 0 30px 80px rgba(91,33,182,.12);
}

.tz-stat-index {
    font-size: .62rem;
    font-weight: 900;
    color: #a394ab;
    letter-spacing: .15em;
}

.tz-stat-number {
    margin-top: 2.7rem;
    font-size: clamp(3.5rem, 7vw, 6rem);
    line-height: .8;
    font-weight: 900;
    letter-spacing: -.07em;
    color: #32135f;
}

.tz-stat-label {
    margin-top: 1.3rem;
    max-width: 180px;
    color: #6f6875;
    font-size: .78rem;
    line-height: 1.5;
    font-weight: 700;
}

.tz-stat-orb {
    position: absolute;
    width: 110px;
    height: 110px;
    right: -35px;
    top: -35px;
    border-radius: 50%;
    background: radial-gradient(
        circle,
        rgba(192,132,252,.24),
        transparent 70%
    );
}

/* =========================================================
   FOUNDER
========================================================= */

.tz-founder {
    background: #fff;
}

.tz-founder-panel {
    position: relative;
    display: grid;
    grid-template-columns: .75fr 1.25fr;
    min-height: 620px;
    overflow: hidden;
    border-radius: 3rem 1rem 3rem 1rem;
    background:
        linear-gradient(
            135deg,
            #2e174c 0%,
            #4b236f 50%,
            #32184d 100%
        );
    box-shadow: 0 45px 120px rgba(51,23,73,.2);
}

.tz-founder-panel::before {
    content: "";
    position: absolute;
    width: 600px;
    height: 600px;
    right: -200px;
    top: -250px;
    border-radius: 45% 55% 65% 35%;
    background:
        radial-gradient(
            circle,
            rgba(236,72,153,.25),
            transparent 68%
        );
    animation: founderBlob 12s ease-in-out infinite alternate;
}

@keyframes founderBlob {
    to {
        transform: rotate(30deg) translate(-30px,40px);
        border-radius: 65% 35% 45% 55%;
    }
}

.tz-founder-image {
    position: relative;
    z-index: 2;
    overflow: hidden;
    min-height: 620px;
}

.tz-founder-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    filter: saturate(.85);
}

.tz-founder-image::after {
    content: "";
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            90deg,
            transparent 45%,
            rgba(46,23,76,.65) 100%
        );
}

.tz-founder-content {
    position: relative;
    z-index: 3;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: clamp(2rem,5vw,5rem);
    color: white;
}

.tz-founder-kicker {
    color: #d8b4fe;
    font-size: .68rem;
    font-weight: 900;
    letter-spacing: .16em;
    text-transform: uppercase;
}

.tz-founder-quote {
    margin-top: 1.5rem;
    font-size: clamp(2rem, 4vw, 4.2rem);
    line-height: 1.02;
    letter-spacing: -.045em;
    font-weight: 900;
}

.tz-founder-name {
    margin-top: 2rem;
    font-size: 1rem;
    font-weight: 900;
}

.tz-founder-role {
    margin-top: .35rem;
    color: rgba(255,255,255,.6);
    font-size: .7rem;
    font-weight: 700;
    letter-spacing: .12em;
    text-transform: uppercase;
}

.tz-signature {
    width: 170px;
    margin-top: 2rem;
    filter: brightness(0) invert(1);
    opacity: .8;
}

.tz-founder-stats {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    margin-top: 3rem;
}

.tz-founder-stat strong {
    display: block;
    font-size: 1.6rem;
}

.tz-founder-stat span {
    display: block;
    margin-top: .3rem;
    color: rgba(255,255,255,.5);
    font-size: .6rem;
    font-weight: 800;
    letter-spacing: .1em;
    text-transform: uppercase;
}

/* =========================================================
   PROCESS
========================================================= */

.tz-process {
    background: #faf9f7;
}

.tz-process-layout {
    display: grid;
    grid-template-columns: .7fr 1.3fr;
    gap: 5rem;
}

.tz-process-intro {
    position: sticky;
    top: 110px;
    align-self: start;
}

.tz-process-note {
    margin-top: 1.5rem;
    max-width: 380px;
    color: #716a76;
    line-height: 1.8;
}

.tz-process-list {
    position: relative;
    padding-left: 3.5rem;
}

.tz-process-line {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 12px;
    width: 2px;
    background: rgba(91,33,182,.1);
    overflow: hidden;
}

.tz-process-progress {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 0;
    background:
        linear-gradient(
            180deg,
            #7c3aed,
            #ec4899,
            #c084fc
        );
    transform-origin: top;
}

.tz-process-item {
    position: relative;
    min-height: 220px;
    padding-bottom: 4rem;
}

.tz-process-node {
    position: absolute;
    left: -3.5rem;
    top: 0;
    width: 26px;
    height: 26px;
    border: 5px solid #faf9f7;
    border-radius: 50%;
    background: #7c3aed;
    box-shadow:
        0 0 0 1px rgba(124,58,237,.2),
        0 10px 30px rgba(124,58,237,.25);
    transform: scale(.5);
    transition: transform .4s ease;
}

.tz-process-item.is-active .tz-process-node {
    transform: scale(1);
}

.tz-process-stage {
    display: inline-block;
    margin-bottom: .75rem;
    color: #7c3aed;
    font-size: .65rem;
    font-weight: 900;
    letter-spacing: .15em;
    text-transform: uppercase;
}

.tz-process-title {
    font-size: clamp(2rem, 3vw, 3.3rem);
    line-height: 1;
    letter-spacing: -.045em;
    font-weight: 900;
    color: #24182d;
}

.tz-process-copy {
    max-width: 580px;
    margin-top: 1rem;
    color: #716a76;
    line-height: 1.8;
}

.tz-process-arrow {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    margin-top: 1.2rem;
    color: #5b21b6;
    font-size: .68rem;
    font-weight: 900;
    letter-spacing: .1em;
    text-transform: uppercase;
}

.tz-process-arrow svg {
    transition: transform .3s ease;
}

.tz-process-item:hover .tz-process-arrow svg {
    transform: translateX(5px);
}

/* =========================================================
   CLOSING
========================================================= */

.tz-closing {
    position: relative;
    padding: 8rem 1.25rem 9rem;
    color: white;
    background:
        linear-gradient(
            135deg,
            #32135f 0%,
            #4b1f68 55%,
            #32135f 100%
        );
    overflow: hidden;
}

.tz-closing::before,
.tz-closing::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    filter: blur(10px);
}

.tz-closing::before {
    width: 500px;
    height: 500px;
    top: -250px;
    right: -120px;
    background: rgba(236,72,153,.16);
}

.tz-closing::after {
    width: 400px;
    height: 400px;
    bottom: -250px;
    left: -120px;
    background: rgba(168,85,247,.2);
}

.tz-closing-inner {
    position: relative;
    z-index: 2;
    max-width: 900px;
    margin: auto;
    text-align: center;
}

.tz-closing-kicker {
    color: #d8b4fe;
    font-size: .68rem;
    font-weight: 900;
    letter-spacing: .16em;
    text-transform: uppercase;
}

.tz-closing-title {
    margin-top: 1rem;
    font-size: clamp(3rem, 7vw, 7rem);
    line-height: .9;
    letter-spacing: -.065em;
    font-weight: 900;
}

.tz-closing-copy {
    max-width: 650px;
    margin: 1.5rem auto 2rem;
    color: rgba(255,255,255,.7);
    line-height: 1.8;
}

.tz-closing-actions {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: .8rem;
}

.tz-closing .tz-btn-primary {
    color: #32135f;
    background: white;
}

.tz-closing .tz-btn-secondary {
    color: white;
    border-color: rgba(255,255,255,.25);
    background: rgba(255,255,255,.08);
}

/* =========================================================
   REVEAL SYSTEM
========================================================= */

.tz-reveal {
    opacity: 0;
    transform: translateY(50px);
}

.tz-reveal-left {
    opacity: 0;
    transform: translateX(-60px);
}

.tz-reveal-right {
    opacity: 0;
    transform: translateX(60px);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1024px) {

    .tz-hero-orbit {
        width: 420px;
        height: 420px;
        right: -180px;
        opacity: .65;
    }

    .tz-story-layout,
    .tz-scale-layout,
    .tz-founder-panel,
    .tz-process-layout {
        grid-template-columns: 1fr;
    }

    .tz-scale-intro,
    .tz-process-intro {
        position: static;
    }

    .tz-founder-image {
        min-height: 520px;
    }

    .tz-founder-content {
        min-height: 500px;
    }

    .tz-process-layout {
        gap: 3rem;
    }
}

@media (max-width: 768px) {

    .tz-section {
        padding: 5.5rem 1rem;
    }

    .tz-hero {
        min-height: auto;
    }

    .tz-hero-inner {
        padding:
            5rem 1rem
            5rem;
    }

    .tz-hero-title {
        font-size: clamp(3.2rem, 15vw, 5.5rem);
    }

    .tz-hero-copy {
        font-size: .98rem;
    }

    .tz-hero-meta {
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    .tz-meta-item:not(:last-child)::after {
        right: -.5rem;
    }

    .tz-meta-number {
        font-size: 1.5rem;
    }

    .tz-meta-label {
        font-size: .55rem;
    }

    .tz-hero-orbit {
        width: 320px;
        height: 320px;
        right: -180px;
        top: 20%;
        opacity: .4;
    }

    .tz-story-layout {
        gap: 3rem;
    }

    .tz-story-float {
        left: 1rem;
        bottom: -1.5rem;
    }

    .tz-scale-grid {
        grid-template-columns: 1fr;
    }

    .tz-stat {
        min-height: 210px;
    }

    .tz-founder-panel {
        border-radius: 2rem .7rem 2rem .7rem;
    }

    .tz-founder-image {
        min-height: 420px;
    }

    .tz-founder-content {
        min-height: auto;
        padding: 2.5rem 1.5rem 3rem;
    }

    .tz-founder-quote {
        font-size: 2.5rem;
    }

    .tz-founder-stats {
        gap: 1.3rem;
    }

    .tz-process-list {
        padding-left: 2.8rem;
    }

    .tz-process-line {
        left: 10px;
    }

    .tz-process-node {
        left: -2.8rem;
        width: 22px;
        height: 22px;
    }

    .tz-process-item {
        min-height: 200px;
    }

    .tz-closing {
        padding: 6rem 1rem 7rem;
    }

    .tz-closing-title {
        font-size: clamp(3.2rem, 15vw, 5rem);
    }
}

@media (max-width: 480px) {

    .tz-hero-meta {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .tz-meta-item {
        display: grid;
        grid-template-columns: 70px 1fr;
        align-items: center;
    }

    .tz-meta-item:not(:last-child)::after {
        display: none;
    }

    .tz-meta-label {
        margin-top: 0;
    }

    .tz-story-title {
        font-size: 2.6rem;
    }

    .tz-section-title {
        font-size: 2.8rem;
    }

    .tz-process-title {
        font-size: 2.2rem;
    }
}

/* =========================================================
   REDUCED MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    *,
    *::before,
    *::after {
        animation-duration: .01ms !important;
        animation-iteration-count: 1 !important;
        scroll-behavior: auto !important;
        transition-duration: .01ms !important;
    }

    .tz-reveal,
    .tz-reveal-left,
    .tz-reveal-right,
    .tz-hero-title .word,
    .tz-hero-copy,
    .tz-hero-meta {
        opacity: 1 !important;
        transform: none !important;
    }

    .tz-hero-title .accent::after {
        transform: scaleX(1);
    }
}
</style>

<main class="tz-about">

    <!-- =====================================================
         AMBIENT ART DIRECTION
    ====================================================== -->

    <div class="tz-ambient" aria-hidden="true">
        <div class="tz-grid"></div>

        <div class="tz-blob tz-blob-1"></div>
        <div class="tz-blob tz-blob-2"></div>
        <div class="tz-blob tz-blob-3"></div>

        <div class="tz-contours">
            <svg viewBox="0 0 1600 1200" preserveAspectRatio="none">
                <path
                    class="tz-contour-path"
                    d="M-100 700 C250 300 500 950 850 500 C1100 180 1350 420 1700 120"
                />
                <path
                    class="tz-contour-path"
                    d="M-150 850 C220 500 480 1100 900 620 C1180 300 1430 600 1750 250"
                />
                <path
                    class="tz-contour-path"
                    d="M-120 980 C260 600 550 1150 950 760 C1240 470 1470 720 1800 400"
                />
            </svg>
        </div>
    </div>


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="tz-hero">

        <div class="tz-hero-orbit" aria-hidden="true">
            <div class="tz-orbit"></div>
            <div class="tz-orbit"></div>
            <div class="tz-orbit"></div>
            <div class="tz-orbit-core"></div>
        </div>

        <div class="tz-hero-inner">

            <div class="tz-breadcrumb tz-hero-reveal">
                <span>Trendz Eventz</span>
                <span class="tz-breadcrumb-line"></span>
                <span>About Us</span>
            </div>

            <div class="tz-eyebrow tz-hero-reveal">
                <span class="tz-eyebrow-dot"></span>
                Corporate Profile
            </div>

            <h1 class="tz-hero-title" aria-label="15+ Years of Audacious Creative and Relentless Execution">

                <span class="line">
                    <span class="word">15+</span>
                    <span class="word">Years</span>
                    <span class="word">of</span>
                </span>

                <span class="line">
                    <span class="word accent">Audacious</span>
                    <span class="word">Creative</span>
                </span>

                <span class="line">
                    <span class="word">&amp;</span>
                    <span class="word">Relentless</span>
                    <span class="word">Execution.</span>
                </span>

            </h1>

            <p class="tz-hero-copy">
                Trendz Eventz is a Mumbai-rooted experiential agency built around
                one conviction: brands become more powerful when people experience
                them in the real world. For 15+ years, we have combined audacious
                creative thinking with relentless execution discipline across
                India's major commercial hubs.
            </p>

            <div class="tz-hero-meta">

                <div class="tz-meta-item">
                    <div class="tz-meta-number">15+</div>
                    <div class="tz-meta-label">Years Experience</div>
                </div>

                <div class="tz-meta-item">
                    <div class="tz-meta-number">500+</div>
                    <div class="tz-meta-label">Productions &amp; Meets</div>
                </div>

                <div class="tz-meta-item">
                    <div class="tz-meta-number">Pan-India</div>
                    <div class="tz-meta-label">Execution Footprint</div>
                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         STORY
    ====================================================== -->

    <section class="tz-section tz-story">

        <div class="tz-container tz-story-layout">

            <div class="tz-story-copy tz-reveal-left">

                <div class="tz-chapter">01</div>

                <div class="tz-kicker">
                    The Foundation
                </div>

                <h2 class="tz-story-title">
                    Bringing brands face to face with the people who matter.
                </h2>

                <p class="tz-story-text">
                    Trendz Eventz was founded on a simple conviction:
                    the strongest brand relationships are built through
                    meaningful real-world experiences.
                </p>

                <p class="tz-story-text">
                    Over 15+ years, that conviction has evolved into an
                    execution model spanning 500+ activations, conventions,
                    retail rollouts and national tours. We operate as one
                    accountable team — connecting creative thinking,
                    operational planning and on-ground delivery.
                </p>

                <div class="tz-story-actions">

                    <a href="work.php" class="tz-btn tz-btn-primary">
                        <span>Explore Our Work</span>
                        <i data-lucide="arrow-up-right"></i>
                    </a>

                    <a href="contact.php" class="tz-btn tz-btn-secondary">
                        <span>Start a Conversation</span>
                        <i data-lucide="arrow-right"></i>
                    </a>

                </div>

            </div>


            <div class="tz-story-visual tz-reveal-right">

                <div class="tz-story-image-wrap">

                    <img
                        src="assets/img/work/vitra-annual-meet-1.jpg"
                        alt="Vitra Corporate Annual Assembly"
                        class="tz-story-image"
                        loading="lazy"
                    >

                    <div class="tz-story-image-overlay"></div>

                    <div class="tz-story-caption">
                        <small>Corporate Stature</small>
                        <strong>Vitra Corporate Annual Assembly</strong>
                    </div>

                </div>

                <div class="tz-story-float">
                    <div class="tz-story-float-number">15+</div>
                    <div class="tz-story-float-label">
                        Years of experiential execution
                    </div>
                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         SCALE
    ====================================================== -->

    <section class="tz-section tz-scale">

        <div class="tz-container tz-scale-layout">

            <div class="tz-scale-intro tz-reveal-left">

                <div class="tz-kicker">
                    Proven Scale
                </div>

                <h2 class="tz-section-title">
                    Experience measured in real-world execution.
                </h2>

                <p class="tz-scale-statement">
                    Our scale is defined by programmes delivered,
                    locations activated and teams coordinated on the ground.
                </p>

            </div>


            <div class="tz-scale-grid">

                <article class="tz-stat tz-reveal">

                    <span class="tz-stat-index">01 / EXPERIENCE</span>

                    <div
                        class="tz-stat-number tz-counter"
                        data-target="15"
                        data-suffix="+"
                    >
                        0
                    </div>

                    <div class="tz-stat-label">
                        Corporate event &amp; experiential mastery
                    </div>

                    <div class="tz-stat-orb"></div>

                </article>


                <article class="tz-stat tz-reveal">

                    <span class="tz-stat-index">02 / PRODUCTIONS</span>

                    <div
                        class="tz-stat-number tz-counter"
                        data-target="500"
                        data-suffix="+"
                    >
                        0
                    </div>

                    <div class="tz-stat-label">
                        High-attendance executions nationwide
                    </div>

                    <div class="tz-stat-orb"></div>

                </article>


                <article class="tz-stat tz-reveal">

                    <span class="tz-stat-index">03 / ACTIVATION</span>

                    <div
                        class="tz-stat-number tz-counter"
                        data-target="50"
                        data-suffix="+"
                    >
                        0
                    </div>

                    <div class="tz-stat-label">
                        MDS centres activated
                    </div>

                    <div class="tz-stat-orb"></div>

                </article>


                <article class="tz-stat tz-reveal">

                    <span class="tz-stat-index">04 / NATIONAL TOUR</span>

                    <div
                        class="tz-stat-number tz-counter"
                        data-target="10"
                    >
                        0
                    </div>

                    <div class="tz-stat-label">
                        Cities executed in one synchronized tour
                    </div>

                    <div class="tz-stat-orb"></div>

                </article>

            </div>

        </div>

    </section>


    <!-- =====================================================
         FOUNDER
    ====================================================== -->

    <section class="tz-section tz-founder">

        <div class="tz-container">

            <div class="tz-founder-panel tz-reveal">

                <div class="tz-founder-image">

                    <img
                        src="assets/img/brand/bharat-jadhav.jpg"
                        alt="Bharat Jadhav, Founder and Managing Director of Trendz Eventz"
                        loading="lazy"
                    >

                </div>


                <div class="tz-founder-content">

                    <div class="tz-founder-kicker">
                        Leadership &amp; Vision
                    </div>

                    <blockquote class="tz-founder-quote">
                        “Great events do not happen by chance.
                        They happen when audacious creative meets
                        relentless execution discipline.”
                    </blockquote>

                    <div class="tz-founder-name">
                        Bharat Jadhav
                    </div>

                    <div class="tz-founder-role">
                        Founder &amp; Managing Director · Mumbai
                    </div>

                    <img
                        src="assets/img/brand/founder-signature.png"
                        alt="Bharat Jadhav signature"
                        class="tz-signature"
                        loading="lazy"
                    >

                    <div class="tz-founder-stats">

                        <div class="tz-founder-stat">
                            <strong>15+</strong>
                            <span>Years</span>
                        </div>

                        <div class="tz-founder-stat">
                            <strong>500+</strong>
                            <span>Productions</span>
                        </div>

                        <div class="tz-founder-stat">
                            <strong>1</strong>
                            <span>Single Point Accountability</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         EXECUTION SYSTEM
    ====================================================== -->

    <section class="tz-section tz-process">

        <div class="tz-container tz-process-layout">

            <div class="tz-process-intro tz-reveal-left">

                <div class="tz-kicker">
                    Operating System
                </div>

                <h2 class="tz-section-title">
                    Five steps.
                    One accountable team.
                </h2>

                <p class="tz-process-note">
                    Every programme moves through the same disciplined
                    execution rhythm — from the first brief to the final report.
                </p>

            </div>


            <div class="tz-process-list">

                <div class="tz-process-line">
                    <div class="tz-process-progress"></div>
                </div>


                <article class="tz-process-item">

                    <div class="tz-process-node"></div>

                    <span class="tz-process-stage">
                        01 · Foundation
                    </span>

                    <h3 class="tz-process-title">
                        Understand
                    </h3>

                    <p class="tz-process-copy">
                        Decode the brief, the brand and the audience
                        we need to move.
                    </p>

                    <span class="tz-process-arrow">
                        Brief → Insight
                        <i data-lucide="arrow-right"></i>
                    </span>

                </article>


                <article class="tz-process-item">

                    <div class="tz-process-node"></div>

                    <span class="tz-process-stage">
                        02 · Creative
                    </span>

                    <h3 class="tz-process-title">
                        Ideate
                    </h3>

                    <p class="tz-process-copy">
                        Build the concept, creative and experience journey.
                    </p>

                    <span class="tz-process-arrow">
                        Insight → Concept
                        <i data-lucide="arrow-right"></i>
                    </span>

                </article>


                <article class="tz-process-item">

                    <div class="tz-process-node"></div>

                    <span class="tz-process-stage">
                        03 · Operations
                    </span>

                    <h3 class="tz-process-title">
                        Plan
                    </h3>

                    <p class="tz-process-copy">
                        Lock locations, vendors, permissions,
                        budgets and timelines.
                    </p>

                    <span class="tz-process-arrow">
                        Concept → Blueprint
                        <i data-lucide="arrow-right"></i>
                    </span>

                </article>


                <article class="tz-process-item">

                    <div class="tz-process-node"></div>

                    <span class="tz-process-stage">
                        04 · On-Ground
                    </span>

                    <h3 class="tz-process-title">
                        Execute
                    </h3>

                    <p class="tz-process-copy">
                        Deliver on ground with our own teams,
                        city by city.
                    </p>

                    <span class="tz-process-arrow">
                        Blueprint → Reality
                        <i data-lucide="arrow-right"></i>
                    </span>

                </article>


                <article class="tz-process-item">

                    <div class="tz-process-node"></div>

                    <span class="tz-process-stage">
                        05 · Intelligence
                    </span>

                    <h3 class="tz-process-title">
                        Report
                    </h3>

                    <p class="tz-process-copy">
                        Share photos, numbers and learnings
                        after every programme.
                    </p>

                    <span class="tz-process-arrow">
                        Reality → Intelligence
                        <i data-lucide="arrow-right"></i>
                    </span>

                </article>

            </div>

        </div>

    </section>


    <!-- =====================================================
         CLOSING CTA
    ====================================================== -->

    <section class="tz-closing">

        <div class="tz-closing-inner tz-reveal">

            <div class="tz-closing-kicker">
                Build Something Worth Experiencing
            </div>

            <h2 class="tz-closing-title">
                Your brief.
                Our execution.
            </h2>

            <p class="tz-closing-copy">
                Tell us what needs to happen on ground.
                We will bring the creative, operational discipline
                and execution team to make it happen.
            </p>

            <div class="tz-closing-actions">

                <a
                    href="contact.php"
                    class="tz-btn tz-btn-primary"
                >
                    <span>Request a Proposal</span>
                    <i data-lucide="arrow-up-right"></i>
                </a>

                <a
                    href="tel:+9199873999997"
                    class="tz-btn tz-btn-secondary"
                >
                    <span>Call +91 99873 99997</span>
                    <i data-lucide="phone"></i>
                </a>

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
document.addEventListener("DOMContentLoaded", () => {

    /* -------------------------------------------------------
       ICONS
    ------------------------------------------------------- */

    if (window.lucide) {
        lucide.createIcons();
    }


    /* -------------------------------------------------------
       REDUCED MOTION
    ------------------------------------------------------- */

    const reducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;

    if (reducedMotion || typeof gsap === "undefined") {

        document
            .querySelectorAll(".tz-reveal, .tz-reveal-left, .tz-reveal-right")
            .forEach(el => {
                el.style.opacity = "1";
                el.style.transform = "none";
            });

        document
            .querySelectorAll(".tz-hero-title .word")
            .forEach(el => {
                el.style.opacity = "1";
                el.style.transform = "none";
            });

        document
            .querySelectorAll(".tz-counter")
            .forEach(counter => {
                counter.textContent =
                    counter.dataset.target +
                    (counter.dataset.suffix || "");
            });

        return;
    }


    /* -------------------------------------------------------
       GSAP
    ------------------------------------------------------- */

    gsap.registerPlugin(ScrollTrigger);


    /* -------------------------------------------------------
       HERO INTRO
    ------------------------------------------------------- */

    const heroTimeline = gsap.timeline({
        defaults: {
            ease: "power4.out"
        }
    });

    heroTimeline
        .from(".tz-hero-reveal", {
            y: 25,
            opacity: 0,
            duration: .8,
            stagger: .12
        })
        .to(".tz-hero-title .word", {
            y: "0%",
            opacity: 1,
            duration: 1.05,
            stagger: .065
        }, "-=.25")
        .to(".tz-hero-title .accent::after", {
            scaleX: 1,
            duration: .8,
            ease: "power3.inOut"
        }, "-=.35")
        .to(".tz-hero-copy", {
            y: 0,
            opacity: 1,
            duration: .8
        }, "-=.35")
        .to(".tz-hero-meta", {
            y: 0,
            opacity: 1,
            duration: .8
        }, "-=.45");


    /* -------------------------------------------------------
       GENERIC REVEALS
    ------------------------------------------------------- */

    gsap.utils.toArray(".tz-reveal").forEach(el => {

        gsap.fromTo(
            el,
            {
                opacity: 0,
                y: 60
            },
            {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: el,
                    start: "top 82%",
                    once: true
                }
            }
        );

    });


    gsap.utils.toArray(".tz-reveal-left").forEach(el => {

        gsap.fromTo(
            el,
            {
                opacity: 0,
                x: -70
            },
            {
                opacity: 1,
                x: 0,
                duration: 1.1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: el,
                    start: "top 82%",
                    once: true
                }
            }
        );

    });


    gsap.utils.toArray(".tz-reveal-right").forEach(el => {

        gsap.fromTo(
            el,
            {
                opacity: 0,
                x: 70
            },
            {
                opacity: 1,
                x: 0,
                duration: 1.1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: el,
                    start: "top 82%",
                    once: true
                }
            }
        );

    });


    /* -------------------------------------------------------
       STORY IMAGE PARALLAX
    ------------------------------------------------------- */

    const storyImage = document.querySelector(".tz-story-image");

    if (storyImage) {

        gsap.to(storyImage, {
            yPercent: -8,
            ease: "none",
            scrollTrigger: {
                trigger: ".tz-story-image-wrap",
                start: "top bottom",
                end: "bottom top",
                scrub: 1
            }
        });

    }


    /* -------------------------------------------------------
       SCALE COUNTERS
    ------------------------------------------------------- */

    document.querySelectorAll(".tz-counter").forEach(counter => {

        const target = Number(counter.dataset.target);
        const suffix = counter.dataset.suffix || "";

        const state = {
            value: 0
        };

        ScrollTrigger.create({
            trigger: counter,
            start: "top 85%",
            once: true,

            onEnter: () => {

                gsap.to(state, {
                    value: target,
                    duration: 1.8,
                    ease: "power2.out",

                    onUpdate: () => {
                        counter.textContent =
                            Math.floor(state.value) + suffix;
                    }
                });

            }
        });

    });


    /* -------------------------------------------------------
       STAT CARDS STAGGER
    ------------------------------------------------------- */

    gsap.from(".tz-stat", {
        opacity: 0,
        y: 50,
        scale: .97,
        duration: .9,
        stagger: .12,
        ease: "power3.out",

        scrollTrigger: {
            trigger: ".tz-scale-grid",
            start: "top 80%",
            once: true
        }
    });


    /* -------------------------------------------------------
       FOUNDER PANEL
    ------------------------------------------------------- */

    gsap.from(".tz-founder-image img", {
        scale: 1.18,
        duration: 1.8,
        ease: "power3.out",

        scrollTrigger: {
            trigger: ".tz-founder-panel",
            start: "top 75%",
            once: true
        }
    });


    /* -------------------------------------------------------
       PROCESS TIMELINE
    ------------------------------------------------------- */

    const processList = document.querySelector(".tz-process-list");
    const processProgress =
        document.querySelector(".tz-process-progress");

    if (processList && processProgress) {

        gsap.to(processProgress, {
            height: "100%",
            ease: "none",

            scrollTrigger: {
                trigger: processList,
                start: "top 60%",
                end: "bottom 60%",
                scrub: 1
            }
        });

        const processItems =
            document.querySelectorAll(".tz-process-item");

        processItems.forEach(item => {

            ScrollTrigger.create({
                trigger: item,
                start: "top 58%",
                end: "bottom 58%",

                onEnter: () => {
                    item.classList.add("is-active");
                },

                onEnterBack: () => {
                    item.classList.add("is-active");
                },

                onLeaveBack: () => {
                    item.classList.remove("is-active");
                }
            });

        });

    }


    /* -------------------------------------------------------
       CLOSING SCALE REVEAL
    ------------------------------------------------------- */

    gsap.from(".tz-closing-title", {
        y: 70,
        opacity: 0,
        duration: 1.1,
        ease: "power4.out",

        scrollTrigger: {
            trigger: ".tz-closing",
            start: "top 75%",
            once: true
        }
    });


    /* -------------------------------------------------------
       DESKTOP POINTER LIGHT
    ------------------------------------------------------- */

    if (
        window.matchMedia("(pointer: fine)").matches
    ) {

        const pointerGlow = document.createElement("div");

        pointerGlow.style.cssText = `
            position: fixed;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            left: 0;
            top: 0;
            opacity: 0;
            background:
                radial-gradient(
                    circle,
                    rgba(168,85,247,.08) 0%,
                    rgba(168,85,247,0) 70%
                );
            transform: translate(-50%, -50%);
        `;

        document.body.appendChild(pointerGlow);

        window.addEventListener(
            "pointermove",
            e => {

                gsap.to(pointerGlow, {
                    x: e.clientX,
                    y: e.clientY,
                    duration: .7,
                    ease: "power3.out"
                });

                pointerGlow.style.opacity = ".9";

            },
            { passive: true }
        );

    }


    /* -------------------------------------------------------
       MAGNETIC BUTTONS
    ------------------------------------------------------- */

    if (
        window.matchMedia("(pointer: fine)").matches
    ) {

        document.querySelectorAll(".tz-btn").forEach(button => {

            button.addEventListener("pointermove", e => {

                const rect = button.getBoundingClientRect();

                const x =
                    e.clientX -
                    (rect.left + rect.width / 2);

                const y =
                    e.clientY -
                    (rect.top + rect.height / 2);

                gsap.to(button, {
                    x: x * .12,
                    y: y * .12,
                    duration: .35,
                    ease: "power3.out"
                });

            });

            button.addEventListener("pointerleave", () => {

                gsap.to(button, {
                    x: 0,
                    y: 0,
                    duration: .5,
                    ease: "elastic.out(1, .5)"
                });

            });

        });

    }


    /* -------------------------------------------------------
       REFRESH AFTER ALL ASSETS
    ------------------------------------------------------- */

    window.addEventListener("load", () => {
        ScrollTrigger.refresh();
    });

});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>