@extends('admin/quanly')
@section('content1')
<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Danh sách Role</div>

  
    <div class="card-body">
      <div class="table-responsive">
        <div class="col-md-12">
            <a href="{{ route('admin/role/addrole') }}" style="    font-size: 20px !important;">add</a>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="    font-size: 20px !important;">
          @include('admin/blocks/flash')
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Tác Vụ</th>
            </tr>
          </thead>
          <tfoot>
             <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Tác Vụ</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($listr as $role)
          <tr>
              
              <td>{!! $role["Name"]; !!}</td>
              <td>{!! $role["Description"]; !!}</td>
              <td>
                <a href="{{ route('admin/role/editrole',['id' =>$role->id]) }}"><i class="far fa-edit"></i></a>
                <a href="{{ route('admin/role/deleterole',['id' =>$role->id]) }}"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
       
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </div>

  @endsection