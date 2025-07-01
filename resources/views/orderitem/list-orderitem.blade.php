@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(session('del_info'))
            <div class="alert alert-danger">
                {{ session('del_info') }}
            </div>
        @endif

        @if(session('upd_info'))
            <div class="alert alert-warning">
                {{ session('upd_info') }}
            </div>
        @endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Order Item List</div>
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
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>

                        @foreach($orderitems as $orderitem)
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
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{ url("/admin/orderitem/del/{$orderitem->id}") }}" >
                                    Delete
                                </a>
                            </td>
                            <td> 
                                <a class="btn btn-warning btn-sm" href="{{ url("/admin/orderitem/upd/{$orderitem->id}") }}" >
                                    Update
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        @if(count($orderitems) > 0)
                        <tr>
                            <td colspan="6" class="text-left"><strong>TOTAL</strong></td>
                            <td><strong>{{ $totalQty }}</strong></td>
                            <td><strong>$ {{ $totalAmount }}</strong></td>
                            <td colspan="4"></td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection