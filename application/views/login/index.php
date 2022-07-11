<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">

            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url(<?= base_url('public/img/auth/login-bg.jpg'); ?>)">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">

                    <h3 class="p-3 mb-2 bg-primary text-center text-white font-weight-bold shadow-lg p-3 mb-5 mb-35 rounded">System Export Excel</h3>

                    <!-- VALIDAÇÃO -->

                    <?php if ($message = $this->session->flashdata('error')) : ?>

                        <div class="row">
                        <div class="col-md-12">
                            <div class="alert bg-danger alert-success text-white alert-dismissible">
                            <strong><?= $message ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <i class="ik ik-x"></i>
                            </button>
                            </div>
                        </div>
                        </div>

                     <?php endif; ?> 
                     
                    <p class="text-center text-primary font-weight-bold">Feliz em vê-lo novamente!!</p>

                    <form name="form_auth" method="POST" action="<?= base_url('login/auth') ?>">

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Digite seu E-mail!" required="">
                            <i class="ik ik-user"></i>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" value="123456">
                            <i class="ik ik-lock"></i>
                        </div>

                        <div class="sign-btn text-center">
                            <button class="btn btn-success">Entrar</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>