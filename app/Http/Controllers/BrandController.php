<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;

class BrandController extends Controller
{
    public function listBrand()
    {
        $categories  = Category::all();
        $brands      = Brand::all();
        
        // $category       = Category::find(2);
        // $categories     = Category::where('id','>',3)->get();

        // return view('category.list-category', ['categories' => $categories]);

        return view('brand.list-brand', compact('categories','brands'));
    }

   public function createBrand(Request $request)
    {
        $validator = validator( request()->all(),
        [
            "category_id" => "required",         
            "name"        => "required",         
            "photo"       => "required",
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $brand = new Brand();

            $brand->category_id     = $request->category_id;
            $brand->name            = $request->name;
            $brand->status          = request()->status;
            $brand->remark          = request()->remark;

            if($request->hasfile('photo'))
            {
                $file       = $request->file('photo');
                $name       = $file->getClientOriginalName();
                $extension  = $file->getClientOriginalExtension();               

                $file->move('images/brand/',$name);

                $brand->photo = $name;
            }
            else
            {
                $brand->photo='';
            }

        $brand->save();
        
        
        return back()->with('add_info','New Brand added Successfully!');
        
    }

    public function deleteBrand()
    {
        Brand::find(request()->id)->delete();
        
        return redirect('/admin/brand/list')->with('del_info','Brand Deleted Successfully!');
    }

    public function updBrand()
    {
        $categories = Category::all();
        $brand      = Brand::find(request()->id);

        return view('brand.upd-brand',compact('categories','brand'));
    }

    public function updateBrand(Request $request)
    {
        $validator = validator( request()->all(),
        [
            "category_id"    => "required",         
            "name"           => "required",         
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        
        $brand = Brand::find(request()->id);

            $brand->category_id     = $request->category_id;
            $brand->name            = $request->name;
            $brand->status          = request()->status;
            $brand->remark          = request()->remark;

            if($request->hasfile('photo'))
            {
                $file       = $request->file('photo');
                $name       = $file->getClientOriginalName();
                $extension  = $file->getClientOriginalExtension();               

                $file->move('images/brand/',$name);

                $brand->photo = $name;
            }            

        $brand->save();

        return redirect('/admin/brand/list')->with('upd_info','Brand updated Successfully!');

    }
}
