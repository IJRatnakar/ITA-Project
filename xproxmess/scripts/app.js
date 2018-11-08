angular.module("todoListApp",[])

.controller('mainCtrl',function($scope){
	$scope.helloWorld = function() {
		console.log("HELLO");
	};
	$scope.todos = [
		{"name": "FDNS Website"},
		{"name": "Flappy Bird Game"},
		{"name": "Number Recognization in Matlab"},
		{"name": "Voice Recognization in Matlab"},
		{"name": "Matlab"},
		{"name": "Blog"},
		{"name": "Article on Polymer"}
	]


});
