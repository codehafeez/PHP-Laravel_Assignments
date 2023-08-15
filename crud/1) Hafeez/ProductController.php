<?php
namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{

    public function index() {
        $products = Product::latest()->paginate(5);  
        return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }   

    public function create() {
        return view('products.create');
    }
  
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);  
        Product::create($request->all());
        return redirect()->route('products.index')->with('success','Product created successfully.');
    }
   
    public function show(Product $product) {
        return view('products.show',compact('product'));
    }
   
    public function edit(Product $product) {
        return view('products.edit',compact('product'));
    }
  
    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);  
        $product->update($request->all());
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }
  
    public function destroy(Product $product) {
        $product->delete();  
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}