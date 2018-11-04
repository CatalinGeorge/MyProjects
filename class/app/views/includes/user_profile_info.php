<div class="container p-t-b-10">
  <div class="row v-center border-bottom2">
    <div class="col-md-12 p-0">
      <ul class="nav nav-tabs " id="myTab">
        <li class="active"><a data-toggle="tab" href="#products">Products <span class="badge bg-gray m-t--10 fs-12"><?php echo $count_products; ?></span></a></li>
        <li><a data-toggle="tab" href="#messages">Messages <span class="badge bg-gray m-t--10 fs-12"><?php echo $count_messages; ?></span></a></li>
        <li><a data-toggle="tab" href="#offers">Offers <span class="badge bg-gray m-t--10 fs-12"><?php echo $count_offers; ?></span></a></li>
        <li><a data-toggle="tab" href="#trades">Trades <span class="badge bg-gray m-t--10 fs-12"><?php echo $count_product_offers; ?></span></a></li>
        <li><a data-toggle="tab" href="#ratings">Ratings <span class="badge bg-gray m-t--10 fs-12"><img src="img/icons/christmas-star-filled.png" width="9"><img src="img/icons/christmas-star-filled.png" width="9"><img src="img/icons/christmas-star-filled.png" width="9">/258</span></a></a></li>
        <li><a data-toggle="tab" href="#favorites">Favorites <span class="badge bg-gray m-t--10 fs-12"><?php echo $count_favorites; ?></span></a></li>
        <li><a data-toggle="tab" href="#profile">Profile</a></li>

      </ul>
    </div>
    <script>
    $(document).ready(function() {
    if (location.hash) {
        $("a[href='" + location.hash + "']").tab("show");
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {
        location.hash = this.getAttribute("href");
    });
});
$(window).on("popstate", function() {
    var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
    $("a[href='" + anchor + "']").tab("show");
});
</script>
  </div>
</div>

<div class="container p-t-b-30">
  <div class="row">
    <div class="col-md-9">
  <div class="tab-content">

    <!-- products -->
    <div id="products" class="tab-pane fade in active">
      <!-- Viewed Products Title -->
        <div class="inline m-b-20 round-small p-10">
          <div class="inline">
              <h4 class="cap p-l-r-10 m-0 text-gray">Recently added products</h4>
          </div>
        </div>

      <!-- Top  -->
      <div class="row p-b-50">
          <?php    if(!empty($products)){ ?>
      <?php foreach($products as $prd): ?>
        <div class="col-md-3 border-right center p-t-b-20 round-small box-effect">
          <?php
          $dir = 'media/'.$prd["pr_media"].'/';
          $map = directory_map($dir);
          ?>
          <img src="<?php echo base_url($dir)."/".$map[0]; ?>" alt="1" width="100%">
          <h4 class="fw-600 text-blue">$<?php echo $prd['pr_price']; ?></h4>
          <p class="text-gray m-b-20 fs-12"><?php echo $prd['pr_name']; ?></p>
          <a href="<?php echo base_url(); ?>user_profile/edit_product/<?php echo $prd['pr_id']; ?>"><div class="btn-outline-b2">edit</div></a>
        </div>
      <?php endforeach; ?>
    <?php }else{ ?>
<?php  } ?>
      </div>
    </div>

    <!-- messages -->
    <div id="messages" class="tab-pane fade">
      <!--Title -->
        <div class="inline m-b-20 round-small p-10">
          <div class="inline">
              <h4 class="cap p-l-r-10 m-0 text-gray">My messages</h4>
          </div>
        </div>

      <div class="p-l-r-20">
          <?php    if(!empty($messages)){ ?>
        <?php foreach($messages as $msg): ?>

        <div class="row p-t-20">
            <a href="<?php echo base_url(); ?>profile/provider_profile/<?php echo $msg['me_from'] ?>" >
          <div class="col-md-1">
            <img src="<?php echo base_url(); ?>media/profile/<?php echo $msg['us_id']; ?>/<?php echo $msg['us_avatar']; ?>" width="50" class="round">
          </div></a>
          <div class="col-md-11">
            <div class="p-l-r-10">
              <h5 class="fw-700 m-t-0"><?php echo $msg['us_username']; ?> -><a href="<?php echo base_url(); ?>single/single_product/<?php echo $msg['me_prd']; ?>" ><?php echo $msg['pr_name']; ?></a> </h5>
              <p class="lh-20 text-gray"><?php echo $msg['me_message']; ?></p>
            </div>
          </div>


          <a ng-click="showReplies<?php echo $msg['me_id']; ?>=true">Show</a>
          <a ng-click="showReplies<?php echo $msg['me_id']; ?>=false">Hide</a>
          <div ng-show="showReplies<?php echo $msg['me_id']; ?>==true">
          <div ng-show="showReplies<?php echo $msg['me_id']; ?>==true">
          <?php    if(!empty($replies)){ ?>
            <?php foreach($replies as $reply): ?>
              <?php if($reply['mr_msg_id'] == $msg['me_id']) { ?><br>
            <a href="<?php echo base_url(); ?>profile/provider_profile/<?php echo $reply['mr_from']; ?>" >

              <?php echo $reply['us_username']; ?></a>

              <?php echo $reply['mr_message']; ?>

            <?php }else{ } ?>
            <?php endforeach; ?>
            <?php }else{ ?>
            <?php  } ?>
       <?php echo form_open('user_profile/add_reply'); ?>
          <input type="hidden" value="<?php echo $msg['me_id']; ?>" name="msg_id" >
          <input type="hidden" value="<?php echo $user['us_id']; ?>" name="us_id" >
          <input type="text" name="message" >
          <input type="submit" value="add reply" >
        </form>
      </div>
        </div>
      </div>
        <hr>
          <?php endforeach; ?>
        <?php }else{ ?>
    <?php  } ?>
    </div>
  </div>
    <!-- offers -->
    <div id="offers" class="tab-pane fade">
      <!-- Title -->
        <div class="inline m-b-20 round-small p-10">
          <div class="inline">
            <h4 class="cap p-l-r-10 m-0 text-gray">New Offers</h4>
          </div>
        </div>

      <div class="p-l-r-20">
        <?php    if(!empty($offers)){ ?>
        <?php foreach($offers as $offer): ?>
        <div class="row p-t-20 box-btn-o">
          <a href="<?php echo base_url(); ?>profile/provider_profile/<?php echo $offer['of_from'] ?>" >
          <div class="col-md-1">
            <img src="<?php echo base_url(); ?>media/profile/<?php echo $msg['us_id']; ?>/<?php echo $msg['us_avatar']; ?>" width="50" class="round">
          </div></a>
          <div class="col-md-11">
            <div class="p-l-r-10">
              <h5 class="fw-700 m-t-b-0"><?php echo $offer['us_username']; ?></h5>
              <div>
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
              </div>
              <div class="row v-center">
                <div class="col-md-3 p-l-0">
                  Has just offered
                </div>
                <div class="col-md-5">
                  <span class="fs-18 fw-600 text-blue">$</span>
                  <span class="border p-t-b-5">
                    <input type="text" placeholder="<?php echo $offer['of_value']; ?>" class="w-50 center no-border">
                  </span>
                  For<a href="<?php echo base_url(); ?>single/single_product/<?php echo $offer['of_product']; ?>"> <?php echo $offer['pr_name']; ?></a>
                </div>
                <a href="<?php echo base_url(); ?>user_profile/take_offer/<?php echo $offer['of_id']; ?>" >
                <div class="col-md-2 p-0 box-btn-i">
                  <div class="green-effect2 up fs-12">take it</div>
                </div></a>
            <a href="<?php echo base_url(); ?>user_profile/remove_offer/<?php echo $offer['of_id']; ?>" >   <div class="col-md-2 p-0 box-btn-i">
                  <div class="red-effect2 up fs-12">leave it</div>
                </div></a>
              </div>
            </div>
          </div>
        </div>
        <hr>
      <?php endforeach; ?>
    <?php }else{ ?>
<?php  } ?>

        <div class="row p-t-20">

        </div>

      </div>
    </div>

    <!-- trades -->
    <div id="trades" class="tab-pane fade">
      <!-- Title -->
        <div class="inline m-b-20 round-small p-10">
          <div class="inline">
            <h4 class="cap p-l-r-10 m-0 text-gray">New trades</h4>
          </div>
        </div>

      <div class="p-l-r-20">
          <?php    if(!empty($product_offers)){ ?>
      <?php foreach($product_offers as $pro): ?>
        <div class="row p-t-20 box-btn-o">
          <a href="<?php echo base_url(); ?>profile/provider_profile/<?php echo $pro['po_user'] ?>" >
          <div class="col-md-1">
            <img src="<?php echo base_url(); ?>media/profile/<?php echo $pro['us_id']; ?>/<?php echo $pro['us_avatar']; ?>" width="50" class="round">
          </div></a>
          <div class="col-md-11">
            <div class="p-l-r-10">
              <h5 class="fw-700 m-t-b-0"><?php echo $pro['us_username']; ?></h5>
              <div>
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
                <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
              </div>
              <div class="row v-center">
                <div class="col-md-3 p-l-0">
                  Has just offered
                </div>
                <div class="col-md-5 p-0">
                  <a href="<?php echo base_url(); ?>single/single_product/<?php echo $pro['po_offer_product']; ?>" >
                  <span class="fs-14 fw-600 text-blue m-r-5"><?php echo $pro['pr_name']; ?> </span></a>
                  <span class="border p-t-b-5">
                    <?php if($pro['po_val_type'] == 0) { ?>
                    <img src="https://png.icons8.com/ios/20/8389af/plus-math-filled.png" class="p-5 m-t--3 border-left">
                  <?php } else{ ?>
                    <img src="https://png.icons8.com/ios/20/8389af/minus-math-filled.png" class="p-5 m-t--3 border-left">
                  <?php } ?>
                    <input type="text" placeholder="<?php echo $pro['po_val']; ?>" class="w-50 center no-border">

                  </span>
                  for
                <?php
          $this->db->from('product_offers');
          $this->db->where('po_offer_product', $pro['pr_id']);
          $this->db->join('products','products.pr_id =product_offers.po_product');
          $query = $this->db->get();
          if ($query->num_rows() == 1) {
            $result = $query->row_array();
            ?>
                <a href="<?php echo base_url(); ?>single/single_product/<?php echo $pro['po_product']; ?>" >
                  <?php echo $result['pr_name']; ?></a>
                <?php }  ?>







                </div>
                <a href="<?php echo base_url(); ?>user_profile/take_product_offer/<?php echo $pro['po_id'] ?>" >
                <div class="col-md-2 p-0 box-btn-i">
                  <div class="green-effect2 up fs-12">take it</div>
                </div></a>
                  <a href="<?php echo base_url(); ?>user_profile/remove_product_offer/<?php echo $pro['po_id'] ?>" >
                <div class="col-md-2 p-0 box-btn-i">
                  <div class="red-effect2 up fs-12">leave it</div>
                </div></a>
              </div>
            </div>
          </div>
        </div>
        <hr>
      <?php endforeach; ?>
    <?php }else{ ?>
<?php  } ?>


      </div>
    </div>

    <!-- ratings -->
    <div id="ratings" class="tab-pane fade">
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

    <div id="favorites" class="tab-pane fade in active">
      <!-- Viewed Products Title -->
        <div class="inline m-b-20 round-small p-10">
          <div class="inline">
              <h4 class="cap p-l-r-10 m-0 text-gray">Favorite products</h4>
          </div>
        </div>

      <!-- Top  -->
      <div class="row p-b-50">
        <?php    if(!empty($favorites)){ ?>
      <?php foreach($favorites as $fav): ?>
        <div class="col-md-3 border-right center p-t-b-20 round-small box-effect">
          <?php
          $dir = 'media/'.$fav["pr_media"].'/';
          $map = directory_map($dir);
          ?>
          <img src="<?php echo base_url($dir)."/".$map[0]; ?>" alt="1" width="100%">
          <h4 class="fw-600 text-blue">$<?php echo $fav['pr_price']; ?></h4>
          <p class="text-gray m-b-20 fs-12"><?php echo $fav['pr_name']; ?></p>
        From <a href="<?php echo base_url(); ?>profile/provider_profile/<?php echo $fav['us_id'] ?>" > <p class="text-gray m-b-20 fs-12"><?php echo $fav['us_username']; ?></p></a>
        <a href="<?php echo base_url(); ?>user_profile/remove_favorite/<?php echo $fav['fp_product']; ?>">
        <span class="p-l-r-10 p-t-b-5 border-right"><img class="p-t-b-10" src="<?php echo base_url(); ?>assets/img/icons/broken-heart.png"><span class="fs-12 m-l-r-5 text-gray bg-light2 round inline p-l-r-5"></span></span></a><br>
          <a href="<?php echo base_url(); ?>single/single_product/<?php echo $fav['pr_id']; ?>"><div class="btn-outline-b2">View product</div></a>
        </div>
      <?php endforeach; ?>
    <?php }else{ ?>
<?php  } ?>
      </div>
    </div>

    <!-- profile -->
    <div id="profile" class="tab-pane fade">
      <div class="p-l-r-20">
        <div class="row p-t-20">

          <!-- Edit profile details -->
          <?php echo validation_errors(); ?>
          <?php echo form_open_multipart('user_profile/edit_profile'); ?>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text"  name="username" value="<?php echo $user['us_username']; ?>" placeholder="Username..." class="border p-t-b-10 p-l-r-20 m-t-b-10 full-width" />
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" name="location"  value="<?php echo $user['us_location']; ?>" placeholder="Location..." class="border p-t-b-10 p-l-r-20 m-t-b-10 full-width"/>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="phone"  value="<?php echo $user['us_phone']; ?>" placeholder="Phone number..." class="border p-t-b-10 p-l-r-20 m-t-b-10 full-width" />
                  </div>
                </div>


                <p class="text-gray m-t-10 p-l-r-15">Change your profile picture:</p>
                <div class="relative p-l-r-15">
                  <input type="file" value="<?php echo base_url(); ?>media/profile/<?php $user['us_id']; ?>/<?php echo $user['us_avatar']; ?>" name="avatar" class="p-t-b-20 absolute top-0 elem-small op-0">
                  <img src="<?php echo base_url(); ?>media/profile/<?php echo $user['us_id']; ?>/<?php echo $user['us_avatar']; ?>" class="bg-white" width="50">
                </div>
                <div class="center m-t-30">
                  <input type="submit" value="save changes" class="btn-outline-b">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>





  </div>
  </div>
</div>
</div>
<!-- end first col -->
