# SkillPulse ⚡

> **"Where Industry Demand Meets Skill Development"**

SkillPulse is a modern, professional web platform and Industry-to-Skill Intelligence engine that bridges the gap between dynamic labor market requirements and skill development/training programs.

Built with **Next.js**, **React**, **JavaScript ONLY** (no TypeScript), **Tailwind CSS**, **Recharts**, and an integrated **Express/Next.js API** backend.

---

## 🌟 Core Feature Pipeline

The platform demonstrates this continuous pipeline:
```
INDUSTRY DEMAND
      ↓
REQUIRED SKILLS
      ↓
CURRENT SKILLS / CURRICULUM
      ↓
SKILL GAP IDENTIFICATION
      ↓
ALIGNMENT / READINESS SCORE
      ↓
RECOMMENDED TRAINING ROADMAP
      ↓
JOB READINESS & EMPLOYER MATCHING
```

---

## 🚀 Key Pages & Modules

1. **Home (`/`)**: High-impact SaaS landing page featuring live stats (12,500+ jobs, 850+ skills, 120+ curricula, 78% alignment) and the interactive 4-stage pipeline visualization.
2. **Skill Intelligence (`/skill-intelligence`)**: Filterable market intelligence by industry, location, and timeframe. Includes Recharts bar and area charts for demand trajectories and emerging skills (+48% GenAI, +38% Cloud).
3. **Skill Gap Analyzer (`/skill-gap-analyzer`)**: Interactive diagnostic tool allowing users to select target roles, input current competencies, and get immediate Job Readiness Scores with priority-ranked gaps and milestone learning paths.
4. **Career Roadmap (`/career-roadmap`)**: Milestone-driven curriculum tracker with time estimates, difficulty tags, and checklist tracking.
5. **Training & Curriculum Alignment (`/training-curriculum`)**: Institutional auditing interface featuring an **Interactive Curriculum Simulator** that demonstrates how adding modules increases placement alignment (75% → 82% → 89%).
6. **Government & Regional Dashboard (`/government`)**: District-level analytics for Maharashtra (Mumbai, Pune, Nagpur, Nashik, Chhatrapati Sambhajinagar, Thane, Kolhapur) comparing industry demand against training capacity.
7. **Employer Portal (`/employer`)**: Requisition builder for companies to define required skills and experience levels.
8. **Student Dashboard (`/dashboard`)**: Logged-in view with progress rings, skill-readiness gauges, and saved analysis trackers.

---

## 🛠️ Tech Stack & Constraints

- **Framework**: Next.js 14 (App Router)
- **Language**: Pure JavaScript (`.js` and `.jsx` only, zero TypeScript)
- **Styling**: Tailwind CSS with custom Deep Navy, Primary Blue, and Cyan palette
- **Data Visualization**: Recharts (horizontal bar charts, area charts, custom radial gauges)
- **Icons**: Lucide React
- **Backend APIs**:
  - `GET /api/skills`
  - `GET /api/industries`
  - `GET /api/jobs`
  - `GET /api/skill-demand`
  - `POST /api/skill-gap`
  - `POST /api/curriculum-analysis`
  - `GET /api/roadmap`
- **Database Architecture**: PostgreSQL / Supabase ready (`src/data/schema.sql`)
- **Standalone Server**: `server.js` (Express.js)

---

## 🏃‍♂️ Running the Platform Locally

### Development Mode:
```bash
npm run dev
```
Open [http://localhost:3000](http://localhost:3000) in your browser.

### Production Build & Serve:
```bash
npm run build
npm run start
```

### Standalone Express Backend:
```bash
npm run server
```
Server runs on [http://localhost:5000](http://localhost:5000).

---

## 🔒 Statutory Security, Privacy & DPDP Act 2023 Compliance

SkillPulse is hardened to comply with the statutory provisions of the **Digital Personal Data Protection (DPDP) Act 2023** and the **CERT-In Cyber Security Directions (April 2022)**:

### 1. Citizen Data Rights & Self-Service (`/my-data.php`)
- **Right to Access Information (§11):** Data Principals can view and download a machine-readable JSON data package (`api/auth.php?action=export_my_data`) containing all stored competencies, consent timestamps, and vault references.
- **Right to Correction & Erasure (§12):** One-click account anonymization (`action=delete_my_account`) scrubs personal identifiers (Name, Email, Mobile) and revokes all active sessions immediately, while preserving non-identifiable TVET training statistics.
- **Statutory Consent Notice (§6):** Trilingual (English, Hindi, Marathi) plain-language consent explaining Data Fiduciary purpose, retention schedule, and DPO grievance redressal.

### 2. Isolated Aadhaar Data Vault (UIDAI Compliance)
- **Zero Raw Aadhaar Retained:** Cleartext 12-digit Aadhaar numbers are strictly rejected from operational databases.
- **AES-256-GCM Encryption:** Sensitive academic credentials and identity payloads are stored in an isolated vault (`backend/identity_vault.json`) encrypted at rest with AES-256-GCM.
- **Masked Tokenization:** Only masked representations (`XXXX-XXXX-8921`) and alphanumeric ADV reference keys (`ADV-REF-8921-10545B`) are surfaced to user interfaces.

### 3. Authentication & Session Security
- **Bcrypt Password Hashing:** Passwords hashed with Bcrypt (Cost 10).
- **Session Protection:** Stateless JWT tokens delivered via `HttpOnly`, `SameSite=Strict`, and `Secure` cookies.
- **Session Revocation Registry:** Changing passwords or triggering account logout invalidates active sessions across all devices (`revoke_user_sessions()`).
- **Rate-Limiting & Anti-Brute-Force:** Enforces a statutory limit of 5 attempts per 10 minutes per IP/identifier with optional arithmetic CAPTCHA challenges.

### 4. CERT-In 180-Day Audit Logging & Incident Protocol
- **Audit Retention:** All authentication, access, and privilege escalation events are recorded in `backend/audit_logs.json` and retained for 180 days with IST/NPL-synchronized timestamps.
- **Access Log Anomaly Detection:** Flags any accessor querying >15 student records in 5 minutes to prevent automated scraping.
- **Statutory Breach Response:** Detailed incident response runbook in [`docs/breach-response.md`](docs/breach-response.md) covering the 6-hour CERT-In reporting window and 72-hour DPBI notice.

### 5. AI De-Identification Filter
- Machine learning models and FastAPI endpoints (`api/ai.php`) run through an automated PII stripping layer (`deidentify_payload_for_ai`) that redacts emails, phone numbers, and names into anonymous surrogate tokens before model inference.

---
*Last updated: 2026-09-21*
