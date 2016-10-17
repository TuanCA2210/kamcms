<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url();?>">Start Bootstrap
            	<!--<img src="<?php echo $_web['base_url_cdn'].$_web['settings']['logo'];?>" alt="" class="img-responsive">-->
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
			$newArrayMenu = array();
			foreach ($_web['menu'] as $value) {
				$parent = $value['parent_id'];
				$newArrayMenu[$parent][] = $value;
			}
			recursiveMenu($newArrayMenu);
			?>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url().'dang-nhap.htm';?>" title="<?php echo lang('login');?>"><i class="fa fa-sign-in"></i> <?php echo lang('login');?></a> </li>
				<li><a href="<?php echo base_url().'dang-nhap.htm';?>" title="<?php echo lang('regis');?>"><?php echo lang('regis');?></a></li>
				<li><a href="javascript:void(0)" title="Tiếng Việt" class="lang" data-lang="vi"><img src="<?php echo base_url()."tmp/public/";?>images/vi.png" alt="" class="img-responsive"> </a></li>
				<li><a href="javascript:void(0)" title="English" class="lang" data-lang="en"><img src="<?php echo base_url()."tmp/public/";?>images/us.png" alt="" class="img-responsive"> </a></li>
			</ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>