<?php
/**
 * Trendz Eventz - Modular UI Component Rendering Engine
 * Pure presentation layer with strict output escaping.
 */
declare(strict_types=1);

/**
 * Section Header Component
 */
function render_section_header(string $eyebrow, string $title, string $description = '', bool $centered = false, bool $light = false): string {
    $align_class = $centered ? 'section-header--center' : '';
    $light_class = $light ? 'section-header--light' : '';
    
    $html = '<div class="section-header ' . $align_class . ' ' . $light_class . '">';
    if (!empty($eyebrow)) {
        $html .= '<span class="eyebrow">' . h($eyebrow) . '</span>';
    }
    $html .= '<h2 class="section-title">' . h($title) . '</h2>';
    if (!empty($description)) {
        $html .= '<p class="section-description">' . h($description) . '</p>';
    }
    $html .= '</div>';
    
    return $html;
}

/**
 * Primary & Secondary CTA Buttons
 */
function render_cta_button(string $label, string $url, string $variant = 'primary', string $icon = 'arrow', array $attrs = []): string {
    $class = 'btn btn--' . h($variant);
    $attr_str = '';
    foreach ($attrs as $k => $v) {
        $attr_str .= ' ' . h($k) . '="' . h($v) . '"';
    }
    
    $icon_html = '';
    if ($icon === 'arrow') {
        $icon_html = '<svg class="btn__icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>';
    } elseif ($icon === 'phone') {
        $icon_html = '<svg class="btn__icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>';
    }
    
    return '<a href="' . h($url) . '" class="' . $class . '"' . $attr_str . '>' .
           '<span>' . h($label) . '</span>' . $icon_html . '</a>';
}

/**
 * Metric & Statistic Component
 */
function render_stat_item(array $stat): string {
    return '
    <div class="stat-card">
        <div class="stat-card__number-wrap">
            <span class="stat-card__number" data-target="' . h($stat['number']) . '">' . h($stat['number']) . '</span>
            <span class="stat-card__suffix">' . h($stat['suffix']) . '</span>
        </div>
        <h3 class="stat-card__label">' . h($stat['label']) . '</h3>
        <p class="stat-card__detail">' . h($stat['detail']) . '</p>
    </div>';
}

/**
 * Service Pillar Card (Visually Differentiated)
 */
function render_service_card(array $service, int $index): string {
    $num_str = str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT);
    $caps_html = '';
    foreach ($service['capabilities'] as $cap) {
        $caps_html .= '<li class="service-card__capability"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>' . h($cap) . '</li>';
    }
    
    return '
    <article class="service-card" data-service-id="' . h($service['id']) . '">
        <div class="service-card__top">
            <span class="service-card__number">' . $num_str . '</span>
            <span class="service-card__tag">' . h($service['tag']) . '</span>
        </div>
        <div class="service-card__media">
            <img src="' . h(asset($service['image'])) . '" alt="' . h($service['name']) . '" loading="lazy" class="service-card__img" width="600" height="400">
        </div>
        <div class="service-card__content">
            <h3 class="service-card__title">' . h($service['name']) . '</h3>
            <p class="service-card__desc">' . h($service['short_desc']) . '</p>
            <div class="service-card__capabilities-wrap">
                <span class="service-card__capabilities-label">Core Capabilities:</span>
                <ul class="service-card__capabilities-list">
                    ' . $caps_html . '
                </ul>
            </div>
            <div class="service-card__actions">
                <a href="services.php#' . h($service['id']) . '" class="service-card__link">
                    <span>Explore Pillar</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>
        </div>
    </article>';
}

/**
 * Editorial Project / Case Study Card
 */
function render_project_card(array $project): string {
    return '
    <article class="project-card" data-category="' . h($project['category']) . '">
        <a href="case-study.php?slug=' . h($project['slug']) . '" class="project-card__link-wrap" aria-label="View case study for ' . h($project['client']) . ': ' . h($project['title']) . '">
            <div class="project-card__media">
                <img src="' . h(asset($project['hero_image'])) . '" alt="' . h($project['client'] . ' - ' . $project['title']) . '" loading="lazy" class="project-card__img" width="700" height="460">
                <div class="project-card__badge-bar">
                    <span class="badge badge--dark">' . h($project['client']) . '</span>
                    <span class="badge badge--purple">' . h($project['scope_badge']) . '</span>
                </div>
            </div>
            <div class="project-card__body">
                <div class="project-card__meta">
                    <span class="project-card__category">' . h($project['category_display']) . '</span>
                    <span class="project-card__location">' . h($project['location']) . '</span>
                </div>
                <h3 class="project-card__title">' . h($project['title']) . '</h3>
                <p class="project-card__objective">' . h($project['objective']) . '</p>
                <div class="project-card__footer">
                    <span class="project-card__cta-text">Read Case Study</span>
                    <svg class="project-card__arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </div>
            </div>
        </a>
    </article>';
}

/**
 * Client Partner Logo Item
 */
function render_client_logo(array $client): string {
    return '
    <div class="client-logo-item" title="' . h($client['name']) . '">
        <img src="' . h(asset($client['logo'])) . '" alt="' . h($client['name']) . ' Logo" loading="lazy" class="client-logo-item__img" width="180" height="90">
        <span class="client-logo-item__caption">' . h($client['name']) . '</span>
    </div>';
}

/**
 * 5-Step Execution Approach Step
 */
function render_process_step(array $step): string {
    return '
    <div class="process-step">
        <div class="process-step__header">
            <span class="process-step__number">' . h($step['step']) . '</span>
            <div class="process-step__line"></div>
        </div>
        <h3 class="process-step__title">' . h($step['title']) . '</h3>
        <p class="process-step__desc">' . h($step['desc']) . '</p>
        <span class="process-step__highlight">' . h($step['highlight']) . '</span>
    </div>';
}

/**
 * Founder Leadership Block
 */
function render_founder_block(array $founder): string {
    return '
    <div class="founder-card">
        <div class="founder-card__glow" aria-hidden="true"></div>
        <div class="founder-card__grid">
            <div class="founder-card__content">
                <span class="eyebrow eyebrow--lavender">Leadership & Philosophy</span>
                <blockquote class="founder-card__quote">
                    “' . h($founder['statement']) . '”
                </blockquote>
                <p class="founder-card__bio">' . h($founder['bio']) . '</p>
                <div class="founder-card__profile">
                    <div class="founder-card__details">
                        <h3 class="founder-card__name">' . h($founder['name']) . '</h3>
                        <p class="founder-card__title">' . h($founder['title']) . '</p>
                        <p class="founder-card__location">' . h($founder['location']) . '</p>
                    </div>
                    <div class="founder-card__signature">
                        <img src="' . h(asset($founder['signature_image'])) . '" alt="Bharat Jadhav Signature" loading="lazy" class="founder-card__sig-img" width="160" height="60">
                    </div>
                </div>
            </div>
            <div class="founder-card__stats-col">
                <div class="founder-badge">
                    <span class="founder-badge__metric">15+</span>
                    <span class="founder-badge__label">Years of Event Mastery</span>
                </div>
                <div class="founder-badge">
                    <span class="founder-badge__metric">500+</span>
                    <span class="founder-badge__label">Pan-India Productions</span>
                </div>
                <div class="founder-badge">
                    <span class="founder-badge__metric">1</span>
                    <span class="founder-badge__label">Single Point Accountability</span>
                </div>
            </div>
        </div>
    </div>';
}

/**
 * Continuous Client Logo Marquee
 */
function render_client_marquee(array $clients): string {
    $items_html = '';
    // Duplicate array for seamless infinite ticker
    $ticker_list = array_merge($clients, $clients);
    foreach ($ticker_list as $c) {
        $items_html .= '
        <div class="marquee__item" aria-hidden="true">
            <img src="' . h(asset($c['logo'])) . '" alt="' . h($c['name']) . '" class="marquee__img" loading="lazy" width="140" height="70">
        </div>';
    }
    
    return '
    <div class="marquee" aria-label="Corporate Client Logos Ticker">
        <div class="marquee__track">
            ' . $items_html . '
        </div>
    </div>';
}

/**
 * Accessible Breadcrumb Navigation
 */
function render_breadcrumbs(array $crumbs): string {
    if (empty($crumbs)) {
        return '';
    }
    
    $html = '<nav aria-label="Breadcrumb" class="breadcrumbs"><ol class="breadcrumbs__list">';
    $total = count($crumbs);
    foreach ($crumbs as $i => $crumb) {
        $is_last = ($i === $total - 1);
        $html .= '<li class="breadcrumbs__item">';
        if ($is_last || empty($crumb['url'])) {
            $html .= '<span class="breadcrumbs__current" aria-current="page">' . h($crumb['label']) . '</span>';
        } else {
            $html .= '<a href="' . h($crumb['url']) . '" class="breadcrumbs__link">' . h($crumb['label']) . '</a>';
            $html .= '<span class="breadcrumbs__separator" aria-hidden="true">/</span>';
        }
        $html .= '</li>';
    }
    $html .= '</ol></nav>';
    return $html;
}

/**
 * Portfolio Category Filter Bar
 */
function render_category_filter(string $current = 'all'): string {
    $categories = [
        'all' => 'All Work',
        'Corporate' => 'Corporate Events',
        'Experiential' => 'Experiential & BTL',
        'Retail' => 'Retail Branding',
        'Launches' => 'Launches',
        'Activations' => 'Activations'
    ];
    
    $html = '<div class="filter-bar" role="toolbar" aria-label="Filter case studies by category">';
    foreach ($categories as $cat_key => $cat_label) {
        $active_class = ($cat_key === $current) ? 'filter-btn--active' : '';
        $aria_pressed = ($cat_key === $current) ? 'true' : 'false';
        $html .= '<button type="button" class="filter-btn ' . $active_class . '" data-filter="' . h($cat_key) . '" aria-pressed="' . $aria_pressed . '">' . h($cat_label) . '</button>';
    }
    $html .= '</div>';
    return $html;
}

/**
 * Secure RFP Contact Form
 */
function render_contact_form(string $csrf_token, array $errors = [], array $data = []): string {
    $services_options = [
        'Corporate Events (Dealer Meets, Conventions, Conferences)',
        'BTL & Experiential (Mall Activations, Roadshows, Sampling)',
        'Retail Branding & Pan-India Rollouts',
        'Digital & Social-First Campaign Amplification',
        'Mobile Outreach & Field Force Deployment',
        'Broadcast, Print & Highway Outdoor Branding',
        'Integrated Multi-City Brand Launch Tour'
    ];
    
    $req_val = $data['requirement'] ?? '';
    $options_html = '<option value="">Select Primary Requirement *</option>';
    foreach ($services_options as $opt) {
        $selected = '';
        if ($req_val === $opt) {
            $selected = ' selected';
        } elseif (!empty($req_val) && (stripos($opt, $req_val) !== false || stripos($req_val, explode(' ', $opt)[0]) !== false)) {
            $selected = ' selected';
            $req_val = $opt; // lock to matched option
        }
        $options_html .= '<option value="' . h($opt) . '"' . $selected . '>' . h($opt) . '</option>';
    }
    
    $csrf_err = !empty($errors['csrf']) ? '<div class="form-alert form-alert--error" role="alert">' . h($errors['csrf']) . '</div>' : '';
    $system_err = !empty($errors['system']) ? '<div class="form-alert form-alert--error" role="alert">' . h($errors['system']) . '</div>' : '';

    return '
    <form action="contact.php" method="POST" class="contact-form" id="contact-rfp-form" novalidate>
        ' . $csrf_err . '
        ' . $system_err . '
        
        <input type="hidden" name="csrf_token" value="' . h($csrf_token) . '">
        
        <!-- Honeypot anti-bot trap (hidden from real users) -->
        <div style="display:none !important;" aria-hidden="true">
            <label for="website_url_check">Do not fill this field</label>
            <input type="text" id="website_url_check" name="website_url_check" tabindex="-1" autocomplete="off">
        </div>
        
        <div class="form-grid">
            <div class="form-group ' . (!empty($errors['name']) ? 'has-error' : '') . '">
                <label for="rfp-name" class="form-label">Full Name <span class="required" aria-hidden="true">*</span></label>
                <input type="text" id="rfp-name" name="name" class="form-input" placeholder="e.g. Rahul Sharma" value="' . h($data['name'] ?? '') . '" required aria-required="true" ' . (!empty($errors['name']) ? 'aria-invalid="true" aria-describedby="err-name"' : '') . '>
                ' . (!empty($errors['name']) ? '<span class="form-error" id="err-name" role="alert">' . h($errors['name']) . '</span>' : '') . '
            </div>
            
            <div class="form-group ' . (!empty($errors['company']) ? 'has-error' : '') . '">
                <label for="rfp-company" class="form-label">Company / Brand <span class="required" aria-hidden="true">*</span></label>
                <input type="text" id="rfp-company" name="company" class="form-input" placeholder="e.g. Tata Consumer / Reliance" value="' . h($data['company'] ?? '') . '" required aria-required="true" ' . (!empty($errors['company']) ? 'aria-invalid="true" aria-describedby="err-company"' : '') . '>
                ' . (!empty($errors['company']) ? '<span class="form-error" id="err-company" role="alert">' . h($errors['company']) . '</span>' : '') . '
            </div>
            
            <div class="form-group ' . (!empty($errors['email']) ? 'has-error' : '') . '">
                <label for="rfp-email" class="form-label">Corporate Email <span class="required" aria-hidden="true">*</span></label>
                <input type="email" id="rfp-email" name="email" class="form-input" placeholder="name@company.com" value="' . h($data['email'] ?? '') . '" required aria-required="true" ' . (!empty($errors['email']) ? 'aria-invalid="true" aria-describedby="err-email"' : '') . '>
                ' . (!empty($errors['email']) ? '<span class="form-error" id="err-email" role="alert">' . h($errors['email']) . '</span>' : '') . '
            </div>
            
            <div class="form-group ' . (!empty($errors['phone']) ? 'has-error' : '') . '">
                <label for="rfp-phone" class="form-label">Direct Phone / WhatsApp <span class="required" aria-hidden="true">*</span></label>
                <input type="tel" id="rfp-phone" name="phone" class="form-input" placeholder="+91 98765 43210" value="' . h($data['phone'] ?? '') . '" required aria-required="true" ' . (!empty($errors['phone']) ? 'aria-invalid="true" aria-describedby="err-phone"' : '') . '>
                ' . (!empty($errors['phone']) ? '<span class="form-error" id="err-phone" role="alert">' . h($errors['phone']) . '</span>' : '') . '
            </div>
        </div>
        
        <div class="form-group ' . (!empty($errors['requirement']) ? 'has-error' : '') . '">
            <label for="rfp-requirement" class="form-label">Core Requirement <span class="required" aria-hidden="true">*</span></label>
            <select id="rfp-requirement" name="requirement" class="form-select" required aria-required="true" ' . (!empty($errors['requirement']) ? 'aria-invalid="true" aria-describedby="err-req"' : '') . '>
                ' . $options_html . '
            </select>
            ' . (!empty($errors['requirement']) ? '<span class="form-error" id="err-req" role="alert">' . h($errors['requirement']) . '</span>' : '') . '
        </div>
        
        <div class="form-group ' . (!empty($errors['message']) ? 'has-error' : '') . '">
            <label for="rfp-message" class="form-label">Project Scope, Target Cities & Expected Dates <span class="required" aria-hidden="true">*</span></label>
            <textarea id="rfp-message" name="message" class="form-textarea" rows="4" placeholder="Brief us on your event scale, target audience, cities, dates, or specific production needs..." required aria-required="true" ' . (!empty($errors['message']) ? 'aria-invalid="true" aria-describedby="err-msg"' : '') . '>' . h($data['message'] ?? '') . '</textarea>
            ' . (!empty($errors['message']) ? '<span class="form-error" id="err-msg" role="alert">' . h($errors['message']) . '</span>' : '') . '
        </div>
        
        <div class="form-action-bar">
            <button type="submit" class="btn btn--primary btn--large btn--submit" id="rfp-submit-btn">
                <span>Submit RFP / Event Brief</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
            </button>
            <p class="form-privacy-note">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                Strict enterprise privacy. Your brief is reviewed directly by Bharat Jadhav and senior production leads.
            </p>
        </div>
    </form>';
}
