<div class="border-left-dark">
    <div class="p30">
      <h4 class="m0"> <img src="https://png.icons8.com/ios/20/9a9fbf/unchecked-circle.png" class="ml-40 bg-white"> <span class="plr30 bg-white inline text-dark">Profile account details</span></h4>
      <hr class="hr-width-full mt-10">
      <div class="ptb30">
      <div class="row p0">
        <?php echo form_open('admin/add_network'); ?>
        <div class="col-md-8 col-md-offset-2">

          <div class="social_icons center">
            <label>
              <img src="https://image.flaticon.com/icons/svg/174/174855.svg" width="40"><br>
              <input type="radio" ng-model="social_network" name="social_network" value="Instagram">Instagram
            </label>
            <label>
              <img src="https://image.flaticon.com/icons/svg/174/174876.svg" width="40"><br>
              <input type="radio" ng-model="social_network" name="social_network" value="Twitter">Twitter
            </label>

            <label><input type="radio" ng-model="social_network" name="social_network" value="Whatsapp">Whatsapp</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Snapchat">Snapchat</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Ask.fm">Ask.fm</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Discord">Discord</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Flickr">Flickr</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Foursquare">Foursquare</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Github">Github</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Kik">Kik</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="LinkedIn">LinkedIn</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Match.com">Match.com</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Meetup.com">Meetup.com</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Myspace">Myspace</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Periscope">Periscope</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Pinterest">Pinterest</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="PlayStation">PlayStation</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Quora">Quora</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Reddit">Reddit</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Skype">Skype</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Soundcloud">Soundcloud</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Spotify">Spotify</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Steam">Steam</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Telegram">Telegram</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Tinder">Tinder</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Tumblr">Tumblr</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Twitch">Twitch</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Viber">Viber</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Xbox">Xbox</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Yelp">Yelp</label>
            <label><input type="radio" ng-model="social_network" name="social_network" value="Other...">Other</label>
          </div>

<div class="center">
          <div id="otherNetwork" class="mtb5 center inline round-small no-focus border-gray2" ng-hide="!social_network">
            <input ng-value="social_network" type="text" name="nname" placeholder="Network name" class="ptb5 pl10 pr50 font-12 no-border round-small" required>
          </div><br>

          <div class="mtb5 center inline round-small no-focus border-gray2">
            <input type="text" name="uname" placeholder="Profile user name" class="ptb5 pl10 pr50 font-12 no-border round-small" required>
          </div><br>
                <div class="mtb5 center inline round-small no-focus border-gray2">
                    <input type="text" name="avatar" placeholder="Profile avatar" class="ptb5 pl10 pr50 font-12 no-border round-small" >
                </div><br>
                  <div class="mtb5 center inline round-small no-focus border-gray2">
                    <input type="text" name="id" placeholder="Profile ID" class="ptb5 pl10 pr50 font-12 no-border round-small" >
                  </div><br>
                    <div class="mtb5 center inline round-small no-focus border-gray2">
                      <input type="text" name="url" placeholder="Profile url" class="ptb5 pl10 pr50 font-12 no-border round-small" >
                    </div>
                      <input  type="hidden" name="verified" value="na" >
                      <input  type="hidden" name="net_us" value="<?php echo $mazga; ?>" >

</div>

        </div>
      </div>
    </div>
    </div>
</div>
<div class="border-left-dark pb50">
    <div class="p30">
      <h4 class="m0"> <img src="https://png.icons8.com/ios/20/9a9fbf/unchecked-circle.png" class="ml-40 bg-white"> <span class="plr30 bg-white inline text-dark">That's it</span></h4>
      <hr class="hr-width-full mt-10">
      <div class="pt30 inline">
        <input  name="submit" type="submit" value="Save profile" class="mtb5 up font-12 fw600 round mr10 outline-button-orange single-link-ow">
      </div>
    </div>
    </div>
  </form>
