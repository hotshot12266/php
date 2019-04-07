@extends('ad.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Bánh
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Loại Bánh</th>
                                <th>Thông Tin</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($product_type as $lb)
                            <tr class="odd gradeX" align="center">
                                <td>{{$lb->id}}</td>
                                <td><p>{{$lb->name}}</p>
                                     <img width ="100px" src="source/image/product/{{$lb->image}}" />
                                </td>
                                  <td>{{$lb->description}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="ad/product_type/xoa/{{$lb->id}}">Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="ad/product_type/sua/{{$lb->id}}">Edit</a></td>
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