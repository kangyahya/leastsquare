        <div class="content">
            <div class="content-header">
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?=site_url()?>">Dashboard</a></li>
                        <li><a>Fakultas</a></li>
                    </ul>
                </div>
            </div>
            <div class="row animated">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Data Fakultas</b>
                    </h4>
                    <div class="panel ">
                        <div class="panel-header panel-primary">
                            <h3 class="panel-title">Data Fakultas</h3>
                            <div class="panel-actions">
                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalAdd"><span class="fa fa-plus"></span> Tambah Fakultas</a>
                            </div>
                        </div>
                        <div class="panel-content">
                            <table id="responsive-table" class="table table-striped table-bordered table-hover responsive text-center" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Fakultas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="update_fakultas" role="dialog">
		<div class="modal-dialog modal-md">
		  <div class="modal-content">
			<div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Update</h5>
			 
			</div>
			<div class="modal-body">
				<!--1-->
				<div class="row">
					<div class="col-md-3">
					    <label>Fakultas</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="fakultas" id="fakultas" class="form-control" required>
					</div>	
				</div>
				<input type="hidden" name="id_fakultas" id="id_fakultas" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
            <p style="text-align:center;float:center;">
            <button type="submit" id="update_data" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Save</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
			
		  </div>
		  </div>
		</div>
    </div>
    <!-- Modal add -->
    <div class="modal fade" id="modalAdd" role="dialog">
		<div class="modal-dialog modal-md">
		  <div class="modal-content">
			<div class="modal-header modal-primary">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Tambah</h5>
			 
			</div>
			<div class="modal-body">
				<!--1-->
				<div class="row">
					<div class="col-md-3">
					    <label>Fakultas</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="fakultas" id="fakultas" class="form-control" required>
					</div>	
				</div>
				<input type="hidden" name="id_fakultas" id="id_fakultas" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
            <p style="text-align:center;float:center;">
            <button type="submit" id="btn_tambah" class="btn btn-success btn-sm">Save</button>
			<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button></p>
			
		  </div>
		  </div>
		</div>
    </div>
    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script>
$(document).ready(function(){
    tampil_data_fakultas();
    $('#responsive-table').dataTable();
    function tampil_data_fakultas(){
        $.ajax({
            type:'GET',
            url:'<?=site_url()?>sekretariat/fakultas',
            async:true,
            dataType:'json',
            success:function(data){
                var html =``;
                var i;
                var no =1;
                for(i=0; i<data.length; i++){
                    html += `
                    <tr>
                        <td>${no+i}</td>
                        <td>${data[i].fakultas}</td>
                        <td class="text-right">
                            <a href="javascript:" class="btn btn-info btn-xs item_edit" data="${data[i].id_fakultas}">Edit</a>
                            <a href="javascript:" class="btn btn-danger btn-xs item_hapus" data="${data[i].id_fakultas}">Hapus</a>
                        </td>
                    </tr>
                    `
                }
                $('#show_data').html(html);
            }
        });
    }
    //GET UPDATE
    $('#show_data').on('click','.item_edit',function(){
        var id =$(this).attr('data');
        $.ajax({
            type:'GET',
            url:'<?=site_url()?>sekretariat/fakultas/get',
            dataType:'JSON',
            data:{id:id},
            success:function(data){
                $.each(data,function(id_fakultas, fakultas){
                    $('#update_fakultas').modal('show');
                    $('[name=id_fakultas]').val(data.id_fakultas);
                    $('[name=fakultas]').val(data.fakultas);
                });
            }
        });
        return false;
    });

    //UPDATE
    $('#update_data').on('click',function(){
        var id_fakultas=$('#id_fakultas').val();
        var fakultas=$('#fakultas').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('sekretariat/fakultas/update')?>",
            dataType : "JSON",
            data : {id_fakultas:id_fakultas , fakultas:fakultas},
            success: function(data){
                $('[name="id_fakultas"]').val("");
                $('[name="fakultas"]').val("");
                $('#update_fakultas').modal('hide');
                tampil_data_fakultas();
            }
        });
        return false;
    });
        $('#btn_simpan').on('click',function(){
            var fakultas=$('#fakultas').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('sekretariat/fakultas/add')?>",
                dataType : "JSON",
                data : { fakultas:fakultas},
                success: function(data){
                    $('[name="kobar"]').val("");
                    $('[name="nabar"]').val("");
                    $('[name="harga"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_fakultas();
                }
            });
            return false;
        });
});

</script>