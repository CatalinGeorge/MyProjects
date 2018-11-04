      <!-- Slider main container -->
      <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php
              $dir = 'media/'.$product["pr_media"].'/';
              $map = directory_map($dir);

              foreach ($map as $k) {?>
              <div class="swiper-slide" style="background:url(<?php echo base_url($dir)."/".$k;?>)no-repeat center center;background-size:cover;width:100%;"></div>
              <?php } ?>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev"><img src="<?php echo base_url(); ?>assets/img/icons/back-filled.png"></div>
          <div class="swiper-button-next"><img src="<?php echo base_url(); ?>assets/img/icons/forward-filled.png"></div>
          <div class="swiper-scrollbar"></div>

      </div>
      <!-- End Slider main container -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.6/js/swiper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/swiper.js"></script>
