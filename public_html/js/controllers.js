'use strict';

/* Controllers */

angular.module('app.controllers', ['pascalprecht.translate', 'ngCookies'])
  .controller('AppCtrl', ['$http', '$scope', '$translate', '$localStorage', '$window', 'AuthenticationService', 'SessionService', '$state', '$rootScope', 
    function(              $http,   $scope,   $translate,   $localStorage,   $window,   AuthenticationService,   SessionService, $state,   $rootScope ) {
      // add 'ie' classes to html
      var isIE = !!navigator.userAgent.match(/MSIE/i);
      isIE && angular.element($window.document.body).addClass('ie');
      isSmartDevice( $window ) && angular.element($window.document.body).addClass('smart');

      // config
      $scope.app = {
        name: 'CMS',
        nameSmall: 'RT',
        version: '0.0.1',
        // for chart colors
        color: {
          primary: '#7266ba',
          info:    '#23b7e5',
          success: '#27c24c',
          warning: '#fad733',
          danger:  '#f05050',
          light:   '#e8eff0',
          dark:    '#3a3f51',
          black:   '#1c2b36'
        },
        settings: {
          themeID: 1,
          navbarHeaderColor: 'bg-black',
          navbarCollapseColor: 'bg-white-only',
          asideColor: 'bg-black',
          headerFixed: true,
          asideFixed: false,
          asideFolded: false,
          asideDock: false,
          container: false
        }
      }

      // set title of the page
      document.title = $scope.app.name;
      // save settings to local storage
      if ( angular.isDefined($localStorage.settings) ) {
        $scope.app.settings = $localStorage.settings;
      } else {
        $localStorage.settings = $scope.app.settings;
      }
      $scope.$watch('app.settings', function(){
        if( $scope.app.settings.asideDock  &&  $scope.app.settings.asideFixed ){
          // aside dock and fixed must set the header fixed.
          $scope.app.settings.headerFixed = true;
        }
        // save to local storage
        $localStorage.settings = $scope.app.settings;
      }, true);

      // angular translate
      $scope.lang = { isopen: false };
      $scope.langs = {en:'English', de_DE:'German', it_IT:'Italian'};
      $scope.selectLang = $scope.langs[$translate.proposedLanguage()] || "English";
      $scope.setLang = function(langKey, $event) {
        // set the current lang
        $scope.selectLang = $scope.langs[langKey];
        // You can change the language during runtime
        $translate.use(langKey);
        $scope.lang.isopen = !$scope.lang.isopen;
      };

      $http.get("/cms/auth/rest")
            .then(function(response){
              $scope.user = response.data.user;
            });

      $scope.logout = function() {
        AuthenticationService.logout().success(function() {
          $state.go('access.signin');
        });
      };
		$scope.goto = function(url) {
			if(url[0] === '/'){
				window.location = url;
			} else {
				console.log('/'+url);
				window.location = '/'+url;
			}
		};
      function isSmartDevice( $window )
      {
          // Adapted from http://www.detectmobilebrowsers.com
          var ua = $window['navigator']['userAgent'] || $window['navigator']['vendor'] || $window['opera'];
          // Checks for iOs, Android, Blackberry, Opera Mini, and Windows mobile devices
          return (/iPhone|iPod|iPad|Silk|Android|BlackBerry|Opera Mini|IEMobile/).test(ua);
      }

  }])

  // signin controller
  .controller('SigninFormController', ['$scope', '$http', '$state', 'AuthenticationService', function($scope, $http, $state, AuthenticationService) {
    $scope.credentials = { email: '', password: '' };

    $scope.login = function() {
      $scope.credentials = { email: $scope.user.email, password: $scope.user.password };
      var login = AuthenticationService.login($scope.credentials);
    };
  }])

  .controller('HomeController', ['$scope', '$rootScope', function($scope, $rootScope, CRSF_TOKEN) {
    console.log('hi', $rootScope);
  }])

  // Pages Controller
  .controller('PagesCtrl', ['$scope', '$stateParams', 'pages',
                    function($scope,   $stateParams,	 pages) {
	  pages.all().then(function(pages){
	    $scope.pages = pages;
		console.log('Pages: ',pages);
	  });
  }])
  .controller('PagesActiveCtrl', ['$scope', '$stateParams', 'pages',
                    function($scope,   $stateParams,	 pages) {
	  pages.where('nav', 1).then(function(pages){
	    $scope.pages = pages;
		console.log('Pages: ',pages);
	  });
  }])

  // Pages edit Controller
  .controller('PageEditCtrl', ['$state', '$scope', '$http', '$stateParams', 'pages',
    function(                   $state, 	$scope,   $http,   $stateParams,	 pages) {
    	
    	pages.get($stateParams.pageId).then(function(page){
    		$scope.page = page;
    		$scope.page.nav = Boolean($scope.page.nav);
    		$scope.page.active = Boolean($scope.page.active);
    	});
    	$scope.submit = function(){
    		pages.save($scope.page).then(function(page){
    			$state.go('app.pages.all');
    			$scope.page = page;
    		});
    	};
  }])
  // Pages create Controller
  .controller('PageCreateCtrl', ['$state', '$scope', '$http', '$stateParams', 'pages',
    function(                   	 $state, $scope,   $http,   $stateParams,	 pages) {
    	$scope.page = { title: 'Pagina titel'}
    	
    	$scope.submit = function(){
    		pages.create($scope.page).then(function(page){
    			$state.go('app.pages.all');
    			$scope.page = page;
    		});
    	};
  }])
;