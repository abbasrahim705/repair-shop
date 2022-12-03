<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        // dd('testing');
        return view('admin.categories.item-category',[
            'categories' => Category::latest()->orderBy('id','desc')->paginate(5),
            'setting' => Setting::first()
        ]);
    }
    public function store(){
        $attributes = request()->validate([
            'name' => 'required|string'
        ]);
        // $attributes['created_by'] = auth()->user()->id;
        Category::create($attributes);
        return redirect(route('item-category'))->with('success','Category Added Succesfully');
    }

    public function create(Request $request){
        // dd('Hello');
        return view('admin.categories.edit-category',[
            'category' => Category::where('id',$request->id)->first()
        ]);
    }

    public function update(){
        $attributes = request()->validate([
            'id' => 'required',
            'name' => 'required'
        ]);

        // $attributes['created_by'] = auth()->user()->id;

        Category::where('id',$attributes['id'])->update($attributes);
        return redirect(route('item-category'))->with('success','Category Update Succeefully');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect(route('item-category'))->with('success','Category Deleted');
    }
}
