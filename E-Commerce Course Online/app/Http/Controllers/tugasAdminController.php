<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tugas;
use App\Models\Classes;

class tugasAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $classes = Classes::get();
        $tugas = tugas::get();
        return view('tugas.admin.adminListTugas', ['tugas'=>$tugas, 'classes'=>$classes]);
    }

    public function indextugas(Request $request){
        $classes = Classes::where('id',$request->id)->get();
        
        $tugas = tugas::get();
        return view('tugas.admin.adminTugas', ['tugas'=>$tugas, 'classes'=>$classes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $classes = Classes::get();
        $tugas = tugas::get();
        return view ('tugas.admin.adminCreateTugas',['tugas' => $tugas,'classes'=>$classes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namatugas' => 'required|min:2',
            'deskripsi' => 'required',
            'kelas_id' => 'required'
            // 'nilai' => 'nullable',
            // 'catatan' => 'nullable'
        ]);

        $tugas = new tugas;
        $tugas->namatugas = $request->namatugas;
        $tugas->deskripsi = $request->deskripsi;
        $tugas->kelas_id = $request->kelas_id;
        // $tugas->nilai = $request->nilai;
        // $tugas->catatan = $request->catatan;

        $tugas-> save();

        return redirect('/admin/kelas/create')->withSuccess('Tugas berhasil ditambahkan!');
        
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classes = Classes::find($id);
        $tugas = tugas::find($id);
        return view('tugas.admin.adminDetilTugas', ['tugas'=>$tugas, 'classes'=>$classes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tugas = tugas::find($id);
        return view('tugas.admin.adminUpdateTugas',['tugas'=>$tugas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namatugas' => 'required|min:2',
            'deskripsi' => 'required',
            'nilai' => 'required',
            'catatan' => 'required'
        ]);

        $tugas = tugas::find($id);
        $tugas->namatugas = $request['namatugas'];
        $tugas->deskripsi = $request['deskripsi'];
        $tugas->nilai = $request['nilai'];
        $tugas->catatan = $request['catatan'];

        $tugas-> save();

        return redirect('/admin/kelas')->withSuccess('Tugas berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tugas = tugas::find($id);
        $tugas->delete();

        return redirect('/admin/kelas/create');
    }
}
