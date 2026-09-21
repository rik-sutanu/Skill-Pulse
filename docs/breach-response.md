# SkillPulse Incident Response & Data Breach Notification Policy
**Statutory Authority:** Digital Personal Data Protection Act (DPDP Act, 2023) §8(6) & CERT-In Cyber Security Directions (No. 20(3)/2022-CERT-In)  
**System Designation:** SkillPulse Industry-to-Skill Intelligence Platform (National TVET Mission &amp; Directorate of Vocational Education and Training, Maharashtra)  
**Document Reference:** `SEC-SOP-DPDP-CERTIN-2026-V1`  
**Classification:** Official / Non-Sensitive Operational Protocol  
**Effective Date:** January 2026  

---

## 1. Executive Summary & Statutory Mandate

SkillPulse processes vocational student competencies, institutional curriculum alignments, and employment placement recommendations for the State of Maharashtra (DVET & MSSDS) and nationwide TVET institutions.

Under Indian law, SkillPulse operates under two strict statutory notification windows:
1. **CERT-In 6-Hour Reporting Window:** Under Section 70B(6) of the Information Technology Act 2000 and the CERT-In Directions of 28 April 2022, any cybersecurity incident (including unauthorized access, ransomware, data leak, or denial of service) **must be formally notified to CERT-In within six (6) hours** of becoming aware of the event.
2. **DPDP Act 2023 §8(6) Data Breach Notification:** In the event of a personal data breach, the Data Fiduciary (SkillPulse / DVET) must give the **Data Protection Board of India (DPBI)** and **each affected Data Principal (citizen/student)** intimation of such breach in the form and manner prescribed.

---

## 2. Incident Classification & Severity Matrix

| Severity Level | Definition | Impact Scope | Statutory Notification Clock |
| :--- | :--- | :--- | :--- |
| **P1 - Critical (Catastrophic)** | Direct compromise of isolated Aadhaar Data Vault, mass exfiltration of citizen PII, ransomware attack disabling state portals. | &gt; 5,000 citizens or full database breach | **CERT-In:** &le; 6 hours<br>**DPBI &amp; Citizens:** &le; 72 hours |
| **P2 - High (Severe)** | Unauthorized credential access, brute-force token harvesting, abnormal bulk extraction (&gt;15 records/5 min), API authentication bypass. | 100 &ndash; 5,000 users | **CERT-In:** &le; 6 hours<br>**DPBI:** Evaluated by DPO (&le; 72 hours) |
| **P3 - Medium (Moderate)** | Single user account credential compromise, blocked malicious file upload attempt, localized DoS mitigation. | &lt; 100 users, zero vault impact | Internal logging (180-day retention), CERT-In reporting if targeted attack pattern |
| **P4 - Low (Informational)** | Standard rate-limit lockouts, malformed payload rejections, routine port probing. | Nil | Automated access log archive |

---

## 3. Step-by-Step Incident Response Lifecycle

```
[ PHASE 1: DETECTION & TRIAGE ] ──> [ PHASE 2: CONTAINMENT ] ──> [ PHASE 3: CERT-IN 6-HR NOTICE ]
                                                                             │
[ PHASE 6: POST-MORTEM & AUDIT ] <── [ PHASE 5: RECOVERY ]   <── [ PHASE 4: DPBI 72-HR NOTICE ]
```

### Phase 1: Detection & Triage (T + 0 to T + 60 minutes)
1. **Automated Alerts Triggered:**
   - Rate-limiting threshold breaches (5 failed attempts per 10 minutes).
   - Anomaly detection trigger: Accessor queries &gt;15 student records in 5 minutes via `check_access_anomaly()`.
   - File upload validation rejection (MIME spoofing, non-PDF/DOCX magic bytes).
2. **First Responder Actions:**
   - On-duty Security Operations Engineer verifies alerts via `backend/audit_logs.json` and `backend/access_logs.json`.
   - Incident Commander (IC) and Data Protection Officer (DPO) are immediately paged.

### Phase 2: Containment & Evidence Isolation (T + 1 to T + 3 hours)
1. **Session Revocation:**
   - Execute global or user-specific revocation via `revoke_user_sessions($userId)`.
   - Rotate master KMS token `KMS_VAULT_KEY` if vault access is suspected.
2. **Network & System Quarantine:**
   - Null-route offensive IP ranges via firewall.
   - Restrict API endpoint `/api/auth.php` to maintenance authentication mode if required.
3. **Forensic Evidence Preservation (CERT-In Standard):**
   - Take snapshot copies of `backend/audit_logs.json` and `backend/access_logs.json`.
   - Verify that all server clocks remain synchronized with National Physical Laboratory (NPL) NTP servers (`time.nplindia.org`).
   - Calculate SHA-256 checksums of all log artifacts to maintain strict chain of custody.

### Phase 3: Statutory 6-Hour Reporting to CERT-In (T &le; 6 hours)
In accordance with Rule 12 of the CERT-In Directions 2022:
- **Designated Incident Reporting Channel:** Email to `incident@cert-in.org.in` or via CERT-In portal (`https://www.cert-in.org.in/`).
- **Emergency Hotline:** 1800-11-4949.
- **Reporting Format:** Complete CERT-In Incident Reporting Form Annexure-I containing:
  - Incident Type & Date/Time (IST).
  - Suspected Source IP & Target IP/Systems.
  - Affected Domain / IP (`skillpulse.in`).
  - Nature of Impact (Personal data, service outage, unauthorized login).
  - Remediation actions already deployed.

### Phase 4: DPDP Act 2023 72-Hour Breach Intimation (T &le; 72 hours)
Pursuant to DPDP Act 2023 §8(6):
1. **Intimation to Data Protection Board of India (DPBI):**
   - Description of the nature, extent, and cause of the personal data breach.
   - Categories and approximate number of Data Principals affected.
   - Measures adopted to mitigate adverse effects.
   - Contact details of Data Protection Officer (DPO).
2. **Intimation to Affected Citizens (Data Principals):**
   - Dispatched via registered SMS (+91 CDAC/NIC gateway) and email.
   - Plain-language summary in English, Hindi, and Marathi explaining what data elements were accessed and recommended precautionary steps (e.g. password reset).

### Phase 5: Eradication & Recovery
1. Re-hash all user credentials using `PASSWORD_BCRYPT` with fresh salt.
2. Re-encrypt all sensitive identity records in `backend/identity_vault.json` using new ephemeral GCM initialization vectors.
3. Validate application integrity using automated vulnerability scans and strict CSRF token validation.

### Phase 6: Post-Incident Review & 180-Day Log Archival
1. Comprehensive Root Cause Analysis (RCA) report drafted within 14 days.
2. Forensic logs archived in encrypted WORM (Write Once, Read Many) cold storage for at least **180 statutory days** per CERT-In directives.

---

## 4. Key Incident Contacts & Escalation Directory

| Role | Designee | Contact Details |
| :--- | :--- | :--- |
| **Data Protection Officer (DPO)** | Shri R. S. Kulkarni, IAS (DVET) | `dpo@skillpulse.maharashtra.gov.in`<br>Phone: +91 22 2262 0608 |
| **CERT-In Incident Desk** | Indian Computer Emergency Response Team | `incident@cert-in.org.in`<br>Toll-Free: 1800-11-4949 |
| **CISO / Technical Lead** | Chief Information Security Officer, SkillPulse Operations | `ciso@skillpulse.in`<br>Secure Incident Channel: `#incident-response-war-room` |
| **Legal Counsel (DPDP / IT Act)** | Special Counsel for State Cyber Cell | `legal@skillpulse.maharashtra.gov.in` |

---

## 5. Annexure: Standard DPDP Data Breach Notification Template

```
URGENT STATUTORY NOTICE: DIGITAL PERSONAL DATA PROTECTION ACT 2023 §8(6)
From: Data Protection Officer, SkillPulse (Govt of Maharashtra DVET)
To: Data Protection Board of India (DPBI) / Affected Data Principal

Subject: Intimation of Security Incident Regarding Personal Data

Dear Citizen / Board Secretary,

Under Section 8(6) of the Digital Personal Data Protection Act 2023, SkillPulse hereby 
intimates you of a security event identified on [DATE_TIME_IST].

1. Description of Incident: [Summary of unauthorized access or anomaly]
2. Personal Data Categories Involved: [e.g. Masked phone number, vocational competency scores]
3. Mitigation Actions Taken:
   - All compromised sessions have been immediately revoked.
   - The isolated Aadhaar Data Vault remains encrypted with AES-256-GCM.
   - CERT-In has been notified under Incident Ticket ID: [CERTIN_TICKET_NO].
4. Recommended Citizen Steps: Log in at https://skillpulse.in/my-data.php to review your active sessions.
5. Grievance Redressal: You may contact the DPO at dpo@skillpulse.maharashtra.gov.in.

Yours faithfully,
Data Protection Officer, SkillPulse
```
