<div class="app-sidebar colored">

    <div class="sidebar-header bg-primary">
        <a class="header-brand " data-toggle="tooltip" title="Ir para Home" href="<?= base_url('home'); ?>">
            <div class="logo-img">
                <i class="ik ik-folder"></i>
                <!-- <img src=" src/img/brand-white.svg" class="header-brand-img" alt="lavalite"> -->
            </div>
            <span class="text ">Export Excel</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content bg-primary">
        <div class="nav-container">

            <nav id="main-menu-navigation" class="navigation-main">

                <div class="nav-lavel bg-primary text-white font-weight-bold ">Menu Export Excel</div>

                <div class=" nav-item active">
                    <a href="<?= base_url('/home'); ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>

                <div class="nav-item">
                    <a href="<?= base_url('MundiPag'); ?>"><i class="ik ik-menu"></i><span>MundiPag </span></a>
                </div>

                <div class="nav-item">
                    <a href="<?= base_url('ChargeBack'); ?>"><i class="ik ik-layers"></i><span>Chargeback</span></a>
                </div>

                <div class="nav-item has-sub">
                    <a href="<?= base_url('/usuarios'); ?>"><i class="ik ik-users"></i><span>Usuarios</span></a>
                    <div class="submenu-content">
                        <a href="<?= base_url('usuarios/core/'); ?>" class="menu-item"><i class="ik ik-user"></i>Editar</a>
                    </div>
                </div>

            </nav>

        </div>
    </div>

</div> <!-- Fim Sidebar -->