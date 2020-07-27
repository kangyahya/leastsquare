
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
                <?php echo $this->session->flashdata('notif') ?>
            </div>

            <div class="row animated">
                <div class="col-sm-12">
                    <div class="panel ">
                        <div class="panel-header panel-primary">
                            <h3 class="panel-title">Data Mahasiswa</h3>
                            <div class="panel-actions">
                                <a href="<?=site_url('mahasiswa/create')?>" class="btn btn-sm btn-info"><span class="fa fa-plus"></span>Tambah Mahasiswa</a>
                                <a href="#importexcel" data-toggle="modal" class="btn btn-sm btn-secondary">Import Excel</a>
                            </div>
                        </div>
                        <div class="panel-content">
                            <table class="table table-bordered table-striped responsive" width="100%" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Fakultas</th>
                                <th>Prodi</th>
                                <th>Asal Sekolah</th>
                                <th>Tahun</th>
                                <th width="200px">Action</th>
                                    </tr>
                                </thead>
                            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="importexcel" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
            <div class="modal-dialog" role="document">
                <form class="form-login" action="<?=site_url('mahasiswa/upload')?>" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header state modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-calculator"></i>Import data mahasiswa</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="file" size="4" class="form-control" name="userfile"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="submitted" value="hitung"/>
                            <button type="submit" class="btn btn-success">Upload</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
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
                    ajax: {"url": "<?=site_url('mahasiswa')?>/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },{"data": "nim"},{"data": "nama"},{"data": "jk"},{"data": "fakultas"},{"data": "prodi"},{"data": "nama_sekolah"},{"data": "ta"},
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