@extends('layouts.mastersLayouts')

@section('title_content')
    Daftar tugas
@endsection


@section('content_page')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        <table class="table table-borderless">
                
            <caption>List Tugas</caption>
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Tugas</th>
                <th scope="col">Nilai</th>
                
                <th scope="col">Action</th>
                
                </tr>
            </thead>
            <tbody>
                @forelse ($tugas as $key => $item)
                    <tr>
                        <td>
                            {{$key+1}}
                        </td>
                        <td>
                            {{$item->namatugas}}
                        </td>
                        <td>
                            {{$item->nilai}}
                        </td>
                        
                        <td scope ="row" width="100">
                            <a class="btn btn-success" href="/tugas/{{$item->id}}" role="button">Detail</a>
                        </td>
        
                    </tr>
                    @empty
                        <tr>
                            <td>
                                Belum ada tugas
                            </td>
                        </tr>
                    @endforelse
            </tbody>
        </table>

        <div class="card-body">
            <h5 class="card-title">Summary</h5>
            <p class="card-text">
                @php
                    $temp = 0;
                    foreach ($tugas as $nilai){
                        
                        $temp += $nilai->nilai ;
                        
                    }
                    if ($temp == 0) {
                        echo "-";
                    }else{
                        $temp /= sizeof($tugas);
                        $total = number_format($temp,2);
                        echo $total;
                    }
                @endphp

            </p>
            
        </div>

      </div>
    </div>
  </div>
@endsection

