@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                    <small>Edit</small>
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/theloai/sua/{{$theloai->id}}" method="POST">
                    {{csrf_field()}}
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
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="tentheloai" value="{{$theloai->Ten}}"/>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
    </div>
</div>
@endsection