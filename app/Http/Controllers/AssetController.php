<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Assets;
use Illuminate\Http\Request;
use App\DataTables\AssetsDataTableEditor;
use App\Models\Suppliers;
use App\Models\Warehouse;

class AssetController extends Controller
{
    protected $assets;
    protected $suppliers;
    protected $warehouse;
    public function __construct(Assets $data, Suppliers $suppliers, Warehouse $warehouse)
    {
        $this->assets = $data;
        $this->suppliers = $suppliers;
        $this->warehouse = $warehouse;
    }

    public function index()
    {
        return view('assets');
    }

    public function getAssets()
    {
        $option["supplier_id"] = Datatables::of($this->suppliers->select('id AS value', 'name AS label'))->make()->original["data"];
        $option["warehouse_id"] = Datatables::of($this->warehouse->select('id AS value', 'name AS label'))->make()->original["data"];
        $asset = $this->assets
        ->join("pa_suppliers", "pa_suppliers.id", "=", "pa_assets.supplier_id")
        ->join("pa_warehouses", "pa_warehouses.id", "=", "pa_assets.warehouse_id")
        ->select('pa_assets.id','pa_assets.name','pa_assets.photo','pa_assets.number_of_stocks','pa_assets.type',
        'pa_assets.price','pa_assets.created_at','pa_assets.updated_at','pa_suppliers.name AS supplierdb',
        'pa_warehouses.name as warehousedb');
        return Datatables::of($asset)
        ->with('options',$option)
        // ->with('options',$option2)
        ->make(true);
    }

    public function storeAssets(AssetsDataTableEditor $assetsData)
    {

        return $assetsData->process(request());
    }
}
