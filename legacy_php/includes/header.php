<?php
/**
 * Trendz Eventz — Global Production Header
 *
 * Stack:
 * - PHP
 * - Tailwind CSS CDN
 * - Lucide
 * - GSAP
 *
 * Design direction:
 * - Premium experiential agency
 * - Editorial / architectural
 * - Organic motion
 * - Minimal, high-end interaction
 * - No DaisyUI dependency
 */

header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');

$page = $current_page ?? 'home';

$page_title = $page_title
    ?? 'Trendz Eventz — Experiential Marketing & Corporate Events Agency Mumbai';

$page_desc = $page_desc
    ?? 'Meaningful experiences. Measurable momentum. Trendz Eventz delivers corporate events, pan-India dealer meets, launches, BTL activations, and retail branding.';

$canonical_base = 'https://trendzeventz.com/';
$canonical_url = $canonical_base . (($page === 'home') ? '' : $page . '.php');

function nav_active(string $target, string $current): string
{
    return $target === $current
        ? 'is-active'
        : '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- =====================================================
         CORE
    ====================================================== -->

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, viewport-fit=cover"
    >

    <meta
        name="theme-color"
        content="#F7F7F9"
    >

    <meta
        name="color-scheme"
        content="light"
    >

    <title>
        <?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?>
    </title>

    <meta
        name="description"
        content="<?= htmlspecialchars($page_desc, ENT_QUOTES, 'UTF-8') ?>"
    >

    <link
        rel="canonical"
        href="<?= htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8') ?>"
    >

    <!-- =====================================================
         BRAND
    ====================================================== -->

    <link
        rel="icon"
        type="image/png"
        href="assets/img/brand/logo.png"
    >

    <link
        rel="apple-touch-icon"
        href="assets/img/brand/logo.png"
    >

    <!-- =====================================================
         FONTS
    ====================================================== -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Syne:wght@700;800&display=swap"
        rel="stylesheet"
    >

    <!-- =====================================================
         TAILWIND
    ====================================================== -->

    <script src="https://cdn.tailwindcss.com"></script>

    <script>

        tailwind.config = {

            theme: {

                extend: {

                    colors: {

                        trendz: {

                            ink: '#17151F',
                            purple: '#5C55A2',
                            lilac: '#8B85CF',
                            pink: '#D52D91',
                            paper: '#F7F7F9',
                            muted: '#6F6B78',
                            line: '#E8E7EC'

                        }

                    },

                    fontFamily: {

                        sans: [
                            'Inter',
                            'sans-serif'
                        ],

                        heading: [
                            '"Plus Jakarta Sans"',
                            'sans-serif'
                        ],

                        display: [
                            'Syne',
                            'sans-serif'
                        ],

                        mono: [
                            '"DM Mono"',
                            'monospace'
                        ]

                    }

                }

            }

        };

    </script>

    <!-- =====================================================
         ICONS
    ====================================================== -->

    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- =====================================================
         GSAP
    ====================================================== -->

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>


    <!-- =====================================================
         HEADER CSS
    ====================================================== -->

    <style>

        :root {

            --tz-ink: #17151F;
            --tz-purple: #5C55A2;
            --tz-lilac: #8B85CF;
            --tz-pink: #D52D91;
            --tz-paper: #F7F7F9;
            --tz-line: #E8E7EC;

        }


        /* ===================================================
           BASE
        ==================================================== */

        html {

            scroll-behavior: smooth;

        }


        body {

            background:
                var(--tz-paper);

            color:
                var(--tz-ink);

        }


        html,
        body {

            max-width: 100%;

            overflow-x: hidden;

        }


        /* ===================================================
           HEADER
        ==================================================== */

        .tz-header {

            position: fixed;

            top: 0;
            left: 0;
            right: 0;

            z-index: 1000;

            background:
                rgba(247, 247, 249, 0.94);

            border-bottom:
                1px solid rgba(23, 21, 31, 0.06);

            transition:
                height 400ms cubic-bezier(.2,.8,.2,1),
                background 300ms ease,
                box-shadow 300ms ease,
                border-color 300ms ease;

        }


        .tz-header.is-scrolled {

            background:
                rgba(247, 247, 249, 0.82);

            border-color:
                rgba(23, 21, 31, 0.10);

            box-shadow:
                0 16px 50px rgba(23, 21, 31, 0.075);

            backdrop-filter:
                blur(22px);

            -webkit-backdrop-filter:
                blur(22px);

        }


        /* ===================================================
           UTILITY BAR
        ==================================================== */

        .tz-utility {

            transition:
                height 300ms ease,
                opacity 250ms ease,
                transform 300ms ease;

        }


        .tz-header.is-scrolled .tz-utility {

            height: 0;

            opacity: 0;

            overflow: hidden;

            transform:
                translateY(-100%);

        }


        /* ===================================================
           MAIN NAV
        ==================================================== */

        .tz-main-nav {

            transition:
                height 350ms cubic-bezier(.2,.8,.2,1);

        }


        .tz-header.is-scrolled .tz-main-nav {

            height: 64px;

        }


        /* ===================================================
           BRAND
        ==================================================== */

        .tz-brand {

            position: relative;

            display: inline-flex;

            align-items: center;

            height: 48px;

            perspective: 800px;

            text-decoration: none;

        }


        /*
         * Complete brand lockup:
         *
         * [ TZ CIRCLE ] [ ORIGINAL TRENDZ LOGO ]
         */
        .tz-brand-lockup {

            display: inline-flex;

            align-items: center;

            gap: 11px;

            height: 100%;

        }


        /* ===================================================
           TZ CIRCLE
        ==================================================== */

        .tz-monogram {

            position: relative;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            width: 34px;

            height: 34px;

            min-width: 34px;

            flex: 0 0 34px;

            border:
                1.5px solid var(--tz-purple);

            border-radius: 50%;

            background:
                transparent;

            color:
                var(--tz-purple);

            overflow: hidden;

            transform:
                translateZ(0);

            transition:
                transform 350ms cubic-bezier(.2,.8,.2,1),
                border-color 250ms ease,
                background 250ms ease,
                color 250ms ease,
                box-shadow 300ms ease;

        }


        /*
         * Architectural horizontal cut.
         */
        .tz-monogram::before {

            content: "";

            position: absolute;

            left: -15%;

            top: 50%;

            width: 130%;

            height: 1px;

            background:
                linear-gradient(
                    90deg,
                    transparent 0%,
                    rgba(92,85,162,.25) 25%,
                    rgba(92,85,162,.60) 50%,
                    rgba(213,45,145,.50) 75%,
                    transparent 100%
                );

            opacity: .7;

            transform:
                translateY(-50%);

        }


        /*
         * Small brand accent.
         */
        .tz-monogram::after {

            content: "";

            position: absolute;

            width: 4px;

            height: 4px;

            right: 4px;

            top: 4px;

            border-radius: 50%;

            background:
                var(--tz-pink);

            opacity: .9;

            box-shadow:
                0 0 0 3px rgba(213,45,145,.06);

        }


        /* ===================================================
           TZ LETTERS
        ==================================================== */

        .tz-monogram-text {

            position: relative;

            z-index: 2;

            display: block;

            font-family:
                'Syne',
                sans-serif;

            font-size: 12px;

            line-height: 1;

            font-weight: 800;

            letter-spacing:
                -0.12em;

            transform:
                translateX(-1px);

            transition:
                transform 300ms cubic-bezier(.2,.8,.2,1),
                color 250ms ease;

        }


        /* ===================================================
           ORIGINAL LOGO WRAPPER
        ==================================================== */

        .tz-logo-wrap {

            position: relative;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: visible;

        }


        /* ===================================================
           ORIGINAL TRENDZ LOGO
        ==================================================== */

        .tz-logo {

            position: relative;

            z-index: 3;

            display: block;

            height: 43px;

            width: auto;

            object-fit: contain;

            transform-origin: left center;

            will-change: transform;

            transition:
                filter 300ms ease,
                transform 350ms cubic-bezier(.2,.8,.2,1);

        }


        /*
         * Do not alter the supplied logo artwork.
         * Only apply a subtle presentation effect.
         */
        .tz-brand:hover .tz-logo {

            filter:
                drop-shadow(
                    0 8px 18px
                    rgba(92,85,162,.16)
                );

        }


        /* ===================================================
           BRAND UNDERLINE
        ==================================================== */

        .tz-logo-accent {

            position: absolute;

            left: 0;

            bottom: -5px;

            width: 0;

            height: 2px;

            background:
                linear-gradient(
                    90deg,
                    var(--tz-purple),
                    var(--tz-pink)
                );

            transition:
                width 400ms cubic-bezier(.2,.8,.2,1);

        }


        .tz-brand:hover .tz-logo-accent {

            width: 100%;

        }


        /* ===================================================
           TZ HOVER
        ==================================================== */

        .tz-brand:hover .tz-monogram {

            transform:
                translateY(-1px)
                rotate(-4deg);

            border-color:
                var(--tz-pink);

            color:
                var(--tz-pink);

            background:
                rgba(213,45,145,.035);

            box-shadow:
                0 0 0 5px
                rgba(213,45,145,.055);

        }


        .tz-brand:hover .tz-monogram-text {

            transform:
                translateX(-1px)
                scale(1.05);

        }


        .tz-brand:hover .tz-logo {

            transform:
                translateX(2px);

        }


        /* ===================================================
           NAV LINKS
        ==================================================== */

        .tz-nav-link {

            position: relative;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            height: 42px;

            padding:
                0 15px;

            border-radius: 999px;

            color:
                rgba(23, 21, 31, 0.62);

            font-size: 11px;

            font-weight: 700;

            letter-spacing:
                -0.01em;

            transition:
                color 180ms ease,
                background 180ms ease;

        }


        .tz-nav-link:hover {

            color:
                var(--tz-ink);

            background:
                rgba(23,21,31,.035);

        }


        .tz-nav-link::after {

            content: "";

            position: absolute;

            bottom: 5px;

            left: 50%;

            width: 5px;

            height: 5px;

            border-radius: 50%;

            background:
                var(--tz-purple);

            transform:
                translateX(-50%)
                scale(0);

            opacity: 0;

            transition:
                transform 200ms ease,
                opacity 200ms ease;

        }


        .tz-nav-link.is-active {

            color:
                var(--tz-purple);

            background:
                rgba(92,85,162,.07);

        }


        .tz-nav-link.is-active::after {

            transform:
                translateX(-50%)
                scale(1);

            opacity: 1;

        }


        /* ===================================================
           CTA
        ==================================================== */

        .tz-cta {

            position: relative;

            display: inline-flex;

            align-items: center;

            gap: 11px;

            height: 44px;

            padding:
                0 8px 0 18px;

            overflow: hidden;

            border-radius: 999px;

            background:
                var(--tz-ink);

            color:
                white;

            font-size: 10px;

            font-weight: 700;

            letter-spacing:
                .01em;

            isolation: isolate;

            transition:
                transform 250ms cubic-bezier(.2,.8,.2,1),
                background 250ms ease,
                box-shadow 250ms ease;

        }


        .tz-cta::before {

            content: "";

            position: absolute;

            inset: 0;

            z-index: -1;

            background:
                linear-gradient(
                    110deg,
                    var(--tz-purple),
                    var(--tz-pink)
                );

            transform:
                translateX(-105%);

            transition:
                transform 500ms cubic-bezier(.2,.8,.2,1);

        }


        .tz-cta:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 14px 30px
                rgba(92,85,162,.20);

        }


        .tz-cta:hover::before {

            transform:
                translateX(0);

        }


        .tz-cta-arrow {

            display: flex;

            align-items: center;

            justify-content: center;

            width: 28px;

            height: 28px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.10);

            transition:
                transform 300ms ease,
                background 300ms ease;

        }


        .tz-cta:hover .tz-cta-arrow {

            transform:
                rotate(45deg);

            background:
                rgba(255,255,255,.18);

        }


        /* ===================================================
           MOBILE PANEL
        ==================================================== */

        .tz-mobile-panel {

            position: absolute;

            left: 0;

            right: 0;

            top: 100%;

            background:
                rgba(247,247,249,.98);

            border-bottom:
                1px solid rgba(23,21,31,.08);

            box-shadow:
                0 24px 60px
                rgba(23,21,31,.10);

            opacity: 0;

            visibility: hidden;

            pointer-events: none;

            transform:
                translateY(-12px);

            transition:
                opacity 220ms ease,
                transform 280ms cubic-bezier(.2,.8,.2,1),
                visibility 220ms ease;

        }


        .tz-mobile-panel.is-open {

            opacity: 1;

            visibility: visible;

            pointer-events: auto;

            transform:
                translateY(0);

        }


        /* ===================================================
           MOBILE BACKDROP
        ==================================================== */

        .tz-mobile-backdrop {

            position: fixed;

            inset: 0;

            z-index: 900;

            background:
                rgba(23,21,31,.20);

            backdrop-filter:
                blur(4px);

            opacity: 0;

            visibility: hidden;

            pointer-events: none;

            transition:
                opacity 200ms ease,
                visibility 200ms ease;

        }


        .tz-mobile-backdrop.is-open {

            opacity: 1;

            visibility: visible;

            pointer-events: auto;

        }


        /* ===================================================
           MOBILE MENU BUTTON
        ==================================================== */

        .tz-menu-button {

            position: relative;

            display: flex;

            align-items: center;

            justify-content: center;

            width: 42px;

            height: 42px;

            border:
                1px solid rgba(23,21,31,.10);

            border-radius: 50%;

            background:
                rgba(255,255,255,.55);

            transition:
                border-color 200ms ease,
                background 200ms ease;

        }


        .tz-menu-button:hover {

            border-color:
                rgba(92,85,162,.35);

            background:
                white;

        }


        .tz-menu-line {

            position: absolute;

            width: 17px;

            height: 1.5px;

            background:
                currentColor;

            transition:
                transform 220ms ease,
                opacity 180ms ease;

        }


        .tz-menu-line:nth-child(1) {

            transform:
                translateY(-5px);

        }


        .tz-menu-line:nth-child(2) {

            transform:
                translateY(0);

        }


        .tz-menu-line:nth-child(3) {

            transform:
                translateY(5px);

        }


        .tz-menu-button.is-open
        .tz-menu-line:nth-child(1) {

            transform:
                translateY(0)
                rotate(45deg);

        }


        .tz-menu-button.is-open
        .tz-menu-line:nth-child(2) {

            opacity: 0;

        }


        .tz-menu-button.is-open
        .tz-menu-line:nth-child(3) {

            transform:
                translateY(0)
                rotate(-45deg);

        }


        /* ===================================================
           MOBILE NAV LINKS
        ==================================================== */

        .tz-mobile-link {

            display: flex;

            align-items: center;

            justify-content: space-between;

            min-height: 54px;

            padding:
                0 16px;

            border:
                1px solid transparent;

            border-radius: 14px;

            color:
                rgba(23,21,31,.70);

            font-size: 14px;

            font-weight: 700;

            transition:
                color 180ms ease,
                background 180ms ease,
                border-color 180ms ease,
                transform 180ms ease;

        }


        .tz-mobile-link:hover {

            color:
                var(--tz-ink);

            background:
                rgba(23,21,31,.035);

            transform:
                translateX(3px);

        }


        .tz-mobile-link.is-active {

            color:
                var(--tz-purple);

            background:
                rgba(92,85,162,.07);

            border-color:
                rgba(92,85,162,.12);

        }


        /* ===================================================
           ACCESSIBILITY
        ==================================================== */

        :focus-visible {

            outline:
                2px solid var(--tz-purple);

            outline-offset:
                3px;

        }


        /* ===================================================
           RESPONSIVE BRAND
        ==================================================== */

        @media (max-width: 768px) {

            .tz-brand-lockup {

                gap: 9px;

            }


            .tz-monogram {

                width: 31px;

                height: 31px;

                min-width: 31px;

                flex-basis: 31px;

            }


            .tz-monogram-text {

                font-size: 11px;

            }
        }


        @media (max-width: 640px) {

            .tz-brand-lockup {

                gap: 8px;

            }


            .tz-monogram {

                width: 29px;

                height: 29px;

                min-width: 29px;

                flex-basis: 29px;

                border-width:
                    1.25px;

            }


            .tz-monogram-text {

                font-size: 10px;

            }

        }


        @media (max-width: 380px) {

            .tz-brand-lockup {

                gap: 7px;

            }


            .tz-monogram {

                width: 26px;

                height: 26px;

                min-width: 26px;

                flex-basis: 26px;

            }


            .tz-monogram-text {

                font-size: 9px;

            }

        }


        /* ===================================================
           REDUCED MOTION
        ==================================================== */

        @media (prefers-reduced-motion: reduce) {

            html {

                scroll-behavior: auto;

            }


            *,
            *::before,
            *::after {

                animation-duration:
                    0.01ms !important;

                animation-iteration-count:
                    1 !important;

                transition-duration:
                    0.01ms !important;

            }

        }

    </style>

</head>


<body class="bg-trendz-paper text-trendz-ink antialiased">


<!-- =========================================================
     SKIP NAVIGATION
========================================================== -->

<a
    href="#main-content"
    class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[9999] focus:rounded-lg focus:bg-trendz-ink focus:px-5 focus:py-3 focus:text-white"
>
    Skip to main content
</a>


<!-- =========================================================
     HEADER
========================================================== -->

<header
    id="site-header"
    class="tz-header"
>

    <!-- =====================================================
         UTILITY BAR
    ====================================================== -->

    <div
        class="tz-utility hidden h-8 border-b border-black/[0.045] lg:block"
    >

        <div
            class="mx-auto flex h-full max-w-[1440px] items-center justify-between px-6 xl:px-10"
        >

            <div class="flex items-center gap-3">

                <span
                    class="font-mono text-[9px] font-medium uppercase tracking-[0.18em] text-trendz-purple"
                >
                    PAN-INDIA
                </span>

                <span class="h-3 w-px bg-black/10"></span>

                <span
                    class="text-[10px] font-medium text-trendz-muted"
                >
                    Headquartered in Mumbai · Delivering across 50+ cities
                </span>

            </div>


            <div class="flex items-center gap-5">

                <a
                    href="tel:+919987399997"
                    class="group flex items-center gap-2 text-[10px] font-medium text-trendz-muted transition-colors hover:text-trendz-ink"
                >

                    <i
                        data-lucide="phone"
                        class="h-3.5 w-3.5 text-trendz-purple"
                    ></i>

                    <span>
                        +91 99873 99997
                    </span>

                </a>


                <span class="h-3 w-px bg-black/10"></span>


                <a
                    href="mailto:info@trendzeventz.com"
                    class="group flex items-center gap-2 text-[10px] font-medium text-trendz-muted transition-colors hover:text-trendz-ink"
                >

                    <i
                        data-lucide="mail"
                        class="h-3.5 w-3.5 text-trendz-purple"
                    ></i>

                    <span>
                        info@trendzeventz.com
                    </span>

                </a>

            </div>

        </div>

    </div>


    <!-- =====================================================
         MAIN NAV
    ====================================================== -->

    <div
        class="mx-auto max-w-[1440px] px-4 sm:px-6 xl:px-10"
    >

        <div
            class="tz-main-nav flex h-[76px] items-center justify-between"
        >

            <!-- =================================================
                 BRAND
            ================================================== -->

            <a
                href="index.php"
                class="tz-brand group"
                aria-label="Trendz Eventz — Home"
            >

                <span class="tz-brand-lockup">

                    <!-- =========================================
                         ORIGINAL TRENDZ LOGO
                    ========================================== -->

                    <span class="tz-logo-wrap bg-[#70518e] rounded-lg">

                        <img
                            src="assets/img/brand/logo2.gif"
                            alt="Trendz Eventz"
                            width="100%"
                            height="100%"
                            loading="eager"
                            decoding="async"
                            class="tz-logo"
                        >


                        <span
                            class="tz-logo-accent"
                            aria-hidden="true"
                        ></span>

                    </span>

                </span>

            </a>


            <!-- =================================================
                 DESKTOP NAV
            ================================================== -->

            <nav
                class="hidden lg:block"
                aria-label="Primary navigation"
            >

                <ul class="flex items-center gap-0.5">

                    <li>

                        <a
                            href="index.php"
                            class="tz-nav-link <?= nav_active('home', $page) ?>"
                            <?= $page === 'home' ? 'aria-current="page"' : '' ?>
                        >
                            Home
                        </a>

                    </li>


                    <li>

                        <a
                            href="about.php"
                            class="tz-nav-link <?= nav_active('about', $page) ?>"
                            <?= $page === 'about' ? 'aria-current="page"' : '' ?>
                        >
                            About
                        </a>

                    </li>


                    <li>

                        <a
                            href="services.php"
                            class="tz-nav-link <?= nav_active('services', $page) ?>"
                            <?= $page === 'services' ? 'aria-current="page"' : '' ?>
                        >
                            Services
                        </a>

                    </li>


                    <li>

                        <a
                            href="work.php"
                            class="tz-nav-link <?= nav_active('work', $page) ?>"
                            <?= $page === 'work' ? 'aria-current="page"' : '' ?>
                        >
                            Work
                        </a>

                    </li>


                    <li>

                        <a
                            href="clients.php"
                            class="tz-nav-link <?= nav_active('clients', $page) ?>"
                            <?= $page === 'clients' ? 'aria-current="page"' : '' ?>
                        >
                            Clients
                        </a>

                    </li>


                    <li>

                        <a
                            href="contact.php"
                            class="tz-nav-link <?= nav_active('contact', $page) ?>"
                            <?= $page === 'contact' ? 'aria-current="page"' : '' ?>
                        >
                            Contact
                        </a>

                    </li>

                </ul>

            </nav>


            <!-- =================================================
                 DESKTOP CTA
            ================================================== -->

            <div class="hidden lg:block">

                <a
                    href="contact.php"
                    class="tz-cta"
                >

                    <span>
                        Request a Proposal
                    </span>

                    <span
                        class="tz-cta-arrow"
                    >

                        <i
                            data-lucide="arrow-up-right"
                            class="h-4 w-4"
                        ></i>

                    </span>

                </a>

            </div>


            <!-- =================================================
                 MOBILE CONTROLS
            ================================================== -->

            <div class="flex items-center gap-2 lg:hidden">

                <a
                    href="contact.php"
                    aria-label="Request a Proposal"
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-trendz-ink text-white transition-all hover:-translate-y-0.5 hover:bg-trendz-purple"
                >

                    <i
                        data-lucide="arrow-up-right"
                        class="h-4 w-4"
                    ></i>

                </a>


                <button
                    id="mobile-menu-button"
                    type="button"
                    class="tz-menu-button"
                    aria-label="Open navigation menu"
                    aria-controls="mobile-navigation"
                    aria-expanded="false"
                >

                    <span
                        class="tz-menu-line"
                    ></span>

                    <span
                        class="tz-menu-line"
                    ></span>

                    <span
                        class="tz-menu-line"
                    ></span>

                </button>

            </div>

        </div>

    </div>


    <!-- =====================================================
         MOBILE PANEL
    ====================================================== -->

    <div
        id="mobile-navigation"
        class="tz-mobile-panel lg:hidden"
        aria-hidden="true"
    >

        <div
            class="mx-auto max-w-[1440px] px-4 py-5 sm:px-6"
        >

            <!-- Mobile panel heading -->

            <div
                class="mb-4 flex items-center justify-between"
            >

                <span
                    class="font-mono text-[9px] uppercase tracking-[0.18em] text-trendz-muted"
                >
                    Navigation
                </span>

                <span
                    class="font-mono text-[9px] uppercase tracking-[0.18em] text-trendz-purple"
                >
                    Trendz Eventz
                </span>

            </div>


            <!-- Mobile navigation -->

            <nav
                aria-label="Mobile navigation"
            >

                <div class="space-y-1">

                    <?php

                    $mobile_items = [

                        'home'     => ['index.php', 'Home'],
                        'about'    => ['about.php', 'About'],
                        'services' => ['services.php', 'Services'],
                        'work'     => ['work.php', 'Work'],
                        'clients'  => ['clients.php', 'Clients'],
                        'contact'  => ['contact.php', 'Contact'],

                    ];

                    ?>

                    <?php foreach ($mobile_items as $key => [$url, $label]): ?>

                        <a
                            href="<?= $url ?>"
                            class="tz-mobile-link <?= nav_active($key, $page) ?>"
                            <?= $page === $key ? 'aria-current="page"' : '' ?>
                        >

                            <span>
                                <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
                            </span>

                            <i
                                data-lucide="arrow-up-right"
                                class="h-4 w-4"
                            ></i>

                        </a>

                    <?php endforeach; ?>

                </div>

            </nav>


            <!-- Contact -->

            <div
                class="mt-4 grid grid-cols-1 gap-2 sm:grid-cols-2"
            >

                <a
                    href="tel:+919987399997"
                    class="flex min-h-[48px] items-center gap-3 rounded-xl border border-black/[0.07] bg-white/50 px-4 text-xs font-medium text-trendz-muted hover:bg-white"
                >

                    <i
                        data-lucide="phone"
                        class="h-4 w-4 text-trendz-purple"
                    ></i>

                    <span>
                        +91 99873 99997
                    </span>

                </a>


                <a
                    href="mailto:info@trendzeventz.com"
                    class="flex min-h-[48px] items-center gap-3 rounded-xl border border-black/[0.07] bg-white/50 px-4 text-xs font-medium text-trendz-muted hover:bg-white"
                >

                    <i
                        data-lucide="mail"
                        class="h-4 w-4 text-trendz-purple"
                    ></i>

                    <span class="truncate">
                        info@trendzeventz.com
                    </span>

                </a>

            </div>


            <!-- CTA -->

            <a
                href="contact.php"
                class="mt-3 flex min-h-[54px] items-center justify-between rounded-xl bg-trendz-ink px-5 text-sm font-bold text-white transition-colors hover:bg-trendz-purple"
            >

                <span>
                    Start a conversation
                </span>

                <span
                    class="flex h-8 w-8 items-center justify-center rounded-full bg-white/10"
                >

                    <i
                        data-lucide="arrow-up-right"
                        class="h-4 w-4"
                    ></i>

                </span>

            </a>

        </div>

    </div>

</header>


<!-- =========================================================
     MOBILE BACKDROP
========================================================== -->

<div
    id="mobile-menu-backdrop"
    class="tz-mobile-backdrop lg:hidden"
    aria-hidden="true"
></div>


<!-- =========================================================
     MAIN
========================================================== -->

<main
    id="main-content"
    class="flex-grow"
>


<!-- =========================================================
     HEADER JAVASCRIPT
========================================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    'use strict';


    /* =====================================================
       ICONS
    ====================================================== */

    if (typeof lucide !== 'undefined') {

        lucide.createIcons();

    }


    /* =====================================================
       ELEMENTS
    ====================================================== */

    const header =
        document.getElementById('site-header');

    const menuButton =
        document.getElementById('mobile-menu-button');

    const mobileNavigation =
        document.getElementById('mobile-navigation');

    const mobileBackdrop =
        document.getElementById('mobile-menu-backdrop');

    const brand =
        document.querySelector('.tz-brand');

    const logo =
        document.querySelector('.tz-logo');


    /* =====================================================
       SCROLL STATE
    ====================================================== */

    let ticking = false;


    const updateHeader = function () {

        if (!header) {
            return;
        }


        if (window.scrollY > 20) {

            header.classList.add('is-scrolled');

        } else {

            header.classList.remove('is-scrolled');

        }


        ticking = false;

    };


    window.addEventListener(
        'scroll',
        function () {

            if (!ticking) {

                window.requestAnimationFrame(
                    updateHeader
                );

                ticking = true;

            }

        },
        {
            passive: true
        }
    );


    updateHeader();


    /* =====================================================
       LOGO MAGNETIC MICRO-INTERACTION
    ====================================================== */

    if (
        brand &&
        logo &&
        !window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches
    ) {

        brand.addEventListener(
            'mousemove',
            function (event) {

                const rect =
                    brand.getBoundingClientRect();


                const x =
                    event.clientX - rect.left;


                const y =
                    event.clientY - rect.top;


                const centerX =
                    rect.width / 2;


                const centerY =
                    rect.height / 2;


                const moveX =
                    ((x - centerX) / centerX) * 3;


                const moveY =
                    ((y - centerY) / centerY) * 2;


                logo.style.transform =
                    `translate(${moveX}px, ${moveY}px)`;

            }
        );


        brand.addEventListener(
            'mouseleave',
            function () {

                logo.style.transform =
                    'translate(0, 0)';

            }
        );

    }


    /* =====================================================
       MOBILE MENU
    ====================================================== */

    let menuOpen = false;


    const openMenu = function () {

        menuOpen = true;


        menuButton?.classList.add(
            'is-open'
        );


        mobileNavigation?.classList.add(
            'is-open'
        );


        mobileBackdrop?.classList.add(
            'is-open'
        );


        menuButton?.setAttribute(
            'aria-expanded',
            'true'
        );


        menuButton?.setAttribute(
            'aria-label',
            'Close navigation menu'
        );


        mobileNavigation?.setAttribute(
            'aria-hidden',
            'false'
        );


        document.body.style.overflow =
            'hidden';


        /* Animate links */

        if (
            typeof gsap !== 'undefined' &&
            mobileNavigation
        ) {

            const links =
                mobileNavigation.querySelectorAll(
                    '.tz-mobile-link'
                );


            gsap.fromTo(
                links,

                {
                    opacity: 0,
                    y: 12
                },

                {
                    opacity: 1,
                    y: 0,
                    duration: 0.35,
                    stagger: 0.045,
                    ease: 'power3.out'
                }
            );

        }

    };


    const closeMenu = function () {

        menuOpen = false;


        menuButton?.classList.remove(
            'is-open'
        );


        mobileNavigation?.classList.remove(
            'is-open'
        );


        mobileBackdrop?.classList.remove(
            'is-open'
        );


        menuButton?.setAttribute(
            'aria-expanded',
            'false'
        );


        menuButton?.setAttribute(
            'aria-label',
            'Open navigation menu'
        );


        mobileNavigation?.setAttribute(
            'aria-hidden',
            'true'
        );


        document.body.style.overflow =
            '';

    };


    menuButton?.addEventListener(
        'click',
        function () {

            if (menuOpen) {

                closeMenu();

            } else {

                openMenu();

            }

        }
    );


    mobileBackdrop?.addEventListener(
        'click',
        closeMenu
    );


    /* =====================================================
       MOBILE LINK CLOSE
    ====================================================== */

    mobileNavigation
        ?.querySelectorAll('a')
        .forEach(function (link) {

            link.addEventListener(
                'click',
                closeMenu
            );

        });


    /* =====================================================
       ESCAPE
    ====================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === 'Escape' &&
                menuOpen
            ) {

                closeMenu();

            }

        }
    );


    /* =====================================================
       DESKTOP BREAKPOINT RESET
    ====================================================== */

    const desktopQuery =
        window.matchMedia(
            '(min-width: 1024px)'
        );


    const resetOnDesktop =
        function (event) {

            if (
                event.matches &&
                menuOpen
            ) {

                closeMenu();

            }

        };


    if (
        desktopQuery.addEventListener
    ) {

        desktopQuery.addEventListener(
            'change',
            resetOnDesktop
        );

    } else {

        desktopQuery.addListener(
            resetOnDesktop
        );

    }


    /* =====================================================
       GSAP INITIAL ENTRANCE
    ====================================================== */

    if (
        typeof gsap !== 'undefined' &&
        !window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches
    ) {

        const utility =
            document.querySelector(
                '.tz-utility'
            );


        const mainNav =
            document.querySelector(
                '.tz-main-nav'
            );


        gsap.set(
            [utility, mainNav],
            {
                opacity: 0
            }
        );


        const intro =
            gsap.timeline({
                defaults: {
                    ease: 'power3.out'
                }
            });


        if (utility) {

            intro.to(
                utility,
                {
                    opacity: 1,
                    duration: 0.35
                }
            );

        }


        if (mainNav) {

            intro.fromTo(
                mainNav,

                {
                    y: -10,
                    opacity: 0
                },

                {
                    y: 0,
                    opacity: 1,
                    duration: 0.55
                },

                '-=0.15'
            );

        }

    }

});

</script>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Swiper -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"
  />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ["Space Grotesk", "sans-serif"],
            body: ["Manrope", "sans-serif"],
            mono: ["DM Mono", "monospace"],
          },

          colors: {
            trendz: {
              purple: "#5C55A2",
              deep: "#1E1C38",
              ink: "#11101E",
              lilac: "#8B85CF",
              pink: "#D52D91",
              paper: "#F7F7FB",
            },
          },
        },
      },
    };
  </script>

  <style>
    html,
    body {
      margin: 0;
      padding: 0;
      background: #1e1c38;
    }

    body {
      font-family: "Manrope", sans-serif;
      overflow-x: hidden;
    }

    .trendz-hero {
      height: 100svh;
      height: 100dvh;
      min-height: 0;
      max-height: 100dvh;
      overflow: hidden;
      isolation: isolate;
    }

    .hero-grid {
      background-image:
        linear-gradient(
          rgba(255,255,255,.055) 1px,
          transparent 1px
        ),
        linear-gradient(
          90deg,
          rgba(255,255,255,.055) 1px,
          transparent 1px
        );
      background-size: 56px 56px;
    }

    .hero-noise {
      opacity: .055;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.8'/%3E%3C/svg%3E");
    }

    .hero-glow {
      filter: blur(80px);
      will-change: transform;
    }

    .hero-image {
      transform: scale(1.04);
      transition:
        transform 1.2s cubic-bezier(.16,1,.3,1),
        filter 1.2s ease;
    }

    .swiper-slide-active .hero-image {
      transform: scale(1);
    }

    .hero-image-wrap::after {
      content: "";
      position: absolute;
      inset: 0;
      background:
        linear-gradient(
          90deg,
          rgba(30,28,56,.16),
          transparent 50%,
          rgba(17,16,30,.15)
        ),
        linear-gradient(
          180deg,
          transparent 55%,
          rgba(17,16,30,.58)
        );
      pointer-events: none;
    }

    .swiper-slide {
      overflow: hidden;
    }

    .hero-progress {
      width: 100%;
      height: 2px;
      background: rgba(255,255,255,.18);
      overflow: hidden;
    }

    .hero-progress-fill {
      width: 0%;
      height: 100%;
      background: white;
      transform-origin: left center;
    }

    .swiper-slide-active .hero-progress-fill {
      animation: progress 6.5s linear forwards;
    }

    @keyframes progress {
      from {
        width: 0%;
      }

      to {
        width: 100%;
      }
    }

    .hero-kicker::before {
      content: "";
      display: inline-block;
      width: 7px;
      height: 7px;
      margin-right: 10px;
      border-radius: 999px;
      background: #d52d91;
      box-shadow: 0 0 18px rgba(213,45,145,.8);
    }

    .hero-word {
      display: inline-block;
      overflow: hidden;
      vertical-align: top;
    }

    .hero-word-inner {
      display: inline-block;
      will-change: transform;
    }

    .magnetic {
      will-change: transform;
    }

    @media (max-width: 767px) {
      .hero-grid {
        background-size: 32px 32px;
      }
    }

    @media (max-height: 680px) and (min-width: 768px) {
      .hero-main {
        padding-top: 1.5rem !important;
        padding-bottom: 1.5rem !important;
      }

      .hero-heading {
        font-size: clamp(3rem, 6vw, 5.8rem) !important;
      }

      .hero-description {
        display: none;
      }
    }

    @media (max-width: 767px) {
      .trendz-hero {
        height: 100svh;
        height: 100dvh;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      *,
      *::before,
      *::after {
        scroll-behavior: auto !important;
        animation-duration: .01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: .01ms !important;
      }
    }
  </style>
</head>

<body>