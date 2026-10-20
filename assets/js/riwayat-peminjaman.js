const sidebar = document.getElementById("sidebar");
const mobileMenu = document.getElementById("mobileMenu");
const searchInput = document.getElementById("searchInput");
const statusFilter = document.getElementById("statusFilter");
const rows = [...document.querySelectorAll("#historyTable tr")];
const emptyState = document.getElementById("emptyState");
const resultCount = document.getElementById("resultCount");
const detailModal = document.getElementById("detailModal");
const detailContent = document.getElementById("detailContent");

mobileMenu?.addEventListener("click", () => sidebar?.classList.toggle("open"));

function filterRows() {
    const query = (searchInput?.value || "").trim().toLowerCase();
    const status = statusFilter?.value || "all";
    let count = 0;

    rows.forEach((row) => {
        const matchesSearch = (row.dataset.search || row.innerText).toLowerCase().includes(query);
        const matchesStatus = status === "all" || row.dataset.status === status;
        const visible = matchesSearch && matchesStatus;
        row.hidden = !visible;
        if (visible) count++;
    });

    emptyState.hidden = count > 0;
    resultCount.textContent = `Menampilkan ${count} dari ${rows.length} data contoh`;
}
searchInput?.addEventListener("input", filterRows);
statusFilter?.addEventListener("change", filterRows);

const historyData = {
    "SRK-012": ["Seminar Teknologi", "Seminar Umum", "OCR 1", "24 September 2026", "09.00–12.00", "Disetujui"],
    "SRK-011": ["Rapat Organisasi", "Organisasi / UKM", "OCR 6", "25 September 2026", "13.00–15.00", "Menunggu"],
    "SRK-010": ["Diskusi Kelompok", "Akademik", "OCR 4", "18 September 2026", "10.00–12.00", "Selesai"],
    "SRK-009": ["Latihan Lomba", "Lomba", "OCR 2", "16 September 2026", "15.00–17.00", "Ditolak"],
    "SRK-008": ["Kuliah Tamu", "Akademik", "OCR 7", "12 September 2026", "08.00–11.00", "Disetujui"]
};
const detailLabels = ["ID Pengajuan", "Nama Kegiatan", "Kategori", "Ruangan", "Tanggal", "Waktu", "Status"];

document.querySelectorAll(".view-button").forEach((button) => {
    button.addEventListener("click", () => {
        const id = button.dataset.id;
        const row = button.closest("tr");
        const cells = row.querySelectorAll("td");
        const values = [id, cells[1].querySelector("strong").textContent, cells[1].querySelector("small").textContent, cells[2].textContent, cells[3].textContent, cells[4].textContent, cells[5].textContent.trim()];
        detailContent.replaceChildren();
        detailLabels.forEach((label, index) => {
            const key = document.createElement("div");
            key.className = "detail-label";
            key.textContent = label;
            const value = document.createElement("div");
            value.className = "detail-value";
            value.textContent = values[index] || "-";
            detailContent.append(key, value);
        });
        detailModal.hidden = false;
    });
});

function closeModal() { detailModal.hidden = true; }
document.getElementById("closeModal")?.addEventListener("click", closeModal);
document.getElementById("modalOk")?.addEventListener("click", closeModal);
detailModal?.addEventListener("click", (event) => {
    if (event.target === detailModal) closeModal();
});
filterRows();
