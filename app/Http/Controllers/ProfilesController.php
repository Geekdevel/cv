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
use App\Http\Requests\StoreUserProfile;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function createOrUpdateOrDelete($oldEntity, $newEntity, $model, $user_id, $hobby = false)
    {
        $x = count($oldEntity);
        $y = count($newEntity);

        if ( $y >= $x ) {
            for ( $i=0; $i < $y; $i++) {
                if (isset($newEntity[$i]['id']) && isset($oldEntity[$i]->id) && $newEntity[$i]['id'] == $oldEntity[$i]->id) {

                    if ($hobby) {
                        if ( !isset($newEntity[$i]['hobby']) ) {
                            $model::find($newEntity[$i]['id'])->delete();
                        }
                        else {
                            $updateEntity = $model::find($oldEntity[$i]->id);
                            $updateEntity->update($newEntity[$i]);
                        }
                    }
                    else {
                        $updateEntity = $model::find($oldEntity[$i]->id);
                        $updateEntity->update($newEntity[$i]);
                    }
                }
                else {
                    if (isset($oldEntity[$i]->id)) {
                        $model::find($oldEntity[$i]->id)->delete();
                    }
                    if ($hobby) {
                        if (isset($newEntity[$i]['hobby'])) {
                            $newEntity[$i] += ['user_id' => $user_id];
                            $model::create($newEntity[$i]);
                        }
                    }
                    else {
                        $newEntity[$i] += ['user_id' => $user_id];
                        $model::create($newEntity[$i]);
                    }
                }
            }
        }
        else {
            for ( $i = 0; $i < $x; $i++) {
                if (isset($newEntity[$i]['id']) && isset($oldEntity[$i]->id) && $newEntity[$i]['id'] == $oldEntity[$i]->id) {

                    if ($hobby) {
                        if ( !isset($newEntity[$i]['hobby']) ) {
                            $model::find($newEntity[$i]['id'])->delete();
                        }
                        else {
                            $updateEntity = $model::find($oldEntity[$i]->id);
                            $updateEntity->update($newEntity[$i]);
                        }
                    }
                    else {
                        $updateEntity = $model::find($oldEntity[$i]->id);
                        $updateEntity->update($newEntity[$i]);
                    }
                }
                else {
                    if ($hobby) {
                        if (isset($newEntity[$i]['hobby'])) {
                            $newEntity[$i] += ['user_id' => $user_id];
                            $model::create($newEntity[$i]);
                        }
                    }
                    elseif (isset($newEntity[$i])) {
                        $newEntity[$i] += ['user_id' => $user_id];
                        $model::create($newEntity[$i]);
                    }

                    $model::find($oldEntity[$i]->id)->delete();
                }
            }
        }
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
     * @param  StoreUserProfile  $request
     * @return Response
     */
    public function store(StoreUserProfile $request)
    {
        $validated = $request->validated();
        $user_id = auth()->user()->id;

        User::find($user_id)->update($validated['user']);

        $validated['profileform'] += ['user_id' => $user_id];
        Profile::create($validated['profileform']);

        $validated['addressform'] += ['user_id' => $user_id];
        Address::create($validated['addressform']);

        if (isset($validated['projectsform'])) {
            $validated['projectsform'] += ['user_id' => $user_id];
            Project::create($validated['projectsform']);
        }

        if (isset($validated['hobbyform'])) {
            foreach ($validated['hobbyform'] as $hobby) {
                $hobby += ['user_id' => $user_id];
                Hobby::create($hobby);
            }
        }


        foreach ($validated['lenguageform'] as $lenguage) {
            $lenguage += ['user_id' => $user_id];
            Language::create($lenguage);
        }

        foreach ($validated['skillform'] as $skill) {
            $skill += ['user_id' => $user_id];
            Skill::create($skill);
        }

        foreach ($validated['educationform'] as $education) {
            $education += ['user_id' => $user_id];
            Education::create($education);
        }

        foreach ($validated['experienceform'] as $experience) {
            $experience += ['user_id' => $user_id];
            Experience::create($experience);
        }

        return response()->json(['success' => 'success'], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserProfile $request, $id)
    {
        $validated = $request->validated();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user->update($validated['user']);

        Profile::find($id)->update($validated['profileform']);

        $user->address->update($validated['addressform']);

        if (isset($validated['projectsform'])) {
            if (isset($user->projects)) {
                $user->projects->update($validated['projectsform']);
            }
            else {
                $validated['projectsform'] += ['user_id' => $user_id];
                Project::create($validated['projectsform']);
            }
        }

        $model = new Language;
        $this->createOrUpdateOrDelete($user->languages, $validated['lenguageform'], $model, $user_id);

        $modelSkill = new Skill;
        $this->createOrUpdateOrDelete($user->skills, $validated['skillform'], $modelSkill, $user_id);

        $modelEducation = new Education;
        $this->createOrUpdateOrDelete($user->education, $validated['educationform'], $modelEducation, $user_id);

        $modelExperience = new Experience;
        $this->createOrUpdateOrDelete($user->experiences, $validated['experienceform'], $modelExperience, $user_id);

        $modelHobby = new Hobby;
        $this->createOrUpdateOrDelete($user->hobbies, $validated['hobbyform'], $modelHobby, $user_id, true);

        return response()->json(['success' => 'success'], 201);
    }
}
