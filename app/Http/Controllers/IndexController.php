<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\LoaiProduct;
use App\Menucha;
use DB;
use App\User;
use Illuminate\Support\MessageBag;
use Validator;
use App\Banner;
use DateTime;
use App\Comment;
use sum;
use App\Lienhe;

class IndexController extends Controller
{
    private $product;
    private $loaiproduct;
    private $menuchas;
    private $user;
    private $banner;
    public function __construct(Product $product, LoaiProduct $loaiproduct, Menucha $menuchas, User $user,Banner $banner)
    {
       // $this->middleware('auth');
        $this->product = $product;
        $this->loaiproduct = $loaiproduct;
        $this->menuchas = $menuchas;
        $this->user = $user;
        $this->banner = $banner;
        
    }
    public function getindex()
    {
    	$menuchas = Menucha::SELECT( 'menuchas.id','menuchas.name_menu', DB::raw('GROUP_CONCAT(loaiproducts.id, loaiproducts.name_loai)'))
     ->JOIN ('loaiproducts','menuchas.id', '=', 'loaiproducts.id_menu')->GroupBY('menuchas.id','menuchas.name_menu')->get();
     $banner = Banner::SELECT('*')->where('active','not')->get();
     $banner111 = Banner::SELECT('*')->where('id', 1)->get()->toarray();

   
   

    	return view('index.body', compact('menuchas','banner','banner111'));
    }

    public function getproducttypeall($id){
        $menuchas = Menucha::SELECT( 'menuchas.id','menuchas.name_menu', DB::raw('GROUP_CONCAT(loaiproducts.id, loaiproducts.name_loai)'))
     ->JOIN ('loaiproducts','menuchas.id', '=', 'loaiproducts.id_menu')->GroupBY('menuchas.id','menuchas.name_menu')->get();
        
        $listproduct111 = Menucha::select('*')->JOIN ('loaiproducts','menuchas.id', '=', 'loaiproducts.id_menu')->JOIN ('products','products.id_loai', '=', 'loaiproducts.id')->where('menuchas.id',$id)->get();
       


     return view('index.page.product_type_all', compact('menuchas','listproduct111'));
    }
   

    public function getproducttype($id){
            $menuchas = Menucha::SELECT( 'menuchas.id','menuchas.name_menu', DB::raw('GROUP_CONCAT(loaiproducts.id, loaiproducts.name_loai)'))
     ->JOIN ('loaiproducts','menuchas.id', '=', 'loaiproducts.id_menu')->GroupBY('menuchas.id','menuchas.name_menu')->get();

            $listproduct1 = LoaiProduct::find($id);
            $listproduct = Product::select('*')->where('id_loai',$id)->get();
             $loaiproduct = LoaiProduct::select('name_loai')->where('id',$listproduct1->id)->get();
         //  dd($menuchas);
    	return view('index.page.product_type', compact('menuchas','loaiproduct','listproduct'));
    }
    public function postcomment(Request $request, $id)
    {

        $product = Product::find($id);
        $comment = new Comment;
            $comment->name_c = $request->name_c;
            $comment->comment = $request->comments;
            $comment->id_product = $product->id;
            $comment->danhgia = $request->star;
           
            $comment->created_at = new DateTime();

            $comment->save();
            return redirect()->back();
    }

    public function getproductdetail($id){
          $menuchas = Menucha::SELECT( 'menuchas.id','menuchas.name_menu', DB::raw('GROUP_CONCAT(loaiproducts.id, loaiproducts.name_loai)'))
     ->JOIN ('loaiproducts','menuchas.id', '=', 'loaiproducts.id_menu')->GroupBY('menuchas.id','menuchas.name_menu')->get();

   

       // $product = Product::find($id);
        $product = Product::select('products.id','products.Name','products.Price','products.id_loai','kho.trangthai','products.Image','products.Detail')->join('kho','kho.id_product','=','products.id')->find($id);
        $comment= Comment::where('id_product',$id)->get();

        $comment1 = Comment::where('id_product',$id)->sum('danhgia');
        $countcomment1 = Comment::where('id_product',$id)->count();
        if($countcomment1 == 0){
            $comment2 =0;
        }else{
            $comment2 = round($comment1/$countcomment1);
        }


  
        $productlq = Product::where('id_loai',$product->id_loai)->take(3)->get();
        //dd($productlq);
    	return view('index.page.product_detail',compact('menuchas','product','productlq','comment','comment2'));
    }


    public function getsearch(Request $request)
    {   
         $menuchas = Menucha::SELECT( 'menuchas.id','menuchas.name_menu', DB::raw('GROUP_CONCAT(loaiproducts.id, loaiproducts.name_loai)'))
     ->JOIN ('loaiproducts','menuchas.id', '=', 'loaiproducts.id_menu')->GroupBY('menuchas.id','menuchas.name_menu')->get();

        $product = Product::where('Name','like','%'.$request->key.'%')
        ->orwhere('Price',$request->key)
        ->get();
       
        return view('index.page.search',compact('product','menuchas'));
    }
    public function getgt()
    {  
        $menuchas = Menucha::SELECT( 'menuchas.id','menuchas.name_menu', DB::raw('GROUP_CONCAT(loaiproducts.id, loaiproducts.name_loai)'))
     ->JOIN ('loaiproducts','menuchas.id', '=', 'loaiproducts.id_menu')->GroupBY('menuchas.id','menuchas.name_menu')->get();
        return view('index.page.gioi-thieu',compact('menuchas'));
    }

    public function getlh()
    {
        $menuchas = Menucha::SELECT( 'menuchas.id','menuchas.name_menu', DB::raw('GROUP_CONCAT(loaiproducts.id, loaiproducts.name_loai)'))
     ->JOIN ('loaiproducts','menuchas.id', '=', 'loaiproducts.id_menu')->GroupBY('menuchas.id','menuchas.name_menu')->get();
     
        return view('index.page.lien-he',compact('menuchas'));
    }
    public function postlh(Request $request)
    {
        $lienhe = new Lienhe;
        $lienhe->Name = $request->name;
        $lienhe->Email = $request->email;
        $lienhe->vande = $request->vande;
        $lienhe->noidung = $request->message;
        $lienhe->tinhtrang = 'chuaduyet';
     
        $lienhe->created_at = new DateTime();
        $lienhe->save();
           return redirect()->back();
    }    
     public function getbanner()
    
    {
          $banner1 = Banner::select('*')->get();
        return view('admin.chucnang.banner',compact('banner1'));
    }

    public function postbanner(Request $request){
        
            // Lấy tên file
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName('file');
            // Lưu file vào thư mục upload với tên là biến $filename
            $file->move('img',$file_name);

            $banner = new Banner;     
            $banner->name_banner = $request->namebanner;
            $banner->Image = $file_name = $file->getClientOriginalName('file');
           // $banner->Image = $request->file;
            //dd( $banner);
            $banner->created_at = new DateTime();
            $banner->save();
            
          
            return redirect()->route('admin/banner')->with('thongbao','cập nhật thành công'); 
    }
    public function getbannerdelete ($id)
    {
         try{
             
             DB::beginTransaction();
            
             //Delete Role
             $banner = $this->banner->find($id);
             
            $banner->delete($id);
            
            DB::commit(); 
       
            return redirect()->route('admin/banner');
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());

    
    }
    }
}
