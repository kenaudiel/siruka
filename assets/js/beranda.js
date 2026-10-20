const sidebar = document.getElementById("sidebar");
const mobileMenu = document.getElementById("mobileMenu");
const search = document.getElementById("globalSearch");

mobileMenu?.addEventListener("click", () => sidebar?.classList.toggle("open"));

search?.addEventListener("keydown", (event) => {
    if (event.key === "Enter" && search.value.trim()) {
        const term = search.value.trim();
        window.location.href = "riwayat-peminjaman.php";
        // Search is a visual convenience for now; database-wide search will be added later.
    }
});

document.getElementById("logoutLink")?.addEventListener("click", (event) => {
    event.preventDefault();
    alert("Fitur Log Out akan diaktifkan setelah sistem akun dibuat.");
});
