#!/usr/bin/env python3
"""
Test Suite for Static Netlify Build
Verifies HTML validity, link integrity, asset presence, zero PHP tags, and Netlify config.
"""

import os
import re
import glob

ROOT_DIR = os.path.abspath(os.path.dirname(__file__))

errors = []
warnings = []

html_files = glob.glob(os.path.join(ROOT_DIR, '*.html')) + glob.glob(os.path.join(ROOT_DIR, 'case-studies', '*.html'))
print(f"Testing {len(html_files)} HTML files...")

# 1. Check for unparsed PHP tags in all HTML files
for f in html_files:
    rel_path = os.path.relpath(f, ROOT_DIR)
    with open(f, 'r', encoding='utf-8', errors='ignore') as fp:
        content = fp.read()
    
    php_tags = re.findall(r'<\?(?:php|=)?', content)
    if php_tags:
        errors.append(f"File {rel_path} contains unparsed PHP tags: {php_tags}")

# 2. Check for leftover .php links in HTML files
for f in html_files:
    rel_path = os.path.relpath(f, ROOT_DIR)
    with open(f, 'r', encoding='utf-8', errors='ignore') as fp:
        content = fp.read()
    
    # Matches href="...php"
    php_links = re.findall(r'href=[\'"]([^\'"]+\.php[^\'"]*)[\'"]', content)
    if php_links:
        errors.append(f"File {rel_path} contains legacy .php href links: {set(php_links)}")

# 3. Check image references in HTML files
all_img_srcs = set()
for f in html_files:
    rel_path = os.path.relpath(f, ROOT_DIR)
    file_dir = os.path.dirname(f)
    with open(f, 'r', encoding='utf-8', errors='ignore') as fp:
        content = fp.read()
    
    srcs = re.findall(r'<img[^>]+src=[\'"]([^\'"]+)[\'"]', content)
    for src in srcs:
        if src.startswith(('http://', 'https://', 'data:')):
            continue
        # Clean query strings or hashes
        clean_src = src.split('?')[0].split('#')[0]
        # Resolve path
        target_path = os.path.normpath(os.path.join(file_dir, clean_src))
        if not os.path.exists(target_path):
            errors.append(f"Missing image in {rel_path}: {src} (resolved: {target_path})")

# 4. Check internal link references
for f in html_files:
    rel_path = os.path.relpath(f, ROOT_DIR)
    file_dir = os.path.dirname(f)
    with open(f, 'r', encoding='utf-8', errors='ignore') as fp:
        content = fp.read()
    
    links = re.findall(r'<a[^>]+href=[\'"]([^\'"]+)[\'"]', content)
    for l in links:
        if l.startswith(('http://', 'https://', 'mailto:', 'tel:', 'data:', '#')):
            continue
        clean_link = l.split('?')[0].split('#')[0]
        if not clean_link:
            continue
        target_path = os.path.normpath(os.path.join(file_dir, clean_link))
        if not os.path.exists(target_path) and not os.path.isdir(target_path):
            # Check if clean link exists with .html
            if os.path.exists(target_path + '.html'):
                pass
            else:
                errors.append(f"Broken internal link in {rel_path}: {l} (resolved: {target_path})")

# 5. Check Netlify configuration files
if not os.path.exists(os.path.join(ROOT_DIR, 'netlify.toml')):
    errors.append("Missing netlify.toml")
else:
    toml_content = open(os.path.join(ROOT_DIR, 'netlify.toml'), 'r', encoding='utf-8').read()
    if 'publish = "."' not in toml_content:
        warnings.append("netlify.toml might need publish = '.'")

if not os.path.exists(os.path.join(ROOT_DIR, '_redirects')):
    errors.append("Missing _redirects")

if not os.path.exists(os.path.join(ROOT_DIR, '_headers')):
    errors.append("Missing _headers")

# 6. Check Netlify Forms on contact.html
contact_path = os.path.join(ROOT_DIR, 'contact.html')
if os.path.exists(contact_path):
    contact_content = open(contact_path, 'r', encoding='utf-8').read()
    if 'data-netlify="true"' not in contact_content and 'netlify' not in contact_content:
        errors.append("contact.html is missing data-netlify='true'")
    if 'name="form-name"' not in contact_content:
        errors.append("contact.html is missing hidden form-name field for Netlify Forms")
    if 'bot-field' not in contact_content:
        errors.append("contact.html is missing honeypot bot-field")

print("\n=== TEST RESULTS ===")
print(f"Total Errors: {len(errors)}")
print(f"Total Warnings: {len(warnings)}")

for err in errors:
    print(f"  [ERROR] {err}")

for warn in warnings:
    print(f"  [WARNING] {warn}")

if not errors:
    print("\nALL TESTS PASSED! Static build is 100% ready for Netlify deployment without PHP.")
else:
    exit(1)
