-- ==============================================================================
-- SkillPulse Migration: Add courses and enrollments tables
-- ==============================================================================

CREATE TABLE IF NOT EXISTS public.courses (
    id VARCHAR(100) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    provider VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    level VARCHAR(50) DEFAULT 'Intermediate',
    duration VARCHAR(50) NOT NULL,
    rating NUMERIC(3,2) DEFAULT 4.80,
    enrolled INTEGER DEFAULT 1200,
    wage_boost VARCHAR(50) DEFAULT '+25%',
    subsidy_grant VARCHAR(255) DEFAULT '100% Free under MahaSwayam Youth Skill Voucher',
    tags JSONB DEFAULT '[]'::jsonb,
    modules JSONB DEFAULT '[]'::jsonb,
    short_description TEXT,
    description TEXT,
    url TEXT NOT NULL,
    is_govt_sponsored BOOLEAN DEFAULT true,
    is_active BOOLEAN DEFAULT true,
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS public.enrollments (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    enrollment_id VARCHAR(100) NOT NULL UNIQUE,
    user_id TEXT REFERENCES public.users(id) ON DELETE SET NULL,
    course_id VARCHAR(100) REFERENCES public.courses(id) ON DELETE SET NULL,
    candidate_name VARCHAR(255) NOT NULL,
    candidate_email VARCHAR(255) NOT NULL,
    candidate_mobile VARCHAR(20) NOT NULL,
    qualification VARCHAR(255) NOT NULL,
    district VARCHAR(100) NOT NULL,
    id_type VARCHAR(100) NOT NULL,
    id_number_masked VARCHAR(100) NOT NULL,
    scheme_type VARCHAR(100) NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'VERIFIED_ACTIVE',
    subsidy_waiver TEXT,
    verification_hash VARCHAR(255),
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

ALTER TABLE public.courses ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.enrollments ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "Public read courses" ON public.courses;
CREATE POLICY "Public read courses" ON public.courses FOR SELECT USING (true);

DROP POLICY IF EXISTS "Public read enrollments" ON public.enrollments;
CREATE POLICY "Public read enrollments" ON public.enrollments FOR SELECT USING (true);

DROP POLICY IF EXISTS "Insert enrollments" ON public.enrollments;
CREATE POLICY "Insert enrollments" ON public.enrollments FOR INSERT WITH CHECK (true);
