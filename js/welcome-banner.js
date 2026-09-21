/**
 * SkillPulse WelcomeBackBanner Component
 * 
 * Supports:
 * 1. Custom Web Component: <welcome-back-banner name="Aditya" target-role="Data Analyst" readiness="78"></welcome-back-banner>
 * 2. Vanilla JS helper: window.renderWelcomeBackBanner(container, { name, targetRole, readiness })
 * 3. Reactive properties: bannerElement.readiness = 85 (updates inline text, ring center, and SVG arc in sync)
 */

(function () {
  const CIRCUMFERENCE = 169.646; // 2 * Math.PI * 27

  class WelcomeBackBannerElement extends HTMLElement {
    static get observedAttributes() {
      return ['name', 'target-role', 'readiness', 'practice-url', 'retest-url'];
    }

    constructor() {
      super();
      this._name = 'Aditya';
      this._targetRole = 'Data Analyst';
      this._readiness = 78;
      this._practiceUrl = 'practice.php';
      this._retestUrl = 'skill-gap-analyzer.php';
      this._rendered = false;
    }

    get name() {
      return this._name;
    }
    set name(val) {
      this._name = val || 'Aditya';
      this.setAttribute('name', this._name);
      this._updateName();
    }

    get targetRole() {
      return this._targetRole;
    }
    set targetRole(val) {
      this._targetRole = val || 'Data Analyst';
      this.setAttribute('target-role', this._targetRole);
      this._updateTargetRole();
    }

    get readiness() {
      return this._readiness;
    }
    set readiness(val) {
      const num = Math.min(100, Math.max(0, Number(val) || 0));
      this._readiness = num;
      this.setAttribute('readiness', num);
      this._updateReadiness();
    }

    get practiceUrl() {
      return this._practiceUrl;
    }
    set practiceUrl(val) {
      this._practiceUrl = val || 'practice.php';
      this.setAttribute('practice-url', this._practiceUrl);
      if (this._practiceBtn) this._practiceBtn.href = this._practiceUrl;
    }

    get retestUrl() {
      return this._retestUrl;
    }
    set retestUrl(val) {
      this._retestUrl = val || 'skill-gap-analyzer.php';
      this.setAttribute('retest-url', this._retestUrl);
      if (this._retestBtn) this._retestBtn.href = this._retestUrl;
    }

    connectedCallback() {
      let attrName = this.getAttribute('name');
      let resolvedName = attrName;

      // Automatically sync with authenticated user session if present
      try {
        const rawUser = localStorage.getItem('skillpulse_user');
        if (rawUser) {
          const u = JSON.parse(rawUser);
          if (u && u.name) {
            // If name wasn't explicitly set or was the default placeholder 'Aditya', use actual user's name
            if (!attrName || attrName === 'Aditya') {
              resolvedName = u.name;
              this.setAttribute('name', resolvedName);
            }
          }
        }
      } catch (e) {}

      this._name = resolvedName || this._name;
      this._targetRole = this.getAttribute('target-role') || this._targetRole;
      const r = this.getAttribute('readiness');
      if (r !== null) this._readiness = Math.min(100, Math.max(0, Number(r) || 0));
      this._practiceUrl = this.getAttribute('practice-url') || this._practiceUrl;
      this._retestUrl = this.getAttribute('retest-url') || this._retestUrl;

      this.render();
      this._rendered = true;
    }

    attributeChangedCallback(name, oldVal, newVal) {
      if (oldVal === newVal || !this._rendered) return;
      if (name === 'name') {
        this._name = newVal || 'User';
        this._updateName();
      } else if (name === 'target-role') {
        this._targetRole = newVal || 'Data Analyst';
        this._updateTargetRole();
      } else if (name === 'readiness') {
        this._readiness = Math.min(100, Math.max(0, Number(newVal) || 0));
        this._updateReadiness();
      } else if (name === 'practice-url') {
        this._practiceUrl = newVal || 'practice.php';
        if (this._practiceBtn) this._practiceBtn.href = this._practiceUrl;
      } else if (name === 'retest-url') {
        this._retestUrl = newVal || 'skill-gap-analyzer.php';
        if (this._retestBtn) this._retestBtn.href = this._retestUrl;
      }
    }

    _updateName() {
      if (this._headingEl) {
        this._headingEl.textContent = `Welcome back, ${this._name}`;
      }
    }

    _updateTargetRole() {
      if (this._roleEl) {
        this._roleEl.textContent = this._targetRole;
      }
    }

    _updateReadiness() {
      const offset = (CIRCUMFERENCE * (1 - this._readiness / 100)).toFixed(1);

      // 1. Update inline text
      if (this._readinessInlineEl) {
        this._readinessInlineEl.textContent = `${this._readiness}%`;
      }

      // 2. Update ring center label
      if (this._ringTextEl) {
        this._ringTextEl.textContent = `${this._readiness}%`;
      }

      // 3. Update SVG progress arc stroke-dashoffset
      if (this._progressArcEl) {
        this._progressArcEl.setAttribute('stroke-dashoffset', offset);
        this._progressArcEl.style.strokeDashoffset = offset;
      }

      // 4. Update aria-valuenow on svg
      if (this._svgEl) {
        this._svgEl.setAttribute('aria-valuenow', this._readiness);
        this._svgEl.setAttribute('aria-label', `Readiness score: ${this._readiness}%`);
      }
    }

    render() {
      const offset = (CIRCUMFERENCE * (1 - this._readiness / 100)).toFixed(1);

      this.innerHTML = `
        <div class="welcome-back-banner-card" style="
          background-color: #4a1116;
          border-radius: 12px;
          padding: 22px 24px;
          display: flex;
          flex-wrap: wrap;
          align-items: center;
          justify-content: space-between;
          gap: 20px;
          box-sizing: border-box;
          width: 100%;
          box-shadow: 0 4px 20px rgba(0,0,0,0.25);
        ">
          <!-- LEFT SIDE: Text Content -->
          <div style="
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 1 1 300px;
            min-width: 240px;
          ">
            <!-- 1. Status row -->
            <div style="display: flex; align-items: center; gap: 8px;">
              <div style="display: flex; align-items: center; gap: 5px;">
                <span style="width: 6px; height: 6px; border-radius: 50%; background-color: #5dcaa5; display: inline-block;" title="Verified"></span>
                <span style="width: 6px; height: 6px; border-radius: 50%; background-color: #85b7eb; display: inline-block;" title="Gov polytechnic"></span>
                <span style="width: 6px; height: 6px; border-radius: 50%; background-color: #f2c14e; display: inline-block;" title="Gold Tier"></span>
              </div>
              <span style="font-size: 12px; color: #e7c3c0; font-weight: 400; line-height: 1;">
                Verified · Gov polytechnic · Gold
              </span>
            </div>

            <!-- 2. Heading -->
            <h2 class="welcome-heading" style="
              margin: 0;
              font-size: 22px;
              font-weight: 500;
              color: #fdf3f0;
              line-height: 1.25;
              letter-spacing: -0.01em;
            ">Welcome back, ${escapeHtml(this._name)}</h2>

            <!-- 3. Subtext -->
            <p style="margin: 0; font-size: 13px; color: #e7c3c0; line-height: 1.4;">
              Target: <span class="welcome-target-role" style="color: #fdf3f0; font-weight: 500;">${escapeHtml(this._targetRole)}</span> — readiness at <strong class="welcome-readiness-val" style="color: #f2c14e; font-weight: 700;">${this._readiness}%</strong>
            </p>

            <!-- 4. Buttons Row -->
            <div style="
              display: flex;
              align-items: center;
              gap: 8px;
              margin-top: 4px;
              flex-wrap: wrap;
            ">
              <a href="${this._practiceUrl}" class="welcome-practice-btn" style="
                background-color: transparent;
                border: 1px solid rgba(255, 255, 255, 0.25);
                color: #ffffff;
                border-radius: 8px;
                padding: 8px 14px;
                font-size: 12px;
                font-weight: 400;
                text-decoration: none;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                transition: background-color 0.2s ease, border-color 0.2s ease;
                line-height: 1.2;
              ">Practice arena</a>

              <a href="${this._retestUrl}" class="welcome-retest-btn" style="
                background-color: #f2c14e;
                border: none;
                color: #4a1116;
                border-radius: 8px;
                padding: 8px 14px;
                font-size: 12px;
                font-weight: 500;
                text-decoration: none;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                transition: background-color 0.2s ease, transform 0.15s ease;
                line-height: 1.2;
              ">Retest alignment</a>
            </div>
          </div>

          <!-- RIGHT SIDE: Circular Readiness Gauge -->
          <div style="
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 6px;
            flex-shrink: 0;
          ">
            <div style="
              position: relative;
              width: 64px;
              height: 64px;
              display: flex;
              align-items: center;
              justify-content: center;
            ">
              <svg class="welcome-ring-svg" width="64" height="64" viewBox="0 0 64 64" style="display: block;" role="progressbar" aria-label="Readiness score: ${this._readiness}%" aria-valuenow="${this._readiness}" aria-valuemin="0" aria-valuemax="100">
                <!-- Background track: full circle, stroke rgba(255,255,255,0.15), stroke-width 6, no fill -->
                <circle cx="32" cy="32" r="27" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="6"></circle>

                <!-- Progress arc: stroke #f2c14e, stroke-width 6, stroke-linecap round, rotated -90deg -->
                <circle class="welcome-progress-arc" cx="32" cy="32" r="27" fill="none" stroke="#f2c14e" stroke-width="6" stroke-linecap="round" stroke-dasharray="${CIRCUMFERENCE.toFixed(1)}" stroke-dashoffset="${offset}" transform="rotate(-90 32 32)" style="transition: stroke-dashoffset 0.5s ease;"></circle>

                <!-- Centered percentage text inside the ring -->
                <text class="welcome-ring-text" x="32" y="32" text-anchor="middle" dominant-baseline="central" font-size="14" font-weight="500" fill="#fdf3f0" style="font-family: system-ui, -apple-system, sans-serif; pointer-events: none;">${this._readiness}%</text>
              </svg>
            </div>

            <!-- Caption below the ring -->
            <span style="
              font-size: 10px;
              color: #e7c3c0;
              font-weight: 400;
              letter-spacing: 0.02em;
              line-height: 1;
            ">Readiness</span>
          </div>
        </div>
      `;

      // Cache elements for synchronized reactive updates
      this._headingEl = this.querySelector('.welcome-heading');
      this._roleEl = this.querySelector('.welcome-target-role');
      this._readinessInlineEl = this.querySelector('.welcome-readiness-val');
      this._ringTextEl = this.querySelector('.welcome-ring-text');
      this._progressArcEl = this.querySelector('.welcome-progress-arc');
      this._svgEl = this.querySelector('.welcome-ring-svg');
      this._practiceBtn = this.querySelector('.welcome-practice-btn');
      this._retestBtn = this.querySelector('.welcome-retest-btn');

      // Add button hover transitions
      if (this._practiceBtn) {
        this._practiceBtn.addEventListener('mouseenter', () => {
          this._practiceBtn.style.backgroundColor = 'rgba(255, 255, 255, 0.08)';
          this._practiceBtn.style.borderColor = 'rgba(255, 255, 255, 0.4)';
        });
        this._practiceBtn.addEventListener('mouseleave', () => {
          this._practiceBtn.style.backgroundColor = 'transparent';
          this._practiceBtn.style.borderColor = 'rgba(255, 255, 255, 0.25)';
        });
      }

      if (this._retestBtn) {
        this._retestBtn.addEventListener('mouseenter', () => {
          this._retestBtn.style.backgroundColor = '#f7ce68';
        });
        this._retestBtn.addEventListener('mouseleave', () => {
          this._retestBtn.style.backgroundColor = '#f2c14e';
        });
      }
    }
  }

  function escapeHtml(str) {
    if (!str) return '';
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  // Register Web Component if customElements is supported
  if (typeof customElements !== 'undefined' && !customElements.get('welcome-back-banner')) {
    customElements.define('welcome-back-banner', WelcomeBackBannerElement);
  }

  // Expose global factory for programmatic rendering
  window.renderWelcomeBackBanner = function (container, options = {}) {
    const el = document.createElement('welcome-back-banner');
    if (options.name) el.setAttribute('name', options.name);
    if (options.targetRole) el.setAttribute('target-role', options.targetRole);
    if (options.readiness !== undefined) el.setAttribute('readiness', options.readiness);
    if (options.practiceUrl) el.setAttribute('practice-url', options.practiceUrl);
    if (options.retestUrl) el.setAttribute('retest-url', options.retestUrl);

    if (typeof container === 'string') {
      const target = document.querySelector(container);
      if (target) {
        target.innerHTML = '';
        target.appendChild(el);
      }
    } else if (container && container.appendChild) {
      container.innerHTML = '';
      container.appendChild(el);
    }
    return el;
  };
})();
