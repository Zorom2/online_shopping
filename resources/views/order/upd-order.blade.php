@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Edit Order
            </div>

            <div class="card-body">

                <form action="{{ url("/admin/order/upd/{$order->id}") }}" method="post">
                @csrf
                
                <table class="table table-sm">

                    <tr>
                        <td>
                            <label class="form-control">User ID</label>
                        </td>
                        <td>
                            <input type="number" name="user_id" class="form-control"  value="{{ $order->user_id }}">
                            @error('user_id')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label class="form-control">Total Price</label>
                        </td>
                        <td>
                            <input type="text" name="totalPrice" class="form-control" value="{{ $order->totalPrice }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Total Qty</label>
                        </td>
                        <td>
                            <input type="number" name="totalQty" class="form-control" value="{{ $order->totalQty }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Status</label>
                        </td>
                        <td>
                            <input type="text" name="status" class="form-control" value="{{ $order->status }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Remark</label>
                        </td>
                        <td>
                            <input type="text" name="remark" class="form-control" value="{{ $order->remark }}">
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