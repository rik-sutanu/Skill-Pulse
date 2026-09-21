<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employer Portal | SkillPulse Enterprise Matching</title>
  <meta name="description" content="Define talent skill weightings, post verified requisitions, and access pre-screened candidates with objective readiness scores.">
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
          <span class="brand-text-sub">Employer Portal</span>
        </div>
      </a>

      <!-- Desktop Nav -->
      <nav class="nav-links" role="navigation" aria-label="Main Navigation">
        <a href="index.php" class="nav-link">Home</a>

        <!-- Intelligence Dropdown -->
        <div class="nav-item-dropdown">
          <button class="nav-dropdown-btn active" aria-haspopup="true" aria-expanded="false" id="btnDropdownIntelligence">
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
            <a href="employer.php" class="dropdown-item active" role="menuitem">
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

        <a href="dashboard.php" class="nav-link">Dashboard</a>
      </nav>

      <div class="nav-actions">
        <div class="nav-auth-container" id="navAuthContainer">
          <a href="auth.php" class="btn btn-secondary btn-sm" id="navAuthSignInBtn" aria-label="Sign In or Create Account">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span>Sign In / Register</span>
          </a>
        </div>
        <button class="btn btn-primary btn-sm nav-btn-cta" onclick="SkillPulse.toast('Requisition published to NCS &amp; SkillPulse pools!','success')">Publish Requisition</button>
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
        <a href="employer.php" class="mobile-nav-link active">Employer Portal</a>

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

      <div>
        <span class="badge badge-primary" style="margin-bottom:0.5rem;">Enterprise Talent Mobilization</span>
        <h1 style="font-size:2rem;font-weight:800;color:var(--navy-900);">Industry Requisition &amp; Match Builder</h1>
        <p style="color:var(--navy-600);font-size:0.95rem;max-width:760px;margin-top:0.25rem;">
          Define exact technical requirements and let SkillPulse match verified students scoring above your custom readiness threshold.
        </p>
      </div>

      <div style="display:grid;grid-template-columns:1fr;gap:2rem;" class="employer-grid">
        <!-- Requisition Form -->
        <div class="card" style="padding:2rem;">
          <h2 style="font-size:1.25rem;font-weight:800;color:var(--navy-900);margin-bottom:1.25rem;">Build Candidate Skill Spec</h2>

          <div style="display:flex;flex-direction:column;gap:1.25rem;">
            <div>
              <label style="display:block;font-size:0.875rem;font-weight:700;color:var(--navy-900);margin-bottom:0.35rem;">Job Title / Designation:</label>
              <input type="text" value="Junior Data Analyst (Fresher / 0-1 Yr)" style="width:100%;padding:0.75rem 1rem;border:1.5px solid var(--border);border-radius:var(--radius-md);font-size:0.95rem;" />
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
              <div>
                <label style="display:block;font-size:0.875rem;font-weight:700;color:var(--navy-900);margin-bottom:0.35rem;">Sector:</label>
                <select style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:var(--radius-md);font-size:0.875rem;">
                  <option>Information Technology &amp; Software</option>
                  <option>BFSI &amp; Fintech</option>
                  <option>Healthcare &amp; Biotech</option>
                  <option>Automotive &amp; EV</option>
                </select>
              </div>
              <div>
                <label style="display:block;font-size:0.875rem;font-weight:700;color:var(--navy-900);margin-bottom:0.35rem;">Target Location:</label>
                <input type="text" value="Pune / Mumbai / Hybrid" style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:var(--radius-md);font-size:0.875rem;" />
              </div>
            </div>

            <div>
              <label style="display:block;font-size:0.875rem;font-weight:700;color:var(--navy-900);margin-bottom:0.5rem;">Required Competencies (Weighted Match):</label>
              <div style="display:flex;flex-wrap:wrap;gap:0.5rem;">
                <span class="badge badge-primary" style="padding:0.5rem 0.75rem;font-size:0.8125rem;">SQL (25%) ✕</span>
                <span class="badge badge-primary" style="padding:0.5rem 0.75rem;font-size:0.8125rem;">Python (25%) ✕</span>
                <span class="badge badge-primary" style="padding:0.5rem 0.75rem;font-size:0.8125rem;">Power BI (20%) ✕</span>
                <span class="badge badge-cyan" style="padding:0.5rem 0.75rem;font-size:0.8125rem;">Excel Advanced (15%) ✕</span>
                <span class="badge badge-navy" style="padding:0.5rem 0.75rem;font-size:0.8125rem;">+ Add Required Skill</span>
              </div>
            </div>

            <div style="padding:1.25rem;background:var(--navy-50);border-radius:var(--radius-md);border:1px solid var(--border);">
              <div style="display:flex;justify-content:space-between;align-items:center;">
                <div>
                  <div style="font-weight:700;color:var(--navy-900);">Matched Pre-Screened Candidates:</div>
                  <p style="font-size:0.8125rem;color:var(--navy-500);">Verified college &amp; TVET students scoring &gt;80% readiness</p>
                </div>
                <div style="font-size:1.85rem;font-weight:800;color:var(--success);">1,420</div>
              </div>
            </div>

            <button class="btn btn-primary btn-lg" onclick="SkillPulse.toast('Requisition dispatched! Candidates notified.','success')">Mobilize Talent Pool</button>
          </div>
        </div>
      <!-- Benchmark Corporate Demand Standards (Tier 1, IT Services & Non-Tech) -->
      <div class="card" style="padding:2rem;">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem;">
          <div>
            <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.25rem;">
              <span class="badge badge-primary">Industry Hiring Standards</span>
              <span class="badge badge-success">Live Enterprise Matrix</span>
            </div>
            <h2 style="font-size:1.35rem;font-weight:800;color:var(--navy-900);margin:0;">
              Tier 1 to Core Non-Tech Requisition Benchmarks
            </h2>
            <p style="color:var(--navy-600);font-size:0.875rem;margin:0.25rem 0 0 0;">
              Compare your talent specifications with standard qualification cutoffs, mandatory toolchains, and compensation established by India's top employers.
            </p>
          </div>
          <a href="skill-intelligence.php#corporateHiringRadarSection" class="btn btn-secondary btn-sm">
            Explore 17 Companies in Market Radar &rarr;
          </a>
        </div>

        <div style="overflow-x:auto;">
          <table class="data-table" style="width:100%;font-size:0.875rem;">
            <thead>
              <tr>
                <th>Employer &amp; Sector</th>
                <th>Tier</th>
                <th>Benchmark Roles</th>
                <th>Readiness Cutoff</th>
                <th>Mandatory Candidate Competencies</th>
                <th>Typical Package</th>
              </tr>
            </thead>
            <tbody id="employerBenchmarkTableBody">
              <!-- Rendered via JS -->
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-bottom" style="border-top:none;padding-top:0;">
        <span>© 2026 SkillPulse Employer Requisitions | Smart India Hackathon 2026</span>
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
      const tbody = document.getElementById('employerBenchmarkTableBody');
      if (tbody && data.CORPORATE_HIRING_RADAR) {
        tbody.innerHTML = data.CORPORATE_HIRING_RADAR.map(c => `
          <tr>
            <td>
              <div style="font-weight:800;color:var(--navy-900);">${c.name}</div>
              <div style="font-size:0.75rem;color:var(--navy-500);">${c.sector} • ${c.locations.slice(0, 2).join(', ')}</div>
            </td>
            <td>
              <span class="badge ${c.tierBadgeClass || 'badge-primary'}" style="font-size:0.72rem;">${c.tierBadge}</span>
            </td>
            <td style="color:var(--navy-700);font-weight:600;">
              ${c.roles.slice(0, 2).join(' / ')}
            </td>
            <td>
              <span class="badge badge-success" style="font-weight:800;">&gt;${c.minReadinessScore}% Cutoff</span>
            </td>
            <td>
              <div style="display:flex;flex-wrap:wrap;gap:0.3rem;">
                ${c.technicalDemands.slice(0, 3).map(sk => `<span style="font-size:0.72rem;padding:2px 6px;background:var(--navy-50);border:1px solid var(--border);border-radius:4px;">${sk}</span>`).join('')}
              </div>
            </td>
            <td style="font-weight:700;color:var(--primary-600);white-space:nowrap;">
              ${c.ctcRange}
            </td>
          </tr>
        `).join('');
      }
    });
  </script>
</body>
</html>
