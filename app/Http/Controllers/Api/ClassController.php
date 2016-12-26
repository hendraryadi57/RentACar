<?php

namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $types = Type::all();

        return new JsonResponse(compact('types'), 200);
    }

    public function store()
    {
        $this->validate($this->request, [
            'type' => 'required'
        ]);

        $data = $this->request->all();
        $type = new Type();

        if( isset($data["id"]) && Type::find($data["id"]) ){
            $type = Type::find($data["id"]);
        }

        $type->class = $data["type"];

        $type->save();
    }
}
