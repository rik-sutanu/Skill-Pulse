// SkillPulse Main Application Logic
window.SkillPulse = {
  data: window.SKILLPULSE_DATA || {},

  init: function() {
    this.setupNavbar();
    this.setupToasts();
    this.setupModals();
    this.setupAuthUI();
  },

  setupNavbar: function() {
    const menuBtn = document.getElementById('mobileMenuBtn');
    const drawer = document.getElementById('mobileNavDrawer');
    const closeBtn = document.getElementById('mobileDrawerClose');

    if (menuBtn && drawer) {
      menuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = drawer.style.display === 'block';
        drawer.style.display = isOpen ? 'none' : 'block';
        menuBtn.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
      });

      if (closeBtn) {
        closeBtn.addEventListener('click', () => {
          drawer.style.display = 'none';
          menuBtn.setAttribute('aria-expanded', 'false');
        });
      }

      drawer.addEventListener('click', (e) => {
        if (e.target === drawer) {
          drawer.style.display = 'none';
          menuBtn.setAttribute('aria-expanded', 'false');
        }
      });
    }

    // Dropdown toggle click handling for touch devices & keyboard users
    document.querySelectorAll('.nav-dropdown-btn').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const parent = btn.closest('.nav-item-dropdown');
        const menu = parent ? parent.querySelector('.nav-dropdown-menu') : null;
        const isOpen = menu && menu.classList.contains('open');

        // Close other dropdowns first
        document.querySelectorAll('.nav-dropdown-menu').forEach(m => {
          if (m !== menu) m.classList.remove('open');
        });
        document.querySelectorAll('.nav-dropdown-btn').forEach(b => {
          if (b !== btn) {
            b.classList.remove('open');
            b.setAttribute('aria-expanded', 'false');
          }
        });

        if (menu) {
          if (isOpen) {
            menu.classList.remove('open');
            btn.classList.remove('open');
            btn.setAttribute('aria-expanded', 'false');
          } else {
            menu.classList.add('open');
            btn.classList.add('open');
            btn.setAttribute('aria-expanded', 'true');
          }
        }
      });
    });

    // Close open dropdowns when clicking outside
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.nav-item-dropdown')) {
        document.querySelectorAll('.nav-dropdown-menu').forEach(m => m.classList.remove('open'));
        document.querySelectorAll('.nav-dropdown-btn').forEach(b => {
          b.classList.remove('open');
          b.setAttribute('aria-expanded', 'false');
        });
      }
    });

    // Set active link according to current page
    const currentPath = window.location.pathname.split('/').pop() || 'index.php';
    document.querySelectorAll('.nav-link, .mobile-nav-link').forEach(link => {
      const href = link.getAttribute('href');
      if (href === currentPath || (currentPath === '' && href === 'index.php')) {
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });

    // Set active state for dropdown items and parent dropdown button
    document.querySelectorAll('.dropdown-item').forEach(item => {
      const href = item.getAttribute('href');
      if (href === currentPath || (currentPath === '' && href === 'index.php')) {
        item.classList.add('active');
        const parentDropdown = item.closest('.nav-item-dropdown');
        if (parentDropdown) {
          const dropBtn = parentDropdown.querySelector('.nav-dropdown-btn');
          if (dropBtn) dropBtn.classList.add('active');
        }
      } else {
        item.classList.remove('active');
      }
    });
  },

  setupToasts: function() {
    if (!document.getElementById('toastContainer')) {
      const c = document.createElement('div');
      c.className = 'toast-container';
      c.id = 'toastContainer';
      document.body.appendChild(c);
    }
  },

  toast: function(message, type = 'info') {
    const c = document.getElementById('toastContainer') || document.body;
    const t = document.createElement('div');
    t.className = 'toast';
    t.innerHTML = `
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
        <polyline points="22 4 12 14.01 9 11.01"/>
      </svg>
      <span>${message}</span>
    `;
    c.appendChild(t);
    setTimeout(() => {
      t.style.opacity = '0';
      t.style.transition = 'opacity 0.3s ease';
      setTimeout(() => t.remove(), 300);
    }, 3500);
  },

  setupModals: function() {
    document.querySelectorAll('[data-close-modal]').forEach(btn => {
      btn.addEventListener('click', () => {
        const modal = btn.closest('.modal-backdrop');
        if (modal) modal.classList.remove('open');
      });
    });
  },

  openModal: function(modalId) {
    const el = document.getElementById(modalId);
    if (el) el.classList.add('open');
  },

  closeModal: function(modalId) {
    const el = document.getElementById(modalId);
    if (el) el.classList.remove('open');
  },

  setupAuthUI: function() {
    const rawUser = localStorage.getItem('skillpulse_user');
    let user = null;
    if (rawUser) {
      try { user = JSON.parse(rawUser); } catch(e) {}
    }

    // Ensure logout modal markup exists in DOM
    this.ensureLogoutModal();

    // Target auth container or existing auth button
    const navActions = document.querySelector('.nav-actions');
    if (!navActions) return;

    let authContainer = document.getElementById('navAuthContainer');
    let originalSignInBtn = document.getElementById('navAuthSignInBtn') || navActions.querySelector('a[href*="auth"]');

    if (!authContainer && originalSignInBtn) {
      authContainer = document.createElement('div');
      authContainer.className = 'nav-auth-container';
      authContainer.id = 'navAuthContainer';
      originalSignInBtn.parentNode.insertBefore(authContainer, originalSignInBtn);
      authContainer.appendChild(originalSignInBtn);
      originalSignInBtn.id = 'navAuthSignInBtn';
    }

    const mobileAuthContainer = document.getElementById('mobileAuthContainer');
    const mobileSignInBtn = document.getElementById('mobileAuthSignInBtn') || document.querySelector('.mobile-nav-content a[href*="auth"]');

    if (!user) {
      // User is logged out: restore exact Sign In / Register button
      if (authContainer) {
        authContainer.innerHTML = `
          <a href="auth.php" class="btn btn-secondary btn-sm" id="navAuthSignInBtn" aria-label="Sign In or Create Account">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span>Sign In / Register</span>
          </a>
        `;
      }
      if (mobileAuthContainer) {
        mobileAuthContainer.innerHTML = `<a href="auth.php" class="btn btn-primary" id="mobileAuthSignInBtn" style="margin-top:0.75rem;width:100%;text-align:center;">Sign In / Register</a>`;
      } else if (mobileSignInBtn) {
        mobileSignInBtn.style.display = '';
        mobileSignInBtn.textContent = 'Sign In / Register';
      }
      return;
    }

    // User is logged in: Prepare user details & personal improvement metrics
    const fullName = (user.name || 'Aditya Patil').trim();
    const names = fullName ? fullName.split(/\s+/).filter(Boolean) : ['User'];
    const shortName = names[0] || 'User';
    const initials = (names.length > 1 && names[names.length - 1])
      ? (names[0][0] + names[names.length - 1][0]).toUpperCase()
      : shortName.substring(0, 2).toUpperCase();
    const email = user.email || 'student@skillpulse.in';
    const mobile = user.mobile || '+91 98201 98201';
    const role = user.role || 'student';
    const institution = user.institution || 'Government Polytechnic Pune';
    const roleTitleMap = {
      student: 'Candidate / Student',
      faculty: 'Faculty / MSBTE',
      employer: 'Employer Recruiter',
      government: 'Government Official'
    };
    const roleTitle = roleTitleMap[role] || (role.charAt(0).toUpperCase() + role.slice(1));
    const dashboardUrl = role === 'employer' ? 'employer-dashboard.php' : (role === 'faculty' ? 'institution-dashboard.php' : (role === 'government' ? 'government.php' : 'dashboard.php'));

    // Readiness & XP values (reactive from user or live API)
    let readiness = user.readinessScore || 78;
    let totalXp = 1340;
    let tier = 'Gold';
    let streakDays = 12;

    // Render desktop profile icon button and dropdown flyout in place of Sign In / Register
    authContainer.innerHTML = `
      <div class="user-profile-widget" id="userProfileWidget">
        <button type="button" class="user-profile-btn" id="userProfileBtn" aria-expanded="false" aria-haspopup="true" aria-label="Open profile menu for ${fullName}">
          <div class="user-avatar-circle">
            <span>${initials}</span>
            <span class="online-dot" title="Account Active"></span>
          </div>
          <span class="user-profile-name">${shortName}</span>
          <svg class="chevron-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
        </button>

        <!-- Dropdown Flyout Card -->
        <div class="profile-dropdown-panel" id="profileDropdownPanel" role="menu" aria-label="User Profile & Improvement Cockpit">
          <div class="profile-panel-header">
            <div class="profile-panel-avatar">${initials}</div>
            <div class="profile-panel-userinfo">
              <div class="profile-panel-name">${fullName}</div>
              <div class="profile-panel-email">${email}</div>
              <span class="profile-role-badge">${roleTitle}</span>
            </div>
          </div>

          <!-- Personal Information -->
          <div class="profile-info-section">
            <div class="profile-info-item">
              <span class="profile-info-label">Institution:</span>
              <span class="profile-info-val">${institution}</span>
            </div>
            <div class="profile-info-item">
              <span class="profile-info-label">Mobile:</span>
              <span class="profile-info-val">${mobile}</span>
            </div>
            <div class="profile-info-item">
              <span class="profile-info-label">Identity Status:</span>
              <span class="profile-info-val" style="color:#5DCAA5;">✓ DigiLocker ADV Verified</span>
            </div>
          </div>

          <!-- Website Personal Improvement & Velocity -->
          <div class="profile-improvement-section">
            <div class="profile-section-title">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#F2C14E" stroke-width="2.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
              <span>Personal Improvement &amp; Velocity</span>
            </div>

            <div class="improvement-stats-grid">
              <div class="improvement-card">
                <div class="improvement-card-label">Career Readiness</div>
                <div class="improvement-card-val" id="profileReadinessVal">${readiness}%</div>
                <div class="improvement-progress-bar">
                  <div class="improvement-progress-fill" id="profileReadinessFill" style="width:${readiness}%;"></div>
                </div>
              </div>

              <div class="improvement-card">
                <div class="improvement-card-label">Activity XP</div>
                <div class="improvement-card-val" id="profileXpVal">${totalXp.toLocaleString()}</div>
                <div style="font-size:0.65rem;color:#F2C14E;font-weight:700;margin-top:2px;" id="profileTierText">${tier} Tier</div>
              </div>
            </div>

            <div class="streak-pill">
              <span style="display:flex;align-items:center;gap:4px;">🔥 <strong id="profileStreakVal">${streakDays}-Day Learning Streak</strong></span>
              <span style="font-size:0.65rem;color:#E7C3C0;">+14% This Month</span>
            </div>
          </div>

          <!-- Quick Navigation Links -->
          <div class="profile-links-list">
            <a href="${dashboardUrl}" class="profile-link-item">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
              <span>My Learner Cockpit</span>
            </a>
            <a href="skill-gap-analyzer.php" class="profile-link-item">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/></svg>
              <span>Retest Skill Alignment</span>
            </a>
            <a href="resume-scanner.php" class="profile-link-item">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
              <span>AI Resume Scanner &amp; Bridge</span>
            </a>
            <a href="my-data.php" class="profile-link-item">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              <span>My Data &amp; DPDP Rights</span>
            </a>
          </div>

          <!-- Log Out Button Row -->
          <div class="profile-logout-footer">
            <button type="button" class="profile-menu-logout-btn" id="profileLogoutBtn">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
              <span>Log Out</span>
            </button>
          </div>
        </div>
      </div>
    `;

    // Also update mobile drawer
    if (mobileAuthContainer) {
      mobileAuthContainer.innerHTML = `
        <div style="background:rgba(0,0,0,0.05);border:1px solid var(--border);border-radius:10px;padding:0.75rem;margin-top:0.75rem;">
          <div style="display:flex;align-items:center;gap:0.65rem;margin-bottom:0.5rem;">
            <div class="user-avatar-circle" style="width:30px;height:30px;font-size:0.75rem;">${initials}</div>
            <div>
              <div style="font-weight:700;font-size:0.85rem;color:var(--text-main);">${fullName}</div>
              <div style="font-size:0.7rem;color:var(--text-muted);">${email}</div>
            </div>
          </div>
          <button type="button" class="btn btn-secondary btn-sm mobile-logout-trigger-btn" style="width:100%;justify-content:center;color:#DC2626;border-color:#FCA5A5;">
            Log Out
          </button>
        </div>
      `;
    }

    // Toggle Dropdown Panel
    const profileBtn = document.getElementById('userProfileBtn');
    const dropdownPanel = document.getElementById('profileDropdownPanel');
    if (profileBtn && dropdownPanel) {
      profileBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = dropdownPanel.classList.toggle('open');
        profileBtn.classList.toggle('active', isOpen);
        profileBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      });

      // Close on outside click
      document.addEventListener('click', (e) => {
        if (!e.target.closest('#userProfileWidget')) {
          dropdownPanel.classList.remove('open');
          profileBtn.classList.remove('active');
          profileBtn.setAttribute('aria-expanded', 'false');
        }
      });

      // Close on Escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && dropdownPanel.classList.contains('open')) {
          dropdownPanel.classList.remove('open');
          profileBtn.classList.remove('active');
          profileBtn.setAttribute('aria-expanded', 'false');
        }
      });
    }

    // Connect Logout Trigger to Confirmation Modal
    const logoutBtn = document.getElementById('profileLogoutBtn');
    if (logoutBtn) {
      logoutBtn.addEventListener('click', (e) => {
        e.preventDefault();
        if (dropdownPanel) dropdownPanel.classList.remove('open');
        this.openLogoutConfirmation(user);
      });
    }

    // Connect Mobile Drawer Logout Trigger
    document.querySelectorAll('.mobile-logout-trigger-btn').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const drawer = document.getElementById('mobileNavDrawer');
        if (drawer) drawer.style.display = 'none';
        this.openLogoutConfirmation(user);
      });
    });

    // Automatically synchronize Welcome Back banner on the page with authenticated user's name
    const welcomeBanner = document.getElementById('userWelcomeBanner') || document.querySelector('welcome-back-banner');
    if (welcomeBanner && fullName) {
      welcomeBanner.setAttribute('name', fullName);
      if (typeof welcomeBanner.name !== 'undefined') {
        welcomeBanner.name = fullName;
      }
    }

    // Try fetching live improvement numbers from api/points.php
    fetch('api/points.php')
      .then(res => res.json())
      .then(data => {
        if (data && data.success && data.data) {
          const pts = data.data;
          const rVal = document.getElementById('profileReadinessVal');
          const rFill = document.getElementById('profileReadinessFill');
          const xpVal = document.getElementById('profileXpVal');
          const tierText = document.getElementById('profileTierText');
          const streakVal = document.getElementById('profileStreakVal');

          if (rVal) rVal.textContent = pts.readinessScore + '%';
          if (rFill) rFill.style.width = pts.readinessScore + '%';
          if (xpVal) xpVal.textContent = pts.totalXp.toLocaleString();
          if (tierText) tierText.textContent = pts.tier + ' Tier';
          if (streakVal) streakVal.textContent = pts.streakDays + '-Day Learning Streak';
        }
      })
      .catch(() => {});
  },

  ensureLogoutModal: function() {
    if (document.getElementById('logoutConfirmModal')) return;

    const modal = document.createElement('div');
    modal.className = 'logout-modal-backdrop';
    modal.id = 'logoutConfirmModal';
    modal.setAttribute('role', 'dialog');
    modal.setAttribute('aria-modal', 'true');
    modal.setAttribute('aria-labelledby', 'logoutModalTitle');

    modal.innerHTML = `
      <div class="logout-modal-card">
        <div class="logout-modal-body">
          <div class="logout-modal-icon-badge">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
              <polyline points="16 17 21 12 16 7"></polyline>
              <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
          </div>

          <h3 class="logout-modal-title" id="logoutModalTitle">Confirm Account Logout</h3>
          <p class="logout-modal-desc">
            Are you sure you want to log out of your SkillPulse account? Your active authentication session and security tokens will be terminated.
          </p>

          <div class="logout-user-preview-card">
            <div class="logout-user-avatar" id="logoutModalAvatar">AP</div>
            <div class="logout-user-details">
              <div class="logout-user-details-name" id="logoutModalUserName">Aditya Patil</div>
              <div class="logout-user-details-email" id="logoutModalUserEmail">student@skillpulse.in</div>
            </div>
          </div>
        </div>

        <div class="logout-modal-actions">
          <button type="button" class="btn-modal-cancel" id="btnCancelLogout">
            Cancel
          </button>
          <button type="button" class="btn-modal-confirm" id="btnConfirmLogout">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            <span>Yes, Log Out</span>
          </button>
        </div>
      </div>
    `;

    document.body.appendChild(modal);

    // Cancel Button
    modal.querySelector('#btnCancelLogout').addEventListener('click', () => {
      modal.classList.remove('open');
    });

    // Close on backdrop click
    modal.addEventListener('click', (e) => {
      if (e.target === modal) modal.classList.remove('open');
    });

    // Confirm Logout Button
    modal.querySelector('#btnConfirmLogout').addEventListener('click', () => {
      this.executeLogout();
    });
  },

  openLogoutConfirmation: function(user) {
    this.ensureLogoutModal();
    const modal = document.getElementById('logoutConfirmModal');
    if (!modal) return;

    if (user) {
      const cleanName = (user.name || 'Aditya Patil').trim();
      const names = cleanName ? cleanName.split(/\s+/).filter(Boolean) : ['User'];
      const initials = (names.length > 1 && names[names.length - 1])
        ? (names[0][0] + names[names.length - 1][0]).toUpperCase()
        : cleanName.substring(0, 2).toUpperCase();
      const avatarEl = document.getElementById('logoutModalAvatar');
      const nameEl = document.getElementById('logoutModalUserName');
      const emailEl = document.getElementById('logoutModalUserEmail');

      if (avatarEl) avatarEl.textContent = initials || 'AP';
      if (nameEl) nameEl.textContent = user.name || 'Aditya Patil';
      if (emailEl) emailEl.textContent = user.email || 'student@skillpulse.in';
    }

    modal.classList.add('open');
  },

  executeLogout: async function() {
    const modal = document.getElementById('logoutConfirmModal');
    const confirmBtn = document.getElementById('btnConfirmLogout');
    if (confirmBtn) {
      confirmBtn.disabled = true;
      confirmBtn.innerHTML = `<span>Logging out...</span>`;
    }

    try {
      await fetch('api/auth.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'logout' })
      });
    } catch(e) {}

    // Clear client-side authentication tokens
    localStorage.removeItem('skillpulse_user');
    localStorage.removeItem('skillpulse_token');

    if (modal) modal.classList.remove('open');
    if (confirmBtn) {
      confirmBtn.disabled = false;
      confirmBtn.innerHTML = `<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg><span>Yes, Log Out</span>`;
    }

    // Toast notification
    this.toast('✓ Successfully logged out of SkillPulse', 'info');

    // Re-render auth UI back to Sign In / Register button
    this.setupAuthUI();

    // Check if current page is private dashboard; if so, redirect to index or auth page
    const currentPath = window.location.pathname.split('/').pop();
    const protectedPages = [
      'dashboard.php', 'dashboard.php', 
      'employer-dashboard.php', 'institution-dashboard.php',
      'my-data.php'
    ];

    if (protectedPages.includes(currentPath)) {
      setTimeout(() => {
        window.location.href = 'auth.php';
      }, 600);
    }
  },

  // Interactive Skill Gap Analyzer
  initSkillGapAnalyzer: function() {
    const roleSelect = document.getElementById('roleSelect');
    const skillList = document.getElementById('skillList');
    const scoreVal = document.getElementById('scoreVal');
    const scoreMeter = document.getElementById('scoreMeter');
    const statusBadge = document.getElementById('statusBadge');
    const missingSkillsContainer = document.getElementById('missingSkillsList');
    const roadmapContainer = document.getElementById('roadmapList');

    if (!roleSelect || !this.data.JOB_ROLES) return;

    // Populate role selector
    roleSelect.innerHTML = this.data.JOB_ROLES.map(role => 
      `<option value="${role.id}">${role.title} (${role.salaryRange})</option>`
    ).join('');

    const updateCalculations = () => {
      const currentRole = this.data.JOB_ROLES.find(r => r.id === roleSelect.value) || this.data.JOB_ROLES[0];
      const selectedSkills = Array.from(document.querySelectorAll('#skillList input:checked')).map(cb => cb.value.toLowerCase());

      let totalWeight = 0;
      let earned = 0;
      const matched = [];
      const missing = [];

      currentRole.requiredSkills.forEach(req => {
        totalWeight += req.weight;
        if (selectedSkills.includes(req.name.toLowerCase())) {
          earned += req.weight;
          matched.push(req);
        } else {
          missing.push(req);
        }
      });

      const percentage = Math.round((earned / totalWeight) * 100) || 0;
      scoreVal.textContent = `${percentage}%`;

      // Animate SVG gauge: stroke-dashoffset = 440 - (440 * percentage / 100)
      if (scoreMeter) {
        const offset = 440 - (440 * (percentage / 100));
        scoreMeter.style.strokeDashoffset = offset;
        if (percentage >= 80) scoreMeter.style.stroke = 'var(--success)';
        else if (percentage >= 50) scoreMeter.style.stroke = 'var(--warning)';
        else scoreMeter.style.stroke = 'var(--primary-600)';
      }

      if (statusBadge) {
        if (percentage >= 80) {
          statusBadge.className = 'badge badge-success';
          statusBadge.textContent = 'High Industry Match';
        } else if (percentage >= 50) {
          statusBadge.className = 'badge badge-warning';
          statusBadge.textContent = 'Moderate Alignment';
        } else {
          statusBadge.className = 'badge badge-primary';
          statusBadge.textContent = 'Foundational Level';
        }
      }

      // Render missing skills
      if (missingSkillsContainer) {
        if (missing.length === 0) {
          missingSkillsContainer.innerHTML = '<div style="padding:1rem;color:var(--success);font-weight:600;">✓ Excellent! You possess all primary industry prerequisites for this role.</div>';
        } else {
          missingSkillsContainer.innerHTML = missing.map(m => `
            <div style="display:flex;align-items:center;justify-content:space-between;padding:0.75rem 1rem;background:var(--navy-50);border:1px solid var(--border);border-radius:var(--radius-md);margin-bottom:0.5rem;">
              <div>
                <span style="font-weight:700;color:var(--navy-900);">${m.name}</span>
                <span class="badge ${m.priority === 'High' ? 'badge-danger' : 'badge-warning'}" style="margin-left:0.5rem;">${m.priority} Priority</span>
              </div>
              <span style="font-size:0.8125rem;font-weight:600;color:var(--navy-500);">Weight: ${m.weight}%</span>
            </div>
          `).join('');
        }
      }

      // Render career roadmap
      if (roadmapContainer && currentRole.recommendedPath) {
        roadmapContainer.innerHTML = currentRole.recommendedPath.map(step => `
          <div style="display:flex;align-items:flex-start;gap:1rem;padding:0.875rem 1rem;border-left:3px solid var(--primary-600);background:#fff;border-radius:0 var(--radius-md) var(--radius-md) 0;margin-bottom:0.75rem;box-shadow:var(--shadow-sm);">
            <div style="width:28px;height:28px;border-radius:50%;background:var(--primary-50);color:var(--primary-600);font-weight:800;font-size:0.8125rem;display:flex;align-items:center;justify-content:center;flex-shrink:0;">${step.step}</div>
            <div style="flex:1;">
              <div style="font-weight:700;color:var(--navy-900);">${step.title}</div>
              <div style="display:flex;gap:0.75rem;margin-top:0.25rem;font-size:0.75rem;color:var(--navy-500);">
                <span>⏱ ${step.time}</span>
                <span>•</span>
                <span class="badge badge-navy">${step.difficulty}</span>
              </div>
            </div>
          </div>
        `).join('');
      }
    };

    const renderCheckboxes = () => {
      const currentRole = this.data.JOB_ROLES.find(r => r.id === roleSelect.value) || this.data.JOB_ROLES[0];
      skillList.innerHTML = currentRole.requiredSkills.map((req, idx) => `
        <label style="display:flex;align-items:center;justify-content:space-between;padding:0.75rem 1rem;border:1px solid var(--border);border-radius:var(--radius-md);background:#fff;cursor:pointer;transition:all 0.15s;">
          <div style="display:flex;align-items:center;gap:0.75rem;">
            <input type="checkbox" value="${req.name}" ${idx < 2 ? 'checked' : ''} style="width:18px;height:18px;accent-color:var(--primary-600);">
            <span style="font-weight:600;font-size:0.9rem;color:var(--navy-800);">${req.name}</span>
          </div>
          <span class="badge ${req.priority === 'High' ? 'badge-primary' : 'badge-cyan'}">${req.priority}</span>
        </label>
      `).join('');

      document.querySelectorAll('#skillList input').forEach(input => {
        input.addEventListener('change', updateCalculations);
      });

      updateCalculations();
    };

    roleSelect.addEventListener('change', renderCheckboxes);
    renderCheckboxes();
  },

  // Interactive Curriculum Alignment Simulator
  initCurriculumSimulator: function() {
    const baseScoreEl = document.getElementById('curriculumBaseScore');
    const projectedScoreEl = document.getElementById('curriculumProjectedScore');
    const deltaBadgeEl = document.getElementById('curriculumDeltaBadge');
    const moduleToggles = document.querySelectorAll('.module-toggle-checkbox');

    if (!baseScoreEl || !projectedScoreEl) return;

    const baseScore = 75;

    const recalculateCurriculum = () => {
      let additional = 0;
      moduleToggles.forEach(cb => {
        if (cb.checked) {
          additional += parseInt(cb.dataset.gain || 0, 10);
        }
      });

      const total = Math.min(99, baseScore + additional);
      projectedScoreEl.textContent = `${total}%`;
      if (deltaBadgeEl) {
        deltaBadgeEl.textContent = `+${additional}% Alignment Increase`;
      }
    };

    moduleToggles.forEach(cb => cb.addEventListener('change', recalculateCurriculum));
    recalculateCurriculum();
  },

  // Interactive Practice / Quiz Arena
  initPracticeArena: function() {
    const roleSelector = document.getElementById('practiceRoleSelect');
    const questionsContainer = document.getElementById('practiceQuestionsContainer');
    const statsScore = document.getElementById('practiceScoreDisplay');

    if (!questionsContainer || !this.data.PRACTICE_QUESTIONS) return;

    let score = 0;
    let answered = 0;

    const renderQuestions = (selectedRole) => {
      const qList = this.data.PRACTICE_QUESTIONS.filter(q => !selectedRole || q.role === selectedRole || selectedRole === 'all');
      
      if (qList.length === 0) {
        questionsContainer.innerHTML = '<div style="padding:2rem;text-align:center;color:var(--navy-500);">No practice questions found for this filter.</div>';
        return;
      }

      questionsContainer.innerHTML = qList.map((q, qIndex) => `
        <div class="card" style="margin-bottom:1.5rem;" id="qCard_${q.id}">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.75rem;">
            <div style="display:flex;align-items:center;gap:0.5rem;">
              <span class="badge badge-primary">Question ${qIndex + 1}</span>
              <span class="badge badge-navy">${q.company || 'TCS / Infosys'}</span>
              <span class="badge ${q.difficulty === 'Easy' ? 'badge-success' : q.difficulty === 'Medium' ? 'badge-warning' : 'badge-danger'}">${q.difficulty}</span>
            </div>
            <span style="font-size:0.75rem;font-weight:600;color:var(--navy-500);">+10 Points</span>
          </div>

          <h3 style="font-size:1.05rem;font-weight:700;color:var(--navy-900);margin-bottom:1.25rem;line-height:1.4;">${q.question}</h3>

          <div style="display:flex;flex-direction:column;gap:0.5rem;">
            ${q.options.map((opt, optIndex) => `
              <div class="quiz-option" data-qid="${q.id}" data-opt-index="${optIndex}">
                <span>${opt}</span>
                <span class="opt-indicator" style="font-weight:700;font-size:0.8rem;color:var(--navy-500);">Select</span>
              </div>
            `).join('')}
          </div>

          <div class="explanation-box" id="exp_${q.id}" style="display:none;margin-top:1rem;padding:1rem;background:var(--navy-50);border-radius:var(--radius-md);border-left:3px solid var(--primary-600);font-size:0.875rem;color:var(--navy-700);">
            <strong>Explanation:</strong> ${q.explanation}
          </div>
        </div>
      `).join('');

      // Wire option clicking
      document.querySelectorAll('.quiz-option').forEach(optEl => {
        optEl.addEventListener('click', function() {
          const qId = parseInt(this.dataset.qid, 10);
          const optIndex = parseInt(this.dataset.optIndex, 10);
          const qObj = qList.find(item => item.id === qId);
          if (!qObj) return;

          const card = document.getElementById(`qCard_${qId}`);
          if (card.dataset.completed) return; // Prevent double answering
          card.dataset.completed = 'true';

          const allOptions = card.querySelectorAll('.quiz-option');
          allOptions.forEach((el, idx) => {
            if (idx === qObj.correctAnswer) {
              el.classList.add('correct');
              el.querySelector('.opt-indicator').textContent = '✓ Correct';
            } else if (idx === optIndex && optIndex !== qObj.correctAnswer) {
              el.classList.add('incorrect');
              el.querySelector('.opt-indicator').textContent = '✗ Incorrect';
            }
          });

          if (optIndex === qObj.correctAnswer) {
            score += 10;
            SkillPulse.toast('Correct answer! +10 Points', 'success');
          } else {
            SkillPulse.toast('Incorrect. Review the explanation below.', 'error');
          }

          answered += 1;
          if (statsScore) statsScore.textContent = `${score} pts (${answered} answered)`;

          const expEl = document.getElementById(`exp_${qId}`);
          if (expEl) expEl.style.display = 'block';
        });
      });
    };

    if (roleSelector) {
      roleSelector.addEventListener('change', () => renderQuestions(roleSelector.value));
    }
    renderQuestions('all');
  }
};

document.addEventListener('DOMContentLoaded', () => SkillPulse.init());
