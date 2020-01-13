<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Igaster\LaravelCities\Geo;
use App\Models\Level;
/*use App\Models\User;
use App\Models\Profile;
use App\Models\Addresse;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Work;
use App\Models\Hobbi;
use Illuminate\Support\Facades\Validator;*/

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

}
