(function(){
    
    var RentACarService = function($http, $q, $window, $location){

        var service = {};

        var locations = [
            "Zagreb",
            "Rijeka",
            "Split",
            "Dubrovnik"
        ];

        var types = [
            "Limousine",
            "Coupe",
            "Cabriolet"
        ];

        var cars = [
            {
                "id": 0,
                "make": "Audi",
                "model": "A8",
                "pricePerDay": 200,
                "class": "Premium",
                "isAutomatic": true,
                "img": ""
            },
            {
                "id": 1,
                "make": "Mercedes",
                "model": "C200",
                "pricePerDay": 50,
                "class": "Srednja",
                "isAutomatic": false,
                "img": ""
            },
            {
                "id": 2,
                "make": "VW",
                "model": "Passat CC",
                "pricePerDay": 80,
                "class": "Srednja",
                "isAutomatic": true,
                "img": ""
            },
            {
                "id": 3,
                "make": "Mazda",
                "model": "2",
                "pricePerDay": 30,
                "class": "Compact",
                "isAutomatic": false,
                "img": ""
            }
        ];

        var extras = [
            {
                "id": 0,
                "title": "Perk 1",
                "desc": "Perk 1 Desc",
                "price": 100
            },
            {
                "id": 1,
                "title": "Perk 2",
                "desc": "Perk 2 Desc",
                "price": 400
            },
            {
                "id": 2,
                "title": "Perk 3",
                "desc": "Perk 3 Desc",
                "price": 200
            },
            {
                "id": 3,
                "title": "Perk 4",
                "desc": "Perk 4 Desc",
                "price": 300
            }
        ];


        service.getTypes = function(){
            return types;
        };

        service.getClasses = function(){
            var defer = $q.defer();
            $http({
                method: 'GET',
                url:  '../../../api/classes'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.getBranches = function(){
            var defer = $q.defer();
            $http({
                method: 'GET',
                url:  '../../../api/branches'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.getCars = function () {
            var defer = $q.defer();
            $http({
                method: 'GET',
                url:  '../../../api/cars'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        service.getExtras = function () {
            var defer = $q.defer();
            $http({
                method: 'GET',
                url:  '../../../api/extras'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        service.getLocations = function () {
            return locations;
        };

        service.checkIfUserIsAuthenticated = function () {
            var defer = $q.defer();

            $http({
                method: 'GET',
                url:  '../../../api/authenticated'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {
                
            });

            return defer.promise;
        };

        service.getMakes = function () {
            var defer = $q.defer();
            $http({
                method: 'GET',
                url:  '../../../api/makes'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        service.getFuels = function () {
            var defer = $q.defer();
            $http({
                method: 'GET',
                url:  '../../../api/fuels'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        service.getCities = function () {
            var defer = $q.defer();
            $http({
                method: 'GET',
                url:  '../../../api/cities'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        service.getColors = function () {
            var defer = $q.defer();
            $http({
                method: 'GET',
                url:  '../../../api/colors'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        service.getModels = function () {
            var defer = $q.defer();
            $http({
                method: 'GET',
                url:  '../../../api/models'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.getUserReservations = function () {
            var defer = $q.defer();
            $http({
                method: 'GET',
                url:  '../../../api/users/reservations'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.getReservations = function () {
            var defer = $q.defer();
            $http({
                method: 'GET',
                url:  '../../../admin/api/reservations'
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        service.confirmReservation = function (id) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../admin/api/reservations/confirm',
                data: {id: id}
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.carDelivered = function (id) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../admin/api/reservations/deliver',
                data: {id: id}
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.carReturned = function (id) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../admin/api/reservations/returned',
                data: {id: id}
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.addMake = function (make) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../api/makes',
                data: {
                    'make': make.make,
                    'id': make.id
                }
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        service.addFuel = function (fuel) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../api/fuels',
                data: fuel
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.addExtra = function (extra) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../api/extras',
                data: extra
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        service.addCity = function (city) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../api/cities',
                data: city
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.removeCity = function (id) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../admin/api/cities/remove',
                data: {id: id}
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.addClass = function (type) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../api/classes',
                data: type
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.addColor = function (color) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../api/colors',
                data: color
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.addBranch = function (branch) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../api/branches',
                data: branch
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };
        
        service.addModel = function (model) {
            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../api/models',
                data: model
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        service.addCar = function (car, file) {
            var fd = new FormData();
            fd.append('file', file);

            var obj = {
                "car": car,
                "fd": fd
            };

            var defer = $q.defer();
            $http({
                method: 'POST',
                url:  '../../../api/cars',
                data: obj
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        service.saveReservation = function (reservation) {
            var defer = $q.defer();

            $http({
                method: 'POST',
                url: '../api/reservation/save',
                data: reservation
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {
                
            });

            return defer.promise;
        };

        service.sendEmail = function (email) {
            var defer = $q.defer();

            $http({
                method: 'POST',
                url: '../api/email/send',
                data: email
            }).then(function successCallback(response) {
                defer.resolve(response);
            }, function errorCallback(response) {

            });

            return defer.promise;
        };

        return service;
    };

    angular.module("rentACarApp")
        .service('RentACarService', ['$http', '$q', '$window', '$location', RentACarService]);

}());