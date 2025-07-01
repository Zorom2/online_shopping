<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;


class OrderController extends Controller
{
    public function listOrder()
    {
        $orders    = Order::all();

        return view('order.list-order', compact('orders'));
    }

    public function deleteOrder()
    {
        Order::find(request()->id)->delete();

        return redirect('/admin/order/list')->with('del_info','Order Deleted Successfully!');
    }

    public function updOrder()
    {
        $order = Order::find(request()->id);

        return view('order.upd-order',compact('order'));
    }

    public function updateOrder(Request $request)
    {
        $validator = validator(request()->all(),
        [
            "user_id"       => "required",
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $order = Order::find(request()->id);

            $order->user_id     = request()->user_id;
            $order->totalPrice  = request()->totalPrice;
            $order->totalQty    = request()->totalQty;
            $order->status      = request()->status;
            $order->remark      = request()->remark;

        $order->save();

        return redirect('/admin/order/list')->with('upd_info','Order updated Successfully!');
    }
}
