const mobileMenu = document.querySelector("#mobileMenu");
const sidebar = document.querySelector("#sidebar");
const reservationForm = document.querySelector("#reservationForm");
const formMessage = document.querySelector("#formMessage");

mobileMenu?.addEventListener("click", () => {
    sidebar?.classList.toggle("open");
});

reservationForm?.addEventListener("submit", (event) => {
    event.preventDefault();

    formMessage.textContent =
        "Tampilan formulir siap. Fitur pengajuan belum diaktifkan.";
});
