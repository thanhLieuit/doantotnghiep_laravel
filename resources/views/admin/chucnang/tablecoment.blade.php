@extends('admin/quanly')
@section('title','Comment')
@section('content1')
<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Quản lý Comment</div>

  
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="    font-size: 20px !important;">

          <thead>
            <tr>
              	<th>Tên khách hàng</th>
                <th>Tên Sản Phẩm</th>
                <th>Comment</th>       
                <th>Quản lý</th>
 
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Tên khách hàng</th>
                <th>Tên Sản Phẩm</th>    
                <th>Comment</th>     
                <th>Quản lý</th>

            </tr>
          </tfoot>
          <tbody>
         	@foreach ($comment as $comment)
          	<tr>
                <td>{!! $comment['name_c']; !!}</td>
              	<td>{!! $comment['Name']; !!}</td>
                <td>{!! $comment['comment']; !!}</td>
              	<td><a href="{{ route('admin/comment-delete',['id' =>$comment->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
               
                 
            </tr>
        	@endforeach
          </tbody>
        </table>
       
      </div>
    </div> 

 </div>

@endsection