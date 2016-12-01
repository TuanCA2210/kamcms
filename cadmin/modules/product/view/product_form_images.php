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