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
                <div class="card-header">Order List</div>
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Total Price</th>
                            <th>Total Qty</th>
                            <th>Status</th>
                            <th>Remark</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                        @foreach($orders as $order)
                        <tr>
                            <td> {{ $order->id }} </td>
                            <td> {{ $order->user_id }} </td>
                            <td> $ {{ $order->totalPrice }} </td>
                            <td> {{ $order->totalQty }} </td>
                            <td> {{ $order->status }} </td>
                            <td> {{ $order->remark }} </td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{ url("/admin/order/del/{$order->id}") }}" >
                                    Delete
                                </a>
                            </td>
                            <td> 
                                <a class="btn btn-warning btn-sm" href="{{ url("/admin/order/upd/{$order->id}") }}" >
                                    Update
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection