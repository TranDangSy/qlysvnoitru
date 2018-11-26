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
                        <h3 for="student_id">Sinh viên:</h3>
                        <select class="form-control" name="student_id">
                            <option value="">---</option>
                            @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                        </select>
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
                        <h3 style="color: #000000;" for="typ">Chọn loại thanh toán:</h3>
                        <select class="form-control" name="type_payment">
                            <option value="tiền phòng">Tiền phòng</option>
                            <option value="tiền điện">Tiền điện</option>
                            <option value="tiền nước">Tiền nước</option>
                        </select>
                    </div>
                </div>
                <button style="display: block; margin: auto;" type="submit" class="btn btn-primary btn-lg">Tạo hóa đơn</button>
            </form>
        </div>
    </div>
</div>
@endsection