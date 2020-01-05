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
            'stereet' => ['required', 'string', 'min:1', 'max:10'],
            'house' => ['required', 'string', 'min:1', 'max:10']
        ]);
        if ($address_data->fails()){
            return response()->json(['error' => 'No valid form address!'], 500);
        }
        else {
            $address += ['user_id' => $user_id];
            Addresse::create($address);
        }

        // $lenguages = $request->lenguageform;
        // foreach ($lenguages as $lenguage) {
        //     $lenguage_data = $lenguage->validate([
        //         'lenguage' => ['required', 'string', 'min:3', 'max:100'],
        //         'level_id' => ['required', 'string']
        //     ]);
        //     $lenguage_data += ['user_id' => $user_id];
        //     Language::create($lenguage_data);
        // }

        // $skills = $request->skillform;
        // foreach ($skills as $skill) {
        //     $skill_data = $skill->validate([
        //         'skill' => ['required', 'string', 'min:3', 'max:100'],
        //         'level_id' =>['required', 'string']
        //     ]);
        //     $skill_data += ['user_id' => $user_id];
        //     Skill::create($skill_data);
        // }

        // $educations = $request->educationform;
        // foreach ($educations as $education) {
        //     $education_data = $education->validate([
        //         'university' => ['required', 'string', 'min:3', 'max:100'],
        //         'professi' => ['required', 'string', 'min:3', 'max:100'],
        //         'start' => ['required', 'string', 'min:3', 'max:100'],
        //         'finish' => ['required', 'string', 'min:3', 'max:100'],
        //         'level' => ['required', 'string', 'min:3', 'max:100']
        //     ]);
        //     $education_data += ['user_id' => $user_id];
        //     Education::create($education_data);
        // }

        // $works = $request->experienceform;
        // foreach ($works as $work) {
        //     $work_data = $wopk->validate([
        //         'work' => ['required', 'string', 'min:3', 'max:100'],
        //         'level' => ['required', 'string', 'min:3', 'max:100'],
        //         'proffesi' => ['required', 'string', 'min:3', 'max:100'],
        //         'start' => ['required', 'string', 'min:3', 'max:100'],
        //         'finish' => ['required', 'string', 'min:3', 'max:100'],
        //         'function' => ['required', 'min:3', 'max:10000'],
        //         'projects' => ['required', 'min:3', 'max:10000']
        //     ]);
        //     $work_data += ['user_id' => $user_id];
        //     Work::create($work_data);
        // }

        // $hobbi = $request->hobbiform;
        // $hobbi_data = $hobbi->validate([
        //     'hobbi' => ['required', 'string', 'min:3', 'max:255'],
        // ]);
        // $hobbi_data += ['user_id' => $user_id];
        // Hobbi::create($hobbi_data);

        // return response()->json(['success' => 'success'], 201);
        return $address;
    }

}
