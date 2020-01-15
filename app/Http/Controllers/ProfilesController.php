<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editProfile(Request $request)
    {
        $user = auth()->user();
        $profile = $user->profile;
        $lenguages = $user->languages;
        $address = $user->address;
        $educations = $user->educations;
        $hobbi = $user->hobbi;
        $skills = $user->skills;
        $works = $user->works;

        return response()->json([
            'profile' => $profile,
            'lenguages' => $lenguages,
            'address' => $address,
            'educations' => $educations,
            'hobbi' => $hobbi,
            'skills' => $skills,
            'works' => $works
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $profile_data = Validator::make($profile, [
            'web_site' => ['string', 'min:3', 'max:100'],
            'photo' => ['string'],
            'dribbble' => ['string', 'min:3', 'max:100'],
            'behance' => ['string', 'min:3', 'max:100'],
            'git' => ['string', 'min:3', 'max:100'],
            'linkedin' => ['string', 'min:3', 'max:100']
        ]);
        if ($profile_data->fails()){
            return response()->json(['error' => 'No valid form profile!'], 500);
        }
        else {
            $profile += ['user_id' => $user_id];
            Profile::create($profile);
        }

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

        $hobbis = $request->hobbiform;
        foreach ($hobbis as $hobbi) {
            $hobbi += ['user_id' => $user_id];
            $hobbi_data = Validator::make($hobbi, [
                'user_id' => ['required'],
                'hobbi' => ['required', 'string', 'min:3', 'max:255']
            ]);
            if ($hobbi_data->fails()){
                return response()->json(['error' => 'No valid form hobbi!'], 500);
            }
            else {
                Hobbi::create($hobbi);
            }
        }

        return response()->json(['success' => 'success'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $profile_data = Validator::make($profile, [
            'web_site' => ['string', 'min:3', 'max:100'],
            'photo' => ['string'],
            'dribbble' => ['string', 'min:3', 'max:100'],
            'behance' => ['string', 'min:3', 'max:100'],
            'git' => ['string', 'min:3', 'max:100'],
            'linkedin' => ['string', 'min:3', 'max:100']
        ]);
        if ($profile_data->fails()){
            return response()->json(['error' => 'No valid form profile!'], 500);
        }
        else {
            $updateProfile = Profile::find($profile['id']);
            $updateProfile->update($profile);
        }

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
            $updateAddress = Addresse::find($address['id']);
            $updateAddress->update($address);
        }

        $lenguages = $request->lenguageform;
        $oldLanguages = $newUser->languages;
        if ( count($lenguages) == count($oldLanguages) || count($lenguages) >= count($oldLanguages) ) {
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
                    if (isset($lenguage['id'])) {
                        $updateLanguage = Language::find($lenguage['id']);
                        $updateLanguage->update($lenguage);
                    }
                    else {
                        Language::create($lenguage);
                    }
                }
            }
        }
        else {
            for ($i=0; $i<count($oldLanguages); $i++) {
                if (isset($lenguages[$i])) {
                    $lenguage_data = Validator::make($lenguages[$i], [
                        'user_id' => ['required'],
                        'lenguage' => ['required', 'string', 'min:3', 'max:100'],
                        'level_id' => ['required']
                    ]);
                    if ($lenguage_data->fails()) {
                        return response()->json(['error' => 'No valid form lenguages!'], 500);
                    }
                    else {
                        $oldLanguages[$i]->update($lenguages[$i]);
                    }
                }
                else {
                    $oldLanguages[$i]->delete();
                }
            }
        }


        $skills = $request->skillform;
        $oldSkills = $newUser->skills;
        if ( count($skills) == count($oldSkills) || count($skills) >= count($oldSkills) ) {
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
                    if (isset($skill['id'])) {
                        $updateSkill = Skill::find($skill['id']);
                        $updateSkill->update($skill);
                    }
                    else {
                        Skill::create($skill);
                    }
                }
            }
        }
        else {
            for ($i=0; $i<count($oldSkills); $i++) {
                if (isset($skills[$i])) {
                    $skill_data = Validator::make($skills[$i], [
                    'user_id' => ['required'],
                    'skill' => ['required', 'string', 'min:2', 'max:100'],
                    'level_id' =>['required']
                    ]);
                    if ($skill_data->fails()) {
                        return response()->json(['error' => 'No valid form skills!'], 500);
                    }
                    else {
                        $oldSkills[$i]->update($skills[$i]);
                    }
                }
                else {
                    $oldSkills[$i]->delete();
                }
            }
        }


        $educations = $request->educationform;
        $oldEducations = $newUser->educations;
        if ( count($educations) == count($oldEducations) || count($educations) >= count($oldEducations) ) {
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
                    if (isset($education['id'])) {
                        $updateEducation = Education::find($education['id']);
                        $updateEducation->update($education);
                    }
                    else {
                        Education::create($education);
                    }
                }
            }
        }
        else {
            for ($i=0; $i<count($oldEducations); $i++) {
                if (isset($educations[$i])) {
                    $education_data = Validator::make($educations[$i], [
                    'user_id' => ['required'],
                    'university' => ['required', 'string', 'min:3', 'max:100'],
                    'professi' => ['required', 'string', 'min:3', 'max:100'],
                    'start' => ['required', 'string', 'min:3', 'max:100'],
                    'finish' => ['required', 'string', 'min:3', 'max:100'],
                    'level' => ['required', 'string', 'min:3', 'max:100']
                    ]);
                    if ($education_data->fails()) {
                        return response()->json(['error' => 'No valid form educations!'], 500);
                    }
                    else {
                        $oldEducations[$i]->update($educations[$i]);
                    }
                }
                else {
                    $oldEducations[$i]->delete();
                }
            }
        }


        $works = $request->experienceform;
        $oldWorks = $newUser->works;
        if ( count($works) == count($oldWorks) || count($works) >= count($oldWorks) ) {
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
                    if (isset($work['id'])) {
                        $updateWork = Work::find($work['id']);
                        $updateWork->update($work);
                    }
                    else {
                        Work::create($work);
                    }
                }
            }
        }
        else {
            for ($i=0; $i<count($oldWorks); $i++) {
                if (isset($works[$i])) {
                    $work_data = Validator::make($works[$i], [
                        'user_id' => ['required'],
                        'experience' => ['required', 'string', 'min:3', 'max:100'],
                        'position' => ['required', 'string', 'min:3', 'max:100'],
                        'profession' => ['required', 'string', 'min:3', 'max:100'],
                        'start' => ['required', 'string', 'min:3', 'max:100'],
                        'finish' => ['required', 'string', 'min:3', 'max:100'],
                        'functions' => ['required', 'min:3', 'max:10000'],
                    ]);
                    if ($work_data->fails()) {
                        return response()->json(['error' => 'No valid form works!'], 500);
                    }
                    else {
                        $oldWorks[$i]->update($works[$i]);
                    }
                }
                else {
                    $oldWorks[$i]->delete();
                }
            }
        }


        $hobbi = $request->hobbiform;
        $hobbi_data = Validator::make($hobbi, [
            'hobbi' => ['required', 'string', 'min:3', 'max:255'],
        ]);
        if (isset($hobbi['id'])) {
            $updateHobbi = Hobbi::find($hobbi['id']);
            $updateHobbi->update($hobbi);
        }
        else {
            Hobbi::create($hobbi);
        }

        return response()->json(['success' => 'success'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
