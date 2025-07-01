@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Edit Product
            </div>

            <div class="card-body">

                <form action="{{ url("/admin/product/upd/{$product->id}") }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <table class="table table-sm">

                    <tr>
                        <td>
                            <label class="form-control">Category</label>
                        </td>
                        <td>
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"@if($category->id == $product->category_id) selected @endif>
                                        {{ $category->name }}
                                </option>    
                                @endforeach
                            </select>                                       
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Brand</label>
                        </td>
                        <td>
                            <select name="brand_id" id="brand_id" class="form-select">
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}"@if($brand->id == $product->brand_id) selected @endif>
                                        {{ $brand->name }}
                                </option>    
                                @endforeach
                            </select>                                       
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" class="form-control"  value="{{ $product->name }}">
                            @error('name')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>  

                    <tr>
                        <td>
                            <label class="form-control">Old Photo</label>
                        </td>
                        <td> 
                            <img src="{{ asset("images/product/$product->photo1") }} " width='50' height='50'>
                            <img src="{{ asset("images/product/$product->photo2") }} " width='50' height='50'>
                            <img src="{{ asset("images/product/$product->photo3") }} " width='50' height='50'>
                            <img src="{{ asset("images/product/$product->photo4") }} " width='50' height='50'> 
                        </td>
                     </tr>

                    <tr>
                        <td>
                            <label class="form-control">New Photo</label>
                        </td>
                        <td>
                            <input type="file" name="photo1" class="form-control">
                            <input type="file" name="photo2" class="form-control">
                            <input type="file" name="photo3" class="form-control">
                            <input type="file" name="photo4" class="form-control">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                            @error('price')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Qty</label>
                        </td>
                        <td>
                            <input type="text" name="qty" class="form-control" value="{{ $product->qty }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Status</label>
                        </td>
                        <td>
                            <input type="text" name="status" class="form-control" value="{{ $product->status }}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-control">Remark</label>
                        </td>
                        <td>
                            <input type="text" name="remark" class="form-control" value="{{ $product->remark }}">
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
