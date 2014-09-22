app.factory('pages', ['$http', function ($http) {

  var path = '/cms/api/pages/';
  var pages = $http.get(path+'rest').then(function (resp) {
    return resp.data;
  });

  var factory = {};
  factory.all = function () {
    return pages;
  };
  factory.get = function (id) {
	return $http.get(path+'rest/'+id).then(function (response) {
		return response.data;
	});
  };
  factory.where = function (key, value) {
	return $http.get(path+'rest/'+key+'/'+value).then(function (response) {
		return response.data;
	});
  };
  factory.save = function (page) {
	return $http.post(path+'save', page).then(function (response) {
		console.log(response.data.page);
		if(response.data.done && response.data.page){
			return response.data.page;
		} else {
		}
	});
  };
  factory.create = function (page) {
	return $http.post(path+'create', page).then(function (response) {
		console.log(response.data.page);
		if(response.data.done && response.data.page){
			return response.data.page;
		} else {
		}
	});
  };
  return factory;
}]);