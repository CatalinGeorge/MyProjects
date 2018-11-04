<?php

  // Require composer autoloader
  require __DIR__ . '/vendor/autoload.php';

  require __DIR__ . '/dotenv-loader.php';

  use Auth0\SDK\Auth0;

$auth0 = new Auth0([
'domain' => 'socialstom.auth0.com',
'client_id' => 'Shfa5V-by1h5_62mv3jLAeFdWEXlBR3X',
'client_secret' => '3CF_tQ6-3v4LLePBLdI5d-1f5xCiXW-lXu1ilDMg49x_axibsGQZoRJzyxbz3aGz',
'redirect_uri' => 'http://socials.pssthemes.com/ou/',
'audience' => 'http://socialstom.auth0.com/userinfo',
'scope' => 'openid profile',
'persist_id_token' => true,
'persist_access_token' => true,
'persist_refresh_token' => true,
]);

  $userInfo = $auth0->getUser();

  print_r($userInfo);

?>

<script>
  window.location.href = "https://socials.pssthemes.com/add?nickname=<?php echo $userInfo['nickname']; ?>&sub=<?php echo ucfirst($userInfo['sub']); ?>";
</script>
