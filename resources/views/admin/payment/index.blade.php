@extends('admin.widget.index')
@section('content')
<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <a href="admin" class="zmdi zmdi-home" style="font-size: 24px;">Trang chủ</a><span>/</span><a href="admin/payment" style="font-size: 20px;">Hóa đơn</a>
                    <h3>Danh sách các thanh toán</h3>
                </div>
            </div>
            <div class="text-center">
                @if(count($errors)>0)
                <div class="alert alert-danger text-center" style="width:500px;">
                    @foreach($errors->all() as $er)
                    {{$er}}<br>
                    @endforeach
                </div>
                @endif
                @if(session('thongbao'))
                <div class="alert-success text-center" style="width:300px;margin-left: 300px;">
                    {{session('thongbao')}}
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <table class="table table-hover table-bordered table12" style="margin-top: 15px;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; text-align: center;">ID</th>
                                        <th style="width: 15%; text-align: center;">Giá</th>
                                        <th style="width: 15%; text-align: center;">Loại hóa đơn</th>
                                        <th style="width: 25%; text-align: center;">Ngày lập hóa đơn</th>
                                        <th style="width: 20%; text-align: center;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach($payments as $payment) {{-- $student as $key => $sv --}}
                                    <tr>
                                        <td style="width: 5%;" class="text-center"><span class="badge badge-success">{{$payment->id}}</span></td>
                                        <td style="width: 5%;" class="text-center"><span class="badge badge-success">{{$payment->price}}</span></td>
                                        <td style="width: 15%;" class="text-center"><span class="badge badge-success">{{$payment->type_payment}}</span></td>
                                        <td style="width: 15%; font-size: 20px;" class="text-center">{{$payment->date}}</td>
                                        <td style="width: 10%;">
                                            <a class="btn btn-sm btn-primary" href="admin/payment/edit/{{$payment->id}}" title="">Xem</a>
                                            <a class="btn btn-sm btn-danger delete-payment-item" onclick="event.preventDefault(); document.getElementById('delete-payment-{{ $payment->id }}').submit();">Xóa</a>
                                            <form id="delete-payment-{{ $payment->id }}" action="{{ route('payment.destroy', $payment->id) }}" method="post" class="d-none">
                                                @csrf
                                                @method('delete')
                                            </form>
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
        @endsection
