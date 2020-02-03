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
use App\Models\Field;
use Illuminate\Support\Facades\Validator;
use PDF;

class ResumesController extends Controller
{
    public function getPdf(Request $request, $slag)
    {
        $user = auth()->user();
        $slag = $request->slag;
        $resume = Resume::slag($slag);
        // $pre_url = explode('/', $user->profile->photo);
        // $p_url = array_splice($pre_url, 2);
        // $url = storage_path(implode('/', $p_url));
        // dd($url);
        // dd(storage_path($user->profile->photo));
        // dd($resume->description);
        // return PDF::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        $data = [
            'user' => $user,
            'resume' => $resume,
            // 'url' => $url
        ];
        // dd(storage_path($data['user']->profile->photo));
        //dd($data);
        //return PDF::loadView('layouts/dliaPDF', $data)->stream('download.pdf');
        return PDF::loadView('layouts/newPDF', $data)->stream('download.pdf');
        //return view('layouts/newPDF', compact('user', 'resume', 'url'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $resumes = $user->resumes;
        return $resumes;
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
        $user = auth()->user();
        $resume = $request->resumeform;
        $slug = $resume['slag'];
        if(count($user->resumes) < 3 || !isset($user->resumes)) {
            $user_id = $user->id;

            $resume += ['user_id' => $user_id];
            $resume_data = Validator::make($resume, [
                'user_id' => ['required'],
                'slag' => ['string', 'min:3', 'max:255'],
                'job_title' => ['string', 'min:3', 'max:100'],
                'description' => ['string', 'min:3', 'max:10000']
            ]);
            if ($resume_data->fails()){
                return response()->json(['error' => 'No valid form resume!'], 409);
            }
            else {
                Resume::create($resume);
                return response()->json(['success' => 'Resume '.$slug.' user`s '.$user->name.' created!'], 201);
            }
        }
        else{
            return response()->json(['error' => 'Resume '.$slug.' user`s '.$user->name.' no created! You already have three resumes!'], 409);
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

    public function getResume(Request $request)
    {
        $slag = $request->slag;
        $resume = Resume::slag($slag);
        return response()->json(['slag' => $resume->slag, 'job_title' => $resume->job_title, 'description' => $resume->description], 200);
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

    public function publicShowResume(Request $request, $slag)
    {
        $resume = Resume::slag($slag);
        $user = $resume->user;
        return view('resume', ['resume' => $resume, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slag)
    {
        // dd($slag);
        $resume = Resume::slag($slag);
        // dd($slag);
        $update_resume['job_title'] = $request->resumeform['job_title'];
        $update_resume['description'] = $request->resumeform['description'];
        $update_resume['user_id'] = $resume->user_id;
        $update_resume['slag'] = $resume->slag;
        // dd($resume);
        $resume_data = Validator::make($update_resume, [
            'user_id' => ['required'],
            'slag' => ['string', 'min:3', 'max:255'],
            'job_title' => ['string', 'min:3', 'max:100'],
            'description' => ['string', 'min:3', 'max:10000']
        ]);
        if ($resume_data->fails()){
                return response()->json(['error' => 'No valid form resume!'], 409);
            }
            else {
                $resume->update($update_resume);
                return response()->json(['success' => 'Resume '.$resume->slag.' update!'], 201);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $resume)
    {
        $resume->delete();
        $resumes = auth()->user()->resumes;
        return $resumes;
    }
}
