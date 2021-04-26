@extends('admin/quanly')
@section('title','bảng banner')
@section('content1')
<div class="container" style="background-color: white">

		

			<div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
			<form action="{{route('admin/banner')}}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<legend>Thêm Banner</legend>
				<div class="form-group">
					
					<label for="">Name</label>
					<input type="text" class="form-control" id="namebanner" placeholder="Banner" name="namebanner" >
				</div>
				<div class="form-group">
					<label for="">image</label>
					<input type="file" name="file" required="true">

				</div>
				<button type="submit" class="btn btn-primary">cập nhật</button>
			</form>



	
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 22px;">
          <thead>
            <tr>	
              	<th>Name</th>
              	<th>Image</th>            	
              	<th>Quản lý</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            	<th>Name</th>
              	<th>Image</th>            	
              	<th>Quản lý</th>
            </tr>
          </tfoot>
          <tbody>
         	  @foreach($banner1 as $banner)
              <tr>
                <td style="    width: 200px;">{!! $banner["name_banner"]; !!}</td>
                <td style="    width: 418px;"><img src="../img/{{ $banner->Image }}" alt="" style="width: 200px;height: 100px"></td>
                <td style="    width:100px;">
                  <a href="{{ route('admin/banner-delete',['id' =>$banner->id]) }}"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>    
</div>
@endsection