@extends('layouts.app')
@section('content')


<div class="container-fluid">
<div class="row justify-content-center">

  <div class="col-lg-10 col-md-8 col-sm-6 col-xs-12 pr-1 pl-1 mt-3"> 

    Name: <b> {{ auth()->user()->name }}</b>
    
    <table class="table table-bordered table-sm" style="font-size: 14px;" >
        <tr>
          <th>ID</th>
          <th>Product Name</th>
              <th>Price</th>
          <th>Qty</th>        
          <th>Amount</th>      
        </tr>  

        @foreach($orderitems as $orderitem)
      <tr>
        <td>{{ $orderitem->product_id }} </td>        
        <td>{{ $orderitem->name }} </td>
        <td>{{ $orderitem->price }} </td>      
        <td>{{ $orderitem->qty }} </td>  
        <td>{{ $orderitem->amount }} </td>
      </tr>
      @endforeach

      <tr>
        <td colspan="3">TOTAL</td>
        <td>{{ $order->totalQty }}</td>
        <td>{{ $order->totalPrice }}</td>
      </tr>

      </table>

      <div style="text-align: center;">            
          <a class="btn btn-primary btn-sm"  href="{{ url("/payment?order_id=$order->id") }}" >
            Payment
        </a>            
      </div>


  </div>

</div> <!-- Row -->
</div> <!-- Container -->

@endsection