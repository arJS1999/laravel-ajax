<!DOCTYPE html>
<html>
<head>
	<title>Add cart</title>
</head>
<body ng-app='cartapp'>
<div ng-controller='cartctrl'>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Product</th>
			<th>Price</th>
			<th>Quentity</th>
			<th>Action</th>
		</tr>
		<tr ng-repeat='x in carts'>
			<td>@{{x.id}}</td>
			<td>@{{x.product}}</td>
			<td>@{{x.price}}</td>
			<!-- <td><input type="number">@{{x.quentity}}</td> -->
			<td><input type="number" ng-model="x.quentity" min="1" max="10"></td>


			<td><input type="submit" ng-click='insert(x)' value="Add Cart"></td>
		</tr>
	</table>
	<br>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Product</th>
			<th>Price</th>
			<th>Quentity</th>
			<th>Total</th>
		</tr>
		<tr ng-repeat='x in cartview'>
			<td>@{{x.id}}</td>
			<td>@{{x.product}}</td>
			<td>@{{x.price}}</td>
			
			<td>@{{$scope.quentity*x.price}}</td>
		</tr>
	</table>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script>
	var app=angular.module('cartapp',[]);
	app.controller('cartctrl',function($scope,$http) {
		
		$http.get('select').success(function(data){
			console.log(data);
			$scope.quentity=1;
			$scope.carts=data;

		});
		$scope.insert=function(x){
	// alert(x.quentity);
	                $scope.user = angular.copy(x);

			$http.post("insert",
				data={'id':x.id,'product':x.product,'price':x.price,'total':user.quentity*x.price},
				).success(function(data){
					console.log(data);
			
				})
		};
		
	})
</script>
</body>
</html>