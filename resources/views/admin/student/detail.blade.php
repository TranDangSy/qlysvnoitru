@extends('admin.widget.index')
@section('content')     
<div class="be-content">
	<div class="main-content container-fluid">
		<div class="user-profile">
			<div class="row">
				<div class="col-md-6">
					<div class="user-info-list panel panel-default">
						<a href="admin" class="zmdi zmdi-home" style="font-size: 24px;">Trang chủ</a><span>/</span><a href="admin/student" style="font-size: 20px;">Sinh viên</a><span>/</span><span style="font-size: 18px; color: #4285f4;">Chi tiết</span>
						<div class="panel-heading panel-heading-divider">
							<div class="name">{{$student->name}}</div>
							<div class="image" style="width: 100%; display: block;"><img class="img" style="height: 250px !important;" src="{{$student->avatar}}" alt=""></div>
							<a href="admin/student/editimage/{{$student->id}}" class="btn btn-sm btn-primary btnedit">Sửa ảnh</a>
							<div class="panel-body">
								<table class="no-border no-strip skills">
									<tbody class="no-border-x no-border-y">
										<tr>
											<td class="icon"><span class="mdi mdi-cake"></span></td>
											<td class="item">Tuổi<span class="icon s7-gift"></span></td>
											<td>{{$student->age}}</td>
										</tr>
										<tr>
											<td class="icon"><span class="mdi mdi-cake"></span></td>
											<td class="item">Ngày sinh<span class="icon s7-gift"></span></td>
											<td>{{date("d-m-Y",strtotime($student->birth_of_date))}}</td>
										</tr>
										<tr>
											<td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
											<td class="item">Ghi chú<span class="icon s7-phone"></span></td>
											<td>{{$student->note}}</td>
										</tr>
										<tr>
											<td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
											<td class="item">Trạng thái<span class="icon s7-phone"></span></td>
											@if($student->status == 1)
											<td><a href="admin/room/detail/{{$student->room->id}}">Đang ở phòng {{$student->room->name}}</a></td>
											@else
											<td>Không ở phòng nào</td>
											@endif
										</tr>
										<tr>
											<td class="icon"><span class="mdi mdi-pin"></span></td>
											<td class="item">Giới tính<span class="icon s7-global"></span></td>
											@if($student->gender == 1)
											<td>Nam</td>
											@else
											<td>Nữ</td>
											@endif
										</tr>
										<tr>
											<td class="icon"><span class="mdi mdi-pin"></span></td>
											<td class="item">Thao tác<span class="icon s7-global"></span></td>
											<td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Chuyển phòng</button></td>
										</tr>
									</tbody>
								</table>
								<form action="admin/student/editroom/{{$student->id}}" method="POST" role="form" class="form-vertical">
									@csrf
									<div class="modal fade" id="myModal" role="dialog">
										<div class="modal-dialog modal-sm">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Chọn phòng</h4>
												</div>
												<div class="modal-body">
													<div class="form-group text-center">
														<div class="col-md-4 col-sm-6 col-xs-12">
															<label for="room_id">Phòng</label>
															<select class="form-group" name="room_id">
																@foreach($rooms as $room)
																<option value="{{$room->id}}">{{$room->name}}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button style="margin-top: 20px;" class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Bạn có muốn chuyển phòng')">Chuyển phòng</button>
													<button style="margin-top: 20px;" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>		
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection