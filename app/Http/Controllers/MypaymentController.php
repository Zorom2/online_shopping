<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Mypayment;

class MypaymentController extends Controller
{
    public function listMypayment()
    { 
        $userId = auth()->id(); 
        $payments = Payment::whereHas('order', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        return view('mypayment.list-mypayment', compact('payments'));

        $mypayment->save();
    }
}
