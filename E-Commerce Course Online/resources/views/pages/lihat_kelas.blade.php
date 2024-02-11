@extends('layouts.mastersLayouts')
@section('title_content')
Explore Kelas
@endsection
@section('content_page')
<div class="row mt-2">
        @forelse ($class as $item)
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('images/' . $item->image) }}" height="250px" class="card-img-top">
                    <div class="card-body">
                        <h5>{{ $item->name }}</h5>
                        <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                        <a href="classes/{{ $item->id }}" class="btn btn-info btn-block">Detail</a>
                        <div class="row mt-2">
                            <div class="col-6">
                                <form action="/tambah-kelas" method="POST">
                                    @csrf
                                    <button type="submit" name="kelas_id" value='{{ $item->id }}' class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Tambah Kelas</button>
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
