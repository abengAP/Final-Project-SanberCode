@extends('layouts.mastersLayouts')
@section('title_content')
Update Your Profile
@endsection
@section('content_page')
<div class="card">
                <div class="card-body">
                  <form action="/update/{{$data->id}}" method="post">
                    @csrf
                    @method('put')
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="name" value="{{$data->name}}">
                  </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$data->email}}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputtext1" class="form-label">Address</label>
                        <textarea class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="address">{{$data_profile->alamat}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
@endsection