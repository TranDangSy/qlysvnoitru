@extends('admin.widget.index')
@section('content')
<div class="be-content">
	<div class="main-content container-fluid">
		<div class="row">
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_content">
							<a href="admin" class="zmdi zmdi-home" style="font-size: 24px;">Trang chủ</a>
								<h2>Thống kê</h2>
							<div class="main-content container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-6 col-lg-3">
										<div class="widget widget-tile" style="background: #f29ff2; ">
											<div class="desc">Sinh viên đang thuê</div>
											<div class="value">
												<span data-toggle="counter" data-end="113" class="number">{{$totalstudent}}</span><i class="iconhome zmdi zmdi-accounts zmdi-hc-lg" style="margin-left: 5px;"></i>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-lg-3">
										<div class="widget widget-tile" style="background: #f4c842;">
											<div class="desc">Số phòng:</div>
											<div class="value">
												<span data-toggle="counter" data-end="113" class="number">{{$totalroom}}</span><i class="iconhome zmdi zmdi-home zmdi-hc-lg" style="margin-left: 5px;"></i>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-lg-3">
										<div class="widget widget-tile" style="background: #8bd9f4;">
											<div class="desc">Tổng người dùng:</div></i>
											<div class="value">
												<span data-toggle="counter" data-end="113" class="number">{{$totaladmin}}</span><i class="iconhome zmdi zmdi-accounts zmdi-hc-lg" style="margin-left: 5px;"></i>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-lg-3">
										<div class="widget widget-tile" style="background: #d198f9;">
											<div class="desc">Tổng số tiền:</div>
											<div class="value">
												<span data-toggle="counter" data-end="113" class="number">{{$totalmoney}}</span><i class="iconhome zmdi zmdi-money zmdi-hc-lg" style="margin-left: 5px;"></i>
											</div>
										</div>
									</div>
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