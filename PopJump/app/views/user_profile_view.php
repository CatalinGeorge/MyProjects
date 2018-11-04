<div class="relative" style="background:url(<?php echo base_url(); ?>assets/img/profile-bg2.jpg); background-size:cover; background-position: center; width:100%; height:auto;">
  <div class="absolute full op8 bg-dark"></div>

  <div class="container relative ptb40 center clearfix">
    <div class="col-md-8 col-md-offset-2">
    <?php if($user['us_img']) { ?><img class="elem-medium round" src="<?php echo base_url(); ?>media/profiles/<?php echo $user['us_id'] ?>/<?php echo $user['us_img']; ?>"><?php } ?>
    <h4 class="text-white fw600 up mt20 mb10"><?php echo $user['us_first'] ?> <?php echo $user['us_last'] ?></h4>
    <!--p class="text-white op6"><?php echo $user['us_email'] ?></p-->
    <p class="text-white pt10"><?php echo $user['us_description'] ?></p>
  </div>
  </div>
</div>

<!-- Community -->

<div class="ptb50 bg-light">
    <div class="container">
      <h4 class="text-gray fw600 mt0 mb30 plr20">Social Accounts</h4>
        <div class="row pb20">
            <?php    if(!empty($networks)){ ?>
          <?php foreach($networks as $network): ?>

            <?php if($network['net_url']) { ?><a href="<?php echo $network['net_url'] ?>"><?php } ?>
            <div class="col-md-3 ptb10 mtb30 profiles-mobile" style="min-height: 200px;">
              <div class="bg-white box-shadow round-small effect-review">


                   <div class="plr20 relative center icon">
                     <span class="text-gray font-16">
                       <div class="bg-white p10 round inline box-shadow"  style="margin-top:-50px;">
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

                       </div>
                     </span>
                   </div>
                   <div class="plr20 pb10 center">
                     <h4 class="fw600 mb0 pt10 cap"><?php echo $network['net_name'] ?></h4>

                     <p class="font-12 text-gray plr10 ptb20"></p>

                     <div class="row">
                       <div class="center p0">
                         <p class="fw600 center"><?php echo $network['net_name_user'] ?></p>
                       </div>
                     </div>
                 </div>
               </div>
             </div>



           <?php if($network['net_url']) { ?></a><?php } ?>


           <?php endforeach; ?>
         <?php }else{ ?>
     <?php   echo "No networks";
     } ?>

         </div><!-- end-row -->
        </div>
    </div>
