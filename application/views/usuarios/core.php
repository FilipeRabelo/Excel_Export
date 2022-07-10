<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">

  <?php $this->load->view('layout/sidebar'); ?>

  <div class="main-content bg-dark">
    <div class="container-fluid">

      <div class="page-header">
        <div class="row align-items-end">
          <div class="col-lg-8">
            <div class="page-header-title">
              <i class="ik ik-user bg-blue"></i>
              <div class="d-inline">
                <h5 style="color: white;"><?= $titulo; ?></h5>
                <span style="color: white;"><?= $sub_titulo ?></span>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?= base_url('/'); ?>"><i class=" ik ik-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                  <a data-toggle="tooltip" data-placement="bottom" title="Listar <?= $this->router->fetch_class(); ?>" href="<?= base_url($this->router->fetch_class()); ?>"><i class=" ik ik-users"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo; ?></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header font-weight-bold"><?php echo (isset($users) ? 'Data da ultima alteração: &nbsp;' . formata_data_banco_com_hora($users->data_ultima_atualizacao) : 'Sem Atualização!!'); ?></div>
            <!-- <div class="card-header ">
              <a href="<?= base_url('usuarios/core/'); ?>" title="Novo cadastro <?= $this->router->fetch_class(); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-success ">+ &nbsp; Novo</a>
            </div> -->
            <div class="card-body">


              <form class="forms-sample" name="form_core" method="POST">

                <div class="form-group row">

                  <div class="col-md-6 mb-20">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo (isset($user) ? $user->first_name : set_value('first_name')); ?>">
                    <?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="col-md-6 mb-20">
                    <label>Sobre-Nome</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo (isset($user) ? $user->last_name : set_value('last_name')); ?>">
                    <?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6 mb-20">
                    <label>Usuário</label>
                    <input type="text" class="form-control" name="username" value="<?php echo (isset($user) ? $user->username : set_value('username')); ?>">
                    <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="col-md-6 mb-20">
                    <label>E-mail (Login)</label>
                    <input type="email" class="form-control" name="email" value="<?php echo (isset($user) ? $user->email : set_value('email')); ?>">
                    <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6 mb-20">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="password">
                    <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                  </div>

                  <div class="col-md-6 mb-20">
                    <label>Confirme sua senha</label>
                    <input type="password" class="form-control" name="confirmacao">
                    <?php echo form_error('confirmacao', '<div class="text-danger">', '</div>'); ?>
                  </div>
                </div>

                <div class="form-group row">

                  <div class="col-md-6 mb-20">
                    <label>Perfil Acesso</label>
                    <select class="form-control" name="perfil">

                      <?php if (isset($user)) : ?>

                        <option value="2" <?php echo ($perfil_usuario->id == 2 ? 'selected' : '') ?>>Atendente</option>
                        <option value="1" <?php echo ($perfil_usuario->id == 1 ? 'selected' : '') ?>>Administrador</option>

                      <?php else : ?>

                        <option value="2">Atendente</option>
                        <option value="1">Administrador</option>

                      <?php endif; ?>

                    </select>
                  </div>

                  <div class="col-md-6 mb-20">
                    <label>Ativo</label>
                    <select class="form-control" name="active">
                      <!--active == coluna do banco -->

                      <?php if (isset($user)) : ?>

                        <option value="0" <?php echo ($user->active == 0 ? 'selected' : '') ?>>Não esta Ativo</option>
                        <option value="1" <?php echo ($user->active == 1 ? 'selected' : '') ?>>Esta Ativo</option>

                      <?php else : ?>

                        <option value="0">Não esta Ativo</option>
                        <option value="1">Esta Ativo</option>

                      <?php endif; ?>

                    </select>
                  </div>

                </div>

                <?php if (isset($users)) : ?>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <input type="hidden" class="form-control" name="usuario_id" value="<?php echo $usuario_id; ?>">
                    </div>
                  </div>

                <?php endif; ?>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>

              </form>

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