@extends('ad.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <h1 class="page-header">Thông Tin
                        <small>Đơn Hàng</small>
                      </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                      {{session('thongbao')}}
                    </div>
                    @endif
                  {{--   <div class="beta-comp">
                      <form role="search" method="get" id="searchform" action="{{ route('search1') }}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                      </form>
                    </div> --}}
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr align="center">
                          <th>Bill Id</th>
                          <th>Tên Bánh</th>
                          <th>Số Lượng</th>
                          <th>Đơn Gía</th>
                          <th>Tổng Tiền</th>
                          <th>Tên KH</th>
                          <th>SĐT</th>
                          <th>Ghi Chú</th>
                          <th>Ngày Đặt</th>
                          <th>Phương thức TT</th>
                          <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($bill_detail as $bd)
                         <tr class="odd gradeX" align="center">
                          <td>{{$bd->bill->id}}</td>
                          <td><p>{{$bd->products->name}}</p>
                            <img width ="100px" src="source/image/product/{{$bd->products->image}}" />
                          </td>
                          <td>{{$bd->quantity}}</td>
                          <td>{{$bd->unit_price}}</td>
                          <td>{{$bd->bill->total}}</td>
                           <td>{{$bd->bill->customer->name}}</td>     
                          <td>{{$bd->bill->customer->phone_number}}</td> 
                          <td>{{$bd->bill->customer->note}}</td>
                          <td>{{$bd->bill->date_order}}</td>
                          <td>{{$bd->bill->payment}}</td> 
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="ad/bill_detail/xoa/{{$bd->id}}">Delete</a></td>
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