<?php

namespace App\Http\Controllers;

use DB;
use Datatables;
use App\Models\Assets;
use App\Models\Employee;
use App\Models\Requisition;
use App\Models\Transportation;
use App\DataTables\RequisitionDataTableEditor;

class RequisitionController extends Controller
{
    protected $requisition, $employee, $transportation, $asset;
    public function __construct(Requisition $requisition, Employee $employee, Transportation $transportation, Assets $asset)
    {
        $this->requisition = $requisition;
        $this->employee = $employee;
        $this->transportation = $transportation;
        $this->assets = $asset;
    }

    public function index(){
        return view("requisition");
    }

    public function getRequisition()
    {
        $option["employee_id"] = Datatables::of($this->employee->select('id AS value', DB::raw("CONCAT(first_name,' ',middle_name,' ',last_name) AS label") ))->make()->original["data"];
        $option["transportation_id"] = Datatables::of($this->transportation->select('id AS value', 'type AS label')->where("is_available", 1))->make()->original["data"];
        $option["assets_id"] = Datatables::of($this->assets->select('id AS value', 'name AS label'))->make()->original["data"];

        $requisition = $this->requisition
        ->join("pa_employees", "pa_employees.id", "=", "pa_requisition.employee_id")
        ->join("pa_transportations", "pa_transportations.id", "=", "pa_requisition.transportation_id")
        ->join("pa_assets", "pa_assets.id", "=", "pa_requisition.assets_id")
        ->select('pa_requisition.id','pa_requisition.quantity','pa_requisition.created_at','pa_requisition.updated_at','pa_requisition.status',
        'pa_requisition.employee_id','pa_requisition.transportation_id','pa_requisition.assets_id',
        DB::raw("CONCAT(first_name,' ',middle_name,' ',last_name) AS employee_name"),
        'pa_assets.name as assetsdb',
        'pa_transportations.type AS transportationdb');

        return Datatables::of($requisition)
        ->with('options',$option)
        ->make(true);
    }

    public function storeRequisition(RequisitionDataTableEditor $requisitionData)
    {
        // dd($requisitionData);
        return $requisitionData->process(request());
    }


}
