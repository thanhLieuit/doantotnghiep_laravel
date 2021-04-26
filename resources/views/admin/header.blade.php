-
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('/index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Shop </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav ItemChurTrang Chủ -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin/quanly')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Trang Chủ</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>
  
   
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Quyền</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chi tiết:</h6>
            <a class="collapse-item" href="{{route('admin/role/listrole')}}">Thêm Quyền</a>
            <a class="collapse-item" href="{{route('admin/role/addpermission')}}">Thêm vai trò</a>
            <a class="collapse-item" href="{{route('admin/adduser')}}">Thêm user</a>
            <a class="collapse-item" href="{{route('admin/listinfo')}}">Danh sách user</a>
          </div>
        </div>
      </li>
 
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Tùy chọn</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chi tiết:</h6>
            <a class="collapse-item" href="{{route('admin/banner')}}">banner</a>
            <a class="collapse-item" href="{{route('admin/product-menu')}}">menu</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Kho
      </div>

      <!-- Nav Item - Sản phẩm Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Sản phẩm</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chi tiết:</h6>
            <a class="collapse-item" href="{{route('admin/product-type')}}">Thêm loại sản phẩm</a>
            <a class="collapse-item" href="{{route('admin/product')}}">Thêm sản phẩm</a>
            <a class="collapse-item" href="{{route('admin/product-table')}}">Bảng sản phẩm</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Khác: </h6>
            <a class="collapse-item" href="{{route('admin/order')}}">Hóa Đơn</a>
            <a class="collapse-item" href="{{route('admin/comment')}}">Comment</a>
            <a class="collapse-item" href="{{route('admin/giaohang')}}">Giao Hàng</a>
            <h6 class="collapse-header">kho: </h6>
            <a class="collapse-item" href="{{route('admin/kho')}}">Nhà kho</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin/thongke')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Thống Kê</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/themncc')}}">
         <i class="fas fa-users"></i>
          <span>Nhà cung cấp</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/lien-he')}}">
        <i class="fas fa-address-book"></i>
          <span>Giải đáp</span></a>
      </li>

    
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
  </ul>
<!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


