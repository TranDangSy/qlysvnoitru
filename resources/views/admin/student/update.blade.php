@extends('admin.widget.index')
@section('content')
<div class="be-content">
	<div class="main-content container-fluid">
		<div class="row">
			<div class="page-title">
				<div class="title_left">
					<h3>Chỉnh sửa sinh viên</h3>
				</div>
			</div>
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
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<form class="form-horizontal" role="form" action="admin/student/postupdate/{{$student->id}}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}"/>
						<div class="form-group">
							<label class="col-sm-2">Tên sinh viên</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="name" value="{{$student->name}}">
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2">Tuổi</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="age" value="{{$student->age}}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-2 col-sm-2 col-xs-12">
								<label class="control-label" for="usergender">Giới tính</span></label>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="gender" class="form-control">
									<option value="1" {{ $student->gender == 1 ? 'selected = "selected"' : '' }}>Nam</option>
									<option value="0" {{ $student->gender == 0 ? 'selected = "selected"' : '' }}>Nữ</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="notes" class="col-sm-2">Trạng thái</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="status" value="{{$student->status}}">
							</div>
						</div>
						<div class="form-group">
							<label for="notes" class="col-sm-2">Ghi chú</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="note" value="{{$student->note}}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-2 col-sm-2 col-xs-12">
								<label class="control-label" for="usergender">Ngày sinh</label>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input name="birth_of_date" class="form-control col-md-7 col-xs-12" type="date" value="{{$student->birth_of_date}}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-2 col-sm-2 col-xs-12">
								<label class="control-label" for="usergender">Mã sinh viên</span></label>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input name="id_card" class="form-control col-md-7 col-xs-12" type="text" value="{{$student->id_card}}">
							</div>
						</div>
						<div class="form-group text-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							</div>
							<div class="col-sm-3 col-sm-3">
								<button type="submit" class="btn btn-success">Cập nhập</button>
								<button type="reset" class="btn btn-default">Làm lại</button>
							</div>
						</div>
					</form>
					<div class="form-group text-center col-sm-9 col-sm-9">
						<a href="{{'admin/student'}}"><button class="btn btn-rounded btn-space btn-warning">Quay lại</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection