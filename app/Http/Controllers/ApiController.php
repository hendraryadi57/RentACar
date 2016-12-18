<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Make;
use App\Fuel;
use App\Extra;
use App\City;
use App\Type;
use App\Color;
use App\CarModel;
use App\Car;
use DB;
use Log;
use Validator;
use Auth;
use Image;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Reservation;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function authenticated(Request $request){

        if (Auth::check()) {

            $user = Auth::user();

            $array = array(
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "city" => $user->city,
                "address" => $user->address,
                "phone" => $user->phone,
            );


            return $array;
        }
        
        return 0;
    }

    public function confirmReservation(Request $request){
        $data = $request->all();
        $id = $data["id"];
        
        $reservation = Reservation::where('id', '=', $id)->first();
        
        $reservation->isPending = 1;

        $reservation->save();
    }

    public function carDelivered(Request $request){
        $data = $request->all();
        $id = $data["id"];

        $reservation = Reservation::where('id', '=', $id)->first();

        $reservation->isPaid = 1;

        $reservation->save();
    }
    
    public function carReturned(Request $request){
        $data = $request->all();
        $id = $data["id"];

        $reservation = Reservation::where('id', '=', $id)->first();

        $reservation->isCompleted = 1;

        $reservation->save();
    }

    public function reservationSave(Request $request){

        $data = $request->all();

        $reservation = new Reservation();
        $user = Auth::user();
        
        $pickupLocation = Branch::where('name', $data["pickupLocation"])->first();
        $returnLocation = Branch::where('name', $data["returnLocation"])->first();

        $date1 = explode(". ", $data["pickupDate"]);
        $date2 = explode(". ", $data["returnDate"]);

        // Set reservation
        $reservation->userID = $user->id;
        $reservation->carID = $data["selectedCarID"];
        $reservation->pickupLocation = $pickupLocation->id;
        $reservation->returnLocation = $returnLocation->id;
        $reservation->pickupDate = Carbon::create($date1[2], $date1[1], $date1[0], $data["pickupTimeH"], $data["pickupTimeM"]);
        $reservation->returnDate = Carbon::create($date2[2], $date2[1], $date2[0], $data["returnTimeH"], $data["returnTimeM"]);
        $reservation->extras = json_encode($data["arrayOfSelectedExtras"]);
        $reservation->price = $data["totalPrice"];

        $reservation->save();

    }

    public function getMakes(Request $request){
        
        $makes = Make::all();
        
        return $makes;
        
    }

    public function getFuels(Request $request){

        $fuels = Fuel::all();

        return $fuels;

    }

    public function getExtras(Request $request){

        $extras = Extra::all();

        return $extras;

    }

    public function getCities(Request $request){

        $cities = City::all();

        return $cities;

    }

    public function getClasses(Request $request){

        $types = Type::all();

        return $types;

    }

    public function getColors(Request $request){

        $colors = Color::all();

        return $colors;

    }

    public function getBranches(Request $request){

        $branches = DB::table('branches')
            ->join('cities', 'branches.city', '=', 'cities.id')
            ->select(
                'branches.*',
                'cities.city AS city'
            )
            ->get();

        return $branches;
    }

    public function getModels(Request $request){

        $models = DB::table('models')
            ->join('makes', 'models.make', '=', 'makes.id')
            ->select(
                'models.*',
                'makes.make AS make'
            )
            ->get();

        return $models;

    }
    
    public function getCars(Request $request){
        $cars = DB::table('cars')
            ->join('models', 'cars.makemodel', '=', 'models.id')
            ->join('makes', 'models.make', '=', 'makes.id')
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

        return $cars;
    }
    
    public function getUserReservations(Request $request){
        $user = Auth::user();

        $reservations = DB::table('reservations')
            ->where('userID', '=', $user->id)
            ->join('cars', 'reservations.carID', '=', 'cars.id')
            ->join('models', 'cars.makemodel', '=', 'models.id')
            ->join('makes', 'models.make', '=', 'makes.id')
            ->join('fuels', 'cars.fuel', '=', 'fuels.id')
            ->join('branches AS b', 'cars.branchID', '=', 'b.id')
            ->join('branches AS b1', 'reservations.pickupLocation', '=', 'b1.id')
            ->join('branches AS b2', 'reservations.returnLocation', '=', 'b2.id')
            ->join('types', 'cars.type', '=', 'types.id')
            ->select(
                'reservations.*',
                'makes.make AS make',
                'models.model AS model',
                'fuels.fuel AS fuel',
                'b.name AS branch',
                'b1.name AS pickupLocation',
                'b2.name AS returnLocation',
                'types.class AS class'
            )
            ->get();
        
        return $reservations;
    }

    public function getReservations(Request $request){
        $reservations = DB::table('reservations')
            ->join('users', 'reservations.userID', '=', 'users.id')
            ->join('cars', 'reservations.carID', '=', 'cars.id')
            ->join('models', 'cars.makemodel', '=', 'models.id')
            ->join('makes', 'models.make', '=', 'makes.id')
            ->join('fuels', 'cars.fuel', '=', 'fuels.id')
            ->join('branches AS b', 'cars.branchID', '=', 'b.id')
            ->join('branches AS b1', 'reservations.pickupLocation', '=', 'b1.id')
            ->join('branches AS b2', 'reservations.returnLocation', '=', 'b2.id')
            ->join('types', 'cars.type', '=', 'types.id')
            ->select(
                'reservations.*',
                'makes.make AS make',
                'models.model AS model',
                'fuels.fuel AS fuel',
                'b.name AS branch',
                'b1.name AS pickupLocation',
                'b2.name AS returnLocation',
                'types.class AS class',
                'users.name AS username',
                'users.email AS email',
                'users.address AS address',
                'users.phone AS phone',
                'users.city AS city'
            )
            ->get();
        
        return $reservations;
    }

    public function addMake(Request $request){

        $data = $request->all();
        $make = new Make();

        if(isset($data["addMake"]["id"])){
            if (Make::where('id', '=', $data["addMake"]["id"])->exists()) {
                $make = Make::where('id', '=', $data["addMake"]["id"])->first();
            }
        }

        $make->make = $data["addMake"]["make"];

        $make->save();
    }

    public function addFuel(Request $request){

        $data = $request->all();
        $fuel = new Fuel();

        if(isset($data["addFuel"]["id"])){
            if (Fuel::where('id', '=', $data["addFuel"]["id"])->exists()) {
                $fuel = Fuel::where('id', '=', $data["addFuel"]["id"])->first();
            }
        }

        $fuel->fuel = $data["addFuel"]["fuel"];

        $fuel->save();
    }

    public function addExtra(Request $request){

        $data = $request->all();
        $extra = new Extra();

        if(isset($data["addExtra"]["id"])){
            if (Extra::where('id', '=', $data["addExtra"]["id"])->exists()) {
                $extra = Extra::where('id', '=', $data["addExtra"]["id"])->first();
            }
        }

        $extra->title = $data["addExtra"]["title"];
        $extra->description = $data["addExtra"]["description"];
        $extra->price = $data["addExtra"]["price"];

        $extra->save();
    }

    public function addCity(Request $request){

        $data = $request->all();
        $city = new City();

        if(isset($data["addCity"]["id"])){
            $id = $data["addCity"]["id"];
            if (City::where('id', '=', $id)->exists()) {
                $city = City::where('id', '=', $id)->first();
            }
        }


        $city->city = $data["addCity"]["city"];
        $city->postcode = $data["addCity"]["postcode"];

        $city->save();
    }

    public function addClass(Request $request){

        $data = $request->all();
        $type = new Type();

        if (isset($data["addClass"]["id"])){
            if (Type::where('id', '=', $data["addClass"]["id"])->exists()) {
                $type = Type::where('id', '=', $data["addClass"]["id"])->first();
            }
        }

        $type->class = $data["addClass"]["class"];

        $type->save();
    }

    public function addColor(Request $request){

        $data = $request->all();
        $color = new Color();

        if (Color::where('color', '=', $data["addColor"])->exists()) {
            $color = Color::where('color', '=', $data["addColor"])->first();
        }

        $color->color = $data["addColor"];

        $color->save();
    }

    public function addBranch(Request $request){

        $data = $request->all();
        $branch = new Branch();

        if(isset($data['addBranch']['id'])){
            if (Branch::where('id', '=', $data["addBranch"]["id"])->exists()) {
                $branch = Branch::where('id', '=', $data["addBranch"]["id"])->first();
            }
        }

        $branch->city = City::where('city', '=', $data["addBranch"]["city"])->first()->id;
        $branch->name = $data["addBranch"]["name"];
        $branch->email = $data["addBranch"]["email"];
        $branch->address = $data["addBranch"]["address"];
        $branch->phone = $data["addBranch"]["phone"];

        $branch->save();
    }

    public function addModel(Request $request){

        $data = $request->all();
        $model = new CarModel();
        $makeID = Make::where('make', '=', $data["addModel"]["make"])->first()->id;

        if(isset($data["addModel"]["id"])){
            if (CarModel::where('id', '=', $data["addModel"]["id"])->exists()) {
                $model = CarModel::where('id', '=', $data["addModel"]["id"])->first();
            }
        }


        $model->make = $makeID;
        $model->model = $data["addModel"]["model"];

        $model->save();
    }
    
    public function addCar(Request $request){
        
        $data = $request->all();
        $img = $request->file('file');
        $car = new Car();
        $id = null;

        $makeID = Make::where('make', '=', $data["car"]["make"])->first()->id;
        $modelID = CarModel::where('model', '=', $data["car"]["model"])
                        ->where('make', '=', $makeID)
                        ->first()->id;
        $fuelID = Fuel::where('fuel', '=', $data["car"]["fuel"])->first()->id;
        $classID = Type::where('class', '=', $data["car"]["class"])->first()->id;
        $branchID = Branch::where('name', '=', $data["car"]["branch"])->first()->id;
        $isAutomatic = false;

        if($data["car"]["isAutomatic"] == "true"){
            $isAutomatic = true;
        }


        if(isset($data["car"]["id"])){
            $id = $data["car"]["id"];
            if (Car::where('id', '=', $id)->exists()) {
                $car = Car::where('id', '=', $id)->first();
            }
        }

        $car->makemodel = $modelID;
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

    public function sendEmail(Request $request){

        Log::info($request->all());

    }
    
}
