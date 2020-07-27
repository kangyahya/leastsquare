        <div class="left-sidebar">
            <!-- left sidebar HEADER -->
            <div class="left-sidebar-header">
                <div class="left-sidebar-title">Navigation</div>
                <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                    <span></span>
                </div>
            </div>
            <!-- NAVIGATION -->
            <!-- ========================================================= -->
            <div id="left-nav" class="nano">
                <div class="nano-content">
                    <nav>
                        <ul class="nav" id="main-nav">
                            <?php if ($this->session->userdata('user_role')=='Master') { ?>
                                <li class="<?=($this->uri->segment(1)=='dashboard'||$this->uri->segment(1)==''?'active-item':'')?>"><a href="<?=site_url()?>"><i class="fa fa-home " aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <li class="<?=($this->uri->segment(1)=='users'?'active-item':'')?>"><a href="<?=site_url('users')?>"><i class="fa fa-user " aria-hidden="true"></i><span>Users</span></a></li>
                            <?php }elseif ($this->session->userdata('user_role')=='Sekretariat') { ?>
                                <li class="<?=($this->uri->segment(1)=='dashboard'||$this->uri->segment(1)==''?'active-item':'')?>"><a href="<?=site_url()?>"><i class="fa fa-home " aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <!-- Mahasiswa -->
                                <li class="<?=($this->uri->segment(1)=='mahasiswa'?'active-item':'')?>"><a href="<?=site_url('mahasiswa')?>"><i class="fa fa-user " aria-hidden="true"></i><span>Mahasiswa</span></a></li>
                                <li class="<?=($this->uri->segment(1)=='prediksi'?'active-item':'')?>"><a href="<?=site_url('prediksi')?>"><i class="fa fa-calculator " aria-hidden="true"></i><span>Prediksi</span></a></li>
                            <?php }else{ ?>
                                <li class="<?=($this->uri->segment(1)=='dashboard'||$this->uri->segment(1)==''?'active-item':'')?>"><a href="<?=site_url()?>"><i class="fa fa-home " aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <li class="<?=($this->uri->segment(1)=='prediksi'?'active-item':'')?>"><a href="<?=site_url('prediksi')?>"><i class="fa fa-calculator " aria-hidden="true"></i><span>Prediksi</span></a></li>
                            <?php }?>
                            
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>