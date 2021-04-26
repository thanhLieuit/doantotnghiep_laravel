<div class="container-fluid">
      <?php
        use App\Truycap;
        use Carbon\Carbon;

        $dt = Carbon::now()->toDateString();
        $check = DB::table('truycaps')->where('ngay',$dt)->count();

        $update1 = DB::table('truycaps')->where('ngay',$dt)->first();

        if($check == 1)
        {
            $update = Truycap::find($update1->id);
            $update->dem = $update1->dem + 1;

            $update->save();
        }
        else
        {
            $new = New Truycap();
            $new->dem = 1;
            $new->ngay = $dt;
            $new->save();
        }
    ?>
  
	<div class="mau2">
		<div class="container header-body">
			<div class="col-sm-2"><img class="img" src="{!! url('image/logo1.png') !!}" alt=""></div>
			<div class="col-sm-7" >
                <form method="get" action="{{route('/search')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
				<center>
					<input type="search" name="key" id="country_namee" class="form-control" value="" required="required" title="">
               
				</center>

				<button type="submit"><a href=""><i class="fa fa-search"></i></a></button>
                </form>
			</div>
			<div class="col-sm-3">
                <div class="beta-comp">
                    
                        <div class="cart">
                            <div class="beta-select" onclick="myFunction()"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>

                            
                            <div id="myDIV" class="beta-dropdown cart-body">
                           @if(Session::has('cart'))
                             @foreach($product_cart as $product)
                                <div class="cart-item">
                                    <a class="cart-item-delete" href="{{route('delete',['id' => $product['item']['id']])}}"><i class="fa fa-times"></i></a>
                                    
                                    <div class="media">
                                        <a class="pull-left" href="#"><img src="{!! url('img/'.$product['item']['Image']) !!}" alt=""></a>
                                        <div class="media-body">
                                            <span class="cart-item-title">{{$product['item']['Name']}}</span>
                                            <span class="cart-item-amount">{{$product['qty']}} *<span>@if($product['item']['Promotion_price']==0){{number_format($product['item']['Price'])}} @else {{number_format($product['item']['Promotion_price'])}}@endif</span></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                  @endforeach
                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif đồng</span></div>
                                    <div class="clearfix"></div>

                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="{{route('/cart')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>

                            @endif
                            </div>

                        </div> <!-- .cart -->
                </div>
            </div>
		</div>
	</div>
	<div class="mau4" >
        <div class="container-fluid header-footer">
            <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
                    <ul class="nav" >
                        <li class="col-sm-1"></li> 
                        <li class="dmli "><i class="fa fa-bars" style="font-size: 15px"></i><h3>Danh Mục</h3>
                            <ul class="sub-menu main-menu">
                                @foreach($menuchas as $menucha)
                                <li><a href="{{ route('/product-type-all',['id'=>$menucha->id]) }}"> {!! $menucha['name_menu']; !!}</a><i class="arrow right"></i>
                                    <ul class="sub-menu">
                                    @foreach($menucha->loaiproduct as $bred_product)
                                        <li><a href="{{ route('/product-type',['id'=>$bred_product->id]) }}">{!! $bred_product['name_loai']; !!}</a></li>
                                    @endforeach
                                     
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                            </li>
                        <li><a href="{{ route('/index') }}">Trang Chủ</a></li>
                        <li><a href="{{ route('/gioithieu') }}">Giới Thiệu</a></li>
                        <li><a href="{{ route('/lienhe') }}">Liên Hệ</a></li>
          


                    </ul>
            </nav>  

        </div>
    </div>  
	
</div>

