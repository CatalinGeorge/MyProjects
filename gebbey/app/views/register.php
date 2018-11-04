    <script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        $('#lat').val(lat);
        $('#lng').val(lng);
        var latlng = new google.maps.LatLng(lat, lng);
        var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        var address = results[1].formatted_address;
                        $('#location').val(address);
                    }
                }
            });
    }
    </script>

</head>
<body>

  <div class="account-bg bg blur"></div>

  <!--Header-->
  <div class="back-header">
    <a class="simple-btn" href="<?php echo base_url(); ?>">Back to home</a>
    <a class="simple-btn f-right" href="<?php echo base_url(); ?>login">Login</a>
  </div>
    </div><!--Header-->

<!--Page-->
<div class="page container">

  <!--Page content-->
  <div class="account-box register-box row bg">

    <div class="box-left col col-xs-12 col-md-6 hidden-xs">
    </div>
    <div class="box-right col col-xs-12 col-md-6 ptb20">

<!--Register form-->
<?php echo validation_errors(); ?>
<?php echo form_open('register/create'); ?>


<div class="add_form card">
    <input type="text" name="userid" required placeholder="User ID" ng-model="userId" ng-change="getUniqueId(userId)">
</div>
<h4>{{useridtemp}}</h4>
      <div class=" p20" ng-show="!usernameNA && userId">
        <span>You cannot use this ID.</span>
    </div>

<div class="add_form card">
    <input type="password" name="password" required placeholder="Password">
</div>
<h4 class="pt20">Location</h4>
            <div class="row m0">
              <div class="add_form card col-md-4">
                <select name="country">
                  <option>Select country</option>
                <?php foreach ($countries as $country): ?>
                  <option value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option>
                <?php endforeach; ?>
              </select>
              </div>
              <div class="add_form card col-md-4">
                <select name="state">
                  <option selected disabled>Select country first</option>
                <?php foreach ($states as $state): ?>
                  <option value="<?php echo $state['state_id']; ?>"><?php echo $state['state_name']; ?></option>
                <?php endforeach; ?>
              </select>
              </div>
              <div class="add_form card col-md-4">
                <select name="city">
                  <option selected disabled>Select state first</option>
                <?php foreach ($cities as $city): ?>
                  <option value="<?php echo $city['city_id']; ?>"><?php echo $city['city_name']; ?></option>
                <?php endforeach; ?>
              </select>
              </div>
            </div>
  <!-- <div class="add_form card">
    <a class="material-icons icon-locate royal" onclick="getLocation()">my_location</a>
      <input type="text"  name="location" required placeholder="Where are you from?" id="location">
  </div> -->
  <h4 class="pt20">Personal Info</h4>
  <div class="add_form card mt20">
      <input type="text" name="username" placeholder="Full name">
  </div>
  <div class="add_form card">
      <input type="email" name="email" placeholder="Email (optional)">
  </div>
<div class="add_form card">
    <input type="text" name="phone" placeholder="Phone number">
</div>
    <!-- <input type="hidden" name="lat" id="lat">
    <input type="hidden" name="lon" id="lng"> -->

<div class="ptb10"></div>
<div class="add_form card submit-btn bg-blue">
    <input type="submit" name="submit" value="Register">
</div>

</form>
<div class="overlay"></div><!--Register form-->

<div class="clearfix"></div>

</div>

</div><!--Page content-->

</div><!--Page-->
