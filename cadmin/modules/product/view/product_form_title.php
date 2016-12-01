<div class="form-group ">
    <label for="name" class="control-label required"><?php echo lang('title');?></label>
    <input class="form-control" id="title" placeholder="<?php echo lang('maximum_categories'); ?>" value="<?php if(isset($this->data['data']['name'])) echo $this->data['data']['name']; ?>" name="title" type="text">
</div>