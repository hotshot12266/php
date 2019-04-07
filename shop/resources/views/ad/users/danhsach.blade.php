@extends('ad.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
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
                                <th>Tên KH</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($users as $kh)
                           <tr class="odd gradeX" align="center">
                            <td>{{$kh->id}}</td>
                            <td>{{$kh->full_name}}</td>
                            <td>{{$kh->email }}</td>
                            <td>{{$kh->phone }}</td>
                            <td>{{$kh->address }}</td>    
                           <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="ad/users/xoa/{{$kh->id}}">Delete</a></td>
                           <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="ad/users/sua/{{$kh->id}}">Edit</a></td>
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