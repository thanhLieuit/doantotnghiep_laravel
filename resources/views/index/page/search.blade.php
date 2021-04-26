@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row1">
								
								@foreach ($product as $list111)
								
								<div  class="col-sm-3">
									<div class="single-item">
										@if($list111->Promotion_price !=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{ route('/product-detail',['id'=>$list111->id]) }}"><img src="img/{!! $list111->Image!!}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="    overflow: hidden;text-overflow: ellipsis;white-space: nowrap;
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
											<a class="add-to-cart pull-left" href="{{route('/addcart',['id'=>$list111->id]) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('/product-detail',['id'=>$list111->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection