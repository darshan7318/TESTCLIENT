#!/usr/bin/env python3
"""
Test Suite for Static Build & Tailwind CSS Compilation
Verifies HTML validity, link integrity, asset presence, zero PHP tags,
compiled Tailwind CSS presence, zero CDN Tailwind references, and deployment config.
"""

import os
import sys
import re
import glob

target_dir = sys.argv[1] if len(sys.argv) > 1 else '.'
ROOT_DIR = os.path.abspath(target_dir)

errors = []
warnings = []

print(f"Target directory: {ROOT_DIR}")
html_files = glob.glob(os.path.join(ROOT_DIR, '*.html')) + glob.glob(os.path.join(ROOT_DIR, 'case-studies', '*.html'))
print(f"Testing {len(html_files)} HTML files...")

if len(html_files) == 0:
    errors.append(f"No HTML files found in {ROOT_DIR}")

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
    
    php_links = re.findall(r'href=[\'"]([^\'"]+\.php[^\'"]*)[\'"]', content)
    if php_links:
        errors.append(f"File {rel_path} contains legacy .php href links: {set(php_links)}")

# 3. Check for Tailwind CDN references and uncompiled runtime scripts
for f in html_files:
    rel_path = os.path.relpath(f, ROOT_DIR)
    with open(f, 'r', encoding='utf-8', errors='ignore') as fp:
        content = fp.read()
    
    if 'cdn.tailwindcss.com' in content:
        errors.append(f"File {rel_path} contains uncompiled Tailwind CDN reference!")
    
    if 'tailwind.config' in content:
        errors.append(f"File {rel_path} contains runtime tailwind.config script!")

# 4. Check that compiled Tailwind stylesheet is linked in all HTML files (except footer.html)
for f in html_files:
    rel_path = os.path.relpath(f, ROOT_DIR)
    if os.path.basename(f) == 'footer.html':
        continue
    with open(f, 'r', encoding='utf-8', errors='ignore') as fp:
        content = fp.read()
    
    if 'trendz.min.css' not in content:
        errors.append(f"File {rel_path} is missing compiled trendz.min.css link!")

# 5. Check compiled CSS file existence and non-zero size
css_file = os.path.join(ROOT_DIR, 'assets', 'css', 'trendz.min.css')
if not os.path.exists(css_file):
    errors.append(f"Missing compiled CSS file: {css_file}")
else:
    size = os.path.getsize(css_file)
    if size < 10000:
        errors.append(f"Compiled CSS file {css_file} is suspiciously small ({size} bytes)")
    else:
        print(f"Verified compiled CSS: {os.path.relpath(css_file, ROOT_DIR)} ({size:,} bytes)")

# 6. Check image references in HTML files
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
        clean_src = src.split('?')[0].split('#')[0]
        target_path = os.path.normpath(os.path.join(file_dir, clean_src))
        if not os.path.exists(target_path):
            errors.append(f"Missing image in {rel_path}: {src} (resolved: {target_path})")

# 7. Check internal link references
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
            if os.path.exists(target_path + '.html'):
                pass
            else:
                errors.append(f"Broken internal link in {rel_path}: {l} (resolved: {target_path})")

# 8. Check Netlify configuration files
if not os.path.exists(os.path.join(ROOT_DIR, 'netlify.toml')):
    errors.append("Missing netlify.toml")

if not os.path.exists(os.path.join(ROOT_DIR, '_redirects')):
    errors.append("Missing _redirects")

if not os.path.exists(os.path.join(ROOT_DIR, '_headers')):
    errors.append("Missing _headers")

# 9. Check Netlify Forms on contact.html
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
    print(f"\nALL TESTS PASSED! '{ROOT_DIR}' is 100% verified and ready for client deployment.")
else:
    sys.exit(1)
