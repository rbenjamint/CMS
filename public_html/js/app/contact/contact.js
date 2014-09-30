app.controller('ContactCtrl', ['$scope', '$http', '$filter', 'contacts', function($scope, $http, $filter, contacts) {
  
  contacts.all().then(function(contacts){
    $scope.items = contacts;
    $scope.item = $filter('orderBy')($scope.items, 'first')[0];
    $scope.item.selected = true;
    console.log($scope.items);
  });
  
  contacts.groups().then(function(contacts){
  	$scope.groups = contacts;
  });
  
  $scope.filter = '';

  $scope.createGroup = function(){
    var group = {name: 'New Group'};
    group.name = $scope.checkItem(group, $scope.groups, 'name');
    $scope.groups.push(group);
  };

  $scope.checkItem = function(obj, arr, key){
    var i=0;
    angular.forEach(arr, function(item) {
      if(item[key].indexOf( obj[key] ) == 0){
        var j = item[key].replace(obj[key], '').trim();
        if(j){
          i = Math.max(i, parseInt(j)+1);
        }else{
          i = 1;
        }
      }
    });
    return obj[key] + (i ? ' '+i : '');
  };

  $scope.deleteGroup = function(item){
    $scope.groups.splice($scope.groups.indexOf(item), 1);
  };

  $scope.selectGroup = function(item){    
    angular.forEach($scope.groups, function(item) {
      item.selected = false;
    });
    $scope.group = item;
    $scope.group.selected = true;
    $scope.filter = item.name;
  };

  $scope.selectItem = function(item){    
    angular.forEach($scope.items, function(item) {
      item.selected = false;
      item.editing = false;
    });
    $scope.item = item;
    $scope.item.selected = true;
  };

  $scope.deleteItem = function(item){
    $scope.items.splice($scope.items.indexOf(item), 1);
    $scope.item = $filter('orderBy')($scope.items, 'first')[0];
    if($scope.item) $scope.item.selected = true;
  };

  $scope.createItem = function(){
    var item = {
      group: 'Friends',
      avatar:'img/a0.jpg'
    };
	contacts.add(item).then(function(){
		console.log('gelukt!');
	    $scope.items.push(item);
	    $scope.selectItem(item);
	    $scope.item.editing = true;
	});
  };

  $scope.editItem = function(item){
    if(item && item.selected){
      item.editing = true;
    }
  };

  $scope.doneEditingGroup = function(item){
		console.log('hoi: group');
		contacts.saveGroup(item).then(function(){
			console.log('gelukt!');
			item.editing = false;
		});
  };
  $scope.doneEditing = function(item){
		console.log('hoi: item');
		contacts.save(item).then(function(){
			console.log('gelukt!');
			item.editing = false;
		});
		return;
  };

}]);