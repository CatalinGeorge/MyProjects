<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7 p-t-b-30 m-t-50 ">
      <?php echo validation_errors(); ?>
            <?php echo form_open('profile/edit'); ?>
      <h4 class="p-t-b-10 center text-gray">Edit profile details</h4>
      <div class="row">
        <div class="col-md-6">
          <input type="text" placeholder="First Name..." class="border p-t-b-10 p-l-r-20 m-t-b-10 full-width" required/>
        </div>
        <div class="col-md-6">
          <input type="text" placeholder="Last Name..." class="border p-t-b-10 p-l-r-20 m-t-b-10 full-width" required/>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <input type="text" placeholder="City..." class="border p-t-b-10 p-l-r-20 m-t-b-10 full-width"/>
        </div>
        <div class="col-md-6">
          <input type="text" placeholder="Phone number..." class="border p-t-b-10 p-l-r-20 m-t-b-10 full-width" required/>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <input type="password" placeholder="Current password..." class="border p-t-b-10 p-l-r-20 m-t-b-10 full-width"/>
        </div>
        <div class="col-md-6">
          <input type="password" placeholder="New password..." class="border p-t-b-10 p-l-r-20 m-t-b-10 full-width"/>
        </div>
      </div>
    </form>
      <p class="text-gray m-t-10 p-l-r-15">Change your profile picture:</p>
      <div class="relative p-l-r-15">
        <input type="file" name="pic" accept="image/*" class="p-t-b-20 absolute top-0 elem-small op-0">
        <img src="<?php echo base_url(); ?>assets/img/icons/avatar.png" class="bg-white" width="50">
      </div>
      <div class="center m-t-30">
        <div><input type="submit" value="save changes" class="btn-outline-b"></div>
      </div>

    </div>
    <div class="col-md-1"></div>
