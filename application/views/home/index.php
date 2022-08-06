<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap bg-dark">

    <?php $this->load->view('layout/sidebar'); ?>

    <div class="main-content">
        <div class="container-fluid ">

            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-bar-chart-2 text-dark bg-blue"></i>
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
                                    <a data-toggle="tooltip" data-placement="bottom" data-toggle="tooltip" data-placement="bottom" title="Home" href="<?= base_url('home'); ?>"><i class=" ik ik-home"></i></a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">Home</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="row ">

                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-body">

                                    <div class="card-body timeline">
                                        <div class="header bg-theme" style="background-image: url('img/placeholder/placeimg_400_200_nature.jpg')">
                                            <div class="color-overlay d-flex align-items-center">

                                                <div class="day-number"><?= date('d') ?></div>
                                                <div class="date-right">
                                                    <div class="day-name"><?= date('l') ?></div>
                                                    <div class="month"><?= date('M-Y H:i') ?></div>
                                                </div>
                                                <div class="p-2">
                                                    <h5 class="mb-0">
                                                        <small> Brasil, Belo Horizonte</small>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row clearfix">

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Bookmarks</h6>
                                            <h2>1,410</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-award"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">Lorem ipsum dolor, sit amet consectetur </small>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Likes</h6>
                                            <h2>41,410</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-thumbs-up"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">61% higher than last month</small>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Events</h6>
                                            <h2>410</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-calendar"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">Total Events</small>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Comments</h6>
                                            <h2>41,410</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-message-square"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">Total Comments</small>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
            </div> <!-- FIM DA ROW -->

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

        </div>
    </div>

    <footer class="footer fixed-bottom bg-info">
        <div class="w-100 clearfix">
            <span class="text-center text-white font-weight-bold text-sm-left d-md-inline-block">Copyright © &nbsp;<?= date('Y') ?> <a href="https://bithive.com.br/">&nbsp;Bit Hive Smart Solutions</a></span>
            <span class="float-none font-weight-bold text-white float-sm-right mt-1 mt-sm-0 text-center">Developed &nbsp;<i class="fa fa-heart text-danger"></i>&nbsp; por &nbsp; <a href="https://github.com/FilipeRabelo" class="text-dark" target="_blank">Filipe Rabelo F Lana</a></span>
        </div>
    </footer>

</div>