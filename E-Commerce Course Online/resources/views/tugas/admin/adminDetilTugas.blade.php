@extends('layouts.mastersLayouts')

@section('title_content')
    Detil 
@endsection

@section('content_page')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title fw-semibold mb-4">{{$tugas->namatugas}}</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$tugas->deskripsi}}</p>
                </div>
                
                <div class="row">
                    <div class="col-sm-3">
                      
                        <div class="card-body">
                          <h5 class="card-title">Nilai</h5>
                          <p class="card-text">{{$tugas->nilai}}</p>
                          
                        </div>
                      
                    </div>
                    <div class="col-sm-8">
                      
                        <div class="card-body">
                          <h5 class="card-title">Catatan</h5>
                          <p class="card-text">{{$tugas->catatan}}</p>
                          
                        </div>
                      
                    </div>

                    <div class="col-sm-8">
                      
                        <div class="card-body">
                          <h5 class="card-title">Link tugas</h5>
                          <p class="card-text">{{$tugas->linktugas}}</p>
                          
                        </div>
                      
                    </div>
                </div>
                
            </div>

            <div class="container">
                <div class="float-end">
                    <a class="btn btn-success" href="/admin/{{$tugas->id}}/edit" role="button">Update</a>
                    <a class="btn btn-primary" href="/admin/kelas" role="button">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection