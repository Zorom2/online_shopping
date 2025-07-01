@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Order List</div>
                <div class="card-body">
                    @php
                        $totalQty = 0;  
                        $totalAmount = 0; 
                    @endphp

                    <table class="table table-hover table-sm">
                        <tr>
                            <th>ID</th>
                            <th>Order ID</th>
                            <th>User ID</th>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Remark</th>
                        </tr>

                        @forelse($orderitems as $orderitem)
                        @php
                            $totalQty += $orderitem->qty;           
                            $totalAmount += $orderitem->amount;    
                        @endphp
                        <tr>
                            <td> {{ $orderitem->id }} </td>
                            <td> {{ optional($orderitem->order)->id }} </td>
                            <td> {{ optional($orderitem->order)->user_id }} </td>
                            <td> {{ $orderitem->product->id }} </td>
                            <td> {{ $orderitem->name }} </td>
                            <td> $ {{ $orderitem->price }} </td>
                            <td> {{ $orderitem->qty }} </td>
                            <td> $ {{ $orderitem->amount }} </td>
                            <td> {{ $orderitem->status }} </td>
                            <td> {{ $orderitem->remark }} </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="10">No Orders Found.</td> 
                            </tr>
                        @endforelse

                        @if(count($orderitems) > 0)
                        <tr>
                            <td colspan="6" class="text-left"><strong>TOTAL</strong></td>
                            <td><strong>{{ $totalQty }}</strong></td>
                            <td><strong>$ {{ $totalAmount }}</strong></td>
                            <td colspan="2"></td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection