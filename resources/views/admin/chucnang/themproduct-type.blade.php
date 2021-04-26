@extends('admin/quanly')
@section('title','Thêm loại sản phẩm')
@section('content1')
<div class="container" style="background-color: white">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="alert-success">
			@include('admin/blocks/flash')
			</div>
<form action="#" method="POST" role="form">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<legend>Nhập Loại Sản Phẩm</legend>
	<div class="form-group">
		<select name="cars">	
			  		@foreach($menuchas as $menucha) 	 	
	   			 	<option value="{{ $menucha->id }}">
	    	   		{{ $menucha->name_menu }}
	    			</option>
	    			@endforeach
		 		</select>
		<label for="">Name</label>
		<input type="text" class="form-control" id="txtname" placeholder="tên loại sản phẩm" name="txtname" >
		@if($errors->has('txtname'))
			<p style="color:red">{{$errors->first('txtname')}}</p>
		@endif
	</div>
	<button type="submit" class="btn btn-primary">cập nhật</button>
</form>
</div>
</div>
	
</div>
@endsection