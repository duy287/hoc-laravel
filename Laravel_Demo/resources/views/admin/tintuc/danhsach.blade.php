@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tuc
                    <small>List</small>
                </h1>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Hình</th>
                        <th>Tóm tắt</th>
                        <th>Thể loại</th>
                        <th>Loại tin</th>
                        <th>Nổi bật</th>
                        <th>Số lượt xem</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tintuc as $tin)
                    <tr class="odd gradeX" align="center">
                        <td>{{$tin->id}}</td>
                        <td>{{$tin->TieuDe}}</td>
                        <td><img src="upload/tintuc/{{$tin->Hinh}}" width="100px"/></td>
                        <td>{{$tin->TomTat}}</td>
                        <td>{{$tin->loaitin->theloai->Ten}}</td> <!--dựa vào liên kết giữa các model-->
                        <td>{{$tin->loaitin->Ten}}</td>
                        <td>{{$tin->NoiBat}}</td>
                        <td>{{$tin->SoLuotXem}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$tin->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$tin->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    @if(session('thongbao'))
        <script>
            alert("{{session('thongbao')}}")
        </script>
    @endif
@endsection