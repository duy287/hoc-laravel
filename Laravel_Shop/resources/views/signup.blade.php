@extends('layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <form action="dang-ky" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="your_last_name">Fullname</label>
                        <input type="text" id="your_last_name" name="full_name" value={{old('full_name')}}>
                        @if($errors->has('full_name'))
                            <div style="color:red">{{$errors->first('full_name')}}</div>
                        @endif
                    </div>

                    <div class="form-block">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" value={{old('email')}}>
                        @if($errors->has('email'))
                            <div style="color:red" >{{$errors->first('email')}}</div>
                        @endif
                    </div>

                    <div class="form-block">
                        <label for="password">Password</label>
                        <input type="text" id="password" name="password" value={{old('password')}}>
                        @if($errors->has('password'))
                            <div style="color:red">{{$errors->first('password')}}</div>
                        @endif
                    </div>
                    <div class="form-block">
                        <label for="re_password">Re password</label>
                        <input type="text" id="re_password" name="rePassword" value={{old('rePassword')}}>
                        @if($errors->has('rePassword'))
                            <div style="color:red">{{$errors->first('rePassword')}}</div>
                        @endif
                    </div>

                    <div class="form-block">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" value={{old('phone')}}>
                        @if($errors->has('phone'))
                            <div style="color:red">{{$errors->first('phone')}}</div>
                        @endif
                    </div>

                    <div class="form-block">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value={{old('address')}}>
                        @if($errors->has('address'))
                            <div style="color:red">{{$errors->first('address')}}
                        @endif
                    </div>

                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div>
</div>
@endsection