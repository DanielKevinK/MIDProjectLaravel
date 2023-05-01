<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class controllerPage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = halaman::orderBy('judul', 'asc')->get();
        return response(view('dashboard.halaman.page')->with('data', $data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('dashboard.halaman.create'));
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
        Session::flash('isi', $request->isi);

        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Title need to be filled',
                'isi.required' => 'Content need to be filled'
            ]
         );

         $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
         ];
         halaman::create($data);

         return response(redirect()->route('halaman.index')->with('success', 'Your Data have been Saved'));
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
        $data = halaman::where('id',$id)->first();
        return response(view('dashboard.halaman.edit')->with('data', $data));
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
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Title need to be filled',
                'isi.required' => 'Content need to be filled'
            ]
         );

         $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
         ];
         halaman::where('id', $id)->update($data);

         return response(redirect()->route('halaman.index')->with('success', 'Your Data have been Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        halaman::where('id', $id)->delete();
        return response(redirect()->route('halaman.index')->with('success', 'Your Data have been Deleted'));
    }
}
