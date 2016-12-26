<?php

namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\Color;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $colors = Color::all();

        return new JsonResponse(compact('colors'), 200);
    }

    public function store()
    {
        $this->validate($this->request, [
            'color' => 'required'
        ]);

        $data = $this->request->all();
        $color = new Color();

        if( isset($data["id"]) && Color::find($data["id"]) ){
            $color = Color::find($data["id"]);
        }

        $color->color = $data["color"];

        $color->save();
    }
}
