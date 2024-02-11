<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\list_kelas;
use Illuminate\Http\Request;
use File;
use Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\profileModel;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = Classes::all();

        $title = 'Hapus Kelas';
        $text = 'Apakah Kamu Yakin ingin menghapus kelas?';
        confirmDelete($title, $text);

        return view('class.tampil', ['class' => $class]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = Classes::all();
        return view('class.create', ['class' => $class]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $class = new Classes();

        $class->name = $request->input('nama');
        $class->harga = $request->input('harga');
        $class->deskripsi = $request->input('deskripsi');
        $class->image = $imageName;


        $class->save();
        Alert::success('Succes','Berhasil Menambahkan Kelas');

        return redirect('/classes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Classes::find($id);

        return view('class.detail', ['class' => $class]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classes::find($id);

        return view('class.edit', ['class' => $class]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $class = Classes::find($id);

        if ($request->has('image')) {
            $path = 'images/';
            File::delete($path . $class->image);

            $newimageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $newimageName);
            $class->image = $newimageName;
        }
        $class->name = $request->input('nama');
        $class->harga = $request->input('harga');
        $class->deskripsi = $request->input('deskripsi');

        $class->save();

        Alert::success('Succes','Berhasil Mengubah   Kelas');

        return redirect('/classes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = Classes::find($id);

        $path = 'images/';
        File::delete($path . $class->image);

        $class->delete();

        return redirect('/classes');
    }


    public function lihat_kelas(){
        $class = Classes::all();
        return view('pages.lihat_kelas', ['class' => $class]);
    }

    public function masuk_kelas(Request $request){
        $list_kelas = new list_kelas;
        $list_kelas->user_kelas_id = Auth::id();
        $list_kelas->kelas_user_id = $request->kelas_id;

        $list_kelas->save();

        return redirect('/explore');
    }


    public function show_detail_admin($id)
    {
        $class = Classes::find($id);

        $data_peserta = list_kelas::where('kelas_user_id',$id)->get();

        $contain = array();

        for($i=0; $i<sizeof($data_peserta); $i++){
            $data_user = User::where('id', $data_peserta[$i]->user_kelas_id)->first();
            array_push($contain,
                ["name"=>$data_user->name,
                "email"=>$data_user->email,
                "id"=>$data_user->id]
            );
        }

        return view('class.detail_admin', ['class' => $class, "data"=>$contain]);
    }

    public function show_user_detail_admin(){
        $data_kelas = list_kelas::where('user_kelas_id',Auth::id())->get();

        $contain = array();

        for($i=0; $i<sizeof($data_kelas); $i++){
            $data_kelas_db = Classes::where('id', $data_kelas[$i]->kelas_user_id)->first();
            array_push($contain,
                ["name"=>$data_kelas_db->name,
                "price"=>$data_kelas_db->email,
                "id"=>$data_kelas[$i]->kelas_user_id
            ]
            );


            return view('pages.user_kelas', ["data"=>$contain]);
        }
    }


}
