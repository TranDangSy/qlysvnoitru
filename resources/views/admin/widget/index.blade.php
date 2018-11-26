@include('admin.widget.header')
<body>
    <div class="be-wrapper be-fixed-sidebar">
        <nav class="navbar navbar-default navbar-fixed-top be-top-header">
            <div class="container-fluid">
                <div class="navbar-header"><a href="admin" class="navbar-brand">
                    <img src="admin_asset/img/logo2.png" alt="" class="img-responsive" style="height: 60px; width: 190px;">
                </div>
                <div class="be-right-navbar">
                    <ul class="nav navbar-nav navbar-right be-user-nav">
                        @if(Auth::user())
                        <li class="dropdown"><a data-toggle="dropdown" href='#'><img src="{{Auth::user()->avatar}}" alt="Avatar" style="width: 32px !important;"></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="admin/user/info/{{Auth::user()->id}}"><span class="icon zmdi zmdi-account-box"></span>{{Auth::user()->name}}</a></li>
                                <li><a href="" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <span class="icon zmdi zmdi-forward"></span>Logout</a>
                                <form id="logout-form" action="admin/postlogout" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a href="javascript:void(0)" class="left-sidebar-toggle">Hiển thị</a>
            <div class="left-sidebar-spacer"> 
                <div class="left-sidebar-scroll">
                    <div class="left-sidebar-content">
                        <ul class="sidebar-elements">
                            <li class="divider">Tuỳ chọn</li>
                            <li><a href="admin"><i class="icon zmdi zmdi-home"></i><span>Trang Chủ</span></a></li>
                            <li class="parent"><a href="javascript:void(0)"><i class="icon zmdi zmdi-settings zmdi-hc-spin"></i><span style="padding-right: 20px;">Quản lý user</span><i class="zmdi zmdi-caret-down zmdi-hc-lg"></i></a>
                                {{-- zmdi zmdi-rotate-right zmdi-hc-spin --}}
                                <ul class="sub-menu">
                                    <li><a href="admin/user"><span>Danh sách user</span></a></li>
                                </ul>
                            </li>
                            <li class="parent"><a href="javascript:void(0)"><i class="icon zmdi zmdi-settings zmdi-hc-spin"></i><span style="padding-right: 20px;">Quản lí sinh viên</span><i class="zmdi zmdi-caret-down zmdi-hc-lg"></i></a>
                                {{-- zmdi zmdi-caret-down --}}
                                <ul class="sub-menu">
                                    <li><a href="admin/student"><span>Danh sách sinh viên</span></a></li>
                                    <li><a href="admin/student/createsv"><span>Thêm sinh viên vào phòng</span></li>
                                    </ul>
                                </li>
                                <li class="parent"><a href="javascript:void(0)"><i class="icon zmdi zmdi-settings zmdi-hc-spin"></i><span style="padding-right: 20px;">Quản lí phòng</span><i class="zmdi zmdi zmdi-caret-down zmdi-hc-lg"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="admin/room"><span>Danh sách phòng</span></a></li>
                                        <li><a href="admin/room/createroom"><span>Tạo mới phòng</span></a></li>
                                    </ul>
                                </li>
                                <li class="parent"><a href="javascript:void(0)"><i class="icon zmdi zmdi-settings zmdi-hc-spin"></i><span style="padding-right: 20px;">Quản lí hóa đơn</span><i class="zmdi zmdi-caret-down zmdi-hc-lg"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="admin/payment"><span>Danh sách hóa đơn</span></a></li>
                                        <li><a href="admin/payment/create"></i><span>Thêm hóa đơn mới</span></<a href=""></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @section('content')
        @show
        @include('admin.widget.footer')