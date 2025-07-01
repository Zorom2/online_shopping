@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Payment List</div>
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
                        </tr>
                        @forelse($payments as $payment)
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
                        </tr>
                        @empty
                            <tr>
                                <td colspan="8">No Payment Records Found.</td>
                            </tr>
                        @endforelse

                        @if(count($payments) > 0)
                        <tr>
                            <td colspan="2" class="text-left"><strong>TOTAL</strong></td>
                            <td><strong>$ {{ $totalAmount }}</strong></td>
                            <td colspan="5"></td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection