'use strict';

/* Controllers */

var app = angular.module('app', ['pascalprecht.translate', 'ngCookies']);

app.controller('HomeController', ['$scope', function($scope) {
  console.log('hoi', CRSF_TOKEN);
}])