@extends('admin/quanly')
@section('title','Thông tin nhân viên')
@section('content1')
<div class="container" style="background-color: white">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @foreach($nhanvien as $nhanvien)
            <form action="" enctype="multipart/form-data" method="POST" style="    margin-left: -72px;
    float: left;">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <legend>thông tin</legend>         
                <div class="form-group">            
                    <label for="">FullName</label>
                    <input type="text" class="form-control"  placeholder="Họ tên" name="fullname" value="{{$nhanvien['fullname']}}" >
                </div>
                <div class="form-group">

                    <label for="">image</label>
        
               
                    
                    <img src="../../img/{!! $nhanvien['Image']; !!}" alt="" style="width: 300px;height: 300px;margin-left: 10px;    margin-top: 40px;    border-radius: 146px;"></a>
    
                </div>

                 <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" class="form-control"  placeholder="phone" name="phone" value="{{$nhanvien['phone']}}">
                    
                </div>
                 <div class="form-group">
                    <label for="">age</label>
                    <input type="text" class="form-control"  placeholder="age" name="age" value="{!! $nhanvien['age']; !!}">
                    
                </div>
                <div class="form-group">
                    <label for="">cmnd</label>
                    <input type="text" class="form-control"  placeholder="cmnd" name="cmnd" value="{!! $nhanvien['cmnd']; !!}">
                    
                </div>
                 <div class="form-group">
                    <label for="">address</label>
                    <input type="text" class="form-control"  placeholder="address" name="address" value="{!! $nhanvien['address']; !!}">
                    
                </div>
                
               
                <button type="submit" class="btn btn-primary" >cập nhật</button>
            </form>
               
                
             
            @endforeach
        </div>
    </div>  
</div>
@endsection