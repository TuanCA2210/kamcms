<div class="form-group ">
    <label for="description" class="control-label required"><?php echo lang('description');?></label>
    <textarea class="form-control" rows="4" id="description" placeholder="<?php echo lang('description_required');?>" data-counter="300" name="description" cols="50"><?php if(isset($this->data['data']['short_info'])) echo $this->data['data']['short_info']; ?></textarea>
</div>