<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use App\Models\Level;
use App\Models\User;
use App\Models\Profile;
use App\Models\Address;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Hobby;
use App\Models\Field;
use Illuminate\Support\Facades\Validator;
use PDF;
use App\Http\Requests\StoreResume;

class ResumesController extends Controller
{
    public function getPdf(Request $request, $slug)
    {
        $user = auth()->user();
        $slug = $request->slug;
        $resume = Resume::slug($slug);
        $data = [
            'user' => $user,
            'resume' => $resume,
        ];
        return PDF::loadView('layouts/dliaPDF', $data)->stream('download.pdf');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResume $request)
    {
        $user = auth()->user();
        $user_id = $user->id;
        $validated = $request->validated();
        $slug = $validated['slug'];
        if(count($user->resumes) < 3 || !isset($user->resumes)) {
            $validated += ['user_id' => $user_id];
            Resume::create($validated);
            return response()->json(['success' => 'Resume '.$slug.' user`s '.$user->name.' created!'], 201);
        }
        else{
            return response()->json(['error' => 'Resume '.$slug.' user`s '.$user->name.' no created! You already have three resumes!'], 409);
        }
    }

    public function getResume(Request $request)
    {
        $slug = $request->slug;
        $resume = Resume::slug($slug);
        return response()->json(['slug' => $resume->slug, 'job_title' => $resume->job_title, 'description' => $resume->description], 200);
    }

    public function publicShowResume(Request $request, $slug)
    {
        $resume = Resume::slug($slug);
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
    public function update(StoreResume $request, $slug)
    {
        $resume = Resume::slug($slug);
        if ($resume->user->id == auth()->user()->id) {
            $validated = $request->validated();
            $resume->update($validated);
            return response()->json(['success' => 'Resume '.$resume->slug.' update!'], 201);
        }
        else {
            return response()->json(['error' => 'Unauthorized!'], 401);
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
        if ($resume->user->id == auth()->user()->id) {
            $resume->delete();
            $resumes = auth()->user()->resumes;
            return $resumes;
        }
        else {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

    }
}
