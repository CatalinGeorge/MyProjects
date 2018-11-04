<!-- Google -->
<!--script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="209012710022-9q6n0r9i8id6q4169i19iqiqug7hmksb.apps.googleusercontent.com"-->

<!--a href="#" onclick="signOut();">Sign out Google</a-->

<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

<script>

</script>

<?php $profile_url = ''; ?>

<?php if(isset($_GET['nickname'])) {
  ?>
  <span ng-init="net_2='<?php echo $_GET['nickname']; ?>'"></span>
<?php } ?>

<?php if(isset($_GET['sub'])) {
  $sub = $_GET['sub'];
  $pieces = explode("|", $sub);
  ?>
    <span ng-init="NetworkName='<?php echo $pieces[0]; ?>';net_1='<?php echo $pieces[0]; ?>'"></span>
  <?php

  $profile_url = '';

  if($pieces[0] == 'Facebook') {
    $profile_url = 'https://facebook.com/'.$pieces[1];
  } else if($pieces[0] == 'Twitter') {
    $profile_url = 'https://twitter.com/intent/user?user_id='.$pieces[1];
  } else if($pieces[0] == 'Google-oauth2') { ?>
    <span ng-init="NetworkName='Google';net_1='Google'"></span>
    <?php
    $profile_url = 'https://plus.google.com/'.$pieces[1];
  }
  ?>
  <!--a href="<?php echo $profile_url; ?>">profile</a-->

  <span ng-init="generalLogOut()"></span>

<?php } ?>

<!--a href="https://socials.pssthemes.com/ou/logout.php">logout</a-->



<!-- Step 1 -->

<div class="border-left-dark" ng-hide="NetworkName">
    <div class="center">
      <h4 class="m0 pt30"> <img src="https://png.icons8.com/ios/20/9a9fbf/unchecked-circle.png" class="ml-40 bg-white"> <span class="plr30 bg-white inline text-dark">Choose platform</span></h4>
      <hr class="hr-width-full mt-10">
    <div class="ptb30">
      <div class="pt10 center">

        <!--a class="facebook-button" onclick="logInWithFacebook()" ng-click="SetNetworkName('Facebook')"><img src="https://i.pinimg.com/originals/b3/26/b5/b326b5f8d23cd1e0f18df4c9265416f7.png" width="30" class="mr20">Facebook</a>
        <div class="g-signin2 google-button" data-onsuccess="onSignIn"  ng-click="SetNetworkName('Google')"></div><br-->

        <!--a href="#"  data-auto-logout-link="true" class="fb-login-button op9-hover inline up text-white fw600 font-12 round bg-facebook ptb5 plr20 m10 single-link-w2 letter-spacing3"></a-->

        <!--img src="https://graph.facebook.com/105328010327664/picture?type=normal"-->

      </div>
    </div>
    </div>
</div>



<!-- Step 2 -->

      <div class="" ng-hide="NetworkName">
      <div class="row p0" >
        <?php echo validation_errors(); ?>
        <?php echo form_open('add/add_new_profile'); ?>
        <div class="col-md-8 col-md-offset-2">
<h4 class="center">Request authentication</h4>
          <a class="row center social_icons" href="ou/login.php">
            <label style="padding-bottom:10px;">
            <?php foreach ($networks as $row) { ?>
              <?php if($row->verifiable == '1') { ?>
                <div class="<?php echo $row->name; ?> inline mlr10 mt10">
                  <img src="<?php echo $row->icon; ?>" height="40"><br>
                  <span><?php echo $row->name; ?></span>
              </div>
            <?php } ?>
            <?php } ?>
          </label>
          </a>

          <div class="social_icons center pt50">
            <h4>Other networks</h4>
            <?php foreach ($networks as $row) { ?>
              <?php if($row->verifiable != '1') { ?>
                <div class="col-md-3 col-xs-6">
                <label ng-click="SetNetworkName('<?php echo $row->name; ?>')">
                  <img src="<?php echo $row->icon; ?>" height="40"><br>
                  <input type="radio" name="social_network" ng-model="social_network" value="<?php echo $row->slug; ?>"><?php echo $row->name; ?>
                </label>
              </div>
            <?php } ?>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>


    <div  class="border-left-dark" ng-show="NetworkName">
        <div class="p30 center">
          <h4 class="m0"> <img src="https://png.icons8.com/ios/20/9a9fbf/unchecked-circle.png" class="ml-40 bg-white"> <span class="plr30 bg-white inline text-dark">Profile account details</span></h4>
          <hr class="hr-width-full mt-10">
          <div id="other_network" class="center">
            <h3 class="m0 pt20">{{NetworkName}}</h3>
            <p class="pt10">Complete your account details below. {{Networkname}}</p>

            <div ng-show="social_network == 'Other'" class="">
              <input id="network_name" type="text" name="nnameo" placeholder="Network name" class=""  ng-model="net_123">
            </div><br>

            <div ng-show="social_network != 'Other'" class="">
              <input id="network_name" value="{{NetworkName}}" type="text" name="nname" placeholder="Network name" class="op0 p0" style="height:0px; overflow:hidden;"  ng-model="net_1">
            </div><br>

<div class="add_social_form">

<p class="font-11">Only profile username is required.</p>
                    <div class="mtb5 center inline round-small no-focus border-gray2">
                      <input ng-readonly="NetworkName == 'Google' || NetworkName == 'Facebook' || NetworkName == 'Twitter'" type="text" id="soc_name" name="uname" placeholder="Profile user name" class="ptb5 pl10 pr50 font-12 no-border round-small" required ng-model="net_2">
                    </div><br>
                    <div class="mtb5 center inline round-small no-focus border-gray2">
                        <input ng-readonly="NetworkName == 'Google' || NetworkName == 'Facebook' || NetworkName == 'Twitter'" type="hidden" id="soc_email" name="email" placeholder="Profile email" class="ptb5 pl10 pr50 font-12 no-border round-small"  ng-model="net_3" value="">
                      </div>

                          <?php if($profile_url != '') { ?>
                            <span ng-init="net_5='<?php echo $profile_url; ?>'"></span>
                        <?php }; ?>

                              <div class="mtb5 center inline round-small no-focus border-gray2">
                                <input ng-readonly="NetworkName == 'Google' || NetworkName == 'Facebook' || NetworkName == 'Twitter'" type="text" id="soc_url" name="url" placeholder="Profile url" class="ptb5 pl10 pr50 font-12 no-border round-small"  ng-model="net_5">
                              </div>



</div>



          </div>

    </div>
</div>



<div class="border-left-dark pb50" ng-show="NetworkName">
    <div class="p30 center">
      <h4 class="m0"> <img src="https://png.icons8.com/ios/20/9a9fbf/unchecked-circle.png" class="ml-40 bg-white"> <span class="plr30 bg-white inline text-dark">That's it</span></h4>
      <hr class="hr-width-full mt-10">
      <div class="pt30 inline">
        <input name="submit" type="submit" value="Save profile" class="mtb5 up font-12 fw600 round mr10 outline-button-orange single-link-ow">
      </div>
    </div>
    </div>
  </form>

<div class="ptb50"></div>
