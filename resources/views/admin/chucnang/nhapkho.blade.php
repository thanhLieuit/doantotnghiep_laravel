@extends('admin/quanly')
@section('title','Bảng Kho')
@section('content1')
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i> Danh sách sản phẩm</div>
   <div class="space60">&nbsp;</div>
       
       <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100% ;font-size: 20px !important;">
          <thead>
            <tr>
     
              <th>Name</th>
              <th>Qty</th>
              <th>Status</th>
         
			  
            </tr>
          </thead>

          <tbody>
            @foreach ($kho as $kho)
            <tr>
              <td>{!! $kho['Name']; !!}</td>
              <td>{!! $kho["soluong"]; !!}</td>
              <td>{!! $kho["trangthai"]; !!}</td>
              
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
     
              <th>Name</th>
              <th>Qty</th>
			        <th>Status</th>
       
            </tr>
          </tfoot>
        </table>
      </div>

</div>

@endsection