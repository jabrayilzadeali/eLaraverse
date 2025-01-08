const mobileMenuToggleBtn = document.querySelector(
    "[data-mobile-menu-toggle-btn]"
);
const mobileMenuClosed = document.querySelector(
    "[data-mobile-menu-closed-icon]"
);

const mobileMenuOpen = document.querySelector("[data-mobile-menu-open-icon]");
const mobileMenuLinks = document.querySelector("[data-mobile-menu-links]");

mobileMenuToggleBtn?.addEventListener("click", () => {
    mobileMenuOpen.classList.toggle("hidden");
    mobileMenuClosed.classList.toggle("hidden");
    mobileMenuLinks.classList.toggle("hidden");
});
