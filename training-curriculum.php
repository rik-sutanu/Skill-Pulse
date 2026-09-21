<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curriculum Alignment Simulator | SkillPulse Institutional Engine</title>
  <meta name="description" content="Simulate how adding industry-relevant elective modules elevates institutional placement and syllabus alignment.">
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
          <span class="brand-text-sub">Curriculum Simulator</span>
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
            <a href="training-curriculum.php" class="dropdown-item active" role="menuitem">
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
        <button class="btn btn-primary btn-sm nav-btn-cta" onclick="SkillPulse.toast('Audit PDF Report Exported successfully!','success')">Export Report</button>
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
        <a href="training-curriculum.php" class="mobile-nav-link active">Curriculum Simulator</a>
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

      <!-- Title -->
      <div>
        <span class="badge badge-cyan" style="margin-bottom:0.5rem;">Higher Education &amp; TVET Module</span>
        <h1 style="font-size:2rem;font-weight:800;color:var(--navy-900);">Interactive Curriculum Alignment Simulator</h1>
        <p style="color:var(--navy-600);font-size:0.95rem;max-width:750px;margin-top:0.25rem;">
          Higher education and TVET curricula are updated once every 3-4 years, creating severe graduate mismatches. Use this simulator to audit your syllabus against 2026 industry demand and test the quantifiable impact of introducing new elective modules.
        </p>
      </div>

      <!-- Simulator Metric Display -->
      <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(240px, 1fr));gap:1.25rem;">
        <div class="card" style="border-left:4px solid var(--navy-500);">
          <div style="font-size:0.8125rem;font-weight:600;color:var(--navy-500);">Current Syllabus Baseline</div>
          <div style="font-size:2.25rem;font-weight:800;color:var(--navy-900);margin:0.25rem 0;" id="curriculumBaseScore">75%</div>
          <div style="font-size:0.75rem;color:var(--navy-600);">Based on typical 4-year B.Tech / Diploma standard curriculum</div>
        </div>

        <div class="card" style="border-left:4px solid var(--primary-600);background:var(--primary-50);">
          <div style="font-size:0.8125rem;font-weight:700;color:var(--primary-700);">Projected Placement Alignment</div>
          <div style="font-size:2.25rem;font-weight:800;color:var(--primary-600);margin:0.25rem 0;" id="curriculumProjectedScore">82%</div>
          <div style="font-size:0.75rem;color:var(--primary-700);font-weight:600;" id="curriculumDeltaBadge">+7% Alignment Increase</div>
        </div>

        <div class="card" style="border-left:4px solid var(--success);">
          <div style="font-size:0.8125rem;font-weight:600;color:var(--navy-500);">National Placement Velocity</div>
          <div style="font-size:2.25rem;font-weight:800;color:var(--success);margin:0.25rem 0;">+34%</div>
          <div style="font-size:0.75rem;color:var(--navy-600);">Expected recruiter offer rate boost upon module adoption</div>
        </div>
      </div>

      <!-- Interactive Module Toggles -->
      <div style="display:grid;grid-template-columns:1fr;gap:2rem;">
        <div class="card">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;flex-wrap:wrap;gap:0.75rem;">
            <div>
              <h2 style="font-size:1.25rem;font-weight:800;color:var(--navy-900);">Elective Module Interventions</h2>
              <p style="font-size:0.8125rem;color:var(--navy-500);">Toggle industry modules to simulate immediate impact on graduate employability:</p>
            </div>
            <span class="badge badge-primary">Interactive Sandbox</span>
          </div>

          <div style="display:flex;flex-direction:column;gap:1rem;">
            
            <label style="display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;padding:1.25rem;border:1.5px solid var(--border);border-radius:var(--radius-md);background:#fff;cursor:pointer;">
              <div style="display:flex;align-items:flex-start;gap:1rem;">
                <input type="checkbox" class="module-toggle-checkbox" data-gain="7" checked style="width:20px;height:20px;margin-top:3px;accent-color:var(--primary-600);" />
                <div>
                  <div style="font-weight:700;color:var(--navy-900);font-size:1rem;">Module A: Generative AI &amp; Large Language Model Ops</div>
                  <p style="font-size:0.8125rem;color:var(--navy-500);margin-top:0.25rem;">Covers Prompt Engineering, Fine-tuning Llama-3, Retrieval-Augmented Generation (RAG), and Vector Databases (Pinecone/Milvus).</p>
                  <div style="margin-top:0.5rem;display:flex;gap:0.5rem;">
                    <span class="badge badge-cyan">45 Hours Lab</span>
                    <span class="badge badge-navy">Credit Weight: 3</span>
                  </div>
                </div>
              </div>
              <div style="text-align:right;flex-shrink:0;">
                <span class="badge badge-success" style="font-size:0.875rem;">+7% Alignment</span>
              </div>
            </label>

            <label style="display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;padding:1.25rem;border:1.5px solid var(--border);border-radius:var(--radius-md);background:#fff;cursor:pointer;">
              <div style="display:flex;align-items:flex-start;gap:1rem;">
                <input type="checkbox" class="module-toggle-checkbox" data-gain="5" style="width:20px;height:20px;margin-top:3px;accent-color:var(--primary-600);" />
                <div>
                  <div style="font-weight:700;color:var(--navy-900);font-size:1rem;">Module B: Cloud Native Architecture &amp; Terraform</div>
                  <p style="font-size:0.8125rem;color:var(--navy-500);margin-top:0.25rem;">Multi-cloud infrastructure provisioning on AWS/GCP, infrastructure as code, serverless compute, and microservices.</p>
                  <div style="margin-top:0.5rem;display:flex;gap:0.5rem;">
                    <span class="badge badge-cyan">40 Hours Lab</span>
                    <span class="badge badge-navy">Credit Weight: 3</span>
                  </div>
                </div>
              </div>
              <div style="text-align:right;flex-shrink:0;">
                <span class="badge badge-success" style="font-size:0.875rem;">+5% Alignment</span>
              </div>
            </label>

            <label style="display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;padding:1.25rem;border:1.5px solid var(--border);border-radius:var(--radius-md);background:#fff;cursor:pointer;">
              <div style="display:flex;align-items:flex-start;gap:1rem;">
                <input type="checkbox" class="module-toggle-checkbox" data-gain="4" style="width:20px;height:20px;margin-top:3px;accent-color:var(--primary-600);" />
                <div>
                  <div style="font-weight:700;color:var(--navy-900);font-size:1rem;">Module C: Containerization &amp; DevOps Pipelines (Docker &amp; K8s)</div>
                  <p style="font-size:0.8125rem;color:var(--navy-500);margin-top:0.25rem;">Dockerizing apps, Kubernetes clusters orchestration, and automated CI/CD deployment workflows with GitHub Actions.</p>
                  <div style="margin-top:0.5rem;display:flex;gap:0.5rem;">
                    <span class="badge badge-cyan">30 Hours Lab</span>
                    <span class="badge badge-navy">Credit Weight: 2</span>
                  </div>
                </div>
              </div>
              <div style="text-align:right;flex-shrink:0;">
                <span class="badge badge-success" style="font-size:0.875rem;">+4% Alignment</span>
              </div>
            </label>

            <label style="display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;padding:1.25rem;border:1.5px solid var(--border);border-radius:var(--radius-md);background:#fff;cursor:pointer;">
              <div style="display:flex;align-items:flex-start;gap:1rem;">
                <input type="checkbox" class="module-toggle-checkbox" data-gain="3" style="width:20px;height:20px;margin-top:3px;accent-color:var(--primary-600);" />
                <div>
                  <div style="font-weight:700;color:var(--navy-900);font-size:1rem;">Module D: Enterprise Cybersecurity &amp; Zero-Trust Architecture</div>
                  <p style="font-size:0.8125rem;color:var(--navy-500);margin-top:0.25rem;">OWASP Top 10 vulnerabilities, API security, JWT identity tokens, network isolation, and incident mitigation.</p>
                  <div style="margin-top:0.5rem;display:flex;gap:0.5rem;">
                    <span class="badge badge-cyan">30 Hours Lab</span>
                    <span class="badge badge-navy">Credit Weight: 2</span>
                  </div>
                </div>
              </div>
              <div style="text-align:right;flex-shrink:0;">
                <span class="badge badge-success" style="font-size:0.875rem;">+3% Alignment</span>
              </div>
            </label>

          </div>
        </div>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-bottom" style="border-top:none;padding-top:0;">
        <span>© 2026 SkillPulse Institutional Simulator | Smart India Hackathon 2026</span>
        <span>Problem Statement 26134 | Team HACK.FORCE</span>
      </div>
    </div>
  </footer>

  <script src="js/data.js"></script>
  <script src="js/app.js"></script>
  <script src="js/pulseai.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      SkillPulse.initCurriculumSimulator();
    });
  </script>
</body>
</html>
