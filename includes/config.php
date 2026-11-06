<?php
/**
 * Trendz Eventz - Global Site Configuration
 */
declare(strict_types=1);

// Brand & Entity Constants
define('SITE_NAME', 'Trendz Eventz');
define('SITE_TAGLINE', 'Meaningful experiences. Measurable momentum.');
define('SITE_DESCRIPTION', 'Trendz Eventz is a premier corporate experiential marketing and event management agency in Mumbai, delivering pan-India dealer meets, launches, BTL activations, and retail branding.');
define('SITE_FOUNDER', 'Bharat Jadhav');
define('SITE_FOUNDER_TITLE', 'Founder & Managing Director');
define('SITE_FOUNDER_STATEMENT', 'Great events do not happen by chance. They happen when audacious creative meets relentless execution discipline.');

// Contact & Location Coordinates
define('SITE_EMAIL', 'info@trendzeventz.com');
define('SITE_PHONE', '+91 99873 99997');
define('SITE_PHONE_RAW', '+919987399997');
define('SITE_LOCATION', 'Mumbai, Maharashtra, India');
define('SITE_INSTAGRAM', 'https://instagram.com/trendz_eventz');
define('SITE_INSTAGRAM_HANDLE', '@trendz_eventz');

// Base Paths
define('BASE_URL', '');

// Global Navigation Menu
const NAV_ITEMS = [
    [
        'label' => 'Home',
        'url' => 'index.php',
        'key' => 'home'
    ],
    [
        'label' => 'About',
        'url' => 'about.php',
        'key' => 'about'
    ],
    [
        'label' => 'Services',
        'url' => 'services.php',
        'key' => 'services'
    ],
    [
        'label' => 'Work',
        'url' => 'work.php',
        'key' => 'work'
    ],
    [
        'label' => 'Clients',
        'url' => 'clients.php',
        'key' => 'clients'
    ],
    [
        'label' => 'Contact',
        'url' => 'contact.php',
        'key' => 'contact'
    ],
];

