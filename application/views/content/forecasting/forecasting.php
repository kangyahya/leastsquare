        <div class="content">
            <div class="content-header">
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?=site_url()?>">Dashboard</a></li>
                        <li><a>Forecasting</a></li>
                    </ul>
                </div>
            </div>
            <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Data Distribusi</b></h4>
                    <a class="btn btn-info" href="<?=site_url('forecasting/tambah')?>">Tambah</a>
                    <a class="btn btn-warning" data-toggle="modal" data-target="#forecast">Forecast Per Prodi</a>
                    <a class="btn btn-warning" data-toggle="modal" data-target="#forecastglobal">Forecast Global</a>
                    <div class="panel">
                        
                        <div class="panel-content">
                            <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                <thead>
                                <tr class="text-center">
                                    <th rowspan="3">Tahun</th>
                                    <th colspan="5">Fakultas Teknologi & Informasi</th>
                                    <th colspan="3">Fakultas Ekonomi & Bisnis</th>
                                </tr>
                                <tr class="text-center">
                                    <th colspan="3">S1</th>
                                    <th colspan="2">D3</th>
                                    <th colspan="2">S1</th>
                                    <th>D3</th>
                                </tr>
                                <tr class="text-center">
                                    <th>TI</th>
                                    <th>SI</th>
                                    <th>DKV</th>
                                    <th>MI</th>
                                    <th>KA</th>
                                    <th>Manajemen</th>
                                    <th>Akuntansi</th>
                                    <th>MB</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     foreach($tahun as $th){ ?>
                                <tr class="text-center">
                                    <td><?=$th['tahun']?></td>
                                    <?php $dist = $this->db->query("select dist from tbl_distribution where tahun=?",$th['tahun']);
                                        foreach($dist->result_array() as $dis){ ?>
                                        <td><?=$dis['dist']?></td>
                                    <?php } ?>
                                </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th><?=$ti['dist']?></th>
                                        <th><?=$si['dist']?></th>
                                        <th><?=$dkv['dist']?></th>
                                        <th><?=$mi['dist']?></th>
                                        <th><?=$ka['dist']?></th>
                                        <th><?=$manj['dist']?></th>
                                        <th><?=$akun['dist']?></th>
                                        <th><?=$mb['dist']?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $submitted = $this->input->post("submitted");
            if(!empty($submitted)){
                if($submitted=="hitung"){?>
            <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Dicari</b></h4>
                    <div class="panel">
                        
                        <div class="panel-content">
                            <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                <thead>
                                <tr class="text-center">
                                    <th rowspan="3">Tahun</th>
                                    <th colspan="5">Fakultas Teknologi & Informasi</th>
                                    <th colspan="3">Fakultas Ekonomi & Bisnis</th>
                                </tr>
                                <tr class="text-center">
                                    <th colspan="3">S1</th>
                                    <th colspan="2">D3</th>
                                    <th colspan="2">S1</th>
                                    <th>D3</th>
                                </tr>
                                <tr class="text-center">
                                    <th>TI</th>
                                    <th>SI</th>
                                    <th>DKV</th>
                                    <th>MI</th>
                                    <th>KA</th>
                                    <th>Manajemen</th>
                                    <th>Akuntansi</th>
                                    <th>MB</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $max = $this->db->query("select tahun from tbl_distribution ORDER BY tahun DESC limit 1")->row_array(); ?>
                                    <?php for($i = $max['tahun']+1; $i <= $this->input->post('tahun'); $i++){?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td>?</td>
                                        <td>?</td>
                                        <td>?</td>
                                        <td>?</td>
                                        <td>?</td>
                                        <td>?</td>
                                        <td>?</td>
                                        <td>?</td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach($prodi as $prod){?>
                <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b><?=$prod['prodi']?></b></h4>
                    <div class="panel">
                        
                        <div class="panel-content">
                            <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                <thead>
                                <tr class="text-center">
                                    <th>Tahun</th>
                                    <th>Distribusi (Y)</th>
                                    <th>X</th>
                                    <th>XY</th>
                                    <th>X<sup>2</sup></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $distr = $this->db->query("select * from tbl_distribution where id_prodi = ?",$prod['id_prodi'])->result_array();
                                        $maxi = $this->db->query("select sum(dist) as qty, count(dist) as total from tbl_distribution where id_prodi = ?",$prod['id_prodi'])->row_array();
                                        if($maxi['total'] %2 == 0){
                                            $x = $maxi['total'] - $maxi['total'] - $maxi['total'] + 1;
                                            $tam = 2;
                                        }else{
                                            $x = $maxi['total'] - $maxi['total'] - ($maxi['total']/2) + 0.5;
                                            $tam = 1;
                                        }
                                        $jumlah_x = 0;
                                        $jumlah_y = 0;
                                        $jumlah_xy = 0;
                                        $jumlah_xx = 0;
                                    ?>
                                    <?php foreach($distr as $dis){
                                        $jumlah_x += $x;
                                        $jumlah_y += $dis['dist'];
                                        $jumlah_xy += ($x * $dis['dist']);
									    $jumlah_xx += ($x * $x);
                                        ?>
                                    <tr>
                                        <td><?=$dis['tahun']?></td>
                                        <td><?=$dis['dist']?></td>
                                        <td><?=$x?></td>
                                        <td><?=$x * $dis['dist']?></td>
                                        <td><?=$x * $x?></td>
                                    </tr>
                                    <?php $x+=$tam; }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Total</td>
                                        <td><?=$maxi['qty']?></td>
                                        <td><?=$jumlah_x?></td>
                                        <td><?=$jumlah_xy?></td>
                                        <td><?=$jumlah_xx?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <pre>Persamaan : Y = a + b(x) </br>Persamaan : Y = <?=($jumlah_y / $maxi['total']).' + '.$jumlah_xy/$jumlah_xx .' (x)';?></pre>
                    <div class="panel">
                        
                        <div class="panel-content">
                            <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                <thead>
                                <tr class="text-center">
                                    <th>Tahun</th>
                                    <th>X</th>
                                    <th>Hasil Forecasting <?=$prod['prodi']?></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $max = $this->db->query("select tahun from tbl_distribution ORDER BY tahun DESC limit 1")->row_array(); ?>
                                    <?php for($i = $max['tahun']+1; $i <= $this->input->post('tahun'); $i++){?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$x?></td>
										<td><?=(($jumlah_y / $maxi['total'])+ (($jumlah_xy/$jumlah_xx)*$x))?></td>
                                    </tr>
                                    <?php $x+$tam; }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php }elseif($submitted=="global"){?>
                <div class="row animated fadeInRight">
                    <div class="col-sm-12">
                        <h4 class="section-subtitle"><b>Dicari</b></h4>
                        <div class="panel">
                            <div class="panel-content">
                                <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Tahun</th>
                                        <th>Pendaftaran</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $max = $this->db->query("select tahun from tbl_distribution ORDER BY tahun DESC limit 1")->row_array(); ?>
                                        <?php for($i = $max['tahun']+1; $i <= $this->input->post('tahun'); $i++){?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td>?</td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row animated fadeInRight">
                    <div class="col-sm-12">
                        <h4 class="section-subtitle"><b>Pendaftaran</b></h4>
                        <div class="panel">
                            
                            <div class="panel-content">
                                <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Tahun</th>
                                        <th>Distribusi (Y)</th>
                                        <th>X</th>
                                        <th>XY</th>
                                        <th>X<sup>2</sup></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $tot = $this->db->query("select count(distinct tahun) as total from tbl_distribution")->row_array();
                                            $maxi = $this->db->query("select sum(dist) as qty from tbl_distribution")->row_array();
                                            if($tot['total'] %2 == 0){
                                                $x = $tot['total'] - $tot['total'] - $tot['total'] + 1;
                                                $tam = 2;
                                            }else{
                                                $x = $tot['total'] - $tot['total'] - ($tot['total']/2) + 0.5;
                                                $tam =1;
                                            }
                                            $jumlah_x = 0;
                                            $jumlah_y = 0;
                                            $jumlah_xy = 0;
                                            $jumlah_xx = 0;
                                        ?>
                                        <?php foreach($global as $glob){
                                            $jumlah_x += $x;
                                            $jumlah_y += $glob['dist'];
                                            $jumlah_xy += ($x * $glob['dist']);
                                            $jumlah_xx += ($x * $x);
                                            ?>
                                        <tr>
                                            <td><?=$glob['tahun']?></td>
                                            <td><?=$glob['dist']?></td>
                                            <td><?=$x?></td>
                                            <td><?=$x * $glob['dist']?></td>
                                            <td><?=$x * $x?></td>
                                        </tr>
                                        <?php $x+=$tam; }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total</td>
                                            <td><?=$maxi['qty']?></td>
                                            <td><?=$jumlah_x?></td>
                                            <td><?=$jumlah_xy?></td>
                                            <td><?=$jumlah_xx?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <pre>Persamaan : Y = a + b(x) </br>Persamaan : Y = <?=($jumlah_y / $tot['total']).' + '.$jumlah_xy/$jumlah_xx .' (x)';?></pre>
                        <div class="panel">
                            
                            <div class="panel-content">
                                <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Tahun</th>
                                        <th>X</th>
                                        <th>Hasil Forecasting</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $max = $this->db->query("select tahun from tbl_distribution ORDER BY tahun DESC limit 1")->row_array(); ?>
                                        <?php for($i = $max['tahun']+1; $i <= $this->input->post('tahun'); $i++){?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$x?></td>
                                            <td><?=(($jumlah_y / $tot['total'])+ (($jumlah_xy/$jumlah_xx)*$x))?></td>
                                        </tr>
                                        <?php $x+=$tam;}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }} ?>
        </div>
<div class="modal fade" id="forecast" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
    <div class="modal-dialog" role="document">
        <form class="form-login" action="" method="post">
            <div class="modal-content">
                <div class="modal-header state modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-calculator"></i>input tahun for forecasting</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" size="4" class="form-control" name="tahun"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="submitted" value="hitung"/>
                    <button type="submit" class="btn btn-primary">Hitung</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="forecastglobal" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
    <div class="modal-dialog" role="document">
        <form class="form-login" action="" method="post">
            <div class="modal-content">
                <div class="modal-header state modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-calculator"></i>input tahun for forecasting</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" size="4" class="form-control" name="tahun"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="submitted" value="global"/>
                    <button type="submit" class="btn btn-primary">Hitung</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>