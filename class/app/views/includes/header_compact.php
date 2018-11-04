  <!-- Top Menu -->
  <div class="container p-t-b-10 border-bottom">
    <div class="row">
      <div class="col-md-2 p-l-0">
        <h3 class="m-0 letter-spacing3 fw-900 up"><a href="<?php echo base_url(); ?>home"> ccs</a><br><p class="cap fs-11 fw-100">Complete Classifieds Solution</p></h3>
      </div>
      <div class="col-md-5 p-t-10">
        <div class="dropdown">
          <button class="dropdown-toggle bg-tr no-border full-width text-left" type="button" data-toggle="dropdown">
            <img src="<?php echo base_url(); ?>assets/img/icons/menu.png">
            <span class="fs-14 up">&nbsp; All Categories</span>
          </button>
          <ul name="categories" class="dropdown-menu">
            <?php foreach ($categories as $cat): ?>
              <li><a href="<?php echo base_url(); ?>categories/single_category/<?php echo $cat["cat_id"]; ?>"><?php echo $cat["cat_name"] ?> </a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="col-md-5 text-right p-t-10">
        <?php echo validation_errors(); ?>
        <?php echo form_open('categories/search'); ?>
        <span class="box m-t-20">

          <input class="search" name="search" type="search" placeholder="Search" />
          <div class="icon border-right p-r-10"><img src="https://png.icons8.com/ios/20/8389af/search.png"></div>


        </span>
  </form>

      </div>

    </div>
  </div>
  <script><!-- search -->
  $('.icon').click(function () {
    $('.search').toggleClass('expanded');
    });
  </script>
