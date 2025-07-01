@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Edit Order Item
            </div>

            <div class="card-body">

                <form action="{{ url("/admin/orderitem/upd/{$orderitem->id}") }}" method="post">
                @csrf
                
                <table class="table table-sm">

                    <tr>
                        <td>
                            <label class="form-control">Order ID</label>
                        </td>
                        <td>
                            <input type="number" name="order_id" class="form-control"  value="{{ $orderitem->order_id }}">
                            @error('order_id')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">User ID</label>
                        </td>
                        <td>
                            <input type="number" name="user_id" class="form-control"  value="{{ $orderitem->user_id }}">
                            @error('user_id')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Product ID</label>
                        </td>
                        <td>
                            <input type="number" name="product_id" class="form-control"  value="{{ $orderitem->product_id }}">
                            @error('product_id')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" class="form-control" value="{{ $orderitem->name }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label class="form-control">Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" class="form-control" value="{{ $orderitem->price }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Qty</label>
                        </td>
                        <td>
                            <input type="number" name="qty" class="form-control" value="{{ $orderitem->qty }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Amount</label>
                        </td>
                        <td>
                            <input type="text" name="amount" class="form-control" value="{{ $orderitem->amount }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Status</label>
                        </td>
                        <td>
                            <input type="text" name="status" class="form-control" value="{{ $orderitem->status }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Remark</label>
                        </td>
                        <td>
                            <input type="text" name="remark" class="form-control" value="{{ $orderitem->remark }}">
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