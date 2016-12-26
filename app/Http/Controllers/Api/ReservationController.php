<?php

namespace App\Http\Controllers\Api;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $reservations = DB::table('reservations')
            ->join('users', 'reservations.userID', '=', 'users.id')
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
                'types.class AS class',
                'users.name AS username',
                'users.email AS email',
                'users.address AS address',
                'users.phone AS phone',
                'users.city AS city'
            )
            ->get();

        return new JsonResponse(compact('reservations'), 200);
    }

    public function confirmReservation()
    {
        $id = $this->request->id;

        $reservation = Reservation::find($id);

        $reservation->isPending = 1;

        $reservation->save();
    }

    public function carDelivered()
    {
        $id = $this->request->id;

        $reservation = Reservation::find($id);

        $reservation->isPaid = 1;

        $reservation->save();
    }

    public function carReturned()
    {
        $id = $this->request->id;

        $reservation = Reservation::find($id);

        $reservation->isCompleted = 1;

        $reservation->save();
    }
}