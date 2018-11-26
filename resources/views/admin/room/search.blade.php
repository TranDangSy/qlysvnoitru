@extends('admin.widget.index')
@section('content')
<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-heading" role="alert" align="center">
                </div>
                <strong><h1></h1></strong>
            </div>
        </div>
        <div class="row" style="margin-bottom: 30px;">
            <h4>Tìm thấy {{count($rooms)}}</h4>
            @foreach($rooms as $r)
                <div class="col-md-4 col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <a href="admin/room/detail/{{$r->id}}">
                        <img class="card-img-top" src="{{'admin_asset/img/imgroom/phong.jpg'}}" alt="Card image cap"></a>
                        <div class="card-body">
                            <h4 class="card-title" style="font-size: 16px;">{{$r->name}}</h4>
                            <a href="admin/room/detail/{{$r->id}}" style="margin-bottom: 10px;" class="btn btn-primary btn-sm">Xem phòng</a>
                            <a href="admin/room/delete/{{$r->id}}" style="margin-bottom: 10px;" class="btn btn-danger btn-sm">Xóa phòng</a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>
</div> 
@endsection
