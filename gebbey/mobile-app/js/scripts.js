$(document).ready(function() {

  $('body').addClass('body-loaded');

  $('.add_intro').click(function () {
    $( ".overlay" ).fadeIn();
    $('.add_content').show();
  });
  $('.overlay').click(function () {
    $(this).fadeOut();
    $('.add_content').hide();
  });

});

function onDeviceReady() {
  document.removeEventListener('deviceready', onDeviceReady, false);
  
  // Set AdMobAds options:
  admob.setOptions({
    publisherId:          "ca-app-pub-XXXXXXXXXXXXXXXX/BBBBBBBBBB",  // Required
  });
  
  // Start showing banners (atomatic when autoShowBanner is set to true)
  admob.createBannerView();
  
  // Request interstitial (will present automatically when autoShowInterstitial is set to true)
  //admob.requestInterstitialAd();


  var notificationOpenedCallback = function(jsonData) {
    console.log('notificationOpenedCallback: ' + JSON.stringify(jsonData));
  };

  window.plugins.OneSignal
    .startInit("15cd39b9-7517-4ea2-9ad5-aea44e2af0ed")
    .handleNotificationOpened(notificationOpenedCallback)
    .endInit();

}

document.addEventListener("deviceready", onDeviceReady, false);


var app = angular.module('clas', ['ngCordova']);

/*
app.run(function($window, $rootScope) {
  $rootScope.online = navigator.onLine;
  $window.addEventListener("offline", function() {
    $rootScope.$apply(function() {
      $rootScope.online = false;
    });
  }, false);

  $window.addEventListener("online", function() {
    $rootScope.$apply(function() {
      $rootScope.online = true;
    });
  }, false);
});
*/


app.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);



app.controller('categories', function($scope, $http, $window) {

  document.addEventListener("offline", onOffline, false);

function onOffline() {
  $scope.noInternet = true;
}


if(localStorage.getItem("user")) {
  $scope.user = localStorage.getItem("user");
} else {
  $scope.user = 'null';
}

if($scope.user == 'null') {
  $window.location.href = 'login.html';
}


var getCategs = function() {
  $http.get("https://clas.pssthemes.com/mobile/get_categories")
    .then(function(response) {
        $scope.categories = response;
        $scope.loading = true;
    });
}
  getCategs();


  $scope.openSingleCategory = function(url) {

    var ref = window.open(encodeURI(url), '_blank','location=no');
 ref.addEventListener('loadstart', function(event) {
     if (event.url.match("mobile/close")) {
         ref.close();
     }
 });
  }


});

/*
app.config([
  '$compileProvider',
  function ($compileProvider) {
  $compileProvider.imgSrcSanitizationWhitelist(/^\s*(https?|cdvphotolibrary):/);

  }
]);
*/

app.directive('camera', function() {
  return {
     restrict: 'A',
     require: 'ngModel',
     link: function(scope, elm, attrs, ctrl) {
        elm.on('click', function() {
           navigator.camera.getPicture(function (imageURI) {
              scope.$apply(function() {
                 ctrl.$setViewValue(imageURI);
              });
           }, function (err) {
              ctrl.$setValidity('error', false);
           }, { quality: 50, sourceType: Camera.PictureSourceType.CAMERA, destinationType: Camera.DestinationType.FILE_URI })
        });
     }
  };
});

app.directive('library', function() {
  return {
     restrict: 'A',
     require: 'ngModel',
     link: function(scope, elm, attrs, ctrl) {
        elm.on('click', function() {
           navigator.camera.getPicture(function (imageURI) {
            scope.$apply(function() {
                 ctrl.$setViewValue("data:image/png;base64,"+imageURI);
                });
                }, function (err) {
              ctrl.$setValidity('error', false);
           }, { quality: 50, 
            sourceType: Camera.PictureSourceType.SAVEDPHOTOALBUM, 
            destinationType: Camera.DestinationType.DATA_URL,
            encodingType: Camera.EncodingType.JPEG })
        });
     }
  };
});


app.directive("owlCarousel", function() {
	return {
		restrict: 'E',
		transclude: false,
		link: function (scope) {
			scope.initCarousel = function(element) {
			  // provide any default options you want
				var defaultOptions = {
				};
				var customOptions = scope.$eval($(element).attr('data-options'));
				// combine the two options objects
				for(var key in customOptions) {
					defaultOptions[key] = customOptions[key];
				}
				// init carousel
				$(element).owlCarousel(defaultOptions);
			};
		}
	};
})
app.directive('owlCarouselItem', function() {
	return {
		restrict: 'A',
		transclude: false,
		link: function(scope, element) {
		  // wait for the last item in the ng-repeat then call init
			if(scope.$last) {
				scope.initCarousel(element.parent());
			}
		}
	};
});

app.filter('externalLinks', function() {
   return function(text) {
     return String(text).replace(/href=/gm, "class=\"ex-link\" href=");
   }
 })

app.controller('items', function($scope, $rootScope, $http, $window, $q, $cordovaFileTransfer) {



  // to remove

/*
setTimeout(function() {
  $scope.product = [];
$scope.product.name = 'Test name';
$scope.product.description = 'Test description';
$scope.product.price = 12000;
$scope.product.address = 'Test address';
$scope.product.phone = '08001982828';
$scope.product.email = 'we@mail.com';
  
        // realestate
$scope.product.type = 'condo';
$scope.product.rentsale = 'rent';
}, 1000)

/**/  

// to remove


/*
  $scope.getPhoneNumber = function() {
    document.addEventListener("deviceready", function() {
      window.plugins.sim.getSimInfo($scope.successCallback, $scope.errorCallback);
    }, false);

    $scope.successCallback = function(result) {
      $scope.product.phone = result.phoneNumber;
      $scope.$apply();
    }

    // Android only: check permission
    function hasReadPermission() {
      window.plugins.sim.hasReadPermission(successCallback, errorCallback);
    }

    // Android only: request permission
    function requestReadPermission() {
      window.plugins.sim.requestReadPermission(successCallback, errorCallback);
    }
  }
*/

function parse_query_string(query) {
  var vars = query.split("&");
  var query_string = {};
  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    var key = decodeURIComponent(pair[0]);
    var value = decodeURIComponent(pair[1]);
    // If first entry with this name
    if (typeof query_string[key] === "undefined") {
      query_string[key] = decodeURIComponent(value);
      // If second entry with this name
    } else if (typeof query_string[key] === "string") {
      var arr = [query_string[key], decodeURIComponent(value)];
      query_string[key] = arr;
      // If third or later entry with this name
    } else {
      query_string[key].push(decodeURIComponent(value));
    }
  }
  return query_string;
}

var url_string = window.location.href;
var parsed_qs = parse_query_string(url_string);
var c = parsed_qs.cat_slug;
$scope.categ = parsed_qs.cat_id;
  $scope.categ_name = parsed_qs.cat_name;
  $scope.categ_slug = parsed_qs.cat_slug;

  $scope.user = localStorage.getItem("user");

  /*
  var url_string = window.location.href;
  var url = new URL(url_string);
  var c = url.searchParams.get("cat");
  $scope.categ = url.searchParams.get("cat_id");
  $scope.categ_name = url.searchParams.get("cat_name");
  $scope.user = localStorage.getItem("user");
  $scope.categ_slug = url.searchParams.get("cat");
*/
  

  if($scope.user == 'null') {
    $window.location.href = '/login.html';
  }


$scope.start = 0;
$scope.set_listings_per_page = 0;
$scope.items = [];



$scope.images = [];
$scope.$watch('myImages', function(value) {
   if(value) {
      $scope.images.push(value);
      console.log($scope.images);
   }
}, true);

$scope.removeImage = function(i) {
  $scope.images.splice(i, 1);
}


$scope.hideAndShow = function() {
  $scope.justSubmitted = false;
  $scope.closeAddContent = false;
}

$scope.pushed = 'false';


$scope.publish = function() {

  console.log($scope.pushed);

  console.log($scope.product);

 $scope.key = Date.now();

  $scope.product.category = $scope.categ;

  if(!$scope.product.name) {
    $scope.validation = false;
    alert('You need to enter product name.');
  }
  else if(!$scope.product.description) {
    $scope.validation = false;
    alert('You need to enter product description.');
  }
  

  else if($scope.product.country === 'sel') {
    $scope.validation = false;
    alert('You need to select country.');
  }
  else if($scope.product.state === 'sel') {
    $scope.validation = false;
    alert('You need to select state.');
  }
  else if($scope.product.city === 'sel') {
    $scope.validation = false;
    alert('You need to select city.');
  }

  else if(!$scope.product.phone) {
    $scope.validation = false;
    alert('You need to add your phone number.');
  }
/*
  else if($scope.images.length == 0) {
    $scope.validation = false;
    alert('You should add at least one image.');
  }
*/
  

  
   else if(!$scope.product.description) {
    $scope.validation = false;
    alert('You need to enter product description.');
  } else {


    if(!$scope.product.price) {
      $scope.product.price = 0;
    } 


    if(!$scope.product.email) {
      $scope.product.email = '0';
    }

    if(!$scope.product.address) {
      $scope.product.address = '0';
    }


    if(!$scope.product.company) {
      $scope.product.company = '0';
    }
    if(!$scope.product.job_title) {
      $scope.product.job_title = '0';
    }
    if(!$scope.product.qualification) {
      $scope.product.qualification = '0';
    }
    if(!$scope.product.deadline) {
      $scope.product.deadline = '0';
    }

    if(!$scope.product.mileage) {
      $scope.product.mileage = '0';
    }
    if(!$scope.product.color) {
      $scope.product.color = '0';
    }
    if(!$scope.product.body) {
      $scope.product.body = '0';
    }
    if(!$scope.product.year_made) {
      $scope.product.year_made = '0';
    }

    if(!$scope.product.events_company) {
      $scope.product.events_company = '0';
    }
    if(!$scope.product.events_startdate) {
      $scope.product.events_startdate = '0';
    }
    if(!$scope.product.events_starttime) {
      $scope.product.events_starttime = '0';
    }
    

    $scope.justSubmittedProduct = $scope.product;

    console.log($scope.cat_slug);

if($scope.pushed == 'false') {

    $http({
      method: 'GET',
      url: 'https://clas.pssthemes.com/mobile/create/'+$scope.key,
      params: {
        product_category_id : $scope.product.category,
        product_category: $scope.categ_slug,
        product_user: $scope.user,
  
        product_name: $scope.product.name,
        product_description: $scope.product.description,
        product_price: $scope.product.price,
        product_country: $scope.product.country,
        product_state: $scope.product.state,
        product_city: $scope.product.city,
        product_address: $scope.product.address,
        product_phone: $scope.product.phone,
        product_email: $scope.product.email,
  
        // realestate
          product_type: $scope.product.type,
          product_rentsale: $scope.product.rentsale,
  
  
        // jobs
          product_company: $scope.product.company,
          product_job_title: $scope.product.job_title,
          product_qualification: $scope.product.qualification,
          product_deadline: $scope.product.deadline,
  
        // automobile
          product_make: $scope.product.make,
          product_model: $scope.product.model,
          product_mileage: $scope.product.mileage,
          product_color: $scope.product.color,
          product_body: $scope.product.body,
          product_year_made: $scope.product.year_made,
  
        // events
          product_events_company: $scope.product.events_company,
          product_events_startdate: $scope.product.events_startdate,
          product_events_starttime: $scope.product.events_starttime,
  
      },
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
      }
      }).then(function(res){
        console.log(res);
  
        $window.scrollTo(0, 0);
  
        

        console.log($scope.justSubmittedProduct);
  
        $scope.justSubmitted = true;
  
        $scope.product = null;
  
        //alert('Items Posted successfully');
        //location.reload();
      }),function(error){
  
      };


    imageUpload($scope.images, $scope.key);
  }
  $scope.pushed = 'true';
}

}

var imageUpload = function(images, key) {


  for(x=0;x<images.length;x++) {

    var fileURL = images[x];
    var uri = encodeURI("https://clas.pssthemes.com/mobile/upload/"+key+"/"+x);
    var options = new FileUploadOptions();
    options.fileKey = "file";
    options.fileName = fileURL.substr(fileURL.lastIndexOf('/')+1);
    options.mimeType = "text/plain";

    var headers = {'headerParam':'headerValue'};
    options.headers = headers;
    var ft = new FileTransfer();
    ft.upload(fileURL, uri, onSuccess, onError, options);

    function onSuccess(r) {

    }

    function onError(error) {

    }





  }
}



// Localization
$http.get("https://clas.pssthemes.com/mobile/get_countries/").then(function(response) {
  $scope.countries = response.data;
})
$scope.getStates = function(country) {
  $http.get("https://clas.pssthemes.com/mobile/get_states/"+country).then(function(response) {
    $scope.states = response.data;
  })
}
$scope.getCities = function(state) {
  $http.get("https://clas.pssthemes.com/mobile/get_cities/"+state).then(function(response) {
    $scope.cities = response.data;
  })
}


// Automobile
$scope.make = 'Select make';
$http.get("https://clas.pssthemes.com/mobile/get_makes/").then(function(response) {
  $scope.makes = response.data;
})
$scope.getModels = function(make) {
  $http.get("https://clas.pssthemes.com/mobile/get_models/"+make).then(function(response) {
    $scope.models = response.data;
  })
}



$http.get("https://clas.pssthemes.com/mobile/count_categ/"+c).then(function(response) {
  $scope.count = response.data;
})

$http.get("https://clas.pssthemes.com/mobile/get_settings").then(function(response) {
  $scope.set_listings_per_page = response.data.set_listings_per_page;
  $scope.step = response.data.set_listings_per_page / response.data.set_advertisements_per_page;
    $scope.get_items();
})


$scope.get_items = function() {
  $scope.num = 0;
  $scope.items=[];
  // Advertisement
$http.get("https://clas.pssthemes.com/mobile/get_advertisement/").then(function(response) {
  $scope.advertisements = response.data;
  $http.get("https://clas.pssthemes.com/mobile/get_items_mobile/"+c+"/"+$scope.start+"/"+$scope.set_listings_per_page).then(function(response) {
    for(x=0;x<response.data.length;x++) {
      $scope.items.push(response.data[x]);
    }
    $scope.loading = true;
  })
})


}


$scope.showBtnNext = true;
$scope.showBtnPrev = false;

$scope.currentPage = 1;

$scope.next = function() {
  $scope.loading = false;

  $scope.num = 0;

  $scope.currentPage = $scope.currentPage + 1;

$scope.start = parseInt($scope.start)+parseInt($scope.set_listings_per_page);

if($scope.start != 0) {
  $scope.showBtnPrev = true;
}

if($scope.start<$scope.count) {
  $scope.get_items();
  $scope.showBtnNext = true;
} else {
  $scope.showBtnNext = false;
}
}

$scope.prev = function() {
  $scope.loading = false;

  $scope.num = 0;

  $scope.currentPage = $scope.currentPage - 1;

$scope.start = parseInt($scope.start)-parseInt($scope.set_listings_per_page);
$scope.get_items();
if($scope.start == 0) {
  $scope.showBtnPrev = false;
}
if($scope.start < $scope.count) {
  $scope.showBtnNext = true;
}
}

  $scope.openAdvm = function(url) {
      var ref = window.open(url, '_blank', 'location=yes');
  }


  $scope.openLink = function(url) {
    var ref = window.open(encodeURI(url), '_blank','location=no');
 ref.addEventListener('loadstart', function(event) {
     if(event.url.match("mobile/close")) {
         ref.close();
     }
 });
  }

  $scope.close = function() {

            history.back();

  }

    });


app.controller('single', function($scope, $rootScope, $timeout, $http, $window, $sce) {

  $scope.close = function() {

            history.back();

  }


  function parse_query_string(query) {
    var vars = query.split("&");
    var query_string = {};
    for (var i = 0; i < vars.length; i++) {
      var pair = vars[i].split("=");
      var key = decodeURIComponent(pair[0]);
      var value = decodeURIComponent(pair[1]);
      // If first entry with this name
      if (typeof query_string[key] === "undefined") {
        query_string[key] = decodeURIComponent(value);
        // If second entry with this name
      } else if (typeof query_string[key] === "string") {
        var arr = [query_string[key], decodeURIComponent(value)];
        query_string[key] = arr;
        // If third or later entry with this name
      } else {
        query_string[key].push(decodeURIComponent(value));
      }
    }
    return query_string;
  }
  
  var url_string = window.location.href;
  var parsed_qs = parse_query_string(url_string);
  var i = parsed_qs.item;
  var c = parsed_qs.cat;
  $scope.categ = parsed_qs.cat;

  console.log(i);

/*
  var url_string = window.location.href;
  var url = new URL(url_string);
  var i = url.searchParams.get("item");
  var c = url.searchParams.get("cat");
  $scope.categ = url.searchParams.get("cat");
  */

  $scope.user = localStorage.getItem("user");

  $scope.scrollToBottom = function() {
    if($scope.showReport == true) {
      $scope.showReport = false;
    } else {
      $scope.showReport = true;
    }
    window.scrollTo(0,document.body.scrollHeight);
  }


  $scope.report = function(reason) {
    alert('This listing was succesfully reported. Thank you!');
    $http.get("https://clas.pssthemes.com/mobile/report_item/"+i+"/"+reason)
      .then(function(response) {
        //alert('This listing was succesfully reported. Thank you!');
      })
  }


  if($scope.user == 'null') {
    $window.location.href = '/login.html';
  }

  $http.get("https://clas.pssthemes.com/mobile/get_specials/"+i+"/"+c)
              .then(function(response) {
                  $scope.specials = response.data;
                  $scope.loading = true;
              });

    $http.get("https://clas.pssthemes.com/mobile/get_item/"+i)
      .then(function(response) {
          $scope.item = response.data;
          //console.log(response.data);
          
          $http.get("https://clas.pssthemes.com/mobile/get_related/"+response.data.i_category+"/"+response.data.i_city)
              .then(function(response) {
                  $scope.related = response.data;
                  //console.log(response.data);
                  $scope.loading = true;
              });
          $scope.mapURL = $sce.trustAsResourceUrl("https://www.google.com/maps/embed/v1/place?q="+response.data.city_name+"&key=AIzaSyDktLSrPh9JtvGRszpYKOG0N63Pm6wE1uE");
          $http.get("https://clas.pssthemes.com/mobile/get_media/"+response.data.i_media)
            .then(function(response) {
                $scope.media = response.data;
                //console.log($scope.media);
                $scope.loading = true;
            });
            
      });

      $scope.displayMap = function() {
        if($scope.map == true) {
          $scope.map = false;
        } else {
          $scope.map = true;
        }
      }

      $scope.share = function() {

      }


      var user_id = localStorage.getItem("user");
      $scope.user_id = localStorage.getItem("user");

      if($scope.user_id == 'null') {
        $window.location.href = '/login.html';
      }

      $scope.showCommentsTrigger = function() {
        if($scope.showComments == true) {
          $scope.showComments = false;
        } else {
          $scope.showComments = true;
        }
      }

      $scope.showLocationTrigger = function() {
        if($scope.showLocation == true) {
          $scope.showLocation = false;
        } else {
          $scope.showLocation = true;
        }
      }

      $scope.getComments = function() {
        $http.get("https://clas.pssthemes.com/home/getcomments/"+i)
        .then(function(response) {
            $scope.comments = response.data;
        });
      }
      $scope.getComments();
      setInterval(function(){
        $scope.getComments();
      }, 1000)
      $scope.cono = 3;
      $scope.moreComments = function() {
        $scope.cono +=3;
      }
      $scope.adminReply = function(username) {
        $scope.admin = username+', ';
        $scope.$broadcast('adminFocus');
      }
      $scope.sendMessage = function(message) {
        if($scope.message == null || $scope.message == '') {
          console.log('no message');
        } else {
          $scope.sendMessageAlready = true;
          $http.get("https://clas.pssthemes.com/mobile/post_comment/"+i+"/"+user_id+"/"+message+"/"+$scope.l_u)
        .then(function(response) {
            $scope.message = null;
            $scope.sendMessageAlready = false;
        });
        }
      }



});


app.directive('focusOn', function() {
   return function(scope, elem, attr) {
      scope.$on(attr.focusOn, function(e) {
          elem[0].focus();
      });
   };
});

app.controller('comments', function($scope, $http) {

  var user_id = localStorage.getItem("user");
  $scope.user_id = localStorage.getItem("user");

  if($scope.user_id == 'null') {
    $window.location.href = '/login.html';
  }




  function parse_query_string(query) {
    var vars = query.split("&");
    var query_string = {};
    for (var i = 0; i < vars.length; i++) {
      var pair = vars[i].split("=");
      var key = decodeURIComponent(pair[0]);
      var value = decodeURIComponent(pair[1]);
      // If first entry with this name
      if (typeof query_string[key] === "undefined") {
        query_string[key] = decodeURIComponent(value);
        // If second entry with this name
      } else if (typeof query_string[key] === "string") {
        var arr = [query_string[key], decodeURIComponent(value)];
        query_string[key] = arr;
        // If third or later entry with this name
      } else {
        query_string[key].push(decodeURIComponent(value));
      }
    }
    return query_string;
  }
  
  var url_string = window.location.href;
  var parsed_qs = parse_query_string(url_string);
  var i = parsed_qs.id;
  var l_u = parsed_qs.listing_user;
  $scope.categ = parsed_qs.cat;

/*
  var url_string = window.location.href;
  var url = new URL(url_string);
  var i = url.searchParams.get("id");
  var l_u = url.searchParams.get("listing_user");
*/

  $scope.getComments = function() {
    $http.get("https://clas.pssthemes.com/home/getcomments/"+i)
    .then(function(response) {
        $scope.comments = response.data;
    });
  }
  $scope.getComments();
  setInterval(function(){
    $scope.getComments();
  }, 5000)
  $scope.cono = 3;
  $scope.moreComments = function() {
    $scope.cono +=3;
  }
  $scope.adminReply = function(username) {
    $scope.admin = username+', ';
    $scope.$broadcast('adminFocus');
  }
  $scope.sendMessage = function(message) {
    $http.get("https://clas.pssthemes.com/mobile/post_comment/"+i+"/"+user_id+"/"+message+"/"+l_u)
    .then(function(response) {
        $scope.message = null;
    });
  }
});


app.controller('account', function($scope, $http, $rootScope) {


  if(localStorage.getItem("user")) {
    $scope.user = localStorage.getItem("user");
  } else {
    $scope.user = 'null';
  }

  $scope.checkUsername = function(userid) {
    $scope.useridtemp = userid+'@gebeyapp.com';
    $http.get("https://clas.pssthemes.com/mobile/check_username/"+userid)
    .then(function(response) {
      console.log(response.data);
        if(response.data == 'true') {
          $scope.usernameNA = false;
        } else {
          $scope.usernameNA = true;
        };
    });
  }

  $scope.login = function(userid, password) {
    var userid = userid.replace('@gebeyapp.com','');
    $http.get("https://clas.pssthemes.com/mobile/login/"+userid+"/"+password)
    .then(function(response) {
        if(response.data.u_email) {
          localStorage.setItem("user", response.data.u_id);
          localStorage.setItem("userAll", response.data);
          window.location.replace("index.html");
        } else {
          window.location.replace("login.html");
        };
    });
  }


// Localization
$http.get("https://clas.pssthemes.com/mobile/get_countries/").then(function(response) {
  $scope.countries = response.data;
})
$scope.getStates = function(country) {
  $http.get("https://clas.pssthemes.com/mobile/get_states/"+country).then(function(response) {
    $scope.states = response.data;
  })
}
$scope.getCities = function(state) {
  $http.get("https://clas.pssthemes.com/mobile/get_cities/"+state).then(function(response) {
    $scope.cities = response.data;
  })
}

  $scope.getLocation = function() {
    navigator.geolocation.getCurrentPosition($scope.onSuccess, $scope.onError);
  }
  $scope.onSuccess = function(position) {
    $rootScope.lat = position.coords.latitude;
    $rootScope.lon = position.coords.longitude;
  }
  $scope.onError = function() {
    $rootScope.lat = 0;
    $rootScope.lon = 0;
  }

  $scope.register = function(userid, email, username, password, country, state, city, phone) {

    $scope.registerPressed = true;

    if(!email) {
      console.log('no');
      email = '';
    }
    if(!location) {
      console.log('no');
      location = '';
    }



    /*
      $username = $new = str_replace(' ', '%20', strip_tags($username));

    'u_userid'=>$_GET['u_userid'],
        'u_email'=>$_GET['u_email'],
        'u_username'=> $_GET['u_username'],
        'u_password'=> $_GET['u_password'],
        'u_country'=> $_GET['u_country'],
        'u_state'=> $_GET['u_state'],
        'u_city'=> $_GET['u_city'],
        'u_phone'=> $_GET['u_phone'],

    */

   $http({
    method: 'GET',
    url: 'https://clas.pssthemes.com/mobile/register/',
    params: {
      u_userid: userid,
      u_email: email,
      u_username: username,
      u_password: password,
      u_country: country,
      u_state: state,
      u_city: city,
      u_phone: phone
    },
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    }
    }).then(function(res){
      console.log(res);
      alert('your user ID is '+$scope.useridtemp+' And password is '+password+', please keep this information in safe place to login another time.');
      $scope.registerPressed = false;
      $scope.login($scope.useridtemp,password);
    }),function(error){

    };

/*
    $http.get("https://clas.pssthemes.com/mobile/register/"+userid+"/"+email+"/"+username+"/"+password+"/"+country+"/"+state+"/"+city+"/"+phone)
    .then(function(response) {
      alert('your user ID is '+$scope.useridtemp+' And password is '+password+', please keep this information in safe place to login another time.');
      $scope.registerPressed = false;
      $scope.login($scope.useridtemp,password);
    });
    */
  }

});




app.controller('profile', function($scope, $http) {
  var user_id = localStorage.getItem("user");
  $http.get("https://clas.pssthemes.com/mobile/get_user/"+user_id)
  .then(function(response) {
      $scope.user = response.data;
  });

  var getUserItems = function() {
    $http.get("https://clas.pssthemes.com/mobile/get_user_items/"+user_id)
    .then(function(response) {
        //console.log(response.data);
        $scope.user_items = response.data;
    });
  }
  getUserItems();

  $scope.signout = function() {
    localStorage.setItem("user", null);
    window.location.replace("index.html");
  }

  $scope.delete = function(id) {
    $http.get("https://clas.pssthemes.com/mobile/delete_item/"+id)
    .then(function(response) {
        getUserItems();
    });
  }

  $scope.getuserMessages = function() {
    $http.get("https://clas.pssthemes.com/mobile/user_comments/"+user_id)
    .then(function(response) {
        console.log(response.data);
        $scope.user_comments = response.data;
    });
  }


  $scope.setItemToEdit = function() {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var slug = url.searchParams.get("slug");

    $http.get("https://clas.pssthemes.com/mobile/get_item/"+slug)
      .then(function(response) {
          $scope.product = response.data;
          console.log(response.data);
      });

  }

  $scope.updateItem = function(id) {

    $http({
      method: 'GET',
      url: 'https://clas.pssthemes.com/mobile/updateProduct/'+id,
      params: {
        product_id: id,
        product_name: $scope.product.i_name,
        product_description: $scope.product.i_description,
        product_price: $scope.product.i_price,
        product_address: $scope.product.i_address,
        product_phone: $scope.product.i_phone,
        product_email: $scope.product.i_email
      },
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
      }
      }).then(function(res){
        console.log(res);
        alert('Item updated successfully');
       // location.reload();
      }),function(error){

      };

  }

});


app.controller('search', function($scope, $http) {
  $scope.loading = true;
  
  $scope.runSearch = function(searchTerms) {

    $scope.results = [];
  $scope.searchTerms = '';

    var res = searchTerms.split(" ");
    
    for(x=0;x<res.length;x++) {
      $http.get("https://clas.pssthemes.com/mobile/search_mobile/"+res[x])
      .then(function(response) {
        for(y=0;y<response.data.length;y++) {
          $scope.results.push(response.data[y]);
        }
          console.log($scope.results);
      });
    }

  }


  $scope.openLink = function(url) {
    var ref = window.open(encodeURI(url), '_blank','location=no');
 ref.addEventListener('loadstart', function(event) {
     if(event.url.match("mobile/close")) {
         ref.close();
     }
 });
  }

  $scope.close = function() {

            history.back();

  }


});
