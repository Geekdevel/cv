<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Igaster\LaravelCities\Geo;
use App\Models\Level;

class MasterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $countries = Geo::getCountries();
        //$levels = Level::pluck('level', 'id');
        $levels = Level::all();
        return view('master', ['levels' => $levels, 'countries' => $countries]);
    }
}
