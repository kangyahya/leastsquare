        <div class="content">
            <div class="content-header">
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?=site_url()?>">Dashboard</a></li>
                        <li><a>Prediksi</a></li>
                    </ul>
                </div>
            </div>
            <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Prediksi</b></h4>
                    <a class="btn btn-warning" data-toggle="modal" data-target="#forecast">Prediksi Per Prodi</a>
                    <a class="btn btn-warning" data-toggle="modal" data-target="#forecastglobal">Prediksi Global</a>
                    <div class="panel">
                        
                        <div class="panel-content">
                            <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                <thead>
                                <tr class="text-center">
                                    <th rowspan="2">Tahun</th>
                                    <th colspan="4">Fakultas Teknologi & Informasi</th>
                                </tr>
                                <tr class="text-center">
                                    <?php foreach($prodi as $row): ?>
                                    <th><?=$row->prodi?></th>
                                    <?php endforeach?>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($distribusi->result() as $row): ?>
                                    <tr>
                                        <td><?=$row->tahun?></td>
                                        <?php
                                        $gb = 0;
                                        $query = $this->db->get_where('v_prediksi_prodi',['tahun'=>$row->tahun])->result();
                                        foreach ($query as $r) {
                                            echo "<td>".$r->dist."</td>";
                                            $gb += $r->dist;
                                        }
                                        ?>
                                        <td><?=$gb?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th><?=$ti->dist?></th>
                                        <th><?=$sika->dist?></th>
                                        <th><?=$dkv->dist?></th>
                                        <th><?=$ti->dist+$sika->dist+$dkv->dist?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $submitted = $this->input->post("submitted");
            if ($submitted=="global") { ?>
                <div class="row animated fadeInRight">
                    <div class="col-sm-12">
                        <h4 class="section-subtitle"><b>Dicari</b></h4>
                        <div class="panel">
                            <div class="panel-content">
                                <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Tahun</th>
                                        <th>Jumlah Pendaftar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         for($i = $ta_max; $i <= $this->input->post('tahun'); $i++){?>
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
                        
                        <div class="panel">
                            <div class="panel-header">
                                <h4 class="section-subtitle"><b>Pendaftaran</b></h4>
                            </div>
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
                                        <?php
                                        $temp_array=[];
                                        foreach($global as $glob){
                                            $jumlah_x += $x;
                                            $jumlah_y += $glob['dist'];
                                            $jumlah_xy += ($x * $glob['dist']);
                                            $jumlah_xx += ($x * $x);
                                            $temp = [
                                                    'tahun' => $glob['tahun'],
                                                    'dist' => $glob['dist'],
                                                    'x' => $x,
                                                    'xy' => $x * $glob['dist'],
                                                    'xx' => $x * $x
                                                ];
                                           
                                           
                                            ?>
                                        <tr>
                                            <td><?=$glob['tahun']?></td>
                                            <td><?=$glob['dist']?></td>
                                            <td><?=$x?></td>
                                            <td><?=$x * $glob['dist']?></td>
                                            <td><?=$x * $x?></td>
                                        </tr>
                                        <?php
                                         $x+=$tam;
                                         
                                         array_push($temp_array, $temp );
                                          }?>
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
                        <div class="panel">
                            <div class="panel-header">
                                <h1>MAPE</h1>
                            </div>
                            <div class="panel-content">
                                <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Tahun</th>
                                        <th>Aktual</th>
                                        <th>Prediksi</th>
                                        <th>Absolute Percentage Error</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $max_a=0;
                                            foreach ($temp_array as $key) {
                                                ?>
                                            <tr>
                                                <td><?=$key['tahun']?></td>
                                                <td><?=$key['dist']?></td>
                                                <td><?=$pred = (($jumlah_y / $tot['total'])+ (($jumlah_xy/$jumlah_xx)*$key['x']))?></td>
                                                <td><?php
                                                $a = abs((($key['dist'] - $pred) / $key['dist']))*100;
                                                echo number_format($a,2)."%";
                                                $max_a += ($a);
                                                ?></td>
                                            </tr>    
                                        </tbody>
                                        <?php  }?>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3">MAPE</th>
                                                <th><?=number_format($max_a / $tot['total'] ,2)."%"?></th>
                                            </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header">
                                <h1>Prediksi</h1>
                            </div>
                            <div class="panel-content">
                                <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Tahun</th>
                                        <th>x</th>
                                        <th>Prediksi</th>
                                        <th>Selisih</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $cek = $this->db->get_where('tbl_mahasiswa',['ta'=>$this->input->post('tahun')]);
                                        if($cek->num_rows() >0){
                                            $max_a=0;
                                            foreach ($temp_array as $key) {
                                                if($key['tahun'] == $this->input->post('tahun')):
                                                ?>
                                            <tr>
                                                <td><?=$key['tahun']?></td>
                                                <td><?=$key['x']?></td>
                                                <td><?=$pred = (($jumlah_y / $tot['total'])+ (($jumlah_xy/$jumlah_xx)*$key['x']))?></td>
                                                <td><?php
                                                echo $pred-$key['dist'];
                                                ?></td>
                                            </tr>    

                                        <?php endif; }
                                         }else{

                                         for($i = $ta_max; $i <= $this->input->post('tahun'); $i++){?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$x?></td>
                                            <td><?=(($jumlah_y / $tot['total'])+ (($jumlah_xy/$jumlah_xx)*$x))?></td>
                                            <td>0</td>
                                        </tr>
                                        <?php $x+=$tam;}}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }elseif($submitted=="hitung"){?>
            <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-header">
                                <h1>Dicari</h1>
                            </div>
                        <div class="panel-content">
                            <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                <thead>
                                <tr class="text-center">
                                    <th rowspan="2">Tahun</th>
                                    <th colspan="4">Fakultas Teknologi & Informasi</th>
                                </tr>
                                <tr class="text-center">
                                    <?php foreach($prodi as $row): ?>
                                    <th><?=$row->prodi?></th>
                                    <?php endforeach?>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     for($i = $ta_max; $i <= $this->input->post('tahun'); $i++){?>
                                    <tr>
                                        <td><?=$i?></td>
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
                    <div class="panel">
                        <div class="panel-header">
                                <h1>Pendaftar prodi <?=$prod->prodi?></h1>
                            </div>
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
                                        <?php
                                        $temp_array=[];
                                        foreach($distribusi->result() as $row):
                                            $query = $this->db->get_where('v_prediksi_prodi',['tahun'=>$row->tahun,'id_prodi'=>$prod->id_prodi])->result();
                                            foreach ($query as $q){
                                                $jumlah_x += $x;
                                                $jumlah_y += $q->dist;
                                                $jumlah_xy += ($x * $q->dist);
                                                $jumlah_xx += ($x * $x);
                                                $temp = [
                                                        'tahun' => $q->tahun,
                                                        'dist' => $q->dist,
                                                        'x' => $x,
                                                        'xy' => $x * $q->dist,
                                                        'xx' => $x * $x
                                                    ];?>
                                                    <tr>
                                            <td><?=$q->tahun?></td>
                                            <td><?=$q->dist?></td>
                                            <td><?=$x?></td>
                                            <td><?=$x * $q->dist?></td>
                                            <td><?=$x * $x?></td>
                                        </tr>
                                        <?php
                                         $x+=$tam;
                                         array_push($temp_array, $temp );
                                           } endforeach;?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total</td>
                                            <td><?=$jumlah_y?></td>
                                            <td><?=$jumlah_x?></td>
                                            <td><?=$jumlah_xy?></td>
                                            <td><?=$jumlah_xx?></td>
                                        </tr>
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="panel">
                            <div class="panel-header">
                                <h1>MAPE <?=$prod->prodi?></h1>
                            </div>
                            <div class="panel-content">
                                <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Tahun</th>
                                        <th>Aktual</th>
                                        <th>Prediksi</th>
                                        <th>Absolute Percentage Error</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $max_a=0;
                                            foreach ($temp_array as $key) {
                                                ?>
                                            <tr>
                                                <td><?=$key['tahun']?></td>
                                                <td><?=$key['dist']?></td>
                                                <td><?=$pred = (($jumlah_y / $tot['total'])+ (($jumlah_xy/$jumlah_xx)*$key['x']))?></td>
                                                <td><?php
                                                $a = abs((($key['dist'] - $pred) / $key['dist']))*100;
                                                echo number_format($a,2)."%";
                                                $max_a += ($a);
                                                ?></td>
                                            </tr>    
                                        </tbody>
                                        <?php  }?>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3">MAPE <?=$prod->prodi?></th>
                                                <th><?=number_format($max_a / $tot['total'] ,2)."%"?></th>
                                            </tr>
                                    </tfoot>
                                </table>
                            </div>
                    </div>
                    <div class="panel">
                            <div class="panel-header">
                                <h1>Prediksi <?=$prod->prodi?></h1>
                            </div>
                            <div class="panel-content">
                                <table id="responsive-table" class="data-table table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Tahun</th>
                                        <th>x</th>
                                        <th>Prediksi</th>
                                        <th>Selisih</th>
                                        <td>Opsi</td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $cek = $this->db->get_where('tbl_mahasiswa',['ta'=>$this->input->post('tahun')]);
                                        if($cek->num_rows() >0){
                                            $max_a=0;
                                            foreach ($temp_array as $key) {
                                                if($key['tahun'] == $this->input->post('tahun')):
                                                ?>
                                            <tr>
                                                <td><?=$key['tahun']?></td>
                                                <td><?=$key['x']?></td>
                                                <td><?=$pred = (($jumlah_y / $tot['total'])+ (($jumlah_xy/$jumlah_xx)*$key['x']))?></td>
                                                <td><?php
                                                echo $pred-$key['dist'];
                                                ?></td>
                                                <td>
                                                    <form action="<?=site_url('prediksi/simpan')?>" method="post">
                                                        <input type="hidden" name="tahun" value="<?=$key['tahun']?>">
                                                        <input type="hidden" name="prodi" value="<?=$prod->prodi?>">
                                                        <input type="hidden" name="prediksi" value="<?=$pred?>">
                                                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">    
                                                    </form>
                                                    </td>
                                            </tr>    

                                        <?php endif; }
                                         }else{

                                         for($i = $ta_max; $i <= $this->input->post('tahun'); $i++){?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$x?></td>
                                            <td><?=$pred = (($jumlah_y / $tot['total'])+ (($jumlah_xy/$jumlah_xx)*$x))?></td>
                                            <td>0</td>
                                            <td><form action="<?=site_url('prediksi/simpan')?>" method="post">
                                                        <input type="hidden" name="tahun" value="<?=$i?>">
                                                        <input type="hidden" name="prodi" value="<?=$prod->prodi?>">
                                                        <input type="hidden" name="prediksi" value="<?=$pred?>">
                                                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">    
                                                    </form></td>
                                        </tr>
                                        <?php $x+=$tam;}}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
<div class="modal fade" id="forecast" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
    <div class="modal-dialog" role="document">
        <form class="form-login" action="" method="post">
            <div class="modal-content">
                <div class="modal-header state modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-calculator"></i>input tahun periode</h4>
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
                    <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-calculator"></i>input tahun periode</h4>
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