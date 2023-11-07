<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $categories = Category::query()->paginate(4);
        return view('users.admin.categories.index',compact('categories'));
    }
    public function search(Request $request)
    {
       
        $categories = Category::where('name','like','%'. $request->search.'%')
      
        ->paginate(4);

        return view('users.admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;

     
       Category::create([
        "name"=>$name
       ]);
       return redirect()->route('categories.index')->with('success', 'Category added successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $category = Category::find($id);
        $products = $category->products()->get();
        
        return  view('users.admin.categories.show',compact("category","products"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return  view('users.admin.categories.edit',compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $category = Category::find($id);
        
        $category->name= $request->name;
        
        $category->save();


        return redirect()->route('categories.index')->with('success', 'Catgeory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
       
        $category->delete();
       
        return to_route("categories.index")->with('success','Catgeory deleted successfully');

    }
}
