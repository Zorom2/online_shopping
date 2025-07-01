<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Orderitem;
use App\Models\Order;
use App\Models\Product;


class OrderitemController extends Controller
{
    public function listOrderitem()
    {
        $orderitems    = Orderitem::all();
        $orders        = Order::all();
        $products      = Product::all();

        return view('orderitem.list-orderitem', compact('orderitems','orders','products'));
    }

    public function deleteOrderitem()
    {
        Orderitem::find(request()->id)->delete();

        return redirect('/admin/orderitem/list')->with('del_info','Order Item Deleted Successfully!');
    }

    public function updOrderitem()
    {
        $orderitem = Orderitem::find(request()->id);

        return view('orderitem.upd-orderitem',compact('orderitem'));
    }

    public function updateOrderitem(Request $request)
    {
        $validator = validator(request()->all(),
        [
            "order_id"      => "required",
            "user_id"       => "required",
            "product_id"    => "required",

        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $orderitem = Orderitem::find(request()->id);

            $orderitem->order_id    = request()->order_id;
            $orderitem->user_id     = request()->user_id;
            $orderitem->product_id  = request()->product_id;
            $orderitem->name        = request()->name;
            $orderitem->price       = request()->price;
            $orderitem->qty         = request()->qty;
            $orderitem->amount      = request()->amount;
            $orderitem->status      = request()->status;
            $orderitem->remark      = request()->remark;

        $orderitem->save();

        return redirect('/admin/orderitem/list')->with('upd_info','Order Item Updated Successfully!');
    }
}
