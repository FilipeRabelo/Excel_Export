<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">

    <?php $this->load->view('layout/sidebar'); ?>

    <div class="main-content">
        <div class="container-fluid ">

            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-menu  bg-blue"></i>
                            <div class="d-inline">
                                <h5><?= $titulo; ?></h5>
                                <span><?= $sub_titulo ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?= base_url('/'); ?>"><i class=" ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $titulo; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4 class="p-3 mb-2 bg-light text-center text-dark font-weight-bold shadow-lg p-3 mb-5 bg-white rounded">Enviando Planilha MundiPag para Banco de Dados Bit Hive!</h4>
                    <hr>
                    <?php
                    if ($this->session->flashdata('message')) {
                        echo $this->session->flashdata('message');
                    }
                    ?>
                    <form method="post" action="<?php echo base_url('MundiPag/spreadsheet_import'); ?>" enctype="multipart/form-data">
                        <div class="form-group input-group-lg ">
                            <input type="file" name="upload_file" class="form-control " placeholder="Enter Name" id="upload_file" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary float-right font-weight-bold" value="Enviar Excel para Banco de Dados">
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

    <footer class="footer fixed-bottom bg-info">
        <div class="w-100 clearfix">
            <span class="text-center text-white font-weight-bold text-sm-left d-md-inline-block">Copyright © &nbsp;<?= date('Y') ?> <a href="https://bithive.com.br/">&nbsp;Bit Hive Smart Solutions</a></span>
            <span class="float-none font-weight-bold text-white float-sm-right mt-1 mt-sm-0 text-center">Developed &nbsp;<i class="fa fa-heart text-danger"></i>&nbsp; por &nbsp; <a href="https://github.com/FilipeRabelo" class="text-dark" target="_blank">Filipe Rabelo F Lana</a></span>
        </div>
    </footer>

</div> <!-- FIM DA ROW -->
</div>