@extends('admin.widget.index')
@section('content')     
<div class="be-content">
    <div class="main-content container-fluid">
        <div class="user-profile">
            <div class="row">
                <div class="col-md-6">
                    <div class="user-info-list panel panel-default">
                        <a href="admin" class="zmdi zmdi-home" style="font-size: 24px;">Trang chủ</a><span>/</span><a href="admin/user" style="font-size: 20px;">Admin</a><span>/</span><span style="font-size: 18px; color: #4285f4;">Chi tiết</span>
                        <div>
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $er)
                                {{$er}}<br>
                                @endforeach
                            </div>
                            @endif
                            @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                            @endif
                        </div>
                        <div class="panel-heading panel-heading-divider">
                            <h2 class="name">{{$user->name}}</h2>
                            <div class="image" style="width: 100%; display: block;"><img class="img" style="width: 180px !important; height: 245px !important;" src="{{$user->avatar}}" alt=""></div>
                            <button style="display: block; margin: auto;" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Chỉnh sửa ảnh</button>
                            <div class="panel-body">
                                <table class="no-border no-strip skills">
                                    <tbody class="no-border-x no-border-y">
                                        <tr>
                                            <td class="icon"><span class="mdi mdi-pin"></span></td>
                                            <td class="item">Giới tính<span class="icon s7-global"></span></td>
                                            @if($user->gender == 1)
                                            <td>Nam</td>
                                            @else
                                            <td>Nữ</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                                            <td class="item">Trạng thái<span class="icon s7-phone"></span></td>
                                            @if($user->status == 1)
                                            <td>Đang hoạt động</td>
                                            @else
                                            <td>Không hoạt động</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form action="admin/user/updateimage/{{$user->id}}" method="POST" enctype="multipart/form-data" role="form" class="form-vertical">
                                @csrf
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Chỉnh sửa ảnh</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group text-center">
                                                    <h2 for="useravatar" class="control-label col-md-3 col-sm-3 col-xs-12">Chỉnh sửa hình ảnh User: <br/>{{$user->name}}</h2>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <img src="{{$user->avatar}}" alt="" style="width: inherit;">
                                                        <input type="file" class="form-control col-md-7 col-xs-12" name="file">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có muốn cập nhập ảnh mới mới')">Chỉnh sửa</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                            </form>
                            <form action="admin/user/repass/{{$user->id}}" method="POST" enctype="multipart/form-data" role="form" class="form-vertical">
                                @csrf
                                <div class="modal fade" id="myModal1" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Đổi mật khẩu</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group text-center">
                                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                                        <label for="password">Mật khẫu cũ:</label>
                                                        <input class="form-control" name="password" type="password" placeholder="nhập mật khẩu cũ của bạn">
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                                        <label for="newpassword">Mật khẫu mới:</label>
                                                        <input class="form-control" type="password" placeholder="nhập mật khẩu mới của bạn" name="newpassword">
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                                        <label for="passwordagain">Nhập lại mật khẩu:</label>
                                                        <input class="form-control" type="password" placeholder="nhập lại mật khẩu mới của bạn" name="passwordagain">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button style="margin-top: 10px" class="btn btn-danger" type="submit" onclick="return confirm('Bạn có muốn đổi mật khẩu mới')">Đổi mật khẩu</button>
                                                <button style="margin-top: 10px" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                            </form>
                            <button style="display: block; margin: auto;" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal1">Đổi mật khẩu</button>
                            <a href="admin/user" class="btn btn-success">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection