@extends('admin.widget.index')
@section('content')
<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="admin" class="zmdi zmdi-home" style="font-size: 24px;">Trang chủ</a><span>/</span><a href="admin/room" style="font-size: 20px;">Phòng</a>
                <div class="alert alert-heading" role="alert" align="center">
                    <strong><h1>Danh sách các phòng</h1></strong>
                </div>
                <form action="admin/room/search" method="GET">
                    <input type="hidden" name="_token" value="{{csrf_token()}}";>
                    <input type="text" name="key" class="form-control" placeholder="Search">
                    <button style="margin-bottom: 10px;" type="submit" class="btn btn-default">Search info</button>
                </form>
            </div>
        </div>
        <form action="" method="POST">
            <div class="row" style="margin-bottom: 30px;">
                @foreach($room as $r)
                <div class="col-md-4 col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <a href="admin/room/detail/{{$r->id}}">
                            <img class="card-img-top" src="{{'admin_asset/img/imgroom/phong.jpg'}}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h4 class="card-title" style="font-size: 16px;">{{$r->name}}</h4>
                                <a href="admin/room/detail/{{$r->id}}" style="margin-bottom: 10px;" class="btn btn-primary btn-sm">Xem phòng</a>
                                @if(($r->status) == 1)
                                <a onclick="return confirm('Việc thay đổi trạn thái phòng đồng nghĩa với việc thay đổi trạng thái sinh viên')" href="admin/room/off/{{$r->id}}" style="margin-bottom: 10px;" class="btn btn-sm btn-danger" title="Khoá">Tắt</a>
                                @else
                                <a onclick="return confirm('Xác nhận thay đổi trạng thái phòng')" href="admin/room/on/{{$r->id}}" style="margin-bottom: 10px;" class="btn btn-sm btn-success" title="Khoá">Bật</a>
                                @endif
                                <a href="admin/room/destroy/{{$r->id}}" onclick="return confirm('Xóa phòng cũng đồng thời xóa các sinh viên hãy cẩn thận trước khi xóa!!')" style="margin-bottom: 10px;" class="btn btn-danger btn-sm">Xóa phòng</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </form>    
        </div>
    </div>
</div>
</div> 
@endsection
