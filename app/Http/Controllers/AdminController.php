<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminController extends Controller
{
    public function getData(Request $request){


        return view('admin.data');
    }

    public function getCarsView(Request $request){


        return view('admin.cars');
    }
    
    public function getMakesModelsView(Request $request){


        return view('admin.makes');
    }

    public function getBranchesCitiesView(Request $request){


        return view('admin.branches');
    }
    
    public function getFuelsView(Request $request){


        return view('admin.fuels');
    }
    
    public function getExtrasView(Request $request){
        return view('admin.extras');
    }
    
    public function getClassesView(Request $request){
        return view('admin.classes');
    }
    
    public function getReservationsView(){
        return view("admin.reservations");
    }
}
