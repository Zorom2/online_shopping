@extends('layouts.app')
@section('content')


<div class="container-fluid">
<div class="row justify-content-center">

  @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    
  <div class="col-md-4">

    <!-- Zoom Image -->
      <div class="container">
      <div class="exzoom hidden" id="exzoom">
          <div class="exzoom_img_box">
              <ul class='exzoom_img_ul'>
                  <li><img src="{{ asset("images/product/$product->photo1") }}"/></li>
                  <li><img src="{{ asset("images/product/$product->photo2") }}"/></li>
                  <li><img src="{{ asset("images/product/$product->photo3") }}"/></li>
                  <li><img src="{{ asset("images/product/$product->photo4") }}"/></li>           
              </ul>
          </div>
          <div class="exzoom_nav"></div>
          <p class="exzoom_btn">
              <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
              <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
          </p>
      </div>
      </div>
    <!-- Zoom Image -->

  </div>


  <div class="col-md-8">

    <div class="card text-center">
      <div class="card-header">Product Details</div>
      <div class="card-body">
        <div class="card-text">Name:   {{ $product->name }}   </div>
        <div class="card-text">Price:   {{ $product->price }}   </div>
        <div class="card-text">Qty:   {{ $product->qty }}   </div>
      </div>
    </div>

    <br>

    <div class="card text-center">
      
      <div class="card-body">
          <form method="get" enctype="multipart/form-data" action="{{ url("/product/addToCartQty/{$product->id}") }}" >
            {{ csrf_field() }} 

            <span>
              Quantity : 
              <input style="width: 100px;"  type="number" name="pqty"  min="1" max="{{ $product->qty }}" value="1" >
            </span>        

            @if($product->qty > 0)            
              <input  type="submit"  value="Add to Cart" class="btn btn-primary" >
            @else
              <input  type="submit" value="Out of Stock" class="btn btn-danger" disabled>  
            @endif

          </form>
      </div>
    </div>

  </div>


</div> <!-- Row -->
</div> <!-- Container -->


<script type="text/javascript">

    $('.container').imagesLoaded( function() {
  $("#exzoom").exzoom({
        autoPlay: false,
    });
  $("#exzoom").removeClass('hidden')
});

</script>


@endsection