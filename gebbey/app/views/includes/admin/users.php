<!--Add form-->
<div class="add-form-item add-form p20 m20">
  <?php echo form_open('admin/adduser'); ?>

  <div class="add_form card mt20">
      <input type="email" name="email" placeholder="What is your email address?">
  </div>
  <div class="add_form card">
      <input type="text" name="username" placeholder="Choose a username">
  </div>
  <div class="add_form card">
      <input type="password" name="password" placeholder="Choose a password">
  </div>

    <div class="add_form card">
      <input type="text" name="lat" placeholder="Latitude">
    </div>

      <div class="add_form card">
      <input type="text" name="lon" placeholder="Longitude">
    </div>

      <div class="add_form card">
        <input type="text"  name="location" placeholder="Where are you from?">
    </div>

  <div class="add_form card">
      <input type="text" name="phone" placeholder="Can you tell us your phone number?">
  </div>


  <div class="ptb10"></div>
  <div class="add_form card submit-btn bg-blue">
      <input type="submit" name="submit" value="Register">
  </div>

  </form>
</div>

<!--div class="add_form card">
  <input type="text" name="search" placeholder="Search users by username..." class="mtb10">
</div-->

<?php foreach ($users as $user): ?>
  <div class="row admin_row">
    <div class="col-md-8">
      <?php echo $user['u_username']; ?> <span class="blue"> - </span> <?php echo $user['u_location']; ?>
    </div>
    <div class="col-md-4 right">
      <a class="plr10" href="<?php echo base_url(); ?>admin/edituser/<?php echo $user['u_id']; ?>"><i class="material-icons">edit</i></a>
      <a class="plr10" href="<?php echo base_url(); ?>admin/deleteuser/<?php echo $user['u_id']; ?>"><i class="material-icons">delete</i></a>
    </div>
  </div>
<?php endforeach; ?>

<!--a class="floating-br bg-blue round white center add-form-trigger"><i class="material-icons">add</i></a-->
