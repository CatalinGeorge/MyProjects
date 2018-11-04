<?php echo form_open('admin/save_edituser'); ?>
<label>User first name</label>
  <input type="text" name="us_first" value="<?php echo $user_info['us_first'] ?>" />
  <br>
  <label>User last name</label>
    <input type="text" name="us_last" value="<?php echo $user_info['us_last'] ?>" />
    <br><label>User email</label>
      <input type="text" name="us_email" value="<?php echo $user_info['us_email'] ?>" />
    <br>  <label>Description</label>
        <input type="text" name="us_description" value="<?php echo $user_info['us_description'] ?>" />
<br>
            <input type="hidden" name="us_id" value="<?php echo $user_info['us_id'] ?>" />
            <input type="submit" name="submit" value="Update info" />
            <a href="<?php echo base_url(); ?>admin/remove_img/<?php echo $user_info['us_id']; ?>">
                <img src="<?php echo base_url(); ?>media/profiles/<?php echo $user_info['us_id']; ?>/<?php echo $user_info['us_img']; ?>"></a>



            


</form>
