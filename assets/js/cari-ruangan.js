const sidebar = document.getElementById("sidebar");
const mobileMenu = document.getElementById("mobileMenu");
const detailModal = document.getElementById("detailModal");
const modalRoomName = document.getElementById("modalRoomName");

mobileMenu?.addEventListener("click", () => sidebar?.classList.toggle("open"));

document.querySelectorAll(".detail-button").forEach((button) => {
    button.addEventListener("click", () => {
        modalRoomName.textContent = button.dataset.room || "Ruangan";
        detailModal.hidden = false;
    });
});

function hideModal() {
    detailModal.hidden = true;
}

document.getElementById("closeModal")?.addEventListener("click", hideModal);
document.getElementById("modalOk")?.addEventListener("click", hideModal);
detailModal?.addEventListener("click", (event) => {
    if (event.target === detailModal) hideModal();
});
