<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getDanhSach()
    {
        $products = Product::all();  
        return view('ad.products.danhsach',['products'=>$products]);
    }
    public function getThem()
    {
        $product_type= ProductType::all();
        $products = Product::all();
        return view('ad.products.them',['products'=>$products,'product_type'=>$product_type]);
    }
    public function postThem(Request $request)
    {

       $this->validate($request,
        [
            'name' => 'required | min: 1',
            'description' =>'required',
            'unit_price'=>'required'
        ],[
            'name.required'=>'Bạn chưa nhập tên',
            'name.unique'=>'Tên đã tồn tại',     
            'name.min'=>'Tên phải từ 3 ký tự',
            'description.required'=>'Bạn chưa nhập thông tin loại bánh',
            'unit_price.required'=>'Bạn chưa nhập đơn giá'
        ]);
     
        $products = new Product;
        $products->name = $request->name;
        $products->id_type = $request->ProductType;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        $products->unit = $request->unit;
        $products->new = $request->new;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png')
            {
             return redirect('ad/products/them')->with('loi','Ban chỉ chọn file có đuôi : jpg,png');
            }
            $name1 = $file->getClientOriginalName();
            $image = str_random(4)."_".$name1;
            $file->move('source/image/product',$image);
            $products->image =$image;
        }
        else
        {
            $products->image="";
        }
        $products->save();
        return redirect('ad/products/them')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getSua($id)
    {   
        $product_type= ProductType::all();
        $products= Product::find($id);
        return view('ad.products.sua' ,['products'=>$products,'product_type'=>$product_type]);
    }
    public function postSua(Request $request ,$id)
    {
       
        $this->validate($request,
            [
                'name' => 'required|min:3',

            ],[
                'name.required'=>'Bạn chưa nhập tên',
                'name.unique'=>'Tên đã tồn tại',     
                'name.min'=>'Tên phải có 3 ký tự'
            ]);
        $products = Product::find($id); 
        $products->id_type = $request->ProductType;
        $products->name = $request->name;
        $products->description =  $request->description;
        $products->unit_price =  $request->unit_price;
        $products->promotion_price =  $request->promotion_price;
        $products->unit = $request->unit;
        $products->new = $request->new;
        if($request->hasFile('image'))
         {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png')
            {
               return redirect('ad/products/them')->with('loi','Ban chỉ chọn file có đuôi : jpg,png');
           }
           $name1 = $file->getClientOriginalName();
            $image = str_random(4)."_".$name1;
           $file->move('source/image/product',$image);
           if($products->image){
            unlink("source/image/product/".$products->image);
            }   
           //unlink("source/image/product/".$products->image);
           $products->image =$image;
        }
        $products->save();
        return redirect('ad/products/sua/'.$id)->with('thongbao','Sửa thành công');
    }
     public function getXoa($id)
    {
         $products = Product::find($id); 
     
       // $tintuc = TinTuc::where('idLoaiTin',$id)->delete(); 
    
        $products->delete(); 
        return redirect('ad/products/danhsach')->with('thongbao','Xóa thành công');
    }

}
