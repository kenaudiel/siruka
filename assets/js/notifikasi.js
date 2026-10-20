const sidebar = document.getElementById("sidebar");
const mobileMenu = document.getElementById("mobileMenu");
const notifications = [...document.querySelectorAll(".notification")];
const filterTabs = [...document.querySelectorAll(".filter-tab")];
const searchInput = document.getElementById("searchInput");
const emptyState = document.getElementById("emptyState");

mobileMenu?.addEventListener("click", () => sidebar?.classList.toggle("open"));

function refreshNotifications() {
    const activeFilter = document.querySelector(".filter-tab.selected")?.dataset.filter || "all";
    const query = (searchInput?.value || "").trim().toLowerCase();
    let visible = 0;

    notifications.forEach((item) => {
        const isUnread = item.classList.contains("unread");
        const matchesFilter = activeFilter === "all" || isUnread;
        const text = (item.dataset.search || item.innerText).toLowerCase();
        const matchesSearch = !query || text.includes(query);
        const show = matchesFilter && matchesSearch;
        item.hidden = !show;
        if (show) visible++;
    });

    emptyState.hidden = visible > 0;
    document.getElementById("allCount").textContent = notifications.length;
    document.getElementById("unreadCount").textContent =
        notifications.filter(item => item.classList.contains("unread")).length;
}

filterTabs.forEach((tab) => {
    tab.addEventListener("click", () => {
        filterTabs.forEach(item => item.classList.toggle("selected", item === tab));
        refreshNotifications();
    });
});

document.getElementById("markAllRead")?.addEventListener("click", () => {
    notifications.forEach(item => {
        item.classList.remove("unread");
        item.querySelector(".unread-dot")?.remove();
    });
    refreshNotifications();
});

document.querySelectorAll(".more-button").forEach((button) => {
    button.addEventListener("click", () => {
        const item = button.closest(".notification");
        item?.classList.remove("unread");
        item?.querySelector(".unread-dot")?.remove();
        refreshNotifications();
    });
});

searchInput?.addEventListener("input", refreshNotifications);
refreshNotifications();
