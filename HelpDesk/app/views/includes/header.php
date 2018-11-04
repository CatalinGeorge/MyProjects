<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119042460-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119042460-1');
</script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <!-- CSS Style -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">

    <!-- JS Script -->
    <script src="<?php echo base_url(); ?>js/scripts.js"></script>

</head>

<body ng-app="helpdesk" ng-controller="helpdeskCtrl" class="bg-dark">
  <script>
  var app = angular.module('helpdesk', []);

  app.filter('crop', function(){
	return function(input, limit, respectWordBoundaries, suffix){
		if (input === null || input === undefined || limit === null || limit === undefined || limit === '') {
			return input;
		}
		if (angular.isUndefined(respectWordBoundaries)) {
			respectWordBoundaries = true;
		}
		if (angular.isUndefined(suffix)) {
			suffix = '...';
		}

		if (input.length <= limit) {
			return input;
		}

		limit = limit - suffix.length;

		var trimmedString = input.substr(0, limit);
		if (respectWordBoundaries) {
			return trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" "))) + suffix;
		}
		return trimmedString + suffix;
}
});

  app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);

  app.controller('helpdeskCtrl', function($scope, $http) {

    $scope.$watch('myFile', function(newFileObj){
        if(newFileObj)
            $scope.filename = newFileObj.name;
    });

    setInterval(function(){
      if($scope.selected) {
        $scope.getMessages();
      }
    }, 1000);


      $scope.account = function() {
        $scope.showLogin = true;
        $scope.showRegister = false;
      }

      $scope.ticketsPage = function() {
        $scope.action = 'inbox';
      }

      // Admin

      $scope.getInbox = function(id=false) {
        $http.get("<?php echo base_url(); ?>home/getTicketsInboxJSON")
          .then(function(response) {
              $scope.ticketsInbox = response.data;
              if(id==false) {
                  $scope.selected = $scope.ticketsInbox[0];
              } else {

              }
              $scope.getMessages();
              console.log(response.data);
          });
      }


      $scope.getTrash = function() {
        $http.get("<?php echo base_url(); ?>home/getTicketsTrashJSON")
          .then(function(response) {
              $scope.ticketsTrash = response.data;
              console.log(response.data);
          });
      }

      $scope.select = function(i) {
        if($scope.action == 'inbox') {
          $scope.selected = $scope.ticketsInbox[i];
        }
        if($scope.action == 'trash') {
          $scope.selected = $scope.ticketsTrash[i];
        }
        $http.get("<?php echo base_url(); ?>home/setStatusTicketAdmin/read/"+$scope.selected.tic_id)
          .then(function(response) {
            $scope.getInbox(1);
          });
          $scope.getTrash();
      }


      $scope.delete = function() {
        $http.get("<?php echo base_url(); ?>home/setStatusTicketAdmin/delete/"+$scope.selected.tic_id)
          .then(function(response) {
            $scope.getTrash();
            $scope.getInbox();
          });
      }

      $scope.getMessages = function(ticket = false) {
          $http.get("<?php echo base_url(); ?>home/getTicketMessages/"+$scope.selected.tic_id)
            .then(function(response) {
                $scope.ticketMessages = response.data;
                console.log(response.data);
            });

      }


      // User



<?php if (isset($user)) { ?>

  $scope.publishMessage = function(message) {

    var url = "<?php echo base_url(); ?>home/createMessage";
    var file = $scope.myFile;

    $http({
    			  method  : 'POST',
    			  url     : url,
    			  processData: false,
    			  transformRequest: function (data) {
    			      var formData = new FormData();
    			      formData.append("image", file);
    			      return formData;
    			  },
            params: {
              user: <?php echo $user['us_id']; ?>,
              ticket: $scope.selected.tic_id,
              media: $scope.selected.tic_media_folder,
              message: message
            },
    			  headers: {
    			         'Content-Type': undefined
    			  }
          }).then(function(data){
            $scope.message = '';
            $scope.filename = '';
    		      $scope.getTrash();
    		   });


}

      $scope.getInboxU = function(id=false) {
        $http.get("<?php echo base_url(); ?>home/getTicketsInboxJSON/<?php echo $user['us_id']; ?>")
          .then(function(response) {
              $scope.ticketsInbox = response.data;
              if(id==false) {
                  $scope.selected = $scope.ticketsInbox[0];
              } else {

              }
              $scope.getMessages();
              console.log(response.data);
          });
      }


      $scope.getTrashU = function() {
        $http.get("<?php echo base_url(); ?>home/getTicketsTrashJSON/<?php echo $user['us_id']; ?>")
          .then(function(response) {
              $scope.ticketsTrash = response.data;
              console.log(response.data);
          });
      }

      $scope.selectU = function(i) {
        if($scope.action == 'inbox') {
          $scope.selected = $scope.ticketsInbox[i];
        }
        if($scope.action == 'trash') {
          $scope.selected = $scope.ticketsTrash[i];
        }
        $http.get("<?php echo base_url(); ?>home/setStatusTicketUser/read/"+$scope.selected.tic_id)
          .then(function(response) {
            $scope.getInboxU(1);
          });
          $scope.getTrashU();
      }

      $scope.deleteU = function() {
        $http.get("<?php echo base_url(); ?>home/setStatusTicketUser/delete/"+$scope.selected.tic_id)
          .then(function(response) {
            $scope.getTrashU();
            $scope.getInboxU();
          });
      }

<?php } ?>

  });
  </script>
