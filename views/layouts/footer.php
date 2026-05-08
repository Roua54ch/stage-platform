</div> <!-- /.content-wrapper -->

<footer class="main-footer text-center">
    <strong>Stage Project © 2026</strong>

    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
    </div>
</footer>

</div> <!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!-- Chart.js 🔥 -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- ================= CUSTOM JS ================= -->
<script>

/* ================= CHART ================= */
const chartEl = document.getElementById('statsChart');

if (chartEl && window.stats) {
    new Chart(chartEl, {
        type: 'bar',
        data: {
            labels: ['Users', 'Offres', 'Candidatures'],
            datasets: [{
                label: 'Stats',
                data: [
                    window.stats.users,
                    window.stats.offres,
                    window.stats.candidatures
                ]
            }]
        }
    });
}

/* ================= NOTIFICATIONS ================= */
function loadNotifications() {

    const countEl = document.getElementById("notif-count");
    const listEl = document.getElementById("notif-list");

    if (!countEl || !listEl) return;

    fetch("/notification/index")
    .then(res => res.json())
    .then(data => {

        countEl.innerText = data.count;

        listEl.innerHTML = '<span class="dropdown-item dropdown-header">Notifications</span>';

        data.notifications.forEach(n => {
            listEl.innerHTML += `<div class="dropdown-item">${n.message}</div>`;
        });
    });
}

if (document.getElementById("notif-count")) {
    setInterval(loadNotifications, 5000);
    loadNotifications();
}

</script>

<!-- Sidebar fix -->
<script>
    $(document).ready(function () {
        $('[data-widget="pushmenu"]').PushMenu();
    });
</script>

</body>
</html>