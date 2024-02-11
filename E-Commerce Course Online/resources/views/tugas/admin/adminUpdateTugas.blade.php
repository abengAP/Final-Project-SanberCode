@extends('layouts.mastersLayouts')

@section('title_content')
    update tugas {{$tugas->id}}
@endsection

@section('content_page')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        <h5 class="card-title fw-semibold mb-4">Forms Update Tugas</h5>
        <div class="card">
          <div class="card-body">

            <form action="/admin/tugas/{{$tugas->id}}" method="POST">
                @csrf
                @method('put')
              <div class="mb-3">
                <label class="form-label">Nama tugas</label>
                <input type="text" class="form-control @error('namatugas') is-invalid @enderror" value="{{$tugas->namatugas}}" name="namatugas">
                
              </div>
                @error('namatugas')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              <div class="mb-3">
                <label class="form-label">Deskripsi Tugas</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="10" name="deskripsi">{{$tugas->deskripsi}}</textarea>
              </div>
                @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="">Nilai</label>
                    <input type="number" class="form-control" name="nilai" value="{{$tugas->nilai}}">
                  </div>
    
                <div class="mb-3">
                  <label class="form-label">Catatan</label>
                  <textarea class="form-control @error('catatan') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="catatan">{{$tugas->catatan}}</textarea>
                </div>

                @error('catatan')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection