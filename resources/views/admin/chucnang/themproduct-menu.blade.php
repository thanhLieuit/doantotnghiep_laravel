@extends('admin/quanly')
@section('title','Thêm menu')
@section('content1')
<div class="container" style="background-color: white">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="alert-success">
			@include('admin/blocks/flash')
			</div>
<form action="#" method="POST" role="form">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<legend>Nhập menu Sản Phẩm</legend>
	<div class="form-group">
		
		<label for="">Name</label>
		<input type="text" class="form-control" id="txtname" placeholder="tên menu sản phẩm" name="txttname" >
		@if($errors->has('txttname'))
			<p style="color:red">{{$errors->first('txttname')}}</p>
		@endif
	</div>
	<button type="submit" class="btn btn-primary">cập nhật</button>
</form>
</div>
</div>
	
</div>
@endsection