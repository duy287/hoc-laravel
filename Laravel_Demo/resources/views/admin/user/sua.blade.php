@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(session('thongbao'))
                    {{session('thongbao')}}
                @endif
                <form action="admin/user/sua/{{$user->id}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="Ten" value="{{$user->name}}" />
                        @if($errors->has('Ten'))
                            {{$errors->first('Ten')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="Email" value="{{$user->email}}" />
                        @if($errors->has('Email'))
                            {{$errors->first('Email')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="ChangePassword" id="ChangePassword" value="on">
                        <label>Thay đổi password</label>
                    </div>
                    <div class="form-group">
                        <label>Nhập password mới</label>
                        <input class="form-control password" type="password" name="NewPassword" disabled/>
                        @if($errors->has('NewPassword'))
                            {{$errors->first('NewPassword')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Quyền người dùng:</label>
                        <label class="radio-inline">
                            <input name="Quyen" value="0" @if($user->quyen==0) {{'checked'}} @endif type="radio">Thường
                        </label>
                        <label class="radio-inline">
                            <input name="Quyen" value="1" @if($user->quyen==1) {{'checked'}} @endif type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#ChangePassword').change(function(){
                if($(this).is(':checked')){ //nếu bạn check vào checkbox
                    $(".password").removeAttr('disabled');
                }
                else{
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection