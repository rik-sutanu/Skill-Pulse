<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Skill Gap Analyzer | SkillPulse Diagnostic Engine</title>
  <meta name="description" content="Calculate your Job Readiness Score, identify critical skill gaps, and generate customized milestone learning paths.">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- Header -->
  <header class="site-header" role="banner">
    <div class="container nav-inner">
      <a href="index.php" class="brand-logo" aria-label="SkillPulse Home">
        <div class="brand-icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
          </svg>
        </div>
        <div>
          <span>Skill<span style="color:var(--primary-600);">Pulse</span></span>
          <span class="brand-text-sub">Skill Gap Analyzer</span>
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
            <a href="skill-gap-analyzer.php" class="dropdown-item active" role="menuitem">
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

        <a href="dashboard.php" class="nav-link">Dashboard</a>
      </nav>

      <div class="nav-actions">
        <div class="nav-auth-container" id="navAuthContainer">
          <a href="auth.php" class="btn btn-secondary btn-sm" id="navAuthSignInBtn" aria-label="Sign In or Create Account">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span>Sign In / Register</span>
          </a>
        </div>
        <a href="career-roadmap.php" class="btn btn-primary btn-sm nav-btn-cta">Career Roadmap</a>
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mobileNavDrawer">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </button>
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
        <a href="skill-gap-analyzer.php" class="mobile-nav-link active">Skill Gap Analyzer</a>
        <a href="training-curriculum.php" class="mobile-nav-link">Curriculum Simulator</a>
        <a href="career-roadmap.php" class="mobile-nav-link">Career Roadmap</a>

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
    <div class="container" style="display:flex;flex-direction:column;gap:2rem;">

      <!-- Header Section -->
      <div>
        <span class="badge badge-primary" style="margin-bottom:0.5rem;">Diagnostic Diagnostic Module</span>
        <h1 style="font-size:2rem;font-weight:800;color:var(--navy-900);">Job Readiness &amp; Skill Gap Calculator</h1>
        <p style="color:var(--navy-600);font-size:0.95rem;max-width:720px;margin-top:0.25rem;">
          Select your target career track and check off your current verified competencies. Our weighted algorithm immediately calculates your employer alignment score and details what skills you must prioritize.
        </p>
      </div>

      <!-- Main Two Column Grid -->
      <div style="display:grid;grid-template-columns:1fr;gap:2rem;align-items:start;" class="analyzer-grid">

        <!-- Column 1: Inputs & Checkboxes -->
        <div class="card" style="padding:1.75rem;">
          <div style="margin-bottom:1.5rem;">
            <label for="roleSelect" style="display:block;font-size:0.875rem;font-weight:700;color:var(--navy-900);margin-bottom:0.5rem;">
              1. Choose Target Industry Role:
            </label>
            <select id="roleSelect" style="width:100%;padding:0.75rem 1rem;border:1.5px solid var(--border);border-radius:var(--radius-md);font-size:0.95rem;font-weight:600;color:var(--navy-900);background:#fff;outline:none;cursor:pointer;">
              <!-- Loaded via JavaScript -->
            </select>
          </div>

          <div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.75rem;">
              <span style="font-size:0.875rem;font-weight:700;color:var(--navy-900);">2. Check Off Verified Competencies:</span>
              <span style="font-size:0.75rem;color:var(--navy-500);">Live weight updates</span>
            </div>
            
            <div id="skillList" style="display:flex;flex-direction:column;gap:0.5rem;">
              <!-- Dynamic checkboxes rendered here -->
            </div>
          </div>
        </div>

        <!-- Column 2: Result Gauge & Gap Report -->
        <div style="display:flex;flex-direction:column;gap:1.5rem;">
          
          <!-- Readiness Score Card -->
          <div class="card" style="text-align:center;padding:2rem;">
            <span class="badge badge-navy" style="margin-bottom:1rem;">Real-Time Diagnostic Score</span>
            
            <div class="gauge-wrapper">
              <svg class="gauge-svg" viewBox="0 0 160 160">
                <circle class="gauge-bg" cx="80" cy="80" r="70"></circle>
                <circle class="gauge-meter" id="scoreMeter" cx="80" cy="80" r="70"></circle>
              </svg>
              <div class="gauge-center">
                <div class="gauge-val" id="scoreVal">0%</div>
                <div class="gauge-label">Match Score</div>
              </div>
            </div>

            <div style="margin-top:1.25rem;">
              <span class="badge badge-primary" id="statusBadge" style="font-size:0.875rem;padding:0.35rem 0.85rem;">Calculating...</span>
              <p style="font-size:0.8125rem;color:var(--navy-500);margin-top:0.5rem;">Candidates scoring &gt;80% receive direct interview fast-tracks from hiring partners.</p>
            </div>

            <div style="display:flex;gap:0.75rem;margin-top:1.5rem;justify-content:center;">
              <button class="btn btn-primary btn-sm" onclick="SkillPulse.toast('Readiness score saved to your student profile!','success')">Save Benchmark</button>
              <a href="courses.php" class="btn btn-secondary btn-sm">Find Bridging Courses</a>
            </div>
          </div>

          <!-- Missing Skills Priority Card -->
          <div class="card">
            <h3 style="font-size:1.05rem;font-weight:700;color:var(--navy-900);margin-bottom:0.75rem;display:flex;align-items:center;gap:0.5rem;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--danger)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
              Identified Skill Gaps
            </h3>
            <p style="font-size:0.8125rem;color:var(--navy-500);margin-bottom:1rem;">Acquiring these high-weight skills will yield the largest immediate score jump:</p>
            <div id="missingSkillsList">
              <!-- Rendered via JS -->
            </div>
          </div>

          <!-- Learning Pathway Steps -->
          <div class="card">
            <h3 style="font-size:1.05rem;font-weight:700;color:var(--navy-900);margin-bottom:0.75rem;display:flex;align-items:center;gap:0.5rem;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--primary-600)" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
              Target Career Milestone Pathway
            </h3>
            <div id="roadmapList">
              <!-- Rendered via JS -->
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
        <span>© 2026 SkillPulse Diagnostic Engine | Smart India Hackathon 2026</span>
        <span>Problem Statement 26134 | Team HACK.FORCE</span>
      </div>
    </div>
  </footer>

  <script src="js/data.js"></script>
  <script src="js/app.js"></script>
  <script src="js/pulseai.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      SkillPulse.initSkillGapAnalyzer();
    });
  </script>
</body>
</html>
