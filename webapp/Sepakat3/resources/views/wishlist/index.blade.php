@extends('layouts.app')

@section('content')
<section id="content">
<div class="container mt-5">
    <div class="border-success">
            <div class="card-header bg-success text-white">
            <strong><i class="fa fa-database"></i> Daftar Keinginan </strong>
        </div>
        <div class="card-body">

             @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="table-responsive">

            <table class="table cart">
                <thead>
                    <tr>
                        <th class="cart-product-name">Nama</th>
                        <th class="cart-product-subtotal">Harga Semula</th>
                        <th class="cart-product-subtotal">Harga Tawar</th>
                        <th style="width:10%; height:50px;"  class="cart-product-thumbnail">Gambar</th>
                        <th width="280px" class="cart-product-quantity">Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($aucations as $a)
                    <tr class="cart_item">
                    <td class="cart-product-name">{{ $a->product->nama }}</td>
                    <td class="cart-product-subtotal"><span class="amount">Rp.{{ number_format($a->product->harga, 2) }}</span></td>
                    <td class="cart-product-subtotal"><span class="amount">Rp.{{ number_format($a->harga, 2) }}</span></td>
                    <td class="cart-product-thumbnail"><img class="card-img-top" src="{{asset('images/products/'.$a->product->gambar)}}" alt="" width="50px"></td>
                    <td width="280px" class="cart-product-quantity">
                        <a class="btn" href="{{ route('beranda.show',$a->product->id) }}"><i class="i-rounded i-small icon-tasks"></i></a>
                    </td>
                </tr>
                @endforeach


                </tbody>
            </table>
            </div><br>

        </div>
      </div>
</div>
</section>
<br><br><br><br><br>
<br><br><br><br><br>

@endsection
@section('custom_js')
<script type="text/javascript">
    $(function() {
        load_list(1);
    });
</script>
@endsection
