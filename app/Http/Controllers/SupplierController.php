<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\SupplierDataTableEditor;
use App\Models\Suppliers;

class SupplierController extends Controller
{
    public function supplier(){
        return view("suppliers");
    }
    public function storeSupplier(SupplierDataTableEditor $supplierData)
    {
      return $supplierData->process(request());
    }

    public function getSupplier()
    {
        $supplier = DB::select("select id, name, email, contact_number, contact_person, address, created_at, updated_at from pa_suppliers");
        dd($supplier);
        // $supplier = Suppliers::select('id', 'name', 'email', 'contact_number', 'contact_person', 'address', 'created_at', 'updated_at');
        return Datatables::of($supplier)->make(true);
    }
}
