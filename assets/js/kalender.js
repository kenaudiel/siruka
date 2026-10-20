const sidebar = document.getElementById("sidebar");
const mobileMenu = document.getElementById("mobileMenu");
const modal = document.getElementById("modal");
const closeButton = document.getElementById("close");

mobileMenu?.addEventListener("click", () => {
    const isOpen = sidebar?.classList.toggle("open") ?? false;
    mobileMenu.setAttribute("aria-expanded", String(isOpen));
});

function closeModal() {
    if (modal) {
        modal.hidden = true;
    }
}

document.querySelectorAll(".day.event").forEach((day) => {
    day.addEventListener("click", () => {
        const date = document.getElementById("date");
        const room = document.getElementById("room");
        const kind = document.getElementById("kind");

        if (!modal || !date || !room || !kind) {
            return;
        }

        date.textContent = day.dataset.date ?? "";
        room.textContent = day.dataset.room ?? "";
        kind.textContent = day.dataset.kind ?? "";
        modal.hidden = false;
        closeButton?.focus();
    });
});

closeButton?.addEventListener("click", closeModal);
modal?.addEventListener("click", (event) => {
    if (event.target === modal) {
        closeModal();
    }
});

document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && modal && !modal.hidden) {
        closeModal();
    }
});
