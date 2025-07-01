<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    public function listProduct()
    {
        $categories  = Category::all();
        $brands      = Brand::all();
        $products      = Product::all();
        
        // $category       = Category::find(2);
        // $categories     = Category::where('id','>',3)->get();

        // return view('category.list-category', ['categories' => $categories]);

        return view('product.list-product', compact('categories','brands','products'));
    }

   public function createProduct(Request $request)
    {
        $validator = validator( request()->all(),
        [
            "category_id"  => "required",         
            "brand_id"     => "required",         
            "name"         => "required",         
            "photo1"       => "required",
            "photo2"       => "",
            "photo3"       => "",
            "photo4"       => "",
            "price"        => "required",
            "qty"          => "required",
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $product = new Product();

            $product->category_id     = $request->category_id;
            $product->brand_id        = $request->brand_id;
            $product->name            = $request->name;
            $product->price           = $request->price;
            $product->qty             = $request->qty;
            $product->status          = request()->status;
            $product->remark          = request()->remark;

            

            if($request->hasfile('photo1'))
            {
                $file       = $request->file('photo1');
                $name       = $file->getClientOriginalName();
                $extension  = $file->getClientOriginalExtension();               

                $file->move('images/product/',$name);

                $product->photo1= $name;
            }
            else
            {
                $product->photo1='';
            }
        

            if($request->hasfile('photo2'))
            {
                $file       = $request->file('photo2');
                $name       = $file->getClientOriginalName();
                $extension  = $file->getClientOriginalExtension();               

                $file->move('images/product/',$name);

                $product->photo2 = $name;
            }
            else
            {
                $product->photo2='';
            }

            if($request->hasfile('photo3'))
            {
                $file       = $request->file('photo3');
                $name       = $file->getClientOriginalName();
                $extension  = $file->getClientOriginalExtension();               

                $file->move('images/product/',$name);

                $product->photo3 = $name;
            }
            else
            {
                $product->photo3='';
            }

            if($request->hasfile('photo4'))
            {
                $file       = $request->file('photo4');
                $name       = $file->getClientOriginalName();
                $extension  = $file->getClientOriginalExtension();               

                $file->move('images/product/',$name);

                $product->photo4 = $name;
            }
            else
            {
                $product->photo4='';
            }

        $product->save();
        
        
        return back()->with('add_info','New Product added Successfully!');
        
    }

    public function deleteProduct()
    {
        Product::find(request()->id)->delete();
        
        return redirect('/admin/product/list')->with('del_info','Product Deleted Successfully!');
    }

    public function updProduct()
    {
        $categories = Category::all();
        $brands     = Brand::all();
        $product    = Product::find(request()->id);

        return view('product.upd-product',compact('categories','brands','product'));
    }

    public function updateProduct(Request $request)
    {
        $validator = validator( request()->all(),
        [
            "category_id"    => "required",
            "brand_id"       => "required",         
            "name"           => "required",         
            "price"          => "required",         
            "qty"            => "required",         
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        
        $product = Product::find(request()->id);

            $product->category_id     = $request->category_id;
            $product->brand_id        = $request->brand_id;
            $product->name            = $request->name;
            $product->price           = $request->price;
            $product->qty             = $request->qty;
            $product->status          = request()->status;
            $product->remark          = request()->remark;

            for ($i =1; $i <= 4; $i++) {
                $field = 'photo1' . $i;

                if($request->hasFile($field)) {
                    $file = $request->file($field);
                    $name = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/product'), $name);

                    if($product->$field && file_exists(public_path('images/product/'. $product->$field))){
                        unlink(public_path('images/product/' . $product->$field));
                    }

                    $product->$field = $name;
                }
            }

            for ($i =1; $i <= 4; $i++) {
                $field = 'photo2' . $i;

                if($request->hasFile($field)) {
                    $file = $request->file($field);
                    $name = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/product'), $name);

                    if($product->$field && file_exists(public_path('images/product/'. $product->$field))){
                        unlink(public_path('images/product/' . $product->$field));
                    }

                    $product->$field = $name;
                }
            }

            for ($i =1; $i <= 4; $i++) {
                $field = 'photo3' . $i;

                if($request->hasFile($field)) {
                    $file = $request->file($field);
                    $name = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/product'), $name);

                    if($product->$field && file_exists(public_path('images/product/'. $product->$field))){
                        unlink(public_path('images/product/' . $product->$field));
                    }

                    $product->$field = $name;
                }
            }

            for ($i =1; $i <= 4; $i++) {
                $field = 'photo4' . $i;

                if($request->hasFile($field)) {
                    $file = $request->file($field);
                    $name = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/product'), $name);

                    if($product->$field && file_exists(public_path('images/product/'. $product->$field))){
                        unlink(public_path('images/product/' . $product->$field));
                    }

                    $product->$field = $name;
                }
            }

            

        $product->save();

        return redirect('/admin/product/list')->with('upd_info','Product updated Successfully!');

    }
}
