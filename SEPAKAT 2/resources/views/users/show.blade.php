@extends('layouts.app')

@section('content')
<div class="container mt-4">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        @can('role-create')
                <strong><h2>Data User</h2></strong>
        @else
                <strong><h2>Data Anda</h2></strong>
        @endif
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.index') }}"><< Kembali</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div><br><br>
    </div><br><br>
</div><br><br><br>
</div><br><br><br>
<br><br><br><br>
@endsection
