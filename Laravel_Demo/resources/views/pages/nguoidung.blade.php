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
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
				    	<form action="nguoidung" method="POST">
							{{csrf_field()}}
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control"  value="{{$user->name}}" placeholder="Username" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" value="{{$user->email}}" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	readonly
							  	>
							</div>
							<br>	
							<div>
								<input type="checkbox" class="" name="checkpassword" id="ChangePassword">
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa
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