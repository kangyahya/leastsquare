
        <div class="content">
            <div class="content-header">
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?=site_url()?>">Dashboard</a></li>
                        <li><a>Sekolah</a></li>
                    </ul>
                </div>
            </div>
            <div class="row animated">
                <div class="col-sm-12">
                    <div class="panel ">
                        <div class="panel-header panel-primary">
                            <h3 class="panel-title">Data Sekolah</h3>
                            <div class="panel-actions">
                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalAdd"><span class="fa fa-plus"></span> Tambah Sekolah</a>
                            </div>
                        </div>
                        <div class="panel-content">
                            <table class="table table-striped table-bordered table-hover responsive text-center" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Sekolah</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form id="add-row-form" action="<?=site_url('sekolah/create_action')?>" method="post">
        <div class="modal fade" id="modalAdd" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
                    <h5 class="modal-title"><i class="fa fa-edit"></i> Tambah Sekolah</h5>                   
                    </div>
                    <div class="modal-body">
                        <!--1-->
                        <div class="row">
                            <div class="col-md-3">
                                <label>Sekolah</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" required>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
                    <p style="text-align:center;float:center;">
                    <button type="submit" id="update_data" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
                    </div>
                </div>
            </div>
        </div>
        </form>
        
        <?php foreach($sekolah as $skl): ?>
        <form action="<?=site_url('sekolah/update_action')?>" method="post">
        <div class="modal fade" id="update<?=$skl->id_sekolah?>" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
                    <h5 class="modal-title"><i class="fa fa-edit"></i> Update</h5>                   
                    </div>
                    <div class="modal-body">
                        <!--1-->
                        <div class="row">
                            <div class="col-md-3">
                                <label>Sekolah</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" value="<?=$skl->nama_sekolah?>" required>
                            </div>	
                        </div>
                        <input type="hidden" name="id_sekolah" id="id_sekolah" value="<?=$skl->id_sekolah?>" class="form-control-sm">
                    </div>
                    <div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
                    <p style="text-align:center;float:center;">
                    <button type="submit" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Update</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <form action="<?=site_url('sekolah/delete_action')?>" method="post">
        <div class="modal fade" id="delete<?=$skl->id_sekolah?>" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-danger" style="color:#fff;background-color: #e35f14;padding:6px;">
                    <h5 class="modal-title"><i class="fa fa-edit"></i> Delete</h5>                   
                    </div>
                    <div class="modal-body">
                        <!--1-->
                        <div class="row">
                            <div class="col-md-12">
                                <p>Yakin ingin menghapus data ini ?</p>
                            </div>  
                        </div>
                        <input type="hidden" name="id_sekolah" id="id_sekolah" value="<?=$skl->id_sekolah?>" class="form-control-sm">
                    </div>
                    <div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
                    <p style="text-align:center;float:center;">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
                    </div>
                </div>
            </div>
        </div>
        </form>
    <?php endforeach;?>
        
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "<?=site_url()?>sekolah/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_sekolah",
                            "orderable": false
                        },
                        {
                            "data": "nama_sekolah",
                            "className" : "text-left"
                        },
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
                // // GET DATA
                // $('#mytable').on('click','.item_edit',function(){
                //     var id_fakultas=$(this).data('id_fakultas');
                //     var fakultas=$(this).data('fakultas');
                //         $('#update').modal('show');
                //         $('[name="id_fakultas"]').val(id_fakultas);
                //         $('[name="fakultas"]').val(fakultas);
                // });
            });
        </script>
    
