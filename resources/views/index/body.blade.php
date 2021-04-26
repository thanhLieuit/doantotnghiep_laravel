@extends('master')
@section('content')

<div id="carousel-id" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carousel-id" data-slide-to="0" class=""></li>
		<li data-target="#carousel-id" data-slide-to="1" class=""></li>
		<li data-target="#carousel-id" data-slide-to="2" class=""></li>
		<li data-target="#carousel-id" data-slide-to="3" class="active"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		@foreach($banner as $banner)
		<div class="item">
			<img src="img/{!! $banner->Image!!}">	
		</div>
		@endforeach
		@foreach($banner111 as $banner1)
		<div class="item active">
			<img src="image/slide4.jpg">
		</div>
		@endforeach
	</div>
	<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<div class="container">
	<div class="main-container">
		<div class="space60">&nbsp;</div>
		<div class="row2">
			<div class="col-sm-3">
				<img src="image/1.png" alt="">
				<p><h5><a href="">MIỄN PHÍ GIAO HÀNG</a></h5></p>
				<p style="opacity: 0.5;">Miễn Phí Giao Hàng Toàn Quốc</p>	
			</div>
			<div class="col-sm-3">
				<img src="image/2.png" alt="">
				<p><h5><a href="">GIÁ TỐT NHẤT</a></h5></p>
				<p style="opacity: 0.5;">Cam Kết Giá Tốt Nhất</p>	
			</div>
			<div class="col-sm-3">
				<img src="image/3.png" alt="">
				<p><h5><a href="">NHẤP CHUỘT & LỰA CHỌN</a></h5></p>
				<p style="opacity: 0.5;">Khám Phá Kho Sản Phẩm</p>	
			</div>
			<div class="col-sm-3">
				<img src="image/4.png" alt="">
				<p><h5><a href="">GIẢM GIÁ</a></h5></p>
				<p style="opacity: 0.5;">Bùng Nổ Khuyến Mãi</p>	
			</div>
		</div>
	</div>
	<div class="main-content">	
		<div class="space60">&nbsp;</div>
		<div class="row1">
			@foreach($menuchas as $menucha)
			<div class="col-sm-12">
				<hr>
				<div class="beta-products-list">
					<div class="col-xs-12 col-sm-12 col-md-2 ">
						<div class="new_title center">	
							<h2><a data-toggle="tab" href="#{!! $menucha['id']; !!}">
							{!! $menucha['name_menu']; !!}</a></h2>
						</div>
						
						<div class="row2">
							
							
							<ul class="nav nav-tabs nav-pills nav-stacked  ">
								@foreach($menucha->loaiproduct as $bred_product)
								<li class="nav-item"><a  data-toggle="tab" href="#all-{!! $bred_product['id']; !!}">
								{!! $bred_product['name_loai']; !!}</a></li>
								@endforeach
							</ul>
							
						</div>
						
					</div>

					<div class="tab-content col-md-10">

						<div id="{!! $menucha['id']; !!}" class="tab-pane fade in active ">							
							<div class="row1">
								<?php  $listproduct111 = DB::table('loaiproducts')->select('*')->JOIN ('products','loaiproducts.id', '=', 'products.id_loai')->where('loaiproducts.id_menu',$menucha->id)->orderBy('products.id','desc')->limit(4)->get();

								?>
								@foreach ($listproduct111 as $list11)
									
								<div  class="col-sm-3">
									<div class="single-item">
										@if($list11->Promotion_price !=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{ 
											route('/product-detail',['id'=>$list11->id]) }}"><img src="img/{!! $list11->Image!!}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;
											    width: 185px;">{!! $list11->Name !!}</p>
											<p class="single-item-price">
												@if($list11->Promotion_price==0)
												<span class="flash-sale">{!! $list11->Price !!}đ</span>
												
												@else
												<span class="flash-del">{!! $list11->Price !!}đ</span>
												<span class="flash-sale">{!! $list11->Promotion_price !!}đ</span>
												@endif
											</p>
										</div>

										<div class="single-item-caption">
										<?php
											$productkho = DB::table('kho')->where('id_product',$list11->id)->first();
										
										?>
											@if($productkho->trangthai == 'dahethang')
							
											@else
											<a class="add-to-cart"  href="{{route('/addcart',['id'=>$productkho->id_product]) }}"><i class="fa fa-shopping-cart"></i></a>
											@endif

											<a class="beta-btn primary" style="    margin-left: -4px;
    padding-top: 12px;
    padding-bottom: 7.4px;" href="{{route('/product-detail',['id'=>$list11->id]) }}">Chi Tiết <i class="fa fa-chevron-right"></i></a>

											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>	
						</div>
						
						@foreach($menucha->loaiproduct as $bred_product)
						<div id="all-{!! $bred_product['id']; !!}" class="tab-pane fade">
													
							<div class="row1">
								<?php  $listproduct1111 = DB::table('loaiproducts')->select('*')->JOIN ('products','loaiproducts.id', '=', 'products.id_loai')->JOIN ('kho','kho.id_product', '=', 'products.id')->where('products.id_loai',$bred_product->id)->orderBy('products.id','desc')->limit(4)->get();
									?>

								@foreach ($listproduct1111 as $list111)
								
								<div  class="col-sm-3">
									<div class="single-item">
										@if($list111->Promotion_price !=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{ route('/product-detail',['id'=>$list111->id_product]) }}"><img src="img/{!! $list111->Image!!}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"  style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;
											    width: 185px;">{!! $list111->Name !!}</p>
											<p class="single-item-price">
												@if($list111->Promotion_price==0)
												<span class="flash-sale">{!! $list111->Price !!}đ</span>
												
												@else
												<span class="flash-del">{!! $list111->Price !!}đ</span>
												<span class="flash-sale">{!! $list111->Promotion_price !!}đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
							
											@if($list111->trangthai == 'dahethang')
							
											@else
											<a class="add-to-cart" href="{{route('/addcart',['id'=>$list111->id_product]) }}"><i class="fa fa-shopping-cart"></i></a>
											@endif
											<a class="beta-btn primary" style="    margin-left: -4px;
    padding-top: 12px;
    padding-bottom: 7.4px;" href="{{route('/product-detail',['id'=>$list111->id_product]) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							
						</div>
						@endforeach

						<div class="col-sm-10"></div>
						<div class="row1">
							<div class="col-sm-2"><a href="{{ route('/product-type-all',['id'=>$menucha->id]) }}">>>Xem Thêm>></a></div>
						</div>
					</div>
   				</div>
   			</div>
   		 	@endforeach
   		</div>
   	</div>	
</div>

<div class="space30">&nbsp;</div>
@endsection