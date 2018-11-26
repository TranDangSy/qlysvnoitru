<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Student;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Room;

class PaymentController extends Controller
{
    public function index()
    {
    	$payments = Payment::all();

    	return view('admin/payment/index',compact('payments'));
    }

    public function create()
    {
        $rooms = Room::all();
    	$students = Student::all();
    	return view('admin/payment/create',compact('students','rooms'));
    }

    public function store(StorePaymentRequest $request)
    {
    	$payment = Payment::create($request->all());
        // $roomIds = Room::pluck('id');
        // [1,2,3]
        // $payment->rooms()->attach($roomIds);
        //sync
        return redirect('admin/payment/create')->with('messenger','Tạo hóa đơn thành công');
    }

    public function edit($id)
    {
        $payment = Payment::find($id);
        $rooms = $payment->rooms;
        $students = $payment->students;

        return view('admin.payment.update',compact('payment','rooms','students'));
    }

    public function postupdate(UpdatePaymentRequest $request,$id)
    {
        $payment = Payment::find($id);
        $payment->price = $request->price;
        $payment->method = $request->method;
        $payment->type_payment = $request->type_payment;
        $payment->save();

        return redirect('admin/payment/edit/'.$id);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payment.index');
    }
}
