const sidebar = document.getElementById("sidebar");
const mobileMenu = document.getElementById("mobileMenu");
const passwordForm = document.getElementById("passwordForm");
const formMessage = document.getElementById("formMessage");

mobileMenu?.addEventListener("click", () => {
    sidebar?.classList.toggle("open");
});

document.getElementById("manageAccount")?.addEventListener("click", () => {
    formMessage.textContent = "Pengaturan akun akan tersedia setelah fitur akun diaktifkan.";
});

document.getElementById("signOut")?.addEventListener("click", () => {
    formMessage.textContent = "Fitur Sign Out belum diaktifkan.";
});

passwordForm?.addEventListener("submit", (event) => {
    event.preventDefault();
    const password = document.getElementById("newPassword").value;
    const confirm = document.getElementById("confirmPassword").value;

    if (!password || !confirm) {
        formMessage.textContent = "Isi kedua kolom password terlebih dahulu.";
        return;
    }
    if (password !== confirm) {
        formMessage.textContent = "Password dan konfirmasi password belum sama.";
        return;
    }
    formMessage.textContent = "Tampilan validasi berhasil. Penyimpanan password belum diaktifkan.";
});
passwordForm?.addEventListener("reset", () => {
    formMessage.textContent = "";
});
