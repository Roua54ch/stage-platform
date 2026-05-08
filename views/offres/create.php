<?php require "../app/views/layouts/header.php"; ?>

<div class="container">

<div class="card">
<div class="card-header">
    <h3>Add New Offre</h3>
</div>

<div class="card-body">

<form method="POST" action="/offre/create">

<!-- TITRE -->
<div class="form-group">
    <label>Titre</label>
    <input type="text" name="titre" class="form-control" required>
</div>

<!-- DESCRIPTION -->
<div class="form-group mt-2">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="5" required></textarea>
</div>

<!-- BUTTON -->
<div class="mt-3">
    <button class="btn btn-success">Save</button>
    <a href="/offre/index" class="btn btn-secondary">Cancel</a>
</div>

</form>

</div>
</div>

</div>

<?php require "../app/views/layouts/footer.php"; ?>