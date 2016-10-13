<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href=""><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
						<li class="active"><?php echo lang('menu'); ?></li>
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
                    

                

                                <div class="row widget-menu">
                                    
                                    <div class="col-md-12">
                                        <div class="widget">
                                            <div class="widget-title">
                                                <h4>
                                                    <i class="fa fa-question-circle"></i>
                                                    <span><?php echo lang('create_menu_link');?></span>
                                                </h4>
                                            </div>
                                            <div class="widget-body">
                                                <form method="post" action="<?php echo base_url().'menu/position/save';?>">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php echo lang('name_menu')?></label>
                                                        <input type="text" name="title_menu" id="name" class="form-control" value="" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Vị trí</label>
                                                        <select name="position" id="" class="form-control">
                                                            <option value="0">Không chọn</option>
                                                            <option value="1">Main</option>
                                                            <option value="2">Footer</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group text-center">
                                                    <button class="btn btn-transparent btn-success btn-circle btn-sm" name="submit" type="submit">
                                                            <i class="fa fa-check"></i> <?php echo lang('create');?>
                                                    </button>
                                                </div>
                                                </form>
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