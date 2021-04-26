@extends('admin/quanly')
@section('title','Bảng chi tiết Hóa Đơn')
@section('content1')
<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Chi tiết Hóa Đơn</div>

  
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="    font-size: 20px !important;">
          @include('admin/blocks/flash')
          <thead>
            <tr>
              
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt hàng</th>
                <th>Nội dung</th>    
                <th>Thanh toán</th>         
       
            </tr>
          </thead>
          <tfoot>
            <tr>
     
            	  <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt hàng</th>
                <th>Nội dung</th>    
                <th>Thanh toán</th>         
        
            </tr>
          </tfoot>
          <tbody>
         	@foreach ($order2 as $order)
          	<tr>
             
              	<td>{!! $order['Name']; !!}</td>
              	<td><img src="../../img/{{ $order->Image }}" alt=""></td>
                <td>{!! $order["qty"]; !!}</td>
              	<td>{!! $order["Price"]; !!}</td>
              	<td>{!! $order["total"]; !!}</td>
                <td>{!! $order["ngaydat"]; !!}</td>
                <td>{!! $order["Note"]; !!}</td>
                <td>{!! $order["pay"]; !!}</td>
            </tr>
        	@endforeach
          </tbody>
        </table>
       
      </div>
    </div> 

 </div>

@endsection