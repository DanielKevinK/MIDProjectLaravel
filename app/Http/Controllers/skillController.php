<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index(){
        $skill_url = public_path('admin/devicon/devicon.json');
        $skill_data = file_get_contents($skill_url);
        $skill_data = json_decode($skill_data, true);
        $skill = array_column($skill_data, 'name');
        $skill = "'". implode("','", $skill). "'";

        return view('dashboard.skill.skill')->with(['skill'=>$skill]);
    }

    public function update(Request $request){
        $request->validate([
            'language' => 'required',
            'workflow' => 'required'
        ],
        [
            'language.required' => 'Programming Language need to be filled',
            'workflow.required' => 'Workflow need to be filled'
        ]);

        metadata::updateOrCreate(['meta_key' => 'language'], ['meta_value' => $request->language]);
        metadata::updateOrCreate(['meta_key' => 'workflow'], ['meta_value' => $request->workflow]);
    
        return redirect()->route('skill.index')->with('success', 'Skill have been updated');
    }
}
