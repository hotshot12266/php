@extends('ad.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">SLIDE
                    <small>Danh sách</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Link</th>
                        <th>Hình</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slide as $sd)
                    <tr class="odd gradeX" align="center">
                        <td>{{$sd->id}}</td>
                        <td>{{$sd->link}}</td>
                        <td>
                           <img width ="300px" src="source/image/slide/{{$sd->image}}" />
                        </td>
                      
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="ad/slide/xoa/{{$sd->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="ad/slide/sua/{{$sd->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
        <!-- /#page-wrapper -->

@endsection