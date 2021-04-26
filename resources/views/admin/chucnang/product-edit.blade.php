@extends('admin/quanly')
@section('title','Sửa Sản phẩm')
@section('content1')
<div class="container" style="background-color: white">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="alert-success">
			@include('admin/blocks/flash')
			</div>
			
			<form action="#" enctype="multipart/form-data" method="POST" >
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<legend>Sửa sản phẩm</legend>
				<select name="cars">	
				@foreach($loaiproductsss as $bred_products1) 
			  	
  						<option value="{!! $bred_products1['id']; !!}"> {{ $bred_products1->name_loai }}</option>                  		
	    			@endforeach
					
			  		@foreach($loaiproducts as $bred_product) 
			  	
  						<option value="{!! $bred_product['id']; !!}"> {{ $bred_product->name_loai }}</option>                  		
	    			@endforeach
			
	    			
		 		</select>		  
				<div class="form-group">			
					<label for="">Name</label>
					<input type="text" class="form-control" id="name" placeholder="tên sản phẩm" name="ttname"  value="{!! $product['Name']; !!}">		
				</div>
				<div class="form-group">
					
					<a href="{{route('admin/product-edit-image',['id' =>$product->id]) }}"><img src="../../img/{!! $product['Image']; !!}" alt="" style="width: 100px;height: 100px"></a>
			
				</div>
				<div class="form-group">
					<label for="">Price</label>
					<input type="text" class="form-control" id="price" placeholder="Price" name="price" value="{!! $product['Price']; !!}">
					
				</div>
				<div class="form-group">
					<label for="">Amount</label>
					<input type="text" class="form-control" id="amount" placeholder="Amount" name="qty" value="{!! $product['soluong']; !!}">
					
				</div>
				<div class="form-group">
					<label for="">Promotion price</label>
					<input type="text" class="form-control" id="khuyenmai" placeholder="khuyến mãi" name="km" value="{!! $product['Promotion_price']; !!}">
					
				</div>
				<div class="form-group">
					<label for="">Detail</label>
					<input type="text" class="form-control" id="noidung" placeholder="nội dung" name="nd" value="{!! $product['Detail']; !!}">	
				</div>

				<div class="form-group">
					<label for="">Hansd</label>
					<input type="date" class="form-control" id="Hansd" placeholder="Han sd" name="hsd" value="{!! $product['Hansd']; !!}">
				</div>

				<button type="submit" class="btn btn-primary" >Edit</button>
			</form>
		
		</div>
	</div>	
</div>
@endsection