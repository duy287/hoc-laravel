@extends('layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        
        <form action="login" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>
                    @if(session('message'))
                        <div class="alert alert-warning" role="alert">
                        {{session('message')}}
                        </div>
                    @endif
                    <br>
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" name="email" value={{old('email')}}>
                        <div style="color:red">@if($errors->has('email')){{$errors->first('email')}}@endif</div>
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="text" name="password" value={{old('password')}}>
                        <div style="color:red">@if($errors->has('password')){{$errors->first('password')}}@endif</div>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary" name='login'>Login</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> 
</div>
@endsection