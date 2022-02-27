@extends('layouts.app')

@section('content')
<section id="content">
<div class="container mt-5">
    <div class="border-success">
            <div class="card-header bg-success text-white">
            <strong><i class="fa fa-database"></i> Produk Anda </strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-title float-left">Etalase Produk Anda</h5>
                        <a class="btn btn-success float-right mb-3" href="{{ route('products.create') }}"><i class="icon-plus"></i> Tambah Produk</a>
                    
                </div>
            </div>

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
                        <th class="cart-product-subtotal">Harga</th>
                        <th style="width:10%; height:50px;"  class="cart-product-thumbnail">Gambar</th>
                        <th width="280px" class="cart-product-quantity">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                <tr class="cart_item">
                    <td class="cart-product-name">{{ $product->nama }}</td>
                    <td class="cart-product-subtotal"><span class="amount">Rp.{{ number_format($product->harga, 2) }}</span></td>
                    <td class="cart-product-thumbnail"><img class="card-img-top" src="{{asset('images/products/'.$product->gambar)}}" alt="" width="50px"></td>
                    <td width="280px" class="cart-product-quantity">
                        <a class="btn" href="{{ route('products.show',$product->id) }}"><i class="i-rounded i-small icon-tasks"></i></a>
                       
                        <a class="btn" href="{{ route('products.edit',$product->id) }}"><i class="i-rounded i-small icon-edit"></i></a>
                        
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                                    <i class="i-rounded i-small icon-remove"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        Apakah anda yakin ingin menghapus produk ini?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                            </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div><br>
            {!! $products->links() !!}
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
