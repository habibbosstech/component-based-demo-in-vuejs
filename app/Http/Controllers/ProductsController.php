<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Suppliers;

class ProductsController extends Controller
{
    public function store(Request $request)
    {
      $product = new Products([
        'product_name' => $request->get('product_name'),
        'quantity' => $request->get('quantity'),
        'price' => $request->get('price'),
        'supplier_id' => $request->get('supplier_id'),
        'is_active' => $request->get('is_active')
      ]);

      $product->save();

      return response()->json('Product successfully added');
    }

    public function index()
    {
      $products = Products::join('suppliers','products.supplier_id','=','suppliers.id')->where('products.is_deleted',0)->select('products.id as product_id','products.supplier_id as supplier_id','products.product_name as product_name','products.quantity as quantity','products.price as price','products.is_active as is_active')->get();
      return $products;
    }
    
    public function suppliers()
    {
      $suppliers = Suppliers::all();

      return response()->json($suppliers);
    }

    public function edit($id)
    {
      $product = Products::join('suppliers','products.supplier_id','=','suppliers.id')->where('products.is_deleted',0)->where('products.id',$id)->select('products.id as product_id','products.supplier_id as supplier_id','products.product_name as product_name','products.quantity as quantity','products.price as price','products.is_active as is_active')->first();
      return response()->json($product);
    }

    public function update($id, Request $request)
    {
      $product = Products::find($id);

      $product->update($request->all());

      return response()->json('Product successfully updated');
    }

    public function delete($id)
    {
      $product = Products::find($id);
      $product->is_deleted = 1;
      $product->save();

      return response()->json('Product successfully deleted');
    }
}
