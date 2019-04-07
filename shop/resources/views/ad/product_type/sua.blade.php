@extends('ad.layout.index')
@section('content')
     <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Bánh
                            <small>{{$product_type->name}}</small>
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
                        <form action="ad/product_type/sua/{{$product_type->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên Loại Bánh</label>
                                <input class="form-control" name="name" placeholder="Nhập tên loại bánh" value="{{$product_type->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Thông tin loại bánh</label>
                                <textarea class="form-control" rows="5" name="description" >
                                {{$product_type->description}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p><img width="250px" height="300px" src="source/image/product/{{$product_type->image}}"></p>
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