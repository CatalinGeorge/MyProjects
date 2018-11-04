<div class="stats">
  <div class="col-md-2">
    <div class="card">
      <i class="material-icons">people</i>
      <h1><?php echo count($users); ?></h1>
        <p>users</p>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card">
      <i class="material-icons">view_quilt</i>
      <h1><?php echo count($items); ?></h1>
        <p>listings</p>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card">
      <i class="material-icons">view_list</i>
      <h1><?php echo count($categories); ?></h1>
        <p>categories</p>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card">
      <i class="material-icons">comment</i>
      <h1><?php echo count($comments); ?></h1>
        <p>comments</p>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card">
      <i class="material-icons">people</i>
      <h1><?php echo count($users); ?></h1>
        <p>advertisers</p>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card">
      <i class="material-icons">people</i>
      <h1><?php echo count($items); ?></h1>
        <p>other</p>
    </div>
  </div>

<?php if($reports) { ?>
  <h3>Reported products</h3>
  <?php foreach ($reports as $re): ?>
  				<a class="inline bg-dark text-white m10 p10" href="<?php echo base_url(); ?>admin/edititem/<?php echo $re['i_id']; ?>">
            Product <?php echo $re['i_name']; ?> reported because
            <?php echo $re['re_reason']; ?>
  				</a>
  			 <?php endforeach; ?>
<?php } else { ?>

<?php } ?>


</div>
