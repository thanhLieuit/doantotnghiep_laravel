@extends('admin/quanly')
@section('title','cập nhật hình ảnh')
@section('content1')
<div class="container" style="background-color: white">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="" enctype="multipart/form-data" method="POST" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <legend> ảnh</legend>         
              
                <div class="form-group">
                    <label for="">image</label>
                    <input type="file" name="file" required="true">
                </div>
               
                <button type="submit" class="btn btn-primary" >cập nhật</button>
            </form>
        </div>
    </div>  
</div>
@endsection