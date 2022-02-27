@extends('layouts.app')
@section('content')
<!-- Slide ============================================= -->

<!-- #Slide end -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <div class="clear"></div>
            <form action="{{ route('search') }}" method="post">
                @csrf
                <div class="input-group w-100 mx-auto">
                    <input name="search" type="text" id="keywords" class="form-control" value="" placeholder="Cari Produk..">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">
                            <i class="icon-line-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <br>

            <ul class="portfolio-filter clearfix" data-container="#portfolio">

                <li class="activeFilter"><a href="#" data-filter="*">Semua</a></li>
                <li><a href="#" data-filter=".pf-buah-buahan">Buah</a></li>
                <li><a href="#" data-filter=".pf-sayur-sayuran">Sayuran</a></li>
                <li><a href="#" data-filter=".pf-umbi-umbian">Daging</a></li>
                <li><a href="#" data-filter=".pf-biji-bijian">Ikan</a></li>

            </ul><!-- #portfolio-filter end -->

            <div class="clear"></div>

            <!-- Portfolio Items============================================= -->
            <div id="portfolio" class="portfolio grid-container clearfix">
                @foreach ($products as $product)
                <article class="portfolio-item pf-media pf-{{$product->kategori}}">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="feature-box media-box">
                            <div class="fbox-media">
                                <div class="portfolio-image">
                                     <img src="{{asset('images/products/'.$product->gambar)}}" style="width:100%;height:250px;" class="card-img-top img-thumbnail">
                                <div class="portfolio-overlay">
                                    <a href="{{ route('beranda.detail',$product->id) }}" data-lightbox="ajax" class="center-icon"><i class="icon-line-expand"></i></a>
                                </div>
                                </div>
                            </div>
                            <div class="fbox-desc">
                                <h3><a href="{{ route('beranda.show',$product->id) }}">{{ $product->nama }}</a></h3>
                                <p><b> Rp {{ number_format($product->harga, 2) }}/{{ $product->satuan }} </b></p>
                                <a href="{{route('beranda.show',$product->id)}}" class="float-right"><b> Lihat >></b></a>
                            </div>
                         </div>
                    </div>
                </div>
                </article>
                @endforeach
            </div><!-- #portfolio end -->
            <div class="clear bottommargin-sm"></div>

            <div class="clear"></div>
            {!! $products->links() !!}
        </div>

    </div>

</section><!-- #content end -->

@endsection
@section('custom_js')
<script type="text/javascript">
    $(function() {
        load_list(1);
    });
</script>
@endsection
