@extends('layouts.app')
@section('content')

<form method="post" enctype="multipart/form-data">
{{ csrf_field() }}


  <div class="container">
  <div class="row text-center">
    <div class="col-sm-12 col-md-12 col-md-offset-3 col-sm-offset-3">

        <table class="table table-hover table-sm" style="font-size: 80%;">
          <tr>
            <td style="border: 1px solid blue; padding: 3px; background-color:lightgreen; ">
              Your OrderID:           
              <input type="text" name="order_id" value="{{ $order_id }}" readonly style="text-align: center;">          
            </td>

            <td style="border: 1px solid blue; padding: 3px; background-color:lightgreen; ">
              Your Payment Amount:               
              <input type="hidden"  name="payment_amount" value="{{ $payment_amount }}" readonly style="text-align: center;">
              <input type="text"  name="" value=" $ {{ number_format($payment_amount) }}" readonly style="text-align: center;">  
            </td>
          </tr>
        </table>

    </div>
  </div>
  </div>


  <div class="container">  
  <div class="row justify-content-center">

    <div class="col-lg-6 col-md-6 col-sm-12">          

      <div class="card text-center">
        <!-- <img  src="images/kbzpay.jpg" alt="Card image cap" width="50%" class="mx-auto p-2 d-block"> -->

         <label for="paymentMethod" class="form-label">Select Payment Method</label>
            <select class="form-select" id="paymentMethod">
                <option value="kbz">KBZ Pay</option>
                <option value="wave">Wave Pay</option>
                <option value="aya">AYA Pay</option>
            </select>
        </div>

        <div id="kbzPay" class="payment-card border rounded p-3 mb-3">
            <h5 class="text-primary">KBZ Pay</h5>
            <p>Use KBZPay Scan to pay me</p>
            <img src="{{ asset('images/kbzpay.jpg') }}" alt="KBZPay QR" class="img-fluid" style="max-width: 300px;">
            <p class="fw-bold mt-2"> Phone Number: 09000000001 </p>
        </div>

        <div id="wavePay" class="payment-card border rounded p-3 mb-3 d-none">
            <h5 class="text-warning">Wave Pay</h5>
            <p>Use WavePay Scan to pay me</p>
            <img src="{{ asset('images/wavepay.jpg') }}" alt="WavePay QR" class="img-fluid" style="max-width: 300px;">
            <p class="fw-bold mt-2"> Phone Number: 09000000001 </p>
        </div>

        <div id="ayaPay" class="payment-card border rounded p-3 mb-3 d-none">
            <h5 class="text-danger">AYA Pay</h5>
            <p>Use AYA Pay Scan to pay me</p>
            <img src="{{ asset('images/ayapay.jpg') }}" alt="AYAPay QR" class="img-fluid" style="max-width: 300px;">
            <p class="fw-bold mt-2"> Phone Number: 09000000001 </p>
        </div>

    </div>  

    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="card text-center" style="font-size: 12px;">
        <div class="card-body">
              <table class="table table-borderless">
                <tr>
                  <td><b>Phone Number</b></td>
                  <td>
                    <input type="text" name="phone" value="" class="form-control">
                  </td>
                </tr>
                <tr>
                  <td><b>Transaction Last [ 4 ] Digits</b></td>
                  <td>
                    <input type="text" name="transaction" value="" class="form-control">
                  </td>
                </tr>

                <tr>
                  <td><b>Payment Method</b></td>
                  <td>
                    <input type="text" name="payment_method" value="" class="form-control">
                  </td>
                </tr>

                <tr>
                  <td colspan="2">
                    <input type="submit" value="Paid" class="btn btn-success">
                  </td>
                </tr>
              </table>           
        </div>
      </div>
    </div>

  </div>
  </div>

</form>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selector = document.getElementById('paymentMethod');
        const kbz = document.getElementById('kbzPay');
        const wave = document.getElementById('wavePay');
        const aya = document.getElementById('ayaPay');

        function updatePaymentUI() {
            kbz.classList.add('d-none');
            wave.classList.add('d-none');
            aya.classList.add('d-none');

            const value = selector.value;
            if (value === 'kbz') kbz.classList.remove('d-none');
            else if (value === 'wave') wave.classList.remove('d-none');
            else if (value === 'aya') aya.classList.remove('d-none');
        }

        selector.addEventListener('change', updatePaymentUI);
        updatePaymentUI();
    });
</script>
@endsection