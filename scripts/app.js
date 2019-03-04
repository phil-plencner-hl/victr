'use strict';

angular.module('victrApp', ['ui.router'])
.config(function($stateProvider, $urlRouterProvider, $qProvider) {
        $stateProvider
        
            // route for the home page
            .state('app', {
                url:'/',
                views: {
                    'header': {
                        templateUrl : 'views/header.html',
                    },
                    'content': {
                        templateUrl : 'views/home.html',
                        controller  : 'IndexController'
                    },
                    'footer': {
                        templateUrl : 'views/footer.html',
                    }
                }

            })
        
            // route for the repodetail page
            .state('app.repodetails', {
                url: 'repo/:id',
                views: {
                    'content@': {
                        templateUrl : 'views/repodetail.html',
                        controller  : 'RepoDetailController'
                   }
                }
            });
    
        $urlRouterProvider.otherwise('/');
        $qProvider.errorOnUnhandledRejections(false);
    })
    
;
