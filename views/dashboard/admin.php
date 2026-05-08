<?php require __DIR__ . "/../layouts/header.php"; ?>
<?php require_once "../views/layouts/navbar.php"; ?>

<div class="row">

<div class="col-lg-4">
<div class="small-box bg-info">
    <div class="inner">
        <h3><?= $totalOffres ?></h3>
        <p>Offres</p>
    </div>
</div>
</div>

<div class="col-lg-4">
<div class="small-box bg-success">
    <div class="inner">
        <h3><?= $totalUsers ?></h3>
        <p>Users</p>
    </div>
</div>
</div>

<div class="col-lg-4">
<div class="small-box bg-warning">
    <div class="inner">
        <h3><?= $totalCandidatures ?></h3>
        <p>Candidatures</p>
    </div>
</div>
</div>

</div>

<!-- 🔔 NOTIFICATIONS SCRIPT HERE -->
<script>
function loadNotifications() {
    fetch("/notification/index")
    .then(res => res.json())
    .then(data => {

        document.getElementById("notif-count").innerText = data.count;

        let list = document.getElementById("notif-list");
        list.innerHTML = '<span class="dropdown-item dropdown-header">Notifications</span>';

        data.notifications.forEach(n => {
            list.innerHTML += `<div class="dropdown-item">${n.message}</div>`;
        });
    });
}

setInterval(loadNotifications, 5000);
loadNotifications();

</script>
<script>
window.stats = {
    users: <?= $totalUsers ?>,
    offres: <?= $totalOffres ?>,
    candidatures: <?= $totalCandidatures ?>
};
</script>

<?php require __DIR__ . "/../layouts/footer.php"; ?>