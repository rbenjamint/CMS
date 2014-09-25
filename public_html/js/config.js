'use strict';

/* Controllers */
app.config(
  [          '$stateProvider', '$urlRouterProvider', '$controllerProvider', '$compileProvider', '$filterProvider', '$provide',
    function ($stateProvider,   $urlRouterProvider,   $controllerProvider,   $compileProvider,   $filterProvider,   $provide) {
        
        // lazy controller, directive and service
        app.controller = $controllerProvider.register;
        app.directive  = $compileProvider.directive;
        app.filter     = $filterProvider.register;
        app.factory    = $provide.factory;
        app.service    = $provide.service;
        app.constant   = $provide.constant;
        app.value      = $provide.value;

        $urlRouterProvider
            .otherwise('/app/dashboard');
        $stateProvider
            .state('app', {
                abstract: true,
                url: '/app',
                templateUrl: 'tpl/app.html'
            })
            .state('app.dashboard', {
                url: '/dashboard',
                templateUrl: 'tpl/app_dashboard_v1.html'
            })
            .state('access', {
                url: '/access',
                template: '<div ui-view class="fade-in-right-big smooth"></div>'
            })
            .state('access.signin', {
                url: '/signin',
                templateUrl: 'tpl/page_signin.html'
            })
            .state('access.404', {
                url: '/404',
                templateUrl: 'tpl/page_404.html'
            })
            .state('app.empty', {
                url: '/empty/',
                templateUrl: 'tpl/empty.html'
            })
            .state('app.invoices', {
                url: '/invoices/',
                templateUrl: 'tpl/page_invoice.html'
            })
            .state('app.pages', {
                abstract: true,
                url: '/pages',
                templateUrl: 'tpl/pages.html',
                resolve: {
                    deps: ['uiLoad',
                      function( uiLoad ){
                        return uiLoad.load( ['/js/services/pages.js'] );
                    }]
                }
            })
            .state('app.pages.all', {
                url: '/all/',
                templateUrl: 'tpl/cms_pages.html'
            })
            .state('app.pages.active', {
                url: '/active/',
                templateUrl: 'tpl/cms_pages_active.html'
            })
            .state('app.pages.edit', {
                url: '/{pageId:[0-9]{1,4}}',
                templateUrl: 'tpl/cms_pages_edit.html',
                controller: 'PageEditCtrl'
            })
            .state('app.pages.create', {
                url: '/create',
                templateUrl: 'tpl/cms_pages_edit.html',
                controller: 'PageCreateCtrl'
            })
          	;

    }
  ]
);

// translate config
app.config(['$translateProvider', function($translateProvider){

  // Register a loader for the static files
  // So, the module will search missing translation tables under the specified urls.
  // Those urls are [prefix][langKey][suffix].
  $translateProvider.useStaticFilesLoader({
    prefix: 'l10n/',
    suffix: '.json'
  });

  // Tell the module what language to use by default
  $translateProvider.preferredLanguage('en');

  // Tell the module to store the language in the local storage
  $translateProvider.useLocalStorage();

}]);


// oclazyload config
app.config(['$ocLazyLoadProvider', function($ocLazyLoadProvider) {
    // We configure ocLazyLoad to use the lib script.js as the async loader
    $ocLazyLoadProvider.config({
        debug: false,
        events: true,
        modules: [
            {
                name: 'ngGrid',
                files: [
                    'js/modules/ng-grid/ng-grid.min.js',
                    'js/modules/ng-grid/ng-grid.css',
                    'js/modules/ng-grid/theme.css'
                ]
            },
            {
                name: 'toaster',
                files: [                    
                    'js/modules/toaster/toaster.js',
                    'js/modules/toaster/toaster.css'
                ]
            }
        ]
    });
}]);