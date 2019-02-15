@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Tin
                    <small>Edit</small>
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                <!--thông báo-->
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                @if($errors->has('tentheloai'))
                    <div class="alert alert-danger">
                        {{$errors->first('tentheloai')}}
                    </div>
                @endif
                <!--Form-->
                <form action="admin/loaitin/sua/{{$loaitin->id}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Thuộc thể loại</label>
                        <select class="form-control" name="TheLoai">
                            @foreach($theloai as $tl)
                                @if($tl->id==$loaitin->idTheLoai)
                                    <option value="{{$tl->id}}" selected>{{$tl->Ten}}</option>
                                @else
                                    <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name=Ten value="{{$loaitin->Ten}}" />
                    </div>
                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
    </div>
</div>
@endsection