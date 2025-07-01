@extends('layouts.app')
@section('content')


<div class="container">
<div class="d-flex flex-row justify-content-center flex-wrap my-flex-container">

  @foreach ($products as  $product)
       <div class="p-1 my-flex-item" style="width: 165px; ">     

      <div class="card" style="padding: 5px;position: relative; ">
        
        <a class="card-text" style="font-size: 60%;text-decoration: none;color: black;" href="{{ url("/product/{$product->id}/detail") }}" >

          <img style="width: 145px; height: 130px;" src="{{ asset('/images/product/' . $product->photo1) }}" class="card-img-top" > 

          <div class="card-footer text-center bg-white">
              <p class="card-title text-danger" >
                {{ number_format($product->price) }} $
              </p>
              <p class="card-text d-inline-block text-truncate">
                {{ $product->name }}
              </p>                  
          </div>
        </a>
      </div>

       </div>
     @endforeach

</div>
</div>

@endsection