@extends('layouts.app')

@section('content')

<div class="container mt-3">
<div class="border-success">
    <div class="col-lg-12 margin-tb mb-3">
        <div class="pull-left">
            <h2>Data User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('beranda.index') }}"><< Kembali</a>
        </div>
    </div>
</div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
<div class="table-responsive">
  <table class="table cart">
    <tr>
      <th class="cart-product-name">Name</th>
      <th class="cart-product-quantity">Email</th>
      <th class="cart-product-quantity">Action</th>
    </tr>
  @foreach ($data as $key => $user)
    <tr>
      <td class="cart-product-name">{{ $user->name }}</td>
      <td class="cart-product-quantity">{{ $user->email }}</td>
      <td>
        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}

      </td>
    </tr>
  @endforeach
  </table>
{!! $data->render() !!}
</div>
<br><br><br><br><br><br><br>
<br><br><br><br>
@endsection
