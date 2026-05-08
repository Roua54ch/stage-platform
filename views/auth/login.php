<?php

require_once __DIR__ . "/../../helpers/Flash.php";
$errors = $errors ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body class="hold-transition login-page">

<div class="login-box">

<div class="login-logo">
    <b>Stage</b>Platform
</div>

<div class="card">
<div class="card-body login-card-body">

<p class="login-box-msg">Sign in to start your session</p>

<!-- ✅ FLASH MESSAGE SUCCESS -->
<?php if ($msg=Flash::get("success")): ?>
    <div class="alert alert-success">
        <?= $msg ?>
    </div>
<?php endif; ?>


<!-- 🔥 GENERAL ERROR (IMPORTANT FIX) -->
<?php if(isset($errors['general'])): ?>
    <div class="alert alert-danger">
        <?= $errors['general'] ?>
    </div>
<?php endif; ?>

<form method="POST" action="/index.php?url=auth/login">

<!-- EMAIL -->
<div class="input-group mb-1">
    <input type="email" name="email" class="form-control" placeholder="Email" required>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>

<?php if(isset($errors['email'])): ?>
<small class="text-danger"><?= $errors['email'] ?></small>
<?php endif; ?>


<!-- PASSWORD -->
<div class="input-group mb-1 mt-2">
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div>

<?php if(isset($errors['password'])): ?>
<small class="text-danger"><?= $errors['password'] ?></small>
<?php endif; ?>


<div class="row">
<div class="col-8"></div>

<div class="col-4">
    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
</div>
</div>

</form>

<p class="mt-3 text-center">
    <a href="/index.php?url=auth/register">Create account</a>
</p>

</div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>