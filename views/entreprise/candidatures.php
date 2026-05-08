<?php require __DIR__ . "/../layouts/header.php"; ?>
<?php require __DIR__ . "/../layouts/navbar.php"; ?>

<div class="container mt-4">

<h3 class="mb-4">Liste des candidatures</h3>

<table class="table table-bordered table-hover">

<thead class="thead-dark">
<tr>
    <th>Étudiant</th>
    <th>Offre</th>
    <th>CV</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

<?php if (!empty($candidatures)): ?>

<?php foreach($candidatures as $c): ?>
<tr>

    <!-- 👨‍🎓 Name -->
    <td><?= htmlspecialchars($c['name']) ?></td>

    <!-- 📌 Offre -->
    <td><?= htmlspecialchars($c['titre']) ?></td>

    <!-- 📄 CV -->
    <td>
        <a href="/storage/cv/<?= $c['cv'] ?>" target="_blank" class="btn btn-info btn-sm">
            Voir CV
        </a>
    </td>

    <!-- 📊 Status -->
    <td>
        <?php if($c['status'] == 'pending'): ?>
            <span class="badge bg-warning">Pending</span>
        <?php elseif($c['status'] == 'accepted'): ?>
            <span class="badge bg-success">Accepted</span>
        <?php else: ?>
            <span class="badge bg-danger">Refused</span>
        <?php endif; ?>
    </td>

    <!-- ⚡ Actions -->
    <td>

        <?php if($c['status'] == 'pending'): ?>

            <a href="/candidature/updateStatus/<?= $c['id'] ?>/accepted"
               class="btn btn-success btn-sm">
               Accept
            </a>

            <a href="/candidature/updateStatus/<?= $c['id'] ?>/refused"
               class="btn btn-danger btn-sm">
               Refuse
            </a>

        <?php else: ?>
            <span class="text-muted">Done</span>
        <?php endif; ?>

    </td>

</tr>
<?php endforeach; ?>

<?php else: ?>

<tr>
    <td colspan="5" class="text-center">No candidatures found</td>
</tr>

<?php endif; ?>

</tbody>

</table>

</div>

<?php require __DIR__ . "/../layouts/footer.php"; ?>