<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\DataTables\SupplierDataTableEditor;
use App\DataTables\WarehouseDataTableEditor;
use DataTables;

class WarehouseController extends Controller
{
    public function warehouse () {
        return view('warehouse.index');
    }

    public function storeWarehouse(WarehouseDataTableEditor $warehouse) {
        return $warehouse->process(request());
    }

    public function getWarehouse()
    {
        // $supplier = DB::select("select id, name, email, contact_number, contact_person, address, created_at, updated_at from pa_suppliers");
        // dd($supplier);
        $warehouse = Warehouse::all();
        // dd($supplier);
        return Datatables::of($warehouse)->make(true);
    }
}
