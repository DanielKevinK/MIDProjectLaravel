<?php

namespace App\Http\Controllers;

use id;
use App\Models\halaman;
use App\Models\history;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index(){
        $about_id = get_meta_value('about');
        $about_data = halaman::where('id', $about_id)->first();

        $interest_id = get_meta_value('interest');
        $interest_data = halaman::where('id', $interest_id)->first();

        $awards_id = get_meta_value('awards');
        $awards_data = halaman::where('id', $awards_id)->first();

        $experience_data = history::where('tipe','experience')->get();
        $education_data = history::where('tipe','education')->get();

        return view('front.front')->with([
            'about' => $about_data,
            'interest' => $interest_data,
            'awards' => $awards_data,
            'experience' => $experience_data,
            'education' => $education_data
        ]);
    }
}
