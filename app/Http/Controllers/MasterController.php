<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Igaster\LaravelCities\Geo;
use App\Models\Level;
use App\Models\User;
use App\Models\Profile;
use App\Models\Addresse;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Work;
use App\Models\Hobbi;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Validator;
//use ValidatesRequests;
//use Illuminate\Foundation\Validation\ValidatesRequests;

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
        $user = $request->user;
        $user_id = $user['id'];
        $user_data = Validator::make($user, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email,'.$user_id],
            'phone' => ['required', 'string', 'min:10', 'max:13', 'unique:users,phone,'.$user_id]
        ]);
        if ($user_data->fails()){
            return response()->json(['error' => 'No valid form user!'], 500);
        }
        else {
            $newUser = User::find($user_id);
            $newUser->update($user);
        }

        $profile = $request->profileform;
        // $profile_data = Validator::make($profile, [
        //     'web_site' => ['string', 'min:3', 'max:100'],
        //     'photo' => ['string'],
        //     'dribbble' => ['string', 'min:3', 'max:100'],
        //     'behance' => ['string', 'min:3', 'max:100'],
        //     'git' => ['string', 'min:3', 'max:100'],
        //     'linkedin' => ['string', 'min:3', 'max:100']
        // ]);
        // if ($profile_data->fails()){
        //     return response()->json(['error' => 'No valid form profile!'], 500);
        // }
        // else {
        //     $profile += ['user_id' => $user_id];
        //     Profile::create($profile);
        // }

        $address = $request->addressform;
        $address_data = Validator::make($address, [
            'country' => ['required'],
            'region' => ['required'],
            'city' => ['required', 'string', 'min:3', 'max:100'],
            'index' => ['required', 'string', 'min:1', 'max:100'],
            'street' => ['required', 'string', 'min:1', 'max:100'],
            'house' => ['required', 'string', 'min:1', 'max:10'],
            'apartment' => ['required', 'string', 'min:1', 'max:10']
        ]);
        if ($address_data->fails()){
            return response()->json(['error' => 'No valid form address!'], 500);
        }
        else {
            $address += ['user_id' => $user_id];
            Addresse::create($address);
        }

        $lenguages = $request->lenguageform;
        foreach ($lenguages as $lenguage) {
                $lenguage += ['user_id' => $user_id];
            $lenguage_data = Validator::make($lenguage, [
                'user_id' => ['required'],
                'lenguage' => ['required', 'string', 'min:3', 'max:100'],
                'level_id' => ['required']
            ]);
            if ($lenguage_data->fails()){
                return response()->json(['error' => 'No valid form lenguages!'], 500);
            }
            else {
                Language::create($lenguage);
            }
        }

        $skills = $request->skillform;
        foreach ($skills as $skill) {
                $skill += ['user_id' => $user_id];
            $skill_data = Validator::make($skill, [
                'user_id' => ['required'],
                'skill' => ['required', 'string', 'min:2', 'max:100'],
                'level_id' =>['required']
            ]);
            if ($skill_data->fails()){
                return response()->json(['error' => 'No valid form skills!'], 500);
            }
            else {
                Skill::create($skill);
            }
        }

        $educations = $request->educationform;
        foreach ($educations as $education) {
                $education += ['user_id' => $user_id];
            $education_data = Validator::make($education, [
                'user_id' => ['required'],
                'university' => ['required', 'string', 'min:3', 'max:100'],
                'professi' => ['required', 'string', 'min:3', 'max:100'],
                'start' => ['required', 'string', 'min:3', 'max:100'],
                'finish' => ['required', 'string', 'min:3', 'max:100'],
                'level' => ['required', 'string', 'min:3', 'max:100']
            ]);
            if ($education_data->fails()){
                return response()->json(['error' => 'No valid form educations!'], 500);
            }
            else {
                Education::create($education);
            }
        }

        $works = $request->experienceform;
        foreach ($works as $work) {
                $work += ['user_id' => $user_id];
            $work_data = Validator::make($work, [
                'user_id' => ['required'],
                'experience' => ['required', 'string', 'min:3', 'max:100'],
                'position' => ['required', 'string', 'min:3', 'max:100'],
                'profession' => ['required', 'string', 'min:3', 'max:100'],
                'start' => ['required', 'string', 'min:3', 'max:100'],
                'finish' => ['required', 'string', 'min:3', 'max:100'],
                'functions' => ['required', 'min:3', 'max:10000'],
            ]);
            if ($work_data->fails()){
                return response()->json(['error' => 'No valid form works!'], 500);
            }
            else {
                Work::create($work);
            }
        }

        $hobbi = $request->hobbiform;
        $hobbi_data = Validator::make($hobbi, [
            'hobbi' => ['required', 'string', 'min:3', 'max:255'],
        ]);
        $hobbi += ['user_id' => $user_id];
        Hobbi::create($hobbi);

        return response()->json(['success' => 'success'], 201);
        // return $address;
    }

}
