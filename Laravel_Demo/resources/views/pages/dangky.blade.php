@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng ký tài khoản</div>
				  	<div class="panel-body">
				    	<form action="dangky" method="POST">
							{{csrf_field()}}
				    		<div>
				    			<label>Họ tên</label>
								<input type="text" class="form-control" placeholder="Username" name="name" value="{{old('name')}}">
								@if($errors->has('name'))
                                    {{$errors->first('name')}}
                                @endif
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
								@if($errors->has('email'))
								  {{$errors->first('email')}}
							 	@endif
							</div>
							<br>	
							<div>
				    			<label>Nhập mật khẩu</label>
								<input type="password" class="form-control" name="password" value="{{old('email')}}">
								@if($errors->has('password'))
								  {{$errors->first('password')}}
							 	@endif
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
								<input type="password" class="form-control" name="passwordAgain" value="{{old('email')}}" >
								@if($errors->has('passwordAgain'))
								  {{$errors->first('passwordAgain')}}
							 	@endif
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng ký
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection