<?php echo form_open_multipart('edit/save_edituser'); ?>


<div class="row">

<div class="col-md-4 col-md-offset-4 box-shadow2 ptb40 round-small mt50">

  <h4 class="m0 center pb30">Edit your profile</h4>

  <div class="row plr20">
    <div class="col-md-4">
      <label class="ptb5 fw100">Name</label>
    </div>
    <div class="col-md-8 round-small no-focus border-gray2">
      <input type="input" name="first" class="ptb5 font-12 no-border full-width" value="<?php echo $edit['us_first'] ?>" />
    </div>
  </div><br>


    <input type="hidden" name="last" class="ptb5 font-12 no-border full-width" value="" />

  <div class="row plr20">
    <div class="col-md-4">
    <label class="ptb5 fw100">Email</label>
  </div>
  <div class="col-md-8 round-small no-focus border-gray2">
    <input type="input" name="email" class="ptb5 font-12 no-border full-width" value="<?php echo $edit['us_email'] ?>" />
    </div>
  </div><br>

  <div class="row plr20">
    <div class="col-md-4">
    <label class="ptb5 fw100">Description</label>
  </div>
  <div class="col-md-8 round-small no-focus border-gray2">
    <textarea type="input" name="description" class="ptb5 font-12 no-border full-width"><?php echo $edit['us_description'] ?>"</textarea>
    </div>
  </div><br>

  <div class="row plr20">
    <div class="col-md-4 pr0">
    <label class="ptb5 fw100"></label>
  </div>
  <div class="center_mobile">
    <img class="img_edit_profile_mobile mb20" src="<?php echo base_url().'media/profiles/'.$user['us_id'].'/'.$edit['us_img']; ?>" width="100px">
  </div>
  <div class="col-md-8 p0 img_edit_profile_mobile">

    <div class="upload-button bg-gray inline plr15 ptb7 font-12 round-small">
        <img src="https://png.icons8.com/material/15/ffffff/upload.png">
        <input type="file" class="op0 absolute p10 left-0 top-0" name="avatar" value="<?php echo $edit['us_img'] ?>">
        <?php if($edit['us_img'] != '') { ?>
          <span class="pl5 text-white letter-spacing1">Change profile picture</span>
        <?php } else { ?>
          <span class="pl5 text-white letter-spacing1">Add a profile picture</span>
        <?php } ?>

    </div>
  </div>
  </div><br>

  <div class="row plr20">
    <div class="col-md-4 pr0">
    <label class="ptb5 fw100"></label>
  </div>
  <div class="col-md-8 p0">
    <div class="center_mobile">
      <input  name="submit" type="submit" value="Update info" class="mtb5 up font-12 fw600 round mr10 outline-button-orange single-link-ow">
    </div>
  </div>
  </div>
  </form>
</div>

</div>
