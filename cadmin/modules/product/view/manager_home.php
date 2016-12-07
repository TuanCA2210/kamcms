<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
            <li class="active"><?php echo lang('product_manager'); ?></li>
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
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs">
                    <li class="active" style="width: 100%;"><a href="#revenue-chart" data-toggle="tab" aria-expanded="true"></a></li>
                </ul>
                <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative;min-height: 700px;">
                               <div class="col-xs-12" style="margin-bottom: 15px;">
                                    <?php 
                                    if (isset($this->data['flash_success'])) {
                                        echo '<div class="alert alert-success">
                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  <strong>'.lang('success').'</strong> '.$this->data['flash_success'].'
                                                </div>';
                                    }
                                    ?>

                                    
                                    <div id="datatables_filter" class="dataTables_filter">
                                        <div class="row">
                                          <div class="col-lg-4">
                                            <div class="input-group">
                                              <input type="text" class="form-control search_product" placeholder="Search for..." value="<?php if(isset($this->data['s'])) echo $this->data['s'];?>">
                                              <span class="input-group-btn">
                                                <button class="btn btn-primary search_button_product" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                              </span>
                                            </div><!-- /input-group -->
                                          </div><!-- /.col-lg-6 -->
                                          <div class="col-lg-4"></div>    
                                          <div class="col-lg-4" style="text-align: right;">
                                            <a class="btn btn-success" data-toggle="modal" data-target="#modelAdd" data-href="<?php echo base_url().'product/manager/add';?>"><i class="fa fa-plus-circle"></i> <?php echo lang('add_product');?></a>
                                            <!-- Single button -->
                                            <div class="btn-group">
                                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo lang('action');?> <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0)" id="del_list_product"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp;<?php echo lang('delete');?></a></li>
                                                <li><a href="javascript:void(0)" id="unlock_product"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;<?php echo lang('private');?></a></li>
                                                <li><a href="javascript:void(0)" id="lock_product"><i class="fa fa-unlock" aria-hidden="true"></i>&nbsp;<?php echo lang('public');?></a></li>
                                              </ul>
                                            </div>


                                          </div><!-- /.col-lg-6 -->


                                        </div><!-- /.row -->                                        
                                    </div>


                                    





							
							<!-- Modal -->
                            <div id="modelAdd" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Thêm danh mục hiển thị</h4>
                                  </div>
                                  <div class="modal-body">
											<div class="form-group ">
											    <label for="description" class="control-label required"><?php echo lang('title');?></label>
											    <input type="text" class="form-control" name="title_manager" id="title_manager" />
											</div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo lang('cancel');?></button>
                                    <a href="javascript:void(0)" id="submit_manager" class="btn btn-success"><?php echo lang('add');?></a>
                                  </div>
                                </div>

                              </div>
                            </div>


                            <!-- Modal -->
                            <div id="modelDelete" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><?php echo lang('notification'); ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><?php echo lang('delete_messager');?></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo lang('cancel');?></button>
                                    <a href="" id="agree_del" class="btn btn-success"><?php echo lang('agree');?></a>
                                  </div>
                                </div>

                              </div>
                            </div>



                            <!-- Modal -->
                            <div id="modelDeleteAll" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><?php echo lang('notification'); ?></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><?php echo lang('delete_messager');?></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo lang('cancel');?></button>
                                    <a href="" id="agree_del_all_product" class="btn btn-success"><?php echo lang('agree');?></a>
                                  </div>
                                </div>

                              </div>
                            </div>


                            </div>
                            <!-- END TOP-->
                            <br>
                            <div class="clearfix"></div>

                            <div class="col-xs-6"></div>
                            <div class="col-xs-6">
                            	<ul id="list-feature-home" class="ui-sortable-home">
                            		<?php 
                            		if (!empty($this->data['view_home'])) {
                            			foreach ($this->data['view_home'] as $key => $value) { ?>
                            				<li id="listItem_<?php echo $value['id'];?>" class="item" data-id="<?php echo $value['id'];?>"><img src="<?php echo base_url();?>modules/product/resource/images/arrow.png" alt="move" width="16" class="handle"><input type="hidden" class="form-control title title_<?php echo $value['id'];?>" value="<?php echo $value['title'];?>" /><strong><?php echo $value['title'];?> </strong></li>
                            		<?php
                            			}
                            		}
                            		?>

								</ul>
                            </div>















                    </div>
                </div>
            </div>
        </div>

        

    </div>
      <!-- /.row -->
      <!-- Main row -->

    </section>
    <!-- /.content -->
  </div>

  <div class="loading"></div>
  <div class="fade_loading"></div>