@extends('admin/quanly')
@section('title','Bảng Sản Phẩm')
@section('content1')
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i> Danh sách sản phẩm</div>
   <div class="space60">&nbsp;</div>
       
       <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100% ;font-size: 20px !important;">
          <thead>
            <tr>
              <th>Loại sản phẩm</th>
              <th>Name</th>
              <th>Image</th>
              <th>Price</th>

              <th>Khuyến mãi</th>
              <th>Nội dung</th>
              <th>Hản sử dụng</th>              
              <th>Quản lý</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($listproduct as $product)
            <tr>
              <td>{!! $product['name_loai']; !!}</td>
              <td>{!! $product["Name"]; !!}</td>
              <td><img src="../img/{{ $product->Image }}" alt=""></td>
              <td>{!! $product["Price"]; !!}</td>
              <td>{!! $product["Promotion_price"]; !!}</td>
              <td>{!! $product["Detail"]; !!}</td>
              <td>{!! $product["Hansd"]; !!}</td>
              <td>
                <a href="{{ route('admin/product-edit',['id' =>$product->id]) }}"><i class="far fa-edit"></i></a>
                <a href="{{ route('admin/product-delete',['id' =>$product->id]) }}"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Loại sản phẩm</th>
              <th>Name</th>
              <th>Image</th>
              <th>Price</th>

              <th>Khuyến mãi</th>
              <th>Nội dung</th>
              <th>Hản sử dụng</th>              
              <th>Quản lý</th>
            </tr>
          </tfoot>
        </table>
      </div>

</div>

@endsection