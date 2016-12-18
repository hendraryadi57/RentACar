<?php

namespace App\Http\Controllers;

use App;
use Artisan;
use Log;
use Session;
use App\Car;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('home', ['cars' => $cars]);
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

        return view('fleet', ['cars' => $cars]);
    }

    public function getUserReservationsView(Request $request){
        return view('user.reservations');
    }

    public function changeLanguage($locale){


        if(Session::get('locale') != "en" && Session::get('locale') != "hr"){
            Session::set('locale', 'en');
        }

        if($locale == "en"){
            Session::set('locale', 'en');
        }
        if($locale == "hr"){
            Session::set('locale', 'hr');
        }



        # redirect back to the page we came from
        return redirect()->back();
    }
}
