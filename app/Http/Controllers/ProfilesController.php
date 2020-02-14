<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\User;
use App\Models\Profile;
use App\Models\Address;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Hobby;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editProfile()
    {
        $user = auth()->user();
        return response()->json([
            'profile' => $user->profile,
            'lenguages' => $user->languages,
            'address' => $user->address,
            'education' => $user->education,
            'hobby' => $user->hobbies,
            'skills' => $user->skills,
            'experience' => $user->experiences,
            'projects' => $user->projects,
            'user' => $user
        ]);
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
            'phone' => ['required', 'string', 'min:10', 'max:25', 'unique:users,phone,'.$user_id]
        ]);
        if ($user_data->fails()){
            return response()->json(['error' => 'No valid form user!'], 415);
        }
            // $newUser = User::find($user_id);
            // $newUser->update($user);

        $profile = $request->profileform;
        $profile_data = Validator::make($profile, [
            'web_site' => ['nullable', 'string', 'max:100'],
            'photo' => ['string'],
            'dribbble' => ['nullable', 'string', 'max:100'],
            'behance' => ['nullable', 'string', 'max:100'],
            'git' => ['nullable', 'string', 'max:100'],
            'linkedin' => ['nullable', 'string', 'max:100']
        ]);
        if ($profile_data->fails()){
            return response()->json(['error' => 'No valid form profile!'], 415);
        }
            // $profile += ['user_id' => $user_id];
            // Profile::create($profile);

        $address = $request->addressform;
        $address_data = Validator::make($address, [
            'country' => ['required'],
            'region' => ['required'],
            'city' => ['required', 'string', 'min:3', 'max:100'],
            'index' => ['required', 'string', 'min:1', 'max:100'],
            'street' => ['required', 'string', 'min:1', 'max:100']
        ]);
        if ($address_data->fails()){
            return response()->json(['error' => 'No valid form address!'], 415);
        }
            // $address += ['user_id' => $user_id];
            // Addresse::create($address);

        $lenguages = $request->lenguageform;
        foreach ($lenguages as $lenguage) {
            $lenguage += ['user_id' => $user_id];
            $lenguage_data = Validator::make($lenguage, [
                'user_id' => ['required'],
                'lenguage' => ['required', 'string', 'min:3', 'max:100'],
                'level_id' => ['required']
            ]);
            if ($lenguage_data->fails()){
                return response()->json(['error' => 'No valid form lenguages!'], 415);
            }
                // Language::create($lenguage);
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
                return response()->json(['error' => 'No valid form skills!'], 415);
            }
                Skill::create($skill);
        }

        $educations = $request->educationform;
        foreach ($educations as $education) {
            $education += ['user_id' => $user_id];
            $education_data = Validator::make($education, [
                'user_id' => ['required'],
                'university' => ['required', 'string', 'min:3', 'max:100'],
                'professi' => ['required', 'string', 'min:3', 'max:100'],
                'start' => ['required', 'string', 'min:3', 'max:100'],
                'finish' => ['nullable', 'string', 'max:100'],
                'level' => ['required', 'string', 'min:3', 'max:100']
            ]);
            if ($education_data->fails()){
                return response()->json(['error' => 'No valid form educations!'], 415);
            }
                Education::create($education);
        }

        $experiences = $request->experienceform;
        foreach ($experiences as $experience) {
            $experience += ['user_id' => $user_id];
            $experience_data = Validator::make($experience, [
                'user_id' => ['required'],
                'company' => ['required', 'string', 'min:3', 'max:100'],
                'position' => ['required', 'string', 'min:3', 'max:100'],
                'start' => ['required', 'string', 'min:3', 'max:100'],
                'finish' => ['nullable', 'string', 'max:100'],
                'functions' => ['required', 'min:3', 'max:10000'],
            ]);
            if ($experience_data->fails()){
                return response()->json(['error' => 'No valid form works!'], 415);
            }
                Experience::create($experience);
        }

        $projects = $request->projectsform;
        $projects +=['user_id' => $user_id];
        $projects_data = Validator::make($projects, [
                'user_id' => ['required'],
                'description' => ['nullable', 'string', 'max:10000']
            ]);
        if ($projects_data->fails()) {
            return response()->json(['error' => 'No valid form projects!'], 415);
        }
            // Project::create($projects);

        $hobbies = $request->hobbyform;
        foreach ($hobbies as $hobby) {
            $hobby += ['user_id' => $user_id];
            $hobby_data = Validator::make($hobby, [
                'user_id' => ['required'],
                'hobby' => ['nullable', 'string', 'max:255']
            ]);
            if ($hobbi_data->fails()){
                return response()->json(['error' => 'No valid form hobbi!'], 415);
            }
                Hobby::create($hobby);
        }

        $newUser = User::find($user_id);
        $newUser->update($user);

        $profile += ['user_id' => $user_id];
        Profile::create($profile);

        $address += ['user_id' => $user_id];
        Addresse::create($address);

        Language::create($lenguage);

        Project::create($projects);

        return response()->json(['success' => 'success'], 201);
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
            'phone' => ['required', 'string', 'min:10', 'max:25', 'unique:users,phone,'.$user_id]
        ]);
        if ($user_data->fails()){
            return response()->json(['error' => 'No valid form user!'], 415);
        }
            $newUser = User::find($user_id);
            $newUser->update($user);

        $profile = $request->profileform;
        $profile_data = Validator::make($profile, [
            'web_site' => ['nullable', 'string', 'max:100'],
            'photo' => ['string'],
            'dribbble' => ['nullable', 'string', 'max:100'],
            'behance' => ['nullable', 'string', 'max:100'],
            'git' => ['nullable', 'string', 'max:100'],
            'linkedin' => ['nullable', 'string', 'max:100']
        ]);
        if ($profile_data->fails()){
            return response()->json(['error' => 'No valid form profile!'], 415);
        }
            $updateProfile = Profile::find($profile['id']);
            $updateProfile->update($profile);

        $projects = $request->projectsform;
        $projects +=['user_id' => $user_id];
        $projects_data = Validator::make($projects, [
                'description' => ['nullable', 'string', 'max:10000']
            ]);
        if ($projects_data->fails()) {
            return response()->json(['error' => 'No valid form projects!'], 415);
        }
        if(isset($projects['id'])) {
            $updateProjects = Project::find($projects['id']);
            $updateProjects->update($projects);
        }
        else {
            Project::create($projects);
        }

        $address = $request->addressform;
        $address_data = Validator::make($address, [
            'country' => ['required'],
            'region' => ['required'],
            'city' => ['required', 'string', 'min:3', 'max:100'],
            'index' => ['required', 'string', 'min:1', 'max:100'],
            'street' => ['required', 'string', 'min:1', 'max:100']
        ]);
        if ($address_data->fails()){
            return response()->json(['error' => 'No valid form address!'], 415);
        }
            $updateAddress = Address::find($address['id']);
            $updateAddress->update($address);

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
                    return response()->json(['error' => 'No valid form lenguages!'], 415);
                }
                if (isset($lenguage['id'])) {
                    $updateLanguage = Language::find($lenguage['id']);
                    $updateLanguage->update($lenguage);
                }
                else {
                    Language::create($lenguage);
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
                        return response()->json(['error' => 'No valid form lenguages!'], 415);
                    }
                    $oldLanguages[$i]->update($lenguages[$i]);
                }
                $oldLanguages[$i]->delete();
            }
        }



        $skills = $request->skillform;
        $oldSkills = $newUser->skills;
        if ( count($skills) >= count($oldSkills) ) {
            foreach ($skills as $skill) {
                $skill += ['user_id' => $user_id];
                $skill_data = Validator::make($skill, [
                    'user_id' => ['required'],
                    'skill' => ['required', 'string', 'min:2', 'max:100'],
                    'level_id' =>['required']
                ]);
                if ($skill_data->fails()){
                    return response()->json(['error' => 'No valid form skills!'], 415);
                }
                if (isset($skill['id'])) {
                    $updateSkill = Skill::find($skill['id']);
                    $updateSkill->update($skill);
                }
                Skill::create($skill);
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
                    $oldSkills[$i]->update($skills[$i]);
                }
                $oldSkills[$i]->delete();
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
                    'specialty' => ['required', 'string', 'min:3', 'max:100'],
                    'start' => ['required', 'string', 'min:3', 'max:100'],
                    'finish' => ['nullable', 'string', 'max:100'],
                    'degree' => ['required', 'string', 'min:3', 'max:100']
                ]);
                if ($education_data->fails()){
                    return response()->json(['error' => 'No valid form educations!'], 415);
                }
                if (isset($education['id'])) {
                    $updateEducation = Education::find($education['id']);
                    $updateEducation->update($education);
                }
                Education::create($education);
            }
        }
        else {
            for ($i=0; $i<count($oldEducations); $i++) {
                if (isset($educations[$i])) {
                    $education_data = Validator::make($educations[$i], [
                        'user_id' => ['required'],
                        'university' => ['required', 'string', 'min:3', 'max:100'],
                        'specialty' => ['required', 'string', 'min:3', 'max:100'],
                        'start' => ['required', 'string', 'min:3', 'max:100'],
                        'finish' => ['nullable', 'string', 'max:100'],
                        'degree' => ['required', 'string', 'min:3', 'max:100']
                    ]);
                    if ($education_data->fails()) {
                        return response()->json(['error' => 'No valid form educations!'], 415);
                    }
                    $oldEducations[$i]->update($educations[$i]);
                }
                $oldEducations[$i]->delete();
            }
        }



        $experiences = $request->experienceform;
        $oldExperiences = $newUser->experiences;
        if ( count($experiences) == count($oldExperiences) || count($experiences) >= count($oldExperiences) ) {
            foreach ($experiences as $experience) {
                $experience += ['user_id' => $user_id];
                $experience_data = Validator::make($experience, [
                    'user_id' => ['required'],
                    'company' => ['required', 'string', 'min:3', 'max:100'],
                    'position' => ['required', 'string', 'min:3', 'max:100'],
                    'start' => ['required', 'string', 'min:3', 'max:100'],
                    'finish' => ['nullable', 'string', 'max:100'],
                    'functions' => ['required', 'min:3', 'max:10000'],
                ]);
                if ($experience_data->fails()){
                    return response()->json(['error' => 'No valid form experience!'], 415);
                }
                if (isset($experience['id'])) {
                    $updateExperience = Experience::find($experience['id']);
                    $updateExperience->update($experience);
                }
                    Experience::create($experience);
            }
        }
        else {
            for ($i=0; $i<count($oldExperiences); $i++) {
                if (isset($experience[$i])) {
                    $experience_data = Validator::make($experience[$i], [
                        'user_id' => ['required'],
                        'company' => ['required', 'string', 'min:3', 'max:100'],
                        'position' => ['required', 'string', 'min:3', 'max:100'],
                        'start' => ['required', 'string', 'min:3', 'max:100'],
                        'finish' => ['nullable', 'string', 'max:100'],
                        'functions' => ['required', 'min:3', 'max:10000'],
                    ]);
                    if ($experience_data->fails()) {
                        return response()->json(['error' => 'No valid form works!'], 415);
                    }
                    $oldExperiences[$i]->update($experience[$i]);
                }
                $oldExperiences[$i]->delete();
            }
        }

        $hobbies = $request->hobbyform;
        $oldHobby = $newUser->hobbies;
        if ( count($hobbies) == count($oldHobby) || count($hobbies) >= count($oldHobby) ) {
            foreach ($hobbies as $hobby) {
                $hobby += ['user_id' => $user_id];
                $hobby_data = Validator::make($hobby, [
                    'user_id' => ['required'],
                    'hobby' => ['nullable', 'string', 'max:255']
                ]);
                if ($hobby_data->fails()){
                    return response()->json(['error' => 'No valid form hobby!'], 415);
                }
                else {
                   if (isset($hobby['id'])) {
                        $updateHobby = Hobby::find($hobby['id']);
                        $updateHobby->update($hobby);
                    }
                    Hobby::create($hobby);
                }
            }
        }
        else {
            for ($i=0; $i<count($oldHobby); $i++) {
                if (isset($hobbies[$i])) {
                    $hobbies[$i] += ['user_id' => $user_id];
                    $hobby_data = Validator::make($hobbies[$i], [
                    'user_id' => ['required'],
                    'hobby' => ['nullable', 'string', 'max:255']
                ]);
                if ($hobby_data->fails()) {
                    return response()->json(['error' => 'No valid form hobby!'], 415);
                }
                $oldHobby[$i]->update($hobbies[$i]);
            }
            $oldHobby[$i]->delete();
            }
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
