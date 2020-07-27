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
                            <h3 class="panel-title"><?=$button?> Data Mahasiswa </h3>
                            <div class="panel-actions">
                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#create"><span class="fa fa-plus"></span>Tambah Mahasiswa</a>
                            </div>
                        </div>
                        <div class="panel-content">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nim <?php echo form_error('nim') ?></label>
            <input type="text" class="form-control" name="nim" id="nim" placeholder="Nim" value="<?php echo $nim; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Kelamin <?php echo form_error('jk') ?></label>
            <select class="form-control" name="jk" id="jk">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" <?=($jk=='L')?'selected':''?>>Laki-Laki</option>
                <option value="P" <?=($jk=='P')?'selected':''?>>Perempuan</option>
            </select>
            
        </div>
	    <div class="form-group">
            <label for="int">Fakultas <?php echo form_error('id_fakultas') ?></label>
            <select class="form-control" name="id_fakultas" id="id_fakultas">
                <option value="">Pilih Fakultas</option>
                <?php foreach($fakultas as $row): ?>
                    <option value="<?=$row->id_fakultas?>" <?=($id_fakultas==$row->id_fakultas)?'selected':''?>><?=$row->fakultas?></option>
                <?php endforeach; ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="int">Prodi <?php echo form_error('id_prodi') ?></label>
            <select class="form-control" name="id_prodi" id="id_prodi">
                <option value="">Pilih Prodi</option>
                <?php foreach($prodi as $row): ?>
                    <option value="<?=$row->id_prodi?>" <?=($id_prodi==$row->id_prodi)?'selected':''?>><?=$row->prodi?></option>
                <?php endforeach; ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="int">Sekolah <?php echo form_error('id_sekolah') ?></label>
            <select class="form-control" name="id_sekolah" id="id_sekolah">
                <option value="">Pilih Sekolah</option>
                <?php foreach($sekolah as $row): ?>
                    <option value="<?=$row->id_sekolah?>" <?=($id_sekolah==$row->id_sekolah)?'selected':''?>><?=$row->nama_sekolah?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" maxlength="4"/>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <button type="button" class="btn btn-default" onclick="window.location.href='<?=site_url()?>mahasiswa'">Cancel</button>
	</form>
    </div>
                    </div>
                </div>
            </div>
        </div>