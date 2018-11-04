<!--Page-->
<div class="page home-page container">

<ul class="list-group col-md-6 col-md-offset-3">
  <img src="<?php echo base_url().$advertisements['advm_image']; ?>" width="100%">
    <h4><?php echo $advertisements['advm_name']; ?></h4>
    <li class="list-group-item">Total budget <span class="badge">$<?php echo $advertisements['advm_budget']; ?></span></li>
    <li class="list-group-item">Daily budget <span class="badge">$<?php echo $advertisements['advm_budget']/$advertisements['advm_numofdays']; ?></span></li>
    <li class="list-group-item">Number of days <span class="badge"><?php echo $advertisements['advm_numofdays']; ?></span></li>
    <li class="list-group-item">Number of views <span class="badge"><?php echo $advertisements['advm_numofviews']; ?> of <?php echo $advertisements['advm_impressions']; ?></span></li>
    <li class="list-group-item">Number of clicks <span class="badge"><?php echo $advertisements['advm_clicks']; ?></span></li>
  </ul>

<div class="ptb30"></div>

<div class="col-md-12 center">
  <a href="<?php echo base_url(); ?>advertisements">Back</a>
</div>

</div>
