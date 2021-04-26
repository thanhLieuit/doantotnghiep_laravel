@extends('admin/quanly')
@section('title','Bảng Giao Hàng')
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
              
                <th>Tên người đặt hàng</th>
                <th>Phone</th>
                <th>address</th>
                <th>Giá</th>
                <th>Nội dung</th>    
                <th>Thanh toán</th>
				        <th>Hóa đơn</th>
                <th>Tình trạng</th>
       
            </tr>
          </thead>
          <tfoot>
            <tr>
     
            	<th>Tên người đặt hàng</th>
                <th>Phone</th>
                <th>address</th>
                <th>Giá</th>
                <th>Nội dung</th>    
                <th>Thanh toán</th>
				        <th>Hóa đơn</th>      
                <th>Tình trạng</th>
            </tr>
          </tfoot>
          <tbody>
        	@foreach($order as $order)
				<tr>
					<td>{!! $order['name']; !!}</td>
					<td>{!! $order['phone']; !!}</td>
					<td>{!! $order['address']; !!}</td>
					<td>{!! $order['total']; !!}</td>
					<td>{!! $order['Note']; !!}</td>
					<td>{!! $order['pay']; !!}</td>
					<td>{!! $order['id']; !!}</td>
          <td><a href="{{ route('admin/giao-hang-update',['id' =>$order->id]) }}"><i class="far fa-edit"></i></a>
              <a href="{{ route('admin/hoadon',['id' =>$order->id]) }}"  target="_blank" id="id"><i class="fas fa-print"></i></a>
          </td>
				</tr>
        	@endforeach
          </tbody>
        </table>
       
      </div>
    </div> 

 </div>

@endsection
