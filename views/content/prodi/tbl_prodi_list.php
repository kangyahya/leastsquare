<div class="content">
            <div class="content-header">
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?=site_url()?>">Dashboard</a></li>
                        <li><a>Prodi</a></li>
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
                            <h3 class="panel-title">Data Prodi</h3>
                            <div class="panel-actions">
                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#create"><span class="fa fa-plus"></span>Tambah Prodi</a>
                            </div>
                        </div>
                        <div class="panel-content">
                            <table class="table table-striped table-bordered table-hover responsive text-center" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Prodi</th>
                                        <th>Fakultas</th>
                                        <th>Jenjang</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="<?=site_url('prodi/create_action')?>" method="post">
        <div class="modal fade" id="create" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="fa fa-edit"></i> Input Fakultas</h5>                   
                    </div>
                    <div class="modal-body">
                        <!--1-->
                        <div class="row">
                            <div class="col-md-3">
                                <label>Prodi</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="prodi" id="prodi" class="form-control" required>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Fakultas</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_fakultas" id="id_fakultas" class="form-control" required>
                                    <option>- Pilih Fakultas -</option>
                                    <?php foreach($fakultas as $fak): ?>
                                        <option value="<?=$fak->id_fakultas?>"><?=$fak->fakultas?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Jenjang</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_jenjang" id="id_jenjang" class="form-control" required>
                                    <option>- Pilih Jenjang -</option>
                                    <?php foreach($jenjang as $jen): ?>
                                        <option value="<?=$jen->id_jenjang?>"><?=$jen->jenjang?></option>
                                    <?php endforeach?>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
                    <p style="text-align:center;float:center;">
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button></p>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <?php foreach($prodi as $prod): ?>
        <form action="<?=site_url('prodi/update_action')?>" method="post">
        <div class="modal fade" id="update<?=$prod->id_prodi?>" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="fa fa-edit"></i> Update Prodi</h5>                   
                    </div>
                    <div class="modal-body">
                        <!--1-->
                        <div class="row">
                            <div class="col-md-3">
                                <label>Prodi</label>
                            </div>
                            <div class="col-md-9">
                                <input type="hidden" name="id_prodi" id="id_prodi" class="form-control" value="<?=$prod->id_prodi?>" required>
                                <input type="text" name="prodi" id="prodi" class="form-control" value="<?=$prod->prodi?>" required>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Fakultas</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_fakultas" id="id_fakultas" class="form-control" required>
                                    <option>- Pilih Fakultas -</option>
                                    <?php foreach($fakultas as $fak): ?>
                                        <option value="<?=$fak->id_fakultas?>" <?=($prod->id_fakultas==$fak->id_fakultas)?'selected':''?>><?=$fak->fakultas?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Jenjang</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_jenjang" id="id_jenjang" class="form-control" required>
                                    <option>- Pilih Jenjang -</option>
                                    <?php foreach($jenjang as $jen): ?>
                                        <option value="<?=$jen->id_jenjang?>" <?=($prod->id_jenjang==$jen->id_jenjang)?'selected':''?>><?=$jen->jenjang?></option>
                                    <?php endforeach?>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
                    <p style="text-align:center;float:center;">
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button></p>
                    </div>
                </div>
            </div>
        </div>
        </form>


        <form action="<?=site_url('prodi/delete')?>" method="post">
        <div class="modal fade" id="delete<?=$prod->id_prodi?>" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                    <h5 class="modal-title"><i class="fa fa-edit"></i> Delete Prodi</h5>                   
                    </div>
                    <div class="modal-body">
                        <!--1-->
                        <div class="row">
                            <div class="col-md-12">
                                <p>Yakin ingin menghapus prodi ini ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
                    <p style="text-align:center;float:center;">
                    <input type="hidden" id="id_prodi" name="id_prodi" value="<?=$prod->id_prodi?>">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button></p>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <?php endforeach; ?>
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
                    ajax: {"url": "prodi/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_prodi",
                            "orderable": false
                        },
                        {
                            "data": "prodi",
                            "className":"text-left"},
                        {
                            "data": "fakultas",
                            "className":"text-left"
                        },
                        {"data": "jenjang"},
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
            });
        </script>