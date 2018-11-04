<div class="container">
  <div class="inline m-t-b-20 round-small p-10">
    <div class="inline">
        <h4 class="cap p-l-r-10 m-0 text-gray">Recently viewed products</h4>

    </div>
  </div>
</div>

<!-- Top  -->
<div class="container p-b-50">
  <div class="row">
    <?php    if(!empty($recently_viewed)){ ?>
      <?php foreach($recently_viewed as $r): ?>
    <div class="col-md-3 border-right p-t-b-20 round-small box-effect">
      <div class="row">
        <div class="col-md-5">
          <?php
           //load directory helper
          $dir = 'media/'.$r["pr_media"].'/'; // Your Path to folder
          $map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */

          ?>

          <img src="<?php echo base_url($dir)."/".$map[0]; ?>" alt="1" width="100%">
        </div>
        <div class="col-md-7">
          <h4 class="fw-600 text-blue"><?php echo $r['pr_price']; ?></h4>
          <p class="text-gray m-b-20 fs-12"><?php echo $r['pr_name']; ?></p>
        <a href="<?php echo base_url(); ?>single/single_product/<?php echo $r['pr_id']; ?>" > <div class="btn-outline-b2">details</div></a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <?php }else{ ?>
  <?php  } ?>




  </div>
</div>
