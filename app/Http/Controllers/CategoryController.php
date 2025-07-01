<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function listCategory()
    {
        $categories = Category::all();

        return view('category.list-category', compact('categories'));
    }

    public function createCategory(Request $request)
    {
        $validator = validator( request()->all(),
        [
            "name"        => "required",         
            "photo"       => "required",
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $category = new Category();

            $category->name   = $request->name;
            $category->status = request()->status;
            $category->remark = request()->remark;

            if($request->hasfile('photo'))
            {
                $file       = $request->file('photo');
                $name       = $file->getClientOriginalName();
                $extension  = $file->getClientOriginalExtension();               

                $file->move('images/category/',$name);

                $category->photo = $name;
            }
            else
            {
                $category->photo='';
            }

        $category->save();
        
        
        return back()->with('add_info','New Category added Successfully!');
    }

    public function deleteCategory()
    {
        Category::find(request()->id)->delete();

        return redirect('/admin/category/list')->with('del_info','Category Deleted Successfully!');
    }

    public function updCategory()
    {
        $category = Category::find(request()->id);

        return view('category.upd-category',compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $validator = validator(request()->all(),
        [
            "name"      => "required",
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $category = Category::find(request()->id);

            $category->name     = request()->name;
            $category->status   = request()->status;
            $category->remark   = request()->remark;

            if($request->hasfile('photo'))
            {
                $file       = $request->file('photo');
                $name       = $file->getClientOriginalName();
                $extension  = $file->getClientOriginalExtension();
                $file->move('images/category/',$name);
                $category->photo = $name;
            }
        $category->save();

        return redirect('/admin/category/list')->with('upd_info','Category Updated Successfully!');
    }
}

