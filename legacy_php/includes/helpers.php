<?php
/**
 * Trendz Eventz - Utility, Security & Presentation Helper Functions
 */
declare(strict_types=1);

/**
 * Safe HTML Escaping shorthand
 */
function h(?string $value): string {
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/**
 * Generate or retrieve the session CSRF token
 */
function csrf_token(): string {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return (string)$_SESSION['csrf_token'];
}

/**
 * Validate CSRF token using constant-time comparison
 */
function verify_csrf_token(?string $token): bool {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (empty($token) || empty($_SESSION['csrf_token'])) {
        return false;
    }
    return hash_equals((string)$_SESSION['csrf_token'], (string)$token);
}

/**
 * Clean and trim user text input
 */
function clean_input(?string $input): string {
    if ($input === null) {
        return '';
    }
    $trimmed = trim($input);
    return preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $trimmed) ?? '';
}

/**
 * Generate asset URL with cache-busting timestamp
 */
function asset(string $path): string {
    $clean_path = ltrim($path, '/');
    $full_file = __DIR__ . '/../' . $clean_path;
    $v = file_exists($full_file) ? filemtime($full_file) : 1;
    return $clean_path . '?v=' . $v;
}

/**
 * Clean internal URL generator
 */
function url(string $path = ''): string {
    return ltrim($path, '/');
}

/**
 * Check if the given page is active
 */
function is_active(string $nav_key, string $current_key): bool {
    return $nav_key === $current_key;
}

/**
 * Get comprehensive metadata for any page
 */
function get_page_meta(string $page_key, array $overrides = []): array {
    $base_title = SITE_NAME . ' | ' . SITE_TAGLINE;
    $defaults = [
        'title' => $base_title,
        'description' => SITE_DESCRIPTION,
        'canonical' => $page_key === 'home' ? 'index.php' : $page_key . '.php',
        'og_type' => 'website',
        'og_image' => 'assets/img/brand/logo.png',
        'breadcrumbs' => [
            ['label' => 'Home', 'url' => 'index.php']
        ]
    ];

    $directory = [
        'home' => [
            'title' => 'Trendz Eventz — Experiential Marketing & Corporate Events Agency Mumbai',
            'description' => 'Meaningful experiences. Measurable momentum. Trendz Eventz delivers corporate events, pan-India dealer meets, launches, BTL activations, and retail branding.',
            'canonical' => 'index.php',
            'breadcrumbs' => []
        ],
        'about' => [
            'title' => 'About Us | Trendz Eventz — 15+ Years Experiential Agency Mumbai',
            'description' => 'Discover Trendz Eventz: Founded by Bharat Jadhav, we combine audacious creative with relentless execution discipline across 500+ corporate productions.',
            'canonical' => 'about.php',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => 'index.php'],
                ['label' => 'About', 'url' => 'about.php']
            ]
        ],
        'services' => [
            'title' => 'Services & Capabilities | Trendz Eventz — Corporate, BTL & Retail Branding',
            'description' => 'Explore Trendz Eventz capabilities: Corporate Events, BTL & Experiential, Retail Branding, Digital Marketing, Field Force Outreach, and Outdoor Branding.',
            'canonical' => 'services.php',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => 'index.php'],
                ['label' => 'Services', 'url' => 'services.php']
            ]
        ],
        'work' => [
            'title' => 'Our Work & Case Studies | Trendz Eventz — 500+ National Productions',
            'description' => 'Explore verified case studies: Samsung 100-store launch, Philips 500-dealer meet, TVS Tyres 10-city tour, Lipton modern trade, and Cadbury mall activations.',
            'canonical' => 'work.php',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => 'index.php'],
                ['label' => 'Work', 'url' => 'work.php']
            ]
        ],
        'case-study' => [
            'title' => 'Case Study | Trendz Eventz',
            'description' => 'Detailed execution and verified scale for enterprise event production and on-ground activations by Trendz Eventz.',
            'canonical' => 'case-study.php',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => 'index.php'],
                ['label' => 'Work', 'url' => 'work.php'],
                ['label' => 'Case Study', 'url' => '']
            ]
        ],
        'clients' => [
            'title' => 'Client Partners & Ecosystem | Trendz Eventz — Trusted by India\'s Leading Brands',
            'description' => 'Brands that trust Trendz Eventz: Philips, TVS Tyres, Samsung, Cadbury, Lipton, Maruti Driving School, Bombay Dyeing, Vitra, Yamaha, and more.',
            'canonical' => 'clients.php',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => 'index.php'],
                ['label' => 'Clients', 'url' => 'clients.php']
            ]
        ],
        'contact' => [
            'title' => 'Request a Proposal | Trendz Eventz — Contact Mumbai Experiential Agency',
            'description' => 'Initiate your event or activation brief with Trendz Eventz. Connect directly with Bharat Jadhav and our executive production leadership in Mumbai.',
            'canonical' => 'contact.php',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => 'index.php'],
                ['label' => 'Contact', 'url' => 'contact.php']
            ]
        ]
    ];

    $matched = $directory[$page_key] ?? $defaults;
    return array_merge($matched, $overrides);
}

/**
 * Process and securely store RFP inquiries
 */
function handle_inquiry_submission(): array {
    $errors = [];
    $data = [
        'name' => clean_input($_POST['name'] ?? ''),
        'company' => clean_input($_POST['company'] ?? ''),
        'email' => clean_input($_POST['email'] ?? ''),
        'phone' => clean_input($_POST['phone'] ?? ''),
        'requirement' => clean_input($_POST['requirement'] ?? ''),
        'message' => clean_input($_POST['message'] ?? ''),
    ];

    // 1. Honeypot Bot Trap Check
    if (!empty($_POST['website_url_check'])) {
        // Silently accept without saving
        return ['success' => true, 'bot_detected' => true];
    }

    // 2. CSRF Token Verification
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $errors['csrf'] = 'Security verification failed. Please refresh the page and try again.';
        return ['success' => false, 'errors' => $errors, 'data' => $data];
    }

    // 3. Server-side Field Validations
    if (empty($data['name']) || mb_strlen($data['name']) < 2) {
        $errors['name'] = 'Please enter your full name (minimum 2 characters).';
    }

    if (empty($data['company']) || mb_strlen($data['company']) < 2) {
        $errors['company'] = 'Please provide your company or brand name.';
    }

    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid corporate email address.';
    }

    if (empty($data['phone']) || !preg_match('/^[0-9\+\-\s\(\)]{8,20}$/', $data['phone'])) {
        $errors['phone'] = 'Please provide a valid direct contact number with country code.';
    }

    if (empty($data['requirement'])) {
        $errors['requirement'] = 'Please select a core service requirement.';
    }

    if (empty($data['message']) || mb_strlen($data['message']) < 15) {
        $errors['message'] = 'Please describe your event requirements (minimum 15 characters).';
    }

    if (!empty($errors)) {
        return ['success' => false, 'errors' => $errors, 'data' => $data];
    }

    // 4. Secure Flat-File JSON Storage
    $storage_file = __DIR__ . '/../storage/inquiries.json';
    $records = [];
    if (file_exists($storage_file)) {
        $content = file_get_contents($storage_file);
        $records = json_decode($content, true) ?? [];
    }

    $new_entry = [
        'id' => 'INQ-' . date('Ymd-His') . '-' . bin2hex(random_bytes(3)),
        'timestamp' => date('c'),
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1',
        'user_agent' => substr($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown', 0, 255),
        'name' => $data['name'],
        'company' => $data['company'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'requirement' => $data['requirement'],
        'message' => $data['message'],
        'status' => 'new'
    ];

    $records[] = $new_entry;
    $saved = file_put_contents($storage_file, json_encode($records, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);

    if ($saved === false) {
        $errors['system'] = 'An unexpected storage error occurred. Please contact us directly at ' . SITE_EMAIL;
        return ['success' => false, 'errors' => $errors, 'data' => $data];
    }

    return ['success' => true, 'entry' => $new_entry];
}

