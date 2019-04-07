@extends('ad.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bánh
                            <small>Danh sách</small>
                        </h1>
                    </div>
                
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                      {{session('thongbao')}}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Bánh</th>
                                <th>Loại Bánh</th>
                                <th>Đơn giá</th>
                                <th>Giá Khuyến mãi</th>
                                <th>Đv.tính</th>
                                <th>New</th>                                
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($products as $sp)
                           <tr class="odd gradeX" align="center">
                            <td>{{$sp->id}}</td>
                            <td><p>{{$sp->name}}</p>
                               <img width ="100px" src="source/image/product/{{$sp->image}}" />
                           </td>
                           <td>{{$sp->product_type->name}}</td>
                           <td>{{$sp->unit_price}}</td>
                           <td>{{$sp->promotion_price}}</td>
                           <td>{{$sp->unit}}</td>
                            <td>{{$sp->new}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="ad/products/xoa/{{$sp->id}}">Delete</a></td>
                           <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="ad/products/sua/{{$sp->id}}">Edit</a></td>
                           @endforeach
                       </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection