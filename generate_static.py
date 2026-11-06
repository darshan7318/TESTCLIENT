#!/usr/bin/env python3
"""
Static Site Generator for Trendz Eventz
Converts the PHP-based codebase into 100% static HTML for Netlify deployment without PHP.
"""

import os
import re
import json
import html
import urllib.parse

ROOT_DIR = os.path.abspath(os.path.dirname(__file__))

def read_file(rel_path):
    p = os.path.join(ROOT_DIR, rel_path)
    if not os.path.exists(p):
        p_legacy = os.path.join(ROOT_DIR, 'legacy_php', rel_path)
        if os.path.exists(p_legacy):
            p = p_legacy
    with open(p, 'r', encoding='utf-8') as f:
        return f.read()

def write_file(rel_path, content):
    full_path = os.path.join(ROOT_DIR, rel_path)
    os.makedirs(os.path.dirname(full_path), exist_ok=True)
    with open(full_path, 'w', encoding='utf-8') as f:
        f.write(content)
    print(f"Generated: {rel_path} ({len(content)} bytes)")

# 1. Parse PROJECTS from case-study.php
cs_php = read_file('case-study.php')
start_p = cs_php.find('$PROJECTS = [')
end_p = cs_php.find('];\n\n$project =', start_p)
array_code = cs_php[start_p + len('$PROJECTS = ['):end_p]

pattern = r"\n    '([a-z0-9\-]+)'\s*=>\s*\["
keys = list(re.finditer(pattern, array_code))

PROJECTS = {}
for i, m in enumerate(keys):
    slug = m.group(1)
    sub_start = m.end()
    sub_end = keys[i+1].start() if i+1 < len(keys) else len(array_code)
    block = array_code[sub_start:sub_end]
    
    proj = {'slug': slug}
    for k in ['client', 'title', 'category', 'scope_badge', 'location', 'objective', 'scope', 'execution', 'verified_metric', 'hero_image']:
        km = re.search(r"'" + k + r"'\s*=>\s*'(.*?)'", block)
        if km:
            proj[k] = km.group(1)
    
    gm = re.search(r"'gallery'\s*=>\s*\[(.*?)\]", block, re.DOTALL)
    if gm:
        proj['gallery'] = re.findall(r"'(assets/[^']+)'", gm.group(1))
    else:
        proj['gallery'] = []
    PROJECTS[slug] = proj

PROJECT_KEYS = list(PROJECTS.keys())
print(f"Extracted {len(PROJECTS)} projects.")

# 2. Parse CLIENTS from clients.php
clients_php = read_file('clients.php')
start_c = clients_php.find('$CLIENTS = [')
end_c = clients_php.find('];\n\n$CLIENT_COUNT', start_c)
clients_code = clients_php[start_c:end_c]

c_blocks = re.findall(r'\[\s*\'name\'\s*=>\s*\'(.*?)\',\s*\'logo\'\s*=>\s*\'(.*?)\',\s*\'industry\'\s*=>\s*\'(.*?)\',\s*\'highlight\'\s*=>\s*\'(.*?)\'\s*\]', clients_code, re.DOTALL)

CLIENTS = []
for name, logo, industry, highlight in c_blocks:
    CLIENTS.append({
        'name': name,
        'logo': logo,
        'industry': industry,
        'highlight': highlight
    })
print(f"Extracted {len(CLIENTS)} clients.")

# 3. Header Template Processing
header_raw = read_file('includes/header.php')
doctype_idx = header_raw.find('<!DOCTYPE html>')
header_tmpl = header_raw[doctype_idx:]

def render_header(page_id, page_title, page_desc, canonical_url, base_prefix=""):
    h = header_tmpl
    h = h.replace("<?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?>", html.escape(page_title))
    h = h.replace("<?= htmlspecialchars($page_desc, ENT_QUOTES, 'UTF-8') ?>", html.escape(page_desc))
    h = h.replace("<?= htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8') ?>", html.escape(canonical_url))
    
    # Desktop nav
    nav_keys = ['home', 'about', 'services', 'work', 'clients', 'contact']
    for k in nav_keys:
        active_class = " is-active" if k == page_id else ""
        aria_curr = ' aria-current="page"' if k == page_id else ""
        h = h.replace(f'class="tz-nav-link <?= nav_active(\'{k}\', $page) ?>"', f'class="tz-nav-link{active_class}"')
        h = h.replace(f'<?= $page === \'{k}\' ? \'aria-current="page"\' : \'\' ?>', aria_curr.strip())
    
    # Mobile nav
    mobile_pattern = r'<\?php\s*\$mobile_items\s*=.*?<\?php\s*foreach\s*\(\$mobile_items.*?<\?php\s*endforeach;\s*\?>'
    mobile_items = [
        ('home', 'index.html', 'Home'),
        ('about', 'about.html', 'About'),
        ('services', 'services.html', 'Services'),
        ('work', 'work.html', 'Work'),
        ('clients', 'clients.html', 'Clients'),
        ('contact', 'contact.html', 'Contact')
    ]
    mobile_html_parts = []
    for k, url, label in mobile_items:
        full_url = base_prefix + url
        active_class = " is-active" if k == page_id else ""
        aria_curr = ' aria-current="page"' if k == page_id else ""
        mobile_html_parts.append(f'''                        <a
                            href="{full_url}"
                            class="tz-mobile-link{active_class}"{aria_curr}
                        >
                            <span>
                                {label}
                            </span>
                            <i
                                data-lucide="arrow-up-right"
                                class="h-4 w-4"
                            ></i>
                        </a>''')
    mobile_html = "\n\n".join(mobile_html_parts)
    h = re.sub(mobile_pattern, mobile_html, h, flags=re.DOTALL)
    
    # Replace any leftover PHP links
    h = h.replace('href="index.php"', f'href="{base_prefix}index.html"')
    h = h.replace('href="about.php"', f'href="{base_prefix}about.html"')
    h = h.replace('href="services.php"', f'href="{base_prefix}services.html"')
    h = h.replace('href="work.php"', f'href="{base_prefix}work.html"')
    h = h.replace('href="clients.php"', f'href="{base_prefix}clients.html"')
    h = h.replace('href="contact.php"', f'href="{base_prefix}contact.html"')
    
    if base_prefix:
        h = h.replace('href="assets/', f'href="{base_prefix}assets/')
        h = h.replace('src="assets/', f'src="{base_prefix}assets/')
    
    return h

# 4. Footer Template Processing
footer_raw = read_file('includes/footer.php')

def render_footer(base_prefix=""):
    f = footer_raw
    f = f.replace('&copy; <?= date(\'Y\') ?> Trendz Eventz.', '&copy; 2026 Trendz Eventz.')
    f = f.replace('href="index.php"', f'href="{base_prefix}index.html"')
    f = f.replace('href="about.php"', f'href="{base_prefix}about.html"')
    f = f.replace('href="services.php"', f'href="{base_prefix}services.html"')
    f = f.replace('href="work.php"', f'href="{base_prefix}work.html"')
    f = f.replace('href="clients.php"', f'href="{base_prefix}clients.html"')
    f = f.replace('href="contact.php"', f'href="{base_prefix}contact.html"')
    f = f.replace('href="services.php#', f'href="{base_prefix}services.html#')
    
    if base_prefix:
        f = f.replace('src="assets/', f'src="{base_prefix}assets/')
        f = f.replace('href="assets/', f'href="{base_prefix}assets/')
    
    return f

# 5. Build index.html
print("Building index.html...")
index_raw = read_file('index.php')
# Find after header include
h_inc = "include __DIR__ . '/includes/header.php';"
idx_body_start = index_raw.find(h_inc) + len(h_inc)
# Find before footer include
f_inc = "<?php include __DIR__ . '/includes/footer.php'; ?>"
idx_body_end = index_raw.find(f_inc)
index_body = index_raw[idx_body_start:idx_body_end]
if index_body.startswith('\n?>'):
    index_body = index_body[3:]
elif index_body.startswith('?>'):
    index_body = index_body[2:]

# Replace links in index_body
index_body = index_body.replace('services.php', 'services.html')
index_body = index_body.replace('work.php', 'work.html')
index_body = index_body.replace('contact.php', 'contact.html')
index_body = index_body.replace('about.php', 'about.html')
index_body = index_body.replace('clients.php', 'clients.html')
index_body = index_body.replace('case-study.php', 'case-study.html')

index_html = (
    render_header('home',
                  'Trendz Eventz — Experiential Marketing & Corporate Events Agency Mumbai',
                  'Meaningful experiences. Measurable momentum. Trendz Eventz delivers corporate events, pan-India dealer meets, launches, BTL activations, and retail branding.',
                  'https://trendzeventz.com/') +
    index_body +
    render_footer()
)
write_file('index.html', index_html)

# 6. Build about.html
print("Building about.html...")
about_raw = read_file('about.php')
a_body_start = about_raw.find(h_inc) + len(h_inc)
a_body_end = about_raw.find(f_inc)
about_body = about_raw[a_body_start:a_body_end]
if about_body.startswith('\n?>'):
    about_body = about_body[3:]
elif about_body.startswith('?>'):
    about_body = about_body[2:]

about_body = about_body.replace('contact.php', 'contact.html')
about_body = about_body.replace('work.php', 'work.html')
about_body = about_body.replace('services.php', 'services.html')
about_body = about_body.replace('about.php', 'about.html')
about_body = about_body.replace('clients.php', 'clients.html')
about_body = about_body.replace('index.php', 'index.html')

about_html = (
    render_header('about',
                  'About Us | Trendz Eventz — 15+ Years Experiential Agency Mumbai',
                  'Discover Trendz Eventz: Founded by Bharat Jadhav, we combine audacious creative with relentless execution discipline across 500+ corporate productions.',
                  'https://trendzeventz.com/about.html') +
    about_body +
    render_footer()
)
write_file('about.html', about_html)

# 7. Build services.html
print("Building services.html...")
serv_raw = read_file('services.php')
s_body_start = serv_raw.find(h_inc) + len(h_inc)
s_body_end = serv_raw.find(f_inc)
serv_body = serv_raw[s_body_start:s_body_end]
if serv_body.startswith('\n?>'):
    serv_body = serv_body[3:]
elif serv_body.startswith('?>'):
    serv_body = serv_body[2:]

serv_body = serv_body.replace('case-study.php', 'case-study.html')
serv_body = serv_body.replace('contact.php', 'contact.html')
serv_body = serv_body.replace('work.php', 'work.html')
serv_body = serv_body.replace('index.php', 'index.html')
serv_body = serv_body.replace('services.php', 'services.html')

serv_html = (
    render_header('services',
                  'Services & Capabilities | Trendz Eventz — Corporate, BTL & Retail Branding',
                  'Explore Trendz Eventz capabilities: Corporate Events, BTL & Experiential, Retail Branding, Digital Marketing, Field Force Outreach, and Outdoor Branding.',
                  'https://trendzeventz.com/services.html') +
    serv_body +
    render_footer()
)
write_file('services.html', serv_html)

# 8. Build work.html
print("Building work.html...")
work_raw = read_file('work.php')
w_body_start = work_raw.find(h_inc) + len(h_inc)
w_body_end = work_raw.find(f_inc)
work_body = work_raw[w_body_start:w_body_end]
if work_body.startswith('\n?>'):
    work_body = work_body[3:]
elif work_body.startswith('?>'):
    work_body = work_body[2:]

work_body = work_body.replace('case-study.php', 'case-study.html')
work_body = work_body.replace('contact.php', 'contact.html')
work_body = work_body.replace('index.php', 'index.html')
work_body = work_body.replace('services.php', 'services.html')
work_body = work_body.replace('about.php', 'about.html')
work_body = work_body.replace('clients.php', 'clients.html')

work_html = (
    render_header('work',
                  'Our Work & Case Studies | Trendz Eventz — 500+ National Productions',
                  'Explore verified case studies: Samsung 100-store launch, Philips 500-dealer meet, TVS Tyres 10-city tour, Lipton modern trade, and Cadbury mall activations.',
                  'https://trendzeventz.com/work.html') +
    work_body +
    render_footer()
)
write_file('work.html', work_html)

# 9. Build clients.html
print("Building clients.html...")
cl_raw = read_file('clients.php')
cl_body_start = cl_raw.find(h_inc) + len(h_inc)
cl_body_end = cl_raw.find(f_inc)
cl_body = cl_raw[cl_body_start:cl_body_end]

# In cl_body, find the style tag start
style_idx = cl_body.find('<style>')
cl_body = cl_body[style_idx:]

# Render network nodes (first 6)
network_clients = CLIENTS[:6]
network_nodes_html = []
for idx, c in enumerate(network_clients):
    network_nodes_html.append(f'''                <div
                    class="tz-network-node tz-network-node-{idx + 1}"
                >
                    <img
                        src="{c['logo']}"
                        alt="{html.escape(c['name'])}"
                    >
                </div>''')
network_nodes_str = "\n\n".join(network_nodes_html)

# Replace network loop in cl_body
net_loop_pat = r'<\?php\s*\$networkClients\s*=.*?<\?php\s*foreach\s*\(\$networkClients.*?<\?php\s*endforeach;\s*\?>'
cl_body = re.sub(net_loop_pat, network_nodes_str, cl_body, flags=re.DOTALL)

# Render client cards (all 13)
client_cards_html = []
for idx, c in enumerate(CLIENTS):
    num_str = f"{idx + 1:02d}"
    client_cards_html.append(f'''                <article
                    class="tz-client-card tz-client-reveal"
                >
                    <span
                        class="tz-client-card-number"
                        aria-hidden="true"
                    >
                        {num_str}
                    </span>

                    <div class="tz-client-logo-wrap">
                        <img
                            src="{c['logo']}"
                            alt="{html.escape(c['name'])}"
                            class="tz-client-logo"
                            loading="lazy"
                        >
                    </div>

                    <span class="tz-client-industry">
                        {html.escape(c['industry'])}
                    </span>

                    <h3 class="tz-client-name">
                        {html.escape(c['name'])}
                    </h3>

                    <p class="tz-client-highlight">
                        {html.escape(c['highlight'])}
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
                </article>''')
client_cards_str = "\n\n".join(client_cards_html)

# Replace client grid loop
grid_loop_pat = r'<\?php\s*foreach\s*\(\$CLIENTS.*?<\?php\s*endforeach;\s*\?>'
cl_body = re.sub(grid_loop_pat, client_cards_str, cl_body, flags=re.DOTALL)

cl_body = cl_body.replace('contact.php', 'contact.html')
cl_body = cl_body.replace('index.php', 'index.html')
cl_body = cl_body.replace('work.php', 'work.html')
cl_body = cl_body.replace('services.php', 'services.html')

clients_html = (
    render_header('clients',
                  'Client Partners & Ecosystem | Trendz Eventz — Trusted by India\'s Leading Brands',
                  'Brands that trust Trendz Eventz: Philips, TVS Tyres, Samsung, Cadbury, Lipton, Maruti Driving School, Bombay Dyeing, Vitra, Yamaha, and more.',
                  'https://trendzeventz.com/clients.html') +
    cl_body +
    render_footer()
)
write_file('clients.html', clients_html)

# 10. Build contact.html with Netlify Forms integration
print("Building contact.html...")
contact_raw = read_file('contact.php')
c_body_start = contact_raw.find('<style>')
c_body_end = contact_raw.find(f_inc)
contact_body = contact_raw[c_body_start:c_body_end]

# Replace form and success logic
form_replacement = '''
                    <div class="tz-rfp-panel">

                        <!-- SUCCESS STATE (Shown on ?submitted=true or async completion) -->
                        <div id="tz-rfp-success" class="tz-success" style="display: none;">
                            <div class="tz-success-inner">
                                <div class="tz-success-icon">
                                    <i data-lucide="check" class="w-9 h-9"></i>
                                </div>
                                <span class="tz-success-kicker">Brief Received</span>
                                <h2 class="tz-success-title">Your Event Brief Has Been Logged.</h2>
                                <p class="tz-success-copy">
                                    Thank you for contacting Trendz Eventz. Your brief has been transmitted directly
                                    to Bharat Jadhav (Founder & Managing Director) and our senior production leads. We will
                                    review your parameters and respond within 24 business hours.
                                </p>
                                <a href="index.html" class="tz-success-action">
                                    Return to Homepage
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>

                        <!-- RFP FORM CONTAINER -->
                        <div id="tz-rfp-form-wrap">
                            <div class="tz-rfp-header">
                                <span class="tz-rfp-kicker">Request for Proposal</span>
                                <h2 class="tz-rfp-title">Submit Your Event Parameters.</h2>
                                <p class="tz-rfp-description">
                                    Tell us what you are building. Give us the scale, scope, locations and timelines.
                                    We will take it from there.
                                </p>
                            </div>

                            <div id="tz-form-error" class="tz-error" role="alert" style="display: none;">
                                <i data-lucide="triangle-alert" class="w-5 h-5 flex-shrink-0"></i>
                                <span id="tz-form-error-msg">Please fill out all required fields marked with an asterisk (*).</span>
                            </div>

                            <form
                                action="/contact.html?submitted=true"
                                method="POST"
                                name="contact"
                                id="rfp-form"
                                data-netlify="true"
                                netlify-honeypot="bot-field"
                                class="tz-form"
                                novalidate
                            >
                                <input type="hidden" name="form-name" value="contact">

                                <!-- Netlify Bot Honeypot -->
                                <div style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;" aria-hidden="true">
                                    <label for="bot-field">Do not fill this field</label>
                                    <input type="text" id="bot-field" name="bot-field" tabindex="-1" autocomplete="off">
                                </div>

                                <div class="tz-form-grid">
                                    <!-- Name -->
                                    <div class="tz-field">
                                        <label for="rfp-name" class="tz-label">
                                            Full Name <span class="tz-required">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            id="rfp-name"
                                            name="name"
                                            placeholder="e.g. Rahul Sharma"
                                            required
                                            class="tz-input"
                                            autocomplete="name"
                                        >
                                    </div>

                                    <!-- Company -->
                                    <div class="tz-field">
                                        <label for="rfp-company" class="tz-label">
                                            Organization / Brand <span class="tz-required">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            id="rfp-company"
                                            name="company"
                                            placeholder="e.g. Samsung India"
                                            required
                                            class="tz-input"
                                            autocomplete="organization"
                                        >
                                    </div>

                                    <!-- Email -->
                                    <div class="tz-field">
                                        <label for="rfp-email" class="tz-label">
                                            Corporate Email <span class="tz-required">*</span>
                                        </label>
                                        <input
                                            type="email"
                                            id="rfp-email"
                                            name="email"
                                            placeholder="rahul@company.com"
                                            required
                                            class="tz-input"
                                            autocomplete="email"
                                        >
                                    </div>

                                    <!-- Phone -->
                                    <div class="tz-field">
                                        <label for="rfp-phone" class="tz-label">
                                            Direct Phone / WhatsApp <span class="tz-required">*</span>
                                        </label>
                                        <input
                                            type="tel"
                                            id="rfp-phone"
                                            name="phone"
                                            placeholder="+91 98765 43210"
                                            required
                                            class="tz-input"
                                            autocomplete="tel"
                                        >
                                    </div>

                                    <!-- Requirement -->
                                    <div class="tz-field full">
                                        <label for="rfp-requirement" class="tz-label">
                                            Primary Requirement <span class="tz-required">*</span>
                                        </label>
                                        <select
                                            id="rfp-requirement"
                                            name="requirement"
                                            required
                                            class="tz-select"
                                        >
                                            <option value="">Select Requirement</option>
                                            <option value="Corporate Events">Corporate Events (Dealer Meets, Conventions, Conferences)</option>
                                            <option value="BTL & Experiential">BTL & Experiential (Mall Activations, Roadshows, Sampling)</option>
                                            <option value="Retail Branding">Retail Branding & Pan-India Rollouts</option>
                                            <option value="Digital Marketing">Digital & Social-First Campaign Amplification</option>
                                            <option value="Field Force">Field Force Deployment & Candidate Outreach</option>
                                            <option value="Outdoor Branding">Broadcast, Print & Highway Outdoor Branding</option>
                                        </select>
                                    </div>

                                    <!-- Message -->
                                    <div class="tz-field full">
                                        <label for="rfp-message" class="tz-label">
                                            Event Parameters & Scope <span class="tz-required">*</span>
                                        </label>
                                        <textarea
                                            id="rfp-message"
                                            name="message"
                                            rows="4"
                                            placeholder="Please describe expected dates, target cities, estimated delegates or footfall, and strategic deliverables..."
                                            required
                                            class="tz-textarea"
                                        ></textarea>
                                    </div>
                                </div>

                                <div class="tz-form-footer">
                                    <button type="submit" id="rfp-submit-btn" class="tz-submit-btn">
                                        <span class="tz-submit-btn-bg"></span>
                                        <span class="tz-submit-btn-content">
                                            <span>Transmit Event Brief</span>
                                            <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                                        </span>
                                    </button>
                                    <p class="tz-form-note">
                                        Your brief is reviewed by the executive production team. Required fields are marked with an asterisk.
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
'''

# Find the rfp panel block in contact_body
panel_start = contact_body.find('<div class="tz-rfp-panel">')
panel_end = contact_body.find('<!-- =====================================================\n         CLOSING CTA', panel_start)
# panel_end is right before closing CTA
contact_body = contact_body[:panel_start] + form_replacement + contact_body[panel_end:]

# Client script for Netlify forms prefill & AJAX
contact_script = '''
<script>
document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const formWrap = document.getElementById("tz-rfp-form-wrap");
    const successWrap = document.getElementById("tz-rfp-success");
    const form = document.getElementById("rfp-form");
    const errorBox = document.getElementById("tz-form-error");
    const errorMsg = document.getElementById("tz-form-error-msg");

    // 1. Show success state if redirected from Netlify Forms
    if (urlParams.get("submitted") === "true") {
        if (formWrap) formWrap.style.display = "none";
        if (successWrap) {
            successWrap.style.display = "block";
            if (window.lucide) lucide.createIcons();
        }
    }

    // 2. Auto-prefill requirement select
    const reqQuery = urlParams.get("service") || urlParams.get("requirement");
    if (reqQuery) {
        const select = document.getElementById("rfp-requirement");
        if (select) {
            const cleanQuery = reqQuery.toLowerCase();
            for (let i = 0; i < select.options.length; i++) {
                const optVal = select.options[i].value.toLowerCase();
                if (optVal && (optVal.includes(cleanQuery) || cleanQuery.includes(optVal))) {
                    select.selectedIndex = i;
                    break;
                }
            }
        }
    }

    // 3. AJAX Netlify Submission
    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            if (errorBox) errorBox.style.display = "none";

            const name = (document.getElementById("rfp-name")?.value || "").trim();
            const company = (document.getElementById("rfp-company")?.value || "").trim();
            const email = (document.getElementById("rfp-email")?.value || "").trim();
            const phone = (document.getElementById("rfp-phone")?.value || "").trim();
            const req = (document.getElementById("rfp-requirement")?.value || "").trim();
            const msg = (document.getElementById("rfp-message")?.value || "").trim();

            const emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

            if (!name || !company || !emailValid || !phone || !req || !msg) {
                if (errorBox) {
                    errorMsg.textContent = (!emailValid && email) ? "Please enter a valid corporate email address." : "Please fill out all required fields marked with an asterisk (*).";
                    errorBox.style.display = "flex";
                    if (window.lucide) lucide.createIcons();
                }
                return;
            }

            const submitBtn = document.getElementById("rfp-submit-btn");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.style.opacity = "0.7";
                const spanContent = submitBtn.querySelector(".tz-submit-btn-content span");
                if (spanContent) spanContent.textContent = "Transmitting Brief...";
            }

            const formData = new FormData(form);
            fetch("/", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: new URLSearchParams(formData).toString()
            })
            .then(res => {
                if (res.ok) {
                    if (formWrap) formWrap.style.display = "none";
                    if (successWrap) {
                        successWrap.style.display = "block";
                        successWrap.scrollIntoView({ behavior: "smooth", block: "center" });
                        if (window.lucide) lucide.createIcons();
                    }
                } else {
                    form.submit();
                }
            })
            .catch(() => {
                form.submit();
            });
        });
    }
});
</script>
'''

contact_body = contact_body.replace('contact.php', 'contact.html')
contact_body = contact_body.replace('index.php', 'index.html')
contact_body = contact_body.replace('services.php', 'services.html')

contact_html = (
    render_header('contact',
                  'Request a Proposal | Trendz Eventz — Contact Mumbai Experiential Agency',
                  'Initiate your event or activation brief with Trendz Eventz. Connect directly with Bharat Jadhav and our executive production leadership in Mumbai.',
                  'https://trendzeventz.com/contact.html') +
    contact_body +
    contact_script +
    render_footer()
)
write_file('contact.html', contact_html)

# 11. Build case-study.html and static case-studies/*.html
print("Building case study pages...")

# Extract the case study template body from case-study.php
cs_full = read_file('case-study.php')
cs_body_start = cs_full.find('<style>')
cs_body_end = cs_full.find(f_inc)
cs_body_tmpl = cs_full[cs_body_start:cs_body_end]

def render_case_study_html(slug, is_standalone=False, base_prefix=""):
    project = PROJECTS.get(slug, PROJECTS['samsung-store-launch'])
    curr_idx = PROJECT_KEYS.index(slug) if slug in PROJECT_KEYS else 0
    prev_idx = (curr_idx - 1 + len(PROJECT_KEYS)) % len(PROJECT_KEYS)
    next_idx = (curr_idx + 1) % len(PROJECT_KEYS)
    prev_key = PROJECT_KEYS[prev_idx]
    next_key = PROJECT_KEYS[next_idx]
    prev_proj = PROJECTS[prev_key]
    next_proj = PROJECTS[next_key]

    body = cs_body_tmpl

    # Text replacements
    body = body.replace('<?= $escape($project[\'client\']) ?>', html.escape(project['client']))
    body = body.replace('<?= $escape($project[\'title\']) ?>', html.escape(project['title']))
    body = body.replace('<?= $escape($project[\'scope_badge\']) ?>', html.escape(project['scope_badge']))
    body = body.replace('<?= $escape($project[\'category\']) ?>', html.escape(project['category']))
    body = body.replace('<?= $escape($project[\'location\']) ?>', html.escape(project['location']))
    body = body.replace('<?= $escape($project[\'verified_metric\']) ?>', html.escape(project['verified_metric']))
    body = body.replace('<?= $escape($project[\'objective\']) ?>', html.escape(project['objective']))
    body = body.replace('<?= $escape($project[\'scope\']) ?>', html.escape(project['scope']))
    body = body.replace('<?= $escape($project[\'execution\']) ?>', html.escape(project['execution']))
    
    # Hero image
    hero_src = base_prefix + project['hero_image']
    body = body.replace('src="<?= $escape($project[\'hero_image\']) ?>"', f'src="{hero_src}"')
    body = body.replace('alt="<?= $escape($project[\'client\'] . \' — \' . $project[\'title\']) ?>"', f'alt="{html.escape(project["client"])} — {html.escape(project["title"])}"')
    body = body.replace('alt="<?= $escape($project[\'client\'] . \' \' . $project[\'title\']) ?>"', f'alt="{html.escape(project["client"])} {html.escape(project["title"])}"')

    # Gallery
    gallery_html_parts = []
    for g_idx, photo in enumerate(project['gallery']):
        num_str = f"{g_idx + 1:02d}"
        photo_src = base_prefix + photo
        gallery_html_parts.append(f'''                    <figure
                        class="cs-gallery-item cs-reveal"
                    >
                        <img
                            src="{photo_src}"
                            alt="{html.escape(project['client'])} {html.escape(project['title'])} — project image {g_idx + 1}"
                            loading="lazy"
                        >
                        <div
                            class="cs-gallery-shade"
                            aria-hidden="true"
                        ></div>
                        <span
                            class="cs-gallery-index"
                            aria-hidden="true"
                        >
                            {num_str}
                        </span>
                    </figure>''')
    
    gallery_html = "\n\n".join(gallery_html_parts)
    # Replace gallery loop
    gallery_pattern = r'<\?php\s*if\s*\(!empty\(\$project\[\'gallery\'\]\)\):\s*\?>.*?<\?php\s*foreach.*?<\?php\s*endforeach;\s*\?>\s*</div>\s*</section>\s*<\?php\s*endif;\s*\?>'
    
    if project['gallery']:
        full_gallery_section = f'''        <section
            class="cs-gallery"
            id="gallery"
        >
            <div class="cs-gallery-header cs-reveal">
                <div>
                    <span class="cs-section-kicker">
                        Visual Documentation
                    </span>
                    <h2 class="cs-gallery-title">
                        The work, on ground.
                    </h2>
                </div>
                <p class="cs-gallery-subtitle">
                    Selected project imagery from the supplied
                    case-study documentation.
                </p>
            </div>
            <div class="cs-gallery-grid">
{gallery_html}
            </div>
        </section>'''
    else:
        full_gallery_section = ""
    
    body = re.sub(gallery_pattern, full_gallery_section, body, flags=re.DOTALL)

    # Next / Prev Links
    if is_standalone:
        prev_url = f"{prev_key}.html"
        next_url = f"{next_key}.html"
    else:
        prev_url = f"{base_prefix}case-study.html?slug={prev_key}"
        next_url = f"{base_prefix}case-study.html?slug={next_key}"

    body = body.replace('href="case-study.php?slug=<?= urlencode($previousKey) ?>"', f'href="{prev_url}"')
    body = body.replace('href="case-study.php?slug=<?= urlencode($nextKey) ?>"', f'href="{next_url}"')

    prev_hero = base_prefix + prev_proj['hero_image']
    next_hero = base_prefix + next_proj['hero_image']
    body = body.replace('src="<?= $escape($previousProject[\'hero_image\']) ?>"', f'src="{prev_hero}"')
    body = body.replace('src="<?= $escape($nextProject[\'hero_image\']) ?>"', f'src="{next_hero}"')
    body = body.replace('<?= $escape($previousProject[\'client\']) ?>', html.escape(prev_proj['client']))
    body = body.replace('<?= $escape($previousProject[\'title\']) ?>', html.escape(prev_proj['title']))
    body = body.replace('<?= $escape($nextProject[\'client\']) ?>', html.escape(next_proj['client']))
    body = body.replace('<?= $escape($nextProject[\'title\']) ?>', html.escape(next_proj['title']))

    # CTA Link
    cat_enc = urllib.parse.quote(project['category'])
    body = body.replace('href="contact.php?requirement=<?= urlencode($project[\'category\']) ?>"', f'href="{base_prefix}contact.html?requirement={cat_enc}"')

    # Convert general links
    body = body.replace('index.php', f'{base_prefix}index.html')
    body = body.replace('work.php', f'{base_prefix}work.html')
    body = body.replace('contact.php', f'{base_prefix}contact.html')

    page_title = f"{project['client']} {project['title']} | Case Study | Trendz Eventz"
    page_desc = f"Case study: {project['objective']} Delivered across {project['location']} by Trendz Eventz."
    canonical_url = f"https://trendzeventz.com/case-study.html?slug={slug}" if not is_standalone else f"https://trendzeventz.com/case-studies/{slug}.html"

    # Add client-side dynamic switcher script to case-study.html so ?slug= works everywhere
    dynamic_script = ""
    if not is_standalone:
        projects_json = json.dumps(PROJECTS)
        dynamic_script = """
<script>
window.__TRENDZ_PROJECTS = """ + projects_json + """;

document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);
    const slug = params.get("slug");
    if (!slug || !window.__TRENDZ_PROJECTS[slug] || slug === "samsung-store-launch") {
        return;
    }

    const p = window.__TRENDZ_PROJECTS[slug];
    const keys = Object.keys(window.__TRENDZ_PROJECTS);
    const curIdx = keys.indexOf(slug);
    const prevKey = keys[(curIdx - 1 + keys.length) % keys.length];
    const nextKey = keys[(curIdx + 1) % keys.length];
    const prevP = window.__TRENDZ_PROJECTS[prevKey];
    const nextP = window.__TRENDZ_PROJECTS[nextKey];

    // Document metadata
    document.title = p.client + " " + p.title + " | Case Study | Trendz Eventz";

    // Text elements
    const breadcrumbCurrent = document.querySelector(".cs-breadcrumb-current");
    if (breadcrumbCurrent) breadcrumbCurrent.textContent = p.client;

    const kickerClient = document.querySelector(".cs-client");
    if (kickerClient) kickerClient.textContent = p.client;

    const titleEl = document.querySelector(".cs-title");
    if (titleEl) {
        titleEl.innerHTML = p.title + ' <span>' + p.scope_badge + '</span>';
    }

    const objEl = document.querySelector(".cs-objective");
    if (objEl) objEl.textContent = p.objective;

    // Meta items
    const metaItems = document.querySelectorAll(".cs-meta-item");
    if (metaItems.length >= 3) {
        metaItems[0].innerHTML = '<i data-lucide="layers-3"></i> ' + p.category;
        metaItems[1].innerHTML = '<i data-lucide="map-pin"></i> ' + p.location;
        metaItems[2].innerHTML = '<i data-lucide="badge-check"></i> ' + p.verified_metric;
    }

    // Hero visual
    const heroImg = document.querySelector(".cs-hero-image img");
    if (heroImg) {
        heroImg.src = p.hero_image;
        heroImg.alt = p.client + " — " + p.title;
    }
    const heroCaption = document.querySelector(".cs-hero-caption strong");
    if (heroCaption) heroCaption.textContent = p.client + " · " + p.scope_badge;

    const orbitLabel1 = document.querySelector(".cs-orbit-label-1");
    if (orbitLabel1) orbitLabel1.textContent = p.category;

    // Overview section
    const overviewCopy = document.querySelector(".cs-overview .cs-section-copy");
    if (overviewCopy) overviewCopy.textContent = p.objective;

    const factValues = document.querySelectorAll(".cs-fact-value");
    if (factValues.length >= 4) {
        factValues[0].textContent = p.client;
        factValues[1].textContent = p.category;
        factValues[2].textContent = p.location;
        factValues[3].textContent = p.verified_metric;
    }

    // Showcase
    const showcaseImg = document.querySelector(".cs-showcase-frame img");
    if (showcaseImg) {
        showcaseImg.src = p.hero_image;
        showcaseImg.alt = p.client + " " + p.title;
    }
    const showcaseKicker = document.querySelector(".cs-showcase-kicker");
    if (showcaseKicker) showcaseKicker.textContent = "Case Study / " + p.category;
    const showcaseTitle = document.querySelector(".cs-showcase-title");
    if (showcaseTitle) showcaseTitle.textContent = p.client + ". " + p.title;
    const showcaseBadge = document.querySelector(".cs-showcase-badge strong");
    if (showcaseBadge) showcaseBadge.textContent = p.verified_metric;

    // Execution Story
    const storyCopies = document.querySelectorAll(".cs-story-copy");
    if (storyCopies.length >= 3) {
        storyCopies[0].textContent = p.objective;
        storyCopies[1].textContent = p.scope;
        storyCopies[2].textContent = p.execution;
    }

    // Proof Section
    const proofStats = document.querySelectorAll(".cs-proof-stat-value");
    if (proofStats.length >= 4) {
        proofStats[0].textContent = p.client;
        proofStats[1].textContent = p.category;
        proofStats[2].textContent = p.location;
        proofStats[3].textContent = p.verified_metric;
    }

    // Gallery Section
    const galleryGrid = document.querySelector(".cs-gallery-grid");
    if (galleryGrid && p.gallery) {
        galleryGrid.innerHTML = p.gallery.map(function(img, i) {
            const num = String(i + 1).padStart(2, '0');
            return '<figure class="cs-gallery-item cs-reveal">' +
                '<img src="' + img + '" alt="' + p.client + ' ' + p.title + ' — project image ' + (i + 1) + '" loading="lazy">' +
                '<div class="cs-gallery-shade" aria-hidden="true"></div>' +
                '<span class="cs-gallery-index" aria-hidden="true">' + num + '</span>' +
            '</figure>';
        }).join("");
    }

    // CTA
    const ctaPlanBtn = document.querySelector(".cs-cta-actions .cs-btn-primary");
    if (ctaPlanBtn) {
        ctaPlanBtn.href = "contact.html?requirement=" + encodeURIComponent(p.category);
    }

    // Next / Prev navigation
    const prevNav = document.querySelector(".cs-next-grid .cs-project-nav:first-child");
    if (prevNav) {
        prevNav.href = "case-study.html?slug=" + prevKey;
        const pImg = prevNav.querySelector("img");
        if (pImg) pImg.src = prevP.hero_image;
        const pClient = prevNav.querySelector(".cs-project-client");
        if (pClient) pClient.textContent = prevP.client;
        const pTitle = prevNav.querySelector(".cs-project-title");
        if (pTitle) pTitle.textContent = prevP.title;
    }

    const nextNav = document.querySelector(".cs-next-grid .cs-project-nav:last-child");
    if (nextNav) {
        nextNav.href = "case-study.html?slug=" + nextKey;
        const nImg = nextNav.querySelector("img");
        if (nImg) nImg.src = nextP.hero_image;
        const nClient = nextNav.querySelector(".cs-project-client");
        if (nClient) nClient.textContent = nextP.client;
        const nTitle = nextNav.querySelector(".cs-project-title");
        if (nTitle) nTitle.textContent = nextP.title;
    }

    if (window.lucide) {
        lucide.createIcons();
    }
});
</script>
"""

    return (
        render_header('case-study', page_title, page_desc, canonical_url, base_prefix) +
        body +
        dynamic_script +
        render_footer(base_prefix)
    )

# Write main case-study.html
cs_default_html = render_case_study_html('samsung-store-launch', is_standalone=False)
write_file('case-study.html', cs_default_html)

# Also write individual static files in case-studies/ for search crawlers & clean static navigation
for slug in PROJECT_KEYS:
    static_cs_html = render_case_study_html(slug, is_standalone=True, base_prefix="../")
    write_file(f'case-studies/{slug}.html', static_cs_html)

# 12. Update sitemap.xml
print("Updating sitemap.xml...")
sitemap_urls = [
    ('https://trendzeventz.com/', '1.0', 'weekly'),
    ('https://trendzeventz.com/about.html', '0.8', 'monthly'),
    ('https://trendzeventz.com/services.html', '0.9', 'monthly'),
    ('https://trendzeventz.com/work.html', '0.9', 'weekly'),
    ('https://trendzeventz.com/clients.html', '0.8', 'monthly'),
    ('https://trendzeventz.com/contact.html', '0.8', 'monthly'),
    ('https://trendzeventz.com/case-study.html', '0.8', 'weekly'),
]

for slug in PROJECT_KEYS:
    sitemap_urls.append((f'https://trendzeventz.com/case-studies/{slug}.html', '0.7', 'monthly'))
    sitemap_urls.append((f'https://trendzeventz.com/case-study.html?slug={slug}', '0.7', 'monthly'))

sitemap_xml = ['<?xml version="1.0" encoding="UTF-8"?>', '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">']
for loc, prio, freq in sitemap_urls:
    sitemap_xml.append(f'''    <url>
        <loc>{loc}</loc>
        <lastmod>2026-11-06</lastmod>
        <changefreq>{freq}</changefreq>
        <priority>{prio}</priority>
    </url>''')
sitemap_xml.append('</urlset>\n')
write_file('sitemap.xml', '\n'.join(sitemap_xml))

# 13. Create netlify.toml
print("Creating netlify.toml...")
netlify_toml = '''# Netlify Configuration for Trendz Eventz
# Zero-PHP Static Deployment with Native Netlify Forms & CDN Security Headers

[build]
  publish = "."

# Backward-compatibility redirects from PHP routes to Static HTML
[[redirects]]
  from = "/case-study.php"
  query = {slug = ":slug"}
  to = "/case-study.html?slug=:slug"
  status = 301

[[redirects]]
  from = "/case-study.php"
  to = "/case-study.html"
  status = 301

[[redirects]]
  from = "/index.php"
  to = "/"
  status = 301

[[redirects]]
  from = "/about.php"
  to = "/about.html"
  status = 301

[[redirects]]
  from = "/services.php"
  to = "/services.html"
  status = 301

[[redirects]]
  from = "/work.php"
  to = "/work.html"
  status = 301

[[redirects]]
  from = "/clients.php"
  to = "/clients.html"
  status = 301

[[redirects]]
  from = "/contact.php"
  to = "/contact.html"
  status = 301

[[redirects]]
  from = "/:page.php"
  to = "/:page.html"
  status = 301

# Production Security Headers
[[headers]]
  for = "/*"
  [headers.values]
    X-Content-Type-Options = "nosniff"
    X-Frame-Options = "SAMEORIGIN"
    Referrer-Policy = "strict-origin-when-cross-origin"
    X-XSS-Protection = "1; mode=block"
    Permissions-Policy = "camera=(), microphone=(), geolocation=()"

# Cache static assets
[[headers]]
  for = "/assets/*"
  [headers.values]
    Cache-Control = "public, max-age=31536000, immutable"
'''
write_file('netlify.toml', netlify_toml)

# 14. Create _redirects and _headers
_redirects = '''# Trendz Eventz — Netlify URL Routing & Legacy PHP Redirects
/case-study.php  slug=:slug  /case-study.html?slug=:slug  301
/case-study.php  /case-study.html  301
/index.php       /                 301
/about.php       /about.html       301
/services.php    /services.html    301
/work.php        /work.html        301
/clients.php     /clients.html     301
/contact.php     /contact.html     301
/*.php           /:splat.html      301
'''
write_file('_redirects', _redirects)

_headers = '''/*
  X-Content-Type-Options: nosniff
  X-Frame-Options: SAMEORIGIN
  Referrer-Policy: strict-origin-when-cross-origin
  X-XSS-Protection: 1; mode=block
  Permissions-Policy: camera=(), microphone=(), geolocation=()

/assets/*
  Cache-Control: public, max-age=31536000, immutable
'''
write_file('_headers', _headers)

print("All static files, sitemap, and Netlify configurations generated successfully!")
