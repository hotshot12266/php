@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Liên hệ</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('trang-chu') }}">Trang chủ</a> / <span>Trang liên hệ</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="beta-map">

	<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1203351307186!2d106.71240001518021!3d10.802094592304083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a459cb43ab%3A0x6c3d29d370b52a7e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBIdXRlY2g!5e0!3m2!1svi!2s!4v1553438519406" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
</div>
<div class="container">
	<div id="content" class="space-top-none">

		<div class="space50">&nbsp;</div>
		<div class="row">
			<div class="col-sm-8">
				<h2>Khung góp ý</h2>
				<div class="space20">&nbsp;</div>
				<p>Rất mong có sự góp ý của mọi người để trang web ngày một hoàn thiện hơn </p>
				<div class="space20">&nbsp;</div>
				@if(count($errors)>0)
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<ul>
						@foreach($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
				@endif
				@if($message=Session::get('success'))
					<button type="button" class="close" data-dismiss="alert">x</button>
					<strong>{{$message}}</strong>
				@endif
				<form action="{{ url('send') }}" method="post" class="contact-form">	
					{{csrf_field()}}
					<div class="form-block">
						<label>Mời bạn nhập tên:</label>
						<input name="name" type="text" placeholder="Nhập họ và tên">
					</div>
					<div class="form-block">
						<label>Mời bạn Email:</label>
						<input name="email" type="email" placeholder="Nhập Email">
					</div>
					<div class="form-block">
						<label>Mời bạn góp ý:</label>
						<textarea name="message" placeholder="Nhập góp ý"></textarea>
					</div>
					<div class="form-block">
						<input type="submit" name="send" value="Gửi Feedback" >
					</div>
				</form>
			</div>
			<div class="col-sm-4">
				<h2>Thông tin liên lạc</h2>
				<div class="space20">&nbsp;</div>

				<h6 class="contact-title">Địa chỉ:</h6>
				<p>
					475A Điện Biên Phủ, P.25, Q.Bình Thạnh, TP.HCM<br>
					HUTECH <br>
					TP.HCM
				</p>
				<div class="space20">&nbsp;</div>
				<h6 class="contact-title">Điều kiện công ty</h6>
				<p>
					Biết làm bánh là được <br>
				</p>
				<div class="space20">&nbsp;</div>
				<h6 class="contact-title">Việc làm</h6>
				<p>
					Chúng tôi luôn tìm kiếm những người có tài năng <br>
					Tham gia vào đội làm bánh của chúng tôi<br>
				</p>
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection