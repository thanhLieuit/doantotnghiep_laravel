@extends('master')
@section('content')
<div class="mau5">
	<div class="container">
		<div class="col-sm-12 body-header">
			<a href=""><i class="fa fa-home"></i>/Home</a>
		</div>
	</div>
</div>
<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-3">
				<div class="nav-side-menu">
				<div class="menu-list">
					<li class="dmli">
		                <a href="#">
		                <i class="fa fa-dashboard fa-lg"></i> Danh mục
		                </a>
		            </li>
	
      			  	<ul id="menu-content" class="menu-content collapse out">
      			  	@foreach($menuchas as $menucha)
		                <li  data-toggle="collapse" data-target="#{!! $menucha['id']; !!}" class="collapsed ">
		                  <a href="{{ route('/product-type-all',['id'=>$menucha->id]) }}">{!! $menucha['name_menu']; !!} <span class="arrow"></span></a>
		                </li>
		                
		                <ul class="sub-menu collapse" id="{!! $menucha['id']; !!}">
		                	  @foreach($menucha->loaiproduct as $bred_product)
		                    <li ><a href="{{ route('/product-type',['id'=>$bred_product->id]) }}">{!! $bred_product['name_loai']; !!}</a></li>
		           
		                    @endforeach
		                </ul>
		                @endforeach
		              	
       				</ul>
       				
 				</div>
				</div>			
			</div>
			<div class="col-sm-9">
				<div class="row3">
					<div class="col-sm-4">
						<div class="single-item">
    						
    						<div class="single-item-header">
											<img src="../img/{!! $product['Image'];!!}" alt="">
										</div>
  						</div>
					</div>
					<div class="col-sm-8">
						
						<div class="single-item-body">
							<p class="single-item-title1">{{ $product->Name }}</p>
							<p class="single-item-price">
								<span>{{ $product->Price }} VNĐ</span>
							</p>
							<p class="single-item-title2">Mã sản phẩm :{{ $product->id_loai }} </p>
							<p class="single-item-title2">Tình Trạng còn: {{ $product->trangthai }}</p>
							<p><input type="text" class="rating rating-loading" value="{{$comment2}}" data-size="xl" title="" name="star">
								</p>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>
	
						<p></p>
						<p></p>
						<p></p>

						<div class="single-item-options">
							@if($product->trangthai == 'dahethang')
							
							@else
							<a class="add-to-cart" style=" margin-left: -66px !important;
    margin-top: 11px !important;" href="{{route('/addcart',['id'=>$product->id]) }}"><i class="fa fa-shopping-cart"></i></a>
							@endif
							<div class="clearfix"></div>
						</div>
						
					</div>
				</div>
				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="nav nav-tabs ">
						<li class="active"><a  data-toggle="tab" href="#tab-description">Mô tả</a></li>
						<li><a  data-toggle="tab" href="#tab-reviews">Đánh giá</a></li>
					</ul>
					<div class="tab-content">
					<div class="tab-pane fade in active" id="tab-description">
						<div class="space60">&nbsp;</div>	
						<p>{{$product->Detail}}</p>
						
					</div>
					<div class="tab-pane fade pane" id="tab-reviews">
						<div class="space60">&nbsp;</div>
						<ul style="list-style-type: none;border:1px solid; border-radius: 10px 10px 10px 10px">
							<div class="space10">&nbsp;</div>
							@foreach($comment as $comment)
							<li style="float: left; color:#FCBA6A">{{$comment->name_c}}:</li>
							<li>{{$comment->comment}}</li>
							<li style="float: left;" value="{{$comment->id}}"> <input type="text" class="rating rating-loading" value="{{$comment->danhgia}}" data-size="l" title="" name="star"></li>
							<li>{{$comment->updated_at}}</li>
							<div class="space60">&nbsp;</div>
							@endforeach
						</ul>
						
						<p>Viết đánh giá</p>
						<form action="{!! url('/comment')!!}/{{$product->id}}" method="post">
							 <input type="hidden" name="_token" value="{{csrf_token()}}">
							<label>Họ Tên:</label>
							<input type="text" name="name_c">
							
							<br>
							<label for="">xếp hạng:</label>
						      <input type="text" class="rating rating-loading" value="3" data-size="xl" title="" name="star">
       
						    <br>
							<label>Đánh giá:</label>
							<br>
							<textarea style="height: 100px;width: 100%;" name="comments"></textarea>
								<button class="button button1" type="submit">Gửi</button>
						</form>
						
					
					</div>
					
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h2>Sản Phẩm Liên Quan</h2>

							<div class="row">
								@foreach($productlq as $productlq)
								<div class="col-sm-4" >
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('/product-detail',['id'=>$productlq->id]) }}"><img src="../img/{!! $productlq['Image'];!!}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"  style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;
													    width: 185px;">{!! $productlq["Name"];!!}</p>
											<p class="single-item-price">
												<span>{!! $productlq["Price"];!!} VNĐ</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('/addcart',['id'=>$productlq->id]) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('/product-detail',['id'=>$productlq->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						
				</div> <!-- .beta-products-list -->





			</div>	
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
<div class="space50">&nbsp;</div>
@endsection