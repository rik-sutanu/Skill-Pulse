<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SkillPulse | Industry-to-Skill Intelligence & Curriculum Alignment Platform</title>
  <meta name="description" content="SkillPulse bridges the gap between real-time labor market demands and skill development programs. Smart India Hackathon 2026 - Problem Statement 26134.">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- Live Status Bar -->
  <div class="live-strip">
    <div style="display:flex;align-items:center;gap:0.5rem;">
      <span class="live-pulse-dot"></span>
      <span style="font-weight:700;color:var(--navy-900);">Live Labor Pulse:</span>
      <span>18.4L+ National Vacancies active on NCS</span>
    </div>
    <span>•</span>
    <div>
      <span style="font-weight:700;color:var(--navy-900);">Emerging Demand Surge:</span>
      <span style="color:var(--primary-600);font-weight:600;">GenAI &amp; LLMOps (+48%)</span>
    </div>
    <span>•</span>
    <div>
      <span style="font-weight:700;color:var(--navy-900);">Institutional Alignment:</span>
      <span>Average 78% Match</span>
    </div>
  </div>

  <!-- Header / Navigation -->
  <header class="site-header" role="banner">
    <div class="container nav-inner">
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

      <!-- Desktop Nav -->
      <nav class="nav-links" role="navigation" aria-label="Main Navigation">
        <a href="index.php" class="nav-link active">Home</a>

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

        <a href="dashboard.php" class="nav-link">Dashboard</a>
      </nav>

      <!-- Actions -->
      <div class="nav-actions">
        <div class="nav-auth-container" id="navAuthContainer">
          <a href="auth.php" class="btn btn-secondary btn-sm" id="navAuthSignInBtn" aria-label="Sign In or Create Account">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span>Sign In / Register</span>
          </a>
        </div>
        <a href="employer.php" class="btn btn-secondary btn-sm nav-btn-employer">For Employers</a>
        <a href="skill-gap-analyzer.php" class="btn btn-primary btn-sm nav-btn-cta">
          <span>Analyze Skills</span>
        </a>
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mobileNavDrawer">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          </svg>
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
        <a href="index.php" class="mobile-nav-link active">Home</a>
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
        <a href="dashboard.php" class="mobile-nav-link">Learner Dashboard</a>
        <div id="mobileAuthContainer" style="margin-top:0.75rem;">
          <a href="auth.php" class="btn btn-primary" id="mobileAuthSignInBtn" style="width:100%;text-align:center;">Sign In / Register</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Website Opening Screen: 3-Phase Intro Animation (Appears at time of opening website) -->
  <div class="website-intro-overlay" id="websiteIntroOverlay" role="dialog" aria-label="SkillPulse Welcome Animation" aria-modal="true">
    <button class="intro-skip-btn" onclick="dismissIntroOverlay()" aria-label="Skip intro animation">
      Skip Intro &rarr;
    </button>
    <div class="skillpulse-intro-stage" role="img" aria-label="SkillPulse Brand Intro Animation">
      <div class="intro-stage-bg" aria-hidden="true"></div>

      <!-- Phase 1: Scattered Gold Dots Across Full Screen (0s - 2.2s) -->
      <div class="intro-dots-layer" aria-hidden="true">
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
        <span class="intro-dot"></span>
      </div>

      <!-- Phase 2: Bars Growing (2.0s - 4.35s) -->
      <div class="intro-bars-layer" aria-hidden="true">
        <div class="intro-bar"></div>
        <div class="intro-bar"></div>
        <div class="intro-bar"></div>
        <div class="intro-bar"></div>
        <div class="intro-bar"></div>
        <div class="intro-bar"></div>
        <div class="intro-bar"></div>
      </div>

      <!-- Phase 3: Brand Logo Reveal (Starts 4.35s) -->
      <div class="intro-phase3">
        <div class="intro-logo-tile">
          <svg width="46" height="46" viewBox="0 0 46 46" fill="none" class="intro-pulse-svg" aria-hidden="true">
            <path d="M4 25 H14 L18.5 13 L24.5 33 L29 25 H42" 
                  fill="none" 
                  stroke="#E8CB6C" 
                  stroke-width="3.4" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  class="intro-pulse-path" />
          </svg>
        </div>
        <h2 class="intro-wordmark">Skill<span class="pulse-accent">Pulse</span></h2>
        <p class="intro-tagline">Where Real Industry Demand Meets Skill Development</p>
      </div>
    </div>
  </div>

  <script>
    function dismissIntroOverlay() {
      const overlay = document.getElementById('websiteIntroOverlay');
      if (overlay) {
        overlay.style.transition = 'opacity 0.4s ease';
        overlay.style.opacity = '0';
        overlay.style.pointerEvents = 'none';
        overlay.setAttribute('aria-hidden', 'true');
        setTimeout(() => { 
          overlay.style.display = 'none'; 
        }, 400);
      }
    }
    // Keyboard accessibility: dismiss intro with Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        dismissIntroOverlay();
      }
    });
    // Ensure overlay aria and display state are cleared when intro concludes
    setTimeout(() => {
      const overlay = document.getElementById('websiteIntroOverlay');
      if (overlay && overlay.style.display !== 'none') {
        overlay.setAttribute('aria-hidden', 'true');
        overlay.style.display = 'none';
      }
    }, 7500);
  </script>

  <!-- Main Content -->
  <main style="flex:1;padding-top:2.5rem;padding-bottom:4rem;">
    <div class="container" style="display:flex;flex-direction:column;gap:3.5rem;">

      <!-- 1. HERO SECTION WITH 3D AUTO-SLIDING SQUARE SHOWCASE -->
      <section class="card-hero">
        <div class="hero-split-grid">
          <!-- Left Side: Hero Text and Actions -->
          <div class="hero-text-col" style="position:relative;z-index:2;">
            <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1.5rem;flex-wrap:wrap;">
              <span class="badge badge-cyan" style="background:rgba(214,185,77,0.15);color:#D6B94D;border-color:rgba(214,185,77,0.35);letter-spacing:0.04em;text-transform:uppercase;font-weight:700;">
                🏛️ Government of Maharashtra (DVET)
              </span>
              <span class="badge" style="background:rgba(250,246,238,0.1);color:#FAF6EE;border:1px solid rgba(214,185,77,0.3);font-weight:600;">
                National Skill Qualification Framework (NSQF)
              </span>
              <span class="badge badge-primary" style="background:rgba(201,162,39,0.22);color:#D6B94D;border:1px solid rgba(201,162,39,0.35);font-weight:600;">
                Live Labor Telemetry Active
              </span>
            </div>

            <h1 style="font-size:clamp(2.1rem, 4vw, 3.25rem);font-weight:900;line-height:1.15;letter-spacing:-0.03em;margin-bottom:1.25rem;color:#FAF6EE;">
              Where Real Industry Demand Meets <span style="background:linear-gradient(135deg, #60A5FA, #22D3EE);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Skill Development</span>
            </h1>

            <p style="font-size:1.05rem;line-height:1.6;color:#FAF6EE;opacity:0.9;margin-bottom:2rem;max-width:620px;">
              Empowering students, academic institutions, and policymakers with dynamic skill gap analytics, real-time market signals, and an automated curriculum alignment simulator.
            </p>

            <div style="display:flex;align-items:center;gap:1rem;flex-wrap:wrap;">
              <a href="skill-gap-analyzer.php" class="btn btn-primary btn-lg" style="background:#C9A227;color:#2E0D0E;font-weight:700;">
                <span>Test Your Readiness Score</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
              </a>
              <a href="training-curriculum.php" class="btn btn-secondary btn-lg" style="background:rgba(250,246,238,0.12);color:#FAF6EE;border-color:rgba(250,246,238,0.25);">
                <span>Curriculum Simulator</span>
              </a>
              <a href="government.php" class="btn btn-sm" style="color:#FAF6EE;opacity:0.85;font-size:0.875rem;">
                Maharashtra TVET Analytics &amp; Govt Portals →
              </a>
            </div>
          </div>

          <!-- Right Side: 3D Square Hero Image Slider -->
          <div class="hero-3d-slider-container" id="hero3dSlider" aria-label="SkillPulse 3D Interactive Feature Showcase" role="region">
            <div class="hero-3d-stage">
              
              <!-- Slide 1: Bridging Courses & Tech Labs -->
              <div class="hero-3d-card active" data-slide="0" onclick="goTo3dSlide(0)" role="button" tabindex="0" aria-label="Slide 1 of 4: Modern TVET & Bridging Courses">
                <div class="hero-3d-card-inner">
                  <img src="images/hero_courses.jpg" alt="3D illustration of Modern TVET & Bridging Courses Tech Lab" class="hero-3d-img" />
                  <div class="hero-3d-overlay">
                    <span class="hero-3d-badge">📚 Bridging Courses</span>
                    <div class="hero-3d-title">Vocational Tech Labs</div>
                    <div class="hero-3d-desc">GenAI, Robotics, Python &amp; Cloud Capstones</div>
                  </div>
                </div>
              </div>

              <!-- Slide 2: Real-time Job Placement & Corporate Hiring -->
              <div class="hero-3d-card next" data-slide="1" onclick="goTo3dSlide(1)" role="button" tabindex="0" aria-label="Slide 2 of 4: Live Labor Market & Corporate Hiring">
                <div class="hero-3d-card-inner">
                  <img src="images/hero_jobs.jpg" alt="3D illustration of Corporate Hiring and Live Industry Job Placements" class="hero-3d-img" />
                  <div class="hero-3d-overlay">
                    <span class="hero-3d-badge" style="background:rgba(16,185,129,0.25);color:#34D399;border-color:rgba(16,185,129,0.4);">💼 Live Requisitions</span>
                    <div class="hero-3d-title">18.4L+ Active Vacancies</div>
                    <div class="hero-3d-desc">NCS Portal &amp; MahaSwayam Enterprise Feeds</div>
                  </div>
                </div>
              </div>

              <!-- Slide 3: Academic Curriculum Simulator & Skills Radar -->
              <div class="hero-3d-card hidden-card" data-slide="2" onclick="goTo3dSlide(2)" role="button" tabindex="0" aria-label="Slide 3 of 4: Dynamic Curriculum Simulator">
                <div class="hero-3d-card-inner">
                  <img src="images/hero_curriculum.jpg" alt="3D illustration of Academic Curriculum Simulator and Skills Gap Radar" class="hero-3d-img" />
                  <div class="hero-3d-overlay">
                    <span class="hero-3d-badge" style="background:rgba(6,182,212,0.25);color:#38BDF8;border-color:rgba(6,182,212,0.4);">⚙️ Dynamic Simulator</span>
                    <div class="hero-3d-title">Curriculum Simulator</div>
                    <div class="hero-3d-desc">Simulate Electives to Boost Placement to 89%</div>
                  </div>
                </div>
              </div>

              <!-- Slide 4: Government TVET Accreditation & DigiLocker -->
              <div class="hero-3d-card prev" data-slide="3" onclick="goTo3dSlide(3)" role="button" tabindex="0" aria-label="Slide 4 of 4: Government TVET Accreditation">
                <div class="hero-3d-card-inner">
                  <img src="images/hero_government.jpg" alt="3D illustration of Official Government TVET Accreditation and DigiLocker Integration" class="hero-3d-img" />
                  <div class="hero-3d-overlay">
                    <span class="hero-3d-badge" style="background:rgba(214,185,77,0.25);color:#D6B94D;border-color:rgba(214,185,77,0.4);">🏛️ Official Accreditation</span>
                    <div class="hero-3d-title">State TVET Portal</div>
                    <div class="hero-3d-desc">DigiLocker &amp; DVET Maharashtra Verified</div>
                  </div>
                </div>
              </div>

            </div>

            <!-- Controls: Prev / Next & Indicators -->
            <div class="hero-3d-controls">
              <button class="hero-3d-btn" id="hero3dPrev" aria-label="Previous 3D Slide" onclick="prev3dSlide(event)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"></polyline></svg>
              </button>
              <div class="hero-3d-dots" id="hero3dDots" role="tablist" aria-label="3D Slider Dots">
                <button class="hero-3d-dot active" role="tab" aria-selected="true" onclick="goTo3dSlide(0)" aria-label="Slide 1"></button>
                <button class="hero-3d-dot" role="tab" aria-selected="false" onclick="goTo3dSlide(1)" aria-label="Slide 2"></button>
                <button class="hero-3d-dot" role="tab" aria-selected="false" onclick="goTo3dSlide(2)" aria-label="Slide 3"></button>
                <button class="hero-3d-dot" role="tab" aria-selected="false" onclick="goTo3dSlide(3)" aria-label="Slide 4"></button>
              </div>
              <button class="hero-3d-btn" id="hero3dNext" aria-label="Next 3D Slide" onclick="next3dSlide(event)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </button>
            </div>
          </div>

        </div>
      </section>

      <!-- 2. STATS OVERVIEW SECTION (With Direct Government Redirects) -->
      <section aria-labelledby="statsHeading">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:1.25rem;flex-wrap:wrap;gap:1rem;">
          <div>
            <h2 id="statsHeading" style="font-size:1.125rem;font-weight:700;color:var(--navy-900);">Official National &amp; State Labor Indicators</h2>
            <p style="font-size:0.875rem;color:var(--navy-500);">Aggregated from MSDE, DGT, National Career Service, and MahaSwayam</p>
          </div>
          <a href="government.php#official-portals" class="badge badge-cyan" style="text-decoration:none;font-weight:700;">
            <span>View All 10 Official Government Portals ↗</span>
          </a>
        </div>

        <div class="stats-grid">
          <div class="stat-card">
            <div>
              <div class="stat-card-top">
                <span class="stat-card-label">Registered ITI Infrastructure</span>
                <div class="stat-card-icon" aria-hidden="true">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
                </div>
              </div>
              <div class="stat-card-val" id="statRegisteredItis">14,950+</div>
              <a href="https://dgt.gov.in/" target="_blank" rel="noopener noreferrer" class="badge badge-primary" style="text-decoration:none;" aria-label="Official DGT Census (opens in a new tab)">
                <span>DGT Census ↗</span>
              </a>
            </div>
            <div class="stat-card-sub">
              Total operational ITIs registered under DGT nationally (Maharashtra accounts for 978 ITIs via <a href="https://www.dvet.gov.in/" target="_blank" rel="noopener noreferrer" style="color:var(--primary-600);font-weight:600;">DVET ↗</a>).
            </div>
          </div>

          <div class="stat-card">
            <div>
              <div class="stat-card-top">
                <span class="stat-card-label">PMKVY Certified Talent</span>
                <div class="stat-card-icon" style="background:var(--cyan-50);color:var(--cyan-600);" aria-hidden="true">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
              </div>
              <div class="stat-card-val" id="statPmkvyTalent">1.42 Cr+</div>
              <a href="https://www.skillindiadigital.gov.in/" target="_blank" rel="noopener noreferrer" class="badge badge-cyan" style="text-decoration:none;" aria-label="Skill India Digital Hub (opens in a new tab)">
                <span>Skill India Hub ↗</span>
              </a>
            </div>
            <div class="stat-card-sub">
              Cumulative candidates certified under PMKVY short-term skilling (8.42L+ in Maharashtra via <a href="https://mssds.in/" target="_blank" rel="noopener noreferrer" style="color:var(--primary-600);font-weight:600;">MSSDS ↗</a>).
            </div>
          </div>

          <div class="stat-card">
            <div>
              <div class="stat-card-top">
                <span class="stat-card-label">Active National Vacancies</span>
                <div class="stat-card-icon" style="background:var(--success-bg);color:var(--success);" aria-hidden="true">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                </div>
              </div>
              <div class="stat-card-val" id="statNationalVacancies">18.4L+</div>
              <a href="https://www.ncs.gov.in/" target="_blank" rel="noopener noreferrer" class="badge badge-success" style="text-decoration:none;" aria-label="NCS Portal Live (opens in a new tab)">
                <span>NCS Portal Live ↗</span>
              </a>
            </div>
            <div class="stat-card-sub">
              Employer requisitions mobilized on NCS Portal + 2.84L+ on Maharashtra's <a href="https://www.mahaswayam.gov.in/" target="_blank" rel="noopener noreferrer" style="color:var(--primary-600);font-weight:600;">MahaSwayam ↗</a>.
            </div>
          </div>

          <div class="stat-card">
            <div>
              <div class="stat-card-top">
                <span class="stat-card-label">Youth Formal Skilling Ratio</span>
                <div class="stat-card-icon" style="background:var(--warning-bg);color:var(--warning);" aria-hidden="true">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                </div>
              </div>
              <div class="stat-card-val" id="statFormalSkillingRatio">5.8%</div>
              <a href="https://mospi.gov.in/" target="_blank" rel="noopener noreferrer" class="badge badge-warning" style="text-decoration:none;" aria-label="PLFS MoSPI Survey (opens in a new tab)">
                <span>PLFS MoSPI ↗</span>
              </a>
            </div>
            <div class="stat-card-sub">
              Percentage of Indian youth in formal vocational skilling vs 52% in USA &amp; 75% in Germany (Targeting 25% under NEP 2020).
            </div>
          </div>
        </div>
      </section>

      <!-- 3. THE 4-STAGE PIPELINE -->
      <section class="card" style="padding:2.5rem 2rem;">
        <div style="text-align:center;max-width:700px;margin:0 auto 2.5rem auto;">
          <span class="badge badge-primary" style="margin-bottom:0.75rem;">Continuous Feedback Loop</span>
          <h2 style="font-size:1.85rem;font-weight:800;color:var(--navy-900);letter-spacing:-0.02em;">How SkillPulse Solves The Alignment Dilemma</h2>
          <p style="color:var(--navy-600);margin-top:0.5rem;font-size:0.95rem;">Curricula take years to change, but job market demands shift every quarter. Our intelligent engine automates the entire alignment cycle.</p>
        </div>

        <div class="pipeline-flow">
          <div class="pipeline-step">
            <div class="pipeline-num">01</div>
            <h3 style="font-size:1.1rem;font-weight:700;color:var(--navy-900);margin-bottom:0.5rem;">Industry Demand Ingestion</h3>
            <p style="font-size:0.875rem;color:var(--navy-600);line-height:1.5;">Continuously scans job boards, NCS portal, and employer postings to detect rising competencies and salary ranges.</p>
            <div style="margin-top:1rem;">
              <span class="badge badge-navy">Real-time NLP</span>
            </div>
          </div>

          <div class="pipeline-step">
            <div class="pipeline-num" style="background:var(--primary-600);">02</div>
            <h3 style="font-size:1.1rem;font-weight:700;color:var(--navy-900);margin-bottom:0.5rem;">Skill Gap Identification</h3>
            <p style="font-size:0.875rem;color:var(--navy-600);line-height:1.5;">Maps user or institutional syllabus against current market requirements to compute quantifiable readiness gaps.</p>
            <div style="margin-top:1rem;">
              <span class="badge badge-primary">Weighted Scoring</span>
            </div>
          </div>

          <div class="pipeline-step">
            <div class="pipeline-num" style="background:var(--cyan-600);">03</div>
            <h3 style="font-size:1.1rem;font-weight:700;color:var(--navy-900);margin-bottom:0.5rem;">Curriculum Simulator</h3>
            <p style="font-size:0.875rem;color:var(--navy-600);line-height:1.5;">Simulates elective module additions (e.g. GenAI, Cloud, Docker) showing universities how to boost placement rates from 75% to 89%.</p>
            <div style="margin-top:1rem;">
              <span class="badge badge-cyan">Dynamic Simulation</span>
            </div>
          </div>

          <div class="pipeline-step">
            <div class="pipeline-num" style="background:var(--success);">04</div>
            <h3 style="font-size:1.1rem;font-weight:700;color:var(--navy-900);margin-bottom:0.5rem;">Employer &amp; Career Matching</h3>
            <p style="font-size:0.875rem;color:var(--navy-600);line-height:1.5;">Connects certified job-ready candidates with verified enterprise recruiters looking for specific benchmark scores.</p>
            <div style="margin-top:1rem;">
              <span class="badge badge-success">Direct Fast-Track</span>
            </div>
          </div>
        </div>
      </section>

      <!-- LIVE TELEMETRY: DYNAMIC INDUSTRY-TO-SKILL ALIGNMENT ENGINE -->
      <section class="card" style="padding:2.25rem 2rem;background:#ffffff;border:1px solid var(--border);border-radius:var(--radius-xl);box-shadow:var(--shadow-md);">
        <div class="engine-showcase-grid">
          
          <!-- Left Column: Context & Overview -->
          <div>
            <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.75rem;flex-wrap:wrap;">
              <span class="badge badge-primary" style="background:#C9A227;color:#2E0D0E;font-weight:700;">Live Engine Telemetry</span>
              <span class="badge badge-cyan" style="font-weight:600;">Real-Time Convergence</span>
            </div>
            <h2 style="font-size:1.75rem;font-weight:800;color:var(--text-main);letter-spacing:-0.02em;margin-bottom:0.75rem;line-height:1.25;">
              Dynamic Alignment Engine In Action
            </h2>
            <p style="color:var(--text-muted);font-size:0.95rem;line-height:1.6;margin-bottom:1.25rem;">
              Continuous evaluation of candidate TVET competencies matched against real-time demand feeds from national (<strong>NCS</strong>) and Maharashtra state (<strong>MahaSwayam</strong>) repositories.
            </p>
            
            <div style="display:flex;flex-direction:column;gap:0.85rem;margin-bottom:1.5rem;">
              <div style="display:flex;align-items:flex-start;gap:0.75rem;">
                <span style="font-size:1.15rem;margin-top:1px;">🔄</span>
                <div>
                  <strong style="color:var(--text-main);font-size:0.875rem;">Automated Labor Ingestion:</strong>
                  <span style="color:var(--text-muted);font-size:0.875rem;"> Verified vacancies continuously synced from 18.4L+ National and 2.84L+ Maharashtra job postings.</span>
                </div>
              </div>
              <div style="display:flex;align-items:flex-start;gap:0.75rem;">
                <span style="font-size:1.15rem;margin-top:1px;">🎯</span>
                <div>
                  <strong style="color:var(--text-main);font-size:0.875rem;">Quantifiable Readiness Score (78%):</strong>
                  <span style="color:var(--text-muted);font-size:0.875rem;"> Weighted evaluation tracking code practice, syllabus bridging labs, and DigiLocker certified TVET diplomas.</span>
                </div>
              </div>
              <div style="display:flex;align-items:flex-start;gap:0.75rem;">
                <span style="font-size:1.15rem;margin-top:1px;">🏆</span>
                <div>
                  <strong style="color:var(--text-main);font-size:0.875rem;">Gold Tier Placement Fast-Track:</strong>
                  <span style="color:var(--text-muted);font-size:0.875rem;"> Priority recruitment referral for candidates exceeding the 75%+ industry readiness benchmark.</span>
                </div>
              </div>
            </div>

            <div style="display:flex;align-items:center;gap:0.75rem;flex-wrap:wrap;">
              <a href="skill-gap-analyzer.php" class="btn btn-primary btn-sm" style="background:#C9A227;color:#2E0D0E;font-weight:700;">
                Launch React Gap Analyzer &rarr;
              </a>
              <a href="government.php#official-portals" class="btn btn-secondary btn-sm">
                View Official Portals Directory
              </a>
            </div>
          </div>

          <!-- Right Column: The Dynamic Alignment Engine Widget -->
          <div class="engine-preview-panel">
            
            <!-- Top Badge Strip -->
            <div>
              <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;">
                <span class="badge" style="background:rgba(201,162,39,0.2);color:#D6B94D;border:1px solid rgba(201,162,39,0.4);font-size:0.72rem;letter-spacing:0.04em;text-transform:uppercase;font-weight:700;">
                  National TVET Framework
                </span>
                <span class="badge" style="background:rgba(16,185,129,0.2);color:#34D399;font-size:0.72rem;font-weight:600;">
                  Telemetry Active
                </span>
              </div>

              <h3 style="font-size:1.35rem;font-weight:800;color:#FAF6EE;line-height:1.3;margin:0 0 0.5rem 0;">
                Dynamic Industry-to-Skill Alignment Engine
              </h3>
              <p style="font-size:0.82rem;color:#FAF6EE;opacity:0.85;line-height:1.5;margin:0;">
                Continuous evaluation of candidate TVET competencies matched against real-time demand feeds from <strong>NCS</strong> and <strong>MahaSwayam</strong>.
              </p>
            </div>

            <!-- Animated SVG Readiness Score Ring -->
            <div class="auth-preview-ring-container">
              <div style="position:relative;width:150px;height:150px;">
                <svg width="150" height="150" viewBox="0 0 160 160" class="readiness-ring-svg">
                  <defs>
                    <linearGradient id="readinessGradHome" x1="0%" y1="0%" x2="100%" y2="100%">
                      <stop offset="0%" stop-color="#C9A227" />
                      <stop offset="100%" stop-color="#38BDF8" />
                    </linearGradient>
                  </defs>
                  <circle cx="80" cy="80" r="70" stroke-width="12" fill="none" class="readiness-ring-circle-bg" />
                  <circle cx="80" cy="80" r="70" stroke-width="12" fill="none" stroke-linecap="round" class="readiness-ring-circle-fg" style="stroke:url(#readinessGradHome);" />
                </svg>
                <div style="position:absolute;top:0;left:0;right:0;bottom:0;display:flex;flex-direction:column;align-items:center;justify-content:center;">
                  <span style="font-size:2rem;font-weight:900;color:#FAF6EE;line-height:1;">78%</span>
                  <span style="font-size:0.65rem;color:#D6B94D;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;margin-top:2px;">Job Ready</span>
                </div>
              </div>
              <div style="margin-top:0.75rem;font-size:0.75rem;color:#FAF6EE;font-weight:600;">
                Benchmark: <span style="color:#D6B94D;">Gold Tier Placement Priority</span>
              </div>
            </div>

            <!-- Live Labor Index Ticker -->
            <div>
              <div class="auth-ticker-card">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.35rem;">
                  <div style="display:flex;align-items:center;gap:0.4rem;">
                    <span class="live-pulse-dot"></span>
                    <span style="font-size:0.75rem;font-weight:700;color:#FAF6EE;">Live Labor Index</span>
                  </div>
                  <span style="font-size:0.68rem;color:#D6B94D;">Synced Today</span>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.5rem;font-size:0.75rem;color:#FAF6EE;">
                  <div>
                    <div style="font-size:1rem;font-weight:800;color:#FAF6EE;">18.4L+</div>
                    <div style="font-size:0.65rem;color:#FAF6EE;opacity:0.75;">National (NCS Portal)</div>
                  </div>
                  <div>
                    <div style="font-size:1rem;font-weight:800;color:#34D399;">2.84L+</div>
                    <div style="font-size:0.65rem;color:#FAF6EE;opacity:0.75;">Maharashtra (DVET)</div>
                  </div>
                </div>
              </div>

              <div style="margin-top:1rem;display:flex;justify-content:space-between;align-items:center;font-size:0.68rem;color:#FAF6EE;opacity:0.75;">
                <span>🔒 MeitY-Empanelled Cloud</span>
                <span>•</span>
                <span>DPDP Act 2023 Compliant</span>
                <span>•</span>
                <span>CERT-In Audited</span>
              </div>
            </div>

          </div>

        </div>
      </section>

      <!-- 4. LIVE SKILL RADAR PREVIEW -->
      <section style="display:grid;grid-template-columns:1fr;gap:2rem;">
        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
          <div>
            <h2 style="font-size:1.5rem;font-weight:800;color:var(--navy-900);">High-Demand Skills Matrix (2026)</h2>
            <p style="font-size:0.875rem;color:var(--navy-500);">Current demand velocity index across technology and analytics domains</p>
          </div>
          <a href="skill-intelligence.php" class="btn btn-secondary btn-sm">Explore All 850+ Skills →</a>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:1.25rem;">
          <div class="card" style="border-top:4px solid var(--primary-600);">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.75rem;">
              <span class="badge badge-primary">AI &amp; Data</span>
              <span style="font-weight:700;color:var(--success);font-size:0.875rem;">+48% YoY</span>
            </div>
            <h3 style="font-size:1.125rem;font-weight:700;color:var(--navy-900);">Machine Learning &amp; GenAI</h3>
            <p style="font-size:0.8125rem;color:var(--navy-500);margin:0.25rem 0 1rem 0;">LLM fine-tuning, RAG pipelines, PyTorch, LangChain, Vector DBs</p>
            <div style="display:flex;justify-content:space-between;font-size:0.75rem;font-weight:600;margin-bottom:0.35rem;">
              <span>Market Demand Index</span>
              <span style="color:var(--primary-600);">94 / 100</span>
            </div>
            <div class="progress-track"><div class="progress-fill" style="width:94%;"></div></div>
          </div>

          <div class="card" style="border-top:4px solid var(--cyan-500);">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.75rem;">
              <span class="badge badge-cyan">Cloud &amp; Infra</span>
              <span style="font-weight:700;color:var(--success);font-size:0.875rem;">+38% YoY</span>
            </div>
            <h3 style="font-size:1.125rem;font-weight:700;color:var(--navy-900);">Cloud Native (AWS &amp; Azure)</h3>
            <p style="font-size:0.8125rem;color:var(--navy-500);margin:0.25rem 0 1rem 0;">Kubernetes, Terraform, Serverless APIs, CI/CD automated deployments</p>
            <div style="display:flex;justify-content:space-between;font-size:0.75rem;font-weight:600;margin-bottom:0.35rem;">
              <span>Market Demand Index</span>
              <span style="color:var(--primary-600);">86 / 100</span>
            </div>
            <div class="progress-track"><div class="progress-fill" style="width:86%;"></div></div>
          </div>

          <div class="card" style="border-top:4px solid #F59E0B;">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.75rem;">
              <span class="badge badge-warning">Database</span>
              <span style="font-weight:700;color:var(--success);font-size:0.875rem;">+26% YoY</span>
            </div>
            <h3 style="font-size:1.125rem;font-weight:700;color:var(--navy-900);">SQL &amp; Schema Engineering</h3>
            <p style="font-size:0.8125rem;color:var(--navy-500);margin:0.25rem 0 1rem 0;">PostgreSQL, indexing, window functions, analytics data modeling</p>
            <div style="display:flex;justify-content:space-between;font-size:0.75rem;font-weight:600;margin-bottom:0.35rem;">
              <span>Market Demand Index</span>
              <span style="color:var(--primary-600);">90 / 100</span>
            </div>
            <div class="progress-track"><div class="progress-fill" style="width:90%;"></div></div>
          </div>
        </div>
      </section>

      <!-- 5. CALL TO ACTION -->
      <section class="card cta-band" style="background:linear-gradient(180deg, #5C1A1B 0%, #2E0D0E 100%);color:#FAF6EE;text-align:center;padding:3.5rem 2rem;border:1px solid rgba(201,162,39,0.25);">
        <h2 style="font-size:2rem;font-weight:800;letter-spacing:-0.02em;margin-bottom:1rem;color:#FAF6EE;">Ready to Audit Your Job Readiness?</h2>
        <p style="color:#FAF6EE;opacity:0.9;max-width:600px;margin:0 auto 2rem auto;font-size:1rem;">
          Get your benchmark score in under 60 seconds. Our diagnostic engine evaluates your current capabilities against real enterprise hiring bars.
        </p>
        <div style="display:flex;align-items:center;justify-content:center;gap:1rem;flex-wrap:wrap;">
          <a href="skill-gap-analyzer.php" class="btn btn-primary btn-lg" style="background:#C9A227;color:#2E0D0E;font-weight:700;">Launch Skill Gap Analyzer</a>
          <a href="training-curriculum.php" class="btn btn-secondary btn-lg" style="background:transparent;color:#FAF6EE;border-color:rgba(250,246,238,0.35);">Institution Portal</a>
        </div>
      </section>

    </div>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-col">
          <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1rem;">
            <div class="brand-icon" style="width:34px;height:34px;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
            </div>
            <span style="font-size:1.25rem;font-weight:800;">SkillPulse</span>
          </div>
          <p style="font-size:0.875rem;color:var(--navy-500);line-height:1.6;margin-bottom:1rem;">
            State-of-the-art industry-to-skill intelligence platform designed to align technical vocational education and training (TVET) curricula with dynamic labor market demand.
          </p>
          <div style="display:flex;gap:0.5rem;align-items:center;">
            <span class="live-pulse-dot"></span>
            <span style="font-size:0.75rem;color:var(--cyan-400);">System Status: Operational</span>
          </div>
        </div>

        <div class="footer-col">
          <h4>Platform Modules</h4>
          <ul>
            <li><a href="skill-intelligence.php">Skill Intelligence</a></li>
            <li><a href="skill-gap-analyzer.php">Skill Gap Analyzer</a></li>
            <li><a href="resume-scanner.php">Resume Scanner &amp; Bridge</a></li>
            <li><a href="career-roadmap.php">Career Roadmap</a></li>
            <li><a href="training-curriculum.php">Curriculum Simulator</a></li>
            <li><a href="government.php">Government &amp; Regional Portal</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Learning &amp; Access</h4>
          <ul>
            <li><a href="courses.php">Curated Courses</a></li>
            <li><a href="practice.php">Interview Practice Arena</a></li>
            <li><a href="experts.php">1-on-1 Expert Mentors</a></li>
            <li><a href="dashboard.php">Student Dashboard</a></li>
            <li><a href="employer.php">Employer Requisitions</a></li>
            <li><a href="privacy.php" style="color:var(--secondary-accent, #D6B94D);font-weight:600;">Privacy &amp; Security (DPDP)</a></li>
            <li><a href="my-data.php" style="color:var(--secondary-accent, #D6B94D);font-weight:600;">My Data &amp; Rights (§11-12)</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Official Govt Portals (Redirects)</h4>
          <ul>
            <li>
              <a href="https://www.mahaswayam.gov.in/" target="_blank" rel="noopener noreferrer" aria-label="MahaSwayam Portal, Government of Maharashtra (opens in a new tab)" style="display:inline-flex;align-items:center;gap:4px;">
                <span>MahaSwayam (Maharashtra) ↗</span>
              </a>
            </li>
            <li>
              <a href="https://www.dvet.gov.in/" target="_blank" rel="noopener noreferrer" aria-label="Directorate of Vocational Education and Training, Maharashtra (opens in a new tab)" style="display:inline-flex;align-items:center;gap:4px;">
                <span>DVET Maharashtra (ITIs) ↗</span>
              </a>
            </li>
            <li>
              <a href="https://mssds.in/" target="_blank" rel="noopener noreferrer" aria-label="Maharashtra State Skill Development Society (opens in a new tab)" style="display:inline-flex;align-items:center;gap:4px;">
                <span>MSSDS Skill Society ↗</span>
              </a>
            </li>
            <li>
              <a href="https://msbte.org.in/" target="_blank" rel="noopener noreferrer" aria-label="Maharashtra State Board of Technical Education (opens in a new tab)" style="display:inline-flex;align-items:center;gap:4px;">
                <span>MSBTE Polytechnic Board ↗</span>
              </a>
            </li>
            <li>
              <a href="https://www.ncs.gov.in/" target="_blank" rel="noopener noreferrer" aria-label="National Career Service, Ministry of Labour (opens in a new tab)" style="display:inline-flex;align-items:center;gap:4px;">
                <span>National Career Service (NCS) ↗</span>
              </a>
            </li>
            <li>
              <a href="https://www.skillindiadigital.gov.in/" target="_blank" rel="noopener noreferrer" aria-label="Skill India Digital Hub, MSDE (opens in a new tab)" style="display:inline-flex;align-items:center;gap:4px;">
                <span>Skill India Digital Hub ↗</span>
              </a>
            </li>
            <li>
              <a href="https://swayam.gov.in/" target="_blank" rel="noopener noreferrer" aria-label="SWAYAM Portal, Ministry of Education (opens in a new tab)" style="display:inline-flex;align-items:center;gap:4px;">
                <span>SWAYAM (MoE) ↗</span>
              </a>
            </li>
            <li>
              <a href="https://nptel.ac.in/" target="_blank" rel="noopener noreferrer" aria-label="NPTEL, IITs and IISc (opens in a new tab)" style="display:inline-flex;align-items:center;gap:4px;">
                <span>NPTEL (IITs &amp; IISc) ↗</span>
              </a>
            </li>
            <li>
              <a href="https://www.digilocker.gov.in/" target="_blank" rel="noopener noreferrer" aria-label="DigiLocker & APAAR, MeitY (opens in a new tab)" style="display:inline-flex;align-items:center;gap:4px;">
                <span>DigiLocker &amp; APAAR ↗</span>
              </a>
            </li>
            <li>
              <a href="https://www.apprenticeshipindia.gov.in/" target="_blank" rel="noopener noreferrer" aria-label="Apprenticeship India NAPS (opens in a new tab)" style="display:inline-flex;align-items:center;gap:4px;">
                <span>Apprenticeship India (NAPS) ↗</span>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <span>© 2026 SkillPulse TVET Alignment Platform. All rights reserved.</span>
        <span>Directorate of Vocational Education &amp; Training (DVET) &bull; Government of Maharashtra</span>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="js/data.js"></script>
  <script src="js/app.js"></script>
  <script src="js/pulseai.js"></script>
  <script src="js/tawkto.js"></script>
  <script>
    // 3D Hero Slider Controller with Auto-Sliding Interval
    (function init3dHeroSlider() {
      const sliderContainer = document.getElementById('hero3dSlider');
      if (!sliderContainer) return;

      const cards = sliderContainer.querySelectorAll('.hero-3d-card');
      const dots = sliderContainer.querySelectorAll('.hero-3d-dot');
      const total = cards.length;
      let currentIndex = 0;
      let autoPlayTimer = null;
      const SLIDE_INTERVAL = 3500; // Auto-slides every 3.5 seconds

      function update3dPositions() {
        cards.forEach((card, idx) => {
          card.classList.remove('active', 'prev', 'next', 'hidden-card');
          
          const diff = (idx - currentIndex + total) % total;
          
          if (diff === 0) {
            card.classList.add('active');
          } else if (diff === 1) {
            card.classList.add('next');
          } else if (diff === total - 1) {
            card.classList.add('prev');
          } else {
            card.classList.add('hidden-card');
          }
        });

        dots.forEach((dot, idx) => {
          const isActive = idx === currentIndex;
          dot.classList.toggle('active', isActive);
          dot.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });
      }

      function goTo3dSlide(index) {
        currentIndex = (index + total) % total;
        update3dPositions();
        resetTimer();
      }

      function next3dSlide(e) {
        if (e) e.stopPropagation();
        goTo3dSlide(currentIndex + 1);
      }

      function prev3dSlide(e) {
        if (e) e.stopPropagation();
        goTo3dSlide(currentIndex - 1);
      }

      function startTimer() {
        stopTimer();
        autoPlayTimer = setInterval(() => {
          currentIndex = (currentIndex + 1) % total;
          update3dPositions();
        }, SLIDE_INTERVAL);
      }

      function stopTimer() {
        if (autoPlayTimer) {
          clearInterval(autoPlayTimer);
          autoPlayTimer = null;
        }
      }

      function resetTimer() {
        stopTimer();
        startTimer();
      }

      window.goTo3dSlide = goTo3dSlide;
      window.next3dSlide = next3dSlide;
      window.prev3dSlide = prev3dSlide;

      sliderContainer.addEventListener('mouseenter', stopTimer);
      sliderContainer.addEventListener('mouseleave', startTimer);

      // Keyboard navigation for accessibility
      sliderContainer.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') next3dSlide(e);
        if (e.key === 'ArrowLeft') prev3dSlide(e);
      });

      cards.forEach((card, idx) => {
        card.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            goTo3dSlide(idx);
          }
        });
      });

      update3dPositions();
      startTimer();
    })();

    // Dynamic Macro Labor Telemetry Hydration from API & Supabase
    document.addEventListener('DOMContentLoaded', async () => {
      try {
        const res = await fetch('api/districts.php');
        const json = await res.json();
        if (json && json.success && json.governmentMetrics) {
          const m = json.governmentMetrics;
          if (m.totalItis) {
            const el = document.getElementById('statRegisteredItis');
            if (el) el.textContent = `${m.totalItis.toLocaleString()}+`;
          }
          if (m.pmkvyCertified) {
            const el = document.getElementById('statPmkvyTalent');
            if (el) el.textContent = `${m.pmkvyCertified}`;
          }
          if (m.liveVacancies) {
            const el = document.getElementById('statNationalVacancies');
            if (el) el.textContent = `${m.liveVacancies}`;
          }
          if (m.skillingRatio) {
            const el = document.getElementById('statFormalSkillingRatio');
            if (el) el.textContent = `${m.skillingRatio}%`;
          }
        }
      } catch (e) {
        console.warn('Using baseline labor metrics:', e);
      }
    });
  </script>
</body>
</html>
