/**
 * SkillPulse Live Chat Integration (Tawk.to)
 * Compliant with government privacy guidelines and DPDP Act 2023.
 * Automatically synchronizes authenticated user profile data into live chat.
 * Prevents UI overlap between Tawk.to and PulseAI assistant.
 */
(function initSkillPulseLiveChat() {
  // Fetch public configuration from backend
  fetch('api/config.php')
    .then(res => res.json())
    .then(config => {
      if (!config || !config.tawkto || !config.tawkto.enabled) {
        // Tawk.to not yet configured with active property ID - silent exit without errors
        return;
      }

      const propId = config.tawkto.propertyId;
      const widgetId = config.tawkto.widgetId || 'default';

      // Adjust PulseAI floating button to prevent overlap with Tawk.to widget
      const style = document.createElement('style');
      style.textContent = `
        .pulseai-floating-btn {
          bottom: 96px !important;
          right: 24px !important;
          transition: bottom 0.25s ease, right 0.25s ease;
        }
        @media (max-width: 600px) {
          .pulseai-floating-btn {
            bottom: 84px !important;
            right: 16px !important;
          }
        }
      `;
      document.head.appendChild(style);

      // Initialize Tawk.to Embed API
      window.Tawk_API = window.Tawk_API || {};
      window.Tawk_LoadStart = new Date();

      window.Tawk_API.onLoad = function() {
        try {
          const rawUser = localStorage.getItem('skillpulse_user');
          if (rawUser) {
            const user = JSON.parse(rawUser);
            if (user && user.email) {
              window.Tawk_API.setAttributes({
                name: user.name || 'Candidate',
                email: user.email,
                role: user.role || 'student',
                institution: user.institution || 'Maharashtra Technical University'
              }, function(error) {
                if (error) console.debug('[SkillPulse LiveChat] setAttributes warning:', error);
              });
            }
          }
        } catch (e) {
          console.debug('[SkillPulse LiveChat] User sync exception:', e);
        }
      };

      const s1 = document.createElement('script');
      const s0 = document.getElementsByTagName('script')[0];
      s1.async = true;
      s1.src = `https://embed.tawk.to/${encodeURIComponent(propId)}/${encodeURIComponent(widgetId)}`;
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      if (s0 && s0.parentNode) {
        s0.parentNode.insertBefore(s1, s0);
      } else {
        document.head.appendChild(s1);
      }
    })
    .catch(err => {
      console.debug('[SkillPulse LiveChat] Configuration fetch bypassed:', err.message);
    });
})();
