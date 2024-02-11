@extends('layouts.mastersLayouts')

@section('title_content')
    Daftar Kelas
@endsection

@section('content_page')
    <a href="/classes/create" class="btn btn-primary">Tambah Kelas</a>
    <div class="row mt-2">
        @forelse ($class as $item)
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('images/' . $item->image) }}" height="250px" class="card-img-top">
                    <div class="card-body">
                        <h5>{{ $item->name }}</h5>
                        <p class="card-text">Rp.{{ $item->harga }}</p>
                        <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                        <a href="/admin/detail-kelas/{{ $item->id }}" class="btn btn-info btn-block">Detail</a>
                        <div class="row mt-2">
                            <div class="col-6">
                                <a href="classes/{{$item->id}}/edit" class="btn btn-warning btn-block">Edit</a>
                            </div>
                            <div class="col-6">
                                <form action="/classes/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-block" data-confirm-delete="true" value="Delete">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2>Belum ada Kelas</h2>
        @endforelse
    </div>
@endsection
