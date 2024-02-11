@extends('layouts.mastersLayouts')

@section('title_content')
    Detil
@endsection

@section('content_page')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        <h5 class="card-title fw-semibold mb-4">Input Link</h5>
        <div class="card">
          <div class="card-body">

            <form action="/tugas/{{$tugas->id}}" method="POST">
                @csrf
                @method('put')
              
                <div class="mb-3">
                  <label class="form-label">Link Tugas</label>
                  <textarea class="form-control @error('linktugas') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="linktugas">{{$tugas->linktugas}}</textarea>
                </div>

                @error('linktugas')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection


