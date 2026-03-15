@echo off
cd /d "D:\.Programming\afadbd"

echo.
echo ============================================================
echo Command 1: git status
echo ============================================================
git status

echo.
echo ============================================================
echo Command 2: git add files
echo ============================================================
git add app/Http/Controllers/frontController.php resources/views/frontend/contact.blade.php resources/views/frontend/donate.blade.php config/services.php

echo.
echo ============================================================
echo Command 3: git commit
echo ============================================================
git commit -m "Add Google reCAPTCHA v2 to contact and donation forms

- Add RECAPTCHA_SITE_KEY and RECAPTCHA_SECRET_KEY to .env
- Add recaptcha config to config/services.php
- Add reCAPTCHA v2 widget to contact form (contact.blade.php)
- Add reCAPTCHA v2 widget to donation form (donate.blade.php)
- Add server-side reCAPTCHA verification in frontController.php for messageStore() and donationSubmit()

Co-authored-by: Copilot <223556219+Copilot@users.noreply.github.com>"

echo.
echo ============================================================
echo Command 4: git push
echo ============================================================
git push

echo.
echo ============================================================
echo All commands completed
echo ============================================================
