<?php

namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\Branch;
use App\Car;
use App\CarModel;
use App\City;
use App\Color;
use App\Extra;
use App\Fuel;
use App\Make;
use App\Reservation;
use App\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $cities = City::all();

        return new JsonResponse(compact('cities'), 200);
    }

    public function store()
    {
        $this->validate($this->request, [
            'city' => 'required',
            'postcode' => 'required'
        ]);

        $data = $this->request->all();
        $city = new City();

        if( isset($data["id"]) && City::find($data["id"]) ){
            $city = City::find($data["id"]);
        }

        $city->city = $data["city"];
        $city->postcode = $data["postcode"];

        $city->save();
    }
}
