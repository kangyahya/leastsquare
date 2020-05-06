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
                    <h4 class="section-subtitle"><b>Tambah Data Distribusi</b></h4>
                    <form method="post" action="">
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
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" size="4" class="form-control" name="tahun"/>
                                        </div>
                                    </td>
                                    <?php for($i = 1;$i<=8; $i++){?>
                                    <input type="hidden" size="2" class="form-control" value="1" name="fakultas[1]"/>
                                    <input type="hidden" size="2" class="form-control" value="1" name="fakultas[2]"/>
                                    <input type="hidden" size="2" class="form-control" value="1" name="fakultas[3]"/>
                                    <input type="hidden" size="2" class="form-control" value="1" name="fakultas[4]"/>
                                    <input type="hidden" size="2" class="form-control" value="1" name="fakultas[5]"/>
                                    <input type="hidden" size="2" class="form-control" value="2" name="fakultas[6]"/>
                                    <input type="hidden" size="2" class="form-control" value="2" name="fakultas[7]"/>
                                    <input type="hidden" size="2" class="form-control" value="2" name="fakultas[8]"/>

                                    <input type="hidden" size="2" class="form-control" value="1" name="jenjang[1]"/>
                                    <input type="hidden" size="2" class="form-control" value="1" name="jenjang[2]"/>
                                    <input type="hidden" size="2" class="form-control" value="1" name="jenjang[3]"/>
                                    <input type="hidden" size="2" class="form-control" value="2" name="jenjang[4]"/>
                                    <input type="hidden" size="2" class="form-control" value="2" name="jenjang[5]"/>
                                    <input type="hidden" size="2" class="form-control" value="1" name="jenjang[6]"/>
                                    <input type="hidden" size="2" class="form-control" value="1" name="jenjang[7]"/>
                                    <input type="hidden" size="2" class="form-control" value="2" name="jenjang[8]"/>
                                    
                                    <input type="hidden" size="2" class="form-control" value="<?=$i?>" name="prodi[<?=$i?>]"/>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" size="2" class="form-control" name="dist[<?=$i?>]"/>
                                        </div>
                                    </td>
                                    <?php }?>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <input name="submitted" type="hidden" value="1"/>
                    </form>
                </div>
            </div>
        </div>