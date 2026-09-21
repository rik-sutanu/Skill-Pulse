# SkillPulse Production Deployment Guide

This guide outlines how to deploy SkillPulse live to production across the most popular cloud platforms.

---

## Deployment Options at a Glance

| Platform | Recommended For | Speed | Cost |
| :--- | :--- | :--- | :--- |
| **[Vercel](#1-deploying-to-vercel-recommended)** | Fastest deployment, zero maintenance | ~2 minutes | Free Tier Available |
| **[Render](#2-deploying-to-render-1-click-blueprint)** | Native Docker + PHP support, automatic HTTPS | ~3 minutes | Free Tier Available |
| **[Railway](#3-deploying-to-railway)** | Instant GitHub auto-deploy with Docker | ~2 minutes | Free Trial Available |
| **[Google Cloud Run](#4-deploying-to-google-cloud-run-gcp)** | Enterprise scalability, serverless container | ~4 minutes | Free Tier ($300 credits) |
| **[cPanel / Shared Hosting](#5-deploying-to-cpanel--shared-hosting)** | Traditional Apache/PHP hosting | ~5 minutes | Standard Hosting Plan |

---

## 1. Deploying to Vercel (Recommended)

SkillPulse includes [`vercel.json`](vercel.json) pre-configured with the `@vercel/php` runtime and clean URL rewrites.

### Steps:
1. **Push to GitHub**:
   ```bash
   git init
   git add .
   git commit -m "Initial commit of SkillPulse platform"
   git branch -M main
   git remote add origin https://github.com/YOUR_USERNAME/skillpulse.git
   git push -u origin main
   ```
2. **Deploy on Vercel**:
   - Go to [vercel.com](https://vercel.com) and click **Add New** &rarr; **Project**.
   - Import your `skillpulse` GitHub repository.
   - In **Environment Variables**, add:
     - `SUPABASE_URL` = Your Supabase Project URL
     - `SUPABASE_ANON_KEY` = Your Supabase anon key
     - `SUPABASE_SERVICE_ROLE_KEY` = Your Supabase service role key
     - `TAWKTO_PROPERTY_ID` = Your Tawk.to Property ID (optional)
   - Click **Deploy**. Your site will be live at `https://skillpulse-xyz.vercel.app`!

---

## 2. Deploying to Render (1-Click Blueprint)

SkillPulse includes [`render.yaml`](render.yaml) and [`Dockerfile`](Dockerfile) for automated container builds.

### Steps:
1. Push code to your GitHub repository.
2. Open [render.com](https://render.com) and log in.
3. Click **New +** &rarr; **Blueprint**.
4. Connect your GitHub repository. Render will automatically detect `render.yaml` and set up the service.
5. In the environment variables prompt, enter your Supabase and Mailer credentials.
6. Click **Apply**. Render will build the Docker container and provide a live URL like `https://skillpulse.onrender.com` with free SSL.

---

## 3. Deploying to Railway

1. Go to [railway.app](https://railway.app).
2. Click **New Project** &rarr; **Deploy from GitHub repo**.
3. Select your repository. Railway will detect the [`Dockerfile`](Dockerfile) automatically.
4. Go to **Variables** tab in Railway and add:
   - `SUPABASE_URL`
   - `SUPABASE_ANON_KEY`
   - `SUPABASE_SERVICE_ROLE_KEY`
   - `PORT` = `80`
5. Click **Deploy**. In **Settings**, generate a public domain (e.g. `skillpulse.up.railway.app`).

---

## 4. Deploying to Google Cloud Run (GCP)

Using Google Cloud CLI (`gcloud` is already installed on your system):

```bash
# 1. Authenticate with Google Cloud
gcloud auth login

# 2. Set your Google Cloud project
gcloud config set project YOUR_PROJECT_ID

# 3. Build and deploy to Cloud Run in one step
gcloud run deploy skillpulse \
  --source . \
  --region asia-south1 \
  --allow-unauthenticated \
  --set-env-vars SUPABASE_URL="https://your-project.supabase.co",SUPABASE_ANON_KEY="your-anon-key"
```
Cloud Run will output your live URL (e.g. `https://skillpulse-xyz-as.a.run.app`).

---

## 5. Deploying to cPanel / Shared Hosting

1. Zip all files in `d:\SKILLPULSE` (excluding `node_modules`, `tests`, and `.git`).
2. Log in to your cPanel &rarr; **File Manager** &rarr; open `public_html/`.
3. Upload the `.zip` file and click **Extract**.
4. Ensure the `.htaccess` file was extracted into `public_html/`.
5. Create or edit `.env` in `public_html/` with your Supabase and SMTP keys.
6. Your domain will be live immediately!

---

## Post-Deployment Checklist

- [ ] Run the SQL migration [`database/supabase_schema.sql`](database/supabase_schema.sql) in your Supabase SQL Editor.
- [ ] Verify `https://your-live-domain.com/api/config.php` returns status `200 OK`.
- [ ] Test user registration and login at `https://your-live-domain.com/auth.php`.
- [ ] Verify the live chat widget loads without UI blocking.
