	@extends('admin.widget.index')
	@section('content')     
	<div class="be-content">
		<div class="main-content container-fluid">
			<div class="user-profile col-md-3" style="float: left;">
				<img src="{{asset('admin_asset')}}/img/imgroom/phong.jpg" alt="">
			</div>
			<a href="admin/room" style="display: table; margin: auto;" class="btn btn-primary btn-lg">Quay lại</a>
			<div class="col-md-6" style="float: right;">
				<div><h2>Phòng {{$room->name}}</h2></div>
				<label for="bed" class="form-control">Số giường: {{$room->number_bed}}</label>
				<label for="price" class="form-control">Giá phòng: {{$room->price}}</label>
				<label for="electric" class="form-control">Số điện: {{$room->electric_price}}</label>
				<label for="water" class="form-control">Số nước: {{$room->water_price}}</label>
				<label for="status" class="form-control">
					Trạng thái phòng: 
					@if($room->status == 1)
					{{'Phòng đủ người'}}
					@else
					{{'Phòng còn thiếu'}}
					@endif
				</label>
				@if($room->status == 1)
				<label class="form-control" for="student">Các sinh viên trong phòng:</label>
				<table class="table">
					<thead>
						<tr>
							<th>Tên</th>
							<th>Tuổi</th>
							<th>Giới tính</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($students as $student)
						@if($student->status == 1)
						<tr>
							<td>{{$student->name}}</td>
							<td>{{$student->age}}</td>
							<td>@if($student->gender == 1)Nam @else Nữ @endif</td>
							<td><a href="admin/student/detail/{{$student->id}}">Chi tiết</a></td>
						</tr>
						@else
						<tr>
							<td>Không có</td>						
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>
				@else
				<label class="form-control">Không có sinh viên trong phòng</label>
				@endif
			</div>
		</div>
		<form action="admin/room/update/{{$room->id}}" method="POST" role="form" class="form-vertical">
			@csrf
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-sm">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Điền thông tin</h4>
						</div>
						<div class="modal-body">
							<h3 for="number_bed">Số giường:</h3>
							<input class="form-control" type="text" name="number_bed" value="{{$room->water_price}}">
							<h3 for="price">Giá phòng:</h3>
							<input class="form-control" type="text" name="price" value="{{$room->water_price}}">
							<h3 for="water_price">Số nước:</h3>
							<input class="form-control" type="text" name="water_price" value="{{$room->water_price}}">
							<h3 for="water_price">Số điện:</h3>
							<input class="form-control" type="text" name="electric_price" value="{{$room->electric_price}}">
							<h3>Trạng thái phòng:</h3>
							<select name="status" class="form-control">
								<option value="1">Phòng đủ người</option>
								<option value="0">Phòng chưa đủ người</option>
							</select>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có muốn cập nhập thông tin mới')">Chỉnh sửa phòng</button>
						</div>
					</div>
				</div>		
			</div>
		</form>
		<button style="display: block; margin: auto; margin-bottom: 20px !important;" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Chỉnh sửa phòng</button>
	</div>
	@endsection