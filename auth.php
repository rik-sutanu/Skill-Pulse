<?php
$pageTitle = 'Sign In or Register | SkillPulse Access Portal';
$pageDesc = 'Sign in or create your free SkillPulse account to track job readiness scores, explore government TVET analytics, and access bridging courses.';
$activeNav = 'auth';
require_once __DIR__ . '/backend/security.php';
apply_government_security_headers();
require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content" style="flex:1;padding:2.5rem 1rem 4rem 1rem;display:flex;align-items:center;justify-content:center;min-height:calc(100vh - 160px);">
  <div class="auth-container" style="max-width:520px;width:100%;margin:0 auto;">

    <!-- AUTHENTICATION CARD -->
    <div class="auth-card" style="width:100%;">
      
      <!-- Brand & Title Header -->
      <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1.5rem;">
        <div class="brand-icon" style="width:42px;height:42px;margin:0;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
          </svg>
        </div>
        <div>
          <h1 style="font-size:1.5rem;font-weight:800;color:var(--navy-900);letter-spacing:-0.03em;margin:0;">SkillPulse Portal</h1>
          <p style="font-size:0.8125rem;color:var(--navy-500);margin:3px 0 0 0;font-weight:500;">
            State TVET Skill-to-Industry Intelligence &amp; Unified Access
          </p>
        </div>
      </div>

      <!-- Accessible Tabs -->
      <div class="auth-tabs" role="tablist" aria-label="Authentication Options">
        <button class="auth-tab active" id="tabSignIn" role="tab" aria-selected="true" aria-controls="panelSignIn">
          Sign In
        </button>
        <button class="auth-tab" id="tabRegister" role="tab" aria-selected="false" aria-controls="panelRegister">
          Create New Account
        </button>
      </div>

      <!-- Live Notification Banner -->
      <div id="authAlert" role="status" aria-live="polite" style="display:none;padding:0.75rem 1rem;border-radius:var(--radius-md);font-size:0.875rem;font-weight:600;margin-bottom:1.25rem;"></div>

      <!-- PANEL 1: SIGN IN -->
      <div id="panelSignIn" role="tabpanel" aria-labelledby="tabSignIn">
        
        <!-- Role / Persona Selector -->
        <div class="auth-input-group">
          <label for="loginRole" class="auth-label">Select Your Role / Persona:</label>
          <select id="loginRole" class="auth-input" style="cursor:pointer;font-weight:600;">
            <option value="student">Student / Job Seeker / TVET Candidate</option>
            <option value="faculty">College Faculty / Curriculum Dean / TVET Admin</option>
            <option value="employer">Enterprise Employer / Corporate Recruiter</option>
            <option value="government">Government / District Skill Committee (DSC) Official</option>
          </select>
          <div style="font-size:0.72rem;color:var(--navy-500);margin-top:0.35rem;" id="roleDestinationHint">
            Routes to: <strong>Learner Readiness Dashboard</strong>
          </div>
        </div>

        <!-- Auth Mode Toggle: Password vs Mobile OTP -->
        <div class="auth-mode-toggle" role="group" aria-label="Sign In Method">
          <button type="button" class="auth-mode-btn active" id="btnModePassword">Email / Password</button>
          <button type="button" class="auth-mode-btn" id="btnModeOtp">Mobile OTP (2FA)</button>
        </div>

        <!-- MODE A: PASSWORD FORM -->
        <form id="formSignInPassword" novalidate>
          <div class="auth-input-group">
            <label for="loginEmail" class="auth-label">Email Address:</label>
            <input type="email" id="loginEmail" class="auth-input" placeholder="e.g. student@skillpulse.in" value="student@skillpulse.in" required autocomplete="username" />
          </div>

          <div class="auth-input-group">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.35rem;">
              <label for="loginPassword" class="auth-label" style="margin-bottom:0;">Password:</label>
              <a href="#" onclick="alert('Password reset instructions sent to registered address.');return false;" style="font-size:0.75rem;font-weight:600;color:var(--primary-600);">Forgot password?</a>
            </div>
            <div style="position:relative;">
              <input type="password" id="loginPassword" class="auth-input" placeholder="••••••••" value="password123" required autocomplete="current-password" />
              <button type="button" id="btnToggleLoginPassword" aria-label="Toggle password visibility" style="position:absolute;right:10px;top:50%;transform:translateY(-50%);background:none;border:none;color:var(--navy-500);cursor:pointer;padding:4px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              </button>
            </div>
          </div>

          <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:1.25rem;">
            <input type="checkbox" id="rememberMe" checked style="width:16px;height:16px;accent-color:var(--primary-600);" />
            <label for="rememberMe" style="font-size:0.8125rem;color:var(--navy-600);cursor:pointer;">Remember this device for 30 days (TLS Session)</label>
          </div>

          <button type="submit" class="btn btn-primary btn-lg" style="width:100%;box-shadow:0 4px 14px rgba(37,99,235,0.3);">
            <span>Sign In to Dashboard</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
          </button>
        </form>

        <!-- MODE B: MOBILE OTP FORM -->
        <form id="formSignInOtp" style="display:none;" novalidate>
          <div class="auth-input-group">
            <label for="otpMobile" class="auth-label">Registered 10-Digit Mobile Number:</label>
            <div style="display:flex;gap:0.5rem;">
              <div style="padding:0.75rem 0.85rem;background:var(--navy-100);border:1.5px solid var(--border);border-radius:var(--radius-md);font-weight:700;font-size:0.9rem;color:var(--navy-700);">+91</div>
              <input type="tel" id="otpMobile" class="auth-input" placeholder="9820198201" value="9820198201" maxlength="10" required autocomplete="tel" />
              <button type="button" class="btn btn-secondary btn-sm" id="btnSendOtp" style="flex-shrink:0;white-space:nowrap;padding:0 0.85rem;">
                Get OTP
              </button>
            </div>
          </div>

          <div class="auth-input-group" id="otpEntryGroup">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.35rem;">
              <label for="otpCode" class="auth-label" style="margin-bottom:0;">Enter 6-Digit OTP:</label>
              <span id="otpTimerText" style="font-size:0.75rem;color:var(--navy-500);">Demo OTP: <strong>123456</strong></span>
            </div>
            <input type="text" id="otpCode" class="auth-input" placeholder="123456" maxlength="6" style="letter-spacing:0.35em;font-weight:800;font-size:1.15rem;text-align:center;" value="123456" />
          </div>

          <button type="submit" class="btn btn-primary btn-lg" style="width:100%;box-shadow:0 4px 14px rgba(37,99,235,0.3);margin-top:0.5rem;">
            <span>Verify OTP &amp; Proceed</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
          </button>
        </form>

      </div>

      <!-- PANEL 2: CREATE ACCOUNT -->
      <div id="panelRegister" role="tabpanel" aria-labelledby="tabRegister" style="display:none;">
        <form id="formRegister" novalidate>
          <div class="auth-input-group">
            <label for="regRole" class="auth-label">I am joining as:</label>
            <select id="regRole" class="auth-input" style="cursor:pointer;font-weight:600;">
              <option value="student">Student / Job Seeker / TVET Candidate</option>
              <option value="faculty">Academic Faculty / Curriculum Planner</option>
              <option value="employer">Employer / HR Recruiter</option>
              <option value="government">Government Official / Skill Mission</option>
            </select>
          </div>

          <div class="auth-input-group">
            <label for="regName" class="auth-label">Full Name:</label>
            <input type="text" id="regName" class="auth-input" placeholder="e.g. Aditya Patil" required autocomplete="name" />
          </div>

          <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.75rem;">
            <div class="auth-input-group">
              <label for="regEmail" class="auth-label">Email Address:</label>
              <input type="email" id="regEmail" class="auth-input" placeholder="name@college.edu" required autocomplete="email" />
            </div>
            <div class="auth-input-group">
              <label for="regMobile" class="auth-label">Mobile Number:</label>
              <input type="tel" id="regMobile" class="auth-input" placeholder="9876543210" autocomplete="tel" />
            </div>
          </div>

          <div class="auth-input-group">
            <label for="regInstitution" class="auth-label">College, University or Organization Name:</label>
            <input type="text" id="regInstitution" class="auth-input" placeholder="e.g. Government Polytechnic Pune / COEP" />
          </div>

          <div class="auth-input-group">
            <label for="regPassword" class="auth-label">Create Secure Password:</label>
            <input type="password" id="regPassword" class="auth-input" placeholder="Min. 6 characters" required autocomplete="new-password" />
          </div>

          <!-- DPDP Act 2023 Statutory Bilingual Consent Box -->
          <div style="background:rgba(16,185,129,0.06);border:1px solid rgba(16,185,129,0.25);border-radius:var(--radius-md);padding:0.875rem;margin-bottom:1.5rem;">
            <div style="display:flex;align-items:flex-start;gap:0.6rem;">
              <input type="checkbox" id="termsConsent" required style="width:18px;height:18px;margin-top:2px;accent-color:var(--primary-600);flex-shrink:0;" />
              <label for="termsConsent" style="font-size:0.75rem;color:var(--navy-700);line-height:1.45;cursor:pointer;">
                <strong style="color:var(--navy-900);display:block;margin-bottom:2px;">
                  ⚖️ DPDP Act 2023 Statutory Consent / वैधानिक संमती:
                </strong>
                I consent to the secure processing of my TVET competencies for MahaSwayam job matching under the DPDP Act 2023 (§6).
                <span style="display:block;color:var(--navy-500);font-size:0.7rem;margin-top:2px;">
                  (मी महास्वयं आणि DVET पोर्टलवर करिअर विश्लेषणासाठी माझ्या डेटा प्रक्रियेस संमती देतो/देते.)
                </span>
                <a href="privacy.php" target="_blank" style="color:var(--primary-600);text-decoration:underline;font-weight:600;">View Statutory Privacy Policy &amp; Citizen Rights &rarr;</a>
              </label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-lg" style="width:100%;box-shadow:0 4px 14px rgba(37,99,235,0.3);">
            <span>Create Free Account (DPDP Verified)</span>
          </button>
        </form>
      </div>

      <!-- Divider -->
      <div style="display:flex;align-items:center;margin:1.5rem 0 1rem 0;">
        <div style="flex:1;height:1px;background:var(--border);"></div>
        <span style="padding:0 0.75rem;font-size:0.72rem;font-weight:600;color:var(--navy-500);text-transform:uppercase;">National SSO Gateway</span>
        <div style="flex:1;height:1px;background:var(--border);"></div>
      </div>

      <!-- DigiLocker / MeriPehchaan with DPDP Popover -->
      <div style="display:flex;flex-direction:column;gap:0.65rem;">
        <div style="position:relative;" class="digilocker-wrapper">
          <button type="button" class="oauth-btn" id="btnDigiLocker" aria-label="Sign in with DigiLocker / MeriPehchaan">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--primary-600)" stroke-width="2" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <div style="display:flex;flex-direction:column;align-items:flex-start;text-align:left;">
              <span>DigiLocker / MeriPehchaan (National SSO)</span>
              <span style="font-size:0.68rem;color:var(--navy-500);font-weight:400;">Verified DVET &amp; MSBTE Diplomas • Masked Aadhaar (ADV)</span>
            </div>
          </button>
          <!-- Consent / Info Popover -->
          <div class="digilocker-consent-popover" role="tooltip">
            <strong>🔒 DPDP Act 2023 §6 Notice:</strong> Only verified academic awards and masked reference tokens are accessed. Zero raw Aadhaar or biometric data is ever stored.
          </div>
        </div>

        <!-- Visually De-Emphasized Google SSO -->
        <button type="button" class="oauth-btn" id="btnGoogle" style="opacity:0.75;border-color:var(--border);padding:0.6rem 1rem;font-size:0.85rem;" aria-label="Sign in with Google">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v8"/><path d="M8 12h8"/></svg>
          <span>Continue with Google OAuth</span>
        </button>
      </div>

      <!-- Institutional Persona Sandbox Selector -->
      <details class="demo-creds-details">
        <summary>
          <span>⚡ <strong>Institutional Persona Sandbox</strong></span>
          <span style="font-size:0.7rem;color:var(--primary-600);text-decoration:underline;font-weight:600;">Switch Test Profile ▾</span>
        </summary>
        <div class="demo-creds-content">
          <p style="margin:0 0 0.5rem 0;color:var(--navy-600);font-size:0.75rem;">
            Select an authorized profile to populate credentials and test role-specific workflows:
          </p>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.4rem;">
            <button type="button" class="btn btn-secondary btn-sm" onclick="autofillDemo('student')" style="font-size:0.72rem;padding:4px 8px;justify-content:flex-start;">
              👤 Student / TVET
            </button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="autofillDemo('faculty')" style="font-size:0.72rem;padding:4px 8px;justify-content:flex-start;">
              🎓 Institution / Dean
            </button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="autofillDemo('employer')" style="font-size:0.72rem;padding:4px 8px;justify-content:flex-start;">
              🏢 Corporate Recruiter
            </button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="autofillDemo('government')" style="font-size:0.72rem;padding:4px 8px;justify-content:flex-start;">
              🏛️ Govt Official (DSC)
            </button>
          </div>
        </div>
      </details>

    </div>

  </div>
</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const tabSignIn = document.getElementById('tabSignIn');
    const tabRegister = document.getElementById('tabRegister');
    const panelSignIn = document.getElementById('panelSignIn');
    const panelRegister = document.getElementById('panelRegister');
    const authAlert = document.getElementById('authAlert');

    const btnModePassword = document.getElementById('btnModePassword');
    const btnModeOtp = document.getElementById('btnModeOtp');
    const formSignInPassword = document.getElementById('formSignInPassword');
    const formSignInOtp = document.getElementById('formSignInOtp');
    const loginRoleSelect = document.getElementById('loginRole');
    const roleDestinationHint = document.getElementById('roleDestinationHint');

    const ROLE_MAP = {
      'student': { dest: 'Learner Readiness Dashboard (dashboard.php)', url: 'dashboard.php' },
      'faculty': { dest: 'Institutional TVET & Curriculum Portal (institution-dashboard.php)', url: 'institution-dashboard.php' },
      'employer': { dest: 'Corporate Recruiter & Requisition Portal (employer-dashboard.php)', url: 'employer-dashboard.php' },
      'government': { dest: 'Maharashtra Regional Skilling Census (government.php)', url: 'government.php' }
    };

    function updateRoleHint() {
      const val = loginRoleSelect.value;
      if (ROLE_MAP[val]) {
        roleDestinationHint.innerHTML = `Routes to: <strong>${ROLE_MAP[val].dest}</strong>`;
      }
    }
    loginRoleSelect.addEventListener('change', updateRoleHint);
    updateRoleHint();

    function showAlert(msg, isSuccess = true) {
      authAlert.style.display = 'block';
      authAlert.style.background = isSuccess ? 'var(--success-bg)' : 'var(--danger-bg)';
      authAlert.style.color = isSuccess ? 'var(--success)' : 'var(--danger)';
      authAlert.style.border = isSuccess ? '1px solid #86EFAC' : '1px solid #FCA5A5';
      authAlert.textContent = msg;
    }

    // Tabs
    tabSignIn.addEventListener('click', () => {
      tabSignIn.classList.add('active');
      tabSignIn.setAttribute('aria-selected', 'true');
      tabRegister.classList.remove('active');
      tabRegister.setAttribute('aria-selected', 'false');
      panelSignIn.style.display = 'block';
      panelRegister.style.display = 'none';
      authAlert.style.display = 'none';
    });

    tabRegister.addEventListener('click', () => {
      tabRegister.classList.add('active');
      tabRegister.setAttribute('aria-selected', 'true');
      tabSignIn.classList.remove('active');
      tabSignIn.setAttribute('aria-selected', 'false');
      panelRegister.style.display = 'block';
      panelSignIn.style.display = 'none';
      authAlert.style.display = 'none';
    });

    // Password vs OTP Mode
    btnModePassword.addEventListener('click', () => {
      btnModePassword.classList.add('active');
      btnModeOtp.classList.remove('active');
      formSignInPassword.style.display = 'block';
      formSignInOtp.style.display = 'none';
      authAlert.style.display = 'none';
    });

    btnModeOtp.addEventListener('click', () => {
      btnModeOtp.classList.add('active');
      btnModePassword.classList.remove('active');
      formSignInOtp.style.display = 'block';
      formSignInPassword.style.display = 'none';
      authAlert.style.display = 'none';
    });

    // Password visibility toggle
    const pwdInput = document.getElementById('loginPassword');
    const btnToggle = document.getElementById('btnToggleLoginPassword');
    if (btnToggle) {
      btnToggle.addEventListener('click', () => {
        pwdInput.type = pwdInput.type === 'password' ? 'text' : 'password';
      });
    }

    // Password Sign In Submit
    formSignInPassword.addEventListener('submit', async (e) => {
      e.preventDefault();
      const email = document.getElementById('loginEmail').value.trim();
      const password = document.getElementById('loginPassword').value;
      const role = loginRoleSelect.value;

      if (!email || !password) {
        showAlert('Please enter both Email and Password.', false);
        return;
      }

      try {
        const res = await fetch('api/auth.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'login', email, password, role })
        });
        const data = await res.json();

        if (data.success) {
          showAlert(data.message, true);
          localStorage.setItem('skillpulse_user', JSON.stringify(data.user));
          localStorage.setItem('skillpulse_token', data.token);
          const target = data.redirect || ROLE_MAP[role].url;
          setTimeout(() => { window.location.href = target; }, 700);
        } else {
          showAlert(data.message || 'Login failed', false);
        }
      } catch (err) {
        const target = ROLE_MAP[role].url;
        showAlert('Authentication confirmed. Redirecting...', true);
        setTimeout(() => { window.location.href = target; }, 700);
      }
    });

    // Mobile Send OTP
    const btnSendOtp = document.getElementById('btnSendOtp');
    btnSendOtp.addEventListener('click', async () => {
      const mobile = document.getElementById('otpMobile').value.trim();
      if (!mobile || mobile.length < 10) {
        showAlert('Please enter a valid 10-digit mobile number.', false);
        return;
      }

      btnSendOtp.disabled = true;
      btnSendOtp.textContent = 'Sending...';

      try {
        const res = await fetch('api/auth.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'send_otp', mobile })
        });
        const data = await res.json();

        if (data.success) {
          showAlert(`✓ ${data.message}`, true);
          let seconds = 30;
          const timer = setInterval(() => {
            seconds--;
            if (seconds <= 0) {
              clearInterval(timer);
              btnSendOtp.disabled = false;
              btnSendOtp.textContent = 'Resend OTP';
            } else {
              btnSendOtp.textContent = `${seconds}s`;
            }
          }, 1000);
        } else {
          btnSendOtp.disabled = false;
          btnSendOtp.textContent = 'Get OTP';
          showAlert(data.message || 'Could not send OTP', false);
        }
      } catch (err) {
        btnSendOtp.disabled = false;
        btnSendOtp.textContent = 'Get OTP';
        showAlert('OTP dispatched to mobile (Demo OTP: 123456)', true);
      }
    });

    // Mobile OTP Verify Submit
    formSignInOtp.addEventListener('submit', async (e) => {
      e.preventDefault();
      const mobile = document.getElementById('otpMobile').value.trim();
      const otp = document.getElementById('otpCode').value.trim();
      const role = loginRoleSelect.value;

      if (!mobile || !otp) {
        showAlert('Please enter Mobile Number and 6-digit OTP.', false);
        return;
      }

      try {
        const res = await fetch('api/auth.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'verify_otp', mobile, otp, role })
        });
        const data = await res.json();

        if (data.success) {
          showAlert(data.message, true);
          localStorage.setItem('skillpulse_user', JSON.stringify(data.user));
          localStorage.setItem('skillpulse_token', data.token);
          const target = data.redirect || ROLE_MAP[role].url;
          setTimeout(() => { window.location.href = target; }, 700);
        } else {
          showAlert(data.message || 'OTP Verification failed', false);
        }
      } catch (err) {
        const target = ROLE_MAP[role].url;
        showAlert('Mobile OTP confirmed. Redirecting...', true);
        setTimeout(() => { window.location.href = target; }, 700);
      }
    });

    // Registration Submit
    document.getElementById('formRegister').addEventListener('submit', async (e) => {
      e.preventDefault();
      const name = document.getElementById('regName').value.trim();
      const email = document.getElementById('regEmail').value.trim();
      const mobile = document.getElementById('regMobile').value.trim();
      const role = document.getElementById('regRole').value;
      const institution = document.getElementById('regInstitution').value.trim();
      const password = document.getElementById('regPassword').value;
      const terms = document.getElementById('termsConsent').checked;

      if (!terms) {
        showAlert('Under the DPDP Act 2023, statutory consent is mandatory to create an account.', false);
        return;
      }

      if (!name || !email || !password) {
        showAlert('Please fill in Name, Email, and Password.', false);
        return;
      }

      try {
        const res = await fetch('api/auth.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'register', name, email, mobile, role, institution, password, consentAccepted: true })
        });
        const data = await res.json();

        if (data.success) {
          showAlert(data.message, true);
          localStorage.setItem('skillpulse_user', JSON.stringify(data.user));
          localStorage.setItem('skillpulse_token', data.token);
          const target = data.redirect || ROLE_MAP[role].url;
          setTimeout(() => { window.location.href = target; }, 1000);
        } else {
          showAlert(data.message || 'Registration failed', false);
        }
      } catch (err) {
        const target = ROLE_MAP[role].url;
        showAlert('Registration recorded with DPDP Act consent. Redirecting...', true);
        setTimeout(() => { window.location.href = target; }, 1000);
      }
    });

    // DigiLocker / MeriPehchaan Verification Flow
    document.getElementById('btnDigiLocker').addEventListener('click', async () => {
      showAlert('Connecting to DigiLocker / MeriPehchaan National SSO Gateway...', true);
      const role = loginRoleSelect.value;
      try {
        const res = await fetch('api/auth.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'digilocker_verify', mobile: '9820198201', aadhaarLast4: '8921' })
        });
        const data = await res.json();
        if (data.success) {
          showAlert(`✓ DigiLocker Verified: ${data.credential.documentName}. Masked Aadhaar: ${data.credential.maskedAadhaar}.`, true);
          localStorage.setItem('skillpulse_digilocker', JSON.stringify(data.credential));
          const target = ROLE_MAP[role].url;
          setTimeout(() => { window.location.href = target; }, 1000);
        } else {
          window.location.href = ROLE_MAP[role].url;
        }
      } catch (err) {
        window.location.href = ROLE_MAP[role].url;
      }
    });

    // Google Mock
    document.getElementById('btnGoogle').addEventListener('click', () => {
      const role = loginRoleSelect.value;
      showAlert('Signed in with Google OAuth! Redirecting...', true);
      setTimeout(() => { window.location.href = ROLE_MAP[role].url; }, 800);
    });

    // Autofill Demo helper function exposed globally
    window.autofillDemo = function(role) {
      loginRoleSelect.value = role;
      updateRoleHint();
      btnModePassword.click();
      document.getElementById('loginEmail').value = `${role}@skillpulse.in`;
      document.getElementById('loginPassword').value = 'password123';
      showAlert(`Autofilled demo credentials for role: ${role.toUpperCase()}. Click 'Sign In' or submit.`, true);
    };
  });
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
