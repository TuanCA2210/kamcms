<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CMS</b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu lnc_nav">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php 
            if ($_web['lang']=='vi') { ?>
              <img src="<?php echo base_url();?>tmp/public/images/vi.png" alt="">
              Vietnames
            <?php 
            }else{ ?>
              <img src="<?php echo base_url();?>tmp/public/images/us.png" alt="">
              English
            <?php 
            }
            ?>
              
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="javascript:;" class="lang_hd" data-lang="en">
                      <div class="pull-left">
                        <img src="<?php echo base_url();?>tmp/public/images/us.png" alt="">
                        English
                      </div>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="javascript:;" class="lang_hd" data-lang="vi">
                      <div class="pull-left">
                        <img src="<?php echo base_url();?>tmp/public/images/vi.png" alt="">
                        Vietnames
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>tmp/public/images/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo Session::get('username'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>tmp/public/images/avatar.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo Session::get('username'); ?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url().'login/login/logout';?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>