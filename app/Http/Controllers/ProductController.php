<?php
  
namespace App\Http\Controllers;
   
use App\Models\Product;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $phone= New Phone();
        // $phone->phone="7889955696";

        // $user= new User();
        // $user->name="Ashraf";
        // $user->email="ashrfdar@quicsolv.in";
        // $user->password="123456";
        // $user->save();
        // $user->phone()->save($phone);
        //$products = Product::latest()->paginate(5);

        //$id=1;
       // $products = User::find($id)->phone; 
            
        // $products = Product::join('categories', 'products.categoryId ', '=', 'categories.id')
        //        ->get(['products.name','products.categoryId','products.detail']);

            //  $products = DB::table('productsnews')
            // ->join('categories', 'productsnews.categoryId ', '=', 'categories.id')            
            // ->select('productsnews.*', 'categories.name')
            // ->get();  
            
            // $products = DB::table('productsnews')
            // ->join('categories', 'productsnews.categoryId', '=', 'categories.id')            
            // ->select('productsnews.*', 'categories.name')
            // ->get();
             $products = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')            
            ->select('products.name as productName','products.id','products.detail', 'categories.name')
            ->get();

            

            
             // $phone= New Phone();
        // $phone->phone="7889955696";

        // $user= new User();
        // $user->name="Ashraf";
        // $user->email="ashrfdar@quicsolv.in";
        // $user->password="123456";
        // $user->save();
        // $user->phone()->save($phone);
        //$products = Product::latest()->paginate(5);


            
          // $products = Product::latest()->paginate(5);


        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $items = Category::pluck('name', 'id');
        $selectedID = 2;
        return view('products.create',compact('selectedID', 'items'));
    }    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
           
        ]);        
        
        Product::create($request->all());
        
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      
        return view('products.show',compact('product'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // $uri = $request->path();
        // echo($uri);
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }    
}