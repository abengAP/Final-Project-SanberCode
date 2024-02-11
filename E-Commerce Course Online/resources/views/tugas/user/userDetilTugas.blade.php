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
                  <h6 class="card-title">Catatan</h5>
                  <p class="card-text">{{$tugas->catatan}}</p>
                  
                </div>
              
            </div>
            
        </div>
        
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Link Tugas</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="linktugas">{{$tugas->linktugas}}</textarea>
            </div>

            <div class="container">
                <div class="float-end">
                    <a class="btn btn-success" href="/tugas/{{$tugas->id}}/edit" role="button">Input</a>
                    <a class="btn btn-primary" href="/tugas" role="button">Kembali</a>
                </div>
            </div>
       

      </div>
    </div>
  </div>
@endsection