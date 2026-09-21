<?php
$pageTitle = 'About & How It Works | SkillPulse TVET Alignment Engine';
$pageDesc = 'Comprehensive methodology explaining how Live Labor Index and Job Readiness Scores are computed from national and state skill feeds.';
$activeNav = 'how-it-works';
require_once __DIR__ . '/backend/security.php';
apply_government_security_headers();
require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content" style="flex:1;padding:2.5rem 0 4rem 0;" tabindex="-1">
  <div class="container" style="display:flex;flex-direction:column;gap:2.5rem;">

    <!-- Breadcrumb & Header -->
    <div>
      <nav aria-label="Breadcrumb" style="font-size:0.85rem;color:var(--navy-500);margin-bottom:0.5rem;">
        <a href="index.php" style="color:var(--navy-500);text-decoration:none;">Home</a> &gt;
        <span style="color:var(--primary-600);font-weight:600;" aria-current="page">How It Works</span>
      </nav>
      <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.5rem;flex-wrap:wrap;">
        <span class="badge badge-primary" style="font-weight:700;">National TVET Alignment Framework</span>
        <span class="badge badge-cyan" style="font-weight:600;">Algorithmic Transparency</span>
        <span class="badge badge-success" style="font-weight:600;">DPDP Act §6 Compliant</span>
      </div>
      <h1 style="font-size:2.25rem;font-weight:900;color:var(--navy-900);letter-spacing:-0.02em;">
        How SkillPulse Works: Methodology &amp; Mathematical Formulation
      </h1>
      <p style="color:var(--navy-600);font-size:1rem;max-width:850px;margin-top:0.35rem;line-height:1.6;">
        SkillPulse bridges the structural gap between real-time labor demand and technical educational curricula. Here is how our dual engines—the <strong>Live Labor Index</strong> and the <strong>Candidate Job Readiness Score</strong>—are objectively calculated.
      </p>
    </div>

    <!-- Dynamic Industry-to-Skill Alignment Engine Live Showcase -->
    <section class="card" style="padding:2.25rem 2rem;background:#ffffff;border:1px solid var(--border);border-radius:var(--radius-xl);box-shadow:var(--shadow-md);">
      <div class="engine-showcase-grid">
        
        <!-- Left Column: Context & Overview -->
        <div>
          <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.75rem;flex-wrap:wrap;">
            <span class="badge badge-primary" style="background:#C9A227;color:#2E0D0E;font-weight:700;">Live Telemetry Interface</span>
            <span class="badge badge-cyan" style="font-weight:600;">Dual-Engine Convergence</span>
          </div>
          <h2 style="font-size:1.75rem;font-weight:800;color:var(--text-main);letter-spacing:-0.02em;margin-bottom:0.75rem;line-height:1.25;">
            Dynamic Alignment Engine In Action
          </h2>
          <p style="color:var(--text-muted);font-size:0.95rem;line-height:1.6;margin-bottom:1.25rem;">
            This live diagnostic cockpit demonstrates how SkillPulse cross-references individual candidate competencies against real-time macro demand metrics from national (<strong>National Career Service - NCS</strong>) and state (<strong>MahaSwayam</strong>) repositories.
          </p>
          
          <div style="display:flex;flex-direction:column;gap:0.85rem;margin-bottom:1.5rem;">
            <div style="display:flex;align-items:flex-start;gap:0.75rem;">
              <span style="font-size:1.15rem;margin-top:1px;">🔄</span>
              <div>
                <strong style="color:var(--text-main);font-size:0.875rem;">Continuous Demand Ingestion:</strong>
                <span style="color:var(--text-muted);font-size:0.875rem;"> Requisitions scraped, de-duplicated, and indexed across 18.4L+ national openings and 2.84L+ Maharashtra state vacancies.</span>
              </div>
            </div>
            <div style="display:flex;align-items:flex-start;gap:0.75rem;">
              <span style="font-size:1.15rem;margin-top:1px;">🎯</span>
              <div>
                <strong style="color:var(--text-main);font-size:0.875rem;">Multi-Factor Readiness (78%):</strong>
                <span style="color:var(--text-muted);font-size:0.875rem;"> Objective evaluation weighted across technical practice tests, curriculum capstones, diagnostic retakes, and verified credentials.</span>
              </div>
            </div>
            <div style="display:flex;align-items:flex-start;gap:0.75rem;">
              <span style="font-size:1.15rem;margin-top:1px;">🏆</span>
              <div>
                <strong style="color:var(--text-main);font-size:0.875rem;">Benchmark &amp; Placement Priority:</strong>
                <span style="color:var(--text-muted);font-size:0.875rem;"> Candidates achieving 75%+ unlock Gold Tier priority interview referrals with registered corporate recruiters.</span>
              </div>
            </div>
          </div>

          <div style="display:flex;align-items:center;gap:0.75rem;flex-wrap:wrap;">
            <a href="skill-gap-analyzer.php" class="btn btn-primary btn-sm" style="background:#C9A227;color:#2E0D0E;font-weight:700;">
              Launch React Gap Analyzer &rarr;
            </a>
            <a href="data-sources.php" class="btn btn-secondary btn-sm">
              View Data Pipelines
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
                  <linearGradient id="readinessGradHowItWorks" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#C9A227" />
                    <stop offset="100%" stop-color="#38BDF8" />
                  </linearGradient>
                </defs>
                <circle cx="80" cy="80" r="70" stroke-width="12" fill="none" class="readiness-ring-circle-bg" />
                <circle cx="80" cy="80" r="70" stroke-width="12" fill="none" stroke-linecap="round" class="readiness-ring-circle-fg" style="stroke:url(#readinessGradHowItWorks);" />
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

    <!-- Core Methodology 2-Pillar Grid -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(360px, 1fr));gap:2rem;">

      <!-- Pillar 1: Live Labor Index Calculation -->
      <div class="card" style="padding:2rem;border-top:4px solid var(--primary-600);">
        <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1rem;">
          <div style="width:40px;height:40px;border-radius:10px;background:rgba(37,99,235,0.1);display:flex;align-items:center;justify-content:center;font-size:1.3rem;">
            📊
          </div>
          <div>
            <h2 style="font-size:1.3rem;font-weight:800;color:var(--navy-900);margin:0;">1. Live Labor Index Calculation</h2>
            <span style="font-size:0.75rem;color:var(--navy-500);">Macro Demand Aggregation Engine</span>
          </div>
        </div>

        <p style="font-size:0.875rem;color:var(--navy-600);line-height:1.6;margin-bottom:1.25rem;">
          The Live Labor Index aggregates job openings and apprenticeship requirements across national (<strong>National Career Service</strong>) and state (<strong>MahaSwayam</strong>) portals. The index normalizes demand by sector, district density, and hiring velocity:
        </p>

        <div style="background:var(--navy-50);padding:1.25rem;border-radius:var(--radius-md);border:1px solid var(--border);font-family:monospace;font-size:0.82rem;color:var(--navy-900);margin-bottom:1.25rem;line-height:1.7;">
          <strong>Labor Demand Vector:</strong><br/>
          $$D_{total} = \sum_{i=1}^{N} (V_{NCS, i} \cdot \alpha_i) + \sum_{j=1}^{M} (V_{Maha, j} \cdot \beta_j \cdot \delta_{dist})$$<br/>
          <span style="color:var(--navy-500);font-size:0.75rem;">
            Where: V = Verified Vacancy Count, &alpha; = National Weight, &beta; = State Weight, &delta; = District Absorption Factor.
          </span>
        </div>

        <ul style="font-size:0.85rem;color:var(--navy-700);line-height:1.6;padding-left:1.2rem;">
          <li><strong>Real-time De-duplication:</strong> Requisitions cross-checked by corporate CIN and GSTIN to prevent double-counting.</li>
          <li><strong>Skill Tag Extraction:</strong> Natural language processing (TF-IDF &amp; token vectorizers) extracts granular skill tags (e.g., CNC Turning, SQL Indexing, Power BI DAX).</li>
          <li><strong>Cadence:</strong> Re-indexed every 6 hours for state feeds and daily for national repositories.</li>
        </ul>
      </div>

      <!-- Pillar 2: Job Readiness Score Formula -->
      <div class="card" style="padding:2rem;border-top:4px solid var(--cyan-500);">
        <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1rem;">
          <div style="width:40px;height:40px;border-radius:10px;background:rgba(6,182,212,0.1);display:flex;align-items:center;justify-content:center;font-size:1.3rem;">
            🎯
          </div>
          <div>
            <h2 style="font-size:1.3rem;font-weight:800;color:var(--navy-900);margin:0;">2. Candidate Job Readiness Score</h2>
            <span style="font-size:0.75rem;color:var(--navy-500);">Multi-Dimensional Competency Metric</span>
          </div>
        </div>

        <p style="font-size:0.875rem;color:var(--navy-600);line-height:1.6;margin-bottom:1.25rem;">
          The Job Readiness Score (0-100%) is an objective, deterministic evaluation representing how closely a candidate matches live industry requisitions for their target role:
        </p>

        <div style="background:var(--navy-50);padding:1.25rem;border-radius:var(--radius-md);border:1px solid var(--border);font-family:monospace;font-size:0.82rem;color:var(--navy-900);margin-bottom:1.25rem;line-height:1.7;">
          <strong>Readiness Score Formulation:</strong><br/>
          $$\text{Score} = (0.35 \cdot S_{practice}) + (0.30 \cdot S_{courses}) + (0.20 \cdot S_{diagnostic}) + (0.15 \cdot S_{verification})$$
        </div>

        <div style="display:flex;flex-direction:column;gap:0.75rem;font-size:0.85rem;">
          <div style="display:flex;justify-content:space-between;padding-bottom:0.4rem;border-bottom:1px solid var(--border);">
            <span><strong>Technical Practice Arena (35%):</strong> Solved code tests, coding problems &amp; practical trade challenges.</span>
            <span class="badge badge-primary">35%</span>
          </div>
          <div style="display:flex;justify-content:space-between;padding-bottom:0.4rem;border-bottom:1px solid var(--border);">
            <span><strong>Bridging Courses &amp; Labs (30%):</strong> Completed capstones on enterprise technologies (SQL, Power BI, IoT).</span>
            <span class="badge badge-cyan">30%</span>
          </div>
          <div style="display:flex;justify-content:space-between;padding-bottom:0.4rem;border-bottom:1px solid var(--border);">
            <span><strong>Diagnostic Retests (20%):</strong> Closed gap scores from periodic assessment tests.</span>
            <span class="badge badge-warning">20%</span>
          </div>
          <div style="display:flex;justify-content:space-between;">
            <span><strong>Govt Verification (15%):</strong> DigiLocker verified MSBTE/DVET academic credentials.</span>
            <span class="badge badge-success">15%</span>
          </div>
        </div>
      </div>

    </div>

    <!-- Machine Learning & Explainability Section -->
    <div class="card" style="padding:2.25rem;background:radial-gradient(ellipse at top left, rgba(37,99,235,0.04), transparent 70%);border:1px solid rgba(37,99,235,0.2);">
      <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1rem;">
        <span style="font-size:1.5rem;">🤖</span>
        <h2 style="font-size:1.35rem;font-weight:800;color:var(--navy-900);margin:0;">
          AI/ML Decision Support &amp; Feature Explainability
        </h2>
      </div>
      <p style="font-size:0.9rem;color:var(--navy-600);line-height:1.6;margin-bottom:1.5rem;max-width:850px;">
        To assist academic deans and hiring recruiters, SkillPulse pairs deterministic point scoring with an isolated Python machine learning microservice (FastAPI). This model performs:
      </p>

      <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:1.25rem;">
        <div style="background:#fff;padding:1.25rem;border-radius:var(--radius-md);border:1px solid var(--border);">
          <div style="font-weight:700;color:var(--primary-600);margin-bottom:0.35rem;">NLP Resume/Skill Matching</div>
          <p style="font-size:0.8rem;color:var(--navy-600);line-height:1.5;margin:0;">
            TF-IDF vector cosine similarity matches student verified competencies against uncurated job descriptions, returning an alignment coefficient without subjective human bias.
          </p>
        </div>

        <div style="background:#fff;padding:1.25rem;border-radius:var(--radius-md);border:1px solid var(--border);">
          <div style="font-weight:700;color:var(--cyan-600);margin-bottom:0.35rem;">Placement Likelihood Prediction</div>
          <p style="font-size:0.8rem;color:var(--navy-600);line-height:1.5;margin:0;">
            A gradient-boosted regression model trained on historical placement cohorts outputs estimated interview conversion rates and SHAP feature importances explaining <em>why</em> a candidate scored high.
          </p>
        </div>

        <div style="background:#fff;padding:1.25rem;border-radius:var(--radius-md);border:1px solid var(--border);">
          <div style="font-weight:700;color:var(--success);margin-bottom:0.35rem;">Labor Demand Trend Forecasting</div>
          <p style="font-size:0.8rem;color:var(--navy-600);line-height:1.5;margin:0;">
            Time-series forecasting projects quarterly skill demand 3-6 months ahead, giving curriculum planners early indicators of rising technologies before curriculum freeze dates.
          </p>
        </div>
      </div>
    </div>

    <!-- Platform Architecture & Tech Stack (Moved from public footer) -->
    <div class="card" style="padding:2rem;">
      <h2 style="font-size:1.25rem;font-weight:800;color:var(--navy-900);margin-bottom:1rem;">
        Platform Architecture &amp; Technology Stack
      </h2>
      <p style="font-size:0.875rem;color:var(--navy-600);margin-bottom:1.5rem;">
        SkillPulse is engineered with a hybrid micro-frontend architecture combining high-throughput server rendering with interactive client state engines:
      </p>

      <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:1rem;">
        <div style="padding:1rem;background:var(--navy-50);border-radius:8px;border:1px solid var(--border);">
          <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;">Core Application</div>
          <div style="font-weight:800;color:var(--navy-900);margin:0.25rem 0;">PHP 8.3 &amp; Vanilla JS</div>
          <div style="font-size:0.75rem;color:var(--navy-600);">High-performance server rendering with GIGW 3.0 accessibility.</div>
        </div>

        <div style="padding:1rem;background:var(--navy-50);border-radius:8px;border:1px solid var(--border);">
          <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;">Interactive Simulators</div>
          <div style="font-weight:800;color:var(--navy-900);margin:0.25rem 0;">React 18 UMD Production</div>
          <div style="font-size:0.75rem;color:var(--navy-600);">Curriculum simulator, skill-gap radar, and interview practice sandbox.</div>
        </div>

        <div style="padding:1rem;background:var(--navy-50);border-radius:8px;border:1px solid var(--border);">
          <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;">AI Microservice</div>
          <div style="font-weight:800;color:var(--navy-900);margin:0.25rem 0;">Python FastAPI &amp; Scikit</div>
          <div style="font-size:0.75rem;color:var(--navy-600);">Isolated inference pipeline for NLP matching, scoring explainability &amp; trends.</div>
        </div>

        <div style="padding:1rem;background:var(--navy-50);border-radius:8px;border:1px solid var(--border);">
          <div style="font-size:0.75rem;font-weight:700;color:var(--navy-500);text-transform:uppercase;">Statutory Compliance</div>
          <div style="font-weight:800;color:var(--navy-900);margin:0.25rem 0;">DPDP Act 2023 &amp; ADV</div>
          <div style="font-size:0.75rem;color:var(--navy-600);">UIDAI Aadhaar Data Vault reference keys &amp; CERT-In 180-day audit logging.</div>
        </div>
      </div>
    </div>

    <!-- Quick Navigation Links -->
    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem;padding-top:1rem;border-top:1px solid var(--border);">
      <a href="data-sources.php" class="btn btn-secondary">
        <span>View Data Feeds &amp; Refresh Cadence &rarr;</span>
      </a>
      <a href="skill-gap-analyzer.php" class="btn btn-primary">
        <span>Test Your Readiness Score Now &rarr;</span>
      </a>
    </div>

  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
