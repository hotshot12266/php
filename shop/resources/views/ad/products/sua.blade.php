@extends('ad.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Bánh
                    <small>{{$products->name}},{{$products->id}}</small>
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
            <form action="ad/products/sua/{{$products->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group">
                    <label>Loại Bánh</label>
                    <select class="form-control" name="ProductType" id="ProductType">
                       @foreach($product_type as $lb)

                       <option
                       @if($products->product_type->id == $lb->id)
                         {{"selected"}} 
                       @endif
                         value="{{$lb->id}}">{{$lb->name}}</option>
                       @endforeach
                   </select>
               </div>
               <div class="form-group">
                <label>Tên Loại Bánh</label>
                <input class="form-control" name="name" placeholder="Nhập tên loại bánh" value="{{$products->name}}" />
            </div>
            <div class="form-group">
              <label>Nội Dung</label>
              <textarea id ="demo" name ="description" class="form-control ckeditor" rows="3" >
                   {{$products->description}}
              </textarea>
          </div>
          <div class="form-group">
              <label>Đơn giá</label>
              <input class="form-control" name="unit_price" placeholder="Nhập tiêu đề" value="{{$products->unit_price}}" />
          </div>
          <div class="form-group">
              <label>Giá Khuyến Mãi</label>
              <input class="form-control" name="promotion_price" placeholder="Nhập tiêu đề" value="{{$products->promotion_price}}"/>
          </div>
          <div class="form-group">
            <label>Đơn vị tính :</label>
            <label class="radio-inline">
                <input name="unit" value="hộp"
                @if($products->unit ==  "hộp" )
                  {{"checked"}} 
                @endif
                type="radio">Hộp
            </label>
            <label class="radio-inline">
              <input name="unit" value="cái"
              @if($products->unit == "cái")
                 {{"checked"}} 
              @endif
              type="radio">Cái
          </label>
      </div>
      <div class="form-group">
            <label>Tình Trạng :</label>
            <label class="radio-inline">
                <input name="new" value="0"
                @if($products->new ==  0 )
                  {{"checked"}} 
                @endif
                type="radio">Không
            </label>
            <label class="radio-inline">
              <input name="new" value="1"
              @if($products->new == 1)
                 {{"checked"}} 
              @endif
              type="radio">Mới
          </label>
      </div>
      <div class="form-group">
          <p><img width="250px" height="300px" src="source/image/product/{{$products->image}}"></p>
          <input type="file" name="image" class="form-control" /> 
      </div>
      <button type="submit" class="btn btn-default"> Sửa </button>
      <button type="reset" class="btn btn-default">Làm mới</button>
      <form>
      </div>
  </div>  
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection