<!--Page-->
<div class="overlay-s"></div>
<div class="page home-page container" ng-controller="commentsCtrl">

  <div class="row">

  <div class="col-md-8 col-md-offset-1 main-content">

  <!--Full List View-->
  <div class="full-view">

    <!--Listing-->
      <div class="card listing">

        <a class="v-center p10" onclick="window.history.back();"><i class="material-icons">keyboard_arrow_left</i> Back</a>

          <!-- Slider main container -->
          <div class="swiper-container">


            <!--  Add to favourites
            <?php
              $this->load->database();
              $this->db->from('favourites');
              $this->db->where('fa_user', $user['u_id'] );
              $this->db->where('fa_item', $item['i_id'] );
              $query = $this->db->get();
                if($query->num_rows() > 0){
                      ?>
            <a class="unfavourite-toggle v-center"><i class="material-icons pr10 pl10 red">favorite</i> Added</a>
          <?php } else { ?>
            <i class="material-icons pr10 pl10 red">favorite_border</i>

            <?php echo form_open('single/favourite'); ?>
                  <input type="hidden" name="item" value="<?php echo $item['i_id'] ?>">
                  <input type="hidden" name="user" value="<?php echo $user['u_id'] ?>">
                  <input type="submit" name="submit" value="Save">
              </form>

          <?php }; ?>
-->

              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                  <!-- Slides -->

                  <?php
                    $this->load->database();
                    $this->db->from('media');
                    $this->db->where('me_dir', $item['i_media'] );
                    $query = $this->db->get();
                      if($query->num_rows() > 0){
                          $result = $query->result_array();
                          foreach ($result as $img):
                            ?>

                            <div class="swiper-slide">
                              <a href="<?php echo base_url().'media/'.$item['i_media'].'/'.$img['me_img']; ?>" data-lightbox="main-slider<?php echo $item['i_id']; ?>"><div style="height:450px; background:url(<?php echo base_url().'media/'.$item['i_media'].'/'.$img['me_img']; ?>)" class="img-cover">
                              </div></a>

                            </div>

                <?php endforeach;
                    }
                ?>

              </div>
              <div class="swiper-button-prev swiper-button-white"></div>
              <div class="swiper-button-next swiper-button-white"></div>
          </div>

          <div class="row ptb20 center">
            <div class="col-md-6 col-xs-6 v-center" style="border-right:1px solid #ddd;">
              <a class="phone-toggle v-center pr30 font-16"><i class="material-icons font-24 pr15 pl10 royal">phone</i> Call</a>
            </div>
            <div class="col-md-6 col-xs-6 v-center">
              <a class="email-toggle v-center pr30 font-16"><i class="material-icons font-24 pr15 pl10 blue">email</i> Email</a>
            </div>
            </div>
            <hr class="m0">
            <!--Phone call-->
            <div class="phone-box">
              <a href="tel:<?php echo $item['i_phone']; ?>">Phone number: <span class="blue"><?php echo $item['i_phone']; ?></span></a>
            </div><!--Phone call-->
            <!--Email-->

            <div class="email-box">
              <a href="mailto:<?php echo $item['i_email']; ?>">Email address: <span class="blue"><?php echo $item['i_email']; ?></span></a>
            </div><!--Email-->

              <div class="ptb20 plr20">
                <h4 class="pt10 fw700"><?php echo $item['i_name']; ?></h4>
                <p class="small"><?php echo time_elapsed_string($item['i_added']); ?>
                  in <a href="<?php echo base_url(); ?>category/<?php echo $category['c_slug']; ?>" class="blue"><?php echo $category['c_name']; ?></a>
                  by <a class="blue"><?php echo $item['u_username']; ?></a>
                </p>
                <p class="small">Views: <?php echo 1 + $item['i_views']; ?></p>

                <ul class="specials">
                <?php if($category['c_id'] == 1) { ?> <!--Real Estate Specials-->
                    <li><div class="row"><div class="col-xs-6">Property type:</div><div class="col-xs-6"> <?php echo $specials['spre_type']; ?></div></div></li>
                    <li><div class="row"><div class="col-xs-6">Rent/Sale:</div><div class="col-xs-6"> <?php echo $specials['spre_rentsale']; ?></div></div></li>
                <?php } ?>

                <?php if($category['c_id'] == 2) { ?> <!--Jobs Specials-->
                    <li><div class="row"><div class="col-xs-6">Company:</div><div class="col-xs-6"> <?php echo $specials['spjo_company']; ?></div></div></li>
                    <li><div class="row"><div class="col-xs-6">Job title:</div><div class="col-xs-6"> <?php echo $specials['spjo_job_title']; ?></div></div></li>
                    <li><div class="row"><div class="col-xs-6">Qualification:</div><div class="col-xs-6"> <?php echo $specials['spjo_qualification']; ?></div></div></li>
                    <li><div class="row"><div class="col-xs-6">Application deadline:</div><div class="col-xs-6"> <?php echo $specials['spjo_deadline']; ?></div></div></li>
                <?php } ?>

                <?php if($category['c_id'] == 5) { ?> <!--Automobile Specials-->
                    <li><div class="row"><div class="col-xs-6">Make:</div><div class="col-xs-6"> <?php echo $specials['make_name']; ?></div></div></li>
                    <li><div class="row"><div class="col-xs-6">Model:</div><div class="col-xs-6"> <?php echo $specials['model_name']; ?></div></div></li>
                    <li><div class="row"><div class="col-xs-6">Body type:</div><div class="col-xs-6"> <?php echo $specials['spau_body']; ?></div></div></li>
                    <li><div class="row"><div class="col-xs-6">Color:</div><div class="col-xs-6"> <?php echo $specials['spau_color']; ?></div></div></li>
                    <li><div class="row"><div class="col-xs-6">Mileage:</div><div class="col-xs-6"> <?php echo number_format($specials['spau_mileage']); ?> km</div></div></li>
                <?php } ?>

                <?php if($category['c_id'] == 6) { ?> <!--EventsSpecials-->
                    <li><div class="row"><div class="col-xs-6">Company:</div><div class="col-xs-6"> <?php echo $specials['spev_company']; ?></div></div></li>
                    <li><div class="row"><div class="col-xs-6">Starting date:</div><div class="col-xs-6"> <?php echo $specials['spev_startdate']; ?></div></div></li>
                    <li><div class="row"><div class="col-xs-6">Starting time:</div><div class="col-xs-6"> <?php echo $specials['spev_starttime']; ?></div></div></li>
                <?php } ?>
                </ul>

                <p class="wrapp"><?php echo $item['i_description']; ?></p>
              </div>

              <!--Comment box-->
              <div class="ptb10 bg-light add_comment clearfix full-width">
                <div class="col-xs-12 col-md-8">
                  <!--Comment form-->
                  <?php if($user) { ?>
                  <form>
                  <div class="add_form card">
                      <input type="text" name="comment" placeholder="Write a comment and press enter" class="write-comment" ng-model="admin" focus-on="adminFocus">
                      <input type="hidden" name="user" class="user-comment" value="<?php echo $user['u_id']; ?>">
                      <input type="hidden" name="listing" class="listing-comment" value="<?php echo $item['i_slug']; ?>">
                      <input type="hidden" name="listing_user" class="listing-user" value="<?php echo $item['i_user']; ?>">
                  </div>
                </form><!--Comment form-->

              <?php } else { ?>
              <input type="text" name="comment" disabled placeholder="Login to add a comment...">
            <?php } ?>
                </div>

              </div><!--Comment box-->


              <!--Favourite box-->
              <div class="favourite-box center ptb10">
                <?php echo form_open('single/favourite'); ?>
                      <input type="hidden" name="item" value="<?php echo $item['i_id'] ?>">
                      <input type="hidden" name="user" value="<?php echo $user['u_id'] ?>">
                      <input type="submit" name="submit" value="Add to favourites">
                  </form>
              </div><!--Favourite box-->

              <!--Report box-->
              <div class="report-box center ptb20">
                <?php echo form_open('single/add_report'); ?>
                      <input type="hidden" name="item" value="<?php echo $item['i_id'] ?>">
                      <select name="reason">
                          <option>Select reason</option>
                          <option value="reason1">User specified wrong or fake information </option>
                          <option value="reason2">User specified illegal or illicit product</option>
                          <option value="reason3">User specified offensive content</option>
                      </select>
                      <input type="submit" name="submit" value="Report">
                  </form>
              </div><!--Report box-->



            <script>
            app.directive('focusOn', function() {
               return function(scope, elem, attr) {
                  scope.$on(attr.focusOn, function(e) {
                      elem[0].focus();
                  });
               };
            });
              app.controller('commentsCtrl', function($scope, $http) {
                $scope.getComments = function() {
                  $http.get("https://clas.pssthemes.com/home/getcomments/<?php echo $item['i_slug'];?>")
                  .then(function(response) {
                      $scope.comments = response.data;
                  });
                }
                $scope.getComments();
                setInterval(function(){
                  $scope.getComments();
                }, 1000)
                $scope.cono = 3;
                $scope.moreComments = function() {
                  $scope.cono +=3;
                }
                $scope.adminReply = function(username) {
                  $scope.admin = username+', ';
                  $scope.$broadcast('adminFocus');
                }
              });
            </script>

              <!--Comment Box-->
              <div class="comment-box">

                <div class="p20" ng-class="{ 'pl20': com.u_id != <?php echo $user['u_id']; ?>, 'pl40': com.u_id == <?php echo $user['u_id']; ?> }" class="ptb10" ng-repeat="com in comments | limitTo:cono">
                    <div class="v-center">
                        <p class="small fw700" ng-class="{ 'blue': com.u_id == <?php echo $item['u_id']; ?>}">{{com.u_username}}</p>
                        <?php if($user) { ?>
                          <a ng-if="com.u_id != <?php echo $user['u_id']; ?> && <?php echo $item['i_user']; ?> == <?php echo $user['u_id']; ?>" class="material-icons v-right pr20" ng-click="adminReply(com.u_username)">reply</a>
                        <?php } ?>
                    </div>
                    <p class="small pt5">{{com.co_comment}}</p>
                </div><!--Comment-->
                <a class="pl20 ptb10 block small blue" ng-click="moreComments()" ng-if="cono < comments.length">More comments...</a>


            </div><!--Comment Box-->

            <div>
              <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $item['city_name']; ?>&key=AIzaSyDktLSrPh9JtvGRszpYKOG0N63Pm6wE1uE" allowfullscreen></iframe>
            </div>

            <!--Map box-->
            <div class="map-box">
              <iframe width="100%" height="350" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyDIgGiC73MGxDLf0TxXKCXw4tMk5L-9gRs&zoom=16&center=<?php echo $item['u_lat']; ?>,<?php echo $item['u_lon']; ?>"></iframe>
            </div><!--Map box-->

            <!--Trade box-->
            <div class="trade-box center p20">
              <p class="fw600 pb20">Choose what you want to offer in exchange for <span class="blue"><?php echo $item['i_name']; ?></span>:</p>

              <?php
                $this->load->database();
                $this->db->from('items');
                $this->db->where('i_user', $user['u_id'] );
                $query = $this->db->get();
                  if($query->num_rows() > 0){
                      $result = $query->result_array();
                      foreach ($result as $item_t):
                        ?>

              <a class="bg-light"><?php echo $item_t['i_name']; ?> at $<?php echo $item_t['i_price']; ?></a>

            <?php endforeach;
                }
            ?>

            </div><!--Trade box-->



            <!--Offer box-->
            <div class="offer-box p20 center">
              <p class="fw600 pb20">Make an offer for <span class="blue"><?php echo $item['i_name']; ?></span> that <span class="blue"><?php echo $item['u_username']; ?></span> could not refuse:</p>
                <div class="add_form card">
                    <input type="text" name="price" placeholder="Name the price ($) and press enter to send">
                </div>
            </div><!--Offer box-->

      </div><!--Listing-->

      <!--Related-->
      <h3>You may also like</h3>








      <!-- Slider main container -->
      <div class="swiper-container-related" style="overflow: hidden;">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
              <!-- Slides -->

              <?php foreach ($related as $rel): ?>

                <div class="swiper-slide col-md-3 p5">


                <!--Listing-->
                <a href="<?php echo base_url(); ?>view/<?php echo $rel['i_slug']; ?>">

                  <!--Listing-->

                                            <!-- Slider main container -->
                              <div class="col-xs-12 p0 card listing ">



                                      <?php
                                        $this->load->database();
                                        $this->db->from('media');
                                        $this->db->where('me_dir', $rel['i_media'] );
                                        $query = $this->db->get();
                                          if($query->num_rows() > 0){
                                              $result = $query->result_array();
                                                ?>
                                                  <div style="height:80px; background:url(<?php echo base_url().'media/'.$rel['i_media'].'/'.$result[0]['me_img']; ?> )" class="img-cover">
                                                  </div>


                                    <?php
                                  } else { ?>
                                    <div style="height:80px; background:url(<?php echo base_url(); ?>media/noimage.png) center center no-repeat" class="img-cover">
                                    </div>
                                  <?php } ?>

                              </div>

                              <p class="p20 fw730"><?php echo $rel['i_name']; ?></p>
                              <p>$ <?php echo $item['i_price']; ?></p>


                  </a>

                  </div>

              <?php endforeach; ?>


          </div>
      </div>








      <!--Related-->

    </div><!--Full List View-->

  </div><!--Main content-->

  <!--Right Sidebar-->
  <div class="col-md-2 p0 right-sidebar">
    <div class="p20 card bg-royal text-white center">
      <h2>$ <?php echo number_format($item['i_price']); ?></h2>
    </div>
    <div class="p20 card share-box-s">
      <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5ac36475003b52001341b2d2&product=inline-share-buttons"></script>
      <div class="sharethis-inline-share-buttons"></div>
    </div>
    <?php if($item['i_user'] != $user['u_id']) { ?>
    <!--div class="p20 card share-box-s center">
      <a class="trade-toggle bg-blue white item-submenu mb10">Trade</a>
      <a class="offer-toggle bg-blue white item-submenu">Make offer</a>
    </div-->
    <?php } ?>

    <?php if($item['i_user'] != $user['u_id']) { ?>
    <div class="p20 card center">
      <a class="report-toggle red">Report this ad</a>
    </div>
    <?php } ?>

  <!--Right Sidebar-->

  <div class="hidden-xs hidden-sm">
    <img src="http://www.googleadsensecode.com/images/wideskyscraper_img.jpg" width="195">
  </div>

  <div class="visible-xs visible-sm" style="position: fixed; bottom: 0px; width: 100%; z-index: 99999;">
    <img src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" width="100%">
  </div>

  </div>

</div>

</div><!--Page-->
