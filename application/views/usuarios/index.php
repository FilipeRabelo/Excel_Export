<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">

  <?php $this->load->view('layout/sidebar'); ?>

  <div class="main-content bg-dark">
    <div class="container-fluid">

      <div class="page-header">
        <div class="row align-items-end">
          <div class="col-lg-8">
            <div class="page-header-title">
              <i class="ik ik-users bg-blue"></i>
              <div class="d-inline">
                <h5 style="color: white;"><?= $titulo; ?></h5>
                <span style="color: white;"><?= $sub_titulo ?></span>
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

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header font-weight-bold"><a class="btn btn-success" href="#">+ Novo</a></div>
            <!-- <div class="card-header ">
                <a href="<?= base_url('usuarios/core/'); ?>" title="Novo cadastro <?= $this->router->fetch_class(); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-success ">+ &nbsp; Novo</a>
              </div> -->
            <div class="card-body">

              <table class="data-table table font-weight-bold table-primary">


                <thead class="table table-primary table-hover ">
                  <tr>
                    <th>#</th>
                    <th>Usuário</th>
                    <th>E-mail</th>
                    <th>Perfil</th>
                    <th>Nome</th>
                    <th class="nosort text-center pr-25">Ações</th>
                    <th>Ativo</th>
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

                      <td class="text-center">
                        <a href="<?= base_url('usuarios/core/' . $user->id); ?>" title="Editar <?= $this->router->fetch_class(); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary"><i class="ik ik-edit-2"></i>Editar </a>
                        <a href="#" title="Excluir <?= $this->router->fetch_class(); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-danger"><i class="ik ik-info"></i> Excluir</a>
                      </td>

                      <td><?= ($user->active == 1 ? '<span class="badge badge-pill badge-success mb-1">Sim</span>' : '<span class="badge badge-pill badge-warning mb-1">Não</span>'); ?></td>





                    </tr>

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