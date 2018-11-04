<!--Page-->
<div class="page home-page container">

  <div class="row categories">

    <?php foreach ($categories as $cat): ?>

    <a href="<?php echo base_url(); ?>category/<?php echo $cat['cat']['c_slug']; ?>" class="col-md-4 col-sm-6 col-xs-6 categs-cont">
      <div class="card p10">
        <div class="hidden-xs categs-img" style="background:url(<?php echo base_url().'media/categories/'.$cat['cat']['c_img']; ?>) no-repeat center center;"></div>
        <div class="visible-xs categs-icon">
          <img src="<?php echo base_url().'media/categories/'.$cat['cat']['c_icon']; ?>" height="70px">
        </div>
        <span><?php echo $cat['cat']['c_name']; ?>
          <span class="visible-xs"><br></span> (<?php echo $cat['count'] ?>)</span>
      </div>
    </a>
  <?php endforeach; ?>

</div>
</div>
