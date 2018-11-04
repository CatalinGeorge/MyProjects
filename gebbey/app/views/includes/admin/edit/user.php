<a class="v-center p10" href="<?php echo $this->agent->referrer(); ?>"><i class="material-icons">keyboard_arrow_left</i> Back</a>
<?php echo form_open('admin/save_edituser'); ?>

  <div class="add_form card row">

      <div class="col-md-6 pt15">
        <label>Username</label>
      </div>

      <div class="col-md-6">
        <input type="text" name="u_username" value="<?php echo $user['u_username'] ?>" />
      </div>

    </div>

    <div class="add_form card row">

        <div class="col-md-6 pt15">
          <label>Email</label>
        </div>

        <div class="col-md-6">
          <input type="text" name="u_email" value="<?php echo $user['u_email'] ?>" />
        </div>

      </div>

      <div class="add_form card row">

          <div class="col-md-6 pt15">
            <label>Location</label>
          </div>

          <div class="col-md-6">
            <input type="text" name="u_location" value="<?php echo $user['u_location'] ?>" />
          </div>

        </div>

        <div class="add_form card row">

            <div class="col-md-6 pt15">
              <label>Phone</label>
            </div>

            <div class="col-md-6">
              <input type="text" name="u_phone" value="<?php echo $user['u_phone'] ?>" />
            </div>

          </div>

    <input type="hidden" name="u_id" value="<?php echo $user['u_id'] ?>" />


  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="add_form card submit-btn bg-blue">
        <input type="submit" name="submit" value="Update user" />
      </div>
    </div>
  </div>


</form>
