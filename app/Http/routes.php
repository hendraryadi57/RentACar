<?php

// Routes that can be access by admins
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    // Routes that return Views go through Locale middleware
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
        'uses' => 'ApiController@getReservations'
    ]);

    Route::post('/api/reservations/confirm', [
        'as' => 'confirmReservation',
        'uses' => 'ApiController@confirmReservation'
    ]);

    Route::post('/api/reservations/deliver', [
        'as' => 'carDelivered',
        'uses' => 'ApiController@carDelivered'
    ]);

    Route::post('/api/reservations/returned', [
        'as' => 'carReturned',
        'uses' => 'ApiController@carReturned'
    ]);

});


Route::group(['middleware' => 'auth'], function () {
    
    Route::post('/api/reservation/save', [
        'as' => 'reservationSave',
        'uses' => 'ApiController@reservationSave'
    ]);

    Route::get('/api/users/reservations', [
        'as' => 'getUserReservations',
        'uses' => 'ApiController@getUserReservations'
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
    'uses' => 'ApiController@getMakes'
]);

Route::get('/api/fuels', [
    'as' => 'getFuels',
    'uses' => 'ApiController@getFuels'
]);

Route::get('/api/extras', [
    'as' => 'getExtras',
    'uses' => 'ApiController@getExtras'
]);

Route::get('/api/cities', [
    'as' => 'getCities',
    'uses' => 'ApiController@getCities'
]);

Route::get('/api/classes', [
    'as' => 'getClasses',
    'uses' => 'ApiController@getClasses'
]);

Route::get('/api/colors', [
    'as' => 'getColors',
    'uses' => 'ApiController@getColors'
]);

Route::get('/api/branches', [
    'as' => 'getBranches',
    'uses' => 'ApiController@getBranches'
]);

Route::get('/api/models', [
    'as' => 'getModels',
    'uses' => 'ApiController@getModels'
]);

Route::get('/api/cars', [
    'as' => 'getCars',
    'uses' => 'ApiController@getCars'
]);

Route::post('/api/makes/add', [
    'as' => 'addMake',
    'uses' => 'ApiController@addMake'
]);

Route::post('/api/fuels/add', [
    'as' => 'addFuel',
    'uses' => 'ApiController@addFuel'
]);

Route::post('/api/extras/add', [
    'as' => 'addExtra',
    'uses' => 'ApiController@addExtra'
]);

Route::post('/api/cities/add', [
    'as' => 'addCity',
    'uses' => 'ApiController@addCity'
]);

Route::post('/api/classes/add', [
    'as' => 'addClass',
    'uses' => 'ApiController@addClass'
]);

Route::post('/api/colors/add', [
    'as' => 'addColor',
    'uses' => 'ApiController@addColor'
]);

Route::post('/api/branches/add', [
    'as' => 'addBranch',
    'uses' => 'ApiController@addBranch'
]);

Route::post('/api/models/add', [
    'as' => 'addModel',
    'uses' => 'ApiController@addModel'
]);

Route::post('/api/cars/add', [
    'as' => 'addCar',
    'uses' => 'ApiController@addCar'
]);

Route::post('/api/email/send', [
    'as' => 'sendEmail',
    'uses' => 'ApiController@sendEmail'
]);
