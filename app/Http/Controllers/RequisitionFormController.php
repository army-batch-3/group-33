<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Assets;
use App\Models\Employee;
use App\Models\Suppliers;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\Transportation;
use App\Models\Requisitionform;
use App\DataTables\RequisitionFormDataTableEditor;

class RequisitionFormController extends Controller
{
    protected $requisition,$asset, $employee;
    public function __construct(Requisitionform $requisition, Transportation $transportation, Assets $asset, Employee $employee)
    {
        $this->requisition = $requisition;
        $this->transportation = $transportation;
        $this->employee = $employee;
        $this->assets = $asset;
    }

    public function index()
    {
        return view("requisitionForm");
    }

    public function getRequisition()
    {
        
        $option["employee_id"] = Datatables::of($this->employee->select('id AS value', 'last_name AS label'))->make()->original["data"];

        $option["transportations_id"] = Datatables::of($this->transportation->select('id AS value', 'type AS label')->where("is_available", "1"))->make()->original["data"];
        $option["assets_id"] = Datatables::of($this->assets->select('id AS value', 'name AS label'))->make()->original["data"];

        $asset = $this->requisition
        ->join("pa_employees", "pa_employees.id", "=", "pa_requisition_form.employee_id")
        ->join("pa_transportations", "pa_transportations.id", "=", "pa_requisition_form.transportations_id")
        ->join("pa_assets", "pa_assets.id", "=", "pa_requisition_form.assets_id")
        ->select('pa_requisition_form.id','pa_requisition_form.quantity','pa_requisition_form.created_at','pa_requisition_form.updated_at','pa_requisition_form.status',
        'pa_employees.first_name', 'pa_employees.middle_name', 'pa_employees.last_name AS employeedb',
        'pa_assets.name as assetsdb',
        'pa_transportations.type AS transportationdb');

        return Datatables::of($asset)
        ->with('options',$option)
        ->make(true);
    }

    public function storeRequisitionForm(RequisitionFormDataTableEditor $requsitionData)
    {
        return $requsitionData->process(request());
    }


}
