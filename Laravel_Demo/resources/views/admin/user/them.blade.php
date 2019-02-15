@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                {{"Thêm thành công"}}
            @endif
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/user/them" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="Ten" />
                        @if($errors->has('Ten'))
                            {{$errors->first('Ten')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="Email" />
                        @if($errors->has('Email'))
                            {{$errors->first('Email')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control"  type="password" name="Password" />
                        @if($errors->has('Password'))
                            {{$errors->first('Password')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input class="form-control"  type="password" name="RePassword" />
                        @if($errors->has('RePassword'))
                            {{$errors->first('RePassword')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Quyền người dùng:</label>
                        <label class="radio-inline">
                            <input name="Quyen" value="0" checked="" type="radio">Thường
                        </label>
                        <label class="radio-inline">
                            <input name="Quyen" value="1" type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
@endsection