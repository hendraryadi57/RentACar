<?php

namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\Branch;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class UserReservationController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $user = $this->request->user();

        $reservations = DB::table('reservations')
            ->where('userID', '=', $user->id)
            ->join('cars', 'reservations.carID', '=', 'cars.id')
            ->join('models', 'cars.model_id', '=', 'models.id')
            ->join('makes', 'models.make_id', '=', 'makes.id')
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

        return new JsonResponse(compact('reservations'), 200);
    }

    public function store()
    {
        $data = $this->request->all();

        $user = $this->request->user();

        $pickupLocation = Branch::where('name', $data["pickupLocation"])->first();
        $returnLocation = Branch::where('name', $data["returnLocation"])->first();

        $date1 = explode(". ", $data["pickupDate"]);
        $date2 = explode(". ", $data["returnDate"]);


        // Create Reservation
        Reservation::create([
            "userID" => $user->id,
            "carID" => $data["selectedCarID"],
            "pickupLocation" => $pickupLocation->id,
            "returnLocation" => $returnLocation->id,
            "pickupDate" => Carbon::create($date1[2], $date1[1], $date1[0], $data["pickupTimeH"], $data["pickupTimeM"]),
            "returnDate" => Carbon::create($date2[2], $date2[1], $date2[0], $data["returnTimeH"], $data["returnTimeM"]),
            "extras" => json_encode($data["arrayOfSelectedExtras"]),
            "price" => $data["totalPrice"],
        ]);

        return new JsonResponse([
            'message' => 'Success'
        ], 200);
    }
}
