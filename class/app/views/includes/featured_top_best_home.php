<div class="container p-t-b-20">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home" class="no-border cap p-t-b-5 m-r-0">new arrivals</a></li>
  <li class="border-left border-right"><a data-toggle="tab" href="#menu1" class="no-border cap p-t-b-5 m-r-0">on sale</a></li>
  <li><a data-toggle="tab" href="#menu2" class="no-border cap p-t-b-5 m-r-0">best sellers</a></li>
</ul>
</div>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <!-- Shop -->
    <div class="container">
      <div class="row p-t-b-20">
        <?php foreach ($products as $prd): ?>
        <div class="col-md-2 border-right center p-t-b-20 round-small box-effect">
          <?php
           $dir = 'media/'.$prd["pr_media"].'/';
            $map = directory_map($dir);
          ?>
          <div style="width:100%;height:200px;background:url(<?php echo base_url($dir)."/".$map[0]; ?>) no-repeat center center;background-size:cover"></div>
          <h5 class="fw-600"><?php echo $prd['pr_name']; ?></h5>
          <h4 class="fw-600 text-blue">$<?php echo $prd['pr_price']; ?></h4>
          <p class="text-gray m-b-20 fs-12" style="height:70px;"><?php echo word_limiter($prd['pr_description'], 12); ?></p>
          <a href="<?php echo base_url(); ?>single/single_product/<?php echo $prd['pr_id']; ?>"><div class="btn-outline-b2">details</div></a>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div id="menu1" class="tab-pane fade">
    <!-- Top  -->
    <div class="container">
      <div class="row p-t-b-20">
        <div class="col-md-3 border-right p-t-b-20 round-small box-effect">
          <div class="row">
            <div class="col-md-5">
              <img src="<?php echo base_url(); ?>assets/img/prod1.jpg" alt="1" width="100%">
            </div>
            <div class="col-md-7">
              <h4 class="fw-600 text-blue">$435.45</h4>
              <p class="text-gray m-b-20 fs-12">Xtreme ultimate splashproof portable speaker</p>
              <div class="btn-outline-b2">details</div>
            </div>
          </div>
        </div>
        <div class="col-md-3 border-right p-t-b-20 round-small box-effect">
          <div class="row">
            <div class="col-md-5">
              <img src="<?php echo base_url(); ?>assets/img/prod2.jpg" alt="1" width="100%">
            </div>
            <div class="col-md-7">
              <h4 class="fw-600 text-blue">$435.45</h4>
              <p class="text-gray m-b-20 fs-12">Xtreme ultimate splashproof portable speaker</p>
              <div class="btn-outline-b2">details</div>
            </div>
          </div>
        </div>
        <div class="col-md-3 border-right p-t-b-20 round-small box-effect">
          <div class="row">
            <div class="col-md-5">
              <img src="<?php echo base_url(); ?>assets/img/prod3.jpg" alt="1" width="100%">
            </div>
            <div class="col-md-7">
              <h4 class="fw-600 text-blue">$435.45</h4>
              <p class="text-gray m-b-20 fs-12">Xtreme ultimate splashproof portable speaker</p>
              <div class="btn-outline-b2">details</div>
            </div>
          </div>
      </div>
        <div class="col-md-3 p-t-b-20 round-small box-effect">
          <div class="row">
            <div class="col-md-5">
              <img src="<?php echo base_url(); ?>assets/img/prod4.jpg" alt="1" width="100%">
            </div>
            <div class="col-md-7">
              <h4 class="fw-600 text-blue">$435.45</h4>
              <p class="text-gray m-b-20 fs-12">Xtreme ultimate splashproof portable speaker</p>
              <div class="btn-outline-b2">details</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="menu2" class="tab-pane fade">
    <!-- Top users -->
    <div class="container">
      <div class="row p-t-b-20">
        <div class="col-md-2 center p-t-b-20">
          <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="1" width="70" height="70" class="round">
          <p class="text-gray m-t-10 m-b-0">Michael Raims</p>
          <p class="text-gray fs-12 m-t-0">180 reviews | 7 products</p>
          <div>
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
          </div>
        </div>
        <div class="col-md-2 center p-t-b-20">
          <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="1" width="70" height="70" class="round">
          <p class="text-gray m-t-10 m-b-0">Michael Raims</p>
          <p class="text-gray fs-12 m-t-0">180 reviews | 7 products</p>
          <div>
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
          </div>
        </div>
        <div class="col-md-2 center p-t-b-20">
          <img src="https://randomuser.me/api/portraits/women/3.jpg" alt="1" width="70" height="70" class="round">
          <p class="text-gray m-t-10 m-b-0">Michael Raims</p>
          <p class="text-gray fs-12 m-t-0">180 reviews | 7 products</p>
          <div>
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
          </div>
        </div>
        <div class="col-md-2 center p-t-b-20">
          <img src="https://randomuser.me/api/portraits/men/4.jpg" alt="1" width="70" height="70" class="round">
          <p class="text-gray m-t-10 m-b-0">Michael Raims</p>
          <p class="text-gray fs-12 m-t-0">180 reviews | 7 products</p>
          <div>
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
          </div>
        </div>
        <div class="col-md-2 center p-t-b-20">
          <img src="https://randomuser.me/api/portraits/men/5.jpg" alt="1" width="70" height="70" class="round">
          <p class="text-gray m-t-10 m-b-0">Michael Raims</p>
          <p class="text-gray fs-12 m-t-0">180 reviews | 7 products</p>
          <div>
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
          </div>
        </div>
        <div class="col-md-2 center p-t-b-20">
          <img src="https://randomuser.me/api/portraits/women/6.jpg" alt="1" width="70" height="70" class="round">
          <p class="text-gray m-t-10 m-b-0">Michael Raims</p>
          <p class="text-gray fs-12 m-t-0">180 reviews | 7 products</p>
          <div>
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star-filled.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
            <img src="<?php echo base_url(); ?>assets/img/icons/star.png">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
