<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- LEFT -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
    </ul>

    <!-- RIGHT -->
    <ul class="navbar-nav ml-auto">

        <!-- 🔔 NOTIFICATION -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span id="notif-count" class="badge badge-danger navbar-badge">0</span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notif-list">
                <span class="dropdown-item dropdown-header">Notifications</span>
            </div>
        </li>

        <!-- 👤 USER -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i> <?= $_SESSION['user']['name'] ?? 'User' ?>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="/auth/logout" class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>

    </ul>

</nav>