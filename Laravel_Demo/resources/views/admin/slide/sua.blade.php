@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="Ten" value="{{$slide->Ten}}" />
                        @if($errors->has('Ten'))
                            {{$errors->first('Ten')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Hình</label>
                        <div><img src="upload/slide/{{$slide->Hinh}}" alt="" width="400px"></div>
                        <input class="form-control" type="file" name="Hinh"/>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <input class="form-control" name="NoiDung"  value="{{$slide->NoiDung}}"/>
                        @if($errors->has('NoiDung'))
                            {{$errors->first('NoiDung')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="Link" value="{{$slide->link}}" />
                        @if($errors->has('Link'))
                            {{$errors->first('Link')}}
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection