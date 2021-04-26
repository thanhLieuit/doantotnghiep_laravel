@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('/index')}}">Home</a> 
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="beta-map">
	
	<div class="abs-fullwidth beta-map wow flipInX" style="margin-left: 140px"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1707.9125222268258!2d108.17235859481977!3d16.058541469502885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142191a2728816f%3A0x8b7dc8e3b0140b58!2zNzYgTmd1eeG7hW4gVGjDoWkgQsOsbmgsIEhvw6AgTWluaCwgTGnDqm4gQ2hp4buDdSwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1557394821178!5m2!1svi!2s" width="1200" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		
		<div class="space50">&nbsp;</div>
		<div class="row">
			<div class="col-sm-8">
				<h2>Thông tin liên hệ</h2>
			
				<div class="space20">&nbsp;</div>
				<form action="{{route('/lienhe')}}" method="post" class="contact-form">	
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-block">
						<input style="width: 500px;border-radius: 10px;" name="name" type="text" placeholder="Your Name (required)">
					</div>
					<div class="form-block">
						<input style="width: 500px;border-radius: 10px;" name="email" type="email" placeholder="Your Email (required)">
					</div>
					<br>
					<div class="form-block">
						<input style="width: 500px;border-radius: 10px;" name="vande" type="text" placeholder="vấn đề">
					</div>
					<br>
					<div class="form-block">
						<textarea style="width: 500px; height: 100px;border-radius: 10px;" name="message" placeholder="Your Message"></textarea>
					</div>
					<br>
					<div class="form-block">
						<button type="submit" class="beta-btn primary" style="border-radius: 10px;">Send Message <i class="fa fa-chevron-right"></i></button>
					</div>
				</form>
			</div>
			<div class="col-sm-4">
				<h2>Địa chỉ chúng tôi</h2>
				<div class="space20">&nbsp;</div>

				<h6 class="contact-title">Address</h6>
				<p>
					76 Nguyễn Thái Bình<br>
					Hoà Minh,Liên Chiểu <br>
					Đà Nẵng
				</p>
				<div class="space20">&nbsp;</div>
				<h6 class="contact-title">Employment</h6>
				<p>
					We’re always looking for talented persons to <br>
					join our team. <br>
					<a href="qtlieutran@gmail.com">qtlieutran@gmail.com</a>
				</p>
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection