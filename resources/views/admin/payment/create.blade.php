@extends('admin.widget.index')
@section('content')
<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <form action="{{route('payment.store')}}" method="POST">
                @csrf
                <div>
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endforeach
                    @if(session('messenger'))
                    <div class="alert alert-success">
                        {{session('messenger')}}
                    </div>
                    @endif
                </div>
                <div class="col col-md-12">
                    <h3 style="color: #3399ff;">Thu phí HK1(2018-2019)</h3>
                    <div class="col col-md-4">
                        <h3 for="price">Giá trị hóa đơn:</h3>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="col col-md-4">
                        <h3 for="method">Chọn phương thức thanh toán</h3>
                        <select class="form-control" name="method">
                            <option value="cash">Thanh toán tiền mặt</option>
                            <option value="atm">Thanh toán qua thẻ</option>
                        </select>
                    </div>
                    <div class="col col-md-4">{{-- col-md-offset-3 --}}
                        <h3 style="color: #000000;" for="date">Ngày bắt đầu ở ( Nếu có) :</h3>
                        <input class="form-control" type="text" id="date" value="">
                    </div>
                </div>
                <div class="col col-md-4">
                    <h3 for="student_id">Phòng:</h3>
                    <select class="form-control" name="room_id" style="margin-bottom: 10px;">
                        <option value="">---</option>
                        @foreach($rooms as $room)
                        <option value="{{$room->id}}">{{$room->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-md-4">
                    <h3 style="color: #000000;" for="type">Chọn loại thanh toán:</h3>
                    <select class="form-control" name="type_payment">
                        <option value="tiền phòng">Tiền phòng</option>
                        <option value="tiền điện">Tiền điện</option>
                        <option value="tiền nước">Tiền nước</option>
                    </select>
                </div>
                <div class="col col-md-4">
                    <h3 style="color: #000000;">Chọn sinh viên</h3>
                    <label for="student">Tên sinh viên:</label>
                    <input type="text" readonly="true" class="form-control-sm selected-student-name" data-toggle="modal" data-target="#myModal">
                    <br/>
                    <label for="student">Mã sinh viên:</label>
                    <input type="text" readonly="true" class="form-control-sm selected-student-id" name="student_id">
                </div>
            </div>
            <button style="display: block; margin: auto;" type="submit" class="btn btn-primary btn-lg">Tạo hóa đơn</button>
        </form>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered table12" style="margin-top: 15px;">
                            <thead>
                                <tr>
                                    <th style="width: 5%;" class="text-center">Id</th>
                                    <th style="width: 15%;" class="text-center">Tên</th>
                                    <th style="width: 20%;" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($students as $sv)
                                    <tr>
                                        <td style="width: 15%;" class="text-center idsv"><span class="badge badge-success">{{$sv->id}}</span></td>
                                        <td style="width: 15%;" class="text-center namesv"><span class="badge badge-success">{{$sv->name}}</span></td>
                                        <td style="width: 20%;" class="text-center" >
                                            <button class="btn btn-primary btn-sm select-student">Chọn sinh viên</button>
                                            <a class="btn btn-info btn-sm" href="admin/student/detail/{{$sv->id}}" target="_blank">Chi tiết</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>      
        </div>
    </div>
</div>
</div>
@endsection