@extends('admin.widget.index')
@section('content')
<div class="be-content">
	<div class="main-content container-fluid">
		<div class="row">
			<div class="page-title">
				<div class="title_left">
					<h3>Sửa hóa đơn</h3>
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
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 text-center">
					<form class="form-horizontal">
						<div class="form-group">
							<label for="price" class="col-sm-4 control-label">Giá hóa đơn:</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="price" value="{{$payment->price}}">
							</div>
						</div>
						<div class="form-group">
							<label for="method" class="col-sm-4 control-label">Phương thức thanh toán:</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="method" value="{{$payment->method}}">
							</div>
						</div>
						<div class="form-group">
							<label for="price" class="col-sm-4 control-label">Sinh viên</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="student_id" value="{{$payment->student->name}}">
							</div>
						</div>
						<div class="form-group">
							<label for="price" class="col-sm-4 control-label">Phòng</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="room_id" value="{{$payment->room->name}}">
							</div>
						</div>
						<div class="form-group">
							<label for="price" class="col-sm-4 control-label">Loại hóa đơn</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="type_payment" value="{{$payment->type_payment}}">
							</div>
						</div>
						<div class="form-group text-center">
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							</div>
							<div class="col-sm-8 col-sm-8">
								<a href="admin/payment" class="btn btn-lg btn-primary">Quay lại</a>
								<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Sửa</button>
							</div>
						</div>
					</form>
					<form action="admin/payment/postupdate/{{$payment->id}}" method="POST" role="form" class="form-vertical">
						@csrf
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-sm">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<h3 for="price">Giá hóa đơn:</h3>
										<input class="form-control" type="text" name="price" value="{{$payment->price}}">
										<h3 for="method">Phương thức thanh toán:</h3>
										<select class="form-control" name="method">
											<option value="cash">Thanh toán tiền mặt</option>
											<option value="atm">Thanh toán qua thẻ</option>
										</select>
										<h3 for="type_payment">Loại thanh toán:</h3>
										<select class="form-control" name="type_payment">
											<option value="tiền phòng">Tiền phòng</option>
											<option value="tiền điện">Tiền điện</option>
											<option value="tiền nước">Tiền nước</option>
										</select>
									</div>
									<div class="modal-footer">
										<button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có muốn cập nhập thông tin mới')">Cập nhập</button>
										<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
@endsection