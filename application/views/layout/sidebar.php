<div class="app-sidebar colored">

    <div class="sidebar-header bg-info">
        <a class="header-brand " data-toggle="tooltip" title="Ir para Home" href="<?= base_url('home'); ?>">
            <div class="logo-img">
                <i class="ik ik-folder text-dark"></i>
                <!-- <img src=" src/img/brand-white.svg" class="header-brand-img" alt="lavalite"> -->
            </div>
            <span class="text text-dark ">Export Excel</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon text-dark"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content bg-info">
        <div class="nav-container">

            <nav id="main-menu-navigation" class="navigation-main">

                <div class="nav-lavel bg-info text-dark font-weight-bold ">Menu Export Excel</div>

                <div class=" nav-item active">
                    <a class="text-dark" href="<?= base_url('/home'); ?>"><i class="ik ik-bar-chart-2 text-dark"></i><span>Dashboard</span></a>
                </div>

                <div class="nav-item">
                    <a class="text-dark" href="<?= base_url('MundiPag'); ?>"><i class="ik ik-dollar-sign text-dark"></i><span>Pagamentos Global Pay </span></a>
                </div>

                <div class="nav-item">
                    <a class="text-dark" href="<?= base_url('ChargeBack'); ?>"><i class="ik ik-layers text-dark"></i><span>Chargeback Global Pay</span></a>
                </div>

                <div class="nav-item">
                    <a class="text-dark" href="<?= base_url('Cancelados'); ?>"><i class="ik ik-minus-square text-dark"></i><span>Cancelamentos Global Pay</span></a>
                </div>

                <div class="nav-item">
                    <a class="text-dark" href="<?= base_url('EthocaAlerts'); ?>"><i class="ik ik-minus-square text-dark"></i><span>Ethoca Alerts Excel</span></a>
                </div>

                <div class="nav-item">
                    <a class="text-dark" href="<?= base_url('/usuarios'); ?>"><i class="ik ik-users text-dark"></i><span>Usuarios</span></a>
                </div>

            </nav>

        </div>
    </div>

</div> <!-- Fim Sidebar -->