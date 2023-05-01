<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\metadata;
use Illuminate\Http\Request;

class pageSettingController extends Controller
{
    function index(){
        $datahalaman = halaman::orderBy('judul','asc')->get(); 
        return view('dashboard.pageSetting.pageSetting')->with('datahalaman', $datahalaman);
    }
    function update(Request $request){
        metadata::updateOrCreate(['meta_key'=>'about'], ['meta_value' => $request->about]);
        metadata::updateOrCreate(['meta_key'=>'interest'], ['meta_value' => $request->interest]);
        metadata::updateOrCreate(['meta_key'=>'awards'], ['meta_value' => $request->awards]);

        return redirect()->route('settings.index')->with('success', 'Your Setting have been updated');
    }
}
