<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('admin_asset')}}">
  {{-- <link rel="shortcut icon" href="admin_asset/img/logo-fav.png"> --}}
    <title>HHS</title>
    <link rel="stylesheet" href="admin_asset/css/style.css" type="text/css"/>
</head>
    <body class="be-splash-screen">
        <div class="be-wrapper be-login">
            <div class="be-content">
                <div class="main-content container-fluid">
                    <div class="splash-container">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-heading"><span class="splash-description">Chào mừng đến trang quản trị</span></div>
                            <div class="panel-body">
                                @if(count($errors)>0)
                            <div class="alert alert-danger text-center">
                                @foreach($errors->all() as $er)
                                    {{$er}}<br>
                                @endforeach
                            </div>
                                @endif
                        <form action="{{route('admin/login')}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <input id="name" type="text" placeholder="Nhập user name" class="form-control" name="name" required>
                                </div>
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Nhập password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group login-submit">
                                <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="admin_asset/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="admin_asset/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="admin_asset/js/main.js" type="text/javascript"></script>
<script src="admin_asset/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });
</script>
</body>
</html>