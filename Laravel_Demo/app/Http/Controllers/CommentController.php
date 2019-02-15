<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\TinTuc;
class CommentController extends Controller
{
    public function getXoa($idComment, $idTinTuc){
        $comment=Comment::find($idComment);
        $comment->delete();
        return redirect('admin/tintuc/sua/'.$idTinTuc); //quay lai trang sua tin tuc
    }

    public function postComment(Request $request,$id){
        $comment = new Comment;
        $comment->idUser = Auth::user()->id;
        $comment->idTinTuc = $id;
        $comment->NoiDung = $request->NoiDung;
        $comment->save();

        $tintuc = TinTuc::find($id);
        return redirect('tintuc/'.$id.'/'.$tintuc->TieuDeKhongDau.'.html');
    }
}