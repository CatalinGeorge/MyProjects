<!--Add form-->
<div class="add-form-item add-form p20 m20">
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('admin/adduser'); ?>
  <div class="add_form card">
    <div class="bg-light-more p20">
      <div class="add_form card">
        <input name="name" rows="5" placeholder="Category name....">
      </div>
          <div class="add_form card">
              <input type="text" name="price" placeholder="Icon">
              <a class="small p10" href="https://material.io/icons/" target="_blank">https://material.io/icons/</a>
        </div>
      <div class="img-uploader">
        <input type="file" name="userfile[]" multiple="multiple">
      </div>
      <div class="add_form card submit-btn bg-blue">
          <input type="submit" name="submit" value="Publish">
      </div>
    </div>
    </form>
</div>
</form>
</div>

<!--div class="add_form card">
  <input type="text" name="search" placeholder="Search users by username..." class="mtb10">
</div-->

<?php foreach ($advertisers as $user): ?>
  <div class="row admin_row">
    <div class="col-md-8">
      <?php echo $user['adv_username']; ?> <span class="blue"> - </span> <?php echo $user['adv_location']; ?>
    </div>
    <div class="col-md-4 right">
      <!--a class="plr10" href="<?php echo base_url(); ?>admin/useradverts/<?php echo $user['adv_id']; ?>"><i class="material-icons">dashboard</i></a-->
      <!--a class="plr10" href="<?php echo base_url(); ?>admin/editadvertiser/<?php echo $user['adv_id']; ?>"><i class="material-icons">edit</i></a-->
      <a class="plr10" href="<?php echo base_url(); ?>admin/deleteadvertiser/<?php echo $user['adv_id']; ?>"><i class="material-icons">delete</i></a>
    </div>
  </div>
<?php endforeach; ?>

<!--a class="floating-br bg-blue round white center add-form-trigger"><i class="material-icons">add</i></a-->
