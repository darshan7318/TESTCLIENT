/* Trendz Eventz — shared footer loader */
(function () {
  "use strict";

  function getFooterUrl() {
    // The footer is a root-level shared partial. Resolve it from the
    // deployed origin so /about, /services, etc. cannot change the path.
    return new URL("/footer.html", window.location.origin).href;
  }

  function showFooterError(host, error) {
    console.error("[Trendz Footer]", error);
    host.innerHTML =
      '<div style="padding:32px 20px;text-align:center;background:#120f18;color:#94a3b8;font:12px/1.6 Inter,Arial,sans-serif">Trendz Eventz footer could not be loaded.</div>';
  }

  function initFooter() {
    var host = document.querySelector("[data-trendz-footer]");
    if (!host || host.dataset.loaded === "true") return;

    var footerUrl = getFooterUrl();

    fetch(footerUrl, {
      method: "GET",
      cache: "no-store",
      credentials: "same-origin",
      headers: { "Accept": "text/html" }
    })
      .then(function (response) {
        if (!response.ok) {
          throw new Error("Footer request failed: " + response.status + " (" + footerUrl + ")");
        }
        return response.text();
      })
      .then(function (html) {
        if (!html.trim()) {
          throw new Error("Footer response was empty (" + footerUrl + ")");
        }

        // Guard against a Netlify fallback page being returned instead
        // of the actual shared footer partial.
        if (html.indexOf('id="trendz-shared-footer"') === -1) {
          throw new Error("Footer response did not contain #trendz-shared-footer (" + footerUrl + ")");
        }

        host.innerHTML = html;
        host.dataset.loaded = "true";

        host.querySelectorAll("[data-current-year]").forEach(function (el) {
          el.textContent = new Date().getFullYear();
        });

        if (window.lucide && typeof window.lucide.createIcons === "function") {
          window.lucide.createIcons({ attrs: { "stroke-width": 1.7 } });
        }
      })
      .catch(function (error) {
        showFooterError(host, error);
      });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initFooter, { once: true });
  } else {
    initFooter();
  }
}());
