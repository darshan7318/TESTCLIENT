/**
 * Trendz Eventz — Secure RFP Form Controller
 */
(function() {
    'use strict';

    function initForms() {
        const form = document.getElementById('contact-rfp-form');
        if (!form) return;

        const submitBtn = document.getElementById('rfp-submit-btn');

        form.addEventListener('submit', function(e) {
            let isValid = true;

            // Clear previous errors
            form.querySelectorAll('.form-group').forEach(fg => fg.classList.remove('has-error'));
            form.querySelectorAll('.form-error').forEach(fe => fe.remove());

            // Validate Name
            const nameInput = document.getElementById('rfp-name');
            if (!nameInput.value.trim() || nameInput.value.trim().length < 2) {
                showError(nameInput, 'Please provide your full name (at least 2 characters).');
                isValid = false;
            }

            // Validate Company
            const compInput = document.getElementById('rfp-company');
            if (!compInput.value.trim() || compInput.value.trim().length < 2) {
                showError(compInput, 'Please enter your corporate company or brand name.');
                isValid = false;
            }

            // Validate Email
            const emailInput = document.getElementById('rfp-email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value.trim())) {
                showError(emailInput, 'Please provide a valid corporate email address.');
                isValid = false;
            }

            // Validate Phone
            const phoneInput = document.getElementById('rfp-phone');
            const phoneRegex = /^[0-9\+\-\s\(\)]{8,20}$/;
            if (!phoneRegex.test(phoneInput.value.trim())) {
                showError(phoneInput, 'Please provide a valid direct phone or WhatsApp number.');
                isValid = false;
            }

            // Validate Requirement
            const reqInput = document.getElementById('rfp-requirement');
            if (!reqInput.value) {
                showError(reqInput, 'Please select a core service requirement.');
                isValid = false;
            }

            // Validate Message
            const msgInput = document.getElementById('rfp-message');
            if (!msgInput.value.trim() || msgInput.value.trim().length < 15) {
                showError(msgInput, 'Please describe your project scope (minimum 15 characters).');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
                const firstError = form.querySelector('.has-error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    const inputEl = firstError.querySelector('input, select, textarea');
                    if (inputEl) inputEl.focus();
                }
            } else if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Transmitting Event Brief...</span>';
            }
        });

        function showError(field, message) {
            const group = field.closest('.form-group');
            if (!group) return;
            group.classList.add('has-error');
            const errSpan = document.createElement('span');
            errSpan.className = 'form-error';
            errSpan.setAttribute('role', 'alert');
            errSpan.textContent = message;
            group.appendChild(errSpan);
        }
    }

    window.TrendzForms = { init: initForms };
})();

