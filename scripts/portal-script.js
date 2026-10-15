/* ==========================================
   AI RESUME PORTAL - COMPLETE JAVASCRIPT
   ========================================== */

// Automatically find and load this file from any project page
(function () {
    const path = window.location.pathname;

    const scriptPath = (
        path.includes("/student-pages/") ||
        path.includes("/admin-pages/") ||
        path.includes("/analyzer-pages/")
    )
        ? "../scripts/portal-script.js"
        : "scripts/portal-script.js";

    // If this file is already running, do not load it again
    const currentScript = document.currentScript;
    if (currentScript && currentScript.src) {
        // Continue with the portal features below
    }
})();

document.addEventListener("DOMContentLoaded", function () {

    // 1. Password show/hide
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener("click", function () {
            const show = passwordInput.type === "password";
            passwordInput.type = show ? "text" : "password";
            togglePassword.textContent = show ? "HIDE" : "SHOW";
        });
    }

    // 2. Confirm password validation
    const registerForm = document.getElementById("registerForm");
    const confirmPassword = document.getElementById("confirmPassword");
    const registerPassword = document.getElementById("password");
    const registerMessage = document.getElementById("message");

    if (registerForm && confirmPassword && registerPassword) {
        registerForm.addEventListener("submit", function (event) {
            if (registerPassword.value !== confirmPassword.value) {
                event.preventDefault();

                if (registerMessage) {
                    registerMessage.textContent = "Passwords do not match.";
                    registerMessage.style.color = "#dc2626";
                } else {
                    alert("Passwords do not match.");
                }
            }
        });
    }

    // 3. Mobile navigation
    const menuButton = document.getElementById("menuButton");
    const navigation = document.getElementById("navigation");

    if (menuButton && navigation) {
        menuButton.addEventListener("click", function () {
            const isHidden = navigation.style.display === "none";
            navigation.style.display = isHidden ? "flex" : "none";
            menuButton.setAttribute("aria-expanded", String(isHidden));
        });
    }

    // 4. Current year in footer
    document.querySelectorAll(".current-year").forEach(function (element) {
        element.textContent = new Date().getFullYear();
    });

    // 5. Back button support
    document.querySelectorAll("[data-go-back]").forEach(function (button) {
        button.addEventListener("click", function () {
            window.history.back();
        });
    });

});