'use strict';

angular.module('victrApp')

.controller('IndexController', ['$scope', '$http', function($scope, $http){
		$http.get("./php/repositories.php")
    		.then(function (response) {$scope.repositories = response.data.records;});
	}])
	
.controller('RepoDetailController', ['$scope', '$stateParams', '$http', function($scope, $stateParams, $http){
		$http.get("./php/repodetail.php", {params: { id: parseInt($stateParams.id,10) }})	
    		.then(function (response) {$scope.repositories = response.data.records;});
	}])	
;