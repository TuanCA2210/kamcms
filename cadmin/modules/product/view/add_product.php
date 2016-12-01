<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="dashboard-breadcrumb">
        <div class="pull-left">
            <ol class="breadcrumb">
						<li><a href=""><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('dashboard'); ?></a></li>
                        <li><?php echo lang('product'); ?></li>
						<li class="active"><?php echo lang('add_product'); ?></li>
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
        	
        	<form action="<?php echo base_url().'product/product/save'?>" method="post">
        	<input type="hidden" name="id_product" value="<?php if(isset($this->data['data']['id'])) echo $this->data['data']['id'];?>" id="id_product">
			<div class="col-md-12" style="min-height:750px;">
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
			                    <?php include DIR_MODULES . 'product/view/product_form_title.php'; ?>
			                    
			                    <?php include DIR_MODULES . 'product/view/product_form_code.php'; ?>
			                    
			                    <?php include DIR_MODULES . 'product/view/product_form_price.php'; ?>
			                    
			                    <?php include DIR_MODULES . 'product/view/product_form_saleoff.php'; ?>

			                    <?php include DIR_MODULES . 'product/view/product_form_vat.php'; ?>
			                    
			                    <?php include DIR_MODULES . 'product/view/product_form_state.php'; ?>
			                    
								<?php include DIR_MODULES . 'product/view/product_form_category.php'; ?>
			                    
								<?php include DIR_MODULES . 'product/view/product_form_info_other.php'; ?>

								<?php include DIR_MODULES . 'product/view/product_form_description.php'; ?>
			                    
								<?php include DIR_MODULES . 'product/view/product_form_content.php'; ?>
								
								<?php include DIR_MODULES . 'product/view/product_form_brand.php'; ?>

								<?php include DIR_MODULES . 'product/view/product_form_images.php'; ?>

								<?php include DIR_MODULES . 'product/view/product_form_related.php'; ?>
								
								<?php include DIR_MODULES . 'product/view/product_form_meta.php'; ?>


								<div class="sidebar-box text-right">
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









</form>



        

    	</div>
      <!-- /.row -->
      <!-- Main row -->

    </section>
    <!-- /.content -->
  </div>



  <div class="loading"></div>
  <div class="fade_loading"></div>