<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_prodi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Prodi</th>
		<th>Id Fakultas</th>
		<th>Id Jenjang</th>
		
            </tr><?php
            foreach ($prodi_data as $prodi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $prodi->prodi ?></td>
		      <td><?php echo $prodi->id_fakultas ?></td>
		      <td><?php echo $prodi->id_jenjang ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>