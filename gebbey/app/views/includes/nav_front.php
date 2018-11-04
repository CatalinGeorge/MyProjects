<nav class="navbar navbar-default header bg-grad">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Classifieds</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url(); ?>categories">Home</a></li>
        <?php if($user) { ?>
          <?php if(isset($user['u_id'])) { ?>
          <li><a href="<?php echo base_url(); ?>profile">Profile</a></li>
        <?php } else { ?>
            <li><a href="<?php echo base_url(); ?>advertisements">Advertisements</a></li>
          <?php } ?>
          <li><a href="<?php echo base_url(); ?>logout">Sign out</a></li>
        <?php } ?>
        <?php if(!$user) { ?>
          <li><a href="<?php echo base_url(); ?>login">Sign in</a></li>
            <li><a href="<?php echo base_url(); ?>advertisers/account">Advertisers</a></li>
        <?php } ?>
        <li class="search-btn hidden-xs"><a><i class="material-icons">search</i></a></li>
        <li class="close-search-btn"><a><i class="material-icons">close</i></a></li>
        <label>
          <div class="search-box">
            <?php echo form_open('home/search_simple'); ?>
            <input type="text" name="search" placeholder="Enter search terms and press enter">
          </div>
        </form>

        </label>
      </ul>
    </div>
  </div>
</nav>
