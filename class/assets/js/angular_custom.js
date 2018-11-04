var app = angular.module('ccs', ['ui.tree']);

app.controller('plmCtrl', function($scope, $http) {
  $scope.ceva = 'dsada';

});
// .controller('getSubcategories', ['$scope', '$http', function ($scope, $http) {
//
//    $scope.remove = function (scope) {
//            scope.remove();
//          };
//
//          $scope.toggle = function (scope) {
//            scope.toggle();
//          };
//
//          $scope.moveLastToTheBeginning = function () {
//            var a = $scope.data.pop();
//            $scope.data.splice(0, 0, a);
//          };
//
//          $scope.newSubItem = function (scope) {
//            var nodeData = scope.$modelValue;
//            nodeData.nodes.push({
//              id: nodeData.id * 10 + nodeData.nodes.length,
//              title: nodeData.title + '.' + (nodeData.nodes.length + 1),
//              nodes: []
//            });
//          };
//
//          $scope.collapseAll = function () {
//            $scope.$broadcast('angular-ui-tree:collapse-all');
//          };
//
//          $scope.expandAll = function () {
//            $scope.$broadcast('angular-ui-tree:expand-all');
//          };
//
// $scope.getSubcategoriesInit = function(id) {
//    $http.get("http://ccs.pssthemes.com/admin/categories/get_subcategories_json/"+id)
//     .then(function(response) {
//     //  console.log(response.data.scat_json);
//       $scope.data = JSON.parse(response.data.scat_json);
//
//     });
//   }
//
//       $scope.save = function(id) {
//         console.log($scope.data);
//
//         $http({
//       method: 'GET',
//       url: 'http://ccs.pssthemes.com/admin/categories/update_subcategory',
//       params: {
//         json: $scope.data,
//         main_category: id,
//       },
//       headers: {
//           'Content-Type': 'application/x-www-form-urlencoded'
//       }
//       }).then(function(res){
//         console.log(res);
//         location.reload();
//       }),function(error){
//       };
//       }
//
//
//
//
//
//       function findById(o, id) {
//       //Early return
//       if( o.id == id ){
//         return o;
//       }
//       var result, p;
//       for (p in o) {
//           if( o.hasOwnProperty(p) && typeof o[p] == 'object' ) {
//               result = findById(o[p], id);
//               if(result){
//                   return result;
//               }
//           }
//       }
//       return result;
//   }
//
//
// $scope.edit = function(id) {
//   var found = findById($scope.data, id);
//   console.log(found);
//   found.title = $scope.newTitle;
//   console.log($scope.data);
// }
//
//
//
//
//
//     }]);
// }());
