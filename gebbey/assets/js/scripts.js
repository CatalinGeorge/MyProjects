// Angular
var app = angular.module('clas', ['paypal-button']);   // 'paypal-button'

app.filter('toArray', function () {
  return function (obj, addKey) {
    if (!angular.isObject(obj)) return obj;
    if ( addKey === false ) {
      return Object.keys(obj).map(function(key) {
        return obj[key];
      });
    } else {
      return Object.keys(obj).map(function (key) {
        var value = obj[key];
        return angular.isObject(value) ?
          Object.defineProperty(value, '$key', { enumerable: false, value: key}) :
          { $key: key, $value: value };
      });
    }
  };
});

app.controller('clasCtrl', function($scope, $http) {
  $scope.price_range_min = 0;
  $scope.price_range_max = 100;
  $scope.impressionsPerDollar = 1000;

  $scope.totalBudget = 1;

  $scope.tester = 'I am a test';

  $scope.calculateBudget = function(type) {
    if(type == 'dailyBudget') {
      $scope.totalBudget = $scope.dailyBudget * $scope.numberOfDays;
      $scope.numberOfDays = $scope.totalBudget / $scope.dailyBudget;
    }
    if(type == 'totalBudget') {
      $scope.numberOfDays = $scope.totalBudget / $scope.dailyBudget;
      $scope.dailyBudget = $scope.totalBudget / $scope.numberOfDays;
    }
    if(type == 'numberOfDays') {
      $scope.totalBudget = $scope.dailyBudget * $scope.numberOfDays;
      $scope.dailyBudget = $scope.totalBudget / $scope.numberOfDays;
    }

    $scope.impressions = $scope.impressionsPerDollar * $scope.totalBudget;
  }


  $scope.opts = {
      env: 'sandbox',
      client: {
          sandbox:    'AWi18rxt26-hrueMoPZ0tpGEOJnNT4QkiMQst9pYgaQNAfS1FLFxkxQuiaqRBj1vV5PmgHX_jA_c1ncL',
          production: '<insert production client id>'
      },
      payment: function() {
          var env    = this.props.env;
          var client = this.props.client;
          return paypal.rest.payment.create(env, client, {
              transactions: [
                  {
                      amount: { total: $scope.totalBudget, currency: 'USD' }
                  }
              ]
          });
      },
      commit: true, // Optional: show a 'Pay Now' button in the checkout flow
      onAuthorize: function(data, actions) {
        console.log(data);
        console.log(actions);
          // Optional: display a confirmation page here
          return actions.payment.execute().then(function() {
              // Show a success page to the buyer
              console.log('payment successfully completed');
          });
      }
  };

  $scope.openSingle = function(id) {
    alert(id);
  }

  $scope.getUniqueId = function(userid) {
    $scope.useridtemp = userid+'@gebeyapp.com';
    $http.get("https://clas.pssthemes.com/mobile/check_username/"+userid)
    .then(function(response) {
      console.log(response.data);
        if(response.data == 'true') {
          $scope.usernameNA = false;
        } else {
          $scope.usernameNA = true;
        };
  })
}

});




// jQuery
$(document).ready(function() {

  $('.add_intro').click(function () {
    $( ".overlay" ).fadeIn();
    $('.add_content').show();
  });

  $('.overlay').click(function () {
    $(this).fadeOut();
    $('.add_content').hide();
  });

$(document).keyup(function(e) {
  if (e.keyCode == 27) { // esc keycode
    $('.overlay').fadeOut();
    $('.add_content').hide();
  }
});

  $('.close-search-btn').hide('fast');

  $('.search-btn').click(function () {
    $('.search-btn').hide();
    $('.close-search-btn').show();
   $('.search-box').show();
 });
 $('.close-search-btn').click(function () {
   $('.search-btn').show();
   $('.close-search-btn').hide();
  $('.search-box').hide();
});


    $('.phone-toggle').click(function () {
      $('.report-box').hide();
      $('.favourite-box').hide();
      $('.trade-box').hide();
      $('.offer-box').hide();
      $('.map-box').hide();
      $('.email-box').hide();
      if($('.phone-box').is(":visible")) {
        $('.phone-box').hide();
      } else {
        $('.phone-box').show();
      }
    });

    $('.email-toggle').click(function () {
      $('.report-box').hide();
      $('.favourite-box').hide();
      $('.trade-box').hide();
      $('.offer-box').hide();
      $('.map-box').hide();
      $('.phone-box').hide();
      if($('.email-box').is(":visible")) {
        $('.email-box').hide();
      } else {
        $('.email-box').show();
      }
    });

    $('.favourite-toggle').click(function () {
      $('.report-box').hide();
      $('.trade-box').hide();
      $('.offer-box').hide();
      $('.map-box').hide();
      $('.phone-box').hide();
      $('.email-box').hide();
      if($('.favourite-box').is(":visible")) {
        $('.favourite-box').hide();
      } else {
        $('.favourite-box').show();
      }
    });

    $('.report-toggle').click(function () {
      $('.overlay-s').show();
      $('.report-box').show();
      $('.favourite-box').hide();
      $('.trade-box').hide();
      $('.offer-box').hide();
      $('.map-box').hide();
      $('.phone-box').hide();
      $('.email-box').hide();
    });


    $('.map-toggle').click(function () {
      $('.overlay-s').show();
      $('.report-box').hide();
      $('.favourite-box').hide();
      $('.trade-box').hide();
      $('.offer-box').hide();
      $('.map-box').show();
      $('.phone-box').hide();
      $('.email-box').hide();
    });

    $('.trade-toggle').click(function () {
      $('.overlay-s').show();
      $('.report-box').hide();
      $('.favourite-box').hide();
      $('.trade-box').show();
      $('.offer-box').hide();
      $('.map-box').hide();
      $('.phone-box').hide();
      $('.email-box').hide();
    });

    $('.offer-toggle').click(function () {
      $('.overlay-s').show();
      $('.report-box').hide();
      $('.favourite-box').hide();
      $('.trade-box').hide();
      $('.offer-box').show();
      $('.map-box').hide();
      $('.phone-box').hide();
      $('.email-box').hide();
    });

    $('.overlay-s').click(function () {
      $('.overlay-s').hide();
      $('.report-box').hide();
      $('.favourite-box').hide();
      $('.trade-box').hide();
      $('.offer-box').hide();
      $('.map-box').hide();
      $('.phone-box').hide();
      $('.email-box').hide();
    });


    $('.add-form-trigger').click(function () {
      if($('.add-form').is(":visible")) {
        $('.add-form').hide();
      } else {
        $('.add-form').show();
      }
    });


    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })

    $(".write-comment").keypress(function(e) {
      if(e.which == 13) {
        var comment= $(".write-comment").val();
        var user= $(".user-comment").val();
        var listing= $(".listing-comment").val();
        var listing_user= $(".listing-user").val();
        $(".write-comment").val('');
        $.ajax({
                type:"post",
                url: "https://clas.pssthemes.com/home/comment",
                data:{ comment:comment,
                       user:user,
                       listing:listing,
                       listing_user:listing_user
                     },
                success:function(response)
                {

                },
                error: function()
                {
                    alert("Invalid!");
                }
            });
      }
  });



  $( "select[name='country']" ).change(function () {
    $('select[name="city"]').empty();
    $('select[name="city"]').append('<option disabled selected>Select city</option>');
      var country_id = $(this).val();
      if(country_id) {
          $.ajax({
            type: "GET",
              url: "https://clas.pssthemes.com/home/get_states/"+country_id,
              success: function(data) {
                  $('select[name="state"]').empty();
                  $('select[name="state"]').append('<option disabled selected>Select state</option>');

                  var obj = JSON.parse(data);

                  $.each( obj, function( key, value ) {
                    $('select[name="state"]').append('<option value="'+ value['state_id'] +'">'+ value['state_name'] +'</option>');
                  });


              }
          });
      }else{
          $('select[name="state"]').empty();
      }
  });

  $( "select[name='state']" ).change(function () {
      var state_id = $(this).val();
      if(state_id) {
          $.ajax({
            type: "GET",
              url: "https://clas.pssthemes.com/home/get_cities/"+state_id,
              success: function(data) {
                  $('select[name="city"]').empty();
                  $('select[name="city"]').append('<option disabled selected>Select city</option>');

                  var obj = JSON.parse(data);

                  $.each( obj, function( key, value ) {
                    $('select[name="city"]').append('<option value="'+ value['city_id'] +'">'+ value['city_name'] +'</option>');
                  });


              }
          });
      }else{
          $('select[name="city"]').empty();
      }
  });


  $( "select[name='make']" ).change(function () {
      var make_id = $(this).val();
      if(make_id) {
          $.ajax({
            type: "GET",
              url: "https://clas.pssthemes.com/home/get_models/"+make_id,
              success: function(data) {
                  $('select[name="model"]').empty();
                  $('select[name="model"]').append('<option disabled selected>Select model</option>');

                  var obj = JSON.parse(data);

                  $.each( obj, function( key, value ) {
                    $('select[name="model"]').append('<option value="'+ value['model_id'] +'">'+ value['model_name'] +'</option>');
                  });


              }
          });
      }else{
          $('select[name="model"]').empty();
      }
  });


  var mySwiper = new Swiper ('.swiper-container', {
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  preloadImages: false,
  lazy: true,
  slidesPerView: 1,
  breakpoints: {
      1024: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 1,
      },
      320: {
        slidesPerView: 1,
      }
    }
  })


  var mySwiperRelated = new Swiper ('.swiper-container-related', {
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  preloadImages: false,
  lazy: true,
  slidesPerView: 4,
  breakpoints: {
      1024: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 3,
      },
      640: {
        slidesPerView: 1,
      },
      320: {
        slidesPerView: 1,
      }
    }
  })




}); // document ready
