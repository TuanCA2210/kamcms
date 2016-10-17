
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href="<?php echo base_url().'home/home/index'; ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
						<li class="active"><?php echo lang('settings'); ?></li>
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
      
      <!-- Main row -->
      <div class="row">
      <!-- left col -->
      <div class="col-md-12">

            <?php 
            if (isset($this->data['flash_success'])) { ?>

                <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <?php echo $this->data['flash_success'];?>
                </div>

              <?php 
            }

            ?>
            
        </div>

        <section class="col-lg-9">



          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-cog" aria-hidden="true"></i>
              <h3 class="box-title"> <?php echo lang('options'); ?></h3>

            </div>
             <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <div class="tab-content no-padding">

                  <br>
                  <div class="box-setting-info tab-pane active" id="revenue-chart" style="position: relative; min-height: 736px;">

                      
                      <form action="" method="post">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <i class="fa fa-clock"></i>
                                <h3 class="box-title"><?php echo lang('options_frontend');?></h3>
                            </div>
                            <div class="box-body">

                                <div class="form-group ">
                                      <label for="seo_title" class="control-label"><?php echo lang('options_pagi_post');?></label>
                                      <input class="form-control" id="pagination_number" placeholder="" name="pagination_number" type="number" value="<?php echo (isset($this->data['options']['pagination_number'])) ? $this->data['options']['pagination_number'] : '';?>">
                                  </div>
                                <div class="form-group">
                                <label for=""><?php echo lang('debug');?></label><br />
                                  <input id="switch-size" type="checkbox" checked data-size="mini" />
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>


                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="box box-danger">
                              <div class="box-header with-border">
                                  <i class="fa fa-clock"></i>
                                  <h3 class="box-title"><?php echo lang('options_frontend');?></h3>
                              </div>
                              <div class="box-body">

                              </div>
                              <!-- /.box-body -->
                          </div>
                      <!-- /.box -->
                  </div>
                  <div class="clearfix"></div>


                    <!-- / SAVE -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <button type="submit" name="ok" class="btn btn-info">
                      <i class="fa fa-save"></i>
                      <?php echo lang('save');?></button>
                    </div>
                    <!-- / END SAVE -->

                    </form>






                  </div>
                </div>
              </div>
              <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.box -->

        </section>
        <!-- END LEFT COL -->

        <!-- left col -->
        <section class="col-lg-3">

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
                    

                    

                    



                  </div>
                </div>
              </div>
              <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.box -->

        </section>
        <!-- left col -->





      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>