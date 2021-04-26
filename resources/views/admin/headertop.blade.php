
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Search -->


  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
      </a>
      <!-- Dropdown - Messages -->
      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw" style="font-size: 20px !important;"></i>

        <?php 
          $countorder = DB::table('orders')->where('xacnhan','chuaxacnhan')->count();
          $htorder = DB::table('orders')->select('*')->where('xacnhan','chuaxacnhan')->get();

        ?>
        <!-- Counter - Alerts -->
        @if($countorder > 0)
        <span class="badge badge-danger badge-counter"><?php echo $countorder; ?></span>
        @else
        <span class="badge badge-danger badge-counter"></span>
        @endif
      </a>
      <!-- Dropdown - Alerts -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
    
        </h6>

        @foreach($htorder as $order)
        <a class="dropdown-item d-flex align-items-center" href="{{route('admin/order')}}">
          <div class="mr-3">
            <div class="icon-circle bg-primary">
              <i class="fas fa-file-alt text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500"> {{ $order->ngaydat }}</div>
            <span class="font-weight-bold">1 đơn hàng mới</span>
          </div>
        </a>
        @endforeach
        <a class="dropdown-item text-center small text-gray-500" href="{{route('admin/order')}}">Show All Alerts</a>
      </div>
    </li>

    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw" style="font-size: 20px !important;"></i>
        <!-- Counter - Messages -->
        
        <?php 
          $countlh = DB::table('lienhes')->where('tinhtrang','chuaduyet')->count();
          $htlh = DB::table('lienhes')->select('*')->where('tinhtrang','chuaduyet')->get();

        ?>
        @if($countlh > 0)
          <span class="badge badge-danger badge-counter"><?php echo $countlh; ?></span>
        @else
          <span class="badge badge-danger badge-counter"></span>
        @endif
      </a>
      <!-- Dropdown - Messages -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header">
         
        </h6>
         @foreach($htlh as $lh)
        <a class="dropdown-item d-flex align-items-center" href="{{route('admin/lien-he')}}">
        <!--   <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
            <div class="status-indicator bg-success"></div>
          </div> -->
          <div class="font-weight-bold">
      
            <div class="text-truncate">Khách hàng:<?php echo $lh->Name ?></div>
            <div class="text-truncate">có 1 email mới</div>
            <div class="small text-gray-500"> {{ $lh->created_at }}</div>
            
          </div>
        </a>
        @endforeach
        <a class="dropdown-item text-center small text-gray-500" href="{{route('admin/lien-he')}}">Show All Alerts</a>
      </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->


    <?php
    $listnv = DB::table('nhanviens')->where('user_id',auth::user()->id)->get();
    ?>
    @foreach($listnv as $list)
    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ 'admin/login' }}">{{ 'admin/login' }}</a>
    </li>

    @else
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }} </span>

        @if($list->Image == null)
        
           <img class="img-profile rounded-circle" src="{!! url('image/1.jpg') !!}"> 
        
        @else
          <img class="img-profile rounded-circle" src="{!! url('img/'.$list->Image) !!}"> 
      @endif
        </a>
    
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{route('admin/capnhat',['id' =>Auth::user()->id])}}">  
       <i class="fas fa-image" style="margin-right: 16px;"></i>
       Image
      </a>
       <a class="dropdown-item" href="{{ url('admin/cap-nhat-edit',['id' =>Auth::user()->id])}}">  
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Settings
      </a>
      <a class="dropdown-item" href="{{ url('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt" style="margin-right: 16px;"></i>
      {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ 'logout' }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</li>


@endguest
@endforeach
</ul>
</nav>
