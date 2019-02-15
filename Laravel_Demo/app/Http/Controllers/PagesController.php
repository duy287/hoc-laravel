<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use App\User;

class PagesController extends Controller
{
    public function trangchu(){
        // $theloai=TheLoai::all();
        // return view('pages.trangchu',['theloai'=>$theloai]);
        return view('pages.trangchu'); //sử dụng dữ liệu được share bên Provider
    }

    public function lienhe(){
        return view('pages.lienhe'); 
    }

    public function loaitin($id){
        $loaitin=LoaiTin::find($id);
        //$tintuc=$loaitin->tintuc->paginate(5);//cach này ko tồn tại
        $tintuc=TinTuc::where('idLoaiTin',$id)->paginate(5);

        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }

    public function tintuc($id){
        $tintuc=TinTuc::find($id);

        $tinnoibat=TinTuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan=TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get(); //lấy các tin tức cùng loại tin

        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }

    public function getDangNhap(){
        return view('pages.dangnhap');
    }
    public function postDangNhap(Request $request){
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
            return redirect('trangchu');
        }
        else{
            return redirect('dangnhap')->with('thongbao','email hoặc password không chính xác');
        }
    }
    public function getDangXuat(){
        Auth::logout();
        return redirect('trangchu');
    }

    public function getNguoiDung(){
        $user=Auth::user();
        return view ('pages.nguoidung',['user'=>$user]);
    }
    public function postNguoiDung(Request $request){
       //validate
       $this->validate($request,
       [
           'name'=>'required|min:4|max:50',
           'email'=>'required|min:4|max:50'
       ],
       [
           'required'=>':attribute không được để trống',
           'min'=>':attribute ít nhất 4 ký tự',
           'max'=>':attribute tối đa 50 ký tự'
       ],
       [
           'name'=>'Tên',
           'email'=>'Địa chi email'
       ]);
       //sua

       $user=Auth::user();
       $user->name=$request->name;

       if($request->checkpassword =='on'){
           $this->validate($request,
           [
               'password'=>'required|unique:users,password|min:4',
               'passwordAgain'=>'required|same:password'    //passwordAgain=password
           ],
           [
               'required'=>':attribute không được để trống',
               'min'=>':attribute ít nhất 4 ký tự',
               'unique'=>':attribute đã bị trùng',
               'same'=>'không trùng khớp'
           ],
           [
               'password'=>'Mật khẩu',
               'passwordAgain'=>'Mật khẩu'
           ]);
           $user->password=bcrypt($request->password);
       }
        $user->save();
        return redirect('nguoidung')->with('thongbao','sua user thành công');   
    }

    public function getDangKy(){
        return view('pages.dangky');
    }
    public function postDangKy(Request $request){
         //validate
         $this->validate($request,
         [
             'name'=>'required|min:4|max:50',
             'email'=>'required|min:4|max:50',
             'password'=>'required|unique:users,password|min:4',
             'passwordAgain'=>'Required|same:password'
         ],
         [
             'required'=>':attribute không được để trống',
             'min'=>':attribute ít nhất 4 ký tự',
             'max'=>':attribute tối đa 50 ký tự',
             'unique'=>':attribute đã bị trùng',
             'same'=>':attribute không trùng khớp'
         ],
         [
             'name'=>'Tên',
             'email'=>'Địa chie email',
             'password'=>'Mật khẩu',
             'passwordAgain'=>'Nhập lại mật khẩu'
         ]);
         //them
         $user=new User;
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password=bcrypt($request->password);
         $user->quyen=0;
         $user->save();
         return redirect('dangnhap')->with('thongbao','đăng ký thành công');
    }

    public function timkiem(Request $request){
        $tukhoa=$request->tukhoa;
        $tintuc=TinTuc::where('TieuDe','like',"%$tukhoa%")->orwhere('TomTat','like',"%$tukhoa%")
            ->orwhere('NoiDung','like',"%$tukhoa%")->paginate(5);// mỗi trang 5 tin
        return view('pages.ketquatimkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
    }
}
