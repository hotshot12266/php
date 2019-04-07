<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Bill;
use App\BillDetail;
use App\Customer;
use App\User;
use Session;

use Illuminate\Http\Request;

Class UserController extends Controller
{
    public function getDanhSach()
    {
        $users = User::all();  
        return view('ad.users.danhsach',['users'=>$users]);
    }
    public function getSua($id)
    {   
        $users= User::find($id);
        return view('ad.users.sua' ,['users'=>$users]);
    }
       public function postSua(Request $request ,$id)
    {
        $this->validate($request,[
            'full_name' => 'required|min:3',
        ],
        [
            'full_name.required'=>'Bạn chưa nhập tên',
            'full_name.min' =>'Tên người dùng phải có ít nhất 3 ký tự',
        ]);
        $users = User::find($id);
        $users->full_name= $request->full_name;
        $users->address= $request->address;
        $users->phone= $request->phone;
        $users->quyen= $request->quyen;
        if(isset($request->changePass ))
        {
            $this->validate($request,[
                'full_name' => 'required|min:3',
                'email' => 'required|email',
                'password'=>'required|min:3',
                'passwordAgain' => 'required|same:password'
            ],[
                'full_name.required'=>'Bạn chưa nhập tên',
                'full_name.min' =>'Tên người dùng phải có ít nhất 3 ký tự',
                'email.required' => 'Chưa nhập Email ',
                'password.required' =>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu chưa khớp'
            ]);

            $users->password= bcrypt($request->password);
        }

        $users->save();
        return redirect('ad/users/sua/'.$id)->with('thongbao',' Sửa thành công');
    }
    public function getXoa($id)
    {
      $users = User::find($id);
      $users->delete(); //Xóa users
      return redirect('ad/users/danhsach')->with('thongbao','Xóa tài khoản thành công');
    }
     public function getDangnhapAdmin()
    {
       return view('ad.login');
    }
    public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,
            [
            'email'=>'required|email',
            'password'=>'required|min:3|max:32',
            ],[
            'email.required'=>'Bạn chưa nhập Email',
            'password.required'=>'Bạn chưa nhập Pass',
            'password.min'=>'Đăng nhập không thành công',
            'password.max'=>'Đăng nhập không thành công',
            ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('ad/products/danhsach');
        }
        else
        {
            return redirect('ad/dangnhap')->with('thongbao','Đăng nhập không thành công');
        }

    }
    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('ad/dangnhap');
    }

}
