

	<div id="loader">
		<img src="<?php echo base_url()."tmp/public/";?>images/logo-4g.png" alt="" class="img-responsive image-loader">
	</div>

	<header class="col-xs-12 noPadding" id="header">
		<div class="top-bar col-xs-12 noPadding">
			<div class="container">
				<ul class="text-right">
					<li><a href="" title="<?php echo lang('login');?>"><i class="fa fa-sign-in"></i> <?php echo lang('login');?></a> / <a href="" title="<?php echo lang('regis');?>"><?php echo lang('regis');?></a></li>
					<li><a href="javascript:void(0)" title="Tiếng Việt" class="lang" data-lang="vi"><img src="<?php echo base_url()."tmp/public/";?>images/vi.png" alt="" class="img-responsive"> </a></li>
					<li><a href="javascript:void(0)" title="English" class="lang" data-lang="en"><img src="<?php echo base_url()."tmp/public/";?>images/us.png" alt="" class="img-responsive"> </a></li>
				</ul>
			</div>
		</div><!-- /.top-bar -->
		<div class="main-navigation col-xs-12 noPadding">
			<nav class="navbar main-navbar" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target=".responsive-navbar">
							<span class="sr-only">Toggle navigation</span>
							<span>
	                          	<span class="icon-bar"></span>
	                          	<span class="icon-bar"></span>
	                          	<span class="icon-bar"></span>
	                        </span>
						</button>
						<a class="navbar-brand" href="#" title="4G Mobifone"><img src="<?php echo base_url()."tmp/public/";?>images/logo.png" alt="" class="img-responsive"></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="navbar-offcanvas navbar-offcanvas-touch responsive-navbar">
						<?php
						$newArrayMenu = array();
						foreach ($_web['menu'] as $value) {
							$parent = $value['parent_id'];
							$newArrayMenu[$parent][] = $value;
						}
						recursiveMenu($newArrayMenu);
						?>
					</div><!-- /.navbar-collapse -->
					
				</div>
			</nav>
		</div><!-- /.main-navigation -->
	</header>