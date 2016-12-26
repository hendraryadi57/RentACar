<?php

namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\Extra;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ExtraController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $extras = Extra::all();

        return new JsonResponse(compact('extras'), 200);
    }

    public function store()
    {
        $this->validate($this->request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $data = $this->request->all();
        $extra = new Extra();

        if( isset($data["id"]) &&  Extra::find($data["id"]) ){
            $extra = Extra::find($data["id"]);
        }

        $extra->title = $data["title"];
        $extra->description = $data["description"];
        $extra->price = $data["price"];

        $extra->save();
    }
}
