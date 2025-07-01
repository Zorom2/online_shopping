<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function listPayment()
    {
        $payments       = Payment::all();
        $orders         = Order::all();

        return view('payment.list-payment', compact('payments','orders'));
    }

    public function deletePayment()
    {
        Payment::find(request()->id)->delete();

        return redirect('/admin/payment/list')->with('del_info','Payment Deleted Successfully');
    }

    public function updPayment()
    {
        $payment = Payment::find(request()->id);

        return view('payment.upd-payment',compact('payment'));
    }

    public function updatePayment(Request $request)
    {
        $validator = validator(request()->all(),
        [
            "order_id"      => "required",
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $payment = Payment::find(request()->id);

            $payment->order_id      = request()->order_id;
            $payment->amount        = request()->amount;
            $payment->phone         = request()->phone;
            $payment->transaction   = request()->transaction;
            $payment->payment_method= request()->payment_method;
            $payment->status        = request()->status;
            $payment->remark        = request()->remark;

        $payment->save();

        return redirect('/admin/payment/list')->with('upd_info','Payment Updated Successfully!');
    }
}
