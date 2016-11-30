'use strict';

angular.module('Sudoku', [
  'ngResource',
  'Sudoku.grid'
]).config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('[[');
  $interpolateProvider.endSymbol(']]');
}).config(function($resourceProvider) {
  $resourceProvider.defaults.stripTrailingSlashes = false;
}).config(function($locationProvider) {
  $locationProvider.html5Mode(true).hashPrefix('!');
}).config(['$compileProvider', function ($compileProvider) {
    $compileProvider.aHrefSanitizationWhitelist(/^\s*(|blob|):/);
}]);
