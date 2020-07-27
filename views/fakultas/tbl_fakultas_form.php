
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
                    <h4 class="section-subtitle"><b>Fakultas <?php echo $button ?></b>
                    </h4>
                    <div class="panel ">
                        <div class="panel-header panel-primary">
                            <h3 class="panel-title"><?php echo $button ?> Data Fakultas</h3>
                            
                        </div>
                        <div class="panel-content">
                            <form action="<?php echo $action; ?>" method="post">
                                <div class="form-group">
                                    <label for="varchar">Fakultas <?php echo form_error('fakultas') ?></label>
                                    <input type="text" class="form-control" name="fakultas" id="fakultas" placeholder="Fakultas" value="<?php echo $fakultas; ?>" />
                                </div>
                                <input type="hidden" name="id_fakultas" value="<?php echo $id_fakultas; ?>" /> 
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                <button type="button" class="btn btn-default" onclick="window.location.href='<?=site_url()?>fakultas'">Cancel</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>