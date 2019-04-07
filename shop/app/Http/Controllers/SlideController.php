<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;

use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function getDanhSach()
    {
        $slide = Slide::all();  
        return view('ad.slide.danhsach',['slide'=>$slide]);
    }
    public function getThem() 
    {

        return view('ad.slide.them');
    }

    public function postThem(Request $request)
    {

        $slide = new Slide;
        if($request->has('link'))
        {
            $slide->link = $request->link;
        } 
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('ad/slide/them')->with('loi','Bạn chỉ được chọn hình');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists("source/image/slide/".$image))
            {
                $image = str_radom(4)."_". $name;
            }

            $file->move("source/image/slide",$image);
            $slide->image = $image;
        }
        else
        {
            $slide->image = "";
        }
        $slide->save();
        return redirect('ad/slide/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('ad.slide.sua',['slide'=>$slide]);
    }

    public function postSua(Request $request, $id)
    {

        $slide = Slide::find($id);
        $slide->link = $request->link;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('ad/slide/them')->with('loi','Bạn chỉ được chọn hình');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists("source/image/slide/".$image))
            {
                $image = str_radom(4)."_". $name;
            }

            $file->move("source/image/slide",$image);
            if($slide->image){
                unlink("source/image/slide/".$slide->image);
            }
            $slide->image = $image;
        }
        $slide->save();
        return redirect('ad/slide/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $slide = Slide::find($id);
        $slide->delete();

        return redirect('ad/slide/danhsach')->with('thongbao','Xóa thành công');
    }

}
