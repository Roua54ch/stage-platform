<?php require __DIR__ . "/../layouts/header.php"; ?>

<h3>My Profile</h3>

<form method="POST" action="/profile/update">

<input class="form-control mb-2" name="name" value="<?= $user['name'] ?>">
<input class="form-control mb-2" name="email" value="<?= $user['email'] ?>">

<button class="btn btn-primary">Update</button>

</form>

<?php require __DIR__ . "/../layouts/footer.php"; ?>