<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AI Resume Scanner &amp; Career Bridge Detector | SkillPulse</title>
  <meta name="description" content="Upload or paste your resume to extract competencies, calculate role alignment scores, detect critical skill gaps, and access tailored bridging courses.">
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
          <span class="brand-text-sub">Resume Scanner &amp; Bridge</span>
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
            <a href="resume-scanner.php" class="dropdown-item active" role="menuitem">
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
        <a href="resume-scanner.php" class="mobile-nav-link active">AI Resume Scanner &amp; Bridge</a>
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

  <main style="flex:1;padding:2.5rem 0 4rem 0;">
    <div class="container" style="display:flex;flex-direction:column;gap:2rem;">

      <!-- Scanner Hero Card -->
      <div class="scanner-hero-card">
        <div class="scanner-badge-row">
          <span class="scanner-badge-ai">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            <span>AI Competency Extraction</span>
          </span>
          <span class="badge" style="background:rgba(255,255,255,0.1);color:#FAF6EE;border:1px solid rgba(255,255,255,0.2);">
            ATS Keyword Benchmarking
          </span>
          <span class="badge" style="background:rgba(93,202,165,0.2);color:#5DCAA5;border:1px solid rgba(93,202,165,0.4);">
            +25 Profile XP Reward
          </span>
        </div>

        <h1 style="font-size:2.2rem;font-weight:900;color:#FDF3F0;letter-spacing:-0.03em;margin:0 0 0.5rem 0;">
          AI Resume Scanner &amp; Career Bridge Detector
        </h1>
        <p style="color:#E7C3C0;font-size:0.95rem;max-width:760px;line-height:1.6;margin:0;">
          Scan your resume against Maharashtra's priority industry tracks. Our natural language diagnostic engine identifies your validated competencies, exposes hidden skill gaps, and connects you directly to bridging courses that elevate your job readiness score.
        </p>
      </div>

      <!-- Interactive Scanner Container -->
      <div class="scanner-input-container">
        
        <!-- Input Mode Tabs -->
        <div class="scanner-tabs" role="tablist">
          <button type="button" class="scanner-tab-btn active" id="tabBtnUpload" role="tab" aria-selected="true">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block;vertical-align:-2px;margin-right:5px;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
            Upload Resume File (PDF / DOCX / TXT)
          </button>
          <button type="button" class="scanner-tab-btn" id="tabBtnPaste" role="tab" aria-selected="false">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block;vertical-align:-2px;margin-right:5px;"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/></svg>
            Paste Resume Text / Profile
          </button>
        </div>

        <!-- Panel A: File Dropzone -->
        <div id="panelUpload">
          <input type="file" id="resumeFileInput" accept=".pdf,.docx,.txt" style="display:none;">
          <div class="resume-dropzone" id="resumeDropzone">
            <div class="dropzone-icon-circle">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="12" y1="18" x2="12" y2="12"></line>
                <line x1="9" y1="15" x2="12" y2="12"></line>
                <line x1="15" y1="15" x2="12" y2="12"></line>
              </svg>
            </div>
            <div>
              <div class="dropzone-title">Drag &amp; drop your resume document here, or click to browse</div>
              <div class="dropzone-subtitle">Supported formats: PDF, Microsoft Word (.docx), Plain Text (.txt) &bull; Max 5MB</div>
            </div>
            <div class="dropzone-file-pill" id="dropzoneFilePill">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2C6E3D" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <span id="dropzoneFileName">resume.pdf</span>
              <button type="button" id="dropzoneFileRemove" style="background:none;border:none;cursor:pointer;color:#9B2226;padding:2px 4px;font-weight:800;" title="Remove file">&times;</button>
            </div>
          </div>
        </div>

        <!-- Panel B: Direct Text Paste -->
        <div id="panelPaste" style="display:none;">
          <textarea id="resumePasteText" class="resume-textarea" placeholder="Paste your resume content, technical summary, or LinkedIn profile text here... (minimum 30 characters)"></textarea>
        </div>

        <!-- Quick Sample Profiles Bar -->
        <div class="sample-resumes-bar">
          <div style="font-size:0.75rem;font-weight:800;color:var(--navy-600);text-transform:uppercase;letter-spacing:0.04em;">
            ⚡ Or Test Instantly with a Sample Candidate Profile:
          </div>
          <div class="sample-chips-row" id="sampleChipsContainer">
            <button type="button" class="sample-chip-btn">Loading sample profiles...</button>
          </div>
        </div>

        <!-- Target Role Selector & Scan CTA Button -->
        <div class="scanner-controls-row">
          <div style="display:flex;align-items:center;gap:0.75rem;flex-wrap:wrap;">
            <label for="targetRoleSelect" style="font-size:0.875rem;font-weight:700;color:var(--navy-800);">
              Benchmark Career Track:
            </label>
            <select id="targetRoleSelect" class="form-select" style="min-width:240px;padding:0.55rem 0.85rem;border:1.5px solid var(--border);border-radius:8px;font-weight:600;background:#fff;color:var(--navy-900);">
              <option value="auto">⚡ Auto-Detect Best Matching Role (AI)</option>
              <option value="data-analyst">Data Analyst</option>
              <option value="frontend-developer">Frontend Developer</option>
              <option value="backend-developer">Backend Developer</option>
              <option value="devops-engineer">DevOps Engineer</option>
            </select>
          </div>

          <button type="button" class="scan-cta-btn" id="btnStartScan">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            <span>Scan Resume &amp; Detect Gaps</span>
          </button>
        </div>

      </div>

      <!-- Live Progress Animation Box -->
      <div class="scan-progress-box" id="scanProgressBox">
        <div class="live-pulse-dot" style="margin:0 auto 1rem auto;width:16px;height:16px;"></div>
        <h3 style="font-size:1.2rem;font-weight:800;color:#FDF3F0;margin-bottom:4px;">
          Analyzing Resume Document &amp; Skills...
        </h3>
        <p style="font-size:0.82rem;color:#E7C3C0;margin:0;">
          Synthesizing entities, cross-referencing Maharashtra job demand data, and matching bridging courses.
        </p>

        <div class="scan-progress-steps">
          <div class="scan-step-pill" id="scanStep1">
            <span class="step-icon">1</span>
            <span>Parsing Document</span>
          </div>
          <div class="scan-step-pill" id="scanStep2">
            <span class="step-icon">2</span>
            <span>Extracting Competencies</span>
          </div>
          <div class="scan-step-pill" id="scanStep3">
            <span class="step-icon">3</span>
            <span>Evaluating Gaps</span>
          </div>
          <div class="scan-step-pill" id="scanStep4">
            <span class="step-icon">4</span>
            <span>Mapping Course Bridges</span>
          </div>
        </div>
      </div>

      <!-- Results Cockpit Box -->
      <div class="scan-results-box" id="scanResultsBox">
        <!-- Injected dynamically via js/resume-scanner.js -->
      </div>

    </div>
  </main>

  <footer class="site-footer">
    <div class="container">
      <div class="footer-bottom" style="border-top:none;padding-top:0;">
        <span>© 2026 SkillPulse Resume Intelligence | Smart India Hackathon 2026</span>
        <span>Problem Statement 26134 | Team HACK.FORCE</span>
      </div>
    </div>
  </footer>

  <script src="js/data.js"></script>
  <script src="js/app.js"></script>
  <script src="js/resume-scanner.js"></script>
</body>
</html>
