
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
                    <h4 class="section-subtitle"><b>Data Jenjang</b>
                    </h4>
                    <div class="panel ">
                        <div class="panel-header panel-primary">
                            <h3 class="panel-title">Data Jenjang</h3>
                            <div class="panel-actions">
                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalAdd"><span class="fa fa-plus"></span></a>
                            </div>
                        </div>
                        <div class="panel-content">
                            <table class="table table-striped table-bordered table-hover responsive text-center" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
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
        <form id="add-row-form" action="<?=site_url($action)?>" method="post">
            <div class="modal fade" id="modalAdd" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
                        <h5 class="modal-title"><i class="fa fa-edit"></i> <?=$button?></h5>                   
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
        </form>
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
                    ajax: {"url": "jenjang/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_jenjang",
                            "orderable": false
                        },{"data": "jenjang"},
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

<script type="text/javascript">
     $(document).ready(function(){

       // On text click
       $('.edit').click(function(){
          // Hide input element
          $('.txtedit').hide();

          // Show next input element
          $(this).next('.txtedit').show().focus();

          // Hide clicked element
          $(this).hide();
       });

       // Focus out from a textbox
       $('.txtedit').focusout(function(){
          // Get edit id, field name and value
          var edit_id = $(this).data('id');
          var fieldname = $(this).data('field');
          var value = $(this).val();

          // assign instance to element variable
          var element = this;

          // Send AJAX request
          $.ajax({
            url: '<?= site_url() ?>jenjang/update_action',
            type: 'post',
            data: { field:fieldname, value:value, id:edit_id },
            success:function(response){

              // Hide Input element
              $(element).hide();

              // Update viewing value and display it
              $(element).prev('.edit').show();
              $(element).prev('.edit').text(value);
            }
          });
        });
      });
      </script>