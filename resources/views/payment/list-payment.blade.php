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
                <div class="card-header">Payment List</div>
                <div class="card-body">
                    @php
                        $totalAmount = 0; 
                    @endphp

                    <table class="table table-hover table-sm">
                        <tr>
                            <th>ID</th>
                            <th>Order ID</th>
                            <th>Amount</th>
                            <th>Phone</th>
                            <th>Transaction</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Remark</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>

                        @foreach($payments as $payment)
                        @php
                            $totalAmount += $payment->amount; 
                        @endphp
                        <tr>
                            <td> {{ $payment->id }} </td>
                            <td> {{ optional($payment->order)->id }} </td>
                            <td> $ {{ $payment->amount }} </td>
                            <td> {{ $payment->phone }} </td>
                            <td> {{ $payment->transaction }} </td>
                            <td> {{ $payment->payment_method }} </td>
                            <td> {{ $payment->status }} </td>
                            <td> {{ $payment->remark }} </td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{ url("/admin/payment/del/{$payment->id}") }}" >
                                    Delete
                                </a>
                            </td>
                            <td> 
                                <a class="btn btn-warning btn-sm" href="{{ url("/admin/payment/upd/{$payment->id}") }}" >
                                    Update
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        @if(count($payments) > 0)
                        <tr>
                            <td colspan="2" class="text-left"><strong>TOTAL</strong></td>
                            <td><strong>$ {{ $totalAmount }}</strong></td>
                            <td colspan="7"></td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection