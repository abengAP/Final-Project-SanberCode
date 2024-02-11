@extends('layouts.mastersLayouts')

@section('title_content')
Edit Class
@endsection

@section('content_page')
    <form action="/classes/{{$class->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{$class->name}}" name="nama">
        </div>
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" value="{{$class->harga}}" name="harga">
        </div>
        @error('harga')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group mb-2">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="3">{{$class->deskripsi}}</textarea>
        </div>
        @error('deskripsi')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group mb-2">
            <label for="image">Gambar</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
        </div>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
