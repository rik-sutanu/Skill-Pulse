<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Skill Intelligence | Real-Time Labor Market Demand</title>
  <meta name="description" content="Explore live industry demand trends, emerging skill trajectories, and vacancy analytics across major sectors.">
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
          <span class="brand-text-sub">Market Intelligence</span>
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
            <a href="skill-intelligence.php" class="dropdown-item active" role="menuitem">
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

        <a href="dashboard.php" class="nav-link">Dashboard</a>
      </nav>

      <div class="nav-actions">
        <div class="nav-auth-container" id="navAuthContainer">
          <a href="auth.php" class="btn btn-secondary btn-sm" id="navAuthSignInBtn" aria-label="Sign In or Create Account">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span>Sign In / Register</span>
          </a>
        </div>
        <a href="skill-gap-analyzer.php" class="btn btn-primary btn-sm nav-btn-cta">Analyze Skills</a>
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
        <a href="skill-intelligence.php" class="mobile-nav-link active">Skill Intelligence</a>
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

      <!-- Title Area -->
      <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:1rem;">
        <div>
          <span class="badge badge-primary" style="margin-bottom:0.5rem;">Live Market Radar</span>
          <h1 style="font-size:2rem;font-weight:800;color:var(--navy-900);">Industry-to-Skill Intelligence Engine</h1>
          <p style="color:var(--navy-600);font-size:0.95rem;margin-top:0.25rem;">
            Real-time skill demand trajectories, sector vacancy indexes, and emerging technology adoption velocity.
          </p>
        </div>
        <div style="display:flex;align-items:center;gap:0.75rem;">
          <input type="text" id="skillSearchInput" placeholder="Filter skills or domain..." style="padding:0.625rem 1rem;border:1.5px solid var(--border);border-radius:var(--radius-md);font-size:0.875rem;width:240px;outline:none;" />
        </div>
      </div>

      <!-- Industry Growth Stats -->
      <div>
        <h2 style="font-size:1.125rem;font-weight:700;color:var(--navy-900);margin-bottom:1rem;">Sector Hiring Velocity &amp; Vacancy Pools</h2>
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:1rem;" id="industryContainer">
          <!-- Loaded via JS -->
        </div>
      </div>

      <!-- Emerging Skills Radar -->
      <div class="card" style="padding:1.75rem;">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem;flex-wrap:wrap;gap:0.5rem;">
          <div>
            <h2 style="font-size:1.25rem;font-weight:800;color:var(--navy-900);">Emerging Skills Accelerators (2026)</h2>
            <p style="font-size:0.8125rem;color:var(--navy-500);">Skills experiencing over +25% quarter-over-quarter requisition growth</p>
          </div>
          <span class="badge badge-success">Live Trend Signals</span>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(240px, 1fr));gap:1rem;" id="emergingSkillsContainer">
          <!-- Rendered via JS -->
        </div>
      </div>

      <!-- Master Skills Demand Table -->
      <div class="card" style="padding:0;overflow:hidden;">
        <div style="padding:1.25rem 1.5rem;border-bottom:1px solid var(--border);background:#fff;display:flex;justify-content:space-between;align-items:center;">
          <div>
            <h2 style="font-size:1.125rem;font-weight:700;color:var(--navy-900);">High-Demand Competencies Table</h2>
            <p style="font-size:0.8125rem;color:var(--navy-500);">Ranked by enterprise hiring volume and annualized wage premiums</p>
          </div>
          <span class="badge badge-navy" id="tableCountBadge">9 Skills Tracked</span>
        </div>

        <div style="overflow-x:auto;">
          <table class="data-table" id="skillsTable">
            <thead>
              <tr>
                <th>Skill / Competency</th>
                <th>Category</th>
                <th>Primary Industry</th>
                <th>Demand Index (0-100)</th>
                <th>YoY Growth</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="skillsTableBody">
              <!-- Rendered via JS -->
            </tbody>
          </table>
        </div>
      </div>

      <!-- Corporate Hiring Radar: Tier 1, IT Services & Non-Tech Companies -->
      <section id="corporateHiringRadarSection" style="display:flex;flex-direction:column;gap:1.5rem;margin-top:1rem;">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:1rem;">
          <div>
            <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.35rem;">
              <span class="badge badge-primary">Corporate Hiring Radar</span>
              <span class="badge badge-success">Verified Industry Demands</span>
            </div>
            <h2 style="font-size:1.6rem;font-weight:800;color:var(--navy-900);margin:0 0 0.25rem 0;">
              Tier 1, IT Services &amp; Non-Tech Hiring Demands
            </h2>
            <p style="color:var(--navy-600);font-size:0.9rem;margin:0;max-width:780px;">
              Real-world employer hiring criteria across India's top tech product giants, IT service consultancies, core automotive plants, heavy engineering infrastructure, and BFSI operations. Track candidate demands, readiness score cutoffs, and target roles.
            </p>
          </div>

          <!-- Tier Filter Buttons -->
          <div style="display:flex;gap:0.4rem;flex-wrap:wrap;" role="tablist" aria-label="Company Tier Filter" id="companyTierTabs">
            <button type="button" class="btn btn-sm btn-primary company-tier-btn active" data-tier="all">
              All Companies (17)
            </button>
            <button type="button" class="btn btn-sm btn-secondary company-tier-btn" data-tier="tier1">
              Tier 1 Tech (5)
            </button>
            <button type="button" class="btn btn-sm btn-secondary company-tier-btn" data-tier="tier2">
              IT Services &amp; Mid Tech (6)
            </button>
            <button type="button" class="btn btn-sm btn-secondary company-tier-btn" data-tier="core">
              Non-Tech &amp; Core Industry (6)
            </button>
          </div>
        </div>

        <!-- Search / Filter Strip -->
        <div style="display:flex;justify-content:space-between;align-items:center;background:#fff;padding:0.75rem 1.25rem;border:1.5px solid var(--border);border-radius:var(--radius-md);flex-wrap:wrap;gap:0.75rem;box-shadow:0 1px 3px rgba(0,0,0,0.04);">
          <div style="display:flex;align-items:center;gap:0.6rem;flex:1 1 280px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color:var(--navy-400);"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" id="companySearchInput" placeholder="Filter by company, role, required skill (e.g. SQL, Python, PLC, Excel, DSA) or city..." style="width:100%;border:none;outline:none;font-size:0.875rem;" />
          </div>
          <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.8125rem;color:var(--navy-600);">
            <span>Displaying:</span>
            <strong id="matchingCompanyCount" style="color:var(--primary-600);">17 Active Employers</strong>
          </div>
        </div>

        <!-- Corporate Grid Cards Container -->
        <div style="display:grid;grid-template-columns:repeat(auto-fill, minmax(360px, 1fr));gap:1.5rem;" id="companyGridContainer">
          <!-- Populated dynamically via JavaScript -->
        </div>
      </section>

    </div>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-bottom" style="border-top:none;padding-top:0;">
        <span>© 2026 SkillPulse Market Intelligence | Smart India Hackathon 2026</span>
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

      // 1. Render Industries
      const indCont = document.getElementById('industryContainer');
      if (indCont && data.INDUSTRIES) {
        indCont.innerHTML = data.INDUSTRIES.map(ind => `
          <div class="card" style="padding:1.25rem;">
            <div style="font-size:0.75rem;font-weight:600;color:var(--navy-500);text-transform:uppercase;">${ind.name}</div>
            <div style="font-size:1.75rem;font-weight:800;color:var(--navy-900);margin:0.25rem 0;">${ind.vacancies.toLocaleString()}+</div>
            <div style="display:flex;align-items:center;justify-content:space-between;font-size:0.75rem;">
              <span style="color:var(--navy-500);">Live Openings</span>
              <span style="color:var(--success);font-weight:700;">${ind.growth} YoY</span>
            </div>
          </div>
        `).join('');
      }

      // 2. Render Emerging Skills
      const emCont = document.getElementById('emergingSkillsContainer');
      if (emCont && data.EMERGING_SKILLS) {
        emCont.innerHTML = data.EMERGING_SKILLS.map(sk => `
          <div style="padding:1rem;background:var(--navy-50);border:1px solid var(--border);border-radius:var(--radius-md);">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:0.5rem;">
              <span style="font-weight:700;color:var(--navy-900);font-size:0.95rem;">${sk.name}</span>
              <span class="badge ${sk.urgency === 'Critical' ? 'badge-danger' : 'badge-warning'}">${sk.urgency}</span>
            </div>
            <div style="font-size:0.75rem;color:var(--navy-500);margin-bottom:0.5rem;">${sk.category}</div>
            <div style="display:flex;justify-content:space-between;align-items:center;">
              <span style="font-size:0.75rem;font-weight:600;color:var(--navy-600);">Impact: ${sk.impact}</span>
              <span style="font-size:0.875rem;font-weight:800;color:var(--success);">${sk.growth}</span>
            </div>
          </div>
        `).join('');
      }

      // 3. Render Master Skills Table with live filter
      const tableBody = document.getElementById('skillsTableBody');
      const searchInput = document.getElementById('skillSearchInput');

      function renderTable(filterText = '') {
        if (!tableBody || !data.SKILL_DEMAND_DATA) return;
        const q = filterText.toLowerCase();
        const filtered = data.SKILL_DEMAND_DATA.filter(s => 
          s.skill.toLowerCase().includes(q) || 
          s.category.toLowerCase().includes(q) || 
          s.industry.toLowerCase().includes(q)
        );

        tableBody.innerHTML = filtered.map(s => `
          <tr>
            <td style="font-weight:700;color:var(--navy-900);">${s.skill}</td>
            <td><span class="badge badge-navy">${s.category}</span></td>
            <td>${s.industry}</td>
            <td style="width:200px;">
              <div style="display:flex;align-items:center;gap:0.75rem;">
                <div class="progress-track" style="flex:1;">
                  <div class="progress-fill" style="width:${s.demand}%;"></div>
                </div>
                <span style="font-weight:700;font-size:0.8125rem;color:var(--primary-600);">${s.demand}</span>
              </div>
            </td>
            <td><span style="color:var(--success);font-weight:700;">${s.growth}</span></td>
            <td>
              <a href="skill-gap-analyzer.php" class="btn btn-outline-primary btn-sm">Audit Gap</a>
            </td>
          </tr>
        `).join('');
      }

      if (searchInput) {
        searchInput.addEventListener('input', (e) => renderTable(e.target.value));
      }
      renderTable();

      // 4. Render Corporate Hiring Radar (Tier 1, IT Services & Non-Tech)
      const companyContainer = document.getElementById('companyGridContainer');
      const companySearchInput = document.getElementById('companySearchInput');
      const countDisplay = document.getElementById('matchingCompanyCount');
      const tierBtns = document.querySelectorAll('.company-tier-btn');
      let activeTier = 'all';

      const companiesList = data.CORPORATE_HIRING_RADAR || [];

      function renderCompanies() {
        if (!companyContainer) return;
        const q = (companySearchInput ? companySearchInput.value : '').toLowerCase().trim();

        const filtered = companiesList.filter(c => {
          const matchesTier = (activeTier === 'all' || c.tierCategory === activeTier);
          if (!matchesTier) return false;

          if (!q) return true;
          const searchHaystack = [
            c.name,
            c.shortName,
            c.sector,
            c.tier,
            c.eligibility,
            c.ctcRange,
            ...(c.roles || []),
            ...(c.locations || []),
            ...(c.technicalDemands || []),
            ...(c.toolsDemands || [])
          ].join(' ').toLowerCase();

          return searchHaystack.includes(q);
        });

        if (countDisplay) {
          countDisplay.textContent = `${filtered.length} Active Employers`;
        }

        if (filtered.length === 0) {
          companyContainer.innerHTML = `
            <div style="grid-column:1/-1;text-align:center;padding:3rem;background:#fff;border:1.5px dashed var(--border);border-radius:var(--radius-md);">
              <div style="font-size:1.5rem;margin-bottom:0.5rem;">🔍 No matching company requisitions found</div>
              <p style="color:var(--navy-500);font-size:0.875rem;">Try adjusting your keyword filter or switch company tier tabs above.</p>
              <button class="btn btn-secondary btn-sm" onclick="document.getElementById('companySearchInput').value='';document.querySelector('.company-tier-btn[data-tier=all]').click();" style="margin-top:0.75rem;">Reset All Filters</button>
            </div>
          `;
          return;
        }

        companyContainer.innerHTML = filtered.map(c => `
          <div class="card" style="display:flex;flex-direction:column;justify-content:space-between;padding:1.5rem;border:1px solid var(--border);border-radius:var(--radius-lg);transition:transform 0.2s, box-shadow 0.2s;background:#fff;">
            <div>
              <!-- Header Strip -->
              <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:1rem;gap:0.75rem;">
                <div style="display:flex;align-items:center;gap:0.75rem;">
                  <div style="width:44px;height:44px;border-radius:10px;background:var(--navy-900);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:0.85rem;letter-spacing:0.5px;flex-shrink:0;">
                    ${c.initials}
                  </div>
                  <div>
                    <h3 style="font-size:1.05rem;font-weight:800;color:var(--navy-900);margin:0 0 2px 0;">${c.name}</h3>
                    <div style="font-size:0.75rem;color:var(--navy-500);">${c.sector}</div>
                  </div>
                </div>
                <span class="badge ${c.tierBadgeClass || 'badge-primary'}" style="font-size:0.72rem;white-space:nowrap;">
                  ${c.tierBadge}
                </span>
              </div>

              <!-- Key Metrics Grid -->
              <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:0.5rem;padding:0.75rem;background:var(--navy-50);border-radius:var(--radius-md);margin-bottom:1rem;border:1px solid rgba(0,0,0,0.04);">
                <div>
                  <div style="font-size:0.65rem;text-transform:uppercase;color:var(--navy-500);font-weight:700;">Openings</div>
                  <div style="font-weight:800;font-size:0.9rem;color:var(--navy-900);">${c.headcount.toLocaleString()}+</div>
                </div>
                <div>
                  <div style="font-size:0.65rem;text-transform:uppercase;color:var(--navy-500);font-weight:700;">Cutoff Score</div>
                  <div style="font-weight:800;font-size:0.9rem;color:var(--success);">&gt;${c.minReadinessScore}%</div>
                </div>
                <div>
                  <div style="font-size:0.65rem;text-transform:uppercase;color:var(--navy-500);font-weight:700;">Est. Package</div>
                  <div style="font-weight:800;font-size:0.85rem;color:var(--primary-600);white-space:nowrap;">${c.ctcRange.split(' ')[0]}</div>
                </div>
              </div>

              <!-- Open Target Roles -->
              <div style="margin-bottom:1rem;">
                <div style="font-size:0.72rem;font-weight:700;color:var(--navy-600);text-transform:uppercase;margin-bottom:0.35rem;">Target Roles:</div>
                <div style="display:flex;flex-wrap:wrap;gap:0.35rem;">
                  ${(c.roles || []).map(r => `<span style="font-size:0.75rem;padding:2px 8px;background:#F1F5F9;color:#334155;border-radius:6px;font-weight:500;">${r}</span>`).join('')}
                </div>
              </div>

              <!-- Must-Have Demands from Candidates -->
              <div style="margin-bottom:1rem;">
                <div style="font-size:0.72rem;font-weight:700;color:var(--navy-600);text-transform:uppercase;margin-bottom:0.35rem;">Candidate Technical Demands:</div>
                <div style="display:flex;flex-wrap:wrap;gap:0.35rem;">
                  ${(c.technicalDemands || []).map(sk => `<span style="font-size:0.72rem;padding:2px 7px;background:var(--primary-50);color:var(--primary-700);border-radius:4px;font-weight:600;">✓ ${sk}</span>`).join('')}
                </div>
              </div>

              <!-- Tools & Environment -->
              <div style="margin-bottom:1rem;font-size:0.78rem;color:var(--navy-600);line-height:1.4;">
                <strong style="color:var(--navy-900);">Tools / Stack:</strong> ${(c.toolsDemands || []).join(' • ')}
              </div>

              <!-- Academic Eligibility & Process -->
              <div style="padding:0.65rem 0.75rem;background:#FAF5FF;border:1px solid #E9D5FF;border-radius:6px;font-size:0.75rem;color:#6B21A8;margin-bottom:1rem;line-height:1.4;">
                <div style="font-weight:700;margin-bottom:2px;">🎓 Eligibility:</div>
                <div>${c.eligibility}</div>
              </div>
            </div>

            <!-- Card Bottom Strip -->
            <div style="border-top:1px solid var(--border);padding-top:0.875rem;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:0.5rem;">
              <div style="font-size:0.75rem;color:var(--navy-500);display:flex;align-items:center;gap:4px;">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                <span>${(c.locations || []).slice(0, 3).join(', ')}</span>
              </div>
              <div style="display:flex;gap:0.4rem;">
                <a href="practice.php" class="btn btn-secondary btn-sm" style="font-size:0.75rem;padding:0.3rem 0.65rem;" title="Practice interview questions asked at ${c.name}">
                  Practice Test
                </a>
                <a href="skill-gap-analyzer.php" class="btn btn-primary btn-sm" style="font-size:0.75rem;padding:0.3rem 0.65rem;" title="Check readiness for ${c.name}">
                  Match Cutoff
                </a>
              </div>
            </div>
          </div>
        `).join('');
      }

      // Tier filter button events
      tierBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          tierBtns.forEach(b => {
            b.classList.remove('active', 'btn-primary');
            b.classList.add('btn-secondary');
          });
          btn.classList.add('active', 'btn-primary');
          btn.classList.remove('btn-secondary');
          activeTier = btn.getAttribute('data-tier') || 'all';
          renderCompanies();
        });
      });

      if (companySearchInput) {
        companySearchInput.addEventListener('input', () => renderCompanies());
      }

      renderCompanies();
    });
  </script>
</body>
</html>
