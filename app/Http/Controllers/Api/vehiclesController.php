<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Vehicle;
use App\Models\Vehicle_type;
use App\Models\Vehicle_regdate;
use App\Models\Vehicle_gearbox;
use App\Models\Vehicle_fuel;
use App\Models\Vehicle_car_steering;
use App\Models\Vehicle_motorpower;
use App\Models\Vehicle_doors;
use App\Models\Vehicle_features;
use App\Models\Vehicle_carcolor;
use App\Models\Vehicle_exchange;
use App\Models\Vehicle_financial;
use App\Models\Vehicle_cubiccms;
use App\Models\Vehicle_brand;
use App\Models\Vehicle_model;
use App\Models\Vehicle_version;





class vehiclesController extends Controller
{
    protected $user;

    public function __construct() {
            $this->middleware(function ($request, $next ){
                    $this->user = Auth::user();
                    return $next($request);
            });
    }

    private function getData() {
        return [
            'vehicle_types' => Vehicle_type::all(),
            'regdate' => Vehicle_regdate::orderBy('label', 'ASC')->get(),
            'gearbox' => Vehicle_gearbox::all(),
            'fuel' => Vehicle_fuel::all(),
            'car_steering' => Vehicle_car_steering::all(),
            'motorpower' => Vehicle_motorpower::all(),
            'doors' => Vehicle_doors::all(),
            'features' => Vehicle_features::all(),
            'carcolor' => Vehicle_carcolor::all(),
            'exchange' => Vehicle_exchange::all(),
            'financial' => Vehicle_financial::all(),
            'cubiccms' => Vehicle_cubiccms::all(),
        ];                


    }
   
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::with('Vehicle_photos')
            ->firstOrCreate([
                'user_id' => $this->user->id,
                'status' => 0,
                

            ]);

            return array_merge(['vehicle' => $vehicle], $this->getData());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function brand($vehicle_type) {
        $vehicle_brand = Vehicle_brand::where('vehicle_type_id', $vehicle_type)
                    ->get();
        return compact('vehicle_brand');
    }

    public function model($vehicle_type, $vehicle_brand) {
            $vehicle_model = Vehicle_model::where('vehicle_type_id', $vehicle_type)
                    ->where('brand_id', $vehicle_brand)
                    ->orderBy('label')
                    ->get();
            return compact('vehicle_model');
    }

    public function version($vehicle_brand, $vehicle_model) {
            $vehicle_version = Vehicle_version::where('brand_id', $vehicle_brand,)
                    ->where('model_id', $vehicle_model)
                    ->orderBy('label')
                    ->get();
            return compact('vehicle_version');
    }
}
