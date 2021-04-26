@extends('admin/quanly')
@section('title','Trang Chủ')
@section('content1')
<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <!--   <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
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
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
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
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Bảy ngày</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ttbayngays; ?> Đơn: <?php echo $slbayngays; ?> VNĐ</div>
                        </div>
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Năm</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ttnams; ?> Đơn: <?php echo $slnams; ?> VNĐ</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>

 <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Danh sách đơn hàng
    </div>
      <div class="space60">&nbsp;</div>

      <div class="container">
        <table class="table table-striped table-bordered" style="width:100% ;font-size: 20px !important;">
          <thead>
            <tr>
              <th>Tên khách hàng</th>
              <th>Phone</th>
              <th>Hoá đơn</th>
              <th>Tiến trình</th>

            </tr>
          </thead>

          <tbody>
            @foreach($order1 as $order)
            <tr>
              <td>{!! $order['name']; !!}</td>
              <td>{!! $order['phone']; !!}</td>
              <td>{!! $order['id']; !!}</td>
              <td>{!! $order['xacnhan']; !!}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Tên khách hàng</th>
              <th>Phone</th>
              <th>Hoá đơn</th>
              <th>Tiến trình</th>



            </tr>
          </tfoot>
        </table>
      </div>

    </div>
    <main>
      <nav class="floating-menu">
        <h3 style="font-size: 21px;">Thông tin truy cập</h3>
        <div class="space60">&nbsp;</div>
        <i class="fas fa-user" style="position: absolute;margin-top: 4px;font-size: 16px;"></i><p style="margin-left: 16px;">Hôm nay : </p> <p style="float: right;margin-top: -27px;"><?php echo $tchn; ?></p>
        <i class="fas fa-user" style="position: absolute;margin-top: 4px;font-size: 16px;"></i><p style="margin-left: 16px;">Hôm qua :  </p><p style="float: right;margin-top: -27px;;"><?php echo $tchq; ?></p>
        <i class="fas fa-user" style="position: absolute;margin-top: 4px;font-size: 16px;"></i><p style="margin-left: 16px;">Tuần này :  </p><p style="float: right;margin-top: -27px;"><?php echo $tctuan; ?></p>
        <i class="fas fa-user" style="position: absolute;margin-top: 4px;font-size: 16px;"></i><p style="margin-left: 16px;">Tháng này :  </p><p style="float: right;margin-top: -27px;"><?php echo $tcthang; ?></p>
        <i class="fas fa-chart-pie" style="position: absolute;margin-top: 4px;font-size: 16px;"></i><p style="margin-left: 16px;">Tổng :  </p><p style="float: right;margin-top: -27px;"><?php echo $tcnam; ?></p>
      </nav>
    </main>
@endsection
