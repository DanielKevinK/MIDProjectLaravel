<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{
    private $_tipe;
    function __construct()
    {
        $this->_tipe = 'education';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = history::where('tipe', $this->_tipe)->orderBy('end', 'desc')->get();
        return response(view('dashboard.education.education')->with('data', $data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('dashboard.education.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        Session::flash('start', $request->start);
        Session::flash('end', $request->end);
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'start' => 'required',
            ],
            [
                'judul.required' => 'Title need to be filled',
                'info1.required' => 'University need to be filled',
                'start.required' => 'Start Date need to be filled',
            ]
         );

         $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->_tipe,
            'start' => $request->start,
            'end' => $request->end,
            'isi' => $request->isi
         ];
         history::create($data);

         return response(redirect()->route('education.index')->with('success', 'Your Education Data have been Saved'));
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
        $data = history::where('id',$id)->where('tipe', $this->_tipe)->first();
        return response(view('dashboard.education.edit')->with('data', $data));
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
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'start' => 'required'
            ],
            [
                'judul.required' => 'Title need to be filled',
                'info1.required' => 'Company Name need to be filled',
                'start.required' => 'Start Date need to be filled',
            ]
         );

         $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->_tipe,
            'start' => $request->start,
            'end' => $request->end,
            'isi' => $request->isi
         ];
         history::where('id', $id)->where('tipe', $this->_tipe)->update($data);

         return response(redirect()->route('education.index')->with('success', 'Your Education Data have been Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        history::where('id', $id)->where('tipe', $this->_tipe)->delete();
        return response(redirect()->route('education.index')->with('success', 'Your Education Data have been Deleted'));
    }
}
