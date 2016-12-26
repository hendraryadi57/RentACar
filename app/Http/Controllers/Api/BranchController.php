<?php

namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\Branch;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $branches = DB::table('branches')
            ->join('cities', 'branches.city_id', '=', 'cities.id')
            ->select(
                'branches.*',
                'cities.city AS city'
            )
            ->get();

        return new JsonResponse(compact('branches'), 200);
    }

    public function store()
    {
        $this->validate($this->request, [
            'city' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $data = $this->request->all();
        $branch = new Branch();

        if( isset($data["id"]) && Branch::find($data["id"]) ){
            $branch = Branch::find($data["id"]);
        }

        $branch->city_id = City::where('city', '=', $data["city"])->first()->id;
        $branch->name = $data["name"];
        $branch->email = $data["email"];
        $branch->address = $data["address"];
        $branch->phone = $data["phone"];

        $branch->save();
    }
}
