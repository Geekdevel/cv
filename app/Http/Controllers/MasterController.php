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
        return view('master');
    }

    public function allLevels()
    {
        $levels = Level::all();
        return $levels;
    }

    public function createProfile(Request $request)
    {
        /*$user = $request->user;
        $newUser = User::find($user->id);
        $newUser->name = $user->name;
        $newUser->email = $user->email;*/
        $lenguageform = $request->lenguageform;
        return $lenguageform;
    }

}
