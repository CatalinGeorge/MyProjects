<!--Add form-->
<div class="add-form-item p20 m20">
<?php echo validation_errors(); ?>
<?php echo form_open('admin/update_settings'); ?>

<div class="add_form row card mtb30">
  <div class="col-md-3 col-md-offset-3 pt15">
    <label>Listings per page</label>
  </div>
  <div class="col-md-3">
    <input type="text" name="set_listings_per_page" value="<?php echo $settings['set_listings_per_page']; ?>" />
  </div>
</div>

<div class="add_form row card mtb30">
  <div class="col-md-3 col-md-offset-3 pt15">
    <label>Advertisements per page</label>
  </div>
  <div class="col-md-3">
    <input type="text" name="set_advertisements_per_page" value="<?php echo $settings['set_advertisements_per_page']; ?>" />
  </div>
</div>

<div class="add_form row card mtb30">
  <div class="col-md-3 col-md-offset-3 pt15">
    <label>Impressions per $1</label>
  </div>
  <div class="col-md-3">
    <input type="text" name="set_impressions_per_dollar" value="<?php echo $settings['set_impressions_per_dollar']; ?>" />
  </div>
</div>

<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="add_form card submit-btn bg-blue">
<input type="submit" name="submit" value="Update settings" />
</div>
</div>
</div>

</form>
</div>
