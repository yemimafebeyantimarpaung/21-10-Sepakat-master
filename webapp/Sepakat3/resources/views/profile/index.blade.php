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
          <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
          <p class="text-muted text-center">Member sejak :{{ Auth::user()->created_at }}</p>
          <hr>
          <strong>
            <i class="fas fa-map-marker mr-2"></i>
            Alamat
          </strong>
          <p class="text-muted">
          {{ Auth::user()->alamat }}
          </p>
          <hr>
          <strong>
            <i class="fas fa-envelope mr-2"></i>
            Email
          </strong>
          <p class="text-muted">
          {{ Auth::user()->email }}
          </p>
          <hr>
          <strong>
            <i class="fas fa-phone mr-2"></i>
            No Tlp
          </strong>
          <p class="text-muted">
          {{ Auth::user()->no_telp }}
          </p>
          <hr>
          <a href="{{ URL::to('/setting') }}" class="btn btn-primary btn-block">Setting</a>
        </div>
      </div>      
    </div>
    @if(Auth::user()->role == "Supplier")
    <div class="col col-lg-8 col-md-8">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">History Transaksi</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Sub Total</th>
                  <th>Diskon</th>
                  <th>Ongkir</th>
                  <th>Total</th>
                  <th>Status Pembayaran</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    1
                  </td>
                  <td>
                    Inv-01
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    0                  
                  </td>
                  <td>
                    27.000
                  </td>
                  <td>
                    227.000
                  </td>
                  <td>
                    Belum dibayar
                  </td>
                  <td>
                    Checkout
                </tr>
                <tr>
                  <td>
                    2
                  </td>
                  <td>
                    Inv-02
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    0                  
                  </td>
                  <td>
                    27.000
                  </td>
                  <td>
                    227.000
                  </td>
                  <td>
                    Belum dibayar
                  </td>
                  <td>
                    Checkout
                </tr>
                <tr>
                  <td>
                    3
                  </td>
                  <td>
                    Inv-03
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    0                  
                  </td>
                  <td>
                    27.000
                  </td>
                  <td>
                    227.000
                  </td>
                  <td>
                    Belum dibayar
                  </td>
                  <td>
                    Checkout
                  </td>
                 
                </tr>
                <tr>
                  <td>
                    4
                  </td>
                  <td>
                    Inv-04
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    0                  
                  </td>
                  <td>
                    27.000
                  </td>
                  <td>
                    227.000
                  </td>
                  <td>
                    Belum dibayar
                  </td>
                  <td>
                    Checkout
                  </td>
                 
                </tr>
                <tr>
                  <td>
                    5
                  </td>
                  <td>
                    Inv-05
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    0                  
                  </td>
                  <td>
                    27.000
                  </td>
                  <td>
                    227.000
                  </td>
                  <td>
                    Belum dibayar
                  </td>
                  <td>
                    Checkout
                  </td>
                
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection