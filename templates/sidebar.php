<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-text mx-3">Aplikasi Kasir</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php
            $sidebar_active = basename($_SERVER['PHP_SELF']);
            ?>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($sidebar_active == 'dashboard.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?= (in_array($sidebar_active, ['kasir.php', 'edit_kasir.php', 'tambah_kasir.php'])) ? 'active' : ''; ?>">
                <a class="nav-link" href="kasir.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Kasir</span></a>
            </li>

            <li class="nav-item <?= (in_array($sidebar_active, ['barang.php', 'edit_barang.php', 'tambah_barang.php'])) ? 'active' : ''; ?>">
                <a class="nav-link" href="barang.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Barang</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->