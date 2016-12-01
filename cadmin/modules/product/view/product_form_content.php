<div class="form-group ">
    <label class="control-label required"><?php echo lang('content');?></label>
    <textarea class="form-control" id="content" name="content" cols="50" rows="10" style="visibility: hidden; display: none;">
    	<?php if(isset($this->data['data_detail']['full_info'])) echo $this->data['data_detail']['full_info']; ?>
    </textarea>
    <script type="text/javascript">CKEDITOR.replace('content');</script>

</div>
<div class="clearfix"></div>