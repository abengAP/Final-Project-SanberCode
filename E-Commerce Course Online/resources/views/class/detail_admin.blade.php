@extends('layouts.mastersLayouts')

@section('title_content')
    Detail Kelas
@endsection

@section('content_page')
    <a href="/classes" class="btn btn-secondary">Back</a>
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <img src="{{ asset('images/' . $class->image) }}" class="card-img-top">
                <div class="card-body">
                    <h1>{{ $class->name }}</h1>
                    <p class="font-weight-bold">Rp.{{ $class->harga }}</p>
                    <p class="card-text">{{$class->deskripsi}}</p>
                </div>

                <h3>Peserta</h3>

            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>

                </tr>
              </thead>
              <tbody>
                    @forelse($data as $key=> $value)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$value['name']}}</td>
                        <td>{{$value['email']}}</td>
                        
             
                    </tr>
                    @empty
                        <tr>
                            <td>Data kosong</td>
                        </tr>
                    @endforelse

              </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
