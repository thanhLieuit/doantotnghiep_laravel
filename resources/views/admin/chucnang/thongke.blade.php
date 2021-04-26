@extends('admin/quanly')
@section('title','Thống Kê')
@section('content1')
<div class="row">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">   

      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Hôm nay</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $slhomnay; ?> Đơn: <?php echo $tthomnay; ?> VNĐ</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>

    </a>
  </li>
  <li><a data-toggle="tab" href="#menu1">
   <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Hôm qua</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $slhomqua; ?> Đơn: <?php echo $tthomqua; ?> VNĐ</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</a>
</li>
<li><a data-toggle="tab" href="#menu2">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Bảy ngày</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $slbayngays; ?> Đơn: <?php echo $ttbayngays; ?> VNĐ</div>
            </div>

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>  
</a>
</li>
<li><a data-toggle="tab" href="#menu3">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">tháng</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $slthang; ?> Đơn: <?php echo $ttthang; ?> VNĐ</div>
            </div>

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>  
</a>
</li>
<li><a data-toggle="tab" href="#menu4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Đơn hàng</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $orderc; ?> Đơn: <?php echo $orders; ?> VNĐ</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</a></li>
</ul>

<div class="tab-content">
  <br>
  <div id="home" class="tab-pane fade in active">
   <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Danh sách đơn hàng
    </div>
      <div class="space60">&nbsp;</div>

      <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100% ;font-size: 20px !important;">
          <thead>
            <tr>
              <th>Tên khách hàng</th>
              <th>Phone</th>
              <th>Hoá đơn</th>


            </tr>
          </thead>

          <tbody>
            @foreach($order1 as $order)
            <tr>
              <td>{!! $order['name']; !!}</td>
              <td>{!! $order['phone']; !!}</td>
              <td>{!! $order['id']; !!}</td>

            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Tên khách hàng</th>
              <th>Phone</th>
              <th>Hoá đơn</th>



            </tr>
          </tfoot>
        </table>
      </div>

    </div>
  </div>
  <div id="menu1" class="tab-pane fade">
    <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Danh sách đơn hàng
    </div>
      <div class="space60">&nbsp;</div>

      <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100% ;font-size: 20px !important;">
          <thead>
            <tr>
              <th>Tên khách hàng</th>
              <th>Phone</th>
              <th>Hoá đơn</th>


            </tr>
          </thead>

          <tbody>
            @foreach($order2 as $order)
            <tr>
              <td>{!! $order['name']; !!}</td>
              <td>{!! $order['phone']; !!}</td>
              <td>{!! $order['id']; !!}</td>

            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Tên khách hàng</th>
              <th>Phone</th>
              <th>Hoá đơn</th>



            </tr>
          </tfoot>
        </table>
      </div>

    </div>
  </div>
  <div id="menu2" class="tab-pane fade">
     <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Danh sách đơn hàng
    </div>
      <div class="space60">&nbsp;</div>

      <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100% ;font-size: 20px !important;">
          <thead>
            <tr>
              <th>Tên khách hàng</th>
              <th>Phone</th>
              <th>Hoá đơn</th>


            </tr>
          </thead>

          <tbody>
            @foreach($order3 as $order)
            <tr>
              <td>{!! $order['name']; !!}</td>
              <td>{!! $order['phone']; !!}</td>
              <td>{!! $order['id']; !!}</td>

            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Tên khách hàng</th>
              <th>Phone</th>
              <th>Hoá đơn</th>



            </tr>
          </tfoot>
        </table>
      </div>

    </div>
  </div>
  <div id="menu3" class="tab-pane fade in active">
   <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Danh sách đơn hàng
    </div>
      <div class="space60">&nbsp;</div>

      <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100% ;font-size: 20px !important;">
          <thead>
            <tr>
              <th>Tên khách hàng</th>
              <th>Phone</th>
              <th>Hoá đơn</th>


            </tr>
          </thead>

          <tbody>
            @foreach($order5 as $order)
            <tr>
              <td>{!! $order['name']; !!}</td>
              <td>{!! $order['phone']; !!}</td>
              <td>{!! $order['id']; !!}</td>

            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Tên khách hàng</th>
              <th>Phone</th>
              <th>Hoá đơn</th>



            </tr>
          </tfoot>
        </table>
      </div>

    </div>
  </div>
  <div id="menu4" class="tab-pane fade">
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
          @foreach($order4 as $order)
        <tr>
          <td>{!! $order['name']; !!}</td>
          <td>{!! $order['phone']; !!}</td>
          <td>{!! $order['address']; !!}</td>
          <td>{!! $order['total']; !!}</td>
          <td>{!! $order['Note']; !!}</td>
          <td>{!! $order['pay']; !!}</td>
          <td>{!! $order['id']; !!}</td>
          <td>{!! $order['xacnhan']; !!}</td>
          </td>
        </tr>
          @endforeach
          </tbody>
        </table>
       
      </div>
    </div> 

 </div>
  </div>
</div>
</div>

</div>
@endsection