app.factory('contacts', ['$http', function ($http) {
	console.log('hoi');
  var path = '/cms/api/contacts/';
  var contacts = $http.get(path+'rest').then(function (resp) {
    return resp.data;
  });

  var factory = {};
  factory.all = function () {
    return contacts;
  };
  factory.save = function (contact) {
	return $http.post(path+'save', contact).then(function (response) {
		console.log(response.data.contact);
		if(response.data.done){
			return;
		} else {
		}
	});
  };
  factory.saveGroup = function (group) {
	return $http.post(path+'group', group).then(function (response) {
		console.log(response.data.group);
		if(response.data.done){
			return;
		} else {
		}
	});
  };
  factory.groups = function (contact) {
	return $http.get(path+'groups').then(function (response) {
		return response.data;
	});
  };
  factory.add = function (contact) {
	return $http.post(path+'create', contact).then(function (response) {
		console.log(response.data.contact);
		if(response.data.done){
			return;
		} else {
		}
	});
  };
  return factory;
}]);