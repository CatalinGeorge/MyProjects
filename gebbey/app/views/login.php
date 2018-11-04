  <div class="account-bg bg blur"></div>

  <!--Header-->
  <div class="back-header">
    <a class="simple-btn" href="<?php echo base_url(); ?>">Back to home</a>
    <a class="simple-btn f-right" href="<?php echo base_url(); ?>register">Register</a>
  </div>
    </div><!--Header-->

<!--Page-->
<div class="page container">

  <!--Page content-->
  <div class="account-box login-box row bg">

    <div class="box-left col col-xs-12 col-md-6 hidden-xs">
    </div>
    <div class="box-right col col-xs-12 col-md-6 pt120">

      <!--Login form-->
      <?php echo validation_errors(); ?>
      <?php echo form_open('login/login'); ?>

        <div class="add_form card">
            <input type="email" name="id" required placeholder="What is your app id?">
        </div>
        <div class="add_form card">
            <input type="password" name="password" required placeholder="And your password?">
        </div>
        <div class="ptb10"></div>
        <div class="add_form card submit-btn bg-blue">
            <input type="submit" name="submit" value="Access">
        </div>

      </form><!--Login form-->

      </div>

    </div><!--Page content-->

</div><!--Page-->
