@extends('master')
@section('content')

<div class="mau5">
	<div class="container">
		<div class="col-sm-12 body-header">
			<div class="space10">&nbsp;</div>
			<a href=""><i class="fa fa-home"></i>/Home</a>
		</div>
	</div>
</div>
<div class="container">
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
						<div class="beta-products-list">
							
							<div class="beta-products-details">
							
							</div>

							<div class="row">
							@foreach ($listproduct as $product)
								<div class=" col-sm-3">
									
									<div class="single-item">
											@if($product["Promotion_price"] !=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{ route('/product-detail',['id'=>$product->id]) }}"><img src="../img/{!! $product['Image'];!!}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="    overflow: hidden;text-overflow: ellipsis;white-space: nowrap;
											    width: 185px;">{!! $product["Name"]; !!}</p>
											<p class="single-item-price">
												@if($product["Promotion_price"]==0)
												<span class="flash-sale">{!! $product["Price"]; !!}</span>
													
												@else
												<span class="flash-del">{!! $product["Price"]; !!}</span>
												<span class="flash-sale">{!! $product["Promotion_price"]; !!}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('/addcart',['id'=>$product->id]) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('/product-detail',['id'=>$product->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
										
									</div>
									
								
								</div>
							@endforeach
				
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					
					</div>
	</div>
</div>
@endsection
