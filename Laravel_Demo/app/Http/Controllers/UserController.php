<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function getDanhSach(){
        $user=User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getThem(){
        return view('admin.user.them');
    }
    public function postThem(Request $request){
        //validate
        $this->validate($request,
        [
            'Ten'=>'required|min:4|max:50',
            'Email'=>'required|min:4|max:50',
            'Password'=>'required|unique:users,password|min:4',
            'RePassword'=>'Required|same:Password'
        ],
        [
            'required'=>':attribute không được để trống',
            'min'=>':attribute ít nhất 4 ký tự',
            'max'=>':attribute tối đa 50 ký tự',
            'unique'=>':attribute đã bị trùng',
            'same'=>':attribute không trùng khớp'
        ],
        [
            'Ten'=>'Tên',
            'Email'=>'Địa chi email',
            'Password'=>'Mật khẩu',
            'RePassword'=>'Nhập lại mật khẩu'
        ]);
        //them
        $user=new User;
        $user->name=$request->Ten;
        $user->email=$request->Email;
        $user->password=bcrypt($request->Password);
        $user->quyen=$request->Quyen;
        $user->save();
        return redirect('admin/user/them')->with('thongbao','thêm user thành công');
    }

    public function getSua($id){
        $user=User::find($id);
        return view('admin.user.sua',['user'=> $user]);
    }
    public function postSua(Request $request, $id){
        //validate
        $this->validate($request,
        [
            'Ten'=>'required|min:4|max:50',
            'Email'=>'required|min:4|max:50'
        ],
        [
            'required'=>':attribute không được để trống',
            'min'=>':attribute ít nhất 4 ký tự',
            'max'=>':attribute tối đa 50 ký tự'
        ],
        [
            'Ten'=>'Tên',
            'Email'=>'Địa chie email'
        ]);
        //sua
        $user=User::find($id);
        $user->name=$request->Ten;
        $user->email=$request->Email;    
        $user->quyen=$request->Quyen;

        if($request->ChangePassword =='on'){
            $this->validate($request,
            [
                'NewPassword'=>'required|unique:users,password|min:4',
            ],
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute ít nhất 4 ký tự',
                'unique'=>':attribute đã bị trùng',
            ],
            [
                'NewPassword'=>'Mật khẩu',
            ]);
            $user->password=bcrypt($request->NewPassword);
        }
        $user->save();
        
        return redirect('admin/user/sua/'.$id)->with('thongbao','sua user thành công');   
    }

    public function getXoa($id){
        $user=User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach');   
    }

    //================ Login-Logout ==================//
    public function getDangNhapAdmin(){
        return view('admin.login');
    }
    public function postDangNhapAdmin(Request $request){
        //validate
        $this->validate($request,
        [
            'email'=>'required|min:4|max:50',
            'password'=>'required|min:4|max:50'
        ],
      
        [
            'email.required'=>'bạn chưa nhập email',
            'password.required'=>'bạn chưa nhập password',
            'password.min'=>'password phải có tối thiểu 4 ký tự'
        ]);

        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email'=>$email, 'password'=>$password])){
            return redirect('admin/theloai/danhsach');
        }
        else{
            return redirect('admin/dangnhap')->with('thongbao','email hoặc password không chính xác');
        }
    }
    public function getDangXuatAdmin(){
        Auth::logout(); 
        return view('admin.login');    
    }
}

