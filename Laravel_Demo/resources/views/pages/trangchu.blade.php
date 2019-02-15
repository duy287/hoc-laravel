@extends('layout.index')

@section('content')
<div class="container">
	<!--include slide-->
	@include('layout.slide')

	<div class="space20"></div>
	<div class="row main-left">
		<!--include menu -->
			@include('layout.menu') 

		<div class="col-md-9">
			<div class="panel panel-default">            
				<div class="panel-heading" style="background-color:#337AB7; color:white;" >
					<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
				</div>

				<div class="panel-body">
				@foreach($theloai as $tl)
					@if(count($tl->loaitin) > 0) <!--Chỉ xuất ra những thể loại có loại tin-->
						<!-- item -->
						<div class="row-item row">
							<h3>
								<a href="#">{{$tl->Ten}}</a> | 	
								@foreach($tl->loaitin as $lt)
									<small><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a>/</small>
								@endforeach
							</h3>

							<?php 
								$data=$tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5); //lấy 5 tin mới nhất
								//lấy phần tử đầu tiên, hàm shift trả về mảng nên hãy cẩn thận khi in ra 
								$tin1=$data->shift();
								//sau khi dùng hàm shift xong thì data chỉ cong 4 tin.
							?>
							<div class="col-md-8 border-right">
								<div class="col-md-5">
									<a href="detail.html">
										<img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
									</a>
								</div>

								<div class="col-md-7">
									<h3>{{$tin1['TieuDe']}}</h3>
									<p> {{$tin1['TomTat']}}</p>
									<a class="btn btn-primary" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html"> Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
							</div>
							
							<div class="col-md-4">
								@foreach($data as $tin)
								<a href="tintuc/{{$tin->id}}/{{$tin1->TieuDeKhongDau}}.html">
									<h4>
										<span class="glyphicon glyphicon-list-alt"></span>
										{{$tin['TieuDe']}}
									</h4>
								</a>
								@endforeach
							</div>
							<div class="break"></div>
						</div>
					@endif
				@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection