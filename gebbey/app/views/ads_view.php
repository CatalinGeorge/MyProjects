<!--Page-->
<div class="page home-page container">

  <?php foreach ($advertisements as $advm): ?>

      <div class="col-md-6">
      <div class="row admin_row card p5">
        <div class="col-md-2">
          <img src="<?php echo base_url().$advm['advm_image']; ?>" width="40" height="40" class="round">
        </div>
        <div class="col-md-6 p10">
          <?php echo $advm['advm_name']; ?> <span class="blue">
        </div>
        <div class="col-md-4 right p10">
          <a class="plr10" href="<?php echo base_url(); ?>advertisements/info_advertisements/<?php echo $advm['advm_id'];?>"><i class="material-icons">insert_chart</i></a>
          <a class="plr10" href="<?php echo base_url(); ?>advertisements/deleteadvertisement/<?php echo $advm['advm_id']; ?>"><i class="material-icons">delete</i></a>
        </div>
      </div>
    </div>

  <?php endforeach; ?>

  <a class="floating-br bg-blue round white center" href="<?php echo base_url(); ?>add_advertisement"><i class="material-icons">add</i></a>

</div>
  <?php echo $user['adv_username']; ?>
