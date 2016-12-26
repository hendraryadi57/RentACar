<?php

namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\CarModel;
use App\Make;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $models = DB::table('models')
            ->join('makes', 'models.make_id', '=', 'makes.id')
            ->select(
                'models.*',
                'makes.make AS make'
            )
            ->get();

        return new JsonResponse(compact('models'), 200);
    }

    public function store()
    {
        $this->validate($this->request, [
            'make' => 'required',
            'model' => 'required'
        ]);

        $data = $this->request->all();
        $makeID = Make::whereMake( $data['make'] )->first()->id;
        $model = new CarModel();

        if( isset($data["id"]) && CarModel::find($data["id"]) ){
            $model = CarModel::find($data["id"]);
        }

        $model->make_id = $makeID;
        $model->model = $data["model"];

        $model->save();
    }
}
