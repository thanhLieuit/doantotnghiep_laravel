@extends('admin/quanly')
@section('title','Thêm sản phẩm')
@section('content1')
<div class="container" style="background-color: white">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="alert-success">
			@include('admin/blocks/flash')
			</div>
			
			<form action="{{ url('admin/product') }}" enctype="multipart/form-data" method="POST" >
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<legend>Nhập sản phẩm</legend>
				<select name="cars">	
			  		@foreach($loaiproduct as $bred_product) 	 	
	   			 	<option value="{{ $bred_product->id }}">
	    	   		{{ $bred_product->name_loai }}
	    			</option>
	    			@endforeach
		 		</select>		  
				<div class="form-group">			
					<label for="">Name</label>
					<input type="text" class="form-control" id="name" placeholder="tên sản phẩm" name="ttname" >
					@if($errors->has('ttname'))
					<p style="color:red">{{$errors->first('ttname')}}</p>
					@endif
				</div>
				<div class="form-group">
					<label for="">image</label>
					<input type="file" name="file" required="true">
				<!-- 	@if($errors->has('file'))
					<p style="color:red">{{$errors->first('file')}}</p>
					@endif -->
				</div>
				<div class="form-group">
					<label for="">Price</label>
					<input type="text" class="form-control" id="price" placeholder="Price" name="price" >
					
				</div>
				<div class="form-group">
					<label for="">Số lượng</label>
					<input type="text" class="form-control" id="price" placeholder="số lượng" name="sl" >
					
				</div>
				<div class="form-group">
					<label for="">Promotion price</label>
					<input type="text" class="form-control" id="khuyenmai" placeholder="khuyến mãi" name="km" >
					
				</div>
				<div class="form-group">
					<label for="">Detail</label>
					<input type="text" class="form-control" id="noidung" placeholder="nội dung" name="nd" >	
				</div>

				<div class="form-group">
					<label for="">Hansd</label>
					<input type="date" class="form-control" id="Hansd" placeholder="Han sd" name="hsd" >
				</div>
				<button type="submit" class="btn btn-primary" >cập nhật</button>
			</form>
		</div>
	</div>	
</div>
@endsection