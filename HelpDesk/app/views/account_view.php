      <div class="full" style="background:url(img/bg.jpg)no-repeat center center; background-size:cover;" ng-init="account()">
        <!-- Left Side -->
        <div class="col-md-6 col-md-offset-3 text-right text-white p150">
          <h2 class="m0">found vulnerability</h2>
          <p class="font-18 letter-spacing fw100 pt30">lorem ipsum nigga, this is not secure.</p>
        </div>

        <!-- Right Side -->
        <div class="col-md-3 full-height bg-white plr30 ptb150">

          <!--Login Box-->
          <div class="loginBox" ng-show="showLogin">
            <h4 class="up pb30 m0">dont login to your account</h4>
            <?php echo validation_errors(); ?>
            <?php echo form_open('account/login_user'); ?>
            <div class="form-group pb20">
              <input type="email" name="email" class="full-width input-border-bottom ptb10 pl20" placeholder="Email"/>
            </div>
            <div class="form-group">
              <input type="password" name="pass" class="full-width input-border-bottom ptb10 pl20" placeholder="Password"/>
            </div>
             <button class="btn btn-success text-white pr50 mt20"><i class="fa fa-send mr5"></i> <span class="text-white">Login</span></button>
             <div class="row pt30">
               <a href="" ng-click="showLogin=false; showRegister=true;">Don't have an account? Register.</a>
             </div>
          </form>
        </div>

        <!--Register Box-->
        <div class="registerBox" ng-show="showRegister">
            <h4 class="up pb30 m0">make a new account</h4>
            <?php echo validation_errors(); ?>
            <?php echo form_open('account/register_user'); ?>
            <div class="form-group pb20">
              <input type="email" name="email_r" class="full-width input-border-bottom ptb10 pl20" placeholder="Email"/>
            </div>
            <div class="form-group">
              <input type="password" name="pass_r" class="full-width input-border-bottom ptb10 pl20" placeholder="Password"/>
            </div>
            <div class="form-group">
              <input type="text" name="username_r" class="full-width input-border-bottom ptb10 pl20" placeholder="Username"/>
            </div>
             <button class="btn btn-success text-white pr50 mt20"><i class="fa fa-send mr5"></i> <span class="text-white">Register</span></button>
             <div class="row pt30">
               <a href="" ng-click="showLogin=true; showRegister=false;">Already registered? Login.</a>
             </div>
          </form>

          </div>


          <p class="absolute bottom-20 pl30">&copy; Copyright 2018 Helpdesk</p>
        </div>
      </div>
</body>

</html>
