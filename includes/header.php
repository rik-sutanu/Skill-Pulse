<?php
if (!isset($pageTitle)) $pageTitle = 'SkillPulse | Industry-to-Skill Intelligence Platform';
if (!isset($pageDesc)) $pageDesc = 'SkillPulse bridges the gap between real-time labor market demands and skill development programs. Directorate of Vocational Education & Training (DVET), Government of Maharashtra.';
if (!isset($activeNav)) $activeNav = 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDesc); ?>">
  <link rel="stylesheet" href="css/style.css">
  <!-- React 18 UMD Production Scripts -->
  <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
  <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
</head>
<body>

  <!-- Atmospheric Blurry Background Watermark -->
  <div class="site-watermark" aria-hidden="true">
    <div class="site-watermark-inner">
      <div class="site-watermark-logo">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
        </svg>
      </div>
      <div class="site-watermark-brand">
        Skill<span>Pulse</span>
      </div>
      <div class="site-watermark-tagline">
        Industry-to-Skill Intelligence
      </div>
    </div>
  </div>

  <!-- Accessible Skip to Main Content Link (WCAG AA/AAA) -->
  <a href="#main-content" class="skip-link">Skip to main content</a>

  <!-- Live Status Bar -->
  <div class="live-strip" role="region" aria-label="Live Market Updates">
    <div style="display:flex;align-items:center;gap:0.5rem;">
      <span class="live-pulse-dot" aria-hidden="true"></span>
      <span style="font-weight:700;color:var(--navy-900);">Live Labor Index:</span>
      <span>18.4L+ National Vacancies (NCS)</span>
    </div>
    <span aria-hidden="true">•</span>
    <div>
      <span style="font-weight:700;color:var(--navy-900);">Maharashtra TVET:</span>
      <span style="color:var(--primary-600);font-weight:600;">2.84L+ Vacancies (MahaSwayam)</span>
    </div>
    <span aria-hidden="true">•</span>
    <div style="display:flex;align-items:center;gap:0.35rem;">
      <span style="font-size:0.75rem;font-weight:700;color:var(--navy-700);">Lang / भाषा:</span>
      <div class="lang-toggle-group" role="group" aria-label="Language Selector">
        <button type="button" class="lang-toggle-btn active" data-lang="en" onclick="setAppLanguage('en')">EN</button>
        <button type="button" class="lang-toggle-btn" data-lang="hi" onclick="setAppLanguage('hi')">HI</button>
        <button type="button" class="lang-toggle-btn" data-lang="mr" onclick="setAppLanguage('mr')">MR</button>
      </div>
    </div>
  </div>

  <!-- Header / Navigation (Minimalist, Compact & Accessible) -->
  <header class="site-header" role="banner">
    <div class="container nav-inner">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-logo" aria-label="SkillPulse Home">
        <div class="brand-icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
          </svg>
        </div>
        <div>
          <span>Skill<span style="color:var(--primary-600);">Pulse</span></span>
          <span class="brand-text-sub">Industry-to-Skill Intelligence</span>
        </div>
      </a>

      <!-- Desktop Compact Grouped Navigation -->
      <nav class="nav-links" role="navigation" aria-label="Main Navigation">
        <!-- 1. Home -->
        <a href="index.php" class="nav-link <?php echo $activeNav === 'home' ? 'active' : ''; ?>">Home</a>

        <!-- 2. Intelligence Dropdown -->
        <div class="nav-item-dropdown">
          <button class="nav-dropdown-btn <?php echo in_array($activeNav, ['intelligence', 'government', 'employer', 'how-it-works', 'data-sources']) ? 'active' : ''; ?>" aria-haspopup="true" aria-expanded="false" id="btnDropdownIntelligence">
            <span>Intelligence</span>
            <svg class="dropdown-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <div class="nav-dropdown-menu" role="menu" aria-labelledby="btnDropdownIntelligence">
            <a href="how-it-works.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">How It Works <span class="badge badge-primary" style="font-size:10px;padding:2px 5px;">Methodology</span></span>
                <span class="dropdown-item-desc">Live Labor Index &amp; Readiness Score formula</span>
              </div>
            </a>
            <a href="data-sources.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Data Sources &amp; Cadence</span>
                <span class="dropdown-item-desc">NCS, MahaSwayam, MSBTE sync pipelines</span>
              </div>
            </a>
            <a href="skill-intelligence.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Skill Intelligence</span>
                <span class="dropdown-item-desc">Real-time demand trajectories &amp; vacancy pools</span>
              </div>
            </a>
            <a href="government.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Maharashtra &amp; Regional Portal</span>
                <span class="dropdown-item-desc">DVET, MahaSwayam, MSSDS district metrics</span>
              </div>
            </a>
            <a href="employer.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Employer Portal</span>
                <span class="dropdown-item-desc">Requisition builder &amp; candidate matching</span>
              </div>
            </a>
            <a href="privacy.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Privacy &amp; Security <span class="badge badge-primary" style="font-size:10px;padding:2px 6px;background:rgba(16,185,129,0.2);color:#10b981;border:1px solid rgba(16,185,129,0.4);">DPDP</span></span>
                <span class="dropdown-item-desc">DPDP Act 2023, ADV compliance &amp; CERT-In logs</span>
              </div>
            </a>
            <a href="my-data.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">My Data &amp; Rights <span class="badge badge-cyan" style="font-size:10px;padding:2px 6px;">DSR Self-Service</span></span>
                <span class="dropdown-item-desc">Export data (§11), inspect vault &amp; account erasure (§12)</span>
              </div>
            </a>
          </div>
        </div>

        <!-- 3. Tools & Simulators Dropdown -->
        <div class="nav-item-dropdown">
          <button class="nav-dropdown-btn <?php echo in_array($activeNav, ['analyzer', 'resume-scanner', 'curriculum', 'roadmap']) ? 'active' : ''; ?>" aria-haspopup="true" aria-expanded="false" id="btnDropdownTools">
            <span>Tools &amp; Simulators</span>
            <svg class="dropdown-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <div class="nav-dropdown-menu" role="menu" aria-labelledby="btnDropdownTools">
            <a href="resume-scanner.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">AI Resume Scanner <span class="badge badge-primary" style="font-size:10px;padding:2px 6px;background:rgba(201,162,39,0.2);color:#C9A227;border:1px solid rgba(201,162,39,0.4);">NLP</span></span>
                <span class="dropdown-item-desc">Extract skills, detect job gaps &amp; bridge courses</span>
              </div>
            </a>
            <a href="skill-gap-analyzer.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Skill Gap Analyzer <span class="badge badge-primary" style="font-size:10px;padding:2px 6px;">React</span></span>
                <span class="dropdown-item-desc">Interactive Job Readiness Score &amp; gap radar</span>
              </div>
            </a>
            <a href="training-curriculum.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Curriculum Simulator <span class="badge badge-cyan" style="font-size:10px;padding:2px 6px;">React</span></span>
                <span class="dropdown-item-desc">Simulate elective additions &amp; alignment boost</span>
              </div>
            </a>
            <a href="career-roadmap.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Career Roadmap</span>
                <span class="dropdown-item-desc">Structured milestones with progress checklists</span>
              </div>
            </a>
          </div>
        </div>

        <!-- 4. Learning & Practice Dropdown -->
        <div class="nav-item-dropdown">
          <button class="nav-dropdown-btn <?php echo in_array($activeNav, ['courses', 'practice', 'experts']) ? 'active' : ''; ?>" aria-haspopup="true" aria-expanded="false" id="btnDropdownLearning">
            <span>Learning &amp; Practice</span>
            <svg class="dropdown-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <div class="nav-dropdown-menu" role="menu" aria-labelledby="btnDropdownLearning">
            <a href="courses.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Bridging Courses</span>
                <span class="dropdown-item-desc">Domain courses to bridge identified gaps</span>
              </div>
            </a>
            <a href="practice.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Practice Arena <span class="badge badge-primary" style="font-size:10px;padding:2px 6px;">React</span></span>
                <span class="dropdown-item-desc">Corporate interview screening &amp; code tests</span>
              </div>
            </a>
            <a href="experts.php" class="dropdown-item" role="menuitem">
              <div>
                <span class="dropdown-item-title">Industry Mentors</span>
                <span class="dropdown-item-desc">1-on-1 resume reviews &amp; mock interviews</span>
              </div>
            </a>
          </div>
        </div>

        <!-- 5. Dashboard -->
        <a href="dashboard.php" class="nav-link <?php echo $activeNav === 'dashboard' ? 'active' : ''; ?>">Dashboard</a>
      </nav>

      <!-- Right Action Items: Auth & Mobile Menu -->
      <div class="nav-actions">
        <div class="nav-auth-container" id="navAuthContainer">
          <a href="auth.php" class="btn btn-secondary btn-sm" id="navAuthSignInBtn" aria-label="Sign In or Create Account">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span>Sign In / Register</span>
          </a>
        </div>
        <a href="skill-gap-analyzer.php" class="btn btn-primary btn-sm" style="display:none;@media(min-width:640px){display:inline-flex;}">
          <span>Test Skills</span>
        </a>
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Open Navigation Menu" aria-expanded="false" aria-controls="mobileNavDrawer">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          </svg>
        </button>
      </div>
    </div>
  </header>

  <!-- Accessible Mobile Drawer -->
  <div class="mobile-nav-drawer" id="mobileNavDrawer" role="dialog" aria-modal="true" aria-label="Mobile Navigation Menu">
    <div class="mobile-nav-content">
      <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;padding-bottom:0.75rem;border-bottom:1px solid var(--border);">
        <span style="font-weight:800;font-size:1.1rem;color:var(--navy-900);">Navigation</span>
        <button id="mobileDrawerClose" style="background:none;border:none;cursor:pointer;padding:4px;" aria-label="Close menu">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
      </div>

      <div style="display:flex;flex-direction:column;gap:0.35rem;">
        <a href="index.php" class="mobile-nav-link <?php echo $activeNav === 'home' ? 'active' : ''; ?>">Home</a>
        <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;margin:0.75rem 0 0.25rem 0.5rem;">Intelligence &amp; Governance</div>
        <a href="how-it-works.php" class="mobile-nav-link <?php echo $activeNav === 'how-it-works' ? 'active' : ''; ?>">How It Works (Methodology)</a>
        <a href="data-sources.php" class="mobile-nav-link <?php echo $activeNav === 'data-sources' ? 'active' : ''; ?>">Data Sources &amp; Pipelines</a>
        <a href="skill-intelligence.php" class="mobile-nav-link <?php echo $activeNav === 'intelligence' ? 'active' : ''; ?>">Skill Intelligence</a>
        <a href="government.php" class="mobile-nav-link <?php echo $activeNav === 'government' ? 'active' : ''; ?>">Maharashtra &amp; Regional Portal</a>
        <a href="employer.php" class="mobile-nav-link <?php echo $activeNav === 'employer' ? 'active' : ''; ?>">Employer Portal</a>
        <a href="privacy.php" class="mobile-nav-link <?php echo $activeNav === 'privacy' ? 'active' : ''; ?>">Privacy &amp; Security (DPDP)</a>
        <a href="my-data.php" class="mobile-nav-link <?php echo $activeNav === 'my-data' ? 'active' : ''; ?>">My Data &amp; Rights (DPDP §11-12)</a>

        <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;margin:0.75rem 0 0.25rem 0.5rem;">Tools &amp; Simulators</div>
        <a href="resume-scanner.php" class="mobile-nav-link <?php echo $activeNav === 'resume-scanner' ? 'active' : ''; ?>">AI Resume Scanner &amp; Bridge</a>
        <a href="skill-gap-analyzer.php" class="mobile-nav-link <?php echo $activeNav === 'analyzer' ? 'active' : ''; ?>">Skill Gap Analyzer (React)</a>
        <a href="training-curriculum.php" class="mobile-nav-link <?php echo $activeNav === 'curriculum' ? 'active' : ''; ?>">Curriculum Simulator (React)</a>
        <a href="career-roadmap.php" class="mobile-nav-link <?php echo $activeNav === 'roadmap' ? 'active' : ''; ?>">Career Roadmap</a>

        <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;margin:0.75rem 0 0.25rem 0.5rem;">Learning &amp; Practice</div>
        <a href="courses.php" class="mobile-nav-link <?php echo $activeNav === 'courses' ? 'active' : ''; ?>">Courses Catalog</a>
        <a href="practice.php" class="mobile-nav-link <?php echo $activeNav === 'practice' ? 'active' : ''; ?>">Interview Practice Arena (React)</a>
        <a href="experts.php" class="mobile-nav-link <?php echo $activeNav === 'experts' ? 'active' : ''; ?>">Industry Experts</a>

        <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;margin:0.75rem 0 0.25rem 0.5rem;">User Account</div>
        <a href="dashboard.php" class="mobile-nav-link <?php echo $activeNav === 'dashboard' ? 'active' : ''; ?>">Learner Dashboard</a>
        <div id="mobileAuthContainer">
          <a href="auth.php" class="btn btn-primary" id="mobileAuthSignInBtn" style="margin-top:0.75rem;width:100%;text-align:center;">Sign In / Register</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function setAppLanguage(lang) {
      localStorage.setItem('skillpulse_lang', lang);
      document.querySelectorAll('.lang-toggle-btn').forEach(b => {
        b.classList.toggle('active', b.dataset.lang === lang);
      });
      // Language indicator notification
      const labels = { en: 'English', hi: 'हिन्दी (Hindi)', mr: 'मराठी (Marathi)' };
      if (window.SkillPulse && window.SkillPulse.toast) {
        SkillPulse.toast(`Language switched to ${labels[lang] || lang}`, 'info');
      }
    }
    document.addEventListener('DOMContentLoaded', () => {
      const savedLang = localStorage.getItem('skillpulse_lang') || 'en';
      document.querySelectorAll('.lang-toggle-btn').forEach(b => {
        b.classList.toggle('active', b.dataset.lang === savedLang);
      });
    });
  </script>

