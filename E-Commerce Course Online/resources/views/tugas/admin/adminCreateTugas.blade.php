@extends('layouts.mastersLayouts')

@section('tittle_content')
    create tugas
@endsection 


@section('content_page')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        <h5 class="card-title fw-semibold mb-4">Forms Input Tugas Baru</h5>
        <div class="card">
          <div class="card-body">

            <form action="/admin/kelas/create" method="POST" id="getform">
                @csrf

                <div class="mb-3">
                  <label class="form-label">Pilih kelas</label>
                  <select class="form-select" name="kelas_id" id="" aria-label="Default select example">

                    @forelse ($classes as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @empty
                        <p>Belum ada Kelas</p>
                    @endforelse
                    
                  </select>

                </div>
                  @error('kelas_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

              <div class="mb-3">
                <label class="form-label">Nama tugas</label>
                <input type="text" class="form-control @error('namatugas') is-invalid @enderror" name="namatugas">
                
              </div>
                @error('namatugas')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              <div class="mb-3">
                <label class="form-label">Deskripsi Tugas</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="exampleFormControlTextarea1" rows="10" name="deskripsi"></textarea>
              </div>
                @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              <div class="form-group">
                <label for="">Nilai</label>
                <input type="number" class="form-control" name="nilai" >
              </div>

            <div class="mb-3">
              <label class="form-label">Catatan</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan"></textarea>
            </div>
              

              <button type="submit" class="btn btn-primary" id="create">Submit</button>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection