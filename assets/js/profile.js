const mobileMenu = document.getElementById("mobileMenu");
const sidebar = document.getElementById("sidebar");
const profileForm = document.getElementById("profileForm");
const formMessage = document.getElementById("formMessage");

if (mobileMenu) {
    mobileMenu.addEventListener("click", function () {
        sidebar.classList.toggle("open");
    });
}

if (profileForm) {
    profileForm.addEventListener("submit", function (e) {
        e.preventDefault();
        formMessage.textContent = "Tampilan profile siap. Fitur simpan belum diaktifkan.";
    });
}