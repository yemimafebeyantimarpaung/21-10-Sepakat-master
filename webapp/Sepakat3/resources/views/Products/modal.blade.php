<div class="portfolio-ajax-modal">
    <div class="ajax-modal-title">
        <p>Apakah kamu ingin menghapus <strong></strong></p>
    </div>

    <div class="modal-padding clear-bottommargin clearfix">
    @foreach($products as $product)
        <div class="row">
            <div class="col-lg-5 portfolio-single-content col_last bottommargin">
                <a class="btn" href="{{ route('products.destroy',$product->id) }}"><i class="i-rounded i-small icon-remove"></i></a>
            </div>
        </div>
    @endforeach
    </div>
</div>