@extends('ad.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Danh Mục Bánh
          <small>Thêm</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-lg-7" style="padding-bottom:120px">
        @if(count($errors)>0)
        <div class="alert alert-danger">
          @foreach($errors->all() as $err)
          {{$err}}<br>
          @endforeach
        </div>
        @endif
        @if(session('thongbao'))
        <div class="alert alert-success">
          {{session('thongbao')}}
        </div>
        @endif
        <form action="ad/products/them" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <div class="form-group">
            <label>Loại Bánh</label>
            <select class="form-control" name="ProductType" id="ProductType">
             @foreach($product_type as $lb)
             <option value="{{$lb->id}}">{{$lb->name}}</option>
             @endforeach
           </select>
         </div>
         <div class="form-group">
          <label>Tên Bánh</label>
          <input class="form-control" name="name" placeholder="Nhập tiêu đề" />
        </div>
        <div class="form-group">
          <label>Nội Dung</label>
          <textarea id ="demo" name ="description" class="form-control ckeditor" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label>Đơn giá</label>
          <input class="form-control" name="unit_price" placeholder="Nhập tiêu đề" />
        </div>
        <div class="form-group">
          <label>Giá Khuyến Mãi</label>
          <input class="form-control" name="promotion_price" placeholder="Nhập tiêu đề" />
        </div>
         <div class="form-group">
          <label>Đơn Vị Tính </label><br>
          <label class="radio-inline"> 
            <input name="unit" value="cái" checked="" type="radio">Cái
          </label>
          <label class="radio-inline">
            <input name="unit" value="hộp" type="radio">Hộp
          </label>
        </div>  
        <div class="form-group">
         <label>Tình Trạng </label><br>
          <label class="radio-inline">
            <input name="new" value="0" checked="" type="radio">Không
          </label>
          <label class="radio-inline">
            <input name="new" value="1" type="radio">Mới
          </label>
        </div >  
        <div class="form-group">
          <label>Hình ảnh</label>
          <input type="file" name="image" class="form-control" /> 
        </div>
        <button type="submit" class="btn btn-default">Thêm</button>
        <button type="reset" class="btn btn-default">Làm Mới</button>
        <form>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
  @endsection
  @section('script')
  <script>
    $(document).ready(function(){
     $("#TheLoai").change(function(){
      var idTheLoai = $(this).val();
      $.get("ad/ajax/loaitin/"+idTheLoai,function(data){
       $("#LoaiTin").html(data);        
     });
    });
   });
 </script>   
 @endsection
