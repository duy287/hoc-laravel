@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/theloai/them" method="POST">
                    {{csrf_field()}}
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="TenTheLoai" value="{{ old('TenTheLoai') }}" />
                        @if($errors->has('TenTheLoai'))
                            <div class="alert alert-danger">
                                {{$errors->first('TenTheLoai')}}
                            </div>
                        @endif
                    </div>
                    <input type="submit" class="btn btn-default">Add</input>
                    <input type="reset" class="btn btn-default">Reset</input>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection