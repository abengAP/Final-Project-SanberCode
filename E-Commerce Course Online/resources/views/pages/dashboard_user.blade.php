@extends('layouts.mastersLayouts')
@section('title_content')
Welcome {{ Auth::user()->name }}
@endsection
@section('content_page')


    <div class="card-body"><form action="/update-profile" method="post">
        @csrf    
        <button type="submit" name="id" value='{{ Auth::user()->id }}' class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Update Profile</button>
    </form></div>

  @if($data->superadmin_status==2)
  <div class="card-body" style="visibility: visible;"><a href="/user-management" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">User Management</a>
      </div>  
      <div class="card-body" style="visibility: visible;"><a href="/classes" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Kelas Management</a>
      </div>  
      <div class="card-body" style="visibility: visible;"><a href="/admin/kelas" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Tugas Management</a>
      </div>
  @else
    <div class="card-body" style="visibility: hidden;"><a href="/user-management" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">User Management false</a>
      </div>

          <div class="container-fluid">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Kelas Saya</h5>
              <div class="row">
                @if($class_quantity<1)
                <div class="col-md-4">
                      <div class="card">
                        <div class="card-header">
                        Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="/explore" class="btn btn-primary">Explore Kelas</a>
                        </div>
                    </div>
                  </div>
                @else
                <div class="col-md-4">
                      <div class="card">
                          <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h5 class="card-title">{{ $item->name }}</h5>
                              
                              <a href="/tugas" class="btn btn-primary">Masuk Kelas</a>
                          </div>
                      </div>
                  </div>
                @endif
                  
              <div class="col-md-4">
              <div class="card">
                  <div class="card-header">
                  Featured
                  </div>
                  <div class="card-body">
                      <h5 class="card-title">Pilih kelas yang diinginkan</h5>
                      <p class="card-text">Pilih kelas sesuai minat</p>
                      <a href="/explore" class="btn btn-primary">Explore Kelas</a>
                  </div>
              </div>
          </div>
          {{-- <div class="col-md-4">    
              <div class="card">
                  <div class="card-header">
                      Featured
                      </div>
                      <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="/uji" class="btn btn-primary">Lihat Daftar Kelas Saya</a>
                  </div>
              </div>
          </div> --}}
      </div>
  </div>

  @endif





@endsection