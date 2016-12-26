<?php

namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\City;
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
