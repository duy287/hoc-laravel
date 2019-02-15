<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //đăng nhập
    function getLogin(){
        return view('login');
    }

    function postLogin(Request $request){
        $this->validate($request,
        [
            'email'=>'required',
            'password'=>'required'
        ],
        [
            'required'=>':attribute là bắt buộc'
        ],
        [
            'email'=>'Địa chỉ email',
            'password'=>'Mật khẩu'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('trang-chu');
        }
        else{
            return redirect('login')->with('message','Thông tin đăng nhập không chính xác');
        }
    }

    //đăng xuất
    function getLogout(){
        Auth::logout();
        return redirect('trang-chu');
    }

    //Đăng ký
    function getSignup(){
        return view('signup');
    }

    function postSignup(Request $request){
        $this->validate($request,
        [
            'full_name'=>'required|min:5',
            'email'=>'required|unique:users,email',
            'password'=>'required|unique:users,password|min:5',
            'rePassword'=>'required|same:password',
            'phone'=>'required',
            'address'=>'required|min:5'
        ],
        [
            'required'=>':attribute không được bỏ trống',
            'min'=>':attribute tối thiểu :min ký tự',
            'unique'=>':attribute đã tồn tại',
            'same'=>':attribute không trùng khớp',
        ]);

        $user = new User;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect('login')->with('message','Hãy đăng nhập với thông tin bạn vừa đăng ký');
    }
}
