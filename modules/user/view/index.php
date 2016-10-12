


	<main id="main" class="col-xs-12 noPadding main">
		<div class="container">
			<div class="row">
				<article class="right-content single-content col-xs-12 col-md-8">
					<ol class="breadcrumb">
						<li>
							<a href="#"><i class="fa fa-home"></i></a>
						</li>
						<li class="active"><?php echo lang('login');?> - <?php echo lang('regis');?></li>
					</ol>

					<div class="f-ctn-centers col-md-12 col-xs-12 col-sm-12 ">

					    <!-- content-->
					    <div class=" login">
					        <div class="row">
					            <div class="col-md-6">
					                <div class="v2-login">
					                    <form action="" method="POST">
					                        <h3><?php echo lang('login');?></h3>
					                        <div class="input-group"><input type="email" class="form-control" id="txtemail" name="txtemail" value="" placeholder="<?php echo lang('email');?>">
					                        </div><br>
					                        <div class="input-group"><input type="password" class="form-control" id="txtpassword" name="txtpassword" value="" placeholder="<?php echo lang('password')?>">
					                        </div><br><a class="text-center text-danger" href="<?php echo base_url();?>"><?php echo lang('forgot');?></a><button type="submit" name="login_ok" class="btn btn-primary"><?php echo lang('login');?></button></form>
					                </div>
					            </div>
					            <div class="col-md-6">
					            	<?php 
					            	if (!empty($this->error)) {
					            		echo '<div class="alert alert-danger">
  												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  												<strong>'.lang('warning').'!</strong>';
												
					            		foreach ($this->error as $key => $value) {
					            			echo "<p>".$value."</p>";
					            		}
					            		echo '</div>';
					            	}
					            	if (!empty($this->success)) {
					            		echo '<div class="alert alert-success">
  												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  												<strong>'.lang('success').'!</strong>';
												
					            		foreach ($this->success as $key => $value) {
					            			echo "<p>".$value."</p>";
					            		}
					            		echo '</div>';
					            	}

					            	?>
					                <div class="v2-reg">
					                    <form action="" method="POST">
					                        <h3><?php echo lang('regis_new');?></h3>
					                        <input type="hidden" name="_token" value="<?php echo $this->data['_token'];?>">
					                        <div class="input-group"><input type="text" class="form-control email" id="email" name="email" value="" placeholder="<?php echo lang('email');?>">
					                        </div><br>
					                        <div class="input-group"><input type="text" class="form-control name" id="name" name="username" value="" placeholder="<?php echo lang('username');?>">
					                        </div><br>
					                        <div class="input-group"><input type="password" class="form-control" id="password" name="password" value="" placeholder="<?php echo lang('password');?>">
					                        </div><br>
					                        <div class="input-group"><input type="password" class="form-control" id="repassword" name="repassword" value="" placeholder="<?php echo lang('repassword');?>">
					                        </div><br />
					                        <div class="form-group check_capcha">
					                            <div style="float: left; padding: 1px 5px 0 0; width: 40%;">
					                            	<input type="text" placeholder="<?php echo lang('capcha_code');?>" class="form-control" id="captcha_cha" name="captcha_cha" value="">
					                            </div>
					                            <span>
					                            <img id="capt_img_ct" src="<?php echo base_url().'index.php?mod=user&controller=user&action=capcha';?>"> 
					                            <img title="Tải lại mã bảo vệ" id="f5capt_cha" src="<?php echo base_url();?>tmp/public/images/view-refresh-small.png">
					                        </span>
					                </div><br><button type="submit" name="regis_ok" class="btn btn-success"><?php echo lang('regis');?></button></form>
					            </div>
					        </div>
					    </div>
					</div>
				</article>

				<section class="left-sidebar col-xs-12 col-md-4">

					<div class="left-sidebar-item social-block col-xs-12 noPadding">
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=927362164006956";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-page" data-href="https://www.facebook.com/mobifone/" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-width="500"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/mobifone/"><a href="https://www.facebook.com/mobifone/">MobiFone</a></blockquote></div></div>
					</div><!-- /.social-block -->

					<div class="left-sidebar-item register-button col-xs-12 noPadding text-center">
						<a href="">Đăng ký 4G</a>
					</div>
					
					<div class="left-sidebar-item promo-product col-xs-12 noPadding">
						<a href=""><img src="" alt="" class="img-responsive"></a>
						<a href="" class="promo-product-intro col-xs-12 noPadding">
							<h3 class="promo-product-title">Dịch vụ 4G</h3>
							<span>Tìm hiểu thông tin và đăng ký gói Data</span>
						</a>
					</div>


				</section>
			</div>
		</div>
	</main>