<!-- Top Categories -->
<div class="container">
  <div class="inline m-t-b-20 round-small p-10">
    <div class="inline">
        <h4 class="cap p-l-r-10 m-0 text-gray">Results searched</h4>
    </div>
  </div>
</div>

<!-- Top categories -->
<div class="container p-b-50">
  <div class="row">
    <?php if(!empty($products)){ ?>
    <?php foreach($products as $prd): ?>
  <a href="<?php echo base_url(); ?>single/single_product/<?php echo $prd['pr_id']; ?>" > <div class="col-md-2 center border-right box-effect">
      <?php
       //load directory helper
      $dir = 'media/'.$prd["pr_media"].'/'; // Your Path to folder
      $map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */
      ?>

      <img src="<?php echo base_url($dir)."/".$map[0]; ?>" alt="1" width="100%">
      <p class="text-gray m-b-20 fs-12"><?php echo $prd['pr_name']; ?></p>
    </div></a>
  <?php endforeach; ?>
    <?php } else{ } ?>
  </div>


</div>
