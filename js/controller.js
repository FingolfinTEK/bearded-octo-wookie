'use strict';

var controllers = angular.module('controllers', []);
controllers.controller('QuotesController', function ($scope, $http) {
    $http.get('/api/quotes').success(function (data) {
        $scope.quotes = data;
    });
});
