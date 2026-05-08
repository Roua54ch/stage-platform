<?php require __DIR__ . "/../layouts/header.php"; ?>
<?php require __DIR__ . "/../layouts/navbar.php"; ?>

<div class="container mt-4">

<div class="row">

    <div class="col-lg-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $totalOffres ?></h3>
                <p>Mes Offres</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $totalCandidatures ?></h3>
                <p>Candidatures reçues</p>
            </div>
        </div>
    </div>

</div>

<!-- 📊 CHART -->
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Statistiques</h3>
    </div>
    <div class="card-body">
        <canvas id="statsChart"></canvas>
    </div>
</div>

</div>

<!-- inject data -->
<script>
window.stats = {
    users: 0,
    offres: <?= $totalOffres ?>,
    candidatures: <?= $totalCandidatures ?>
};
</script>

<?php require __DIR__ . "/../layouts/footer.php"; ?>