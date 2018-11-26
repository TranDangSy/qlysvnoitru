@extends('admin.widget.index')
@section('content')    	
<div class="be-content">
	<div class="main-content container-fluid">
		<div class="row">
			@if(count($errors)>0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $er)
				{{$er}}<br/>
				@endforeach
			</div>
			@endif
			@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
			@endif
			<form class="form-horizontal" role="form" action="admin/student/posteditimage/{{$student->id}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group text-center">
					<h2 for="useravatar" class="control-label col-md-3 col-sm-3 col-xs-12">Chỉnh sửa hình ảnh sinh viên: <br/>{{$student->name}}</h2>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<img src="{{$student->avatar}}" alt="" style="width: inherit;">
						<input type="file" class="form-control col-md-7 col-xs-12" name="file">
					</div>
				</div>
				<button type="submit" class="btn btn-danger" style="display: block; margin: auto;">Cập nhập</button>

				<a href="admin/student/detail/{{$student->id}}" style=" display: table; margin: 10px auto;" class="btn btn-success">Quay lại</a>
			</form>
		</div>
	</div>
</div>
@endsection