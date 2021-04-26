@extends('master')
@section('content')
<div class="space60">&nbsp;</div>
  <div class="container">
    <div id="content">
      
      <form action="#" method="post" class="beta-form-checkout">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
        <div class="row">
          <div class="col-sm-6">
            <h4>Đơn đặt hàng</h4>
             <div class="space20">&nbsp;</div>
           <div class="form-block">
            <label for="phone"  style="color: red;">Điện thoại*</label>
            <input type="text" id="country_name" name="phone" style="border-radius: 10px;">
          </div>
          <div id="countryList">
            <div class="form-block" id="hoten" >
            <label for="name" id="msg_div" style="color: red;">Họ tên*</label>
            <input type="text" name="name" id="msg_div" placeholder="Họ tên" class="form-control input-lg" style="border-radius: 10px;">
            
            </div>
           
          <div class="form-block" >
            <label for="email" id="msg_div" style="color: red;">Email*</label>
            <input type="email"  name="email" id="msg_div1" placeholder="expample@gmail.com" style="border-radius: 10px;">
          </div>
        
          <div class="form-block" >
            <label for="adress" id="msg_div3" style="color: red;">Địa chỉ*</label>
            <input type="text"  name="address" id="msg_div4" placeholder="Street Address" style="border-radius: 10px;">
          </div>
           </div>
          <div class="form-block"  >
            <label for="notes" " style="color: red;">Ghi chú</label>
            <textarea  name="notes"  style="border-radius: 10px;width: 554px;  height: 120px;"></textarea>
          </div>
         

          </div>
           <div class="col-sm-6">
          <div class="your-order">
            <div class="your-order-head"><h2>Đơn hàng của bạn</h2></div>
            <div class="your-order-body" style="padding: 0px 10px">
              <div class="your-order-item">
                <div>
                @if(Session::has('cart'))
                @foreach($product_cart as $cart)
                <!--  one item   -->
                  <div class="media">
                    <img width="25%" src="img/{{$cart['item']['Image']}}" alt="" class="pull-left">
                    <div class="media-body">
                      <p class="font-large">{{$cart['item']['Name']}}</p>
                      <span class="color-gray your-order-info">Đơn giá: {{number_format($cart['price'])}} đồng</span>
                      <span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span>
                    </div>
                  </div>
                <!-- end one item -->
                @endforeach
                @endif
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="your-order-item">
                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                <div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif đồng</h5></div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
            
           <div class="your-order-body">
            <!--   <ul class="payment_methods methods"> -->
             
                  <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                  <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                  <div class="payment_box payment_method_bacs" >
                    Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                  </div>            
            
<!-- 
              
                  <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                  <label for="payment_method_cheque">Chuyển khoản </label>
                  <div class="payment_box payment_method_cheque" >
                    Chuyển tiền đến tài khoản sau:
                    <br>- Số tài khoản: 123 456 789
                    <br>- Chủ TK: Nguyễn A
                    <br>- Ngân hàng ACB, Chi nhánh TPHCM
                  </div>            
                 -->
              <!--     
                </ul> -->
            </div>

            <div class="text-center"><button type="submit" class="beta-btn primary" >Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
          </div> <!-- .your-order -->
        </div>
        </div>
      </form>
    </div> <!-- #content -->
  </div> <!-- .container -->

@endsection

