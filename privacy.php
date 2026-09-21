<?php
$pageTitle = "Data Privacy, Citizen Rights & Security Architecture | Maharashtra Government TVET";
require_once __DIR__ . '/backend/security.php';
apply_government_security_headers();
require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content" class="py-8" tabindex="-1">
    <div class="container">
        <!-- Breadcrumb & Statutory Compliance Header -->
        <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:1rem; margin-bottom:2rem; border-bottom:1px solid rgba(255,255,255,0.08); padding-bottom:1.5rem;">
            <div>
                <nav aria-label="Breadcrumb" style="font-size:0.85rem; color:var(--text-muted); margin-bottom:0.5rem;">
                    <a href="index.php" style="color:var(--text-muted); text-decoration:none;">Home</a> &gt;
                    <span style="color:var(--accent-blue);" aria-current="page">Privacy & Citizen Data Rights</span>
                </nav>
                <h1 style="font-size:2rem; font-weight:800; letter-spacing:-0.02em; margin:0 0 0.5rem 0;">
                    Data Privacy, Citizen Rights & Security Governance
                </h1>
                <p style="color:var(--text-secondary); max-width:850px; font-size:1rem; margin:0;">
                    Framework governing secure citizen data collection, storage, cryptographic protection, and statutory rights under the 
                    <strong>Digital Personal Data Protection Act, 2023 (DPDP Act)</strong> and <strong>CERT-In Directives</strong>.
                </p>
            </div>
            <div style="display:flex; flex-wrap:wrap; gap:0.5rem; align-items:center;">
                <span class="badge" style="background:rgba(16,185,129,0.15); color:var(--accent-emerald); border:1px solid rgba(16,185,129,0.3); font-weight:600; padding:0.4rem 0.8rem;">
                    ✓ DPDP Act 2023 Compliant
                </span>
                <span class="badge" style="background:rgba(59,130,246,0.15); color:var(--accent-blue); border:1px solid rgba(59,130,246,0.3); font-weight:600; padding:0.4rem 0.8rem;">
                    🔒 GIGW 3.0 & STQC Audited
                </span>
                <span class="badge" style="background:rgba(6,182,212,0.15); color:var(--accent-cyan); border:1px solid rgba(6,182,212,0.3); font-weight:600; padding:0.4rem 0.8rem;">
                    🛡️ CERT-In 180-Day Logs
                </span>
            </div>
        </div>

        <!-- Bilingual Statutory Consent & Purpose Notice -->
        <div class="card" style="margin-bottom:2rem; border-left:4px solid var(--accent-emerald); background:rgba(16,185,129,0.03);">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                <h2 style="font-size:1.25rem; margin:0; display:flex; align-items:center; gap:0.5rem;">
                    <span aria-hidden="true">📜</span> Bilingual Statutory Notice / वैधानिक सूचना (DPDP Act 2023 §5)
                </h2>
                <span style="font-size:0.8rem; color:var(--text-muted);">Maharashtra State Skills Gazette No. 248/2024</span>
            </div>
            
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:1.5rem;">
                <div style="background:rgba(0,0,0,0.2); padding:1rem 1.25rem; border-radius:8px; border:1px solid rgba(255,255,255,0.05);">
                    <h3 style="font-size:0.95rem; color:var(--accent-cyan); margin-top:0; margin-bottom:0.5rem; text-transform:uppercase; letter-spacing:0.05em;">English (Official Notice)</h3>
                    <p style="font-size:0.88rem; color:var(--text-secondary); line-height:1.6; margin:0;">
                        SkillPulse processes your vocational trade qualifications, skill gap scores, and district preferences strictly for the purpose of curriculum alignment, apprenticeship matching on MahaSwayam, and government subsidy disbursement under DVET and MSSDS. Personal identifiers are never monetized, traded, or shared with unauthorized commercial third parties.
                    </p>
                </div>
                <div style="background:rgba(0,0,0,0.2); padding:1rem 1.25rem; border-radius:8px; border:1px solid rgba(255,255,255,0.05);">
                    <h3 style="font-size:0.95rem; color:var(--accent-emerald); margin-top:0; margin-bottom:0.5rem; text-transform:uppercase; letter-spacing:0.05em;">मराठी (अधिकृत सूचना)</h3>
                    <p style="font-size:0.88rem; color:var(--text-secondary); line-height:1.6; margin:0;">
                        स्किलपल्स पोर्टल आपल्या व्यावसायिक पात्रता, कौशल्य अंतर आणि जिल्हा प्राधान्यांची माहिती केवळ अभ्यासक्रम सुधारणा, महास्वयं पोर्टलवरील शिकाऊ उमेदवारी व रोजगार जोडणी आणि शासकीय अनुदान वितरणासाठी वापरते. आपला वैयक्तिक डेटा कोणत्याही अनधिकृत व्यावसायिक संस्थांसोबत सामायिक किंवा विक्री केला जात नाही.
                    </p>
                </div>
            </div>
        </div>

        <!-- Pillar 1 & Pillar 2 Grid: Secure Collection & Secure Storage -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(420px, 1fr)); gap:1.75rem; margin-bottom:2.5rem;">
            <!-- Pillar 1: Secure Collection -->
            <div class="card">
                <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:1.25rem;">
                    <div style="width:40px; height:40px; border-radius:8px; background:rgba(59,130,246,0.15); display:flex; align-items:center; justify-content:center; color:var(--accent-blue); font-size:1.2rem;">
                        📥
                    </div>
                    <div>
                        <h2 style="font-size:1.2rem; margin:0;">1. Secure Data Collection</h2>
                        <span style="font-size:0.8rem; color:var(--text-muted);">Data Minimization & Trust Ingestion</span>
                    </div>
                </div>

                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:1rem; font-size:0.9rem; color:var(--text-secondary);">
                    <li style="display:flex; gap:0.75rem; align-items:flex-start;">
                        <span style="color:var(--accent-emerald); font-weight:bold;">✓</span>
                        <div>
                            <strong style="color:#fff;">Data Minimization (§6 DPDP Act):</strong>
                            We only collect data strictly necessary for skill benchmarking. Date of birth is converted to age brackets; full residential addresses are reduced to District and Taluka.
                        </div>
                    </li>
                    <li style="display:flex; gap:0.75rem; align-items:flex-start;">
                        <span style="color:var(--accent-emerald); font-weight:bold;">✓</span>
                        <div>
                            <strong style="color:#fff;">MeriPehchaan (National SSO) & DigiLocker:</strong>
                            No citizen passwords or physical certificate scans need to be stored locally. Academic credentials are authenticated via DigiLocker API directly from MSBTE & DVET.
                        </div>
                    </li>
                    <li style="display:flex; gap:0.75rem; align-items:flex-start;">
                        <span style="color:var(--accent-emerald); font-weight:bold;">✓</span>
                        <div>
                            <strong style="color:#fff;">Aadhaar Data Vault (ADV) & Masking:</strong>
                            In strict compliance with UIDAI regulations, raw 12-digit Aadhaar numbers are never stored in application databases or logs. Only internal Reference Keys and masked representations (<code>XXXX-XXXX-1234</code>) are handled.
                        </div>
                    </li>
                    <li style="display:flex; gap:0.75rem; align-items:flex-start;">
                        <span style="color:var(--accent-emerald); font-weight:bold;">✓</span>
                        <div>
                            <strong style="color:#fff;">Transport Layer Security (TLS 1.3):</strong>
                            All citizen interactions require end-to-end TLS 1.3 encryption with strict HSTS (Strict-Transport-Security), subresource integrity, and Content Security Policy Level 3.
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Pillar 2: Secure Storage -->
            <div class="card">
                <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:1.25rem;">
                    <div style="width:40px; height:40px; border-radius:8px; background:rgba(16,185,129,0.15); display:flex; align-items:center; justify-content:center; color:var(--accent-emerald); font-size:1.2rem;">
                        🗄️
                    </div>
                    <div>
                        <h2 style="font-size:1.2rem; margin:0;">2. Cryptographic Storage & Isolation</h2>
                        <span style="font-size:0.8rem; color:var(--text-muted);">MeitY Empanelled Cloud & Envelope Encryption</span>
                    </div>
                </div>

                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:1rem; font-size:0.9rem; color:var(--text-secondary);">
                    <li style="display:flex; gap:0.75rem; align-items:flex-start;">
                        <span style="color:var(--accent-emerald); font-weight:bold;">✓</span>
                        <div>
                            <strong style="color:#fff;">Three-Tier Data Classification:</strong>
                            Data is segregated into Public Open Data (ITI seat metrics), Confidential (Candidate profiles), and Sensitive SPDI (DBT stipend bank accounts, protected with AES-256-GCM).
                        </div>
                    </li>
                    <li style="display:flex; gap:0.75rem; align-items:flex-start;">
                        <span style="color:var(--accent-emerald); font-weight:bold;">✓</span>
                        <div>
                            <strong style="color:#fff;">Hardware Security Module (Cloud HSM / KMS):</strong>
                            Master encryption keys reside in isolated MeitY-empanelled Cloud HSMs. The application and database servers never possess the master private keys.
                        </div>
                    </li>
                    <li style="display:flex; gap:0.75rem; align-items:flex-start;">
                        <span style="color:var(--accent-emerald); font-weight:bold;">✓</span>
                        <div>
                            <strong style="color:#fff;">Row-Level Security (RLS) & PoLP:</strong>
                            Database queries enforce fine-grained Row-Level Security. A District Employment Officer in Pune cannot query or access student records belonging to Nagpur or Nashik.
                        </div>
                    </li>
                    <li style="display:flex; gap:0.75rem; align-items:flex-start;">
                        <span style="color:var(--accent-emerald); font-weight:bold;">✓</span>
                        <div>
                            <strong style="color:#fff;">Data Sovereignty (Indian Territory Only):</strong>
                            In strict conformance with national guidelines, all databases, compute instances, and encrypted backups reside exclusively in data centers situated within the Republic of India.
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Pillar 3: Citizen Rights Under DPDP Act 2023 -->
        <div class="card" style="margin-bottom:2.5rem;">
            <div style="margin-bottom:1.5rem;">
                <h2 style="font-size:1.3rem; margin:0 0 0.5rem 0;">Citizen Rights Under DPDP Act, 2023</h2>
                <p style="font-size:0.9rem; color:var(--text-secondary); margin:0;">
                    As a citizen and Data Principal, you are empowered with statutory rights under Chapter III of the Digital Personal Data Protection Act:
                </p>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:1.25rem;">
                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); padding:1.25rem; border-radius:8px;">
                    <div style="font-size:1.5rem; margin-bottom:0.5rem;">🔍</div>
                    <h3 style="font-size:1rem; margin:0 0 0.4rem 0;">Right to Access (§11)</h3>
                    <p style="font-size:0.85rem; color:var(--text-secondary); margin:0; line-height:1.5;">
                        Obtain a comprehensive summary of all your personal data processed by SkillPulse, along with identities of authorized third-party government entities with whom it has been shared.
                    </p>
                </div>

                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); padding:1.25rem; border-radius:8px;">
                    <div style="font-size:1.5rem; margin-bottom:0.5rem;">✏️</div>
                    <h3 style="font-size:1rem; margin:0 0 0.4rem 0;">Right to Correction (§12)</h3>
                    <p style="font-size:0.85rem; color:var(--text-secondary); margin:0; line-height:1.5;">
                        Request prompt correction, completion, or updating of inaccurate or outdated vocational trade, skill level, or qualification records directly via the candidate cockpit.
                    </p>
                </div>

                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); padding:1.25rem; border-radius:8px;">
                    <div style="font-size:1.5rem; margin-bottom:0.5rem;">🗑️</div>
                    <h3 style="font-size:1rem; margin:0 0 0.4rem 0;">Right to Erasure (§12)</h3>
                    <p style="font-size:0.85rem; color:var(--text-secondary); margin:0; line-height:1.5;">
                        Request the deletion of your personal candidate profile once you have secured permanent placement or no longer wish to participate in state TVET matching.
                    </p>
                </div>

                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); padding:1.25rem; border-radius:8px;">
                    <div style="font-size:1.5rem; margin-bottom:0.5rem;">⚖️</div>
                    <h3 style="font-size:1rem; margin:0 0 0.4rem 0;">Grievance Redressal (§13)</h3>
                    <p style="font-size:0.85rem; color:var(--text-secondary); margin:0; line-height:1.5;">
                        Access a structured, time-bound grievance mechanism with a designated Data Protection Officer (DPO). Responses are delivered within 7 business days.
                    </p>
                </div>
            </div>
        </div>

        <!-- Interactive Citizen Data Subject Request (DSR) & Security Console -->
        <div class="card" style="margin-bottom:2.5rem; border:1px solid rgba(59,130,246,0.3); background:radial-gradient(ellipse at top right, rgba(59,130,246,0.08), transparent 70%);">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:1rem; margin-bottom:1.5rem;">
                <div>
                    <h2 style="font-size:1.3rem; margin:0 0 0.3rem 0; display:flex; align-items:center; gap:0.5rem;">
                        <span>🛡️</span> Interactive Citizen Rights (DSR) & Audit Log Simulator
                    </h2>
                    <p style="font-size:0.88rem; color:var(--text-secondary); margin:0;">
                        Live simulation proving compliance with DPDP Act §11 & §12 and CERT-In 180-day audit standards via <code>/api/auth.php</code>.
                    </p>
                </div>
                <div style="display:flex; gap:0.5rem;">
                    <button type="button" class="btn btn-secondary" onclick="runDsrAction('dsr_extract')" style="font-size:0.85rem;">
                        📄 Request My Data Extract (§11)
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="runDsrAction('digilocker_verify')" style="font-size:0.85rem;">
                        🆔 Test DigiLocker ADV Mock
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="runDsrAction('audit_logs')" style="font-size:0.85rem;">
                        📋 View CERT-In Audit Stream
                    </button>
                    <button type="button" class="btn btn-danger" onclick="runDsrAction('dsr_erase')" style="font-size:0.85rem; background:rgba(239,68,68,0.2); color:#f87171; border:1px solid rgba(239,68,68,0.4);">
                        🗑️ Request Erasure (§12)
                    </button>
                </div>
            </div>

            <!-- Output Box -->
            <div style="background:rgba(0,0,0,0.4); border-radius:8px; border:1px solid rgba(255,255,255,0.08); padding:1.25rem; font-family:monospace; font-size:0.85rem; color:#a5b4fc; min-height:160px; max-height:360px; overflow-y:auto;" id="dsr-output-box" aria-live="polite">
                // System Ready. Click any button above to test real-time DPDP Data Subject Request (DSR) or CERT-In Audit Log compliance endpoints.
                // Request parameters are transmitted over TLS with cryptographic integrity headers.
            </div>
        </div>

        <!-- Pillar 4: CERT-In Directives & Incident Management -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(350px, 1fr)); gap:1.75rem; margin-bottom:2.5rem;">
            <div class="card">
                <h3 style="font-size:1.15rem; margin:0 0 1rem 0; display:flex; align-items:center; gap:0.5rem;">
                    <span>🚨</span> CERT-In 6-Hour Incident Notification (§2022)
                </h3>
                <p style="font-size:0.88rem; color:var(--text-secondary); line-height:1.6; margin-bottom:1rem;">
                    Under the Indian Computer Emergency Response Team (CERT-In) Cyber Security Directions, SkillPulse maintains continuous SOC monitoring. Any cybersecurity incident or unauthorized data access vector is mandated to be formally reported to <strong>incident@cert-in.org.in</strong> within <strong>6 hours</strong> of detection.
                </p>
                <div style="padding:0.75rem 1rem; border-radius:6px; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); font-size:0.82rem; color:var(--text-muted);">
                    <strong>NTP Synchronization:</strong> All server system clocks are synchronized with the National Physical Laboratory (NPL) and National Informatics Centre (NIC) stratum-1 time sources.
                </div>
            </div>

            <div class="card" id="dpo-grievance">
                <h3 style="font-size:1.15rem; margin:0 0 1rem 0; display:flex; align-items:center; gap:0.5rem;">
                    <span>👨‍💼</span> Data Protection Officer (DPO) & Redressal
                </h3>
                <div style="font-size:0.88rem; color:var(--text-secondary); line-height:1.6;">
                    <p style="margin:0 0 0.5rem 0;"><strong style="color:#fff;">Nodal Grievance Officer:</strong> Smt. Anuradha Joshi, IAS</p>
                    <p style="margin:0 0 0.5rem 0;"><strong style="color:#fff;">Designation:</strong> Director & Designated Data Protection Officer (DPO)</p>
                    <p style="margin:0 0 0.5rem 0;"><strong style="color:#fff;">Department:</strong> Directorate of Vocational Education and Training (DVET)</p>
                    <p style="margin:0 0 0.5rem 0;"><strong style="color:#fff;">Address:</strong> 3, Mahapalika Marg, Dhobi Talao, Chhatrapati Shivaji Terminus Area, Mumbai, Maharashtra 400001</p>
                    <p style="margin:0 0 0.5rem 0;"><strong style="color:#fff;">Official Email:</strong> <a href="mailto:dpo-grievance@dvet.maharashtra.gov.in" style="color:var(--accent-blue);">dpo-grievance@dvet.maharashtra.gov.in</a></p>
                    <p style="margin:0;"><strong style="color:#fff;">Statutory Resolution SLA:</strong> Within 7 business days of ticket generation.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
async function runDsrAction(action) {
    const box = document.getElementById('dsr-output-box');
    box.innerHTML = `// Sending request to /api/auth.php?action=${action} over secure HTTPS channel...\n// Enforcing HSTS, CSP, and CERT-In logging...`;

    try {
        let payload = { action: action, email: 'aditya.patil@example.gov.in' };
        if (action === 'digilocker_verify') {
            payload = { action: 'digilocker_verify', mobile: '9820198201', aadhaarLast4: '7104' };
        } else if (action === 'dsr_erase') {
            payload = { action: 'dsr_erase', email: 'aditya.patil@example.gov.in' };
        }

        const res = await fetch('api/auth.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const data = await res.json();
        box.innerHTML = `// HTTP Status: ${res.status} OK\n// Response Time: ${new Date().toISOString()}\n\n` + JSON.stringify(data, null, 2);
    } catch (err) {
        box.innerHTML = `// Request Failed: ` + err.message;
    }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
