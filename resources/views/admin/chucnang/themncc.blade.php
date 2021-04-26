@extends('admin/quanly')
@section('title','Thêm Nhà Cung Cấp')
@section('content1')
<div class="container" style="background-color: white">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="alert-success">
			@include('admin/blocks/flash')
			</div>
			
			<form action="{{ url('admin/themncc') }}" enctype="multipart/form-data" method="POST" >
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<legend>Nhập nhà cung cấp</legend>
			  
				<div class="form-group">			
					<label for="">Name</label>
					<input type="text" class="form-control" id="name" placeholder="tên nhà cung cấp" name="name" >

				</div>

				<div class="form-group">
					<label for="">Phonee</label>
					<input type="text" class="form-control" id="phone" placeholder="số điện thoại" name="phone" >
					
				</div>
				<div class="form-group">
					<label for="">Địa chỉ</label>
					<input type="text" class="form-control" id="address" placeholder="địa chỉ" name="address" >
					
				</div>
				<div class="form-group">
					<label for="">Note</label>
					<input type="text" class="form-control" id="note" placeholder="note" name="note" >
					
				</div>
				
				<button type="submit" class="btn btn-primary" >cập nhật</button>
			</form>
		</div>
	</div>	
</div>

   <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 22px;">
          <thead>
            <tr>	
              	<th>Tên nhà cung cấp</th>
              	<th>Số điện thoại</th>            	
              	<th>Địa chỉ</th>
              	<th>Ghi chú</th>
            </tr>
          </thead>
          <tfoot>
            <tr>	
              	<th>Tên nhà cung cấp</th>
              	<th>Số điện thoại</th>            	
              	<th>Địa chỉ</th>
              	<th>Ghi chú</th>
            </tr>
          </tfoot>
          <tbody>
         	  @foreach($ncc as $ncc1)
              <tr>
                <td>{!! $ncc1["tenncc"]; !!}</td>
                <td>{!! $ncc1["phone"]; !!}</td>
                <td>{!! $ncc1["address"]; !!}</td>
                <td>{!! $ncc1["note"]; !!}</td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>   

@endsection