<?php

namespace App\Http\Controllers\Store;


use stdClass;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProductRequest;

class StoreController extends Controller
{
  
  

    public function home(Product $product){
      
      $products = Product::with('category')->latest()->simplePaginate(4);
      return view('store.home',compact('products','product'));
    }
    public function contact(){
      return view('store.contact');

    }
    public function show(Product $product){
    
    
      return view('store.home',compact('product'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {      
       $value = ($request->query('name'));
       $name  = ($request->input('name'));
       $max   = ($request->input('max'));
       $min   = ($request->input('min'))?? 0;
       $categoriesIds= $request->input('categories');

    //    $minPrice = Product::query()->min('price');
    //    $maxPrice = Product::query()->max('price');
     
       $productsQuery = Product::query()->with('category');
       $categories= Category::with("products")->has('products')->get()->all();

       if(!empty($name)){
            
         $productsQuery->where('name','like',"%{$name}%")
         ->orWhere('description','like',"%{$name}%");

       }
            
        $productsQuery->where('price','>=',$min);
       
       if(!empty($max)){
            
         $productsQuery->where('price','<=',$max);

       }

       if(!empty($categoriesIds)){
            
         $productsQuery->whereIn('category_id',$categoriesIds)->get();

       }
     
       $products = $productsQuery->get();
      
       //   min max prices
       $prices = $products->pluck('price')->all();
       $priceOptions  = new stdClass();
       $priceOptions->minPrice = 0 ;
       $priceOptions->maxPrice = 0 ;

      if(!empty($prices)){
        $priceOptions->minPrice =min($prices) ;
        $priceOptions->maxPrice =max($prices) ;
          
      }

       return view('store.index',compact('products','categories','value','priceOptions'));

    }
    



    public function search(Request $request)
    {
       
        $products = Product::where('name','like','%'. $request->search.'%')
        ->orWhere('description','like','%'. $request->search.'%')
        ->orWhere('quantity','=',$request->search)
        ->orWhere('price','=',$request->search)
        ->paginate(4);

        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
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
     
       Product::create($formFields);
       toastr()->success('Product has been saved successfully!');
       return to_route("products");
    }
    

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return  view('products.edit',compact("product"));
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
        
        if(request()->hasfile('image'))
        {
            $file = request()->file('image');
            $filename = $file->store("product","public");
            $file->move("storage/product", $filename);
            $product->image =  $filename;

        }

        $product->price= $request->price;
        
        $product->save();


        return redirect()->route('products')->with('success', 'Product updated successfully');
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
        }
       
        $product->delete();
       
        return to_route("products")->with('success','Product deleted successfully');

    }
    // public function destroy(Request  $request)
    // {
    //     $ids = $request->input('ids');

    //     // Ensure ids is an array and not empty
    //     if (is_array($ids) && count($ids) > 0) {
    //         Product::whereIn('id', $ids)->delete();

    //         return redirect()->route('products')->with('success', 'Products deleted successfully');
    //     }

    //     return redirect()->route('products')->with('error', 'No products selected for deletion');
       

    // }
}
