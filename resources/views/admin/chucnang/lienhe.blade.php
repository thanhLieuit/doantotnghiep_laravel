@extends('admin/quanly')
@section('title','Bảng Liên Hệ')
@section('content1')

<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i> Danh sách sản phẩm
  </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="    font-size: 20px !important;">
          <thead>
            <tr>
              <th>Tên</th>
              <th>email</th>
              <th>Vấn đề</th>
              <th>Nội dung</th>
              <th>Tình trạng</th>              
              <th>Quản lý</th>
            </tr>
          </thead>  
            <tfoot>
          <tr>
              <th>Tên</th>
              <th>email</th>
              <th>Vấn đề</th>
              <th>Nội dung</th>
              <th>Tình trạng</th>              
              <th>Quản lý</th>
            </tr>
          </tfoot>
          <tbody>
           @foreach($lienhe as $lienhe1)
            <tr>
                <td>{!! $lienhe1['Name']; !!}</td>
              <td>{!! $lienhe1['Email']; !!}</td>
              <td>{!! $lienhe1['vande']; !!}</td>
              <td>{!! $lienhe1['noidung']; !!}</td>
              <td>{!! $lienhe1['tinhtrang']; !!}</td>
              <td><a href="{{route('admin/lien-he-update',['id' =>$lienhe1->id])}}"><i class="far fa-edit"></i></a></td>
               
                 
            </tr>
          @endforeach
          </tbody>
        </table>
       
      </div>
    </div> 

 </div>
@endsection