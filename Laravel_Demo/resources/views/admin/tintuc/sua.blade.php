@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Edit</small>
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="TieuDe" value="{{$tintuc->TieuDe}}" />
                        @if($errors->has('TieuDe'))
                                {{$errors->first('TieuDe')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <input class="form-control" name="TomTat" value="{{$tintuc->TomTat}}"/>
                        @if($errors->has('TomTat'))
                            {{$errors->first('TomTat')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control ckeditor" name="NoiDung" row='4' id="demo">{{$tintuc->NoiDung}}</textarea>
                        @if($errors->has('NoiDung'))
                            {{$errors->first('NoiDung')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Hình đại diện</label>
                        <div><img src="upload/tintuc/{{$tintuc->Hinh}}" alt="" width="150px"></div>
                        <input type='file' name="Hinh" />
                        {{--  @if($errors->has('Hinh'))
                            {{$errors->first('Hinh')}}
                        @endif  --}}
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            @foreach($theloai as $tl)
                                @if($tintuc->loaitin->theloai->id==$tl->id)
                                    <option value="{{$tl->id}}" selected>{{$tl->Ten}}</option>
                                @else
                                    <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                            @foreach($loaitin as $lt)
                                @if($tintuc->idLoaiTin==$lt->id)
                                    <option value="{{$lt->id}}" selected>{{$lt->Ten}}</option>
                                @else
                                    <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nổi bật</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" @if($tintuc->NoiBat==1)checked="" @endif type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" @if($tintuc->NoiBat==0)checked="" @endif type="radio">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!--Danh sách comment-->
        <div class="row">
            <div class="col-lg-12">
                <strong>List comment</strong>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Người dùng</th>
                        <th>Nội dung</th>
                        <th>Ngày đăng</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tintuc->comment as $cm)
                    <tr class="odd gradeX" align="center">
                        <td>{{$cm->id}}</td>
                        <td>{{$cm->user->name}}</td>
                        <td>{{$cm->NoiDung}}</td>
                        <td>{{$cm->created_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$tintuc->id}}"> Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<!--  Tạo ajax cho select box theloai  -->
@section('script')
    <script>
    $(document).ready(function(){
        $('#TheLoai').change(function(){
            var idTheLoai=$(this).val();
            $.get("admin/ajax/loaitin/" + idTheLoai, function(data){
                $('#LoaiTin').html(data);
            });
        });
    });
    </script>
@endsection