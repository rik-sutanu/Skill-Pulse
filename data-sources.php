<?php
$pageTitle = 'Data Sources & Methodology | SkillPulse TVET Intelligence';
$pageDesc = 'Inventory of official government feeds, live vacancy APIs, MSBTE curricula standards, and data ingestion refresh cadence.';
$activeNav = 'data-sources';
require_once __DIR__ . '/backend/security.php';
apply_government_security_headers();
require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content" style="flex:1;padding:2.5rem 0 4rem 0;" tabindex="-1">
  <div class="container" style="display:flex;flex-direction:column;gap:2.5rem;">

    <!-- Breadcrumb & Title -->
    <div>
      <nav aria-label="Breadcrumb" style="font-size:0.85rem;color:var(--navy-500);margin-bottom:0.5rem;">
        <a href="index.php" style="color:var(--navy-500);text-decoration:none;">Home</a> &gt;
        <span style="color:var(--primary-600);font-weight:600;" aria-current="page">Data Sources &amp; Methodology</span>
      </nav>
      <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.5rem;flex-wrap:wrap;">
        <span class="badge badge-success">Govt Data Feeds: Operational</span>
        <span class="badge badge-primary">GIGW 3.0 Standard</span>
        <span class="badge badge-navy">MeitY Empanelled Ingestion</span>
      </div>
      <h1 style="font-size:2.25rem;font-weight:900;color:var(--navy-900);letter-spacing:-0.02em;">
        Official Data Sources &amp; Ingestion Cadence
      </h1>
      <p style="color:var(--navy-600);font-size:1rem;max-width:850px;margin-top:0.35rem;line-height:1.6;">
        SkillPulse synchronizes with verified central and state employment repositories. Every vacancy figure, skill demand vector, and curriculum benchmark is grounded in verifiable administrative datasets.
      </p>
    </div>

    <!-- Data Feeds Table -->
    <div class="card" style="padding:0;overflow:hidden;border:1px solid var(--border);">
      <div style="padding:1.5rem 1.75rem;background:var(--navy-50);border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:0.5rem;">
        <div>
          <h2 style="font-size:1.2rem;font-weight:800;color:var(--navy-900);margin:0;">
            📡 Live Data Pipelines &amp; Refresh Intervals
          </h2>
          <p style="font-size:0.8rem;color:var(--navy-500);margin:0.2rem 0 0 0;">
            All pipelines utilize TLS 1.3 cryptographic hashing with zero storage of raw personally identifiable information.
          </p>
        </div>
        <span class="badge badge-success">4 Pipelines Active</span>
      </div>

      <div style="overflow-x:auto;">
        <table style="width:100%;border-collapse:collapse;font-size:0.875rem;text-align:left;">
          <thead>
            <tr style="background:var(--navy-100);color:var(--navy-800);border-bottom:1px solid var(--border);">
              <th style="padding:0.875rem 1.25rem;font-weight:700;">Data Source</th>
              <th style="padding:0.875rem 1.25rem;font-weight:700;">Governing Authority</th>
              <th style="padding:0.875rem 1.25rem;font-weight:700;">Key Metrics Ingested</th>
              <th style="padding:0.875rem 1.25rem;font-weight:700;">Refresh Cadence</th>
              <th style="padding:0.875rem 1.25rem;font-weight:700;">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom:1px solid var(--border);">
              <td style="padding:1rem 1.25rem;">
                <div style="font-weight:700;color:var(--navy-900);">National Career Service (NCS)</div>
                <div style="font-size:0.75rem;color:var(--navy-500);">ncs.gov.in</div>
              </td>
              <td style="padding:1rem 1.25rem;color:var(--navy-700);">
                Ministry of Labour &amp; Employment (Govt. of India)
              </td>
              <td style="padding:1rem 1.25rem;color:var(--navy-700);">
                18.4L+ National active job requisitions, industry trade codes, employer verified credentials.
              </td>
              <td style="padding:1rem 1.25rem;font-weight:600;color:var(--primary-700);">
                Daily (04:00 AM IST)
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-success">Live API</span>
              </td>
            </tr>

            <tr style="border-bottom:1px solid var(--border);">
              <td style="padding:1rem 1.25rem;">
                <div style="font-weight:700;color:var(--navy-900);">MahaSwayam Employment Portal</div>
                <div style="font-size:0.75rem;color:var(--navy-500);">mahaswayam.gov.in</div>
              </td>
              <td style="padding:1rem 1.25rem;color:var(--navy-700);">
                Skill, Employment, Entrepreneurship &amp; Innovation Dept. (Govt. of Maharashtra)
              </td>
              <td style="padding:1rem 1.25rem;color:var(--navy-700);">
                2.84L+ Regional vacancies across 36 Maharashtra districts, apprenticeship quotas, DVET placements.
              </td>
              <td style="padding:1rem 1.25rem;font-weight:600;color:var(--primary-700);">
                Every 6 Hours
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-success">Live API</span>
              </td>
            </tr>

            <tr style="border-bottom:1px solid var(--border);">
              <td style="padding:1rem 1.25rem;">
                <div style="font-weight:700;color:var(--navy-900);">MSBTE Polytechnic Syllabus Feed</div>
                <div style="font-size:0.75rem;color:var(--navy-500);">msbte.org.in</div>
              </td>
              <td style="padding:1rem 1.25rem;color:var(--navy-700);">
                Maharashtra State Board of Technical Education
              </td>
              <td style="padding:1rem 1.25rem;color:var(--navy-700);">
                Curriculum schemas for I-Scheme and K-Scheme diplomas, laboratory credits, approved elective frameworks.
              </td>
              <td style="padding:1rem 1.25rem;font-weight:600;color:var(--navy-700);">
                Quarterly Sync
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-primary">Synced (Q3 2026)</span>
              </td>
            </tr>

            <tr>
              <td style="padding:1rem 1.25rem;">
                <div style="font-weight:700;color:var(--navy-900);">Directorate of Vocational Education (DVET)</div>
                <div style="font-size:0.75rem;color:var(--navy-500);">dvet.gov.in</div>
              </td>
              <td style="padding:1rem 1.25rem;color:var(--navy-700);">
                Directorate of Vocational Education &amp; Training, Maharashtra
              </td>
              <td style="padding:1rem 1.25rem;color:var(--navy-700);">
                978 ITIs census (417 Govt + 561 Private), 1.45L+ sanctioned annual seats, trade absorption velocity.
              </td>
              <td style="padding:1rem 1.25rem;font-weight:600;color:var(--navy-700);">
                Monthly Census
              </td>
              <td style="padding:1rem 1.25rem;">
                <span class="badge badge-primary">Audited</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Data Quality, Governance & DPDP Standards -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(320px, 1fr));gap:1.5rem;">
      <div class="card" style="padding:1.75rem;">
        <h3 style="font-size:1.15rem;font-weight:800;color:var(--navy-900);margin-bottom:0.75rem;display:flex;align-items:center;gap:0.5rem;">
          <span>🛡️</span> Zero Raw PII Architecture
        </h3>
        <p style="font-size:0.875rem;color:var(--navy-600);line-height:1.6;margin:0;">
          In strict accordance with the Digital Personal Data Protection Act (DPDP 2023 §6), SkillPulse processes exclusively anonymized skill tokens. Academic credentials verified via DigiLocker are authenticated using masked reference keys from the UIDAI Aadhaar Data Vault (ADV).
        </p>
      </div>

      <div class="card" style="padding:1.75rem;">
        <h3 style="font-size:1.15rem;font-weight:800;color:var(--navy-900);margin-bottom:0.75rem;display:flex;align-items:center;gap:0.5rem;">
          <span>⚖️</span> De-duplication &amp; Noise Filtering
        </h3>
        <p style="font-size:0.875rem;color:var(--navy-600);line-height:1.6;margin:0;">
          Job posts from unverified job boards often feature ghost postings or duplicate openings across aggregators. Our pipeline matches enterprise CIN (Corporate Identification Number) and GSTIN records, pruning duplicate posts to ensure genuine labor demand.
        </p>
      </div>

      <div class="card" style="padding:1.75rem;">
        <h3 style="font-size:1.15rem;font-weight:800;color:var(--navy-900);margin-bottom:0.75rem;display:flex;align-items:center;gap:0.5rem;">
          <span>🕒</span> CERT-In 180-Day Audit Logging
        </h3>
        <p style="font-size:0.875rem;color:var(--navy-600);line-height:1.6;margin:0;">
          All API fetch operations, webhook payloads, and candidate scoring sessions generate immutable, NTP-synchronized audit logs conforming to the Indian Computer Emergency Response Team (CERT-In) 180-day retention directive.
        </p>
      </div>
    </div>

    <!-- Bottom Navigation -->
    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem;padding-top:1rem;border-top:1px solid var(--border);">
      <a href="how-it-works.php" class="btn btn-secondary">
        <span>&larr; How It Works &amp; Scoring Formulation</span>
      </a>
      <a href="government.php" class="btn btn-primary">
        <span>Explore Maharashtra Regional Portal &rarr;</span>
      </a>
    </div>

  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
