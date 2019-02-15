<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
        $theloai=TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function getThem(){
        return view('admin.loaitin.them');
    }
    public function postThem(Request $request){
        //validate
        $this->validate($request,
            [
                'TenTheLoai'=>'required|min:4|max:50'
            ],

            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute ít nhất 4 ký tự',
                'max'=>':attribute tối đa 50 ký tự'
            ],

            ['TenTheLoai'=>'Tên thể loại']
        );
        //them
        $theloai= new TheLoai;
        $theloai->Ten=$request->TenTheLoai;
        $theloai->TenKhongDau=changeTitle($request->TenTheLoai);
        $theloai->save();

        return redirect('admin/theloai/them')->with('thongbao','thêm thành công');
    }

    public function getSua($id){
        $theloai=TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postSua(Request $request, $id){
        //validate
        $this->validate($request,
            ['tentheloai'=>'required|unique:TheLoai,Ten|min:4|max:50'], //unique: không được trùng với Ten khác trong bản Theloai
            ['required'=>':attribute không được để trống',
             'unique'=>':attribute đã tồn tại',
             'min'=>':attribute ít nhất 4 ký tự',
             'max'=>':attribute tối đa 50 ký tự'
            ],
            ['tentheloai'=>'Tên thể loại']
        );
        //cap nhat
        $theloai=TheLoai::find($id);
        $theloai->Ten=$request->tentheloai;
        $theloai->TenKhongDau=changeTitle($request->tentheloai);
        $theloai->save();

        return redirect("admin/theloai/sua/".$id)->with('thongbao','sửa thành công');       
    }

    public function getXoa($id){
        $theloai=TheLoai::find($id);
        $theloai->delete();
        return redirect("admin/theloai/danhsach");
    }
}
