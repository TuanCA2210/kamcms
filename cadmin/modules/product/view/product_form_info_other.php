<div class="form-group">
    <label class="control-label required">Thêm thông tin khác</label>
    <div class="info_other">
    	<?php 
    	if (!empty($this->data['data_other_info'])) {
    		foreach ($this->data['data_other_info'] as $key => $value) { ?>
    			<div class="element-info">
		    		<div class="col-md-5 noPadding">
				        <input type="text" class="form-control maxlength-handler" name="info_title[]" maxlength="60" placeholder="Nhập tiêu đề..." value="<?php echo $value->title;?>">
				    </div>
				    <div class="col-md-5">
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
	    		<div class="col-md-5 noPadding">
			        <input type="text" class="form-control maxlength-handler" name="info_title[]" maxlength="60" placeholder="Nhập tiêu đề...">
			    </div>
			    <div class="col-md-5">
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