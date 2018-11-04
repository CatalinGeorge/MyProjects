  <!--Page-->
  <div class="page home-page container">

    <div class="row">

      <div class="p20 visible-xs center">
        <a class="p0" href="<?php echo base_url(); ?>"><span class="blue">Home</span> / <?php echo $category['c_name']; ?></a>
      </div>

    <!--Left Sidebar-->
      <?php echo form_open('home/filters'); ?>
    <div class="col-md-2 p0 hidden-xs left-sidebar" ng-init="price_range_max = <?php echo $max_price_select; ?>">
      <div class="p20 card">
        <a class="p0" href="<?php echo base_url(); ?>"><span class="blue">Home</span> / <?php echo $category['c_name']; ?></a>
      </div>
      <div class="p20 card filters">

        Price range: ${{price_range_min}} - ${{price_range_max}}

        <section class="range-slider">
          <span class="rangeValues"></span>
          <input name="price_min" value="0" min="0" max="<?php echo $max_price_select; ?>" step="10" type="range" ng-model="price_range_min">
          <input name="price_max" value="100" min="0" max="<?php echo $max_price_select; ?>" step="10" type="range" ng-model="price_range_max">
        </section>
      </div>
      <div class="p20 card filters">
        Filter by location
        <div class="row m0">
          <div class="">
            <select name="country">
              <option selected disabled>Select country</option>
            <?php foreach ($countries as $country): ?>
              <option
          <?php if($this->session->country == $country['country_id']) { echo 'selected'; } ?>
          value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option>
            <?php endforeach; ?>
          </select>
          </div>
          <div class="">
            <select name="state">
              <option selected disabled>Select country first</option>
            <?php foreach ($states as $state): ?>
              <option
                <?php if($this->session->state == $state['state_id']) { echo 'selected'; } ?>
              value="<?php echo $state['state_id']; ?>"><?php echo $state['state_name']; ?></option>
            <?php endforeach; ?>
          </select>
          </div>
          <div class="">
            <select name="city">
              <option selected disabled value="disabled">Select state first</option>
            <?php foreach ($cities as $city): ?>
              <option
              <?php if($this->session->city == $city['city_id']) { echo 'selected'; } ?>
              value="<?php echo $city['city_id']; ?>"><?php echo $city['city_name']; ?></option>
            <?php endforeach; ?>
          </select>
          </div>

          <?php // Real estate category special fields
            if ($category['c_id'] == 1) {
          ?>
          <!--div class="row m0">
              <div class="">
                <select name="type">
                  <option selected disabled>Select type</option>
                  <option value="condo">Condo</option>
                  <option value="land">Land</option>
                  <option value="villa">Villa</option>
                </select>
              </div>
              <div class="">
                <select name="rentsale">
                  <option selected disabled>Select status</option>
                  <option value="rent">Rent</option>
                  <option value="sale">Sale</option>
                </select>
              </div>
            </div-->
          <?php
            }
          ?>

          <?php // Automobile category special fields
            if ($category['c_id'] == 5 || $this->session->category == 'Vehicles') { // $this->session needs every condition
          ?>
          <div class="row m0">
            <div class="">
              <select name="make">
                <option selected disabled>Select make</option>
              <?php foreach ($makes as $make): ?>
                <option
                  <?php if($this->session->make == $make['make_id']) { echo 'selected'; } ?>
                value="<?php echo $make['make_id']; ?>"><?php echo $make['make_name']; ?></option>
              <?php endforeach; ?>
            </select>
            </div>
            <div class="">
              <select name="model">
                <option selected disabled>Select make first</option>
              <?php foreach ($models as $model): ?>
                <option
                <?php if($this->session->model == $model['model_id']) { echo 'selected'; } ?>
                value="<?php echo $model['model_id']; ?>"><?php echo $model['model_name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          </div>
          <div class="row m0">
            <div class="add_form card col-md-4">
                <input type="text" name="mileage" placeholder="Mileage">
            </div>
            <div class="add_form card col-md-4">
                <input type="text" name="color" placeholder="Color">
            </div>
            <div class="add_form card col-md-4">
                <input type="text" name="body" placeholder="Body">
            </div>
          </div>
          <?php
            }
          ?>

          <?php // Events category special fields
            if ($category['c_id'] == 6) {
          ?>
          <!--div class="row m0">
            <div class="">
                <input type="text" name="company" placeholder="Company">
            </div>
            </div>
            <div class="row m0">
              <div class="">
                  <input type="text" name="startdate" placeholder="Starting date">
              </div>
              <div class="">
                  <input type="text" name="starttime" placeholder="Starting time">
              </div>
            </div-->
          <?php
            }
          ?>

          <div class="add_form card submit-btn bg-blue">
              <input type="submit" name="submit" value="Filter">
          </div>

        </div>
      </div>
      </form>

    </div><!--Left Sidebar-->

    <div class="col-md-8 main-content">
      <?php if(!$user) { ?>
        <div class="add_form card">
          <a class="add_intro blue block p15 font-14" href="<?php echo base_url(); ?>login">
            Login to post your items.
          </a>
        </div
      <?php } ?>

      <?php if($user) { ?>
      <!--Add form-->
      <div class="add-form-item">
      <?php echo validation_errors(); ?>
      <?php echo form_open_multipart('home/create'); ?>
        <div class="add_form card">
          <div class="add_intro row m0">
            <i class="material-icons" style="position: absolute; font-size:28px !important; color: #fff; padding: 13px;">control_point</i>
            <input type="text" name="name" required placeholder="Click here to start posting" style="padding-left: 45px; background-color:#e67e22;" class="input-white-placeholder">
          </div>
          <style>
            .input-white-placeholder::placeholder {
              color: #fff;
            }
          </style>
          <div class="add_content bg-light-more plr20 pb30">

            <div class="add_form card row m0">
              <textarea name="description" rows="5" required placeholder="Description...."></textarea>
            </div>

            <?php // Jobs category special fields
              if ($category['c_id'] != 2) {
            ?>
            <div class="add_form card row m0">
                <input type="text" name="price" required placeholder="Price ($)">
            </div>
          <?php } ?>

<h4 class="pt20">Location</h4>
            <div class="row m0">
              <div class="add_form card col-md-4">
                <select name="country">
                  <option selected disabled>Select country</option>
                <?php foreach ($countries as $country): ?>
                  <option value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option>
                <?php endforeach; ?>
              </select>
              </div>
              <div class="add_form card col-md-4">
                <select name="state">
                  <option selected disabled>Select country first</option>
                <?php foreach ($states as $state): ?>
                  <option value="<?php echo $state['state_id']; ?>"><?php echo $state['state_name']; ?></option>
                <?php endforeach; ?>
              </select>
              </div>
              <div class="add_form card col-md-4">
                <select name="city">
                  <option selected disabled>Select state first</option>
                <?php foreach ($cities as $city): ?>
                  <option value="<?php echo $city['city_id']; ?>"><?php echo $city['city_name']; ?></option>
                <?php endforeach; ?>
              </select>
              </div>
            </div>

            <div class="add_form card">
              <textarea name="address" rows="2" placeholder="Address...."></textarea>
            </div>

<h4 class="pt20">Contact</h4>
            <div class="row m0">
              <div class="add_form card col-md-6">
                  <input type="text" name="phone" required placeholder="Phone">
              </div>
              <div class="add_form card col-md-6">
                  <input type="text" name="email" placeholder="Email">
              </div>
            </div>


                <?php // Real estate category special fields
                  if ($category['c_id'] == 1) {
                ?>
                <h4 class="pt20">Other details</h4>
                <div class="row m0">
                    <div class="add_form card col-md-6">
                      <select name="type">
                        <option selected disabled>Select type</option>
                        <option value="condo">Condo</option>
                        <option value="land">Land</option>
                        <option value="villa">Villa</option>
                      </select>
                    </div>
                    <!--div class="add_form card col-md-3">
                        <input type="number" name="bedrooms" placeholder="Bedrooms">
                    </div>
                    <div class="add_form card col-md-3">
                        <input type="number" name="bathrooms" placeholder="Bathrooms">
                    </div-->
                    <div class="add_form card col-md-6">
                      <select name="rentsale">
                        <option selected disabled>Select status</option>
                        <option value="rent">Rent</option>
                        <option value="sale">Sale</option>
                      </select>
                    </div>
                  </div>
                <?php
                  }
                ?>

                <?php // Jobs category special fields
                  if ($category['c_id'] == 2) {
                ?>
                <h4 class="pt20">Other details</h4>
                <div class="row m0">
                    <div class="add_form card col-md-8">
                        <input type="text" name="company" placeholder="Company">
                    </div>
                    <div class="add_form card col-md-4">
                        <input type="text" name="price" placeholder="Salary ($)">
                    </div>
                  </div>
                  <div class="row m0">
                    <div class="add_form card col-md-6">
                        <input type="text" name="job_title" placeholder="Job title">
                    </div>
                    <div class="add_form card col-md-6">
                        <input type="text" name="qualification" placeholder="Qualification">
                    </div>
                  </div>
                  <div class="row m0">
                      <div class="add_form card col-md-12">
                          <input type="text" data-provide="datepicker" name="deadline" placeholder="Application deadline">
                      </div>
                    </div>
                <?php
                  }
                ?>

                <?php // Automobile category special fields
                  if ($category['c_id'] == 5) {
                ?>
                <h4 class="pt20">Other details</h4>
                <div class="row m0">
                  <div class="add_form card col-md-6">
                    <select name="make">
                      <option selected disabled>Select make</option>
                    <?php foreach ($makes as $make): ?>
                      <option value="<?php echo $make['make_id']; ?>"><?php echo $make['make_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  </div>
                  <div class="add_form card col-md-6">
                    <select name="model">
                      <option selected disabled>Select make first</option>
                    <?php foreach ($models as $model): ?>
                      <option value="<?php echo $model['model_id']; ?>"><?php echo $model['model_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  </div>
                </div>
                <div class="row m0">
                  <div class="add_form card col-md-4">
                      <input type="text" name="mileage" placeholder="Mileage">
                  </div>
                  <div class="add_form card col-md-4">
                      <input type="text" name="color" placeholder="Color">
                  </div>
                  <div class="add_form card col-md-4">
                      <input type="text" name="body" placeholder="Body">
                  </div>
                </div>
                <?php
                  }
                ?>

                <?php // Events category special fields
                  if ($category['c_id'] == 6) {
                ?>
                <h4 class="pt20">Other details</h4>
                <div class="row m0">
                  <div class="add_form card col-md-12">
                      <input type="text" name="company" placeholder="Company">
                  </div>
                  </div>
                  <div class="row m0">
                    <div class="add_form card col-md-8">
                        <input type="text" name="startdate" data-provide="datepicker" placeholder="Starting date">
                    </div>
                    <div class="add_form card col-md-4">
                        <input type="text" name="starttime" placeholder="Starting time">
                    </div>
                    </div>
                <?php
                  }
                ?>

<h4 class="ptb40">Images</h4>
<!--div class="row m0">
          <div class="col-md-12">
            <div class="img-uploader">
              <input type="file" name="userfile[]" multiple="multiple">
            </div>
          </div>
        </div-->


        <input type="hidden" id="count_images" name="count_images">

   <div class="center" id="imagezone">

      <div class="inline mlr10 mtb30 bg-blue round p10" id="photo-bg1">
        <input type="file" name="image1" id="image1" class="input-image">
        <img src="https://png.icons8.com/ios/40/ffffff/plus-math.png">
      </div>

      <style>
        .input-image {
          width: 50px;
          height: 50px;
          position: absolute;
          opacity: 0;
        }
      </style>



   </div>

   <div class="row">
     <div id="image-preview" class="center"></div>
   </div>

   <script>
   $(document).ready(function(){
     var x = 1;
     function kktt() {
       $('#image'+x).change(function() {

         if (this.files && this.files[0]) {
           var reader = new FileReader();
           reader.onload = function(e) {
             $('#image-preview').append('<div style="width:20%;display:inline-block;" class="relative" id="image-preview'+x+'"><img src="'+e.target.result+'" width="100%" class="p5"><div onclick="remove_image('+x+')" class="image-remove-overlay"><img class="bg-red p10 round" src="https://png.icons8.com/metro/20/ffffff/delete-sign.png"></div></div>');
           }
           reader.readAsDataURL(this.files[0]);
         }

         x = x + 1;
         $('#imagezone').append('<div class="inline mlr10 mtb30 bg-blue round p10" id="photo-bg'+x+'"><input type="file" name="image'+x+'" id="image'+x+'" class="input-image"><img src="https://png.icons8.com/ios/40/ffffff/plus-math.png"></div>');

         $(this).parent().hide();

         $('#count_images').val(x);

         kktt();
       })
     }
     kktt();

   });

   function remove_image(x) {
     var z = x-1;
     $('#image-preview'+x).hide();
     $('#photo-bg'+z).remove();
   }
   </script>


            <input name="category" type="hidden" value="<?php echo $category['c_slug']; ?>">
            <input name="category_id" type="hidden" value="<?php echo $category['c_id']; ?>">
            <input name="user" type="hidden" value="<?php echo $user['u_id']; ?>">

<div class="row m0 ptb50">
            <div class="col-md-6 col-md-offset-3" style="z-index:1;">
              <div class="add_form card submit-btn bg-blue">
                  <input type="submit" name="submit" value="Publish">
              </div>
            </div>
          </div>

<div class="clearfix"></div>

          </div>
          </form>
      </div>
    </form>
  </div>
    <div class="overlay"></div><!--Add form-->
  <?php } ?>

<?php if($items) { ?>

  <?php
  function limit_text($text, $limit) {
  if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos = array_keys($words);
      $text = substr($text, 0, $pos[$limit]) . '...';
  }
  return $text;
  }
  ?>

    <!--Full List View-->
    <div class="full-view">


      <?php $num = 1; $y = 0; ?>

      <?php foreach ($items as $item): ?>

        <?php if($num % $advm_step) { } else { ?>

          <?php if(isset($advertisements[$y])) { ?>

        <!--Advertisement-->
        <a href="<?php echo base_url(); ?>home/advertisement/<?php echo $advertisements[$y]['advm_id']; ?>/<?php echo $advertisements[$y]['advm_clicks']; ?>">


          <!--Advertisement content-->
                  <div class="card listing mt20 mb30">

                    <h4 class="p20 fw700"><?php echo $advertisements[$y]['advm_name']; ?><span class="float-right ptb3 plr10 round bg-blue text-white font-10 up">Advertisement</span></h4>

                      <!-- Slider main container -->
                      <div class="cover_image">
                          <div style="height:350px; background:url(<?php echo base_url().''.$advertisements[$y]['advm_image']; ?>)" class="img-cover"></div>
                      </div>
                          <div class="ptb20 plr20">
                            <p class="ptb10"><?php echo limit_text($advertisements[$y]['advm_description'], 30); ?></p>
                          </div>

  </div>

  </a><!--Advertisement-->

<?php } ?>


  <?php $y++; } ?>

  <?php $num++; ?>

      <!--Listing-->
      <a href="<?php echo base_url(); ?>view/<?php echo $item['i_slug']; ?>">

        <!--Listing-->
                <div class="card listing mt20 mb30">
                  <!--div class="v-center avatar plr20 ptb10"-->
                    <!--img src="<?php echo $item['u_avatar']; ?>" width="30" class="round"-->
                    <!--h5><?php echo $item['u_username']; ?></h5-->
                    <!--p class="small v-right"><?php //echo time_elapsed_string($item['i_added']); ?> in <?php echo $item['city_name']; ?></p-->
                  <!--/div-->

                  <h4 class="p20 fw700"><?php echo $item['i_name']; ?> <span class="float-right ptb3 plr10 round bg-blue text-white font-10 up">Details</span></h4>
                  <p class="small mt-20 pl20 pb10">in <?php echo $item['city_name']; ?></p>


                    <!-- Slider main container -->
                    <div class="col-xs-12">



                            <?php
                              $this->load->database();
                              $this->db->from('media');
                              $this->db->where('me_dir', $item['i_media'] );
                              $query = $this->db->get();
                                if($query->num_rows() > 0){
                                    $result = $query->result_array();
                                  //  foreach ($result as $img):
                                      ?>

                                        <div style="height:350px; background:url(<?php echo base_url().'media/'.$item['i_media'].'/'.$result[0]['me_img']; ?>)" class="img-cover">
                                        </div>


                          <?php // endforeach;
                              }
                          ?>

                    </div>

                        <div class="ptb20 plr20">
                          <p class="ptb10 wrapp"><?php echo limit_text($item['i_description'], 4); ?></p>
                        </div>

</div>

        </a>
        <?php endforeach; ?>

      </div><!--Full List View-->

      <?php
      } else {
        echo 'No listings in this category.';
      } ?>

      <div class="center ptb30 hidden-xs">
        <img src="http://www.googleadsensecode.com/images/leaderboard_img.jpg" >
      </div>

      <div class="pagination"><?php echo $this->pagination->create_links(); ?></div>



    </div><!--Main content-->

    <!--Right Sidebar-->
    <div class="hidden-xs hidden-sm">
      <img src="http://www.googleadsensecode.com/images/wideskyscraper_img.jpg" width="195">
    </div>

    <div class="visible-xs visible-sm" style="position: fixed; bottom: 0px; width: 100%; z-index: 99999;">
      <img src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" width="100%">
    </div>
    <!--Right Sidebar-->

  </div>



  </div><!--Page-->
