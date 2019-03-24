<div id="footer" class="color-div">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="widget">
					<h4 class="widget-title">Danh sách trang</h4>
					<div>
						<ul>
							<li><a href="{{ route('trang-chu') }}"><i class="fa fa-chevron-right"></i>Trang chủ</a></li>
							<li><a href="{{ route('gioithieu') }}"><i class="fa fa-chevron-right"></i>Giới thiệu</a></li>
							<li><a href="{{ route('lienhe') }}"><i class="fa fa-chevron-right"></i>Liên hệ</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="widget">
					<h4 class="widget-title">Loại sản phẩm</h4>
					<div>
						<ul>
							@foreach ($loai as $l)
							<li><a href="{{ route('loaisanpham',$l->id) }}"><i class="fa fa-chevron-right"></i> {{$l->name}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="col-sm-10">
					<div class="widget">
						<h4 class="widget-title">Liên hệ</h4>
						<div>
							<div class="contact-info">
								<i class="fa fa-map-marker"></i>
								<p>475A Điện Biên Phủ, P.25, Q.Bình Thạnh, TP.HCM</p>
								<p>SĐT:(028) 5445 7777</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="widget">
					<h4 class="widget-title" style="text-align: center">Cake House</h4>
					<img src="source/assets/dest/images/cakehouse.png" alt=""  />
				</div>
			</div>
		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- #footer -->
<div class="copyright">
	<div class="container">
		<p class="pull-right pay-options">
			<a href="{{ route('trang-chu') }}"><img src="source/assets/dest/images/logobanh.png" alt="" style="height: 30px;
			width: 40px;
			margin-top: 10px;
			margin-right: 36pc;" /></a>
		</p>
		<div class="clearfix"></div>
	</div> <!-- .container -->
	</div> <!-- .copyright -->