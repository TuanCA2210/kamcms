<div class="form-group ">
    <label for="name" class="control-label required"><?php echo lang('product_code');?></label>
    <input class="form-control" placeholder="<?php echo lang('product_code');?>" id="code" value="<?php if(isset($this->data['data']['code'])) echo $this->data['data']['code']; ?>" name="code" type="text">
</div>