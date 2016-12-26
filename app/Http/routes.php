<?php

// Routes that can only be accessed by Administrators
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {

    // These routes should go through Locale middleware
    Route::group(['middleware' => 'locale'], function () {

        Route::get('/', function () {
            return view('admin.admin');
        });

        Route::get('/cars', [
            'as' => 'getCarsView',
            'uses' => 'AdminController@getCarsView'
        ]);

        Route::get('/makes', [
            'as' => 'getMakesModelsView',
            'uses' => 'AdminController@getMakesModelsView'
        ]);

        Route::get('/branches', [
            'as' => 'getBranchesCitiesView',
            'uses' => 'AdminController@getBranchesCitiesView'
        ]);

        Route::get('/fuels', [
            'as' => 'getFuelsView',
            'uses' => 'AdminController@getFuelsView'
        ]);

        Route::get('/extras', [
            'as' => 'getExtrasView',
            'uses' => 'AdminController@getExtrasView'
        ]);

        Route::get('/classes', [
            'as' => 'getClassesView',
            'uses' => 'AdminController@getClassesView'
        ]);

        Route::get('/reservations', [
            'as' => 'getReservationsView',
            'uses' => 'AdminController@getReservationsView'
        ]);

        Route::get('/data', [
            'as' => 'getData',
            'uses' => 'AdminController@getData'
        ]);
    });

    Route::get('/api/reservations', [
        'as' => 'getReservations',
        'uses' => 'Api\ReservationController@index'
    ]);

    Route::post('/api/reservations/confirm', [
        'as' => 'confirmReservation',
        'uses' => 'Api\ReservationController@confirmReservation'
    ]);

    Route::post('/api/reservations/deliver', [
        'as' => 'carDelivered',
        'uses' => 'Api\ReservationController@carDelivered'
    ]);

    Route::post('/api/reservations/returned', [
        'as' => 'carReturned',
        'uses' => 'Api\ReservationController@carReturned'
    ]);
});


Route::group(['middleware' => 'auth'], function () {
    
    Route::post('/api/reservation/save', [
        'as' => 'reservationSave',
        'uses' => 'Api\UserReservationController@store'
    ]);

    Route::get('/api/users/reservations', [
        'as' => 'getUserReservations',
        'uses' => 'Api\UserReservationController@index'
    ]);

    Route::group(['middleware' => 'locale'], function () {
        Route::get('/reservations', [
            'as' => 'getUserReservationsView',
            'uses' => 'HomeController@getUserReservationsView'
        ]);
    });


});


Route::group(['middleware' => 'locale'], function () {
    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);

    Route::get('/reset', [
        'as' => 'reset',
        'uses' => 'HomeController@reset'
    ]);

    Route::get('/fleet', [
        'as' => 'fleet',
        'uses' => 'HomeController@fleet'
    ]);

    Route::get('/contact', [
        'as' => 'contact',
        'uses' => 'HomeController@contact'
    ]);
    
    Route::get('/home', 'HomeController@index');

    Route::auth();
});

Route::get('/settings/lang/{id}', [
    'as' => 'changeLanguage',
    'uses' => 'HomeController@changeLanguage'
]);

Route::get('/api/authenticated', [
    'as' => 'checkIfUserIsAuthenticated',
    'uses' => 'ApiController@authenticated'
]);

Route::get('/api/makes', [
    'as' => 'getMakes',
    'uses' => 'Api\MakeController@index'
]);

Route::get('/api/fuels', [
    'as' => 'getFuels',
    'uses' => 'Api\FuelController@index'
]);

Route::get('/api/extras', [
    'as' => 'getExtras',
    'uses' => 'Api\ExtraController@index'
]);

Route::get('/api/cities', [
    'as' => 'getCities',
    'uses' => 'Api\CityController@index'
]);

Route::get('/api/classes', [
    'as' => 'getClasses',
    'uses' => 'Api\ClassController@index'
]);

Route::get('/api/colors', [
    'as' => 'getColors',
    'uses' => 'Api\ColorController@index'
]);

Route::get('/api/branches', [
    'as' => 'getBranches',
    'uses' => 'Api\BranchController@index'
]);

Route::get('/api/models', [
    'as' => 'getModels',
    'uses' => 'Api\ModelController@index'
]);

Route::get('/api/cars', [
    'as' => 'getCars',
    'uses' => 'Api\CarController@index'
]);

Route::post('/api/makes', [
    'as' => 'addMake',
    'uses' => 'Api\MakeController@store'
]);

Route::post('/api/fuels', [
    'as' => 'addFuel',
    'uses' => 'Api\FuelController@store'
]);

Route::post('/api/extras', [
    'as' => 'addExtra',
    'uses' => 'Api\ExtraController@store'
]);

Route::post('/api/cities', [
    'as' => 'addCity',
    'uses' => 'Api\CityController@store'
]);

Route::post('/api/classes', [
    'as' => 'addClass',
    'uses' => 'Api\ClassController@store'
]);

Route::post('/api/colors', [
    'as' => 'addColor',
    'uses' => 'Api\ColorController@store'
]);

Route::post('/api/branches', [
    'as' => 'addBranch',
    'uses' => 'Api\BranchController@store'
]);

Route::post('/api/models', [
    'as' => 'addModel',
    'uses' => 'Api\ModelController@store'
]);

Route::post('/api/cars', [
    'as' => 'addCar',
    'uses' => 'Api\CarController@store'
]);

Route::post('/api/email/send', [
    'as' => 'sendEmail',
    'uses' => 'ApiController@sendEmail'
]);
