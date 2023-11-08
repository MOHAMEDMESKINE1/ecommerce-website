<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProductRequest;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ProductController extends Controller
{
   

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $products = Product::query()
        ->with('category')
        ->paginate(4);
        return view('users.admin.products.index',compact('products'));
    }
  
    public function search(Request $request)
    {
       
        $products = Product::where('name','like','%'. $request->search.'%')
        ->orWhere('description','like','%'. $request->search.'%')
        ->orWhere('quantity','=',$request->search)
        ->orWhere('price','=',$request->search)
        ->paginate(4);

        return view('users.admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('users.admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formFields = $request->validated();

       if($request->hasFile("image")){
         $formFields['image'] = $request->file("image")->store("product","public");
       }
       $formFields['catgeory_id'] = $request->category_id;

       Product::create($formFields);
       return redirect()->route('products.index')->with('success', 'Product added successfully');
      //    return to_route("products");
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {        
        $categories = Category::all();

        $product = Product::find($id);
        return  view('users.admin.products.edit',compact("product","categories"));
    }

    public function statistics(){
        return view('users.admin.products.statistics');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request,  $id)
    {

        $product = Product::find($id);
        
        $product->name= $request->name;
        $product->description= $request->description;
        $product->quantity= $request->quantity;
        $product->category_id= $request->category_id;
        
        if(request()->hasfile('image'))
        {
            $file = request()->file('image');
            $filename = $file->store("product","public");
            $file->move("storage/product", $filename);
            $product->image =  $filename;

        }

        $product->price= $request->price;
        
        $product->save();


        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->image){
            // Delete the product image from the storage disk.
            Storage::disk('public')->delete($product->image);
            $product->delete();
        }else{
            $product->delete();

        }
       
       
        return redirect()->route("products.index")->with('success','Product deleted successfully');

    }
    public function multiDelete(Request  $request)
    {
        
        // Product::whereIn('id', $request->get('selected'))->delete();

        $selectedIds = $request->get('selected');
        $productsToDelete = [];
    
        foreach ($selectedIds as $id) {
            $product = Product::find($id);
    
            if ($product) {
                $productsToDelete[] = $product;
            }
        }
    
        if ($productsToDelete) {
            // Delete the products and their images
            foreach ($productsToDelete as $product) {
               
    
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                    $product->delete();
                }
                $product->delete();
            }
        }
        
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
