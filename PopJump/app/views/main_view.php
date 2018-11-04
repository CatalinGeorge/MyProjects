
<div class="relative none_mobile" style="background:url(<?php echo base_url(); ?>assets/img/bg-top.jpg); background-size:cover; background-position:top center; width:100%; height:400px;">
    <div class="absolute full op6 bg-dark"></div>
      <div class="container">
          <div class="col-md-6">
              <h1 class="text-white fw100 cap" style="padding-top:5%;">Gain more exposure and grow your audience simply by adding your social medias! </h1>
              <p class="text-white fw100 pt10 mb0 font-12">Try searching for your friends, family, classmates, workmates, your crush, neighbors, acquaintances, enemies or maybe just someone you have heard of. We allow you to find a persons all social platforms with just one click.
Connect your social platforms to increase your following and to make new friends!</p>

          <!-- Search -->
                 <div class="mt30">
                   <?php echo form_open('main/search'); ?>
                    <div class="search-top round-small mlr0">
                      <input type="text" placeholder="Search..." name="search_query">
                      <button name="search" type="submit"><img src="https://png.icons8.com/metro/20/ffffff/search.png"></button>
                    </div>
                  </form>
                 </div>
          </div>
      </div>
</div>

<div class="visible-xs search_mobile">
  <!-- Search -->
         <div class="bg-orange">
           <?php echo form_open('main/search'); ?>
            <div class="search-top round-small mlr0">
              <input type="text" placeholder="Search..." name="search_query">
              <button name="search" type="submit"><img src="https://png.icons8.com/metro/20/ffffff/search.png"></button>
            </div>
          </form>
         </div>
</div>

<!-- Popular profile -->
<div class="bg-white ptb50">
    <div class="container">
        <h4 class="text-gray fw600 mt0 mb30 plr20 center">
          <?php if(isset($search)) { ?> Search results <?php } else { ?> Popular profiles <?php }; ?>
        </h4>
    <div class="row pb0">
     <!-- First profile -->
     <?php    if(!empty($profiles)){ ?>
     <?php foreach ($profiles as $profile): ?>
       <a href="<?php echo base_url(); ?>user_profile/single_profile/<?php echo $profile['us_id']; ?> ">
       <div class="col-sm-6 mtb10">
         <div class="row bg-white box-shadow round-small">

           <div class="col-xs-3 p0" style="background:url(<?php if($profile['us_img']) { echo base_url(); ?>media/profiles/<?php echo $profile['us_id']; ?>/<?php echo $profile['us_img']; } else { echo 'https://png.icons8.com/ios/90/fafafa/comedy2.png'; } ?>) no-repeat left center; background-size: cover; height: 100px;">
           </div>

           <div class="col-xs-9">
             <div class="p10 clearfix">
               <h5 class="fw600 mb0 cap"><?php echo $profile['us_first'] ?>  <?php echo $profile['us_last'] ?></h5>
               <p class="font-12 text-gray mt10"><?php echo $profile['us_description'] ?></p>
           </div>
          </div>
         </div>
       </div>
     </a>
     <?php endforeach; ?>
   <?php }else{ ?>
<?php   echo ".";
} ?>
    </div><!-- end-row -->
</div>
</div>

<!-- Community Review -->
<div class="ptb50 bg-light">
    <div class="container">
      <h4 class="text-gray fw600 mt0 mb30 plr20 center">User reviews</h4>
        <div class="row pb30">
            <div class="col-md-4 ptb10">
              <div class="bg-white box-shadow round-small effect-review">
                 <div class="relative bg-orange round-small-top ptb40"></div>
                   <div class="plr20 mt-40 relative center">
                     <span class="text-gray font-16">
                       <img class="elem-medium round border-white2" src="https://randomuser.me/api/portraits/women/54.jpg">
                     </span>
                   </div>
                   <div class="plr20 pb10">
                   <h4 class="fw600 mb0 cap center pt10">amazing community</h4>
                   <p class="font-14 center ptb30 plr20">I am gaining followers from just signing up and writing my social medias. This is awesome.</p>
                     <h5 class="fw600 mb0 cap center">Peggy Kuhn</h5>
                     <p class="center cap font-12 pb10">accountant</p>
                 </div>
               </div>
             </div>

             <div class="col-md-4 ptb10">
               <div class="bg-white box-shadow round-small effect-review">
                  <div class="relative bg-orange round-small-top ptb40"></div>
                    <div class="plr20 mt-40 relative center">
                      <span class="text-gray font-16">
                        <img class="elem-medium round border-white2" src="https://randomuser.me/api/portraits/men/61.jpg">
                      </span>
                    </div>
                    <div class="plr20 pb10">
                    <h4 class="fw600 mb0 cap center pt10">user friendly</h4>
                    <p class="font-14 center ptb30 plr20">This is like a social business card. Everything on one page, but its also searchable.</p>
                      <h5 class="fw600 mb0 cap center">Jason Nichols</h5>
                      <p class="center cap font-12 pb10">Developer</p>
                  </div>
                </div>
              </div>

              <div class="col-md-4 ptb10">
                <div class="bg-white box-shadow round-small effect-review">
                   <div class="relative bg-orange round-small-top ptb40"></div>
                     <div class="plr20 mt-40 relative center">
                       <span class="text-gray font-16">
                         <img class="elem-medium round border-white2" src="https://randomuser.me/api/portraits/women/19.jpg">
                       </span>
                     </div>
                     <div class="plr20 pb10">
                     <h4 class="fw600 mb0 cap center pt10">incredible design</h4>
                     <p class="font-14 center ptb30 plr20">I write this profile on my social media profiles instead of typing out every single link to all of them, works like a charm.</p>
                       <h5 class="fw600 mb0 cap center">Joann Hudson</h5>
                       <p class="center cap font-12 pb10">Doctor</p>
                   </div>
                 </div>
               </div>
         </div><!-- end-row -->
        </div>
    </div>
