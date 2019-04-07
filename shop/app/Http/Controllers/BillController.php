<?php

namespace App\Http\Controllers;
use Session;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Bill;
use App\BillDetail;
use App\Customer;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function getDanhSach()
    {
        // $bill = Bill::all();
        $bill_detail=BillDetail::all();
      
        return view('ad.bill_detail.danhsach',['bill_detail'=>$bill_detail]);
    }
      public function getXoa($id)
    {
    	$bill_detail=BillDetail::find($id);
        $bill_detail->delete();
        return redirect('ad/bill_detail/danhsach/')->with('thongbao','Xóa thành công');
    }

}
