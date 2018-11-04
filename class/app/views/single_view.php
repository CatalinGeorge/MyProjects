<?php $this->load->view('includes/head'); ?>

<div class="row">

  <div class="col-md-12 p-0">
    <?php $this->load->view('includes/header_compact'); ?>
  </div>

  <div class="container p-t-110">
    <div class="col-md-6">
      <?php $this->load->view('includes/product_slider'); ?>
    </div>

    <div class="col-md-5 border-right">
      <?php $this->load->view('includes/product_info'); ?>
    </div>

    <div class="col-md-1 p-t-30">
      <?php $this->load->view('includes/user_details_small'); ?>
    </div>
  </div>

</div>

    <div class="border-bottom m-t-90 border-top">
      <?php $this->load->view('includes/more_details_top'); ?>
    </div>

    <div class="p-l-0 p-r-0 p-t-20 m-b-20">
      <div class="container">
        <div class="row">
          <?php $this->load->view('includes/more_details'); ?>
      </div>
    </div>
  </div>


<div class="row border-top p-t-30 p-b-30">
  <?php $this->load->view('includes/sharing'); ?>
</div>
<div class="row">
  <?php $this->load->view('includes/newsletter'); ?>
</div>
<div class="row">
  <?php $this->load->view('includes/footer'); ?>
</div>
