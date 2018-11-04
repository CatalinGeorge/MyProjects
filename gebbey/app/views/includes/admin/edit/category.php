<a class="v-center p10" href="<?php echo $this->agent->referrer(); ?>"><i class="material-icons">keyboard_arrow_left</i> Back</a>
<?php echo form_open_multipart('admin/save_editcategory'); ?>

<div class="add_form card row">

    <div class="col-md-6 pt15">
      <label>Name</label>
    </div>

    <div class="col-md-6">
      <input type="text" name="c_name" value="<?php echo $category['c_name'] ?>" />
    </div>

  </div>

  <div class="add_form card row">

    <div class="col-md-6 pt15">
      <label>Position</label>
    </div>

    <div class="col-md-6">
      <input type="text" name="c_position" value="<?php echo $category['c_position'] ?>" />
      <input type="hidden" name="c_id" value="<?php echo $category['c_id'] ?>" />
    </div>

  </div>

  <div class="row">
    <div class="img-uploader col-xs-6">
      <label>Desktop image</label>
      <input type="file" name="userfile">
      <input type="hidden" name="image" value="<?php echo $category['c_img']; ?>">
    </div>
    <div class="img-uploader col-xs-6">
      <label>Mobile image</label>
      <input type="file" name="userfilemobile">
      <input type="hidden" name="icon" value="<?php echo $category['c_icon']; ?>">
    </div>
  </div>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="add_form card submit-btn bg-blue">
      <input type="submit" name="submit" value="Update category" />
    </div>
  </div>
</div>

</form>
