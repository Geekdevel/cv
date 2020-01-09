<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadPhoto(Request $request)
    {
        if ($request->hasFile('file')){
            $resp = $request->file->storeAs('files/upload/image', date('dWmYB').'.'.$request->file->extension(), 'public');
            return $resp;
        }
        else {
            return response()->json(['error' => 'Uuups!'], 500);
        }
    }

}
