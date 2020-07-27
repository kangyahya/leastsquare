        <div class="content">
            <div class="content-header">
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?=site_url()?>">Dashboard</a></li>
                    </ul>
                </div>
            </div>
            <div class="row animated fadeInUp">
                <div class="col-sm-12 col-md-12">
                    <h4 class="section-subtitle">Welcome <strong><?=$this->session->userdata['user_nickname']?></strong>, di e-Forecasting UCIC</h4>
                    <div class="panel">
                        <div class="panel-content">
                            <p class="text-justify">
                                Forecasting atau perkiraan adalah kegiatan yang bertujuan untuk meramalkan atau memprediksi segala hal yang terkait dengan produksi, penawaran, permintaan ,dan penggunaan teknologi dalam sebuah industri atau usaha. Perkiraan ini pada akhirnya akan digunakan oleh perusahaan maupun pihak manajemen operasional untuk membuat perencanaan terkait kegiatan usaha dalam beberapa periode tertentu.
                            </p>

                        </div>
                        
                    </div>
                    <div class="panel-group" id="accordion_group2">
                        <div class="panel panel-accordion">
                            <div class="panel-header panel-danger">
                                <a class="panel-title" data-toggle="collapse" href="#accordion4">
                                    <span class="fa fa-download"></span> Download Format Excel
                                </a>
                            </div>
                            <div id="accordion4" class="panel-collapse collapse in">
                                <div class="panel-content">
                                    <p class="text-justify">
                                        untuk mempermudah penggunaan aplikasi silahkan download Format Excel untuk upload Data
                                    </p>
                                    <div>
                                        <a href="<?=base_url('uploads/format_mahasiswa.xlsx')?>">
                                            <span class="fa fa-arrow-right"></span> Format Data Mahasiswa
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--BAR CHART-->
                    <div class="panel">
                        <div class="panel-content">
                            <canvas id="bar-chart" width="400" height="260"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>