<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Industry Mentors | SkillPulse 1-on-1 Advisory</title>
  <meta name="description" content="Connect with verified engineers, data leads, and recruiters for 1-on-1 resume reviews, mock interviews, and career guidance.">
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
          <span class="brand-text-sub">Industry Mentors</span>
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
            <a href="experts.php" class="dropdown-item active" role="menuitem">
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
        <button class="btn btn-primary btn-sm nav-btn-cta" onclick="SkillPulse.toast('Mentorship application submitted!','info')">Become a Mentor</button>
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
        <a href="experts.php" class="mobile-nav-link active">Industry Experts</a>

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
        <span class="badge badge-primary" style="margin-bottom:0.5rem;">1-on-1 Career Advisory</span>
        <h1 style="font-size:2rem;font-weight:800;color:var(--navy-900);">Verified Industry Mentors</h1>
        <p style="color:var(--navy-600);font-size:0.95rem;margin-top:0.25rem;">
          Get direct personalized feedback on your portfolio, mock technical rounds, and insights on overcoming specific skill gaps.
        </p>
      </div>

      <!-- Mentors Grid -->
      <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(320px, 1fr));gap:1.5rem;" id="mentorsGrid">
        <!-- Rendered by JS -->
      </div>

    </div>
  </main>

  <!-- Booking Modal -->
  <div class="modal-backdrop" id="mentorModal">
    <div class="modal-box">
      <div class="modal-header">
        <h3 id="modalMentorName" style="font-size:1.2rem;font-weight:800;color:var(--navy-900);">Schedule Mentorship</h3>
        <button style="background:none;border:none;cursor:pointer;" data-close-modal>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
      <div class="modal-body">
        <div style="display:flex;flex-direction:column;gap:1rem;">
          <div>
            <label style="display:block;font-size:0.875rem;font-weight:700;color:var(--navy-900);margin-bottom:0.35rem;">Session Objective:</label>
            <select id="sessionType" style="width:100%;padding:0.625rem;border:1px solid var(--border);border-radius:var(--radius-md);font-size:0.875rem;">
              <option>Skill Gap Review &amp; Learning Plan (30 Min)</option>
              <option>Mock Technical Interview &amp; Live Coding (45 Min)</option>
              <option>Resume &amp; Project Portfolio Audit (30 Min)</option>
            </select>
          </div>
          <div>
            <label style="display:block;font-size:0.875rem;font-weight:700;color:var(--navy-900);margin-bottom:0.35rem;">Preferred Date &amp; Slot:</label>
            <input type="datetime-local" style="width:100%;padding:0.625rem;border:1px solid var(--border);border-radius:var(--radius-md);font-size:0.875rem;" />
          </div>
          <div>
            <label style="display:block;font-size:0.875rem;font-weight:700;color:var(--navy-900);margin-bottom:0.35rem;">Your Question or Context:</label>
            <textarea placeholder="e.g. Preparing for Data Analyst roles, need advice on bridging SQL gaps..." rows="3" style="width:100%;padding:0.625rem;border:1px solid var(--border);border-radius:var(--radius-md);font-size:0.875rem;"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" data-close-modal>Cancel</button>
        <button class="btn btn-primary btn-sm" id="btnConfirmBooking">Confirm Free SIH Slot</button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-bottom" style="border-top:none;padding-top:0;">
        <span>© 2026 SkillPulse Mentors | Smart India Hackathon 2026</span>
        <span>Problem Statement 26134 | Team HACK.FORCE</span>
      </div>
    </div>
  </footer>

  <script src="js/data.js"></script>
  <script src="js/app.js"></script>
  <script src="js/pulseai.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const mentors = [
        {
          id: 'm1',
          name: 'Priyanka Sen',
          role: 'Staff ML Engineer @ Amazon AWS',
          domain: 'AI & Data Science',
          experience: '9+ Years',
          rating: '4.95 ★ (140+ sessions)',
          bio: 'Specializes in LLM deployment, NLP pipelines, and transitioning academic students into enterprise AI roles.',
          skills: ['Python', 'LLMOps', 'PyTorch', 'System Design']
        },
        {
          id: 'm2',
          name: 'Rohit Kulkarni',
          role: 'Principal Software Architect @ Microsoft',
          domain: 'Backend & Cloud',
          experience: '12+ Years',
          rating: '4.98 ★ (220+ sessions)',
          bio: 'Ex-startup CTO. Deep experience in high-throughput distributed architectures and mentoring junior developers.',
          skills: ['Node.js', 'PostgreSQL', 'Docker', 'Kubernetes']
        },
        {
          id: 'm3',
          name: 'Sneha Deshmukh',
          role: 'Lead Frontend Engineer @ Swiggy',
          domain: 'Web & UI Systems',
          experience: '7+ Years',
          rating: '4.90 ★ (95+ sessions)',
          bio: 'Passionate about component design systems, React performance, and modern CSS layout architectures.',
          skills: ['React.js', 'Next.js', 'Tailwind CSS', 'JavaScript']
        }
      ];

      const grid = document.getElementById('mentorsGrid');
      grid.innerHTML = mentors.map(m => `
        <div class="card" style="display:flex;flex-direction:column;justify-content:space-between;padding:1.75rem;">
          <div>
            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:0.75rem;">
              <div>
                <h3 style="font-size:1.2rem;font-weight:800;color:var(--navy-900);">${m.name}</h3>
                <p style="font-size:0.875rem;font-weight:600;color:var(--primary-600);">${m.role}</p>
              </div>
              <span class="badge badge-success">Verified Mentor</span>
            </div>

            <p style="font-size:0.875rem;color:var(--navy-600);margin:0.75rem 0 1rem 0;line-height:1.5;">${m.bio}</p>

            <div style="display:flex;flex-wrap:wrap;gap:0.35rem;margin-bottom:1.25rem;">
              ${m.skills.map(s => `<span class="badge badge-navy">${s}</span>`).join('')}
            </div>
          </div>

          <div style="padding-top:1rem;border-top:1px solid var(--border-light);display:flex;align-items:center;justify-content:space-between;">
            <div style="font-size:0.8125rem;color:var(--navy-500);">
              <div style="font-weight:700;color:var(--warning);">${m.rating}</div>
              <div>${m.experience} Experience</div>
            </div>
            <button class="btn btn-primary btn-sm" onclick="openMentorModal('${m.name}')">Book Free Slot</button>
          </div>
        </div>
      `).join('');

      window.openMentorModal = function(name) {
        document.getElementById('modalMentorName').textContent = `Book Session with ${name}`;
        SkillPulse.openModal('mentorModal');
      };

      document.getElementById('btnConfirmBooking').addEventListener('click', () => {
        SkillPulse.closeModal('mentorModal');
        SkillPulse.toast('Mentorship session confirmed! Google Meet link sent to your email.', 'success');
      });
    });
  </script>
</body>
</html>
