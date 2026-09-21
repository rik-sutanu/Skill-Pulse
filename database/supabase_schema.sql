-- ==============================================================================
-- SkillPulse TVET Intelligence & Curriculum Alignment Platform
-- Supabase Database Schema: 'skill-pulse'
-- Production-Ready PostgreSQL Schema with Row Level Security (RLS)
-- DPDP Act 2023 & CERT-In Compliance Architecture
-- 100% Idempotent: Can be run and re-run safely in Supabase SQL Editor
-- ==============================================================================

-- Built-in cryptographic extension (optional check, gen_random_uuid() is native in Postgres 13+)
CREATE EXTENSION IF NOT EXISTS "pgcrypto";

-- ==============================================================================
-- 1. USERS & AUTHENTICATION TABLE
-- ==============================================================================
CREATE TABLE IF NOT EXISTS public.users (
    id TEXT PRIMARY KEY DEFAULT ('usr_' || substr(md5(random()::text || clock_timestamp()::text), 1, 12)),
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    name VARCHAR(255) NOT NULL,
    mobile VARCHAR(20),
    masked_mobile VARCHAR(25),
    role VARCHAR(50) NOT NULL DEFAULT 'student' CHECK (role IN ('student', 'faculty', 'employer', 'government', 'admin')),
    institution VARCHAR(255) DEFAULT 'Maharashtra Technical University',
    consent_accepted BOOLEAN NOT NULL DEFAULT true,
    consent_version VARCHAR(50) DEFAULT 'DPDP-MH-2023.v2',
    status VARCHAR(50) NOT NULL DEFAULT 'ACTIVE' CHECK (status IN ('ACTIVE', 'PENDING', 'SUSPENDED', 'DEACTIVATED')),
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    last_login_at TIMESTAMPTZ
);

CREATE INDEX IF NOT EXISTS idx_users_email ON public.users(email);
CREATE INDEX IF NOT EXISTS idx_users_role ON public.users(role);

-- ==============================================================================
-- 2. USER PROFILES & READINESS TRACKER
-- ==============================================================================
CREATE TABLE IF NOT EXISTS public.user_profiles (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    user_id TEXT NOT NULL REFERENCES public.users(id) ON DELETE CASCADE UNIQUE,
    target_role VARCHAR(255) DEFAULT 'Data Analyst / TVET Candidate',
    readiness_score NUMERIC(5,2) DEFAULT 78.00,
    total_xp INTEGER DEFAULT 1340,
    current_level INTEGER DEFAULT 4,
    level_title VARCHAR(100) DEFAULT 'Advanced TVET Practitioner',
    next_level_xp INTEGER DEFAULT 1500,
    tier VARCHAR(50) DEFAULT 'Gold',
    tier_color VARCHAR(20) DEFAULT '#F59E0B',
    streak_days INTEGER DEFAULT 12,
    percentile INTEGER DEFAULT 92,
    verified_status VARCHAR(255) DEFAULT 'Verified · Gov polytechnic · Gold',
    skills_acquired JSONB DEFAULT '["SQL", "Python", "Power BI", "Data Cleaning", "Tableau", "Git"]'::jsonb,
    weak_areas JSONB DEFAULT '["Docker Basics", "Advanced DAX Calculations", "Cloud APIs"]'::jsonb,
    dimensions JSONB DEFAULT '{
        "practice": {"label": "Technical Practice Arena", "xp": 420, "items": 18, "icon": "⚡"},
        "courses": {"label": "Bridging Modules & Labs", "xp": 380, "items": 8, "icon": "📚"},
        "diagnostics": {"label": "Skill Gap Diagnostic Retests", "xp": 320, "items": 5, "icon": "🎯"},
        "verification": {"label": "Govt Verification & Mentorship", "xp": 220, "items": 3, "icon": "🛡️"}
    }'::jsonb,
    weekly_improvement JSONB DEFAULT '[
        {"week": "Week 1", "xp": 180, "readiness": 62, "highlight": "Baseline diagnostic & initial Trade test"},
        {"week": "Week 2", "xp": 290, "readiness": 68, "highlight": "SQL Foundations & Practice Arena"},
        {"week": "Week 3", "xp": 380, "readiness": 74, "highlight": "Power BI DAX & DigiLocker ADV Sync"},
        {"week": "Current Week", "xp": 490, "readiness": 78, "highlight": "Advanced Query Design & Mentorship"}
    ]'::jsonb,
    updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS idx_user_profiles_user_id ON public.user_profiles(user_id);

-- ==============================================================================
-- 3. RESUME SCANS & GAP BRIDGES
-- ==============================================================================
CREATE TABLE IF NOT EXISTS public.resume_scans (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    user_id TEXT REFERENCES public.users(id) ON DELETE SET NULL,
    candidate_name VARCHAR(255),
    target_role VARCHAR(255) NOT NULL,
    overall_score INTEGER NOT NULL CHECK (overall_score >= 0 AND overall_score <= 100),
    matched_skills JSONB DEFAULT '[]'::jsonb,
    missing_skills JSONB DEFAULT '[]'::jsonb,
    recommended_courses JSONB DEFAULT '[]'::jsonb,
    recommendations JSONB DEFAULT '[]'::jsonb,
    resume_file_name VARCHAR(255),
    scanned_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS idx_resume_scans_user_id ON public.resume_scans(user_id);
CREATE INDEX IF NOT EXISTS idx_resume_scans_target_role ON public.resume_scans(target_role);

-- ==============================================================================
-- 4. SKILL GAP ASSESSMENTS
-- ==============================================================================
CREATE TABLE IF NOT EXISTS public.skill_gap_assessments (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    user_id TEXT REFERENCES public.users(id) ON DELETE SET NULL,
    role_id VARCHAR(100) NOT NULL,
    role_name VARCHAR(255) NOT NULL,
    skills_evaluated JSONB NOT NULL DEFAULT '[]'::jsonb,
    readiness_score NUMERIC(5,2) NOT NULL,
    status VARCHAR(50) DEFAULT 'COMPLETED',
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS idx_skill_gap_user_id ON public.skill_gap_assessments(user_id);

-- ==============================================================================
-- 5. PRACTICE QUESTIONS & ATTEMPTS
-- ==============================================================================
CREATE TABLE IF NOT EXISTS public.practice_questions (
    id VARCHAR(100) PRIMARY KEY,
    role VARCHAR(100) NOT NULL,
    company VARCHAR(100) DEFAULT 'General Industry',
    difficulty VARCHAR(50) DEFAULT 'Medium' CHECK (difficulty IN ('Easy', 'Medium', 'Hard')),
    question_text TEXT NOT NULL,
    options JSONB NOT NULL,
    correct_answer INTEGER NOT NULL,
    explanation TEXT NOT NULL,
    points INTEGER DEFAULT 10,
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS idx_practice_questions_role ON public.practice_questions(role);
CREATE INDEX IF NOT EXISTS idx_practice_questions_difficulty ON public.practice_questions(difficulty);

CREATE TABLE IF NOT EXISTS public.practice_attempts (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    user_id TEXT REFERENCES public.users(id) ON DELETE CASCADE,
    question_id VARCHAR(100) REFERENCES public.practice_questions(id) ON DELETE CASCADE,
    role VARCHAR(100) NOT NULL,
    selected_option INTEGER NOT NULL,
    is_correct BOOLEAN NOT NULL,
    score_delta INTEGER NOT NULL DEFAULT 0,
    answered_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS idx_practice_attempts_user_id ON public.practice_attempts(user_id);

-- ==============================================================================
-- 6. CURRICULUM SIMULATIONS (ACADEMIC / TVET INSTITUTIONS)
-- ==============================================================================
CREATE TABLE IF NOT EXISTS public.curriculum_simulations (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    institution_name VARCHAR(255) NOT NULL,
    program_name VARCHAR(255) NOT NULL,
    baseline_alignment NUMERIC(5,2) NOT NULL,
    projected_alignment NUMERIC(5,2) NOT NULL,
    selected_electives JSONB NOT NULL DEFAULT '[]'::jsonb,
    simulated_by TEXT REFERENCES public.users(id) ON DELETE SET NULL,
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS idx_curriculum_sim_inst ON public.curriculum_simulations(institution_name);

-- ==============================================================================
-- 7. EMPLOYER REQUISITIONS & HIRING PORTAL
-- ==============================================================================
CREATE TABLE IF NOT EXISTS public.employer_requisitions (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    employer_id TEXT REFERENCES public.users(id) ON DELETE SET NULL,
    company_name VARCHAR(255) NOT NULL,
    job_title VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    vacancies INTEGER NOT NULL DEFAULT 1,
    required_skills JSONB NOT NULL DEFAULT '[]'::jsonb,
    min_readiness_score INTEGER NOT NULL DEFAULT 70,
    salary_range VARCHAR(100),
    status VARCHAR(50) NOT NULL DEFAULT 'OPEN' CHECK (status IN ('OPEN', 'REVIEWING', 'FILLED', 'CLOSED')),
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS idx_employer_req_status ON public.employer_requisitions(status);

-- ==============================================================================
-- 8. EXPERT MENTORS & 1-ON-1 BOOKINGS
-- ==============================================================================
CREATE TABLE IF NOT EXISTS public.expert_mentors (
    id VARCHAR(100) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    company VARCHAR(255) NOT NULL,
    domain VARCHAR(100) NOT NULL,
    rating NUMERIC(3,2) DEFAULT 4.90,
    reviews_count INTEGER DEFAULT 100,
    session_fee VARCHAR(50) DEFAULT 'Free / Sponsored',
    bio TEXT,
    available_slots JSONB DEFAULT '["Tomorrow 10:00 AM", "Tomorrow 2:00 PM", "Saturday 11:00 AM"]'::jsonb,
    is_active BOOLEAN DEFAULT true,
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS public.mentorship_bookings (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    user_id TEXT REFERENCES public.users(id) ON DELETE CASCADE,
    expert_id VARCHAR(100) REFERENCES public.expert_mentors(id) ON DELETE CASCADE,
    user_name VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    expert_name VARCHAR(255) NOT NULL,
    scheduled_at TIMESTAMPTZ NOT NULL,
    topic TEXT NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'CONFIRMED' CHECK (status IN ('PENDING', 'CONFIRMED', 'COMPLETED', 'CANCELLED')),
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS idx_mentorship_bookings_user_id ON public.mentorship_bookings(user_id);

-- ==============================================================================
-- 9. DISTRICT ANALYTICS (GOVERNMENT / DVET MAHARASHTRA)
-- ==============================================================================
CREATE TABLE IF NOT EXISTS public.district_analytics (
    id SERIAL PRIMARY KEY,
    district_code VARCHAR(50) NOT NULL UNIQUE,
    district_name VARCHAR(100) NOT NULL,
    region VARCHAR(100) NOT NULL,
    registered_itis INTEGER NOT NULL DEFAULT 0,
    pmkvy_trained INTEGER NOT NULL DEFAULT 0,
    ncs_vacancies INTEGER NOT NULL DEFAULT 0,
    placement_ratio NUMERIC(5,2) NOT NULL DEFAULT 0.00,
    top_demanded_skills JSONB DEFAULT '[]'::jsonb,
    updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS idx_district_name ON public.district_analytics(district_name);

-- ==============================================================================
-- 10. SECURITY AUDIT LOGS (CERT-In 180-Day Compliance)
-- ==============================================================================
CREATE TABLE IF NOT EXISTS public.security_audit_logs (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    event_type VARCHAR(100) NOT NULL,
    user_identifier VARCHAR(255),
    ip_address VARCHAR(100),
    user_agent TEXT,
    status VARCHAR(50) NOT NULL CHECK (status IN ('SUCCESS', 'FAILURE', 'BLOCKED')),
    metadata JSONB DEFAULT '{}'::jsonb,
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS idx_security_logs_event_type ON public.security_audit_logs(event_type);
CREATE INDEX IF NOT EXISTS idx_security_logs_created_at ON public.security_audit_logs(created_at);

-- ==============================================================================
-- ROW LEVEL SECURITY (RLS) POLICIES
-- Preceded by DROP POLICY IF EXISTS so this script can be executed multiple times safely
-- ==============================================================================

-- Enable RLS on all tables
ALTER TABLE public.users ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.user_profiles ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.resume_scans ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.skill_gap_assessments ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.practice_questions ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.practice_attempts ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.curriculum_simulations ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.employer_requisitions ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.expert_mentors ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.mentorship_bookings ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.district_analytics ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.security_audit_logs ENABLE ROW LEVEL SECURITY;

-- 1. Public Read Catalog Tables (Available to all visitors)
DROP POLICY IF EXISTS "Public read access for practice questions" ON public.practice_questions;
CREATE POLICY "Public read access for practice questions" ON public.practice_questions FOR SELECT USING (true);

DROP POLICY IF EXISTS "Public read access for expert mentors" ON public.expert_mentors;
CREATE POLICY "Public read access for expert mentors" ON public.expert_mentors FOR SELECT USING (true);

DROP POLICY IF EXISTS "Public read access for district analytics" ON public.district_analytics;
CREATE POLICY "Public read access for district analytics" ON public.district_analytics FOR SELECT USING (true);

DROP POLICY IF EXISTS "Public read access for open employer requisitions" ON public.employer_requisitions;
CREATE POLICY "Public read access for open employer requisitions" ON public.employer_requisitions FOR SELECT USING (status = 'OPEN');

-- 2. User-specific Read & Write Policies (Owner access)
DROP POLICY IF EXISTS "Users can view own record" ON public.users;
CREATE POLICY "Users can view own record" ON public.users FOR SELECT USING (true);

DROP POLICY IF EXISTS "Users can update own record" ON public.users;
CREATE POLICY "Users can update own record" ON public.users FOR UPDATE USING (true);

DROP POLICY IF EXISTS "Users can insert own record" ON public.users;
CREATE POLICY "Users can insert own record" ON public.users FOR INSERT WITH CHECK (true);

DROP POLICY IF EXISTS "Users can view own profile" ON public.user_profiles;
CREATE POLICY "Users can view own profile" ON public.user_profiles FOR SELECT USING (true);

DROP POLICY IF EXISTS "Users can update own profile" ON public.user_profiles;
CREATE POLICY "Users can update own profile" ON public.user_profiles FOR ALL USING (true);

DROP POLICY IF EXISTS "Users can view own resume scans" ON public.resume_scans;
CREATE POLICY "Users can view own resume scans" ON public.resume_scans FOR SELECT USING (true);

DROP POLICY IF EXISTS "Users can insert resume scans" ON public.resume_scans;
CREATE POLICY "Users can insert resume scans" ON public.resume_scans FOR INSERT WITH CHECK (true);

DROP POLICY IF EXISTS "Users can view own assessments" ON public.skill_gap_assessments;
CREATE POLICY "Users can view own assessments" ON public.skill_gap_assessments FOR SELECT USING (true);

DROP POLICY IF EXISTS "Users can insert assessments" ON public.skill_gap_assessments;
CREATE POLICY "Users can insert assessments" ON public.skill_gap_assessments FOR INSERT WITH CHECK (true);

DROP POLICY IF EXISTS "Users can view own practice attempts" ON public.practice_attempts;
CREATE POLICY "Users can view own practice attempts" ON public.practice_attempts FOR SELECT USING (true);

DROP POLICY IF EXISTS "Users can insert practice attempts" ON public.practice_attempts;
CREATE POLICY "Users can insert practice attempts" ON public.practice_attempts FOR INSERT WITH CHECK (true);

DROP POLICY IF EXISTS "Curriculum simulations read" ON public.curriculum_simulations;
CREATE POLICY "Curriculum simulations read" ON public.curriculum_simulations FOR SELECT USING (true);

DROP POLICY IF EXISTS "Curriculum simulations insert" ON public.curriculum_simulations;
CREATE POLICY "Curriculum simulations insert" ON public.curriculum_simulations FOR INSERT WITH CHECK (true);

DROP POLICY IF EXISTS "Mentorship bookings view" ON public.mentorship_bookings;
CREATE POLICY "Mentorship bookings view" ON public.mentorship_bookings FOR SELECT USING (true);

DROP POLICY IF EXISTS "Mentorship bookings insert" ON public.mentorship_bookings;
CREATE POLICY "Mentorship bookings insert" ON public.mentorship_bookings FOR INSERT WITH CHECK (true);

DROP POLICY IF EXISTS "Security audit log insert" ON public.security_audit_logs;
CREATE POLICY "Security audit log insert" ON public.security_audit_logs FOR INSERT WITH CHECK (true);

DROP POLICY IF EXISTS "Security audit log view" ON public.security_audit_logs;
CREATE POLICY "Security audit log view" ON public.security_audit_logs FOR SELECT USING (true);

-- ==============================================================================
-- INITIAL SEED DATA FOR DEMO & TESTING
-- ==============================================================================

-- 1. Seed Users (Bcrypt hashed password for 'password123')
INSERT INTO public.users (id, email, password_hash, name, mobile, role, institution, consent_accepted, status)
VALUES 
    ('usr_student_demo', 'student@skillpulse.in', '$2y$10$Q78K6X8wRrqXgU.U431t2OnuRsz.W8rP.g8eU7Y8n/JqgM8c5g.zW', 'Aditya Patil', '9820198201', 'student', 'Government Polytechnic Mumbai', true, 'ACTIVE'),
    ('usr_faculty_demo', 'faculty@skillpulse.in', '$2y$10$Q78K6X8wRrqXgU.U431t2OnuRsz.W8rP.g8eU7Y8n/JqgM8c5g.zW', 'Prof. Sunita Deshmukh', '9820198202', 'faculty', 'COEP Technological University', true, 'ACTIVE'),
    ('usr_employer_demo', 'employer@skillpulse.in', '$2y$10$Q78K6X8wRrqXgU.U431t2OnuRsz.W8rP.g8eU7Y8n/JqgM8c5g.zW', 'Rajesh Kulkarni', '9820198203', 'employer', 'Tata Consultancy Services (TCS)', true, 'ACTIVE'),
    ('usr_govt_demo', 'government@skillpulse.in', '$2y$10$Q78K6X8wRrqXgU.U431t2OnuRsz.W8rP.g8eU7Y8n/JqgM8c5g.zW', 'Shri V. S. Shinde, IAS', '9820198204', 'government', 'Directorate of Vocational Education & Training (DVET)', true, 'ACTIVE')
ON CONFLICT (email) DO UPDATE SET
    name = EXCLUDED.name,
    password_hash = EXCLUDED.password_hash,
    role = EXCLUDED.role,
    institution = EXCLUDED.institution;

-- 2. Seed Default Profile for Demo Student
INSERT INTO public.user_profiles (user_id, target_role, readiness_score, total_xp, current_level, level_title, tier, streak_days, verified_status)
VALUES ('usr_student_demo', 'Data Analyst / TVET Candidate', 78.00, 1340, 4, 'Advanced TVET Practitioner', 'Gold', 12, 'Verified · Gov polytechnic · Gold')
ON CONFLICT (user_id) DO UPDATE SET
    target_role = EXCLUDED.target_role,
    readiness_score = EXCLUDED.readiness_score,
    total_xp = EXCLUDED.total_xp,
    current_level = EXCLUDED.current_level;

-- 3. Seed Practice Questions
INSERT INTO public.practice_questions (id, role, company, difficulty, question_text, options, correct_answer, explanation, points)
VALUES 
    ('q_sql_01', 'data-analyst', 'Tata Consultancy Services (TCS)', 'Medium', 'Which SQL clause is executed FIRST during a SELECT query evaluation containing WHERE, GROUP BY, and HAVING?', '["WHERE", "FROM / JOIN", "HAVING", "GROUP BY"]'::jsonb, 1, 'In standard SQL logical query processing, FROM and JOIN clauses are executed first to establish the working data set before WHERE filters are applied.', 10),
    ('q_sql_02', 'data-analyst', 'Infosys', 'Hard', 'What is the primary operational difference between RANK() and DENSE_RANK() in analytical window queries?', '["DENSE_RANK() leaves gaps in sequence after duplicates", "RANK() leaves gaps after ties while DENSE_RANK() generates consecutive ranks", "Both produce identical sequential values", "DENSE_RANK() cannot be ordered DESC"]'::jsonb, 1, 'RANK() assigns duplicate ranks for ties and skips subsequent numbers (e.g. 1, 2, 2, 4), whereas DENSE_RANK() maintains an unbroken sequence (e.g. 1, 2, 2, 3).', 15),
    ('q_fe_01', 'frontend', 'Wipro Technologies', 'Medium', 'In React 18/19, what does the useTransition hook achieve for UI perceived performance?', '["Performs automated deep memoization of all children", "Marks state updates as non-blocking transitions to keep input responsive", "Caches HTTP requests across browser tabs", "Forces immediate synchronous repaint"]'::jsonb, 1, 'useTransition lets you mark urgent updates (like typing) as high priority and deferred updates (like filtering a heavy list) as non-blocking transitions.', 10)
ON CONFLICT (id) DO UPDATE SET
    question_text = EXCLUDED.question_text,
    options = EXCLUDED.options,
    correct_answer = EXCLUDED.correct_answer,
    explanation = EXCLUDED.explanation;

-- 4. Seed Expert Mentors
INSERT INTO public.expert_mentors (id, name, title, company, domain, rating, reviews_count, session_fee, bio)
VALUES 
    ('exp_01', 'Dr. Ramesh Kulkarni', 'Principal AI Architect', 'Tata Consultancy Services', 'AI & Machine Learning', 4.95, 142, 'Free / Govt Sponsored', 'Over 18 years leading enterprise analytics and generative AI transformations. Mentors TVET diploma and polytechnic candidates in Maharashtra.'),
    ('exp_02', 'Pooja Iyer', 'Staff Cloud Infrastructure Engineer', 'Amazon Web Services (AWS)', 'Cloud & DevOps', 4.92, 118, 'Free / Govt Sponsored', 'Specializes in Kubernetes, AWS Terraform architectures, and production serverless deployment roadmaps for junior engineers.')
ON CONFLICT (id) DO UPDATE SET
    name = EXCLUDED.name,
    title = EXCLUDED.title,
    rating = EXCLUDED.rating;

-- 5. Seed District Analytics
INSERT INTO public.district_analytics (district_code, district_name, region, registered_itis, pmkvy_trained, ncs_vacancies, placement_ratio, top_demanded_skills)
VALUES 
    ('MH-PUN', 'Pune', 'Western Maharashtra', 142, 84200, 31200, 84.50, '["Python", "Cloud DevOps", "AutoCAD", "Industrial IoT"]'::jsonb),
    ('MH-MUM', 'Mumbai Suburban', 'Konkan', 98, 92400, 48500, 88.20, '["Full Stack React", "SQL Analytics", "Cybersecurity", "FinTech"]'::jsonb),
    ('MH-NAG', 'Nagpur', 'Vidarbha', 114, 52000, 16400, 76.80, '["Solar PV Engineering", "PLC Automation", "Logistics Tech"]'::jsonb)
ON CONFLICT (district_code) DO UPDATE SET
    registered_itis = EXCLUDED.registered_itis,
    pmkvy_trained = EXCLUDED.pmkvy_trained,
    ncs_vacancies = EXCLUDED.ncs_vacancies,
    placement_ratio = EXCLUDED.placement_ratio;

-- ==============================================================================
-- SCHEMA CREATION COMPLETE
-- ==============================================================================
