document.addEventListener("DOMContentLoaded", () => {
    const search = document.getElementById("requestSearch");
    const filter = document.getElementById("statusFilter");
    const table = document.getElementById("requestsTable");
    const emptyState = document.getElementById("emptyState");
    const toast = document.getElementById("toast");
    const decisionDialog = document.getElementById("decisionDialog");
    const decisionTitle = document.getElementById("decisionTitle");
    const decisionMessage = document.getElementById("decisionMessage");
    const decisionIcon = document.getElementById("decisionIcon");
    const confirmDecision = document.getElementById("confirmDecision");
    const cancelDecision = document.getElementById("cancelDecision");
    let selectedButton = null;

    function showToast(message) {
        if (!toast) return;
        toast.textContent = message;
        toast.classList.add("show");
        window.setTimeout(() => toast.classList.remove("show"), 2800);
    }

    function filterRows() {
        if (!table) return;
        const term = (search?.value || "").trim().toLowerCase();
        const status = filter?.value || "";
        let visible = 0;
        table.querySelectorAll("tbody tr").forEach(row => {
            const matchesText = row.textContent.toLowerCase().includes(term);
            const matchesStatus = !status || row.dataset.status === status;
            row.hidden = !(matchesText && matchesStatus);
            if (!row.hidden) visible++;
        });
        if (emptyState) emptyState.hidden = visible !== 0;
    }

    search?.addEventListener("input", filterRows);
    filter?.addEventListener("change", filterRows);

    document.querySelectorAll("[data-decision]").forEach(button => {
        button.addEventListener("click", () => {
            const decision = button.dataset.decision;
            const id = button.dataset.id;
            if (!decisionDialog || !decisionTitle || !decisionMessage || !confirmDecision || !id || !decision) return;

            selectedButton = button;
            decisionTitle.textContent = `Konfirmasi ${decision}`;
            decisionMessage.textContent = `Apakah Anda yakin ingin ${decision.toLowerCase()} pengajuan ${id}?`;
            confirmDecision.textContent = decision;
            confirmDecision.className = `btn ${decision === "Ditolak" ? "btn-danger" : "btn-success"}`;
            decisionIcon?.classList.toggle("is-danger", decision === "Ditolak");
            decisionDialog.showModal();
        });
    });

    cancelDecision?.addEventListener("click", () => decisionDialog?.close());
    decisionDialog?.addEventListener("click", event => {
        if (event.target === decisionDialog) decisionDialog.close();
    });
    confirmDecision?.addEventListener("click", () => {
        const button = selectedButton;
        const decision = button?.dataset.decision;
        const id = button?.dataset.id;
        const row = button?.closest("tr");
        const actionCell = button?.closest("td");
        if (!row || !actionCell || !decision || !id) return;

        // Demo frontend: perubahan belum tersimpan ke server/database.
        row.dataset.status = decision;
        const statusCell = row.querySelector(".status");
        if (statusCell) {
            statusCell.className = `status status-${decision.toLowerCase()}`;
            statusCell.textContent = decision;
        }
        actionCell.innerHTML = '<span class="muted">Selesai</span>';
        selectedButton = null;
        decisionDialog?.close();
        showToast(`Pengajuan ${id} ditandai ${decision.toLowerCase()} (demo).`);
        filterRows();
    });

    document.querySelectorAll("[data-inactive]").forEach(link => {
        link.addEventListener("click", event => {
            event.preventDefault();
            showToast("Menu ini tidak dibuat sesuai permintaan.");
        });
    });
});
