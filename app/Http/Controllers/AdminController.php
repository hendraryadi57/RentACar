<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function getData()
    {
        return view('admin.data');
    }

    public function getCarsView()
    {
        return view('admin.cars');
    }
    
    public function getMakesModelsView()
    {
        return view('admin.makes');
    }

    public function getBranchesCitiesView()
    {
        return view('admin.branches');
    }
    
    public function getFuelsView()
    {
        return view('admin.fuels');
    }
    
    public function getExtrasView()
    {
        return view('admin.extras');
    }
    
    public function getClassesView()
    {
        return view('admin.classes');
    }
    
    public function getReservationsView()
    {
        return view("admin.reservations");
    }
}
