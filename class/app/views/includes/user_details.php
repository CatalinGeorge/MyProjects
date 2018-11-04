<div class="container p-t-b-10">
  <div class="row v-center border-bottom2">
    <div class="col-md-5 p-0">
      <ul class="nav nav-tabs ">
        <li class="active"><a data-toggle="tab" href="#home">Products (<?php echo $count_products; ?>)</a></li>
        <li><a data-toggle="tab" href="#menu1">Contact</a></li>
        <li><a data-toggle="tab" href="#menu2">Ratings (<img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png" width="9"><img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png" width="9"><img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png" width="9">/258)</a></li>
      </ul>

    </div>
    <div class="col-md-2">
    <p class="text-gray m-t-10"><img src="https://png.icons8.com/ios/20/8389af/marker.png"> &nbsp;<?php echo $usr['us_location']; ?></p>
    </div>
    <div class="col-md-3">
      <p class="text-gray m-t-10"><img src="https://png.icons8.com/ios/16/8389af/gift.png"> &nbsp;Joined on <?php echo $usr['us_added']; ?></p>
    </div>
    <div class="col-md-2">
      <div class="v-center">
        <img src="<?php echo base_url(); ?>media/profile/<?php echo $usr['us_id']; ?>/<?php echo $usr['us_avatar']; ?>" alt="1" width="40" height="40" class="round">
        <p class="text-gray m-b-0 p-l-10"><?php echo $usr['us_username']; ?></p>
      </div>
    </div>
  </div>
</div>

<div class="container p-t-b-30">
  <div class="row">
    <div class="col-md-9">
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <!-- Viewed Products Title -->
        <div class="inline m-b-20 round-small p-10">
          <div class="inline">
              <h4 class="cap p-l-r-10 m-0 text-gray">Recently added products</h4>
          </div>
        </div>

      <!-- Top  -->
      <div class="row p-b-50">
        <?php    if(!empty($products)){ ?>
        <?php foreach ($products as $prd): ?>
        <div class="col-md-2 border-right center p-t-b-20 round-small box-effect">
          <?php
           //load directory helper
          $dir = 'media/'.$prd["pr_media"].'/'; // Your Path to folder
          $map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */

          ?>

          <img src="<?php echo base_url($dir)."/".$map[0]; ?>" alt="1" width="100%">


          <h4 class="fw-600 text-blue">$<?php echo $prd['pr_price']; ?></h4>
          <p class="text-gray m-b-20 fs-12"><?php echo $prd['pr_description']; ?></p>
          <a href="<?php echo base_url(); ?>single/single_product/<?php echo $prd['pr_id']; ?>"><div class="btn-outline-b2">details</div></a>
        </div>
      <?php endforeach; ?>
    <?php }else{ ?>
<?php  } ?>




      </div>
    </div>

    <div id="menu1" class="tab-pane fade">
      <!--Title -->
        <div class="inline m-b-20 round-small p-10">
          <div class="inline">
              <h4 class="cap p-l-r-10 m-0 text-gray">More details</h4>
          </div>
        </div>

      <div class="p-l-r-20">
        <p class="text-gray p-b-10"><img src="https://png.icons8.com/ios/20/8389af/ringer-volume.png"> +00 87373 83474 82383</p>
        <div class="relative">
          <input type="text" class="inputText2 border-bottom3 no-focus" required/>
          <span class="floating-label text-gray">Your email address</span>
        </div>
        <?php echo form_open('profile/send_message'); ?>
        <div class="m-t-30">
          <input type="hidden" name="to" value="<?php echo $usr['us_id']; ?>" >
          <textarea name="message" class="border full-width no-resize p-10" rows="7" placeholder="Leave a message..."></textarea>
        </div>

        <div class=" m-t-50"><input type="submit" value="send message" class="btn-outline-b"></div>
      </form>

      </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <!-- Title -->
        <div class="inline m-b-20 round-small p-10">
          <div class="inline">
            <h4 class="cap p-l-r-10 m-0 text-gray">Client's opinion</h4>
          </div>
        </div>

      <div class="p-l-r-20">
        <div class="row p-t-20">
          <div class="col-md-1">
            <img src="https://randomuser.me/api/portraits/men/61.jpg" width="50" class="round">
          </div>
          <div class="col-md-11">
            <div class="p-l-r-10">
              <h5 class="fw-700 m-t-b-0">Jack Croft</h5>
              <div>
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
              </div>
              <p class="lh-20 text-gray">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui </p>
            </div>
          </div>
        </div>
        <hr>

        <div class="row p-t-20">
          <div class="col-md-1">
            <img src="https://randomuser.me/api/portraits/men/62.jpg" width="50" class="round">
          </div>
          <div class="col-md-11">
            <div class="p-l-r-10">
              <h5 class="fw-700 m-t-b-0">Jack Croft</h5>
              <div>
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
              </div>
              <p class="lh-20 text-gray">At cupiditate non provident, similique sunt in culpa qui </p>
            </div>
          </div>
        </div>
        <hr>

        <div class="row p-t-20">
          <div class="col-md-1">
            <img src="https://randomuser.me/api/portraits/men/63.jpg" width="50" class="round">
          </div>
          <div class="col-md-11">
            <div class="p-l-r-10">
              <h5 class="fw-700 m-t-b-0">Jack Croft</h5>
              <div>
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
              </div>
              <p class="lh-20 text-gray">At vero eos et accusamus et iusto odio dignissimos ducimusexcepturi sint occaecati cupiditate non provident, similique sunt in culpa qui </p>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div>
</div><!-- end first col -->
