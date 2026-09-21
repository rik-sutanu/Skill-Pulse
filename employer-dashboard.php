<?php
$pageTitle = 'Employer & Recruiter Cockpit | SkillPulse Enterprise Matching';
$pageDesc = 'Enterprise talent dashboard matching verified college candidates scoring above industry readiness thresholds.';
$activeNav = 'employer-dashboard';
require_once __DIR__ . '/backend/security.php';
apply_government_security_headers();
require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content" style="flex:1;padding:2.5rem 0 4rem 0;" tabindex="-1">
  <div class="container" style="display:flex;flex-direction:column;gap:2.25rem;">

    <!-- Welcome Banner with Recruiter Context -->
    <div class="card" style="background:linear-gradient(135deg, var(--navy-900), var(--navy-800));color:#fff;padding:2rem;border:1px solid rgba(201,162,39,0.2);">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1.5rem;">
        <div>
          <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.5rem;flex-wrap:wrap;">
            <span class="badge" style="background:rgba(214,185,77,0.2);color:#D6B94D;border:1px solid rgba(214,185,77,0.4);">Enterprise Corporate Partner</span>
            <span class="badge" style="background:rgba(16,185,129,0.2);color:#34D399;border:1px solid rgba(16,185,129,0.4);">Verified Talent Pipeline</span>
            <span class="badge" style="background:rgba(201,162,39,0.2);color:#C9A227;border:1px solid rgba(201,162,39,0.4);">Zero Screening Overhead</span>
          </div>
          <h1 style="font-size:1.85rem;font-weight:800;color:#fff;margin:0 0 0.35rem 0;">
            Enterprise Talent Mobilization &amp; Candidate Matching
          </h1>
          <p style="color:#FAF6EE;opacity:0.9;font-size:0.95rem;margin:0;max-width:680px;line-height:1.5;">
            Access pre-screened polytechnic &amp; TVET students with objective, verified readiness scores. Zero resume fluff, verified credentials via <strong>DigiLocker ADV</strong>.
          </p>
        </div>

        <div style="display:flex;gap:0.75rem;align-items:center;flex-wrap:wrap;">
          <a href="employer.php" class="btn btn-primary btn-sm">
            <span>Open Requisition Builder &rarr;</span>
          </a>
          <a href="skill-intelligence.php" class="btn btn-secondary btn-sm" style="background:rgba(255,255,255,0.1);color:#fff;border-color:rgba(255,255,255,0.2);">
            State Demand Index
          </a>
        </div>
      </div>
    </div>

    <!-- Employer KPI Stats Grid -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-card-top">
          <span class="stat-card-label">Pre-Screened Candidates</span>
          <div class="stat-card-icon" style="background:var(--success-bg);color:var(--success);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><polyline points="16 11 18 13 22 9"/></svg></div>
        </div>
        <div class="stat-card-val" style="color:var(--success);">1,420</div>
        <span class="badge badge-success">&gt;80% Readiness Cutoff</span>
        <div class="stat-card-sub">Verified across Pune, Mumbai &amp; Nagpur</div>
      </div>

      <div class="stat-card">
        <div class="stat-card-top">
          <span class="stat-card-label">Active Requisitions</span>
          <div class="stat-card-icon" style="background:var(--primary-50);color:var(--primary-600);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
        </div>
        <div class="stat-card-val" style="color:var(--primary-600);">6 Roles</div>
        <span class="badge badge-primary">IT, BFSI &amp; Industrial IoT</span>
        <div class="stat-card-sub">48 total vacancy openings</div>
      </div>

      <div class="stat-card">
        <div class="stat-card-top">
          <span class="stat-card-label">Avg Time-to-Shortlist</span>
          <div class="stat-card-icon" style="background:var(--cyan-50);color:var(--cyan-600);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg></div>
        </div>
        <div class="stat-card-val" style="color:var(--cyan-600);">2.4 Days</div>
        <span class="badge badge-cyan">-70% vs Traditional Job Portals</span>
        <div class="stat-card-sub">Objective scoring eliminates screening calls</div>
      </div>

      <div class="stat-card">
        <div class="stat-card-top">
          <span class="stat-card-label">Interview Conversion</span>
          <div class="stat-card-icon" style="background:var(--warning-bg);color:var(--warning);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
        </div>
        <div class="stat-card-val" style="color:#D97706;">68.5%</div>
        <span class="badge badge-warning">Industry Standard: 22%</span>
        <div class="stat-card-sub">Top feedback: Practical code readiness</div>
      </div>
    </div>

    <!-- Candidate Pipeline Table with Verified Scores -->
    <div class="card" style="padding:0;overflow:hidden;border:1px solid var(--border);">
      <div style="padding:1.5rem 1.75rem;background:var(--navy-50);border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:0.75rem;">
        <div>
          <h2 style="font-size:1.2rem;font-weight:800;color:var(--navy-900);margin:0;">
            🎯 Pre-Screened Candidates Matching Open Requisitions
          </h2>
          <p style="font-size:0.8rem;color:var(--navy-500);margin:0.2rem 0 0 0;">
            Candidates with verified technical practice milestones and DigiLocker ADV academic credentials.
          </p>
        </div>
        <div style="display:flex;gap:0.5rem;">
          <a href="employer.php" class="btn btn-primary btn-sm">+ Post New Requisition</a>
        </div>
      </div>

      <div style="overflow-x:auto;">
        <table style="width:100%;border-collapse:collapse;font-size:0.875rem;text-align:left;">
          <thead>
            <tr style="background:var(--navy-100);color:var(--navy-800);border-bottom:1px solid var(--border);">
              <th style="padding:0.875rem 1.25rem;font-weight:700;">Candidate &amp; Institute</th>
              <th style="padding:0.875rem 1.25rem;font-weight:700;">Target Role</th>
              <th style="padding:0.875rem 1.25rem;font-weight:700;">Readiness Score</th>
              <th style="padding:0.875rem 1.25rem;font-weight:700;">Top Verified Skills</th>
              <th style="padding:0.875rem 1.25rem;font-weight:700;">Verification</th>
              <th style="padding:0.875rem 1.25rem;font-weight:700;">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom:1px solid var(--border);">
              <td style="padding:1rem 1.25rem;">
                <div style="font-weight:800;color:var(--navy-900);">Aditya Patil</div>
                <div style="font-size:0.75rem;color:var(--navy-500);">Govt Polytechnic Pune • CS Diploma</div>
              </td>
              <td style="padding:1rem 1.25rem;color:var(--navy-700);">
                Junior Data Analyst
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-success" style="font-size:0.85rem;font-weight:800;">78% Readiness</span>
                <div style="font-size:0.7rem;color:var(--navy-500);margin-top:2px;">Top 8% Pune Cohort</div>
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-primary" style="font-size:0.72rem;">SQL (92%)</span>
                <span class="badge badge-cyan" style="font-size:0.72rem;">Power BI (85%)</span>
                <span class="badge" style="background:#fff;border:1px solid var(--border);font-size:0.72rem;">Python</span>
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-success">✓ DigiLocker ADV</span>
              </td>
              <td style="padding:1rem 1.25rem;">
                <button class="btn btn-primary btn-sm" onclick="alert('Interview request queued! Candidate Aditya Patil notified via SMS and MahaSwayam dispatch.');">
                  Shortlist &amp; Interview
                </button>
              </td>
            </tr>

            <tr style="border-bottom:1px solid var(--border);">
              <td style="padding:1rem 1.25rem;">
                <div style="font-weight:800;color:var(--navy-900);">Pooja Deshmukh</div>
                <div style="font-size:0.75rem;color:var(--navy-500);">VJTI Mumbai • Information Technology</div>
              </td>
              <td style="padding:1rem 1.25rem;color:var(--navy-700);">
                Fullstack Web Developer
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-success" style="font-size:0.85rem;font-weight:800;">88% Readiness</span>
                <div style="font-size:0.7rem;color:var(--navy-500);margin-top:2px;">Top 3% Mumbai Cohort</div>
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-primary" style="font-size:0.72rem;">React.js</span>
                <span class="badge badge-cyan" style="font-size:0.72rem;">Node.js</span>
                <span class="badge" style="background:#fff;border:1px solid var(--border);font-size:0.72rem;">PostgreSQL</span>
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-success">✓ DigiLocker ADV</span>
              </td>
              <td style="padding:1rem 1.25rem;">
                <button class="btn btn-primary btn-sm" onclick="alert('Interview request sent to Pooja Deshmukh.');">
                  Shortlist &amp; Interview
                </button>
              </td>
            </tr>

            <tr>
              <td style="padding:1rem 1.25rem;">
                <div style="font-weight:800;color:var(--navy-900);">Rohan Shinde</div>
                <div style="font-size:0.75rem;color:var(--navy-500);">Govt Polytechnic Nashik • Mechanical</div>
              </td>
              <td style="padding:1rem 1.25rem;color:var(--navy-700);">
                CNC Programmer &amp; Operator
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-success" style="font-size:0.85rem;font-weight:800;">82% Readiness</span>
                <div style="font-size:0.7rem;color:var(--navy-500);margin-top:2px;">Top 6% Nashik Cohort</div>
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-primary" style="font-size:0.72rem;">CNC Turning</span>
                <span class="badge badge-cyan" style="font-size:0.72rem;">Mastercam</span>
                <span class="badge" style="background:#fff;border:1px solid var(--border);font-size:0.72rem;">G-Code</span>
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-success">✓ DVET ITI Sync</span>
              </td>
              <td style="padding:1rem 1.25rem;">
                <button class="btn btn-primary btn-sm" onclick="alert('Interview request sent to Rohan Shinde.');">
                  Shortlist &amp; Interview
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    <!-- Corporate Demand Benchmarks Across Tiers -->
    <div class="card" style="padding:1.5rem 1.75rem;border:1px solid var(--border);">
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;flex-wrap:wrap;gap:0.75rem;">
        <div>
          <h2 style="font-size:1.15rem;font-weight:800;color:var(--navy-900);margin:0;">
            📊 Industry Hiring Benchmarks: Tier 1, IT Services &amp; Core
          </h2>
          <p style="font-size:0.8rem;color:var(--navy-500);margin:0.2rem 0 0 0;">
            Real-time candidate readiness cutoff thresholds and talent demand across 17 benchmark companies in Maharashtra.
          </p>
        </div>
        <a href="skill-intelligence.php#corporateHiringRadarSection" class="btn btn-secondary btn-sm">
          View Corporate Radar &rarr;
        </a>
      </div>

      <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:1rem;">
        <div style="padding:1rem;background:var(--navy-50);border-radius:var(--radius-md);border:1px solid var(--border);">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.4rem;">
            <span class="badge badge-primary">Tier 1 High Tech</span>
            <span style="font-weight:800;color:var(--primary-600);font-size:0.85rem;">80-85% Cutoff</span>
          </div>
          <div style="font-size:0.875rem;font-weight:700;color:var(--navy-900);margin-bottom:0.25rem;">Google, Microsoft, Amazon, Flipkart, Oracle</div>
          <p style="font-size:0.78rem;color:var(--navy-600);margin:0;">Demands: Advanced DSA (O(N) Algorithms), System Architecture, Cloud Services (GCP/AWS/Azure), Python/Java/C++.</p>
        </div>

        <div style="padding:1rem;background:var(--navy-50);border-radius:var(--radius-md);border:1px solid var(--border);">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.4rem;">
            <span class="badge badge-cyan">IT Services &amp; Mid Tech</span>
            <span style="font-weight:800;color:var(--cyan-700);font-size:0.85rem;">68-72% Cutoff</span>
          </div>
          <div style="font-size:0.875rem;font-weight:700;color:var(--navy-900);margin-bottom:0.25rem;">TCS, Infosys, Wipro, Cognizant, Persistent, Hexaware</div>
          <p style="font-size:0.78rem;color:var(--navy-600);margin:0;">Demands: Full Stack Web (React/Node), SQL Joins &amp; Normalization, Core Java/Python, Agile Testing &amp; Git.</p>
        </div>

        <div style="padding:1rem;background:var(--navy-50);border-radius:var(--radius-md);border:1px solid var(--border);">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.4rem;">
            <span class="badge badge-warning">Non-Tech &amp; Core Industry</span>
            <span style="font-weight:800;color:#D97706;font-size:0.85rem;">68-75% Cutoff</span>
          </div>
          <div style="font-size:0.875rem;font-weight:700;color:var(--navy-900);margin-bottom:0.25rem;">Tata Motors, L&amp;T, Mahindra, HDFC Bank, Bajaj Auto, Reliance</div>
          <p style="font-size:0.78rem;color:var(--navy-600);margin:0;">Demands: PLC Automation (Siemens), AutoCAD/SolidWorks, CNC Machining, Advanced Excel &amp; Financial Reconciliation, SAP ERP.</p>
        </div>
      </div>
    </div>

  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
