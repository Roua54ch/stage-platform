<?php $user = $_SESSION['user'] ?? null; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>

<!-- AdminLTE -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

<!-- 🔵 NAVBAR -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <span class="navbar-brand ml-2">Stage Platform</span>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <span class="nav-link">👤 <?= $user['name'] ?? 'Guest' ?></span>
        </li>
    </ul>

</nav>

<!-- 🔵 SIDEBAR -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="/dashboard/admin" class="brand-link text-center">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">

        <nav class="mt-3">

            <ul class="nav nav-pills nav-sidebar flex-column">

                <!-- DASHBOARD -->
                <li class="nav-item">
                    <a href="/dashboard/admin" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- OFFRES -->
                <li class="nav-item">
                    <a href="/offre/index" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Offres</p>
                    </a>
                </li>

                <!-- CANDIDATURES -->
                <li class="nav-item">
                    <a href="/candidature/index" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Candidatures</p>
                    </a>
                </li>

                <!-- PROFILE -->
                <li class="nav-item">
                    <a href="/profile/index" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>

                <!-- LOGOUT -->
                <li class="nav-item">
                    <a href="/auth/logout" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>

<!-- 🔵 CONTENT -->
<div class="content-wrapper p-3">