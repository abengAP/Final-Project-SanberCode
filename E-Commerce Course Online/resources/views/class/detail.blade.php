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
            </div>
        </div>
    </div>
@endsection
