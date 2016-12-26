<?php

namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\Make;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class MakeController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $makes = Make::all();

        return new JsonResponse(compact('makes'), 200);
    }

    public function store()
    {
        $this->validate($this->request, [
            'make' => 'required'
        ]);

        $data = $this->request->all();

        $make = new Make();

        if( isset($data["id"]) &&  Make::find($data["id"]) ){
            $make = Make::find($data["id"]);
        }

        $make->make = $data["make"];

        $make->save();
    }
}
