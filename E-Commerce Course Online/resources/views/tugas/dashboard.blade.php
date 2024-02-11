@extends('tugas.index')

@section('tittle')
    dashboard
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Kelas Saya</h5>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="../assets/images/products/s4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Laravel</h5>
                            
                            <a href="/tugas" class="btn btn-primary">Masuk Kelas</a>
                        </div>
                    </div>
                </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Daftar Kelas Baru</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">    
            <div class="card">
                <div class="card-header">
                    Featured
                    </div>
                    <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Lihat Daftar Kelas Saya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection