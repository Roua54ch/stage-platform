<?php $errors = $errors ?? []; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body class="hold-transition register-page">

<div class="register-box">

<div class="register-logo">
    <b>Create</b>Account
</div>

<div class="card">
<div class="card-body register-card-body">

<p class="login-box-msg">Register a new account</p>

<form method="POST">

<div class="input-group mb-3">
    <input type="text" name="name" class="form-control" placeholder="Full name" required>
    <div class="input-group-append">
        <div class="input-group-text"><span class="fas fa-user"></span></div>
    </div>
</div>

<div class="input-group mb-3">
    <input type="email" name="email" class="form-control" placeholder="Email" required>
    <div class="input-group-append">
        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
    </div>
</div>

<div class="input-group mb-3">
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <div class="input-group-append">
        <div class="input-group-text"><span class="fas fa-lock"></span></div>
    </div>
</div>

<div class="input-group mb-3">
    <select name="role" class="form-control">
        <option value="etudiant">Etudiant</option>
        <option value="entreprise">Entreprise</option>
    </select>
</div>

<div class="row">
<div class="col-8"></div>

<div class="col-4">
    <button type="submit" class="btn btn-success btn-block">Register</button>
</div>
</div>

</form>

<p class="mt-3 text-center">
    <a href="/auth/login">Already have account?</a>
</p>

</div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>