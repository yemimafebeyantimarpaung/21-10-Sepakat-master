@extends('layouts.app')

@section('content')
<div class="container mt-3">

        <!-- Show  a Product -->
        <div class="card border-success">
            <div class="card-header bg-success text-white" style="font-size: 30px;">
                <strong><i class="fa fa-database"></i>{{ $product->nama }}</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="table-responsive">
                            <table class="table cart">
                                <tr class="cart_item">
                                    <th><strong>Nama:</strong></th>
                                    <td>{{ $product->nama }}</td>
                                </tr>
                                <tr class="cart_item">
                                    <th><strong>Kategori:</strong></th>
                                    <td>{{ $product->kategori }}</td>
                                </tr>
                                <tr class="cart_item">
                                    <th><strong>Harga:</strong></th>
                                    <td>Rp. {{ number_format($product->harga, 2) }}</td>
                                    <th><strong>Stok:</strong></th>
                                    <td>{{ $product->stok }}</td>
                                </tr>
                                <tr class="cart_item">
                                    <th><strong>Satuan:</strong></th>
                                    <td>{{ $product->satuan }}</td>
                                    <th><strong>Deskripsi:</strong></th>
                                    <td>{{ $product->deskripsi }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="fancy-title title-bottom-border">
                            <h2>Peserta Lelang</h2>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Posisi</th>
                                    <th>Nama</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>
                                    <th>Kontak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->aucations as $key => $a)
                                <tr>
                                    <td>{{ ($key + 1) }}</td>
                                    <td>{{ $a->user->name }}</td>
                                    <td>IDR {{ number_format($a->harga, 2) }}</td>
                                    <td>{{ date("d F Y", strtotime($a->updated_at)) }}</td>
                                    <td>
                                        <a href="wa.me/62" class="btn btn-primary">Whatsapp</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div>
                            <strong><a href="{{ route('products.index') }}" class="btn btn-success mb-3"><< Kembali</a></strong>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="slide" data-thumb="{{asset('images/products/'.$product->gambar)}}"><a href="{{asset('images/products/'.$product->gambar)}}" title="Preview Dress - Front View" data-lightbox="gallery-item"><img src="{{asset('images/products/'.$product->gambar)}}" alt="{{$product->gambar}}" class="img-fluid img-thumbnail"></a></div>
                    </div>
                </div>
            </div>
        </div>
</div><br><br>
<br><br>
@endsection
