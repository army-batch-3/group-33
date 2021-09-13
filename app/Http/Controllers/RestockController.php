<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Assets;
use App\Models\Restock;
use App\Models\Suppliers;
use App\Models\Warehouse;
use App\Models\Transportation;
use App\DataTables\RestockDataTableEditor;

class RestockController extends Controller
{
    protected $restock, $suppliers, $warehouse, $asset;
    public function __construct(Restock $restock, Suppliers $suppliers, Warehouse $warehouse, Transportation $transportation, Assets $asset)
    {
        $this->restock = $restock;
        $this->suppliers = $suppliers;
        $this->warehouse = $warehouse;
        $this->transportation = $transportation;
        $this->assets = $asset;
    }

    public function index(){
        return view("restock");
    }

    public function getRestock()
    {
        $option["supplier_id"] = Datatables::of($this->suppliers->select('id AS value', 'name AS label'))->make()->original["data"];
        $option["warehouse_id"] = Datatables::of($this->warehouse->select('id AS value', 'name AS label'))->make()->original["data"];
        $option["transportation_id"] = Datatables::of($this->transportation->select('id AS value', 'type AS label')->where("is_available", "1"))->make()->original["data"];
        $option["assets_id"] = Datatables::of($this->assets->select('id AS value', 'name AS label'))->make()->original["data"];

        $asset = $this->restock
        ->join("pa_suppliers", "pa_suppliers.id", "=", "pa_restock.supplier_id")
        ->join("pa_warehouses", "pa_warehouses.id", "=", "pa_restock.warehouse_id")
        ->join("pa_transportations", "pa_transportations.id", "=", "pa_restock.transportation_id")
        ->join("pa_assets", "pa_assets.id", "=", "pa_restock.assets_id")
        ->select('pa_restock.id','pa_restock.quantity','pa_restock.created_at','pa_restock.updated_at','pa_restock.status',
        'pa_restock.supplier_id','pa_restock.warehouse_id','pa_restock.transportation_id','pa_restock.assets_id',
        'pa_suppliers.name as supplierdb',
        'pa_warehouses.name as warehousedb',
        'pa_assets.name as assetsdb','pa_assets.number_of_stocks',
        'pa_transportations.type AS transportationdb');

        return Datatables::of($asset)
        ->with('options',$option)
        ->make(true);
    }

    public function storeRestock(RestockDataTableEditor $restock)
    {
        return $restock->process(request());
    }


}
