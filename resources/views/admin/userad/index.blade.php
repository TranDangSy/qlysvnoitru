@extends('admin.widget.index')
@section('content')
<div class="be-content">
	<div class="main-content container-fluid">
		<div class="row">		
			<div class="page-title">
				<div class="title_left">
					<a href="admin" class="zmdi zmdi-home" style="font-size: 24px;">Trang chủ</a><span>/</span><a href="admin/user" style="font-size: 20px;">Nhân viên</a>
					<h3>Quản lý quản trị viên</h3>
				</div>
			</div>
			<a style="margin-bottom: 30px;" class="btn btn-primary"  href='{{ route('create') }}'>Thêm quản trị viên</a><br>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_content">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<table class="table table12 table-hover table-bordered">
										<thead>
											<tr>
												<th style="width: 5%;">ID</th>
												<th style="width: 10%;">Tên</th>
												<th style="width: 10%;">Email</th>
												<th style="width: 10%;">Avatar</th>
												<th style="width: 10%;">Thao tác</th>
											</tr>
										</thead>
										<tbody>
											@foreach($users as $key => $u)
											<tr>
												<td class="text-center"><span class="badge badge-success">{{$u->id}}</span></td>
												<td>{{$u->name}}</td>
												<td>{{$u->email}}</td>
												<td><img class="img-responsive" 
													src="{{$u->avatar}}" alt=""></td>
												<td>
													@if(($u->status) == 1 )
													<a href="admin/user/off/{{$u->id}}" 
													onclick="return confirm('Bạn có muốn tắt chức năng người dùng')" class="btn btn-sm btn-danger"
											 			title="Khoá">Tắt</a>
													@else
													<a href="admin/user/on/{{$u->id}}" 
													onclick="return confirm('Bạn có muốn bật chức năng người dùng')" class="btn btn-sm btn-success" title="Khoá">Bật</a>
													@endif
													<a class="btn btn-sm btn-warning" href='admin/user/edit/{{$u->id}}'>Sửa</a>
													<a class="btn btn-sm btn-primary" href='admin/user/info/{{$u->id}}'>Xem</a>
													<a class="btn btn-sm btn-danger" href='admin/user/delete/{{$u->id}}'>Xoá</a>
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
			</div>
		</div>
	</div>
</div>
@endsection