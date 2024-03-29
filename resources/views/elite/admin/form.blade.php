<html>

<head>
    <title>AngularJS & Bootstrap Form Validation</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.css" rel="stylesheet" />
    <script src="lib/angular.js"></script>
    <script>
        //defining module
var myapp = angular.module('myapp', []);
 
//creating custom directive
myapp.directive('ngCompare', function () {
 return {
 require: 'ngModel',
 link: function (scope, currentEl, attrs, ctrl) {
 var comparefield = document.getElementsByName(attrs.ngCompare)[0]; //getting first element
 compareEl = angular.element(comparefield);
 
 //current field key up
 currentEl.on('keyup', function () {
 if (compareEl.val() != "") {
 var isMatch = currentEl.val() === compareEl.val();
 ctrl.$setValidity('compare', isMatch);
 scope.$digest();
 }
 });
 
 //Element to compare field key up
 compareEl.on('keyup', function () {
 if (currentEl.val() != "") {
 var isMatch = currentEl.val() === compareEl.val();
 ctrl.$setValidity('compare', isMatch);
 scope.$digest();
 }
 });
 }
 }
});
 
// create angular controller
myapp.controller('mainController', function ($scope) {
 
 $scope.countryList = [
 { CountryId: 1, Name: 'India' },
 { CountryId: 2, Name: 'USA' }
 ];
 
 $scope.cityList = [];
 
 $scope.$watch('user.country', function (newVal,oldVal) {
 
 if (newVal == 1)
 $scope.cityList = [
 { CountryId: 1, CityId: 1, Name: 'Noida' },
 { CountryId: 1, CityId: 2, Name: 'Delhi' }];
 else if (newVal == 2)
 $scope.cityList = [
 { CountryId: 2, CityId: 3, Name: 'Texas' },
 { CountryId: 2, CityId: 4, Name: 'NewYork' }];
 else
 $scope.cityList = [];
 });
 
 // function to submit the form after all validation has occurred 
 $scope.submitForm = function () {
 
 // Set the 'submitted' flag to true
 $scope.submitted = true;
 
 if ($scope.userForm.$valid) {
 alert("Form is valid!");
 }
 else {
 alert("Please correct errors!");
 }
 };
});
 
    </script>
</head>

<body ng-app="myapp" ng-controller="mainController">
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">

            <!-- PAGE HEADER -->
            <div class="page-header">
                <h1>AngularJS Form Validation</h1>
            </div>

            <!-- FORM : YOU CAN DISABLE, HTML5 VALIDATION BY USING "novalidate" ATTRIBUTE-->
            <form name="userForm" ng-submit="submitForm()" novalidate>

                <!-- NAME -->
                <div class="form-group"
                    ng-class="{ 'has-error' : userForm.name.$invalid && (userForm.name.$dirty || submitted)}">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" ng-model="user.name" placeholder="Your Name"
                        ng-required="true">
                    <p ng-show="userForm.name.$error.required && (userForm.name.$dirty || submitted)"
                        class="help-block">You name is required.</p>
                </div>

                <!-- USERNAME -->
                <div class="form-group"
                    ng-class="{ 'has-error' : userForm.username.$invalid && (userForm.username.$dirty || submitted)}">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" ng-model="user.username"
                        placeholder="Your Username" ng-minlength="3" ng-maxlength="8" ng-required="true">
                    <p ng-show="userForm.username.$error.required && (userForm.username.$dirty || submitted)"
                        class="help-block">You username is required.</p>
                    <p ng-show="userForm.username.$error.minlength && (userForm.username.$dirty || submitted)"
                        class="help-block">Username is too short.</p>
                    <p ng-show="userForm.username.$error.maxlength && (userForm.username.$dirty || submitted)"
                        class="help-block">Username is too long.</p>
                </div>

                <!-- PASSWORD -->
                <div class="form-group"
                    ng-class="{ 'has-error' : userForm.password.$invalid && (userForm.password.$dirty || submitted)}">
                    <label>Password</label>
                    <input type="Password" name="password" class="form-control" ng-model="user.password"
                        placeholder="Your Password" ng-required="true">
                    <p ng-show="userForm.password.$error.required && (userForm.password.$dirty || submitted)"
                        class="help-block">Your password is required.</p>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="form-group"
                    ng-class="{ 'has-error' : userForm.confirmPassword.$invalid && (userForm.confirmPassword.$dirty || submitted)}">
                    <label>Confirm Password</label>
                    <input type="Password" name="confirmPassword" class="form-control" ng-model="user.confirmPassword"
                        placeholder="Confirm Your Password" ng-compare="password" ng-required="true">
                    <p ng-show="userForm.confirmPassword.$error.required && (userForm.confirmPassword.$dirty || submitted)"
                        class="help-block">Your confirm password is required.</p>
                    <p ng-show="userForm.confirmPassword.$error.compare && (userForm.confirmPassword.$dirty || submitted)"
                        class="help-block">Confirm password doesnot match.</p>
                </div>

                <!-- EMAIL -->
                <div class="form-group"
                    ng-class="{ 'has-error' : userForm.email.$invalid && (userForm.email.$dirty || submitted)}">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" ng-model="user.email"
                        placeholder="Your Email Address" ng-required="true">
                    <p ng-show="userForm.email.$error.required && (userForm.email.$dirty || submitted)"
                        class="help-block">Email is required.</p>
                    <p ng-show="userForm.email.$error.email && (userForm.email.$dirty || submitted)" class="help-block">
                        Enter a valid email.</p>
                </div>

                <!-- CONTACTNO -->
                <div class="form-group"
                    ng-class="{ 'has-error' : userForm.contactno.$invalid && (userForm.contactno.$dirty || submitted) }">
                    <label>ContactNo</label>
                    <input type="text" name="contactno" class="form-control" ng-model="user.contactno"
                        placeholder="Your Contact No" ng-pattern="/^[789]\d{9}$/" maxlength="10">
                    <p ng-show="userForm.contactno.$error.pattern && (userForm.contactno.$dirty || submitted)"
                        class="help-block">Enter a valid contactno.</p>
                </div>

                <!-- COUNTRY -->
                <div class="form-group"
                    ng-class="{ 'has-error' : userForm.country.$invalid && (userForm.country.$dirty || submitted)}">
                    <label>Country</label>
                    <select name="country" class="form-control" ng-model="user.country"
                        ng-options="country.CountryId as country.Name for country in countryList" ng-required="true">
                        <option value=''>Select</option>
                    </select>
                    <p ng-show="userForm.country.$error.required && (userForm.country.$dirty || submitted)"
                        class="help-block">Select country.</p>
                </div>

                <!-- CITY -->
                <div class="form-group"
                    ng-class="{ 'has-error' : userForm.city.$invalid && (userForm.city.$dirty || submitted)}">
                    <label>City</label>
                    <select name="city" class="form-control" ng-model="user.city"
                        ng-options="city.CityId as city.Name for city in cityList" ng-required="true">
                        <option value=''>Select</option>
                    </select>
                    <p ng-show="userForm.city.$error.required && (userForm.city.$dirty || submitted)"
                        class="help-block">Select city.</p>
                </div>

                <!-- TERMS & CONDITIONS -->
                <div class="form-group"
                    ng-class="{ 'has-error' : userForm.terms.$invalid && (userForm.terms.$dirty || submitted)}">
                    <label>Accept Terms & Conditions</label>
                    <input type="checkbox" value="" name="terms" ng-model="user.terms" ng-required="true" />
                    <p ng-show="userForm.terms.$error.required && (userForm.terms.$dirty || submitted)"
                        class="help-block">Accept terms & conditions.</p>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
    <br />
</body>

</html>