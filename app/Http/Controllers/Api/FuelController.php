<?php

namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\Fuel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class FuelController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $fuels = Fuel::all();

        return new JsonResponse(compact('fuels'), 200);
    }

    public function store()
    {
        $this->validate($this->request, [
            'fuel' => 'required'
        ]);

        $data = $this->request->all();
        $fuel = new Fuel();

        if( isset($data["id"]) &&  Fuel::find($data["id"]) ){
            $fuel = Fuel::find($data["id"]);
        }

        $fuel->fuel = $data["fuel"];

        $fuel->save();
    }
}
