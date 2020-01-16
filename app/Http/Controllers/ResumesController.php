<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
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
use PDF;

class ResumesController extends Controller
{
    public function getProfile(Request $request)
    {
        $user = auth()->user();
        $profile = $user->profile;
        $lenguages = $user->languages;
        $address = $user->address;
        $educations = $user->educations;
        $hobbi = $user->hobbis;
        $skills = $user->skills;
        $works = $user->works;
        $projects = $user->projects;

        return response()->json([
            'profile' => $profile,
            'lenguages' => $lenguages,
            'address' => $address,
            'educations' => $educations,
            'hobbi' => $hobbi,
            'skills' => $skills,
            'works' => $works,
            'projects' => $projects
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
        // dd($request->resumeform);
        $user = auth()->user();
        if(count($user->resumes) < 3 || !isset($user->resumes)) {
            $user_id = $user->id;

            $resume = $request->resumeform;
            // dd($profile);
            $resume += ['user_id' => $user_id];
            $resume_data = Validator::make($resume, [
                'user_id' => ['required'],
                'slag' => ['string', 'min:3', 'max:255'],
                'job_title' => ['string', 'min:3', 'max:100'],
                'description' => ['string', 'min:3', 'max:100']
            ]);
            if ($resume_data->fails()){
                return response()->json(['error' => 'No valid form resume!'], 500);
            }
            else {
                // Resume::create($resume);
                // return redirect('/master');

                // $profile = $request->profileform;
                // $educations = $request->educationform;
                // $lenguages = $request->lenguageform;
                // $hobbis = $request->hobbiform;
                // $experience = $request->experienceform;
                // $skills = $request->skillform;

                //create PDF
                // PDF::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
                $data = [
                    'user' => $user,
                    'profile' => $request->profileform,
                    'educations' => $request->educationform,
                    'lenguages' => $request->lenguageform,
                    'hobbis' => $request->hobbiform,
                    'experience' => $request->experienceform,
                    'skills' => $request->skillform,
                    'resume' => $resume,
                    'projects' => $request->projectsform
                ];
                // dd($data);
                // $pdf = PDF::loadView('layouts/pdf', $data);
                $pdf = PDF::loadView('layouts/pdf', $data)->save(storage_path('/pdf/').date('dWmYB').'.pdf');
                // dd($pdf);
                // return $pdf->stream();

            }
        }
        else{
            // return redirect('/master');
        }
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
        //
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
