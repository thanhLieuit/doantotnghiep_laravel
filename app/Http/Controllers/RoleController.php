<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Permission;
use DB;
class RoleController extends Controller
{	
	private $user;
    private $roles;
    private $permissions;
    public function __construct(User $user, Role $roles, Permission $permissions)
    {
       // $this->middleware('auth');
        $this->user = $user;
        $this->roles = $roles;
        $this->permissions = $permissions;
    }
     public function getListInfo () {
    
    	$listr = $this->roles->all();
    	return view('admin.quyen.listrole', compact('listr'));
    }

    public function getaddinfo () {
    	$permissions = $this->permissions->all();
    	return view('admin.quyen.addrole', compact('permissions'));
    }

    public function postaddinfo (Request $request ) {
    
    	try{
            DB::beginTransaction();
            $roleCreate = $this->roles->create([
                'Name' => $request->name,
                'Description' => $request->description
            ]);
          
          //  $roleCreate = $this->permission->all();
         $roleCreate->permissions()->attach($request->permission);
          
            DB::commit();
           return redirect()->route('admin/role/listrole');

   }catch(\Exception $exception){
    DB::rollback();
    \Log::error('loi:'.$exception->getMessage().$exception->getLine());
   } 
}
public function geteditrole ($id) {
        $permissions = $this->permissions->all();
        $role = $this->roles->findOrFail($id);
        $getAllPermissionOfRole = DB::table('role_permission')->where('role_id', $id)
        ->pluck('permission_id');
       // dd($getAllPermissionOrRole);
        return view('admin.quyen.editrole', compact('permissions', 'role', 'getAllPermissionOfRole'));
    }

    public function posteditrole (Request $request,$id) {
        try{
            DB::beginTransaction();
            //update to role table
            $this->roles->where('id',$id)->update([
                'Name' => $request->name,
                'Description' => $request->description
            ]);
            //update role_permission
            DB::table('role_permission')->where('role_id',$id)->delete();
            $roleCreate = $this->roles->find($id);
        //    dd($roleCreate);
            $roleCreate->permissions()->attach($request->permission);
            DB::commit();
           return redirect()->route('admin/role/listrole');

   }catch(\Exception $exception){
    DB::rollback();
    \Log::error('loi:'.$exception->getMessage().$exception->getLine());
   } 
    }
    public function getdeleterole ($id) {
        try{
             DB::beginTransaction();
             //Delete Role
             $role = $this->roles->find($id);
             $role->delete($id);
             //Delete role_permission
             $role->permissions()->detach();
             DB::commit();
            return redirect()->route('admin/role/listrole');
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());
        }
    }
    public function getaddpermission()
    {
        return view('admin.quyen.addpermission');
    }
    public function postaddpermission(Request $request)
    {
        try{
            DB::beginTransaction();
            $permissionCreate = $this->permissions->create([
                'Name' => $request->name,
                'Description' => $request->description
            ]);    
            DB::commit();
           return redirect()->route('admin/role/addpermission');

   }catch(\Exception $exception){
    DB::rollback();
    \Log::error('loi:'.$exception->getMessage().$exception->getLine());
   } 
    }
}
