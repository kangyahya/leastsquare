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
                            <!--HOME-->
                            <li class="<?=($this->uri->segment(1)=='dashboard'||$this->uri->segment(1)==''?'active-item':'')?>"><a href="<?=site_url()?>"><i class="fa fa-home " aria-hidden="true"></i><span>Dashboard</span></a></li>
                            
                            <!-- Users -->
                            <li class="<?=($this->uri->segment(1)=='users'?'active-item':'')?>"><a href="<?=site_url('forecasting')?>"><i class="fa fa-user " aria-hidden="true"></i><span>Users</span></a></li>
                            <!-- Sekolah -->
                            <li class="<?=($this->uri->segment(1)=='sekolah'?'active-item':'')?>"><a href="<?=site_url('forecasting')?>"><i class="fa fa-school " aria-hidden="true"></i><span>Sekolah</span></a></li>
                            <!-- Fakultas -->
                            <li class="<?=($this->uri->segment(1)=='fakultas'?'active-item':'')?>"><a href="<?=site_url('forecasting')?>"><i class="fa fa-university " aria-hidden="true"></i><span>Fakultas</span></a></li>
                            <!-- Prodi -->
                            <li class="<?=($this->uri->segment(1)=='prodi'?'active-item':'')?>"><a href="<?=site_url('forecasting')?>"><i class="fa fa-university " aria-hidden="true"></i><span>Prodi</span></a></li>
                            <!-- Data PMB -->
                            <li class="<?=($this->uri->segment(1)=='pmb'?'active-item':'')?>"><a href="<?=site_url('forecasting')?>"><i class="fa fa-calculator " aria-hidden="true"></i><span>Data PMB</span></a></li>
                            <!-- Laporan -->
                            <li class="<?=($this->uri->segment(1)=='laporan'?'active-item':'')?>"><a href="<?=site_url('forecasting')?>"><i class="fa fa-calculator " aria-hidden="true"></i><span>Laporan</span></a></li>
                            <!--Forecasting-->
                            <li class="<?=($this->uri->segment(1)=='forecasting'?'active-item':'')?>"><a href="<?=site_url('forecasting')?>"><i class="fa fa-calculator " aria-hidden="true"></i><span>Forecasting</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>