<?php require __DIR__ . "/../layouts/header.php"; ?>
<?php require __DIR__ . "/../layouts/navbar.php"; ?>

<div class="container mt-4">

<h3>Créer une offre</h3>

<form method="POST">

<div class="form-group">
    <label>Titre</label>
    <input type="text" name="titre" class="form-control" required>
</div>

<div class="form-group mt-2">
    <label>Description</label>
    <textarea name="description" class="form-control" required></textarea>
</div>

<button class="btn btn-success mt-3">Créer</button>

</form>

</div>

<?php require __DIR__ . "/../layouts/footer.php"; ?>