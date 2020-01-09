<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadPhoto(Request $request)
    {
        // $file = $request->name;
        // dd($request);
        // $file = $request->form['file'];
        //dd($request->file('file'));
        // if($request->hasFile('file')) {
        if ($request->hasFile('file')){
            // dd('Est file');
            //$photo = $request->file->storeAs('storage/files/upload/image', date('dWmYB').'.'.$request->file->extension(), 'public');
            // $resp = $request->file('file')->store('images');
            $resp = $request->file->storeAs('files/upload/image', date('dWmYB').'.'.$request->file->extension(), 'public');
            //dd($resp);
            return $resp;
        }
        else {
            // dd('Net file');
            //$image = $post->image;
            return response()->json(['error' => 'Uuups!'], 500);
        }
        // // // // return "Hello!";
    }

}
