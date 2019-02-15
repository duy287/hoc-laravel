@extends('layout.index')

@section('content')
   <!-- Page Content -->
    <div class="container">
        <div class="row">

            <div class="col-lg-9">

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                    <a href="#">By Admin</a>
                </p>

                <!-- Image -->
                <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on: {{$tintuc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead"> {!! $tintuc->NoiDung !!}</p>

                <hr>

                <!-- Comments Form -->
                @if(Auth::check())
                    <div class="well">
                        <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                        <form role="form" action="comment/{{$tintuc->id}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
                @endif

                <hr>
                <!-- Comment List -->
                @foreach($tintuc->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"> {{$cm->user->name}}
                            <small>{{$cm->created_at}}</small>
                        </h4>
                        {{$cm->NoiDung}}
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Blog Sidebar-->
            <div class="col-md-3">
                <!--Tin liên quan-->
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                        @foreach($tinlienquan as $tt)
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="detail.html">
                                        <img class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><b>{{$tt->TieuDe}}</b></a>
                                </div>
                                <p style="margin:5px">{{$tt->TomTat}}</p>
                                <div class="break"></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!--Tin nổi bật -->
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                        @foreach($tinnoibat as $tnb)
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="detail.html">
                                        <img class="img-responsive" src="upload/tintuc/{{$tnb->Hinh}}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><b>{{$tnb->TieuDe}}</b></a>
                                </div>
                                <p tyle="margin:5px">{{$tnb->TomTat}}</p>
                                <div class="break"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Page Content -->
@endsection