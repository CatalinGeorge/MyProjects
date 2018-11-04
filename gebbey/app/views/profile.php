<!--Page-->
<div class="page home-page container">

  <div class="cap float-right">
    <?php echo $user_info['u_username']; ?>
 </div>

  <ul class="nav nav-pills">
      <li class="active"><a data-toggle="pill" href="#listings">Listings</a></li>
      <li><a data-toggle="pill" href="#settings">Settings</a></li>
      <li><a data-toggle="pill" href="#comments">Comments</a></li>
    </ul>

    <div class="tab-content">
      <div id="listings" class="tab-pane fade in active">

        <?php if($items) { ?>

        <?php foreach ($items as $item): ?>
          <div class="col-md-6">
          <div class="row admin_row card p5">
            <div class="col-md-2">
              <img src="<?php echo base_url(); ?>media/<?php echo $item['i_media']; ?>/<?php echo $item['me_img']; ?>" width="40" height="40" class="round">
            </div>
            <div class="col-md-6 p10">
            <a href="<?php echo base_url(); ?>view/<?php echo $item['i_slug'] ;?>"  ><?php echo $item['i_name']; ?></a> <span class="blue">
            </div>
            <div class="col-md-4 right p10">
              <a class="plr10" href="<?php echo base_url(); ?>profile/edititem/<?php echo $item['i_id']; ?>"><i class="material-icons">edit</i></a>
              <a class="plr10" href="<?php echo base_url(); ?>profile/deleteitem/<?php echo $item['i_id']; ?>"><i class="material-icons">delete</i></a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        <?php
      } else { ?>

        <div class="row admin_row card p20">
          You have no listings posted so far.
        </div>

        <?php } ?>

      </div>
      <div id="settings" class="card p20 tab-pane fade">

        <!--Register form-->
        <!-- <?php echo validation_errors(); ?> -->
        <?php echo form_open('profile/update_user'); ?>

        <div class="add_form card mt20">
          <label class="p10">Email address</label>
            <input type="email" name="email" value="<?php echo $user_info['u_email']; ?>">
        </div>
        <div class="add_form card">
          <label class="p10">Username</label>
            <input type="text" name="username"  value="<?php echo $user_info['u_username']; ?>">
        </div>

          <div class="add_form card">
            <!--a class="material-icons icon-locate royal" onclick="getLocation()">my_location</a-->
            <!-- <label class="p10">Location</label>
              <input type="text"  name="location" value="<?php echo $user['u_location']; ?>" id="location">
          </div> -->

        <div class="add_form card">
          <label class="p10">Phone</label>
            <input type="text" name="phone" value="<?php echo $user_info['u_phone']; ?>">
        </div>
            <!-- <input type="hidden" name="lat" value="<?php echo $user['u_lat']; ?>">
            <input type="hidden" name="lon" value="<?php echo $user['u_lon']; ?>"> -->

            <input type="hidden" name="user_id" value="<?php echo $user_info['u_id']; ?>">

        <div class="add_form card submit-btn bg-blue">
            <input type="submit" name="submit" value="Update profile">
        </div>

        </form>
        <div class="overlay"></div><!--Register form-->

      </div>
    </div>

    <div id="comments" class="card p20 tab-pane fade">
      <?php if(!empty($comments)){ ?>
      <?php foreach($comments as $comment): ?>
        <?php echo $comment['u_username']; ?> -><a href="<?php echo base_url(); ?>view/<?php echo $comment['i_slug']; ?>" > <?php echo $comment['i_name']; ?></a><br>
        <?php echo $comment['co_comment']; ?><hr>
      <?php endforeach; ?>
    <?php } else { ?>
  <?php echo 'You have no comments yet.';  } ?>

    </div>

</div>
