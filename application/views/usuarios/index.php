<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">

    <?php $this->load->view('layout/sidebar'); ?>

    <div class="main-content ">
        <div class="container-fluid ">

            <div class="page-header">
                <div class="row align-items-end">

                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-users bg-blue"></i>
                            <div class="d-inline">
                                <h5><?= $titulo; ?></h5>
                                <span><?= $sub_titulo ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item ">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?= base_url('/'); ?>"><i class=" ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active " aria-current="page"><?= $titulo; ?></li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <!-- FLASH_DATA SUCESSO -->

            <?php if ($message = $this->session->flashdata('sucesso')) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success font-weight-bold text-white bg-success alert-dismissible fade show" role="alert">
                            <strong><i class="fas fa-smile"></i>&nbsp;<?= $message ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- echo"$message";
                exit(); -->
            <?php endif; ?>


            <!-- FLASH_DATA ERROR -->

            <?php if ($message = $this->session->flashdata('error')) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger text-white font-weight-bold bg-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fas fa-smile"></i>&nbsp;<?= $message ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- echo"$message";
                exit(); -->
            <?php endif; ?>






            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header font-weight-bold">
                            <a data-toggle="tooltip" data-placement="right" title="Cadastrar <?= $this->router->fetch_class(); ?>" class="btn btn-success" href="<?= base_url($this->router->fetch_class() . '/core/'); ?>">+ Novo</a>
                        </div>

                        <div class="card-body">

                            <table class="data_table table font-weight-bold table-info">

                                <thead class="table table-primary table-hover ">
                                    <tr>
                                        <th>#</th>
                                        <th>Usuário</th>
                                        <th>E-mail</th>
                                        <th>Perfil</th>
                                        <th>Nome</th>
                                        <th>Ativo</th>
                                        <th class="nosort text-center pr-25">Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- RECUPERANDO USUARIOS DO control -->
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?= $user->id          ?></td>
                                            <td><?= $user->username    ?></td>
                                            <td><?= $user->email       ?></td>
                                            <td><?= ($this->ion_auth->is_admin($user->id) ? 'Administrador' : 'Atendente'); ?></td>
                                            <td><?= $user->first_name  ?></td>
                                            <td><?= ($user->active == 1 ? '<span class="badge badge-pill badge-success mb-1">Sim</span>' : '<span class="badge badge-pill badge-warning mb-1">Não</span>'); ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url($this->router->fetch_class() . '/core/' . $user->id); ?>" data-toggle="tooltip" data-placement="bottom" title="Editar <?= $this->router->fetch_class(); ?>" class="btn btn-primary"><i class="ik ik-edit-2"></i>Editar </a>
                                                <button type="button" title="Excluir <?= $this->router->fetch_class(); ?>" class="btn btn-danger" data-toggle="modal" data-target="#user-<?php echo $user->id; ?>"><i class="ik ik-info"></i> Excluir</button>
                                            </td>
                                        </tr>

                                        <!-- modal -->

                                        <div class="modal fade " id="user-<?= $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content text-center">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title " id="exampleModalCenterLabel"> <i class="fas fa-exclamation-triangle text-danger"></i>&nbsp; Excluir Usuário &nbsp;<i class="fas fa-exclamation-triangle text-danger"></i></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ATENÇÂO! Deseja Excluir o Usuário?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-toggle="tooltip" data-placement="bottom" title="Voltar" class=" btn btn-info" data-dismiss="modal">Não! Voltar.</button>

                                                        <a data-toggle="tooltip" data-placement="bottom" title="Excluir <?= $this->router->fetch_class(); ?>" href="<?= base_url($this->router->fetch_class() . '/del/' . $user->id); ?>" class=" btn btn-danger">Sim, Excluir!! </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- <?php if ($message = $this->session->flashdata('error')) : ?>

      <div class="row">
        <div class="col-md-12">
          <div class="alert bg-success alert-success text-white alert-dismissible">
            <strong><?= $message ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
              <i class="ik ik-x"></i>
            </button>
          </div>
        </div>
      </div>

    <?php endif; ?> -->

    <footer class="footer">
        <div class="w-100 clearfix">
            <span class="text-center text-sm-left d-md-inline-block">Copyright © <?= date('Y') ?> ThemeKit v2.0. All Rights Reserved <a href="https://bithive.com.br/">Bit Hive Smart Solutions </a>.</span>
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Developed <i class="fa fa-heart text-danger"></i> por <a href="https://github.com/FilipeRabelo" class="text-dark" target="_blank">Filipe Rabelo F Lana</a></span>
        </div>
    </footer>

</div>