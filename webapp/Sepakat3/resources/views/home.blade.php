@extends('layouts.app')
@section('content')
<!-- Slide ============================================= -->

<!-- #Slide end -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <div class="clear"></div>
            <div class="input-group w-100 mx-auto">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="icon-line-search"></i>
						</span>
					</div>
				<input type="text" id="keywords" class="form-control" value="" placeholder="Cari Produk..">
			</div><br>

            <ul class="portfolio-filter clearfix" data-container="#portfolio">

                <li class="activeFilter"><a href="#" data-filter="*">Semua</a></li>
                <li><a href="#" data-filter=".pf-buah-buahan">Buah</a></li>
                <li><a href="#" data-filter=".pf-sayur-sayuran">Sayuran</a></li>
                <li><a href="#" data-filter=".pf-umbi-umbian">Daging</a></li>
                <li><a href="#" data-filter=".pf-biji-bijian">Ikan</a></li>

            </ul><!-- #portfolio-filter end -->

            <div class="clear"></div>

            <!-- Portfolio Items============================================= -->
           
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
