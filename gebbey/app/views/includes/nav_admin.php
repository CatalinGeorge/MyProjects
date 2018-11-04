<!--Header-->
  <div class="header bg-grad">
    <span class="logo">
      <h4 class="inline p10">Admin</h4>
      <h4 class="f-right p10 inline">
        <?php if($user) { ?>
          <a href="<?php echo base_url(); ?>logout"><i class="material-icons">exit_to_app</i></a>
        <?php } ?>
      </h4>
    </span>
  </div><!--Header-->
