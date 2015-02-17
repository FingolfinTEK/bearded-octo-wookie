'use strict';

var controllers = angular.module('controllers', []);

controllers.controller('QuotesController', function ($scope, $http) {
    $http.get('/api/quotes').success(function (data) {
        $scope.quotes = data;
    });
});

controllers.controller('CareerEventsController', function ($scope, $http, $sce) {
    $http.get('/api/career-events').success(function (data) {
        $scope.careerEvents = data;
        angular.forEach(data, function(value) {
            value.description = $sce.trustAsHtml(value.description);            
        });
    });
});

controllers.controller('TestimonialsController', function ($scope, $http) {
    $http.get('/api/testimonials').success(function (data) {
        $scope.testimonials = data;
    });
});
