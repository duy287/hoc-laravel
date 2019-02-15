@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Add</small>
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="TieuDe" />
                        @if($errors->has('TieuDe'))
                                {{$errors->first('TieuDe')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <input class="form-control" name="TomTat" />
                        @if($errors->has('TomTat'))
                            {{$errors->first('TomTat')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control ckeditor" name="NoiDung" row='4' id="demo"></textarea>
                        @if($errors->has('NoiDung'))
                            {{$errors->first('NoiDung')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Hình đại diện</label>
                        <input type='file' name="Hinh" />
                        {{--  @if($errors->has('Hinh'))
                            {{$errors->first('Hinh')}}
                        @endif  --}}
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            @foreach($theloai as $tl)
                                <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                            <!--Chay ajax dua vao theloai-->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nổi bật</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" checked type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" type="radio">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
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