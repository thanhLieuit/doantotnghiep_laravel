<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\LoaiProduct;
use Validator;
use DateTime;
use App\Product;
use App\Menucha;
use DB;
use App\Banner;
use App\User;
use Auth;
use App\Order;
use App\OrderProduct;
use App\Customer;
use App\Comment;
use App\Nhanvien;
use App\Kho;
use App\Ncc;

class AdminController extends Controller
{
  private $product;
    private $loaiproduct;
    private $menuchas;
    private $user;
    private $comment;
    private $nhanvien;
    private $order;
    private $customer;

    public function __construct(Product $product, LoaiProduct $loaiproduct, Menucha $menuchas, User $user,Comment $comment, Nhanvien $nhanvien,Order $order, Customer $customer)
    {
       // $this->middleware('auth');
        $this->product = $product;
        $this->loaiproduct = $loaiproduct;
        $this->menuchas = $menuchas;
        $this->user = $user;
        $this->comment = $comment;
        $this->nhanvien = $nhanvien;
        $this->order = $order;
        $this->customer = $customer;
        
    }

    public function getproductmenu()
    {
        return view('admin.chucnang.themproduct-menu');
    }

    public function postproductmenu(Request $request)
    {
        $rules = [
            'txttname' => 'required|unique:menuchas,name_menu'
        ];
        $messages = [
            'txttname.required' => 'Vui Lòng nhập menu sản phẩm',
            'txttname.unique' => 'menu sản phẩm đã tồn tại'
            
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $menuchas = new Menucha;
            $menuchas->name_menu = $request->txttname;
            $menuchas->created_at = new DateTime();
            $menuchas->save();
            return redirect('admin/product-menu')->with(['flash_level'=>'result_msg','flash_message' =>'thêm  menu sản phẩm thành công']);
        }
    }

    public function getproducttype()
    {
        $menuchas = $this->menuchas->all();
        return view('admin.chucnang.themproduct-type',compact('menuchas'));
    }

    public function postproducttype(Request $request)
    {
      $rules = [
        'txtname' => 'required|unique:loaiproducts,name_loai'
      ];
      $messages = [
        'txtname.required' => 'Vui Lòng Nhập Loại Sản Phẩm',
            'txtname.unique' => 'Loại sản phẩm đã tồn tại'
        
      ];

      $validator = Validator::make($request->all(), $rules, $messages);
      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
      } else {
        $loaiproducts = new LoaiProduct;
            $loaiproducts->id_menu = $request->cars;
        $loaiproducts->name_loai = $request->txtname;
        $loaiproducts->created_at = new DateTime();
        //dd($loaiproducts);
        $loaiproducts->save();
        return redirect('admin/product-type')->with(['flash_level'=>'result_msg','flash_message' =>'thêm  lo?i s?n ph?m thành công']);
      }
    }
    public function getproduct()
    {
      $loaiproduct = $this->loaiproduct->all();
        return view('admin.chucnang.themproduct',compact('loaiproduct'));
    }

    public function postproduct(Request $request)
    {   

      $rules = [
            'ttname' => 'required|unique:products,Name',
           // 'file'   => 'image|mimes:jpg,gif,png|max:2080'
        ];
        $messages = [
            'ttname.required' => 'Vui Lòng Nhập Sản Phẩm',
            'ttname.unique' => 'Loại Sản phẩm này dã tồn tại',
          //  'image' => 'Ð?nh d?ng không cho phép',
         //   'max' => 'Kích thu?c file quá l?n'
        ];
         if ($request->hasFile('file')){
            // L?y tên file
            $file = $request->file('file');

            $file_name = $file->getClientOriginalName('file');

            // Luu file vào thu m?c upload v?i tên là bi?n $filename
             $file->move('img',$file_name);
          

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {        
        
       
        $product = user::select('id')->where('id',Auth::user()->id)->get();
        $product = new Product;
        $product->id_loai = $request->cars;
        $product->Name = $request->ttname;
        $product->Image = $file_name = $file->getClientOriginalName('file');
        $product->Price = $request->price;
        $product->Promotion_price = $request->km;
        $product->Detail = str_slug($request->nd,"-");
        $product->Hansd = $request->hsd;
        
        $product->id_u = Auth::user()->id;
        
        $product->created_at = new DateTime();
        $product->save();

        $kho = Kho::select('id')->where('id_product',$product)->get();

        $kho = new Kho;
        $kho->id_product = $product->id;
        $kho->soluong = $request->sl;
        $kho->trangthai = 'conhang';
        $kho->created_at = new DateTime();
        $kho->save();


        
       return redirect('admin/product')->with(['flash_level'=>'result_msg','flash_message' =>'thêm sản phẩm thành công']);
        } 
      }
    }
    public function getproducttable()
    {   
        $listproduct = Product::select('products.id','loaiproducts.name_loai','products.Name','products.Image','products.Price','products.Promotion_price','products.Detail','products.Hansd')->join('loaiproducts', 'products.id_loai', '=', 'loaiproducts.id')->get(); 
       
      //dd($listproduct);
        return view('admin.chucnang.tableproduct', compact('listproduct'));
    }


    public function getproducteditimage($id){
         $product = $this->product->findOrFail($id);
         return view('admin.chucnang.product-edit-image',compact('product'));
    }
    public function postproducteditimage(Request $request, $id) {
         if ($request->hasFile('file')){

            $product = product::find($id);

            // L?y tên file
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName('file');
            // Luu file vào thu m?c upload v?i tên là bi?n $filename
            $file->move('img',$file_name);
            $product->Image = $file_name =$file->getClientOriginalName('file');
            $product->updated_at = new DateTime();
            $product->save();
             return redirect()->route('admin/product-table')->with(['flash_level'=>'result_msg','flash_message' =>'sửa sản phẩm thành công']);
        }
    }




    public function getproductedit($id) {

        $loaiproduct = $this->loaiproduct->all();
      //  $product = $this->product->findOrFail($id);
        $product = Product::select()->join('kho','kho.id_product','=','products.id')->find($id);
        $getproofbred =Product::select('id_loai')->where('id',$id)->get()->toArray();

        $loaiproducts = LoaiProduct::select('id','name_loai')->get();
        $loaiproductsss = LoaiProduct::select('id','name_loai')->where('id',$getproofbred)->get();

        return view('admin.chucnang.product-edit', compact('loaiproducts', 'product','loaiproductsss'));
       
    }

    public function postproductedit(Request $request,$id) {


            $product = Product::select('products.id')->join('kho','kho.id_product','=','products.id')->find($id);


            $product->id_loai = $request->cars;
            $product->Name = $request->ttname;
            $product->Price = $request->price;
           
            $product->Promotion_price = $request->km;
            $product->Detail = $request->nd;
            $product->Hansd = $request->hsd;
            $product->updated_at = new DateTime();
            $product->save();

            $kho = Kho::select('id')->where('id_product',$product->id)->first();

            $kho1 =Kho::findOrFail($kho->id);

            $kho1->soluong = $request->qty;
            $kho1->updated_at = new DateTime();
      
            $kho1->save();
          
             return redirect()->route('admin/product-table')->with(['flash_level'=>'result_msg','flash_message' =>'sửa sản phẩm thành công']);

        
    }

    public function getdeleteproduct($id) {
         try{
             
             DB::beginTransaction();
            
             //Delete Role
             $product = $this->product->find($id);
          
            $product->delete($id);
            
            $product->kho()->delete($id);
            DB::commit(); 
       
            return redirect()->route('admin/product-table');
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());

    } 
    }

    public function getorder()
    {

        $order = Order::select('orders.id','customers.name','customers.phone','orders.xacnhan')->join('customers', 'orders.id_c', '=', 'customers.id')->where('orders.xacnhan','chuaxacnhan')->get();
        
        return view('admin.chucnang.tableorder', compact('order'));
    }
    public function getorderdetail($id)
    {
        
        $order1 = Order::findOrFail($id);
        $order2 = OrderProduct::select('products.Name','products.Image','order_products.qty','order_products.Price','orders.total','orders.ngaydat','orders.Note','orders.pay')
        ->join('orders', 'order_products.id_order', '=', 'orders.id')
        ->join('products', 'order_products.id_product', '=', 'products.id')
        ->where('order_products.id_order',$id)->get();
      
        return view('admin.chucnang.tableorderct', compact('order2'));
    }

    public function getorderdetailupdate($id)
    {
       

        $order = Order::find($id);
       
        $order->id_u = Auth::user()->id;
        $order->xacnhan = 'dangchuyenhang';
        
        
        $order->updated_at = new DateTime();
        $order->save();
        return redirect()->back();
    }

    public function getcomment()
    {

        $comment = Comment::select('comments.id as id','comments.name_c','products.Name','comments.comment')->join('products', 'comments.id_product', '=', 'products.id')->get();
        return view('admin.chucnang.tablecoment',compact('comment'));
    }

    public function getcommentdelete($id)
    {
        try{
             
             DB::beginTransaction();
            


             $comment =  $this->comment->find($id);
          
           $comment->delete($id);

           DB::commit(); 
       
            return redirect()->route('admin/comment');
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());

    } 
    }
    public function getcapnhat($id)
    {
      $nhanvien1 = Auth::user()->id;
        return view('admin.chucnang.capnhat',compact('nhanvien1'));
    }
    
    public function postcapnhat(Request $request, $id)
    {
       if ($request->hasFile('file')){

            

            // L?y tên file
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName('file');
            // Luu file vào thu m?c upload v?i tên là bi?n $filename
            $file->move('img',$file_name);
            $nhanvien1 = Nhanvien::find($id);
            $nhanvien1->Image = $file_name =$file->getClientOriginalName('file');
            //dd($nhanvien1);
            $nhanvien1->updated_at = new DateTime();
            $nhanvien1->save();
            return redirect()->route('admin/quanly');
        }
    }
    public function getcapnhatedit($id)
    {

      $nhanvien =Nhanvien::select('*')->where('user_id',Auth::user()->id)->get();


       return view('admin.chucnang.capnhatedit',compact('nhanvien'));
    }
    public function postcapnhatedit(Request $request, $id)
    {
  
        $nhanvien = Nhanvien::find($id);

        $nhanvien->fullname = $request->fullname;
        $nhanvien->phone = $request->phone;
        $nhanvien->age = $request->age;
        $nhanvien->cmnd = $request->cmnd;
        $nhanvien->address = $request->address;
 
        //$nhanvien->Image = $request->file;
        $nhanvien->user_id = Auth::user()->id;
   // dd($nhanvien);
        $nhanvien->updated_at = new DateTime();
       
       $nhanvien->save();
       return redirect()->back();
    
  
  }
   public function getgiaohang()
   {
       
        $order = Order::select('customers.name','customers.phone','customers.address','orders.total','orders.Note','orders.pay','orders.id')
        ->join('customers', 'orders.id_c', '=', 'customers.id')->where('orders.xacnhan','dangchuyenhang')->get();
        
        
        return view('admin.chucnang.tablegiaohang',compact('order'));

   }

   public function getgiaohangdelete($id){
    try{  
            DB::beginTransaction();
            
            $order =  $this->order->find($id);
            $ode = Order::where('id',$id)->first();
         //   $c = Customer::where('id',$ode->id_c)->find($id);
            $order->delete($id);
          //  $c->delete($id);
            $order->order_product()->delete($id);


            DB::commit(); 

       
            return redirect()->route('admin/order');
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());

    } 
   }
   public function getgiaohangupdate($id)
   {
        $order = Order::find($id);
       
        $order->id_u = Auth::user()->id;
        $order->xacnhan = 'dahoanthanh';
        $order->updated_at = new DateTime();
        $order->save();

        $giaohang = DB::table('orders')->join('order_products','order_products.id_order','=','orders.id')->where('orders.id',$id)->get();

        foreach ($giaohang as $chitiet) {
          $khoupdate = DB::table('kho')->where('id_product', $chitiet->id_product)->first();
          $update = Kho::find($khoupdate->id);
          $update->soluong = $khoupdate->soluong - $chitiet->qty;
          $update->save();

        }


    
          return redirect()->back();
            
   }
   public function getproducttablesearch(Request $request){
       if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {

        $data = DB::table('products')->join('loaiproducts', 'products.id_loai', '=', 'loaiproducts.id')->select('products.id','loaiproducts.name_loai','products.Name','products.Image','products.Price','products.Promotion_price','products.Detail','products.Hansd')
        
         ->where('Name', 'like', '%'.$query.'%')
         ->orWhere('name_loai', 'like', '%'.$query.'%')
         ->orWhere('Price', $query)
         ->orWhere('Promotion_price', 'like', '%'.$query.'%')
         ->orWhere('Detail', 'like', '%'.$query.'%')
         ->orWhere('Hansd', 'like', '%'.$query.'%')
         ->orderBy('id','desc')
         ->get();

      }
      else
      {
       $data = DB::table('products')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name_loai.'</td>
         <td>'.$row->Name.'</td>
         <td><img src="../img/'. $row->Image.' " alt=""></td>
         <td>'.$row->Price.'</td>
         <td>'.$row->Promotion_price.'</td>
         <td>'.$row->Detail.'</td>
         <td>'.$row->Hansd.'</td>
          <td>
                <a href="../admin/product-edit/'.$row->id.'">s?a </a>
                <a href="../admin/product-delete/'.$row->id.'">xóa </a>

        </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
      );

      echo json_encode($data);
        
      
     }

    }

    public function getkho()
    {
        
        $updatekho = DB::table('kho')->get();
        foreach($updatekho as $update)
          if($update->soluong < 10)
         {
            $update1 = Kho::find($update->id);

            $update1->trangthai = 'dahethang';
            
            $update1->save();
     
          }else{
             $update1 = Kho::find($update->id);
            $update1->trangthai = 'conhang';
          
            $update1->save();
          }
          $kho = Kho::select('kho.id','products.Name','kho.soluong','kho.trangthai')->join('products','products.id','=','kho.id_product')->get();

         return view('admin.chucnang.nhapkho',compact('kho')); 
       
    }

   
   public function gethoadon($id)
   {
     
      $order1 = Order::select('orders.id','customers.name','customers.phone','customers.address','orders.pay','orders.Note','orders.updated_at','orders.total')->join('customers','customers.id','=','orders.id_c')->where('orders.id',$id)->get();
      return view('admin.chucnang.hoadon',compact('order1'));
   
   }

   public function getncc(){
      $ncc = Ncc::all();
      return view('admin.chucnang.themncc',compact('ncc'));
   }
   public function postncc(Request $request){

        $ncc = new Ncc;
        $ncc->tenncc = $request->name;
        $ncc->phone = $request->phone;
        $ncc->address = $request->address;
        $ncc->note = $request->note;
        $ncc->created_at = new DateTime();
        $ncc->save();
        return redirect()->back();
   }  
}
