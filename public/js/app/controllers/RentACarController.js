(function(){

    var RentACarController = function($scope, RentACarService, $location, $timeout, $http, $window, Upload){
        
        // Reservation object
        $scope.reservation = {
            "pickupLocation": "",
            "returnLocation": "",
            
            "pickupDate": "",
            "returnDate": "",
            
            "pickupTimeH": "",
            "pickupTimeM": "",
            
            "returnTimeH": "",
            "returnTimeM": "",

            "selectedCar": {
                "pricePerDay": 0
            },
            "selectedCarID": -1,

            "totalPrice": 0,
            
            "arrayOfSelectedExtras": []

        };
        
        // All the variables used
        $scope.vars = {
            "addMake": {
                "make": ""
            },
            "addFuel": {
                "fuel": ""
            },
            "addExtra": {
                "title": "",
                "description": "",
                "price": 0
            },
            "addCity": {
                "city": "",
                "postcode": ""
            },
            "addClass": {

            },
            "addColor": "",
            "addBranch": {
                "name": "",
                "email": "",
                "phone": "",
                "address": "",
                "city": ""
            },
            "addModel": {
                "make": "",
                "model": ""
            },
            "addCar": {
                "make": "-",
                "model": "-",
                "fuel": "",
                "color": "",
                "class": "",
                "branch": "",
                "registration": "",
                "year": 0,
                "capacity": 0,
                "isAutomatic": false,
                "minAge": 0,
                "pricePerDay": 0
            },
            "car": true,
            "carClassSelect": "",
            "carGearboxSelect": false,
            "carTypeSelect": "",
            "client-data": true,
            "differentLocations": false,
            "extras": true,
            "firstStepValid": false,
            "isUserAuthenticated": 0,
            "priceWithoutExtras": 0,
            "priceForExtras": 0,
            "secondStepValid": false,
            "selectedCarID": -1,
            "showCompletedOrders": false,
            "time-place": true,
            "confirmedReservation": false
        };

        $scope.flashMessages = {
            "branchRequired": false,
            "cityRequired": false,
            "carRequired": false,
            "classRequired": false,
            "extraRequired": false,
            "fuelRequired": false,
            "makeRequired": false,
            "modelRequired": false
        };

        $scope.user = {};

        // Object that contains all the data received from services
        $scope.data = {
            "branches": [],
            "cars": [],
            "cities": [],
            "classes": [],
            "colors": [],
            "extras": [],
            "fuels": [],
            "locations": [],
            "makes": [],
            "models": [],
            "makeModels": [],
            "reservations": [],
            "types": []
        };

        $scope.email = {
            "email": "",
            "name": "",
            "message": ""
        };
        
        

        // Service
        $scope.service = RentACarService;

        $scope.sendEmail = function () {
            console.log($scope.email);
            if($scope.email.email.length > 0 && $scope.email.name.length > 0 && $scope.email.message.length > 0){
                console.log("a");
                $scope.service.sendEmail($scope.email)
                    .then(function (res) {
                        $scope.email.email = "";
                        $scope.email.name = "";
                        $scope.email.message = "";
                    }, function (err) {
                        console.log("Error");
                    })
            }
        };

        // Get all the types of the car from DB - Provided by a service
        $scope.getTypes = function () {
            $scope.data.types = $scope.service.getTypes();

            console.log($scope.data.types);
        };

        $scope.getClasses = function () {
            $scope.service.getClasses()
                .then(function (res) {
                    $scope.data.classes = res.data.types;
                }, function (err) {
                    console.log("Error");
                })
        };

        $scope.getExtras = function () {
            $scope.service.getExtras()
                .then(function (res) {
                    $scope.data.extras = res.data.extras;
                }, function (err) {
                    console.log("Error");
                })
        };

        $scope.getCities = function () {
            $scope.service.getCities()
                .then(function (res) {
                    $scope.data.cities = res.data.cities;
                }, function (err) {
                    console.log("Error");
                })
        };
        
        $scope.logging = function () {
            console.log($scope.vars.carGearboxSelect);
        };

        $scope.getCars = function () {
            $scope.service.getCars()
                .then(function (res) {
                    $scope.data.cars = res.data.cars;
                    console.log(res.data.cars);
                }, function (err) {
                    console.log("Error");
                })
        };
        
        $scope.getLocations = function () {
            $scope.data.locations = $scope.service.getLocations();
        };
        
        $scope.checkIfUserIsAuthenticated = function () {
            $scope.service.checkIfUserIsAuthenticated()
                .then(function (res) {
                    if(res.data != 0){
                        $scope.vars.isUserAuthenticated = 1;
                        $scope.user = res.data;
                    }
                    else{
                        $scope.vars.isUserAuthenticated = 0;
                    }
                }, function (err) {
                    console.log("Error");
                })
        };
        
        $scope.getMakes = function () {
            $scope.service.getMakes()
                .then(function (res) {
                    console.log(res.data);
                    $scope.data.makes = res.data.makes;
                }, function (err) {
                    console.log("Error");
                })
        };

        $scope.getFuels = function () {
            $scope.service.getFuels()
                .then(function (res) {
                    $scope.data.fuels = res.data.fuels;
                }, function (err) {
                    console.log("Error");
                })
        };

        $scope.getColors = function () {
            $scope.service.getColors()
                .then(function (res) {
                    $scope.data.colors = res.data.colors;
                }, function (err) {
                    console.log("Error");
                })
        };

        $scope.getBranches = function () {
            $scope.service.getBranches()
                .then(function (res) {
                    $scope.data.branches = res.data.branches;
                    console.log(res.data);
                }, function (err) {
                    console.log("Error");
                })
        };

        $scope.getModels = function () {
            $scope.service.getModels()
                .then(function (res) {
                    console.log(res.data.models);
                    $scope.data.models = res.data.models;
                    for(var i = 0; i < $scope.data.models.length; i++){
                        $scope.data.makeModels.push($scope.data.models[i].make + " " + $scope.data.models[i].model );
                    }
                    console.log($scope.data.makeModels);
                }, function (err) {
                    console.log("Error");
                })
        };

        // Functions running on page load
        $scope.init = function () {
            $scope.getLocations();
            $scope.getMakes();
            $scope.getFuels();
            $scope.getExtras();
            $scope.getCities();
            $scope.getColors();
            $scope.getBranches();
            $scope.getModels();
            $scope.initHours();
            $scope.getTypes();
            $scope.getClasses();
            $scope.getCars();
            $scope.checkIfUserIsAuthenticated();
        };


        $scope.confirmReservation = function (id) {
            console.log(id);
            $scope.service.confirmReservation(id)
                .then(function (res) {
                }, function (err) {
                    console.log("Error");
                });
            $scope.getReservations();
        };
        
        $scope.carDelivered = function (id) {
            $scope.service.carDelivered(id)
                .then(function (res) {
                }, function (err) {
                    console.log("Error");
                });
            $scope.getReservations();
        };
        
        $scope.carReturned = function (id) {
            $scope.service.carReturned(id)
                .then(function (res) {
                }, function (err) {
                    console.log("Error");
                });
            $scope.getReservations();
        };

        $scope.setLocations = function () {
            
            if(!$scope.vars.differentLocations){
                $scope.returnLocation = $scope.pickupLocation;
            }

            $scope.reservation.pickupLocation = $scope.pickupLocation;
            $scope.reservation.returnLocation = $scope.returnLocation;

            console.log($scope.reservation.pickupLocation);
            console.log($scope.reservation.returnLocation);
            
            isFirstStepValid();
        };
        
        $scope.initHours = function () {
            var pickupHour = new Date().getHours();

            $scope.reservation.pickupTimeH = (pickupHour + 1).toString();
            $scope.reservation.returnTimeH = (pickupHour + 2).toString();

            $scope.reservation.pickupTimeM = "00";
            $scope.reservation.returnTimeM = "00";
        };
        
        $scope.timeDateChange = function () {
            var date1 = $scope.reservation.pickupDate.split(". ");
            var date2 = $scope.reservation.returnDate.split(". ");

            var d1 = new Date(date1[1] + "/" + date1[0] + "/" + date1[2]);
            var d2 = new Date(date2[1] + "/" + date2[0] + "/" + date2[2]);

            var tomorrow = new Date();
            tomorrow.setDate((new Date()).getDate()+1);
            tomorrow.setHours(0);
            tomorrow.setMinutes(0);
            tomorrow.setSeconds(0);
            tomorrow.setMilliseconds(0);

            var today = new Date();
            var th = today.getHours();
            var tm = today.getMinutes();

            if(d1.getTime() === d2.getTime()){

                if(d2.getTime() === tomorrow.getTime()){
                    if(parseInt($scope.reservation.pickupTimeH) < th){
                        $scope.reservation.pickupTimeH = th.toString();
                    }
                    if(parseInt($scope.reservation.pickupTimeH) == th){
                        if(parseInt($scope.reservation.pickupTimeM) < tm){
                            $scope.reservation.pickupTimeM = "00";
                            if(tm <= 15 && tm > 0){
                                $scope.reservation.pickupTimeM = "15";
                            }
                            if(tm <= 30 && tm > 15){
                                $scope.reservation.pickupTimeM = "30";
                            }
                            if(tm <= 45 && tm > 30){
                                $scope.reservation.pickupTimeM = "45";
                            }
                            if(tm > 45){
                                $scope.reservation.pickupTimeM = "00";
                                $scope.reservation.pickupTimeH = (parseInt($scope.reservation.pickupTimeH) + 1).toString();
                            }
                        }
                    }
                }

                if(parseInt($scope.reservation.pickupTimeH) >= parseInt($scope.reservation.returnTimeH)){
                    $scope.reservation.returnTimeH = (parseInt($scope.reservation.pickupTimeH) + 1).toString();
                }

                if((parseInt($scope.reservation.returnTimeH) - parseInt($scope.reservation.pickupTimeH)) === 1){
                    if(parseInt($scope.reservation.pickupTimeM) > parseInt($scope.reservation.returnTimeM)){
                        $scope.reservation.returnTimeM = $scope.reservation.pickupTimeM;
                    }
                    $scope.reservation.returnTimeH = (parseInt($scope.reservation.pickupTimeH) + 1).toString();
                }
            }

            $scope.updatePrice();

            isFirstStepValid();
        };
        
        $scope.updatePrice = function () {
            var date1 = $scope.reservation.pickupDate.split(". ");
            var date2 = $scope.reservation.returnDate.split(". ");

            var d1 = new Date(date1[2], date1[1], date1[0], $scope.reservation.pickupTimeH, $scope.reservation.pickupTimeM);
            var d2 = new Date(date2[2], date2[1], date2[0], $scope.reservation.returnTimeH, $scope.reservation.returnTimeM);

            var numberOfDays = Math.ceil(Math.abs(d2 - d1) / 36e5 / 24);
            
            $scope.vars.priceWithoutExtras = numberOfDays * $scope.reservation.selectedCar.pricePerDay;


            $scope.vars.priceForExtras = 0;
            if($scope.reservation.arrayOfSelectedExtras.length > 0){
                $scope.reservation.arrayOfSelectedExtras.forEach(loopThroughArrayOfExtras);
            }


            $scope.reservation.totalPrice = $scope.vars.priceWithoutExtras + $scope.vars.priceForExtras;
            console.log($scope.reservation);
        };
        
        var loopThroughArrayOfExtras = function (element, index, array) {
            var result = $.grep($scope.data.extras, function(e){ return e.id == element; });
            var tmpPrice = result[0].price;
            $scope.vars.priceForExtras = $scope.vars.priceForExtras + tmpPrice;
        };

        $scope.setSelected = function (carID) {

            $scope.reservation.selectedCarID = carID;
            var result = $.grep($scope.data.cars, function(e){ return e.id == carID; });
            $scope.reservation.selectedCar = result[0];

            $scope.updatePrice();

            isSecondStepValid();
        };
        
        $scope.setSelectedExtras = function (extrasID) {

            if($scope.reservation.arrayOfSelectedExtras.indexOf(extrasID) !== -1){
                var index = $scope.reservation.arrayOfSelectedExtras.indexOf(extrasID);
                if (index > -1) {
                    $scope.reservation.arrayOfSelectedExtras.splice(index, 1);
                }
            }
            else{
                $scope.reservation.arrayOfSelectedExtras.push(extrasID);
            }

            $scope.updatePrice();
        };
        
        var isFirstStepValid = function () {
            if($scope.vars.isUserAuthenticated && $scope.reservation.pickupLocation && $scope.reservation.returnLocation && $scope.reservation.pickupDate && $scope.reservation.returnDate && $scope.reservation.pickupTimeH && $scope.reservation.pickupTimeM && $scope.reservation.returnTimeH && $scope.reservation.returnTimeM){
                $scope.vars.firstStepValid = true;
            }
            else{
                $scope.vars.firstStepValid = false;
            }
        };
        
        var isSecondStepValid = function () {
            if($scope.reservation.selectedCarID > -1){
                $scope.vars.secondStepValid = true;
            }
            else{
                $scope.vars.secondStepValid = false;
            }
        };
        
        $scope.saveReservation = function () {
            $scope.service.saveReservation($scope.reservation)
                .then(function (res) {
                    $scope.vars.confirmedReservation = true;
                }, function (err) {
                })
        };
        
        $scope.getUserReservations = function () {
            $scope.service.getUserReservations()
                .then(function (res) {
                    $scope.data.userReservations = res.data;
                }, function (err) {
                    console.log("Error");
                });
        };


        $scope.$on('LastRepeaterElement', function(){
            jQuery('[data-toggle="popover"]').popover();
        });

        $scope.getReservations = function () {
            $scope.service.getReservations()
                .then(function (res) {
                    $scope.data.reservations = res.data.reservations;
                }, function (err) {
                    console.log("Error");
                });
        };

        /*
        *   Functions for sending stuff to endpoints
        * */
        $scope.addBranch = function () {
            if(
                $scope.vars.addBranch.name &&
                $scope.vars.addBranch.email &&
                $scope.vars.addBranch.phone &&
                $scope.vars.addBranch.address &&
                $scope.vars.addBranch.city &&
                $scope.vars.addBranch.city !== "-"
            ){
                $scope.service.addBranch({
                    name: $scope.vars.addBranch.name,
                    email: $scope.vars.addBranch.email,
                    phone: $scope.vars.addBranch.phone,
                    address: $scope.vars.addBranch.address,
                    city: $scope.vars.addBranch.city,
                    id:$scope.vars.addBranch.id
                })
                    .then(function (res) {
                        $scope.vars.addBranch = {};
                        $scope.getBranches();
                    }, function (err) {
                        console.log("Error");
                    })
            }
            else{
                $scope.flashMessages.branchRequired = true;
                $timeout(function() {
                    $scope.flashMessages.branchRequired = false;
                }, 5000);
            }
        };

        $scope.addCar = function () {
            if(
                $scope.vars.addCar.make &&
                ($scope.vars.addCar.make !== "-") &&
                $scope.vars.addCar.model &&
                ($scope.vars.addCar.model !== "-") &&
                $scope.vars.addCar.fuel &&
                ($scope.vars.addCar.fuel !== "-") &&
                $scope.vars.addCar.class &&
                ($scope.vars.addCar.class !== "-") &&
                $scope.vars.addCar.branch &&
                ($scope.vars.addCar.branch !== "-") &&
                $scope.vars.addCar.isAutomatic &&
                ($scope.vars.addCar.isAutomatic !== "-") &&
                $scope.vars.addCar.registration &&
                $scope.vars.addCar.capacity &&
                $scope.vars.addCar.minAge &&
                $scope.vars.addCar.pricePerDay
            ) {
                Upload.upload({
                    url: '../../../api/cars',
                    data: {
                        file: $scope.vars.file,
                        car: $scope.vars.addCar
                    }

                }).then(function (resp) {
                    console.log('Success ');
                    $scope.vars.addCar = {};
                    $scope.getCars();
                }, function (resp) {
                    console.log('Error status: ');
                    $timeout(function () {
                        $scope.flashMessages.required = true;
                    }, 5000);
                }, function (evt) {
                });
            }
            else{
                $scope.flashMessages.carRequired = true;
                $timeout(function() {
                    $scope.flashMessages.carRequired = false;
                }, 5000);
            }
        };

        $scope.addCity = function () {
            if(
                $scope.vars.addCity.city &&
                $scope.vars.addCity.postcode
            ) {
                $scope.service.addCity({
                    city: $scope.vars.addCity.city,
                    postcode: $scope.vars.addCity.postcode,
                    id: $scope.vars.addCity.id
                })
                    .then(function (res) {
                        $scope.vars.addCity = {};
                        $scope.getCities();
                    }, function (err) {
                        console.log("Error");
                    })
            }
            else{
                $scope.flashMessages.cityRequired = true;
                $timeout(function() {
                    $scope.flashMessages.cityRequired = false;
                }, 5000);
            }
        };

        $scope.addClass = function () {
            if(
                $scope.vars.addClass
            ) {
                $scope.service.addClass({
                    id: $scope.vars.addClass.id,
                    type: $scope.vars.addClass.class
                })
                    .then(function (res) {
                        $scope.vars.addClass = {};
                        $scope.getClasses();
                    }, function (err) {
                        console.log("Error");
                    })
            }
            else{
                $scope.flashMessages.classRequired = true;
                $timeout(function() {
                    $scope.flashMessages.classRequired = false;
                }, 5000);
            }
        };

        $scope.addColor = function () {
            $scope.service.addColor({
                id: $scope.vars.addColor.id,
                color: $scope.vars.addColor.color
            })
                .then(function (res) {
                    $scope.vars.addColor = "";
                    $scope.getColors();
                }, function (err) {
                    console.log("Error");
                })
        };

        $scope.addExtra = function () {
            if(
                $scope.vars.addExtra.title &&
                $scope.vars.addExtra.description &&
                $scope.vars.addExtra.price &&
                $scope.vars.addExtra.price != 0
            ) {
                $scope.service.addExtra({
                    title: $scope.vars.addExtra.title,
                    description: $scope.vars.addExtra.description,
                    price: $scope.vars.addExtra.price,
                    id: $scope.vars.addExtra.id
                })
                    .then(function (res) {
                        $scope.vars.addExtra = {};
                        $scope.getExtras();
                    }, function (err) {
                        console.log("Error");
                    })
            }
            else{
                $scope.flashMessages.extraRequired = true;
                $timeout(function() {
                    $scope.flashMessages.extraRequired = false;
                }, 5000);
            }
        };

        $scope.addFuel = function () {
            if(
                $scope.vars.addFuel
            ) {
                $scope.service.addFuel({
                    fuel: $scope.vars.addFuel.fuel,
                    id: $scope.vars.addFuel.id
                })
                    .then(function (res) {
                        $scope.vars.addFuel = {};
                        $scope.getFuels();
                    }, function (err) {
                        console.log("Error");
                    })
            }
            else{
                $scope.flashMessages.fuelRequired = true;
                $timeout(function() {
                    $scope.flashMessages.fuelRequired = false;
                }, 5000);
            }
        };

        $scope.addMake = function () {
            if(
                $scope.vars.addMake
            ) {
                $scope.service.addMake($scope.vars.addMake)
                    .then(function (res) {
                        $scope.vars.addMake = {};
                        $scope.getMakes();
                    }, function (err) {
                        console.log("Error");
                    })
            }
            else{
                $scope.flashMessages.makeRequired = true;
                $timeout(function() {
                    $scope.flashMessages.makeRequired = false;
                }, 5000);
            }
        };

        $scope.addModel = function () {
            if(
                $scope.vars.addModel.model &&
                $scope.vars.addModel.make &&
                $scope.vars.addModel.make != "-"
            ) {
                console.log($scope.vars.addModel);
                $scope.service.addModel({
                    make: $scope.vars.addModel.make,
                    model: $scope.vars.addModel.model,
                    id: $scope.vars.addModel.id
                })
                    .then(function (res) {
                        $scope.vars.addModel = {};
                        $scope.getModels();
                    }, function (err) {
                        console.log("Error");
                    })
            }
            else{
                $scope.flashMessages.modelRequired = true;
                $timeout(function() {
                    $scope.flashMessages.modelRequired = false;
                }, 5000);
            }
        };

        $scope.editCity = function (id) {
            var city = $.grep($scope.data.cities, function(e){ return e.id == id; })[0];
            $scope.vars.addCity.id = city.id;
            $scope.vars.addCity.city = city.city;
            $scope.vars.addCity.postcode = city.postcode;
        };

        $scope.editBranch = function (id) {
            var branch = $.grep($scope.data.branches, function(e){ return e.id == id; })[0];
            $scope.vars.addBranch.id = branch.id;
            $scope.vars.addBranch.name = branch.name;
            $scope.vars.addBranch.email = branch.email;
            $scope.vars.addBranch.phone = branch.phone;
            $scope.vars.addBranch.address = branch.address;
            $scope.vars.addBranch.city = branch.city;
        };

        $scope.editCar = function (id) {
            var car = $.grep($scope.data.cars, function(e){ return e.id == id; })[0];

            if(car.isAutomatic == 1){
                $scope.vars.addCar.isAutomatic = "true";
            }
            if(car.isAutomatic == 0){
                $scope.vars.addCar.isAutomatic = "false";
            }

            $scope.vars.addCar.id = car.id;
            $scope.vars.addCar.make = car.make;
            $scope.vars.addCar.model = car.model;
            $scope.vars.addCar.fuel = car.fuel;
            $scope.vars.addCar.class = car.class;
            $scope.vars.addCar.branch = car.branch;
            $scope.vars.addCar.registration = car.registration;
            $scope.vars.addCar.capacity = car.capacity;
            $scope.vars.addCar.minAge = car.minAge;
            $scope.vars.addCar.pricePerDay = car.pricePerDay;
        };

        $scope.editClass = function (id) {
            var klasa = $.grep($scope.data.classes, function(e){ return e.id == id; })[0];

            $scope.vars.addClass.id = klasa.id;
            $scope.vars.addClass.class = klasa.class;
        };
        
        $scope.editExtra = function (id) {
            var extra = $.grep($scope.data.extras, function(e){ return e.id == id; })[0];

            $scope.vars.addExtra.id = extra.id;
            $scope.vars.addExtra.title = extra.title;
            $scope.vars.addExtra.description = extra.description;
            $scope.vars.addExtra.price = extra.price;
        };
        
        $scope.editFuel = function (id) {
            var fuel = $.grep($scope.data.fuels, function(e){ return e.id == id; })[0];

            $scope.vars.addFuel.id = fuel.id;
            $scope.vars.addFuel.fuel = fuel.fuel;
        };
        
        $scope.editMake = function (id) {
            var make = $.grep($scope.data.makes, function(e){ return e.id == id; })[0];

            $scope.vars.addMake.id = make.id;
            $scope.vars.addMake.make = make.make;
        };
        
        $scope.editModel = function (id) {
            var model = $.grep($scope.data.models, function(e){ return e.id == id; })[0];

            $scope.vars.addModel.id = model.id;
            $scope.vars.addModel.make = model.make;
            $scope.vars.addModel.model = model.model;
        };
        
        $scope.calculateEuros = function (x) {
            return Math.floor(x / 7.6);
        };

        $scope.copyCar = function (id) {
            var car = $.grep($scope.data.cars, function(e){ return e.id == id; })[0];

            if(car.isAutomatic == 1){
                $scope.vars.addCar.isAutomatic = "true";
            }
            if(car.isAutomatic == 0){
                $scope.vars.addCar.isAutomatic = "false";
            }

            $scope.vars.addCar.id = -1;
            $scope.vars.addCar.make = car.make;
            $scope.vars.addCar.model = car.model;
            $scope.vars.addCar.fuel = car.fuel;
            $scope.vars.addCar.class = car.class;
            $scope.vars.addCar.branch = car.branch;
            $scope.vars.addCar.registration = car.registration;
            $scope.vars.addCar.capacity = car.capacity;
            $scope.vars.addCar.minAge = car.minAge;
            $scope.vars.addCar.pricePerDay = car.pricePerDay;
        };
    };

    angular.module("rentACarApp")
        .controller('RentACarController', ['$scope', 'RentACarService', '$location', '$timeout', '$http', '$window', 'Upload',  RentACarController]);

}());