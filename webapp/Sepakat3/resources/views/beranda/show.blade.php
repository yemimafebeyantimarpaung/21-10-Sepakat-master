@extends('layouts.app')
@section('content')
<!-- Slide ============================================= -->
<!-- #Slide end -->

<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

                @foreach($products as $product)
					<!-- Portfolio Single Image
					============================================= -->
					<div class="col_two_third portfolio-single-image nobottommargin">
                        <div class="slide" data-thumb="{{asset('images/products/'.$product->gambar)}}"><a href="{{asset('images/products/'.$product->gambar)}}" data-lightbox="gallery-item"><img src="{{asset('images/products/'.$product->gambar)}}" alt="{{$product->gambar}}" style="width:100%;height:500px;" class="card-img-top img-thumbnail"></a></div>
					</div><!-- .portfolio-single-image end -->

					<!-- Portfolio Single Content
					============================================= -->
					<div class="col_one_third portfolio-single-content col_last nobottommargin">

						<!-- Portfolio Single - Description
						============================================= -->
						<div class="fancy-title title-bottom-border">
							<h2>{{ $product->nama }}</h2>
						</div>

                        <div class="fancy-title title-bottom-border">
                            <p>Deskripsi : {{ $product->deskripsi }}</p>
                        </div>


						<!-- Portfolio Single - Meta
						============================================= -->
						<ul class="portfolio-meta bottommargin">
							<li><span><i class="icon-lightbulb"></i>Nama Produk:</span> {{ $product->nama }}</li>
							<li><span><i class="icon-calendar3"></i>Harga:</span> IDR {{ number_format($product->harga, 2) }}/{{ $product->satuan }}</li>
							<li><span><i class="icon-user"></i>Supplier:</span> {{$product->name}}</li>
							<li><span><i class="icon-link"></i>No Whatsapp:</span><a class="btn btn-success" href="https://api.whatsapp.com/send?phone=+62{{$product->notelp}}" class="text-white"><i class="icon-call"></i>Whatsapp</a></li>

                        </ul>


                        <div class="fancy-title title-bottom-border">
                            <h2>Peserta Lelang</h2>
                        </div>

                        @if(Auth::user()->role == "Buyer")
                            <form action="{{ route('aucation/join') }}" method="post">
                                @csrf

                                <div class="input-group mb-3">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number"  name="harga" class="form-control" placeholder="Harga penawaran..." min="{{ $product->harga }}">
                                    <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Berpartisipasi</button>
                                    </div>
                                </div>
                            </form>
                        @endif


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Posisi</th>
                                    <th>Nama</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->aucations as $key => $a)
                                <tr>
                                    <td>{{ ($key + 1) }}</td>
                                    <td>{{ $a->user->name }}</td>
                                    <td>IDR {{ number_format($a->harga, 2) }}</td>
                                    <td>{{ date("d F Y", strtotime($a->updated_at)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <a href="{{route('beranda.index')}}" class="btn btn-danger float-right">Kembali</a>                            </>
                        <!-- Portfolio Single - Meta End -->

					</div><!-- .portfolio-single-content end -->
                @endforeach
                </div>
            </div>
        </section>


@endsection
