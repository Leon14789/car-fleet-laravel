<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plans;

use Illuminate\Support\Facades\Auth;


class payController extends Controller
{
    protected $user;

    public function __construct() {
            $this->middleware(function ($request, $next ){
                    $this->user = Auth::user();
                    return $next($request);
            });
    }

    public function plans()
    {
        $plans = Plans::all();

        return compact('plans');
    }


}
