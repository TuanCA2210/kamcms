<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href=""><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
                        <li><?php echo lang('banners'); ?></li>
						<li class="active"><?php echo lang('add_new_banners'); ?></li>
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
        	
        	<form action="<?php echo base_url().'banners/banners/save'?>" method="post">
        	<input type="hidden" name="id_banner" id="id_banner" value="<?php if(isset($this->data['data']['id'])) echo $this->data['data']['id'];?>">
			<div class="col-md-9" style="min-height:750px;">
			    <div class="tabbable-custom ">
			    	<?php 
                    if (isset($this->data['flash_success'])) {
                        echo '<div class="alert alert-success">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <strong>'.lang('success').'</strong> '.$this->data['flash_success'].'
                                </div>';
                    }
                    ?>
			        <ul class="nav nav-tabs ">
			            <li class="active">
			                <a href="#tab_detail" data-toggle="tab" aria-expanded="true"><?php echo lang('detail');?></a>
			            </li>
			            <li class="">
			                <a href="#tab_note" data-toggle="tab" aria-expanded="false"><?php echo lang('record_note');?></a>
			            </li>
			        </ul>
			        <div class="tab-content">
			            <div class="tab-pane active" id="tab_detail">
			                <div class="form-body">
			                    <div class="form-group ">
			                        <label for="name" class="control-label required"><?php echo lang('title');?></label>
			                        <input class="form-control" id="title" placeholder="<?php echo lang('maximum_pages'); ?>" value="<?php if(isset($this->data['data']['title'])) echo $this->data['data']['title']; ?>" name="title" type="text">
			                    </div>
			                    <div class="form-group ">
			                        <label for="name" class="control-label required"><?php echo lang('link');?></label>
			                        <input class="form-control" id="link" placeholder="<?php echo lang('maximum_pages'); ?>" value="<?php if(isset($this->data['data']['link'])) echo $this->data['data']['link']; ?>" name="link" type="text">
			                    </div>
			                    <div class="form-group ">
			                        <label class="control-label required"><?php echo lang('description');?></label>
			                        <textarea class="form-control" id="description" name="description" cols="50" rows="10">
			                        	<?php if(isset($this->data['data']['description'])) echo $this->data['data']['description']; ?>
			                        </textarea>
			                    </div>
			                </div>
			            </div>
			            <div class="tab-pane" id="tab_note">
			                <div class="form-group">
			                    <label class="col-sm-2 control-label text-right"><?php echo lang('note_content');?></label>
			                    <div class="col-sm-10">
			                        <textarea class="form-control" name="note" cols="50" rows="10">
			                        	<?php if(isset($this->data['data']['note'])) echo $this->data['data']['note']; ?>
			                        </textarea>
			                    </div>
			                </div>
			                <div class="clearfix"></div>
			            </div>
			        </div>
			    </div>
			</div>






				
				<div class="col-md-3">

					

					<!-- solid sales graph -->
			          <div class="box box-solid bg-teal-gradient bg-header-left box-left">
			            <div class="box-header">
			              <i class="fa fa-file-image-o" aria-hidden="true"></i>
			              <h3 class="box-title"><?php echo lang('image');?></h3>
			            </div>
			             <!-- Custom tabs (Charts with tabs)-->
			              <div class="nav-tabs-custom">
			                <div class="tab-content no-padding">
			                  <div>
			                      <br>
			                        <div class="modal-image-choose">
			                            <div class="text-center">
			                                  <a class="text-center choose_img">
			                                  <img src="<?php echo (isset($this->data['data']['images']) && $this->data['data']['images']!='') ? base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/cdn/'.$this->data['data']['images'].'&h=150&w=210&zc=2' : base_url().'tmp/public/images/img.png';?>" class="logo-website pages-website load-img" alt="" />
			                                  <input type="hidden" class="hidden_thumb_pages" name="hidden_thumb_pages" value="<?php if(isset($this->data['data']['images'])) echo $this->data['data']['images']; ?>"/>
			                                  </a>
			                                  <h5 class="text-center"><a href="" class="del-image-choose-pages" style="color: #FF5722;font-weight:bold;"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang('delete'); ?> </a></h5>
			                            </div>
			                        </div>
			                    

			                    

			                    



			                  </div>
			                </div>
			              </div>
			              <!-- /.nav-tabs-custom -->
			          </div>
			          <!-- /.box -->



				    <div class="sidebar-box">
				        <div class="form-group">
				            <div class="form-actions">
				                <div class="btn-set">
				                    <button type="submit" name="submit" value="save" class="btn btn-info"><i class="fa fa-save"></i> <?php echo lang('save_one');?></button>
				                    <button type="submit" name="submit" value="apply" class="btn btn-success"><i class="fa fa-check-circle"></i> <?php echo lang('save_one');?> &amp; <?php echo lang('add_one');?></button>
				                </div>
				            </div>
				        </div>
				    </div>



				</div>
				</form>

















        

    	</div>
      <!-- /.row -->
      <!-- Main row -->

    </section>
    <!-- /.content -->
  </div>

  <div class="loading"></div>
<div class="fade_loading"></div>