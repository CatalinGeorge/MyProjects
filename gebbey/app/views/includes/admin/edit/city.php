<a class="v-center p10" href="<?php echo $this->agent->referrer(); ?>"><i class="material-icons">keyboard_arrow_left</i> Back</a>
<?php echo form_open('admin/save_editcity'); ?>

  <div class="add_form card row">

      <div class="col-md-6 pt15">
        <label>City name</label>
      </div>

      <div class="col-md-6">
        <input type="text" name="city_name" value="<?php echo $city['city_name'] ?>" />
      </div>

    </div>

    <input type="hidden" name="city_id" value="<?php echo $city['city_id'] ?>" />

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="add_form card submit-btn bg-blue">
        <input type="submit" name="submit" value="Update city" />
      </div>
    </div>
  </div>
</form>
