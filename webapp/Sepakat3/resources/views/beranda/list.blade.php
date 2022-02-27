<div id="portfolio" class="portfolio grid-container clearfix list_result">
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