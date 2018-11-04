// angularjs
var app = angular.module('socialsApp', []);
app.filter('capitalize', function() {
  return function(token) {
      return token.charAt(0).toUpperCase() + token.slice(1);
   }
});
app.controller('mainCtrl', function($scope, $http, $window) {






  var screenWidth = $window.innerWidth;

if (screenWidth < 600){
    $scope.showLogin = true;
    $scope.showRegister = false;
}else{
  $scope.showLogin = true;
  $scope.showRegister = true;
}

  $scope.showLoginF = function() {
    $scope.showRegister = false;
    $scope.showLogin = true;
  }
  $scope.showRegisterF = function() {
    $scope.showLogin = false;
    $scope.showRegister = true;
  }

  $scope.generalLogOut = function() {
    $http.get("https://socials.pssthemes.com/ou/logout.php")
    .then(function(response) {
        console.log(response.data);
    });
  }

  onSignIn = function(googleUser) {
    var profile = googleUser.getBasicProfile();
      console.log('Gog',profile);

    document.getElementById('soc_name').value= profile.getName();
    document.getElementById('soc_email').value= profile.getEmail();
    document.getElementById('soc_url').value= 'https://plus.google.com/'+profile.getId();
    document.getElementById('soc_avatar').value= profile.getImageUrl() ;
    // profile.getImageUrl()

    document.getElementById('network_name').value= 'Google';
    $scope.NetworkName = 'Google';
    $scope.net_1 = 'Google';
    $scope.network_name = 'Google';



  }

  signOut = function() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }

  $scope.SetNetworkName = function(name) {
    $scope.net_2 = '';
    $scope.net_3 = '';
    $scope.net_4 = '';
    $scope.net_5 = '';
    $scope.NetworkName = name;
    $scope.net_1 = name;
    $scope.network_name = name;
  }

  logInWithFacebook = function() {
      FB.getLoginStatus(function(response) {
    if (response.status === 'connected') {

      FB.api(
    '/'+response.authResponse.userID+'?fields=name,email',
    'GET',
    {},
    function(response) {
        // Insert your code here
        console.log(response);

        $scope.$apply(function() {

          $scope.NetworkName = 'Facebook';
          $scope.net_1 = 'Facebook';
          $scope.network_name = 'Facebook';
          $scope.net_2 = response.name;
          $scope.net_3 = response.email;
          $scope.net_4 = "https://graph.facebook.com/"+response.id+"/picture?type=normal";
          $scope.net_5 = "https://facebook.com/"+response.id;
        });
    }
  );

    }
    else {
      FB.login(function(response) {
          if (response.authResponse) {
              // connected
              logInWithFacebook();
          } else {
              // cancelled
          }
      }, { scope: 'email,public_profile' });
    }
  });
  }

$scope.logOut = function() {
      try {
          if (FB.getAccessToken() != null) {
              FB.logout(function(response) {
                  // user is now logged out from facebook do your post request or just redirect
                 // window.location.replace(href);
              });
          } else {
              // user is not logged in with facebook, maybe with something else
              //window.location.replace(href);
          }
      } catch (err) {
          // any errors just logout
         // window.location.replace(href);
      }
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
        console.log('User signed out.');
      });
}

  window.fbAsyncInit = function() {
      FB.init({
        appId            : '656502811364628',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v3.0'
      });
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));

});
