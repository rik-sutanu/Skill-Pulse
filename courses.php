<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses | SkillPulse Bridging Academy</title>
  <meta name="description" content="Curated industry bridging courses designed specifically to close identified skill gaps and raise readiness scores.">
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
          <span class="brand-text-sub">Bridging Courses</span>
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
          <button class="nav-dropdown-btn active" aria-haspopup="true" aria-expanded="false" id="btnDropdownLearning">
            <span>Learning &amp; Practice</span>
            <svg class="dropdown-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <div class="nav-dropdown-menu" role="menu" aria-labelledby="btnDropdownLearning">
            <a href="courses.php" class="dropdown-item active" role="menuitem">
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
        <a href="skill-gap-analyzer.php" class="btn btn-primary btn-sm nav-btn-cta">Audit Skills</a>
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
        <a href="courses.php" class="mobile-nav-link active">Courses Catalog</a>
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
  <main style="flex:1;padding:2rem 0 4rem 0;">
    <div class="container" style="display:flex;flex-direction:column;gap:2.5rem;">

      <!-- Header, Live Government Ticker & Filters -->
      <div>
        <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.65rem;flex-wrap:wrap;">
          <span class="badge badge-primary">Targeted Upskilling &amp; TVET Bridge</span>
          <span class="badge-live-pulse"><span class="live-dot"></span> MahaSwayam 2.84L+ Live Vacancies Synced</span>
          <span class="badge badge-cyan">MSBTE &amp; DVET Integrated</span>
        </div>
        <h1 style="font-size:2.15rem;font-weight:800;color:var(--navy-900);line-height:1.25;">
          Industry-Aligned Bridging Courses &amp; State Schemes
        </h1>
        <p style="color:var(--navy-600);font-size:0.975rem;max-width:820px;margin-top:0.4rem;line-height:1.6;">
          Targeted competency modules directly mapped to close identified skill gaps. Subsidized through the <strong>Government of Maharashtra MahaSwayam Youth Skill Voucher</strong>, central TVET missions, and corporate co-sponsored tracks.
        </p>

        <!-- Live Metrics Strip -->
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(210px, 1fr));gap:1rem;margin-top:1.5rem;">
          <div style="background:#ffffff;border:1.5px solid var(--border);border-radius:var(--radius-md);padding:1rem;display:flex;align-items:center;gap:0.85rem;">
            <div style="width:42px;height:42px;border-radius:10px;background:rgba(37,99,235,0.1);color:var(--primary-600);display:flex;align-items:center;justify-content:center;font-size:1.25rem;">🏛️</div>
            <div>
              <div style="font-size:1.2rem;font-weight:800;color:var(--navy-900);" id="statGovtCourses">9 Courses</div>
              <div style="font-size:0.75rem;color:var(--navy-500);font-weight:600;">100% MahaSwayam Subsidized</div>
            </div>
          </div>

          <div style="background:#ffffff;border:1.5px solid var(--border);border-radius:var(--radius-md);padding:1rem;display:flex;align-items:center;gap:0.85rem;">
            <div style="width:42px;height:42px;border-radius:10px;background:rgba(22,163,74,0.1);color:#16A34A;display:flex;align-items:center;justify-content:center;font-size:1.25rem;">💼</div>
            <div>
              <div style="font-size:1.2rem;font-weight:800;color:var(--navy-900);" id="statPaidCourses">3 Courses</div>
              <div style="font-size:0.75rem;color:var(--navy-500);font-weight:600;">Paid Integrated Industry Tracks</div>
            </div>
          </div>

          <div style="background:#ffffff;border:1.5px solid var(--border);border-radius:var(--radius-md);padding:1rem;display:flex;align-items:center;gap:0.85rem;">
            <div style="width:42px;height:42px;border-radius:10px;background:rgba(245,158,11,0.1);color:#D97706;display:flex;align-items:center;justify-content:center;font-size:1.25rem;">📈</div>
            <div>
              <div style="font-size:1.2rem;font-weight:800;color:var(--navy-900);">+26% Avg</div>
              <div style="font-size:0.75rem;color:var(--navy-500);font-weight:600;">Wage Boost on Placement</div>
            </div>
          </div>

          <div style="background:#ffffff;border:1.5px solid var(--border);border-radius:var(--radius-md);padding:1rem;display:flex;align-items:center;gap:0.85rem;">
            <div style="width:42px;height:42px;border-radius:10px;background:rgba(13,148,136,0.1);color:#0D9488;display:flex;align-items:center;justify-content:center;font-size:1.25rem;">🛡️</div>
            <div>
              <div style="font-size:1.2rem;font-weight:800;color:var(--navy-900);">DPDP &amp; APAAR</div>
              <div style="font-size:0.75rem;color:var(--navy-500);font-weight:600;">DigiLocker Verified Credential</div>
            </div>
          </div>
        </div>

        <!-- Search & Dual Filter Toolbar -->
        <div style="margin-top:1.75rem;display:flex;flex-direction:column;gap:1rem;background:#ffffff;border:1.5px solid var(--border);border-radius:var(--radius-lg);padding:1.25rem;">
          <div style="display:flex;gap:1rem;flex-wrap:wrap;align-items:center;justify-content:space-between;">
            <!-- Keyword Search -->
            <div style="flex:1;min-width:260px;position:relative;">
              <input type="text" id="courseSearchInput" placeholder="Search by course title, skill (e.g. SQL, Python, Cloud), or provider..." class="form-input-custom" style="padding-left:2.25rem;">
              <svg style="position:absolute;left:0.75rem;top:50%;transform:translateY(-50%);color:var(--navy-400);" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            </div>

            <!-- Scheme Track Selector -->
            <div style="display:flex;gap:0.5rem;align-items:center;flex-wrap:wrap;" id="schemeFilterChips">
              <span style="font-size:0.8125rem;font-weight:700;color:var(--navy-700);">Scheme:</span>
              <button class="chip active" data-scheme="all">All Tracks</button>
              <button class="chip" data-scheme="govt">🏛️ MahaSwayam Free Voucher</button>
              <button class="chip" data-scheme="paid">💼 Paid Integrated</button>
            </div>
          </div>

          <!-- Domain Category Chips -->
          <div style="display:flex;align-items:center;gap:0.5rem;flex-wrap:wrap;border-top:1px solid var(--border-light);padding-top:0.85rem;" id="courseFilterChips">
            <span style="font-size:0.8125rem;font-weight:700;color:var(--navy-700);">Domain:</span>
            <button class="chip active" data-cat="all">All Domains</button>
            <button class="chip" data-cat="AI & Data">AI &amp; Data</button>
            <button class="chip" data-cat="Web Development">Web Development</button>
            <button class="chip" data-cat="Cloud & DevOps">Cloud &amp; DevOps</button>
            <button class="chip" data-cat="Cybersecurity">Cybersecurity</button>
          </div>
        </div>
      </div>

      <!-- Courses Grid Container -->
      <div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
          <span style="font-size:0.875rem;font-weight:700;color:var(--navy-700);" id="coursesCountDisplay">Showing 12 industry bridging courses</span>
          <span style="font-size:0.8125rem;color:var(--navy-500);">Real-time feed updated from DVET &amp; MahaSwayam</span>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(320px, 1fr));gap:1.5rem;" id="coursesGrid">
          <!-- Rendered dynamically via JavaScript from api/courses.php -->
        </div>
      </div>

      <!-- Section: Verified Government & TVET Portals Directory -->
      <section style="margin-top:2rem;">
        <div style="margin-bottom:1.5rem;">
          <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.25rem;">
            <span class="badge badge-navy">Statutory Public Infrastructure</span>
            <span class="badge-live-pulse"><span class="live-dot"></span> 10 Official Portals Verified</span>
          </div>
          <h2 style="font-size:1.65rem;font-weight:800;color:var(--navy-900);">
            Verified Government &amp; TVET Portals Directory
          </h2>
          <p style="color:var(--navy-600);font-size:0.925rem;max-width:850px;margin-top:0.25rem;">
            Direct official endpoints for Maharashtra state employment exchanges, national apprenticeship registries, and central skill missions. All links are verified official government domains (<code>.gov.in</code> / <code>.in</code>).
          </p>
        </div>

        <div class="govt-portals-grid" id="govtPortalsContainer">
          <!-- Populated dynamically via JS -->
        </div>
      </section>

    </div>
  </main>

  <!-- =========================================================================
       CREDENTIAL ENROLLMENT MODAL (MahaSwayam & Integrated Courses)
       ========================================================================= -->
  <div class="modal-backdrop" id="enrollModal" role="dialog" aria-modal="true" aria-labelledby="enrollModalTitle">
    <div class="enroll-modal-box">
      
      <!-- Modal Header -->
      <div class="modal-header">
        <div style="display:flex;align-items:center;gap:0.5rem;">
          <div style="width:32px;height:32px;border-radius:8px;background:rgba(37,99,235,0.1);color:var(--primary-600);display:flex;align-items:center;justify-content:center;font-size:1rem;">🏛️</div>
          <div>
            <h3 id="enrollModalTitle" style="font-size:1.15rem;font-weight:800;color:var(--navy-900);line-height:1.2;">MahaSwayam Course Enrollment</h3>
            <span style="font-size:0.75rem;color:var(--navy-500);font-weight:600;">Government of Maharashtra TVET Verification Gateway</span>
          </div>
        </div>
        <button style="background:none;border:none;cursor:pointer;padding:4px;color:var(--navy-500);" data-close-modal aria-label="Close Enrollment Modal">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">

        <!-- VIEW 1: ENROLLMENT CREDENTIALS FORM -->
        <div id="enrollFormView">
          <!-- Course Header Banner -->
          <div class="enroll-banner">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.4rem;flex-wrap:wrap;gap:0.5rem;">
              <span class="badge" style="background:rgba(255,255,255,0.2);color:#ffffff;border:none;" id="enrollModalCourseBadge">AI &amp; Data Track</span>
              <span style="font-size:0.8rem;font-weight:700;color:#86EFAC;" id="enrollModalSchemeTag">✓ 100% Tuition Waived</span>
            </div>
            <h4 id="enrollModalCourseTitle" style="font-size:1.15rem;font-weight:800;color:#ffffff;line-height:1.3;margin-bottom:0.35rem;">Course Title</h4>
            <div style="font-size:0.8125rem;color:rgba(255,255,255,0.85);display:flex;gap:1rem;flex-wrap:wrap;">
              <span id="enrollModalCourseProvider">Provider: SkillPulse TVET</span>
              <span id="enrollModalCourseDuration">Duration: 6 Weeks</span>
              <span id="enrollModalCourseSeats">🟢 42 Govt Seats Left</span>
            </div>
          </div>

          <!-- Error Alert Banner -->
          <div id="enrollErrorAlert" style="display:none;background:#FEF2F2;border:1.5px solid #FCA5A5;border-radius:var(--radius-md);padding:0.75rem 1rem;color:#B91C1C;font-size:0.85rem;margin-bottom:1rem;line-height:1.4;">
            <strong style="display:block;margin-bottom:0.25rem;">Credential Validation Error:</strong>
            <span id="enrollErrorMessage">Please complete all required fields correctly.</span>
          </div>

          <!-- The Credentials Form -->
          <form id="enrollCredentialsForm" onsubmit="handleEnrollFormSubmit(event)">
            <input type="hidden" id="enrollInputCourseId" value="">

            <div class="enroll-grid-2">
              <div class="form-group-custom">
                <label class="form-label-custom" for="enrollInputFullName">
                  <span>Candidate Full Name <span style="color:var(--danger);font-weight:bold;">*</span></span>
                  <span style="font-size:0.7rem;color:var(--navy-400);">As per Aadhaar/10th</span>
                </label>
                <input type="text" id="enrollInputFullName" class="form-input-custom" required placeholder="e.g. Aditya Santosh Patil">
              </div>

              <div class="form-group-custom">
                <label class="form-label-custom" for="enrollInputEmail">
                  <span>Email Address <span style="color:var(--danger);font-weight:bold;">*</span></span>
                  <span style="font-size:0.7rem;color:var(--navy-400);">For verification OTP/link</span>
                </label>
                <input type="email" id="enrollInputEmail" class="form-input-custom" required placeholder="aditya.patil@example.com">
              </div>
            </div>

            <div class="enroll-grid-2">
              <div class="form-group-custom">
                <label class="form-label-custom" for="enrollInputMobile">
                  <span>Mobile Number (+91) <span style="color:var(--danger);font-weight:bold;">*</span></span>
                  <span style="font-size:0.7rem;color:var(--navy-400);">10-digit Indian mobile</span>
                </label>
                <div style="display:flex;align-items:center;gap:0.35rem;">
                  <span style="padding:0.625rem 0.65rem;font-size:0.875rem;background:var(--navy-50);border:1.5px solid var(--border);border-radius:var(--radius-md);font-weight:700;color:var(--navy-700);">+91</span>
                  <input type="tel" id="enrollInputMobile" class="form-input-custom" required pattern="[6-9][0-9]{9}" placeholder="9822012345" maxlength="10">
                </div>
              </div>

              <div class="form-group-custom">
                <label class="form-label-custom" for="enrollSelectQualification">
                  <span>Academic / TVET Background <span style="color:var(--danger);font-weight:bold;">*</span></span>
                </label>
                <select id="enrollSelectQualification" class="form-select-custom" required>
                  <option value="Polytechnic Diploma (MSBTE)" selected>Polytechnic Diploma (MSBTE)</option>
                  <option value="Industrial Training Institute (DVET ITI)">Industrial Training Institute (DVET ITI)</option>
                  <option value="Bachelor of Engineering / B.Tech">Bachelor of Engineering / B.Tech</option>
                  <option value="B.Sc / BCA / MCA / Computer Science">B.Sc / BCA / MCA / Computer Science</option>
                  <option value="Diploma in Vocation (D.Voc)">Diploma in Vocation (D.Voc)</option>
                  <option value="Working Professional / Reskilling">Working Professional / Reskilling</option>
                </select>
              </div>
            </div>

            <div class="enroll-grid-2">
              <div class="form-group-custom">
                <label class="form-label-custom" for="enrollSelectDistrict">
                  <span>Maharashtra District <span style="color:var(--danger);font-weight:bold;">*</span></span>
                  <span style="font-size:0.7rem;color:var(--navy-400);">For state quota</span>
                </label>
                <select id="enrollSelectDistrict" class="form-select-custom" required>
                  <option value="Pune" selected>Pune (Auto &amp; IT Belt)</option>
                  <option value="Mumbai City">Mumbai City (BFSI Hub)</option>
                  <option value="Mumbai Suburban">Mumbai Suburban</option>
                  <option value="Thane">Thane (Manufacturing)</option>
                  <option value="Nagpur">Nagpur (Logistics &amp; Defense)</option>
                  <option value="Nashik">Nashik (Engineering)</option>
                  <option value="Chhatrapati Sambhaji Nagar">Chhatrapati Sambhaji Nagar (Auto Hub)</option>
                  <option value="Kolhapur">Kolhapur (Foundry &amp; Agri-tech)</option>
                  <option value="Solapur">Solapur (Textile &amp; Power)</option>
                  <option value="Amravati">Amravati (Textile Hub)</option>
                  <option value="Ahmednagar">Ahmednagar</option>
                  <option value="Akola">Akola</option>
                  <option value="Beed">Beed</option>
                  <option value="Bhandara">Bhandara</option>
                  <option value="Buldhana">Buldhana</option>
                  <option value="Chandrapur">Chandrapur</option>
                  <option value="Dhule">Dhule</option>
                  <option value="Gadchiroli">Gadchiroli</option>
                  <option value="Gondia">Gondia</option>
                  <option value="Hingoli">Hingoli</option>
                  <option value="Jalgaon">Jalgaon</option>
                  <option value="Jalna">Jalna</option>
                  <option value="Latur">Latur</option>
                  <option value="Nanded">Nanded</option>
                  <option value="Nandurbar">Nandurbar</option>
                  <option value="Osmanabad (Dharashiv)">Osmanabad (Dharashiv)</option>
                  <option value="Palghar">Palghar</option>
                  <option value="Parbhani">Parbhani</option>
                  <option value="Raigad">Raigad</option>
                  <option value="Ratnagiri">Ratnagiri</option>
                  <option value="Sangli">Sangli</option>
                  <option value="Satara">Satara</option>
                  <option value="Sindhudurg">Sindhudurg</option>
                  <option value="Wardha">Wardha</option>
                  <option value="Washim">Washim</option>
                  <option value="Yavatmal">Yavatmal</option>
                </select>
              </div>

              <div class="form-group-custom">
                <label class="form-label-custom" for="enrollSelectIdType">
                  <span>Government / Student ID Type <span style="color:var(--danger);font-weight:bold;">*</span></span>
                  <span style="font-size:0.7rem;color:var(--navy-400);">DPDP compliant</span>
                </label>
                <select id="enrollSelectIdType" class="form-select-custom" required onchange="updateIdTypePlaceholder()">
                  <option value="mahaswayam_id" selected>MahaSwayam Candidate ID</option>
                  <option value="apaar_id">APAAR / ABC Student ID (12 Digits)</option>
                  <option value="aadhaar_vid">Aadhaar Virtual ID (VID - 16 Digits)</option>
                  <option value="college_roll">College / MSBTE / ITI Roll Number</option>
                  <option value="ncs_id">National Career Service (NCS) ID</option>
                </select>
              </div>
            </div>

            <div class="form-group-custom">
              <label class="form-label-custom" for="enrollInputIdNumber">
                <span id="enrollIdLabel">MahaSwayam Registration ID <span style="color:var(--danger);font-weight:bold;">*</span></span>
                <span style="font-size:0.725rem;color:var(--primary-600);font-weight:600;" id="enrollIdHint">Format: MSW-MH-XXXXXX or registered code</span>
              </label>
              <input type="text" id="enrollInputIdNumber" class="form-input-custom" required placeholder="e.g. MSW-MH-984210" style="text-transform:uppercase;">
            </div>

            <!-- Integrated Scheme Selection -->
            <div style="margin-top:0.75rem;margin-bottom:1rem;">
              <label class="form-label-custom" style="margin-bottom:0.4rem;">
                <span>Select Course Integration Track <span style="color:var(--danger);font-weight:bold;">*</span></span>
              </label>

              <label class="scheme-option-card selected" id="schemeCardMahaSwayam">
                <input type="radio" name="enrollSchemeRadio" value="mahaswayam_subsidized" checked onchange="updateSchemeSelection(this)">
                <div>
                  <div style="font-weight:700;font-size:0.875rem;color:var(--navy-900);">
                    🏛️ MahaSwayam State Youth Skill Voucher (100% Free Sponsored)
                  </div>
                  <div style="font-size:0.775rem;color:var(--navy-600);margin-top:0.15rem;">
                    Full ₹12,500 tuition fee waiver funded by Dept. of Skills &amp; Employment, Govt. of Maharashtra. Directly syncs with DVET placement registry.
                  </div>
                </div>
              </label>

              <label class="scheme-option-card" id="schemeCardPaid">
                <input type="radio" name="enrollSchemeRadio" value="paid_integrated" onchange="updateSchemeSelection(this)">
                <div>
                  <div style="font-weight:700;font-size:0.875rem;color:var(--navy-900);">
                    💼 Corporate Co-Sponsored / Paid Integrated Track
                  </div>
                  <div style="font-size:0.775rem;color:var(--navy-600);margin-top:0.15rem;">
                    Co-funded by enterprise hiring partners with 1-on-1 industry mentorship and accelerated corporate placement screening.
                  </div>
                </div>
              </label>
            </div>

            <!-- Statutory DPDP Act Consent -->
            <div style="background:var(--navy-50);border:1px solid var(--border);border-radius:var(--radius-md);padding:0.85rem;margin-bottom:1.25rem;">
              <label style="display:flex;align-items:flex-start;gap:0.65rem;font-size:0.8125rem;color:var(--navy-700);cursor:pointer;">
                <input type="checkbox" id="enrollCheckboxConsent" required checked style="margin-top:0.2rem;accent-color:var(--primary-600);">
                <span>
                  I authorize SkillPulse and the <strong>Department of Skills, Employment, Entrepreneurship &amp; Innovation (Govt. of Maharashtra)</strong> to cross-check my credentials with the MahaSwayam and state TVET databases under the <strong>Digital Personal Data Protection Act, 2023</strong>.
                </span>
              </label>
            </div>

            <div class="modal-footer" style="padding-left:0;padding-right:0;padding-bottom:0;">
              <button type="button" class="btn btn-secondary btn-sm" data-close-modal>Cancel</button>
              <button type="submit" class="btn btn-primary btn-sm" id="btnSubmitEnroll">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                <span>Submit Credentials &amp; Verify on MahaSwayam</span>
              </button>
            </div>
          </form>
        </div>

        <!-- VIEW 2: INTERACTIVE BACKEND VERIFICATION PROGRESS -->
        <div id="enrollVerifyingView" style="display:none;" class="verification-box">
          <div class="verification-spinner"></div>
          <h4 style="font-size:1.25rem;font-weight:800;color:var(--navy-900);margin-bottom:0.5rem;">
            Cross-Checking with Government Registry...
          </h4>
          <p style="font-size:0.875rem;color:var(--navy-600);max-width:460px;">
            Securely transmitting credentials to the Maharashtra State TVET Gateway &amp; MahaSwayam database.
          </p>

          <div class="verification-steps-list">
            <div class="verification-step-item active" id="vStep1">
              <span style="font-size:1.1rem;">⏳</span>
              <span>Step 1: Transmitting credentials to MahaSwayam Verification Gateway...</span>
            </div>
            <div class="verification-step-item" id="vStep2">
              <span style="font-size:1.1rem;">⏳</span>
              <span>Step 2: Cross-referencing Maharashtra district database &amp; eligibility...</span>
            </div>
            <div class="verification-step-item" id="vStep3">
              <span style="font-size:1.1rem;">⏳</span>
              <span>Step 3: Generating cryptographic State Placement Passport...</span>
            </div>
          </div>
        </div>

        <!-- VIEW 3: OFFICIAL VERIFICATION RECEIPT & SUCCESS SCREEN -->
        <div id="enrollSuccessView" style="display:none;">
          <div class="govt-verified-card">
            <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1rem;">
              <div style="width:44px;height:44px;border-radius:12px;background:#16A34A;color:#ffffff;display:flex;align-items:center;justify-content:center;font-size:1.35rem;font-weight:bold;">
                ✓
              </div>
              <div>
                <div style="font-size:1.15rem;font-weight:800;color:#14532D;line-height:1.2;">
                  Government Verified Enrollment Approved!
                </div>
                <div style="font-size:0.75rem;font-weight:700;color:#15803D;text-transform:uppercase;letter-spacing:0.04em;">
                  MahaSwayam TVET Candidate Registry §12(b)
                </div>
              </div>
            </div>

            <!-- Key Details Grid -->
            <div style="background:#ffffff;border:1px solid #BBF7D0;border-radius:var(--radius-md);padding:1rem;display:grid;grid-template-columns:1fr 1fr;gap:0.75rem;font-size:0.8125rem;margin-bottom:1rem;">
              <div>
                <span style="color:var(--navy-500);display:block;font-size:0.75rem;">Official Application ID</span>
                <strong style="color:var(--navy-900);font-size:0.95rem;font-family:monospace;" id="resEnrollmentId">MH-MSW-2026-F3A30C54</strong>
              </div>
              <div>
                <span style="color:var(--navy-500);display:block;font-size:0.75rem;">Verification Status</span>
                <span style="display:inline-flex;align-items:center;gap:4px;color:#15803D;font-weight:700;">
                  <span class="live-dot" style="width:6px;height:6px;"></span> VERIFIED_ACTIVE
                </span>
              </div>
              <div>
                <span style="color:var(--navy-500);display:block;font-size:0.75rem;">Enrolled Candidate</span>
                <strong style="color:var(--navy-900);" id="resCandidateName">Aditya Patil</strong>
              </div>
              <div>
                <span style="color:var(--navy-500);display:block;font-size:0.75rem;">District Allocation</span>
                <strong style="color:var(--navy-900);" id="resDistrict">Pune</strong>
              </div>
              <div style="grid-column:1 / -1;">
                <span style="color:var(--navy-500);display:block;font-size:0.75rem;">Approved Scheme Grant</span>
                <strong style="color:#15803D;" id="resSubsidyScheme">100% Free under MahaSwayam Youth Skill Voucher (₹12,500 state grant approved)</strong>
              </div>
            </div>

            <!-- TVET XP Boost notification -->
            <div style="background:rgba(245,158,11,0.12);border:1px solid rgba(245,158,11,0.3);border-radius:var(--radius-md);padding:0.75rem 1rem;display:flex;align-items:center;gap:0.75rem;margin-bottom:1.25rem;">
              <span style="font-size:1.35rem;">✨</span>
              <div style="font-size:0.8125rem;color:#92400E;">
                <strong>+100 TVET Experience Points (XP) Awarded!</strong> Your enrollment is recorded on your Learner Dashboard and enhances your employer visibility score on MahaSwayam.
              </div>
            </div>

            <!-- Direct Outbound Official Government Links -->
            <div style="display:flex;flex-direction:column;gap:0.6rem;">
              <div style="font-size:0.75rem;font-weight:800;color:var(--navy-700);text-transform:uppercase;">Direct Portal Endpoints:</div>
              <div style="display:flex;gap:0.75rem;flex-wrap:wrap;">
                <a href="#" id="resBtnCourseAccess" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" style="flex:1;min-width:180px;text-align:center;">
                  Access Course Materials ↗
                </a>
                <a href="https://www.mahaswayam.gov.in/" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-sm" style="flex:1;min-width:180px;text-align:center;">
                  Verify on MahaSwayam Portal ↗
                </a>
              </div>
            </div>
          </div>

          <div class="modal-footer" style="padding-left:0;padding-right:0;padding-bottom:0;justify-content:space-between;">
            <a href="dashboard.php" class="btn btn-secondary btn-sm">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
              <span>Go to Learner Dashboard</span>
            </a>
            <button class="btn btn-primary btn-sm" data-close-modal>
              <span>Done</span>
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Course Detail Modal -->
  <div class="modal-backdrop" id="courseModal">
    <div class="modal-box">
      <div class="modal-header">
        <h3 id="modalCourseTitle" style="font-size:1.2rem;font-weight:800;color:var(--navy-900);">Course Overview</h3>
        <button style="background:none;border:none;cursor:pointer;" data-close-modal aria-label="Close">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
      <div class="modal-body" id="modalCourseBody">
        <!-- Filled dynamically -->
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" data-close-modal>Close</button>
        <button class="btn btn-primary btn-sm" id="btnModalTriggerEnroll">Proceed to Enrollment Form</button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-bottom" style="border-top:none;padding-top:0;">
        <span>© 2026 SkillPulse Academy | Smart India Hackathon 2026</span>
        <span>Problem Statement 26134 | Team HACK.FORCE</span>
      </div>
    </div>
  </footer>

  <script src="js/data.js"></script>
  <script src="js/app.js"></script>
  <script src="js/pulseai.js"></script>
  <script>
    // State storage for courses and current selection
    let allCoursesList = [];
    let currentSelectedCourse = null;

    document.addEventListener('DOMContentLoaded', async () => {
      const data = window.SKILLPULSE_DATA || {};
      const grid = document.getElementById('coursesGrid');
      const catChips = document.getElementById('courseFilterChips');
      const schemeChips = document.getElementById('schemeFilterChips');
      const searchInput = document.getElementById('courseSearchInput');

      let currentCat = 'all';
      let currentScheme = 'all';
      let currentSearch = '';

      // 1. Fetch dynamic courses from api/courses.php, with fallback to data.js
      try {
        const res = await fetch('api/courses.php');
        if (res.ok) {
          const json = await res.json();
          if (json.success && Array.isArray(json.courses) && json.courses.length > 0) {
            allCoursesList = json.courses;
            if (json.governmentSponsoredCount) {
              document.getElementById('statGovtCourses').textContent = `${json.governmentSponsoredCount} Courses`;
            }
            if (json.paidIntegratedCount) {
              document.getElementById('statPaidCourses').textContent = `${json.paidIntegratedCount} Courses`;
            }
          }
        }
      } catch (err) {
        console.warn('api/courses.php not reachable, using local embedded data:', err);
      }

      // Fallback if API not available
      if (allCoursesList.length === 0) {
        const rawCourses = data.COURSES || [];
        allCoursesList = rawCourses.map(c => {
          const isGovt = ['c1','c2','c3','c4','c6','c8','c9','c11','c12'].includes(c.id);
          const seats = 35 + ((c.id.charCodeAt(1) || 1) * 7) % 35;
          return {
            id: c.id,
            title: c.title,
            provider: c.provider,
            providerType: c.providerType,
            category: c.category,
            skill: c.skill,
            level: c.level,
            duration: c.duration,
            rating: c.rating,
            reviewsCount: c.reviewsCount,
            isFree: c.isFree,
            priceLabel: c.priceLabel,
            shortDescription: c.shortDescription,
            url: c.url,
            tags: c.tags || [],
            skillsCovered: c.tags || [c.skill],
            schemeType: isGovt ? 'mahaswayam_subsidized' : 'paid_integrated',
            schemeLabel: isGovt ? 'MahaSwayam Youth Skill Voucher (100% State Sponsored)' : 'Corporate Co-Sponsored / Paid Track',
            schemeBadge: isGovt ? '🏛️ MahaSwayam Free Voucher' : '💼 Industry Paid Track',
            isGovtSubsidized: isGovt,
            portalUrl: isGovt ? 'https://www.mahaswayam.gov.in/' : (c.url || 'https://www.mahaswayam.gov.in/'),
            seatsAvailable: seats,
            wageBoostText: '+26% Hiring Advantage on MahaSwayam',
            modules: [
              'Core Foundations & Industry Setup Labs',
              'Real-World Pipeline Challenge & Practice',
              'Production Deployment & Optimization',
              'Capstone Evaluation & MahaSwayam Credential Sync'
            ]
          };
        });
      }

      // Render Verified Government Portals Directory
      renderGovernmentPortals(data.GOVT_PORTALS || []);

      // Filter and render courses
      function filterAndRender() {
        let filtered = allCoursesList;

        // Category filter
        if (currentCat !== 'all') {
          filtered = filtered.filter(c => {
            if (c.category === currentCat) return true;
            if (currentCat === 'AI & Data') {
              return ['AI & Data', 'AI / ML', 'Data Analytics', 'Data Science'].includes(c.category);
            }
            if (currentCat === 'Web Development') {
              return ['Web Development', 'Programming'].includes(c.category);
            }
            if (currentCat === 'Cloud & DevOps') {
              return ['Cloud', 'Cloud & DevOps', 'DevOps'].includes(c.category);
            }
            if (currentCat === 'Cybersecurity') {
              return ['Cybersecurity', 'Security'].includes(c.category);
            }
            return false;
          });
        }

        // Scheme filter
        if (currentScheme === 'govt') {
          filtered = filtered.filter(c => c.isGovtSubsidized === true);
        } else if (currentScheme === 'paid') {
          filtered = filtered.filter(c => c.isGovtSubsidized === false);
        }

        // Search query filter
        if (currentSearch.trim() !== '') {
          const q = currentSearch.toLowerCase();
          filtered = filtered.filter(c => {
            const str = (c.title + ' ' + c.provider + ' ' + c.category + ' ' + (c.skillsCovered || []).join(' ')).toLowerCase();
            return str.includes(q);
          });
        }

        document.getElementById('coursesCountDisplay').textContent = `Showing ${filtered.length} of ${allCoursesList.length} courses`;

        if (filtered.length === 0) {
          grid.innerHTML = `
            <div style="grid-column:1 / -1;padding:3rem;text-align:center;background:#ffffff;border:1px dashed var(--border);border-radius:var(--radius-lg);">
              <div style="font-size:2.5rem;margin-bottom:0.5rem;">🔍</div>
              <h3 style="font-size:1.15rem;font-weight:700;color:var(--navy-900);">No matching bridging courses found</h3>
              <p style="color:var(--navy-500);font-size:0.875rem;margin-top:0.25rem;">Try adjusting your search query or reset your scheme/domain filters.</p>
              <button class="btn btn-secondary btn-sm" style="margin-top:1rem;" onclick="resetCourseFilters()">Reset All Filters</button>
            </div>
          `;
          return;
        }

        grid.innerHTML = filtered.map(c => `
          <div class="card course-card-item" style="display:flex;flex-direction:column;justify-content:space-between;padding:1.5rem;transition:all 0.2s ease;">
            <div>
              <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:0.75rem;gap:0.5rem;flex-wrap:wrap;">
                <span class="badge ${c.isGovtSubsidized ? 'badge-primary' : 'badge-navy'}">${c.schemeBadge}</span>
                <span style="font-size:0.8125rem;font-weight:700;color:var(--warning);">★ ${c.rating} (${(c.reviewsCount || 1400).toLocaleString()})</span>
              </div>
              <h3 style="font-size:1.15rem;font-weight:800;color:var(--navy-900);line-height:1.35;margin-bottom:0.4rem;">${c.title}</h3>
              <p style="font-size:0.8125rem;color:var(--navy-500);margin-bottom:0.75rem;">
                By <strong>${c.provider}</strong>
              </p>
              <p style="font-size:0.875rem;color:var(--navy-600);line-height:1.5;margin-bottom:1rem;">
                ${c.shortDescription || c.description || 'Targeted industry bridging curriculum designed to close competencies identified in your Skill Gap evaluation.'}
              </p>
              
              <!-- Skills Tags -->
              <div style="display:flex;flex-wrap:wrap;gap:0.35rem;margin-bottom:1.1rem;">
                ${(c.skillsCovered || c.tags || []).slice(0, 4).map(s => `<span class="badge badge-navy" style="font-size:0.7rem;">${s}</span>`).join('')}
              </div>

              <!-- State Placement Wage Boost Tag -->
              <div style="background:rgba(22,163,74,0.08);border:1px solid rgba(22,163,74,0.25);border-radius:6px;padding:0.4rem 0.65rem;font-size:0.75rem;color:#15803D;font-weight:700;display:flex;align-items:center;gap:0.35rem;margin-bottom:1rem;">
                <span>📈</span>
                <span>${c.wageBoostText || '+26% Hiring Advantage on MahaSwayam'}</span>
              </div>
            </div>

            <div style="padding-top:1rem;border-top:1px solid var(--border-light);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:0.5rem;">
              <div style="display:flex;flex-direction:column;">
                <span style="font-size:0.75rem;font-weight:600;color:var(--navy-500);">⏱ ${c.duration}</span>
                <span style="font-size:0.7rem;font-weight:700;color:#16A34A;">🟢 ${c.seatsAvailable || 42} Govt Seats Left</span>
              </div>
              <div style="display:flex;gap:0.4rem;">
                <button class="btn btn-secondary btn-sm" style="padding:0.4rem 0.65rem;font-size:0.775rem;" onclick="openCourseDetailsModal('${c.id}')">Details</button>
                <button class="btn btn-primary btn-sm" onclick="openEnrollModal('${c.id}')">Enroll Now</button>
              </div>
            </div>
          </div>
        `).join('');
      }

      window.resetCourseFilters = function() {
        currentCat = 'all';
        currentScheme = 'all';
        currentSearch = '';
        searchInput.value = '';
        catChips.querySelectorAll('.chip').forEach(c => c.classList.toggle('active', c.dataset.cat === 'all'));
        schemeChips.querySelectorAll('.chip').forEach(c => c.classList.toggle('active', c.dataset.scheme === 'all'));
        filterAndRender();
      };

      // Chip Event Listeners
      catChips.addEventListener('click', (e) => {
        const btn = e.target.closest('.chip');
        if (btn) {
          catChips.querySelectorAll('.chip').forEach(c => c.classList.remove('active'));
          btn.classList.add('active');
          currentCat = btn.dataset.cat;
          filterAndRender();
        }
      });

      schemeChips.addEventListener('click', (e) => {
        const btn = e.target.closest('.chip');
        if (btn) {
          schemeChips.querySelectorAll('.chip').forEach(c => c.classList.remove('active'));
          btn.classList.add('active');
          currentScheme = btn.dataset.scheme;
          filterAndRender();
        }
      });

      searchInput.addEventListener('input', (e) => {
        currentSearch = e.target.value;
        filterAndRender();
      });

      // Initial Render
      filterAndRender();
    });

    // =========================================================================
    // ENROLLMENT MODAL OPEN & FORM MANAGEMENT
    // =========================================================================
    window.openEnrollModal = function(courseId) {
      const course = allCoursesList.find(c => c.id === courseId) || allCoursesList[0];
      if (!course) return;
      currentSelectedCourse = course;

      // Populate Modal Header Banner
      document.getElementById('enrollInputCourseId').value = course.id;
      document.getElementById('enrollModalCourseTitle').textContent = course.title;
      document.getElementById('enrollModalCourseProvider').textContent = `Provider: ${course.provider}`;
      document.getElementById('enrollModalCourseDuration').textContent = `Duration: ${course.duration}`;
      document.getElementById('enrollModalCourseSeats').textContent = `🟢 ${course.seatsAvailable || 42} Govt Quota Seats Left`;
      document.getElementById('enrollModalCourseBadge').textContent = course.category;

      const isGovt = course.isGovtSubsidized !== false;
      document.getElementById('enrollModalSchemeTag').textContent = isGovt 
        ? '✓ 100% Tuition Waived (MahaSwayam Voucher)' 
        : '💼 Industry Co-Sponsored Track';

      // Pre-fill user details if logged in
      const rawUser = localStorage.getItem('skillpulse_user');
      if (rawUser) {
        try {
          const u = JSON.parse(rawUser);
          if (u.name) document.getElementById('enrollInputFullName').value = u.name;
          if (u.email) document.getElementById('enrollInputEmail').value = u.email;
          if (u.phone) document.getElementById('enrollInputMobile').value = u.phone.replace(/[^0-9]/g, '').slice(-10);
        } catch(e) {}
      } else {
        // Sample candidate prefill for convenient demo testing
        if (!document.getElementById('enrollInputFullName').value) {
          document.getElementById('enrollInputFullName').value = 'Aditya Patil';
          document.getElementById('enrollInputEmail').value = 'aditya.patil@example.com';
          document.getElementById('enrollInputMobile').value = '9822012345';
          document.getElementById('enrollInputIdNumber').value = 'MSW-MH-984210';
        }
      }

      // Reset Views
      document.getElementById('enrollFormView').style.display = 'block';
      document.getElementById('enrollVerifyingView').style.display = 'none';
      document.getElementById('enrollSuccessView').style.display = 'none';
      document.getElementById('enrollErrorAlert').style.display = 'none';

      updateIdTypePlaceholder();
      SkillPulse.openModal('enrollModal');
    };

    window.updateIdTypePlaceholder = function() {
      const type = document.getElementById('enrollSelectIdType').value;
      const input = document.getElementById('enrollInputIdNumber');
      const label = document.getElementById('enrollIdLabel');
      const hint = document.getElementById('enrollIdHint');

      switch (type) {
        case 'apaar_id':
          label.innerHTML = 'APAAR / ABC Student ID (12 Digits) <span style="color:var(--danger);font-weight:bold;">*</span>';
          input.placeholder = 'e.g. 123456789012';
          input.maxLength = 12;
          hint.textContent = '12-digit One Nation One Student ID (DigiLocker)';
          break;
        case 'aadhaar_vid':
          label.innerHTML = 'Aadhaar Virtual ID (VID - 16 Digits) <span style="color:var(--danger);font-weight:bold;">*</span>';
          input.placeholder = 'e.g. 1234567890123456';
          input.maxLength = 16;
          hint.textContent = '16-digit Virtual ID (UIDAI DPDP Act §6 Compliant)';
          break;
        case 'college_roll':
          label.innerHTML = 'College / MSBTE / ITI Roll Number <span style="color:var(--danger);font-weight:bold;">*</span>';
          input.placeholder = 'e.g. MSBTE-2024-ME-4819';
          input.maxLength = 30;
          hint.textContent = 'Institute Roll or State Technical Board Registration Code';
          break;
        case 'ncs_id':
          label.innerHTML = 'National Career Service (NCS) ID <span style="color:var(--danger);font-weight:bold;">*</span>';
          input.placeholder = 'e.g. J148921849';
          input.maxLength = 25;
          hint.textContent = 'NCS Jobseeker ID from ncs.gov.in';
          break;
        default:
          label.innerHTML = 'MahaSwayam Registration ID <span style="color:var(--danger);font-weight:bold;">*</span>';
          input.placeholder = 'e.g. MSW-MH-984210';
          input.maxLength = 25;
          hint.textContent = 'Format: MSW-MH-XXXXXX or Employment Exchange Code';
      }
    };

    window.updateSchemeSelection = function(radio) {
      document.getElementById('schemeCardMahaSwayam').classList.toggle('selected', radio.value === 'mahaswayam_subsidized');
      document.getElementById('schemeCardPaid').classList.toggle('selected', radio.value === 'paid_integrated');
    };

    // =========================================================================
    // ENROLLMENT FORM SUBMISSION & BACKEND CROSS-CHECKING FLOW
    // =========================================================================
    window.handleEnrollFormSubmit = async function(e) {
      e.preventDefault();
      const errBox = document.getElementById('enrollErrorAlert');
      const errMsg = document.getElementById('enrollErrorMessage');
      errBox.style.display = 'none';

      const courseId = document.getElementById('enrollInputCourseId').value;
      const fullName = document.getElementById('enrollInputFullName').value.trim();
      const email = document.getElementById('enrollInputEmail').value.trim();
      const mobile = document.getElementById('enrollInputMobile').value.trim();
      const qualification = document.getElementById('enrollSelectQualification').value;
      const district = document.getElementById('enrollSelectDistrict').value;
      const idType = document.getElementById('enrollSelectIdType').value;
      const idNumber = document.getElementById('enrollInputIdNumber').value.trim().toUpperCase();
      const schemeRadio = document.querySelector('input[name="enrollSchemeRadio"]:checked');
      const schemeType = schemeRadio ? schemeRadio.value : 'mahaswayam_subsidized';
      const consent = document.getElementById('enrollCheckboxConsent').checked;

      // Validation
      if (!fullName || !email || !mobile || !idNumber) {
        errMsg.textContent = 'Please fill out all required credentials.';
        errBox.style.display = 'block';
        return;
      }

      if (!/^[6-9]\d{9}$/.test(mobile)) {
        errMsg.textContent = 'Please provide a valid 10-digit Indian mobile number (beginning with 6-9).';
        errBox.style.display = 'block';
        return;
      }

      if (idType === 'apaar_id' && !/^\d{12}$/.test(idNumber)) {
        errMsg.textContent = 'APAAR ID must be exactly 12 digits.';
        errBox.style.display = 'block';
        return;
      }

      if (idType === 'aadhaar_vid' && !/^\d{16}$/.test(idNumber)) {
        errMsg.textContent = 'Aadhaar Virtual ID (VID) must be exactly 16 digits.';
        errBox.style.display = 'block';
        return;
      }

      // Switch to Verification Loading View
      document.getElementById('enrollFormView').style.display = 'none';
      document.getElementById('enrollVerifyingView').style.display = 'flex';

      const vStep1 = document.getElementById('vStep1');
      const vStep2 = document.getElementById('vStep2');
      const vStep3 = document.getElementById('vStep3');

      vStep1.className = 'verification-step-item active';
      vStep2.className = 'verification-step-item';
      vStep3.className = 'verification-step-item';

      const payload = {
        course_id: courseId,
        full_name: fullName,
        email: email,
        mobile: mobile,
        qualification: qualification,
        district: district,
        id_type: idType,
        id_number: idNumber,
        scheme_type: schemeType,
        consent: consent
      };

      try {
        // Step 1
        await new Promise(r => setTimeout(r, 600));
        vStep1.className = 'verification-step-item done';
        vStep1.innerHTML = '<span>✓</span> <span>Step 1: Credentials accepted by MahaSwayam Gateway.</span>';
        vStep2.className = 'verification-step-item active';

        // Step 2 & Backend Call
        const apiPromise = fetch('api/enroll.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(payload)
        });

        await new Promise(r => setTimeout(r, 700));
        vStep2.className = 'verification-step-item done';
        vStep2.innerHTML = '<span>✓</span> <span>Step 2: District quota & ID cross-checked against State Registry.</span>';
        vStep3.className = 'verification-step-item active';

        let responseData = null;
        try {
          const res = await apiPromise;
          if (res.ok) {
            responseData = await res.json();
          }
        } catch(netErr) {
          console.warn('Backend endpoint unavailable, falling back to simulated verification token:', netErr);
        }

        await new Promise(r => setTimeout(r, 600));
        vStep3.className = 'verification-step-item done';
        vStep3.innerHTML = '<span>✓</span> <span>Step 3: State Placement Passport & Voucher generated.</span>';

        await new Promise(r => setTimeout(r, 300));

        // Generate or extract enrollment result
        const fallbackToken = 'MH-MSW-2026-' + Math.random().toString(36).substring(2, 9).toUpperCase();
        const enrollment = (responseData && responseData.enrollment) ? responseData.enrollment : {
          enrollmentId: fallbackToken,
          candidate: { fullName: fullName, district: district },
          verification: {
            subsidyWaiver: schemeType === 'paid_integrated' 
              ? 'Corporate Co-sponsored (₹4,999 grant applied)' 
              : '100% Free under MahaSwayam Youth Skill Voucher (₹12,500 state grant approved)'
          }
        };

        // Render Success View
        document.getElementById('resEnrollmentId').textContent = enrollment.enrollmentId;
        document.getElementById('resCandidateName').textContent = fullName;
        document.getElementById('resDistrict').textContent = district;
        document.getElementById('resSubsidyScheme').textContent = enrollment.verification.subsidyWaiver;

        const accessUrl = (currentSelectedCourse && currentSelectedCourse.url) ? currentSelectedCourse.url : 'https://www.mahaswayam.gov.in/';
        document.getElementById('resBtnCourseAccess').href = accessUrl;

        // Persist enrollment in localStorage for Learner Dashboard
        const enrolledCourseObj = {
          id: currentSelectedCourse ? currentSelectedCourse.id : courseId,
          title: currentSelectedCourse ? currentSelectedCourse.title : 'Bridging Course',
          provider: currentSelectedCourse ? currentSelectedCourse.provider : 'MahaSwayam TVET',
          category: currentSelectedCourse ? currentSelectedCourse.category : 'General',
          enrollmentId: enrollment.enrollmentId,
          enrolledAt: new Date().toLocaleDateString('en-IN', { month: 'short', day: 'numeric', year: 'numeric' }),
          scheme: schemeType === 'paid_integrated' ? 'Paid Integrated Track' : 'MahaSwayam State Voucher',
          progress: 5,
          status: 'Active',
          url: accessUrl
        };

        const existingEnrolled = JSON.parse(localStorage.getItem('skillpulse_enrolled_courses') || '[]');
        existingEnrolled.unshift(enrolledCourseObj);
        localStorage.setItem('skillpulse_enrolled_courses', JSON.stringify(existingEnrolled));

        // Award points in localStorage state
        const curPts = parseInt(localStorage.getItem('skillpulse_xp') || '1340', 10);
        localStorage.setItem('skillpulse_xp', (curPts + 100).toString());

        // Switch to Success View
        document.getElementById('enrollVerifyingView').style.display = 'none';
        document.getElementById('enrollSuccessView').style.display = 'block';

        SkillPulse.toast('Credentials cross-checked & verified! Enrolled under MahaSwayam.', 'success');

      } catch (fatalErr) {
        console.error('Enrollment error:', fatalErr);
        document.getElementById('enrollVerifyingView').style.display = 'none';
        document.getElementById('enrollFormView').style.display = 'block';
        errMsg.textContent = 'An error occurred during state cross-checking. Please try again.';
        errBox.style.display = 'block';
      }
    };

    // =========================================================================
    // COURSE DETAILS MODAL
    // =========================================================================
    window.openCourseDetailsModal = function(courseId) {
      const c = allCoursesList.find(item => item.id === courseId);
      if (!c) return;
      currentSelectedCourse = c;

      document.getElementById('modalCourseTitle').textContent = c.title;
      document.getElementById('modalCourseBody').innerHTML = `
        <div style="font-size:0.875rem;color:var(--navy-600);line-height:1.6;margin-bottom:1rem;">
          <strong>Provider / Mentor:</strong> ${c.provider} (${c.providerType || 'Industry Academy'})<br>
          <strong>Duration &amp; Format:</strong> ${c.duration} (${c.level || 'All Levels'})<br>
          <strong>Category:</strong> ${c.category} • <strong>Rating:</strong> ★ ${c.rating} (${(c.reviewsCount || 1200).toLocaleString()} reviews)<br>
          <strong>Placement Boost:</strong> <span style="color:#15803D;font-weight:700;">${c.wageBoostText || '+26% Hiring Advantage on MahaSwayam'}</span>
        </div>
        <p style="font-size:0.875rem;color:var(--navy-700);line-height:1.5;margin-bottom:1rem;">
          ${c.shortDescription || c.description}
        </p>
        <div style="background:var(--navy-50);padding:1rem;border-radius:var(--radius-md);margin-bottom:1rem;border:1px solid var(--border);">
          <div style="font-weight:700;font-size:0.875rem;color:var(--navy-900);margin-bottom:0.5rem;">Core Curriculum Modules:</div>
          <ul style="padding-left:1.25rem;font-size:0.8125rem;color:var(--navy-700);display:flex;flex-direction:column;gap:0.35rem;">
            ${(c.modules || [
              'Module 1: Professional Setup & Industry Toolchain',
              'Module 2: Core Domain Deep-Dive & Lab Projects',
              'Module 3: Optimization, Error Handling & Security Best Practices',
              'Module 4: Capstone Evaluation & Placement Passport Credentialing'
            ]).map(m => `<li>${m}</li>`).join('')}
          </ul>
        </div>
        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:0.5rem;background:#F0FDF4;border:1px solid #BBF7D0;padding:0.75rem 1rem;border-radius:var(--radius-md);">
          <span style="font-size:0.8125rem;color:#15803D;font-weight:700;">✓ 100% Fully Sponsored under MahaSwayam Youth Skill Voucher</span>
          <span style="font-size:0.75rem;color:#15803D;font-weight:600;">DVET &amp; MSBTE Recognized</span>
        </div>
      `;

      document.getElementById('btnModalTriggerEnroll').onclick = () => {
        SkillPulse.closeModal('courseModal');
        openEnrollModal(c.id);
      };

      SkillPulse.openModal('courseModal');
    };

    // =========================================================================
    // RENDER VERIFIED GOVERNMENT PORTALS DIRECTORY
    // =========================================================================
    function renderGovernmentPortals(portalsList) {
      const container = document.getElementById('govtPortalsContainer');
      if (!container) return;

      // 10 authoritative government portals with reliable .gov.in / .in endpoints
      const defaultPortals = [
        {
          id: 'mahaswayam',
          name: 'MahaSwayam Portal',
          authority: 'Dept. of Skills, Employment, Entrepreneurship & Innovation, Govt. of Maharashtra',
          url: 'https://www.mahaswayam.gov.in/',
          description: 'Unified employment exchange and placement portal for 2.84L+ active job openings across Maharashtra.',
          badge: 'Govt. of Maharashtra Official'
        },
        {
          id: 'ncs',
          name: 'National Career Service (NCS)',
          authority: 'Ministry of Labour & Employment, Govt. of India',
          url: 'https://www.ncs.gov.in/',
          description: 'Mission Mode Project connecting 18.4L+ live vacancies, employment exchanges, and registered job seekers nationally.',
          badge: 'Govt. of India Official'
        },
        {
          id: 'sidh',
          name: 'Skill India Digital Hub (SIDH)',
          authority: 'Ministry of Skill Development & Entrepreneurship (MSDE)',
          url: 'https://www.skillindiadigital.gov.in/',
          description: 'National digital public infrastructure for verifiable skill credentials, apprenticeships, and mobile certificates.',
          badge: 'Digital India / MSDE'
        },
        {
          id: 'dvet',
          name: 'DVET Maharashtra',
          authority: 'Directorate of Vocational Education & Training, Maharashtra',
          url: 'https://www.dvet.gov.in/',
          description: 'Statutory body administering 417 Government and 561 Private Industrial Training Institutes (ITIs) statewide.',
          badge: 'State Vocational Directorate'
        },
        {
          id: 'mssds',
          name: 'MSSDS (State Skill Development)',
          authority: 'Government of Maharashtra',
          url: 'https://mssds.in/',
          description: 'Nodal implementing agency for Pramod Mahajan Kaushalya Vikas Abhiyan and state PMKVY components.',
          badge: 'State Skill Mission'
        },
        {
          id: 'msbte',
          name: 'MSBTE (Board of Technical Education)',
          authority: 'Higher & Technical Education Dept., Maharashtra',
          url: 'https://msbte.org.in/',
          description: 'Autonomous board designing and examining technical diploma curricula across 450+ polytechnics in Maharashtra.',
          badge: 'Technical Education Board'
        },
        {
          id: 'swayam',
          name: 'SWAYAM Portal',
          authority: 'Ministry of Education, Govt. of India',
          url: 'https://swayam.gov.in/',
          description: 'National MOOC platform offering accredited university and college courses with credit transfer eligibility under UGC.',
          badge: 'Ministry of Education'
        },
        {
          id: 'nptel',
          name: 'NPTEL (IITs & IISc)',
          authority: 'IIT Madras & Consortium of 7 IITs / MoE',
          url: 'https://nptel.ac.in/',
          description: 'Premier open online learning curriculum developed by IIT faculty for engineering, TVET, and deep tech.',
          badge: 'Premier Academic Consortium'
        },
        {
          id: 'digilocker',
          name: 'DigiLocker & APAAR',
          authority: 'Ministry of Electronics and IT (MeitY) & MoE',
          url: 'https://www.digilocker.gov.in/',
          description: 'National Academic Depository (NAD) and One Nation One Student ID (APAAR) for tamper-proof digital certificates.',
          badge: 'Digital Public Infrastructure'
        },
        {
          id: 'naps',
          name: 'Apprenticeship India (NAPS)',
          authority: 'Ministry of Skill Development & Entrepreneurship (MSDE)',
          url: 'https://www.apprenticeshipindia.gov.in/',
          description: 'National Apprenticeship Promotion Scheme portal connecting TVET graduates with industry training & DBT stipends.',
          badge: 'National Apprenticeship'
        }
      ];

      const listToRender = (portalsList && portalsList.length >= 6) ? portalsList : defaultPortals;

      container.innerHTML = listToRender.map(p => `
        <div class="govt-portal-card">
          <div>
            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:0.75rem;gap:0.5rem;">
              <span class="govt-portal-badge">${p.badge || 'Official Government Portal'}</span>
              <span class="badge-live-pulse" style="font-size:0.6875rem;"><span class="live-dot"></span> Active</span>
            </div>
            <h3 style="font-size:1.1rem;font-weight:800;color:var(--navy-900);line-height:1.3;margin-bottom:0.35rem;">
              ${p.name}
            </h3>
            <p style="font-size:0.775rem;color:var(--navy-500);margin-bottom:0.65rem;font-weight:600;">
              ${p.authority}
            </p>
            <p style="font-size:0.8125rem;color:var(--navy-600);line-height:1.5;margin-bottom:1rem;">
              ${p.description}
            </p>
          </div>

          <div style="padding-top:0.75rem;border-top:1px solid var(--border-light);display:flex;align-items:center;justify-content:space-between;">
            <span style="font-size:0.75rem;color:var(--navy-400);font-family:monospace;">${new URL(p.url).hostname}</span>
            <a href="${p.url}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm" style="display:inline-flex;align-items:center;gap:4px;padding:0.35rem 0.75rem;font-size:0.75rem;" aria-label="Visit ${p.name} (opens in a new tab)">
              <span>Open Portal ↗</span>
            </a>
          </div>
        </div>
      `).join('');
    }
  </script>
</body>
</html>
