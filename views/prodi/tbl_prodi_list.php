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
                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalAdd"><span class="fa fa-plus"></span></a>
                                <?php echo anchor('prodi/create', 'Create', 'class="btn btn-primary"'); ?>
                                <?php echo anchor('prodi/excel', 'Excel', 'class="btn btn-primary"'); ?>
                        		<?php echo anchor('prodi/word', 'Word', 'class="btn btn-primary"'); ?>
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