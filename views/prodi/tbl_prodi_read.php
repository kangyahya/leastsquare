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
        <h2 style="margin-top:0px">Tbl_prodi Read</h2>
        <table class="table">
	    <tr><td>Prodi</td><td><?php echo $prodi; ?></td></tr>
	    <tr><td>Id Fakultas</td><td><?php echo $id_fakultas; ?></td></tr>
	    <tr><td>Id Jenjang</td><td><?php echo $id_jenjang; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('prodi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>