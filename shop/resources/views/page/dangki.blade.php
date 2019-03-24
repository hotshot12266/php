@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đăng kí</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="{{ route('trang-chu') }}">Trang chủ</a> / <span>Đăng kí</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		
		<form action="{{ route('signin') }}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">
				<div class="col-sm-3"></div>
				@if (count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					{{$err}}
					@endforeach
				</div>
				@endif
				@if (Session::has('thanhcong'))
				<div class="alert alert-success">
					{{Session::get('thanhcong')}}
				</div>
				@endif
				<div class="col-sm-6">
					<h4>Đăng kí</h4>
					<div class="space20">&nbsp;</div>

					
					<div class="form-block">
						<label for="email">Email:</label>
						<input type="email" name="email"placeholder="Nhập Email" required>
					</div>

					<div class="form-block">
						<label for="your_last_name">Họ và Tên:</label>
						<input type="text" name="fullname" required placeholder="Nhập họ và tên">
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ:</label>
						<input type="text" name="address" value="Street Address" placeholder="Nhập địa chỉ" required>
					</div>


					<div class="form-block">
						<label for="phone">SĐT:</label>
						<input type="text" name="phone" placeholder="Nhập SĐT" required>
					</div>
					<div class="form-block">
						<label for="phone">Mật khẩu:</label>
						<input type="password" name="password" placeholder="Nhập mật khẩu"required>
					</div>
					<div class="form-block">
						<label for="phone">Lập lại mật khẩu:</label>
						<input type="password" name="re_password" placeholder="Nhập lại mật khẩu"required>
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Đăng kí</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection	