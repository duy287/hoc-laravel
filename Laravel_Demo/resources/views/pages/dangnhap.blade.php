@extends('layout.index')

@section('content')
<!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
                        @if(session('thongbao')!=null)
                            {{session('thongbao')}}
                        @endif
				    	<form action="dangnhap" method="POST">
                            {{csrf_field()}}
							<div>
				    			<label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                                @if($errors->has('email'))
                                    {{$errors->first('email')}}
                                @endif
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
                                  <input type="password" class="form-control" name="password">
                                  @if($errors->has('password'))
                                        {{$errors->first('password')}}
                                  @endif
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng nhập
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection