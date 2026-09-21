<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard | SkillPulse Analytics Portal</title>
  <meta name="description" content="Personalized career readiness cockpit tracking skill acquisition milestones, enrolled bridging courses, and interview scores.">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- Header -->
  <header class="site-header" role="banner">
    <div class="container nav-inner">
      <a href="index.php" class="brand-logo" aria-label="SkillPulse Home">
        <div class="brand-icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
        </div>
        <div>
          <span>Skill<span style="color:var(--primary-600);">Pulse</span></span>
          <span class="brand-text-sub">Student Dashboard</span>
        </div>
      </a>

      <!-- Desktop Nav -->
      <nav class="nav-links" role="navigation" aria-label="Main Navigation">
        <a href="index.php" class="nav-link">Home</a>

        <!-- Intelligence Dropdown -->
        <div class="nav-item-dropdown">
          <button class="nav-dropdown-btn" aria-haspopup="true" aria-expanded="false" id="btnDropdownIntelligence">
            <span>Intelligence</span>
            <svg class="dropdown-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <div class="nav-dropdown-menu" role="menu" aria-labelledby="btnDropdownIntelligence">
            <a href="skill-intelligence.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Skill Intelligence</span>
                <span class="dropdown-item-desc">Real-time demand trajectories &amp; vacancy pools</span>
              </div>
            </a>
            <a href="government.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Government Portal</span>
                <span class="dropdown-item-desc">Maharashtra DVET &amp; regional skill metrics</span>
              </div>
            </a>
            <a href="employer.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Employer Portal</span>
                <span class="dropdown-item-desc">Requisition builder &amp; candidate matching</span>
              </div>
            </a>
          </div>
        </div>

        <!-- Tools & Simulators Dropdown -->
        <div class="nav-item-dropdown">
          <button class="nav-dropdown-btn" aria-haspopup="true" aria-expanded="false" id="btnDropdownTools">
            <span>Tools &amp; Simulators</span>
            <svg class="dropdown-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <div class="nav-dropdown-menu" role="menu" aria-labelledby="btnDropdownTools">
            <a href="resume-scanner.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">AI Resume Scanner</span>
                <span class="dropdown-item-desc">Extract skills &amp; detect job gaps</span>
              </div>
            </a>
            <a href="skill-gap-analyzer.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Skill Gap Analyzer</span>
                <span class="dropdown-item-desc">Interactive Job Readiness Score &amp; radar</span>
              </div>
            </a>
            <a href="training-curriculum.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Curriculum Simulator</span>
                <span class="dropdown-item-desc">Simulate electives &amp; placement boost</span>
              </div>
            </a>
            <a href="career-roadmap.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Career Roadmap</span>
                <span class="dropdown-item-desc">Structured milestones &amp; pathways</span>
              </div>
            </a>
          </div>
        </div>

        <!-- Learning & Practice Dropdown -->
        <div class="nav-item-dropdown">
          <button class="nav-dropdown-btn" aria-haspopup="true" aria-expanded="false" id="btnDropdownLearning">
            <span>Learning &amp; Practice</span>
            <svg class="dropdown-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <div class="nav-dropdown-menu" role="menu" aria-labelledby="btnDropdownLearning">
            <a href="courses.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Courses Catalog</span>
                <span class="dropdown-item-desc">Domain courses to bridge identified gaps</span>
              </div>
            </a>
            <a href="practice.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Practice Arena</span>
                <span class="dropdown-item-desc">Corporate interview screening &amp; code tests</span>
              </div>
            </a>
            <a href="experts.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Industry Experts</span>
                <span class="dropdown-item-desc">1-on-1 resume reviews &amp; mock interviews</span>
              </div>
            </a>
          </div>
        </div>

        <a href="dashboard.php" class="nav-link active">Dashboard</a>
      </nav>

      <div class="nav-actions">
        <div class="nav-auth-container" id="navAuthContainer">
          <a href="auth.php" class="btn btn-secondary btn-sm" id="navAuthSignInBtn" aria-label="Sign In or Create Account">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span>Sign In / Register</span>
          </a>
        </div>
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mobileNavDrawer"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>
      </div>
    </div>
  </header>

  <!-- Mobile Drawer -->
  <div class="mobile-nav-drawer" id="mobileNavDrawer" role="dialog" aria-modal="true" aria-label="Mobile Navigation Menu">
    <div class="mobile-nav-content">
      <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;padding-bottom:0.75rem;border-bottom:1px solid var(--border);">
        <span style="font-weight:800;font-size:1.1rem;color:var(--navy-900);">Navigation</span>
        <button id="mobileDrawerClose" style="background:none;border:none;cursor:pointer;padding:4px;color:var(--text-main);" aria-label="Close menu">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
      </div>

      <div style="display:flex;flex-direction:column;gap:0.35rem;">
        <a href="index.php" class="mobile-nav-link">Home</a>
        <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;margin:0.75rem 0 0.25rem 0.5rem;">Intelligence &amp; Governance</div>
        <a href="skill-intelligence.php" class="mobile-nav-link">Skill Intelligence</a>
        <a href="government.php" class="mobile-nav-link">Government &amp; Regional Portal</a>
        <a href="employer.php" class="mobile-nav-link">Employer Portal</a>

        <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;margin:0.75rem 0 0.25rem 0.5rem;">Tools &amp; Simulators</div>
        <a href="resume-scanner.php" class="mobile-nav-link">AI Resume Scanner &amp; Bridge</a>
        <a href="skill-gap-analyzer.php" class="mobile-nav-link">Skill Gap Analyzer</a>
        <a href="training-curriculum.php" class="mobile-nav-link">Curriculum Simulator</a>
        <a href="career-roadmap.php" class="mobile-nav-link">Career Roadmap</a>

        <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;margin:0.75rem 0 0.25rem 0.5rem;">Learning &amp; Practice</div>
        <a href="courses.php" class="mobile-nav-link">Courses Catalog</a>
        <a href="practice.php" class="mobile-nav-link">Interview Practice Arena</a>
        <a href="experts.php" class="mobile-nav-link">Industry Experts</a>

        <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;margin:0.75rem 0 0.25rem 0.5rem;">User Account</div>
        <a href="dashboard.php" class="mobile-nav-link active">Learner Dashboard</a>
        <div id="mobileAuthContainer" style="margin-top:0.75rem;">
          <a href="auth.php" class="btn btn-primary" id="mobileAuthSignInBtn" style="width:100%;text-align:center;">Sign In / Register</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <main style="flex:1;padding:2.5rem 0 4rem 0;">
    <div class="container" style="display:flex;flex-direction:column;gap:2.5rem;">

      <!-- Welcome Back Banner Component -->
      <welcome-back-banner id="userWelcomeBanner" name="Aditya" target-role="Data Analyst" readiness="78" practice-url="practice.php" retest-url="skill-gap-analyzer.php"></welcome-back-banner>


      <!-- Overview Stats Grid -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-card-top">
            <span class="stat-card-label">Readiness Score</span>
            <div class="stat-card-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg></div>
          </div>
          <div class="stat-card-val" id="statReadinessScore" style="color:var(--primary-600);">78%</div>
          <span class="badge badge-success" id="statReadinessBadge">+14% this month</span>
          <div class="stat-card-sub" id="statReadinessSub">Industry benchmark cutoff: 80%</div>
        </div>

        <div class="stat-card">
          <div class="stat-card-top">
            <span class="stat-card-label">Active Courses</span>
            <div class="stat-card-icon" style="background:var(--cyan-50);color:var(--cyan-600);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
          </div>
          <div class="stat-card-val" id="statActiveCourses">2</div>
          <span class="badge badge-cyan" id="statActiveCoursesBadge">In Progress</span>
          <div class="stat-card-sub">Subsidized via MahaSwayam</div>
        </div>

        <div class="stat-card">
          <div class="stat-card-top">
            <span class="stat-card-label">Practice Score</span>
            <div class="stat-card-icon" style="background:var(--success-bg);color:var(--success);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
          </div>
          <div class="stat-card-val" id="statPracticeScore">180 pts</div>
          <span class="badge badge-primary" id="statPracticeRank">Rank: Top 15%</span>
          <div class="stat-card-sub" id="statPracticeSub">18 problems solved correctly</div>
        </div>

        <div class="stat-card">
          <div class="stat-card-top">
            <span class="stat-card-label">Upcoming Mentorship</span>
            <div class="stat-card-icon" style="background:var(--warning-bg);color:var(--warning);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
          </div>
          <div class="stat-card-val" style="font-size:1.4rem;">Tomorrow</div>
          <span class="badge badge-warning">5:30 PM IST</span>
          <div class="stat-card-sub">With Priyanka Sen (Amazon AWS)</div>
        </div>
      </div>

      <!-- Enrolled Courses Tracking -->
      <div class="card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem;flex-wrap:wrap;gap:0.5rem;">
          <div>
            <h2 style="font-size:1.25rem;font-weight:800;color:var(--navy-900);margin:0;">Active Bridging Programs</h2>
            <p style="font-size:0.8125rem;color:var(--navy-500);margin:0.15rem 0 0 0;">Subsidized through MahaSwayam State Vouchers &amp; Integrated Tracks</p>
          </div>
          <a href="courses.php" class="btn btn-secondary btn-sm" style="font-size:0.8rem;">Browse Catalog +</a>
        </div>
        
        <div style="display:flex;flex-direction:column;gap:1rem;" id="activeBridgingProgramsList">
          <!-- Default Starter Courses -->
          <div style="padding:1.25rem;background:var(--navy-50);border:1px solid var(--border);border-radius:var(--radius-md);">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.5rem;flex-wrap:wrap;gap:0.5rem;">
              <div style="display:flex;align-items:center;gap:0.5rem;">
                <span class="badge badge-primary" style="font-size:0.7rem;">🏛️ MahaSwayam Subsidized</span>
                <span style="font-weight:700;color:var(--navy-900);">Enterprise SQL &amp; High-Performance Relational Design</span>
              </div>
              <span style="font-size:0.875rem;font-weight:700;color:var(--primary-600);">75% Complete</span>
            </div>
            <div class="progress-track" style="margin-bottom:0.75rem;"><div class="progress-fill" style="width:75%;"></div></div>
            <div style="display:flex;justify-content:space-between;align-items:center;font-size:0.8125rem;color:var(--navy-500);flex-wrap:wrap;gap:0.5rem;">
              <span>Next: Module 4 - Indexing Strategies &amp; Window Functions</span>
              <a href="courses.php" class="btn btn-primary btn-sm" style="padding:0.25rem 0.6rem;font-size:0.75rem;">Resume Course</a>
            </div>
          </div>

          <div style="padding:1.25rem;background:var(--navy-50);border:1px solid var(--border);border-radius:var(--radius-md);">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.5rem;flex-wrap:wrap;gap:0.5rem;">
              <div style="display:flex;align-items:center;gap:0.5rem;">
                <span class="badge badge-primary" style="font-size:0.7rem;">🏛️ MahaSwayam Subsidized</span>
                <span style="font-weight:700;color:var(--navy-900);">Modern Power BI &amp; Executive Storytelling</span>
              </div>
              <span style="font-size:0.875rem;font-weight:700;color:var(--primary-600);">40% Complete</span>
            </div>
            <div class="progress-track" style="margin-bottom:0.75rem;"><div class="progress-fill" style="width:40%;"></div></div>
            <div style="display:flex;justify-content:space-between;align-items:center;font-size:0.8125rem;color:var(--navy-500);flex-wrap:wrap;gap:0.5rem;">
              <span>Next: Module 2 - Calculating DAX Measures &amp; KPIs</span>
              <a href="courses.php" class="btn btn-primary btn-sm" style="padding:0.25rem 0.6rem;font-size:0.75rem;">Resume Course</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-bottom" style="border-top:none;padding-top:0;">
        <span>© 2026 SkillPulse Dashboard | Smart India Hackathon 2026</span>
        <span>Problem Statement 26134 | Team HACK.FORCE</span>
      </div>
    </div>
  </footer>

  <script src="js/data.js"></script>
  <script src="js/welcome-banner.js"></script>
  <script src="js/app.js"></script>
  <script src="js/pulseai.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', async () => {
      const container = document.getElementById('activeBridgingProgramsList');

      // Check authenticated user from localStorage
      let currentUser = null;
      try {
        const rawUser = localStorage.getItem('skillpulse_user');
        if (rawUser) currentUser = JSON.parse(rawUser);
      } catch (e) {}

      const banner = document.getElementById('userWelcomeBanner');
      if (banner && currentUser && currentUser.name) {
        banner.setAttribute('name', currentUser.name);
        if (typeof banner.name !== 'undefined') banner.name = currentUser.name;
        if (currentUser.role && currentUser.role !== 'student') {
          banner.setAttribute('target-role', currentUser.role.charAt(0).toUpperCase() + currentUser.role.slice(1));
        }
      }

      // 1. Fetch Dynamic Points & Profile Metrics from /api/points.php
      try {
        const pRes = await fetch('api/points.php');
        const pJson = await pRes.json();
        if (pJson && pJson.success && pJson.data) {
          const d = pJson.data;
          const scoreEl = document.getElementById('statReadinessScore');
          if (scoreEl && d.readinessScore) scoreEl.textContent = `${Math.round(d.readinessScore)}%`;

          const practiceEl = document.getElementById('statPracticeScore');
          if (practiceEl && d.dimensions && d.dimensions.practice) {
            practiceEl.textContent = `${d.dimensions.practice.xp || 180} pts`;
            const subEl = document.getElementById('statPracticeSub');
            if (subEl) subEl.textContent = `${d.dimensions.practice.items || 18} problems solved correctly`;
          }

          if (banner) {
            if ((!currentUser || !currentUser.name) && d.candidateName) {
              banner.setAttribute('name', d.candidateName.split(' ')[0]);
            }
            if (d.readinessScore) banner.setAttribute('readiness', String(Math.round(d.readinessScore)));
            if (d.targetRole && (!currentUser || currentUser.role === 'student')) banner.setAttribute('target-role', d.targetRole);
          }
        }
      } catch (err) {
        console.warn('Could not hydrate points from server:', err);
      }

      // 2. Hydrate Active Courses (Local Storage + Supabase Cloud)
      const renderedIds = new Set();
      let totalEnrolledCount = 2; // initial baseline

      function renderCourseCard(c) {
        if (!container || !c || !c.title) return;
        const key = c.enrollmentId || c.id || c.title;
        if (renderedIds.has(key)) return;
        renderedIds.add(key);

        const card = document.createElement('div');
        card.style.cssText = 'padding:1.25rem;background:#F0FDF4;border:1.5px solid #86EFAC;border-radius:var(--radius-md);margin-bottom:0.25rem;';
        card.innerHTML = `
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.5rem;flex-wrap:wrap;gap:0.5rem;">
            <div style="display:flex;align-items:center;gap:0.5rem;flex-wrap:wrap;">
              <span class="badge badge-success" style="font-size:0.7rem;">✓ Verified: ${c.enrollmentId || c.enrollment_id || 'MH-MSW-2026-ACTIVE'}</span>
              <span style="font-weight:800;color:#14532D;">${c.title || c.course_title || c.course_id}</span>
            </div>
            <span style="font-size:0.8125rem;font-weight:700;color:#15803D;">Active State Quota</span>
          </div>
          <div class="progress-track" style="margin-bottom:0.75rem;"><div class="progress-fill" style="width:${c.progress || 10}%;background:#16A34A;"></div></div>
          <div style="display:flex;justify-content:space-between;align-items:center;font-size:0.8125rem;color:var(--navy-600);flex-wrap:wrap;gap:0.5rem;">
            <span>Enrolled: ${c.enrolledAt || c.created_at ? new Date(c.enrolledAt || c.created_at).toLocaleDateString() : 'Active'} • Provider: ${c.provider || 'SkillPulse / MahaSwayam'}</span>
            <div style="display:flex;gap:0.4rem;">
              <a href="https://www.mahaswayam.gov.in/" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-sm" style="padding:0.25rem 0.6rem;font-size:0.75rem;">MahaSwayam ↗</a>
              <a href="${c.url || 'courses.php'}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" style="padding:0.25rem 0.6rem;font-size:0.75rem;">Access Course ↗</a>
            </div>
          </div>
        `;
        container.prepend(card);
        totalEnrolledCount++;
        const activeCountEl = document.getElementById('statActiveCourses');
        if (activeCountEl) activeCountEl.textContent = totalEnrolledCount;
      }

      // Check localStorage first
      const enrolledRaw = localStorage.getItem('skillpulse_enrolled_courses');
      if (enrolledRaw) {
        try {
          const courses = JSON.parse(enrolledRaw);
          if (Array.isArray(courses)) courses.forEach(renderCourseCard);
        } catch (e) {
          console.warn('Failed parsing local enrollments:', e);
        }
      }

      // Check live Supabase Cloud /api/enrollments.php
      try {
        const eRes = await fetch('api/enrollments.php');
        const eJson = await eRes.json();
        if (eJson && eJson.success && Array.isArray(eJson.enrollments)) {
          eJson.enrollments.forEach(en => {
            renderCourseCard({
              enrollmentId: en.enrollment_id,
              title: en.course_title || en.course_id || 'Industry Bridging Course',
              provider: 'MahaSwayam TVET Quota',
              enrolledAt: en.created_at,
              progress: 15,
              url: 'https://www.mahaswayam.gov.in/'
            });
          });
        }
      } catch (err) {
        console.warn('Could not fetch cloud enrollments:', err);
      }
    });
  </script>
</body>
</html>
