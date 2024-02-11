@extends('layouts.mastersLayouts')

@section('tittle_content')
    List tugas
@endsection

@section('content_page')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">

            <table class= "table table-borderless w-fixed">
                <caption>list kelas</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">kelas</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classes as $kelas =>$kls)
                        <tr>
                            <td>
                                {{$kelas+1}}
                            </td>
                            <td>
                                {{$kls->name}}
                            </td>
                            <td width="200">
                                <a class="btn btn-primary" href="/admin/kelas/create" role="button">Masuk</a>
                            </td>
                        </tr>
                    @empty
                        <p>Belum ada kelas yang dibuat</p>
                    @endforelse
                </tbody>
            </table>

        </div>
        
      </div>
    </div>
  </div>
@endsection