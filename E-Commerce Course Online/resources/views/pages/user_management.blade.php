@extends('layouts.mastersLayouts')
@section('title_content')
User Management Page
@endsection
@section('content_page')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    @forelse($data as $key=> $value)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$value['name']}}</td>
            <td>{{$value['email']}}</td>
            
            <td>
            <form action="/update-status/{{$value['id']}}" method="post">
                @csrf
                <input type="submit" value="Lihat Kelas" class="btn btn-primary" >
            </form>
            </td>
            <td>
            <form action="/update-status/{{$value['id']}}" method="post">
                @csrf
                @method('put')
                <input type="submit" value="Update Status" class="btn btn-primary" >
            </form>
            </td>

            <td>
            <form action="/delete/{{$value['id']}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete User" class="btn btn-primary" >
            </form>
            </td>
 
        </tr>
        @empty
            <tr>
                <td>Data kosong</td>
            </tr>
        @endforelse
  </tbody>
</table>
@endsection