<div class="row categories">

  <!--Add form-->
  <div class="add-form-item add-form p20 m20 col-xs-12 clearfix">
  <?php echo validation_errors(); ?>
  <?php echo form_open_multipart('admin/addcategory'); ?>
    <div class="add_form card">
      <div class="bg-light-more p20">
        <div class="add_form card col-xs-12">
          <input name="name" rows="5" placeholder="Category name....">
        </div>
        <div class="img-uploader col-xs-6">
          <label>Desktop image</label>
          <input type="file" name="userfile">
        </div>
        <div class="img-uploader col-xs-6">
          <label>Mobile image</label>
          <input type="file" name="userfilemobile">
        </div>
        <div class="add_form card submit-btn bg-blue col-xs-12">
            <input type="submit" name="submit" value="Publish">
        </div>
      </div>
      </form>
  </div>
</form>
</div>

  <?php foreach ($categories as $cat): ?>
  <div class="cat_admin_row">
    <div class="col-md-4 col-sm-6 col-xs-12 categs-cont">
      <div class="card p10">
        <div class="actions">
          <a href="<?php echo base_url(); ?>admin/editcategory/<?php echo $cat['c_id']; ?>"><i class="material-icons">edit</i></a>
          <a href="<?php echo base_url(); ?>admin/deletecategory/<?php echo $cat['c_id']; ?>"><i class="material-icons">delete</i></a>
        </div>
        <div class=" categs-img" style="background:url(<?php echo base_url().'media/categories/'.$cat['c_img']; ?>) no-repeat center center;"></div>
        <span><?php echo $cat['c_name']; ?></span>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>

<a class="floating-br bg-blue round white center add-form-trigger"><i class="material-icons">add</i></a>
