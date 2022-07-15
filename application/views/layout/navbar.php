<header class="header-top" header-theme="blue">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">

            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <div class="header-search">
                    <div class="input-group">
                        <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                    </div>
                </div>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>

            <div class="top-menu d-flex align-items-center">

                <div class="dropdown">

                    <a href="<?= base_url('login/logout/auth'); ?>" class="dropdown-item bg-info " ><i data-toggle="dropdown" title="SAIR" class="ik ik-power dropdown-icon" data-toggle="tooltip" title="Sair do Sistema"></i> Logout</a>

                </div>

            </div>

        </div>
    </div>
</header>