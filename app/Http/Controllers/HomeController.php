<?php

namespace App\Http\Controllers;

use App;
use Artisan;
use Log;
use Session;
use App\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('home', compact('cars'));
    }

    public function reset()
    {
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');

        return redirect()->route('home');
    }

    public function contact()
    {
        return view('contact');
    }

    public function fleet()
    {
        $cars = Car::all();

        return view('fleet', compact('cars'));
    }

    public function getUserReservationsView()
    {
        return view('user.reservations');
    }

    public function changeLanguage($locale)
    {
        Session::set('locale', $locale);

        return back();
    }
}
