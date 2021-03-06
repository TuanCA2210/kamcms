<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href=""><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
                        <li><?php echo lang('pages'); ?></li>
						<li class="active"><?php echo lang('add_new_pages'); ?></li>
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
        	
        	<form action="<?php echo base_url().'pages/pages/save'?>" method="post">
        	<input type="hidden" name="id_pages" id="id_pages" value="<?php if(isset($this->data['data']['id'])) echo $this->data['data']['id'];?>">
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
			                <a href="#tab_detail" data-toggle="tab" data-lang="vi" aria-expanded="true"><?php echo lang('detail');?></a>
			            </li>
			            <li class="">
			                <a href="#tab_note" data-toggle="tab" data-lang="en" aria-expanded="false"><?php echo lang('record_note');?></a>
			            </li>
			        </ul>
			        <div class="tab-content">
			            <div class="tab-pane active" id="tab_detail">
			                <div class="form-body">
			                    <div class="form-group ">
			                        <label for="name" class="control-label required"><?php echo lang('title');?></label>
			                        <input class="form-control" id="title" placeholder="<?php echo lang('maximum_pages'); ?>" value="<?php if(isset($this->data['data']['title'])) echo $this->data['data']['title']; ?>" name="title" type="text">
			                    </div>
			                    <?php if(isset($this->data['data']['id']) && is_numeric($this->data['data']['id'])) { ;?>
			                    <div class="form-group">
								    <div id="edit-slug-box">
								        <strong>Permalink:</strong>
								        <span id="sample-permalink" data-base="<?php echo replaceAdmin(base_url());?>" data-link-old="<?php if(isset($this->data['data']['old_url'])) echo $this->data['data']['old_url'];?>">
								        	<a class="permalink" href="
								        	<?php 
								        	if(isset($this->data['data']['old_url']) && $this->data['data']['old_url']!=""){
								        		echo replaceAdmin(base_url()).$this->data['data']['old_url'].'.htm';
								        	}else{
								        		echo replaceAdmin(base_url()).'pages/pages/detail/'.$this->data['data']['id'];
								        	}
								        	?>">
												<span class="default-slug"><?php echo replaceAdmin(base_url());?><span id="editable-post-name"><?php 
												if(isset($this->data['data']['old_url']) && $this->data['data']['old_url']!=""){
													echo $this->data['data']['old_url'];
												}
												?></span>.htm</span>

								        	</a>
								        </span>
								        &lrm;
								        <span id="edit-slug-buttons">
											<button type="button" class="btn btn-success btn-sm" id="change_slug">Edit</button>
											<button type="button" class="btn btn-info btn-sm" id="btn-ok-slug" style="display: none;">OK</button>
											<button type="button" class="btn btn-danger btn-sm" id="btn-cancel-slug" style="display: none;">Cancel</button>
										</span>
								    </div>
								    <input type="hidden" id="current-slug" name="slug" value="contact">
								    <div data-id="1" data-route="pages.create.slug" data-view="public.view" id="object_id"></div>
								</div>
								<?php };?>
			                    <div class="form-group ">
			                        <label class="control-label required"><?php echo lang('content');?></label>
			                        <textarea class="form-control" id="content" name="content" cols="50" rows="10" style="visibility: hidden; display: none;">
			                        	<?php if(isset($this->data['data']['content'])) echo $this->data['data']['content']; ?>
			                        </textarea>
			                        <script type="text/javascript">CKEDITOR.replace('content');

			                         </script>

			                    </div>
			                    <div class="form-group">
			                        <div class="widget light bordered meta-boxes">
			                            <div class="widget-title">
			                                <h4><i class="fa fa-info-circle"></i> <?php echo lang('contact_field'); ?></h4>
			                            </div>
			                            <div class="widget-body">
			                                <div class="meta-box check-box" data-slug="1_show_contact_form">
			                                    <p>
			                                        <label class="sbold"></label><br>
			                                        <span class="font-size-13"></span>
			                                    </p>
			                                    <div class="scf-checkbox-wrap">
			                                        <span class="dis-block">
												        <label>
												        	<?php echo lang('show_contact_form');?> &nbsp;
												            <input type="checkbox" name="show_contact_form" id="show_contact_form" value="true" <?php if(isset($this->data['data']['contact_form']) && $this->data['data']['contact_form']!="") echo " checked"; ?>> <?php echo lang('yes');?>
												        </label>
									    			</span>

									            </div>
									        </div>

									    </div>
									</div>
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

					

					<div class="panel panel-default">
				      <div class="panel-heading">
			              <i class="fa fa-file-image-o" aria-hidden="true"></i> <?php echo lang('image');?>
			          </div>
				      <div class="panel-body">

				      		<div class="modal-image-choose">
	                            <div class="text-center">
	                                  <a class="text-center choose_img">
	                                  <img src="<?php echo (isset($this->data['data']['thumbnail']) && $this->data['data']['thumbnail']!='') ? base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url().'tmp/cdn/'.$this->data['data']['thumbnail'].'&h=150&w=210&zc=2' : base_url().'tmp/public/images/img.png';?>" class="logo-website pages-website load-img" alt="" />
	                                  <input type="hidden" class="hidden_thumb_pages" name="hidden_thumb_pages" value="<?php if(isset($this->data['data']['thumbnail'])) echo $this->data['data']['thumbnail']; ?>"/>
	                                  </a>
	                                  <h5 class="text-center"><a href="" class="del-image-choose-pages" style="color: #FF5722;font-weight:bold;"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang('delete'); ?> </a></h5>
	                            </div>
	                        </div>

				      </div>
				    </div>





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