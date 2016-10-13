<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href="<?php echo base_url().'home/home/index'; ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
						<li class="active"><?php echo lang('media'); ?></li>
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

        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-left">
              <li class="active"><a href="#revenue-chart" data-toggle="tab"><?php echo lang('image'); ?></a></li>
              <li><a href="#sales-chart" data-toggle="tab"><?php echo lang('file'); ?></a></li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                  
                  <div class="container">
                      <div class="row">
                        </br>
                        <div class="col-md-12">
                            <form id="form-uploads-ajax" enctype="multipart/form-data" method="post">
                              <div class="fileUpload btn btn-primary">
                                  <span><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?php echo lang('uploadmedia');?></span>
                                  <input type="file" id="media" class="media upload" name="media"/>
                                  <input type="hidden" value="<?php echo time(); ?>" class="" name="media" />
                              </div>
                              <button class="btn btn-info refesh" type="button">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                <?php echo lang('reload');?>
                              </button> 
                              
                            </form>
                        </div>
                        <div class="col-md-12" id="loadMedia">
                                      <?php
                                         $dir          = DIR_TMP.'cdn/';
                                         
                                        $ImagesA = getImagesToFolder($dir);
                                         foreach ($ImagesA as $key => $value) {
                                          echo "<div class='media-col'>";
                                          echo "<div class='overflow'><a class='fancybox' href='".base_url()."tmp/cdn/".$value."'><i class='demo-icon icon-eye'>&#xe801;</i></a></div>";
                                          echo "<img class='img-folder-media' src='".base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url()."tmp/cdn/".$value."&h=100&w=150&zc=2' width='150' height='100'/>";
                                          echo "<div class='text-center'>".$value."</div>";
                                          echo "<div class='text-center overcontrol'>
                                          <a href='javascript:void(0)' class='rename' data-title='".$value."'><i class='fa fa-font' aria-hidden='true'></i></a>
                                          <a href='javascript:void(0)' class='delete' data-title='".$value."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                                          </div>";
                                          echo "</div>";
                                         }

                                      ?>
                        </div>
                    </div>
                  </div>
                   


              </div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Rename -->
          <div id="myModalRename" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Đổi tên file</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="">Tên mới:</label>
                    <input type="text" placeholder="Nhập vào tên mới..." class="form-control" id="new_name"/>
                    <input type="hidden" id="old_name" value="" />
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-info" id="rename">Rename</button>
                  <button type="button" class="btn btn-success" id="copy_rename">Copy & Rename</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>

        





      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>


  <div class="loading"></div>
  <div class="fade_loading"></div>