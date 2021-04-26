<html>
	<title>Hóa Đơn</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<style>
	.img{
		display: block;
		margin-left: auto;
		margin-right: auto;
		height: 90px;

	}
</style>
	<body onload="window.print();window.close();">
		<div class="container"  id="print_div">
			<div class="col-sm-2"></div>
			<div class="col-sm-8"><img class="img" src="{!! url('image/logo1.png') !!}" alt="">
				<br>
				<div class="col-sm-3"></div>
				<div class="col-sm-4">
					<i class="fas fa-home" style="margin-right: 10px;"></i>76 nguyễn thái bình
					<br>
					<i class="fas fa-phone" style=" transform: rotate(-15deg);
												    -moz-transform: rotate(-15deg);
												    -webkit-transform: rotate(-252deg);
												    margin-right: 10px;"></i>04767130156
					<br>
					@foreach($order1 as $order)
					<table class="table table-hover" style="width: 370px !important;margin-left: -29px !important;">
						<tr rowspan="2"> <p style="font-size: 28px;font-weight: bold;">Mã hóa đơn: {{ $order->id }}</p></tr>
						<thead>
						
						
							<tr>
								<th>Tên hàng </th>
								<th>SL </th>
								<th>Giá</th>
								<th>TT</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$ct = DB::table('order_products')->join('products','products.id','=','order_products.id_product')->where('id_order',$order->id)->get();
							?>
							@foreach($ct as $ct1)
							<tr>
								<td>{{ $ct1->Name }}</td>
								<td>{{ $ct1->qty }}</td>
								<td>{{ $ct1->Price }}</td>
								<td>{{ $ct1->qty }}*{{ $ct1->Price }}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
            				<tr rowspan="3">
            					<th></th>
            					<th></th>
            					<th>tổng</th>
            					<th>{{$order["total"] }}</th>
            				</tr>
				        </tfoot>
					</table>
					
						<table class="table table-hover" style="width: 370px !important;margin-left: -29px !important;">
						<thead>
						<tr rowspan="2"> <p style="font-size: 22px;font-weight: bold;">Thông tin giao hàng</p></tr>
						</thead>
						<tbody>

							<tr>
								<td>Khách hàng:</td>
								<td> {{$order["name"] }}</td>
							</tr>
							<tr>
								<td>phone:</td>
								<td> {{$order["phone"] }}</td>
							</tr>
							<tr>
								<td>Địa chỉ:</td>
								<td> {{$order["address"] }}</td>
							</tr>
							<tr>
								<td>Giao hàng:</td>
								<td> {{$order["pay"] }}</td>

							</tr>
							<tr>
								<td>phí:</td>
								<td>25000VNĐ</td>
							</td>
							<tr>
								<td>note:</td>
								<td> {{$order["Note"] }}</td>
							</tr>
						</tbody>
						
					</table>
						<p>Đơn hàng	được xác nhận tại shop lúc: {{$order["updated_at"] }}</p>
						<p>Nhân viên:  {{ Auth::user()->name }}</p>
					@endforeach
				</div>
				

				<div class="col-sm-2"></div>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</body>
	<script>
$(document).ready(function(){
  $("#id").click(function(){
    $("#print_div").printThis();
  });
  
  
});


</script>
</html>
