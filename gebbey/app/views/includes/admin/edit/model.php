<a class="v-center p10" href="<?php echo $this->agent->referrer(); ?>"><i class="material-icons">keyboard_arrow_left</i> Back</a>
<?php echo form_open('admin/save_editmodel'); ?>

  <div class="add_form card row">

      <div class="col-md-6 pt15">
        <label>Model name</label>
      </div>

      <div class="col-md-6">
        <input type="text" name="model_name" value="<?php echo $model['model_name'] ?>" />
      </div>

    </div>

    <input type="hidden" name="model_id" value="<?php echo $model['model_id'] ?>" />

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="add_form card submit-btn bg-blue">
        <input type="submit" name="submit" value="Update Model" />
      </div>
    </div>
  </div>
</form>
