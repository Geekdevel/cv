<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Skill_level;

class UploadController extends Controller
{
    public function uploadPhoto(Request $request)
    {
        if ($request->hasFile('file')){
            $resp = $request->file->storeAs('/files/upload/image', date('dWmYB').'.'.$request->file->extension(), 'public');
            return '/storage/'.$resp;
        }
        else {
            return response()->json(['error' => 'Uuups!'], 500);
        }
    }

    public function allLevels()
    {
        $levels = Level::all();
        return $levels;
    }

    public function allSkillLevels()
    {
        $skillLevels = Skill_level::all();
        return $skillLevels;
    }
}
