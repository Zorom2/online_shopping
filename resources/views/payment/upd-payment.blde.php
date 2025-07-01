@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Edit Payment
            </div>

            <div class="card-body">

                <form action="{{ url("/admin/payment/upd/{$payment->id}") }}" method="post">
                @csrf
                
                <table class="table table-sm">

                    <tr>
                        <td>
                            <label class="form-control">Order ID</label>
                        </td>
                        <td>
                            <input type="number" name="order_id" class="form-control"  value="{{ $payment->order_id }}">
                            @error('order_id')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Amount</label>
                        </td>
                        <td>
                            <input type="text" name="amount" class="form-control" value="{{ $payment->amount }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Phone</label>
                        </td>
                        <td>
                            <input type="text" name="phone" class="form-control" value="{{ $payment->phone }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Transaction</label>
                        </td>
                        <td>
                            <input type="text" name="transaction" class="form-control" value="{{ $payment->transaction }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Payment Method</label>
                        </td>
                        <td>
                            <input type="text" name="payment_method" class="form-control" value="{{ $payment->payment_method }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Status</label>
                        </td>
                        <td>
                            <input type="text" name="status" class="form-control" value="{{ $payment->status }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Remark</label>
                        </td>
                        <td>
                            <input type="text" name="remark" class="form-control" value="{{ $payment->remark }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" value="Update" class="btn btn-primary btn-sm form-control">
                        </td>                            
                    </tr>

                </table>
                </form>

            </div>
      </div>
  </div>

    </div>
</div>
@endsection