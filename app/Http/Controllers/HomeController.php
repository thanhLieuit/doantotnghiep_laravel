<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use Carbon\Carbon;
use App\Nhanvien;
use App\Truycap;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $dt = Carbon::now()->toDateString();

      $tthomnay = Order::where('ngaydat',$dt)->sum('total');
      $slhomnay = Order::where('ngaydat',$dt)->count();
        $order1 = Order::select('customers.name','customers.phone','orders.id','orders.xacnhan')->join('customers', 'orders.id_c', '=', 'customers.id')->where('ngaydat',$dt)->get();


      $ngayhomqua = Carbon::now()->subDay()->toDateString();
      $tthomqua = Order::where('ngaydat',$ngayhomqua)->sum('total');
      $slhomqua = Order::where('ngaydat',$ngayhomqua)->count();


      $bayngay = Carbon::now()->subDay(7)->toDateString();

      $ttbayngays = Order::whereBetween('ngaydat', array($bayngay, $dt))->count();
      $slbayngays = Order::whereBetween('ngaydat', array($bayngay, $dt))->sum('total');

      $nam = Carbon::now()->subDay(365)->toDateString();

      $ttnams = Order::whereBetween('ngaydat', array($nam, $dt))->count();
      $slnams = Order::whereBetween('ngaydat', array($nam, $dt))->sum('total');
      
      $ttthu = Order::sum('total');

      $abc1 = Order::sum('total');
      $abc = round( floatval(($abc1 / 1000000)*100) );

      $thang = Carbon::now()->month()->toDateString();

      $tchn = Truycap::select('dem')->where('ngay',$dt)->sum('dem');
      $tchq = Truycap::select('dem')->where('ngay',$ngayhomqua)->sum('dem');
      $tctuan = Truycap::select('dem')->whereBetween('ngay', array($bayngay, $dt))->sum('dem');
      $tcthang = Truycap::select('dem')->whereBetween('ngay', array($thang, $dt))->sum('dem');
      $tcnam = Truycap::select('dem')->whereBetween('ngay', array($nam, $dt))->sum('dem');



      return view('admin.body',compact('tthomnay','slhomnay','tthomqua','slhomqua','ttbayngays','slbayngays','ttnams','slnams','ttthu','abc','order1','tchn','tchq','tctuan','tcthang','tcnam'));


    }
    public function postLogout(){
        Auth::logout();
        return redirect('login');
    }
}
