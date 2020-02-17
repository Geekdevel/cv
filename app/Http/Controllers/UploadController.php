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
            return response()->json(['/storage/'.$resp]);
        }
        else {
            return response()->json(['error' => 'Uuups! Service Unavailable.'], 503);
        }
    }

    public function allLevels()
    {
        return response()->json(['levels' => Level::all()]);
    }

    public function allSkillLevels()
    {
        return response()->json(['skillLevels' => Skill_level::all()]);
    }
}
