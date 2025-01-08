const userOptionBtn = document.querySelector("[data-user-option-btn]");
const userOptionList = document.querySelector("[data-user-option-list]");

userOptionBtn?.addEventListener("click", () => {
    userOptionList.classList.toggle("hidden")
});
