<div class="form-group ">
    <label for="name" class="control-label required"><?php echo lang('price');?></label>
    <input class="form-control" id="price" placeholder="<?php echo lang('product_placeholder'); ?>" value="<?php if(isset($this->data['data']['price'])) echo $this->data['data']['price']; ?>" name="price" type="text" />
</div>