<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;

use Illuminate\Http\Request;

class Product_TypeController extends Controller
{
    public function getDanhSach()
    {
        $product_type = ProductType::all();  
        return view('ad.product_type.danhsach',['product_type'=>$product_type]);
    }
    public function getThem()
    {
        $product_type= ProductType::all();
        return view('ad.product_type.them',['product_type'=>$product_type]);
    }
    public function postThem(Request $request)
    {
       $this->validate($request,
        [
            'name' => 'required | min: 3|unique:type_products,name', 
            'description' =>'required'
        ],[
            'name.required'=>'Bạn chưa nhập tên',
            'name.unique'=>'Tên đã tồn tại',     
            'name.min'=>'Tên phải từ 3 ký tự',
            'description.required'=>'Bạn chưa nhập thông tin loại bánh',
        ]);
        $product_type = new ProductType;
        $product_type->name = $request->name;
        $product_type->description = $request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png')
            {
             return redirect('ad/product_type/them')->with('loi','Ban chỉ chọn file có đuôi : jpg,png');
            }
            $name1 = $file->getClientOriginalName();
            $image = str_random(4)."_".$name1;
            $file->move('source/image/product',$image);
            $product_type->image =$image;
        }
        else
        {
            $product_type->image="";
        }
        $product_type->save();
        return redirect('ad/product_type/them')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getSua($id)
    {   
        $product_type= ProductType::find($id);
        return view('ad.product_type.sua' ,['product_type'=>$product_type]);
    }
    public function postSua(Request $request ,$id)
    {
        $product_type = ProductType::find($id); 
        $this->validate($request,
            [
                'name' => 'required|min:3|unique:type_products,name,'.$id,
            ],[
                'name.required'=>'Bạn chưa nhập tên',
                'name.unique'=>'Tên đã tồn tại',     
                'name.min'=>'Tên phải có 3 ký tự'
            ]);
        $product_type->name = $request->name;
        $product_type->description = $request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png')
            {
               return redirect('ad/product_type/them')->with('loi','Ban chỉ chọn file có đuôi : jpg,png');
           }
           $name1 = $file->getClientOriginalName();
           $image = str_random(4)."_".$name1;
           $file->move('source/image/product',$image);
           unlink("source/image/product/".$product_type->image);
           $product_type->image =$image;
        }
        $product_type->save();
        return redirect('ad/product_type/sua/'.$id)->with('thongbao','Sửa thành công');
    }
     public function getXoa($id)
    {
         $product_type = ProductType::find($id); 
     
       // $tintuc = TinTuc::where('idLoaiTin',$id)->delete(); 
    
        $product_type->delete(); 
        return redirect('ad/product_type/danhsach')->with('thongbao','Xóa thành công');
    }

}
