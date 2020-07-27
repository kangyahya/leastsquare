<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tbl_prodi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Prodi <?php echo form_error('prodi') ?></label>
            <input type="text" class="form-control" name="prodi" id="prodi" placeholder="Prodi" value="<?php echo $prodi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Fakultas <?php echo form_error('id_fakultas') ?></label>
            <input type="text" class="form-control" name="id_fakultas" id="id_fakultas" placeholder="Id Fakultas" value="<?php echo $id_fakultas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jenjang <?php echo form_error('id_jenjang') ?></label>
            <input type="text" class="form-control" name="id_jenjang" id="id_jenjang" placeholder="Id Jenjang" value="<?php echo $id_jenjang; ?>" />
        </div>
	    <input type="hidden" name="id_prodi" value="<?php echo $id_prodi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('prodi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>