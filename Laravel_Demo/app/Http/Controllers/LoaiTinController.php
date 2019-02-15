<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
    public function getDanhSach(){
        $loaitin=LoaiTin::all();
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getThem(){
        $dsTheLoai=TheLoai::all(); //dùng để xuất ra ds theloai trong select box
        return view('admin.loaitin.them',['dstheloai'=>$dsTheLoai]);
    }
    public function postThem(Request $request){
        //validate
        $this->validate($request,
            ['Ten'=>'required|min:4|max:50'],
            ['required'=>':attribute không được để trống',
             'min'=>':attribute ít nhất 4 ký tự',
             'max'=>':attribute tối đa 50 ký tự'
            ],
            ['Ten'=>'Tên loại tin']
        );
        //them
        $loaitin=new LoaiTin;
        $loaitin->Ten=$request->Ten;
        $loaitin->idTheLoai=$request->TheLoai;
        $loaitin->TenKhongDau=changeTitle($request->Ten);
        $loaitin->save();

        return redirect('admin/loaitin/them')->with('thongbao','thêm thành công');
    }

    public function getSua($id){
        $loaitin=LoaiTin::find($id);
        $dstheloai=TheLoai::all(); //dùng để xuất ra ds theloai trong select box
        return view('admin.loaitin.sua', ['loaitin'=>$loaitin,'theloai'=>$dstheloai]);
    }
    public function postSua(Request $request, $id){
        //validate
        $this->validate($request,
            ['Ten'=>'required|unique:LoaiTin,Ten|min:4|max:50'], //unique: không được trùng với Ten khác trong bản Theloai
            ['required'=>':attribute không được để trống',
             'unique'=>':attribute đã tồn tại',
             'min'=>':attribute ít nhất 4 ký tự',
             'max'=>':attribute tối đa 50 ký tự'
            ],
            ['Ten'=>'Tên loai tin']
        );
        //cap nhat
        $loaitin=LoaiTin::find($id);
        $loaitin->idTheLoai=$request->TheLoai;
        $loaitin->Ten=$request->Ten;
        $loaitin->TenKhongDau=changeTitle($request->Ten);
        $loaitin->save();

        return redirect("admin/loaitin/sua/".$id)->with('thongbao','sửa thành công');       
    }

    public function getXoa($id){
        $loaitin=LoaiTin::find($id);
        $loaitin->delete();
        return redirect("admin/loaitin/danhsach");
    }
}
