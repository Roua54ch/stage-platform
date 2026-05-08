<?php require __DIR__ . "/../layouts/header.php"; ?>

<?php $offres = $offres ?? []; ?>

<section class="content">

<div class="card">
<div class="card-header">
    <h3 class="card-title">Liste des Offres</h3>
    <a href="/offre/create" class="btn btn-primary float-right">+ Ajouter</a>
</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead>
<tr>
<th>ID</th>
<th>Titre</th>
<th>Actions</th>
</tr>
</thead>

<tbody>

<?php foreach($offres as $o): ?>
<tr>
<td><?= $o['id'] ?></td>
<td><?= $o['titre'] ?></td>
<td>
<a href="/candidature/apply/<?= $o['id'] ?>" class="btn btn-success btn-sm">Apply</a>
<a href="/offre/delete/<?= $o['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>
<?php endforeach; ?>

</tbody>

</table>

</div>
</div>

</section>

<?php require __DIR__ . "/../layouts/footer.php"; ?>