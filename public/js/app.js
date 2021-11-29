var app = angular.module('app', [])
.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

var serwer = "http://127.0.0.1:8000";
//var serwer = "http://invest.pellplast.pl";
app.controller('ClientsCtrl', function ($scope, $http) {
    $http.get(serwer+'/clients/getClientsJson').then(function (result) {
        $scope.clients = result;
    })  
})

app.controller('AddOrderCtrl', function ($scope, $http) {
    $http.get(serwer+'/clients/getClientsJson').then(function (result) {
        $scope.clients = result;
    })  
})


app.controller('OrdersCtrl', function ($scope, $http) {
    $http.get(serwer+'/orders/getOrdersJson').then(function (result) {
        $scope.orders = result;
    })
   
})





