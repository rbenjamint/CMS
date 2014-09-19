  'use strict';

/* Controllers */
app.config(['$httpProvider', function($httpProvider){

  var logsOutUserOn401 = function($location, $q, SessionService){

    var success = function(response){
      return response;
    };

    var error = function() {
      if(response.status === 401) {
        SessionService.unset('authenticated');
        $location.path('/negerneukendehoer');
        console.log('flashie', response.data.flash);
      }
    };

    return function(promise) {
      return promise.then(success, error);
    };

  };

  $httpProvider.responseInterceptors.push(logsOutUserOn401);

}]);

app.run(
  [          '$rootScope', '$state', '$location', 'AuthenticationService',
    function ($rootScope,   $state,   $location,   AuthenticationService) {
      var routesThatRequireNoAuth = ['/access/signin', '/access/forgotpwd', '/access/signup'];

      $rootScope.$watch('$state.current', function(newValue, oldValue) {
        if(!_(routesThatRequireNoAuth).contains($location.path()) && !AuthenticationService.isLoggedIn()) {
          $location.path('/access/signin');
          //FlashService.show("Please log in to continue.");
        } else if(_(routesThatRequireNoAuth).contains($location.path()) && AuthenticationService.isLoggedIn()) {
          //console.log('deze url komt er WEL in voor.', AuthenticationService.isLoggedIn());
          $location.path('/app/home');
        }
      });
    }
  ]
);

app.factory("FlashService", function($rootScope) {
  return {
    show: function(message) {
      //$rootScope.flash = message;
      console.log(message);
    },
    clear: function() {
      //$rootScope.flash = "";
      console.log('flash message is clear');
    }
  }
});

app.factory("SessionService", function() {
  return {
    get: function(key) {
      return sessionStorage.getItem(key);
    },
    set: function(key, val) {
      return sessionStorage.setItem(key, val);
    },
    unset: function(key) {
      return sessionStorage.removeItem(key);
    }
  }
});

app.factory("AuthenticationService", ['$state', '$rootScope', '$http', 'FlashService', 'SessionService', 'CSRF_TOKEN',
                              function($state,   $rootScope,   $http,   FlashService,   SessionService,   CSRF_TOKEN) {

  var cacheSession   = function() {
    SessionService.set('authenticated', true);
  };

  var uncacheSession = function() {
    SessionService.unset('authenticated');
  };

  var loginError = function(response) {
    FlashService.show(response.error);
  };

  var sanitizeCredentials = function(credentials) {
    return {
      email: credentials.email,
      password: credentials.password,
      csrf_token: CSRF_TOKEN
    };
  };

  return {
    login: function(credentials) {

      var login = $http.post("/cms/auth/login", sanitizeCredentials(credentials))
      .then(function(response){
        if( !response.data.user){
          console.log(response)
          $rootScope.authError = 'Email of wachtwoord is niet correct';
        }
        else {
          SessionService.set('authenticated', true);
          $rootScope.user = response.data.user;
          $state.go('app.dashboard');
        }
      });
      return;
    },
    logout: function() {
      console.log('trying to logout.');
      var logout = $http.get("/cms/auth/logout");
      logout.success(uncacheSession);
      return logout;
    },
    getuser: function() {
      var user = '';
      $http.get("/cms/auth/rest")
            .then(function(response){
              user = response.data.user;
              console.log('hi', response.data.user);
            });
      console.log('hi', user);
      return user;
    },
    isLoggedIn: function() {
      return SessionService.get('authenticated');
    },
    getUser: function() {
      if(SessionService.get('authenticated') == false){
        console.log('shit');
        return false;
      }
      else {
        return $rootScope.user;
      }
    }
  };
}]);