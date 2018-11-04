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
<div class="account-box register-box row">

<div class="box-right col col-xs-12 col-md-6 ptb30">

<!--Register form-->
<?php echo validation_errors(); ?>
<?php echo form_open('advertisers/register'); ?>

<div class="add_form card mt20">
<input type="email" name="email" placeholder="What is your email address?">
</div>
<div class="add_form card">
<input type="text" name="username" placeholder="Choose a username">
</div>
<div class="add_form card">
<input type="password" name="password" placeholder="Choose a password">
</div>

<div class="add_form card">
<a class="material-icons icon-locate royal" onclick="getLocation()">my_location</a>
  <input type="text"  name="location" placeholder="Where are you from?" id="location">
</div>

<input type="hidden" name="lat" id="lat">
<input type="hidden" name="lon" id="lng">

<div class="ptb10"></div>
<div class="add_form card submit-btn bg-blue">
<input type="submit" name="submit" value="Register">
</div>

</form>
<div class="overlay"></div><!--Register form-->

</div>

<div class="box-right col col-xs-12 col-md-6 pt120">

  <!--Login form-->
  <?php echo validation_errors(); ?>
  <?php echo form_open('advertisers/login'); ?>

    <div class="add_form card">
        <input type="email" name="email" placeholder="What is your email address?">
    </div>
    <div class="add_form card">
        <input type="password" name="password" placeholder="And your password?">
    </div>
    <div class="ptb10"></div>
    <div class="add_form card submit-btn bg-blue">
        <input type="submit" name="submit" value="Access">
    </div>

  </form><!--Login form-->

  </div>

</div><!--Page content-->

</div><!--Page-->
