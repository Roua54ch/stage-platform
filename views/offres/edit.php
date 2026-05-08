<?php require __DIR__ . "/../layouts/header.php"; ?>

<div class="container">

<div class="card">
<div class="card-header">
    <h3>Edit Offre</h3>
</div>

<div class="card-body">

<form method="POST" action="/offre/update/<?= $offre['id'] ?>">

<!-- TITRE -->
<div class="form-group">
    <label>Titre</label>
    <input type="text" name="titre" class="form-control"
           value="<?= $offre['titre'] ?>" required>
</div>

<!-- DESCRIPTION -->
<div class="form-group mt-2">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="5" required>
<?= $offre['description'] ?>
    </textarea>
</div>

<!-- BUTTON -->
<div class="mt-3">
    <button class="btn btn-primary">Update</button>
    <a href="/offre/index" class="btn btn-secondary">Cancel</a>
</div>

</form>

</div>
</div>

</div>

<?php require __DIR__ . "/../layouts/footer.php"; ?>