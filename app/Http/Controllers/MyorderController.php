<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Orderitem;
use App\Models\Myorder;

class MyorderController extends Controller
{
    public function listMyorder()
    {
        $userId = auth()->id();
        $orderitems = Orderitem::where('user_id', $userId)->get();

        return view('myorder.list-myorder', compact('orderitems'));
    }
}
