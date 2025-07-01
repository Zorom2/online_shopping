@extends('layouts.app')
@section('content')

@if(session('info'))
<div class="alert alert-success text-center">
  {{session('info')}}
</div>
@endif

<div class="container">
<div class="d-flex flex-row justify-content-center flex-wrap my-flex-container">

            
  @foreach($categories as $category)
  <div class="p-1 my-flex-item" style="width: 165px; ">

    <div class="card text-center" >

        <a class="card-text" href="{{ url("/category/{$category->id}/product/view/") }}" >

        <img src="images/category/{{$category->photo}}" width="100" height="100" class="card-img-top"  alt="No Image" >
    
            <div class="card-footer border bg-white">                
                <div class="card-text d-inline-block text-truncate" style="font-size: 90%;max-width: 95%;">
                  {{ $category->name }}                   
          </div>
            </div>     

        </a>

    </div>
  
  </div> 
  @endforeach

   
</div> <!-- Row -->
</div> <!-- Container -->

@endsection