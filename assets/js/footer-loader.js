/* Trendz Eventz — shared footer loader */
(function () {
  "use strict";

  var loaderScript = document.currentScript;
  var footerUrl = "/footer.html";

  if (loaderScript && loaderScript.src) {
    try {
      footerUrl = new URL("../../footer.html", loaderScript.src).href;
    } catch (error) {
      footerUrl = "/footer.html";
    }
  }

  function initFooter() {
    var host = document.querySelector("[data-trendz-footer]");
    if (!host || host.dataset.loaded === "true") return;

    fetch(footerUrl, {
      cache: "no-store",
      credentials: "same-origin"
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
        console.error("[Trendz Footer]", error);
        host.innerHTML =
          '<div class="mx-auto max-w-7xl px-5 py-8 text-center text-xs text-slate-500">Trendz Eventz</div>';
      });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initFooter);
  } else {
    initFooter();
  }
}());
