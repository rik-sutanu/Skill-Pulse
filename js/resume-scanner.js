/**
 * SkillPulse - AI Resume Scanner & Career Bridge Controller
 */
window.ResumeScannerApp = {
  currentFile: null,
  activeSample: null,

  init: function() {
    this.setupTabs();
    this.setupDropzone();
    this.loadRolesAndSamples();
    this.bindScanTrigger();
  },

  setupTabs: function() {
    const tabUpload = document.getElementById('tabBtnUpload');
    const tabPaste = document.getElementById('tabBtnPaste');
    const panelUpload = document.getElementById('panelUpload');
    const panelPaste = document.getElementById('panelPaste');

    if (!tabUpload || !tabPaste) return;

    tabUpload.addEventListener('click', () => {
      tabUpload.classList.add('active');
      tabPaste.classList.remove('active');
      panelUpload.style.display = 'block';
      panelPaste.style.display = 'none';
    });

    tabPaste.addEventListener('click', () => {
      tabPaste.classList.add('active');
      tabUpload.classList.remove('active');
      panelPaste.style.display = 'block';
      panelUpload.style.display = 'none';
    });
  },

  setupDropzone: function() {
    const dropzone = document.getElementById('resumeDropzone');
    const fileInput = document.getElementById('resumeFileInput');
    const filePill = document.getElementById('dropzoneFilePill');
    const fileNameSpan = document.getElementById('dropzoneFileName');
    const removeFileBtn = document.getElementById('dropzoneFileRemove');

    if (!dropzone || !fileInput) return;

    // Open file dialog on dropzone click
    dropzone.addEventListener('click', (e) => {
      if (e.target.closest('#dropzoneFilePill')) return;
      fileInput.click();
    });

    // Drag-over styling
    ['dragenter', 'dragover'].forEach(eventName => {
      dropzone.addEventListener(eventName, (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropzone.classList.add('dragover');
      });
    });

    ['dragleave', 'drop'].forEach(eventName => {
      dropzone.addEventListener(eventName, (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropzone.classList.remove('dragover');
      });
    });

    // Handle dropped files
    dropzone.addEventListener('drop', (e) => {
      const files = e.dataTransfer.files;
      if (files && files.length > 0) {
        this.handleFileSelected(files[0]);
      }
    });

    // Handle file input change
    fileInput.addEventListener('change', (e) => {
      if (fileInput.files && fileInput.files.length > 0) {
        this.handleFileSelected(fileInput.files[0]);
      }
    });

    // Handle remove file
    if (removeFileBtn) {
      removeFileBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        this.currentFile = null;
        fileInput.value = '';
        if (filePill) filePill.style.display = 'none';
      });
    }
  },

  handleFileSelected: function(file) {
    const ext = file.name.split('.').pop().toLowerCase();
    const allowed = ['pdf', 'docx', 'txt'];
    if (!allowed.includes(ext)) {
      if (window.SkillPulse && window.SkillPulse.toast) {
        SkillPulse.toast('Please upload a PDF, DOCX, or TXT document.', 'error');
      } else {
        alert('Please upload a PDF, DOCX, or TXT document.');
      }
      return;
    }

    if (file.size > 5 * 1024 * 1024) {
      if (window.SkillPulse && window.SkillPulse.toast) {
        SkillPulse.toast('File exceeds 5MB size limit.', 'error');
      }
      return;
    }

    this.currentFile = file;
    const filePill = document.getElementById('dropzoneFilePill');
    const fileNameSpan = document.getElementById('dropzoneFileName');
    if (filePill && fileNameSpan) {
      fileNameSpan.textContent = `${file.name} (${(file.size / 1024).toFixed(1)} KB)`;
      filePill.style.display = 'inline-flex';
    }
    if (window.SkillPulse && window.SkillPulse.toast) {
      SkillPulse.toast(`Attached: ${file.name}`, 'info');
    }
  },

  loadRolesAndSamples: async function() {
    const roleSelect = document.getElementById('targetRoleSelect');
    const samplesContainer = document.getElementById('sampleChipsContainer');

    try {
      const res = await fetch('api/resume-scanner.php');
      const data = await res.json();

      if (data && data.success) {
        // Populate Roles
        if (roleSelect && data.roles) {
          let optionsHtml = `<option value="auto">⚡ Auto-Detect Best Matching Role (AI)</option>`;
          data.roles.forEach(r => {
            optionsHtml += `<option value="${r.id}">${r.title}</option>`;
          });
          roleSelect.innerHTML = optionsHtml;
        }

        // Populate Sample Resumes
        if (samplesContainer && data.samples) {
          samplesContainer.innerHTML = data.samples.map(sample => `
            <button type="button" class="sample-chip-btn" data-sample-id="${sample.id}">
              ${sample.label}
            </button>
          `).join('');

          // Wire sample click
          samplesContainer.querySelectorAll('.sample-chip-btn').forEach(btn => {
            btn.addEventListener('click', () => {
              const sId = btn.dataset.sampleId;
              const sampleObj = data.samples.find(s => s.id === sId);
              if (sampleObj) {
                this.loadSampleResume(sampleObj);
              }
            });
          });
        }
      }
    } catch (e) {
      console.warn('Fallback loading roles from window data');
    }
  },

  loadSampleResume: function(sample) {
    const tabPaste = document.getElementById('tabBtnPaste');
    const pasteArea = document.getElementById('resumePasteText');
    const roleSelect = document.getElementById('targetRoleSelect');

    if (tabPaste) tabPaste.click();
    if (pasteArea) pasteArea.value = sample.text;
    if (roleSelect && sample.roleId) roleSelect.value = sample.roleId;

    if (window.SkillPulse && window.SkillPulse.toast) {
      SkillPulse.toast(`Loaded sample profile: ${sample.label}`, 'success');
    }
  },

  bindScanTrigger: function() {
    const scanBtn = document.getElementById('btnStartScan');
    if (!scanBtn) return;

    scanBtn.addEventListener('click', () => {
      this.executeScan();
    });
  },

  executeScan: async function() {
    const pasteArea = document.getElementById('resumePasteText');
    const roleSelect = document.getElementById('targetRoleSelect');
    const progressBox = document.getElementById('scanProgressBox');
    const resultsBox = document.getElementById('scanResultsBox');
    const scanBtn = document.getElementById('btnStartScan');

    const targetRole = roleSelect ? roleSelect.value : 'auto';
    const textContent = pasteArea ? pasteArea.value.trim() : '';

    // Validate Input
    if (!this.currentFile && (!textContent || textContent.length < 30)) {
      if (window.SkillPulse && window.SkillPulse.toast) {
        SkillPulse.toast('Please upload a resume file or paste resume text to scan.', 'error');
      } else {
        alert('Please upload a resume file or paste resume text.');
      }
      return;
    }

    // Scroll to progress box and show animation
    if (resultsBox) resultsBox.style.display = 'none';
    if (progressBox) progressBox.style.display = 'block';
    progressBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

    if (scanBtn) {
      scanBtn.disabled = true;
      scanBtn.innerHTML = `<span>Scanning...</span>`;
    }

    // Realistic scanning step progression
    const step1 = document.getElementById('scanStep1');
    const step2 = document.getElementById('scanStep2');
    const step3 = document.getElementById('scanStep3');
    const step4 = document.getElementById('scanStep4');

    const setStep = (el, state) => {
      if (!el) return;
      el.className = `scan-step-pill ${state}`;
      if (state === 'done') {
        const icon = el.querySelector('.step-icon');
        if (icon) icon.textContent = '✓';
      }
    };

    setStep(step1, 'active');

    try {
      let fetchPromise;

      if (this.currentFile) {
        const formData = new FormData();
        formData.append('resume', this.currentFile);
        formData.append('targetRole', targetRole);

        fetchPromise = fetch('api/resume-scanner.php', {
          method: 'POST',
          body: formData
        });
      } else {
        fetchPromise = fetch('api/resume-scanner.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ resumeText: textContent, targetRole })
        });
      }

      setTimeout(() => { setStep(step1, 'done'); setStep(step2, 'active'); }, 500);
      setTimeout(() => { setStep(step2, 'done'); setStep(step3, 'active'); }, 1100);
      setTimeout(() => { setStep(step3, 'done'); setStep(step4, 'active'); }, 1700);

      const [res] = await Promise.all([
        fetchPromise,
        new Promise(resolve => setTimeout(resolve, 2000))
      ]);

      const data = await res.json();

      setStep(step4, 'done');

      setTimeout(() => {
        if (progressBox) progressBox.style.display = 'none';
        if (scanBtn) {
          scanBtn.disabled = false;
          scanBtn.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg><span>Scan Resume &amp; Detect Gaps</span>`;
        }

        if (data && data.success) {
          this.renderResults(data);
          if (window.SkillPulse && window.SkillPulse.toast) {
            SkillPulse.toast('✓ Resume analyzed! Gaps mapped & +25 XP awarded.', 'success');
          }
          // Refresh user profile widget XP if present
          if (window.SkillPulse && typeof window.SkillPulse.setupAuthUI === 'function') {
            window.SkillPulse.setupAuthUI();
          }
        } else {
          if (window.SkillPulse && window.SkillPulse.toast) {
            SkillPulse.toast(data.message || 'Scan failed. Please check document content.', 'error');
          }
        }
      }, 500);

    } catch (err) {
      if (progressBox) progressBox.style.display = 'none';
      if (scanBtn) {
        scanBtn.disabled = false;
        scanBtn.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg><span>Scan Resume &amp; Detect Gaps</span>`;
      }
      if (window.SkillPulse && window.SkillPulse.toast) {
        SkillPulse.toast('Network error while processing resume.', 'error');
      }
    }
  },

  renderResults: function(data) {
    const resultsBox = document.getElementById('scanResultsBox');
    if (!resultsBox) return;

    const cand = data.candidate || {};
    const role = data.targetRole || {};
    const matched = role.matchedSkills || [];
    const missing = role.missingSkills || [];
    const bonus = data.bonusSkills || [];
    const courses = data.bridgingCourses || [];
    const tips = data.atsOptimizationTips || [];
    const leaderboard = data.allRolesLeaderboard || [];

    const score = role.score || 0;
    let scoreColor = '#F2C14E';
    let statusBadge = 'Moderate Match (Bridging Recommended)';
    let statusClass = 'badge-warning';

    if (score >= 80) {
      scoreColor = '#5DCAA5';
      statusBadge = 'Direct Interview Ready (80%+ Benchmark)';
      statusClass = 'badge-success';
    } else if (score < 50) {
      scoreColor = '#FCA5A5';
      statusBadge = 'Foundational Match (High Priority Gaps)';
      statusClass = 'badge-danger';
    }

    resultsBox.innerHTML = `
      <!-- Top Summary Banner -->
      <div class="scan-summary-banner">
        <div style="display:flex;align-items:center;gap:1.5rem;flex-wrap:wrap;">
          <div class="scan-score-gauge" style="border-color:${scoreColor};color:${scoreColor};">
            ${score}%
          </div>
          <div>
            <div style="font-size:0.75rem;color:#E7C3C0;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:2px;">
              Analyzed Candidate: <strong>${cand.name || 'Candidate'}</strong> (${cand.filename})
            </div>
            <h2 style="font-size:1.4rem;font-weight:800;color:#FDF3F0;margin:0 0 4px 0;">
              Target Track: ${role.title}
            </h2>
            <div style="display:flex;align-items:center;gap:0.6rem;flex-wrap:wrap;">
              <span class="badge ${statusClass}">${statusBadge}</span>
              <span style="font-size:0.78rem;color:#E7C3C0;">Salary: ${role.salaryRange}</span>
              <span style="font-size:0.78rem;color:#F2C14E;font-weight:700;">+25 XP Added to Profile</span>
            </div>
          </div>
        </div>

        <div style="display:flex;gap:0.75rem;">
          <a href="#bridgingSection" class="btn btn-sm" style="background:#F2C14E;color:#2E0D0E;font-weight:700;border:none;">
            View Bridging Courses &darr;
          </a>
          <button type="button" class="btn btn-secondary btn-sm" onclick="window.print()" style="color:#FAF6EE;border-color:rgba(255,255,255,0.25);">
            Save / Print
          </button>
        </div>
      </div>

      <!-- Skill Matrix (Matched vs Gaps vs Bonus) -->
      <div class="skill-matrix-grid">
        <!-- Col 1: Matched Skills -->
        <div class="skill-matrix-col">
          <div class="matrix-col-header">
            <span class="matrix-col-title" style="color:#166534;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <span>Matched Skills (${matched.length})</span>
            </span>
            <span class="badge badge-success">${role.matchedCount || matched.length} / ${role.totalCount} Req</span>
          </div>
          <p style="font-size:0.78rem;color:var(--navy-500);margin-bottom:0.75rem;">
            Skills verified in your resume that directly meet requirements for ${role.title}:
          </p>
          <div style="display:flex;flex-wrap:wrap;gap:4px;">
            ${matched.length > 0 ? matched.map(m => `
              <span class="skill-pill-tag skill-pill-matched">
                ✓ ${m.name} <span style="font-size:0.68rem;opacity:0.75;">(+${m.weight}pts)</span>
              </span>
            `).join('') : '<div style="color:var(--navy-500);font-size:0.8rem;padding:0.5rem 0;">No direct skill matches detected.</div>'}
          </div>
        </div>

        <!-- Col 2: Missing Skill Gaps -->
        <div class="skill-matrix-col">
          <div class="matrix-col-header">
            <span class="matrix-col-title" style="color:#991B1B;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
              <span>Priority Skill Gaps (${missing.length})</span>
            </span>
            <span class="badge badge-danger">Action Required</span>
          </div>
          <p style="font-size:0.78rem;color:var(--navy-500);margin-bottom:0.75rem;">
            Identified competencies required by employers currently missing from your resume:
          </p>
          <div style="display:flex;flex-wrap:wrap;gap:4px;">
            ${missing.length > 0 ? missing.map(g => `
              <span class="skill-pill-tag ${g.priority === 'High' ? 'skill-pill-missing-high' : 'skill-pill-missing-med'}">
                ⚠️ ${g.name} <span style="font-size:0.68rem;font-weight:800;">[${g.priority}]</span>
              </span>
            `).join('') : '<div style="color:#166534;font-size:0.8rem;font-weight:700;">Zero missing gaps! Full 100% curriculum alignment achieved.</div>'}
          </div>
        </div>

        <!-- Col 3: Bonus / Adjacent Skills -->
        <div class="skill-matrix-col">
          <div class="matrix-col-header">
            <span class="matrix-col-title" style="color:#2E0D0E;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#C9A227" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <span>Adjacent &amp; Extra Skills (${bonus.length})</span>
            </span>
            <span class="badge badge-navy">Competitive Edge</span>
          </div>
          <p style="font-size:0.78rem;color:var(--navy-500);margin-bottom:0.75rem;">
            Additional skills in your resume that give you a multidisciplinary advantage:
          </p>
          <div style="display:flex;flex-wrap:wrap;gap:4px;">
            ${bonus.length > 0 ? bonus.map(b => `
              <span class="skill-pill-tag skill-pill-bonus">
                ★ ${b}
              </span>
            `).join('') : '<div style="color:var(--navy-500);font-size:0.8rem;padding:0.5rem 0;">No additional skills detected.</div>'}
          </div>
        </div>
      </div>

      <!-- Bridging Section -->
      <div id="bridgingSection" class="card" style="padding:1.75rem;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;flex-wrap:wrap;gap:0.5rem;">
          <div>
            <div style="display:flex;align-items:center;gap:0.4rem;font-size:0.75rem;font-weight:800;color:var(--primary-600);text-transform:uppercase;">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
              <span>Targeted Learning Bridge</span>
            </div>
            <h3 style="font-size:1.2rem;font-weight:800;color:var(--navy-900);margin-top:2px;">
              Curated Bridging Courses to Close Your Gaps
            </h3>
          </div>
          <span style="font-size:0.8rem;color:var(--navy-500);">Complete these modules to reach 85%+ readiness score</span>
        </div>

        <div style="display:flex;flex-direction:column;gap:0.5rem;">
          ${courses.map(c => `
            <div class="bridge-course-item">
              <div style="flex:1;min-width:260px;">
                <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:3px;">
                  <span class="badge badge-navy">${c.category}</span>
                  <span class="bridge-boost-tag">${c.boost || '+20% Readiness'}</span>
                  <span style="font-size:0.72rem;color:var(--navy-500);">⏱ ${c.duration}</span>
                </div>
                <div style="font-weight:700;font-size:0.95rem;color:var(--navy-900);">${c.title}</div>
                <div style="font-size:0.75rem;color:var(--navy-600);margin-top:2px;">
                  Closes Gap: <strong style="color:#991B1B;">${c.closingSkill || 'Core Gap'}</strong>
                </div>
              </div>

              <div style="display:flex;align-items:center;gap:0.75rem;">
                <a href="courses.php" class="btn btn-primary btn-sm" style="padding:0.45rem 0.9rem;font-size:0.8rem;">
                  Start Bridging &rarr;
                </a>
              </div>
            </div>
          `).join('')}
        </div>
      </div>

      <!-- Actionable ATS & Resume Polish Tips -->
      <div class="card" style="padding:1.75rem;">
        <h3 style="font-size:1.15rem;font-weight:800;color:var(--navy-900);margin-bottom:1rem;display:flex;align-items:center;gap:0.5rem;">
          <span>ATS Recruiter Polish Recommendations</span>
        </h3>
        <div style="display:flex;flex-direction:column;gap:0.6rem;">
          ${tips.map(t => `
            <div class="ats-tip-card">
              <div style="font-weight:700;color:var(--navy-900);margin-bottom:2px;">
                ${t.title}
              </div>
              <div style="font-size:0.82rem;color:var(--navy-600);">
                ${t.desc}
              </div>
            </div>
          `).join('')}
        </div>
      </div>

      <!-- Multi-Role Career Leaderboard -->
      <div class="card" style="padding:1.75rem;">
        <h3 style="font-size:1.15rem;font-weight:800;color:var(--navy-900);margin-bottom:0.5rem;">
          Multi-Track Readiness Comparison
        </h3>
        <p style="font-size:0.8rem;color:var(--navy-500);margin-bottom:1rem;">
          See how your parsed competencies rank across other high-demand careers in Maharashtra:
        </p>

        <div style="overflow-x:auto;">
          <table style="width:100%;border-collapse:collapse;font-size:0.85rem;">
            <thead>
              <tr style="background:#FAF6EE;border-bottom:2px solid var(--border);text-align:left;">
                <th style="padding:0.65rem 0.75rem;color:var(--navy-700);">Career Track</th>
                <th style="padding:0.65rem 0.75rem;color:var(--navy-700);">Readiness Match</th>
                <th style="padding:0.65rem 0.75rem;color:var(--navy-700);">Verified Competencies</th>
                <th style="padding:0.65rem 0.75rem;color:var(--navy-700);">Missing Gaps</th>
                <th style="padding:0.65rem 0.75rem;color:var(--navy-700);">Action</th>
              </tr>
            </thead>
            <tbody>
              ${leaderboard.map(lb => `
                <tr style="border-bottom:1px solid var(--border);background:${lb.id === role.id ? 'rgba(201,162,39,0.08)' : 'transparent'};">
                  <td style="padding:0.75rem;font-weight:700;color:var(--navy-900);">
                    ${lb.title} ${lb.id === role.id ? '<span class="badge badge-primary" style="font-size:9px;margin-left:4px;">Current</span>' : ''}
                  </td>
                  <td style="padding:0.75rem;">
                    <div style="display:flex;align-items:center;gap:0.5rem;">
                      <strong style="color:${lb.score >= 80 ? '#2C6E3D' : (lb.score >= 50 ? '#C9A227' : '#9B2226')};">${lb.score}%</strong>
                      <div style="width:60px;height:5px;background:#E4D9BF;border-radius:99px;overflow:hidden;">
                        <div style="width:${lb.score}%;height:100%;background:${lb.score >= 80 ? '#2C6E3D' : '#C9A227'};"></div>
                      </div>
                    </div>
                  </td>
                  <td style="padding:0.75rem;color:#166534;font-weight:600;">
                    ${lb.matchedCount} / ${lb.totalCount}
                  </td>
                  <td style="padding:0.75rem;color:#991B1B;font-weight:600;">
                    ${lb.missingCount} Gaps
                  </td>
                  <td style="padding:0.75rem;">
                    <button type="button" class="btn btn-secondary btn-sm" style="font-size:0.72rem;padding:0.25rem 0.5rem;" onclick="window.ResumeScannerApp.switchTargetRole('${lb.id}')">
                      Analyze Track
                    </button>
                  </td>
                </tr>
              `).join('')}
            </tbody>
          </table>
        </div>
      </div>
    `;

    resultsBox.style.display = 'flex';
    resultsBox.scrollIntoView({ behavior: 'smooth', block: 'start' });
  },

  switchTargetRole: function(roleId) {
    const roleSelect = document.getElementById('targetRoleSelect');
    if (roleSelect) {
      roleSelect.value = roleId;
    }
    this.executeScan();
  }
};

document.addEventListener('DOMContentLoaded', () => {
  if (document.getElementById('resumeDropzone') || document.getElementById('resumePasteText')) {
    window.ResumeScannerApp.init();
  }
});
