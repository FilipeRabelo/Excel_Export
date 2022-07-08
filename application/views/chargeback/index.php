<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">

  <?php $this->load->view('layout/sidebar'); ?>

  <div class="main-content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">

          <h4 class="p-3 mb-2 bg-light text-center text-info font-weight-bold shadow-lg p-3 mb-5 bg-white rounded">Enviando Planilha ChargeBack para Banco de Dados Bit Hive!</h4>

          <hr>

          <?php
          if ($this->session->flashdata('message')) {
            echo $this->session->flashdata('message');
          }
          ?>

          <form method="post" action="<?php echo base_url('chargeback/spreadsheet_import'); ?>" enctype="multipart/form-data">
            <div class="form-group input-group-lg ">
              <input type="file" name="upload_file" class="form-control " placeholder="Enter Name" id="upload_file" required>              
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-info float-right font-weight-bold" value="Enviar Excel para Banco de Dados">
            </div>
          </form>
          <br>
          <hr>

        </div>
      </div> <!-- FIM DA ROW -->

      <div class="row ">
        <div class="col-md-12 ">

          <div class="row ">
            <div class="col-md-6 ">
              <div class="card  ">
                <div class="card-body  ">

                  <div class="card-body timeline ">
                    <div class="header bg-theme " style="background-image: url('img/placeholder/placeimg_400_200_nature.jpg')">
                      <div class="color-overlay d-flex align-items-center ">
                        <div class="day-number"><?= date('d') ?></div>
                        <div class="date-right ">
                          <div class="day-name"><?= date('l') ?></div>
                          <div class="month"><?= date('M-Y H:i') ?></div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div> <!-- FIM DA ROW -->



    </div>
  </div>

  <footer class="footer">
    <div class="w-100 clearfix">
      <span class="text-center text-sm-left d-md-inline-block">Copyright © <?= date('Y') ?> ThemeKit v2.0. All Rights Reserved <a href="https://bithive.com.br/">Bit Hive Smart Solutions </a>.</span>
      <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Developed <i class="fa fa-heart text-danger"></i> por <a href="https://github.com/FilipeRabelo" class="text-dark" target="_blank">Filipe Rabelo F Lana</a></span>
    </div>
  </footer>

</div> <!-- FIM DA ROW -->

</div>