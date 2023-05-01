<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    function index(){
        return view('dashboard.profile.profile');
    }

    function update(Request $request){
        $request->validate([
            'foto' => 'mimes:jpeg,jpg,png,gif',
            'email' => 'required|email'
        ],
        [
            'foto.mimes' => 'Please insert picture with format of JPG, JPEG, PNG or GIF',
            'email.required' => 'Email must be filled',
            'email.email' => 'Email format is invalid, please insert email format correctly'
    ]);

    if($request->hasFile('foto')){
        $foto_file = $request->file('foto');
        $foto_format = $foto_file->extension();
        $new_foto = date('ymdhis'). ".$foto_format";
        $foto_file->move(public_path('picture'), $new_foto);
       
        // Deleting old Photo
        $old_foto = get_meta_value('foto');
        File::delete(public_path('picture'). "/".$old_foto);

        metadata::updateOrCreate(['meta_key'=> 'foto'], ['meta_value'=>$new_foto]);
    }
        metadata::updateOrCreate(['meta_key'=> 'kota'], ['meta_value'=>$request->kota]);
        metadata::updateOrCreate(['meta_key'=> 'provinsi'], ['meta_value'=>$request->provinsi]);
        metadata::updateOrCreate(['meta_key'=> 'phone_number'], ['meta_value'=>$request->phone_number]);
        metadata::updateOrCreate(['meta_key'=> 'email'], ['meta_value'=>$request->email]);

        // Social Media
        metadata::updateOrCreate(['meta_key'=> 'facebook'], ['meta_value'=>$request->facebook]);
        metadata::updateOrCreate(['meta_key'=> 'twitter'], ['meta_value'=>$request->twitter]);
        metadata::updateOrCreate(['meta_key'=> 'linkedIn'], ['meta_value'=>$request->linkedIn]);
        metadata::updateOrCreate(['meta_key'=> 'github'], ['meta_value'=>$request->github]);

        return redirect()->route('profile.index')->with('success', 'Profile have been Updated');
    }
}
