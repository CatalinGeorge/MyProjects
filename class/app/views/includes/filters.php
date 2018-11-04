
<div class="bg-light p-t-b-30">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">



      <div class="row">
        <?php if(!empty($cat)){ ?>
        <?php foreach($cat as $c): ?>
        <a href="<?php echo base_url(); ?>categories/tag_level/<?php echo $c['cat_id']; ?>" >  <?php echo $c['cat_name']; ?> </a>
        <?php endforeach; ?>
      <?php } else{ } ?>
        <div class="col-md-3">
          <div class="btn-outline-b block center">show results</div>
        </div>
      </div>

    </div><!-- end col -->
  </div><!-- end container -->
</div>
