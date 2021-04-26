@extends('admin/quanly')
@section('title','Bảng Hóa Đơn')
@section('content1')
<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Danh sách Hóa Đơn</div>

  
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="    font-size: 20px !important;">
          @include('admin/blocks/flash')
          <thead>
            <tr>
              	<th>Tên khách hàng</th>
                <th>Phone</th>
                <th>Xem chi tiết</th>         
                <th>Quản lý</th>
                <th>Xác nhận</th>
                <th>Hủy đơn</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Tên khách hàng</th>
                <th>Phone</th>
                <th>Xem chi tiết</th>         
                <th>Quản lý</th>
                <th>Xác nhận</th>
                <th>Hủy đơn</th>
            </tr>
          </tfoot>
          <tbody>
         	@foreach ($order as $order)
          	<tr>
                <td>{!! $order['name']; !!}</td>
              	<td>{!! $order['phone']; !!}</td>
              	<td><a href="{{ route('admin/order-detail',['id' =>$order->id]) }}"><i class="far fa-edit"></i></a></td>
                <td>{!! $order['xacnhan']; !!}</td>
                <td><a href="{{ route('admin/order-detail-update',['id' =>$order->id]) }}"><i class="far fa-edit"></i></a></td>
                <td><a href="{{ route('admin/giaohang-delete',['id' =>$order->id]) }}"><i class="fas fa-trash-alt"></i></a></td> 
            </tr>
        	@endforeach
          </tbody>
        </table>
       
      </div>
    </div> 

 </div>

@endsection