<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href=""><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
                        <li><?php echo lang('administrator'); ?></li>
						<li class="active"><?php echo lang('personal_info'); ?></li>
			</ol>

        </div>
        <div class="pull-right">
            <a class="btn-main with-icon" data-toggle="modal" data-target="#widget_manager" href="#"></a>
        </div>
        <div class="clearfix"></div>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        


		<div class="user-profile" style="min-height: 720px;">
		    <div class="col-lg-2 crop-avatar">

		        <!-- Profile links -->
		        <div class="block">
		            <div class="block">
		                <div class="thumbnail">
		                    <div class="thumb">
		                        <div class="profile-userpic">
		                            <div class="avatar-view">
		                            	<a class="text-center" data-toggle="modal" data-target="#myModalAvatar">
		                                	<img src="
											<?php echo base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/cdn/'.$this->data['data_user']['avatar'].'&h=132&w=132&zc=2';?>" class="img-responsive avatar_img" alt="avatar">
		                                </a>

		                                <!-- Modal -->
			                            <div class="modal fade" id="myModalAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			                              <div class="modal-dialog" role="document">
			                                <div class="modal-content">
			                                  <div class="modal-header">
			                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                                    <h4 class="modal-title" id="label-model-folder-img">
			                                       <?php echo lang('choose_logo'); ?>
			                                    </h4>
			                                  </div>
			                                  <div class="modal-body" data-mess-one="<?php echo lang('warning_choose_img');?>" data-mess-two="<?php echo lang('warning_choose_img_one');?>" data-id="<?php echo $this->data['data_user']['id'];?>">
			                                   <?php
			                                    $dir          = DIR_TMP.'cdn/';
			                                      $html = listAllFolderChooseImage($dir);
			                                      echo $html;

			                                    ?>
			                                  </div>
			                                  <div class="modal-footer">
			                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
			                                    <button type="button" class="btn btn-primary choose_avatar"><?php echo lang('choose');?></button>
			                                  </div>
			                                </div>
			                              </div>
			                            </div><!--END MODAL-->


		                            </div>
		                        </div>
		                    </div>

		                    <div class="caption text-center">
		                        <h6><?php echo $this->data['data_user']['lastname'];?> <?php echo $this->data['data_user']['firstname'];?>   <br /><small><?php echo $this->data['data_user']['job'];?></small></h6>
		                        <div class="icons-group" style="margin-top: 5px;">
		                            <a href="<?php echo $this->data['data_user']['facebook'];?>" target="_blank" title="" class="tip" data-original-title="Facebook"> 
										<i class="fa fa-facebook" aria-hidden="true"></i>
		                            </a>
		                            <a href="skype:?chat" target="_blank" title="" class="tip" data-original-title="Skype">
		                            	<i class="fa fa-skype" aria-hidden="true"></i>
		                            </a>
		                            <a href="<?php echo $this->data['data_user']['github'];?>" target="_blank" title="" class="tip" data-original-title="Github">
		                            	<i class="fa fa-github" aria-hidden="true"></i>
		                            </a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <!-- /profile links -->

		    </div>
		    <div class="col-lg-10">
		        <div class="profile-content">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="tabbable-line">
		                        <ul class="nav nav-tabs">
		                            <li class="active">
		                                <a href="#tab_1_1" data-toggle="tab" aria-expanded="true"><?php echo lang('personal_info');?></a>
		                            </li>
		                            <li class="">
		                                <a href="#tab_1_3" data-toggle="tab" aria-expanded="false"><?php echo lang('change_pass');?></a>
		                            </li>
		                        </ul>
		                    </div>
		                    <div class="tab-content">
		                        <!-- PERSONAL INFO TAB -->
		                        <div class="tab-pane active" id="tab_1_1">
		                            <form method="POST" action="<?php echo base_url().'users/manager/update';?>" accept-charset="UTF-8">
		                            	<input name="_token" type="hidden" value="<?php echo base64url_encode(time());?>">
		                            	<input name="id_user" type="hidden" value="<?php echo $this->data['data_user']['id'];?>">
		                                <div class="row">
		                                    <div class="col-md-6 col-sm-6 col-xs-12">
		                                    	<div class="form-group ">
		                                            <label for="last_name" class="control-label"><?php echo lang('last_name');?></label>
		                                            <input class="form-control" id="last_name" placeholder="Lê" data-counter="60" name="last_name" type="text" value="<?php echo $this->data['data_user']['lastname'];?>">
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="first_name" class="control-label"><?php echo lang('first_name');?></label>
		                                            <input class="form-control" id="first_name" placeholder="Cường" data-counter="60" name="first_name" type="text" value="<?php echo $this->data['data_user']['firstname'];?>">
		                                        </div>
		                                        
		                                        <div class="form-group ">
		                                            <label for="username" class="control-label"><?php echo lang('username');?></label>
		                                            <input class="form-control" id="username" placeholder="Cuongle" data-counter="30" name="username" type="text" value="<?php echo $this->data['data_user']['username'];?>">
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="email" class="control-label"><?php echo lang('email');?></label>
		                                            <input class="form-control" id="email" placeholder="Example@gmail.com" data-counter="60" name="email" type="text" value="<?php echo $this->data['data_user']['email'];?>">
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="address" class="control-label"><?php echo lang('address');?></label>
		                                            <input class="form-control" id="address" placeholder="Address" data-counter="255" name="address" type="text" value="<?php echo $this->data['data_user']['address'];?>">
		                                        </div>
		                                        <div class="form-group">
		                                            <label for="dob" class="control-label"><?php echo lang('day_of_birth'); ?></label>
		                                            <div class='input-group date' id='datetimepicker'>
			                                            <input data-format="yyyy-MM-dd" placeholder="26/03/1993" class="form-control" name="birthday" type="text" value="<?php echo $this->data['data_user']['birthday'];?>" />
													    <span class="add-on input-group-addon">
													      <i class="fa fa-calendar">
													      </i>
													    </span>
												    </div>
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="job_position" class="control-label"><?php echo lang('job_position');?></label>
		                                            <input class="form-control" id="job_position" placeholder="PHP Developer" data-counter="255" name="job_position" type="text" value="<?php echo $this->data['data_user']['job'];?>">
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="phone" class="control-label"><?php echo lang('phone');?></label>
		                                            <input class="form-control" id="phone" placeholder="+84 0123 245" data-counter="15" name="phone" type="text" value="<?php echo $this->data['data_user']['phone'];?>">
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="role" class="control-label"><?php echo lang('role');?></label>
		                                            <select name="role" id="role" class="form-control">
		                                            	<option value="1" <?php if($this->data['data_user']['group_id'] == 1) echo "selected='selected'";?>>Superadmin</option>
		                                            	<option value="2" <?php if($this->data['data_user']['group_id'] == 2) echo "selected='selected'";?>>Admintrator</option>
		                                            </select>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6 col-sm-6 col-xs-12">
		                                    	
		                                        <div class="form-group ">
		                                            <label for="gender" class="control-label"><?php echo lang('gender');?></label>
		                                            <select name="gender" id="gender" class="form-control">
		                                            	<option value="0">Male</option>
		                                            	<option value="1">Female</option>
		                                            	<option value="2">Other</option>
		                                            </select>
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="about" class="control-label"><?php echo lang('about');?></label>
		                                            <textarea class="form-control" rows="4" id="about" placeholder="I am Cuong le!!!" data-counter="400" name="about" cols="50"><?php echo $this->data['data_user']['about'];?></textarea>
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="skype" class="control-label">Skype</label>
		                                            <input class="form-control" id="skype" placeholder="cuongle059" data-counter="60" name="skype" type="text" value="<?php echo $this->data['data_user']['skype'];?>">
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="facebook" class="control-label">Facebook</label>
		                                            <input class="form-control" id="facebook" placeholder="https://facebook.com/cuongledev" data-counter="255" name="facebook" type="text" value="<?php echo $this->data['data_user']['facebook'];?>">
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="twitter" class="control-label">Twitter</label>
		                                            <input class="form-control" id="twitter" placeholder="http://www.twitter.com/cuongledev" data-counter="255" name="twitter" type="text" value="<?php echo $this->data['data_user']['twitter'];?>">
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="github" class="control-label">Github</label>
		                                            <input class="form-control" id="github" placeholder="http://www.github.com/cuongledev" data-counter="255" name="github" type="text" value="<?php echo $this->data['data_user']['github'];?>">
		                                        </div>
		                                        <div class="form-group ">
		                                            <label for="website" class="control-label">Website</label>
		                                            <input class="form-control" id="website" placeholder="http://www.cuongle.com" data-counter="255" name="website" type="text" value="<?php echo $this->data['data_user']['website'];?>">
		                                        </div>
		                                    </div>
		                                </div>

		                                <div class="form-group">
		                                    <div class="form-actions">
		                                        <div class="btn-set text-center">
		                                            <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> <?php echo lang('update');?></button>
		                                        </div>
		                                    </div>
		                                </div>

		                            </form>
		                        </div>
		                        <!-- END PERSONAL INFO TAB -->
		                        <!-- CHANGE PASSWORD TAB -->
		                        <div class="tab-pane change_pass" id="tab_1_3">
		                            <form method="POST" action="<?php echo base_url().'users/manager/updatePassw';?>" accept-charset="UTF-8">
		                            	<input name="_token" type="hidden" value="<?php echo time(); ?>">
		                            	<input name="id_user" id="id_user_pass" type="hidden" value="<?php echo $this->data['data_user']['id'];?>">
		                                <div class="row">
		                                    <div class="col-sm-6 col-xs-12">
		                                        <div class="form-group">
		                                            <label class="control-label" for="password"><?php echo lang('password');?></label>
		                                            <input class="form-control" id="password" data-counter="60" name="password" type="password" />
		                                            <div class="pwstrength_viewport_progress" style="display: none;">
		                                                <div class="progress">
		                                                    <div class="progress-bar"><span class="password-verdict"></span></div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-6 col-xs-12">
		                                        <div class="form-group">
		                                            <label class="control-label" for="password_confirmation"><?php echo lang('re-password');?></label>
		                                            <input class="form-control" id="password_confirmation" data-counter="60" name="password_confirmation" type="password" />
		                                        </div>
		                                    </div>
		                                </div>

		                                <div class="form-group">
		                                    <div class="form-actions">
		                                        <div class="btn-set pull-right">
		                                            <button type="button" name="submit" class="btn btn-success" id="submit_pass"><i class="fa fa-check-circle"></i> <?php echo lang('update');?></button>
		                                        </div>
		                                        <div class="clearfix"></div>
		                                    </div>
		                                </div>
		                            </form>
		                        </div>
		                        <!-- END CHANGE PASSWORD TAB -->
		                    </div>
		                </div>
		            </div>
		        </div>
		        <!-- END PROFILE CONTENT -->
		    </div>
		    <div class="clearfix"></div>
		</div>
		



        

    </div>
      <!-- /.row -->
      <!-- Main row -->

    </section>
    <!-- /.content -->
  </div>