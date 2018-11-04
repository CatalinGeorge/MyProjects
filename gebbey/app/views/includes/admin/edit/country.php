<a class="v-center p10" href="<?php echo $this->agent->referrer(); ?>"><i class="material-icons">keyboard_arrow_left</i> Back</a>
<?php echo form_open('admin/save_editcountry'); ?>

  <div class="add_form card row">

      <div class="col-md-6 pt15">
        <label>Country name</label>
      </div>

      <div class="col-md-6">
        <input type="text" name="country_name" value="<?php echo $country['country_name'] ?>" />
      </div>

    </div>
    <input type="hidden" name="country_id" value="<?php echo $country['country_id'] ?>" />


  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="add_form card submit-btn bg-blue">
        <input type="submit" name="submit" value="Update country" />
      </div>
    </div>
  </div>



</form>
