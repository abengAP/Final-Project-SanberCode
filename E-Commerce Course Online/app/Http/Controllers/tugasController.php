<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tugas;
class tugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugas = tugas::get();
        return view('tugas.user.userDaftarTugas',['tugas'=>$tugas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $tugas = tugas::find($id);
        return view('tugas.user.userDetilTugas',['tugas'=>$tugas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tugas = tugas::find($id);
        return view('tugas.user.userInputTugas',['tugas'=>$tugas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'linktugas' => 'required'
        ]);

        $tugas = tugas::find($id);
        $tugas->linktugas = $request['linktugas'];

        $tugas->save();

        return redirect('/tugas')->withSuccess('Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
