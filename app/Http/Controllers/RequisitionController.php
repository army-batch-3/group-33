<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Assets;
use App\Models\Suppliers;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\Transportation;
use App\Models\RequisitionItems;
use App\DataTables\RequisitionDataTableEditor;

class RequisitionController extends Controller
{
    protected $requisition, $suppliers, $warehouse, $asset;
    public function __construct(RequisitionItems $requisition, Suppliers $suppliers, Warehouse $warehouse, Transportation $transportation, Assets $asset)
    {
        $this->requisition = $requisition;
        $this->suppliers = $suppliers;
        $this->warehouse = $warehouse;
        $this->transportation = $transportation;
        $this->assets = $asset;
    }

    public function index(){
        return view("requisition");
    }

    public function getRequesition()
    {
        // dd("asd");
        
        $option["supplier_id"] = Datatables::of($this->suppliers->select('id AS value', 'name AS label'))->make()->original["data"];
        $option["warehouse_id"] = Datatables::of($this->warehouse->select('id AS value', 'name AS label'))->make()->original["data"];
        $option["transportations_id"] = Datatables::of($this->transportation->select('id AS value', 'type AS label')->where("is_available", "1"))->make()->original["data"];
        $option["assets_id"] = Datatables::of($this->assets->select('id AS value', 'name AS label'))->make()->original["data"];

        $asset = $this->requisition
        ->join("pa_suppliers", "pa_suppliers.id", "=", "pa_requisition_items.supplier_id")
        ->join("pa_warehouses", "pa_warehouses.id", "=", "pa_requisition_items.warehouse_id")
        ->join("pa_transportations", "pa_transportations.id", "=", "pa_requisition_items.transportations_id")
        ->join("pa_assets", "pa_assets.id", "=", "pa_requisition_items.assets_id")
        ->select('pa_requisition_items.id','pa_requisition_items.quantity','pa_requisition_items.created_at','pa_requisition_items.updated_at','pa_requisition_items.status',
        'pa_suppliers.name as supplierdb',
        'pa_warehouses.name as warehousedb',
        'pa_assets.name as assetsdb',
        'pa_transportations.type AS transportationdb');
 
        return Datatables::of($asset)
        ->with('options',$option)
        ->make(true);
    }

    public function storeRequisition(RequisitionDataTableEditor $requsitionData)
    {
        return $requsitionData->process(request());
    }


}
