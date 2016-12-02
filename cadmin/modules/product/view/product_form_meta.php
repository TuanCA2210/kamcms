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
		    <input class="form-control" id="meta_keyword" name="meta_keyword" value="<?php if(isset($this->data['data_detail']['meta_keyword'])) echo $this->data['data_detail']['meta_keyword']; ?>" />
		</div>
		<div class="form-group ">
		    <label for="description" class="control-label required"><?php echo lang('meta_description');?></label>
		    <textarea class="form-control" rows="4" id="meta_description" placeholder="<?php echo lang('meta_description_required');?>" data-counter="300" name="meta_description" cols="50"><?php if(isset($this->data['data_detail']['meta_description'])) echo $this->data['data_detail']['meta_description']; ?></textarea>
		</div>
        <div class="clearfix"></div>
    </div>
</div>