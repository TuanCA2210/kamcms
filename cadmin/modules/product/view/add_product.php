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
        	<input type="hidden" name="id_product" value="<?php if(isset($this->data['data']['id'])) echo $this->data['data']['id'];?>">
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
			                    <div class="form-group ">
			                        <label for="name" class="control-label required"><?php echo lang('title');?></label>
			                        <input class="form-control" id="title" placeholder="<?php echo lang('maximum_categories'); ?>" value="<?php if(isset($this->data['data']['name'])) echo $this->data['data']['name']; ?>" name="title" type="text">
			                    </div>
			                    <div class="form-group ">
			                        <label for="name" class="control-label required"><?php echo lang('product_code');?></label>
			                        <input class="form-control" placeholder="<?php echo lang('product_code');?>" id="code" value="<?php if(isset($this->data['data']['code'])) echo $this->data['data']['code']; ?>" name="code" type="text">
			                    </div>
			                    <div class="form-group ">
			                        <label for="name" class="control-label required"><?php echo lang('price');?></label>
			                        <input class="form-control" id="price" placeholder="<?php echo lang('product_placeholder'); ?>" value="<?php if(isset($this->data['data']['price'])) echo $this->data['data']['price']; ?>" name="price" type="text" />
			                    </div>
			                    <div class="form-group ">
			                        <label for="name" class="control-label required">VAT</label>
			                        <select name="vat" class="form-control" id="">
			                        	<option value="0" <?php if($this->data['data']['status_vat']==0) echo "selected"; ?>>Đã có VAT</option>
			                        	<option value="1" <?php if($this->data['data']['status_vat']==1) echo "selected"; ?>>Chưa có VAT</option>
			                        	<option value="2" <?php if($this->data['data']['status_vat']==2) echo "selected"; ?>>Không hiển thị</option>
			                        </select>
			                    </div>
			                    <div class="form-group ">
			                        <label for="name" class="control-label required"><?php echo lang('status');?></label>
									<div class="checkbox-list form-control height-auto">
										<label><div class="checker"><span class="<?php if($this->data['data']['state']==1) echo 'after_opacity'; ?>"><input type="checkbox" name="state" value="1" <?php if($this->data['data']['state']==1) echo "selected"; ?>></span></div> Nổi bật</label>
										<label><div class="checker"><span class="<?php if($this->data['data']['state']==2) echo 'after_opacity'; ?>"><input type="checkbox" name="state" value="2" <?php if($this->data['data']['state']==2) echo "selected"; ?>></span></div> Hàng sắp về</label>
										<label><div class="checker"><span class="<?php if($this->data['data']['state']==3) echo 'after_opacity'; ?>"><input type="checkbox" name="state" value="3" <?php if($this->data['data']['state']==3) echo "selected"; ?>></span></div> Nhận đặt hàng</label>
										<label><div class="checker"><span class="<?php if($this->data['data']['state']==4) echo 'after_opacity'; ?>"><input type="checkbox" name="state" value="4" <?php if($this->data['data']['state']==4) echo "selected"; ?>></span></div> Hàng cũ</label>
										<label><div class="checker"><span class="<?php if($this->data['data']['state']==5) echo 'after_opacity'; ?>"><input type="checkbox" name="state" value="5" <?php if($this->data['data']['state']==5) echo "selected"; ?>></span></div> Hết hàng</label>
										<label><div class="checker"><span class="<?php if($this->data['data']['state']==6) echo 'after_opacity'; ?>"><input type="checkbox" name="state" value="6" <?php if($this->data['data']['state']==6) echo "selected"; ?>></span></div> Khuyến mại</label>
									</div>
			                    </div>
			                    <div class="form-group ">
			                    		<label for="name" class="control-label required"><?php echo lang('category');?></label>
								        <ul class="list-categories product-list-category">
								        	<?php 
								        	if (isset($this->data['data']['id'])) {
							        			if (!empty($this->data['data_category'])) {
									        		foreach ($this->data['data_category'] as $key => $value) {
							        			?>
								        			<li>
										                <div class="checker">
										                	<span <?php 
										                	if (preg_match("/,".$value['id'].",/", $this->data['data']['category'], $matches)){
										        				echo "class='after_opacity'";
										        			}
										                	?>>
										                		<input type="checkbox" class="styled" name="categories[]" value="<?php echo $value['id'];?>" <?php 
										                			if (preg_match("/,".$value['id'].",/", $this->data['data']['category'], $matches)){
										        						echo "checked";
										        					}
										                	?>>
										                	</span>
										                </div>
										                <label for="category-item-<?php echo $value['alias'];?>"><?php echo $value['title'];?></label>
										            </li>
								        		<?php 
								        			}
								        		}
								        	}else{
								        		if (!empty($this->data['data_category'])) {
									        		foreach ($this->data['data_category'] as $key => $value) { ?>
									        			<li>
											                <div class="checker"><span><input type="checkbox" class="styled" name="categories[]" value="<?php echo $value['id'];?>"></span></div>
											                <label for="category-item-<?php echo $value['alias'];?>"><?php echo $value['title'];?></label>
											            </li>
									        		<?php 
									        		}
									        	}
								        	}
								        	?>
								        </ul>
								    </div>
			                    <div class="clearfix"></div>
			                    <div class="form-group">
								    <label class="control-label required">Thêm thông tin khác</label>
								    <div class="info_other">
								    	<?php 
								    	if (!empty($this->data['data_other_info'])) {
								    		foreach ($this->data['data_other_info'] as $key => $value) { ?>
								    			<div class="element-info">
										    		<div class="col-md-5">
												        <input type="text" class="form-control maxlength-handler" name="info_title[]" maxlength="60" placeholder="Nhập tiêu đề..." value="<?php echo $value->title;?>">
												    </div>
												    <div class="col-md-5" style="padding-left:0px">
												        <input type="text" class="form-control maxlength-handler" name="info_content[]" maxlength="120" placeholder="Nhập nội dung..." value="<?php echo $value->content;?>">
												    </div>
												    <div class="col-md-2" style="padding:0px">
												        <a href="javascript:void(0)" class="btn green add_info" style="border-radius:3px !important"><i class="fa fa-plus"></i></a>
												    </div>
												    <div class="clearfix" style="margin:8px 0px;"></div>
										    	</div>
								    	<?php 
								    		}
								    	}else{ ?>
											<div class="element-info">
									    		<div class="col-md-5">
											        <input type="text" class="form-control maxlength-handler" name="info_title[]" maxlength="60" placeholder="Nhập tiêu đề...">
											    </div>
											    <div class="col-md-5" style="padding-left:0px">
											        <input type="text" class="form-control maxlength-handler" name="info_content[]" maxlength="120" placeholder="Nhập nội dung...">
											    </div>
											    <div class="col-md-2" style="padding:0px">
											        <a href="javascript:void(0)" class="btn green add_info" style="border-radius:3px !important"><i class="fa fa-plus"></i></a>
											    </div>
											    <div class="clearfix" style="margin:8px 0px;"></div>
									    	</div>
										<?php 
								    	}
								    	 ?>
								    	
								    	
								    	
								    </div>
								</div>
			                    <div class="form-group ">
								    <label for="description" class="control-label required"><?php echo lang('description');?></label>
								    <textarea class="form-control" rows="4" id="description" placeholder="<?php echo lang('description_required');?>" data-counter="300" name="description" cols="50"><?php if(isset($this->data['data']['short_info'])) echo $this->data['data']['short_info']; ?></textarea>
								</div>
								<div class="form-group ">
			                        <label class="control-label required"><?php echo lang('content');?></label>
			                        <textarea class="form-control" id="content" name="content" cols="50" rows="10" style="visibility: hidden; display: none;">
			                        	<?php if(isset($this->data['data_detail']['full_info'])) echo $this->data['data_detail']['full_info']; ?>
			                        </textarea>
			                        <script type="text/javascript">CKEDITOR.replace('content');</script>

			                    </div>
			                    <div class="clearfix"></div>
			                    
								

								<div class="portlet light bordered" id="block-image">
								    <div class="portlet-title">
								        <div class="caption">
								            <i class="fa fa-sliders" aria-hidden="true"></i> &nbsp;
								            <span class="caption-subject font-red-sunglo bold uppercase">THƯƠNG HIỆU SẢN PHẨM</span>
								        </div>
								        <div class="tools">
								            <a href="javascript:;" class="collapse" data-status="true"></a>
								            <a href="javascript:;" class="remove"></a>
								        </div>
								    </div>
								    <div class="portlet-body form">
								        <div class="note note-info">
								            <p>Tính năng phục vụ cho việc phân loại sản phẩm theo thương hiệu trên website của bạn. Thêm mới thương hiệu <a href="">tại đây</a></p>
								        </div>
								        <div class="form-group">
										    <label class="col-md-2 control-label">Chọn thương hiệu</label>
										    <div class="col-md-8">
										        <div class="form-control height-auto">
										            <div class="scrollbar">
										                <ul class="list-unstyled" id="list_brand">
										                    <li>
										                        <label><div class="checker"><span class="<?php if($this->data['data']['brand']==0) echo 'after_opacity'; ?>"><input class="checkboxes" type="checkbox" name="brand" value="0" <?php if($this->data['data']['brand']==0) echo "selected"; ?>></span></div> Toyota</label>
										                    </li>
										                    <li>
										                        <label><div class="checker"><span class="<?php if($this->data['data']['brand']==1) echo 'after_opacity'; ?>"><input class="checkboxes" type="checkbox" name="brand" value="1" <?php if($this->data['data']['brand']==1) echo "selected"; ?>></span></div> Yamaha</label>
										                    </li>
										                    <li>
										                        <label><div class="checker"><span class="<?php if($this->data['data']['brand']==2) echo 'after_opacity'; ?>"><input class="checkboxes" type="checkbox" name="brand" value="2" <?php if($this->data['data']['brand']==2) echo "selected"; ?>></span></div> Honda</label>
										                    </li>
										                </ul>
										            </div>
										        </div>
										    </div>
										</div>
								        <div class="clearfix"></div>
								    </div>
								</div>
								<div class="portlet light bordered" id="block-image">
								    <div class="portlet-title">
								        <div class="caption">
								            <i class="fa fa-sliders" aria-hidden="true"></i> &nbsp;
								            <span class="caption-subject font-red-sunglo bold uppercase">Hình ảnh sản phẩm</span>
								        </div>
								        <div class="tools">
								            <a href="javascript:;" class="collapse" data-status="true"></a>
								            <a href="javascript:;" class="remove"></a>
								        </div>
								    </div>
								    <div class="portlet-body form">
								        <div class="note note-info">
								            <p>- Bạn có thế chọn nhiều ảnh cùng một lúc.</p>
								            <p>- Sau khi chọn hình ảnh hoàn tất, bạn phải chọn một ảnh làm ảnh đại diện sản phẩm.</p>
								        </div>
								        <a href="javascript:void(0)" class="btn green" id="select_file" data-toggle="modal" data-target="#myModalPages"><i class="fa fa-plus"></i> Chọn file ảnh</a>
								        <a href="javascript:void(0)" class="btn blue hidden" id="copy_info_image"><i class="fa fa-copy"></i> Sao chép tất cả ảnh vào mô tả</a>
								        <a href="javascript:void(0)" class="btn red hidden" id="save_info_image" data-lang="vi" data-message="Bạn chưa chọn ảnh đại diện sản phẩm" data-success="Thông tin hình ảnh sản phẩm đã được lưu lại thành công" data-title="Thông báo" data-close="Đóng"><i class="fa fa-save"></i> Lưu thông tin hình ảnh</a>
								        <input type="hidden" name="avatar" id="avatar" data-error="Bạn chưa chọn ảnh đại diện" value="<?php if(isset($this->data['data_images']['avatar'])) echo $this->data['data_images']['avatar']; ?>">
								        <input type="hidden" name="image" id="image" value="">
								        <ul class="list-image ui-sortable" id="sortable">
								        	<?php 
								        	if (!empty($this->data['data_images']['image'])) {
								        		foreach ($this->data['data_images']['image'] as $key => $value) {
								        			$url = base_url().'tmp/cdn/'.$value->name;
								        			if ($value->name==$this->data['data_images']['avatar']) {
								        				$checked_avatar = "checked_avatar";
								        				$html = '<i class="fa fa-chevron-down" aria-hidden="true"></i> '.lang('selected');
								        			}else{
								        				$checked_avatar = "select_avatar";
								        				$html = lang('choose_avatar');
								        			}
													echo '<li>
																<div class="imgs">
																	<img src="'.$url.'" class="handle">
																	<a href="javascript:void(0)" class="btn btn-xs green '.$checked_avatar.'" data-img="'.$value->name.'" data-choose-avatar="'.lang('choose_avatar').'" data-message="'.lang('selected').'">'.$html.'</a>
											                        <a href="javascript:void(0)" class="btn btn-xs red delete_image" data-title="'.lang('notification').'" data-message="'.lang('mess_remove_image').'" data-agree="'.lang('agree').'" data-cancel="'.lang('cancel').'" data-lang="vi">'.lang('delete_image').'</a>
																</div>
															    <input type="hidden" name="images_js[]" value="'.$value->name.'" />
															    <input type="text" name="att_title[]" class="form-control" maxlength="100" placeholder="'.lang('title_image').'" value="'.$value->att_title.'">
															    <textarea name="att_alt[]" class="form-control" maxlength="150" placeholder="'.lang('descript_image').'">
															    '.$value->att_alt.'</textarea>
														  </li>';
								        		}
								        	}
								        	 ?>
								        </ul>
								        <div class="clearfix"></div>
								    </div>
								</div>
								<div class="portlet light bordered" id="block-related">
								    <div class="portlet-title">
								        <div class="caption">
								            <i class="icon-equalizer font-red-sunglo"></i>
								            <span class="caption-subject font-red-sunglo bold uppercase">Sản phẩm liên quan</span>
								        </div>
								        <div class="tools">
								            <a href="javascript:;" class="collapse"></a>
								            <a href="javascript:;" class="remove"></a>
								        </div>
								    </div>
								    <div class="portlet-body form" style="">
								        <div class="note note-info">
								            <p>Quý khách hàng có thể quản lý sản phẩm liên quan sẽ hiện thị dưới sản phẩm này khi xem chi tiết sản phẩm , đặc biệt quý khách có thể quản lý những sản phẩm liên quan tự chọn bằng cách chọn những sản phẩm bên trái chuyển sang khung bên phải.</p>
								        </div>
								        <h4 class="form-section font-red-sunglo">Sản phẩm liên quan theo danh mục</h4>
								        <div class="row row-related">
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Trạng thái</label>
								                    <select class="form-control" name="status_related_category">
														<option value="1">Hiển thị</option>
														<option value="0">Không hiển thị</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-1">
								                <div class="form-group">
								                    <label>Sắp xếp</label>
								                    <select class="form-control" name="sort_related_category" aria-invalid="false">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Kiểu hiển thị</label>
								                    <select class="form-control" name="display_related_category">
														<option value="list">Danh sách</option>
														<option value="slide">Slide</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Sắp xếp sản phẩm</label>
								                    <select class="form-control" name="order_by_related_category">
														<option value="new">Mới nhất</option>
														<option value="view">Xem nhiều</option>
														<option value="random">Ngẫu nhiên</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-1">
								                <div class="form-group">
								                    <label>Số lượng</label>
								                    <select class="form-control" name="number_related_category">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
								                </div>
								            </div>
								        </div>
								        <h4 class="form-section font-red-sunglo">Sản phẩm liên quan theo thương hiệu</h4>
								        <div class="row row-related">
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Trạng thái</label>
								                    <select class="form-control" name="status_related_brand" aria-invalid="false">
														<option value="1">Hiển thị</option>
														<option value="0">Không hiển thị</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-1">
								                <div class="form-group">
								                    <label>Sắp xếp</label>
								                    <select class="form-control" name="sort_related_brand">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Kiểu hiển thị</label>
								                    <select class="form-control" name="display_related_brand">
														<option value="list">Danh sách</option>
														<option value="slide">Slide</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Sắp xếp sản phẩm</label>
								                    <select class="form-control" name="order_by_related_brand">
														<option value="new">Mới nhất</option>
														<option value="view">Xem nhiều</option>
														<option value="random">Ngẫu nhiên</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-1">
								                <div class="form-group">
								                    <label>Số lượng</label>
								                    <select class="form-control" name="number_related_brand">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
								                </div>
								            </div>
								        </div>
								        <h4 class="form-section font-red-sunglo">Sản phẩm liên quan theo khoảng giá</h4>
								        <div class="row row-related">
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Trạng thái</label>
								                    <select class="form-control" name="status_related_price">
														<option value="1">Hiển thị</option>
														<option value="0">Không hiển thị</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-1">
								                <div class="form-group">
								                    <label>Sắp xếp</label>
								                    <select class="form-control" name="sort_related_price">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Kiểu hiển thị</label>
								                    <select class="form-control" name="display_related_price">
														<option value="list">Danh sách</option>
														<option value="slide">Slide</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Sắp xếp sản phẩm</label>
								                    <select class="form-control" name="order_by_related_price" aria-invalid="false">
														<option value="new">Mới nhất</option>
														<option value="view">Xem nhiều</option>
														<option value="random">Ngẫu nhiên</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-1">
								                <div class="form-group">
								                    <label>Số lượng</label>
								                    <select class="form-control" name="number_related_price">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Chênh lệch giá</label>
								                    <input type="text" class="form-control" name="range_related_price" id="range_related_price" value="">
								                </div>
								            </div>
								        </div>
								        <h4 class="form-section font-red-sunglo">Sản phẩm liên quan tự chọn</h4>
								        <div class="row row-related">
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Trạng thái</label>
								                    <select class="form-control" name="status_related_select">
														<option value="1">Hiển thị</option>
														<option value="0">Không hiển thị</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-1">
								                <div class="form-group">
								                    <label>Sắp xếp</label>
								                    <select class="form-control" name="sort_related_select">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Kiểu hiển thị</label>
								                    <select class="form-control" name="display_related_select">
														<option value="list">Danh sách</option>
														<option value="slide">Slide</option>
													</select>
								                </div>
								            </div>
								            <div class="col-md-2">
								                <div class="form-group">
								                    <label>Sắp xếp sản phẩm</label>
								                    <select class="form-control" name="order_by_related_select">
														<option value="new">Mới nhất</option>
														<option value="view">Xem nhiều</option>
														<option value="random">Ngẫu nhiên</option>
													</select>
								                </div>
								            </div>
								        </div>
								        <div class="form-group" style="margin-top:10px;height: 367px;">
								        	<label class="control-label col-md-2">Chọn sản phẩm liên quan</label>								            
								            <div class="col-md-10">
								                <div class="col-left">
								                    <div class="col-title">
								                        <input type="text" class="form-control" id="text-search-product" placeholder="Tìm theo tên sản phẩm">
								                        <a class="btn green btn_search" id="button-search-product" data-lang="vi"><i class="fa fa-search"></i> Tìm</a>
								                    </div>
								                    <div class="scrollbar" id="left-product">
								                        <center>Không có sản phẩm nào</center>
								                    </div>
								                </div>
								                <div class="col-center"></div>
								                <div class="col-right">
								                    <div class="col-title"><span>Sản phẩm liên quan được chọn</span></div>
								                    <div class="scrollbar" id="right-product">
								                        <center>Không có sản phẩm nào</center>
								                    </div>
								                </div>
								                <input type="hidden" name="product_related" id="product-related" value="">
								                <input type="hidden" name="product_current" id="product-current" value="">
								            </div>
								        </div>
								    </div>
								</div>
								<div class="clearfix"></div>
								<div class="portlet light bordered" id="block-image">
								    <div class="portlet-title">
								        <div class="caption">
								            <i class="fa fa-sliders" aria-hidden="true"></i> &nbsp;
								            <span class="caption-subject font-red-sunglo bold uppercase">THẺ META PHỤC VỤ SEO</span>
								        </div>
								        <div class="tools">
								            <a href="javascript:;" class="collapse" data-status="true"></a>
								            <a href="javascript:;" class="remove"></a>
								        </div>
								    </div>
								    <div class="portlet-body form">
								        <div class="note note-info">
								            <p>Các thẻ meta bên dưới phục vụ cho Seo website của bạn lên các bộ máy tìm kiếm như Google, Yahoo, Bing,...</p>
								        </div>
								        <div class="form-group ">
										    <label for="description" class="control-label required"><?php echo lang('meta_keyword');?> (<?php echo lang('meta_keyword_required');?>)</label>
										    <input class="form-control" id="meta_keyword" name="meta_keyword" value="<?php if(isset($this->data['data']['meta_keyword'])) echo $this->data['data']['meta_keyword']; ?>" />
										</div>
										<div class="form-group ">
										    <label for="description" class="control-label required"><?php echo lang('meta_description');?></label>
										    <textarea class="form-control" rows="4" id="meta_description" placeholder="<?php echo lang('meta_description_required');?>" data-counter="300" name="meta_description" cols="50"><?php if(isset($this->data['data']['meta_description'])) echo $this->data['data']['meta_description']; ?></textarea>
										</div>
								        <div class="clearfix"></div>
								    </div>
								</div>


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



			<div class="modal-image-choose">
		        <!-- Modal Choose Images List -->
		        <div class="modal fade" id="myModalPages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		                  <div class="modal-dialog" role="document">
		                    <div class="modal-content">
		                      <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                        <h4 class="modal-title" id="label-model-folder-img">
		                           <?php echo lang('choose_logo'); ?>
		                        </h4>
		                      </div>
		                      <div class="modal-body" data-mess-one="<?php echo lang('warning_choose_img');?>" data-mess-two="<?php echo lang('warning_choose_img_one');?>" data-title="list-images-product">
		                       <?php
		                        $dir          = DIR_TMP.'cdn/';
		                          $html = listAllFolderChooseImage($dir);
		                          echo $html;

		                        ?>
		                      </div>
		                      <div class="modal-footer">
		                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
		                        <button type="button" class="btn btn-primary choose_img_list"><?php echo lang('choose');?></button>
		                      </div>
		                    </div>
		                  </div>
		        </div><!--END MODAL Choose Images List-->
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