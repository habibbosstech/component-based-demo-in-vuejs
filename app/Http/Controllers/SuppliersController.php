<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suppliers;

class SuppliersController extends Controller
{
    public function store(Request $request)
    {
      $supplier = new Suppliers([
        'supplier_name' => $request->get('supplier_name'),
        'supplier_email' => $request->get('supplier_email'),
        'company_name' => $request->get('company_name'),
        'website' => $request->get('website'),
        'supplier_phone' => $request->get('supplier_phone'),
        'is_active' => $request->get('is_active')
      ]);

      $supplier->save();

      return response()->json('supplier successfully added');
    }

    public function index()
    {
      $suppliers = Suppliers::where('is_deleted',0)->get();
      return $suppliers;
    }

    public function edit($id)
    {
      $supplier = Suppliers::find($id);
      return response()->json($supplier);
    }

    public function update($id, Request $request)
    {
      $supplier = Suppliers::find($id);

      $supplier->update($request->all());

      return response()->json('supplier successfully updated');
    }

    public function delete($id)
    {
      $supplier = Suppliers::find($id);
      $supplier->is_deleted = 1;
      $supplier->save();

      return response()->json('supplier successfully deleted');
    }
}
