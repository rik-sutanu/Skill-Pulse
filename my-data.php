<?php
$pageTitle = 'My Data & Privacy Rights | SkillPulse (DPDP Act 2023)';
$pageDesc = 'Exercise your statutory data subject rights under the Digital Personal Data Protection (DPDP) Act 2023: Export your profile, inspect encrypted vault references, or request account erasure.';
$activeNav = 'my-data';
include 'includes/header.php';
?>

<main id="main-content" style="padding: 2.5rem 0 4rem; background: var(--bg-main, #f8fafc);">
  <div class="container" style="max-width: 1040px; margin: 0 auto; padding: 0 1rem;">
    
    <!-- Top Breadcrumb & Status Badge -->
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-bottom:1.5rem;">
      <nav aria-label="Breadcrumb" style="font-size:0.875rem;color:var(--text-muted);">
        <a href="index.php" style="color:var(--primary-600);text-decoration:none;">Home</a> &gt; 
        <a href="privacy.php" style="color:var(--primary-600);text-decoration:none;">Privacy &amp; Security</a> &gt; 
        <span style="color:var(--navy-900);font-weight:600;">My Data &amp; Rights</span>
      </nav>
      <div style="display:flex;align-items:center;gap:0.5rem;background:#ecfdf5;border:1px solid #a7f3d0;padding:4px 12px;border-radius:9999px;font-size:0.8125rem;color:#065f46;font-weight:600;">
        <span style="width:8px;height:8px;background:#10b981;border-radius:50%;display:inline-block;"></span>
        Statutory Compliance: DPDP Act 2023 &amp; CERT-In 2022
      </div>
    </div>

    <!-- Hero Header Banner -->
    <div style="background:linear-gradient(180deg, #5C1A1B 0%, #2E0D0E 100%);color:#FAF6EE;border-radius:16px;padding:2rem;margin-bottom:2rem;box-shadow:0 10px 25px -5px rgba(46,13,14,0.35);position:relative;overflow:hidden;border:1px solid rgba(201,162,39,0.25);">
      <div style="position:absolute;top:-20px;right:-20px;width:180px;height:180px;background:radial-gradient(circle, rgba(201,162,39,0.18) 0%, transparent 70%);border-radius:50%;"></div>
      <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:1.5rem;position:relative;z-index:2;">
        <div>
          <span style="display:inline-block;padding:3px 10px;background:rgba(214,185,77,0.15);color:#D6B94D;border:1px solid rgba(214,185,77,0.35);font-size:0.75rem;font-weight:700;letter-spacing:0.05em;border-radius:6px;text-transform:uppercase;margin-bottom:0.75rem;">
            Citizen Self-Service Privacy Hub
          </span>
          <h1 style="font-size:1.875rem;font-weight:800;letter-spacing:-0.02em;margin:0 0 0.5rem;color:#FAF6EE;">
            My Data &amp; Privacy Rights
          </h1>
          <p style="color:#FAF6EE;opacity:0.9;font-size:0.95rem;max-width:680px;line-height:1.6;margin:0;">
            Under the <strong>Digital Personal Data Protection (DPDP) Act 2023</strong>, you retain full ownership of your personal data. Below, you can inspect your profile records, download a complete data export (§11), or initiate permanent anonymization (§12).
          </p>
        </div>
        <div style="display:flex;flex-direction:column;gap:0.75rem;">
          <button id="btnQuickExport" class="btn btn-primary" onclick="handleExportMyData()" style="background:#0284c7;border-color:#0284c7;display:inline-flex;align-items:center;gap:0.5rem;font-weight:700;box-shadow:0 4px 12px rgba(2,132,199,0.35);">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            <span>Export My Data (§11)</span>
          </button>
          <a href="#erasureSection" style="color:#f87171;font-size:0.8125rem;text-align:center;text-decoration:none;font-weight:600;">
            Request Account Erasure &rarr;
          </a>
        </div>
      </div>
    </div>

    <!-- 3-Column Quick Metrics Grid -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:1.25rem;margin-bottom:2rem;">
      <!-- Card 1: Fiduciary Transparency -->
      <div style="background:#fff;border:1px solid var(--border);border-radius:12px;padding:1.25rem;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
        <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.75rem;">
          <div style="width:36px;height:36px;border-radius:8px;background:rgba(2,132,199,0.1);color:#0284c7;display:flex;align-items:center;justify-content:center;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18"/><path d="M14 9h4"/><path d="M14 15h4"/></svg>
          </div>
          <div>
            <div style="font-size:0.75rem;text-transform:uppercase;color:var(--text-muted);font-weight:700;">Data Fiduciary</div>
            <div style="font-size:0.95rem;font-weight:700;color:var(--navy-900);">Govt of Maharashtra (DVET)</div>
          </div>
        </div>
        <p style="font-size:0.8125rem;color:var(--text-muted);line-height:1.5;margin:0;">
          Processing strictly for state TVET skill alignment and MahaSwayam employment exchange matching.
        </p>
      </div>

      <!-- Card 2: Identity Vault Separation -->
      <div style="background:#fff;border:1px solid var(--border);border-radius:12px;padding:1.25rem;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
        <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.75rem;">
          <div style="width:36px;height:36px;border-radius:8px;background:rgba(16,185,129,0.1);color:#10b981;display:flex;align-items:center;justify-content:center;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          </div>
          <div>
            <div style="font-size:0.75rem;text-transform:uppercase;color:var(--text-muted);font-weight:700;">Identity Vault Status</div>
            <div style="font-size:0.95rem;font-weight:700;color:#059669;">AES-256-GCM Encrypted</div>
          </div>
        </div>
        <p style="font-size:0.8125rem;color:var(--text-muted);line-height:1.5;margin:0;">
          Aadhaar tokens stored as <code>XXXX-XXXX-8921</code>. Zero raw 12-digit numbers retained in operational storage.
        </p>
      </div>

      <!-- Card 3: Retention Schedule -->
      <div style="background:#fff;border:1px solid var(--border);border-radius:12px;padding:1.25rem;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
        <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.75rem;">
          <div style="width:36px;height:36px;border-radius:8px;background:rgba(245,158,11,0.1);color:#d97706;display:flex;align-items:center;justify-content:center;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <div style="font-size:0.75rem;text-transform:uppercase;color:var(--text-muted);font-weight:700;">Statutory Retention</div>
            <div style="font-size:0.95rem;font-weight:700;color:var(--navy-900);">Active + 3 Years Standard</div>
          </div>
        </div>
        <p style="font-size:0.8125rem;color:var(--text-muted);line-height:1.5;margin:0;">
          Audit logs retained for 180 days (CERT-In) and access logs for 365 days (DPDP) before automatic pruning.
        </p>
      </div>
    </div>

    <!-- MAIN TWO-COLUMN SECTION -->
    <div style="display:grid;grid-template-columns:1fr;gap:2rem;">
      
      <!-- 1. Right to Access (§11): Interactive Data Subject Request -->
      <section style="background:#fff;border:1px solid var(--border);border-radius:16px;padding:1.75rem;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-bottom:1.25rem;padding-bottom:1rem;border-bottom:1px solid var(--border);">
          <div>
            <h2 style="font-size:1.25rem;font-weight:700;color:var(--navy-900);margin:0 0 0.25rem;">
              Section 11: Right to Access Information About Personal Data
            </h2>
            <p style="font-size:0.875rem;color:var(--text-muted);margin:0;">
              View or download a machine-readable JSON summary of all personal data, competencies, and consent records stored under your profile.
            </p>
          </div>
          <div style="display:flex;gap:0.5rem;">
            <button id="btnFetchDsr" class="btn btn-secondary btn-sm" onclick="handleExportMyData()" style="display:inline-flex;align-items:center;gap:0.4rem;">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              <span>View Data Profile</span>
            </button>
            <button id="btnDownloadJson" class="btn btn-primary btn-sm" onclick="downloadExportJson()" style="display:inline-flex;align-items:center;gap:0.4rem;">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
              <span>Download JSON</span>
            </button>
          </div>
        </div>

        <!-- Dynamic Data Viewer Container -->
        <div id="exportViewerArea" style="display:none;background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:1.25rem;margin-bottom:1.5rem;">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.75rem;">
            <span style="font-weight:700;font-size:0.875rem;color:var(--navy-900);">Export Summary Payload (DPDP §11 Formatted)</span>
            <span id="exportTimestampBadge" style="font-size:0.75rem;color:var(--text-muted);font-family:monospace;"></span>
          </div>
          <pre id="exportJsonDisplay" style="background:#0f172a;color:#38bdf8;padding:1rem;border-radius:8px;font-size:0.8125rem;overflow-x:auto;max-height:280px;line-height:1.45;"></pre>
        </div>

        <!-- Identity Vault & Linked Credential Details -->
        <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;padding:1.25rem;">
          <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
            <div>
              <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.25rem;">
                <span style="font-weight:700;color:#166534;font-size:0.95rem;">DigiLocker / National Academic Depository Linked</span>
                <span class="badge" style="background:#dcfce7;color:#15803d;border:1px solid #86efac;font-size:10px;">SHA-256 SIGNED</span>
              </div>
              <div style="font-size:0.8125rem;color:#15803d;line-height:1.5;">
                Masked Token: <strong style="font-family:monospace;">XXXX-XXXX-8921</strong> &bull; ADV Reference: <strong style="font-family:monospace;">ADV-REF-8921-10545B</strong>
              </div>
            </div>
            <div style="font-size:0.8125rem;color:#15803d;background:#fff;padding:6px 12px;border-radius:6px;border:1px solid #86efac;font-weight:600;">
              Storage: Isolated KMS Vault
            </div>
          </div>
        </div>
      </section>

      <!-- 2. Security Sessions & Account Hardening -->
      <section style="background:#fff;border:1px solid var(--border);border-radius:16px;padding:1.75rem;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
        <h2 style="font-size:1.25rem;font-weight:700;color:var(--navy-900);margin:0 0 0.5rem;">
          Active Authentication Sessions &amp; Revocation
        </h2>
        <p style="font-size:0.875rem;color:var(--text-muted);margin:0 0 1.25rem;">
          SkillPulse utilizes stateless JSON Web Tokens protected by <code>SameSite=Strict</code>, <code>HttpOnly</code>, and <code>Secure</code> cookies.
        </p>

        <div style="border:1px solid var(--border);border-radius:10px;overflow:hidden;margin-bottom:1.25rem;">
          <div style="background:#f8fafc;padding:0.75rem 1rem;font-size:0.8125rem;font-weight:700;color:var(--navy-900);display:grid;grid-template-columns:2fr 1fr 1fr;gap:1rem;">
            <span>Device / Channel</span>
            <span>Security Layer</span>
            <span style="text-align:right;">Status</span>
          </div>
          <div style="padding:0.75rem 1rem;font-size:0.8125rem;display:grid;grid-template-columns:2fr 1fr 1fr;gap:1rem;align-items:center;border-top:1px solid var(--border);">
            <div>
              <div style="font-weight:600;color:var(--navy-900);">Current Browser Session (Active)</div>
              <div style="color:var(--text-muted);font-size:0.75rem;">TLS 1.3 Encryption &bull; IP: 127.0.0.1 (Localhost)</div>
            </div>
            <div>
              <span style="display:inline-block;padding:2px 8px;background:#e0f2fe;color:#0369a1;border-radius:4px;font-size:11px;font-weight:600;">HTTP-Only Cookie</span>
            </div>
            <div style="text-align:right;">
              <span style="display:inline-flex;align-items:center;gap:4px;color:#059669;font-weight:600;">
                <span style="width:6px;height:6px;background:#10b981;border-radius:50%;"></span> Authorized
              </span>
            </div>
          </div>
        </div>

        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
          <button class="btn btn-secondary btn-sm" onclick="handleLogoutAllDevices()" style="color:#b91c1c;border-color:#fca5a5;display:inline-flex;align-items:center;gap:0.4rem;">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"/><line x1="12" y1="2" x2="12" y2="12"/></svg>
            <span>Revoke All Other Sessions</span>
          </button>
          <a href="auth.php" class="btn btn-secondary btn-sm" style="display:inline-flex;align-items:center;gap:0.4rem;">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <span>Change Password</span>
          </a>
        </div>
      </section>

      <!-- 3. Right to Correction and Erasure (§12) -->
      <section id="erasureSection" style="background:#fff;border:1px solid #fecaca;border-radius:16px;padding:1.75rem;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
        <div style="display:flex;align-items:flex-start;gap:1rem;margin-bottom:1.25rem;">
          <div style="width:40px;height:40px;border-radius:8px;background:#fee2e2;color:#ef4444;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
          </div>
          <div>
            <h2 style="font-size:1.25rem;font-weight:700;color:#991b1b;margin:0 0 0.25rem;">
              Section 12: Right to Correction &amp; Erasure of Personal Data
            </h2>
            <p style="font-size:0.875rem;color:#7f1d1d;line-height:1.5;margin:0;">
              You have the statutory right to request the erasure of your personal data when it is no longer necessary for the purpose for which it was processed.
            </p>
          </div>
        </div>

        <div style="background:#fff5f5;border:1px solid #fed7d7;border-radius:10px;padding:1rem;margin-bottom:1.25rem;font-size:0.8125rem;color:#742a2a;line-height:1.6;">
          <strong>What happens when you request erasure?</strong>
          <ul style="margin:0.5rem 0 0;padding-left:1.25rem;">
            <li>Your name, mobile number, email, and DigiLocker credentials are permanently scrubbed from active operational records.</li>
            <li>All active sessions on all devices are immediately revoked.</li>
            <li>Statutory attendance and non-identifiable TVET performance statistics are retained in purely anonymized form to comply with state educational accreditation standards.</li>
          </ul>
        </div>

        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
          <div style="font-size:0.8125rem;color:var(--text-muted);">
            Erasure requests are acknowledged under statutory SLA within 72 hours.
          </div>
          <button class="btn btn-sm" onclick="showErasureConfirmationModal()" style="background:#dc2626;color:#fff;border-color:#dc2626;font-weight:700;display:inline-flex;align-items:center;gap:0.5rem;">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/></svg>
            <span>Delete / Anonymize My Account</span>
          </button>
        </div>
      </section>

      <!-- 4. Plain-Language Bilingual Consent Notice (§6) -->
      <section style="background:#fff;border:1px solid var(--border);border-radius:16px;padding:1.75rem;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
        <h2 style="font-size:1.25rem;font-weight:700;color:var(--navy-900);margin:0 0 0.5rem;">
          DPDP Act Section 6 Statutory Consent Notice (Bilingual)
        </h2>
        <p style="font-size:0.875rem;color:var(--text-muted);margin:0 0 1.25rem;">
          Review the legal grounds and plain-language summary of data processing for the SkillPulse platform.
        </p>

        <!-- Trilingual Tabs -->
        <div style="display:flex;gap:0.5rem;border-bottom:1px solid var(--border);margin-bottom:1rem;">
          <button class="consent-tab-btn active" onclick="switchConsentTab('en')" id="tabBtnEn" style="padding:8px 16px;border:none;background:none;font-weight:700;color:var(--primary-600);border-bottom:2px solid var(--primary-600);cursor:pointer;">English (Statutory)</button>
          <button class="consent-tab-btn" onclick="switchConsentTab('hi')" id="tabBtnHi" style="padding:8px 16px;border:none;background:none;font-weight:600;color:var(--text-muted);cursor:pointer;">हिन्दी (Hindi)</button>
          <button class="consent-tab-btn" onclick="switchConsentTab('mr')" id="tabBtnMr" style="padding:8px 16px;border:none;background:none;font-weight:600;color:var(--text-muted);cursor:pointer;">मराठी (Marathi)</button>
        </div>

        <div id="consentTextEn" style="font-size:0.875rem;color:var(--text-main);line-height:1.7;background:#f8fafc;padding:1.25rem;border-radius:8px;">
          <p><strong>1. Purpose of Collection:</strong> Personal identifiers (Name, Email, Mobile, Educational Credentials) are collected exclusively to assess TVET vocational competencies, simulate curriculum enhancements, and facilitate job placement with verified employers via MahaSwayam and National Career Service (NCS).</p>
          <p><strong>2. Rights of Citizen:</strong> You may at any time access your personal data, request correction of inaccurate records, withdraw consent, or request complete erasure under Sections 11 and 12 of the DPDP Act 2023.</p>
          <p style="margin:0;"><strong>3. Grievance Redressal:</strong> In case of questions or complaints, contact the designated Data Protection Officer (DPO), Directorate of Vocational Education &amp; Training (DVET), 3 Mahapalika Marg, Mumbai 400001, Email: <code>dpo@skillpulse.maharashtra.gov.in</code>.</p>
        </div>

        <div id="consentTextHi" style="display:none;font-size:0.875rem;color:var(--text-main);line-height:1.7;background:#f8fafc;padding:1.25rem;border-radius:8px;">
          <p><strong>1. डेटा संग्रहण का उद्देश्य:</strong> व्यक्तिगत पहचान (नाम, ईमेल, मोबाइल नंबर, शैक्षणिक प्रमाण-पत्र) केवल तकनीकी एवं व्यावसायिक शिक्षा (TVET) कौशल मूल्यांकन, पाठ्यक्रम सुधार अनुकरण तथा महास्वयं एवं राष्ट्रीय करियर सेवा (NCS) के माध्यम से रोजगार सुविधा प्रदान करने हेतु संकलित किए जाते हैं।</p>
          <p><strong>2. नागरिक के वैधानिक अधिकार:</strong> डिजिटल व्यक्तिगत डेटा संरक्षण (DPDP) अधिनियम 2023 की धारा 11 और 12 के तहत आप किसी भी समय अपने डेटा की प्रति प्राप्त कर सकते हैं, सुधार का अनुरोध कर सकते हैं, या खाता विलोपन का अनुरोध कर सकते हैं।</p>
          <p style="margin:0;"><strong>3. शिकायत निवारण:</strong> किसी भी शिकायत हेतु नामित डेटा संरक्षण अधिकारी (DPO) से संपर्क करें: <code>dpo@skillpulse.maharashtra.gov.in</code>.</p>
        </div>

        <div id="consentTextMr" style="display:none;font-size:0.875rem;color:var(--text-main);line-height:1.7;background:#f8fafc;padding:1.25rem;border-radius:8px;">
          <p><strong>1. माहिती संकलनाचा उद्देश:</strong> वैयक्तिक तपशील (नाव, ई-मेल, मोबाईल क्रमांक, शैक्षणिक प्रमाणपत्रे) केवळ TVET कौशल्य अंतर मूल्यमापन, अभ्यासक्रम सिम्युलेशन आणि महास्वयं तसेच नॅशनल करिअर सर्व्हिस (NCS) द्वारे रोजगार संधी मिळवून देण्यासाठी वापरले जातात.</p>
          <p><strong>2. नागरिकांचे वैधानिक हक्क:</strong> DPDP कायदा २०२३ च्या कलम ११ आणि १२ अंतर्गत तुम्हाला तुमच्या डेटाची माहिती मिळवण्याचा, दुरुस्ती करण्याचा किंवा खाते बंद करून डेटा नष्ट करण्याचा पूर्ण अधिकार आहे.</p>
          <p style="margin:0;"><strong>3. तक्रार निवारण अधिकारी:</strong> तक्रारींसाठी संपर्क साधा: डेटा संरक्षण अधिकारी (DPO), व्यवसाय शिक्षण व प्रशिक्षण संचालनालय (DVET), मुंबई. ई-मेल: <code>dpo@skillpulse.maharashtra.gov.in</code>.</p>
        </div>
      </section>

    </div>
  </div>
</main>

<!-- Account Erasure Confirmation Modal -->
<div id="erasureModal" role="dialog" aria-modal="true" aria-labelledby="erasureModalTitle" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(15,23,42,0.6);z-index:9999;align-items:center;justify-content:center;padding:1rem;">
  <div style="background:#fff;border-radius:16px;max-width:520px;width:100%;padding:2rem;box-shadow:0 25px 50px -12px rgba(0,0,0,0.25);">
    <div style="width:48px;height:48px;border-radius:12px;background:#fee2e2;color:#dc2626;display:flex;align-items:center;justify-content:center;margin-bottom:1rem;">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
    </div>
    <h3 id="erasureModalTitle" style="font-size:1.25rem;font-weight:800;color:var(--navy-900);margin:0 0 0.5rem;">
      Confirm Account Anonymization &amp; Erasure
    </h3>
    <p style="font-size:0.875rem;color:var(--text-muted);line-height:1.6;margin:0 0 1.25rem;">
      Under <strong>DPDP Act 2023 §12</strong>, your personal identifiers will be permanently removed and your active credentials revoked. This action cannot be undone.
    </p>

    <div style="margin-bottom:1.5rem;">
      <label for="inputConfirmEmail" style="display:block;font-size:0.8125rem;font-weight:700;color:var(--navy-900);margin-bottom:0.35rem;">
        Type your email address to confirm:
      </label>
      <input type="email" id="inputConfirmEmail" placeholder="student@skillpulse.in" style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.875rem;">
    </div>

    <div id="erasureStatusMsg" style="display:none;padding:10px;border-radius:6px;font-size:0.8125rem;margin-bottom:1rem;"></div>

    <div style="display:flex;gap:0.75rem;justify-content:flex-end;">
      <button class="btn btn-secondary btn-sm" onclick="closeErasureModal()">Cancel</button>
      <button id="btnExecuteErasure" class="btn btn-sm" onclick="executeAccountErasure()" style="background:#dc2626;color:#fff;border-color:#dc2626;font-weight:700;">
        Permanently Delete Account
      </button>
    </div>
  </div>
</div>

<script>
let cachedExportData = null;

// Tab Switcher for Plain-Language Consent
function switchConsentTab(lang) {
  document.querySelectorAll('.consent-tab-btn').forEach(btn => {
    btn.classList.remove('active');
    btn.style.color = 'var(--text-muted)';
    btn.style.borderBottom = 'none';
  });

  const activeBtn = document.getElementById('tabBtn' + lang.charAt(0).toUpperCase() + lang.slice(1));
  if (activeBtn) {
    activeBtn.classList.add('active');
    activeBtn.style.color = 'var(--primary-600)';
    activeBtn.style.borderBottom = '2px solid var(--primary-600)';
  }

  document.getElementById('consentTextEn').style.display = (lang === 'en') ? 'block' : 'none';
  document.getElementById('consentTextHi').style.display = (lang === 'hi') ? 'block' : 'none';
  document.getElementById('consentTextMr').style.display = (lang === 'mr') ? 'block' : 'none';
}

// Export My Data (DPDP §11)
async function handleExportMyData() {
  const btn = document.getElementById('btnQuickExport');
  const viewer = document.getElementById('exportViewerArea');
  const pre = document.getElementById('exportJsonDisplay');
  const badge = document.getElementById('exportTimestampBadge');

  btn.disabled = true;
  btn.innerText = 'Extracting Profile...';

  try {
    const res = await fetch('api/auth.php?action=export_my_data', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email: 'student@skillpulse.in' })
    });
    const data = await res.json();
    cachedExportData = data;

    viewer.style.display = 'block';
    badge.innerText = 'Generated: ' + new Date().toLocaleTimeString();
    pre.textContent = JSON.stringify(data, null, 2);
    viewer.scrollIntoView({ behavior: 'smooth', block: 'center' });
  } catch (err) {
    alert('Unable to extract data profile. Please verify your connection.');
  } finally {
    btn.disabled = false;
    btn.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg><span>Export My Data (§11)</span>`;
  }
}

// Download Export JSON
function downloadExportJson() {
  if (!cachedExportData) {
    handleExportMyData().then(() => {
      if (cachedExportData) downloadJsonFile(cachedExportData);
    });
    return;
  }
  downloadJsonFile(cachedExportData);
}

function downloadJsonFile(obj) {
  const blob = new Blob([JSON.stringify(obj, null, 2)], { type: 'application/json' });
  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'SkillPulse_DPDP_Data_Export_' + new Date().toISOString().slice(0, 10) + '.json';
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  URL.revokeObjectURL(url);
}

// Logout / Revoke All Sessions
async function handleLogoutAllDevices() {
  if (!confirm('This will revoke all active browser sessions across all devices. Proceed?')) return;
  try {
    const res = await fetch('api/auth.php?action=logout', { method: 'POST' });
    const data = await res.json();
    alert('All sessions have been revoked. Redirecting to login page...');
    window.location.href = 'auth.php';
  } catch (e) {
    window.location.href = 'auth.php';
  }
}

// Modal handling
function showErasureConfirmationModal() {
  document.getElementById('erasureModal').style.display = 'flex';
}
function closeErasureModal() {
  document.getElementById('erasureModal').style.display = 'none';
}

// Execute Account Erasure (§12)
async function executeAccountErasure() {
  const emailInput = document.getElementById('inputConfirmEmail').value.trim();
  const statusMsg = document.getElementById('erasureStatusMsg');
  const btn = document.getElementById('btnExecuteErasure');

  if (!emailInput) {
    statusMsg.style.display = 'block';
    statusMsg.style.background = '#fee2e2';
    statusMsg.style.color = '#991b1b';
    statusMsg.innerText = 'Please enter your email to confirm erasure.';
    return;
  }

  btn.disabled = true;
  btn.innerText = 'Processing Erasure...';

  try {
    const res = await fetch('api/auth.php?action=delete_my_account', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email: emailInput })
    });
    const data = await res.json();

    if (data.success) {
      statusMsg.style.display = 'block';
      statusMsg.style.background = '#ecfdf5';
      statusMsg.style.color = '#065f46';
      statusMsg.innerText = data.message + ' Request ID: ' + data.requestId;
      setTimeout(() => {
        alert('Your profile has been anonymized per DPDP Act §12. Redirecting to home...');
        window.location.href = 'index.php';
      }, 2500);
    } else {
      statusMsg.style.display = 'block';
      statusMsg.style.background = '#fee2e2';
      statusMsg.style.color = '#991b1b';
      statusMsg.innerText = data.message || 'Erasure request failed.';
      btn.disabled = false;
      btn.innerText = 'Permanently Delete Account';
    }
  } catch (err) {
    statusMsg.style.display = 'block';
    statusMsg.style.background = '#fee2e2';
    statusMsg.style.color = '#991b1b';
    statusMsg.innerText = 'Communication error. Please try again.';
    btn.disabled = false;
    btn.innerText = 'Permanently Delete Account';
  }
}
</script>

<?php include 'includes/footer.php'; ?>
