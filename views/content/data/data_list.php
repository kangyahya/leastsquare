        
        <div class="content">
            <div class="content-header">
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?=site_url()?>">Dashboard</a></li>
                        <li><a>PMB</a></li>
                    </ul>
                </div>
            </div>
            <div class="row animated">
                <div class="col-sm-12">
                    <div class="col-md-4 text-center">
                    <div style="margin-top: 4px"  id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                    <div class="panel ">
                        <div class="panel-header panel-primary">
                            <h3 class="panel-title">Data PMB</h3>
                            <div class="panel-actions">
                               <div class="col-md-4 text-right">
                                    <?php echo anchor('pmb#create', 'Create', array('class'=>"btn btn-primary",'data-toggle'=>'modal')); ?>
                               </div>
                            </div>
                        </div>
                        <div class="panel-content">
                            <table class="table table-bordered table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>TA</th>
                                        <th>Fakultas</th>
                                        <th>Prodi</th>
                                        <th>Jenjang</th>
                                        <th>Jml Pendaftar</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tambah data pmb -->
        <form action="<?=site_url('pmb/create_action')?>" method="post">
        <div class="modal fade" id="create" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="fa fa-edit"></i> Input Data PMB</h5>                   
                    </div>
                    <div class="modal-body">
                        <!--1-->
                        <div class="row">
                            <div class="col-md-3">
                                <label>Tahun Akademik</label>
                            </div>
                            <div class="col-md-9">
                                <select name="ta" id="ta" class="form-control" required>
                                    <option>- Pilih Tahun Akademik -</option>
                                    <?php
                                        for($i = 2012; $i <= date('Y'); $i++){?>
                                           <option value='<?=$i++.'/'.$i--?>'><?=$i++.'/'.$i--?></option>
                                    <?php }?>
                                </select>
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
                                <label>Prodi</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_prodi" id="id_prodi" class="form-control" required>
                                    <option>- Pilih Prodi -</option>
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
                        <div class="row">
                            <div class="col-md-3">
                                <label>Jumlah Pendaftar</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="jml_pendaftar" id="jml_pendaftar" class="form-control" required>
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
        <?php foreach($pmb as $p): ?>
        <form action="<?=site_url('pmb/update_action')?>" method="post">
        <div class="modal fade" id="update<?=$p->id_pmb?>" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="fa fa-edit"></i> Update PMB</h5>                   
                    </div>
                    <div class="modal-body">
                        <!--1-->
                        <div class="row">
                            <div class="col-md-3">
                                <label>Tahun Akademik</label>
                            </div>
                            <div class="col-md-9">
                                <select name="ta" id="ta" class="form-control" required>
                                    <option>- Pilih Tahun Akademik -</option>
                                    <?php
                                        for($i = 2012; $i <= date('Y'); $i++){?>
                                           <option value='<?=$i++.'/'.$i--?>' <?=($i++.'/'.$i-- == $p->ta)?'selected':''?>><?=$i++.'/'.$i--?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Fakultas</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_fakultas" id="id_fakultas_edit" class="form-control" required>
                                    <option>- Pilih Fakultas -</option>
                                    <?php foreach($fakultas as $fak): ?>
                                        <option value="<?=$fak->id_fakultas?>" <?=($p->id_fakultas==$fak->id_fakultas)?'selected':''?>><?=$fak->fakultas?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Prodi</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_prodi" id="id_prodi_edit" class="form-control" required>
                                    <option>- Pilih Prodi -</option>
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
                                        <option value="<?=$jen->id_jenjang?>" <?=($p->id_jenjang==$jen->id_jenjang)?'selected':''?>><?=$jen->jenjang?></option>
                                    <?php endforeach?>
                                </select>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Jumlah Pendaftar</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="jml_pendaftar" id="jml_pendaftar" class="form-control" required value="<?=$p->jml_pendaftar?>">
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
                    <p style="text-align:center;float:center;">
                    <input type="hidden" name="id_prodi_editt" value="<?=$p->id_prodi?>" id="id_prodi_editt">
                    <input type="hidden" name="id_pmb" value="<?=$p->id_pmb?>">
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
                    ajax: {"url": "pmb/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_pmb",
                            "orderable": false
                        },
                        {
                            "data": "ta",
                            "className":"text-left"
                        },
                        {
                            "data": "fakultas",
                            "className":"text-left"
                        },
                        {
                            "data": "prodi"
                        },
                        {
                            "data": "jenjang",
                            "className":"text-left"
                        },
                        {
                            "data": "jml_pendaftar"
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
                $('#id_fakultas').change(function() { // Jika Select Box id provinsi dipilih
                 var id = $(this).val(); // Ciptakan variabel provinsi
                 $.ajax({
                    method: 'POST', // Metode pengiriman data menggunakan POST
                    url: "<?=site_url('pmb/get_prodi')?>", // File yang akan memproses data
                    dataType :'json',
                    data: {id:id}, // Data yang akan dikirim ke file pemroses
                    async :true,
                    success: function(response) { // Jika berhasil
                        let html = '';
                        var i ;
                        for(i=0; i<response.length;i++){
                            html += `
                            <option value=${response[i].id_prodi}>${response[i].prodi}</option>
                            `;
                        }
                        $('#id_prodi').html(html);
                        }
                   });
                 return false;
                });

                $('#id_fakultas_edit').select(function() { // Jika Select Box id provinsi dipilih
                    get_data_edit();
                 var id = $(this).val(); // Ciptakan variabel provinsi
                 var id_prodi = $('#id_prodi_editt').val();
                 $.ajax({
                    method: 'POST', // Metode pengiriman data menggunakan POST
                    url: "<?=site_url('pmb/get_prodi')?>", // File yang akan memproses data
                    dataType :'json',
                    data: {id:id}, // Data yang akan dikirim ke file pemroses
                    async :true,
                    success: function(response) { // Jika berhasil
                        $('select[name="id_prodi"]').empty();
                        $.each(response, function(key, value){
                            if(id_prodi==value.id_prodi){
                                $('select[name="id_prodi"]').append(`<option value="${value.id_prodi}" selected>${value.prodi}</option>`).trigger('change');
                            }else{
                                $('select[name="id_prodi"]').append(`<option value="${value.id_prodi}">${value.prodi}</option>`);
                            }
                        })
                        
                        }
                   });
                 return false;
                });

                function get_data_edit(){
                    let id_pmb = $('[name="id_pmb"]').val();
                    $.ajax({
                        url : "<?=site_url('pmb/get_data_edit')?>",
                        method:'POST',
                        data: {id_pmb:id_pmb},
                        async:true,
                        dataType:'json',
                        success : function(data){
                            $.each(data, function(i, item){
                                $('[name="id_pmb"]').val(data[i].id_pmb);
                                $('[name="ta"]').val(data[i].ta);
                                $('[name="id_fakultas"]').val(data[i].id_fakultas).trigger('change');
                                $('[name="id_prodi"]').val(data[i].id_prodi).trigger('change');
                                $('[name="id_jenjang"]').val(data[i].id_jenjang);
                                $('[name="jml_pendaftar"]').val(data[i].jml_pendaftar);
                            })
                        }
                    });
                }
            });
        </script>