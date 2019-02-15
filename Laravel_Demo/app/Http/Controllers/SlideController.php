<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    public function getDanhSach(){
        $slide=Slide::all();
        return view('admin/slide/danhsach',['slide'=>$slide]);
    }
    public function getThem(){
        return view('admin/slide/them');
    }
    public function postThem(Request $request){
        //validate
        $this->validate($request,
            [
                'Ten'=>'required|min:4|max:50',
                'NoiDung'=>'required',
                'Link'=>'required'
            ],
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute ít nhất 4 ký tự',
                'max'=>':attribute tối đa 50 ký tự'
            ],
            [
                'Ten'=>'Tên Slide',
                'NoiDung'=>'Nội dung mô tả slide',
                'Link'=>'Link slide'
            ]
        );
        //them
        $slide=new Slide;
        $slide->Ten=$request->Ten;
        $slide->NoiDung=$request->NoiDung;
        $slide->link=$request->Link;

        if($request->hasFile('Hinh')){            
            $file=$request->file('Hinh');
            $old_name=$file->getClientOriginalName('Hinh'); //lấy tên file upload
            $new_name=str_random(4)."_".$old_name; //tạo tên mới bằng cách random thêm 4 ký tự phía trước
            while(file_exists('upload/slide/'.$new_name)){ //nếu file đã tồn tại trong thư mục
                $new_name=str_random(4)."_".$old_name; //thì random lại tên mới
            }
		$file->move('upload/slide', $new_name);
		$slide->Hinh=$new_name;
       }
       else{
            $slide->Hinh="";
        }

        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Bạn vừa thêm 1 slide thành công');
    }

    public function getSua($id){
        $slide=Slide::find($id);
        return view('admin/slide/sua', ['slide'=>$slide]);
    }

    public function postSua(Request $request, $id){
        //validate
        $this->validate($request,
            [
                'Ten'=>'required|min:4|max:50',
                'NoiDung'=>'required',
                'Link'=>'required'
            ],
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute ít nhất 4 ký tự',
                'max'=>':attribute tối đa 50 ký tự'
            ],
            [
                'Ten'=>'Tên Slide',
                'NoiDung'=>'Nội dung mô tả slide',
                'Link'=>'Link slide'
            ]
        );
        //sua
        $slide=Slide::find($id);
        $slide->Ten=$request->Ten;
        $slide->NoiDung=$request->NoiDung;
        $slide->link=$request->Link;

        if($request->hasFile('Hinh')){            
            $file=$request->file('Hinh');
            $old_name=$file->getClientOriginalName('Hinh'); //lấy tên file upload
            $new_name=str_random(4)."_".$old_name; //tạo tên mới bằng cách random thêm 4 ký tự phía trước
            while(file_exists('upload/slide/'.$new_name)){ //nếu file đã tồn tại trong thư mục
                $new_name=str_random(4)."_".$old_name; //thì random lại tên mới
            }
        $file->move('upload/slide', $new_name);
        unlink("upload/slide/".$slide->Hinh); //xoá hình slide cũ
        $slide->Hinh=$new_name;
        
       }
        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Bạn vừa sua slide thành công');
    }

    public function getXoa($id){
        $slide=Slide::find($id);
        unlink("upload/slide/".$slide->Hinh); //xoá hình slide cũ
        $slide->delete();
        return redirect('admin/slide/danhsach');
    }
}
