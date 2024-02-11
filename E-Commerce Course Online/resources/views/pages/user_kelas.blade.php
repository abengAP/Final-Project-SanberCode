@extends('layouts.mastersLayouts')
@section('title_content')
Kelas yang diikuti
@endsection
@section('content_page')

<div class="row mt-2">
        <div class="col-12">
            <div class="card">

            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Kelas</th>
                  <th scope="col">Masuk Kelas</th>

                </tr>
              </thead>
              <tbody>
                    @forelse($data as $key=> $value)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$value['name']}}</td>
                        <td>

							<form action="" method="post">
				                @csrf
				                <input type="submit" value="Masuk Kelas" class="btn btn-primary" >
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
            </div>
        </div>
    </div>

@endsection