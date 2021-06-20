<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php base_url(); ?>welcome" class="site_title"><img src="<?php echo base_url(); ?>assets/website/images/logo.png" width="90%"></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo base_url(); ?>assets/build/images/user.jpg" alt="User" class="img-circle profile_img">
            </div>

            <div class="profile_info">
                <span>Welcome,</span>
                <!-- <h2><?php echo $user_details['firstName'] . ' ' . $user_details['lastName'] ?></h2> -->
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="<?php echo base_url(); ?>dashboard/welcome"><i class="fa fa-home"></i> Home </span>
                        </a>
                    </li>
                    <li>
                        <a><i class="fa fa-edit"></i>Cemeteries <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url(); ?>dashboard/add_cemetery"><i class="fa fa-edit"></i> Add Cemetery </a></li>
                            <li><a href="<?php echo base_url(); ?>dashboard/list_cemetery">list Cemetery</a></li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-edit"></i>Obituary <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url(); ?>dashboard/add_obituary"><i class="fa fa-edit"></i> Add Obituary </a></li>
                            <li><a href="<?php echo base_url(); ?>dashboard/obituary_list"><i class="fa fa-edit"></i> Obituaries list </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>