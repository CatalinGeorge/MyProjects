<a class="v-center p10" href="<?php echo $this->agent->referrer(); ?>"><i class="material-icons">keyboard_arrow_left</i> Back</a>
<?php echo form_open('admin/save_editmake'); ?>


  <div class="add_form card row">

      <div class="col-md-6 pt15">
        <label>Make name</label>
      </div>

      <div class="col-md-6">
        <input type="text" name="make_name" value="<?php echo $make['make_name'] ?>" />
      </div>

    </div>


    <input type="hidden" name="make_id" value="<?php echo $make['make_id'] ?>" />

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="add_form card submit-btn bg-blue">
        <input type="submit" name="submit" value="Update Maker" />
      </div>
    </div>
  </div>
</form>
