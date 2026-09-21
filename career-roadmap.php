<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Career Roadmap | SkillPulse Milestone Pathways</title>
  <meta name="description" content="Step-by-step career milestone pathways designed by industry practitioners to guide you from foundational to production readiness.">
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
          <span class="brand-text-sub">Career Roadmap</span>
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
          <button class="nav-dropdown-btn active" aria-haspopup="true" aria-expanded="false" id="btnDropdownTools">
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
            <a href="career-roadmap.php" class="dropdown-item active" role="menuitem">
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

        <a href="dashboard.php" class="nav-link">Dashboard</a>
      </nav>

      <div class="nav-actions">
        <div class="nav-auth-container" id="navAuthContainer">
          <a href="auth.php" class="btn btn-secondary btn-sm" id="navAuthSignInBtn" aria-label="Sign In or Create Account">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span>Sign In / Register</span>
          </a>
        </div>
        <button class="btn btn-primary btn-sm nav-btn-cta" onclick="SkillPulse.toast('Roadmap progress saved!','success')">Save Progress</button>
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
        <a href="career-roadmap.php" class="mobile-nav-link active">Career Roadmap</a>

        <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;margin:0.75rem 0 0.25rem 0.5rem;">Learning &amp; Practice</div>
        <a href="courses.php" class="mobile-nav-link">Courses Catalog</a>
        <a href="practice.php" class="mobile-nav-link">Interview Practice Arena</a>
        <a href="experts.php" class="mobile-nav-link">Industry Experts</a>

        <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;margin:0.75rem 0 0.25rem 0.5rem;">User Account</div>
        <a href="dashboard.php" class="mobile-nav-link">Learner Dashboard</a>
        <div id="mobileAuthContainer" style="margin-top:0.75rem;">
          <a href="auth.php" class="btn btn-primary" id="mobileAuthSignInBtn" style="width:100%;text-align:center;">Sign In / Register</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <main style="flex:1;padding:2.5rem 0 4rem 0;">
    <div class="container" style="display:flex;flex-direction:column;gap:2.5rem;">

      <!-- Header -->
      <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:1.5rem;">
        <div>
          <span class="badge badge-primary" style="margin-bottom:0.5rem;">Structured Milestones</span>
          <h1 style="font-size:2rem;font-weight:800;color:var(--navy-900);">Industry Career Roadmaps</h1>
          <p style="color:var(--navy-600);font-size:0.95rem;margin-top:0.25rem;">
            Step-by-step milestones built to transition students and career switchers directly into hiring pipeline readiness.
          </p>
        </div>

        <div style="display:flex;align-items:center;gap:0.75rem;">
          <label style="font-size:0.875rem;font-weight:700;color:var(--navy-800);">Select Track:</label>
          <select id="roadmapTrackSelect" style="padding:0.625rem 1rem;border:1.5px solid var(--border);border-radius:var(--radius-md);font-weight:600;color:var(--navy-900);background:#fff;outline:none;cursor:pointer;">
            <!-- Rendered by JS -->
          </select>
        </div>
      </div>

      <!-- Roadmap Header Card -->
      <div class="card" id="trackHeaderCard" style="background:linear-gradient(135deg, var(--navy-900), var(--navy-800));color:#fff;">
        <!-- Filled by JS -->
      </div>

      <!-- Steps Timeline -->
      <div id="roadmapStepsContainer" style="display:flex;flex-direction:column;gap:1.25rem;">
        <!-- Filled by JS -->
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-bottom" style="border-top:none;padding-top:0;">
        <span>© 2026 SkillPulse Career Pathways | Smart India Hackathon 2026</span>
        <span>Problem Statement 26134 | Team HACK.FORCE</span>
      </div>
    </div>
  </footer>

  <script src="js/data.js"></script>
  <script src="js/app.js"></script>
  <script src="js/pulseai.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const data = window.SKILLPULSE_DATA || {};
      const trackSelect = document.getElementById('roadmapTrackSelect');
      const trackHeaderCard = document.getElementById('trackHeaderCard');
      const stepsContainer = document.getElementById('roadmapStepsContainer');

      if (!trackSelect || !data.JOB_ROLES) return;

      trackSelect.innerHTML = data.JOB_ROLES.map(r => `
        <option value="${r.id}">${r.title}</option>
      `).join('');

      function renderRoadmap(roleId) {
        const role = data.JOB_ROLES.find(r => r.id === roleId) || data.JOB_ROLES[0];
        
        // Header
        trackHeaderCard.innerHTML = `
          <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:1rem;">
            <div>
              <span class="badge badge-cyan" style="margin-bottom:0.5rem;">Target Specialization</span>
              <h2 style="font-size:1.6rem;font-weight:800;color:#fff;">${role.title}</h2>
              <p style="color:#CBD5E1;max-width:640px;font-size:0.95rem;margin-top:0.35rem;">${role.description}</p>
            </div>
            <div style="text-align:right;">
              <span style="font-size:0.75rem;color:#94A3B8;display:block;">Median Compensation</span>
              <span style="font-size:1.25rem;font-weight:800;color:var(--cyan-400);">${role.salaryRange}</span>
            </div>
          </div>
        `;

        // Steps
        stepsContainer.innerHTML = role.recommendedPath.map(step => `
          <div class="card" style="display:flex;align-items:flex-start;gap:1.25rem;padding:1.5rem;transition:all 0.2s;">
            <div style="width:40px;height:40px;border-radius:12px;background:var(--primary-50);color:var(--primary-600);font-weight:800;font-size:1.1rem;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              ${step.step}
            </div>
            <div style="flex:1;">
              <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:0.5rem;">
                <h3 style="font-size:1.1rem;font-weight:700;color:var(--navy-900);">${step.title}</h3>
                <div style="display:flex;gap:0.5rem;align-items:center;">
                  <span class="badge badge-navy">⏱ ${step.time}</span>
                  <span class="badge ${step.difficulty.includes('Advanced') ? 'badge-danger' : step.difficulty.includes('Intermediate') ? 'badge-warning' : 'badge-success'}">${step.difficulty}</span>
                </div>
              </div>
              <p style="font-size:0.875rem;color:var(--navy-600);margin-top:0.5rem;">
                Key milestones include hands-on labs, peer-reviewed mini-projects, and standard industry assessment verification.
              </p>
              <div style="display:flex;gap:1rem;margin-top:1rem;align-items:center;">
                <label style="display:flex;align-items:center;gap:0.5rem;font-size:0.8125rem;font-weight:600;color:var(--navy-700);cursor:pointer;">
                  <input type="checkbox" onchange="SkillPulse.toast('Milestone marked as complete!','success')" style="width:16px;height:16px;accent-color:var(--primary-600);">
                  <span>Mark Completed</span>
                </label>
                <a href="courses.php" class="btn btn-secondary btn-sm" style="font-size:0.75rem;padding:0.25rem 0.65rem;">Recommended Course →</a>
              </div>
            </div>
          </div>
        `).join('');
      }

      trackSelect.addEventListener('change', () => renderRoadmap(trackSelect.value));
      renderRoadmap(trackSelect.value);
    });
  </script>
</body>
</html>
