@extends('admin/quanly')
@section('title','Sửa Ảnh Sản phẩm')
@section('content1')
<div class="container" style="background-color: white">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="alert-success">
			@include('admin/blocks/flash')
			</div>
			
			<form action="#" enctype="multipart/form-data" method="POST" >
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<legend>Sửa ảnh sản phẩm</legend>
				<div class="form-group">
					<label for="">image</label>
					<input type="file" name="file" value="">

				</div>
				<button type="submit" class="btn btn-primary" >Edit</button>
			</form>
		
		</div>
	</div>	
</div>
@endsection