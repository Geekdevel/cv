<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadPhoto(Request $request)
    {
        // $file = $request->name;
        // dd("$request");
        if($request->hasFile('file')) {
            dd('Est file');
            // $photo = $request->file->storeAs('images',date('dWmYB').'.'.$request->file->extension(),'public');
            // return $photo;
        }
        else {
            dd('Net file');
            //$image = $post->image;
            // return response()->json(['error' => 'Uuups!'], 500);
        }
        // // return "Hello!";
    }

}
