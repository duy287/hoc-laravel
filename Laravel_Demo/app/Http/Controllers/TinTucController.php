<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

class TinTucController extends Controller
{
    public function getDanhSach(){
        $tintuc=TinTuc::orderBy('id','Desc')->get();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getThem(){
        $theloai=TheLoai::all();
        $loaitin=LoaiTin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function postThem(Request $request){
        //validate
        $this->validate($request,
            [
                'TieuDe'=>'required|min:4|max:50',
                'TomTat'=>'required|min:4|max:50',
                'NoiDung'=>'required|min:4',
                'LoaiTin'=>'required',
                'NoiBat'=>'required'
            ],
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute ít nhất 4 ký tự',
                'max'=>':attribute tối đa 50 ký tự',
            ],
            [
                'TieuDe'=>'Tên tiêu đề',
                'TomTat'=>'Tóm tắt',
                'NoiDung'=>'Nội dung',
                'LoaiTin'=>'Loại tin',
                'NoiBat'=>'Nổi bật'
            ]
        );
        //them
        $tintuc=new TinTuc;
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        //upload file hinh
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $file->move('upload/tintuc',$file->getClientOriginalName('Hinh'));
            $tintuc->Hinh=$file->getClientOriginalName('Hinh');
        }
        else{
            $tintuc->Hinh="";
        }
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->NoiBat=$request->NoiBat;
        $tintuc->SoLuotXem=0;
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Bạn vừa thêm tin tuc thành công');
    }

    public function getSua($id){
        $theloai=TheLoai::all();
        $loaitin=LoaiTin::all();
        $tintuc=TinTuc::find($id);
        return view('admin/tintuc/sua',['theloai'=>$theloai,'loaitin'=>$loaitin, 'tintuc'=>$tintuc]);
    }

    public function postSua(Request $request, $id){
        //validate
        $this->validate($request,
            [
                'TieuDe'=>'required|min:4|max:50',
                'TomTat'=>'required|min:4|max:50',
                'NoiDung'=>'required|min:4',
                'LoaiTin'=>'required',
                'NoiBat'=>'required'
            ],
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute ít nhất 4 ký tự',
                'max'=>':attribute tối đa 50 ký tự',
            ],
            [
                'TieuDe'=>'Tên tiêu đề',
                'TomTat'=>'Tóm tắt',
                'NoiDung'=>'Nội dung',
                'LoaiTin'=>'Loại tin',
                'NoiBat'=>'Nổi bật'
            ]
        );
        //tim kiem
        $tintuc=TinTuc::find($id);
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        //upload hình nếu có
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $file->move('upload/tintuc',$file->getClientOriginalName('Hinh'));
            unlink("upload/tintuc/".$tintuc->Hinh); //xoá hình cũ
            $tintuc->Hinh=$file->getClientOriginalName('Hinh');
            
        }
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->NoiBat=$request->NoiBat;
        $tintuc->SoLuotXem=0;
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Bạn vừa sửa tin tuc thành công');
    }

    public function getXoa($id){
        $tintuc=TinTuc::find($id);
        unlink("upload/tintuc/".$tintuc->Hinh); //xoá hình cũ
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Bạn vừa xoá tin tuc thành công');
    }
}
