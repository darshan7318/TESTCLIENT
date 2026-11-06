<?php
/**
 * Trendz Eventz — Contact & RFP Inquiry Experience
 * Premium Editorial / Organic UI
 * Minimal PHP: direct semantic HTML with lightweight inquiry logging.
 */

$current_page = 'contact';
$page_title = 'Request a Proposal | Trendz Eventz — Contact Mumbai Experiential Agency';
$page_desc = 'Initiate your event or activation brief with Trendz Eventz. Connect directly with Bharat Jadhav and our executive production leadership in Mumbai.';

$submitted = false;
$error = '';

$prefill_req = htmlspecialchars(
    trim($_GET['service'] ?? $_GET['requirement'] ?? ''),
    ENT_QUOTES,
    'UTF-8'
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = htmlspecialchars(
        trim($_POST['name'] ?? ''),
        ENT_QUOTES,
        'UTF-8'
    );

    $company = htmlspecialchars(
        trim($_POST['company'] ?? ''),
        ENT_QUOTES,
        'UTF-8'
    );

    $email = filter_var(
        trim($_POST['email'] ?? ''),
        FILTER_VALIDATE_EMAIL
    );

    $phone = htmlspecialchars(
        trim($_POST['phone'] ?? ''),
        ENT_QUOTES,
        'UTF-8'
    );

    $requirement = htmlspecialchars(
        trim($_POST['requirement'] ?? ''),
        ENT_QUOTES,
        'UTF-8'
    );

    $message = htmlspecialchars(
        trim($_POST['message'] ?? ''),
        ENT_QUOTES,
        'UTF-8'
    );

    $honeypot = trim($_POST['website_url_check'] ?? '');

    // Anti-bot check
    if (!empty($honeypot)) {

        $submitted = true;

    } elseif (
        empty($name) ||
        empty($company) ||
        !$email ||
        empty($phone) ||
        empty($message)
    ) {

        $error = 'Please fill out all required fields marked with an asterisk (*).';

    } else {

        // Local inquiry storage
        $storage_file = __DIR__ . '/storage/inquiries.json';

        $records = [];

        if (file_exists($storage_file)) {
            $records = json_decode(
                file_get_contents($storage_file) ?: '[]',
                true
            ) ?: [];
        }

        $records[] = [
            'id' => 'INQ-' . date('Ymd-His'),
            'timestamp' => date('c'),
            'name' => $name,
            'company' => $company,
            'email' => $email,
            'phone' => $phone,
            'requirement' => $requirement,
            'message' => $message
        ];

        @file_put_contents(
            $storage_file,
            json_encode(
                $records,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
            ),
            LOCK_EX
        );

        $submitted = true;
    }
}

include __DIR__ . '/includes/header.php';
?>

<style>
/* =========================================================
   TRENDZ EVENTZ — CONTACT EXPERIENCE
   ========================================================= */

:root {
    --tz-violet: #5b21b6;
    --tz-violet-dark: #3b0764;
    --tz-violet-deep: #24113f;
    --tz-purple-soft: #f4efff;
    --tz-ink: #171321;
    --tz-muted: #6f6878;
    --tz-line: rgba(91, 33, 182, 0.12);
}

/* ---------- Base ---------- */

.tz-contact {
    position: relative;
    overflow: hidden;
    background:
        linear-gradient(
            180deg,
            #faf8ff 0%,
            #ffffff 28%,
            #ffffff 100%
        );
    color: var(--tz-ink);
}

.tz-contact *,
.tz-contact *::before,
.tz-contact *::after {
    box-sizing: border-box;
}

/* ---------- Ambient System ---------- */

.tz-contact-ambient {
    position: absolute;
    inset: 0;
    pointer-events: none;
    overflow: hidden;
}

.tz-contact-grid {
    position: absolute;
    inset: 0;
    opacity: .38;
    background-image:
        radial-gradient(
            circle at 1px 1px,
            rgba(91, 33, 182, .12) 1px,
            transparent 1.2px
        );
    background-size: 28px 28px;
    mask-image: linear-gradient(
        to bottom,
        black 0%,
        rgba(0,0,0,.7) 30%,
        transparent 85%
    );
}

.tz-contact-orb {
    position: absolute;
    border-radius: 999px;
    filter: blur(1px);
    opacity: .65;
    animation: tzFloat 12s ease-in-out infinite;
}

.tz-contact-orb.one {
    width: 420px;
    height: 420px;
    top: -180px;
    right: -120px;
    background:
        radial-gradient(
            circle,
            rgba(167, 139, 250, .35) 0%,
            rgba(196, 181, 253, .12) 45%,
            transparent 72%
        );
}

.tz-contact-orb.two {
    width: 360px;
    height: 360px;
    top: 600px;
    left: -190px;
    background:
        radial-gradient(
            circle,
            rgba(129, 140, 248, .18) 0%,
            rgba(236, 72, 153, .08) 50%,
            transparent 72%
        );
    animation-delay: -4s;
}

.tz-contact-orb.three {
    width: 300px;
    height: 300px;
    bottom: 400px;
    right: -160px;
    background:
        radial-gradient(
            circle,
            rgba(244, 114, 182, .13) 0%,
            rgba(196, 181, 253, .08) 50%,
            transparent 72%
        );
    animation-delay: -7s;
}

@keyframes tzFloat {
    0%,
    100% {
        transform: translate3d(0, 0, 0) scale(1);
    }

    50% {
        transform: translate3d(0, -22px, 0) scale(1.03);
    }
}

/* ---------- Hero ---------- */

.tz-contact-hero {
    position: relative;
    min-height: 520px;
    display: flex;
    align-items: center;
    padding: 76px 0 92px;
    overflow: hidden;
}

.tz-contact-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 1280px;
    width: 100%;
    margin: 0 auto;
    padding: 0 24px;
}

.tz-contact-breadcrumb {
    margin-bottom: 30px;
}

.tz-contact-breadcrumb ul {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px;
    list-style: none;
    padding: 0;
    margin: 0;
}

.tz-contact-breadcrumb a {
    color: #7c7287;
    text-decoration: none;
    transition: color .25s ease;
}

.tz-contact-breadcrumb a:hover {
    color: var(--tz-violet);
}

.tz-contact-breadcrumb .current {
    color: var(--tz-violet);
    font-weight: 700;
}

.tz-contact-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 9px 14px;
    border: 1px solid rgba(91, 33, 182, .15);
    border-radius: 999px;
    background: rgba(255,255,255,.72);
    backdrop-filter: blur(12px);
    color: var(--tz-violet);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .14em;
    text-transform: uppercase;
    box-shadow: 0 10px 30px rgba(91,33,182,.06);
}

.tz-contact-eyebrow-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: var(--tz-violet);
    box-shadow: 0 0 0 5px rgba(91,33,182,.08);
}

.tz-contact-hero-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.1fr) minmax(320px, .9fr);
    gap: 60px;
    align-items: end;
}

.tz-contact-title {
    margin: 20px 0 0;
    max-width: 850px;
    font-size: clamp(3rem, 7vw, 6.4rem);
    line-height: .93;
    letter-spacing: -.065em;
    font-weight: 900;
    color: #171321;
}

.tz-contact-title .accent {
    color: var(--tz-violet);
    position: relative;
    display: inline-block;
}

.tz-contact-title .accent::after {
    content: "";
    position: absolute;
    left: 4%;
    right: 5%;
    bottom: -8px;
    height: 5px;
    border-radius: 999px;
    background:
        linear-gradient(
            90deg,
            #7c3aed,
            #c026d3,
            #ec4899,
            #f59e0b
        );
    transform: rotate(-1.5deg);
    opacity: .85;
}

.tz-contact-hero-copy {
    max-width: 500px;
    padding-bottom: 8px;
}

.tz-contact-hero-copy p {
    margin: 0;
    color: #665f6d;
    font-size: 16px;
    line-height: 1.85;
}

.tz-contact-hero-copy strong {
    color: #29222f;
}

/* ---------- Hero Visual ---------- */

.tz-contact-orbit {
    position: absolute;
    right: 7%;
    top: 90px;
    width: 330px;
    height: 330px;
    border: 1px solid rgba(91,33,182,.12);
    border-radius: 50%;
    opacity: .65;
    animation: tzOrbit 18s linear infinite;
}

.tz-contact-orbit::before,
.tz-contact-orbit::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    border: 1px dashed rgba(91,33,182,.12);
}

.tz-contact-orbit::before {
    inset: 34px;
}

.tz-contact-orbit::after {
    inset: 78px;
}

.tz-contact-orbit-core {
    position: absolute;
    left: 50%;
    top: 50%;
    width: 84px;
    height: 84px;
    transform: translate(-50%, -50%);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 28px;
    background:
        linear-gradient(
            135deg,
            #5b21b6,
            #7c3aed 55%,
            #c026d3
        );
    color: #fff;
    box-shadow:
        0 25px 70px rgba(91,33,182,.28),
        inset 0 1px rgba(255,255,255,.35);
}

.tz-contact-orbit-label {
    position: absolute;
    display: flex;
    align-items: center;
    gap: 7px;
    padding: 9px 12px;
    background: rgba(255,255,255,.88);
    border: 1px solid rgba(91,33,182,.12);
    border-radius: 999px;
    box-shadow: 0 12px 30px rgba(36,17,63,.08);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: #5c5265;
    backdrop-filter: blur(12px);
}

.tz-contact-orbit-label.one {
    top: 10px;
    right: 10px;
}

.tz-contact-orbit-label.two {
    bottom: 22px;
    left: -18px;
}

.tz-contact-orbit-label.three {
    top: 120px;
    left: -40px;
}

.tz-contact-orbit-label span {
    width: 6px;
    height: 6px;
    background: #8b5cf6;
    border-radius: 50%;
}

@keyframes tzOrbit {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}

/* ---------- Main Contact ---------- */

.tz-contact-main {
    position: relative;
    z-index: 3;
    padding: 0 0 110px;
}

.tz-contact-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
}

.tz-contact-layout {
    display: grid;
    grid-template-columns: minmax(300px, .78fr) minmax(0, 1.22fr);
    gap: 30px;
    align-items: start;
}

/* ---------- Contact Information ---------- */

.tz-info-panel {
    position: relative;
    overflow: hidden;
    padding: 38px;
    border: 1px solid rgba(91,33,182,.12);
    border-radius: 34px;
    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,.94),
            rgba(249,247,253,.94)
        );
    box-shadow:
        0 25px 80px rgba(36,17,63,.07);
}

.tz-info-panel::before {
    content: "";
    position: absolute;
    width: 240px;
    height: 240px;
    right: -120px;
    top: -100px;
    border-radius: 50%;
    background:
        radial-gradient(
            circle,
            rgba(139,92,246,.15),
            transparent 70%
        );
    pointer-events: none;
}

.tz-info-kicker {
    position: relative;
    display: inline-flex;
    padding: 8px 12px;
    border-radius: 999px;
    background: #f3edff;
    border: 1px solid #e8ddff;
    color: var(--tz-violet);
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .13em;
    text-transform: uppercase;
}

.tz-info-title {
    position: relative;
    margin: 18px 0 12px;
    font-size: clamp(2rem, 4vw, 3rem);
    line-height: 1;
    letter-spacing: -.045em;
    font-weight: 900;
    color: #18131f;
}

.tz-info-description {
    position: relative;
    margin: 0;
    color: #6f6878;
    font-size: 14px;
    line-height: 1.8;
}

.tz-info-list {
    position: relative;
    margin-top: 32px;
    padding-top: 28px;
    border-top: 1px solid rgba(91,33,182,.1);
}

.tz-info-item {
    display: grid;
    grid-template-columns: 46px minmax(0,1fr);
    gap: 15px;
    padding: 17px 0;
}

.tz-info-icon {
    width: 46px;
    height: 46px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    background: #f2edff;
    color: var(--tz-violet);
    border: 1px solid #e7ddfb;
}

.tz-info-label {
    display: block;
    margin-bottom: 4px;
    color: #9b92a4;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: .13em;
    text-transform: uppercase;
}

.tz-info-value {
    display: block;
    color: #241d29;
    font-size: 13px;
    font-weight: 800;
    line-height: 1.5;
}

.tz-info-sub {
    display: block;
    margin-top: 3px;
    color: #837b89;
    font-size: 11px;
    line-height: 1.6;
}

.tz-info-value a {
    color: #5b21b6;
    text-decoration: none;
}

.tz-info-value a:hover {
    text-decoration: underline;
}

/* ---------- Map ---------- */

.tz-map {
    position: relative;
    margin-top: 25px;
}

.tz-map-header {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    align-items: end;
    margin-bottom: 12px;
}

.tz-map-kicker {
    display: block;
    color: #9b92a4;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: .13em;
    text-transform: uppercase;
}

.tz-map-title {
    margin-top: 4px;
    color: #241d29;
    font-size: 13px;
    font-weight: 900;
}

.tz-map-link {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: var(--tz-violet);
    font-size: 10px;
    font-weight: 900;
    text-decoration: none;
    white-space: nowrap;
}

.tz-map-link:hover {
    color: #3b0764;
}

.tz-map-frame {
    position: relative;
    overflow: hidden;
    height: 265px;
    border: 1px solid rgba(91,33,182,.12);
    border-radius: 24px;
    background: #eeeaf3;
}

.tz-map-frame iframe {
    display: block;
    width: 100%;
    height: 100%;
    border: 0;
    filter: saturate(.78) contrast(.96);
}

.tz-map-location {
    position: absolute;
    left: 15px;
    bottom: 15px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    max-width: calc(100% - 30px);
    padding: 10px 13px;
    border: 1px solid rgba(255,255,255,.7);
    border-radius: 13px;
    background: rgba(255,255,255,.9);
    backdrop-filter: blur(14px);
    box-shadow: 0 12px 35px rgba(36,17,63,.12);
    color: #241d29;
    font-size: 10px;
    font-weight: 800;
}

.tz-map-location-dot {
    width: 7px;
    height: 7px;
    flex: 0 0 7px;
    border-radius: 50%;
    background: #7c3aed;
    box-shadow: 0 0 0 5px rgba(124,58,237,.12);
}

/* ---------- Trust ---------- */

.tz-trust-list {
    margin-top: 28px;
    padding-top: 25px;
    border-top: 1px solid rgba(91,33,182,.1);
}

.tz-trust-item {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-top: 9px;
    color: #665f6d;
    font-size: 10px;
    font-weight: 700;
}

.tz-trust-item:first-child {
    margin-top: 0;
}

.tz-trust-item svg {
    color: #059669;
    flex: 0 0 auto;
}

/* ---------- RFP ---------- */

.tz-rfp-panel {
    position: relative;
    overflow: hidden;
    padding: 46px;
    border-radius: 34px;
    background: #fff;
    border: 1px solid rgba(36,17,63,.1);
    box-shadow:
        0 30px 90px rgba(36,17,63,.09);
}

.tz-rfp-panel::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 330px;
    height: 220px;
    background:
        radial-gradient(
            circle at top right,
            rgba(124,58,237,.11),
            transparent 68%
        );
    pointer-events: none;
}

.tz-rfp-header {
    position: relative;
    margin-bottom: 34px;
}

.tz-rfp-kicker {
    display: inline-flex;
    padding: 8px 12px;
    border-radius: 999px;
    background: #f3edff;
    border: 1px solid #e7ddfb;
    color: var(--tz-violet);
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .13em;
    text-transform: uppercase;
}

.tz-rfp-title {
    margin: 16px 0 8px;
    color: #171321;
    font-size: clamp(2rem, 4vw, 3.2rem);
    line-height: .98;
    letter-spacing: -.05em;
    font-weight: 900;
}

.tz-rfp-description {
    max-width: 600px;
    margin: 0;
    color: #817987;
    font-size: 13px;
    line-height: 1.75;
}

/* ---------- Error ---------- */

.tz-error {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 25px;
    padding: 15px 17px;
    border: 1px solid #fecdd3;
    border-radius: 17px;
    background: #fff1f2;
    color: #9f1239;
    font-size: 11px;
    font-weight: 700;
}

/* ---------- Form ---------- */

.tz-form {
    position: relative;
}

.tz-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0,1fr));
    gap: 20px;
}

.tz-field {
    margin-bottom: 21px;
}

.tz-field.full {
    grid-column: 1 / -1;
}

.tz-label {
    display: block;
    margin-bottom: 8px;
    color: #4c4551;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .1em;
    text-transform: uppercase;
}

.tz-required {
    color: #e11d48;
}

.tz-input,
.tz-select,
.tz-textarea {
    display: block;
    width: 100%;
    border: 1px solid #e5e0e8;
    border-radius: 15px;
    background: #faf9fb;
    color: #211b25;
    font-family: inherit;
    font-size: 13px;
    outline: none;
    transition:
        border-color .25s ease,
        background .25s ease,
        box-shadow .25s ease,
        transform .25s ease;
}

.tz-input,
.tz-select {
    height: 52px;
    padding: 0 15px;
}

.tz-textarea {
    min-height: 145px;
    padding: 15px;
    resize: vertical;
    line-height: 1.65;
}

.tz-input::placeholder,
.tz-textarea::placeholder {
    color: #aaa3ad;
}

.tz-input:hover,
.tz-select:hover,
.tz-textarea:hover {
    border-color: #d5cce0;
}

.tz-input:focus,
.tz-select:focus,
.tz-textarea:focus {
    border-color: #8b5cf6;
    background: #fff;
    box-shadow:
        0 0 0 4px rgba(139,92,246,.09);
}

.tz-select {
    appearance: none;
    cursor: pointer;
    background-image:
        linear-gradient(45deg, transparent 50%, #7c7181 50%),
        linear-gradient(135deg, #7c7181 50%, transparent 50%);
    background-position:
        calc(100% - 19px) 22px,
        calc(100% - 14px) 22px;
    background-size: 5px 5px, 5px 5px;
    background-repeat: no-repeat;
}

/* ---------- Submit ---------- */

.tz-form-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding-top: 8px;
}

.tz-submit {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    min-height: 54px;
    padding: 0 24px;
    border: 0;
    border-radius: 999px;
    background:
        linear-gradient(
            135deg,
            #4c1d95,
            #6d28d9 55%,
            #9333ea
        );
    color: #fff;
    font-size: 11px;
    font-weight: 900;
    letter-spacing: .04em;
    cursor: pointer;
    box-shadow:
        0 16px 35px rgba(91,33,182,.22);
    transition:
        transform .25s ease,
        box-shadow .25s ease;
}

.tz-submit:hover {
    transform: translateY(-2px);
    box-shadow:
        0 22px 45px rgba(91,33,182,.28);
}

.tz-submit:active {
    transform: translateY(0);
}

.tz-submit:focus-visible {
    outline: 3px solid rgba(124,58,237,.3);
    outline-offset: 3px;
}

.tz-form-note {
    max-width: 260px;
    color: #918995;
    font-size: 9px;
    line-height: 1.6;
}

/* ---------- Success ---------- */

.tz-success {
    position: relative;
    min-height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.tz-success-inner {
    max-width: 600px;
}

.tz-success-icon {
    width: 82px;
    height: 82px;
    margin: 0 auto 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #ecfdf5;
    color: #059669;
    box-shadow:
        0 0 0 14px rgba(16,185,129,.06);
}

.tz-success-kicker {
    display: inline-flex;
    padding: 8px 12px;
    border-radius: 999px;
    background: #f3edff;
    color: var(--tz-violet);
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .1em;
    text-transform: uppercase;
}

.tz-success-title {
    margin: 18px 0 12px;
    color: #171321;
    font-size: clamp(2rem, 5vw, 3.4rem);
    line-height: 1;
    letter-spacing: -.05em;
    font-weight: 900;
}

.tz-success-copy {
    margin: 0 auto;
    max-width: 550px;
    color: #726a78;
    font-size: 14px;
    line-height: 1.8;
}

.tz-success-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 27px;
    min-height: 50px;
    padding: 0 22px;
    border-radius: 999px;
    background: #5b21b6;
    color: #fff;
    text-decoration: none;
    font-size: 11px;
    font-weight: 900;
    box-shadow: 0 14px 30px rgba(91,33,182,.2);
    transition: transform .25s ease;
}

.tz-success-action:hover {
    transform: translateY(-2px);
}

/* ---------- Closing Statement ---------- */

.tz-contact-closing {
    position: relative;
    max-width: 1280px;
    margin: 0 auto 100px;
    padding: 0 24px;
}

.tz-closing-panel {
    position: relative;
    overflow: hidden;
    min-height: 300px;
    padding: 48px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
    border-radius: 38px;
    background:
        linear-gradient(
            120deg,
            #24113f 0%,
            #3b1762 48%,
            #5b21b6 100%
        );
    box-shadow:
        0 30px 90px rgba(36,17,63,.2);
}

.tz-closing-panel::before {
    content: "";
    position: absolute;
    width: 400px;
    height: 400px;
    right: -150px;
    top: -220px;
    border-radius: 50%;
    background:
        radial-gradient(
            circle,
            rgba(236,72,153,.32),
            transparent 68%
        );
}

.tz-closing-panel::after {
    content: "";
    position: absolute;
    width: 500px;
    height: 160px;
    right: 10%;
    bottom: -120px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.12);
    transform: rotate(-12deg);
}

.tz-closing-content {
    position: relative;
    z-index: 2;
    max-width: 720px;
}

.tz-closing-kicker {
    color: rgba(255,255,255,.6);
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .16em;
    text-transform: uppercase;
}

.tz-closing-title {
    margin: 13px 0 12px;
    color: #fff;
    font-size: clamp(2rem, 5vw, 4rem);
    line-height: .95;
    letter-spacing: -.055em;
    font-weight: 900;
}

.tz-closing-copy {
    margin: 0;
    color: rgba(255,255,255,.68);
    font-size: 13px;
    line-height: 1.75;
}

.tz-closing-actions {
    position: relative;
    z-index: 2;
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.tz-closing-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 52px;
    padding: 0 21px;
    border-radius: 999px;
    text-decoration: none;
    font-size: 10px;
    font-weight: 900;
    transition:
        transform .25s ease,
        background .25s ease;
}

.tz-closing-btn.primary {
    background: #fff;
    color: #3b0764;
}

.tz-closing-btn.secondary {
    border: 1px solid rgba(255,255,255,.25);
    color: #fff;
    background: rgba(255,255,255,.06);
}

.tz-closing-btn:hover {
    transform: translateY(-2px);
}

.tz-closing-btn.secondary:hover {
    background: rgba(255,255,255,.12);
}

/* ---------- Reveal ---------- */

.tz-reveal {
    opacity: 0;
    transform: translateY(30px);
    transition:
        opacity .8s cubic-bezier(.2,.8,.2,1),
        transform .8s cubic-bezier(.2,.8,.2,1);
}

.tz-reveal.is-visible {
    opacity: 1;
    transform: translateY(0);
}

.tz-reveal-left {
    opacity: 0;
    transform: translateX(-35px);
    transition:
        opacity .8s ease,
        transform .8s cubic-bezier(.2,.8,.2,1);
}

.tz-reveal-left.is-visible {
    opacity: 1;
    transform: translateX(0);
}

.tz-reveal-right {
    opacity: 0;
    transform: translateX(35px);
    transition:
        opacity .8s ease,
        transform .8s cubic-bezier(.2,.8,.2,1);
}

.tz-reveal-right.is-visible {
    opacity: 1;
    transform: translateX(0);
}

/* ---------- Responsive ---------- */

@media (max-width: 1100px) {

    .tz-contact-orbit {
        right: -60px;
        opacity: .35;
    }

    .tz-contact-hero-grid {
        grid-template-columns: minmax(0, 1fr);
        gap: 28px;
    }

    .tz-contact-hero-copy {
        max-width: 700px;
    }

    .tz-contact-layout {
        grid-template-columns: minmax(0, .85fr) minmax(0, 1.15fr);
    }

    .tz-closing-panel {
        align-items: flex-start;
        flex-direction: column;
    }
}

@media (max-width: 820px) {

    .tz-contact-hero {
        min-height: auto;
        padding: 55px 0 72px;
    }

    .tz-contact-title {
        font-size: clamp(2.8rem, 12vw, 5rem);
    }

    .tz-contact-orbit {
        display: none;
    }

    .tz-contact-layout {
        grid-template-columns: 1fr;
        gap: 22px;
    }

    .tz-info-panel,
    .tz-rfp-panel {
        padding: 30px 24px;
        border-radius: 28px;
    }

    .tz-form-grid {
        grid-template-columns: 1fr;
        gap: 0;
    }

    .tz-field.full {
        grid-column: auto;
    }

    .tz-closing-panel {
        padding: 34px 25px;
        border-radius: 28px;
    }
}

@media (max-width: 600px) {

    .tz-contact-hero-inner,
    .tz-contact-container,
    .tz-contact-closing {
        padding-left: 18px;
        padding-right: 18px;
    }

    .tz-contact-hero {
        padding-top: 42px;
        padding-bottom: 58px;
    }

    .tz-contact-breadcrumb {
        margin-bottom: 22px;
    }

    .tz-contact-title {
        font-size: clamp(2.55rem, 15vw, 4rem);
    }

    .tz-contact-hero-copy p {
        font-size: 14px;
    }

    .tz-info-panel,
    .tz-rfp-panel {
        padding: 25px 19px;
        border-radius: 24px;
    }

    .tz-info-title,
    .tz-rfp-title {
        font-size: 2rem;
    }

    .tz-map-frame {
        height: 230px;
        border-radius: 20px;
    }

    .tz-form-footer {
        align-items: stretch;
        flex-direction: column;
    }

    .tz-submit {
        width: 100%;
    }

    .tz-form-note {
        max-width: none;
        text-align: center;
    }

    .tz-closing-panel {
        padding: 30px 21px;
    }

    .tz-closing-title {
        font-size: 2.45rem;
    }

    .tz-closing-actions {
        width: 100%;
        flex-direction: column;
    }

    .tz-closing-btn {
        width: 100%;
    }
}

/* ---------- Reduced Motion ---------- */

@media (prefers-reduced-motion: reduce) {

    .tz-contact-orb,
    .tz-contact-orbit {
        animation: none !important;
    }

    .tz-reveal,
    .tz-reveal-left,
    .tz-reveal-right {
        opacity: 1;
        transform: none;
        transition: none;
    }

    .tz-submit,
    .tz-success-action,
    .tz-closing-btn {
        transition: none;
    }
}

/* ---------- Accessibility ---------- */

.tz-contact a:focus-visible,
.tz-contact button:focus-visible,
.tz-contact input:focus-visible,
.tz-contact select:focus-visible,
.tz-contact textarea:focus-visible {
    outline: 3px solid rgba(124,58,237,.28);
    outline-offset: 3px;
}
</style>

<main class="tz-contact">

    <!-- =====================================================
         AMBIENT BACKGROUND
         ===================================================== -->

    <div class="tz-contact-ambient" aria-hidden="true">
        <div class="tz-contact-grid"></div>
        <div class="tz-contact-orb one"></div>
        <div class="tz-contact-orb two"></div>
        <div class="tz-contact-orb three"></div>
    </div>

    <!-- =====================================================
         HERO
         ===================================================== -->

    <section class="tz-contact-hero">

        <div class="tz-contact-orbit" aria-hidden="true">
            <div class="tz-contact-orbit-core">
                <i data-lucide="send" class="w-7 h-7"></i>
            </div>

            <div class="tz-contact-orbit-label one">
                <span></span>
                Brief
            </div>

            <div class="tz-contact-orbit-label two">
                <span></span>
                Strategy
            </div>

            <div class="tz-contact-orbit-label three">
                <span></span>
                Execution
            </div>
        </div>

        <div class="tz-contact-hero-inner">

            <!-- Breadcrumbs -->
            <nav
                class="tz-contact-breadcrumb"
                aria-label="Breadcrumb"
            >
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>

                    <li class="text-slate-300">
                        /
                    </li>

                    <li class="current">
                        Contact & RFP
                    </li>
                </ul>
            </nav>

            <div class="tz-contact-hero-grid">

                <div>

                    <span class="tz-contact-eyebrow">
                        <span class="tz-contact-eyebrow-dot"></span>
                        Initiate Your Brief
                    </span>

                    <h1 class="tz-contact-title">
                        Let's Build
                        <span class="accent">Meaningful</span>
                        Experiences Together.
                    </h1>

                </div>

                <div class="tz-contact-hero-copy">

                    <p>
                        Whether you are planning a
                        <strong>500-dealer national convention</strong>,
                        a multi-city launch tour, or a pan-India retail rollout,
                        our executive production team is ready to deliver.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
         MAIN CONTACT EXPERIENCE
         ===================================================== -->

    <section class="tz-contact-main">

        <div class="tz-contact-container">

            <div class="tz-contact-layout">

                <!-- =================================================
                     LEFT — CONTACT / MAP
                     ================================================= -->

                <div class="tz-reveal-left">

                    <div class="tz-info-panel">

                        <span class="tz-info-kicker">
                            Direct Channels
                        </span>

                        <h2 class="tz-info-title">
                            Executive
                            Headquarters.
                        </h2>

                        <p class="tz-info-description">
                            Connect directly with Bharat Jadhav and our senior
                            production leads. Every corporate brief receives
                            rigorous technical evaluation and rapid turnaround.
                        </p>

                        <!-- Contact Details -->

                        <div class="tz-info-list">

                            <!-- Location -->

                            <div class="tz-info-item">

                                <div class="tz-info-icon">
                                    <i data-lucide="map-pin" class="w-5 h-5"></i>
                                </div>

                                <div>

                                    <span class="tz-info-label">
                                        Headquarters
                                    </span>

                                    <span class="tz-info-value">
                                        Mumbai, Maharashtra, India
                                    </span>

                                    <span class="tz-info-sub">
                                        Delivering in Mumbai, Pune, Bangalore,
                                        Delhi, Goa & Pan-India
                                    </span>

                                </div>

                            </div>

                            <!-- Phone -->

                            <div class="tz-info-item">

                                <div class="tz-info-icon">
                                    <i data-lucide="phone" class="w-5 h-5"></i>
                                </div>

                                <div>

                                    <span class="tz-info-label">
                                        Telephone / WhatsApp
                                    </span>

                                    <span class="tz-info-value">
                                        <a href="tel:+919987399997">
                                            +91 99873 99997
                                        </a>
                                    </span>

                                    <span class="tz-info-sub">
                                        Mon–Sat, 9:30 AM – 7:00 PM IST
                                    </span>

                                </div>

                            </div>

                            <!-- Email -->

                            <div class="tz-info-item">

                                <div class="tz-info-icon">
                                    <i data-lucide="mail" class="w-5 h-5"></i>
                                </div>

                                <div>

                                    <span class="tz-info-label">
                                        Corporate Email
                                    </span>

                                    <span class="tz-info-value">
                                        <a href="mailto:info@trendzeventz.com">
                                            info@trendzeventz.com
                                        </a>
                                    </span>

                                    <span class="tz-info-sub">
                                        Direct RFP submissions & briefs
                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- =================================================
                             GOOGLE MAP
                             ================================================= -->

                        <div class="tz-map">

                            <div class="tz-map-header">

                                <div>

                                    <span class="tz-map-kicker">
                                        Find Us
                                    </span>

                                    <div class="tz-map-title">
                                        Trendz Eventz · Mumbai
                                    </div>

                                </div>

                                <a
                                    href="https://www.google.com/maps/search/?api=1&query=Mumbai%2C%20Maharashtra%2C%20India"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="tz-map-link"
                                >
                                    Open Maps
                                    <i
                                        data-lucide="external-link"
                                        class="w-3.5 h-3.5"
                                    ></i>
                                </a>

                            </div>

                            <div class="tz-map-frame">

                                <iframe
                                    title="Trendz Eventz Mumbai location map"
                                    src="https://www.google.com/maps?q=Mumbai%2C%20Maharashtra%2C%20India&output=embed"
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    allowfullscreen>
                                </iframe>

                                <div class="tz-map-location">
                                    <span class="tz-map-location-dot"></span>
                                    Mumbai · Maharashtra · India
                                </div>

                            </div>

                        </div>

                        <!-- Trust -->

                        <div class="tz-trust-list">

                            <div class="tz-trust-item">
                                <i data-lucide="shield-check" class="w-4 h-4"></i>
                                <span>
                                    NDA Protection Guaranteed for Enterprise Briefs
                                </span>
                            </div>

                            <div class="tz-trust-item">
                                <i data-lucide="user-check" class="w-4 h-4"></i>
                                <span>
                                    Direct Leadership Oversight (Bharat Jadhav)
                                </span>
                            </div>

                            <div class="tz-trust-item">
                                <i data-lucide="clock-3" class="w-4 h-4"></i>
                                <span>
                                    24-Hour Business Response Window
                                </span>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- =================================================
                     RIGHT — RFP FORM
                     ================================================= -->

                <div class="tz-reveal-right">

                    <div class="tz-rfp-panel">

                        <?php if ($submitted): ?>

                            <!-- SUCCESS -->

                            <div class="tz-success">

                                <div class="tz-success-inner">

                                    <div class="tz-success-icon">
                                        <i
                                            data-lucide="check"
                                            class="w-9 h-9"
                                        ></i>
                                    </div>

                                    <span class="tz-success-kicker">
                                        Brief Received
                                    </span>

                                    <h2 class="tz-success-title">
                                        Your Event Brief
                                        Has Been Logged.
                                    </h2>

                                    <p class="tz-success-copy">
                                        Thank you for contacting Trendz Eventz.
                                        Your brief has been transmitted directly
                                        to Bharat Jadhav (Founder & Managing Director)
                                        and our senior production leads. We will
                                        review your parameters and respond within
                                        24 business hours.
                                    </p>

                                    <a
                                        href="index.php"
                                        class="tz-success-action"
                                    >
                                        Return to Homepage
                                        <i
                                            data-lucide="arrow-right"
                                            class="w-4 h-4"
                                        ></i>
                                    </a>

                                </div>

                            </div>

                        <?php else: ?>

                            <!-- FORM HEADER -->

                            <div class="tz-rfp-header">

                                <span class="tz-rfp-kicker">
                                    Request for Proposal
                                </span>

                                <h2 class="tz-rfp-title">
                                    Submit Your
                                    Event Parameters.
                                </h2>

                                <p class="tz-rfp-description">
                                    Tell us what you are building. Give us the
                                    scale, scope, locations and timelines.
                                    We will take it from there.
                                </p>

                            </div>

                            <?php if (!empty($error)): ?>

                                <div
                                    class="tz-error"
                                    role="alert"
                                >

                                    <i
                                        data-lucide="triangle-alert"
                                        class="w-5 h-5 flex-shrink-0"
                                    ></i>

                                    <span>
                                        <?= $error ?>
                                    </span>

                                </div>

                            <?php endif; ?>

                            <!-- FORM -->

                            <form
                                action="contact.php"
                                method="POST"
                                class="tz-form"
                                novalidate
                            >

                                <!-- Honeypot -->

                                <div
                                    style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;"
                                    aria-hidden="true"
                                >
                                    <label for="website_url_check">
                                        Do not fill this field
                                    </label>

                                    <input
                                        type="text"
                                        id="website_url_check"
                                        name="website_url_check"
                                        tabindex="-1"
                                        autocomplete="off"
                                    >
                                </div>

                                <div class="tz-form-grid">

                                    <!-- Name -->

                                    <div class="tz-field">

                                        <label
                                            for="rfp-name"
                                            class="tz-label"
                                        >
                                            Full Name
                                            <span class="tz-required">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="rfp-name"
                                            name="name"
                                            required
                                            autocomplete="name"
                                            placeholder="e.g. Rahul Sharma"
                                            class="tz-input"
                                        >

                                    </div>

                                    <!-- Company -->

                                    <div class="tz-field">

                                        <label
                                            for="rfp-company"
                                            class="tz-label"
                                        >
                                            Company / Brand
                                            <span class="tz-required">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="rfp-company"
                                            name="company"
                                            required
                                            autocomplete="organization"
                                            placeholder="e.g. Tata Consumer / Reliance"
                                            class="tz-input"
                                        >

                                    </div>

                                    <!-- Email -->

                                    <div class="tz-field">

                                        <label
                                            for="rfp-email"
                                            class="tz-label"
                                        >
                                            Corporate Email
                                            <span class="tz-required">*</span>
                                        </label>

                                        <input
                                            type="email"
                                            id="rfp-email"
                                            name="email"
                                            required
                                            autocomplete="email"
                                            placeholder="name@company.com"
                                            class="tz-input"
                                        >

                                    </div>

                                    <!-- Phone -->

                                    <div class="tz-field">

                                        <label
                                            for="rfp-phone"
                                            class="tz-label"
                                        >
                                            Direct Phone / WhatsApp
                                            <span class="tz-required">*</span>
                                        </label>

                                        <input
                                            type="tel"
                                            id="rfp-phone"
                                            name="phone"
                                            required
                                            autocomplete="tel"
                                            placeholder="+91 98765 43210"
                                            class="tz-input"
                                        >

                                    </div>

                                    <!-- Requirement -->

                                    <div class="tz-field full">

                                        <label
                                            for="rfp-requirement"
                                            class="tz-label"
                                        >
                                            Primary Service Requirement
                                            <span class="tz-required">*</span>
                                        </label>

                                        <select
                                            id="rfp-requirement"
                                            name="requirement"
                                            required
                                            class="tz-select"
                                        >

                                            <option value="">
                                                Select Requirement
                                            </option>

                                            <option
                                                value="Corporate Events"
                                                <?= (
                                                    stripos(
                                                        $prefill_req,
                                                        'corporate'
                                                    ) !== false
                                                ) ? 'selected' : '' ?>
                                            >
                                                Corporate Events
                                                (Dealer Meets, Conventions, Conferences)
                                            </option>

                                            <option
                                                value="BTL & Experiential"
                                                <?= (
                                                    stripos(
                                                        $prefill_req,
                                                        'btl'
                                                    ) !== false ||
                                                    stripos(
                                                        $prefill_req,
                                                        'experiential'
                                                    ) !== false
                                                ) ? 'selected' : '' ?>
                                            >
                                                BTL & Experiential
                                                (Mall Activations, Roadshows, Sampling)
                                            </option>

                                            <option
                                                value="Retail Branding"
                                                <?= (
                                                    stripos(
                                                        $prefill_req,
                                                        'retail'
                                                    ) !== false
                                                ) ? 'selected' : '' ?>
                                            >
                                                Retail Branding & Pan-India Rollouts
                                            </option>

                                            <option
                                                value="Digital Marketing"
                                                <?= (
                                                    stripos(
                                                        $prefill_req,
                                                        'digital'
                                                    ) !== false
                                                ) ? 'selected' : '' ?>
                                            >
                                                Digital & Social-First Campaign Amplification
                                            </option>

                                            <option
                                                value="Field Force"
                                                <?= (
                                                    stripos(
                                                        $prefill_req,
                                                        'field'
                                                    ) !== false ||
                                                    stripos(
                                                        $prefill_req,
                                                        'mobile'
                                                    ) !== false
                                                ) ? 'selected' : '' ?>
                                            >
                                                Field Force Deployment & Candidate Outreach
                                            </option>

                                            <option
                                                value="Outdoor Branding"
                                                <?= (
                                                    stripos(
                                                        $prefill_req,
                                                        'outdoor'
                                                    ) !== false
                                                ) ? 'selected' : '' ?>
                                            >
                                                Broadcast, Print & Highway Outdoor Branding
                                            </option>

                                        </select>

                                    </div>

                                    <!-- Message -->

                                    <div class="tz-field full">

                                        <label
                                            for="rfp-message"
                                            class="tz-label"
                                        >
                                            Project Scope, Target Cities & Expected Dates
                                            <span class="tz-required">*</span>
                                        </label>

                                        <textarea
                                            id="rfp-message"
                                            name="message"
                                            required
                                            rows="5"
                                            placeholder="Brief us on your event scale, delegate count, target cities, dates, or specific production needs..."
                                            class="tz-textarea"
                                        ></textarea>

                                    </div>

                                </div>

                                <!-- Submit -->

                                <div class="tz-form-footer">

                                    <button
                                        type="submit"
                                        class="tz-submit"
                                    >

                                        <span>
                                            Submit RFP / Event Brief
                                        </span>

                                        <i
                                            data-lucide="arrow-up-right"
                                            class="w-4 h-4"
                                        ></i>

                                    </button>

                                    <p class="tz-form-note">
                                        Your brief is reviewed by the executive
                                        production team. Required fields are marked
                                        with an asterisk.
                                    </p>

                                </div>

                            </form>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
         CLOSING CTA
         ===================================================== -->

    <section class="tz-contact-closing">

        <div class="tz-closing-panel">

            <div class="tz-closing-content">

                <span class="tz-closing-kicker">
                    From Brief to Reality
                </span>

                <h2 class="tz-closing-title">
                    Your brief.
                    Our execution.
                </h2>

                <p class="tz-closing-copy">
                    Bring us the ambition, the audience and the challenge.
                    We bring the creative thinking, operating discipline and
                    on-ground execution.
                </p>

            </div>

            <div class="tz-closing-actions">

                <a
                    href="services.php"
                    class="tz-closing-btn secondary"
                >
                    Explore Capabilities
                    <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </a>

                <a
                    href="tel:+919987399997"
                    class="tz-closing-btn primary"
                >
                    Call +91 99873 99997
                    <i data-lucide="phone" class="w-4 h-4"></i>
                </a>

            </div>

        </div>

    </section>

</main>

<!-- =========================================================
     INTERACTION
     ========================================================= -->

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ---------------------------------------------
       Lucide Icons
       --------------------------------------------- */

    if (window.lucide) {
        lucide.createIcons();
    }

    /* ---------------------------------------------
       Scroll Reveal
       --------------------------------------------- */

    const revealElements = document.querySelectorAll(
        '.tz-reveal, .tz-reveal-left, .tz-reveal-right'
    );

    if ('IntersectionObserver' in window) {

        const observer = new IntersectionObserver(
            function (entries, obs) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        entry.target.classList.add('is-visible');

                        obs.unobserve(entry.target);
                    }

                });

            },
            {
                threshold: 0.12,
                rootMargin: '0px 0px -60px 0px'
            }
        );

        revealElements.forEach(function (element) {
            observer.observe(element);
        });

    } else {

        revealElements.forEach(function (element) {
            element.classList.add('is-visible');
        });

    }

    /* ---------------------------------------------
       Magnetic CTA
       --------------------------------------------- */

    if (
        window.matchMedia &&
        window.matchMedia('(pointer: fine)').matches &&
        !window.matchMedia('(prefers-reduced-motion: reduce)').matches
    ) {

        document
            .querySelectorAll('.tz-submit, .tz-closing-btn')
            .forEach(function (button) {

                button.addEventListener('mousemove', function (event) {

                    const rect = button.getBoundingClientRect();

                    const x =
                        (event.clientX - rect.left - rect.width / 2) * 0.08;

                    const y =
                        (event.clientY - rect.top - rect.height / 2) * 0.08;

                    button.style.transform =
                        `translate3d(${x}px, ${y}px, 0)`;

                });

                button.addEventListener('mouseleave', function () {
                    button.style.transform = '';
                });

            });
    }

    /* ---------------------------------------------
       Smooth Internal Links
       --------------------------------------------- */

    document
        .querySelectorAll('a[href^="#"]')
        .forEach(function (link) {

            link.addEventListener('click', function (event) {

                const targetId =
                    link.getAttribute('href');

                if (!targetId || targetId === '#') {
                    return;
                }

                const target =
                    document.querySelector(targetId);

                if (!target) {
                    return;
                }

                event.preventDefault();

                target.scrollIntoView({
                    behavior:
                        window.matchMedia(
                            '(prefers-reduced-motion: reduce)'
                        ).matches
                            ? 'auto'
                            : 'smooth',
                    block: 'start'
                });

            });

        });

});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>