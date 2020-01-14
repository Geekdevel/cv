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

class ResumesController extends Controller
{
    public function getProfile(Request $request)
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
        //
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
