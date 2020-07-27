    <div class="page-header">
        <div class="leftside-header">
            <div class="logo">
                <a href="<?=site_url()?>" class="on-click">
                    <img alt="logo" src="<?=BASE_URL()?>assets/images/logo-white.png" />
                </a>
            </div>
            <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <div class="rightside-header">
            <div class="header-middle"></div>
            <div class="header-section" id="search-headerbox">
                <input type="text" name="search" id="search" placeholder="Search..." />
                <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                <div class="header-separator"></div>
            </div>
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <img src="<?=BASE_URL()?>uploads/images/<?=$this->session->userdata['user_avatar']?>" alt="Jane Doe" />
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?=$this->session->userdata['user_nickname']?></span>
                        <span class="user-profile"><?=$this->session->userdata['user_role']?></span>
                    </div>
                </div>
               
            </div>
            <div class="header-separator"></div>
            <div class="header-section">
                <a href="<?=SITE_URL('dashboard/logout')?>" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out-alt log-out" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
