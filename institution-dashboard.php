<?php
$pageTitle = 'Institution & Faculty TVET Cockpit | SkillPulse Institutional Portal';
$pageDesc = 'Institutional dashboard for TVET college deans and faculty tracking cohort readiness, curriculum alignment, and syllabus gaps.';
$activeNav = 'institution';
require_once __DIR__ . '/backend/security.php';
apply_government_security_headers();
require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content" style="flex:1;padding:2.5rem 0 4rem 0;" tabindex="-1">
  <div class="container" style="display:flex;flex-direction:column;gap:2.25rem;">

    <!-- Welcome Banner with Institutional Context -->
    <div class="card" style="background:linear-gradient(135deg, var(--navy-900), var(--navy-800));color:#fff;padding:2rem;border:1px solid rgba(201,162,39,0.2);">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1.5rem;">
        <div>
          <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.5rem;flex-wrap:wrap;">
            <span class="badge" style="background:rgba(16,185,129,0.2);color:#34D399;border:1px solid rgba(16,185,129,0.4);">Affiliated Institute (MSBTE)</span>
            <span class="badge" style="background:rgba(214,185,77,0.2);color:#D6B94D;border:1px solid rgba(214,185,77,0.4);">Govt Polytechnic Pune / DTE</span>
            <span class="badge" style="background:rgba(201,162,39,0.2);color:#C9A227;border:1px solid rgba(201,162,39,0.4);">Dean &amp; Faculty Cockpit</span>
          </div>
          <h1 style="font-size:1.85rem;font-weight:800;color:#fff;margin:0 0 0.35rem 0;">
            Institutional TVET &amp; Curriculum Governance Portal
          </h1>
          <p style="color:#FAF6EE;opacity:0.9;font-size:0.95rem;margin:0;max-width:680px;line-height:1.5;">
            Track student cohort readiness scores, simulate syllabus elective impacts before curriculum freeze dates, and export compliance reports for <strong>MSBTE &amp; DVET</strong>.
          </p>
        </div>

        <div style="display:flex;gap:0.75rem;align-items:center;flex-wrap:wrap;">
          <a href="training-curriculum.php" class="btn btn-primary btn-sm">
            <span>Launch Curriculum Simulator &rarr;</span>
          </a>
          <a href="data-sources.php" class="btn btn-secondary btn-sm" style="background:rgba(255,255,255,0.1);color:#fff;border-color:rgba(255,255,255,0.2);">
            Syllabus Standards
          </a>
        </div>
      </div>
    </div>

    <!-- Institutional KPI Stats Grid -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-card-top">
          <span class="stat-card-label">Cohort Avg Readiness</span>
          <div class="stat-card-icon" style="background:var(--primary-50);color:var(--primary-600);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg></div>
        </div>
        <div class="stat-card-val" style="color:var(--primary-600);">74.2%</div>
        <span class="badge badge-success">+8.4% YoY Improvement</span>
        <div class="stat-card-sub">Industry placement cutoff: 80.0%</div>
      </div>

      <div class="stat-card">
        <div class="stat-card-top">
          <span class="stat-card-label">Enrolled Candidates</span>
          <div class="stat-card-icon" style="background:var(--cyan-50);color:var(--cyan-600);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
        </div>
        <div class="stat-card-val" style="color:var(--cyan-600);">1,840</div>
        <span class="badge badge-cyan">4 Active Departments</span>
        <div class="stat-card-sub">1,420 DigiLocker ADV verified (77%)</div>
      </div>

      <div class="stat-card">
        <div class="stat-card-top">
          <span class="stat-card-label">Syllabus Alignment Score</span>
          <div class="stat-card-icon" style="background:var(--warning-bg);color:var(--warning);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
        </div>
        <div class="stat-card-val" style="color:#D97706;">78.0%</div>
        <span class="badge badge-warning">Simulated Boost: 89%</span>
        <div class="stat-card-sub">Gap: Cloud Native &amp; GenAI Modules</div>
      </div>

      <div class="stat-card">
        <div class="stat-card-top">
          <span class="stat-card-label">MahaSwayam Hired</span>
          <div class="stat-card-icon" style="background:var(--success-bg);color:var(--success);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg></div>
        </div>
        <div class="stat-card-val" style="color:var(--success);">385 Offers</div>
        <span class="badge badge-success">86% Placement Velocity</span>
        <div class="stat-card-sub">Avg Package: ₹4.8L - ₹7.2L/yr</div>
      </div>
    </div>

    <!-- Trade & Curriculum Alignment Matrix -->
    <div class="card" style="padding:2rem;">
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;flex-wrap:wrap;gap:0.75rem;">
        <div>
          <h2 style="font-size:1.25rem;font-weight:800;color:var(--navy-900);margin:0;">
            Departmental Curriculum Alignment Breakdown
          </h2>
          <p style="font-size:0.8rem;color:var(--navy-500);margin:0.2rem 0 0 0;">
            Evaluation of institutional syllabus schemes (I/K-Scheme) mapped against 2026 employer vacancy weightings.
          </p>
        </div>
        <a href="training-curriculum.php" class="btn btn-primary btn-sm">Simulate Elective Addition (React)</a>
      </div>

      <div style="display:flex;flex-direction:column;gap:1.25rem;">
        <!-- Dept 1 -->
        <div style="padding:1.25rem;background:var(--navy-50);border:1px solid var(--border);border-radius:var(--radius-md);">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.5rem;flex-wrap:wrap;gap:0.5rem;">
            <div>
              <span style="font-weight:800;color:var(--navy-900);">Computer Engineering &amp; IT Diploma</span>
              <span style="font-size:0.75rem;color:var(--navy-500);margin-left:0.5rem;">(540 Students)</span>
            </div>
            <span class="badge badge-success" style="font-weight:700;">84% Alignment (High)</span>
          </div>
          <div class="progress-track" style="margin-bottom:0.6rem;"><div class="progress-fill" style="width:84%;background:linear-gradient(90deg, var(--primary-600), var(--success));"></div></div>
          <div style="display:flex;justify-content:space-between;font-size:0.75rem;color:var(--navy-600);">
            <span>Core Strengths: Python, Web Fullstack, Relational DBs</span>
            <span>Priority Gap: <strong>Cloud Native Microservices (Docker/K8s)</strong></span>
          </div>
        </div>

        <!-- Dept 2 -->
        <div style="padding:1.25rem;background:var(--navy-50);border:1px solid var(--border);border-radius:var(--radius-md);">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.5rem;flex-wrap:wrap;gap:0.5rem;">
            <div>
              <span style="font-weight:800;color:var(--navy-900);">Mechanical &amp; Smart Manufacturing</span>
              <span style="font-size:0.75rem;color:var(--navy-500);margin-left:0.5rem;">(480 Students)</span>
            </div>
            <span class="badge" style="background:rgba(245,158,11,0.2);color:#D97706;font-weight:700;">72% Alignment (Moderate)</span>
          </div>
          <div class="progress-track" style="margin-bottom:0.6rem;"><div class="progress-fill" style="width:72%;background:linear-gradient(90deg, #F59E0B, var(--cyan-500));"></div></div>
          <div style="display:flex;justify-content:space-between;font-size:0.75rem;color:var(--navy-600);">
            <span>Core Strengths: CAD/CAM, CNC Programming, Metallurgy</span>
            <span>Priority Gap: <strong>Industrial IoT &amp; PLC Automation</strong></span>
          </div>
        </div>

        <!-- Dept 3 -->
        <div style="padding:1.25rem;background:var(--navy-50);border:1px solid var(--border);border-radius:var(--radius-md);">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.5rem;flex-wrap:wrap;gap:0.5rem;">
            <div>
              <span style="font-weight:800;color:var(--navy-900);">Electrical &amp; EV Technology</span>
              <span style="font-size:0.75rem;color:var(--navy-500);margin-left:0.5rem;">(420 Students)</span>
            </div>
            <span class="badge" style="background:rgba(245,158,11,0.2);color:#D97706;font-weight:700;">69% Alignment (Moderate)</span>
          </div>
          <div class="progress-track" style="margin-bottom:0.6rem;"><div class="progress-fill" style="width:69%;background:linear-gradient(90deg, #F59E0B, #EF4444);"></div></div>
          <div style="display:flex;justify-content:space-between;font-size:0.75rem;color:var(--navy-600);">
            <span>Core Strengths: Power Grids, Electrical Machines</span>
            <span>Priority Gap: <strong>EV Battery Management &amp; Telematics</strong></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Actions Deck -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:1.5rem;">
      <div class="card" style="padding:1.5rem;">
        <h3 style="font-size:1.05rem;font-weight:700;color:var(--navy-900);margin-bottom:0.5rem;">
          📥 Download MSBTE Compliance Package
        </h3>
        <p style="font-size:0.8rem;color:var(--navy-600);margin-bottom:1rem;">
          Export verified student attendance logs, DigiLocker ADV certification certificates, and statutory audit data.
        </p>
        <button class="btn btn-secondary btn-sm" onclick="alert('Statutory report generated and logged under CERT-In guidelines.');">
          Export PDF Audit Report
        </button>
      </div>

      <div class="card" style="padding:1.5rem;">
        <h3 style="font-size:1.05rem;font-weight:700;color:var(--navy-900);margin-bottom:0.5rem;">
          ⚡ Batch Schedule Diagnostic Retests
        </h3>
        <p style="font-size:0.8rem;color:var(--navy-600);margin-bottom:1rem;">
          Notify 240 low-readiness students to complete targeted bridging modules before placement drives.
        </p>
        <button class="btn btn-primary btn-sm" onclick="alert('Notification sent to 240 students via portal announcement.');">
          Dispatch Retest Campaign
        </button>
      </div>
    </div>

  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
