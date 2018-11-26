@extends('admin.widget.index')
@section('content')
<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <a href="admin" class="zmdi zmdi-home" style="font-size: 24px;">Trang chủ</a><span>/</span><a href="admin/student" style="font-size: 20px;">Sinh viên</a>
                    <h3>Danh sách sinh viên</h3>
            </div>
        </div>
            <div class="text-center">
                @if(count($errors)>0)
                <div class="alert alert-danger text-center" style="width:500px;">
                    @foreach($errors->all() as $er)
                        {{$er}}<br>
                    @endforeach
                </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert-success text-center" style="width:300px;margin-left: 300px;">
                {{session('thongbao')}}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                        <table class="table table-hover table-bordered table12" style="margin-top: 15px;">
                        <thead>
                            <tr>
                                <th style="width: 5%; text-align: center;">ID</th>
                                <th style="width: 15%;">Tên</th>
                                <th style="width: 15%;">Giới tính</th>
                                <th style="width: 25%;">Ảnh</th>
                                <th style="width: 20%;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach($student as $sv) {{-- $student as $key => $sv --}}
                                <tr>
                                    <td style="width: 5%;" class="text-center"><span class="badge badge-success">{{$sv->id}}</span></td>
                                    <td style="width: 15%;" class="text-center"><span class="badge badge-success">{{$sv->name}}</span></td>
                                    <td style="width: 15%;" class="text-center"><span class="badge badge-success">@if($sv->gender == 1)Nam @else Nữ @endif</span></td>
                                    <td style="width: 25%"><img class="img-responsive" style="width: 100px !important;" src="{{asset($sv->avatar)}}">
                                    </td>
                                    <td style="width: 20%">
                                        @if(($sv->status) == 1)
                                        <a onclick="return confirm('Bạn có muốn thay đổi trạng thái sinh viên')" href="admin/student/off/{{$sv->id}}" class="btn btn-sm btn-danger" title="Khoá">Tắt</a>
                                        @else
                                        <a onclick="return confirm('Bạn có muốn thay đổi trạng thái sinh viên')" href="admin/student/on/{{$sv->id}}" class="btn btn-sm btn-success" title="Khoá">Bật</a>
                                        @endif
                                        <a class="btn btn-sm btn-warning" href='javascript:window.location.href ="admin/student/getupdate/{{$sv->id}}"' title="">Sửa</a>
                                        <a class="btn btn-sm btn-primary" href="javascript:window.location.href ='admin/student/detail/{{$sv->id}}'" title="">Xem</a>
                                        <a onclick="return confirm('Bạn có muốn xoá')" class="btn btn-sm btn-danger" href="javascript:window.location.href ='admin/student/destroy/{{$sv->id}}'" title="">Xoá</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
