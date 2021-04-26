<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;
use DateTime;
use DB;
use Hash;
use App\Order;
use Carbon\Carbon;
use App\Nhanvien;
use App\Lienhe;

class UserAdminController extends Controller
{

	  private $user;
    private $roles;
    private $nhanvien;
    public function __construct(User $user, Role $roles, Nhanvien $nhanvien)
    {
       // $this->middleware('auth');
        $this->user = $user;
        $this->roles = $roles;
        $this->nhanvien = $nhanvien;
    }
    public function getadduser()
    {
    	return view('admin.quyen.adduser');
    }

    public function postadduser(Request $request)
    {
      try{
      DB::beginTransaction();
      $userCreate = $this->user->create([
        'name' => $request->name,
        'email'=>$request->email,
        'password'=> Hash::make($request->password),
      ]);

      $user = User::max('id');
      
        $nhanvien = new Nhanvien();
        $nhanvien->user_id = $user;
        $nhanvien->save();
        DB::commit();
        return redirect()->route('admin/listinfo');

       }catch(\Exception $exception){
      DB::rollback();
     }
    }

    public function getListInfo(){
       
        
      $listUser= $this->user->all();
      return view('admin.quyen.listinfo',compact('listUser'));
    }
    public function geteditinfo ($id) {
     
        $roles = $this->roles->all();
        $user = $this->user->findOrfail($id);
        $listroleofuser = DB::table('role_users')->where('User_id', $id)->pluck('Role_id');
   
       return view('admin.quyen.editinfo',compact('roles', 'user','listroleofuser'));
     }
     public function posteditinfo (Request $request , $id) {
  
      try{
      DB::beginTransaction();
      $this->user->where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email
      ]);
      DB::table('role_users')->where('user_id', $id)->delete();
      $userCreate = $this->user->find($id);
      $userCreate->roles()->attach($request->role);
       DB::commit();
        return redirect()->route('admin/listinfo');
      }catch(\Exception $exception){
      DB::rollback();
     }
     }


     public function getdeleteinfo($id){
         
        try{
        DB::beginTransaction();

              $user = $this->user->find($id);
              $user->delete($id);
              $user->roles()->detach();
              $user->nhanvien()->delete($id);
         DB::commit();
        return redirect()->route('admin/listinfo');

     }catch(\Exception $exception){
      DB::rollback();
      \Log::error('loi:'.$exception->getMessage().$exception->getLine());
     }

      }

    public function getthongke()
    {
      $dt = Carbon::now()->toDateString();

      $tthomnay = Order::where('ngaydat',$dt)->sum('total');
      $slhomnay = Order::where('ngaydat',$dt)->count();
      $order1 = Order::select('customers.name','customers.phone','orders.id')->join('customers', 'orders.id_c', '=', 'customers.id')->where('ngaydat',$dt)->get();

      $ngayhomqua = Carbon::now()->subDay()->toDateString();
      $tthomqua = Order::where('ngaydat',$ngayhomqua)->sum('total');
      $slhomqua = Order::where('ngaydat',$ngayhomqua)->count();
      $order2 = Order::select('customers.name','customers.phone','orders.id')->join('customers', 'orders.id_c', '=', 'customers.id')->where('ngaydat',$ngayhomqua)->get();


      $bayngay = Carbon::now()->subDay(7)->toDateString();
      $ttbayngays = Order::whereBetween('ngaydat', array($bayngay, $dt))->count();
      $slbayngays = Order::whereBetween('ngaydat', array($bayngay, $dt))->sum('total');
       $order3 = Order::select('customers.name','customers.phone','orders.id')->join('customers', 'orders.id_c', '=', 'customers.id')->whereBetween('ngaydat', array($bayngay, $dt))->get();
     
      $thang = Carbon::now()->month()->toDateString();
      $ttthang = Order::whereBetween('ngaydat', array($thang, $dt))->count();
      $slthang = Order::whereBetween('ngaydat', array($thang, $dt))->sum('total');
       $order5 = Order::select('customers.name','customers.phone','orders.id')->join('customers', 'orders.id_c', '=', 'customers.id')->whereBetween('ngaydat', array($thang, $dt))->get();
      $ttthu = Order::sum('total');

      $orderc = Order::select('customers.name','customers.phone','customers.address','orders.total','orders.Note','orders.pay','orders.id')
        ->join('customers', 'orders.id_c', '=', 'customers.id')->where('orders.xacnhan','dahoanthanh')->whereBetween('ngaydat', array($bayngay, $dt))->count();
      $orders = Order::select('customers.name','customers.phone','customers.address','orders.total','orders.Note','orders.pay','orders.id')
        ->join('customers', 'orders.id_c', '=', 'customers.id')->where('orders.xacnhan','dahoanthanh')->whereBetween('ngaydat', array($bayngay, $dt))->sum('total');
      $order4 = Order::select('customers.name','customers.phone','customers.address','orders.total','orders.Note','orders.pay','orders.id','orders.xacnhan')
        ->join('customers', 'orders.id_c', '=', 'customers.id')->where('orders.xacnhan','dahoanthanh')->whereBetween('ngaydat', array($bayngay, $dt))->get();
      



      return view('admin.chucnang.thongke',compact('tthomnay','slhomnay','tthomqua','slhomqua','ttbayngays','slbayngays','ttthu','orderc','orders','order1','order2','order3','order4','ttthang','slthang','order5'));


    }

    public function getlienhe(){
      $lienhe = Lienhe::select('*')->get();
      return view('admin.chucnang.lienhe',compact('lienhe'));
    }
    
    public function getlienheupdate($id){
      $lienhe = Lienhe::find($id);
      $lienhe->tinhtrang = 'daduyet';
    
      $lienhe->id_u = Auth::user()->id;
        $lienhe->updated_at = new DateTime();
      $lienhe->save();
      return redirect()->back();
    }
}
