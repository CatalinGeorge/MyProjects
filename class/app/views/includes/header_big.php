<div class="container p-t-b-20">
  <div class="row">
  <div class="col-md-3 p-t-b-10 p-0">
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

  <div class="col-md-5 p-0 border round-small ov-hidden">
    <?php echo validation_errors(); ?>
    <?php echo form_open('home/search_category'); ?>
    <div class="row">
      <div class="col-md-6 p-l-r-0">
        <input name="search" type="search" placeholder="Search for products..." class="p-t-b-10 p-l-20 no-border full-width">
      </div>
      <div class="col-md-4 border-left p-l-r-0">
        <select name="categories" class="p-t-b-10 no-border full-width p-l-r-10 ">
          <?php foreach ($categories as $cat): ?>
            <option value="<?php echo $cat["cat_id"]; ?>"><?php echo $cat["cat_name"] ?> </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-2 p-0">
        <input type="submit" value="search" class="block p-t-b-10 btn-blue center">
      </div>
    </div>
  </form>

  </div>

</div>
</div>
