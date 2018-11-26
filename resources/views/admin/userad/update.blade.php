@extends('admin.widget.index')
@section('content')
<div class="be-content">
	<div class="main-content container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Cập nhật</h2>
						<div class="clearfix"></div>
						@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $er)
							{{$er}}<br>
							@endforeach
						</div>
						@endif

						@if(session('thongbao'))
						<div class="alert alert-success">
							{{session('thongbao')}}
						</div>
						@endif
					</div>
					<div class="x_content">
						<br/>
						<form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="admin/user/update/{{$user->id}}" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên<span class="required" style="color: red;">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="name" class="form-control col-md-7 col-xs-12" value="{{$user->name}}">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required" style="color: red;">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="email" name="email" class="form-control col-md-7 col-xs-12" value="{{$user->email}}">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="usergender">Giới tính <span class="required" style="color: red;">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select name="gender" class="form-control">
										<option value="1" {{$user->gender == 1 ? 'selected = "selected"' : ''}}>Nam</option>
										<option value="0" {{$user->gender == 0 ? 'selected = "selected"' : ''}}>Nữ</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Trạng thái<span class="required" style="color: red;">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select name="status" class="col-md-6 col-sm-6 col-xs-12 form-control">
										<option value="1" {{$user->status == 1 ? 'selected = "selected"' : ''}} >Hoạt động</option>
										<option value="0" {{$user->status == 0 ? 'selected = "selected"' : ''}}>Không hoạt động</option>
									</select>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
									<button type="submit" name="addadmin" class="btn btn-success">Cập nhập</button>
									<button type="reset" class="btn btn-danger">Làm lại</button>
									<a href="admin/user" class="btn btn-primary">Quay lại</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection