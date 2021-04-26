<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menucha;
use App\LoaiProduct;
use DB;
use App\Product;
use App\Cart;
use Session;
use App\Customer;
use App\Order;
use App\OrderProduct;

class CartController extends Controller
{
    //
    public function getcart()
    {
    	$menuchas = Menucha::SELECT( 'menuchas.id','menuchas.name_menu', DB::raw('GROUP_CONCAT(loaiproducts.id, loaiproducts.name_loai)'))
     ->JOIN ('loaiproducts','menuchas.id', '=', 'loaiproducts.id_menu')->GroupBY('menuchas.id','menuchas.name_menu')->get();
    	return view('index.page.cart', compact('menuchas'));
    }


    public function getaddcart(Request $request,$id)
    {
 
        $product = Product::where('id',$id)->first();
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        // dd($id);
        $request->session()->put('cart',$cart);
        
        return redirect()->back();
    
    }
    
    public function postcart(Request $request)
    {
        
        $cart = Session::get('cart');

        $check = Customer::where('phone',$request->phone)->count();

        $idcus = Customer::where('phone',$request->phone)->first();
        if($check == 1){
            $update = Customer::find($idcus->id);
            $update->name = $request->name;
            $update->email = $request->email;
            $update->phone = $request->phone;
            $update->address = $request->address;
            $update->save();

        }else
        {
            $data = new Customer;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();
        }
        $customer = Customer::where('phone',$request->phone)->first();

        $order = new Order;
        $order->id_c = $customer->id;
        $order->ngaydat = date('Y-m-d');
        $order->total = $cart->totalPrice;
        $order->pay = $request->payment_method;
        $order->Note = $request->notes;
        $order->xacnhan = 'chuaxacnhan';
        $order->save();

        foreach ($cart->items as $key => $value) {
            $order_product = new OrderProduct;
            $order_product ->id_order = $order->id;
            $order_product ->id_product = $key;
            $order_product ->qty = $value['qty'];
            $order_product ->Price = ($value['price']/$value['qty']);
            $order_product->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }
    
   public function getdelcart($id,Request $request)
   {    
        
        $oldCart = Session::has('cart')?Session::get('cart'):null;

        $cart = new Cart($oldCart);
      
        $cart->removeItem($id);
         
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            $request->session()->forget('cart');
        }
        
        return redirect()->back();
   }




    public function getSearchAjax(Request $request)
     {
         if($request->get('query'))
        {
            $query = $request->get('query');
           //$cus = Customer::select('id')->where('phone', $query)->first();

            $data = DB::table('customers')->select('customers.id as id','customers.name','customers.email','customers.address')->where('phone', $query)->get();

             
            $check = DB::table('customers')->join('orders','orders.id_c','=','customers.id')->select('customers.id','customers.name','customers.email','customers.address','orders.Note')->where('phone', $query)->count();
 
            $output = '';
            if($check == 0 )
            {
                 $output .= '
       
            <div class="form-block" id="countryList" >
            <label for="name"  style="color: red;">Họ tên*</label>
            <input type="text" name="name" id="country_name" placeholder="Họ tên" class="form-control input-lg" style="border-radius: 10px;"
            </div>

            <div class="form-block" id="countryList" >
            <label for="email" style="color: red;">Email*</label>
            <input type="text" name="email" id="country_name" placeholder="expample@gmail.com" style="border-radius: 10px;">
            </div>
         
            <div class="form-block" id="countryList" >
            <label for="adress" style="color: red;">Địa chỉ*</label>
            <input type="text"  name="address" id="country_name" placeholder="Street Address" style="border-radius: 10px;">
            </div>
        
             </div>
               ';
            }else{
             foreach($data as $row)
            {
               $output .= '
       
            <div class="form-block" id="countryList" >
            <label for="name"  style="color: red;">Họ tên*</label>
            <input type="text" name="name" id="country_name" placeholder="Họ tên" class="form-control input-lg" style="border-radius: 10px;" value="'.$row->name.'">
            </div>

            <div class="form-block" id="countryList" >
            <label for="email" style="color: red;">Email*</label>
            <input type="text" name="email" id="country_name" placeholder="expample@gmail.com" style="border-radius: 10px;" value="'.$row->email.'">
            </div>
         
            <div class="form-block" id="countryList" >
            <label for="adress" style="color: red;">Địa chỉ*</label>
            <input type="text"  name="address" id="country_name" placeholder="Street Address" style="border-radius: 10px;" value="'.$row->address.'">
            </div>
            
             </div>
               ';

           
            }
            $output .= '';
           }
            echo $output;
        }
    }
}
