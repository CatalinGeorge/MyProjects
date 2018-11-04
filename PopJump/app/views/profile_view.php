<!-- Profile Page -->
<?php echo $this->session->flashdata('message'); ?>
<div class="bg-light ptb50">
  <div class="container bg-white plr30 ptb50 round-small box-shadow">

    <!-- Step 1 -->

    <h4 class="mtb0"><img src="https://png.icons8.com/ios/15/3f4257/groups-filled.png"> <span class="text-align-mid">Social account details</span></h4>
    <hr>

    <div class="row pt10">
      <?php    if(!empty($networks)){ ?>
      <?php foreach ($networks as $network): ?>
      <div class="col-md-6 mb20">
        <div class="row round-small card clearfix">
          <div class="col-md-2 col-xs-4 p0">
            <div class="center ptb20 round-small-top-bottom-left border-right-dark">


              <?php
              $this->db->from('icons');
              $this->db->where('name', $network['net_name']);
              $query = $this->db->get();
                if($query->num_rows() > 0){
                    $result = $query->row_array(); ?>
                    <img src="<?php echo $result['icon'] ?>" width="40">
              <?php  }else{ ?>
                    <img src="https://image.flaticon.com/icons/svg/545/545700.svg" width="40">
              <?  }
               ?>


              <?php // foreach() { ?>

              <?php // } ?>
              <!--img src="<?php echo $network['icon'] ?>" width="40"-->
            </div>
          </div>
          <div class="col-md-8 col-xs-8 p0">
            <div class="p15">
              <p class="fw600 text-gray cap"><?php echo $network['net_name'] ?></p>
              <p class=" text-gray mb0 social_profile_name"><?php echo $network['net_name_user'] ?></p>
            </div>
          </div>
          <div class="col-md-2 col-xs-12 center p0">
            <div class="p15 mob_btns_small">
              <?php if($network['net_name'] != 'Facebook' && $network['net_name'] != 'Google' && $network['net_name'] != 'Twitter') { ?>
                <a href="<?php echo base_url(); ?>edit_network/edit/<?php echo $network['net_id']; ?>" class="edit-btn-small block font-10 fw600 text-gray single-link-dw ptb2 round-small up  mb5">edit</a>
              <?php } ?>
              <a href="<?php echo base_url(); ?>profile/delete_network/<?php echo $network['net_id']; ?>" class="delete-btn-small block font-10 fw600 text-gray single-link-dw ptb2 round-small up">delete</a>

            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php }else{ ?>
<?php   echo "No networks";
} ?>
    </div> <!-- end row first step -->

    <!-- Step 2 -->
    <h4 class="pt70"><img src="https://png.icons8.com/ios/15/3f4257/user-filled.png"> <span class="text-align-mid">Name</span></h4>
    <hr>
    <div class="pt10 row">
      <div class="col-md-1 p0">
        <div class="center round relative pb20">
          <img class="elem-other round" src="<?php echo base_url(); ?>media/profiles/<?php echo $info['us_id'] ?>/<?php echo $info['us_img']; ?>">
        </div>
      </div>
      <div class="col-md-11">
        <p class="fw600 mb0 up"><?php echo $info['us_first'] ?> <?php  echo $info['us_last'] ?></p>
        <p class="text-gray"> <?php echo $info['us_email'] ?></p>
        <p class="text-gray"><?php echo $info['us_description'] ?></p>
      </div>
    </div>
      <div class="float-right p10">
              <a href="<?php echo base_url(); ?>logout" class="up font-12 fw600 round mr10 outline-button-blue single-link-bw">logout</a>
        <a href="edit" class="up font-12 fw600 round mr10 outline-button-blue single-link-bw">edit profile</a>
      </div>


    <!-- Step 3 -->
    <h4 class="pt70"><img src="https://png.icons8.com/ios/15/3f4257/lock-filled.png"> <span class="text-align-sub">Change Password</span> </h4>
    <hr>
    <?php echo form_open('profile/change_password'); ?>
    <div class="row">
      <p class="text-gray">Having a hard time? </p>
      <div class="col-md-3">
        <div class="mtb5 text-left full-width round-small no-focus border-gray2">
          <input type="password" name="oldpass" placeholder="Type current password" class="ptb10 plr20 font-12 no-border round-small full-width">
        </div>
        <div class="mtb5 text-left full-width round-small no-focus border-gray2">
          <input type="password" name="newpass" placeholder="Type new password" class="ptb10 plr20 font-12 no-border round-small full-width">
        </div>
      </div>
    <input type="hidden" name="us_id" value="<?php echo $info['us_id']; ?>" /><br />
 <div class="col-md-3 col-md-offset-6">
        <div class="float-right mt15">
          <input type="submit" class="up font-12 fw600 round mr10 outline-button-blue single-link-bw bg-white" value="save password">
        </div>
      </div>
    </div>
</form>
<br><hr>
<?php echo form_open('profile/delete_account'); ?>
    <div class="row mt20">
      <p class="text-gray">Don't you want publicity anymore? </p>
      <div class="col-md-3">
        <div class="mtb5 text-left full-width round-small no-focus border-gray2">
          <input type="password" name="deletepass" placeholder="Enter Your Password" class="ptb10 plr20 font-12 no-border round-small full-width">
        </div>
      </div>
      <div class="col-md-3 col-md-offset-6">

        <div class="float-right mt15">


          <input type="submit" value="Remove account" class="up font-12 fw600 round mr10 outline-button-orange single-link-ow">
          <input type="hidden" name="us_id" value="<?php echo $info['us_id']; ?>" /><br />

        </div>
      </div>
    </div>
    </form>

  </div>
</div>
