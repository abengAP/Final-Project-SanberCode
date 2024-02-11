@extends('layouts.mastersLayouts')

@section('title_content')
    List tugas
@endsection

 

@section('content_page')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">

            <table class="table table-borderless w-fixed ">
                <caption>List Tugas</caption>
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Tugas</th>
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
                        
                        <td scope ="row" width="200">
                            <form action="/admin/kelas/{{$item->id}}" method="post">
                                @csrf
                                @method('delete')
                                <a class="btn btn-success" href="/admin/tugas/{{$item->id}}" role="button">Detail</a>
                                
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                            
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
        
            <a class="btn btn-primary" href="/admin/create" role="button">Tambah Tugas</a>
        </div>
        
      </div>
    </div>
  </div>
@endsection