@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm
                    <small>Loại tin</small>
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                @if($errors->has('Ten'))
                    <div class="alert alert-danger">
                        {{$errors->first('Ten')}}
                    </div>
                @endif
                <form action="admin/loaitin/them" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Danh sách thể loại</label>
                        <select class="form-control" name="TheLoai">
                            @foreach($dstheloai as $tl)
                                <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên loại tin</label>
                        <input class="form-control" name="Ten"/>
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
    </div>
</div>
@endsection