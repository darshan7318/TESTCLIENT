<?php
/**
 * Trendz Eventz - Application Bootstrap & Security Environment
 */
declare(strict_types=1);

// Enforce standard timezone
date_default_timezone_set('Asia/Kolkata');

// Security & Production Error Handling
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', '0');
ini_set('log_errors', '1');

// Start hardened session if not active
if (session_status() === PHP_SESSION_NONE) {
    $cookie_params = [
        'lifetime' => 0,
        'path' => '/',
        'domain' => '',
        'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
        'httponly' => true,
        'samesite' => 'Lax'
    ];
    session_set_cookie_params($cookie_params);
    session_start();
}

// Security Headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: geolocation=(), camera=(), microphone=()');

// Include Core Subsystems
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/components.php';

