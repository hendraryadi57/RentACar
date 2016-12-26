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
use App\Fuel;
use App\Make;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $cars = DB::table('cars')
            ->join('models', 'cars.model_id', '=', 'models.id')
            ->join('makes', 'models.make_id', '=', 'makes.id')
            ->join('fuels', 'cars.fuel', '=', 'fuels.id')
            ->join('branches', 'cars.branchID', '=', 'branches.id')
            ->join('types', 'cars.type', '=', 'types.id')
            ->select('cars.*',
                'makes.make AS make',
                'models.model AS model',
                'fuels.fuel AS fuel',
                'branches.name AS branch',
                'types.class AS class'
            )
            ->get();

        return new JsonResponse(compact('cars'), 200);
    }

    public function store()
    {
        $this->validate($this->request, [
            'car.make' => 'required',
            'car.model' => 'required',
            'car.fuel' => 'required',
            'car.class' => 'required',
            'car.branch' => 'required',
            'car.isAutomatic' => 'required',
            'car.registration' => 'required',
            'car.capacity' => 'required',
            'car.minAge' => 'required',
            'car.pricePerDay' => 'required',
        ]);

        $data = $this->request->all();
        $img = $this->request->file('file');
        $car = new Car();
        $id = null;

        $makeID = Make::whereMake($data["car"]["make"])->first()->id;
        $modelID = CarModel::whereModel($data["car"]["model"])
            ->where('make_id', '=', $makeID)
            ->first()->id;
        $fuelID = Fuel::whereFuel($data["car"]["fuel"])->first()->id;
        $classID = Type::whereClass($data["car"]["class"])->first()->id;
        $branchID = Branch::whereName($data["car"]["branch"])->first()->id;
        $isAutomatic = false;

        if($data["car"]["isAutomatic"] == "true"){
            $isAutomatic = true;
        }

        if( isset($data["car"]["id"]) && Car::find($data["car"]["id"]) ){
            $car = Car::find($data["car"]["id"]);
        }

        $car->model_id = $modelID;
        $car->fuel = $fuelID;
        $car->type = $classID;
        $car->registration = $data["car"]["registration"];
        $car->branchID = $branchID;
        $car->capacity = $data["car"]["capacity"];
        $car->isAutomatic = $isAutomatic;
        $car->minAge = $data["car"]["minAge"];
        $car->pricePerDay = $data["car"]["pricePerDay"];

        if($img){
            if ($img->isValid()) {
                $destinationPath = 'images/'; // upload path
                $extension = $img->getClientOriginalExtension(); // getting image extension
                do{
                    $fileName = rand(1,99999999).'.'.$extension; // renaming image
                }while(file_exists("images/" . $fileName));

                $img->move($destinationPath, $fileName); // uploading file to given path
                $car->img = $fileName;
            }
        }

        $car->save();
    }
}
