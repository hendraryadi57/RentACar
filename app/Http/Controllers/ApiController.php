<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Image;
use Log;
use Validator;
use App\Branch;
use App\Car;
use App\CarModel;
use App\City;
use App\Color;
use App\Extra;
use App\Fuel;
use App\Make;
use App\Reservation;
use App\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function authenticated()
    {
        if ($user = $this->request->user()) {
            return $user;
        }
        
        return new JsonResponse(401);
    }

    public function sendEmail()
    {
        Log::info($this->request->all());
    }
}
