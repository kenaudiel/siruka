const mobileMenu = document.querySelector("#mobileMenu");
const sidebar = document.querySelector("#sidebar");
const reservationForm = document.querySelector("#reservationForm");
const formMessage = document.querySelector("#formMessage");

mobileMenu?.addEventListener("click", () => {
    sidebar?.classList.toggle("open");
});
