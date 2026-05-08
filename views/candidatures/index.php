<?php require __DIR__ . "/../layouts/header.php"; ?>

<div class="container-fluid">

<div class="card">

<div class="card-header">
    <h3 class="card-title">Liste des candidatures</h3>
</div>

<div class="card-body p-0">

<table class="table table-bordered table-striped">

<thead>
<tr>
    <th>ID</th>
    <th>User</th>
    <th>Offre</th>
    <th>Status</th>
    <th>Date</th>
</tr>
</thead>

<tbody>

<?php foreach($candidatures as $c): ?>

<tr>

    <td><?= $c['id'] ?></td>

    <td><?= $c['user_id'] ?></td>

    <td><?= $c['offre_id'] ?></td>

    <!-- STATUS -->
    <td>
        <?php if($c['statut'] == "en_attente"): ?>
            <span class="badge badge-warning">En attente</span>
        <?php elseif($c['statut'] == "accepté"): ?>
            <span class="badge badge-success">Accepté</span>
        <?php else: ?>
            <span class="badge badge-danger">Refusé</span>
        <?php endif; ?>
    </td>

    <!-- DATE -->
    <td><?= $c['created_at'] ?? 'N/A' ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

</div>

<?php require __DIR__ . "/../layouts/footer.php"; ?>