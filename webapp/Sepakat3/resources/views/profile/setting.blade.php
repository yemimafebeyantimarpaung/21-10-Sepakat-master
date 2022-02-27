@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-4 col-md-4">
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img src="{{ Storage::url(Auth::user()->gambar) }}" alt="profil" class="profile-user-img img-responsive img-circle">
          </div>
          <form action="{{ url('/imageprofile') }} " method="POST">
          @csrf
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <input type="file" name="gambar" id="gambar">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </div>
          </form>
          <hr>
          <form action="{{ url('/setting/update') }}" method="POST">
          @csrf
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}"> 
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" name="alamat" id="alamat" class="form-control" value="{{ Auth::user()->alamat }}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
            </div>
            <div class="form-group">
              <label for="no_telp">Nomor Telephone</label>
              <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ Auth::user()->no_telp }}">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>      
    </div>
  </div>
</div>
@endsection