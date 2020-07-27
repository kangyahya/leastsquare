 <div class="content">
            <div class="content-header">
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?=site_url()?>">Dashboard</a></li>
                        <li><a>Mahasiswa</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>

            <div class="row animated">
                <div class="col-sm-12">
                    <div class="panel ">
                        <div class="panel-header panel-primary">
                            <h3 class="panel-title">Data Mahasiswa</h3>
                            <div class="panel-actions">
                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#create"><span class="fa fa-plus"></span>Tambah Mahasiswa</a>
                            </div>
                        </div>
                        <div class="panel-content">
        <table class="table">
	    <tr><td>Nim</td><td><?php echo $nim; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo ($jk=='P')?'Perempuan':'Laki - Laki'; ?></td></tr>
	    <tr><td>Fakultas</td><td><?php echo $fakultas; ?></td></tr>
	    <tr><td>Prodi</td><td><?php echo $prodi; ?></td></tr>
	    <tr><td>Sekolah</td><td><?php echo $nama_sekolah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mahasiswa') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
    </div>
                    </div>
                </div>
            </div>
        </div>