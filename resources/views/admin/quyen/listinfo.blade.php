@extends('admin/quanly')
@section('content1')
<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Danh sách người dùng</div>

  
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="    font-size: 20px !important;">
          @include('admin/blocks/flash')
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Tac vu</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Tac vu</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($listUser as $row)
          <tr>
              <td>{!! $row["name"]; !!}</td>
              <td>{!! $row["email"]; !!}</td>

              <td>
                <a href="{{route('admin/editinfo',['id' =>$row->id])}}"><i class="far fa-edit"></i></a>
                <a href="{{route('admin/deleteinfo',['id' =>$row->id])}}"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
       
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </div>

  @endsection